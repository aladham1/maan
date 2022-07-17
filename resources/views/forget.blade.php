
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

@section("title", " نسيت كلمة المرور ")

@section("content")
    <div class="section">
        <section class="container-fluid login-wrap">
            <div class="login-form">
                <form method="POST" action="/account/restpassord" id="restformid">
                    @csrf
                    <div id="toresterror">

                    </div>
                    <span class="login-form-title"> نسيت كلمة المرور </span>
                    <div class="form-group">
                        <label class="col-form-label"> البريد
                            الإلكتروني</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="الرجاء ادخال الايميل او رقم الهاتف">
                    </div>

                    <div class="form-group button-login">
                        <input id="restform"
                           type="submit" class="btn btn-primary" value="ارسال">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
