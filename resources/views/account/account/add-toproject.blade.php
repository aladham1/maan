@extends("layouts._account_layout")

@section("title", "تعريف المشاريع لحساب المستخدم ")

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
هذه الواجهة مخصصة لتعريف المشاريع التى يعمل عليها المستخدم  {{$item->full_name}}
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
      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btnn">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث متقدم
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form>
            <div class="row">
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="status_work" class="form-control">
                        <option value="" selected>حالة العمل على المشاريع </option>
                        <option value="1">المشاريع التي يعمل عليها حالياً</option>
                        <option value="2">المشاريع التي لا يعمل عليها حالياً</option>

                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_code" class="form-control">
                        <option value="" selected>رمز المشروع </option>
                        @foreach($projects_for_select as $project)
                            <option value="{{$project->id}}">{{$project->code}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_name" class="form-control">
                        <option value="" selected>اسم المشروع </option>
                        @foreach($projects_for_select as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_status" class="form-control">
                        <option value="" selected>حالة المشروع </option>
                        @foreach($project_status as $status)
                            <option
                                @if(request('project_status')===''.$status->id)selected
                                @endif
                                value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
		</div>
		</div>
		<div class="row">
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <div>
                        <label for="from_date">تاريخ بداية المشروع </label>
                    </div>
                    <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                           placeholder="يوم / شهر / سنة"/>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <div>
                        <label for="to_date">تاريخ نهاية المشروع</label>
                    </div>

                    <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                           placeholder="يوم / شهر / سنة"/>
                </div>
		        </div>
		<div class="col-md-3 col-3">
                <button type="submit" name="theaction" value="search" style="width:110px;margin-top:20px"
                        class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                                  aria-hidden="true"></span>     بحث    </button>
               </div>
                </div>
            </form>
        </div>
    </div>
<div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    @if(check_permission('تعديل بيانات المستخدم'))

        <form method="post" action="/account/account/select-project-post/{{$item->id}}">
            @csrf
            @if($projects)
                @if($projects->count()>0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped" style="width:100% !important;max-width:100% !important;white-space:normal;">
                        <thead>
                        <tr>
                            <th style="word-break: normal;">#</th>
                            <th style="word-break: normal;text-align: center">
                                <input type="checkbox" id="checkAll" name="checkbox" value="">
                                تحديد الكل
                            </th>

                            <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">تاريخ بداية المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">تاريخ نهاية المشروع</th>
                            <th style="max-width: 100px;word-break: normal;text-align: center;">حالة المشروع</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $key=>$a)
                            <tr>
                                <td style="word-break: normal;">{{$a->id}}</td>
                                <th style="word-break: normal;text-align: center;border-top: none;">
                                    <input class="checkbox_name"  value="{{$a->id}}"
                                           {{$item->projects->contains($a->id)?'checked':''}} type="checkbox"
                                           name="projects[]">
                                    <input type="hidden" name="project_id[]" value="{{$a->id}}">

                                </th>

                                <td style="max-width: 250px;word-break: normal;">{{$a->code}}</td>
                                <td style="max-width: 100px;word-break: normal;">{{$a->name}}</td>
                                <td style="max-width: 100px;word-break: normal;">{{$a->start_date}}</td>
                                <td style="max-width: 100px;word-break: normal;"> {{$a->end_date}}</td>
                                <td style="max-width: 100px;word-break: normal;text-align: center">  @if($a->end_date < now() )  منتهي@elseمستمر@endif</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
</div>
                    <div style="float:left;margin-bottom: 20px">{{$projects->links()}}</div>
                @else
                    <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
                @endif
            @else
            <div class="table-responsive">
                <table class="table table-hover table-striped" style="white-space:normal;">
                    <thead>
                    <tr>
                        <th style="word-break: normal;">#</th>
                        <th style="word-break: normal;">
                            <input type="checkbox" id="checkAll" name="checkbox" value="">
                            تحديد الكل
                        </th>

                        <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ بداية المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ نهاية المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            @endif
            <div class="form-group row" style="margin-top:15px;" align="left">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="حفظ"/>
                    <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
                </div>
            </div>
        </form>
    @else
        <div class="alert alert-warning">ليس من صلاحيتك هذه الصفحة</div>
    @endif
    </div></div></div></div></div></div>
@endsection
@section('js')
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {

            $('.adv-searchh').slideToggle("fast", function() {
                if ($('.adv-searchh').is(':hidden'))
                {
                    $('#searchonly').show();
                }
                else
                {
                    $('#searchonly').hide();
                }
            });
        });

        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $('.checkbox_name').click(function() {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes  +'  ' + 'اسم')
        })



    </script>
@endsection
