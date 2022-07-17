<?php

namespace App\Http\Controllers\Citizen;

use App\Account;
use App\AccountProjects;
use App\Category;

use App\CategoryCircles;
use App\Citizen;
use App\Company;
use App\Form;
use App\Form_file;
use App\Form_follow;
use App\Form_status;
use App\Form_type;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormsRequest;
use App\MessageType;
use App\Notification;
use App\Project;
use App\Recommendation;
use App\Rules\IdNumber;
use App\Sent_type;
use App\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Session;
use Illuminate\Support\Str;
use Validator;

class FormController extends Controller
{
    public function show($ido, $id)
    {

        $item = Form::find($id);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }

        $arr1 = $arr2 = array();
        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)->get();
        $userinprojects = AccountProjects::where('project_id', '=', $item->project_id)->get();


        foreach ($categoryCircles as $categoryCircle) {
            array_push($arr1, ['procedure_type' => $categoryCircle->procedure_type, 'circle' => $categoryCircle->circle_id]);
        }

        foreach ($userinprojects as $userinproject) {
            array_push($arr2, ['account_id' => $userinproject->account_id, 'circle' => $userinproject->rate]);
        }

        $auth_circle_users = array();
        for ($i = 0; $i < count($arr2); $i++) {
            for ($j = 0; $j < count($arr1); $j++) {
                if ($arr2[$i]['circle'] == $arr1[$j]['circle']) {
                    $auth_circle_users[$arr2[$i]['account_id']][] = $arr1[$j]['procedure_type'];
                }
            }
        }

        if (auth()->user()) {
            $item->read = 1;
            $item->save();
            if ($item->hide_data == 2){
                Notification::where('link', "/citizen/form/show/0" . "/$item->id")->where('user_id', auth()->user()->id)->update(['read_at' => date('Y-m-d h:m:s')]);

            }else{
                Notification::where('link', "/citizen/form/show/" . $item->citizen->id_number . "/$item->id")->where('user_id', auth()->user()->id)->update(['read_at' => date('Y-m-d h:m:s')]);

            }
        }
        if (request()['theaction'] == 'print') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;

            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));

            return $pdf->stream('' . $item->name . 'form.pdf');

        } elseif (request()['theaction'] == 'print2') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;

            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));

            return $pdf->stream('' . $item->name . 'form.pdf');

        } else {

            if (auth()->user()) {
                $categories = auth()->user()->account->circle->category->all();
            } else {
                $categories = Category::all();
            }

            $itemco = \App\Company::all()->first();
            $form_type = Form_type::all();
            $type = $item->type;
            $recomendations = Recommendation::where('form_id', '=', $item->id)->get();
            if($item->hide_data == 2){
                return view("citizen.form-show", compact('item', 'categories', 'itemco', 'form_type', 'type', 'auth_circle_users', 'recomendations'));

            }else{
                if ($item->citizen->id_number == $ido) {
                    return view("citizen.form-show", compact('item', 'categories', 'itemco', 'form_type', 'type', 'auth_circle_users', 'recomendations'));
                }
            }
            return view("citizen.noaccses", compact('item', 'itemco', 'form_type', 'type'));


        }

    }

    public function follow_form($id)
    {
        $item = Form::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }
        $categories = Category::all();
        $itemco = \App\Company::all()->first();
        $form_type = Form_type::all();
        $type = $item->type;
        $recomendations = Recommendation::where('form_id', '=', $item->id)->get();
        return view("citizen.follow_form", compact('item', 'categories', 'itemco', 'form_type', 'type', 'recomendations'));
    }

    public function reprocessing_show($ido, $id)
    {

        $item = Form::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }


        $arr1 = $arr2 = array();
        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)->get();
        $userinprojects = AccountProjects::where('project_id', '=', $item->project_id)->get();


        foreach ($categoryCircles as $categoryCircle) {
            array_push($arr1, ['procedure_type' => $categoryCircle->procedure_type, 'circle' => $categoryCircle->circle_id]);
        }

        foreach ($userinprojects as $userinproject) {
            array_push($arr2, ['account_id' => $userinproject->account_id, 'circle' => $userinproject->rate]);
        }

        $auth_circle_users = array();
        for ($i = 0; $i < count($arr2); $i++) {
            for ($j = 0; $j < count($arr1); $j++) {
                if ($arr2[$i]['circle'] == $arr1[$j]['circle']) {
                    $auth_circle_users[$arr2[$i]['account_id']][] = $arr1[$j]['procedure_type'];
                }
            }
        }
        if (auth()->user()) {
            $item->read = 1;
            $item->save();
            Notification::where('link', "/citizen/form/reprocessing_show/" . $item->citizen->id_number . "/$item->id")->where('user_id', auth()->user()->id)->update(['read_at' => date('Y-m-d h:m:s')]);
        }
        if (request()['theaction'] == 'print') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;

            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));

            return $pdf->stream('' . $item->name . 'form.pdf');

        } else {

            if (auth()->user()) {
                $categories = auth()->user()->account->circle->category->all();
            } else {
                $categories = Category::all();
            }

            $itemco = \App\Company::all()->first();
            $form_type = Form_type::all();
            $type = $item->type;
            $recomendations = Recommendation::where('form_id', '=', $item->id)->get();
            if ($item->citizen->id_number == $ido) {
                return view("citizen.reprocessing-form-show", compact('item', 'categories', 'itemco', 'form_type', 'type', 'auth_circle_users', 'recomendations'));
            } else {
                return view("citizen.noaccses", compact('item', 'itemco', 'form_type', 'type'));
            }

        }

    }

    public function save_form_followup($id, Request $request)
    {
        $item = Form::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }

        if ($request['theaction'] == 'print') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;
            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));
            return $pdf->stream('' . $item->name . 'form.pdf');
        } elseif ($request['theaction'] == 'save') {
            if ($request['optradio'] == 1) {
//                print_r('test');exit();
            }

        } else {

            if (auth()->user()) {
                $categories = auth()->user()->account->circle->category->all();
            } else {
                $categories = Category::all();
            }

            $itemco = \App\Company::all()->first();
            $form_type = Form_type::all();
            $type = $item->type;
            if ($item->citizen->id_number == $ido) {
                return view("citizen.form-show", compact('item', 'categories', 'itemco', 'form_type', 'type'));
            } else {
                return view("citizen.noaccses", compact('item', 'itemco', 'form_type', 'type'));
            }

        }

    }

    public function show1($ido, $id)
    {

        $item = Form::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }

        $arr1 = $arr2 = array();
        $categoryCircles = CategoryCircles::where('category', '=', $item->category->id)->get();
        $userinprojects = AccountProjects::where('project_id', '=', $item->project_id)->get();

        foreach ($categoryCircles as $categoryCircle) {
            array_push($arr1, ['procedure_type' => $categoryCircle->procedure_type, 'circle' => $categoryCircle->circle]);
        }

        foreach ($userinprojects as $userinproject) {
            array_push($arr2, ['account_id' => $userinproject->account_id, 'circle' => $userinproject->rate]);
        }

        $auth_circle_users = array();
        for ($i = 0; $i < count($arr2); $i++) {
            for ($j = 0; $j < count($arr1); $j++) {
                if ($arr2[$i]['circle'] == $arr1[$j]['circle']) {
                    $auth_circle_users[$arr2[$i]['account_id']][] = $arr1[$j]['procedure_type'];
                }
            }
        }

        if (auth()->user()) {
            $item->read = 1;
            $item->save();
            Notification::where('link', "/citizen/form/show/" . $item->citizen->id_number . "/$item->id")->where('user_id', auth()->user()->id)->update(['read_at' => date('Y-m-d h:m:s')]);
        }
        if (request()['theaction'] == 'print') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;

            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));

            return $pdf->stream('' . $item->name . 'form.pdf');

        } elseif (request()['theaction'] == 'print2') {
            $responses = Form::find($id)->form_response;
            $follows = Form::find($id)->form_follow;

            $pdf = PDF::loadView('account.form.printshow2', compact('item', 'responses', 'follows'));

            return $pdf->stream('' . $item->name . 'form.pdf');

        } else {

            if (auth()->user()) {
                $categories = auth()->user()->account->circle->category->all();
            } else {
                $categories = Category::all();
            }

            $itemco = \App\Company::all()->first();
            $form_type = Form_type::all();
            $type = $item->type;
            $recomendations = Recommendation::where('form_id', '=', $item->id)->get();
            if ($item->citizen->id_number == $ido) {
                return view("citizen.form-show1", compact('item', 'categories', 'itemco', 'form_type', 'type', 'auth_circle_users', 'recomendations'));
            } else {
                return view("citizen.noaccses", compact('item', 'itemco', 'form_type', 'type'));
            }

        }

    }

    //اضافة متابعة لمن ما يكون لشكوى ردود
    public function addform($type, $citzen_id, $project_id)
    {
        $itemco = \App\Company::all()->first();
        $citizen = Citizen::where('id_number', '=', $citzen_id)->first();

        if ($citizen) {
            $project = $citizen->projects->find($project_id);
            $citzen_id = $citizen->id;
        } else {
            $project = null;
        }

        if ($citizen) {
            $citizen_name = $citizen->first_name . " " . $citizen->last_name;
        } else {
            $citizen_name = "";
        }

        if ($project) {
            $project_name = $project->name;
        } else {
            $project = Project::find(1);
            $project_name = $project->name;
            $project_id = $project->id;
        }


        if (!auth()->user()) {
            $category = \App\Category::get();
        } else {
            $category = \App\Category::whereIn('categories.id', \App\Account::find(auth()->user()->account->id)->circle->category()
                ->with('category_circles')->pluck('categories.id'))->get();
        }


        if ($type > 2 && $project_id == 1) {
            return view('welcome', compact('itemco'));
        }

        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::where('id', '!=', 1)->get();

        return view("citizen.addform", compact('itemco', 'form_type', "form_status", "sent_typee", 'type', 'category', 'citzen_id', 'project_id', 'citizen_name', 'project_name'));
    }

    public function delayform($id)
    {
        $form = Form::find($id);
        if ($form == NULL) {
            return redirect("/");
        }
        $form->fill(['status' => '4']);
        $form->save();
        session::flash('msg', 's:تم إرسال تذكير للموظف المختص');

        $theform = $form;
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories->where('to_notify', 1)
                ->pluck('circle_id')->toArray())->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects->where('to_notify', 1)
                ->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');


            $type = "مواطن";
            if (auth()->user()) {
                $request['account_id'] = auth()->user()->account->id;
                $type = "موظف";
            }
            for ($i = 0; $i < count($users_ids); $i++) {


//						User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id) ;
                if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                    NotificationController::insert(['receiver_id' => 1, 'user_id' => $users_ids[$i], 'type' => $type, 'form_id' => $theform->id, 'title' => 'تذكير نموذج عالق للتأخير', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);

            }
        }
        return redirect('/citizen/form/show/' . $form->citizen->id_number . '/' . $id);
    }

    public function formstore(FormsRequest $request)
    {
        $testeroor = $this->validate($request, [
            'fileinput' => 'max:6400|mimes:jpeg,bmp,png,gif,svg,pdf,docx,xls,xlsx',
        ]);

        $request['status'] = 1;
        if ($request['type'] == 3) {
            $request['category_id'] = 1;
        }

        if ($request['type'] == 2) {
            $request['category_id'] = 2;
        }
        $citizen = Citizen::find($request['citizen_id']);
        if (!$citizen && $request['hide_data'] != 2) {
            $citizen = Citizen::where('id_number', '=', $request['citizen_id'])->first();
            $request['citizen_id'] = $citizen->id;
        }

        if ($request['hide_data'] != 2) {
            if (!$citizen || !Project::find($request['project_id'])
                || $request['type'] < 1 || $request['type'] > 3) {
                Session::flash("msg", "e:يرجى أدخال رابط صحيح لرقم المواطن والمشروع");
                return redirect('citizen/editorcreatcitizen?project_id=' . $request['project_id'] . '&id_number=' . $request['id_number'] . '&citizen_id=' . $request['citizen_id'] . '&type=' . $request['type'])->withInput();
            }
        }

        $type = "مواطن";
        if (auth()->user()) {
            $request['account_id'] = auth()->user()->account->id;
            $type = "موظف";
        }

        $form_id = Form::create($request->all())->id;
        $formx = Form::find($form_id);
        $formx->form_no = $form_id . '_01';
        $formx->save();

        if ($request->hasFile('fileinput')) {
            $myfile = $request->file('fileinput'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/uploads/', $filename); //يخزن الجديد في الموقع المحدد
            Form_file::create(['form_id' => $form_id, 'name' => $filename, 'path' => 'uploads/']);

        }

        if (auth()->user()) {
            $user_id = auth()->user()->account->id;
        } else {
            $user_id = NULL;
        }

        $form = Form::find($form_id);
        $citizen_msg = Citizen::find($form->citizen_id);

//        if (!auth()->user() && $form_id && ($form->sent_type == 6 || $form->sent_type == 1 )){
//            $message = new Sms();
//            $message->mobile = $citizen_msg->mobile;
//            $message->citizen_id = $citizen_msg->id;
//            $message->message_type_id = 1;
//            $message->user_id = $user_id;
//            $message->form_id = $form_id;
//            $message->save();
////            if($message->save()){
////                if(MessageType::where('name','رسالة إتمام عملية التسجيل')->first()){
////                    $messageText = MessageType::select('text')->where('id','=',1)->pluck('text')[0];
////                    if (str_contains($messageText, 'xxx')) {
////                        $citizen = Citizen::select('first_name', 'father_name', 'grandfather_name', 'last_name')->where('id', '=',  $citizen_msg->id)->first();
////                        $messageText_new = str_replace( 'xxx',$citizen->full_name, $messageText);
////                    }else{
////                        $messageText_new = $messageText;
////                    }
////
////                    $curl = curl_init();
////                    curl_setopt_array($curl, array(
////                        CURLOPT_URL => "https://hotsms.ps/sendbulksms.php?user_name=MAAN-FCS&user_pass=7110874&sender=MAAN-FCS&mobile=$citizen_msg->mobile&type=0&text=".urlencode($messageText_new),
////                        CURLOPT_RETURNTRANSFER => true,
////                        CURLOPT_CUSTOMREQUEST => "GET",
////                        CURLOPT_HTTPHEADER => array(
////                            "Content-Type:application/json",
////                            "Accept:application/json",
////                        ),
////                    ));
////
////                    $response = curl_exec($curl);
////                    curl_close($curl);
////
////                    if ($response == 1001){
////                        $message->send_status = 'تم الإرسال';
////                        $message->save();
////                    }else{
////                        $message->send_status = 'قيد الإرسال';
////                        $message->save();
////                    }
////
////                }
////            }
//        }

        $theform = Form::find($form_id);


        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $theform->category->id)
            ->get();


        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $theform->project_id)
            ->pluck('rate', 'account_id')->toArray();


        foreach ($categoryCircles as $categoryCircle) {
            if ($categoryCircle->procedure_type == 2) {
                array_push($categoryCircles_users1, $categoryCircle->circle_id);
            }
        }

        foreach ($userinprojects as $key => $userinproject) {
            if (in_array($userinproject, $categoryCircles_users1)) {
                array_push($auth_circle_users, $key);
            }

        }


        foreach ($auth_circle_users as $AccountProjects_user) {
            $user = Account::find($AccountProjects_user);


            if ($theform->hide_data == 2) {
                $id_number_x = 0;
            } else {
                $id_number_x = Form::find($form_id)->citizen->id_number;
            }
            NotificationController::insert(['receiver_id' => 1, 'user_id' => $user->user_id, 'type' => $type, 'form_id' => $theform->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة لمعالجة', 'link' => "/citizen/form/show/" . $id_number_x . "/$form_id"]);
        }

        return redirect('form/confirm/' . $form_id);
    }

    public function saverecommendations(Request $request)
    {
        if (!auth()->user()) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        } else {
            $validator = Validator::make($request->all(), [
                'recommendations_content' => 'required',
            ], [
                'recommendations_content.required' => 'التوصيات غير مدخلة، يرجى إدخال التوصيات بالشكل الصحيح',
            ]);

            $form = Form::find($request['form_id']);
            if ($form) {
                $citizen_ido = Citizen::find($form->citizen_id)->id_number;
            }
            if ($validator->fails()) {
                return Redirect::to('/citizen/form/show/' . $citizen_ido . '/' . $form->id)->withInput()->withErrors($validator);
            }

            Recommendation::create($request->all());

            session::flash('msg', 'تم إضافة توصيتك بنجاح ');
            $theform = Form::find($request['form_id']);

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $theform->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $theform->project_id)
                ->pluck('rate', 'account_id')->toArray();

            foreach ($categoryCircles as $categoryCircle) {
                if ($categoryCircle->procedure_type == 5) {
                    array_push($categoryCircles_users1, $categoryCircle->circle_id);
                }
            }

            foreach ($userinprojects as $key => $userinproject) {
                if (in_array($userinproject, $categoryCircles_users1)) {
                    array_push($auth_circle_users, $key);
                }

            }

            $type = "مواطن";
            if (auth()->user()) {
                $type = "موظف";
            }
            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => 1, 'user_id' => $user->user_id, 'type' => $type, 'form_id' => $theform->id, 'title' => 'لديك توصية جديدة', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);
            }

            return redirect('/citizen/form/show/' . $citizen_ido . '/' . $form->id);
        }

    }

    public function confirmform($id)
    {
        $form = Form::find($id);
//		dd($form);
        if ($form == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect('/noaccses');
        }
        $itemco = \App\Company::all()->first();
        $form_type = Form_type::all();
        $item = Form::find($id);
        $type = $form->type;

        if (request()['theaction'] == 'print3') {

            $pdf = PDF::loadView('account.form.printshow3', compact('item', 'form_type', 'type'));
            return $pdf->stream('' . $item->name . 'form.pdf');

        }

        return view("citizen.confirmsend", compact('itemco', 'form', 'form_type', 'type', 'item'));
    }


    /***************************************************/

    public function searchbyidnumorform()
    {
        $itemco = \App\Company::all()->first();
        return view("citizen.search", compact('itemco'));
    }

    public function getforms(Request $request)
    {

        $type = $request['type'];
        $id = $request['id'];
        $sample = $request['sample'];

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'id' => ['required_if:type,=,2'],
            'sample' => 'required_if:type,=,1'
        ], [
            'type.required' => 'طريقة البحث غير محددة، يرجى تحديدها بالشكل الصحيح',
            'id.required_if' => 'رقم الهوية غير مدخل، يرجى إدخال الرقم بالشكل الصحيح.',
            'sample.required_if' => 'الرقم المرجعي غير مدخل، يرجى إدخال الرقم بالشكل الصحيح.',
        ]);

        if ($validator->fails()) {
            return Redirect::to('/citizen/form/search')->withInput()->withErrors($validator);
        }


        if ($type && $type == 2 && !empty($id)) {
            $id_number = $this->validate($request, [
                'id' => ['numeric', new IdNumber],

            ]);
            if ($id_number) {
                $citezens = Citizen::where('id_number', '=', $id);
                if ($citezens) {
                    $citezen = $citezens->first();
                    if ($citezen) {
                        $forms = $citezen->forms()->orderBy('id', 'desc')->get();
                    } else {
                        $forms = null;
                    }

                } else {
                    $forms = null;
                }
            }
        } else if ($type && $type == 1 && !empty($sample)) {
            $forms = '';
//            $contains = Str::contains($sample, '00970');
//            if($contains){
//                $sample = str_replace('00970', ' ', $sample);
//                $forms = Form::where('id', '=', $sample)->get();
//            }

            $forms = Form::where('id', '=', $sample)->get();

//
        }
        $itemco = \App\Company::all()->first();
        $form_type = Form_type::all();
        return view("citizen.showforms", compact('itemco', 'forms', 'form_type'));
    }

    /*************************************************************/
    public function addfollow(Request $request)
    {
        $testeroor = $this->validate($request, [
            'fileinput' => 'max:2400|mimes:jpeg,bmp,png,gif,svg,pdf,docx,xls,xlsx',
            'notes' => 'max:300',
        ]);
        $testeroor = $this->validate($request, [
            'notes' => 'required',
            'citizen_id' => 'required',

        ]);

        $request['datee'] = date('Y-m-d');
        Form_follow::create($request->all());
        //اضافة ملف
        $form_id = $request['form_id'];

        if ($request->hasFile('fileinput')) {
            $myfile = $request->file('fileinput'); // جلد الجديد من الانبوت فورم
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension(); // جلب اسمه
            $myfile->move(public_path() . '/uploads/', $filename); //يخزن الجديد في الموقع المحدد
            Form_file::create(['form_id' => $form_id, 'name' => $filename, 'path' => 'uploads/']);

        }

        $citizen_ido = Citizen::find($request['citizen_id'])->id_number;

        $theform = Form::find($form_id);
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories->where('to_notify', 1)
                ->pluck('circle_id')->toArray())->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects->where('to_notify', 1)
                ->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');
            $circle_ids = Account::find($users_ids)->pluck('circle_id');

            for ($i = 0; $i < count($users_ids); $i++) {
                if ($circle_ids[$i] == 2) {
//					User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id);
                    if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                        NotificationController::insert(['receiver_id' => 1, 'user_id' => $users_ids[$i], 'type' => $type, 'form_id' => $theform->id, 'title' => 'تم اضافة متابعة على نموذج', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);
                }

            }
        }

        return redirect('/citizen/form/show/' . $citizen_ido . '/' . $request['form_id']);
    }

    public function addevaluate(Request $request)
    {
        $myvalid = [
            'solve' => 'required',
            'citizen_id' => 'required',
            'fileinput' => 'max:2400|mimes:jpeg,bmp,png,gif,svg,pdf,docx,xls,xlsx',
        ];
        if ($request->has('solve')) {
            if ($request['solve'] == "1") {
                $myvalid['evaluate'] = 'required';
            }

        }

        $request['datee'] = date('Y-m-d');
        $testeroor = $this->validate($request, $myvalid);
        $citizen_ido = Citizen::find($request['citizen_id'])->id_number;

        Form_follow::create($request->all());

        $theform = Form::find($request['form_id']);
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories->where('to_notify', 1)
                ->pluck('circle_id')->toArray())->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects->where('to_notify', 1)
                ->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');
            $circle_ids = Account::find($users_ids)->pluck('circle_id');
            for ($i = 0; $i < count($users_ids); $i++) {

                if ($circle_ids[$i] == 4) {
//				User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id);
                    if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                        NotificationController::insert(['receiver_id' => 1, 'user_id' => $users_ids[$i], 'type' => $type, 'form_id' => $theform->id, 'title' => 'تم اضافة تقييم لنموذج', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);
                }

            }
        }

        return redirect('/citizen/form/show/' . $citizen_ido . '/' . $request['form_id']);
    }

    public function showfiles($id)
    {

        $item = Form::find($id);
        if ($item)
            $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

        return view("citizen.itemsfiles", compact('form_files', 'item'));

    }


}
