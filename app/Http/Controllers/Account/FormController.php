<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\AccountProjects;
use App\Category;
use App\CategoryCircles;
use App\Circle;
use App\Citizen;
use App\Form;
use App\Form_file;
use App\Form_follow;
use App\Form_response;
use App\Form_status;
use App\Form_type;
use App\Http\Requests\Form_responseRequest;
use App\Http\Requests\FormRequest;
use App\Imports\DeletedFormsExport;
use App\Imports\FormsExport;
use App\MessageType;
use App\Project_status;
use App\Recommendation;
use App\Sent_type;
use App\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Session;
use Validator;

class FormController extends BaseController
{


    public function change_response($id, Request $request)
    {

        $response_type = $request->response_type;
        $form = Form::find($id);
        $form->update([
            'response_type' => $response_type,
        ]);
        $form->save();
        return back();
    }


    public function update_form_data($id, Request $request)
    {
        $data = $request->validate([
            'required_respond' => 'required',
            'form_data' => 'required',
            'form_file' => 'sometimes|nullable|max:6400|mimes:jpeg,bmp,png,gif,svg,pdf,docx,xls,xlsx,txt,File',
        ]);

        if ($request->hasFile('form_file')) {
            $myfile = $request->file('form_file');
            $filename = rand(11111, 99999) . '.' . $myfile->getClientOriginalExtension();
            $myfile->move(public_path() . '/uploads/files/', $filename);
            $data['form_file'] = $filename;
        }
        $form = Form::find($id);
        $form->update([
            'required_respond' => $data['required_respond'],
            'form_data' => $data['form_data'],
            'form_file' => $data['form_file'],
        ]);
        $form->save();
        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function change_response_and_update_form_data($id, Request $request)
    {
        $form = Form::find($id);

        $validator = Validator::make($request->all(), [
            'response_type' => 'required',
            'response' => 'required',
            'required_respond' => 'required_if:response_type,=,1',
            'form_data' => 'required_if:response_type,=,1',
            'form_file' => 'mimes:pdf'
        ], [
            'response_type.required' => 'يرجى تحديد الإجراءات المطلوبة للرد على الشكوى',
            'response.required' => 'يرجى تحديد صياغة الرد على الشكوى',
            'required_respond.required_if' => 'يرجى تحديد الإجراءات المطولة المطلوبة للرد على الشكوى',
            'form_data.required_if' => 'يرجى تحديد تاريخ الإجراءات المطولة المطلوبة للرد على الشكوى',
            'form_file.mimes' => 'يجب ان يكون الملف من نوع pdf',
        ]);


        if ($validator->fails()) {
            return Redirect::to('/citizen/form/show/' . $form->citizen->id_number . '/' . $form->id . '?step=4')->withInput()->withErrors($validator);
        }

        $response_type = $request->response_type;
        $required_respond = $request->required_respond;
        $form_data = $request->form_data;
        $form_file = "";


        if ($request->hasFile('form_file')) {
            $fileName = time() . '.' . $request->form_file->extension();
            $request->form_file->move(public_path('uploads/files'), $fileName);
            $form_file = $fileName;
        }

        $form->response_type = $response_type;
        $form->required_respond = $required_respond;
        $form->form_data = $form_data;
        $form->form_file = $form_file;
        $form->save();


        // add_repaly

        if ($request->response) {
            $form->fill(['status' => '2']);
            $form->save();

            $item = new Form_response();
            $request['form_id'] = $id;
            $request['datee'] = date('Y-m-d');
            $request['account_id'] = Auth::user()->account->id;
            $item::create($request->all());

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
                ->pluck('rate', 'account_id')->toArray();

            foreach ($categoryCircles as $categoryCircle) {
                if ($categoryCircle->procedure_type == 3) {
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
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة للمصادقة على الرد', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=4"]);
            }
        }

        //return back()->with(['success' => true ,'msg' => "تم ارسال الرد للمصادقة بنجاح"]);

        $previousUrl = app('url')->previous();
        $previousUrl = explode("?", $previousUrl);
        $previousUrl = \Illuminate\Support\Facades\URL::to($previousUrl[0]);
        return redirect()->to($previousUrl . '?' . http_build_query(['step' => '4']));

    }

    public function change_replay_status_feedback($id, Request $request)
    {
        $form = Form::find($id);

        $validator = Validator::make($request->all(), [
            'follow_form_status' => 'required',
            'evaluate' => 'required_if:follow_form_status,=,1',
            'follow_reason_not' => 'required_if:follow_form_status,=,2',
            'notes' => 'required_if:evaluate,=,4',
        ], [
            'follow_form_status.required' => 'يرجى تحديد حالة تبليغ الرد',
            'evaluate.required_if' => 'يرجى تحديد حالة التغذية الراجعة',
            'follow_reason_not.required_if' => 'يرجى تحديد سبب عدم تبليغ الرد',
            'notes.required_if' => 'يرجى تحديد سبب عدم الرضا عن الرد',
        ]);


        if ($validator->fails()) {
            return Redirect::to('/citizen/form/show/' . $form->citizen->id_number . '/' . $form->id . '?step=5')->withInput()->withErrors($validator);
        }

        $check = Form_follow::where('form_id', $form->id)->first();
        if($check){
            $Form_follow = $check;
        }else{
            $Form_follow = new Form_follow();
        }
        $Form_follow->form_id = $form->id;
        $Form_follow->citizen_id = $form->citizen_id;
        $Form_follow->account_id = Auth::user()->account->id;;
        $Form_follow->solve = $request['follow_form_status'];
        $Form_follow->follow_reason_not = $request['follow_reason_not'];
        $Form_follow->evaluate = $request['evaluate'];
        $Form_follow->notes = $request['notes'];
        $Form_follow->datee = date('Y-m-d');
        $Form_follow->save();


        if ($request['evaluate'] && ($request['evaluate'] == 4)) {

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
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

            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'لديك اقتراح/شكوى بحاجة لإعادة معالجة لعدم رضا مقدمها عن الرد الذي تلقاه', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }
        }

        if ($request['follow_form_status'] && ($request['follow_form_status'] == 2)) {
            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
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

            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'تنبيه بوجود اقتراح/ شكوى لم يتم الوصول لمقدمها لتبليغه بالرد', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }
        }

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
            ->get();

        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
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

        if ($request['evaluate'] && ($request['evaluate'] == 1 || $request['evaluate'] == 2 || $request['evaluate'] == 3)) {
            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'تنبيه بإتمام المهمة ', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }
        }

        Session::flash("msg", "تم حفظ التغذية الراجعة بنجاح");
        return redirect("/account");

    }

    public function confirm_change_replay_status_feedback($id, Request $request)
    {
        $form = Form::find($id);

        $validator = Validator::make($request->all(), [
            'confirm_evaluate' => 'required'
        ], [
            'confirm_evaluate.required' => 'يرجى تحديد مدى احتياج الاقتراح/ الشكوى  لمعالجة مرة أخرى',
        ]);


        if ($validator->fails()) {
            return Redirect::to('/citizen/form/show/' . $form->citizen->id_number . '/' . $form->id . '?step=5')->withInput()->withErrors($validator);
        }


        $form->confirm_evaluate_4 = 1;
        $form->user_reprocessing_recommendations_id = Auth::user()->account->id;
        $form->save();

        if ($request['confirm_evaluate'] && ($request['confirm_evaluate'] == 1)) {
            $form_new = new Form();
            $form_new->type = $form->type;
            $form_new->title = $form->title;
            $form_new->citizen_id = $form->citizen_id;
            $form_new->project_id = $form->project_id;
            $form_new->sent_type = $form->sent_type;
            $form_new->category_id = $form->category_id;
            $form_new->status = 1;
            $form_new->content = $form->content;
            $form_new->datee = $form->datee;
            $form_new->reprocessing_parent_form_id = $form->id;
            $form_new->follower_reprocessing = 1;
            $form_new->form_no = $form->id.'_02';
            if ($form_new->save()) {
                $form->reprocessing_form_id = $form_new->id;
                $form->save();
            }

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
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

            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'لديك اقتراح/شكوى بحاجة لإعادة معالجة', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }

            return redirect("/citizen/form/show/".$form->citizen->id_number."/".$form->reprocessing_form_id);
        }
        else{
            $form->fill(['status' => '3']);
            $form->save();
            session::flash('msg', 's:تم إغلاق الشكوى');
            return redirect("/account");
        }


    }

    public function change_confirm_and_update_form_data($id, Request $request)
    {
        $form = Form::find($id);

        $validator = Validator::make($request->all(), [
            'objection_response' => 'required',
            'old_response' => 'required_if:objection_response,=,1',
        ], [
            'objection_response.required' => 'يرجى تحديد ما إذا كان لديك اعتراض/تعديل على الرد ',
            'old_response.required_if' => 'يرجى إعادة صياغة الرد على الشكوى',
        ]);


        if ($validator->fails()) {
            return Redirect::to('/citizen/form/show/' . $form->citizen->id_number . '/' . $form->id . '?step=4')->withInput()->withErrors($validator);
        }

        if ($form->form_response) {
            $item = Form_response::where(['form_id' => $id])->first();
            if ($item) {
                $item->objection_response = $request->objection_response;
                $item->confirm_account_id = Auth::user()->account->id;
                $item->confirmation_date = date('Y-m-d');
                $item->confirmation_status = 2;
                if ($request->objection_response == 1) {
                    $item->old_response = $request->old_response;
                }
                $item->save();

            }
        }

        // Notifications
        $categoryCircles_users1 = $categoryCircles_users2 = $auth_circle_users = $auth_circle_users1 = array();
        $categoryCircles = CategoryCircles::where('category_id', '=', $form->category->id)
            ->get();
        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $form->project_id)
            ->pluck('rate', 'account_id')->toArray();
        foreach ($categoryCircles as $categoryCircle) {
            if ($categoryCircle->procedure_type == 4) {
                array_push($categoryCircles_users1, $categoryCircle->circle_id);
            }

            if ($categoryCircle->procedure_type == 2) {
                array_push($categoryCircles_users2, $categoryCircle->circle_id);
            }

        }
        foreach ($userinprojects as $key => $userinproject) {
            if (in_array($userinproject, $categoryCircles_users1)) {
                array_push($auth_circle_users, $key);
            }

            if (in_array($userinproject, $categoryCircles_users2)) {
                array_push($auth_circle_users1, $key);
            }

        }


        foreach ($auth_circle_users1 as $AccountProjects_user) {
            $user = Account::find($AccountProjects_user);
            NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'تنبيه بوجود اقتراح/ شكوى تم المصادقة على صياغة الرد  عليها', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=4"]);
        }
        if($form->hide_data == 1){
            if($form->private_account != 0){
                $user = Account::find($form->private_account);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة لتبليغ الرد', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }
        }else{
            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $form->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة لتبليغ الرد', 'link' => "/citizen/form/show/" . $form->citizen->id_number . "/$form->id" . "?step=5"]);
            }
        }
        // Notifications


        if (auth()->user()) {
            $user_id = auth()->user()->account->id;
        } else {
            $user_id = NULL;
        }
        if ($id) {
            $form = Form::find($id);
            $citizen_msg = Citizen::find($form->citizen_id);
            $message = new Sms();
            $message->mobile = $citizen_msg->mobile;
            $message->citizen_id = $citizen_msg->id;
            $message->message_type_id = 2;
            $message->user_id = $user_id;
            $message->form_id = $id;
            $message->save();
//            if ($message->save()) {
//                $messageText = MessageType::select('text')->where('id', '=', 2)->pluck('text')[0];
//                if (str_contains($messageText, 'xxx')) {
//                    $citizen = Citizen::select('first_name', 'father_name', 'grandfather_name', 'last_name')->where('id', '=', $citizen_msg->id)->first();
//                    $messageText_new = str_replace('xxx', $citizen->full_name, $messageText);
//                } else {
//                    $messageText_new = $messageText;
//                }
//
//                $curl = curl_init();
//                curl_setopt_array($curl, array(
//                    CURLOPT_URL => "https://hotsms.ps/sendbulksms.php?user_name=MAAN-FCS&user_pass=7110874&sender=MAAN-FCS&mobile=$citizen_msg->mobile&type=0&text=" . urlencode($messageText_new),
//                    CURLOPT_RETURNTRANSFER => true,
//                    CURLOPT_CUSTOMREQUEST => "GET",
//                    CURLOPT_HTTPHEADER => array(
//                        "Content-Type:application/json",
//                        "Accept:application/json",
//                    ),
//                ));
//
//                $response = curl_exec($curl);
//                curl_close($curl);
//
//                if ($response == 1001) {
//                    $message->send_status = 'تم الإرسال';
//                    $message->save();
//                } else {
//                    $message->send_status = 'قيد الإرسال';
//                    $message->save();
//                }
//            }
        }

//        return back()->with(['success' => true ,'msg' => "تم المصادقة بنجاح"]);
//        $previousUrl = app('url')->previous();
//        $previousUrl= explode("?", $previousUrl);
//        $previousUrl= \Illuminate\Support\Facades\URL::to($previousUrl[0]);
//        return redirect()->to($previousUrl.'?'. http_build_query(['step'=>'4']));

        Session::flash("msg", " تمت المصادقة بنجاح");
        return redirect("/account");

    }


//changecategory
    public function changecategory($id, Request $request)
    {
        $item = Form::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        if ($item->category_id && $request['category_id'] != 0) {
            $item->old_category_id = $item->category_id;
            $item->change_by = \auth()->user()->id;
            $item->user_change_category_id = \auth()->user()->id;
            $item->category_id = $request['category_id'];
            $item->save();

            $theform = $item;

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'لديك اقتراح/ شكوى جديدة بحاجة لمعالجة', 'link' => "/citizen/form/show/" . $id_number_x . "/$item->id"]);
            }

            return Response(['success' => true, 'msg' => "تم تغيير الفئة بنجاح", 'thecat' => Category::find($request['category_id'])->name]);
        } else {
            $item->old_category_id = 0;
            $item->save();
        }
    }

    public function clarification_from_citizian($id, Request $request)
    {

        $item = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))
            ->find($id);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        if (!is_null($request['need_clarification'])) {
            $item->need_clarification = $request["need_clarification"] ?? $item->need_clarification;
            $item->have_clarified = $request['have_clarified'] ?? $item->have_clarified;
            $item->reprocessing = $request['reprocessing'] ?? $item->reprocessing;

            if ($request['have_clarified'] == 0) {
                $item->reformulate_content = $request['reformulate_content'] ?? "";

            } else {
                $item->reformulate_content = $request['reformulate_content'] ?? $item->reformulate_content;
            }

            if (!is_null($request['reprocessing'])) {
                $item->user_change_content_id = $item->user_change_content_id;
                $item->user_reprocessing_recommendations_id = auth()->user()->account->id;
            } else {
                $item->user_change_content_id = auth()->user()->account->id ?? $item->user_change_content_id;
                $item->user_reprocessing_recommendations_id = NULL;

            }

            $item->reason_lack_clarification = $request['reason_lack_clarification'] ?? $item->reason_lack_clarification;
            $item->reprocessing_recommendations = $request['reprocessing_recommendations'] ?? $item->reprocessing_recommendations;
            $item->save();

            if (!empty($request['reason_lack_clarification'])) {

                $categoryCircles_users1 = $auth_circle_users = array();

                $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
                    ->get();

                $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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

                foreach ($auth_circle_users as $AccountProjects_user) {
                    $user = Account::find($AccountProjects_user);
                    NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بوجود اقتراح / شكوى لا يمكن الاستيضاح عن مضمونه/ا', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id"]);
                }
            }
        }

        if (!empty($request['reprocessing_recommendations'])) {
            $item->need_clarification = $request["need_clarification"] ?? $item->need_clarification;
            $item->have_clarified = $request['have_clarified'] ?? $item->have_clarified;
            $item->reprocessing = $request['reprocessing'] ?? $item->reprocessing;
            $item->reformulate_content = $request['reformulate_content'] ?? $item->reformulate_content;
            $item->reason_lack_clarification = $request['reason_lack_clarification'] ?? $item->reason_lack_clarification;
            $item->reprocessing_recommendations = $request['reprocessing_recommendations'] ?? $item->reprocessing_recommendations;
            $item->user_reprocessing_recommendations_id = auth()->user()->account->id;
            $item->save();

            $recommendations = new Recommendation();
            $recommendations->form_id = $item->id;
            $recommendations->user_id = auth()->user()->id;
            $recommendations->recommendations_content = $request['reprocessing_recommendations'];
            $recommendations->save();

            if ($item->reprocessing == 0) {
                $form = new Form();
                $form->type = $item->type;
                $form->title = $item->title;
                $form->citizen_id = $item->citizen_id;
                $form->project_id = $item->project_id;
                $form->sent_type = $item->sent_type;
                $form->category_id = $item->category_id;
                $form->status = 1;
                $form->content = $item->content;
                $form->datee = $item->datee;
                $form->reprocessing_parent_form_id = $item->id;
                $form->form_no = $item->id.'_02';
                if ($form->save()) {
                    $item->reprocessing_form_id = $form->id;
                    $item->save();
                }
            }

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بإعادة معالجة الاقتراح/الشكوى', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id"]);
            }
        }

        if (!empty($request['reprocessing']) && $request['reprocessing'] == 1) {
            $item->fill(['status' => '3']);
            $item->save();
        } elseif (!empty($request['reprocessing']) && $request['reprocessing'] == 0) {
            $item->fill(['status' => '5']);
            $item->save();
        }

        if (!empty($request['reprocessing']) && $request['reprocessing'] == 1) {
            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'لديك اقتراح/ شكوى تم المصادقة على اغلاقها', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id"]);
            }
        }

        return Response(['success' => true, 'msg' => "تم الحفظ بنجاح"]);

    }


    public function download_form_file($id)
    {
        $form = Form::find($id);
        $file = public_path() . "/uploads/files/" . $form->form_file;
        return response()->download($file);
    }


    public function index(Request $request)

    {
        $read = $request["read"] ?? "";
        $evaluate = $request["evaluate"] ?? "";
        $from_date = $request["from_date"] ?? "";
        $to_date = $request["to_date"] ?? "";
        $q = $request["q"] ?? "";
        $q1 = $request["q1"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $datee = $request["datee"] ?? "";
        $status = $request["status"] ?? "";
        $type = $request["type"] ?? "";
        $sent_type = $request["sent_type"] ?? "";
        $project_id = $request["project_id"] ?? "";
        $replay_status = $request["replay_status"] ?? "";
        $active = $request["active"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);
        $ids = $request["ids"] ?? "";


        if (count($keywords) == 3) {
            $keywords[3] = "";
        }
        if (count($keywords) == 2) {
            $keywords[2] = "";
            $keywords[3] = "";
        }
        if (count($keywords) == 1) {
            $keywords[1] = "";
            $keywords[2] = "";
            $keywords[3] = "";
        }

        if (auth()->user()->account->id == 1) {
            $items = Form::distinct()->where('forms.deleted_at', null)
                ->join('projects', 'projects.id', '=', 'forms.project_id')
                ->leftJoin('accounts', 'accounts.id', '=', 'forms.account_id')
                ->leftJoin('circles', 'circles.id', '=', 'accounts.circle_id')
                ->join('project_status', 'projects.active', '=', 'project_status.id')
                ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
                ->join('form_status', 'forms.status', '=', 'form_status.id')
                ->join('form_type', 'forms.type', '=', 'form_type.id')
                ->join('categories', 'categories.id', '=', 'forms.category_id')
                ->leftJoin('categories as oldcategories', 'oldcategories.id', '=', 'forms.old_category_id')
                ->leftJoin('category_circles as c1', 'c1.category_id', '=', 'categories.id')
                ->leftJoin('category_circles as c2', 'c2.circle_id', '=', 'circles.id')
                ->leftJoin('procedure_type', 'procedure_type.id', '=', 'c1.procedure_type')
                ->leftJoin('category_circles as c3', 'c3.procedure_type', '=', 'procedure_type.id')
                ->leftjoin('citizens', 'citizens.id', '=', 'forms.citizen_id')
                ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                ->leftjoin('accounts as u2', 'u2.id', '=', 'forms.user_change_content_id')
                ->leftjoin('accounts as u3', 'u3.id', '=', 'form_follows.account_id')
                ->leftjoin('accounts as u4', 'u4.id', '=', 'forms.user_reprocessing_recommendations_id')
                ->leftJoin('citizen_project', function ($join) {
                    $join->on('citizen_project.project_id', '=', 'projects.id');
                    $join->on('citizen_project.citizen_id', '=', 'citizens.id');

                })

                ->select('forms.id',
                    'forms.form_no',
                    'forms.hide_data',
                    'citizens.first_name',
                    'citizens.father_name',
                    'citizens.grandfather_name',
                    'citizens.last_name',
                    'citizens.id_number',
                    'citizens.governorate',
                    'citizens.city',
                    'citizens.street',
                    'citizens.mobile',
                    'citizens.mobile2',
                    'projects.id as project_id',
                    'projects.name as binfit',
                    'projects.end_date as project_end_date',
                    'projects.name as zammes',
                    'projects.end_date  as project_status',
                    'sent_type.name  as senmmes',
                    'forms.account_id',
                    'forms.need_clarification',
                    'forms.have_clarified',
                    'forms.reason_lack_clarification',
                    'forms.reformulate_content',
                    'forms.follower_reprocessing',
                    'accounts.full_name as employee_name',
                    'circles.name as employee_circle',
                    'forms.datee',
                    'forms.created_at',
                    'form_type.name  as ammes',
                    'categories.name as nammes',
                    'categories.id as category_id',
                    'forms.title',
                    'forms.content',
                    'form_status.name',
                    'forms.response_type',
                    'forms.required_respond',
                    'form_status.id as replay_status',
                    'citizen_project.id as project_request_id',
                    'citizen_project.project_request',
                    'form_follows.evaluate',
                    'form_follows.solve',
                    'form_follows.follow_reason_not',
                    'form_follows.datee as follow_datee',
                    'form_follows.notes as form_follow_notes',
                    'u2.full_name as user_change_content_full_name',
                    'u3.full_name as user_required_respond_full_name',
                    'forms.reprocessing_form_id',
                    'form_responses.response',
                    'form_responses.datee as form_responses_datee',
                    'u4.full_name as user_reprocessing_recommendations_full_name',
                    'forms.box_place',
                    'forms.date_open_box',
                    'forms.number_of_open_box',
                    'forms.type_of_followup_visit',
                    'oldcategories.name as old_category',
                    'oldcategories.id as old_category_id'
                )
                ->whereRaw("true");
        } else {
            $items = Form::distinct()->where('forms.deleted_at', null)
                ->whereIn('forms.project_id', Account::find(auth()->user()->account->id)
                    ->projects()->with('account_projects')->pluck('projects.id'))
                ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                    ->with('circle_categories')->pluck('categories.id'))
                ->join('projects', 'projects.id', '=', 'forms.project_id')
                ->leftJoin('accounts', 'accounts.id', '=', 'forms.account_id')
                ->leftJoin('circles', 'circles.id', '=', 'accounts.circle_id')
                ->join('project_status', 'projects.active', '=', 'project_status.id')
                ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
                ->join('form_status', 'forms.status', '=', 'form_status.id')
                ->join('form_type', 'forms.type', '=', 'form_type.id')
                ->join('categories', 'categories.id', '=', 'forms.category_id')
                ->leftJoin('categories as oldcategories', 'oldcategories.id', '=', 'forms.old_category_id')
                ->leftjoin('citizens', 'citizens.id', '=', 'forms.citizen_id')
                ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                ->leftjoin('accounts as u2', 'u2.id', '=', 'forms.user_change_content_id')
                ->leftjoin('accounts as u3', 'u3.id', '=', 'form_follows.account_id')
                ->leftjoin('accounts as u4', 'u4.id', '=', 'forms.user_reprocessing_recommendations_id')
                ->leftJoin('citizen_project', function ($join) {
                    $join->on('citizen_project.project_id', '=', 'projects.id');
                    $join->on('citizen_project.citizen_id', '=', 'citizens.id');

                })
                ->select('forms.id',
                    'forms.form_no',
                    'forms.hide_data',
                    'citizens.first_name',
                    'citizens.father_name',
                    'citizens.grandfather_name',
                    'citizens.last_name',
                    'citizens.id_number',
                    'citizens.governorate',
                    'citizens.city',
                    'citizens.street',
                    'citizens.mobile',
                    'citizens.mobile2',
                    'projects.id as project_id',
                    'projects.name as binfit',
                    'projects.name as zammes',
                    'projects.end_date as project_end_date',
                    'projects.end_date  as project_status',
                    'sent_type.name  as senmmes',
                    'forms.account_id',
                    'forms.need_clarification',
                    'forms.have_clarified',
                    'forms.reason_lack_clarification',
                    'forms.reformulate_content',
                    'forms.follower_reprocessing',
                    'accounts.full_name as employee_name',
                    'circles.name as employee_circle',
                    'forms.datee',
                    'forms.created_at',
                    'form_type.name  as ammes',
                    'categories.name as nammes',
                    'categories.id as category_id',
                    'forms.title',
                    'forms.content',
                    'form_status.name',
                    'forms.response_type',
                    'forms.required_respond',
                    'form_status.id as replay_status',
                    'citizen_project.id as project_request_id',
                    'citizen_project.project_request',
                    'form_follows.evaluate',
                    'form_follows.solve',
                    'form_follows.follow_reason_not',
                    'form_follows.datee as follow_datee',
                    'form_follows.notes as form_follow_notes',
                    'u2.full_name as user_change_content_full_name',
                    'u3.full_name as user_required_respond_full_name',
                    'forms.reprocessing_form_id',
                    'form_responses.response',
                    'form_responses.datee as form_responses_datee',
                    'u4.full_name as user_reprocessing_recommendations_full_name',
                    'forms.box_place',
                    'forms.date_open_box',
                    'forms.number_of_open_box',
                    'forms.type_of_followup_visit',
                    'oldcategories.name as old_category',
                    'oldcategories.id as old_category_id'
                )
                ->whereRaw("true");
        }

        $items = $items->where(function ($query) {

            return $query->when(request('read'), function ($query) {

                return $query->where('read', request('read'));

            });

        })->where(function ($query) {

            return $query->when(request('status'), function ($query) {
                return $query->where('status', request('status'));

            });

        })->where(function ($query) {

            return $query->when(request('replay_status'), function ($query) {

                return $query->where('form_follows.solve', request('replay_status'));

            });


        })->where(function ($query) {

            return $query->when(request('type'), function ($query) {

                return $query->where('forms.type', request('type'));

            });


        })->where(function ($query) {

            return $query->when(request('ids'), function ($query) {
                $keywords = preg_split("/[\s,]+/", request('ids'));
                return $query->whereIn('forms.id', $keywords);

            });


        })->where(function ($query) {

            return $query->when(request('id'), function ($query) {

                return $query->where('forms.id', request('id'));

            });


        })->where(function ($query) {

            return $query->when(request('active'), function ($query) {

                return $query->where('projects.active', request('active'));

            });

        })->where(function ($query) {

            return $query->when(request('id_number'), function ($query) {

                return $query->where('citizens.id_number', request('id_number'));

            });


        })->where(function ($query) {

            return $query->when(request('citizen_id'), function ($query) {

                return $query->where('citizens.first_name', 'like', request('citizen_id'));

            });


        })->where(function ($query) {

            return $query->when(request('category_name') == "0", function ($query) {

                return $query->where('forms.project_id', '!=', 1);

            });

        })->where(function ($query) {

            return $query->when(request('category_name') == "1", function ($query) {

                return $query->where('forms.project_id', 1);

            });


        })->where(function ($query) {

            return $query->when(request('evaluate'), function ($query) {

                return $query->where('form_follows.evaluate', request('evaluate'));

            });

        })->where(function ($query) {

            return $query->when(request('project_id'), function ($query) {
                if (request('project_id') == -1) {
                    return $query->whereRaw("true");
                } else {
                    return $query->where('forms.project_id', request('project_id'));
                }

            });

        })->where(function ($query) {

            return $query->when(request('sent_type'), function ($query) {

                return $query->where('sent_type', request('sent_type'));

            });
        })->where(function ($query) {

            return $query->when(request('category_id'), function ($query) {

                return $query->where('category_id', request('category_id'));

            });

        })->where(function ($query) {

            return $query->when(request('datee'), function ($query) {

                return $query->where('forms.datee', Carbon::parse(request('datee'))->format('Y-m-d'));

            });


        })->where(function ($query) {

            return $query->when(request('from_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);

            });

        })->where(function ($query) {

            return $query->when(request('to_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);

            });

        })->orderBy('forms.form_no', 'asc')->get();

        $projects = Account::find(auth()->user()->account->id)->projects->all();
//        $categories = auth()->user()->account->circle->category->all();
        $categories = Category::all();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::all();
        $project_status = Project_status::all();

        foreach ($items as $item) {

            if ($item->project_status < now()) {
                $item->project_status = "منتهي";
            } else {
                $item->project_status = "مستمر";
            }

            if ($item->account_id == null) {
                $item->account_id = "المواطن نفسه";
            } else {
                $item->account_id = "أحد موظفي المركز";
            }

            if (!is_null($item->response_type ) && $item->response_type == 1) {
                $item->response_type = "تتطلب اجراءات مطولة للرد";
            } elseif (!is_null($item->response_type ) && $item->response_type == 0)  {
                $item->response_type = "يمكن الرد عليها مباشرة";
            }else{
                $item->response_type = "_";
            }

            if (!is_null($item->replay_status ) && $item->replay_status == 1) {
                $item->replay_status = "قيد الدراسة";
            } elseif (!is_null($item->replay_status ) && $item->replay_status == 2) {
                $item->replay_status = "تم الرد";
            } else {
                $item->replay_status = "_";

            }
        }


        $project_name = "";

        if ($request['theaction'] == 'excel') {
            $items = Form::with('form_follow', 'form_response')->whereIn('id', $items->pluck('id'))->get();
            return Excel::download(new FormsExport($items), "Annex Template 01-" . date('dmY') . ".xlsx");

        } elseif ($request['theaction'] == 'print') {
            $items = Form::find($items->pluck('id'));
            $pdf = PDF::loadView('account.form.printall', compact('items', 'form_type', "form_status", "sent_typee", "projects"));
            return $pdf->stream("forms_$project_name.pdf");
        } else {

            if ($request['theaction'] == 'search') {
                $items = Form::with('form_follow', 'form_response')->whereIn('id', $items->pluck('id'))->paginate(5);
                $items->appends(['q' => $q, 'theaction' => 'search', 'read' => $read, 'evaluate' => $evaluate,
                    'from_date' => $from_date, 'to_date' => $to_date, 'q1' => $q1,
                    'category_id' => $category_id, 'datee' => $datee, 'status' => $status,
                    'type' => $type, 'sent_type' => $sent_type, 'project_id' => $project_id, 'replay_status' => $replay_status
                ]);


            } else {
                $items_empty = Form::distinct()->where('forms.deleted_at', null)
                    ->whereIn('forms.project_id', Account::find(auth()->user()->account->id)
                        ->projects()->with('account_projects')->pluck('projects.id'))
                    ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                        ->with('circle_categories')->pluck('categories.id'))
                    ->join('projects', 'projects.id', '=', 'forms.project_id')
                    ->leftJoin('accounts', 'accounts.id', '=', 'forms.account_id')
                    ->leftJoin('circles', 'circles.id', '=', 'accounts.circle_id')
                    ->join('project_status', 'projects.active', '=', 'project_status.id')
                    ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
                    ->join('form_status', 'forms.status', '=', 'form_status.id')
                    ->join('form_type', 'forms.type', '=', 'form_type.id')
                    ->join('categories', 'categories.id', '=', 'forms.category_id')
                    ->leftJoin('categories as oldcategories', 'oldcategories.id', '=', 'forms.old_category_id')
                    ->leftjoin('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->leftjoin('accounts as u2', 'u2.id', '=', 'forms.user_change_content_id')
                    ->leftjoin('accounts as u3', 'u3.id', '=', 'form_follows.account_id')
                    ->leftjoin('accounts as u4', 'u4.id', '=', 'forms.user_reprocessing_recommendations_id')
                    ->leftJoin('citizen_project', function ($join) {
                        $join->on('citizen_project.project_id', '=', 'projects.id');
                        $join->on('citizen_project.citizen_id', '=', 'citizens.id');

                    })
                    ->select('forms.id',
                        'forms.form_no',
                        'forms.hide_data',
                        'citizens.first_name',
                        'citizens.father_name',
                        'citizens.grandfather_name',
                        'citizens.last_name',
                        'citizens.id_number',
                        'citizens.governorate',
                        'citizens.city',
                        'citizens.street',
                        'citizens.mobile',
                        'citizens.mobile2',
                        'projects.id as project_id',
                        'projects.name as binfit',
                        'projects.name as zammes',
                        'projects.end_date as project_end_date',
                        'projects.end_date  as project_status',
                        'sent_type.name  as senmmes',
                        'forms.account_id',
                        'forms.need_clarification',
                        'forms.have_clarified',
                        'forms.reason_lack_clarification',
                        'forms.reformulate_content',
                        'forms.follower_reprocessing',
                        'accounts.full_name as employee_name',
                        'circles.name as employee_circle',
                        'forms.datee',
                        'forms.created_at',
                        'form_type.name  as ammes',
                        'categories.name as nammes',
                        'categories.id as category_id',
                        'forms.title',
                        'forms.content',
                        'form_status.name',
                        'forms.response_type',
                        'forms.required_respond',
                        'form_status.id as replay_status',
                        'citizen_project.id as project_request_id',
                        'citizen_project.project_request',
                        'form_follows.evaluate',
                        'form_follows.solve',
                        'form_follows.follow_reason_not',
                        'form_follows.datee as follow_datee',
                        'form_follows.notes as form_follow_notes',
                        'u2.full_name as user_change_content_full_name',
                        'u3.full_name as user_required_respond_full_name',
                        'forms.reprocessing_form_id',
                        'form_responses.response',
                        'form_responses.datee as form_responses_datee',
                        'u4.full_name as user_reprocessing_recommendations_full_name',
                        'forms.box_place',
                        'forms.date_open_box',
                        'forms.number_of_open_box',
                        'forms.type_of_followup_visit',
                        'oldcategories.name as old_category',
                        'oldcategories.id as old_category_id'
                    )->get();

                $items = Form::with('form_follow', 'form_response')->whereIn('id', $items_empty->pluck('id'))->paginate(5);

            }

            return view("account.form.index", compact("items", 'form_type', "form_status", "sent_typee", "projects", "type", "categories", "project_status"));
        }
    }

    public function index_private(Request $request)
    {
        $read = $request["read"] ?? "";
        $evaluate = $request["evaluate"] ?? "";
        $from_date = $request["from_date"] ?? "";
        $to_date = $request["to_date"] ?? "";
        $q = $request["q"] ?? "";
        $q1 = $request["q1"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $datee = $request["datee"] ?? "";
        $status = $request["status"] ?? "";
        $type = $request["type"] ?? "";
        $sent_type = $request["sent_type"] ?? "";
        $project_id = $request["project_id"] ?? "";
        $replay_status = $request["replay_status"] ?? "";
        $active = $request["active"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);
        $ids = $request["ids"] ?? "";


        if (count($keywords) == 3) {
            $keywords[3] = "";
        }
        if (count($keywords) == 2) {
            $keywords[2] = "";
            $keywords[3] = "";
        }
        if (count($keywords) == 1) {
            $keywords[1] = "";
            $keywords[2] = "";
            $keywords[3] = "";
        }

        if (auth()->user()->account->id == 1) {
            $items = Form::distinct()->where('forms.deleted_at', null)->where('forms.hide_data',1)
                ->join('projects', 'projects.id', '=', 'forms.project_id')
                ->leftJoin('accounts', 'accounts.id', '=', 'forms.account_id')
                ->leftJoin('circles', 'circles.id', '=', 'accounts.circle_id')
                ->join('project_status', 'projects.active', '=', 'project_status.id')
                ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
                ->join('form_status', 'forms.status', '=', 'form_status.id')
                ->join('form_type', 'forms.type', '=', 'form_type.id')
                ->join('categories', 'categories.id', '=', 'forms.category_id')
                ->leftJoin('categories as oldcategories', 'oldcategories.id', '=', 'forms.old_category_id')
                ->leftJoin('category_circles as c1', 'c1.category_id', '=', 'categories.id')
                ->leftJoin('category_circles as c2', 'c2.circle_id', '=', 'circles.id')
                ->leftJoin('procedure_type', 'procedure_type.id', '=', 'c1.procedure_type')
                ->leftJoin('category_circles as c3', 'c3.procedure_type', '=', 'procedure_type.id')
                ->join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                ->leftjoin('accounts as u2', 'u2.id', '=', 'forms.user_change_content_id')
                ->leftjoin('accounts as u3', 'u3.id', '=', 'form_follows.account_id')
                ->leftjoin('accounts as u4', 'u4.id', '=', 'forms.user_reprocessing_recommendations_id')
                ->leftJoin('citizen_project', function ($join) {
                    $join->on('citizen_project.project_id', '=', 'projects.id');
                    $join->on('citizen_project.citizen_id', '=', 'citizens.id');

                })

                ->select('forms.id',
                    'forms.form_no',
                    'citizens.first_name',
                    'citizens.father_name',
                    'citizens.grandfather_name',
                    'citizens.last_name',
                    'citizens.id_number',
                    'citizens.governorate',
                    'citizens.city',
                    'citizens.street',
                    'citizens.mobile',
                    'citizens.mobile2',
                    'projects.id as project_id',
                    'projects.name as binfit',
                    'projects.end_date as project_end_date',
                    'projects.name as zammes',
                    'projects.end_date  as project_status',
                    'sent_type.name  as senmmes',
                    'forms.account_id',
                    'forms.need_clarification',
                    'forms.have_clarified',
                    'forms.reason_lack_clarification',
                    'forms.reformulate_content',
                    'forms.follower_reprocessing',
                    'accounts.full_name as employee_name',
                    'circles.name as employee_circle',
                    'forms.datee',
                    'forms.created_at',
                    'form_type.name  as ammes',
                    'categories.name as nammes',
                    'categories.id as category_id',
                    'forms.title',
                    'forms.content',
                    'form_status.name',
                    'forms.response_type',
                    'forms.required_respond',
                    'form_status.id as replay_status',
                    'citizen_project.id as project_request_id',
                    'citizen_project.project_request',
                    'form_follows.evaluate',
                    'form_follows.solve',
                    'form_follows.follow_reason_not',
                    'form_follows.datee as follow_datee',
                    'form_follows.notes as form_follow_notes',
                    'u2.full_name as user_change_content_full_name',
                    'u3.full_name as user_required_respond_full_name',
                    'forms.reprocessing_form_id',
                    'form_responses.response',
                    'form_responses.datee as form_responses_datee',
                    'u4.full_name as user_reprocessing_recommendations_full_name',
                    'forms.box_place',
                    'forms.date_open_box',
                    'forms.number_of_open_box',
                    'forms.type_of_followup_visit',
                    'oldcategories.name as old_category',
                    'oldcategories.id as old_category_id'
                )
                ->whereRaw("true");
        }
        else {
            $items = Form::distinct()->where('forms.deleted_at', null)->where('forms.hide_data',1)
                ->whereIn('forms.project_id', Account::find(auth()->user()->account->id)
                    ->projects()->with('account_projects')->pluck('projects.id'))
                ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                    ->with('circle_categories')->pluck('categories.id'))
                ->join('projects', 'projects.id', '=', 'forms.project_id')
                ->leftJoin('accounts', 'accounts.id', '=', 'forms.account_id')
                ->leftJoin('circles', 'circles.id', '=', 'accounts.circle_id')
                ->join('project_status', 'projects.active', '=', 'project_status.id')
                ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
                ->join('form_status', 'forms.status', '=', 'form_status.id')
                ->join('form_type', 'forms.type', '=', 'form_type.id')
                ->join('categories', 'categories.id', '=', 'forms.category_id')
                ->leftJoin('categories as oldcategories', 'oldcategories.id', '=', 'forms.old_category_id')
                ->join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                ->leftJoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                ->leftJoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                ->leftjoin('accounts as u2', 'u2.id', '=', 'forms.user_change_content_id')
                ->leftjoin('accounts as u3', 'u3.id', '=', 'form_follows.account_id')
                ->leftjoin('accounts as u4', 'u4.id', '=', 'forms.user_reprocessing_recommendations_id')
                ->leftJoin('citizen_project', function ($join) {
                    $join->on('citizen_project.project_id', '=', 'projects.id');
                    $join->on('citizen_project.citizen_id', '=', 'citizens.id');

                })
                ->select('forms.id',
                    'forms.form_no',
                    'citizens.first_name',
                    'citizens.father_name',
                    'citizens.grandfather_name',
                    'citizens.last_name',
                    'citizens.id_number',
                    'citizens.governorate',
                    'citizens.city',
                    'citizens.street',
                    'citizens.mobile',
                    'citizens.mobile2',
                    'projects.id as project_id',
                    'projects.name as binfit',
                    'projects.name as zammes',
                    'projects.end_date as project_end_date',
                    'projects.end_date  as project_status',
                    'sent_type.name  as senmmes',
                    'forms.account_id',
                    'forms.need_clarification',
                    'forms.have_clarified',
                    'forms.reason_lack_clarification',
                    'forms.reformulate_content',
                    'forms.follower_reprocessing',
                    'accounts.full_name as employee_name',
                    'circles.name as employee_circle',
                    'forms.datee',
                    'forms.created_at',
                    'form_type.name  as ammes',
                    'categories.name as nammes',
                    'categories.id as category_id',
                    'forms.title',
                    'forms.content',
                    'form_status.name',
                    'forms.response_type',
                    'forms.required_respond',
                    'form_status.id as replay_status',
                    'citizen_project.id as project_request_id',
                    'citizen_project.project_request',
                    'form_follows.evaluate',
                    'form_follows.solve',
                    'form_follows.follow_reason_not',
                    'form_follows.datee as follow_datee',
                    'form_follows.notes as form_follow_notes',
                    'u2.full_name as user_change_content_full_name',
                    'u3.full_name as user_required_respond_full_name',
                    'forms.reprocessing_form_id',
                    'form_responses.response',
                    'form_responses.datee as form_responses_datee',
                    'u4.full_name as user_reprocessing_recommendations_full_name',
                    'forms.box_place',
                    'forms.date_open_box',
                    'forms.number_of_open_box',
                    'forms.type_of_followup_visit',
                    'oldcategories.name as old_category',
                    'oldcategories.id as old_category_id'
                )
                ->whereRaw("true");
        }

        $items = $items->where(function ($query) {

            return $query->when(request('read'), function ($query) {

                return $query->where('read', request('read'));

            });

        })->where(function ($query) {

            return $query->when(request('status'), function ($query) {
                return $query->where('status', request('status'));

            });

        })->where(function ($query) {

            return $query->when(request('replay_status'), function ($query) {

                return $query->where('form_follows.solve', request('replay_status'));

            });


        })->where(function ($query) {

            return $query->when(request('type'), function ($query) {

                return $query->where('forms.type', request('type'));

            });


        })->where(function ($query) {

            return $query->when(request('ids'), function ($query) {
                $keywords = preg_split("/[\s,]+/", request('ids'));
                return $query->whereIn('forms.id', $keywords);

            });


        })->where(function ($query) {

            return $query->when(request('id'), function ($query) {

                return $query->where('forms.id', request('id'));

            });


        })->where(function ($query) {

            return $query->when(request('active'), function ($query) {

                return $query->where('projects.active', request('active'));

            });

        })->where(function ($query) {

            return $query->when(request('id_number'), function ($query) {

                return $query->where('citizens.id_number', request('id_number'));

            });


        })->where(function ($query) {

            return $query->when(request('citizen_id'), function ($query) {

                return $query->where('citizens.first_name', 'like', request('citizen_id'));

            });


        })->where(function ($query) {

            return $query->when(request('category_name') == "0", function ($query) {

                return $query->where('forms.project_id', '!=', 1);

            });

        })->where(function ($query) {

            return $query->when(request('category_name') == "1", function ($query) {

                return $query->where('forms.project_id', 1);

            });


        })->where(function ($query) {

            return $query->when(request('evaluate'), function ($query) {

                return $query->where('form_follows.evaluate', request('evaluate'));

            });

        })->where(function ($query) {

            return $query->when(request('project_id'), function ($query) {
                if (request('project_id') == -1) {
                    return $query->whereRaw("true");
                } else {
                    return $query->where('forms.project_id', request('project_id'));
                }

            });

        })->where(function ($query) {

            return $query->when(request('sent_type'), function ($query) {

                return $query->where('sent_type', request('sent_type'));

            });
        })->where(function ($query) {

            return $query->when(request('category_id'), function ($query) {

                return $query->where('category_id', request('category_id'));

            });

        })->where(function ($query) {

            return $query->when(request('datee'), function ($query) {

                return $query->where('forms.datee', Carbon::parse(request('datee'))->format('Y-m-d'));

            });


        })->where(function ($query) {

            return $query->when(request('from_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);

            });

        })->where(function ($query) {

            return $query->when(request('to_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);

            });

        })->orderBy('forms.form_no', 'asc')->get();

        $projects = Account::find(auth()->user()->account->id)->projects->all();
//        $categories = auth()->user()->account->circle->category->all();
        $categories = Category::all();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::all();
        $project_status = Project_status::all();

        foreach ($items as $item) {

            if ($item->project_status < now()) {
                $item->project_status = "منتهي";
            } else {
                $item->project_status = "مستمر";
            }

            if ($item->account_id == null) {
                $item->account_id = "المواطن نفسه";
            } else {
                $item->account_id = "أحد موظفي المركز";
            }

            if (!is_null($item->response_type ) && $item->response_type == 1) {
                $item->response_type = "تتطلب اجراءات مطولة للرد";
            } elseif (!is_null($item->response_type ) && $item->response_type == 0)  {
                $item->response_type = "يمكن الرد عليها مباشرة";
            }else{
                $item->response_type = "_";
            }

            if (!is_null($item->replay_status ) && $item->replay_status == 1) {
                $item->replay_status = "قيد الدراسة";
            } elseif (!is_null($item->replay_status ) && $item->replay_status == 2) {
                $item->replay_status = "تم الرد";
            } else {
                $item->replay_status = "_";

            }
        }


        $project_name = "";

        if ($request['theaction'] == 'excel') {
//            $items = Form::whereIn('id', $items->pluck('id'))->get();
            $items = $items;
            return Excel::download(new FormsExport($items), "Annex Template 11-" . date('dmY') . ".xlsx");

        } elseif ($request['theaction'] == 'print') {
            $items = Form::find($items->pluck('id'));
            $pdf = PDF::loadView('account.form.printall', compact('items', 'form_type', "form_status", "sent_typee", "projects"));
            return $pdf->stream("forms_$project_name.pdf");
        } else {

            if ($request['theaction'] == 'search') {
                $items = Form::with('form_follow', 'form_response')->whereIn('id', $items->pluck('id'))->paginate(5);
                $items->appends(['q' => $q, 'theaction' => 'search', 'read' => $read, 'evaluate' => $evaluate,
                    'from_date' => $from_date, 'to_date' => $to_date, 'q1' => $q1,
                    'category_id' => $category_id, 'datee' => $datee, 'status' => $status,
                    'type' => $type, 'sent_type' => $sent_type, 'project_id' => $project_id, 'replay_status' => $replay_status
                ]);


            } else {
                $items = "";
            }

            return view("account.form.index_private", compact("items", 'form_type', "form_status", "sent_typee", "projects", "type", "categories", "project_status"));
        }
    }


    public function edit($id)
    {
        Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
        return redirect("/account/form");
    }

    public function create()
    {
        Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
        return redirect("/account/form");
    }

    public function store(FormsRequest $request)
    {

    }

    public function addreplay($id, Form_responseRequest $request)
    {
        $item = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->where('to_replay', 1)->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->where('to_replay', 1)->pluck('categories.id'))
            ->find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:ليس لك صلاحية إضافة رد");
            return redirect("/account/form");
        }

        $item = new Form_response();
        $form = Form::find($id);
        $form->fill(['status' => '2']);
        $form->save();
        $request['form_id'] = $id;
        $request['datee'] = date('Y-m-d');
        $request['account_id'] = Auth::user()->account->id;
        $item::create($request->all());
        session::flash('msg', 's:تمت إضافة رد بنجاح');

        $theform = $form;
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories->where('to_notify', 1)
                ->pluck('circle_id')->toArray())->where('id', '!=', auth()->user()->id)->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects->where('to_notify', 1)
                ->where('account_id', '!=', auth()->user()->id)->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');
            for ($i = 0; $i < count($users_ids); $i++) {
//                if (User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id))
                if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                    NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $users_ids[$i], 'type' => 'من موظف', 'title' => 'تم اضافة رد من قبل موظف', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);

            }
        }

        return redirect('/citizen/form/show/' . Form::find($id)->citizen->id_number . '/' . $id);
    }

    public function terminateform($id)
    {
        $form = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->pluck('categories.id'))
            ->find($id);
        if ($form == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }
        $form->fill(['status' => '3']);
        $form->save();
        session::flash('msg', 's:تم إيقاف الشكوى');

        $theform = $form;
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories
                ->pluck('circle_id')->toArray())->where('id', '!=', auth()->user()->id)->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects
                ->where('account_id', '!=', auth()->user()->id)->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');
            for ($i = 0; $i < count($users_ids); $i++) {
//                if (User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id))
                if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                    NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $users_ids[$i], 'type' => 'من موظف', 'title' => 'تم ايقاف نموذج من قبل موظف', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);

            }
        }

        return redirect('/citizen/form/show/' . $form->citizen->id_number . '/' . $id);
    }

    public function allowform($id)
    {
        $form = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->pluck('categories.id'))
            ->find($id);
        if ($form == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }
        $formresp = Form_response::whereIn('form_id', [$form->id])->pluck('id');
        if (count($formresp) > 0)
            $form->fill(['status' => '2']);
        else
            $form->fill(['status' => '1']);
        $form->save();
        session::flash('msg', 's:تم السماح بالشكوى');

        $theform = $form;
        if ($theform->project->account_projects->first() && $theform->category->circle_categories->first()) {
            $accouts_ids_in_circle = Account::WhereIn('circle_id', $theform->category->circle_categories->where('to_notify', 1)
                ->where('id', '!=', auth()->user()->id)->pluck('circle_id')->toArray())->pluck('id')->toArray();
            $accouts_ids_in_project = $theform->project->account_projects->where('to_notify', 1)
                ->where('account_id', '!=', auth()->user()->id)->pluck('account_id')->toArray();
            $accouts_ids = array_merge($accouts_ids_in_circle, $accouts_ids_in_project);

            $users_ids = Account::find($accouts_ids)->pluck('user_id');
            for ($i = 0; $i < count($users_ids); $i++) {
//                if (User::find($users_ids[$i])->account->links->contains(\App\Link::where('title', '=', 'الإشعارات')->first()->id))
                if (check_permission_with_user_id('الإشعارات', $users_ids[$i]))
                    NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $users_ids[$i], 'type' => 'موظف', 'title' => 'تم اعادة السماح لنموذج من موظف', 'link' => "/citizen/form/show/" . $theform->citizen->id_number . "/$theform->id"]);

            }
        }

        return redirect('/citizen/form/show/' . $form->citizen->id_number . '/' . $id);
    }

    public function addfollw($id)
    {
        return view("account.form.addfollw");
    }

    public function update(FormsRequest $request, $id)
    {

    }

    public function destroy(Request $request)
    {
        $item = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->where('to_edit', 1)->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->where('to_edit', 1)->pluck('categories.id'))->find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }
        if ($item->status != "3") {
            Session::flash("msg", "e:لا يمكن حذف نموذج قبل تعليقه");
            return redirect("/account/form");
        }
        $formresp = Form_response::whereIn('form_id', [$item->id])->pluck('id');
        $formfoll = Form_follow::whereIn('form_id', [$item->id])->pluck('id');
        $formfile = Form_file::whereIn('form_id', [$item->id])->pluck('id');
        //   $formfile_name = Form_file::whereIn('form_id', [$item->id])->pluck('name');

        if (count($formresp) > 0) {
            foreach ($formresp as $one) {
                $response = Form_response::where('id', $one)->first();
                $response->deleted_at = Carbon::now();
                $response->save();
            }
        }

        if (count($formfoll) > 0) {
            foreach ($formfoll as $foll) {
                $follow = Form_follow::where('id', $foll)->first();
                $follow->deleted_at = Carbon::now();
                $follow->save();
            }
        }

        if (count($formfile) > 0) {
            foreach ($formfile as $file) {
                $the_file = Form_file::where('id', $file)->first();
                $the_file->deleted_at = Carbon::now();
                $the_file->save();
            }
        }

        $item->deleted_at = Carbon::now();
        $item->deleted_by = Auth::id();
        $item->deleted_because = $request['reason'];
        $item->save();
        Session::flash("msg", "تم حذف نموذج بنجاح");
        return Response(['success' => true]);


    }

    public function confirm_destroy_from_citizian(Request $request)
    {
        $item = Form::find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        $formresp = Form_response::whereIn('form_id', [$item->id])->pluck('id');
        $formfoll = Form_follow::whereIn('form_id', [$item->id])->pluck('id');
        $formfile = Form_file::whereIn('form_id', [$item->id])->pluck('id');
        //   $formfile_name = Form_file::whereIn('form_id', [$item->id])->pluck('name');

        if (count($formresp) > 0) {
            foreach ($formresp as $one) {
                $response = Form_response::where('id', $one)->first();
                $response->deleted_at = Carbon::now();
                $response->save();
            }
        }

        if (count($formfoll) > 0) {
            foreach ($formfoll as $foll) {
                $follow = Form_follow::where('id', $foll)->first();
                $follow->deleted_at = Carbon::now();
                $follow->save();
            }
        }

        if (count($formfile) > 0) {
            foreach ($formfile as $file) {
                $the_file = Form_file::where('id', $file)->first();
                $the_file->deleted_at = Carbon::now();
                $the_file->save();
            }
        }

        $item->deleted_at = Carbon::now();
        $item->recommendations_for_deleting = "يوصي بإتمام عملية الحذف";
        $item->user_recommendations_for_deleting_id = auth()->user()->account->id;
        $item->save();

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
            ->get();

        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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
            NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بوجود اقتراح/ شكوى تمت المصادقة على حذفها', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id"]);
        }
        return Response(['success' => true, 'msg' => "تمت تأكيد عملية الحذف بنجاح"]);

    }

    public function confirm_follow_reason_not(Request $request)
    {
        $item = Form::find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }
        $item->confirm_follow_reason_not = 1;
        $item->recommendations_for_follow_reason_not = "يوصى بإغلاق الشكوى";
        $item->user_recommendations_for_follow_reason_not_id = auth()->user()->account->id;
        $item->status= 3;
        $item->save();

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
            ->get();

        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
            ->pluck('rate', 'account_id')->toArray();

        foreach ($categoryCircles as $categoryCircle) {
            if ($categoryCircle->procedure_type == 4) {
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
            NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'لديك اقتراح/ شكوى بحاجة لإعادة تبليغ الرد لمقدمها', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id". "?step=5"]);
        }
        return Response(['success' => true, 'msg' => "تمت تأكيد عملية الإغلاق بنجاح"]);

    }

    public function confirm_detory_reprocessing_recommendations_from_citizian(Request $request)
    {
        $item = Form::find($request['id']);
        if ($item->type) {
            $formtype = "الشكوى";
        } else {
            $formtype = "الاقتراح";
        }

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        $item->recommendations_for_deleting = "يوصي بإعادة معالجة " . $formtype . " مع أخذ بعين الاعتبار التوصيات التالية:" . $request['recommendations_for_deleting'];
        $item->user_recommendations_for_deleting_id = auth()->user()->account->id;
        $item->save();


        $form = new Form();
        $form->type = $item->type;
        $form->title = $item->title;
        $form->citizen_id = $item->citizen_id;
        $form->project_id = $item->project_id;
        $form->sent_type = $item->sent_type;
        $form->category_id = $item->category_id;
        $form->status = 1;
        $form->content = $item->content;
        $form->datee = $item->datee;
        $form->reprocessing_parent_form_id = $item->id;
        $form->form_no = $item->id.'_02';
        if ($form->save()) {
            $item->reprocessing_form_id = $form->id;
            $item->save();
        }

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
            ->get();

        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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
            NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بإعادة معالجة الاقتراح/الشكوى', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id" . "?step=2"]);

        }
        return Response(['success' => true, 'msg' => "تمت تأكيد عملية الحذف بنجاح"]);

    }

    public function confirm_follow_reason_not_reprocessing_recommendations(Request $request)
    {
        $item = Form::find($request['id']);
        if ($item->type) {
            $formtype = "الشكوى";
        } else {
            $formtype = "الاقتراح";
        }

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        $item->recommendations_for_follow_reason_not = $request['recommendations_for_follow_reason_not'];
        $item->user_recommendations_for_follow_reason_not_id = auth()->user()->account->id;
        $item->save();


//        $form = new Form();
//        $form->type = $item->type;
//        $form->title = $item->title;
//        $form->citizen_id = $item->citizen_id;
//        $form->project_id = $item->project_id;
//        $form->sent_type = $item->sent_type;
//        $form->category_id = $item->category_id;
//        $form->status = 1;
//        $form->content = $item->content;
//        $form->datee = $item->datee;
//        $form->reprocessing_parent_form_id = $item->id;
//        if ($form->save()) {
//            $item->reprocessing_form_id = $form->id;
//            $item->save();
//        }

        $categoryCircles_users1 = $auth_circle_users = array();

        $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
            ->get();

        $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
            ->pluck('rate', 'account_id')->toArray();

        foreach ($categoryCircles as $categoryCircle) {
            if ($categoryCircle->procedure_type == 4) {
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
            NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بإعادة تبيلغ الرد', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id" . "?step=5"]);

        }
//        return Response(['success' => true, 'msg' => "تمت العملية بنجاح"]);

        Session::flash("msg", "تمت العملية بنجاح");
        return redirect("/account");

    }


    public function destroy_from_citizian(Request $request)
    {
//        $item = Form::whereIn('project_id', Account::find(auth()->user()->account->id)
//            ->projects()->with('account_projects')->pluck('projects.id'))
//            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
//                ->with('circle_categories')->pluck('categories.id'))->find($request['id']);

        $item = Form::find($request['id']);

        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/form");
        }

        if ($request['deleting'] == 1) {
            $item->confirm_deleting = Carbon::now();
            $item->deleting = $request['deleting'];
            $item->deleted_by = Auth::id();
            $item->deleted_because = $request['reason'];
            $item->save();

            $categoryCircles_users1 = $auth_circle_users = array();

            $categoryCircles = CategoryCircles::where('category_id', '=', $item->category->id)
                ->get();

            $userinprojects = AccountProjects::select('rate', 'account_id')->where('project_id', '=', $item->project_id)
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

            foreach ($auth_circle_users as $AccountProjects_user) {
                $user = Account::find($AccountProjects_user);
                NotificationController::insert(['receiver_id' => auth()->user()->account->id,'user_id' => $user->user_id, 'type' => 'موظف', 'form_id' => $item->id, 'title' => 'تنبيه بوجود اقتراح/ شكوى تم حذفها من حساب موظف', 'link' => "/citizen/form/show/" . $item->citizen->id_number . "/$item->id" . "?step=2"]);
            }
            $msg = "تمت عملية الحذف بنجاح";
        } else {
            $item->deleting = $request['deleting'];
            $item->save();
            $msg = "تمت الحفظ بنجاح";
        }

        $item = Form::whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->pluck('categories.id'))->find($request['id']);

        return Response(['success' => true, 'msg' => $msg, 'item' => $item]);
    }

    public function deleted_form(Request $request)
    {

        $q = $request["q"] ?? "";
        $category_name = $request["category_name"] ?? "";
        $project_id = $request["project_id"] ?? "";
        $sent_type = $request["sent_type"] ?? "";
        $type = $request["type"] ?? "";
        $category_id = $request["category_id"] ?? "";
        $datee = $request["datee"] ?? "";
        $from_date = $request["from_date"] ?? "";
        $to_date = $request["to_date"] ?? "";
        $deleted_by = $request["deleted_by"] ?? "";
        $keywords = preg_split("/[\s,]+/", $q);

        if (count($keywords) == 3) {
            $keywords[3] = "";
        }
        if (count($keywords) == 2) {
            $keywords[2] = "";
            $keywords[3] = "";
        }
        if (count($keywords) == 1) {
            $keywords[1] = "";
            $keywords[2] = "";
            $keywords[3] = "";
        }


        $items = Form::where('deleted_at', '!=', null)->whereIn('project_id', Account::find(auth()->user()->account->id)->projects()->with('account_projects')->pluck('projects.id'))
            ->whereIn('category_id', Account::find(auth()->user()->account->id)->circle->category()
                ->with('circle_categories')->pluck('categories.id'))
            ->join('projects', 'projects.id', '=', 'forms.project_id')
            ->join('project_status', 'projects.active', '=', 'project_status.id')
            ->join('sent_type', 'forms.sent_type', '=', 'sent_type.id')
            ->join('form_status', 'forms.status', '=', 'form_status.id')
            ->join('form_type', 'forms.type', '=', 'form_type.id')
            ->join('accounts', 'accounts.id', '=', 'forms.account_id')
            ->join('categories', 'categories.id', '=', 'forms.category_id')
            ->leftjoin('citizens', 'citizens.id', '=', 'forms.citizen_id')
            ->select('forms.id',
                'forms.hide_data',
                'citizens.first_name',
                'citizens.father_name',
                'citizens.grandfather_name',
                'citizens.last_name',
                'citizens.id_number',
                'citizens.governorate',
                'citizens.city',
                'citizens.street',
                'citizens.mobile',
                'citizens.mobile2',
                'projects.name as binfit',
                'projects.name as zammes',
                'projects.end_date  as project_status',
                'sent_type.name  as senmmes',
                'forms.account_id',
                'accounts.full_name as employee_name',
                'forms.datee',
                'forms.created_at',
                'forms.hide_data',
                'form_type.name  as ammes',
                'categories.name as nammes',
                'forms.title',
                'forms.content',
                'forms.deleted_by',
                'accounts.circle_id',
                'forms.deleted_because',
                'forms.deleted_at as deleted_at')
            ->whereRaw("true");


        if ($q)
            $items->whereRaw("(
            (first_name like ? and father_name like ? and grandfather_name like ? and last_name like ?)
            or (first_name like ? and last_name like ? and grandfather_name like ? and father_name like ?)
            or (first_name like ? and grandfather_name like ? and last_name like ? and father_name like ?)
            or (father_name like ? and grandfather_name like ? and first_name like ? and last_name like ?)
            or (father_name like ? and last_name like ? and grandfather_name like ? and first_name like ?)
            or (grandfather_name like ? and last_name like ? and father_name like ? and first_name like ?)
            or first_name like ? or  father_name like? or grandfather_name like?  or  last_name like?

            or projects.name like ? or forms.title like ? or forms.id like ? or citizens.id_number like ?)"
                , ["%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$keywords[0]%", "%$keywords[1]%", "%$keywords[2]%", "%$keywords[3]%",
                    /**/
                    "%$q%", "%$q%", "%$q%", "%$q%",

                    "%$q%", "%$q%", "%$q%", "%$q%"]);


        $items = $items->where(function ($query) {

            return $query->when(request('project_id'), function ($query) {

                return $query->where([['project_id', request('project_id')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('active'), function ($query) {

                return $query->where('projects.active', request('active'));

            });

        })->where(function ($query) {

            return $query->when(request('category_name') == "1", function ($query) {

                return $query->where([['forms.project_id', 1], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('id'), function ($query) {

                return $query->where([['forms.id', request('id')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('id_number'), function ($query) {

                return $query->where([['citizens.id_number', request('id_number')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('citizen_id'), function ($query) {

                return $query->where([['citizens.first_name', 'like', request('citizen_id')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('category_name') == "0", function ($query) {

                return $query->where([['forms.project_id', '!=', 1], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('sent_type'), function ($query) {

                return $query->where([['sent_type', request('sent_type')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('type'), function ($query) {

                return $query->where([['forms.type', request('type')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('category_id'), function ($query) {

                return $query->where([['category_id', request('category_id')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('circle_id'), function ($query, $x) {
                $x = Account::where('circle_id', request('circle_id'))->first();
                if ($x) {

                    return $query->where([['deleted_by', $x->id], ['deleted_at', '!=', NULL]]);

                } else {
                    return $query->where('forms.id', 0);

                }
            });


        })->where(function ($query) {

            return $query->when(request('evaluate'), function ($query) {

                return $query->where([['evaluate', request('evaluate')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('status'), function ($query) {

                return $query->where([['status', request('status')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('deleted_by'), function ($query) {

                return $query->where([['deleted_by', request('deleted_by')], ['deleted_at', '!=', NULL]]);

            });


        })->where(function ($query) {

            return $query->when(request('datee'), function ($query) {

                return $query->where([['forms.datee', Carbon::parse(request('datee'))->format('Y-m-d')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('from_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('to_date'), function ($query) {

                return $query->where([['forms.datee', '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], ['forms.datee', '<=', Carbon::parse(request('to_date'))->format('Y-m-d')], ['deleted_at', '!=', NULL]]);

            });

        })->where(function ($query) {

            return $query->when(request('delete_date'), function ($query) {

                return $query->where([['forms.deleted_at', request('delete_date')], ['deleted_at', '!=', NULL]]);

            });

        })->get();

        $projects = Account::find(auth()->user()->account->id)->projects->all();
//        $categories = auth()->user()->account->circle->category->all();
        $categories = Category::all();
        $form_type = Form_type::all();
        $form_status = Form_status::all();
        $sent_typee = Sent_type::all();
        $accounts = Account::all();
        $circles = Circle::all();
        $project_status = Project_status::all();


        foreach ($items as $item) {

            if ($item->deleted_by) {
                $item->deleted_by = \App\Account::where('id', $item->deleted_by)->first()->full_name;
            }


            if ($item->binfit == 'غير مستفيد') {
                $item->binfit = "غير مستفيد";
            } else {
                $item->binfit = " مستفيد";

            }

            if ($item->project_status < now()) {
                $item->project_status = "منتهي";
            } else {
                $item->project_status = "مستمر";
            }

            if ($item->account_id == null) {
                $item->account_id = "المواطن نفسه";
            } else {
                $item->account_id = "أحد موظفي المركز";
            }

            if ($item->replay_status == 1) {
                $item->replay_status = "قيد الدراسة";
            } elseif ($item->replay_status == 2) {
                $item->replay_status = "تم الرد";
            } else {
                $item->replay_status = "";

            }
            foreach ($accounts as $account) {
                $account->circle_id = 'مدير النظام';
            }


        }

        $project_name = "";

        if ($request['theaction'] == 'excel')
            return Excel::download(new DeletedFormsExport(), "Annex Template 02-" . date('dmY') . ".xlsx");
        elseif ($request['theaction'] == 'print') {
            $items = Form::find($items->pluck('id'));
            $pdf = PDF::loadView('account.form.printall', compact('items', 'form_type', "form_status", "sent_typee", "projects", "project_status"));
            return $pdf->stream("forms_$project_name.pdf");
        } else {


            if ($request['theaction'] == 'search') {
                $items = Form::whereIn('id', $items->pluck('id'))->paginate(5);
                $items->appends(['q' => $q, 'theaction' => 'search',
                    'from_date' => $from_date, 'to_date' => $to_date,
                    'category_id' => $category_id, 'datee' => $datee,
                    'type' => $type, 'sent_type' => $sent_type, 'project_id' => $project_id,
                ]);
            } elseif ($request['themainaction'] == 'search') {
                $items = Form::whereIn('id', $items->pluck('id'))->paginate(5);
                $items->appends(['q' => $q, 'themainaction' => 'search',
                    'from_date' => $from_date, 'to_date' => $to_date,
                    'category_id' => $category_id, 'datee' => $datee,
                    'type' => $type, 'sent_type' => $sent_type, 'project_id' => $project_id,
                ]);
            } else {
                $items = "";
            }


            return view("account.form.deleted_items", compact("items", 'form_type', "form_status", "sent_typee", "projects", "type", "categories", 'accounts', 'circles', 'project_status'));
        }


    }

    public function showfiles($id)
    {

        $item = Form::find($id);
        if ($item) {
            $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();
            $form_type = Form_type::all();
            $type = $item->type;
        }
        return view("account.form.itemsfiles", compact('form_files', 'item', 'type', 'form_type'));

    }


    public function downloadfiles($id)
    {
        $item = Form::find($id);
        if ($item) {
            $file = public_path() . "/uploads/files/" . $item->form_file;
            return response()->download($file);
        }
    }


}
