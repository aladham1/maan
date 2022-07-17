@extends("layouts._account_layout")

@section("title", "إدارة الإجازات السنوية ")

@section("content")


    <div class="row">
        <div class="col-md-8">
            <h4>يمكنك من خلال هذه الواجهة تعديل معلومات الإجازات السنوية الخاصة بالمركز</h4>
            <br>
        </div>
    </div>
    <br>


    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="/account/events/update/{{$item->id}}">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="event_name" class="col-form-label">طبيعة الإجازة: </label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control {{($errors->first('event_name') ? " form-error" : "")}}" value="{{$item->event_name}}" id="event_name" name="event_name" autocomplete="off">
                        {!! $errors->first('event_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="start_date" class="col-form-label"> من تاريخ:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker {{($errors->first('start_date') ? " form-error" : "")}}" value="{{$item->start_date}}" id="start_date" name="start_date" autocomplete="off" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('start_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="end_date" class="col-form-label"> إلى تاريخ:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker {{($errors->first('end_date') ? " form-error" : "")}}" value="{{$item->end_date}}" id="end_date" name="end_date" placeholder="يوم / شهر / سنة" autocomplete="off">
                        {!! $errors->first('end_date', '<p class="help-block" style="color:red;">:message</p>') !!}

                    </div>
                </div>

                <div class="form-group row" style="margin-right:400px;margin-bottom: 10px;">
                    <div class="col-sm-5 col-md-offset-5">
                        <input type="submit" class="btn btn-success" value="تعديل"/>
                        <a href="events" class="btn btn-light">الغاء الامر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
