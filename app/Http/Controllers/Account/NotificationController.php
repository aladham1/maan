<?php

namespace App\Http\Controllers\Account;


use App\Account;
use App\Circle;
use App\Form;
use App\Notification;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;


class NotificationController extends BaseController
{
    static function insert($not_body)
    {
        $a = Notification::create($not_body);
        $items = Account::where('user_id', '=', $a->user_id)->first()->user->notifications()->whereNull('read_at')->get();
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '078a9e270cf0ebc41e05',
            '3f01865fa022e6f8c099',
            '746988',
            $options
        );

        $data['type'] = $a->type;
        $data['user_id'] = $a->user_id;
        $data['title'] = $a->title;
        $data['date'] = $a->created_at->format('m/d/Y');
        $data['link'] = $a->link;
        $data['num_notif'] = count($items->toArray());
        $pusher->trigger('my-channel', $data['user_id'] . '', $data);
    }

    public function index(Request $request)
    {

        $notification_type = $request["notification_type"] ?? "";
        $user_name = $request["user_name"] ?? "";
        $project_id = $request["project_id"] ?? "";
        $notification_status = $request["notification_status"] ?? "";
        $datee = $request["datee"] ?? "";
        $from_date = $request["from_date"] ?? "";
        $to_date = $request["to_date"] ?? "";
        $account_id = $request["account_id"] ?? "";

        $items = auth()->user()->notifications()
            ->whereRaw("true");
//        $items = Notification::whereRaw("true");

        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/notifications');
        }

        if (!is_null($request['notification_status'])) {
            if ($request['notification_status'] == 1) {
//                $items = $items->where('read_at', '=', "")->orWhereNull('read_at');
                $items = $items->whereNull('read_at');
            } else {
                $items = $items->whereNotNull('read_at');
            }

        }

        if ($notification_type)
            $items->where("title", "=", $notification_type);

        if ($project_id) {
            $notification_form_ids = array();
            foreach ($items->get() as $a) {
                $array = explode('/', $a->link);
                $id = $array[count($array) - 1];
                $id =  explode('?step=',$id);
                $form = Form::find($id[0]);
                if ($form and $form->project) {
                    if ($form->project->id == $project_id)
                        array_push($notification_form_ids,$a->id);
                }
            }
            $items->whereIn("id",  $notification_form_ids);
        }

        if ($account_id)
            $items->where("receiver_id", "=", $account_id);

        if ($datee){
//            print_r(Carbon::parse($datee)->format('Y-m-d'));exit();
            $items->where([[DB::raw('DATE(created_at)'), Carbon::parse($datee)->format('Y-m-d')]]);

        }

        if ($to_date)
            $items->where([[DB::raw('DATE(created_at)'), '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], [DB::raw('DATE(created_at)'), '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);


        if ($from_date)
            $items->where([[DB::raw('DATE(created_at)'), '>=', Carbon::parse(request('from_date'))->format('Y-m-d')], [DB::raw('DATE(created_at)'), '<=', Carbon::parse(request('to_date'))->format('Y-m-d')]]);


        if ($user_name) {
           $users = Account::select('id')->where('circle_id',$user_name)->pluck('id');
            $items->whereIn("receiver_id",$users);
        }

        if (request("theaction") == 'search') {
            $items = $items->paginate(5)->appends(
                [
                    "notification_type" => $notification_type,
                    "user_name" => $user_name,
                    "notification_status" => $notification_status,
                    "project_id" => $project_id,
                    "account_id" => $account_id,
                    "datee" => $datee,
                    "from_date" => $from_date,
                    "to_date" => $to_date,
                    "theaction" => 'search'
                ]);
        }
        else {
            $items = "";
        }
        $projects = Project::all();
        $accounts = Account::all();
        $circles = Circle::all();
        $notifications = Notification::select('title')->distinct()->get();
        return view("account.notifications.index", compact('items', 'projects', 'notifications', 'accounts','circles'));


    }

    public function store(Request $request)
    {
        /* $options = array(
             'cluster' => 'ap2',
             'useTLS' => false
         );
         $pusher = new Pusher(
             'f95a8f56bcfd8de728c8',
             'c806d81c36a7112e8f1a',
             '703924',
             $options
         );

         $data['comment'] = $comment->comment;
         $data['user'] = $comment->user->name;
         $pusher->trigger('my-channel', 'my-event', $data);*/
    }

    public function make_read(Request $request)
    {
        Notification::where('id', $request['id'])->update(['read_at' => date('Y-m-d h:m:s')]);

        return Response(['success' => true, 'msg' => "تمت الحفظ بنجاح"]);
    }
}
