@extends("layouts._account_layout")

@section("title", "إدارة الإجازات السنوية ")

@section("content")


@if(check_permission('اضافة إجازة'))
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
يمكنك من خلال هذه الواجهة تعريف الإجازات السنوية الخاصة بالمركز
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
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات الإجازة</div>
                </div>
                <div class="card-body">
            <form method="post" action="/account/events" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="event_name" class="col-form-label">طبيعة الإجازة: </label>
                        <input type="text" class="form-control {{($errors->first('event_name') ? " form-error" : "")}}" value="" id="event_name" name="event_name" autocomplete="off">
                        {!! $errors->first('event_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-sm-3">
                        <label for="start_date" class="col-form-label"> من تاريخ:</label>
                        <input type="date" class="form-control {{($errors->first('start_date') ? " form-error" : "")}}" value="" id="start_date" name="start_date" autocomplete="off" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('start_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-sm-3">
                        <label for="end_date" class="col-form-label"> إلى تاريخ:</label>
                        <input type="date" class="form-control  {{($errors->first('end_date') ? " form-error" : "")}}" value="" id="end_date" name="end_date" placeholder="يوم / شهر / سنة" autocomplete="off">
                        {!! $errors->first('end_date', '<p class="help-block" style="color:red;">:message</p>') !!}

                    </div>
                </div>

                <div class="form-group row" align="left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="إضافة"/>
                        <a href="events" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
     </div>
    </div>
    </div>
@endif
<div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card card-table">
                <div class="card-header"><div class="card-title">يمكنك من خلال الجدول أدناه عرض الإجازات السنوية الخاصة بالمركز</div></div>
                <div class="card-body">
                    <div class="row">
           <div class="col-md-2 col-2">
    <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btnn"><span
                class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث متقدم
        </button>
    </div>
</div>
</div>
    <div class="row">
        <div class="col-md-12 col-12">
            <form autocomplete="off">
               <div class="row form-group">
                    <div class="col-sm-3">
                    <div class="adv-searchh">
                        <label for="start_date" class="col-form-label"> طبيعة الإجازة </label>
                    <input type="text" class="form-control" value="{{old("event_name")}}" id="event_name" name="event_name"
                           placeholder="طبيعة الإجازة" autocomplete="off">
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="adv-searchh">
                    <label for="start_date" class="col-form-label"> من تاريخ</label>
                    <input type="date" class="form-control" value="{{old("start_date")}}" id="start_date"
                           name="start_date" placeholder="يوم / شهر / سنة" autocomplete="off">
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="adv-searchh">
                    <label for="end_date" class="col-form-label">إلى تاريخ</label>

                    <input type="date" class="form-control" value="{{old("end_date")}}" id="end_date" name="end_date"
                           placeholder="يوم / شهر / سنة" autocomplete="off">

                </div>
                </div>
                <div class="col-sm-3">
                    <div  class="form-group adv-searchh" style="margin-top: 25px;">
                        <button type="submit" name="theaction" value="search" style="margin-top: 0px; display: block;width:110px;"
                                class="btn btn-primary adv-searchh">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>بحث
                        </button>
                    </div>
</div>
</div>
            </form>
        </div>
    </div>
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 30px;word-break: normal;">#</th>
                        <th style="max-width: 100px;word-break: normal;">طبيعة الإجازة</th>
                        <th style="max-width: 100px;word-break: normal;">من تاريخ</th>
                        <th style="max-width: 100px;word-break: normal;">إلى تاريخ</th>
                        <th style="word-break: normal;">التفاصيل ذات العلاقةبالإجازة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $a)
                        <tr>
                                <td style="word-break: normal;">{{$a->id}}</td>
                                <td style="word-break: normal;">{{$a->event_name }}</td>
                                <td style="word-break: normal;">{{$a->start_date}}</td>
                                <td style="max-width: 60px;word-break: normal;">{{$a->end_date }}</td>
                                <td style="text-align: center;">

                                    @if(check_permission('تعديل إجازة'))
                                    <a class="btn btn-xs btn-primary" title="تعديل"
                                       href="/account/events/edit/{{$a->id}}"><i
                                            class="fa fa-edit"></i></a>
                                    @endif

                                        @if(check_permission('حذف إجازة'))

                                    <a class="btn btn-xs Confirm btn-danger"
                                       href="/account/events/delete/{{$a->id}}"><i
                                            class="fa fa-trash"></i></a>
                                        @endif

                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="float:left">  {{$items->links()}} </div>
        @else
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 30px;word-break: normal;">#</th>
                    <th style="max-width: 100px;word-break: normal;">طبيعة الإجازة</th>
                    <th style="max-width: 100px;word-break: normal;">من تاريخ</th>
                    <th style="max-width: 100px;word-break: normal;">إلى تاريخ</th>
                    <th style="word-break: normal;">التفاصيل ذات العلاقة بالإجازة</th>
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
@section('js')
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {
            $('.adv-searchh').slideToggle("fast");
        });
    </script>



@endsection
