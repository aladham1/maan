<?php

namespace App\Http\Controllers\Account;
;

use App\Account;
use App\Account_rate;
use App\AccountProjects;
use App\Category;
use App\Circle;
use App\Citizen;
use App\CitizenProjects;
use App\Form;
use App\Form_follow;
use App\Form_response;
use App\Form_status;
use App\Form_type;
use App\Http\Requests\ProjectRequest;
use App\Imports\CitizenExport;
use App\Imports\CitizenImport;
use App\Imports\FormsExport;
use App\Imports\ProjectExport;
use App\Project;
use App\Project_status;
use App\Sent_type;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Session;
use Validator;

//


class ProjectController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function active($id)
    {
        //

        $item = Project::find($id);
        if ($item == NULL ||
            check_permission('تعديل مشروع')
//            !(Auth::user()->account->links
//                ->contains(\App\Link::where('title', '=', 'تعديل مشروع')
//                    ->first()->id))
        ) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/citizen");
        }
        if ($item->active == 1) {
            $item->active = 2;
            $item->save();
        } elseif ($item->active == 2) {
            $item->active = 1;
            $item->save();
        }

    }

    public function index(Request $request)
    {
        Project::where('end_date', '<=', Carbon::now())->update(['active' => '2']);
        $q = $request["q"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $active = $request["active"] ?? "";
        if (auth()->user()->account->id == 1) {

            $items = Project::join('project_status', 'projects.active', '=', 'project_status.id')
                ->select('projects.id',
                    'projects.code',
                    'projects.name',
                    'projects.coordinator',//منسق المشروع
                    'projects.supervisor', //سابقا المشرف , الان قسم المتابعة
                    'projects.manager',   // مدير البرنامج
                    'project_status.name as names',
                    'projects.start_date', 'projects.end_date')
                ->whereRaw("true");

        }
        else {
            $items = Account::find(auth()->user()->account->id)->projects()->join('project_status', 'projects.active', '=', 'project_status.id')
                ->select('projects.id',
                    'projects.code',
                    'projects.name',
                    'projects.coordinator',//منسق المشروع
                    'projects.supervisor', //سابقا المشرف , الان قسم المتابعة
                    'projects.manager',   // مدير البرنامج
                    'project_status.name as names',
                    'projects.start_date', 'projects.end_date')
                ->whereRaw("true");
        }

        if ($q)
            $items->whereRaw("(projects.name like ? or code like ? or manager like ? or supervisor like ? or coordinator like ?)"
                , ["%$q%", "%$q%", "%$q%", "%$q%", "%$q%"]);
        if ($active != "")
            $items->whereRaw("active = ?", [$active]);

        if (($end_date) && ($start_date)) {
            $items = $items->whereRaw("end_date <= ? and start_date >= ?", [$end_date, $start_date]);
        } else {
            if ($start_date)
                $items = $items->whereRaw("start_date = ?", [$start_date]);

            if ($end_date)
                $items = $items->whereRaw("end_date = ?", [$end_date]);
        }
        if ($in_date)
            $items = $items->whereRaw("end_date >= ? and start_date <= ?", [$in_date, $in_date]);


        $items = $items->where(function ($query) {


        })->where(function ($query) {

            return $query->when(request('active'), function ($query) {

                return $query->where('active', request('active'));

            });

        })->where(function ($query) {

            return $query->when(request('project_name'), function ($query) {
//                    return $query->where('projects.name' , request('project_name'));
                return $query->where("projects.name", "like", "%" . request('project_name') . "%");

            });

        })->where(function ($query) {

            return $query->when(request('code'), function ($query) {

//                    return $query->where('projects.code' , request('code'));
                return $query->where("projects.code", "like", "%" . request('code') . "%");


            });

        })->where(function ($query) {

            return $query->when(request('manager'), function ($query) {

//                    return $query->where('projects.manager' , request('manager'));
                return $query->where("projects.manager", "like", "%" . request('manager') . "%");


            });


        })->where(function ($query) {

            return $query->when(request('coordinator'), function ($query) {

                return $query->where('projects.coordinator', request('coordinator'));

            });

        })->where(function ($query) {

            return $query->when(request('support'), function ($query) {

                return $query->where('projects.support', request('support'));

            });


        })->where(function ($query) {

            return $query->when(request('start_date'), function ($query) {

                return $query->whereDate('projects.start_date', request('start_date'));

            });
        })->where(function ($query) {

            return $query->when(request('end_date'), function ($query) {

                return $query->whereDate('projects.end_date', request('end_date'));

            });

        })->get();

        $project_status = Project_status::all();
        $projects = Project::all();
        $accounts = Account::all();

        if ($request['theaction'] == 'excel') {
            $items = Project::whereIn('id', $items->pluck('id'))->orderBy("projects.id", 'desc')->get();
            return Excel::download(new ProjectExport($items), "Annex Template 06-" . date('dmY') . ".xlsx");
        } elseif ($request['theaction'] == 'print') {
            $items = $items->orderBy("id", 'desc')->get();
            $pdf = PDF::loadView('account.project.printall', compact('items'));
            return $pdf->stream('document.pdf');
        } else {
            if ($request['theaction'] == 'search') {
                $items = Project::whereIn('id', $items->pluck('id'))->orderBy("projects.id", 'asc')->paginate(5);
                $items->appends([
                    'code' => request('code'),
                    'theaction' => 'search',
                    'coordinator' => request('coordinator'),
                    'project_name' => request('project_name'),
                    'manager' => request('manager'),
                    'support' => request('support'),
                    'active' => $active,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                ]);
            } else {
                $items = "";
            }

            return view("account.project.index", compact('items', 'project_status', 'accounts', 'projects'));
        }

    }

    public function create()
    {
        $project_status = Project_status::all();
        return view("account.project.create", compact('project_status'));
    }

    public function store(ProjectRequest $request)
    {
        $isExists = Project::where("code", $request["code"])->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقاً");
            return redirect("/account/project/create")->withInput();
        }
        /* $isExists = Project::where("name",$request["name"])->count();
         if($isExists)
         {
             Session::flash("msg","e:اسم المؤسسة المدخل موجود مسبقاً");
             return redirect("/account/project/create")->withInput();
         }*/
        $request['manager'] = "";
        $request['coordinator'] = "";
        $request['supervisor'] = "";
        $request['support'] = "";
        $pro_id = Project::create($request->all())->id;
        /**/
        $accouts_ids = Account::where('type', "=", '1')->pluck('id')->toArray();
        for ($i = 0; $i < count($accouts_ids); $i++) {
            $rateforaccount = Account::find($accouts_ids[$i]);
            $test = \DB::table("account_project")->insertGetID(["account_id" => $accouts_ids[$i],
                "project_id" => $pro_id,
                "rate" => $rateforaccount->circle_id]);
        }

        /**/
        Project::where('end_date', '<=', Carbon::now())->update(['active' => '2']);

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/account/project/stuffinproject/$pro_id");
        //return redirect("/account/project/create");
    }

    public function show($id)
    {

        if (request()['theaction'] == 'print') {
            $item = Account::find(auth()->user()->account->id)->projects()->find($id);
            if ($item == NULL) {
                Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/project");
            }
            $accounts = Project::find($id)->accounts;
            $collection = Project::find($id)->forms->where('type', "=", "1");
            $collection2 = Project::find($id)->account_projects->whereIn("rate", [5, 6])->pluck("id");
            $just_stuff_ids = AccountProjects::with('account')->find($collection2)->pluck('account.id');
            $just_stuff = Account::find($just_stuff_ids);
            $forms = collect();
            foreach ($collection as $form) {
                $forms->push($form);
            }

            $pdf = PDF::loadView('account.project.printshow', compact('item', 'accounts', 'forms', 'just_stuff'));
            return $pdf->stream('document.pdf');
        } else {
            $item = Account::find(auth()->user()->account->id)->projects()->find($id);
            if ($item == NULL) {
                Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
                return redirect("/account/project");
            }
            $accounts = Project::find($id)->accounts;
            $forms = Project::find($id)->forms->where('type', '=', '1');
            return view('account.project.show', compact('item', 'accounts', 'forms'));
        }


        //
    }

    public function update(ProjectRequest $request, $id)
    {
        $isExists = Project::where("code", $request["code"])->where("id", "!=", $id)->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقاً");
            return redirect("/account/project/$id/edit");
        }
        $item = Account::find(auth()->user()->account->id)->projects()->find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        $item->update($request->all());
        Project::where('end_date', '<=', Carbon::now())->update(['active' => '2']);

        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/project/$id/edit");
    }

    public function edit($id)
    {
        $project_status = Project_status::all();
        if (auth()->user()->account->id == 1) {
            $item = Project::find($id);
        } else {
            $item = Account::find(auth()->user()->account->id)->projects()->find($id);
        }

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        return view("account.project.edit", compact("item", "project_status"));
    }

    public function destroy($id)
    {
        $item = Account::find(auth()->user()->account->id)->projects()->find($id);
        if ($item == NULL || $item->id == 1) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        if (count($item->Accounts->toArray()) > 1 || $item->citizens->toArray() != null || $item->forms->toArray() != null) {
            Session::flash("msg", "e:لا يمكن حذف مشروع مرتبط بمواطنين أو موظفين أو نماذج");
            return redirect("/account/project");
        } else {
            $item = Project::find($id);
            if ($item->forms->first()) {
                $forms = $item->forms->pluck('id');
                $formresp = Form_response::whereIn('form_id', $forms)->pluck('id');
                $formfoll = Form_follow::whereIn('form_id', $forms)->pluck('id');
                if (count($formfoll) > 0)
                    Form_follow::destroy($formfoll);
                if (count($formresp) > 0)
                    Form_response::destroy($formresp);
                Form::destroy($forms);

            }
            $item->delete();
            Session::flash("msg", "تم حذف مشروع بنجاح");
            return redirect("/account/project");
        }


    }

    public function import($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_file' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            if ($request->file('data_file')->isValid()) {


                try {

                    $collection = Excel::toArray(new CitizenImport, request()->file('data_file'));

                    $collection = array_collapse($collection);

                    foreach ($collection as $row) {

                        if (!$row['alasm_alaol']) {
                            return redirect("/account/citizen/create");
                        }

                        $citizen = Citizen::create([
                            'first_name' => $row['alasm_alaol'],
                            'email' => $row['albryd'],
                            'father_name' => $row['asm_alab'],
                            'last_name' => $row['asm_alaaael'],
                            'grandfather_name' => $row['asm_aljd'],
                            'id_number' => $row['rkm_alhoy'],
                            'governorate' => $row['almhafth'],
                            'city' => $row['almntk'],
                            'street' => $row['alaanoan'],
                            'mobile' => $row['rkm_altoasl_1'],
                            'mobile2' => $row['rkm_altoasl_2'],
                        ]);


                        if (request('project_id')) {
                            $CitizenProjects = CitizenProjects::create([
                                'citizen_id' => $citizen->id,
                                'project_id' => $request->project_id

                            ]);

                        }


                    }

                    \Session::flash('success', 'تم الرفع بنجاح');
                    return redirect("/account/project/citizeninproject/" . $id . "");

                } catch (\Exception $e) {
                    \Session::flash('error', $e->getMessage());
                }

            } else {
                Session::flash("msg", "e:لم يتم رفع أي ملف");
                return redirect("/account/project/citizeninproject/" . $id . "");
            }


        }
    }


    public function citizeninproject($id, Request $request)
    {

        if (auth()->user()->account->id == 1) {
            $item = Project::find($id);
        } else {
            $item = Account::find(auth()->user()->account->id)->projects()->find($id);
        }
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        $id_number = $request["id_number"] ?? "";
        $idx = $request["project_request"] ?? "";
        $first_name = $request["first_name"] ?? "";
        $governorate = $request["governorate"] ?? "";

        $citizen_ids = CitizenProjects::where('project_id', $id)->pluck('citizen_id');

        $items = Citizen::whereIn('citizens.id', $citizen_ids)
            ->leftjoin('citizen_project','citizens.id','=','citizen_project.citizen_id')
            ->leftjoin('projects', 'projects.id', '=', 'citizen_project.project_id')
            ->select(
            'citizens.id',
            'first_name',
            'father_name',
            'grandfather_name',
            'last_name',
            'id_number',
            'mobile',
            'mobile2',
            'governorate',
            'city',
            'street',
            'projects.id as citizeninproject_id',
            'projects.name as citizeninproject_name',
            'citizen_project.project_request'
        )
            ->where('projects.id',$id)
            ->where('citizen_project.project_id',$id)
            ->whereRaw("true");

        if (request('id_number')) {
            $items->where("id_number", request('id_number'));
        }
        if (request('project_request')) {
//            $items->where("citizens.id", request('id'));
            $items->where("citizen_project.project_request", request('project_request'));
        }
        if (request('first_name')) {
            $items->where("first_name", request('first_name'));
        }

        if (request('governorate')) {
            $items->where("governorate", request('governorate'));
        }



        if ($request['theaction'] == 'excel') {
            $items = $items->orderBy("citizens.id", 'desc')->get();
            return Excel::download(new CitizenExport($items), "Annex Template 05-" . date('dmY') . ".xlsx");
        } else {

                $items = $items->orderBy("first_name")->paginate(5);
                $items->appends(
                    [
                        "project_request" => $idx,
                        "first_name" => $first_name,
                        "id_number" => $id_number,
                        "governorate" => $governorate,
                        "theaction" => "search"
                    ]);

            return view("account.project.citizeninproject", compact("item", "items"));
        }


    }



    public function accountinproject($id, Request $request)
    {
        $account_id = $request["account_id"] ?? "";
        $circles = $request["circles"] ?? "";
        $mobile = $request["mobile"] ?? "";
        $email = $request["email"] ?? "";
//        $item = Account::find(auth()->user()->account->id)->projects()->find($id);
        $item = Project::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        $q = $request["q"] ?? "";
        $rate = $request["rate"] ?? "";
        $items = Project::find($id)->accounts()->whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/account');
        }
        if ($q)
            $items->whereRaw("(full_name like ? or email like ? or mobile like ?)"
                , ["%$q%", "%$q%", "%$q%"]);

        if ($circles) {
            $items->where("circle_id", "=", $circles);
        }

        if ($account_id) {
            $items->where("full_name", $account_id);
        }
        if ($email) {
            $items->where("email", "like", "%" . $email . "%");

        }
        if ($mobile) {
            $items->where("mobile", $mobile);
        }


        $account_rates = Account_rate::all();
        $circles = Circle::all();
        $accounts = Account::all();
        if ($request['theaction'] == 'search') {
            $items = $items->orderBy("full_name")->paginate(5)
                ->appends([
                    "account_id" => $account_id,
                    "circles" => $circles,
                    "mobile" => $mobile,
                    "email" => $email,
                    "theaction" => "search"
                ]);
        } else {
            $items = "";
        }
        return view("account.project.accountinproject", compact("item", 'account_rates', 'accounts', 'circles', "items", 'rate'));
    }

    public function stuffinproject($id, Request $request)
    {
//        if (auth()->user()->account->id == 1) {
//            $item = Project::find($id);
//        } else {
//            $item = Account::find(auth()->user()->account->id)->projects()->find($id);
//        }

        $item = Project::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/project");
        }
        $status_worker = $request["status_worker"] ?? "";
        $account_id = $request["account_id"] ?? "";
        $circle_id = $request["circle_id"] ?? "";

        $items = Account::whereRaw("true");
        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/account');
        }
        if ($account_id) {
            $items->where('id', '=', $account_id);
        }

        if ($circle_id) {
            $items->where('circle_id', '=', $circle_id);
        }
        if ($status_worker) {
            $projectforuser = [];
            foreach ($item->accounts as $project) {
                array_push($projectforuser, $project->id);
            }
            if ($status_worker == 1) {
                $items->whereIn("id", $projectforuser);
            } else {
                $items->whereNotIn("id", $projectforuser);
            }

        }

        if ($request['theaction'] == 'search') {
            $items = $items->orderBy("full_name")->paginate(5)->appends([
                "status_worker" => $status_worker,
                "account_id" => $account_id,
                "circle_id" => $circle_id,
                "theaction" => "search"
            ]);
        } else {
            $items = "";
        }
        $accounts = Account::all();
        $circles = Circle::all();
        return view("account.project.stuffinproject", compact("item", "circles", "items", "accounts"));
    }

    public function stuffinprojectPost(Request $request, $id)
    {
        $item = Project::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/account");
        }

        if($request["account_id"]){
            for ($i = 0; $i < count($request["account_id"]); $i++) {
                \DB::table("account_project")->where(["project_id"=> $id,"account_id" => $request["account_id"][$i]])->delete();
            }
        }

        if ($request["accounts"]) {
            for ($i = 0; $i < count($request["accounts"]); $i++) {
                if ($request["accounts"][$i] == 0)
                    continue;

                $rateforaccount = Account::find($request["accounts"][$i]);

                \DB::table("account_project")->insertGetID(["project_id" => $id,
                        "account_id" => $request["accounts"][$i], "rate" => $rateforaccount->circle_id
                    ]);


                /**************اضافتهم بالبروجكت*************/

                $ratename = "";
                $item = Account::find($request["accounts"][$i]);
                if ($item->circle_id==1) {
                    $ratename='manager';
                }
                elseif ($item->circle_id==2) {
                    $ratename='supervisor';
                }
                elseif ($item->circle_id==3) {
                    $ratename='coordinator';
                }
                elseif ($item->circle_id==4) {
                    $ratename='support';
                }
                if($ratename!="")
                Project::find($id)->update([
                    ''.$ratename.'' => $item->full_name]);
            }
        }

        Session::flash("msg", "i:تمت عملية الحفظ بنجاح");
        return redirect("/account/project");
    }
}
