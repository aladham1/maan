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
    <!--<link rel="stylesheet" href="/lib/css/Animat.css">-->
    <link rel="stylesheet" type="text/css" href="/lib/css/font-awesome.min.css"><!-- font awesome-->
    <link href="https://maancomplaints.com/metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.css"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/lib/css/style.css"><!-- main style -->
    <link rel="stylesheet" type="text/css" href="/lib/css/responsive.css"><!-- responsive style -->
    <!--<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">-->
    <!--<link href="https://maancomplaints.com/public/lib/fonts/Frutiger%20LT%20Arabic%2055%20Roman.ttf" rel="stylesheet">-->
    <link href="https://maancomplaints.com/public/lib/fonts/calibri-regular.ttf" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
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
    <style >
        #outer-body .dropdown-extended>.dropdown-menu {
            min-width: 160px!important;
            max-width: 275px!important;
            width: 275px!important;
            z-index: 9995!important;
            margin-top: 3px!important;
            left: 0!important;
            right: auto!important;
            float: right!important;
            list-style: none!important;
            text-shadow: none!important;
            padding: 0!important;
            position: absolute!important;
            background-color: #fff!important;
            top: 100%!important;
            font-size: 14px!important;
            text-align: right!important;
            background-clip: padding-box!important;
            overflow: unset!important;
        }
        #outer-body li.dropdown-extended .dropdown-menu > li.external{
            text-align: center!important;
            color: #fff!important;
            background: #BE2D45 !important;
            display: block!important;
            overflow: hidden!important;
            padding: 15px!important;
            letter-spacing: .5px!important;
            -webkit-border-radius: 4px 4px 0 0!important;
            -moz-border-radius: 4px 4px 0 0!important;
            -ms-border-radius: 4px 4px 0 0!important;
            -o-border-radius: 4px 4px 0 0!important;
            border-radius: 4px 4px 0 0!important;
        }
        #outer-body .media:first-child {
            margin-top: 0;
        }
        #outer-body .d-flex {
            display: -webkit-box !important;
            display: -webkit-flex !important;
            display: -ms-flexbox !important;
            display: flex !important;
        }
        #outer-body .align-items-start {
            -webkit-box-align: start !important;
            -webkit-align-items: flex-start !important;
            -ms-flex-align: start !important;
            align-items: flex-start !important;
        }
        #outer-body .media, .media-body {
            zoom: 1;
            overflow: hidden;
        }
        #outer-body .media-body, .media-left, .media-right {
            display: table-cell;
            vertical-align: top;
        }
        #outer-body .media-left, .media>.pull-left {
            padding-left: 10px;
        }
        #outer-body .media-body {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
        #outer-body .media-body, .media-left, .media-right {
            display: table-cell;
            vertical-align: top;
        }
        #outer-body .media-body {
            width: 10000px;
        }
        #outer-body .media, .media-body {
            zoom: 1;
            overflow: hidden;
        }
        }
        #outer-body .small, small {
            font-size: 85%;
        }
        #outer-body .page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li > a .time {
            background: unset !important;
            color: #626262 !important;
            font-weight: 600 !important;
        }

        #outer-body .dropdown-menu-list>li a .time {
            float: left;
            max-width: 75px;
            font-size: 11px;
            font-weight: 400;
            opacity: .7;
            filter: alpha(opacity=70);
            text-align: left;
            padding: 1px 5px;
        }
        #outer-body .dropdown-menu-list{
            margin: 0;
            padding: 0;
            float: none;
        }
        #outer-body li.dropdown-extended .dropdown-menu:after {
            border-bottom-color: #BE2D45 !important;
        }

        #outer-body li.dropdown .dropdown-menu:after {
            position: absolute;
            top: -6px;
            left: 10px;
            display: inline-block!important;
            border-left: 6px solid transparent;
            border-bottom: 6px solid #fff;
            border-right: 6px solid transparent;
            content: '';
        }
        #outer-body .dropdown-menu.pull-right:after {
            right: auto;
        }
        @media (max-width: 767px){
            #outer-body .dropdown-extended>.dropdown-menu {
                max-width: 255px;
                width: 255px;
            }
            #outer-body li.dropdown-notification .dropdown-menu {
                margin-left: unset !important;
                margin-right: -190px;
                margin-top: 15px!important;
                left: auto!important;
                right: 50px!important;
            }
        }
        .datepicker{
            direction: rtl;
            padding-right: 15px;
        }

        .card .box h2 {
            color: #be2d45 !important;
        }
        @media (max-width: 800px) {
            .card:hover{
                background-color: #ffe7e7;
            }


            #services .text hr{
                margin-top: 10px;
                margin-bottom: 20px;
                border: 0;
                border-top: 4px solid #be2d45;
                width: 84px;
                border-radius: 40px;
            }

            #about-us{
                background-color: #F7F7F7;
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
    <style>
        /*.top-footer h4{
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
        }*/

        /*    CSS Mawada */
        input.form-control, select.form-control {
            border-left: 3px solid #BE2D45 !important;
            color: #000000;
        }

        label {
            padding-right: 0px !important;
        }

        input.btn, a.btn-light {
            border-radius: .4285rem;
            padding: .9rem 2rem;
            font-size: 1.4rem;
        }

        .btn-light {
            border: 1px solid #BE2D45 !important;
            color: #BE2D45 !important;
        }

        /* #footer {
     position: relative;
     bottom:-7px;
         }*/
        #wrapper {
            position: relative;
            min-height: 100vh;
            min-height: 100%;
        }

        #content{
            padding-bottom: 2.5rem;    /* Footer height */
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2.5rem;            /* Footer height */
            box-shadow: 0px -4px 8px -2px rgba(0,0,0,0.12);
            -webkit-box-shadow: 0px -4px 8px -2px rgba(0,0,0,0.12);
            -moz-box-shadow: 0px -4px 8px -2px rgba(0,0,0,0.12);
            background-color:unset;
        }
    </style>
</head>
<body id="outer-body">
<!-- start wrapper -->
<div id="wrapper">
    <!-- start content -->
    <div id="content">

        <!--********************************************* navBar start *********************************************************************-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
            <a class="navbar-brand" href="#!">
                <img  style="width: 45%;" src="/lib/img/maan-logo-3.png" alt="logo">
            </a>

            <div class="navbar-collapse" id="navbarSupportedContent2">
                <ul class="navbar-nav">
                    @if(Auth::user())
                        <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                        <li class="dropdown dropdown-user">
                            <a class="btn" href="\account" style="padding: 6px 12px;">
                                <span style="margin-left:5px;" class="fa fa-user"></span>
                                {{ Auth::user()->account->full_name }}
                            </a>
                        </li>
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar" style="margin: 0;
    padding: 0 4px;
    height: 50px;
    display: inline-block;
        margin-right: 20px;
    margin-top: 10px;
">
                            <?php
                            $count = count(auth()->user()->notifications()->whereNull('read_at')->get()->toArray());
                            $items = auth()->user()->notifications()->take(4)->orderBy('created_at', 'desc')->get();
                            ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <i class="fa fa-bell" style="top: 1px;
    position: relative;font-size:17px;color:#fff;"></i>
                                <span class="badge badge-default" id="num_notif" style="position: absolute;
       top: -7px;
    left: 10px;
    font-weight: 300;
    padding: 3px 6px;"> {{$count}} </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <div class="dropdown-header" style="display: block;
    padding: 3px 20px;
    line-height: 1.42857;
    white-space: nowrap;    font-size: 12px;
    color: #777;">
                                        <h3 style="color: #fff !important;padding:0px;
    font-size: 20px !important;
    margin-top: 0px !important;"> {{$count}} جديد </h3>
                                    </div>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list" id="notif" style="height: 300px;overflow: visible !important;    border-bottom: 1px solid #DAE1E7 !important;margin-bottom: 0;margin-top: 0;    padding-left: 0!important;
    padding-right: 0;
    list-style: none;"
                                        data-handle-color="#637283">
                                        @foreach($items as $a)
                                            <li id="{{$a->id}}"
                                                @if(empty($a->read_at) || is_null($a->read_at)) style="border-left: 4px solid #2d5f8b;" @endif>
                                                <a onclick="make_read(<?php echo $a->id;?>)" href="{{$a->link}}" class="d-flex justify-content-between" style="     border-bottom: 1px solid #EFF2F6!important;   padding: 16px 0px 10px;
    color:#555;
    text-decoration: none;
    display: block;
    clear: both;
    font-weight: 300;
    line-height: 18px;
    white-space: nowrap;">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left">
                                                            <i class="icon-plus" style="color: #BE2D45;"></i>
                                                        </div>

                                                        <div class="media-body">
                                                            <!--        <span class="media-title" style="color: #BE2D45;">-->
                                                        <!--            {{$a->type}}</i>-->
                                                            <!--</span>-->
                                                            <span class="details"
                                                                  style="display:block; max-width: 100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;margin-bottom: .5rem;
                                                            font-size: smaller;
                                                            color: #626262;">
                                    {{$a->title}}

                                </span>
                                                        </div>
                                                        <small><span
                                                                class="time">{{$a->created_at->format('m/d/Y')}}</span></small>

                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                                                    href="/account/notifications"> عرض جميع
                                        الإشعارات </a></li>

                            </ul>
                        </li>


                    @else
                        <a class="btn" href="/login">
                            <i style="margin-left:5px;" class="fa fa-user"></i>تسجيل الدخول
                        </a>
                @endif
                <!-- <a class="btn" href="/login">تسجيل الدخول</a>-->
                </ul>
            </div>
        </nav>
    @yield('content')

    <!--*******************************  الصفحة الرئيسية ******************************************
        <div id ="الصفحة الرئيسية"> </div>
        <!--******************************  خدماتنا***************************************************
        <div id="تقديم الطلب"> </div>
        <!--******************************  خدماتنا***************************************************-->
        <!-- <div id ="البحث"> </div>
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
     <div class="section site"></div>-->

        <!--************************************************************ navb end*****************************************************************-->
        <!--************************************************************* tab start **************************************************************-->
        <style>

            label.col-sm-4.col-form-label{
                float: right !important;
            }
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

        <!--************************************************************** start footer **************************************************-->

        <!-- ************************************************* End footer ************************************************************* -->
        <!-- *********************************************** End footer ********************************************************************-->
    </div>
    <footer class="footer container-fluid fixed-bottom" id="footer">
        <div class="row top-footer">
            <!--top  -->
            <div class="col-sm-10 address">
                <ul class="footer-list">
                    <!-- <span> <b>معلومات التواصل </b></span>-->
                    <li><span style="color:#BE2D45;font-size:16px;font-weight:800"><b>معلومات التواصل:</b></span></li>
                    <li><i class="fa fa-map-marker footer-icon"></i><span>{{$itemco->address}}</span></li>
                    <li><i class="fa fa-mobile footer-icon"></i><span>{{$itemco->mopile}}</span></li>
                    <li><i class="fa fa-fax footer-icon"></i><span>{{$itemco->fax}}56558815415</span></li>
                    <li><i class="fa fa-phone footer-icon"></i><span>{{$itemco->phone}}</span></li>
                    <li><i class="fa fa-phone footer-icon"></i><span>{{$itemco->free_number}}</span></li>
                </ul>
            </div>
            <div class="col-sm-2 address">
                <p>جميع الحقوق محفوظة &copy; 2021</p>
            </div>

        </div>
</div>
<!--mbottom -->

</footer>
</div>

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
                        //scrollTop: target.offset().top
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
                        // scrollTop: target.offset().top
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
<!--<script src="/lib/js/wow.min.js"></script>-->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        orientation: "bottom left",
    });

</script>

<script>
    function make_read(id) {
        $.post("{{route('make_read')}}", {
            "_token": "{{csrf_token()}}",
            'id': id,
        }, function (data) {

        });
    }
</script>
@yield('js')
</body>
</html>