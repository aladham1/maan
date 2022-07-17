<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>{{$itemco->title}} | @yield('title') </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico" />
    <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="/lib/css/Animat.css">
    <link rel="stylesheet" type="text/css" href="/lib/css/font-awesome.min.css"><!-- font awesome-->
    <link rel="stylesheet" type="text/css" href="/lib/css/style.css"><!-- main style -->
    <link rel="stylesheet" type="text/css" href="/lib/css/responsive.css"><!-- responsive style -->
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $("p").hide();
            });
            $("#show").click(function(){
                $("p").show();
            });
        });
    </script>
    @yield('css')
    <style>
.top-footer h4{
    color:#BE2D45;
    margin-bottom: 20px;
    font-size: 16px;
}
.footer{
    padding-top: 30px;
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
<!-- start wrapper -->
<div id="wrapper">
    <!-- start content -->
    <div id="content">

        <!--********************************************* navBar start *********************************************************************-->
        <header>
            <nav style ="background:#be2d45;"class="navbar navbar-default navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        @if(Auth::user())
                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                            <a  style="max-width: 180px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color: #fff;font-size: 16px;margin-top: 10px;" class="navbar-brand" href="\account"> 
                                 {{ Auth::user()->account->full_name }}
                            </a>
                        @else
                                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#myModal">
                                    <img src="/lib/img/user.png" alt="login">
                               </a>
                        @endif
                    </div>
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

                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
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
                    <!--****************************************** second Modal start(نسيت كلمة المرور) *******************************************************-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                               <a class="navbar-brand" href="#" style="float:right;">
                                <img style="width: 60%;margin-right: 15px;float:right;" src="/lib/img/maan-logo-w.png" alt="maan logo">
                               </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-left text-center">
                        
                          
                             <li><a  href="/#من نحن">
                                    من نحن </a>
                            </li>
                            <li><a  href="/citizen/form/search">
                                    البحث</a>
                            </li>
                            <li><a href="/#تقديم الطلب">
                                    تقديم نموذج</a>
                            </li>
                            
                            <li><a href="/">
                                الرئيسية </a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header
            <!--*******************************  الصفحة الرئيسية ******************************************-->
            <div id ="الصفحة الرئيسية"> </div>
            <!--******************************  خدماتنا***************************************************-->
            <div id="تقديم الطلب"> </div>
            <!--******************************  خدماتنا***************************************************-->
            <div id ="البحث"> </div>
    </div>
    <div id ="recent"> </div>
    <div class="section recent">
    </div>
    <div id ="من نحن"> </div>
    <div id ="uwyo"> </div>
    <div class="section uwyo">
    </div>
    <div id ="اتصل بنا"> </div>
    <div id ="site"> </div>
    <div class="section site">
    </div>
</div>
<style>
    @import url(https://fonts.googleapis.com/css?family=Oswald:400,300,700|Montserrat:400,700|Roboto:400,300italic,100italic,100,300,400italic,500,500italic,700,700italic,900,900italic);
</style>
<!--************************************************************ navb end*****************************************************************-->
<!--************************************************************* tab start **************************************************************-->
<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 800px;
        text-align: center;
        margin-left: -100px;
        margin-top: 10px;
        padding-top:20px;
    }
    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: right;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }
    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }
    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }
    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<!--<div class="container-fluid">-->
    
            @yield('content')
<!--</div>-->
<!--************************************************************** start footer **************************************************-->
<footer class="footer container-fluid fixed-bottom" id="footer">
    <div class="container">
    <div class="row top-footer">
        <!--top  -->
        
        <div class="col-sm-12 col-md-4 address">
         
            <ul class="footer-list" style="margin-top: 40px;">
                <li><span>العنوان </span>{{$itemco->address}}</li>
                <li><span>البريد الالكتروني </span>{{$itemco->mail}}</li>
            </ul>
           </p>
        </div>
        <!-- third side -->
        
        <!-- second side -->
        <div class="col-sm-12 col-md-4 info">
            <h4> معلومات التواصل </h4>
            <div style="display:inline-flex">
            <ul class="footer-list">
                <li><span> الهاتف</span>{{$itemco->mopile}}</li>
                <li><span> الفاكس</span>{{$itemco->fax}}</li>
 
 
            </ul>
            <ul class="footer-list">

                <li><span> رقم الجوال</span>{{$itemco->phone}}</li>
                <li><span> االرقم المجاني</span>{{$itemco->free_number}}</li>
            </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 img-logo">
            <img src="/lib/img/maan-logo-r.png" alt="">
        </div>
        <!-- third side -->
        
    </div>
    </div>
    <!--mbottom -->
    <div class="row bottom-footer">
        <!-- first side -->
        <div class="col-lg-12 address text-center">
            <p>جميع الحقوق محفوظة &copy; 2020</p/p>
        </div>
    </div>
</footer>
<!-- ************************************************* End footer ************************************************************* -->
</div>
    <!-- *********************************************** End footer ********************************************************************-->
    <script src="/lib/js/main.js"></script><!-- main js file -->

    <script>
        $('#submitBtn').click(function() {
            /* when the button in the form, display the entered values in the modal */
            $('#category2').text($('#category option:selected').text());
            $('#title2').text($('#title').val());
            $('#content2').text($("textarea#content").val());
            //$('#content2').value=($('#content').val());
        });

        $('#submit').click(function(){
        $('#submit').prop('disabled', true);
            /* when the submit button in the modal is clicked, submit the form */
            //alert('submitting');
            $('#addformid').submit();
        });
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
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
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
                            }
                            else
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
                        }
                        else
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
@yield('js')
</body>
</html>
