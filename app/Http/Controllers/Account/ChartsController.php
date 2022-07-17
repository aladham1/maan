<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\Category;
use App\Circle;
use App\Form;
use App\Form_status;
use App\Form_type;
use App\Imports\ChartExport;
use App\Project;
use App\Project_status;
use App\Sent_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ChartsController extends BaseController
{
    function citizenstoprojects(Request $request)
    {
        $accept = request()["accept"] ?? "";
        $governorate = request()["governorate"] ?? "";

        $projectsbeforjeson = Project::where('id', '!=', 1);
        $projectsbeforjeson = $projectsbeforjeson->select('name')->withcount(['citizens' => function ($q) use ($accept, $governorate) {
            if ($governorate != "")
                $q->where("governorate", [$governorate]);

            if ($accept != "")
                $q->where("add_byself", [$accept]);

        }])->get();
        $projects = json_encode($projectsbeforjeson);

        return view('account.charts.citizenstoprojects', compact('projects'));
    }

    function formstoprojects(Request $request)
    {
        $total_status = "";
        $determine = "";
        $staff = "";
        $categories_project = "";
        $AllComplaintSuggestions = "";
        $ComplaintSuggestions = "";
        $responces = "";
        $sent_typee ="";

        $items = $items = Project::join('account_project','projects.id','=','account_project.project_id')
            ->leftjoin('forms','projects.id','=','forms.project_id')
            ->leftjoin('sent_type', 'forms.sent_type', '=', 'sent_type.id')
            ->leftjoin('citizens', 'citizens.id', '=', 'forms.citizen_id')
            ->leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
            ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
            ->select('projects.*',
                DB::raw('MAX(forms.datee) as max_date'),
                DB::raw('MIN(forms.datee) as min_date')
               )
            ->groupBy('projects.id')
            ->whereRaw("true");


        $items = $items->where(function ($query) {


        })->where(function ($query) {

            return $query->when(request('code'), function ($query) {

                return $query->where('projects.code', request('code'));

            });

        })->where(function ($query) {

            return $query->when(request('project_id'), function ($query) {

                return $query->where('projects.id', request('project_id'));

            });

        })->where(function ($query) {

            return $query->when(request('coordinator'), function ($query) {
                return $query->where(
                    [
                        'account_project.rate'=> 2,
                        'account_project.account_id'=>request('coordinator')
                    ]);
            });
        })->where(function ($query) {

            return $query->when(request('support'), function ($query) {
                return $query->where(
                    [
                        'account_project.rate'=> 4,
                        'account_project.account_id'=>request('support')
                    ]);
            });
        })->where(function ($query) {

            return $query->when(request('manager'), function ($query) {
                return $query->where(
                    [
                        'account_project.rate'=> 3,
                        'account_project.account_id'=>request('manager')
                    ]);
            });
        })->where(function ($query) {

            return $query->when(request('active'), function ($query) {
                if (request('active') == 1){
                    return $query->where('projects.end_date', '>', now());

                }elseif (request('active') == 2){
                    return $query->where('projects.end_date', '<', now());
                }
            });
        })->where(function ($query) {

            return $query->when(request('sent_type'), function ($query) {

                return $query->where('sent_type', request('sent_type'));

            });
        })->where(function ($query) {

            return $query->when(request('governorate'), function ($query) {

                return $query->where('citizens.governorate', request('governorate'));
            });
        });

        $ids = Form::join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
            ->join('citizens', 'citizens.id', '=', 'forms.citizen_id')
            ->leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
            ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
            ->whereRaw("true");

        $ids = $ids->where(function ($query) {

        })->where(function ($query) {

            return $query->when(request('sent_type'), function ($query) {

                return $query->where('sent_type', request('sent_type'));

            });
        })->where(function ($query) {

            return $query->when(request('governorate'), function ($query) {

                return $query->where('citizens.governorate', request('governorate'));
            });
        });


        if ($request['theaction'] == 'excel') {
            $items = $items->orderBy("projects.id", 'desc')->get();
            $ids = $ids->pluck('forms.id');
            return Excel::download(new ChartExport($items,$ids), "Annex Template 09-" . date('dmY') . ".xlsx");
        }



        $categories = auth()->user()->account->circle->category->all();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $allprojects = Project::all();
        $project_status = Project_status::all();
        $circles = Circle::all();
        $accounts = Account::all();
        $sent_typeexx = Sent_type::all();
        return view('account.charts.formstoprojects', compact("items","sent_typeexx","staff","determine","total_status","categories_project","circles","allprojects","project_status", "form_type", "form_status", "sent_typee", "categories","AllComplaintSuggestions","ComplaintSuggestions","responces","accounts"));

    }

    function formstocatigoreis(Request $request)
    {
        $read = $request["read"] ?? "";
        $evaluate = $request["evaluate"] ?? "";
        $datee = $request["datee"] ?? "";
        $status = $request["status"] ?? "";
        $type = $request["type"] ?? "";
        $sent_type = $request["sent_type"] ?? "";
        $from_date = $request["from_date"] ?? "";
        $to_date = $request["to_date"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $project_id = $request["project_id"] ?? "";


        $categoriesbeforjeson = Category::select('name')
            ->withcount(['form' =>
            function ($q) use ($read, $evaluate, $datee, $status, $type, $sent_type, $project_id, $from_date, $to_date, $category_id) {

                if ($evaluate) {
                    if ($evaluate == 1) {
                        $q->join('form_follows', 'forms.id', '=', 'form_follows.form_id')->groupBy('form_follows.form_id')
                            ->where("form_follows.solve", ">=", "0");
                    } elseif ($evaluate == 2) {
                        $q->join('form_follows', 'forms.id', '=', 'form_follows.form_id')->groupBy('form_follows.form_id')
                            ->where("form_follows.solve", "=", "1");
                    } elseif ($evaluate == 3) {
                        $q->join('form_follows', 'forms.id', '=', 'form_follows.form_id')->groupBy('form_follows.form_id')
                            ->where("form_follows.solve", "=", "2");
                    } elseif ($evaluate == 4) {


                        $q->whereNotIn('forms.id', function ($query) {
                            $query->select('form_follows.form_id')
                                ->where("form_follows.solve", ">=", "1")
                                ->from('form_follows');

                        });
                    }
                }
                if ($category_id && $type == 1)
                    $q->whereRaw("(category_id = ?)"
                        , [$category_id]);
                if ($project_id || $project_id == '0')
                    if ($project_id == '-1')
                        $q->whereRaw("(projects.id > ?)"
                            , ["1"]);
                    else
                        $q->whereRaw("(projects.id = ?)"
                            , ["$project_id"]);
                if ($from_date && $to_date) {
                    $q = $q->whereRaw("datee >= ? and datee <= ?", [$from_date, $to_date]);
                }
                if ($datee)
                    $q = $q->whereRaw("datee = ?", [$datee]);
                if ($status)
                    $q = $q->whereRaw("status = ?", [$status]);
                if ($type)
                    $q = $q->whereRaw("type = ?", [$type]);
                if ($sent_type)
                    $q = $q->whereRaw("sent_type = ?", [$sent_type]);

                if ($read) {
                    if ($read == 1)
                        $q = $q->whereRaw(" `read` = ?", [$read]);
                    else
                        $q = $q->whereNull("read");
                }
                if ($project_id || $project_id == '0')
                    if ($project_id == '-1')
                        $q->whereRaw("(projects.id > ?)"
                            , ["1"]);
                    else
                        $q->whereRaw("(projects.id = ?)"
                            , ["$project_id"]);

            }])->get();
        $categories = json_encode($categoriesbeforjeson);

        $projects = Account::find(auth()->user()->account->id)->projects->all();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::all();
        return view('account.charts.formstocatigoreis', compact('categories', "form_type", "form_status", "sent_typee", "type", "projects"));
    }


}
