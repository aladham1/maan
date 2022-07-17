@extends("layouts._account_layout")

@section("title", "تعديل مشروع $item->name $item->code ")


@section("content")
<br>
    <form method="post" action="/account/project/{{$item->id}}">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="code" class="col-form-label">رمز المشروع</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{$item->code}}" id="code" name="code">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="name" class="col-form-label">اسم المشروع بالعربية</label>
            </div>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{$item->name}}" id="name" name="name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
             <label for="start_date" class="col-form-label"> تاريخ بداية المشروع</label>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" value="{{$item->start_date}}" id="start_date" name="start_date">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="end_date" class="col-form-label"> تاريخ نهاية المشروع</label>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" value="{{$item->end_date}}" id="end_date" name="end_date">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="active" class="col-form-label">حالة المشروع</label>
            </div>
            <div class="col-sm-5">
                    <input type="text" class="form-control"  value="{{$item->end_date <= now() ?  'منتهي' : 'مستمر'}}" id="project_status" name="project_status" readonly>
               <!--@foreach($project_status as $pstatus)
                   <label><input type="radio" {{$item->active==$pstatus->id?"checked":""}} value="{{$pstatus->id}}" name="active"/>{{$pstatus->name}}</label>
              @endforeach-->
            </div>
        </div>
        <!--<div class="form-group row">
           <div class="col-sm-2">
                <label for="code" class="col-form-label">التفاصيل</label>
            </div>
            <div class="col-sm-5">
                <textarea class="form-control" id="details" name="details">
                    {{$item->details}}
                </textarea>
            </div>
        </div>-->

        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="حفظ"/>
                <a href="/account/project" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection
