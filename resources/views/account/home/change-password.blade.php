@extends("layouts._account_layout")

@section("title", "تغيير كلمة المرور")


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
                                        هذه الواجهة مخصصة لتغيير كلمة المرور
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

                    <div class="card-body">
                        <form method="post" action="/account/home/change-password-post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="old_password" class="col-form-label">كلمة المرور الحالية</label>

                                    <input type="password" autofocus class="form-control {{($errors->first('old_password') ? " form-error" : "")}}"
                                           value="{{old("old_password")}}" id="old_password" name="old_password">

                                    {!! $errors->first('old_password', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="password" class="ol-form-label">كلمة المرور الجديدة </label>

                                    <input type="password" class="form-control {{($errors->first('password') ? " form-error" : "")}}" value="{{old("password")}}"
                                           id="password" name="password">
                                    {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="password_confirmation" class="col-form-label">تأكيد كلمة المرور </label>

                                    <input type="password" class="form-control {{($errors->first('password_confirmation') ? " form-error" : "")}}" value="{{old("password_confirmation")}}"
                                           id="password_confirmation" name="password_confirmation">
                                    {!! $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row" align="left">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="تغيير كلمة المرور"/>
                                    <a href="/account" class="btn btn-light">إلغاء الأمر</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
