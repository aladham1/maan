@extends("layouts._account_layout")

@section("title", " عرض إشعارات النظام")
@section("content")
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في إدارة إشعارات النظام
</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
            <div class="card-body">
    <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form>
                <div class="row">
                    <div class="col-md-4 col-4">
                      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                        <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btn adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث متقدم
                        </button>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <select name="notification_type" class="form-control">
                            <option value="" >نوع الإشعار</option>

                            @foreach($notifications as $notification)
                                <option
                                    @if(request('notification_type')===''.$notification->title)selected
                                    @endif
                                    value="{{$notification->title}}">{{$notification->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="user_name" class="form-control">
                            <option value="" >مرسل الإشعار</option>
                            <option value="النظام">النظام</option>
                            <option value="موظف">موظف</option>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <option value="-1" @if(request('project_id')==='-1')selected
                                @endif>جميع المشاريع
                            </option>
                            @foreach($projects as $project)
                                <option
                                    @if(request('project_id')===''.$project->id)selected
                                    @endif
                                    value="{{$project->id}}">{{$project->code." ".$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="notification_status" class="form-control">
                            <option value="" >حالة الإشعار</option>
                            <option value="0" >مقروء</option>
                            <option value="1">غير مقروء</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 adv-search" style="margin-top: 34px;">
                        <select name="account_id" class="form-control">
                            <option value="" selected>حساب مرسل الإشعار</option>
                            @foreach($accounts as $account)
                                <option
                                    @if(request('account_id')===''.$account->id)selected
                                    @endif
                                    value="{{$account->id}}">{{$account->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="datee">تاريخ محدد:</label>
                        <input type="date" class="form-control" name="datee" value="{{request('datee')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ: </label>
                        <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ:</label>
                        <input type="date"  class="form-control" name="to_date" value="{{request('to_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-12 adv-search" align="left">
                        <button type="submit" name="theaction" title="بحث" value="search"
                                class="btn btn-primary adv-searchh" style="width:110px;">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <!--<h4 class="table-head">يمكنك من خلال الجدول أدناه عرض الرسائل المدرجة في النظام:</h4>-->

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="overflow: hidden;text-overflow: ellipsis;">#</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">نوع الإشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">مرسل الإشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">حساب مرسل الاشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">اسم المشروع</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">تاريخ الإشعار</th>
                        <th style="text-align:center;overflow: hidden;text-overflow: ellipsis;">معاينة</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($items as $a)

                    <?php

                        $array = explode('/',  $a->link);

                        $id = $array[ count($array) - 1 ];

                        $form = App\Form::find($id);

                    ?>
                    <tr style="@if(empty($a->read_at) || is_null($a->read_at)) background-color: #deecf9;@endif">
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->title}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ ($a->user) ? $a->user->name : 'النظام' }}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ ($form and $form->account) ? $form->account->full_name  : 'النظام' }}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ ($form and $form->project) ? $form->project->name  : '' }}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->created_at }}</td>
                        <td style="text-align:center;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            <a onclick="make_read(<?php echo $a->id;?>)" class="btn btn-xs btn-primary" title="انتقل" href="{{$a->link}}">
                                <i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="float:left" >{{$items->links()}} </div>
    @else
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif
    @else
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th style="overflow: hidden;text-overflow: ellipsis;">#</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">نوع الإشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">مرسل الإشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">حساب مرسل الاشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">اسم المشروع</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">تاريخ الإشعار</th>
                <th style="text-align:center;overflow: hidden;text-overflow: ellipsis;">معاينة</th>
            </tr>
            </thead>
        </table>
    </div>
    @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section("js")
    <script>
        $(function () {
            $('.adv-search').hide();
            $('.adv-search-btn').click(function(){
                $('.adv-search').slideToggle("fast");
            });

        });

        function make_read(id) {
            $.post("{{route('make_read')}}", {
                "_token": "{{csrf_token()}}",
                'id': id,
            }, function (data) {

            });
        }
    </script>
@endsection




