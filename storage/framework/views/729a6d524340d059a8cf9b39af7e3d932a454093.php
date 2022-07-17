<?php $__env->startSection("title", "تعديل متابعة دقة البيانات المسجلة على النظام"); ?>


<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card card-border">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row pb-50">
                            <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                                <div>
                                    <h4 class="page-title text-bold-500 mb-25">
                                        هذه الواجهة مخصصة لتعديل متابعة دقة البيانات المسجلة على النظام
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="card-title">أولاً: معلومات عامة</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered"
                                   style="text-align:right;white-space:normal;">
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">الرقم المرجعي:</td>
                                    <td><?php echo e($item->accuracy_form_id); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">الاسم رباعي:</td>
                                    <td><?php echo e($item->first_name." ".$item->father_name." ".$item->grandfather_name." ".$item->last_name); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">رقم الهوية:</td>
                                    <td><?php echo e($item->id_number); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">المحافظة:</td>
                                    <td><?php echo e($item->governorate); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">رقم التواصل (1):</td>
                                    <td><?php echo e($item->mobile); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">رقم التواصل (2):</td>
                                    <td><?php echo e($item->mobile2); ?></td>
                                </tr>
                                <tr>

                                    <td style="font-weight:bold;word-break: normal;">فئة مقدم الاقتراح /الشكوى:</td>
                                    <td><?php echo e($item->project_accuracy_id == 1 ? 'غير مستفيد' : ' مستفيد'); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">رمز المشروع:</td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">اسم المشروع:</td>
                                    <td><?php echo e($item->name); ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">حالة المشروع:</td>
                                    <td><?php echo e($item->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">منسق المشروع:</td>
                                    <td><?php echo e($item->project_coordinator); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">ممثل المتابعة والتقييم:</td>
                                    <td><?php echo e($item->project_followup); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">حالة التقدم باقتراح/شكوى:</td>
                                    <td>
                                        <?php if($item->progress_status == 1): ?>
                                            <?php echo e('اقتراح'); ?>

                                        <?php elseif($item->progress_status == 1): ?>
                                            <?php echo e('شكوى'); ?>

                                        <?php else: ?>
                                            <?php echo e('لا يوجد'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:bold;word-break: normal;">حالة المتابعة:</td>
                                    <td>
                                        <?php if($item->status): ?>
                                            <?php echo e('تمت'); ?>

                                        <?php else: ?>
                                            <?php echo e('لم تتم'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:bold;word-break: normal;">تاريخ المتابعة:</td>
                                    <td>
                                        <?php if($item->datee): ?>
                                            <?php echo e($item->datee); ?>

                                        <?php else: ?>
                                            <?php echo e('_'); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="card-title">ثانياً: قياس مدى دقة بيانات الاقتراحات والشكاوى المسجلة على النظام</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/account/system/update_accuracy_system" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($item->accuracy_form_id); ?>" name="id">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered"
                                       style="text-align:right;white-space:normal;">
                                    <thead>
                                    <tr>
                                        <th style="word-break: normal;">#</th>
                                        <th style="word-break: normal;">البند</th>
                                        <th style="word-break: normal;">البيانات المسجلة على النظام</th>
                                        <th style="word-break: normal;">مدى مطابقته للبيانات المسجلة على النظام</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>1.</td>
                                        <td>حالة التقدم باقتراح/شكوى:</td>
                                        <td><?php echo e($item->form_type_name); ?></td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question1') ? " form-error" : "")); ?>"
                                                name="question1" id="question1">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question1 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                </option>
                                                <option <?php echo e($item->question1 == 2 ? "selected" : ""); ?> value="2">غير
                                                    مطابق
                                                </option>
                                            </select>

                                            <?php echo $errors->first('question1', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question1_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3"
                                                               style="font-weight: bold;color: red;text-align: right">الرجاء
                                                            التوضيح:</label>
                                                        <input style="width: 75%;" type="text"
                                                               class="col-sm-9 form-control <?php echo e(($errors->first('question1_note') ? " form-error" : "")); ?>"
                                                               value="<?php echo e($item->question1_note); ?>" name="question1_note"
                                                               id="question1_note_input"/>
                                                        <?php echo $errors->first('question1_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td>قناة استقبال الاقتراح/الشكوى:</td>
                                        <td><?php echo e($item->sent_type_name); ?></td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question2') ? " form-error" : "")); ?>"
                                                name="question2" id="question2">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question2 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                </option>
                                                <option <?php echo e($item->question2 == 2 ? "selected" : ""); ?> value="2">غير
                                                    مطابق
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question2', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question2_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-6"
                                                               style="font-weight: bold;color: red;text-align: right">ما
                                                            هي القناة التي قمت من خلالها تقديم الاقتراح/الشكوى؟</label>
                                                        <select style="width: 50%"
                                                                class="form-control  <?php echo e(($errors->first('question2_note') ? " form-error" : "")); ?>"
                                                                name="question2_note">
                                                            <option value="">اختر</option>
                                                            <?php $__currentLoopData = $sent_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    value="<?php echo e($sent_type->id); ?>" <?php echo e($item->question2_note == $sent_type->id ? "selected" : ""); ?> ><?php echo e($sent_type->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php echo $errors->first('question2_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3.</td>
                                        <td>موضوع الاقتراح/الشكوى:</td>
                                        <td><?php echo e($item->content); ?></td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question3') ? " form-error" : "")); ?>"
                                                name="question3" id="question3">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question3 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                    بشكل كلي
                                                </option>
                                                <option <?php echo e($item->question3 == 2 ? "selected" : ""); ?> value="2">مطابق
                                                    بشكل جزئي
                                                </option>
                                                <option <?php echo e($item->question3 == 3 ? "selected" : ""); ?> value="3">غير
                                                    مطابق
                                                </option>
                                            </select>

                                            <?php echo $errors->first('question3', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question3_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3"
                                                               style="font-weight: bold;color: red;text-align: right">ما
                                                            هو موضوع اقتراحك/شكوتك؟</label>
                                                        <input style="width: 75%;" type="text"
                                                               class="col-sm-9 form-control <?php echo e(($errors->first('question3_note') ? " form-error" : "")); ?>"
                                                               value="<?php echo e($item->question3_note); ?>" name="question3_note"
                                                               id="question3_note_input"/>
                                                        <?php echo $errors->first('question3_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>حالة تبليغ الرد:</td>

                                        <?php if($item->form_follow_id && $item->form_follow_solve == 2): ?>
                                            <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ</td>
                                        <?php elseif($item->form_follow_id && $item->form_follow_solve == 1): ?>
                                            <td style="max-width: 100px;word-break: normal;"> تم التبليغ</td>
                                        <?php else: ?>
                                            <td style="max-width: 100px;word-break: normal;"> قيد التبليغ</td>

                                        <?php endif; ?>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question4') ? " form-error" : "")); ?>"
                                                name="question4" id="question4">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question4 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                </option>
                                                <option <?php echo e($item->question4 == 2 ? "selected" : ""); ?> value="2">غير
                                                    مطابق
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question4', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question4_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3"
                                                               style="font-weight: bold;color: red;text-align: right">الرجاء
                                                            التوضيح:</label>
                                                        <input style="width: 75%;" type="text"
                                                               class="col-sm-9 form-control <?php echo e(($errors->first('question4_note') ? " form-error" : "")); ?>"
                                                               value="<?php echo e($item->question4_note); ?>" name="question4_note"
                                                               id="question4_note_input"/>
                                                        <?php echo $errors->first('question4_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5.</td>
                                        <td>تاريخ تبليغ الرد:</td>
                                        <td><?php echo e($item->follow_datee); ?></td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question5') ? " form-error" : "")); ?>"
                                                name="question5" id="question5">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question5 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                </option>
                                                <option <?php echo e($item->question5 == 2 ? "selected" : ""); ?> value="2">غير
                                                    مطابق
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question5', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question5_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3"
                                                               style="font-weight: bold;color: red;text-align: right">ما
                                                            هو التاريخ الذي تلقيت فيه الرد؟</label>
                                                        <input style="width: 75%;" type="date"
                                                               class="col-sm-9 form-control <?php echo e(($errors->first('question5_note') ? " form-error" : "")); ?>"
                                                               value="<?php echo e($item->question5_note); ?>" name="question5_note"
                                                               id="question5_note_input"/>
                                                        <?php echo $errors->first('question5_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6.</td>
                                        <td>الرد النهائي على الاقتراح/الشكوى:</td>
                                        <td><?php echo e($item->response); ?></td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question6') ? " form-error" : "")); ?>"
                                                name="question6" id="question6">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question6 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                    بشكل كلي
                                                </option>
                                                <option <?php echo e($item->question6 == 2 ? "selected" : ""); ?> value="2">مطابق
                                                    بشكل جزئي
                                                </option>
                                                <option <?php echo e($item->question6 == 3 ? "selected" : ""); ?> value="3">غير
                                                    مطابق
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question6', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question6_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3"
                                                               style="font-weight: bold;color: red;text-align: right">ما
                                                            هو الرد الذي تلقيته على اقتراحك/شكوتك؟</label>
                                                        <input style="width: 75%;" type="date"
                                                               class="col-sm-9 form-control <?php echo e(($errors->first('question6_note') ? " form-error" : "")); ?>"
                                                               value="<?php echo e($item->question6_note); ?>" name="question6_note"
                                                               id="question6_note_input"/>
                                                        <?php echo $errors->first('question6_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7.</td>
                                        <td>التغذية الراجعة:</td>
                                        <?php if($item->form_follow_id &&  $item->form_follow_evaluate): ?>
                                            <?php if($item->form_follow_evaluate == 1): ?>
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل كبير</td>
                                            <?php elseif($item->form_follow_evaluate==2): ?>
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل متوسط</td>
                                            <?php elseif($item->form_follow_evaluate == 3): ?>
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل ضعيف</td>
                                            <?php else: ?>
                                                <td style="max-width: 100px;word-break: normal;"> غير راضي عن الرد</td>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <td style="max-width: 100px;word-break: normal;">لا يوجد رد</td>
                                        <?php endif; ?>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question7') ? " form-error" : "")); ?>"
                                                name="question7" id="question7">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question7 == 1 ? "selected" : ""); ?> value="1">مطابق
                                                </option>
                                                <option <?php echo e($item->question7 == 2 ? "selected" : ""); ?> value="2">غير
                                                    مطابق
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question7', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question7_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-6"
                                                               style="font-weight: bold;color: red;text-align: right">ما
                                                            هي القناة التي قمت من خلالها تقديم الاقتراح/الشكوى؟</label>
                                                        <select style="width: 50%"
                                                                class="form-control  <?php echo e(($errors->first('question7_note') ? " form-error" : "")); ?>"
                                                                name="question7_note">
                                                            <option value="">التغذية الراجعة</option>
                                                            <option value="4">غير راضي عن الرد</option>
                                                            <option value="3">راضي بشكل ضعيف</option>
                                                            <option value="2">راضي بشكل متوسط</option>
                                                            <option value="1">راضي بشكل كبير</option>
                                                        </select>
                                                        <?php echo $errors->first('question7_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>8.</td>
                                        <td colspan="2">هل يوجد لديك أي اقتراح/شكوى تود التحدث عنها لإدارة المشروع؟</td>
                                        <td>
                                            <select
                                                class="form-control <?php echo e(($errors->first('question8') ? " form-error" : "")); ?>"
                                                name="question8" id="question8">
                                                <option value="">اختر</option>
                                                <option <?php echo e($item->question8 == 1 ? "selected" : ""); ?> value="1">نعم
                                                </option>
                                                <option <?php echo e($item->question8 == 2 ? "selected" : ""); ?> value="2">لا
                                                </option>
                                            </select>
                                            <?php echo $errors->first('question8', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>9.</td>
                                        <td colspan="3">
                                            <div style="text-align: right;font-weight: bold;margin-bottom: 20px;">
                                                ملاحظات ذات علاقة:
                                            </div>
                                            <div>
                                                <textarea
                                                    class="form-control <?php echo e(($errors->first('question9') ? " form-error" : "")); ?>"
                                                    rows="2" name="question9"
                                                    id="question9"><?php echo e($item->question9); ?></textarea>
                                                <?php echo $errors->first('question9', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 col-sm-offset-9" style="text-align: left;">
                                    <input type="submit" class="btn btn-success" value="حفظ"/>
                                    <a href="/account/project" class="btn btn-light">إلغاء الأمر</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            $("#question2").prop('disabled', 'disabled');
            $("#question3").prop('disabled', 'disabled');
            $("#question4").prop('disabled', 'disabled');
            $("#question5").prop('disabled', 'disabled');
            $("#question6").prop('disabled', 'disabled');
            $("#question7").prop('disabled', 'disabled');
            $("#question8").prop('disabled', 'disabled');

            $("#question1").on('change', function () {
                if ($('#question1').val() == 2) {
                    $('#question1_note').show();
                    $("#question2").prop('disabled', 'disabled');
                    $("#question3").prop('disabled', 'disabled');
                    $("#question4").prop('disabled', 'disabled');
                    $("#question5").prop('disabled', 'disabled');
                    $("#question6").prop('disabled', 'disabled');
                    $("#question7").prop('disabled', 'disabled');
                    $("#question8").prop('disabled', '');
                } else {
                    $('#question1_note').hide();
                    $("#question2").prop('disabled', '');
                }
            });

            $("#question2").on('change', function () {
                if ($('#question2').val() == 2) {
                    $('#question2_note').show();
                } else {
                    $('#question2_note').hide();
                }

                $("#question3").prop('disabled', '');
            });

            $("#question3").on('change', function () {
                if ($('#question3').val() == 1) {
                    $('#question3_note').show();
                } else {
                    $('#question3_note').hide();
                }

                $("#question4").prop('disabled', '');
            });

            $("#question4").on('change', function () {
                if ($('#question4').val() == 2) {
                    $('#question4_note').show();
                    $("#question5").prop('disabled', 'disabled');
                    $("#question8").prop('disabled', '');
                } else {
                    $('#question4_note').hide();
                    $("#question5").prop('disabled', '');
                }
            });

            $("#question5").on('change', function () {
                if ($('#question5').val() == 2) {
                    $('#question5_note').show();
                } else {
                    $('#question5_note').hide();
                }
                $("#question6").prop('disabled', '');
            });

            $("#question6").on('change', function () {
                if ($('#question6').val() == 1) {
                    $('#question6_note').show();
                } else {
                    $('#question6_note').hide();
                }
                $("#question7").prop('disabled', '');
            });

            $("#question7").on('change', function () {
                if ($('#question7').val() == 2) {
                    $('#question7_note').show();
                } else {
                    $('#question7_note').hide();
                }
                $("#question8").prop('disabled', '');
            });


            $("#question8").on('change', function () {
                if ($('#question8').val() == 1) {
                    window.open('https://maancomplaints.com/citizen/editorcreatcitizen?project_id=<?php echo e($item->project_id); ?>&id_number=<?php echo e($item->id_number); ?>&citizen_id=0&type=1&sent_type=4', '_blank');
                }
            });

            //


            if ($('#question1').val() == 2) {
                $('#question1_note').show();
                $("#question2").prop('disabled', 'disabled');
                $("#question3").prop('disabled', 'disabled');
                $("#question4").prop('disabled', 'disabled');
                $("#question5").prop('disabled', 'disabled');
                $("#question6").prop('disabled', 'disabled');
                $("#question7").prop('disabled', 'disabled');
                $("#question8").prop('disabled', '');
            } else {
                $('#question1_note').hide();
                $("#question2").prop('disabled', '');
            }


            if ($('#question2').val() == 2) {
                $('#question2_note').show();
                $("#question3").prop('disabled', '');
            } else {
                $('#question2_note').hide();
                $("#question3").prop('disabled', '');
            }


            if ($('#question3').val() == 1) {
                $('#question3_note').show();
                $("#question4").prop('disabled', '');
            } else {
                $('#question3_note').hide();
                $("#question4").prop('disabled', '');
            }


            if ($('#question4').val() == 2) {
                $('#question4_note').show();
                $("#question5").prop('disabled', 'disabled');
                $("#question8").prop('disabled', '');
            } else {
                $('#question4_note').hide();
                $("#question5").prop('disabled', '');
            }


            if ($('#question5').val() == 2) {
                $('#question5_note').show();
                $("#question6").prop('disabled', '');
            } else {
                $('#question5_note').hide();
                $("#question6").prop('disabled', '');
            }


            if ($('#question6').val() == 1) {
                $('#question6_note').show();
                $("#question7").prop('disabled', '');
            } else {
                $('#question6_note').hide();
                $("#question7").prop('disabled', '');
            }


            if ($('#question7').val() == 2) {
                $('#question7_note').show();
                $("#question8").prop('disabled', '');
            } else {
                $('#question7_note').hide();
                $("#question8").prop('disabled', '');
            }


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>