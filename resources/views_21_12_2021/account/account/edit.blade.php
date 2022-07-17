@extends("layouts._account_layout")

@section("title", "تعديل بيانات حساب موظف $item->full_name")


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
هذه الواجهة مخصصة لديل بيانات حساب موظف في النظام                            </h4>
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
                    <div class="card-title">بيانات حساب الموظف</div>
                </div>
                <div class="card-body">
    <form method="post" enctype="multipart/form-data" action="/account/account/{{$item['id']}}">
        {{csrf_field()}}
        @method('patch')
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="user_name"  class="col-form-label">اسم المستخدم</label>
                <input class="form-control {{($errors->first('user_name') ? " form-error" : "")}}" type="text" value="{{$item["user_name"]}}" id="user_name" name="user_name">
                <input class="form-control" type="hidden" value="{{$item["full_name"]}}" id="full_name" name="full_name">

                {!! $errors->first('user_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-4">
                <label for="id_number"  class="col-form-label"> رقم الهوية</label>
                <input class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" type="text" value="{{$item["id_number"]}}" id="id_number" name="id_number">
                {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-4">
                <label for="mobile"  class="col-form-label"> رقم الهاتف المحمول</label>
                <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}" type="text" placeholder="" value="{{$item["mobile"]}}" id="mobile" name="mobile">
                {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
            <div class="col-sm-4">
                <label for="email" class="col-form-label">البريد الإلكتروني</label>
                <input class="form-control {{($errors->first('email') ? " form-error" : "")}}" type="email" value="{{$item["email"]}}" id="email" name="email">
                {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="password"  class="col-form-label">كلمة المرور</label>
                <input class="form-control {{($errors->first('password') ? " form-error" : "")}}" type="password" value="{{$item["password"]}}" id="password" name="password" autocomplete="off">
                {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-4">
                <label for="circle_id"  class="col-form-label">المستوى الإداري</label>

                <select class="form-control {{($errors->first('circle_id') ? " form-error" : "")}}" name="circle_id">
                    <option value="">اختر</option>
                    @foreach($circles as $circle)
                        <option value="{{$circle -> id}}" {{$item['circle_id']==$circle -> id?"selected":""}}>{{$circle -> name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('circle_id', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
        </div>
        <br><br>
        <div class="form-group row" align="left">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="تعديل"/>
                <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
            </div>
        </div>

    </form>
    </div>
    </div></div></div></div>
@endsection