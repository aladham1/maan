<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>مركز معاً | <?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="https://maancomplaints.com/public/lib/fonts/calibri-regular.ttf" rel="stylesheet">

    <link href="<?php echo e(asset('metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->

    <link href="<?php echo e(asset('metronic-rtl/assets/global/css/components-md-rtl.min.css')); ?>" rel="stylesheet"
          id="style_components" type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/global/css/plugins-md-rtl.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo e(asset('metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/layouts/layout/css/themes/blue-rtl.min.css')); ?>" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('metronic-rtl/assets/layouts/layout/css/custom-manal.css')); ?>" rel="stylesheet"
          type="text/css"/>

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">

    <style type="text/css">
        
        @media (min-width: 992px) {
            /*.page-sidebar {
                width: 275px !important;
            }

            .page-content-wrapper .page-content {
                margin-right: 280px !important;
            }*/
        }

        .close {
            background-image: none !important;
            background: none !important;
            text-indent: 0 !important;
        }

        .datepicker {
            direction: rtl;
            padding-right: 15px;

        }


        *, h1, h3, h4 {
            /*font-family: 'Open Sans', sans-serif;
            font-family: 'El Messiri', sans-serif;*/
            letter-spacing: 0px;
        }

        *, h1, h2, h3, h4, h5, h6, a, span, i, small, p {
            letter-spacing: 0px;
        }

        /*h3 {
            text-align: center;
            color: #2D5F8B !important;
        }*/

        .breadcrumb > li, .pagination {
            display: block;
        }

        .form-error {

            border: 2px solid #e74c3c;
        }

        .page-title {
            font-size: 24px;
        }

        .panel.info-panel {
            padding: 3px 15px;
            background: #BE2D45;
            color: #fff;
        }

        .info-panel h4 {
            line-height: 1.8;
            font-size: 14px;
        }

        .adv-search {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 500;
        }

        .page-title i.fa {
        }

        #mybody h4, .page-content h4 {
            color: #626262;
            font-size: 16px;
        }

        /*custome style*/
        .form-inline {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        /*.table {
            border: 2px solid #eaeaea;
        }*/

        .table > thead > tr {
            /*background-color: #ed6b75;*/
            color: #fff !important;
        }

        .table {
            text-align: center;
        }

        .table > thead > tr > th {
            border-bottom: none;
            text-align: center;
        }

        .table > tbody > tr > td {
            /* border-bottom: 1px solid #F8F8F8;*/
            border-top: 0;
            padding: 5px;
        }

        .table > tbody > tr > td:last-of-type {
            text-align: center;
        }

        /*.table-advance thead tr th {
            background-color: #ed6b75;
            color: #fff !important;
            font-size: 14px;
            font-weight: 400;
        }*/

        .table > thead > tr > th {
            vertical-align: middle !important;
        }

        /*.table > tbody > tr > td, .table > thead > tr > th {
            font-size: 12px !important;
        }*/

        input.form-control, select.form-control {
            border-left: 3px solid #BE2D45 !important;
            color: #000000;
        }

        label {
            padding-right: 0px !important;
        }

        input.btn, a.btn-light {
            border-radius: .4285rem !important;
            padding: .9rem 2rem !important;
            font-size: 1.4rem !important;
        }

        .btn-light {
            border: 1px solid #BE2D45 !important;
            color: #BE2D45 !important;
        }

        .pagination > li:first-child > a, .pagination > li:first-child > span {
            margin-right: 0;
            border-bottom-right-radius: unset;
            border-top-right-radius: unset;
        }

        .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
            border-color: unset;
        }

        .pagination > li > a, .pagination > li > span {
            border: unset;
            border-radius: 15%;
            color: rgba(0, 0, 0, .6);
            font-weight: 700;
        }

        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
            background-color: #2bbbab;
            border-color: #2bbbab;
            line-height: 1.2;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu > li.external {
            background: #BE2D45 !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu > li.external > a {
            color: #ffffff !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu > li.external > a:hover {
            color: #ffffff !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu > li.external > h3 {
            color: #ffffff !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu:after {
            border-bottom-color: #BE2D45 !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu > li.external {
            text-align: center;
            color: #fff;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu .dropdown-menu-list > li > a {
            padding: 16px 5px 10px !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li > a .time {
            background: unset !important;
            color: #626262 !important;
            font-weight: 600 !important;
        }

        .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu .dropdown-menu-list {
            padding: 0.3rem !important
            border: none !important;
            border-bottom: 1px solid #DAE1E7 !important;
        }

        .justify-content-between {
            -webkit-box-pack: justify !important;
            -webkit-justify-content: space-between !important;
            -ms-flex-pack: justify !important;
            justify-content: space-between !important;
        }

        .align-items-start {
            -webkit-box-align: start !important;
            -webkit-align-items: flex-start !important;
            -ms-flex-align: start !important;
            align-items: flex-start !important;
        }

        .d-flex {
            display: -webkit-box !important;
            display: -webkit-flex !important;
            display: -ms-flexbox !important;
            display: flex !important;
        }

        .media-list {
            max-height: 18.2rem;
        }

        .media-list .media .media-left {
            padding-left: 1rem;
        }

        .media-body {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        .ps {
            overflow: hidden !important;
            overflow-anchor: none;
            -ms-overflow-style: none;
            touch-action: auto;
            -ms-touch-action: auto;
        }

        .media-list .media .media-body .media-title {
            color: #36c6d3;
        }

        .media-list .media .media-left i {
            color: #36c6d3;
        }

        .header-navbar .navbar-container .dropdown-menu-media .dropdown-menu-footer a {
            padding: .3rem;
            border-top: 1px solid #DAE1E7;
        }

        .p-2 {
            padding: 1.5rem !important;
        }

        .dropdown-header span {
            text-align: center;
        }

        .dropdown-header span {
            color: #fff;
        }

        .dropdown-header h3 {
            color: #fff !important;
            font-size: 20px !important;
            margin-top: 0px !important;
        }

        ::placeholder {
            color: #000000 !important;
        }

        #footer {
            position: fixed !important;
            bottom: 0px !important;
            width: 100%;
            background-color: #f5f5f5;
        }
    </style>
</head>

<?php echo $__env->yieldContent('css'); ?>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/account" target="_blank">
                <img src="/lib/img/Group%20124.svg" style="width: 30px;margin: 11px" alt="logo" class="logo-default "/>
                <span class="logo-default ">مركز معاً</span>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
            <!--     <li class="dropdown" style="display: inline-table;"><a href="<?php echo e(url('/')); ?>" class="dropdown-toggle" data-hover="dropdown" target="_blank"><span style="color: #b6d0e7; margin-right: -8%; !important;">واجهة الجمهور </span></a> </li> -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <?php
                    $count = count(auth()->user()->notifications()->whereNull('read_at')->get()->toArray());
                    $items = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
                    ?>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default" id="num_notif"> <?php echo e($count); ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external" style="padding: 5px !important;">
                            <div class="dropdown-header">
                                <h3> <?php echo e($count); ?> جديد </h3>
                            </div>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list" id="notif" style="height: 300px;overflow: scroll"
                                data-handle-color="#637283">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="<?php echo e($a->id); ?>"
                                        <?php if(empty($a->read_at) || is_null($a->read_at)): ?> style="border-left: 4px solid #26c7c1;background-color: #c0ebe4;" <?php endif; ?>>
                                        <a onclick="make_read(<?php echo $a->id;?>)" href="<?php echo e($a->link); ?>"
                                           class="d-flex justify-content-between">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="icon-plus"></i>
                                                </div>

                                                <div class="media-body">
                                                    <span class="details"
                                                          style="display:block; max-width: 100%;overflow: hidden;text-overflow: ellipsis;margin-bottom: .5rem;
                                                            font-size: smaller;
                                                            color: #333;">
                                    <?php echo e($a->title); ?>


                                </span>
                                                </div>
                                                <small><span
                                                        class="time"><?php echo e($a->created_at->format('m/d/Y')); ?></span></small>

                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                                            href="/account/notifications"> عرض جميع الإشعارات </a></li>

                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle user-btn" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <?php
                        if (!Auth::guest()) {
                            Auth::user()->account->image;
                            if (Auth::user()->account->image == null) {
                                $image = "http://placehold.it/300/300";
                            } else {
                                if (file_exists(public_path() . '/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image) && Auth::user()->account->image != null)
                                    $image = asset('/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image);
                                else
                                    $image = "http://placehold.it/300/300";
                            }
                        } else
                            $image = "http://placehold.it/300/300";
                        ?>
                        <span class="username username-hide-on-mobile">
                           <i class="icon-user"></i>

                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                            <?php echo e(Auth::user()->account->full_name); ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="/account/home/change-password">
                                <i class="icon-lock"></i> تغيير كلمة المرور </a>
                        </li>
                        <li>
                            <a href="/account/account/profile/<?php echo e(Auth::user()->account->id); ?>">
                                <i class="icon-lock"></i> تعديل بياناتك </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i>
                                تسجيل خروج
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <?php
                $adminId = Auth::user()->account->circle_id;

                $links = \DB::table("links")->where("parent_id", 0)->where("show_menu", 1)->
                whereRaw('id in (select link_id from circle_link where circle_id=?)', $adminId)->orderBy('order_in_menu', 'asc')->get();

                // $links = Auth::user()->account->circle->links->where("show_menu", 1)->where("parent_id", 0);
                //                $links = \App\Link::query()->where("show_menu", 1)->where("parent_id", 0)->orderBy('order_in_menu','asc')->get();
                ?>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $sublinks = \DB::table("links")->
                    whereRaw('id in (select link_id from circle_link where circle_id=?)', $adminId)->where("parent_id", $link->id)->orderBy('order_in_menu', 'asc')->get();

                    // $sublinks = \App\Link::query()->where("show_menu", 1)->where("parent_id", $link->id)->orderBy('order_in_menu','asc')->get();

                    $sub_sublinks_error = \App\Link::where("parent_id", $link->id);


                    ?>
                    <?php if($link->no_sublink == 1): ?>

                        <li class="nav-item">
                            <a href="<?php echo e($link->url); ?>" class="nav-link">
                                <i class="<?php echo e($link->icon); ?>"></i>
                                <span class="title"><?php echo e($link->title); ?></span>
                            </a>
                        </li>
                    <?php else: ?>

                        <li class="nav-item  <?php echo e(strstr("/".Route::getFacadeRoot()->current()->uri(),$sub_sublinks_error->first()->url)?
                                                "open":''); ?> ">
                            <a href="<?php echo e($link->url); ?>" class="nav-link nav-toggle">
                                <i class="<?php echo e($link->icon); ?>"></i>
                                <span class="title"><?php echo e($link->title); ?></span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu" <?php echo e(strstr("/".Route::getFacadeRoot()->current()->uri(),$sub_sublinks_error->first()->url)?"style=display:block;":''); ?>>
                            <?php $__currentLoopData = $sublinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sublink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--<?php if(check_permission($sublink->title)): ?>-->
                                    <?php if($sublink->title != 'الرد على الشكاوى' && $sublink->title != 'ادارة الشكاوى'): ?>
                                        <li class="nav-item  ">
                                            <a href="<?php echo e($sublink->url); ?>"
                                               <?php if($sublink->title == 'اضافة شكوى'): ?> target="_blank" <?php endif; ?>
                                               class="nav-link ">
                                                <span class="title"><?php echo e($sublink->title); ?></span>
                                            </a>
                                        </li>

                                        <?php if($sublink->id == 9 ): ?>
                                            <?php
                                            $spcial = \App\Link::where("id", 11)->first();
                                            ?>
                                            <li class="nav-item  ">
                                                <a href="<?php echo e($spcial->url); ?>"
                                                   <?php if($spcial->title == 'اضافة شكوى'): ?> target="_blank" <?php endif; ?>
                                                   class="nav-link ">
                                                    <span class="title"><?php echo e($spcial->title); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>


                                    <?php endif; ?>
                                <!--<?php endif; ?>-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title"><span class='fa <?php echo $__env->yieldContent("title_icon"); ?>'
                                                 aria-hidden='true'></span> <?php echo $__env->yieldContent("title"); ?>
                        <small><?php echo $__env->yieldContent("subtitle"); ?></small>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <a style="width:220px;" title="الصلاحيات" href="/back">
                            <?php echo $__env->yieldContent("title2"); ?>
                        </a>
                    </h3>
                </div>
            </div>

            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE BAR -->
            <!--<div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Page Layouts</span>
                    </li>
                </ul>
            </div>-->
            <?php echo $__env->make("_msg", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?php echo e(date("Y")); ?> جميع الحقوق محفوظة &copy; .

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>

            </div>
            <div class="modal-body">
                تأكيد عملية الحذف
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">الغاء الامر</button>-->
                <a href="#" class="btn btn-danger main-btn">نعم, متأكد</a>
            </div>
        </div>
    </div>
</div>

<script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="/metronic-rtl/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/metronic-rtl/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/metronic-rtl/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script>
    function make_read(id) {
        $.post("<?php echo e(route('make_read')); ?>", {
            "_token": "<?php echo e(csrf_token()); ?>",
            'id': id,
        }, function (data) {

        });
    }
</script>
<script>
    $(function () {
        //$("#Confirm").modal("show");
        $(".Confirm").click(function () {
            $("#Confirm").modal("show");
            $("#Confirm .btn-danger").attr("href", $(this).attr("href"));
            return false;
        });
    });
</script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        orientation: "bottom left",
    });

</script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('078a9e270cf0ebc41e05', {
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    var user_id = '<?php echo e(auth()->user()->id); ?>';
    channel.bind(user_id, function (data) {
        //alert(JSON.stringify(data));
        // if(data.user_id == user_id) {
        var li = document.createElement("li");
        li.innerHTML = "<a onclick='make_read(" + data.id + ")' href='" + data.link + "' class='d-flex justify-content-between' style=' border-bottom: 1px solid #EFF2F6!important;padding: 16px 5px 10px;color:#555;text-decoration: none;display: block;clear: both;font-weight: 300;line-height: 18px;white-space: nowrap;'><div class='media d-flex align-items-start'><div class='media-left'><i class='fa fa-plus' style='color: #BE2D45;'></i></div><div class='media-body'><span class='details' style='display:block; max-width: 100%;overflow: hidden;text-overflow: ellipsis;margin-bottom: .5rem;font-size: smaller;color: #333;white-space: normal'> " + data.title + " </span></div><small><span class='time'>" + data.date + "</span></small></div> </a>";


        document.getElementById("notif").prepend(li);
        var num_notif = document.getElementById("num_notif");
        num_notif.innerHTML = "";
        num_notif.innerHTML = "<span>" + data.num_notif + "</span>";

        var audio = new Audio('audio/unsure.mp3');
        audio.play();
        // }
    });
</script>
<?php echo $__env->yieldContent("js"); ?>
</body>

</html>
