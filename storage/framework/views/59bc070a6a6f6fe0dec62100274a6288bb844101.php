<?php $__env->startSection("title", "متابعة نموذج "); ?>

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

<?php $__env->startSection("content"); ?>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;"> أهلاً بك عزيزي المواطن </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="inner-card inner-card-border">
                    <div class="inner-card-content">
                        <div class="inner-card-body">
                            <div class="row pb-50">
                                <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                    <div>
                                        <h4 style="color: red">عزيزي المواطن/ة في حال وجود أي استفسار أو اعتراض من طرفك
                                            حول محتوى الاقتراح
                                            أو الشكوى والرد عليه/ا يمكنك إعادة التواصل مع المركز على الرقم المجاني
                                            1800900901</h4>
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
                                    class="btn btn-primary add-btn" id="first_msg_btn">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                            </button>
                            أولاً: المعلومات الأساسية
                        </div>
                    </div>
                    <div class="inner-card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                <div id="first_msg">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered"
                                               style="width:100%;white-space:normal;">
                                            <tr class="showdateciz">
                                                <td colspan="2">الاسم رباعي:</td>
                                                <td colspan="2"><?php if($item->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name); ?><?php endif; ?></td>
                                                <td colspan="2">رقم الهوية/جواز السفر:</td>
                                                <td colspan="2"><?php if($item->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->id_number); ?><?php endif; ?></td>
                                            </tr>

                                            <tr class="showdateciz">
                                                <td colspan="2">رقم التواصل (1):</td>
                                                <td colspan="2"><?php if($item->hide_data == 1 ): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->mobile); ?><?php endif; ?></td>
                                                <td colspan="2">رقم التواصل (2):</td>
                                                <td colspan="2"><?php if($item->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->mobile2); ?><?php endif; ?></td>
                                                <td colspan="2">المحافظة:</td>
                                                <td colspan="2"><?php echo e($item->citizen->governorate); ?></td>
                                            </tr>

                                            <tr class="showdateciz">
                                                <td colspan="2">المنطقة :</td>
                                                <td colspan="2"><?php echo e($item->citizen->city); ?></td>
                                                <td colspan="2">العنوان:</td>
                                                <td colspan="2"><?php echo e($item->citizen->street); ?></td>
                                                <td colspan="2">فئة مقدم <?php echo e($form_type->find($type)->name); ?>

                                                    :
                                                </td>
                                                <?php
                                                $project_arr = array();
                                                foreach ($item->citizen->projects as $project) {
                                                    array_push($project_arr, $project->id);
                                                }
                                                ?>
                                                <td colspan="2"><?php if(!in_array($item->project->id,$project_arr)): ?><?php echo e('غير مستفيد من مشاريع المركز'); ?><?php else: ?><?php echo e('مستفيد من مشاريع المركز '); ?><?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">رقم طلب المشروع:</td>

                                                    <?php if($item->project_id != 1): ?>

                                                        <td colspan="2"><?php if($item->citizen->citizen_projects()->where('project_id',$item->project_id)->first()): ?><?php echo e($item->citizen->citizen_projects()->where('project_id',$item->project_id)->first()->project_request); ?><?php else: ?><?php echo e('-'); ?><?php endif; ?></td>
                                                    <?php else: ?>
                                                        <td colspan="2">_</td>
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
                            ثالثاً: الردود والمتابعات
                        </div>
                    </div>
                    <div class="inner-card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                <div id="third_msg">
                                    <?php if($item->form_response): ?>
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
                                                    <input style="width: 25% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status" value="<?php echo e($replay_status); ?>" readonly>
                                                </div>
                                            </div>


                                            <?php if($item->form_response->old_response): ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="sent_type" class="col-sm-4 col-form-label">تفاصيل
                                                            الرد</label>
                                                        <textarea name="response_after_confirmation" rows="4" cols="46"
                                                                  style="border-radius: 10px;" readonly
                                                                  disabled><?php echo e($item->form_response->old_response); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="sent_type" class="col-sm-4 col-form-label">تفاصيل
                                                            الرد</label>
                                                        <textarea name="response" rows="4" cols="46"
                                                                  style="border-radius: 10px;"
                                                                  readonly
                                                                  disabled><?php echo e($item->form_response->response); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ تسجيل
                                                        الرد</label>
                                                    <input style="width: 25% !important;" type="text"
                                                           class="form-control"
                                                           id="replay_status"
                                                           name="replay_status" value="<?php echo e($item->form_response->datee); ?>"
                                                           readonly>
                                                </div>
                                            </div>


                                        <?php endif; ?>
                                    <?php endif; ?>
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
                                    class="btn btn-primary add-btn" id="fourth_msg_btn">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                            </button>
                            رابعاً: التغذية الراجعة
                        </div>
                    </div>
                    <div class="inner-card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                <div id="fourth_msg">
                                    <?php if($item->form_follow): ?>
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
                                                        تبليغ الرد
                                                    </option>
                                                    <option
                                                        <?php if($item->form_follow->solve == 2): ?><?php echo e("selected"); ?><?php endif; ?> value="2">
                                                        لم
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
                                                <select id="follow_reason_not" name="follow_reason_not"
                                                        class="form-control"
                                                        style="width: 65% !important;" disabled>
                                                    <option value="">اختر السبب</option>
                                                    <option
                                                        <?php if($item->form_follow->follow_reason_not == "عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة."): ?><?php echo e("selected"); ?><?php endif; ?>
                                                        value="عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل أكثر من مرة.">
                                                        عدم وجود استجابة من مقدم الاقتراح/الشكوى على الاتصال بعد التواصل
                                                        أكثر من
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
                                                        أرقام التواصل المتواجدة غير فعالة لوجود خدمة ما مثل:( لا يمكن
                                                        الوصول
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
                                                <label for="sent_type" class="col-sm-4 col-form-label">التغذية
                                                    الراجعة</label>

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
<?php $__env->stopSection(); ?>

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
        $('#fourth_msg').hide();
        $('#fourth_msg_btn').click(function () {

            $('#fourth_msg').slideToggle("fast", function () {
                if ($('#fourth_msg').is(':hidden')) {
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