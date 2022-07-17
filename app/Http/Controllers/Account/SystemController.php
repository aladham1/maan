<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\CitizenProjects;
use App\Followup_accuracy;
use App\Followup_post_system;
use App\Form;
use App\Form_type;
use App\Http\Requests\AccuracyRequest;
use App\Http\Requests\AccuracyRequestِ;
use App\Http\Requests\FormRequest;
use App\Http\Requests\SystemRequest;
use App\Imports\AccuracyExport;
use App\Imports\SystemExport;
use App\Project_status;
use App\Sent_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Session;
use Validator;

class SystemController extends BaseController
{

    public function index(Request $request)

    {

        $items = CitizenProjects::join('citizens', 'citizen_project.citizen_id', '=', 'citizens.id')
            ->leftjoin('followup_post_system', function ($join) {
                $join->on('followup_post_system.citizen_project_id', '=', 'citizen_project.id')
                    ->where('followup_post_system.deleted_at', null);
            })
            ->leftjoin('projects', 'citizen_project.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as program', function ($join) {
                $join->on('program.project_id', '=', 'projects.id')
                    ->where('program.rate', '3');
            })
            ->leftjoin('accounts as account_program', 'account_program.id', '=', 'program.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select('citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'citizens.mobile',
                'citizens.mobile2',
                'citizens.city',
                'citizens.street',
                'governorate',
                'projects.code',
                'projects.name',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_program.full_name as project_program',
                'account_followup.full_name as project_followup',
                'followup_post_system.id as followup_post_system_id',
                'followup_post_system.status',
                'followup_post_system.datee',
                'followup_post_system.progress_status',
                'citizen_project.id as citizen_project_id',
                'citizen_project.project_request',
                'followup_post_system.question1',
                'followup_post_system.question2',
                'followup_post_system.question3',
                'followup_post_system.question4',
                'followup_post_system.question5',
                'followup_post_system.question6',
                'followup_post_system.question7',
                'followup_post_system.question2_note',
                'followup_post_system.question3_note',
                'followup_post_system.question4_note'
            )
            ->whereRaw("true");

        if (request('project_request')) {
            $items->where("citizen_project.project_request", request('project_request'));
        }

        if (request('citizen_id')) {
            $items->where("citizens.first_name", 'like', request('citizen_id') . '%');
        }

        if (request('id_number')) {
            $items->where("citizens.id_number", request('id_number'));
        }

        if (request('governorate')) {
            $items->where("citizens.governorate", request('governorate'));
        }

        if (request('project_code')) {
            $items = $items->where("citizen_project.project_id", request('project_code'));
        }

        if (request('project_id')) {
            $items = $items->where("citizen_project.project_id", request('project_id'));
        }

        if (request('active')) {
            $items = $items->where('projects.active', request('active'));
        }

        if (request('coordinator')) {
            $items = $items->where('coordinator.account_id', request('coordinator'));
        }

        if (request('support')) {
            $items = $items->where('followup.account_id', request('support'));
        }

        if (request('progress_status')) {
            $items->where('followup_post_system.progress_status', request('progress_status'));
        }

        if (request('status')) {
            $items->where('followup_post_system.status', request('status'));
        }

        if (request('datee')) {
            $items->where('followup_post_system.datee', Carbon::parse(request('datee'))->format('Y-m-d'));
        }

        if (request('from_date')) {
            $items->where([['followup_post_system.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['followup_post_system.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);
        }

        if (request('to_date')) {
            $items->where([['followup_post_system.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['followup_post_system.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);
        }

        $projects = Account::find(auth()->user()->account->id)->projects->all();
        $accounts = Account::all();
        $form_type = Form_type::all();
        $project_status = Project_status::all();

        if ($request['theaction'] == 'excel') {
            $items = $items->orderBy("id", 'desc')->get();
            return Excel::download(new SystemExport($items), "Annex Template 11-" . date('dmY') . ".xlsx");

        } elseif ($request['theaction'] == 'search') {
            $items = $items->paginate(5);
            $items->appends([
                'project_request' => request('project_request'),
                'citizen_id' => request('citizen_id'),
                'id_number' => request('id_number'),
                'governorate' => request('governorate'),
                'project_id' => request('project_id'),
                'project_code' => request('project_code'),
                'active' => request('active'),
                'coordinator' => request('coordinator'),
                'support' => request('support'),
                'progress_status' => request('progress_status'),
                'status' => request('status'),
                'datee' => request('datee'),
                'from_date' => request('from_date'),
                'to_date' => request('to_date'),
                'theaction' => 'search'
            ]);
        } else {
            $items = "";
        }

        return view("account.system.index", compact("items", 'form_type', "projects", "project_status", "accounts"));
    }

    public function accuracy(Request $request)
    {
        $items = Form::join('citizens', 'forms.citizen_id', '=', 'citizens.id')
            ->join('form_type', 'forms.type', '=', 'form_type.id')
            ->leftjoin('followup_accuracy', function ($join) {
                $join->on('followup_accuracy.form_id', '=', 'forms.id')
                    ->where('followup_accuracy.deleted_at', null);
            })
            ->leftjoin('projects', 'forms.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as program', function ($join) {
                $join->on('program.project_id', '=', 'projects.id')
                    ->where('program.rate', '3');
            })
            ->leftjoin('accounts as account_program', 'account_program.id', '=', 'program.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select('citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'citizens.mobile',
                'citizens.mobile2',
                'citizens.city',
                'citizens.street',
                'governorate',
                'projects.code',
                'projects.name',
                'projects.id as project_accuracy_id',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_program.full_name as project_program',
                'account_followup.full_name as project_followup',
                'followup_accuracy.id as followup_accuracy_id',
                'forms.id as accuracy_form_id',
                'followup_accuracy.*',
                'form_type.name as form_type_name'

            )
            ->whereRaw("true");

        if (request('id')) {
            $items->where("forms.id", request('id'));
        }

        if (request('citizen_id')) {
            $items->where("citizens.first_name", 'like', request('citizen_id') . '%');
        }

        if (request('id_number')) {
            $items->where("citizens.id_number", request('id_number'));
        }

        if (request('governorate')) {
            $items->where("citizens.governorate", request('governorate'));
        }

        if (request('category_name')) {
            if (request('category_name') == 1) {
                $items->where("forms.project_id", 1);
            } else {
                $items->where("forms.project_id", '!=', 1);
            }
        }

        if (request('project_code')) {
            $items = $items->where("forms.project_id", request('project_code'));
        }

        if (request('project_id')) {
            $items = $items->where("forms.project_id", request('project_id'));
        }

        if (request('active')) {
            $items = $items->where('projects.active', request('active'));
        }

        if (request('coordinator')) {
            $items = $items->where('coordinator.account_id', request('coordinator'));
        }

        if (request('support')) {
            $items = $items->where('followup.account_id', request('support'));
        }

        if (request('progress_status')) {
            $items->where('followup_accuracy.progress_status', request('progress_status'));
        }

        if (request('status')) {
            $items->where('followup_accuracy.status', request('status'));
        }

        if (request('datee')) {
            $items->where('followup_accuracy.datee', Carbon::parse(request('datee'))->format('Y-m-d'));
        }

        if (request('from_date')) {
            $items->where([['followup_accuracy.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['followup_accuracy.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);
        }

        if (request('to_date')) {
            $items->where([['followup_accuracy.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['followup_accuracy.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);
        }

        $projects = Account::find(auth()->user()->account->id)->projects->all();
        $accounts = Account::all();
        $form_type = Form_type::all();
        $project_status = Project_status::all();

        if ($request['theaction'] == 'excel') {
            $items = $items->orderBy("forms.id", 'desc')->get();
            return Excel::download(new AccuracyExport($items), "Annex Template 12-" . date('dmY') . ".xlsx");

        } elseif ($request['theaction'] == 'search') {
            $items = $items->orderBy('forms.id')->paginate(5);
            $items->appends([
                'id' => request('id'),
                'citizen_id' => request('citizen_id'),
                'id_number' => request('id_number'),
                'governorate' => request('governorate'),
                'category_name' => request('category_name'),
                'project_id' => request('project_id'),
                'project_code' => request('project_code'),
                'active' => request('active'),
                'coordinator' => request('coordinator'),
                'support' => request('support'),
                'progress_status' => request('progress_status'),
                'status' => request('status'),
                'datee' => request('datee'),
                'from_date' => request('from_date'),
                'to_date' => request('to_date'),
                'theaction' => 'search'


            ]);
        } else {
            $items = "";
        }

        return view("account.system.accuracy", compact("items", 'form_type', "projects", "project_status", "accounts"));
    }

    public function destroy(Request $request)
    {
        $item = Followup_post_system::find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system");
        }

        $item->deleted_at = Carbon::now();
        $item->deleted_by = Auth::id();
        $item->save();
        Session::flash("msg", "تم حذف متابعة نشر إجراءات النظام بنجاح");
        return Response(['success' => true]);

    }

    public function destroy1(Request $request)
    {
        $item = Followup_accuracy::find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system/accuracy");
        }

        $item->deleted_at = Carbon::now();
        $item->deleted_by = Auth::id();
        $item->save();
        Session::flash("msg", "تم حذف  متابعة دقة البيانات المسجلة على النظام بنجاح");
        return Response(['success' => true]);

    }

    public function create($id)
    {

        $item = CitizenProjects::where('citizen_project.id', $id)
            ->join('citizens', 'citizen_project.citizen_id', '=', 'citizens.id')
            ->leftjoin('followup_post_system', function ($join) {
                $join->on('followup_post_system.citizen_project_id', '=', 'citizen_project.id')
                    ->where('followup_post_system.deleted_at', null);
            })
            ->leftjoin('projects', 'citizen_project.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select('citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'governorate',
                'citizens.mobile',
                'citizens.mobile2',
                'projects.code',
                'projects.name',
                'projects.id as project_id',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_followup.full_name as project_followup',
                'followup_post_system.id as followup_post_system_id',
                'followup_post_system.status',
                'followup_post_system.datee',
                'followup_post_system.progress_status',
                'citizen_project.id as citizen_project_id',
                'citizen_project.project_request')
            ->first();

        $sent_types = Sent_type::all();

        return view("account.system.create", compact('item', 'sent_types'));
    }

    public function edit($id)
    {

        $item = Followup_post_system::where([
            'followup_post_system.id' => $id,
            'followup_post_system.deleted_at' => null
        ])
            ->leftjoin('citizen_project', 'followup_post_system.citizen_project_id', '=', 'citizen_project.id')
            ->join('citizens', 'citizen_project.citizen_id', '=', 'citizens.id')
            ->leftjoin('projects', 'citizen_project.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select('citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'governorate',
                'citizens.mobile',
                'citizens.mobile2',
                'projects.code',
                'projects.name',
                'projects.id as project_id',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_followup.full_name as project_followup',
                'followup_post_system.id as followup_post_system_id',
                'followup_post_system.status',
                'followup_post_system.datee',
                'followup_post_system.progress_status',
                'citizen_project.id as citizen_project_id',
                'citizen_project.project_request',
                'followup_post_system.question1',
                'followup_post_system.question2',
                'followup_post_system.question3',
                'followup_post_system.question4',
                'followup_post_system.question5',
                'followup_post_system.question6',
                'followup_post_system.question7',
                'followup_post_system.question2_note',
                'followup_post_system.question3_note',
                'followup_post_system.question4_note'
            )
            ->first();

        $sent_types = Sent_type::all();

        return view("account.system.edit", compact('item', 'sent_types'));
    }

    public function store_followup_post_system(SystemRequest $request)
    {
        $isExists = CitizenProjects::where("id", $request["id"])->count();
        if ($isExists == 0) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system/index")->withInput();
        }

        if ($request["question6"] == 1) {
            $progress_status = 2;
        } else {
            $progress_status = 3;
        }

        $system = new Followup_post_system();
        $system->citizen_project_id = $request["id"];
        $system->question1 = $request["question1"];
        $system->question2 = $request["question2"] ? $request["question2"] : 2;
        $system->question3 = $request["question3"] ? $request["question3"] : 2;
        $system->question4 = $request["question4"] ? $request["question4"] : 2;
        $system->question5 = $request["question5"] ? $request["question5"] : 2;
        $system->question6 = $request["question6"] ? $request["question6"] : 2;
        $system->question7 = $request["question7"];
        $system->question2_note = $request["question2_note"];
        $system->question3_note = $request["question3_note"];
        $system->question4_note = $request["question4_note"];
        $system->account_id = Auth::user()->account->id;
        $system->datee = date('Y-m-d');
        $system->status = 1;
        $system->progress_status = $progress_status;
        $system->save();

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("/account/system");
    }

    public function update_followup_post_system($id, SystemRequest $request)
    {
        $isExists = Followup_post_system::where("id", $id)->count();
        if ($isExists == 0) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system/index")->withInput();
        }

        if ($request["question6"] == 1) {
            $progress_status = 2;
        } else {
            $progress_status = 3;
        }

        $system = Followup_post_system::find($id);
        $system->question1 = $request["question1"];
        $system->question2 = $request["question2"] ? $request["question2"] : 2;
        $system->question3 = $request["question3"] ? $request["question3"] : 2;
        $system->question4 = $request["question4"] ? $request["question4"] : 2;
        $system->question5 = $request["question5"] ? $request["question5"] : 2;
        $system->question6 = $request["question6"] ? $request["question6"] : 2;
        $system->question7 = $request["question7"];
        $system->question2_note = $request["question2_note"];
        $system->question3_note = $request["question3_note"];
        $system->question4_note = $request["question4_note"];
        $system->progress_status = $progress_status;
        $system->save();

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/account/system");
    }

    public function create1($id)
    {

        $item = Form::where('forms.id', $id)
            ->join('citizens', 'forms.citizen_id', '=', 'citizens.id')
            ->join('form_type', 'forms.type', '=', 'form_type.id')
            ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
            ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
            ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
            ->leftjoin('followup_accuracy', function ($join) {
                $join->on('followup_accuracy.form_id', '=', 'forms.id')
                    ->where('followup_accuracy.deleted_at', null);
            })
            ->leftjoin('projects', 'forms.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as program', function ($join) {
                $join->on('program.project_id', '=', 'projects.id')
                    ->where('program.rate', '3');
            })
            ->leftjoin('accounts as account_program', 'account_program.id', '=', 'program.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select('citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'citizens.mobile',
                'citizens.mobile2',
                'citizens.city',
                'citizens.street',
                'governorate',
                'projects.code',
                'projects.name',
                'projects.id as project_accuracy_id',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_program.full_name as project_program',
                'account_followup.full_name as project_followup',
                'followup_accuracy.id as followup_accuracy_id',
                'forms.id as accuracy_form_id',
                'followup_accuracy.*',
                'forms.title',
                'forms.content',
                'form_follows.id as form_follow_id',
                'form_follows.solve as form_follow_solve',
                'form_follows.datee as follow_datee',
                'form_follows.evaluate as form_follow_evaluate',
                'form_type.name as form_type_name',
                'form_responses.response',
                'sent_type.name as sent_type_name'

            )
            ->first();

        $sent_types = Sent_type::all();

        return view("account.system.create1", compact('item', 'sent_types'));
    }

    public function edit1($id)
    {

        $item = Followup_accuracy::where([
            'followup_accuracy.id' => $id,
            'followup_accuracy.deleted_at' => null
        ])
            ->leftjoin('forms', 'followup_accuracy.form_id', '=', 'forms.id')
            ->join('citizens', 'forms.citizen_id', '=', 'citizens.id')
            ->join('form_type', 'forms.type', '=', 'form_type.id')
            ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
            ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
            ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
            ->leftjoin('projects', 'forms.project_id', '=', 'projects.id')
            ->leftjoin('account_project as coordinator', function ($join) {
                $join->on('coordinator.project_id', '=', 'projects.id')
                    ->where('coordinator.rate', '2');
            })
            ->leftjoin('accounts as account_coordinator', 'account_coordinator.id', '=', 'coordinator.account_id')
            ->leftjoin('account_project as program', function ($join) {
                $join->on('program.project_id', '=', 'projects.id')
                    ->where('program.rate', '3');
            })
            ->leftjoin('accounts as account_program', 'account_program.id', '=', 'program.account_id')
            ->leftjoin('account_project as followup', function ($join) {
                $join->on('followup.project_id', '=', 'projects.id')
                    ->where('followup.rate', '4');
            })
            ->leftjoin('accounts as account_followup', 'account_followup.id', '=', 'followup.account_id')
            ->select(
                'citizens.id',
                'first_name',
                'father_name',
                'grandfather_name',
                'last_name',
                'citizens.id_number',
                'citizens.mobile',
                'citizens.mobile2',
                'citizens.city',
                'citizens.street',
                'governorate',
                'projects.code',
                'projects.name',
                'projects.id as project_accuracy_id',
                'projects.end_date',
                'account_coordinator.full_name as project_coordinator',
                'account_program.full_name as project_program',
                'account_followup.full_name as project_followup',
                'followup_accuracy.id as followup_accuracy_id',
                'forms.id as accuracy_form_id',
                'followup_accuracy.*',
                'forms.title',
                'forms.content',
                'form_follows.id as form_follow_id',
                'form_follows.solve as form_follow_solve',
                'form_follows.datee as follow_datee',
                'form_follows.evaluate as form_follow_evaluate',
                'form_type.name as form_type_name',
                'form_responses.response',
                'sent_type.name as sent_type_name'
            )
            ->first();

        $sent_types = Sent_type::all();

        return view("account.system.edit1", compact('item', 'sent_types'));
    }

    public function store_accuracy_system(AccuracyRequest $request)
    {
        $isExists = CitizenProjects::where("id", $request["id"])->count();
        if ($isExists == 0) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system/index")->withInput();
        }

        if ($request["question8"] == 1) {
            $progress_status = 2;
        } else {
            $progress_status = 3;
        }

        $system = new Followup_accuracy();
        $system->form_id = $request["id"];
        $system->question1 = $request["question1"];
        $system->question2 = $request["question2"] ? $request["question2"] : 2;
        $system->question3 = $request["question3"] ? $request["question3"] : 2;
        $system->question4 = $request["question4"] ? $request["question4"] : 2;
        $system->question5 = $request["question5"] ? $request["question5"] : 2;
        $system->question6 = $request["question6"] ? $request["question6"] : 2;
        $system->question7 = $request["question7"] ? $request["question7"] : 2;
        $system->question8 = $request["question8"] ? $request["question8"] : 2;
        $system->question9 = $request["question9"];

        $system->question1_note = $request["question1_note"];
        $system->question2_note = $request["question2_note"];
        $system->question3_note = $request["question3_note"];
        $system->question4_note = $request["question4_note"];
        $system->question5_note = $request["question5_note"];
        $system->question6_note = $request["question6_note"];
        $system->question7_note = $request["question7_note"];
        $system->account_id = Auth::user()->account->id;
        $system->datee = date('Y-m-d');
        $system->status = 1;
        $system->progress_status = $progress_status;
        $system->save();

        Session::flash("msg", "تمت عملية الاضافة بنجاح");
        return redirect("account/system/accuracy");
    }

    public function update_accuracy_system($id, AccuracyRequest $request)
    {
        $isExists = Followup_accuracy::where("id", $id)->count();
        if ($isExists == 0) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/system/accuracy")->withInput();
        }

        if ($request["question8"] == 1) {
            $progress_status = 2;
        } else {
            $progress_status = 3;
        }

        $system = Followup_accuracy::find($id);
        $system->question1 = $request["question1"];
        $system->question2 = $request["question2"] ? $request["question2"] : 2;
        $system->question3 = $request["question3"] ? $request["question3"] : 2;
        $system->question4 = $request["question4"] ? $request["question4"] : 2;
        $system->question5 = $request["question5"] ? $request["question5"] : 2;
        $system->question6 = $request["question6"] ? $request["question6"] : 2;
        $system->question7 = $request["question7"] ? $request["question7"] : 2;
        $system->question8 = $request["question8"] ? $request["question8"] : 2;
        $system->question9 = $request["question9"];

        $system->question1_note = $request["question1_note"];
        $system->question2_note = $request["question2_note"];
        $system->question3_note = $request["question3_note"];
        $system->question4_note = $request["question4_note"];
        $system->question5_note = $request["question5_note"];
        $system->question6_note = $request["question6_note"];
        $system->question7_note = $request["question7_note"];
        $system->progress_status = $progress_status;
        $system->save();

        Session::flash("msg", "تمت عملية التعديل بنجاح");
        return redirect("/account/system/accuracy");
    }

}
