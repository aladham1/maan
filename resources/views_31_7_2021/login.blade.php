@extends("layouts._citizen_layout")

@section('css')
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: right;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: left;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            /*max-height: 0;*/
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
    </style>
@endsection

@section("title", "تسجيل دخول ")

@section("content")
        <div class="section">
            <section class="container-fluid login-wrap">
                <div class="login-form">
                        <form method="POST" action="/account/login" id="formid">
                            @csrf
                            
                            <div id="toerror">

                            </div>
                            <span class="login-form-title">تسجيل الدخول</span>
                            <div class="form-group">
                                <label class="col-form-label">اسم المستخدم أو البريد
                                    الإلكتروني</label>
                                <input class="input1" type="email" name="email" class="form-control" placeholder="أدخل بريدك الالكتروني هنا">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">كلمة المرور</label>
                                <input class="input1" type="password" name="password" class="form-control"
                                       placeholder="أدخل كلمة كلمة المرور هنا">
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    تذكرني
                                </label>
                            </div>
                            <a class="forget-password" href="#">نسيت كلمة المرور؟</a>
                           <div class="form-group button-login">
                                <input id="loginform"
                                        type="submit" class="btn btn-primary" value="تسجيل">
                            </div>
                        </form>
                </div>
            </section>
        </div>
    @endsection

