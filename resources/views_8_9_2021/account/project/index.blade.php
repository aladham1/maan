@extends("layouts._account_layout")

@section("title", "إدارة المشاريع")


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
                                        هذه الواجهة مخصصة للتحكم في إدارة مشاريع المركز
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
                    <form autocomplete="off">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <div class="form-group filter-div" style="margin-bottom: 0px;display: inline-flex;">
                                    <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        بحث متقدم
                                    </button>
                                    <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" value="excel" class="btn btn-primary adv-export-btnn" id="excel_b" style="margin-left: 10px;">
                                        <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                                        تصدير
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row filter-div" style="margin-top:5px;margin-bottom:5px;">
                            <div class="col-sm-3 adv-searchh">
                                <select name="code" class="form-control">
                                    <option value="" selected>رمز المشروع</option>
                                    @foreach($projects as $project)
                                        <option
                                            @if(request('code')===''.$project->id)selected
                                            @endif
                                            value="{{$project->code}}">{{$project->code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 adv-searchh">
                                <select name="project_name" class="form-control">
                                    <option value="" selected>اسم المشروع</option>
                                    @foreach($projects as $project)
                                        <option
                                            @if(request('project_name')===''.$project->id)selected
                                            @endif
                                            value="{{$project->name}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 adv-searchh">
                                <select name="coordinator" class="form-control">
                                    <option value="" selected>منسق المشروع</option>
                                    @foreach($accounts as $account)
                                        @if($account->circle_id == 2)
                                            <option
                                                @if(request('coordinator')===''.$account->id)selected
                                                @endif
                                                value="{{$account->full_name}}">{{$account->full_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 adv-searchh">
                                <select name="manager" class="form-control">
                                    <option value="" selected>مدير البرنامج</option>
                                    @foreach($accounts as $account)
                                        @if($account->circle_id == 3)
                                            <option
                                                @if(request('manager')===''.$account->id)selected
                                                @endif
                                                value="{{$account->full_name}}">{{$account->full_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div  class="row" style="margin-top:5px;margin-bottom:5px;">
                            <div class="col-sm-3 adv-searchh" style="margin-top: 24px;">
                                <select name="support" class="form-control">
                                    <option value="" selected>ممثل المتابعة و التقييم</option>
                                    @foreach($accounts  as $account)
                                        @if($account->circle_id == 4)
                                            <option
                                                @if(request('support')===''.$account->id)selected
                                                @endif
                                                value="{{$account->full_name}}">{{$account->full_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 adv-searchh" style="margin-top: 24px;">
                                <select name="active" class="form-control">
                                    <option value=""> حالة المشروع</option>
                                    @foreach($project_status as $pstatus)
                                        <option
                                            {{request('active')==$pstatus->id?"selected":""}} value="{{$pstatus->id}}">{{$pstatus->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3 adv-searchh">
                                <label for="from_date">تاريخ بداية المشروع</label>
                                <input type="date" class="form-control" name="start_date"
                                       placeholder="يوم / شهر / سنة"/>
                            </div>

                            <div class="col-sm-3 adv-searchh">
                                <label for="from_date">تاريخ نهاية المشروع</label>
                                <input type="date" class="form-control" name="end_date"
                                       placeholder="يوم / شهر / سنة"/>
                            </div>
                        </div>
                        <div class="row" style="text-align: left;" align="left">
                            <div class="col-sm-12 adv-searchh">
                                <button type="submit" name="theaction" title ="بحث"  value="search"
                                        class="btn btn-primary adv-searchh"  style="width:110px;">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    بحث
                                </button>
                            </div>

                        </div>

                    </form>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            @if($items)
                                @if($items->count()>0)
                                    <div class="table-responsive">

                                        <table class="table table-hover table-striped"
                                               style="width:170% !important;max-width:170% !important;white-space:normal;">
                                            <thead>
                                            <tr>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رمز
                                                    المشروع
                                                </th>
                                                <th style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"> اسم
                                                    المشروع باللغة العربية
                                                </th>
                                                <th style="max-width: 120px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">منسق
                                                    المشروع
                                                </th>
                                                <th style="max-width: 150px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">مدير
                                                    البرنامج
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">ممثل
                                                    المتابعة والتقييم
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">تاريخ
                                                    بداية المشروع
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap">تاريخ
                                                    نهاية المشروع
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap">حالة
                                                    المشروع
                                                </th>
                                                <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap">
                                                    التفاصيل ذات العلاقة بالمشروع
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $a)

                                                <tr>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->code}}</td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->name}}</td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">@if($a->account_projects->where('rate','=','2')->first())
                                                            {{$a->account_projects->where('rate','=','2')->first()->account->full_name}}
                                                        @endif
                                                    </td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">@if($a->account_projects->where('rate','=','3')->first())
                                                            {{$a->account_projects->where('rate','=','3')->first()->account->full_name}}
                                                        @endif
                                                    </td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">@if($a->account_projects->where('rate','=','4')->first())
                                                            {{$a->account_projects->where('rate','=','4')->first()->account->full_name}}
                                                        @endif
                                                    </td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap">{{$a->start_date}}</td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size:12px">{{$a->end_date}}</td>

                                                    <td>
                                                        @if($a->end_date < now() )  منتهي@elseمستمر@endif
                                                    </td>

                                                    <td style="max-width: 350px;padding-right:50px;">
                                                        @if(check_permission('تبويب المستفيدين'))
                                                            @if($a->id!=1)
                                                                <a style="width: 80px;" class="btn btn-xs btn-success"
                                                                   href="/account/project/citizeninproject/{{$a->id}}">
                                                                    المستفيدين</a>
                                                            @else
                                                                <a style="width: 80px;" class="btn btn-xs btn-success" href="/notbenfit">
                                                                    غير المستفيدين</a>

                                                            @endif
                                                        @endif
                                                        @if(check_permission('تبويب الموظفين'))
                                                            <a class="btn btn-xs btn-success"
                                                               href="/account/project/accountinproject/{{$a->id}}">الموظفين</a>
                                                        @endif
                                                        @if(check_permission('توظيف'))
                                                            <a class="btn btn-xs btn-success" href="/account/project/stuffinproject/{{$a->id}}">توظيف</a>
                                                        @endif
                                                        @if(check_permission(' تبويب الاقتراحات والشكاوى'))
                                                            <a class="btn btn-xs btn-success" href="/account/project/forminproject/{{$a->id}}">الاقتراحات/الشكاوى</a>
                                                        @endif

                                                        @if(check_permission('تعديل بيانات المشروع'))

                                                            <a class="btn btn-xs btn-primary" title="تعديل"
                                                               href="/account/project/edit/{{$a->id}}"><i
                                                                    class="fa fa-edit"></i></a>

                                                        @endif
                                                        @if(check_permission('حذف المشروع'))
                                                            {{--                                    @if($a->id !=1 && count($a->Accounts->toArray())<=1 && $a->citizens->toArray() == null && $a->forms->toArray() == null)--}}

                                                            <a class="btn btn-xs Confirm btn-danger"
                                                               title="حذف" href="/account/project/delete/{{$a->id}}"><i
                                                                    class="fa fa-trash"></i></a>
                                                            {{--                                    @endif--}}
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div style="float:left">{{$items->links()}} </div>

                                @else

                                    <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
                                @endif
                            @else

                                <div class="table-responsive">

                                    <table class="table table-hover table-striped" style="white-space:normal;">
                                        <thead>
                                        <tr>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">#</th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">رمز
                                                المشروع
                                            </th>
                                            <th style="max-width: 200px;word-break: normal;overflow: hidden;text-overflow: ellipsis;"> اسم
                                                المشروع باللغة العربية
                                            </th>
                                            <th style="max-width: 120px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">منسق
                                                المشروع
                                            </th>
                                            <th style="max-width: 150px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">مدير
                                                البرنامج
                                            </th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;"> ممثل
                                                المتابعة والتقييم
                                            </th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">تاريخ
                                                بداية المشروع
                                            </th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">تاريخ
                                                نهاية المشروع
                                            </th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">حالة
                                                المشروع
                                            </th>
                                            <th style="max-width: 100px;word-break: normal;overflow: hidden;text-overflow: ellipsis;">التفاصيل
                                                ذات العلاقة بالمشروع
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
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
        $('#excel_b').click(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var uri = window.location.toString();
            var fullUrl = window.location.href;
            if (uri.indexOf("?") > 0) {
                formData += "&theaction=" + encodeURIComponent('excel');
                var finalUrl = fullUrl + "&" + formData;
            } else {
                var finalUrl = fullUrl + "?theaction=excel";
            }

            window.location.href = finalUrl;

        });
    </script>
    <script>
        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                $.ajax({
                    url: "/account/project/active/" + id,
                    data: {_token: '{{ csrf_token() }}'},
                    error: function (jqXHR, textStatus, errorThrown) {
                        // User Not Logged In
                        // 401 Unauthorized Response
                        window.location.href = "/account/project";
                    },
                });
            });
        });
    </script>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {
            $('.adv-searchh').slideToggle("fast");
        });
    </script>
@endsection
