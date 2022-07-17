<?php $__env->startSection("title", " معالجة ال".$form_type->find($type)->name); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .panel-primary > .panel-heading {
            background-color: #be2d45 !important;
            border-color: #be2d45 !important;
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

        .open {
            min-height: 250px !important;
            /*overflow: auto !important;*/

        }

        #first_panel.open {
            min-height: 120px !important;
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
    </style>
<?php $__env->stopSection(); ?>
<?php if(Auth::user()): ?>
    <?php if($auth_circle_users): ?>
        <?php $__currentLoopData = $auth_circle_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$auth_circle_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($k == auth()->user()->account->id): ?>
<?php $__env->startSection("content"); ?>
    <div style="" id="auth_circle_users">

        <div class="row" style="margin-top:120px;margin-bottom:20px;margin-left:0px;">
            <div class="col-md-6">
                <?php if($item->reprocessing_form_id): ?>
                    <a target="_blank" class="btn btn-primary"
                       href="/citizen/form/reprocessing_show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_form_id); ?>">الذهاب
                        لإعادة المعالجة</a>

                <?php endif; ?>

                <?php if($item->reprocessing_parent_form_id): ?>
                    <a target="_blank" class="btn btn-primary"
                       href="/citizen/form/show/<?php echo e($item->citizen->id_number); ?>/<?php echo e($item->reprocessing_parent_form_id); ?>">نتيجة
                        المعالجة السابقة</a>

                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <h2>
                    متابعة ال<?php echo e($item->form_type->name); ?>

                    <hr class="h1-hr" style="margin-right: 10px;">
                </h2>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <label class="col-form-label">المدة الزمنية الماضية من معالجة
                    ال<?php echo e($form_type->find($type)->name); ?></label>
                <button id="count-days" class="btn btn-primary"></button>
            </div>
            <div class="col-md-6">
                <label class="col-form-label">المدة الزمنية المطلوبة لمعالجة
                    ال<?php echo e($form_type->find($type)->name); ?></label>
                <?php if($item->response_type == 1): ?>
                    <button class="btn btn-primary">13 يوم</button>
                <?php else: ?>
                    <button class="btn btn-primary">9 أيام</button>
                <?php endif; ?>
            </div>
        </div>

        <br>

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

        <button class="accordion">
            أولاً: معلومات مقدم ال<?php echo e($form_type->find($type)->name); ?> الأساسية
        </button>
        <div class="panel" id="first_panel">
            <table class="table table-hover table-striped table-bordered" style="width:100%;white-space:normal;">
                <tr>
                    <td>الرقم المرجعي:</td>
                    <td colspan="3"><?php echo e($item->citizen->id); ?></td>
                </tr>

                <tr class="showdateciz">
                    <td>الاسم رباعي:</td>
                    <td><?php echo e($item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name); ?></td>
                    <td>رقم الهوية/جواز السفر:</td>
                    <td><?php echo e($item->citizen->id_number); ?></td>
                </tr>

                <tr class="showdateciz">
                    <td>رقم التواصل (1):</td>
                    <td><?php echo e($item->citizen->mobile); ?></td>
                    <td>رقم التواصل (2):</td>
                    <td><?php echo e($item->citizen->mobile2); ?></td>
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

        

        <button class="accordion">
            ثانياً: تفاصيل ال<?php echo e($form_type->find($type)->name); ?>

        </button>
        <div class="panel" id="second_panel">
            <table class="table table-hover table-striped table-bordered" style="width:100%;white-space:normal;">
                <tr>
                    <td class="mo" colspan="2">طريقة الاستقبال:</td>
                    <td colspan="2"><?php echo e($item->sent_typee->name); ?></td>
                </tr>
                <tr>
                    <td class="mo">تاريخ تقديم ال<?php echo e($form_type->find($type)->name); ?>:</td>
                    <td><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                    <td class="mo">تاريخ تسجيل ال<?php echo e($form_type->find($type)->name); ?> علي النظام:</td>
                    <td><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                </tr>

                <tr>
                    <td class="mo" colspan="2">فئة ال<?php echo e($form_type->find($type)->name); ?>:</td>
                    <td colspan="2"><?php echo e($item->category->name); ?></td>
                </tr>

                <?php if($item->old_category_id): ?>
                    <tr>
                        <td class="mo">فئة ال<?php echo e($form_type->find($type)->name); ?> المعدلة بناءً على محتوى
                            ال<?php echo e($form_type->find($type)->name); ?>:
                        </td>
                        <td><?php echo e($item->old_category->name); ?></td>

                        <td class="mo">اسم المستخدم الذي قام بإعادة تصنيف الفئة:</td>
                        <td><?php echo e($item->user_change_category->name); ?></td>
                    </tr>

                <?php endif; ?>

                <tr>
                    <td class="mo" colspan="2">موضوع ال<?php echo e($form_type->find($type)->name); ?>:</td>
                    <td colspan="2"><?php echo e($item->form_type->name); ?> <?php echo e($item->title); ?></td>
                </tr>
                <tr>
                    <td class="mo" colspan="2">محتوى ال<?php echo e($form_type->find($type)->name); ?>:</td>
                    <td colspan="2"><?php echo e($item->content); ?></td>
                </tr>

                <?php if($item->reformulate_content): ?>
                    <tr>
                        <td class="mo">محتوى ال<?php echo e($form_type->find($type)->name); ?> المعدل بناءً على نتيجة الاستيضاح:
                        </td>
                        <td><?php echo e($item->reformulate_content); ?></td>

                        <td class="mo">اسم المستخدم الذي قام بإعادة صياغة المحتوى:</td>
                        <td><?php echo e($item->user_change_content->full_name); ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td class="mo" colspan="2">المرفقات:</td>
                    <td colspan="2">
                        <?php
                        $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

                        if(!$form_files->isEmpty()){
                        ?>
                        <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton"
                           data-target="#smallModal"
                           data-attr="<?php echo e(route('showfiles', $item->id)); ?>" title="اضغظ هنا">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php }else{?>
                        <a class="btn btn-xs btn-primary" title="لايوجد مرفقات لعرضها" readonly="">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php } ?>
                    </td>
                </tr>

            </table>
        </div>
        
    </div>

    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-2">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle">ثالثا</a>
                    <p><small> الحاجة للاستيضاح عن مضمون ال<?php echo e($form_type->find($type)->name); ?>

                        </small></p>
                </div>
                <div class="stepwizard-step col-xs-2">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle"
                       disabled="disabled">رابعاً</a>
                    <p><small> الحاجة لحذف ال<?php echo e($form_type->find($type)->name); ?></small></p>
                </div>
                <div class="stepwizard-step col-xs-2">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">خامسا</a>
                    <p><small>الحاجة لإعادة تصنيف فئة ال<?php echo e($form_type->find($type)->name); ?></small></p>
                </div>
                <div class="stepwizard-step col-xs-2">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle"
                       disabled="disabled">سادساً</a>
                    <p><small>إجراءات الرد على ال <?php echo e($form_type->find($type)->name); ?></small></p>
                </div>

                <div class="stepwizard-step col-xs-2">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle"
                       disabled="disabled">سابعاً</a>
                    <p><small> التغذية الراجعة</small></p>
                </div>

                <div class="stepwizard-step col-xs-2">
                    <a href="#step-6" type="button" class="btn btn-default btn-circle">ثامناً</a>
                    <p><small> توصيات ذات العلاقة بمحتوى ال<?php echo e($form_type->find($type)->name); ?></small></p>
                </div>

            </div>
        </div>


        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                <h3 class="panel-title">الحاجة للاستيضاح عن مضمون ال<?php echo e($form_type->find($type)->name); ?></h3>
            </div>
            <div class="panel-body">
                <?php if((!is_null($item->need_clarification) && in_array(2,$auth_circle_user))  || (!is_null($item->need_clarification) && in_array(5,$auth_circle_user))): ?>

                    <div class="form-group row">
                        <div class="col-sm-6 col-sm-offset-6">
                            <label for="sent_type" class="col-form-label">هل ال<?php echo e($form_type->find($type)->name); ?>

                                بحاجة
                                لاستيضاح عن مضمونه/ا؟</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio1"
                                               value="0" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 0): ?> <?php echo e("checked disabled"); ?> <?php elseif($item->need_clarification && $item->need_clarification == 1): ?><?php echo e("disabled"); ?> <?php endif; ?>>
                                        لا
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio1"
                                               value="1" <?php if(!is_null($item->need_clarification) && $item->need_clarification == 1): ?> <?php echo e("checked disabled"); ?><?php elseif($item->need_clarification && $item->need_clarification == 0): ?><?php echo e("disabled"); ?> <?php endif; ?>>
                                        نعم
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="explain_main_div" style="display: none;">

                        <?php if($item->reformulate_content): ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>اسم المستخدم الذي قام بإعادة صياغة المحتوى:</label>
                                    <input class="form-control"
                                           value="<?php echo e($item->user_change_content->full_name); ?>"
                                           readonly/>
                                </div>
                                <div class="col-sm-6"><label>محتوى ال<?php echo e($form_type->find($type)->name); ?> المعدل
                                        بعد
                                        الاستيضاح </label>
                                    <input class="form-control" value="<?php echo e($item->reformulate_content); ?>"
                                           readonly/>
                                </div>
                            </div>
                        <?php elseif($item->reason_lack_clarification): ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>اسم المستخدم الذي قام بإعادة صياغة المحتوى:</label>
                                    <input class="form-control"
                                           value="<?php echo e($item->user_change_content->full_name); ?>"
                                           readonly/>
                                </div>

                                <div class="col-sm-6">
                                    <label>سبب عدم الاستيضاح</label>
                                    <input class="form-control" value="<?php echo e($item->reason_lack_clarification); ?>"
                                           readonly/>
                                </div>

                            </div>
                        <?php else: ?>
                            <div class="form-group row">
                                <div class="col-sm-offset-6 col-sm-6">
                                    <label for="sent_type" class="col-form-label">هل تم الاستيضاح عن المعلومات
                                        المطلوبة؟</label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio2"
                                                       value="0">
                                                لا
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio2"
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
                                        ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة الاستيضاح:</label>
                                    <input class="form-control " type="text" id="reformulate_content"
                                           name="reformulate_content" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8" id="reason_lack_clarification_div" style="display: none">
                                    <label class="col-sm-4 col-form-label">سبب عدم الاستيضاح</label>
                                    <input class="form-control" type="text" id="reason_lack_clarification"
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
                                    <label>الجهة الإدارية المسؤولة عن متابعة الجهة المختصة بمعالجة
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
                                            يوصي بإعادة معالجة ال<?php echo e($form_type->find($type)->name); ?> مع أخذ بعين
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

                    <button class="btn btn-primary nextBtn pull-right button">
                        التالي
                    </button>
                <?php endif; ?>
                <?php if(in_array(2,$auth_circle_user)): ?>
                    <?php if(is_null($item->need_clarification)): ?>
                        <form id="update_clarification_form_modal" class="prodcedure_2">
                            <input type="hidden" id="clarification_id" value="<?php echo e($item->id); ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <label for="sent_type" class="col-form-label">هل
                                        ال<?php echo e($form_type->find($type)->name); ?>

                                        بحاجة
                                        لاستيضاح عن مضمونه/ا؟</label>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio1"
                                                       value="0">
                                                لا
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio1"
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
                                        <label for="sent_type" class="col-form-label">هل تم الاستيضاح عن
                                            المعلومات
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

                                    <div class="col-sm-6 col-sm-offset-6">
                                        <p id="optradio2p" class="help-block" style="color:red;"></p>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8" id="reformulate_div" style="display: none;">
                                        <label class="col-sm-12 col-form-label">إعادة صياغة محتوى
                                            ال<?php echo e($form_type->find($type)->name); ?> بناءً على نتيجة
                                            الاستيضاح:</label>
                                        <input class="form-control " type="text" id="reformulate_content"
                                               name="reformulate_content" autocomplete="off">
                                        <p id="optradio3p" class="help-block" style="color:red;"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8" id="reason_lack_clarification_div"
                                         style="display: none">
                                        <label class="col-sm-4 col-form-label">سبب عدم الاستيضاح</label>
                                        <input class="form-control" type="text" id="reason_lack_clarification"
                                               name="reason_lack_clarification" autocomplete="off">
                                        <p id="optradio4p" class="help-block" style="color:red;"></p>
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

                <?php if(in_array(5,$auth_circle_user) && $item->need_clarification && is_null($item->reprocessing)): ?>
                    <form id="update_clarification_form_modal">
                        <input type="hidden" id="clarification_id" value="<?php echo e($item->id); ?>">
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-form-label">هل ال<?php echo e($form_type->find($type)->name); ?> بحاجة
                                    لإغلاق؟</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <div class="col-sm-12" id="stop_div" style="display: none">
                                        <?php if(Auth::user()): ?>
                                            <?php if(($item->status == 1 || $item->status == 2 || $item->status == 4)): ?>

                                                <a href="/account/form/terminateform/<?php echo e($item->id); ?>"
                                                   class="btn btn-success">إيقاف <?php echo e($item->form_type->name); ?></a>
                                            <?php elseif($item->deleted_at == null): ?>
                                                <a href="/account/form/allowform/<?php echo e($item->id); ?>"
                                                   class="btn btn-success">السماح
                                                    لل<?php echo e($item->form_type->name); ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio3" value="1">
                                        نعم
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <div id="reprocessing_div" style="display: none">
                                        <h4>إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?></h4>
                                        <h4>التوصيات</h4>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" rows="3"
                                                          id="reprocessing_recommendations"
                                                          name="reprocessing_recommendations"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio3" value="0">
                                        لا
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div style="float:left; margin-left: 50px;">
                                <button id="submit_update_clarification"
                                        class="btn btn-primary nextBtn pull-right button">التالي
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                <h3 class="panel-title">الحاجة لحذف ال<?php echo e($form_type->find($type)->name); ?></h3>
            </div>
            <div class="panel-body">
                <?php if(in_array(2,$auth_circle_user) && !is_null($item->deleting)): ?>
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
                                            <input type="radio" class="form-check-input" name="optradio"
                                                   value="0"
                                                   <?php if($item->deleting == 0): ?><?php echo e('checked'); ?><?php endif; ?> disabled>لا
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"
                                                   id="post-format-gallery"
                                                   name="optradio" value="1"
                                                   <?php if($item->deleting == 1): ?><?php echo e('checked'); ?><?php endif; ?> disabled> نعم
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-primary nextBtn pull-right button">
                            التالي
                        </button>
                    </form>
                    <?php if($item->deleting == 1): ?>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ الحذف</label>
                                <input type="text" class="form-control" name="deleted_at" readonly
                                       value="<?php if(!$item->deleted_at): ?><?php echo e($item->confirm_deleting); ?><?php else: ?><?php echo e($item->deleted_at); ?><?php endif; ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="sent_type" class="col-sm-4 col-form-label">اسم موظف الذي قام
                                    بالحذف</label>
                                <input type="text" class="form-control" name="deleted_by_name" readonly
                                       value="<?php echo e($item->deleted_user->name); ?>" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">سبب الحذف</label>
                                <input type="text" class="form-control" id="deleting_reason"
                                       placeholder="سبب الحذف"
                                       value="<?php echo e($item->deleted_because); ?>" readonly>
                            </div>
                        </div>

                        <?php if(in_array(5,$auth_circle_user) && $item->confirm_deleting && !$item->recommendations_for_deleting): ?>
                            <form id="confirm_delete_form_modal">
                                <input type="hidden" id="deleted_id" value="<?php echo e($item->id); ?>">
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label">هل ال<?php echo e($form_type->find($type)->name); ?>

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
                                                <input type="radio" class="form-check-input" name="optradio6"
                                                       value="1"> نعم
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <div id="reprocessing_deleteing_div" style="display: none">
                                                <h4>إعادة معالجة ال<?php echo e($form_type->find($type)->name); ?></h4>
                                                <h4>التوصيات</h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                                <textarea class="form-control" rows="3"
                                                                          id="deleting_reprocessing_recommendations"
                                                                          name="deleting_reprocessing_recommendations"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio6"
                                                       value="0"> لا
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div style="float:left; margin-left: 50px;">
                                        <button id="submit_delete" class="btn btn-primary nextBtn pull-right button">
                                            التالي
                                        </button>
                                    </div>
                                </div>

                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($item->recommendations_for_deleting): ?>
                        <hr>
                        <h4>وفيما يلي توصيات الجهة الإدارية المسؤولة بخصوص حذف <?php echo e($form_type->find($type)->name); ?>

                            :</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>الجهة الإدارية المسؤولة عن متابعة الجهة المختصة
                                    بمعالجة <?php echo e($form_type->find($type)->name); ?>:
                                </td>
                                <td><?php echo e($item->user_recommendations_for_deleting->full_name); ?></td>
                            </tr>
                            <tr>
                                <td>التوصيات:</td>
                                <td><?php echo e($item->recommendations_for_deleting); ?></td>
                            </tr>
                        </table>
                    <?php endif; ?>

                <?php else: ?>
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
                                            <input type="radio" class="form-check-input" name="optradio"
                                                   value="0">لا
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
                            <div class="col-sm-6">
                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ الحذف</label>
                                <input type="text" class="form-control" name="deleted_at" readonly
                                       value="<?php echo e(\Carbon\Carbon::now()); ?>">


                            </div>
                            <div class="col-sm-6">
                                <label for="sent_type" class="col-sm-4 col-form-label">اسم موظف الذي قام
                                    بالحذف</label>
                                <input type="hidden" class="form-control" name="deleted_by"
                                       value="<?php echo e(Auth::user()->id); ?>">
                                <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                                <input type="text" class="form-control" name="deleted_by_name" readonly
                                       value="<?php echo e(Auth::user()->account->full_name); ?>">

                            </div>
                        </div>

                        <div class="form-group row deleted_div">
                            <div class="col-sm-10">
                                <label for="sent_type" class="col-sm-4 col-form-label">سبب الحذف</label>
                                <input type="text" class="form-control" id="deleting_reason"
                                       placeholder="سبب الحذف">
                                <p id="deleting_reasonp" class="help-block" style="color:red;"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div style="float:left; margin-left: 50px;">
                                <button id="submit_delete" class="btn btn-primary nextBtn pull-right  button">
                                    التالي
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                <h3 class="panel-title">الحاجة لإعادة تصنيف فئة ال<?php echo e($form_type->find($type)->name); ?></h3>
            </div>
            <div class="panel-body">

                <?php if($item->old_category_id): ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>اسم المستخدم الذي قام بإعادة تصنيف الفئة:</label>
                            <input class="form-control" value="<?php echo e($item->user_change_category->name); ?>"
                                   readonly/>
                        </div>
                        <div class="col-sm-6">
                            <label>فئة ال<?php echo e($form_type->find($type)->name); ?> المعدلة </label>
                            <input class="form-control" value="<?php echo e($item->old_category->name); ?>" readonly/>
                        </div>
                    </div>

                    <button class="btn btn-primary nextBtn pull-right" type="button">التالي</button>

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
                                            <input type="radio" class="form-check-input" name="optradio4"
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
                            </div>

                        </div>
                        <hr>

                        <div class="form-group row" id="updated_category_div">
                            <div class="col-sm-12">
                                <label class="col-sm-4 col-form-label">فئة <?php echo e($form_type->find($type)->name); ?>

                                    (2)</label>
                                <?php if($item->type == 1): ?>
                                    <select class="form-control" id="updated_category_name"
                                            name="category_id"
                                            style="width: 60% !important;">
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
                                            style="width: 60% !important;">
                                        <option value=""> اختر فئة الاقتراح</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cat->is_complaint != 1): ?>
                                                <option value="<?php echo e($cat->id); ?>"
                                                        <?php if($item->category_id==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div style="float:left; margin-left: 50px;">
                                <button id="submit_update_categpry" class="btn btn-primary nextBtn pull-right  button">
                                    التالي
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-5">
            <div class="panel-heading">
                <h3 class="panel-title">التغذية الراجعة</h3>
            </div>
            <div class="panel-body">

                <div class="col-sm-12">
                    <br>
                    <?php if(!$item->form_follow): ?>
                        <form action="<?php echo e(route('change_replay_status_feedback' , $item->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">الجهة المسؤولة عن تبليغ الرد
                                        (موظف الاتصال)</label>
                                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                    <input style="width: 65% !important;" type="text" class="form-control"
                                           name="replay_user_name" readonly
                                           value="<?php echo e(Auth::user()->account->full_name); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">حالة تبليغ الرد</label>
                                    <select class="form-control" id="follow_form_status" name="follow_form_status"
                                            style="width: 65% !important;">
                                        <option value="">حالة تبليغ الرد</option>
                                        <option value="1">تم تبليغ الرد</option>
                                        <option value="2">لم يتم تبليغ الرد</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row" id="follow_reason_not_div" style="display: none">
                                <div class="col-md-12">

                                    <label for="sent_type" class="col-sm-4 col-form-label">سبب عدم تبليغ الرد</label>
                                    <select id="follow_reason_not" name="follow_reason_not" class="form-control"
                                            style="width: 65% !important;">
                                        <option value="">اختر السبب</option>
                                        <option
                                            value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                            عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من
                                            مرة.
                                        </option>
                                        <option value="أرقام التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.">أرقام
                                            التواصل الخاصة بمقدم الاقتراح/الشكوى غير صحيحة.
                                        </option>
                                        <option
                                            value="أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً، الرقم المطلوب لا يستقبل مكالمات، ...)">
                                            أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً،
                                            الرقم المطلوب لا يستقبل مكالمات، ...)
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row" id="feedback_div" style="display: none;">
                                <div class="col-sm-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">التغذية الراجعة</label>
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="evaluate" class="form-check-input" value="1">راضي
                                                بشكل كبير
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="evaluate" class="form-check-input" value="2">راضي
                                                بشكل متوسط
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="evaluate" class="form-check-input" value="3">راضي
                                                بشكل ضعيف
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="evaluate" class="form-check-input" value="4"
                                                       id="inp3">غير راضي عن الرد
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div id="div3" style="display:none;">
                                        <h4>سبب عدم الرضا عن الرد</h4>
                                        <div id="appear">
                                    <textarea name="notes" rows="2" cols="78"
                                              style="border-radius: 10px;"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" align="left">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary nextBtn pull-right button">
                                        التالي
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">الجهة المسؤولة عن تبليغ الرد
                                    (موظف الاتصال)</label>
                                <input style="width: 65% !important;" type="text" class="form-control"
                                       name="replay_user_name" readonly
                                       value="<?php echo e($item->form_follow->account->full_name); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">حالة تبليغ الرد</label>
                                <select class="form-control" id="follow_form_status" name="follow_form_status"
                                        style="width: 65% !important;" disabled>
                                    <option <?php if($item->form_follow->solve == 1): ?><?php echo e("selected"); ?><?php endif; ?> value="1">تم تبليغ
                                        الرد
                                    </option>
                                    <option <?php if($item->form_follow->solve == 2): ?><?php echo e("selected"); ?><?php endif; ?> value="2">لم يتم
                                        تبليغ الرد
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row" id="follow_reason_not_div"
                             style="<?php if($item->form_follow->solve == 1): ?><?php echo e("display: none"); ?><?php endif; ?>">
                            <div class="col-md-12">

                                <label for="sent_type" class="col-sm-4 col-form-label">سبب عدم تبليغ الرد</label>
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
                                        أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن الوصول حالياً،
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
                                            <input type="radio" name="evaluate" class="form-check-input" value="4"
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
                                <div id="div3" style="<?php if($item->form_follow->evaluate != 4): ?><?php echo e("display:none;"); ?><?php endif; ?>">
                                    <h4>سبب عدم الرضا عن الرد</h4>
                                    <div id="appear">
                                <textarea name="notes" rows="2" cols="78" style="border-radius: 10px;"
                                          disabled><?php echo e($item->form_follow->notes); ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary nextBtn pull-right button">
                            التالي
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-6">
            <div class="panel-heading">
                <h3 class="panel-title">توصيات ذات العلاقة بمحتوى ال<?php echo e($form_type->find($type)->name); ?></h3>
            </div>
            <div class="panel-body">
                <h4>عزيزي الموظف يمكنك من هنا رفع التوصيات التي تستحق الدراسة من قبل المركز لاتخاذها بعين الاعتبار
                    في تصميم مشاريع مستقبلية:</h4>
                <form method="POST" class="form-horizontal" action="/citizen/saverecommendations">
                    <?php echo csrf_field(); ?>
                    <input name="form_id" type="hidden" value="<?php echo e($item->id); ?>">
                    <input name="user_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                              <textarea id="content"
                                        class="form-control <?php echo e(($errors->first('recommendations_content') ? " form-error" : "")); ?>"
                                        rows="6" id="recommendations_content"
                                        name="recommendations_content"><?php echo e(old("recommendations_content")); ?></textarea>

                            <?php echo $errors->first('content', '<p class="help-block" style="color:red;">:message</p>'); ?>

                        </div>

                    </div>

                    <div class="form-group row" align="center">
                        <div class="col-sm-12">
                            <button type="submit" id="submitBtn" class="btn btn-success pull-right">
                                رفع التوصيات
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                <h3 class="panel-title">إجراءات الرد على ال <?php echo e($form_type->find($type)->name); ?></h3>
            </div>
            <div class="panel-body">

                <?php if(($item->response_type != 0 || $item->response_type != 1) && !$item->form_response): ?>
                    <form action="<?php echo e(route('change_response_and_update_form_data' , $item->id)); ?>"
                          method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="response_type" class="col-sm-4 col-form-label">الإجراءات
                                    المطلوبة للرد</label>
                                <select id="response_type_select" name="response_type" class="form-control"
                                        style="width: 50% !important;">
                                    <option value="">اختر نوع</option>
                                    <option value="0">يمكن الرد عليها مباشرة</option>
                                    <option value="1">تتطلب إجراءات مطولة للرد عليها</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div id="replay_advanced" style="display: none">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="response_type" class="col-sm-4 col-form-label">طبيعة
                                        الإجراءات المطولة
                                        المطلوبة</label>
                                    <select name="required_respond" class="form-control"
                                            style=" width: 50%;">
                                        <option value="">اختر الإجراء المطلوب</option>
                                        <option value="عقد زيارة ميدانية/فنية">عقد زيارة ميدانية/فنية
                                        </option>
                                        <option
                                            value="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع">
                                            نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع
                                        </option>
                                        <option value="نقاش مع الجهات الشريكة/الممولة لمعالجتها ">نقاش مع
                                            الجهات الشريكة/الممولة لمعالجتها
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="response_type" class="col-sm-4 col-form-label">تحميل ملف
                                        توثيق
                                        الإجراء</label>
                                    <input type="file" class="form-control " value="" id="form_file"
                                           name="form_file">

                                </div>
                                <div class="col-sm-6">
                                    <label for="response_type" class="col-sm-4 col-form-label">تاريخ تنفيذ
                                        الإجراء</label>
                                    <input type="date" class="form-control" name="form_data"
                                           placeholder="يوم / شهر / سنة"/>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                    بالمعالجة</label>
                                <input type="hidden" class="form-control" name="replay_user_id"
                                       value="<?php echo e(Auth::user()->id); ?>">
                                <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                                <input style="width: 65% !important;" type="text" class="form-control"
                                       name="replay_user_name"
                                       readonly
                                       value="<?php echo e(Auth::user()->account->full_name); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">صياغة الرد</label>
                                <textarea name="response" rows="2" cols="102"
                                          style="border-radius: 10px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل
                                    الرد</label>
                                <input style="width: 65% !important;" type="text" class="form-control"
                                       id="replay_status"
                                       name="replay_status" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                            </div>

                            <div class="col-sm-6">
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
                                <input style="width: 65% !important;" type="text" class="form-control"
                                       id="replay_status"
                                       name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                            </div>
                        </div>
                        

                        <hr>

                        <div class="form-group row" align="left">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary nextBtn pull-right button">
                                    التالي
                                </button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <br><br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="response_type" class="col-sm-4 col-form-label">الإجراءات المطلوبة
                                للرد</label>
                            <select id="response_type_select" name="response_type" class="form-control"
                                    style="width: 50% !important;" readonly="">
                                <option value="">اختر نوع</option>
                                <option <?php if($item->response_type==0): ?>selected <?php endif; ?>  value="0">يمكن الرد
                                    عليها مباشرة
                                </option>
                                <option <?php if($item->response_type==1): ?>selected <?php endif; ?>  value="1">تتطلب إجراءات
                                    مطولة للرد عليها
                                </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div id="replay_advanced" style="<?php if(!$item->required_respond): ?>display: none <?php endif; ?>">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="response_type" class="col-sm-4 col-form-label">طبيعة الإجراءات
                                    المطولة
                                    المطلوبة</label>
                                <select name="required_respond" class="form-control" style=" width: 50%;"
                                        readonly="">
                                    <option value="">اختر الإجراء المطلوب</option>
                                    <option <?php if($item->required_respond=="عقد زيارة ميدانية/فنية"): ?>selected
                                            <?php endif; ?>  value="عقد زيارة ميدانية/فنية"> عقد زيارة ميدانية/فنية
                                    </option>
                                    <option
                                        <?php if($item->required_respond=="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع"): ?>selected
                                        <?php endif; ?>  value="نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع">
                                        نقاش من خلال لجنة الاقتراحات والشكاوى الخاصة بالمشروع
                                    </option>
                                    <option
                                        <?php if($item->required_respond=="نقاش مع الجهات الشريكة/الممولة لمعالجتها"): ?>selected
                                        <?php endif; ?> value="نقاش مع الجهات الشريكة/الممولة لمعالجتها">نقاش مع
                                        الجهات الشريكة/الممولة لمعالجتها
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="response_type" class="col-sm-4 col-form-label">تاريخ تنفيذ
                                    الإجراء</label>
                                <input style=" width: 50%;" type="date" value="<?php echo e($item->form_data); ?>"
                                       class="form-control" readonly name="form_data"
                                       placeholder="يوم / شهر / سنة"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="response_type" class="col-sm-4 col-form-label">رفع ملف توثيق
                                    الإجراء</label>

                                <a style="width: 50%;" target="_blank" class="btn btn-primary"
                                   href="<?php echo e(route('downloadfiles', $item->id)); ?>">رفع ملف توثيق الإجراء</a>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                بالمعالجة</label>
                            <input style="width: 50% !important;" type="text" class="form-control"
                                   name="replay_user_name"
                                   readonly
                                   value="<?php echo e($item->form_response->account->full_name); ?>" width="50%">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="sent_type" class="col-sm-4 col-form-label">صياغة الرد</label>
                            <textarea name="response" rows="2" cols="78" style="border-radius: 10px;"
                                      readonly disabled><?php echo e($item->form_response->response); ?></textarea>
                        </div>
                    </div>

                    <?php if($item->form_response->old_response): ?>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="sent_type" class="col-sm-4 col-form-label">صياغة الرد المعدل
                                    بناءً على نتائج إجراءات المصادقة</label>
                                <textarea name="response_after_confirmation" rows="2" cols="78"
                                          style="border-radius: 10px;" readonly
                                          disabled><?php echo e($item->form_response->old_response); ?></textarea>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل الرد</label>
                            <input style="width: 50% !important;" type="text" class="form-control"
                                   id="replay_status"
                                   name="replay_status" value="<?php echo e($item->form_response->datee); ?>" readonly>
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
                            <input style="width: 50% !important;" type="text" class="form-control"
                                   id="replay_status"
                                   name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                        </div>
                    </div>
                <?php endif; ?>

                <hr>

                <?php if(in_array(3,$auth_circle_user) && $item->form_response): ?>
                    <?php if($item->form_response && is_null($item->form_response->objection_response)): ?>

                        <form action="<?php echo e(route('change_confirm_and_update_form_data' , $item->id)); ?>"
                              method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                                        بالمصادقة</label>
                                    <input type="hidden" class="form-control" name="confirm_account_id"
                                           value="<?php echo e(Auth::user()->id); ?>">
                                    <input style="width: 65% !important;" type="text" class="form-control"
                                           name="confirm_replay_user_name" readonly
                                           value="<?php echo e(Auth::user()->account->full_name); ?>">
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
                                                       name="optradio8" value="0">
                                                لا
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="optradio8" value="1">
                                                نعم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8" id="objection_response_div" style="display: none;">
                                    <label class="col-sm-12 col-form-label">يرجي إعادة صياغة الرد</label>
                                    <textarea name="old_response" rows="2" cols="78"
                                              style="border-radius: 10px;"></textarea>

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                                        المصادقة</label>
                                    <input style="width: 65% !important;" type="text" class="form-control"
                                           id="replay_status"
                                           name="replay_status" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                                </div>

                                <div class="col-sm-6">
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
                                    <input style="width: 65% !important;" type="text" class="form-control"
                                           id="replay_status"
                                           name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row" align="left">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary nextBtn pull-right button">
                                        التالي
                                    </button>
                                </div>
                            </div>
                        </form>
            </div>

            <?php elseif($item->form_response && !is_null($item->form_response->objection_response)): ?>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="sent_type" class="col-sm-4 col-form-label">الجهة المختصة
                            بالمصادقة</label>
                        <input style="width: 65% !important;" type="text" class="form-control"
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
                                    <input type="radio" class="form-check-input" name="optradio8"
                                           value="0" <?php if( $item->form_response->objection_response== 0): ?> <?php echo e("checked disabled"); ?> <?php endif; ?>>
                                    لا
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio8"
                                           value="1" <?php if($item->form_response->objection_response== 1): ?> <?php echo e("checked disabled"); ?> <?php endif; ?>>
                                    نعم
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8" id="objection_response_div"
                         style="<?php if(!$item->form_response->objection_response == 1): ?>display: none;<?php endif; ?>">
                        <label class="col-sm-12 col-form-label">يرجي إعادة صياغة الرد</label>
                        <textarea name="old_response" rows="2" cols="78"
                                  style="border-radius: 10px;"><?php if($item->form_response->old_response): ?> <?php echo e($item->form_response->old_response); ?> <?php endif; ?></textarea>

                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-6">
                        <label for="sent_type" class="col-sm-4 col-form-label">تاريخ
                            المصادقة</label>
                        <input style="width: 65% !important;" type="text" class="form-control"
                               id="replay_status"
                               name="replay_status"
                               value="<?php echo e($item->form_response->confirmation_date); ?>" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="sent_type" class="col-sm-4 col-form-label">حالة المصادقة</label>
                        <?php
                        if ($item->form_response->confirmation_status == 1) {
                            $replay_status = "قيد المصادقة";
                        } elseif ($item->form_response->confirmation_status == 2) {
                            $replay_status = "تمت المصادقة";
                        } else {
                            $replay_status = "لم تتم المصادقة";
                        }
                        ?>
                        <input style="width: 65% !important;" type="text" class="form-control"
                               id="replay_status"
                               name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                    </div>
                </div>

                <button class="btn btn-primary nextBtn pull-right button">
                    التالي
                </button>
            <?php endif; ?>
            <?php endif; ?>

        </div>

    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>

<?php $__env->startSection('js'); ?>

    <script>
        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

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
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');


            function daysdifference(firstDate, secondDate) {
                var startDay = new Date(firstDate);
                var endDay = new Date(secondDate);

                var millisBetween = startDay.getTime() - endDay.getTime();
                var days = millisBetween / (1000 * 3600 * 24);

                return Math.round(Math.abs(days));
            }

            var date1 = new Date($.now());
            var date2 = new Date('<?php echo $item->created_at;?>');
            $('#count-days').text(daysdifference(date1, date2) + '  يوم');

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
                    panel.style.maxHeight = panel.scrollHeight + "px";

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
            $('input:radio[name="optradio"]').click(function () {
                var inputValue = $("input[name='optradio']:checked").val();
                if (inputValue == 1) {
                    $('.deleted_div').show();
                } else {
                    $('.deleted_div').hide();
                }
            });

            $('input:radio[name="optradio8"]').click(function () {
                var inputValue = $("input[name='optradio8']:checked").val();
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

            $('input:radio[name="optradio4"]').click(function () {
                var inputValue = $("input[name='optradio4']:checked").val();
                if (inputValue == 1) {
                    $('#updated_category_div').show();
                } else {
                    $('#updated_category_div').hide();
                }
            });

            var inputValue = $("#auth_circle_users input[name='optradio1']:checked").val();
            if (inputValue == 1) {
                $('#auth_circle_users #explain_main_div').show();
            } else {
                $('#auth_circle_users #explain_main_div').hide();
            }

            var inputValue1 = $("#auth_circle_users2 input[name='optradio1']:checked").val();
            if (inputValue1 == 1) {
                $('#auth_circle_users2 #explain_main_div').show();
            } else {
                $('#auth_circle_users2 #explain_main_div').hide();
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
                $("#optradiop").text('يرجى تحديد ما إذا كان الاقتراح/ الشكوى بحاجة لحذف أم لا');
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
                $('#message_session').show();
                $('#content_message').text(data.msg);
                //location.reload();
            });
        });

        $('#confirm_delete_form_modal').submit(function (e) {

            var id = $('#deleted_id').val();
            e.preventDefault();
            if (!id)
                return;

            var inputValue = $("input[name='optradio6']:checked").val();
            if (inputValue == 1) {
                $.post("<?php echo e(route('confirm_destroy_from_citizian')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                }, function (data) {
                    $('#message_session').show();
                    $('#content_message').text(data.msg);
                });
            } else if (inputValue == 0) {
                var deleting_reprocessing_recommendations = $('#deleting_reprocessing_recommendations').val();
                $.post("<?php echo e(route('confirm_detory_reprocessing_recommendations_from_citizian')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                    'recommendations_for_deleting': deleting_reprocessing_recommendations,
                }, function (data) {
                    $('#message_session').show();
                    $('#content_message').text(data.msg);
                });
            }

            //location.reload();
        });

        $('#update_clarification_form_modal').submit(function (e) {
            var id = $('#clarification_id').val();
            e.preventDefault();
            if (!id)
                return;

            if ($(".prodcedure_2")[0]) {
                if (!$(".prodcedure_2 input[name='optradio1']:checked").val()) {
                    $(".prodcedure_2 #optradio1").addClass('form-error');
                    $("#prodcedure_2 #optradio1p").text('يرجى تحديد ما إذا كان <?php echo $form_type->find($type)->name;?> بحاجة لاستيضاح أم لا');
                    return;
                } else {
                    $("#optradio1p").hide();
                }

                if ($(".prodcedure_2 input[name='optradio1']:checked").val() == 1) {
                    if (!$(".prodcedure_2 input[name='optradio2']:checked").val()) {
                        $(".prodcedure_2 #optradio2").addClass('form-error');
                        $(".prodcedure_2 #optradio2p").text('يرجى تحديد نتيجة الاستيضاح عن المعلومات المطلوبة في <?php echo $form_type->find($type)->name; ?>');
                        return;
                    } else {
                        $("#optradio2p").hide();
                    }
                }

                if ($(".prodcedure_2 input[name='optradio2']:checked").val() == 1) {
                    if (!$('.prodcedure_2 #reformulate_content').val()) {
                        $(".prodcedure_2 #reformulate_content").addClass('form-error');
                        $(".prodcedure_2 #optradio3p").text('إعادة صياغة المحتوى غير مدخلة، يرجى إدخال المحتوى بالشكل الصحيح');
                        return;
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

            var need_clarification = $("input[name='optradio1']:checked").val();
            var have_clarified = $("input[name='optradio2']:checked").val();
            var reformulate_content = $('#reformulate_content').val();
            var reason_lack_clarification = $('#reason_lack_clarification').val();
            var reprocessing_recommendations = $('#reprocessing_recommendations').val();
            var reprocessing = $("input[name='optradio3']:checked").val();
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

                $('#step-1').load(function () {
                    $('#message_session').show();
                    $('#content_message').text(data.msg);
                });
            });
        });


        $('#update_category_form_modal').submit(function (e) {
            var id = $('#updated_category_id').val();
            e.preventDefault();
            if (!id)
                return;
            var category_id = "";
            <?php if($type == 1){?>
                category_id = $("#updated_category_name").val();
            <?php } else{ ?>
                category_id = $("#updated_category_name1").val();
            <?php } ?>
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
                $('#message_session').show();
                $('#content_message').text(data.msg);
                //location.reload();
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
            $(".input").click(function () {
                $("#div1").fadeIn(1000);
                $("#div3").fadeOut(1000);
            });
        });
        $(document).ready(function () {
            $("#inp3").click(function () {
                $("#div3").fadeIn(1000);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".fadeOut").click(function () {
                $("#div1").fadeOut(1000);
            });
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
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".input").click(function () {
                $("hiddenDiv").fadeIn(1000);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>