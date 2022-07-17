<?php $__env->startSection("title", " معالجة ال".$form_type->find($type)->name); ?>
<?php $__env->startSection('css'); ?>
    <style>

        .alert {
            width: 50%;
            border-radius: 6px;
            font-size: 16px;
            border-right: 2px solid rgba(0, 0, 0, 0.25);
        }

        .alert-danger {
            color: #ffffff;
            background-color: #D60000;
            border-color: #f5c6cb;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        fieldset.scheduler-border legend {
            color: #be2d45;
            width: inherit; /* Or auto */
            padding: 0 10px; /* To give a bit of padding on the left and right */
            border-bottom: none;
            font-weight: bolder;
        }


        button.btn.btn-primary.prevBtn.pull-right.button {
            margin-left: 10px;
        }

        .panel-primary > .panel-heading {
            padding: 0 !important;
            height: 35px !important;
            background-color: #be2d45 !important;
            border-color: #be2d45 !important;
        }

        .panel-title {
            padding-top: 10px;
        }

        .panel-primary {
            border-color: #be2d45 !important;
        }

        .btn-primary, .btn-success {
            background-color: #be2d45;
            border-color: #be2d45;
        }

        .importantRule {
            overflow: visible !important;
        }

        [v-cloak] {
            display: none;
        }

        body {
            overflow-x: hidden;
        }

        .accordion, .accordion1 {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 10px;
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

        .accordion:after, .accordion1:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: left;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel#first_panel, .panel#second_panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .panel#first_panel.open {
            min-height: 170px !important;
            overflow: auto !important;
        }

        .panel#second_panel.open {
            min-height: 230px !important;
            overflow: auto !important;
        }

        #changecategorydiv.open {
            min-height: 150px !important;
        }


        #replies.open {
            min-height: 600px !important;
        }

        #explain_div.open, #rank_div.open {
            min-height: 420px !important;
            max-height: 550px !important;
        }

        #deleted_main_div.open {
            min-height: 500px !important;
            max-height: 650px !important;
        }

        .alert {
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            text-align: center;
            top: 10em;
            width: 80%;
            z-index: 1;
        }


        @media  print {
            button[type=submit], input[type=submit], .button {
                display: none !important;
            }

            @page  {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 72px;
                padding-bottom: 72px;
            }
        }

        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;

        }

        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }

        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
            float: inherit;
        }

        .btn-circle {
            width: 70px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 14px;
            line-height: 1.428571429;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .pull-right {
            float: left !important;
        }

        .table-striped > tbody > tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table-striped > tbody > tr > td:nth-child(odd) {
            background-color: #f9f9f9;
            font-weight: 600;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php
$fff = "";
if (Auth::user()) {
    if ($auth_circle_users) {
        $users = array();
        foreach ($auth_circle_users as $key => $value) {
            if (in_array(3, $value)) {
                array_push($users, $value);
                $fff = \App\Account::find($key)->full_name;
            }

        }
    }
}
?>

<?php if(Auth::user()): ?>
    <?php if($auth_circle_users): ?>
        <?php $__currentLoopData = $auth_circle_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$auth_circle_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($k == auth()->user()->account->id): ?>

                <?php if(in_array(2,$auth_circle_user) || in_array(3,$auth_circle_user) || in_array(4,$auth_circle_user) || in_array(5,$auth_circle_user)): ?>

<?php $__env->startSection("content"); ?>
    <div style="" id="auth_circle_users">
        <!--container-fluid login-wrap edit-wrap-->
        <section class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6" align="left">
                            
                            
                            
                            

                            

                            <?php if($item->reprocessing_parent_form_id): ?>
                                <a target="_blank" class="btn btn-primary"
                                   href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_parent_form_id); ?>">نتيجة
                                    المعالجة السابقة</a>

                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">

                            <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;"> معالجة
                                ال<?php echo e($item->form_type->name); ?>


                            </h3>
                        </div>

                        <div class="col-md-12">

                            <div class="inner-card inner-card-border">
                                <div class="inner-card-content">
                                    <div class="inner-card-body">
                                        <div class="row pb-50">
                                            <div class="col-md-6">
                                                <label class="col-form-label">المدة الزمنية المتبقية لمعالجة
                                                    ال<?php echo e($form_type->find($type)->name); ?></label>
                                                <button id="count-days" class="btn btn-primary"></button>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">المدة الزمنية المطلوبة لمعالجة
                                                    ال<?php echo e($form_type->find($type)->name); ?></label>
                                                <?php if($item->response_type == 1): ?>
                                                    <button class="btn btn-primary">13 يوم</button>
                                                    <input type="hidden" id="count-days_of_processing" value="13">
                                                <?php else: ?>
                                                    <button class="btn btn-primary">9 أيام</button>
                                                    <input type="hidden" id="count-days_of_processing" value="9">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="message_session" style="display: none;">
                        <div class="col-sm-12">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 id="content_message"></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="inner-card inner-card-user">
                                <div class="inner-card-header">
                                    <div class="inner-card-title">
                                        <button type="button"
                                                style="height:30px !important;width: 30px !important;margin-left: 10px;"
                                                class="btn btn-primary add-btn" id="first_msg_btn">
                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                        </button>
                                        أولاً:
                                        معلومات مقدم ال<?php echo e($form_type->find($type)->name); ?> الأساسية

                                    </div>
                                </div>
                                <div class="inner-card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                            <div id="first_msg">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered"
                                                           style="width:100%;white-space:normal;table-layout: fixed">
                                                        <tr class="showdateciz">
                                                            <td colspan="2">الرقم المرجعي:</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?> <?php echo e($item->citizen->id); ?><?php endif; ?></td>
                                                            <td colspan="2">الاسم رباعي:</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2 ): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name); ?><?php endif; ?></td>
                                                            <td colspan="2">رقم الهوية/جواز السفر:</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2 ): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->id_number); ?><?php endif; ?></td>
                                                        </tr>

                                                        <tr class="showdateciz">
                                                            <td colspan="2">رقم التواصل (1):</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2 ): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->mobile); ?><?php endif; ?></td>
                                                            <td colspan="2">رقم التواصل (2):</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2 ): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->mobile2); ?><?php endif; ?></td>
                                                            <td colspan="2">المحافظة:</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->governorate); ?><?php endif; ?></td>
                                                        </tr>

                                                        <tr class="showdateciz">
                                                            <td colspan="2">المنطقة :</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->city); ?><?php endif; ?></td>
                                                            <td colspan="2">العنوان:</td>
                                                            <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->street); ?><?php endif; ?></td>
                                                            <td colspan="2">فئة مقدم <?php echo e($form_type->find($type)->name); ?>

                                                                :
                                                            </td>
                                                            <?php
                                                            $project_arr = array();
                                                            if($item->hide_data != 2){
                                                                foreach ($item->citizen->projects as $project) {
                                                                    array_push($project_arr, $project->id);
                                                                }
                                                            }

                                                            ?>
                                                            <td colspan="2"><?php if(!in_array($item->project->id,$project_arr)): ?><?php echo e('غير مستفيد من مشاريع المركز'); ?><?php else: ?><?php echo e('مستفيد من مشاريع المركز '); ?><?php endif; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">رقم طلب المشروع:</td>
                                                            <?php if($item->hide_data == 2 ): ?>
                                                                <td colspan="2">_</td> <?php else: ?>
                                                                <?php if($item->project_id != 1): ?>

                                                                    <td colspan="2"><?php echo e($item->citizen->citizen_projects()->where('project_id',$item->project_id)->first()->project_request); ?></td>
                                                                <?php else: ?>
                                                                    <td colspan="2">_</td>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                            <td colspan="2">رمز المشروع:</td>
                                                            <td colspan="2"><?php echo e($item->project->code); ?>

                                                            </td>
                                                            <td colspan="2">اسم المشروع:</td>
                                                            <td colspan="2"><?php echo e($item->project->name); ?>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="inner-card inner-card-user">
                                <div class="inner-card-header">
                                    <div class="inner-card-title">
                                        <button type="button"
                                                style="height:30px !important;width: 30px !important;margin-left: 10px;"
                                                class="btn btn-primary add-btn" id="second_msg_btn">
                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                        </button>
                                        ثانياً:
                                        تفاصيل ال<?php echo e($form_type->find($type)->name); ?>


                                    </div>
                                </div>
                                <div class="inner-card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                            <div id="second_msg">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered"
                                                           style="width:100%;white-space:normal;">
                                                        <tr>
                                                            <td class="mo" colspan="2">طريقة الاستقبال:</td>
                                                            <td colspan="2"><?php echo e($item->sent_typee->name); ?></td>
                                                            <td class="mo" colspan="2">تاريخ تقديم
                                                                ال<?php echo e($form_type->find($type)->name); ?>:
                                                            </td>
                                                            <td colspan="2"><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                                                            <td class="mo" colspan="2">تاريخ تسجيل
                                                                ال<?php echo e($form_type->find($type)->name); ?> علي النظام:
                                                            </td>
                                                            <td colspan="2"><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="mo" colspan="2">فئة
                                                                ال<?php echo e($form_type->find($type)->name); ?>:
                                                            </td>
                                                            <td><?php echo e($item->category->name); ?></td>

                                                            <?php if($item->old_category_id): ?>
                                                                <td class="mo" colspan="2">فئة
                                                                    ال<?php echo e($form_type->find($type)->name); ?> المعدلة بناءً
                                                                    على محتوى
                                                                    ال<?php echo e($form_type->find($type)->name); ?>:
                                                                </td>
                                                                <td colspan="2"><?php echo e($item->old_category->name); ?></td>

                                                                <td class="mo" colspan="2">اسم المستخدم الذي قام بإعادة
                                                                    تصنيف الفئة:
                                                                </td>
                                                                <td colspan="2"><?php echo e($item->user_change_category->name); ?></td>
                                                            <?php endif; ?>
                                                        </tr>
                                                        <tr>
                                                            <td class="mo" colspan="2">محتوى
                                                                ال<?php echo e($form_type->find($type)->name); ?>:
                                                            </td>
                                                            <td colspan="10"><?php echo e($item->content); ?></td>
                                                        </tr>

                                                        <?php if($item->reformulate_content): ?>
                                                            <tr>
                                                                <td class="mo" colspan="2">محتوى
                                                                    ال<?php echo e($form_type->find($type)->name); ?> المعدل بناءً على
                                                                    نتيجة
                                                                    الاستيضاح:
                                                                </td>
                                                                <td colspan="4"><?php echo e($item->reformulate_content); ?></td>

                                                                <td class="mo" colspan="2">اسم المستخدم الذي قام بإعادة
                                                                    صياغة المحتوى:
                                                                </td>
                                                                <td colspan="4"><?php echo e($item->user_change_content->full_name); ?></td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <tr>
                                                            <td class="mo" colspan="2">المرفقات:</td>
                                                            <td colspan="10">
                                                                <?php
                                                                $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

                                                                if(!$form_files->isEmpty()){
                                                                ?>
                                                                <a class="btn btn-xs btn-primary" data-toggle="modal"
                                                                   id="smallButton"
                                                                   data-target="#smallModal"
                                                                   data-attr="<?php echo e(route('showfiles', $item->id)); ?>"
                                                                   title="اضغظ هنا">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <?php }else{?>
                                                                <a class="btn btn-xs btn-primary"
                                                                   title="لايوجد مرفقات لعرضها" readonly="">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-1"></div>
                            <div class="stepwizard-step col-xs-2">

                                <a id="btn-step-1" href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                <p><small> الحاجة للاستيضاح عن مضمون ال<?php echo e($form_type->find($type)->name); ?>

                                    </small></p>
                            </div>
                            <div class="stepwizard-step col-xs-2">
                                <a id="btn-step-2" href="#step-2" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">2</a>
                                <p><small> الحاجة لحذف ال<?php echo e($form_type->find($type)->name); ?></small></p>
                            </div>
                            <div class="stepwizard-step col-xs-2">
                                <a id="btn-step-3" href="#step-3" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">3</a>
                                <p><small>الحاجة لإعادة تصنيف فئة ال<?php echo e($form_type->find($type)->name); ?></small></p>
                            </div>
                            <div class="stepwizard-step col-xs-2">
                                <a id="btn-step-4" href="#step-4" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">4</a>
                                <p><small> إجراءات الرد على ال<?php echo e($form_type->find($type)->name); ?></small></p>
                            </div>
                            <div class="stepwizard-step col-xs-2">
                                <a id="btn-step-5" href="#step-5" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">5</a>
                                <p><small> التغذية الراجعة</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-1"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-primary setup-content" id="step-1">
                                <div class="panel-heading">
                                    <h3 class="panel-title">الحاجة للاستيضاح عن مضمون
                                        ال<?php echo e($form_type->find($type)->name); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?php if((in_array(2,$auth_circle_user) ||  (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1))&&
((!is_null($item->need_clarification) &&  $item->need_clarification == 0)  ||
(!is_null($item->have_clarified) && $item->have_clarified == 1 && !is_null($item->need_clarification)))
&& !$item->form_response ): ?>
                                        <form id="update_clarification_form_modal" class="prodcedure_2">
                                            <input type="hidden" id="clarification_id" value="<?php echo e($item->id); ?>">
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <label for="sent_type" class="col-form-label">هل
                                                        ال<?php echo e($form_type->find($type)->name); ?>

                                                        بحاجة
                                                        للاستيضاح عن مضمونها؟</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio1"
                                                                       value="0" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("checked"); ?> <?php endif; ?>>
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio1"
                                                                       value="1" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 1): ?> <?php echo e("checked"); ?> <?php endif; ?>>
                                                                نعم
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <p id="optradio1p" class="help-block" style="color:red;"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="explain_main_div" style="display: none;">

                                                <div class="form-group row">
                                                    <div class="col-sm-offset-6 col-sm-6">
                                                        <label for="sent_type" class="col-form-label">هل تم الاستيضاح عن
                                                            مضمون ال<?php echo e($form_type->find($type)->name); ?>؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio2"
                                                                           value="0" <?php if(!is_null($item->have_clarified) && $item->have_clarified == 0): ?> <?php echo e("checked"); ?> <?php endif; ?>>
                                                                    لا
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio2"
                                                                           value="1" <?php if(!is_null($item->have_clarified) && $item->have_clarified == 1): ?> <?php echo e("checked"); ?> <?php endif; ?>>
                                                                    نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <p id="optradio2p" class="help-block" style="color:red;"></p>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8" id="reformulate_div" style="display: none;">
                                                        <label class="col-sm-12 col-form-label">إعادة صياغة محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة
                                                            الاستيضاح:</label>
                                                        <input style="width: 60%;" class="form-control" type="text"
                                                               id="reformulate_content"
                                                               name="reformulate_content" autocomplete="off"
                                                               value="<?php echo e($item->reformulate_content); ?>">
                                                        <p id="optradio3p" class="help-block" style="color:red;"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8" id="reason_lack_clarification_div"
                                                         style="display: none">
                                                        <label class="col-sm-12 col-form-label">سبب عدم
                                                            الاستيضاح</label>
                                                        <input style="width: 60%" class="form-control" type="text"
                                                               id="reason_lack_clarification"
                                                               name="reason_lack_clarification" autocomplete="off"
                                                               value="<?php echo e($item->reason_lack_clarification); ?>">
                                                        <p id="optradio4p" class="help-block" style="color:red;"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <button id="submit_update_clarification xxx"
                                                            class="btn btn-primary nextBtn pull-right button">
                                                        التالي
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    <?php elseif((!is_null($item->need_clarification)
&& (in_array(2,$auth_circle_user) || (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)))  || (!is_null($item->need_clarification) && in_array(5,$auth_circle_user))): ?>

                                        <div class="form-group row">
                                            <div class="col-sm-6 col-sm-offset-6">
                                                <label for="sent_type" class="col-form-label">هل
                                                    ال<?php echo e($form_type->find($type)->name); ?>

                                                    بحاجة
                                                    للاستيضاح عن مضمونها؟</label>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                   name="optradio1"
                                                                   value="0" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("checked disabled"); ?> <?php elseif($item->need_clarification && $item->need_clarification == 1): ?><?php echo e("disabled"); ?> <?php endif; ?>>
                                                            لا
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                   name="optradio1"
                                                                   value="1" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("disabled"); ?><?php elseif($item->need_clarification && $item->need_clarification == 1): ?><?php echo e("checked disabled"); ?> <?php endif; ?>>
                                                            نعم
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <button id="submit_update_clarification cdcc"
                                                            class="btn btn-primary nextBtn pull-right button">
                                                        التالي
                                                    </button>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div id="explain_main_div" style="display: none;">
                                            <hr>

                                            <?php if($item->reformulate_content): ?>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>اسم المستخدم الذي قام بإعادة صياغة المحتوى:</label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->user_change_content->full_name); ?>"
                                                               readonly/>
                                                    </div>
                                                    <div class="col-sm-6"><label>محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?> المعدل
                                                            بعد
                                                            الاستيضاح </label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->reformulate_content); ?>"
                                                               readonly/>
                                                    </div>
                                                </div>

                                                <br>
                                                <button class="btn btn-primary nextBtn pull-right button">
                                                    التالي
                                                </button>

                                            <?php elseif($item->reason_lack_clarification): ?>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="xx">اسم المستخدم الذي قام بوضع سبب عدم
                                                            الاستيضاح:</label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->user_change_content->full_name); ?>"
                                                               readonly/>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label>سبب عدم الاستيضاح</label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->reason_lack_clarification); ?>"
                                                               readonly/>
                                                    </div>

                                                </div>
                                            <?php else: ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-offset-6 col-sm-6">
                                                        <label for="sent_type" class="col-form-label">هل تم الاستيضاح عن
                                                            مضمون ال<?php echo e($form_type->find($type)->name); ?>؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio2"
                                                                           value="0">
                                                                    لا
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio2"
                                                                           value="1">
                                                                    نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8" id="reformulate_div" style="display: none;">
                                                        <label class="col-sm-12 col-form-label">إعادة صياغة محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة
                                                            الاستيضاح:</label>
                                                        <input style="width: 60%;" class="form-control " type="text"
                                                               id="reformulate_content"
                                                               name="reformulate_content" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8" id="reason_lack_clarification_div"
                                                         style="display: none">
                                                        <label class="col-sm-12 col-form-label">سبب عدم
                                                            الاستيضاح</label>
                                                        <input style="width: 60%" class="form-control" type="text"
                                                               id="reason_lack_clarification"
                                                               name="reason_lack_clarification" autocomplete="off">
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!is_null($item->reprocessing)): ?>

                                                <div class="row">

                                                    <div class="col-sm-12" style="margin-bottom: 10px;">
                                                        <hr>
                                                        <h4>فيما يلي التوصيات بخصوص عدم الاستيضاح عن مضمون الشكوى من قبل
                                                            الجهة الإدارية المسؤولة عن متابعة الجهة المختصة بمعالجة
                                                            ال<?php echo e($form_type->find($type)->name); ?>: </h4>
                                                    </div>

                                                    <div class="col-sm-8">
                                                        <label style="display: block;">التوصيات:</label>
                                                        <?php if( $item->reprocessing): ?>
                                                            <input class="form-control"
                                                                   value="يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>"
                                                                   readonly/>
                                                        <?php else: ?>
                                                            <div class="col-sm-4">
                                                                <?php if((in_array(2,$auth_circle_user)|| (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)) && $item->reprocessing_form_id): ?>
                                                                    <a style="margin-top: 25px;" target="_blank"
                                                                       class="btn btn-primary"
                                                                       href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_form_id); ?>">
                                                                        <span class="fa fa-refresh"></span>
                                                                        إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <label>يوصي بإعادة معالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?>

                                                                    مع أخذ بعين
                                                                    الاعتبار
                                                                    التوصيات التالية</label>
                                                                <input class="form-control"
                                                                       value="<?php echo e($item->reprocessing_recommendations); ?>"
                                                                       readonly/>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label style="display: block">الجهة الإدارية المسؤولة عن متابعة
                                                            الجهة المختصة بمعالجة
                                                            ال<?php echo e($form_type->find($type)->name); ?></label>

                                                        <?php if( $item->reprocessing): ?>
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                   readonly/>
                                                        <?php else: ?>
                                                            <label> </label>
                                                            <input style="width: 75%;" class="form-control"
                                                                   value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                   readonly/>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    <?php endif; ?>
                                    <?php if(in_array(2,$auth_circle_user) || (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)): ?>
                                        <?php if(is_null($item->need_clarification)): ?>
                                            <form id="update_clarification_form_modal" class="prodcedure_2">
                                                <input type="hidden" id="clarification_id" value="<?php echo e($item->id); ?>">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <label for="sent_type" class="col-form-label">هل
                                                            ال<?php echo e($form_type->find($type)->name); ?>

                                                            بحاجة
                                                            للاستيضاح عن مضمونها؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio"
                                                                           class="form-group form-check-input"
                                                                           name="optradio1"
                                                                           value="0">
                                                                    لا
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio"
                                                                           class="form-group form-check-input"
                                                                           name="optradio1"
                                                                           value="1">
                                                                    نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <p id="optradio1p" class="help-block" style="color:red;"></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="explain_main_div" style="display: none;">

                                                    <div class="form-group row">
                                                        <div class="col-sm-offset-6 col-sm-6">
                                                            <label for="sent_type" class="col-form-label">هل تم
                                                                الاستيضاح عن مضمون ال<?php echo e($form_type->find($type)->name); ?>

                                                                ؟</label>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio2"
                                                                               value="0">
                                                                        لا
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio2"
                                                                               value="1">
                                                                        نعم
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-sm-offset-6">
                                                            <p id="optradio2p" class="help-block"
                                                               style="color:red;"></p>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-8" id="reformulate_div"
                                                             style="display: none;">
                                                            <label class="col-sm-12 col-form-label">إعادة صياغة محتوى
                                                                ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة
                                                                الاستيضاح:</label>
                                                            <input style="width: 60%;" class="form-control " type="text"
                                                                   id="reformulate_content"
                                                                   name="reformulate_content" autocomplete="off">
                                                            <p id="optradio3p" class="help-block"
                                                               style="color:red;"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-8" id="reason_lack_clarification_div"
                                                             style="display: none">
                                                            <label class="col-sm-12 col-form-label">سبب عدم
                                                                الاستيضاح</label>
                                                            <input style="width: 60%" class="form-control" type="text"
                                                                   id="reason_lack_clarification"
                                                                   name="reason_lack_clarification" autocomplete="off">
                                                            <p id="optradio4p" class="help-block"
                                                               style="color:red;"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-2">
                                                        <button id="submit_update_clarification"
                                                                class="btn btn-primary nextBtn pull-right button">
                                                            التالي
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array(5,$auth_circle_user) && $item->need_clarification && $item->have_clarified == 0 && is_null($item->reprocessing)): ?>
                                        <form id="update_clarification_form_modal" class="prodcedure_3">
                                            <input type="hidden" id="clarification_id" value="<?php echo e($item->id); ?>">
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">هل ال<?php echo e($form_type->find($type)->name); ?>

                                                        بحاجة
                                                        لإغلاق؟</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12" id="stop_div" style="display: none">
                                                            <label>سيتم إيقاف
                                                                ال<?php echo e($form_type->find($type)->name); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div id="reprocessing_div"
                                                             style="margin-top: -30px;width: 80%;display: none;">
                                                            <label>يوصى بإعادة معالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?>

                                                                مع أخذ التوصيات التالية بعين الاعتبار: </label>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="reprocessing_recommendations"
                                                                              name="reprocessing_recommendations"></textarea>

                                                                    <p id="optradio6p" class="help-block"
                                                                       style="margin-right:15px;color:red;"></p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                   name="optradio3" value="0">
                                                            لا
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                   name="optradio3" value="1">
                                                            نعم
                                                        </label>
                                                    </div>
                                                </div>
                                                <p id="optradio5p" class="help-block"
                                                   style="margin-right:15px;color:red;"></p>
                                            </div>

                                            <div class="form-group row">
                                                <div style="float:left; margin-left: 50px;">
                                                    <button id="submit_update_clarification"
                                                            class="btn btn-primary nextBtn pull-right button">حفظ
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                    <?php if((in_array(3,$auth_circle_user) && count($auth_circle_user) == 1) || (in_array(4,$auth_circle_user) && count($auth_circle_user) == 1)): ?>
                                        <?php if(!is_null($item->need_clarification)): ?>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <label for="sent_type" class="col-form-label">هل
                                                        ال<?php echo e($form_type->find($type)->name); ?>

                                                        بحاجة
                                                        للاستيضاح عن مضمونها؟</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio1"
                                                                       value="0" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("checked disabled"); ?> <?php elseif($item->need_clarification && $item->need_clarification == 1): ?><?php echo e("disabled"); ?> <?php endif; ?>>
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio1"
                                                                       value="1" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("disabled"); ?><?php elseif($item->need_clarification && $item->need_clarification == 1): ?><?php echo e("checked disabled"); ?> <?php endif; ?>>
                                                                نعم
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?>
                                                <br>
                                                <button class="btn btn-primary nextBtn pull-right button">
                                                    التالي
                                                </button>
                                            <?php endif; ?>

                                            <div id="explain_main_div" style="display: none;">
                                                <hr>

                                                <?php if($item->reformulate_content): ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>اسم المستخدم الذي قام بإعادة صياغة المحتوى:</label>
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->user_change_content->full_name); ?>"
                                                                   readonly/>
                                                        </div>
                                                        <div class="col-sm-6"><label>محتوى
                                                                ال<?php echo e($form_type->find($type)->name); ?> المعدل
                                                                بعد
                                                                الاستيضاح </label>
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->reformulate_content); ?>"
                                                                   readonly/>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <button class="btn btn-primary nextBtn pull-right button">
                                                        التالي
                                                    </button>

                                                <?php elseif($item->reason_lack_clarification): ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>اسم المستخدم الذي قام بوضع سبب عدم الاستيضاح:</label>
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->user_change_content->full_name); ?>"
                                                                   readonly/>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label>سبب عدم الاستيضاح</label>
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->reason_lack_clarification); ?>"
                                                                   readonly/>
                                                        </div>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-offset-6 col-sm-6">
                                                            <label for="sent_type" class="col-form-label">هل تم
                                                                الاستيضاح عن المعلومات
                                                                المطلوبة؟</label>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio2"
                                                                               value="0">
                                                                        لا
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio2"
                                                                               value="1">
                                                                        نعم
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-8" id="reformulate_div"
                                                             style="display: none;">
                                                            <label class="col-sm-12 col-form-label">إعادة صياغة محتوى
                                                                ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة
                                                                الاستيضاح:</label>
                                                            <input style="width: 60%;" class="form-control " type="text"
                                                                   id="reformulate_content"
                                                                   name="reformulate_content" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-8" id="reason_lack_clarification_div"
                                                             style="display: none">
                                                            <label class="col-sm-12 col-form-label">سبب عدم
                                                                الاستيضاح</label>
                                                            <input style="width: 60%" class="form-control" type="text"
                                                                   id="reason_lack_clarification"
                                                                   name="reason_lack_clarification" autocomplete="off">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if(!is_null($item->reprocessing)): ?>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <input class="form-control"
                                                                   value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                   readonly/>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label>الجهة الإدارية المسؤولة عن متابعة الجهة المختصة
                                                                بمعالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?></label>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <label>التوصيات </label>
                                                            <?php if( $item->reprocessing): ?>
                                                                <h4 style="color: red;">
                                                                    يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>

                                                                </h4>
                                                            <?php else: ?>
                                                                <h4 style="color: red;">
                                                                    يوصي بإعادة معالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?> مع أخذ بعين
                                                                    الاعتبار
                                                                    التوصيات التالية
                                                                </h4>
                                                                <input class="form-control"
                                                                       value="<?php echo e($item->reprocessing_recommendations); ?>"
                                                                       readonly/>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="panel panel-primary setup-content" id="step-2">
                                <div class="panel-heading">
                                    <h3 class="panel-title">الحاجة لحذف ال<?php echo e($form_type->find($type)->name); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?php if((in_array(2,$auth_circle_user)|| (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)) &&  !is_null($item->deleting) && $item->deleting == 0 && !$item->form_response): ?>
                                        <form id="delete_form_modal">
                                            <input type="hidden" id="deleted_id" value="<?php echo e($item->id); ?>">
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <label for="sent_type" class="col-form-label">هل
                                                        ال<?php echo e($form_type->find($type)->name); ?> بحاجة
                                                        للحذف؟</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio"
                                                                       value="0" <?php if($item->deleting == 0): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       id="post-format-gallery"
                                                                       name="optradio"
                                                                       value="1" <?php if($item->deleting == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                                نعم
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <p id="optradiop" class="help-block" style="color:red;"></p>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-group row deleted_div">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                                        الحذف</label>
                                                    <input type="text" class="form-control" name="deleted_at" readonly
                                                           value="<?php echo e(\Carbon\Carbon::now()); ?>">


                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-form-label">اسم المستخدم الذي قام
                                                        بالحذف</label>
                                                    <input type="hidden" class="form-control" name="deleted_by"
                                                           value="<?php echo e(Auth::user()->id); ?>">
                                                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                                                    <input type="text" class="form-control" name="deleted_by_name"
                                                           readonly
                                                           value="<?php echo e(Auth::user()->account->full_name); ?>">

                                                </div>
                                            </div>

                                            <div class="form-group row deleted_div">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                        الحذف</label>
                                                    <input type="text" class="form-control" id="deleting_reason"
                                                           placeholder="سبب الحذف">
                                                    <p id="deleting_reasonp" class="help-block" style="color:red;"></p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div style="float:left; margin-left: 50px;">
                                                    <button id="submit_delete"
                                                            class="btn btn-primary nextBtn pull-right  button">
                                                        التالي
                                                    </button>

                                                    <button class="btn btn-primary prevBtn pull-right button"
                                                            type="button">
                                                        السابق
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php elseif((in_array(2,$auth_circle_user)|| (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)) &&  is_null($item->deleting)): ?>
                                        <form id="delete_form_modal">
                                            <input type="hidden" id="deleted_id" value="<?php echo e($item->id); ?>">
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <label for="sent_type" class="col-form-label">هل
                                                        ال<?php echo e($form_type->find($type)->name); ?> بحاجة
                                                        للحذف؟</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="optradio"
                                                                       value="0">
                                                                لا

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       id="post-format-gallery"
                                                                       name="optradio" value="1"> نعم
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-sm-offset-6">
                                                    <p id="optradiop" class="help-block" style="color:red;"></p>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-group row deleted_div">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                                        الحذف</label>
                                                    <input type="text" class="form-control" name="deleted_at" readonly
                                                           value="<?php echo e(\Carbon\Carbon::now()); ?>">


                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-form-label">اسم المستخدم الذي قام
                                                        بالحذف</label>
                                                    <input type="hidden" class="form-control" name="deleted_by"
                                                           value="<?php echo e(Auth::user()->id); ?>">
                                                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                                                    <input type="text" class="form-control" name="deleted_by_name"
                                                           readonly
                                                           value="<?php echo e(Auth::user()->account->full_name); ?>">

                                                </div>
                                            </div>

                                            <div class="form-group row deleted_div">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                        الحذف</label>
                                                    <input type="text" class="form-control" id="deleting_reason"
                                                           placeholder="سبب الحذف">
                                                    <p id="deleting_reasonp" class="help-block" style="color:red;"></p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div style="float:left; margin-left: 50px;">
                                                    <button id="submit_delete"
                                                            class="btn btn-primary nextBtn pull-right  button">
                                                        التالي
                                                    </button>

                                                    <button class="btn btn-primary prevBtn pull-right button"
                                                            type="button">
                                                        السابق
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    <?php else: ?>
                                        <input type="hidden" id="deleted_id" value="<?php echo e($item->id); ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-sm-offset-6">
                                                <label for="sent_type" class="col-form-label">هل
                                                    ال<?php echo e($form_type->find($type)->name); ?> بحاجة
                                                    للحذف؟</label>
                                                <div class="col-sm-2">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optradio"
                                                                   value="0"
                                                                   <?php if($item->deleting == 0): ?><?php echo e('checked'); ?><?php endif; ?> disabled>
                                                            لا

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                   id="post-format-gallery"
                                                                   name="optradio" value="1"
                                                                   <?php if($item->deleting == 1): ?><?php echo e('checked'); ?><?php endif; ?> disabled>
                                                            نعم
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0 && $item->deleting == 0): ?>
                                            <br>
                                            <button class="btn btn-primary nextBtn pull-right button">
                                                التالي
                                            </button>

                                            <button class="btn btn-primary prevBtn pull-right button" type="button">
                                                السابق
                                            </button>
                                        <?php endif; ?>
                                        
                                        <?php if($item->deleting == 1): ?>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                                        الحذف</label>
                                                    <input type="text" class="form-control" name="deleted_at" readonly
                                                           value="<?php if(!$item->deleted_at): ?><?php echo e($item->confirm_deleting); ?><?php else: ?><?php echo e($item->deleted_at); ?><?php endif; ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-form-label">اسم المستخدم الذي قام
                                                        بالحذف</label>
                                                    <input type="text" class="form-control" name="deleted_by_name"
                                                           readonly
                                                           value="<?php echo e($item->deleted_user->name); ?>" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                        الحذف</label>
                                                    <input type="text" class="form-control" id="deleting_reason"
                                                           placeholder="سبب الحذف"
                                                           value="<?php echo e($item->deleted_because); ?>" readonly>
                                                </div>
                                            </div>

                                            <?php if(in_array(5,$auth_circle_user) && $item->confirm_deleting && is_null($item->recommendations_for_deleting)): ?>
                                                <form id="confirm_delete_form_modal">
                                                    <input type="hidden" id="deleted_id" value="<?php echo e($item->id); ?>">
                                                    <hr>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">هل
                                                                ال<?php echo e($form_type->find($type)->name); ?>

                                                                بحاجة لحذف؟</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group row">
                                                                <div id="confirm_deleting_div" style="display: none">
                                                                    <h4 style="color: red">إتمام عملية الحذف</h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio6"
                                                                           value="1"> نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group row">
                                                                <div id="reprocessing_deleteing_div"
                                                                     style="display: none">
                                                                    <h4>إعادة معالجة
                                                                        ال<?php echo e($form_type->find($type)->name); ?></h4>
                                                                    <h4>التوصيات</h4>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                           <textarea class="form-control" rows="3"
                                                                     id="deleting_reprocessing_recommendations"
                                                                     name="deleting_reprocessing_recommendations"></textarea>
                                                                            <p id="optradio8p" class="help-block"
                                                                               style="margin-right:15px;color:red;"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio6"
                                                                           value="0"> لا
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <p id="optradio7p" class="help-block"
                                                           style="margin-right:15px;color:red;"></p>

                                                    </div>


                                                    <div class="form-group row">
                                                        <div style="float:left; margin-left: 50px;">
                                                            <button id="submit_delete"
                                                                    class="btn btn-primary nextBtn pull-right button">
                                                                حفظ
                                                            </button>

                                                            <button class="btn btn-primary prevBtn pull-right button"
                                                                    type="button">
                                                                السابق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($item->recommendations_for_deleting): ?>
                                            <hr>
                                            <h4>
                                                فيما يلي التوصيات بخصوص حذف ال<?php echo e($form_type->find($type)->name); ?> من قبل
                                                الجهة الإدارية المسؤولة عن متابعة الجهة المختصة بمعالجة
                                                ال<?php echo e($form_type->find($type)->name); ?></h4>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>الجهة الإدارية:</td>
                                                    <td><?php echo e($item->user_recommendations_for_deleting->full_name); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>التوصيات:</td>
                                                    <td>
                                                        <?php echo e($item->recommendations_for_deleting); ?></td>
                                                </tr>
                                            </table>
                                            <?php if((in_array(2,$auth_circle_user)|| (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)) && is_null($item->deleted_at)): ?>
                                                <div>
                                                    <a style="margin-top: 25px;float: left;" target="_blank"
                                                       class="btn btn-primary"
                                                       href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_form_id); ?>">
                                                        <span class="fa fa-refresh"></span>
                                                        إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="panel panel-primary setup-content" id="step-3">
                                <div class="panel-heading">
                                    <h3 class="panel-title">الحاجة لإعادة تصنيف فئة
                                        ال<?php echo e($form_type->find($type)->name); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?php if(in_array(2,$auth_circle_user) || (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)): ?>
                                        <?php if(!$item->form_response && !is_null($item->old_category_id)): ?>
                                            <form id="update_category_form_modal">
                                                <input type="hidden" id="updated_category_id" value="<?php echo e($item->id); ?>">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <label for="sent_type" class="col-form-label">هل
                                                            ال<?php echo e($form_type->find($type)->name); ?>

                                                            بحاجة لإعادة تصنيف فئته/ا؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio4"
                                                                           value="0" <?php if(!is_null($item->old_category_id) && $item->old_category_id == 0): ?><?php echo e('checked'); ?><?php endif; ?>>لا
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           id="post-format-gallery"
                                                                           name="optradio4"
                                                                           value="1" <?php if(!is_null($item->old_category_id) && $item->old_category_id != 0): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                                    نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <p id="optradio9p" class="help-block"
                                                           style="margin-right:15px;color:red;"></p>
                                                    </div>

                                                </div>
                                                <hr>

                                                <div class="form-group row" id="updated_category_div">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-4 col-form-label">فئة
                                                            ال<?php echo e($form_type->find($type)->name); ?> المعدلة بناءً على محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?>:</label>
                                                        <?php if($item->type == 1): ?>
                                                            <select class="form-control" id="updated_category_name"
                                                                    name="category_id"
                                                                    style="width: 40% !important;">
                                                                <option value="">اختر فئة الشكوى</option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($cat->is_complaint != 0): ?>
                                                                        <option value="<?php echo e($cat->id); ?>"
                                                                                <?php if($item->category_id==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                        <?php elseif($item->type == 2): ?>
                                                            <select class="form-control" id="updated_category_name1"
                                                                    name="category_id"
                                                                    style="width: 40% !important;">
                                                                <option value=""> اختر فئة الاقتراح</option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($cat->is_complaint != 1): ?>
                                                                        <option value="<?php echo e($cat->id); ?>"
                                                                                <?php if($item->category_id==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        <?php endif; ?>
                                                        <p id="optradio10p" class="help-block"
                                                           style="margin-right:15px;color:red;"></p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div style="float:left; margin-left: 50px;">
                                                        <button class="btn btn-primary nextBtn pull-right button">
                                                            التالي
                                                        </button>

                                                        <button class="btn btn-primary prevBtn pull-right button"
                                                                type="button">
                                                            السابق
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php elseif(!is_null($item->old_category_id)): ?>
                                            <?php if($item->old_category_id != 0): ?>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>اسم المستخدم الذي قام بإعادة تصنيف الفئة:</label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->user_change_category->name); ?>"
                                                               readonly/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>فئة ال<?php echo e($form_type->find($type)->name); ?> المعدلة </label>
                                                        <input class="form-control"
                                                               value="<?php echo e($item->old_category->name); ?>" readonly/>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <label for="sent_type" class="col-form-label">هل
                                                            ال<?php echo e($form_type->find($type)->name); ?>

                                                            بحاجة لإعادة تصنيف فئته/ا؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio4"
                                                                           value="0" checked disabled>لا
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           id="post-format-gallery"
                                                                           name="optradio4" value="1" disabled> نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php endif; ?>
                                            <hr>
                                            <button class="btn btn-primary nextBtn pull-right button">التالي</button>
                                            <button class="btn btn-primary prevBtn pull-right button" type="button">
                                                السابق
                                            </button>
                                        <?php else: ?>
                                            <form id="update_category_form_modal">
                                                <input type="hidden" id="updated_category_id" value="<?php echo e($item->id); ?>">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-sm-offset-6">
                                                        <label for="sent_type" class="col-form-label">هل
                                                            ال<?php echo e($form_type->find($type)->name); ?>

                                                            بحاجة لإعادة تصنيف فئته/ا؟</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           name="optradio4"
                                                                           value="0">لا
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                           id="post-format-gallery"
                                                                           name="optradio4" value="1"> نعم
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <p id="optradio9p" class="help-block"
                                                           style="margin-right:15px;color:red;"></p>
                                                    </div>

                                                </div>
                                                <hr>

                                                <div class="form-group row" id="updated_category_div">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-4 col-form-label">فئة
                                                            ال<?php echo e($form_type->find($type)->name); ?> المعدلة بناءً على محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?>:</label>
                                                        <?php if($item->type == 1): ?>
                                                            <select class="form-control" id="updated_category_name"
                                                                    name="category_id"
                                                                    style="width: 40% !important;">
                                                                <option value="">اختر فئة الشكوى</option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($cat->is_complaint != 0): ?>
                                                                        <option value="<?php echo e($cat->id); ?>"
                                                                                <?php if($item->category_id==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                        <?php elseif($item->type == 2): ?>
                                                            <select class="form-control" id="updated_category_name1"
                                                                    name="category_id"
                                                                    style="width: 40% !important;">
                                                                <option value=""> اختر فئة الاقتراح</option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($cat->is_complaint != 1): ?>
                                                                        <option value="<?php echo e($cat->id); ?>"
                                                                                <?php if($item->category_id==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        <?php endif; ?>

                                                        <p id="optradio10p" class="help-block"
                                                           style="margin-right:15px;color:red;"></p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div style="float:left; margin-left: 50px;">
                                                        <button class="btn btn-primary nextBtn pull-right button">
                                                            التالي
                                                        </button>

                                                        <button class="btn btn-primary prevBtn pull-right button"
                                                                type="button">
                                                            السابق
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="panel panel-primary setup-content" id="step-5">
                                <div class="panel-heading">
                                    <h3 class="panel-title">التغذية الراجعة</h3>
                                </div>
                                <div class="panel-body">
                                    <?php if($item->hide_data == 2): ?>
                                        <?php if($item->private_account != 0): ?>
                                            <div class="col-sm-12">
                                                <br>
                                                <?php if(!$item->form_follow): ?>
                                                    <form action="<?php echo e(route('change_replay_status_feedback' , $item->id)); ?>"
                                                              method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="form-group row">
                                                                <div class="col-md-6">
                                                                    <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                                        تبليغ الرد</label>
                                                                    <select class="form-control" id="follow_form_status"
                                                                            name="follow_form_status"
                                                                            style="width: 65% !important;">
                                                                        <option value="">حالة تبليغ الرد</option>
                                                                        <option value="1"
                                                                                <?php if(old('follow_form_status') == 1): ?> selected <?php endif; ?>>
                                                                            تم تبليغ الرد
                                                                        </option>
                                                                        <option value="2"
                                                                                <?php if(old('follow_form_status') == 2): ?> selected <?php endif; ?> >
                                                                            لم يتم تبليغ الرد
                                                                        </option>
                                                                    </select>
                                                                    <?php echo $errors->first('follow_form_status', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="sent_type" class="col-sm-4 col-form-label"
                                                                           style="display: contents;">الجهة
                                                                        المسؤولة عن تبليغ
                                                                        الرد
                                                                        (موظف الاتصال)</label>

                                                                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                                                    <input
                                                                        style="display: inline-block;width: 40% !important;margin-right: 45px;"
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="replay_user_name" readonly
                                                                        value="<?php echo e(\App\Account::find($item->private_account)->full_name); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" id="follow_reason_not_div"
                                                                 style="display: none">
                                                                <div class="col-md-12">

                                                                    <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                                        عدم تبليغ
                                                                        الرد</label>
                                                                    <select id="follow_reason_not" name="follow_reason_not"
                                                                            class="form-control"
                                                                            style="width: 65% !important;">
                                                                        <option value="">اختر السبب</option>
                                                                        <option
                                                                            value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                            عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال
                                                                            بعد التواصل أكثر من
                                                                            مرة.
                                                                        </option>
                                                                        <option
                                                                            value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                            أرقام
                                                                            التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                                        </option>
                                                                        <option
                                                                            value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                            أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما
                                                                            مثل:( لا يمكن الوصول
                                                                            حالياً،
                                                                            الرقم المطلوب لا يستقبل مكالمات، ...)
                                                                        </option>

                                                                    </select>
                                                                    <?php echo $errors->first('follow_reason_not', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="form-group row" id="feedback_div"
                                                                 style="display: none;">
                                                                <div class="col-sm-6"></div>
                                                                <div class="col-sm-6">
                                                                    <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                                        الراجعة</label>

                                                                    <select id="evaluate" name="evaluate"
                                                                            class="form-control"
                                                                            style="width: 65% !important;">

                                                                        <option value="">اختر حالة تبليغ الرد</option>
                                                                        <option value="1"
                                                                                <?php if(old('evaluate') == 1): ?> selected <?php endif; ?>>راضي
                                                                            بشكل كبير
                                                                        </option>
                                                                        <option value="2"
                                                                                <?php if(old('evaluate') == 2): ?> selected <?php endif; ?>>راضي
                                                                            بشكل متوسط
                                                                        </option>
                                                                        <option value="3"
                                                                                <?php if(old('evaluate') == 3): ?> selected <?php endif; ?>>راضي
                                                                            بشكل ضعيف
                                                                        </option>
                                                                        <option value="4"
                                                                                <?php if(old('evaluate') == 4): ?> selected <?php endif; ?>>غير
                                                                            راضي عن الرد
                                                                        </option>
                                                                    </select>
                                                                    <?php echo $errors->first('evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <div id="div3" style="display:none;">
                                                                        <h4>سبب عدم الرضا عن الرد</h4>
                                                                        <div id="appear">
                   <textarea name="notes" rows="2" cols="78"
                             style="border-radius: 10px;"></textarea>

                                                                            <?php echo $errors->first('notes', '<p class="help-block" style="color:red;">:message</p>'); ?>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" align="left">
                                                                <div class="col-sm-12">
                                                                    <button type="submit"
                                                                            class="btn btn-primary pull-right button">
                                                                        حفظ
                                                                    </button>

                                                                    <button class="btn btn-primary prevBtn pull-right button"
                                                                            type="button">
                                                                        السابق
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                <?php else: ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="sent_type" class="col-sm-4 col-form-label">الجهة
                                                                المسؤولة عن تبليغ الرد
                                                                (موظف الاتصال)</label>
                                                            <input style="width: 25% !important;" type="text"
                                                                   class="form-control"
                                                                   name="replay_user_name" readonly
                                                                   value="<?php echo e($item->form_follow->account->full_name); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="sent_type" class="col-sm-4 col-form-label">حالة تبليغ
                                                                الرد</label>
                                                            <select class="form-control" id="follow_form_status"
                                                                    name="follow_form_status"
                                                                    style="width: 65% !important;" disabled>
                                                                <option
                                                                    <?php if($item->form_follow->solve == 1): ?><?php echo e("selected"); ?><?php endif; ?> value="1">
                                                                    تم
                                                                    تبليغ
                                                                    الرد
                                                                </option>
                                                                <option
                                                                    <?php if($item->form_follow->solve == 2): ?><?php echo e("selected"); ?><?php endif; ?> value="2">
                                                                    لم يتم
                                                                    تبليغ الرد
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row" id="follow_reason_not_div"
                                                         style="<?php if($item->form_follow->solve == 1): ?><?php echo e("display: none"); ?><?php endif; ?>">
                                                        <div class="col-md-12">

                                                            <label for="sent_type" class="col-sm-4 col-form-label">سبب عدم تبليغ
                                                                الرد</label>
                                                            <select id="follow_reason_not" name="follow_reason_not"
                                                                    class="form-control"
                                                                    style="width: 65% !important;" disabled>
                                                                <option value="">اختر السبب</option>
                                                                <option
                                                                    <?php if($item->form_follow->follow_reason_not == "عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة."): ?><?php echo e("selected"); ?><?php endif; ?>
                                                                    value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                    عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد
                                                                    التواصل أكثر من
                                                                    مرة.
                                                                </option>
                                                                <option
                                                                    <?php if($item->form_follow->follow_reason_not == "أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة."): ?><?php echo e("selected"); ?><?php endif; ?> value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                    أرقام
                                                                    التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                                </option>
                                                                <option
                                                                    <?php if($item->form_follow->follow_reason_not == "أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)"): ?><?php echo e("selected"); ?><?php endif; ?>
                                                                    value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                    أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا
                                                                    يمكن الوصول حالياً،
                                                                    الرقم المطلوب لا يستقبل مكالمات، ...)
                                                                </option>

                                                            </select>

                                                        </div>
                                                    </div>

                                                    <?php if(in_array(5,$auth_circle_user) && !is_null($item->form_follow->follow_reason_not) & is_null($item->recommendations_for_follow_reason_not)): ?>
                                                        <form id="confirm_follow_reason_not_modal">
                                                            <input type="hidden" id="follow_reason_not_id"
                                                                   value="<?php echo e($item->id); ?>">
                                                            <hr>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label class="col-form-label">هل
                                                                        ال<?php echo e($form_type->find($type)->name); ?>

                                                                        بحاجة
                                                                        لإغلاق؟</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12"
                                                                             id="confirm_follow_reason_not_div"
                                                                             style="display: none">
                                                                            <label>سيتم إيقاف
                                                                                ال<?php echo e($form_type->find($type)->name); ?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div id="reprocessing_follow_reason_not_div"
                                                                             style="margin-top: -30px;width: 80%;display: none;">
                                                                            <label class="hhhh">يوصى بإعادة تبيلغ الرد مع أخذ
                                                                                التوصيات التالية بعين الاعتبار:</label>
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-12">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="follow_reason_not_reprocessing_recommendations"
                                                                              name="follow_reason_not_reprocessing_recommendations"></textarea>

                                                                                    <p id="optradio16p" class="help-block"
                                                                                       style="margin-right:15px;color:red;"></p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="optradio15" value="0">
                                                                            لا
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="optradio15" value="1">
                                                                            نعم
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <p id="optradio15p" class="help-block"
                                                                   style="margin-right:15px;color:red;"></p>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div style="float:left; margin-left: 50px;">
                                                                    <button id="submit_follow_reason_not"
                                                                            class="btn btn-primary nextBtn pull-right button">
                                                                        حفظ
                                                                    </button>

                                                                    <button class="btn btn-primary prevBtn pull-right button"
                                                                            type="button">
                                                                        السابق
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if((in_array(4,$auth_circle_user) || (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1))&& $item->recommendations_for_follow_reason_not && $item->form_follow->solve != 1): ?>
                                                        <div class="row">

                                                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                                                <hr>
                                                                <h4>فيما يلي التوصيات بخصوص إعادة تبيلغ الرد من قبل الجهة
                                                                    الإدارية
                                                                    المسؤولة عن
                                                                    متابعة الجهة المختصة بمعالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?>

                                                                    :</h4>
                                                            </div>

                                                            <div class="col-sm-8">
                                                                <label style="display: block;">التوصيات:</label>
                                                                <?php if(!is_null($item->confirm_follow_reason_not) && $item->confirm_follow_reason_not == 1): ?>
                                                                    <input class="form-control"
                                                                           value="يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>"
                                                                           readonly/>
                                                                <?php else: ?>
                                                                    <div class="col-sm-4">
                                                                        <?php if(in_array(4,$auth_circle_user) && is_null($item->confirm_follow_reason_not)): ?>
                                                                            <div>
                                                                                <button style="margin-top: 25px;float: left;"
                                                                                        class="btn btn-primary"
                                                                                        onclick="follow_reason();">
                                                                                    <span class="fa fa-refresh"></span>
                                                                                    إعادة تبيلغ الرد
                                                                                </button>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <label>يوصي بإعادة تبيلغ الرد
                                                                            مع أخذ بعين
                                                                            الاعتبار
                                                                            التوصيات التالية</label>
                                                                        <input class="form-control"
                                                                               value="<?php echo e($item->recommendations_for_follow_reason_not); ?>"
                                                                               readonly/>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label style="display: block">الجهة الإدارية المسؤولة عن متابعة
                                                                    الجهة المختصة بمعالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?></label>
                                                                <?php if(is_null($item->confirm_follow_reason_not)): ?>
                                                                    <label> </label>
                                                                <?php endif; ?>
                                                                <input style="width: 75%;" class="form-control"
                                                                       value="<?php echo e($item->user_recommendations_for_follow_reason_not->full_name); ?>"
                                                                       readonly/>
                                                            </div>

                                                        </div>
                                                    <?php endif; ?>
                                                    <hr>

                                                    <div class="form-group row" id="feedback_div"
                                                         style="<?php if($item->form_follow->solve == 2): ?><?php echo e("display: none;"); ?> <?php endif; ?>">
                                                        <div class="col-sm-12">
                                                            <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                                الراجعة</label>

                                                            <div class="col-sm-12">
                                                                <select id="evaluate" name="evaluate"
                                                                        class="form-control"
                                                                        style="width: 46% !important;"
                                                                        <?php if($item->form_follow->evaluate): ?> disabled <?php endif; ?>>

                                                                    <option value="">اختر حالة تبليغ الرد</option>
                                                                    <option value="1"
                                                                            <?php if($item->form_follow->evaluate == 1): ?> selected <?php endif; ?>>
                                                                        راضي
                                                                        بشكل كبير
                                                                    </option>
                                                                    <option value="2"
                                                                            <?php if($item->form_follow->evaluate == 2): ?> selected <?php endif; ?>>
                                                                        راضي
                                                                        بشكل متوسط
                                                                    </option>
                                                                    <option value="3"
                                                                            <?php if($item->form_follow->evaluate == 3): ?> selected <?php endif; ?>>
                                                                        راضي
                                                                        بشكل ضعيف
                                                                    </option>
                                                                    <option value="4"
                                                                            <?php if($item->form_follow->evaluate == 4): ?> selected <?php endif; ?>>
                                                                        غير
                                                                        راضي عن الرد
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <div id="div3"
                                                                 style="<?php if($item->form_follow->evaluate != 4): ?><?php echo e("display:none;"); ?><?php endif; ?>">
                                                                <h4>سبب عدم الرضا عن الرد</h4>
                                                                <div id="appear">
               <textarea name="notes" rows="2" cols="78" style="border-radius: 10px;"
                         disabled><?php echo e($item->form_follow->notes); ?></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php if(in_array(5,$auth_circle_user) && $item->form_follow && $item->form_follow->evaluate == 4 &&  $item->confirm_evaluate_4 != 1): ?>
                                                        <form id="khlkjj"
                                                              action="<?php echo e(route('confirm_change_replay_status_feedback' , $item->id)); ?>"
                                                              method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label class="col-form-label">هل
                                                                        ال<?php echo e($form_type->find($type)->name); ?>

                                                                        بحاجة لإغلاق؟</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <div id="close_form_follow_evaluate_div"
                                                                         style="display: none">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <label>سيتم إغلاق
                                                                                    ال<?php echo e($form_type->find($type)->name); ?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" align="left">
                                                                            <div class="col-sm-12">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary pull-right button">
                                                                                    حفظ
                                                                                </button>

                                                                                <button
                                                                                    class="btn btn-primary prevBtn pull-right button"
                                                                                    type="button">
                                                                                    السابق
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="reprocessing_form_follow_evaluate_div"
                                                                         style="margin-top: -30px;width: 80%;display: none;">
                                                                        <div class="form-group row">
                                                                            <button type="submit" value="reprocessing"
                                                                                    style="margin-top: 25px;" target="_blank"
                                                                                    class="btn btn-primary">
                                                                                <span class="fa fa-refresh"></span>
                                                                                إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                                            </button>
                                                                            
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="confirm_evaluate" value="0">
                                                                            لا
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="confirm_evaluate" value="1">
                                                                            نعم
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <?php echo $errors->first('confirm_evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                            </div>

                                                            
                                                        </form>

                                                    <?php endif; ?>

                                                    <?php if($item->form_follow && $item->form_follow->evaluate == 4 && $item->confirm_evaluate_4 == 1): ?>

                                                        <div class="row">

                                                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                                                <hr>
                                                                <h4>فيما يلي التوصيات بخصوص عدم الرضا عن الرد من قبل
                                                                    الجهة الإدارية المسؤولة عن متابعة الجهة المختصة بمعالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?>: </h4>
                                                            </div>

                                                            <div class="col-sm-8">
                                                                <label style="display: block;">التوصيات:</label>
                                                                <?php if(!$item->reprocessing_form_id): ?>
                                                                    <input class="form-control"
                                                                           value="يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>"
                                                                           readonly/>
                                                                <?php else: ?>
                                                                    <div class="col-sm-4">
                                                                        <a style="margin-top: 25px;" target="_blank"
                                                                           class="btn btn-primary"
                                                                           href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_form_id); ?>">
                                                                            <span class="fa fa-refresh"></span>
                                                                            إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                                        </a>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <label>يوصي بإعادة معالجة
                                                                            ال<?php echo e($form_type->find($type)->name); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label style="display: block">الجهة الإدارية المسؤولة عن متابعة
                                                                    الجهة المختصة بمعالجة
                                                                    ال<?php echo e($form_type->find($type)->name); ?></label>

                                                                <?php if( $item->reprocessing_form_id): ?>
                                                                    <input class="form-control"
                                                                           value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                           readonly/>
                                                                <?php else: ?>
                                                                    <input style="width: 75%;" class="form-control"
                                                                           value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                           readonly/>
                                                                <?php endif; ?>
                                                            </div>

                                                        </div>
                                                        
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            </div>

                                            <div id="follow_reason_div" style="display: none;">
                                                <div class="col-sm-12">
                                                    <br>
                                                    <form action="<?php echo e(route('change_replay_status_feedback' , $item->id)); ?>"
                                                          method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                                    تبليغ الرد</label>
                                                                <select class="form-control" id="follow_form_status_1"
                                                                        name="follow_form_status"
                                                                        style="width: 65% !important;">
                                                                    <option value="">حالة تبليغ الرد</option>
                                                                    <option value="1"
                                                                            <?php if(old('follow_form_status') == 1): ?> selected <?php endif; ?>>
                                                                        تم تبليغ الرد
                                                                    </option>
                                                                    <option value="2"
                                                                            <?php if(old('follow_form_status') == 2): ?> selected <?php endif; ?> >
                                                                        لم يتم تبليغ الرد
                                                                    </option>
                                                                </select>
                                                                <?php echo $errors->first('follow_form_status', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label"
                                                                       style="display: contents;">الجهة
                                                                    المسؤولة عن تبليغ
                                                                    الرد
                                                                    (موظف الاتصال)</label>
                                                                <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                                                <input
                                                                    style="display: inline-block;width: 40% !important;margin-right: 45px;"
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="replay_user_name" readonly
                                                                    value="<?php echo e(Auth::user()->account->full_name); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" id="follow_reason_not_div_1"
                                                             style="display: none">
                                                            <div class="col-md-12">

                                                                <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                                    عدم تبليغ
                                                                    الرد</label>
                                                                <select id="follow_reason_not_1" name="follow_reason_not"
                                                                        class="form-control"
                                                                        style="width: 65% !important;">
                                                                    <option value="">اختر السبب</option>
                                                                    <option
                                                                        value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                        عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال
                                                                        بعد التواصل أكثر من
                                                                        مرة.
                                                                    </option>
                                                                    <option
                                                                        value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                        أرقام
                                                                        التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                                    </option>
                                                                    <option
                                                                        value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                        أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما
                                                                        مثل:( لا يمكن الوصول
                                                                        حالياً،
                                                                        الرقم المطلوب لا يستقبل مكالمات، ...)
                                                                    </option>

                                                                </select>
                                                                <?php echo $errors->first('follow_reason_not', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-group row" id="feedback_div_1"
                                                             style="display: none;">
                                                            <div class="col-sm-6"></div>
                                                            <div class="col-sm-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                                    الراجعة</label>

                                                                <select id="evaluate_1" name="evaluate"
                                                                        class="form-control"
                                                                        style="width: 65% !important;">

                                                                    <option value="">اختر حالة تبليغ الرد</option>
                                                                    <option value="1"
                                                                            <?php if(old('evaluate') == 1): ?> selected <?php endif; ?>>راضي
                                                                        بشكل كبير
                                                                    </option>
                                                                    <option value="2"
                                                                            <?php if(old('evaluate') == 2): ?> selected <?php endif; ?>>راضي
                                                                        بشكل متوسط
                                                                    </option>
                                                                    <option value="3"
                                                                            <?php if(old('evaluate') == 3): ?> selected <?php endif; ?>>راضي
                                                                        بشكل ضعيف
                                                                    </option>
                                                                    <option value="4"
                                                                            <?php if(old('evaluate') == 4): ?> selected <?php endif; ?>>غير
                                                                        راضي عن الرد
                                                                    </option>
                                                                </select>
                                                                <?php echo $errors->first('evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div id="div3_1" style="display:none;">
                                                                    <h4>سبب عدم الرضا عن الرد</h4>
                                                                    <div id="appear">
                   <textarea name="notes" rows="2" cols="78"
                             style="border-radius: 10px;"></textarea>

                                                                        <?php echo $errors->first('notes', '<p class="help-block" style="color:red;">:message</p>'); ?>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" align="left">
                                                            <div class="col-sm-12">
                                                                <button type="submit"
                                                                        class="btn btn-primary pull-right button">
                                                                    حفظ
                                                                </button>

                                                                <button class="btn btn-primary prevBtn pull-right button"
                                                                        type="button">
                                                                    السابق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-sm-12">
                                            <br>
                                            <?php if(!$item->form_follow): ?>
                                                <?php if(in_array(4,$auth_circle_user)): ?>
                                                    <form action="<?php echo e(route('change_replay_status_feedback' , $item->id)); ?>"
                                                          method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                                    تبليغ الرد</label>
                                                                <select class="form-control" id="follow_form_status"
                                                                        name="follow_form_status"
                                                                        style="width: 65% !important;">
                                                                    <option value="">حالة تبليغ الرد</option>
                                                                    <option value="1"
                                                                            <?php if(old('follow_form_status') == 1): ?> selected <?php endif; ?>>
                                                                        تم تبليغ الرد
                                                                    </option>
                                                                    <option value="2"
                                                                            <?php if(old('follow_form_status') == 2): ?> selected <?php endif; ?> >
                                                                        لم يتم تبليغ الرد
                                                                    </option>
                                                                </select>
                                                                <?php echo $errors->first('follow_form_status', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label"
                                                                       style="display: contents;">الجهة
                                                                    المسؤولة عن تبليغ
                                                                    الرد
                                                                    (موظف الاتصال)</label>

                                                                <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                                                <input
                                                                    style="display: inline-block;width: 40% !important;margin-right: 45px;"
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="replay_user_name" readonly
                                                                    value="<?php echo e(Auth::user()->account->full_name); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" id="follow_reason_not_div"
                                                             style="display: none">
                                                            <div class="col-md-12">

                                                                <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                                    عدم تبليغ
                                                                    الرد</label>
                                                                <select id="follow_reason_not" name="follow_reason_not"
                                                                        class="form-control"
                                                                        style="width: 65% !important;">
                                                                    <option value="">اختر السبب</option>
                                                                    <option
                                                                        value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                        عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال
                                                                        بعد التواصل أكثر من
                                                                        مرة.
                                                                    </option>
                                                                    <option
                                                                        value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                        أرقام
                                                                        التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                                    </option>
                                                                    <option
                                                                        value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                        أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما
                                                                        مثل:( لا يمكن الوصول
                                                                        حالياً،
                                                                        الرقم المطلوب لا يستقبل مكالمات، ...)
                                                                    </option>

                                                                </select>
                                                                <?php echo $errors->first('follow_reason_not', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-group row" id="feedback_div"
                                                             style="display: none;">
                                                            <div class="col-sm-6"></div>
                                                            <div class="col-sm-6">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                                    الراجعة</label>

                                                                <select id="evaluate" name="evaluate"
                                                                        class="form-control"
                                                                        style="width: 65% !important;">

                                                                    <option value="">اختر حالة تبليغ الرد</option>
                                                                    <option value="1"
                                                                            <?php if(old('evaluate') == 1): ?> selected <?php endif; ?>>راضي
                                                                        بشكل كبير
                                                                    </option>
                                                                    <option value="2"
                                                                            <?php if(old('evaluate') == 2): ?> selected <?php endif; ?>>راضي
                                                                        بشكل متوسط
                                                                    </option>
                                                                    <option value="3"
                                                                            <?php if(old('evaluate') == 3): ?> selected <?php endif; ?>>راضي
                                                                        بشكل ضعيف
                                                                    </option>
                                                                    <option value="4"
                                                                            <?php if(old('evaluate') == 4): ?> selected <?php endif; ?>>غير
                                                                        راضي عن الرد
                                                                    </option>
                                                                </select>
                                                                <?php echo $errors->first('evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div id="div3" style="display:none;">
                                                                    <h4>سبب عدم الرضا عن الرد</h4>
                                                                    <div id="appear">
                   <textarea name="notes" rows="2" cols="78"
                             style="border-radius: 10px;"></textarea>

                                                                        <?php echo $errors->first('notes', '<p class="help-block" style="color:red;">:message</p>'); ?>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" align="left">
                                                            <div class="col-sm-12">
                                                                <button type="submit"
                                                                        class="btn btn-primary pull-right button">
                                                                    حفظ
                                                                </button>

                                                                <button class="btn btn-primary prevBtn pull-right button"
                                                                        type="button">
                                                                    السابق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php else: ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <h4>بانتظار الحصول على التغذية الراجعة </h4>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="sent_type" class="col-sm-4 col-form-label">الجهة
                                                            المسؤولة عن تبليغ الرد
                                                            (موظف الاتصال)</label>
                                                        <input style="width: 25% !important;" type="text"
                                                               class="form-control"
                                                               name="replay_user_name" readonly
                                                               value="<?php echo e($item->form_follow->account->full_name); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="sent_type" class="col-sm-4 col-form-label">حالة تبليغ
                                                            الرد</label>
                                                        <select class="form-control" id="follow_form_status"
                                                                name="follow_form_status"
                                                                style="width: 65% !important;" disabled>
                                                            <option
                                                                <?php if($item->form_follow->solve == 1): ?><?php echo e("selected"); ?><?php endif; ?> value="1">
                                                                تم
                                                                تبليغ
                                                                الرد
                                                            </option>
                                                            <option
                                                                <?php if($item->form_follow->solve == 2): ?><?php echo e("selected"); ?><?php endif; ?> value="2">
                                                                لم يتم
                                                                تبليغ الرد
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-group row" id="follow_reason_not_div"
                                                     style="<?php if($item->form_follow->solve == 1): ?><?php echo e("display: none"); ?><?php endif; ?>">
                                                    <div class="col-md-12">

                                                        <label for="sent_type" class="col-sm-4 col-form-label">سبب عدم تبليغ
                                                            الرد</label>
                                                        <select id="follow_reason_not" name="follow_reason_not"
                                                                class="form-control"
                                                                style="width: 65% !important;" disabled>
                                                            <option value="">اختر السبب</option>
                                                            <option
                                                                <?php if($item->form_follow->follow_reason_not == "عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة."): ?><?php echo e("selected"); ?><?php endif; ?>
                                                                value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد
                                                                التواصل أكثر من
                                                                مرة.
                                                            </option>
                                                            <option
                                                                <?php if($item->form_follow->follow_reason_not == "أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة."): ?><?php echo e("selected"); ?><?php endif; ?> value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                أرقام
                                                                التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                            </option>
                                                            <option
                                                                <?php if($item->form_follow->follow_reason_not == "أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)"): ?><?php echo e("selected"); ?><?php endif; ?>
                                                                value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا
                                                                يمكن الوصول حالياً،
                                                                الرقم المطلوب لا يستقبل مكالمات، ...)
                                                            </option>

                                                        </select>

                                                    </div>
                                                </div>

                                                <?php if(in_array(5,$auth_circle_user) && !is_null($item->form_follow->follow_reason_not) & is_null($item->recommendations_for_follow_reason_not)): ?>
                                                    <form id="confirm_follow_reason_not_modal">
                                                        <input type="hidden" id="follow_reason_not_id"
                                                               value="<?php echo e($item->id); ?>">
                                                        <hr>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">هل
                                                                    ال<?php echo e($form_type->find($type)->name); ?>

                                                                    بحاجة
                                                                    لإغلاق؟</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-8">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12"
                                                                         id="confirm_follow_reason_not_div"
                                                                         style="display: none">
                                                                        <label>سيتم إيقاف
                                                                            ال<?php echo e($form_type->find($type)->name); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div id="reprocessing_follow_reason_not_div"
                                                                         style="margin-top: -30px;width: 80%;display: none;">
                                                                        <label class="hhhh">يوصى بإعادة تبيلغ الرد مع أخذ
                                                                            التوصيات التالية بعين الاعتبار:</label>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                    <textarea class="form-control" rows="3"
                                                                              id="follow_reason_not_reprocessing_recommendations"
                                                                              name="follow_reason_not_reprocessing_recommendations"></textarea>

                                                                                <p id="optradio16p" class="help-block"
                                                                                   style="margin-right:15px;color:red;"></p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio15" value="0">
                                                                        لا
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="optradio15" value="1">
                                                                        نعم
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <p id="optradio15p" class="help-block"
                                                               style="margin-right:15px;color:red;"></p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div style="float:left; margin-left: 50px;">
                                                                <button id="submit_follow_reason_not"
                                                                        class="btn btn-primary nextBtn pull-right button">
                                                                    حفظ
                                                                </button>

                                                                <button class="btn btn-primary prevBtn pull-right button"
                                                                        type="button">
                                                                    السابق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>

                                                <?php if((in_array(4,$auth_circle_user) || (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1))&& $item->recommendations_for_follow_reason_not && $item->form_follow->solve != 1): ?>
                                                    <div class="row">

                                                        <div class="col-sm-12" style="margin-bottom: 10px;">
                                                            <hr>
                                                            <h4>فيما يلي التوصيات بخصوص إعادة تبيلغ الرد من قبل الجهة
                                                                الإدارية
                                                                المسؤولة عن
                                                                متابعة الجهة المختصة بمعالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?>

                                                                :</h4>
                                                        </div>

                                                        <div class="col-sm-8">
                                                            <label style="display: block;">التوصيات:</label>
                                                            <?php if(!is_null($item->confirm_follow_reason_not) && $item->confirm_follow_reason_not == 1): ?>
                                                                <input class="form-control"
                                                                       value="يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>"
                                                                       readonly/>
                                                            <?php else: ?>
                                                                <div class="col-sm-4">
                                                                    <?php if(in_array(4,$auth_circle_user) && is_null($item->confirm_follow_reason_not)): ?>
                                                                        <div>
                                                                            <button style="margin-top: 25px;float: left;"
                                                                                    class="btn btn-primary"
                                                                                    onclick="follow_reason();">
                                                                                <span class="fa fa-refresh"></span>
                                                                                إعادة تبيلغ الرد
                                                                            </button>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <label>يوصي بإعادة تبيلغ الرد
                                                                        مع أخذ بعين
                                                                        الاعتبار
                                                                        التوصيات التالية</label>
                                                                    <input class="form-control"
                                                                           value="<?php echo e($item->recommendations_for_follow_reason_not); ?>"
                                                                           readonly/>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label style="display: block">الجهة الإدارية المسؤولة عن متابعة
                                                                الجهة المختصة بمعالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?></label>
                                                            <?php if(is_null($item->confirm_follow_reason_not)): ?>
                                                                <label> </label>
                                                            <?php endif; ?>
                                                            <input style="width: 75%;" class="form-control"
                                                                   value="<?php echo e($item->user_recommendations_for_follow_reason_not->full_name); ?>"
                                                                   readonly/>
                                                        </div>

                                                    </div>
                                                <?php endif; ?>
                                                <hr>

                                                <div class="form-group row" id="feedback_div"
                                                     style="<?php if($item->form_follow->solve == 2): ?><?php echo e("display: none;"); ?> <?php endif; ?>">
                                                    <div class="col-sm-12">
                                                        <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                            الراجعة</label>

                                                        <div class="col-sm-12">
                                                            <select id="evaluate" name="evaluate"
                                                                    class="form-control"
                                                                    style="width: 46% !important;"
                                                                    <?php if($item->form_follow->evaluate): ?> disabled <?php endif; ?>>

                                                                <option value="">اختر حالة تبليغ الرد</option>
                                                                <option value="1"
                                                                        <?php if($item->form_follow->evaluate == 1): ?> selected <?php endif; ?>>
                                                                    راضي
                                                                    بشكل كبير
                                                                </option>
                                                                <option value="2"
                                                                        <?php if($item->form_follow->evaluate == 2): ?> selected <?php endif; ?>>
                                                                    راضي
                                                                    بشكل متوسط
                                                                </option>
                                                                <option value="3"
                                                                        <?php if($item->form_follow->evaluate == 3): ?> selected <?php endif; ?>>
                                                                    راضي
                                                                    بشكل ضعيف
                                                                </option>
                                                                <option value="4"
                                                                        <?php if($item->form_follow->evaluate == 4): ?> selected <?php endif; ?>>
                                                                    غير
                                                                    راضي عن الرد
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <div id="div3"
                                                             style="<?php if($item->form_follow->evaluate != 4): ?><?php echo e("display:none;"); ?><?php endif; ?>">
                                                            <h4>سبب عدم الرضا عن الرد</h4>
                                                            <div id="appear">
               <textarea name="notes" rows="2" cols="78" style="border-radius: 10px;"
                         disabled><?php echo e($item->form_follow->notes); ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if(in_array(5,$auth_circle_user) && $item->form_follow && $item->form_follow->evaluate == 4 &&  $item->confirm_evaluate_4 != 1): ?>
                                                    <form id="khlkjj"
                                                          action="<?php echo e(route('confirm_change_replay_status_feedback' , $item->id)); ?>"
                                                          method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">هل
                                                                    ال<?php echo e($form_type->find($type)->name); ?>

                                                                    بحاجة لإغلاق؟</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-8">
                                                                <div id="close_form_follow_evaluate_div"
                                                                     style="display: none">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <label>سيتم إغلاق
                                                                                ال<?php echo e($form_type->find($type)->name); ?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row" align="left">
                                                                        <div class="col-sm-12">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary pull-right button">
                                                                                حفظ
                                                                            </button>

                                                                            <button
                                                                                class="btn btn-primary prevBtn pull-right button"
                                                                                type="button">
                                                                                السابق
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div id="reprocessing_form_follow_evaluate_div"
                                                                     style="margin-top: -30px;width: 80%;display: none;">
                                                                    <div class="form-group row">
                                                                        <button type="submit" value="reprocessing"
                                                                                style="margin-top: 25px;" target="_blank"
                                                                                class="btn btn-primary">
                                                                            <span class="fa fa-refresh"></span>
                                                                            إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                                        </button>
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="confirm_evaluate" value="0">
                                                                        لا
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                               name="confirm_evaluate" value="1">
                                                                        نعم
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php echo $errors->first('confirm_evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                        </div>

                                                        
                                                    </form>

                                                <?php endif; ?>

                                                <?php if($item->form_follow && $item->form_follow->evaluate == 4 && $item->confirm_evaluate_4 == 1): ?>

                                                    <div class="row">

                                                        <div class="col-sm-12" style="margin-bottom: 10px;">
                                                            <hr>
                                                            <h4>فيما يلي التوصيات بخصوص عدم الرضا عن الرد من قبل
                                                                الجهة الإدارية المسؤولة عن متابعة الجهة المختصة بمعالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?>: </h4>
                                                        </div>

                                                        <div class="col-sm-8">
                                                            <label style="display: block;">التوصيات:</label>
                                                            <?php if(!$item->reprocessing_form_id): ?>
                                                                <input class="form-control"
                                                                       value="يوصي بإغلاق ال<?php echo e($form_type->find($type)->name); ?>"
                                                                       readonly/>
                                                            <?php else: ?>
                                                                <div class="col-sm-4">
                                                                    <a style="margin-top: 25px;" target="_blank"
                                                                       class="btn btn-primary"
                                                                       href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_form_id); ?>">
                                                                        <span class="fa fa-refresh"></span>
                                                                        إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?>


                                                                    </a>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <label>يوصي بإعادة معالجة
                                                                        ال<?php echo e($form_type->find($type)->name); ?>

                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label style="display: block">الجهة الإدارية المسؤولة عن متابعة
                                                                الجهة المختصة بمعالجة
                                                                ال<?php echo e($form_type->find($type)->name); ?></label>

                                                            <?php if( $item->reprocessing_form_id): ?>
                                                                <input class="form-control"
                                                                       value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                       readonly/>
                                                            <?php else: ?>
                                                                <input style="width: 75%;" class="form-control"
                                                                       value="<?php echo e($item->user_reprocessing_recommendations->full_name); ?>"
                                                                       readonly/>
                                                            <?php endif; ?>
                                                        </div>

                                                    </div>
                                                    
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        </div>

                                        <div id="follow_reason_div" style="display: none;">
                                            <div class="col-sm-12">
                                                <br>
                                                <form action="<?php echo e(route('change_replay_status_feedback' , $item->id)); ?>"
                                                      method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                                تبليغ الرد</label>
                                                            <select class="form-control" id="follow_form_status_1"
                                                                    name="follow_form_status"
                                                                    style="width: 65% !important;">
                                                                <option value="">حالة تبليغ الرد</option>
                                                                <option value="1"
                                                                        <?php if(old('follow_form_status') == 1): ?> selected <?php endif; ?>>
                                                                    تم تبليغ الرد
                                                                </option>
                                                                <option value="2"
                                                                        <?php if(old('follow_form_status') == 2): ?> selected <?php endif; ?> >
                                                                    لم يتم تبليغ الرد
                                                                </option>
                                                            </select>
                                                            <?php echo $errors->first('follow_form_status', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="sent_type" class="col-sm-4 col-form-label"
                                                                   style="display: contents;">الجهة
                                                                المسؤولة عن تبليغ
                                                                الرد
                                                                (موظف الاتصال)</label>
                                                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                                            <input
                                                                style="display: inline-block;width: 40% !important;margin-right: 45px;"
                                                                type="text"
                                                                class="form-control"
                                                                name="replay_user_name" readonly
                                                                value="<?php echo e(Auth::user()->account->full_name); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="follow_reason_not_div_1"
                                                         style="display: none">
                                                        <div class="col-md-12">

                                                            <label for="sent_type" class="col-sm-4 col-form-label">سبب
                                                                عدم تبليغ
                                                                الرد</label>
                                                            <select id="follow_reason_not_1" name="follow_reason_not"
                                                                    class="form-control"
                                                                    style="width: 65% !important;">
                                                                <option value="">اختر السبب</option>
                                                                <option
                                                                    value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                                    عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال
                                                                    بعد التواصل أكثر من
                                                                    مرة.
                                                                </option>
                                                                <option
                                                                    value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                                                    أرقام
                                                                    التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                                                </option>
                                                                <option
                                                                    value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                                                    أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما
                                                                    مثل:( لا يمكن الوصول
                                                                    حالياً،
                                                                    الرقم المطلوب لا يستقبل مكالمات، ...)
                                                                </option>

                                                            </select>
                                                            <?php echo $errors->first('follow_reason_not', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="form-group row" id="feedback_div_1"
                                                         style="display: none;">
                                                        <div class="col-sm-6"></div>
                                                        <div class="col-sm-6">
                                                            <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                                الراجعة</label>

                                                            <select id="evaluate_1" name="evaluate"
                                                                    class="form-control"
                                                                    style="width: 65% !important;">

                                                                <option value="">اختر حالة تبليغ الرد</option>
                                                                <option value="1"
                                                                        <?php if(old('evaluate') == 1): ?> selected <?php endif; ?>>راضي
                                                                    بشكل كبير
                                                                </option>
                                                                <option value="2"
                                                                        <?php if(old('evaluate') == 2): ?> selected <?php endif; ?>>راضي
                                                                    بشكل متوسط
                                                                </option>
                                                                <option value="3"
                                                                        <?php if(old('evaluate') == 3): ?> selected <?php endif; ?>>راضي
                                                                    بشكل ضعيف
                                                                </option>
                                                                <option value="4"
                                                                        <?php if(old('evaluate') == 4): ?> selected <?php endif; ?>>غير
                                                                    راضي عن الرد
                                                                </option>
                                                            </select>
                                                            <?php echo $errors->first('evaluate', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <div id="div3_1" style="display:none;">
                                                                <h4>سبب عدم الرضا عن الرد</h4>
                                                                <div id="appear">
                   <textarea name="notes" rows="2" cols="78"
                             style="border-radius: 10px;"></textarea>

                                                                    <?php echo $errors->first('notes', '<p class="help-block" style="color:red;">:message</p>'); ?>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" align="left">
                                                        <div class="col-sm-12">
                                                            <button type="submit"
                                                                    class="btn btn-primary pull-right button">
                                                                حفظ
                                                            </button>

                                                            <button class="btn btn-primary prevBtn pull-right button"
                                                                    type="button">
                                                                السابق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="panel panel-primary setup-content" id="step-4">
                                <div class="panel-heading">
                                    <h3 class="panel-title">إجراءات الرد على ال<?php echo e($form_type->find($type)->name); ?></h3>
                                </div>
                                <div class="panel-body">

                                    <?php if(($item->response_type != 0 || $item->response_type != 1) && !$item->form_response): ?>
                                        <form action="<?php echo e(route('change_response_and_update_form_data' , $item->id)); ?>"
                                              method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="response_type" class="col-sm-4 col-form-label">الإجراءات
                                                        المطلوبة للرد</label>
                                                    <select id="response_type_select" name="response_type"
                                                            class="form-control"
                                                            style="width: 60% !important;">
                                                        <option value="">اختر نوع</option>
                                                        <option value="0" <?php if(old('response_type')==0): ?>selected <?php endif; ?>>
                                                            يمكن الرد عليها مباشرة
                                                        </option>
                                                        <option value="1" <?php if(old('response_type')==1): ?>selected <?php endif; ?>>
                                                            تتطلب إجراءات مطولة للرد عليها
                                                        </option>
                                                    </select>
                                                    <?php echo $errors->first('response_type', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                                        بالمعالجة</label>
                                                    <input type="hidden" class="form-control" name="replay_user_id"
                                                           value="<?php echo e(Auth::user()->id); ?>">
                                                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                                    <input style="width: 60% !important;" type="text"
                                                           class="form-control"
                                                           name="replay_user_name"
                                                           readonly
                                                           value="<?php echo e(Auth::user()->account->full_name); ?>">
                                                </div>
                                            </div>

                                            <br>
                                            <div id="replay_advanced" style="display: none">
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="response_type" class="col-sm-4 col-form-label">تحميل
                                                            ملف
                                                            توثيق
                                                            الإجراء</label>
                                                        <input type="file" class="form-control " value="" id="form_file"
                                                               name="form_file" style="width: 65%">

                                                        <?php echo $errors->first('form_file', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="response_type" class="col-sm-4 col-form-label">تاريخ
                                                            تنفيذ
                                                            الإجراء</label>
                                                        <input type="date" class="form-control" name="form_data"
                                                               placeholder="يوم / شهر / سنة" style="width: 65%"/>

                                                        <?php echo $errors->first('form_data', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="response_type" class="col-sm-4 col-form-label">طبيعة
                                                            الإجراءات المطولة
                                                            المطلوبة</label>
                                                        <select name="required_respond" class="form-control"
                                                                style=" width: 65%;">
                                                            <option value="">اختر الإجراء المطلوب</option>
                                                            <option value="عقد زيارة ميدانية/فنية">عقد زيارة
                                                                ميدانية/فنية
                                                            </option>
                                                            <option
                                                                value="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع">
                                                                نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع
                                                            </option>
                                                            <option value="نقاش مع الجهات الشريكة/الممولة لمعالجتها ">
                                                                نقاش مع
                                                                الجهات الشريكة/الممولة لمعالجتها
                                                            </option>
                                                        </select>
                                                        <?php echo $errors->first('required_respond', '<p class="help-block" style="color:red;display: inline-block;">:message</p>'); ?>

                                                    </div>
                                                </div>

                                            </div>

                                            <br>


                                            <div class="form-group row">
                                                <div class="col-sm-12">

                <textarea name="response" rows="2" cols="110"
                          style="border-radius: 10px;"></textarea>
                                                    <label for="sent_type" class="col-sm-4 col-form-label">صياغة
                                                        الرد</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php echo $errors->first('response', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                                        بالمصادقة على الرد:</label>
                                                    <input style="width: 65% !important;" type="text"
                                                           class="form-control 1020"
                                                           name="confirm_replay_user_name" readonly
                                                           value=" <?php echo e($fff); ?>">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل
                                                        الرد</label>
                                                    <input style="width: 65% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                        الرد</label>
                                                    <?php
                                                    if ($item->status == 1) {
                                                        $replay_status = "قيد الدراسة";
                                                    } elseif ($item->status == 2) {
                                                        $replay_status = "تم الرد";
                                                    } else {
                                                        $replay_status = "";
                                                    }
                                                    ?>
                                                    <input style="width: 65% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                                                </div>
                                            </div>
                                            

                                            <hr>

                                            <div class="form-group row" align="left">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary pull-right button">
                                                        التالي
                                                    </button>

                                                    <button class="btn btn-primary prevBtn pull-right button"
                                                            type="button">
                                                        السابق
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <br><br>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="response_type" class="col-sm-4 col-form-label">الإجراءات
                                                    المطلوبة
                                                    للرد</label>
                                                <select id="response_type_select" name="response_type"
                                                        class="form-control"
                                                        style="width:60% !important;" readonly="" disabled>
                                                    <option value="">اختر نوع</option>
                                                    <option <?php if($item->response_type==0): ?>selected <?php endif; ?>  value="0">يمكن
                                                        الرد
                                                        عليها مباشرة
                                                    </option>
                                                    <option <?php if($item->response_type==1): ?>selected <?php endif; ?>  value="1">تتطلب
                                                        إجراءات
                                                        مطولة للرد عليها
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                                    بالمعالجة</label>
                                                <input style="width: 25% !important;" type="text" class="form-control"
                                                       name="replay_user_name"
                                                       readonly
                                                       value="<?php echo e($item->form_response->account->full_name); ?>"
                                                       width="60%">
                                            </div>
                                        </div>

                                        <br>
                                        <div id="replay_advanced"
                                             style="<?php if(!$item->required_respond): ?>display: none <?php endif; ?>">
                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="response_type" class="col-sm-4 col-form-label">تاريخ
                                                        تنفيذ
                                                        الإجراء</label>
                                                    <input style=" width: 50%;" type="date" value="<?php echo e($item->form_data); ?>"
                                                           class="form-control" readonly name="form_data"
                                                           placeholder="يوم / شهر / سنة" style="width: 65%"/>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="response_type" class="col-sm-4 col-form-label">ملف توثيق
                                                        الإجراء</label>

                                                    <a style="width: 50%;" target="_blank" class="btn btn-primary"
                                                       title="ملف توثيق الإجراء"
                                                       href="<?php echo e(route('downloadfiles', $item->id)); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="response_type" class="col-sm-4 col-form-label">طبيعة
                                                        الإجراءات
                                                        المطولة
                                                        المطلوبة</label>
                                                    <select name="required_respond" class="form-control"
                                                            style=" width: 65%;"
                                                            readonly="">
                                                        <option value="">اختر الإجراء المطلوب</option>
                                                        <option
                                                            <?php if($item->required_respond=="عقد زيارة ميدانية/فنية"): ?>selected
                                                            <?php endif; ?>  value="عقد زيارة ميدانية/فنية"> عقد زيارة
                                                            ميدانية/فنية
                                                        </option>
                                                        <option
                                                            <?php if($item->required_respond=="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع"): ?>selected
                                                            <?php endif; ?>  value="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع">
                                                            نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع
                                                        </option>
                                                        <option
                                                            <?php if($item->required_respond=="نقاش مع الجهات الشريكة/الممولة لمعالجتها"): ?>selected
                                                            <?php endif; ?> value="نقاش مع الجهات الشريكة/الممولة لمعالجتها">نقاش
                                                            مع
                                                            الجهات الشريكة/الممولة لمعالجتها
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-sm-12">
            <textarea name="response" rows="2" cols="110"
                      style="border-radius: 10px;"
                      readonly
                      disabled><?php echo e($item->form_response->response); ?></textarea>

                                                <label for="sent_type" class="col-sm-4 col-form-label">صياغة
                                                    الرد</label>
                                            </div>
                                        </div>

                                        <?php if($item->form_response->old_response): ?>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">صياغة الرد
                                                        المعدل
                                                        بناءً على نتائج إجراءات المصادقة</label>
                                                    <textarea name="response_after_confirmation" rows="4" cols="46"
                                                              style="border-radius: 10px;" readonly
                                                              disabled><?php echo e($item->form_response->old_response); ?></textarea>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل
                                                    الرد</label>
                                                <input style="width: 25% !important;" type="text" class="form-control"
                                                       id="replay_status"
                                                       name="replay_status" value="<?php echo e($item->form_response->datee); ?>"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="sent_type" class="col-sm-4 col-form-label">حالة الرد</label>
                                                <?php
                                                if ($item->status == 1) {
                                                    $replay_status = "قيد الدراسة";
                                                } elseif ($item->status == 2) {
                                                    $replay_status = "تم الرد";
                                                } else {
                                                    $replay_status = "";
                                                }
                                                ?>
                                                <input style="width: 25% !important;" type="text" class="form-control"
                                                       id="replay_status"
                                                       name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                                            </div>
                                        </div>

                                        <?php if($item->form_response && !is_null($item->form_response->objection_response)): ?>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                                        بالمصادقة على الرد:</label>
                                                    <input style="width: 25% !important;" type="text"
                                                           class="form-control"
                                                           name="confirm_replay_user_name" readonly
                                                           value="<?php echo e($item->form_response->confirm_account->full_name); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-offset-6 col-sm-6">
                                                    <label for="sent_type" class="col-form-label">هل يوجد اعتراض على
                                                        الرد</label>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="objection_response"
                                                                       value="0" <?php if( $item->form_response->objection_response== 0): ?> <?php echo e("checked disabled"); ?> <?php else: ?> <?php echo e("disabled"); ?> <?php endif; ?>>
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                       name="objection_response"
                                                                       value="1" <?php if($item->form_response->objection_response== 1): ?> <?php echo e("checked disabled"); ?> <?php else: ?> <?php echo e("disabled"); ?> <?php endif; ?>>
                                                                نعم
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12" id="objection_response_div"
                                                     style="<?php if(!$item->form_response->objection_response == 1): ?>display: none;<?php endif; ?>">

                <textarea name="old_response" rows="2" cols="110"
                          style="border-radius: 10px; <?php if($item->form_response->old_response): ?> readonly <?php endif; ?>"
                          disabled
                          readonly><?php if($item->form_response->old_response): ?> <?php echo e($item->form_response->old_response); ?>  <?php endif; ?></textarea>

                                                    <label class="col-sm-4 col-form-label">يرجي إعادة صياغة
                                                        الرد</label>

                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                                        المصادقة</label>
                                                    <input style="width: 65% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status"
                                                           value="<?php echo e($item->form_response->confirmation_date); ?>" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                        المصادقة</label>
                                                    <?php
                                                    if ($item->form_response->confirmation_status == 1) {
                                                        $replay_status = "قيد المصادقة";
                                                    } elseif ($item->form_response->confirmation_status == 2) {
                                                        $replay_status = "تمت المصادقة";
                                                    } else {
                                                        $replay_status = "لم تتم المصادقة";
                                                    }
                                                    ?>
                                                    <input style="width: 65% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                                                </div>
                                            </div>

                                            <hr>
                                            <button class="btn btn-primary nextBtn pull-right button"
                                                    <?php if(count($auth_circle_user) == 1 && in_array(3,$auth_circle_user) && $item->form_response->confirmation_status == 2): ?>disabled <?php endif; ?>>
                                                التالي
                                            </button>

                                            <button class="btn btn-primary prevBtn pull-right button" type="button">
                                                السابق
                                            </button>
                                        <?php endif; ?>

                                        <?php if((in_array(3,$auth_circle_user)|| (in_array(5,$auth_circle_user) && $item->follower_reprocessing == 1)) && $item->form_response): ?>
                                            <?php if($item->form_response && is_null($item->form_response->objection_response)): ?>
                                                <fieldset class="scheduler-border">
                                                    <legend>إجراءات المصادقة على الرد</legend>
                                                    <form
                                                        action="<?php echo e(route('change_confirm_and_update_form_data' , $item->id)); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">الجهة
                                                                    المختصة بالمصادقة على الرد:</label>
                                                                <input type="hidden" class="form-control"
                                                                       name="confirm_account_id"
                                                                       value="<?php echo e(Auth::user()->id); ?>">
                                                                <input style="width: 25% !important;" type="text"
                                                                       class="form-control"
                                                                       name="confirm_replay_user_name" readonly
                                                                       value="<?php echo e(Auth::user()->account->full_name); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-offset-6 col-sm-6">
                                                                <label for="sent_type" class="col-form-label">هل يوجد
                                                                    اعتراض على
                                                                    الرد</label>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="objection_response"
                                                                                   value="0" <?php if( old('objection_response')== 0): ?> <?php echo e("checked"); ?> <?php endif; ?> >
                                                                            لا
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input"
                                                                                   name="objection_response"
                                                                                   value="1" <?php if( old('objection_response')== 1): ?> <?php echo e("checked"); ?> <?php endif; ?>>
                                                                            نعم
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo $errors->first('objection_response', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12" id="objection_response_div"
                                                                 style="display: none;">

                            <textarea name="old_response" rows="2" cols="110"
                                      style="border-radius: 10px;"></textarea>
                                                                <label class="col-sm-4 col-form-label">يرجي إعادة صياغة
                                                                    الرد</label>

                                                            </div>
                                                            <?php echo $errors->first('old_response', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-4">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                                                    المصادقة</label>
                                                                <input style="width: 65% !important;" type="text"
                                                                       class="form-control"
                                                                       id="replay_status"
                                                                       name="replay_status" value="<?php echo e(date('Y-m-d')); ?>"
                                                                       readonly>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                                                    المصادقة</label>
                                                                <?php
                                                                if ($item->form_response->confirmation_status == 1) {
                                                                    $replay_status = "قيد المصادقة";
                                                                } elseif ($item->form_response->confirmation_status == 2) {
                                                                    $replay_status = "تمت المصادقة";
                                                                } else {
                                                                    $replay_status = "لم تتم المصادقة";
                                                                }
                                                                ?>
                                                                <input style="width: 65% !important;" type="text"
                                                                       class="form-control"
                                                                       id="replay_status"
                                                                       name="replay_status" value="<?php echo e($replay_status); ?>"
                                                                       readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row" align="left">
                                                            <div class="col-sm-12">
                                                                <button type="submit"
                                                                        class="btn btn-primary  pull-right button">
                                                                    حفظ
                                                                </button>

                                                                <button
                                                                    class="btn btn-primary prevBtn pull-right button"
                                                                    type="button">
                                                                    السابق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </fieldset>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="inner-card inner-card-user">
                                <div class="inner-card-header">
                                    <div class="inner-card-title">


                                        <button type="button"
                                                style="height:30px !important;width: 30px !important;margin-left: 10px;"
                                                class="btn btn-primary add-btn" id="third_msg_btn">
                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                        </button>
                                        ثالثاً:
                                        توصيات ذات العلاقة بمحتوى ال<?php echo e($form_type->find($type)->name); ?>

                                    </div>
                                </div>
                                <div class="inner-card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                            <div id="third_msg">
                                                <h4>عزيزي الموظف يمكنك من هنا رفع التوصيات التي تستحق الدراسة من قبل
                                                    المركز لاتخاذها بعين الاعتبار
                                                    في تصميم مشاريع مستقبلية:</h4>
                                                <form method="POST" class="form-horizontal"
                                                      action="/citizen/saverecommendations">
                                                    <?php echo csrf_field(); ?>
                                                    <input name="form_id" type="hidden" value="<?php echo e($item->id); ?>">
                                                    <input name="user_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
<textarea id="content" class="form-control <?php echo e(($errors->first('recommendations_content') ? " form-error" : "")); ?>"
          rows="4" id="recommendations_content" name="recommendations_content"><?php echo e(old("recommendations_content")); ?>

</textarea>

                                                            <?php echo $errors->first('recommendations_content', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                        </div>

                                                    </div>

                                                    <div class="form-group row" align="center">
                                                        <div class="col-sm-12">
                                                            <button type="submit" id="submitBtn"
                                                                    class="btn btn-info btn-md"
                                                                    style="width: 30%; background-color:#BE2D45;border:0;">
                                                                رفع التوصيات
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                     aria-hidden="true"
                     style=" position: absolute;left: 42%;top: 40%;transform: translate(-50%, -50%);">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="smallBody">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div style=" margin-bottom: 15px;padding: 5px">
                            <a href="/account/form" class="btn btn-danger button">إلغاء الأمر &times; </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection("content"); ?>
    <div class="row" style="text-align:center;">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">لا يوجد لديك صلاحية للمعالجة
                
                
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<?php $__env->startSection("content"); ?>
    <div class="row" style="text-align:center;">
        <h2 class="col-sm-6" style="margin-top:120px;margin-bottom:30px;color:#af0922;margin-left:337px;">يرجى التأكد من
            صحة الرابط المراد الوصول له</h2>
    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php else: ?>
<?php $__env->startSection("content"); ?>
    <div class="row">
        <div>
            <h2 class="col-sm-12" style="margin-top:120px;margin-bottom:20px;margin-left:0px;">
                متابعة ال<?php echo e($item->form_type->name); ?>

                <hr class="h1-hr" style="margin-right: 10px;">
            </h2>
            <hr>
            <button class="accordion" style="color: #BE2D45;font-weight: 600">
                معلومات مقدم ال<?php echo e($form_type->find($type)->name); ?> الأساسية
            </button>
            <div class="panel" id="first_panel">
                <table class="table table-hover table-striped table-bordered"
                       style="width:100%;white-space:normal;">

                    <tr class="showdateciz">
                        <td>الاسم رباعي:</td>
                        <td><?php echo e($item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name); ?></td>
                        <td>رقم الهوية/جواز السفر:</td>
                        <td><?php echo e($item->citizen->id_number); ?></td>
                    </tr>

                    <tr class="showdateciz">
                        <td>المحافظة:</td>
                        <td><?php echo e($item->citizen->governorate); ?></td>
                        <td>المنطقة :</td>
                        <td><?php echo e($item->citizen->city); ?></td>
                    </tr>

                    <tr class="showdateciz">
                        <td>العنوان:</td>
                        <td colspan="3"><?php echo e($item->citizen->street); ?></td>
                    </tr>

                    <tr class="showdateciz">
                        <td>رقم التواصل (1):</td>
                        <td><?php echo e($item->citizen->mobile); ?></td>
                        <td>رقم التواصل (2):</td>
                        <td><?php echo e($item->citizen->mobile2); ?></td>
                    </tr>

                    <tr>
                        <td>فئة مقدم <?php echo e($form_type->find($type)->name); ?>:</td>
                        <?php
                        $project_arr = array();
                        foreach ($item->citizen->projects as $project) {
                            array_push($project_arr, $project->id);
                        }
                        ?>
                        <td colspan="3"><?php if(!in_array($item->project->id,$project_arr)): ?><?php echo e('غير مستفيد من مشاريع المركز'); ?><?php else: ?><?php echo e('مستفيد من مشاريع المركز '); ?><?php endif; ?></td>
                    </tr>

                    <tr>
                        <td>اسم المشروع:</td>
                        <td colspan="3"><?php echo e($item->project->name ." ".$item->project->code); ?></td>
                    </tr>

                </table>
            </div>

            

            <button class="accordion" style="color: #BE2D45;font-weight: 600">
                تفاصيل ال<?php echo e($form_type->find($type)->name); ?>

            </button>
            <div class="panel">
                <table class="table table-hover table-striped table-bordered"
                       style="width:100%;white-space:normal;">
                    <tr>
                        <td class="mo" colspan="2">الرقم المرجعي</td>
                        <td colspan="2"><?php echo e($item->id); ?></td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">طريقة الاستقبال</td>
                        <td colspan="2"><?php echo e($item->sent_typee->name); ?></td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">فئة ال<?php echo e($form_type->find($type)->name); ?></td>
                        <td><?php echo e($item->category->name); ?></td>
                        <td class="mo" colspan="2">موضوع ال<?php echo e($form_type->find($type)->name); ?></td>
                        <td><?php echo e($item->form_type->name); ?> <?php echo e($item->title); ?></td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">محتوى ال<?php echo e($form_type->find($type)->name); ?></td>
                        <td colspan="2"><?php echo e($item->content); ?></td>
                    </tr>


                    <tr>
                        <td class="mo">تاريخ تقديم ال<?php echo e($form_type->find($type)->name); ?></td>
                        <td><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                        <td class="mo">تاريخ تسجيل ال<?php echo e($form_type->find($type)->name); ?> علي النظام</td>
                        <td><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                    </tr>


                    <tr>
                        <td class="mo" colspan="2">المرفقات</td>
                        <td colspan="2"><?php
                            $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

                            if(!$form_files->isEmpty()){
                            ?>
                            <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton"
                               data-target="#smallModal"
                               data-attr="<?php echo e(route('citizenshowfiles', $item->id)); ?>" title="اضغظ هنا">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php }else{?>
                            <a class="btn btn-xs btn-primary" title="لايوجد مرفقات لعرضها" disabled="disabled">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php } ?></td>
                    </tr>

                </table>
            </div>
            
            <?php if($item->form_response): ?>
                <button class="accordion hide_div">
                    الردود و المتابعات
                </button>
                <div class="panel hide_div">
                    <br>
                    <?php if(($item->response_type == 0 || $item->response_type == 1) && $item->form_response): ?>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">حالة
                                    ال<?php echo e($item->form_type->name); ?></label>
                                <?php
                                if ($item->status == 1) {
                                    $replay_status = "قيد الدراسة";
                                } elseif ($item->status == 2) {
                                    $replay_status = "تم الرد";
                                } else {
                                    $replay_status = "";
                                }
                                ?>
                                <input style="width: 25% !important;" type="text" class="form-control"
                                       id="replay_status"
                                       name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                            </div>
                        </div>


                        <?php if($item->form_response->old_response): ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">تفاصيل الرد</label>
                                    <textarea name="response_after_confirmation" rows="4" cols="46"
                                              style="border-radius: 10px;" readonly
                                              disabled><?php echo e($item->form_response->old_response); ?></textarea>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">تفاصيل الرد</label>
                                    <textarea name="response" rows="4" cols="46" style="border-radius: 10px;"
                                              readonly disabled><?php echo e($item->form_response->response); ?></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل الرد</label>
                                <input style="width: 25% !important;" type="text" class="form-control"
                                       id="replay_status"
                                       name="replay_status" value="<?php echo e($item->form_response->datee); ?>" readonly>
                            </div>
                        </div>


                    <?php endif; ?>
                </div>
            <?php else: ?>
                <button class="accordion1">
                    الردود و المتابعات
                </button>
                <div class="panel"></div>
            <?php endif; ?>

            
            <?php if($item->form_follow): ?>
                <button class="accordion hide_div">
                    التغذية الراجعة
                </button>
                <div class="panel hide_div" id="rank_div">
                    <br>
                    <br>
                    <?php if($item->form_follow): ?>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">حالة تبليغ الرد</label>
                                <select class="form-control" id="follow_form_status" name="follow_form_status"
                                        style="width: 65% !important;" disabled>
                                    <option <?php if($item->form_follow->solve == 1): ?><?php echo e("selected"); ?><?php endif; ?> value="1">تم
                                        تبليغ الرد
                                    </option>
                                    <option <?php if($item->form_follow->solve == 2): ?><?php echo e("selected"); ?><?php endif; ?> value="2">لم
                                        يتم تبليغ الرد
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row" id="follow_reason_not_div"
                             style="<?php if($item->form_follow->solve == 1): ?><?php echo e("display: none"); ?><?php endif; ?>">
                            <div class="col-md-12">

                                <label for="sent_type" class="col-sm-4 col-form-label">سبب عدم تبليغ
                                    الرد</label>
                                <select id="follow_reason_not" name="follow_reason_not" class="form-control"
                                        style="width: 65% !important;" disabled>
                                    <option value="">اختر السبب</option>
                                    <option
                                        <?php if($item->form_follow->follow_reason_not == "عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة."): ?><?php echo e("selected"); ?><?php endif; ?>
                                        value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                        عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من
                                        مرة.
                                    </option>
                                    <option
                                        <?php if($item->form_follow->follow_reason_not == "أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة."): ?><?php echo e("selected"); ?><?php endif; ?> value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">
                                        أرقام
                                        التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                    </option>
                                    <option
                                        <?php if($item->form_follow->follow_reason_not == "أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)"): ?><?php echo e("selected"); ?><?php endif; ?>
                                        value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                        أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول
                                        حالياً،
                                        الرقم المطلوب لا يستقبل مكالمات، ...)
                                    </option>

                                </select>

                            </div>
                        </div>

                        <hr>

                        <div class="form-group row" id="feedback_div"
                             style="<?php if($item->form_follow->solve == 2): ?><?php echo e("display: none;"); ?> <?php endif; ?>">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">التغذية الراجعة</label>

                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="evaluate"
                                                   <?php if($item->form_follow->evaluate == 1): ?><?php echo e("checked"); ?><?php endif; ?> class="form-check-input"
                                                   value="1">راضي بشكل كبير
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="evaluate"
                                                   <?php if($item->form_follow->evaluate == 2): ?><?php echo e("checked"); ?><?php endif; ?> class="form-check-input"
                                                   value="2">راضي بشكل متوسط
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="evaluate" class="form-check-input"
                                                   <?php if($item->form_follow->evaluate == 3): ?><?php echo e("checked"); ?><?php endif; ?> value="3">راضي
                                            بشكل ضعيف
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="evaluate" class="form-check-input"
                                                   value="4"
                                                   <?php if($item->form_follow->evaluate == 4): ?><?php echo e("checked"); ?><?php endif; ?> id="inp3">غير
                                            راضي عن الرد
                                        </label>
                                    </div>
                                </div>

                                <?php if($item->form_follow->evaluate): ?>
                                    <script>
                                        $('input[name=evaluate]').attr('disabled', true);
                                    </script>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div id="div3"
                                     style="<?php if($item->form_follow->evaluate != 4): ?><?php echo e("display:none;"); ?><?php endif; ?>">
                                    <h4>سبب عدم الرضا عن الرد</h4>
                                    <div id="appear">
       <textarea name="notes" rows="2" cols="78" style="border-radius: 10px;"
                 disabled><?php echo e($item->form_follow->notes); ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <button class="accordion1">
                    التغذية الراجعة
                </button>
                <div class="panel"></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 style="color: red">عزيزي المواطن/ة في حال وجود أي استفسار أو اعتراض من طرفك حول محتوى الاقتراح
                أو الشكوى والرد عليه/ا يمكنك إعادة التواصل مع المركز على الرقم المجاني 1800900901</h4>
        </div>
    </div>

    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
         aria-hidden="true" style=" position: absolute;left: 42%;top: 40%;transform: translate(-50%, -50%);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div style=" margin-bottom: 15px;padding: 5px">
                <a href="/" class="btn btn-danger ">رجوع للصفحة الرئيسية</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('#first_msg').hide();
        $('#first_msg_btn').click(function () {

            $('#first_msg').slideToggle("fast", function () {
                if ($('#first_msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });

    </script>
    <script>
        $('#second_msg').hide();
        $('#second_msg_btn').click(function () {

            $('#second_msg').slideToggle("fast", function () {
                if ($('#second_msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });

    </script>
    <script>
        $('#third_msg').hide();
        $('#third_msg_btn').click(function () {

            $('#third_msg').slideToggle("fast", function () {
                if ($('#third_msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],input[type='radio'],input[type='checkbox']"),
                    isValid = true;

                if ($('.help-block').is(':visible'))
                    isValid = false;

                console.log(isValid);

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');

            });

            allPrevBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                if (isValid) prevStepWizard.removeAttr('disabled').trigger('click');
            });


            function daysdifference(firstDate, secondDate) {
                var startDay = new Date(firstDate);
                var endDay = new Date(secondDate);

                var millisBetween = startDay.getTime() - endDay.getTime();
                var days = millisBetween / (1000 * 3600 * 24);

                return Math.round(Math.abs(days));
            }

            var date1 = new Date($.now());
            var date2 = new Date('<?php echo $item->created_at;?>');
            var days_of_processing = $('#count-days_of_processing').val();
            console.log(days_of_processing);
            var daysdifference = days_of_processing - daysdifference(date1, date2);
            $('#count-days').text(daysdifference + '  أيام');

        });
    </script>


    <script>
        function print_form() {
            $('.accordion').addClass('active');
            $('.panel').addClass('open');
            window.print();
        }

    </script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                panel.classList.toggle("open");
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
// panel.style.maxHeight = panel.scrollHeight + "px";

                }
            });
        }
    </script>

    <script>
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
// return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>

    <script>

        $(document).ready(function () {
            $('.deleted_div').hide();
            $('#updated_category_div').hide();
            if ($("input[name='optradio4']:checked").val() == 1) {
                $('#updated_category_div').show();
            } else {
                $('#updated_category_div').hide();
            }

            $('input:radio[name="optradio"]').click(function () {
                var inputValue = $("input[name='optradio']:checked").val();
                if (inputValue == 1) {
                    $('.deleted_div').show();
                } else {
                    $('.deleted_div').hide();
                }
            });


            var objection_response = $("input[name='objection_response']:checked").val();
            if (objection_response == 1) {
                $('#objection_response_div').show();
            } else {
                $('#objection_response_div').hide()
            }

            $('input:radio[name="objection_response"]').click(function () {
                var inputValue = $("input[name='objection_response']:checked").val();
                if (inputValue == 1) {
                    $('#objection_response_div').show();
                } else {
                    $('#objection_response_div').hide()
                }
            });

            $('#follow_form_status').change(function () {
                var inputValue = $("#follow_form_status").val();
                if (inputValue == 1) {
                    $('#feedback_div').show();
                    $('#follow_reason_not_div').hide();
                } else if (inputValue == 2) {
                    $('#follow_reason_not_div').show();
                    $('#feedback_div').hide();
                } else {
                    $('#follow_reason_not_div').hide();
                    $('#feedback_div').hide();
                }
            });

            $('#follow_form_status_1').change(function () {
                var inputValue = $("#follow_form_status_1").val();
                if (inputValue == 1) {
                    $('#feedback_div_1').show();
                    $('#follow_reason_not_div_1').hide();
                } else if (inputValue == 2) {
                    $('#follow_reason_not_div_1').show();
                    $('#feedback_div_1').hide();
                } else {
                    $('#follow_reason_not_div_1').hide();
                    $('#feedback_div_1').hide();
                }
            });

            var follow_form_status_1 = $("#follow_form_status_1").val();
            if (follow_form_status_1 == 1) {
                $('#feedback_div_1').show();
                $('#follow_reason_not_div_1').hide();
            } else if (follow_form_status_1 == 2) {
                $('#follow_reason_not_div_1').show();
                $('#feedback_div_1').hide();
            } else {
                $('#follow_reason_not_div_1').hide();
                $('#feedback_div_1').hide();
            }


            var follow_form_status = $("#follow_form_status").val();
            if (follow_form_status == 1) {
                $('#feedback_div').show();
                $('#follow_reason_not_div').hide();
            } else if (follow_form_status == 2) {
                $('#follow_reason_not_div').show();
                $('#feedback_div').hide();
            } else {
                $('#follow_reason_not_div').hide();
                $('#feedback_div').hide();
            }


            var inputValue = $("input[name='optradio2']:checked").val();
            if (inputValue == 1) {
                $('#reformulate_div').show();
                $('#reason_lack_clarification_div').hide();
                $('.hide_div').show();
            } else if (inputValue == 0) {
                $('#reason_lack_clarification_div').show();
                $('#reformulate_div').hide();
                $('.hide_div').hide();
            } else {
                $('#reason_lack_clarification_div').hide();
                $('#reformulate_div').hide();
                $('.hide_div').show();
            }

            $('input:radio[name="optradio2"]').click(function () {
                var inputValue = $("input[name='optradio2']:checked").val();
                if (inputValue == 1) {
                    $('#reformulate_div').show();
                    $('#reason_lack_clarification_div').hide();
                    $('.hide_div').show();
                } else if (inputValue == 0) {
                    $('#reason_lack_clarification_div').show();
                    $('#reformulate_div').hide();
                    $('.hide_div').hide();
                } else {
                    $('#reason_lack_clarification_div').hide();
                    $('#reformulate_div').hide();
                    $('.hide_div').show();
                }
            });

            $('input:radio[name="optradio3"]').click(function () {
                var inputValue = $("input[name='optradio3']:checked").val();
                if (inputValue == 1) {
                    $('#stop_div').show();
                    $('#reprocessing_div').hide();
                } else if (inputValue == 0) {
                    $('#reprocessing_div').show();
                    $('#stop_div').hide();
                } else {
                    $('#reprocessing_div').hide();
                    $('#stop_div').hide();
                }
            });

            $('input:radio[name="optradio6"]').click(function () {
                var inputValue = $("input[name='optradio6']:checked").val();
                if (inputValue == 1) {
                    $('#confirm_deleting_div').show();
                    $('#reprocessing_deleteing_div').hide();
                } else if (inputValue == 0) {
                    $('#reprocessing_deleteing_div').show();
                    $('#confirm_deleting_div').hide();
                } else {
                    $('#confirm_deleting_div').hide();
                    $('#reprocessing_deleteing_div').hide();
                }
            });

            $('input:radio[name="confirm_evaluate"]').click(function () {
                var inputValue = $("input[name='confirm_evaluate']:checked").val();
                if (inputValue == 1) {
                    $('#reprocessing_form_follow_evaluate_div').hide();
                    $('#close_form_follow_evaluate_div').show();
                } else if (inputValue == 0) {
                    $('#close_form_follow_evaluate_div').hide();
                    $('#reprocessing_form_follow_evaluate_div').show();
                } else {
                    $('#reprocessing_form_follow_evaluate_div').hide();
                    $('#close_form_follow_evaluate_div').hide();
                }
            });

            $('#khlkjj').on('submit', function () {
                var inputValue = $("input[name='confirm_evaluate']:checked").val();
                if (inputValue == 0) {
                    return confirm('تأكيد عملية الإغلاق؟');
                }
            });

            $('input:radio[name="optradio15"]').click(function () {
                var inputValue = $("input[name='optradio15']:checked").val();
                if (inputValue == 1) {
                    $('#confirm_follow_reason_not_div').show();
                    $('#reprocessing_follow_reason_not_div').hide();
                } else if (inputValue == 0) {
                    $('#reprocessing_follow_reason_not_div').show();
                    $('#confirm_follow_reason_not_div').hide();
                } else {
                    $('#confirm_follow_reason_not_div').hide();
                    $('#reprocessing_follow_reason_not_div').hide();
                }
            });

            $('input:radio[name="optradio4"]').click(function () {
                var inputValue = $("input[name='optradio4']:checked").val();
                if (inputValue == 1) {
                    $('#updated_category_div').show();
                } else {
                    $('#updated_category_div').hide();
                }
            });

            var inputValue = $("input[name='optradio1']:checked").val();
            if (inputValue == 1) {
                $('#explain_main_div').show();
            } else {
                $('#explain_main_div').hide();
            }


            $('input:radio[name="optradio1"]').click(function () {
                var inputValue = $("input[name='optradio1']:checked").val();
                if (inputValue == 1) {
                    $('#explain_main_div').show();
                } else {
                    $('#explain_main_div').hide();
                }
            });
        });

    </script>

    <script>
        $('#delete_form_modal').submit(function (e) {
            var id = $('#deleted_id').val();
            e.preventDefault();
            if (!id)
                return;

            if (!$("input[name='optradio']:checked").val()) {
                $("#optradio").addClass('form-error');
                $("#optradiop").text('يرجى تحديد مدى احتياج الشكوى للحذف');
                return;
            } else {
                $("#optradiop").hide();
            }

            if ($("input[name='optradio']:checked").val() == 1) {
                if (!$("#deleting_reason").val()) {
                    $("#deleting_reason").addClass('form-error');
                    $("#deleting_reasonp").text('سبب الحذف غير مدخل، يرجى إدخال السبب بالشكل الصحيح');
                    return;
                } else {
                    $("#deleting_reasonp").hide();
                }
            }
            var reason = $("#deleting_reason").val();
            var deleting = $("input[name='optradio']:checked").val();
            console.log('Reason Before: ', reason);
            $.post("<?php echo e(route('destroy_from_citizian')); ?>", {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
                'deleting': deleting,
                'reason': reason
            }, function (data) {
                $("#deleting_reason").val('');

                var step = 2;
                if ($("input[name='optradio']:checked").val() == 0) {
                    step = 3;
                }
                var url = window.location.href.split('?')[0];
                if (url.indexOf('?') > -1) {
                    url += '&step=' + step
                } else {
                    url += '?step=' + step
                }
                window.location.href = url;
            });
        });

        $('#confirm_delete_form_modal').submit(function (e) {

            var id = $('#deleted_id').val();
            e.preventDefault();
            if (!id)
                return;

            if (!$("input[name='optradio6']:checked").val()) {
                $("#optradio6").addClass('form-error');
                $("#optradio7p").text('يرجى تحديد مدى احتياج الشكوى للحذف');
                return;
            } else {
                $("#optradio7p").hide();
            }

            var inputValue = $("input[name='optradio6']:checked").val();
            if (inputValue == 1) {
                $.post("<?php echo e(route('confirm_destroy_from_citizian')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                }, function (data) {
                    window.location.href = '/account';
                });
            } else if (inputValue == 0) {
                var deleting_reprocessing_recommendations = $('#deleting_reprocessing_recommendations').val();

                if (deleting_reprocessing_recommendations == "") {
                    $('#deleting_reprocessing_recommendations').addClass('form-error');
                    $("#optradio8p").text('يرجى تحديد التوصيات المطلوبة لإعادة معالجة الشكوى ');
                    return;
                } else {
                    $("#optradio8p").hide();
                }

                $.post("<?php echo e(route('confirm_detory_reprocessing_recommendations_from_citizian')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                    'recommendations_for_deleting': deleting_reprocessing_recommendations,
                }, function (data) {
                    var url = window.location.href.split('?')[0];
                    if (url.indexOf('?') > -1) {
                        url += '&step=2'
                    } else {
                        url += '?step=2'
                    }
                    window.location.href = url;
                });
            }

//location.reload();
        });

        $('#confirm_follow_reason_not_modal').submit(function (e) {

            var id = $('#follow_reason_not_id').val();
            e.preventDefault();
            if (!id)
                return;

            if (!$("input[name='optradio15']:checked").val()) {
                $("#optradio15").addClass('form-error');
                $("#optradio15p").text('يرجى تحديد مدى احتياج الشكوى للإغلاق');
                return;
            } else {
                $("#optradio15p").hide();
            }

            var inputValue = $("input[name='optradio15']:checked").val();
            if (inputValue == 1) {
                $.post("<?php echo e(route('confirm_follow_reason_not')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                }, function (data) {
                    window.location.href = '/account';
                });
            } else if (inputValue == 0) {
                var follow_reason_not_reprocessing_recommendations = $('#follow_reason_not_reprocessing_recommendations').val();

                if (follow_reason_not_reprocessing_recommendations == "") {
                    $('#follow_reason_not_reprocessing_recommendations').addClass('form-error');
                    $("#optradio16p").text('يرجى تحديد التوصيات المطلوبة لإعادة تبيلغ الرد ');
                    return;
                } else {
                    $("#optradio16p").hide();
                }

                $.post("<?php echo e(route('confirm_follow_reason_not_reprocessing_recommendations')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                    'recommendations_for_follow_reason_not': follow_reason_not_reprocessing_recommendations,
                }, function (data) {
                    var url = window.location.href.split('?')[0];
                    if (url.indexOf('?') > -1) {
                        url += '&step=5'
                    } else {
                        url += '?step=5'
                    }
                    window.location.href = url;
                });
            }
        });

        $('#update_clarification_form_modal').submit(function (e) {
            var id = $('#clarification_id').val();
            e.preventDefault();
            if (!id)
                return;

            if ($(".prodcedure_2")[0]) {

                if (!$(".prodcedure_2 input[name='optradio1']:checked").val()) {
                    $(".prodcedure_2 #optradio1p").text('يرجى تحديد مدى احتياج ال<?php echo $form_type->find($type)->name;?> للاستيضاح عن مضمونها');
                    return;
                } else {
                    $("#optradio1p").hide();
                }

                if ($(".prodcedure_2 input[name='optradio1']:checked").val() == 1) {
                    if (!$(".prodcedure_2 input[name='optradio2']:checked").val()) {
                        $(".prodcedure_2 #optradio2p").text('يرجى تحديد حالة الاستيضاح عن مضمون ال<?php echo $form_type->find($type)->name; ?>');
                        return;
                    } else {
// alert('3');
                        $("#optradio2p").hide();
                    }
                } else {
                    $(".prodcedure_2 input[name='optradio2']").attr("checked", false);
                    $('.prodcedure_2 #reformulate_content').val("");
                    $('.prodcedure_2 #reason_lack_clarification').val("");
// alert('4');
                }


                if ($(".prodcedure_2 input[name='optradio2']:checked").val() == 1) {
                    if (!$('.prodcedure_2 #reformulate_content').val()) {
                        $(".prodcedure_2 #reformulate_content").addClass('form-error');
                        $(".prodcedure_2 #reformulate_content").addClass('has-error');
                        $(".prodcedure_2 #optradio3p").text('إعادة صياغة المحتوى غير مدخلة، يرجى إدخال المحتوى بالشكل الصحيح');
// $(".prodcedure_2 #submit_update_clarification").addClass('disabled');
                        return false;
                    } else {
                        $("#optradio3p").hide();
                    }
                }

                if ($(".prodcedure_2 input[name='optradio2']:checked").val() == 0) {
                    if (!$('.prodcedure_2 #reason_lack_clarification').val()) {
                        $(".prodcedure_2 #reason_lack_clarification").addClass('form-error');
                        $(".prodcedure_2 #optradio4p").text('سبب عدم الاستيضاح غير مدخل، يرجى إدخال السبب بالشكل الصحيح');
                        return;
                    } else {
                        $("#optradio4p").hide();
                    }
                }

            }

            if ($(".prodcedure_3")[0]) {
                if (!$(".prodcedure_3 input[name='optradio3']:checked").val()) {
                    $(".prodcedure_3 #optradio5p").text('يرجى تحديد مدى احتياج ال<?php echo $form_type->find($type)->name;?>  للإغلاق ');
                    return;
                } else {
                    $(".prodcedure_3 #optradio5p").hide();
                }

                if ($(".prodcedure_3 input[name='optradio3']:checked").val() == 0) {
                    if (!$('.prodcedure_3 #reprocessing_recommendations').val()) {
                        $(".prodcedure_3 #optradio6p").text('يرجى تحديد التوصيات المطلوبة لإعادة معالجة ال<?php echo $form_type->find($type)->name;?> ');
                        return;
                    } else {
                        $(".prodcedure_3 #optradio6p").hide();
                    }
                }

            }
            var need_clarification = $("input[name='optradio1']:checked").val();
            var have_clarified = $("input[name='optradio2']:checked").val();
            var reformulate_content = $('#reformulate_content').val();
            var reason_lack_clarification = $('#reason_lack_clarification').val();
            var reprocessing_recommendations = $('#reprocessing_recommendations').val();
            var reprocessing = $("input[name='optradio3']:checked").val();

            console.log(have_clarified);
            console.log(reason_lack_clarification);
            $.post("/account/form/clarification_from_citizian/" + id, {
                "_token": "<?php echo e(csrf_token()); ?>",
                "method": "put",
                'need_clarification': need_clarification,
                'have_clarified': have_clarified,
                'reformulate_content': reformulate_content,
                'reason_lack_clarification': reason_lack_clarification,
                'reprocessing': reprocessing,
                'reprocessing_recommendations': reprocessing_recommendations,
            }, function (data) {

                var step = 1;
                if ($("input[name='optradio1']:checked").val() == 0 || $("input[name='optradio2']:checked").val() == 1) {
                    step = 2;
                }


                var url = window.location.href.split('?')[0];
                if ($("input[name='optradio3']:checked").val() == 1) {
                    window.location.href = '/account';
                } else {
                    if (url.indexOf('?') > -1) {
                        url += '&step=' + step
                    } else {
                        url += '?step=' + step
                    }
                    window.location.href = url;
                }


            });
        });


        $('#update_category_form_modal').submit(function (e) {
            var id = $('#updated_category_id').val();
            e.preventDefault();
            if (!id)
                return;

            if (!$("input[name='optradio4']:checked").val()) {
                $("#optradio9p").text('يرجى تحديد مدى احتياج ال<?php echo $form_type->find($type)->name;?>  لإعادة تصنيف فئتها ');
                return;
            } else {
                $("#optradio9p").hide();
            }

            var inputValue4 = $("input[name='optradio4']:checked").val();
            if (inputValue4 == 1) {
                var category_id = "";
                <?php if($type == 1){?>
                    category_id = $("#updated_category_name").val();
                <?php } else{ ?>
                    category_id = $("#updated_category_name1").val();
                <?php } ?>

                if (category_id == "") {
                    $("#optradio10p").text('يرجى تحديد فئة ال<?php echo $form_type->find($type)->name;?> المعدلة');
                    return;
                } else {
                    $("#optradio10p").hide();
                }
            } else {
                category_id = 0;
            }
            console.log('Reason Before1: ', category_id);
            $.post("/account/form/change-category/" + id, {
                "_token": "<?php echo e(csrf_token()); ?>",
                "method": "put",
                'category_id': category_id
            }, function (data) {
                console.log(data.msg);
                <?php if($type == 1){?>
                $("#updated_category_name").val(category_id);
                <?php } else{ ?>
                $("#updated_category_name1").val(category_id);
                <?php } ?>

                var step = 4;
// if ($("input[name='optradio4']:checked").val() == 0) {
//     step = 4;
// }
                var url = window.location.href.split('?')[0];
                if (url.indexOf('?') > -1) {
                    url += '&step=' + step
                } else {
                    url += '?step=' + step
                }
                window.location.href = url;
            });

        });


        $('#response_type_select').change(function () {

            if ($(this).val() == '1') {
                $("#replay_advanced").show();
            } else {
                $("#replay_advanced").hide();
            }

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#div3').hide();


            if ($('#evaluate').val() == 4) {
                $('#div3').show();
            } else {
                $('#div3').hide();
            }


            $("#evaluate").change(function () {
                if ($('#evaluate').val() == 4) {
                    $('#div3').show();
                } else {
                    $('#div3').hide();
                }
            });

            $('#follow_form_status').change(function () {
                if ($('#follow_form_status').val() == 1) {
                    $("#evaluate").change(function () {
                        if ($('#evaluate').val() == 4) {
                            $('#div3').show();
                        } else {
                            $('#div3').hide();
                        }
                    });
                } else {
                    $('#div3').hide();
                }
            });

            $('#follow_form_status_1').change(function () {
                if ($('#follow_form_status_1').val() == 1) {
                    $("#evaluate_1").change(function () {
                        if ($('#evaluate_1').val() == 4) {
                            $('#div3_1').show();
                        } else {
                            $('#div3_1').hide();
                        }
                    });
                } else {
                    $('#div3').hide();
                }
            });

            $('#response_type_select').change(function () {

                if ($(this).val() == '1') {
                    $("#replay_advanced").show();
                } else {
                    $("#replay_advanced").hide();
                }

            });


            if ($('#response_type_select').val() == '1') {
                $("#replay_advanced").show();
            } else {
                $("#replay_advanced").hide();
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".input ").click(function () {
                $("#appear").fadeIn(1000);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".fadeOut ").click(function () {
                $("#appear").fadeIn(1000);
            });

            var url_string = window.location.href
            var url = new URL(url_string);
            var step = url.searchParams.get("step");
            $('#step-1').hide();
            $('#step-2').hide();
            $('#step-3').hide();
            $('#step-4').hide();
            $('#step-5').hide();
            if (step == null) {
                $('#step-1').show();
            }
            if (step == 1) {
                $('#step-1').show();
            }
            if (step == 2) {
                $('#step-2').show();
                $("#btn-step-1").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-2").removeClass('btn-default');
                $("#btn-step-2").addClass('btn-circle');
                $("#btn-step-2").addClass('btn-success');
                $("#btn-step-2").removeAttr("disabled");
                $("#btn-step-1").removeAttr("disabled");
            }
            if (step == 3) {
                $('#step-3').show();
                $("#btn-step-2").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-1").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');

                $("#btn-step-3").removeClass('btn-default');
                $("#btn-step-3").addClass('btn-circle');
                $("#btn-step-3").addClass('btn-success');
                $("#btn-step-3").removeAttr("disabled");
                $("#btn-step-2").removeAttr("disabled");
                $("#btn-step-1").removeAttr("disabled");

            }
            if (step == 4) {
                $('#step-4').show();
                $("#btn-step-3").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-2").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-1").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');

                $("#btn-step-4").removeClass('btn-default');
                $("#btn-step-4").addClass('btn-circle');
                $("#btn-step-4").addClass('btn-success');

                $("#btn-step-4").removeAttr("disabled");
                $("#btn-step-3").removeAttr("disabled");
                $("#btn-step-2").removeAttr("disabled");
                $("#btn-step-1").removeAttr("disabled");
            }
            if (step == 5) {
                $('#step-5').show();
                $("#btn-step-4").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-3").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-2").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');
                $("#btn-step-1").removeClass('btn-success').addClass('btn-default').addClass('btn-circle');

                $("#btn-step-5").removeClass('btn-default');
                $("#btn-step-5").addClass('btn-success');
                $("#btn-step-5").addClass('btn-circle');

                $("#btn-step-5").removeAttr("disabled");
                $("#btn-step-4").removeAttr("disabled");
                $("#btn-step-3").removeAttr("disabled");
                $("#btn-step-2").removeAttr("disabled");
                $("#btn-step-1").removeAttr("disabled");
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".input").click(function () {
                $("hiddenDiv").fadeIn(1000);
            });
        });
    </script>
    <script>
        function follow_reason() {
            $('#follow_reason_div').show();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>