<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\AccountProjects;
use App\Category;
use App\CategoryCircles;
use App\Citizen;
use App\Form;
use App\Form_file;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CitizenResource;
use App\Http\Resources\FormResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SentTypeResource;
use App\Project;
use App\Rules\IdNumber;
use App\Sent_type;
use App\Sms;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class HomeController extends Controller {

	use ApiResponseTrait;

	public function index() {

		$posts = PostResource::collection(Post::all());

		return $this->apiResponse($posts);
	}


    public function form_projects() {

        $projects = Project::where('id','!=',1)->get();
        $projects = ProjectResource::collection($projects);

        return $this->apiResponse($projects);
	}
	
	public function search() {

		if (request('type') == 'id_number') {


			$data = Validator::make(request()->all(), [
				'keyword' => ['required', 'digits:9', new IdNumber],
			]);

			if ($data->fails()) {
				return $this->apiResponse('', 'not valid', 406);
			}

			$citizen = Citizen::where('id_number', request('keyword'))->first();

			if ($citizen) {

				$forms = $citizen->forms;
				$forms = FormResource::collection($forms);

				return $this->apiResponse($forms , '' , '200');
			}
							return $this->apiResponse('', 'not found', 404);

		} elseif (request('type') == 'id') {

//            $contains = Str::contains(request('keyword'), '00970');
            $id =  request('keyword');
            if($id){
                $form = Form::find($id);
            }else{
                $form = '';
            }

			if ($form) {

				$form = [new FormResource($form)];

				return $this->apiResponse($form , '' , 200);
			}else{
				return $this->apiResponse('Not Found' , '' , 406 );
            }

		}

		return $this->apiResponse('Not Found', '', 404);

	}

	// public function search() {
	// 	if (request('type') == 'id_number') {

	// 		$data = Validator::make(request()->all(), [
	// 			'keyword' => ['required'],
	// 				]);

	// 		if ($data->fails()) {
	// 			return $this->apiResponse('', $data->errors(), 200);
	// 		}

	// 		$citizen = Citizen::where('id_number', request('keyword'))->first();

	// 		if ($citizen) {

	// 			$forms = $citizen->forms;
	// 			$forms = FormResource::collection($forms);

	// 			return $this->apiResponse($forms);
	// 		}

	// 	} elseif (request('type') == 'id') {

    //         $contains = Str::contains(request('keyword'), '00970');
    //         if($contains){
    //             $id =  str_replace('00970', '', request('keyword'));
    //             $form = Form::find($id);
    //         }else{
    //             $form = '';
    //         }

	// 		if ($form) {

	// 			$form = [new FormResource($form)];

	// 			return $this->apiResponse($form);
	// 		}

	// 	}

	// 	return $this->apiResponse('Not Found', '', 404);

	// }

	public function store() {
		$data = request()->all();

		$post = Post::create($data);

		$post = new PostResource($post);

		return $this->apiResponse($post);

	}
	public function suggestions($id) {
		if ($id == 0){
			$suggestions = Category::where('citizen_show',1)->where('is_complaint',0)->get(); //غير مستفيدين
			$categosuggestionsries = CategoryResource::collection($suggestions);
		   return $this->apiResponse($suggestions);
	   }

		$id = 1;
	   $suggestions = Category::where('benefic_show',1)->where('is_complaint',0)->get(); //مستفيدين
	   $suggestions = CategoryResource::collection($suggestions);

		return $this->apiResponse($suggestions);

   }



	 public function categories($id) {
	 	if ($id == 0){
	 		$categories = Category::where('citizen_show',1)->where('is_complaint',1)->get(); //غير مستفيدين
	 		$categories = CategoryResource::collection($categories);
			return $this->apiResponse($categories);
		}

	 	$id = 1;
		$categories = Category::where('benefic_show',1)->where('is_complaint',1)->get(); //مستفيدين
		$categories = CategoryResource::collection($categories);

	 	return $this->apiResponse($categories);

	}




	// public function categories() {

	// 	$categories = Category::all();

	// 	$categories = CategoryResource::collection($categories);

	// 	return $this->apiResponse($categories);

	// }

	public function sent_types() {

		$sent_types = Sent_type::all();

		$sent_types = SentTypeResource::collection($sent_types);

		return $this->apiResponse($sent_types);

	}

	public function citizen_search($id_number) {

        $validator = Validator::make(['id_number' => $id_number], [
            'id_number' => ['required', 'digits:9', new IdNumber],
        ]);
        if ($validator->fails()) {
            return $this->apiResponse('', $validator->errors(), 406);
        }

    $citizen = Citizen::where('id_number', $id_number)->with('projects')->first();


		if ($citizen) {
			$citizen = [new CitizenResource($citizen)];

			return $this->apiResponse($citizen , '' , 200);

		}

		return $this->apiResponse([], '', 404);

	}

	public function store_form(Request $request) {

		$data = Validator::make($request->all(), [
			'type' => 'required|integer|max:50',
			'sent_type' => 'required|numeric|digits_between:1,10',
			'project_id' => 'required|numeric|digits_between:1,10',
			'citizen_id' => 'required|numeric|digits_between:1,10',
			'title' => 'required|max:200',
			'category_id' => 'required|numeric|digits_between:1,10',
			'content' => 'required|max:1000',
			'fileinput' => 'max:6400|mimes:jpeg,bmp,png,gif,svg,pdf,docx,xls,xlsx',
			//'account_id' => 'numeric|digits_between:1,10',


		]);

		if ($data->fails()) {
			return $this->apiResponse('', $data->errors(), 200);
		}

		$request['status'] = 1;
		if ($request['type'] == 3) {
			$request['category_id'] = 1;
		}

		if ($request['type'] == 2) {
			$request['category_id'] = 2;
		}

		if (!Citizen::find($request['citizen_id']) || !Project::find($request['project_id'])
			|| $request['type'] < 1 || $request['type'] > 3) {

			return $this->apiResponse([] , 'Success', 400);

		}

        $request['datee'] = Carbon::now();

		$form_id = Form::create($request->all())->id;

        $type="مواطن";
        if (auth()->user()) {
            $request['account_id'] = auth()->user()->account->id;
            $type = "موظف";
        }

        $formx = Form::find($form_id);
        $formx->form_no = $form_id.'_01';
        $formx->save();

        if ($request->hasFile('fileinput')) {
            $myfile = $request->file('fileinput'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/uploads/', $filename); //يخزن الجديد في الموقع المحدد
            Form_file::create(['form_id' => $form_id, 'name' => $filename, 'path' => 'uploads/']);

        }


//
        if(auth()->user()){
            $user_id = auth()->user()->account->id;
        }else{
            $user_id = NULL;
        }

        $form = Form::find($form_id);
        $citizen_msg = Citizen::find($form->citizen_id);

        if (!auth()->user() && $form_id && ($form->sent_type == 6 || $form->sent_type == 1 )){
            $message = new Sms();
            $message->mobile = $citizen_msg->mobile;
            $message->citizen_id = $citizen_msg->id;
            $message->message_type_id = 1;
            $message->user_id = $user_id;
            $message->form_id = $form_id;
            $message->save();
//            if($message->save()){
//                if(MessageType::where('name','رسالة إتمام عملية التسجيل')->first()){
//                    $messageText = MessageType::select('text')->where('id','=',1)->pluck('text')[0];
//                    if (str_contains($messageText, 'xxx')) {
//                        $citizen = Citizen::select('first_name', 'father_name', 'grandfather_name', 'last_name')->where('id', '=',  $citizen_msg->id)->first();
//                        $messageText_new = str_replace( 'xxx',$citizen->full_name, $messageText);
//                    }else{
//                        $messageText_new = $messageText;
//                    }
//
//                    $curl = curl_init();
//                    curl_setopt_array($curl, array(
//                        CURLOPT_URL => "https://hotsms.ps/sendbulksms.php?user_name=MAAN-FCS&user_pass=7110874&sender=MAAN-FCS&mobile=$citizen_msg->mobile&type=0&text=".urlencode($messageText_new),
//                        CURLOPT_RETURNTRANSFER => true,
//                        CURLOPT_CUSTOMREQUEST => "GET",
//                        CURLOPT_HTTPHEADER => array(
//                            "Content-Type:application/json",
//                            "Accept:application/json",
//                        ),
//                    ));
//
//                    $response = curl_exec($curl);
//                    curl_close($curl);
//
//                    if ($response == 1001){
//                        $message->send_status = 'تم الإرسال';
//                        $message->save();
//                    }else{
//                        $message->send_status = 'قيد الإرسال';
//                        $message->save();
//                    }
//
//                }
//            }
        }

        $theform = Form::find($form_id);

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id' ,'=', $theform->category->id)
            ->get();



        $userinprojects = AccountProjects::select('rate','account_id')->where('project_id','=',$theform->project_id)
            ->pluck('rate','account_id')->toArray();


        foreach ($categoryCircles as $categoryCircle){
            if($categoryCircle->procedure_type == 2){
                array_push($categoryCircles_users1,$categoryCircle->circle_id);
            }
        }

        foreach ($userinprojects as $key=>$userinproject){
            if(in_array($userinproject,$categoryCircles_users1)){
                array_push($auth_circle_users,$key);
            }

        }



        foreach($auth_circle_users as $AccountProjects_user){
            $user = Account::find($AccountProjects_user);
            NotificationController::insert(['receiver_id' => 1,'user_id' => $user->user_id, 'type' => $type,'form_id' => $theform->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة لمعالجة', 'link' => "/citizen/form/show/" . Form::find($form_id)->citizen->id_number . "/$form_id"]);
        }
//
		$form_id= $theform->id;
        $id_number =$theform->citizen->id_number;
		$citizen_msg= $theform->category->citizen_msg;
		$wait = $theform->category->citizen_wait;
		$all = [
			'id' => $form_id,
			'id_number' => $id_number,
			'citizen_msg' => $citizen_msg,
			'time' => $wait . ''
		];
        return $this->apiResponse([$all], 'Success', 200);
	}

	public function update_mobile($id) {

		$data = Validator::make(request()->all(), [
			'mobile' => 'required|max:20',
			'mobile2' => 'max:20',
            'first_name' => 'required|max:50',
            'father_name' => 'required|max:50',
            'grandfather_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'id_number' => [new IdNumber()],
            'governorate' => 'required|max:50',
            'city' => 'required|max:50',
            'street' => 'required',
		]);


		if ($data->fails()) {
			return $this->apiResponse([], $data->errors(), 404);
		}

		$citizen = Citizen::find($id);

		$citizen->update(['mobile' => request('mobile')]);
		$citizen->update(['mobile2' => request('mobile2')]);
		$citizen->update(['first_name' => request('first_name')]);
		$citizen->update(['father_name' => request('father_name')]);
		$citizen->update(['grandfather_name' => request('grandfather_name')]);
		$citizen->update(['last_name' => request('last_name')]);
		$citizen->update(['governorate' => request('governorate')]);
		$citizen->update(['city' => request('city')]);
		$citizen->update(['street' => request('street')]);


		if ($citizen->has('projects')){
		    foreach ($citizen->projects as $project){
		        $project_id[] = $project->id;
		        $project_name[] = $project->name;
            }


        $project_id = [];
        $project_name = [];
        if ($citizen->projects->count() > 0){
            foreach ($citizen->projects as $project){
                $project_id[] = $project->id;
                $project_name[] = $project->name;
            }
        }

		// return $this->apiResponse([$citizen , $project_id , $project_name], 'Success', 200);
		return $this->apiResponse([$citizen] , 'Success', 200);
	}


	}}
