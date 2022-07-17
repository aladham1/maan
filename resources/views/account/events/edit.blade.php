@extends("layouts._account_layout")

@section("title", "تعديل الإجازات السنوية ")

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
يمكنك من خلال هذه الواجهة تعديل معلومات الإجازات السنوية الخاصة بالمركز                            </h4>
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
                    <div class="card-title">بيانات حساب الموظف الجديد</div>
                </div>
                <div class="card-body">
            <form method="post" action="/account/events/update/{{$item->id}}">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="event_name" class="col-form-label">طبيعة الإجازة: </label>
                
                        <input type="text" class="form-control {{($errors->first('event_name') ? " form-error" : "")}}" value="{{$item->event_name}}" id="event_name" name="event_name" autocomplete="off">
                        {!! $errors->first('event_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="start_date" class="col-form-label"> من تاريخ:</label>
           
                        <input type="date" class="form-control {{($errors->first('start_date') ? " form-error" : "")}}" value="{{$item->start_date}}" id="start_date" name="start_date" autocomplete="off" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('start_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="end_date" class="col-form-label"> إلى تاريخ:</label>
        
                        <input type="date" class="form-control {{($errors->first('end_date') ? " form-error" : "")}}" value="{{$item->end_date}}" id="end_date" name="end_date" placeholder="يوم / شهر / سنة" autocomplete="off">
                        {!! $errors->first('end_date', '<p class="help-block" style="color:red;">:message</p>') !!}

                    </div>
                </div>

                <div class="form-group row" style="float:left;text-align:left;" align="left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="حفظ"/>
                        <a href="events" class="btn btn-light">إلغاء الامر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
