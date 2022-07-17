<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>{{$itemco->title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico"/>
    <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/css/bootstrap-rtl.css">
    <!--<link rel="stylesheet" href="/lib/css/Animat.css">-->
    <link rel="stylesheet" type="text/css" href="/lib/css/font-awesome.min.css"><!-- font awesome-->
    <link rel="stylesheet" type="text/css" href="/lib/css/style.css"><!-- main style -->
    <link rel="stylesheet" type="text/css" href="/lib/css/responsive.css"><!-- responsive style -->
    <!--<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">-->
    <link href="https://maancomplaints.com/public/lib/fonts/Frutiger%20LT%20Arabic%2055%20Roman.ttf" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#hide").click(function () {
                $("p").hide();
            });
            $("#show").click(function () {
                $("p").show();
            });
        });
    </script>
     <style>
         .card .box h2 {
             color: #be2d45 !important;
         }
	  @media (max-width: 800px) {
    /*.navbar-header {
        float: left;
    }

    .navbar {
        border-radius: 4px;
        min-width: 400px;
    }

    .nav-tabs-justified > li > a {
        border-bottom: 1px solid #ddd;
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs-justified > .active > a,
    .nav-tabs-justified > .active > a:hover,
    .nav-tabs-justified > .active > a:focus {
        border-bottom-color: #fff;
    }

    .nav-justified > li {
        display: table-cell;
        width: 1%;
    }
    .nav-justified > li > a {
        margin-bottom: 0;
    }

    .nav-tabs.nav-justified > li > a {
        border-bottom: 1px solid #ddd;
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs.nav-justified > .active > a,
    .nav-tabs.nav-justified > .active > a:hover,
    .nav-tabs.nav-justified > .active > a:focus {
        border-bottom-color: #fff;
    }

    .nav-tabs.nav-justified > li {
        display: table-cell;
        width: 1%;
    }
    .nav-tabs.nav-justified > li > a {
        margin-bottom: 0;
    }

    .navbar-right .dropdown-menu {
        right: 0;
        left: auto;
    }
    .navbar-right .dropdown-menu-left {
        right: auto;
        left: 0;
    }
    .container {
        min-width: 400px;
    }

    .navbar-collapse {
        width: auto;
        border-top: 0;
        box-shadow: none;
    }
    .navbar-collapse.collapse {
        display: block !important;
        height: auto !important;
        padding-bottom: 0;
        overflow: visible !important;
    }
    .navbar-collapse.in {
        overflow-y: visible;
    }
    .navbar-fixed-top .navbar-collapse,
    .navbar-static-top .navbar-collapse,
    .navbar-fixed-bottom .navbar-collapse {
        padding-right: 0;
        padding-left: 0;
    }

    .container > .navbar-header,
    .container-fluid > .navbar-header,
    .container > .navbar-collapse,
    .container-fluid > .navbar-collapse {
        margin-right: 0;
        margin-left: 0;
    }

    .navbar-static-top {
        border-radius: 0;
    }

    .navbar-fixed-top,
    .navbar-fixed-bottom {
        border-radius: 0;
    }

    .navbar-toggle {
        display: none;
    }

    .navbar-nav {
        float: left;
        margin: 0;
    }
    .navbar-nav > li {
        float: left;
    }
    .navbar-nav > li > a {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .navbar-nav.navbar-right:last-child {
        margin-right: -15px;
    }

    .navbar-left {
        float: left !important;
    }
    .navbar-right {
        float: right !important;
    }

    .navbar-form .form-group {
        display: inline-block;
        margin-bottom: 0;
        vertical-align: middle;
    }
    .navbar-form .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
    }
    .navbar-form .control-label {
        margin-bottom: 0;
        vertical-align: middle;
    }
    .navbar-form .radio,
    .navbar-form .checkbox {
        display: inline-block;
        padding-left: 0;
        margin-top: 0;
        margin-bottom: 0;
        vertical-align: middle;
    }
    .navbar-form .radio input[type="radio"],
    .navbar-form .checkbox input[type="checkbox"] {
        float: none;
        margin-left: 0;
    }
    .navbar-form .has-feedback .form-control-feedback {
        top: 0;
    }

    .navbar-form {
        width: auto;
        padding-top: 0;
        padding-bottom: 0;
        margin-right: 0;
        margin-left: 0;
        border: 0;
        -webkit-box-shadow: none;
                box-shadow: none;
    }
    .navbar-form.navbar-right:last-child {
        margin-right: -15px;
    }

    .navbar-text {
        float: left;
        margin-right: 15px;
        margin-left: 15px;
    }
    .navbar-text.navbar-right:last-child {
        margin-right: 0;
    }*/
}
              .card:hover{
                background-color: #ffe7e7;
              }

            /*my style*/
 /* .header-txt h1{
    font-size: 30px;
    padding-top: 150px;
    color: #BE2D45;
    margin-bottom: 10px;
  }


.header-txt p {
    font-size: 20px;
    padding-top: 20px;
    font-weight: 400;
    text-align: justify;
    line-height: 2.1;
}
/*.header-txt button {
    margin-top: 18px;
    float: right;
    margin-right: 55px;
    padding: 10px;
    border-radius: 15px;
    width: 280px;
    font-size: 14px;
    border: 1px solid #BE2D45;
    background: #F9F9F9;
    color: #333;
    font-weight: 400;
}*/
/*.navbar-right~.navbar-right {
    margin-right: -5px;
}


.navbar .navbar-collapse .nav .lead {
    font-size: 14px;
}*/
#services .text hr{
    margin-top: 10px;
    margin-bottom: 20px;
    border: 0;
    border-top: 4px solid #be2d45;
    width: 84px;
    border-radius: 40px;
}
.section.union{
   /* background: #F7E6E9;
    background: #F7F7F7;*/
}
/*.btn-danger.btn-puplic{
    margin-top: 5%;
    width: 240px;
    border-radius: 10px;
    background-color: #BE2D45;
}
#services .card {
    position: relative;
    top: 0;
    left: 0px;
    transform: none;
    width: 100%;
    min-height: 270px;
    background: #fff;
    box-shadow: 0 20px 50px rgba(0,0,0,.1);
    border-radius: 10px;
    transition: 0.5s;
    margin-bottom: 10px;
}*/
/*#services .text {
    margin-bottom: 50px;
}*/
#about-us{
    /*min-height: 400px;*/
    background-color: #F7F7F7;
}
  /*.nav>li>a {
    padding: 10px 20px;
}*/
.navbar-right~.navbar-right {
    /*margin-right: 280px;*/
}
.top-footer h4{
    color:#BE2D45;
    margin-bottom: 20px;
    font-size: 16px;
}

.footer-list{
    list-style-type: none;
    padding-right: 0px;
}
.footer-list li{
    margin-bottom: 15px;
    margin-left: 15px;
}
.footer-list li span{
   margin-left: 10px;
}
</style>
</head>
<body>
     <audio autoplay>
     <source src="http://www.pacdv.com/sounds/interface_sound_effects/sound84.wav" type="audio/mpeg">
    </audio>
<!--***************************************** navBar section start************************************************************************-->
<!-- start wrapper -->
<!--<div id="wrapper" style="background: #F1F1F1;">-->
<div id="wrapper">
    <!-- start content -->
    <div id="content">
       <!--************************************************* navBar start *********************************************************************-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
                    <a class="navbar-brand" href="#!"> 
                          <img  style="width: 60%;" src="/lib/img/maan-logo-w.png" alt="logo">
                    </a>
                
                    <div class="navbar-collapse" id="navbarSupportedContent2">
                        <ul class="navbar-nav">
                            <a class="btn mr-2" href="/citizen/form/search"><i style="margin-left:5px;" class="fa fa-search"></i>بحث</a>
                            @if(Auth::user())
                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                            <a  style="max-width: 180px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color: #fff;font-size: 16px;padding:14px 30px 12px 0px;" class="navbar-brand" href="\account">
                                <span class="fa fa-user"></span>
                            {{ Auth::user()->account->full_name }}
                            </a>
                        @else
                            <a class="btn" href="#" data-toggle="modal" data-target="#myModal">
                                <i style="margin-left:5px;" class="fa fa-user"></i>تسجيل الدخول
                            </a>
                        @endif
                           <!-- <a class="btn" href="/login">تسجيل الدخول</a>-->
                        </ul>
                    </div>
                </nav>
        <!--**************************************************  الصفحة الرئيسية *****************************************************************-->
        <div class="whoUsX" id="من نحن"></div>
        
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
    </div>

<!--************************************************************** start footer **************************************************-->
<footer class="footer container-fluid fixed-bottom" id="footer">
    <div class="container">
    <div class="row top-footer">
        <!--top  -->

        <div class="col-sm-4 address">
            <ul class="footer-list" style="margin-top: 47px;">
                <li><b>العنوان </b>{{$itemco->address}}</li>
                <li><b>البريد الإلكتروني </b>{{$itemco->mail}}</li>
            </ul>
        </div>
        <!-- second side -->
        <div class="col-sm-4 info">
            <h4> <b>معلومات التواصل </b></h4>
            <ul class="footer-list">
                <li><b> الهاتف</b>{{$itemco->mopile}}</li>
                <li><b> الفاكس</b>{{$itemco->fax}}56558815415</li>
                <li><b> رقم الجوال</b>{{$itemco->phone}}</li>
                <li><b> االرقم المجاني</b>{{$itemco->free_number}}</li>
            </ul>
        </div>
        <!-- third side -->
        <div class="col-sm-4 img-logo">
            <img src="/lib/img/maan-logo-r.png" alt="">
        </div>
        <!-- third side -->
    </div>
    </div>
    <!--mbottom -->
    <div class="row bottom-footer">
        <!-- first side -->
        <div class="col-lg-12 address text-center">
            <p>جميع الحقوق محفوظة &copy; 2021</p>
        </div>
    </div>
</footer>
<!-- ************************************************* End footer ************************************************************* -->
</div>
</div>
<!-- End wrapper -->
 <!--***********************************************first  Modal start (تسجيل)************************************************************-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <!--*** modal-dialog ****-->
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--*** modal-header ****-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">تسجيل الدخول</h4>
                                </div>
                                <!--*** modal-body****-->
                                <div class="modal-body">
                                    <!--**** form start ****-->
                                    <form method="POST" action="/account/login" id="formid">
                                        @csrf
                                        <div id="toerror">

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" style="color: #4C6788">اسم المستخدم أو البريد الإلكتروني</label>
                                            <input type="email" name="email" class="form-control" placeholder="الايميل">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" style="color: #4C6788">كلمة المرور</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="كلمة المرور">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember"
                                                   style="color: #4C6788">
                                                تذكرني
                                            </label>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#myModal2">نسيت كلمة المرور</a>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق
                                            </button>
                                            <button style="background:#af0922;outline:none;" id="loginform"
                                                    type="submit" class="btn btn-primary">تسجيل
                                            </button>
                                        </div>
                                    </form>
                                    <!--**** form end ****-->
                                </div>
                                <!--**** modal-footer ****-->

                            </div>
                        </div>
                    </div>
                    <!--****************************************** first  Modal end **************************************************************************-->
                    <!--****************************************** second Modal start(نسيت كلمة المرور) *******************************************************-->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  {{(env('MAIL_DRIVER', 'smtp'))}}
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">نسيت كلمة المرور</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/account/restpassord" id="restformid">
                                        @csrf
                                        <div id="toresterror">

                                        </div>
                                        <div class="form-group">
                                            <label style="color: #4C6788">الايميل</label>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="الرجاء ادخال الايميل او رقم الهاتف">
                                        </div>
                                        <br><br>
                                        <button type="submit" id="restform" class="btn btn-primary">ارسال</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--****************************************** second Modal end **************************************************************************-->
<!--*************************************************** functions ************************************************************* -->
<script src="/lib/js/main.js"></script><!-- main js file -->
<script>
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<script>
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<!--************************************************** Java script lib ***************************************************************-->
<script src="/lib/js/jquery-2.1.4.min.js"></script><!-- main JQuery -->
<script src="/lib/js/bootstrap.min.js"></script><!-- bootstrap js -->
<script src="/lib/js/main.js"></script><!-- main js file -->
<script src="/lib/js/wow.min.js"></script>
<script> new WOW().init(); </script>
<script>
    $(document).on('click', "#loginform", function (event) {
        event.preventDefault();
        $('#toerror').empty();
        //alert('test test');
        var form_data = $('#formid').serialize();
        var form_url = $('#formid').attr('action');
        $.ajax({
            method: 'POST',
            url: form_url,
            data: form_data,

            success: function (data_eror) {
                if (data_eror == '/account')
                    window.location.href = "/account";
                var output = '<div class="alert alert-danger alert-dismissible"><ul>';
                $.each(data_eror, function (index, value) {
                    output += "<li>" + index + ": " + value + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toerror').append(output);
            },
            error: function (data_eror) {
                var output = '<div class="alert alert-danger alert-dismissible"><ul>';
                $.each(data_eror, function (index, value) {

                    if (index == 'responseJSON')
                        output += "<li>" + value['message'] + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toerror').append(output);
            }
        })
    });
    /********************************************************/
    $(document).on('click', "#restform", function (event) {
        event.preventDefault();
        $('#toresterror').empty();
        var form_data = $('#restformid').serialize();
        var form_url = $('#restformid').attr('action');
        $.ajax({
            method: 'POST',
            url: form_url,
            data: form_data,

            success: function (data_eror) {
                var output = '<div class="alert alert-info alert-dismissible"><ul>';
                $.each(data_eror, function (index, value) {
                    if (Object.keys(data_eror).length == '1') {
                        if (index == 'success') {
                            if (value == 'true')
                                output += "<li> تم إرسال رسالة إلى بريدك لإعادة تعين كلمة المرور</li>";
                        } else
                            output += "";
                    }
                    if (index == 'status') {
                        output += "<li>" + value + "</li>"
                    } else if (index == 'error') {
                        $.each(value, function (index2, value2) {
                            {
                                if (index2 == 'messages')
                                    $.each(value2, function (index3, value3) {
                                        output += "<li>" + index3 + " " + value3 + "</li>";
                                    });
                            }

                        });
                    } else
                        output += "";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toresterror').append(output);
            },
            error: function (data_eror) {
                var output = '<div class="alert alert-danger alert-dismissible"><ul>';
                $.each(data_eror, function (index, value) {

                    if (index == 'responseJSON')
                        output += "<li>" + value['message'] + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toresterror').append(output);

            }
        })
    });


</script>
</body>
</html>
