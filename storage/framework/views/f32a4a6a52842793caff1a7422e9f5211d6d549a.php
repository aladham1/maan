<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title><?php echo e($itemco->title); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico" />
    <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/css/bootstrap-rtl.css">
    <!--<link rel="stylesheet" href="/lib/css/Animat.css">-->
    <link rel="stylesheet" type="text/css" href="/lib/css/font-awesome.min.css"><!-- font awesome-->
    <link rel="stylesheet" type="text/css" href="/lib/css/style.css"><!-- main style -->
    <link rel="stylesheet" type="text/css" href="/lib/css/responsive.css"><!-- responsive style -->
   <link href="https://maancomplaints.com/public/lib/fonts/calibri-regular.ttf" rel="stylesheet">
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
/*}
.footer-list li{
    margin-bottom: 15px;
}
.footer-list li span{
   margin-left: 10px;
}*/
</style>
</head>
<body>
     <audio autoplay>
     <source src="http://www.pacdv.com/sounds/interface_sound_effects/sound84.wav" type="audio/mpeg">
    </audio>
<!--***************************************** navBar section start************************************************************************-->
<!-- start wrapper -->
<div id="wrapper">
    <!-- start content -->
    <div id="content">
        <!--************************************************* navBar start *********************************************************************-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
                    <a class="navbar-brand" href="#!">
                          <img  style="width: 200px;" src="/lib/img/maan-logo.png" alt="logo">
                    </a>

                    <div class="navbar-collapse" id="navbarSupportedContent2">
                        <ul class="navbar-nav">
                            <?php if(Auth::user()): ?>
                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                            <a class="btn" href="\account">
                        <span style="margin-left:5px;" class="fa fa-user"></span>
                    <?php echo e(Auth::user()->account->full_name); ?>

                    </a>
                        <?php else: ?>
                            <a class="btn" href="/login">
                                <i style="margin-left:5px;" class="fa fa-user"></i>تسجيل الدخول
                            </a>
                        <?php endif; ?>
                           <!-- <a class="btn" href="/login">تسجيل الدخول</a>-->
                        </ul>
                    </div>
                </nav>
            <!--**************************************************  الصفحة الرئيسية *****************************************************************-->
                <section class="container-fluid welcome welcome-bg">
                      <div class="row">

                        <div class="col-md-7 img-header">
                            <!--<img class="img-bkg " src="/lib/img/top-bg.png" alt="">-->
                            <!--<img style="width: 60%;left: -100px;" class="undraw wow bounceIn"
                                 src="/lib/img/undraw_live_collaboration_2r4y.svg" alt="">-->
                               <!-- <img class="undraw wow bounceIn"
                                 src="/lib/img/header-img-01.png" alt="">-->
                        </div>
                        <div class="col-md-5 header-txt">
                            <div class="wow bounceInRight" data-wow-duration="0.5s" data-wow-offset="200"
                                 data-wow-delay=".8s">
                                <h1><?php echo e($itemco->welcom_word); ?></h1>
                                <p><?php echo e($itemco->welcom_clouse); ?></p>
                            </div>
                        </div>
                    </div>
                <div id="services" class="container text-center">
                    <!--first row  -->
                    <div class="row">
                        <div class="col-md-4 wow bounceInLeft">
                            <div class="card">
                                <a href="/citizen/form/search">
                                    <div class="box">
                                        <div class="img">
                                            <img src="/lib/img/chat3-01.png">
                                        </div>
                                        <h2>متابعة الاقتراحات والشكاوى</h2>
                                        <p> <?php echo e($itemco->follw_compline_clouse); ?>

                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--*** first card (تقديم اقتراح) *****-->
                        <div class="col-md-4 wow bounceInLeft">
                            <div class="card">
                                <a href="/citizen/private_info/2">
								<div class="box">
                                    <div class="img">
                                        <img src="/lib/img/chat1-01.png">
                                    </div>
                                    <h2>تقديم اقتراح<br></h2>
                                    <p><?php echo e($itemco->add_propusel_clouse); ?></p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <!--**** second card (تقديم شكوى) ***-->
                        <div class="col-md-4 wow bounceInLeft">
                                <div class="card">
                                    <a  href="/citizen/private_info/1">
									<div class="box">
                                        <div class="img">
                                            <img src="/lib/img/chat2-01.png">
                                        </div>
                                        <h2>تقديم شكوى</h2>
                                        <p><?php echo e($itemco->add_compline_clouse); ?>

                                            </p>
                                    </div>
									</a>
                                </div>
                            </div>
                    </div>
                    <!-- second row -->
                    <div class="row" style="display: inline-flex;margin-top: 20px;" >
                        <div class="col-md-12">
                            <a  target="_blank" class="btn btn-danger btn-puplic" href="<?php echo e(url('uploads/'.$itemco->steps_file)); ?>">ارشادات عامة</a>
                        </div>
                     </div>
              </section>
                </div>
            </section>
    </div>
    </div>

       <!--************************************************************** start footer **************************************************-->
<footer class="footer container-fluid fixed-bottom" id="footer">
    <div class="row top-footer">
        <!--top  -->
        <div class="col-sm-10 address">
            <ul class="footer-list">
                <!-- <span> <b>معلومات التواصل </b></span>-->
                <li><span style="color:#BE2D45;font-size:16px;font-weight:800"><b>معلومات التواصل:</b></span></li>
                <li><i class="fa fa-map-marker footer-icon"></i><span><strong>العنوان:</strong><?php echo e($itemco->address); ?></span></li>
                <li><i class="fa fa-phone footer-icon"></i><span><strong>الرقم المجاني:</strong><?php echo e($itemco->free_number); ?></span></li>
                <li><i class="fa fa-phone footer-icon"></i><span><strong>رقم الهاتف الأرضي:</strong><span><?php echo e($itemco->phone); ?></span></li>
                <li><i class="fa fa-mobile footer-icon"></i><span><strong>رقم الموبايل:</strong><?php echo e($itemco->mopile); ?></span></li>
                <li><i class="fa fa-fax footer-icon"></i><span><strong>رقم الفاكس:</strong><?php echo e($itemco->fax); ?>56558815415</span></li>
            </ul>
        </div>
        <div class="col-sm-2 address">
            <p>جميع الحقوق محفوظة &copy; 2021</p>
        </div>

    </div>
    </div>
    <!--mbottom -->

</footer>
<!-- ************************************************* End footer ************************************************************* -->
<!-- End wrapper -->

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
</body>
</html>
