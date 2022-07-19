<?php

namespace App\Http\Controllers\Citizen;

use App\Account;
use App\AccountProjects;
use App\CategoryCircles;
use App\Form_file;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Requests\FormsRequest;
use Validator;
use App\Citizen;
use App\Form;
use App\Form_status;
use App\Form_type;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitizenRequest;
use App\Project;
use App\Recommendation;
use App\Rules\IdNumber;
use App\Sent_type;
use Illuminate\Http\Request;

class CitizenController extends Controller
{

    public function searchbyidnum($type, $hide_data, $private_account)
    {
        $itemco = \App\Company::all()->first();

        return view("citizen.searchcitizen", compact('itemco', 'type', 'hide_data', 'private_account'));
    }

    public function private_info($type)
    {
        $itemco = \App\Company::all()->first();
        $accounts = Account::where('private', 1)->get();
        return view("citizen.private", compact('itemco', 'type', 'accounts'));
    }

    public function showdate(Request $request)
    {
        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_contact_option = $request['private_contact_option'];
        $mobile_private = $request['mobile_private'];
        $email_private = $request['email_private'];
        $itemco = \App\Company::all()->first();

        if ($type == 1) {
            $ppp = 'يرجى تحديد مدى رغبتك بإخفاء معلوماتك الأساسية خلال معالجة الشكوى';
            $xxx = 'يرجى تحديد كيف ترغب بتلقي الرد على شكواك';
        } else {
            $ppp = 'يرجى تحديد مدى رغبتك بإخفاء معلوماتك الأساسية خلال معالجة الاقتراح';
            $xxx = 'يرجى تحديد كيف ترغب بتلقي الرد على اقتراحك';
        }
        $validator = Validator::make($request->all(), [
            'hide_data' => 'required',
            'private_contact_option' => 'required_if:hide_data,=,2',
            'mobile_private' => ['sometimes','nullable','required_if:private_contact_option,=,1','regex:/(059|056)[0-9]{7}/'],
            'email_private' => 'sometimes|nullable|required_if:private_contact_option,=,2|email',

        ], [
            'hide_data.required' => $ppp,
            'private_contact_option.required_if' => $xxx,
            'mobile_private.required_if' => 'رقم التواصل غير مدخل، يرجى إدخال رقم تواصل صحيح وفعال.',
            'mobile_private.regex' => 'رقم التواصل خطأ، يرجى إدخال رقم تواصل صحيح وفعال.',
            'email_private.required_if' => 'البريد الإلكتروني غير مدخل، يرجى إدخال بريد إلكتروني صحيح وفعال.',
            'email_private.email' => 'البريد الإلكتروني خطأ، يرجى إدخال بريد إلكتروني صحيح وفعال.',
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if($hide_data == 2){
            $id_number = 0;
            $citizen = 0;
            $projects = Project::get();
            return view("citizen.choosprojectprivate",compact('itemco', 'type','id_number', 'hide_data', 'private_contact_option', 'mobile_private', 'email_private','citizen','projects'));
        }else{
            return view("citizen.searchcitizen", compact('itemco', 'type', 'hide_data', 'private_contact_option', 'mobile_private', 'email_private'));
        }
    }


    public function gethisproject(Request $request) {
        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_account = $request['private_account'];
        $projects = null;
        $id_number = $this->validate($request, [
            'id_number' => ['numeric', new IdNumber],

        ]);


        if ($id_number) {

            $citizen = Citizen::where('id_number', '=', $id_number)->first();
            if ($citizen) {
                if (!auth()->user()) {
                    $projects = $citizen->projects;
                } else {
                    $projects = $citizen->projects()->whereIn('projects.id',
                        \App\Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))->get();
                }

//                $projects = Project::where('active',1)->get();

            }
            $itemco = \App\Company::all()->first();
            return view("citizen.choosproject", compact('itemco', 'citizen', 'projects', 'type','hide_data','private_account'));
        }
        else {
            $itemco = \App\Company::all()->first();
            return view("citizen.searchcitizen", compact('itemco', 'type','hide_data','private_account'));
        }
    }

    public function gethisprojectprivate(Request $request) {
        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_contact_option = $request['private_contact_option'];
        $mobile_private = $request['mobile_private'];
        $email_private = $request['email_private'];
        $projects = null;
        $id_number = $this->validate($request, [
            'id_number' => ['numeric', new IdNumber],

        ]);


        if ($id_number) {

            $citizen = Citizen::where('id_number', '=', $id_number)->first();
            if ($citizen) {
                if (!auth()->user()) {
                    $projects = $citizen->projects;
                } else {
                    $projects = $citizen->projects()->whereIn('projects.id',
                        \App\Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))->get();
                }

            }
            $itemco = \App\Company::all()->first();
            return view("citizen.choosprojectprivate", compact('itemco', 'citizen', 'projects', 'type','hide_data','private_contact_option','email_private','mobile_private'));
        }
        else {
            $itemco = \App\Company::all()->first();
            return view("citizen.private", compact('itemco', 'type','hide_data'));
        }
    }


    public function editorcreatcitizen(Request $request)
    {

        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_contact_option = $request['private_contact_option'];
        $private_mobile = $request['private_mobile'];
        $private_email = $request['private_email'];
        $citizen_id = $request['citizen_id'];
        $project_id = $request['project_id'];
        $id_number = $request['id_number'];
        $projects = Project::get();

        $itemco = \App\Company::all()->first();
        $citizen = Citizen::where('id_number', '=', $request['id_number'])->first();

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
            $project_code = $project->code;
        } else {
            $project = Project::find(1);
            $project_name = $project->name;
            $project_id = $project->id;
            $project_code = $project->code;
        }


        if (!auth()->user()) {
            $category = \App\Category::get();
        } else {
            $category = \App\Category::whereIn('categories.id', \App\Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->pluck('categories.id'))->get();
        }

        if ($type > 2 && $project_id == 1) {
            return view('welcome', compact('itemco'));
        }

        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::where('id', '!=', 1)->get();

        if ($citizen_id == 0) {
            $itemco = \App\Company::all()->first();
            $citzen_id = $_GET['id_number'];
            //$citzen_id = $id_number;
            return view("citizen.create",
                compact('itemco', 'type', 'hide_data',
                    'private_contact_option','private_email','private_mobile',
                    'id_number', 'projects', 'form_type'
                , "form_status", "sent_typee", 'type', 'category', 'citzen_id',
                    'project_id', 'project_code', 'citizen_name', 'project_name'));
        } else {
            $testeroor = $this->validate($request, ['project_id' => 'required']);
            $citizen = Citizen::find($citizen_id);
            $itemco = \App\Company::all()->first();
            return view("citizen.edit", compact('itemco', 'type', 'hide_data', 'private_contact_option','private_email','private_mobile', 'citizen', 'project_id', 'projects', 'form_type'
                , "form_status", "sent_typee", 'type', 'hide_data', 'private_contact_option','private_email','private_mobile', 'category', 'citzen_id', 'project_id', 'project_code', 'citizen_name', 'project_name'));
        }
    }

    public function createcitizenprivate(Request $request)
    {
        $itemco = \App\Company::all()->first();
        $project_id = $request['project_id'];
        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_contact_option = $request['private_contact_option'];
        $mobile_private = $request['mobile_private'];
        $email_private = $request['email_private'];
        $project_name = '';

        if ($type == 1) {
            $ppp = 'يرجى تحديد اسم المشروع الذي تريد تقديم الشكوى بخصوصه';
        } else {
            $ppp = 'يرجى تحديد اسم المشروع الذي تريد تقديم الاقتراح بخصوصه';

        }
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
        ], [
            'project_id.required' => $ppp,
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        if ($project_id) {
            $project = Project::find($project_id);
            $project_name = $project->name;
            $project_id = $project->id;
        }
        $category = \App\Category::get();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::where('id', '!=', 1)->get();

        return view("citizen.addprivateform", compact('itemco', 'form_type',
            "form_status", "sent_typee", 'type', 'category', 'project_id', 'project_name',
            'hide_data','private_contact_option','email_private','mobile_private'));


    }

    public function store(CitizenRequest $request)
    {

        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_account = $request['private_account'];
        $project_id = $request['project_id'];

        $isExists = Citizen::where("id_number", $request["id_number"])->count();
        if ($isExists) {
            $testeroor = $this->validate($request, [
                'id_number' => ['numeric', 'digits:9', new IdNumber],

            ]);
//            return redirect("/account/citizen/create")->withInput();
            return redirect("/citizen/editorcreatcitizen")->withInput();
        }
        $citizen_id = Citizen::create($request->all())->id_number;

        return redirect('form/addform/' . $type . '/' . $citizen_id . '/' . $project_id);
//        return redirect("/account/citizen/create/' . $type . '/' . $citizen_id . '/' . $project_id");
    }


    public function update($id, CitizenRequest $request)
    {
        $type = $request['type'];
        $hide_data = $request['hide_data'];
        $private_account = $request['private_account'];
        $citizen_id = Citizen::find($id)->id_number;
        $project_id = $request['project_id'];
//        $Citizen = Citizen::find($id);
//        $Citizen->update($request->all());

        Citizen::find($id)->fill([
            'first_name' => $request['first_name'],
            'father_name' => $request['father_name'],
            'grandfather_name' => $request['grandfather_name'],
            'last_name' => $request['last_name'],
            'governorate' => $request['governorate'],
            'city' => $request['city'],
            'street' => $request['street'],
            'mobile' => $request['mobile'],
            'mobile2' => $request['mobile2'],
        ])->save();
        return redirect('form/addform/' . $type . '/' . $citizen_id . '/' . $project_id);

    }

}
