<?php $__env->startSection("title", "إضافة متابعة نشر إجراءات النظام"); ?>


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
                                        هذه الواجهة مخصصة لإضافة متابعة نشر إجراءات النظام
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
                                    <td style="font-weight:bold;word-break: normal;">رقم طلب المشروع:</td>
                                    <td><?php echo e($item->project_request); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">اسم المستفيد:</td>
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
                                    <td style="font-weight:bold;word-break: normal;">رمز المشروع:</td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">اسم المشروع:</td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">حالة المشروع:</td>
                                    <td><?php echo e($item->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">منسق المشروع:</td>
                                    <td><?php echo e($item->project_coordinator); ?></td>
                                    <td style="font-weight:bold;word-break: normal;">ممثل المتابعة والتقييم:</td>
                                    <td><?php echo e($item->project_followup); ?></td>
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
                                </tr>
                                <tr>
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
                                    <td style="font-weight:bold;word-break: normal;"></td>
                                    <td></td>
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
                        <div class="card-title">ثانياً: قياس مدى معرفة المستفيدين بنظام الاقتراحات والشكاوى</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/account/system/store_followup_post_system" autocomplete="off">
                        <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($item->citizen_project_id); ?>" name="id">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" style="text-align:right;white-space:normal;">
                                    <thead>
                                    <tr>
                                        <th style="word-break: normal;">#</th>
                                        <th style="word-break: normal;">السؤال</th>
                                        <th style="word-break: normal;">الإجابة</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>1.</td>
                                        <td>هل تم تعريفك بنظام الاقتراحات والشكاوى الخاص بالمشروع؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question1') ? " form-error" : "")); ?>" name="question1" id="question1">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question1') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question1') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                            </select>

                                            <?php echo $errors->first('question1', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question1_note">
                                                <p style="font-weight: bold;color: red;">يرجى القيام بشرح نظام الاقتراحات والشكاوى الخاص بالمشروع بشكل كامل للمستفيد وكيف يمكنه التعامل معه</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td>هل تم تسليمك بروشور الاقتراحات والشكاوى الخاص بالمشروع؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question2') ? " form-error" : "")); ?>" name="question2" id="question2">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question2') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question2') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                            </select>
                                            <?php echo $errors->first('question2', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question2_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">الرجاء التوضيح:</label>
                                                        <input style="width: 75%;" type="text" class="col-sm-9 form-control <?php echo e(($errors->first('question2_note') ? " form-error" : "")); ?>" value="<?php echo e(old('question2_note')); ?>" name="question2_note" id="question2_note_input" />
                                                        <?php echo $errors->first('question2_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3.</td>
                                        <td>هل تعلم كيف يمكنك التقدم باقتراح/شكوى للنظام؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question3') ? " form-error" : "")); ?>" name="question3" id="question3">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question3') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question3') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                            </select>

                                            <?php echo $errors->first('question3', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question3_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-6" style="font-weight: bold;color: red;text-align: right">ما هي القنوات التي يمكنك استخدامها لتقديم الاقتراح/الشكوى؟</label>
                                                        <select style="width: 50%" class="form-control  <?php echo e(($errors->first('question3_note') ? " form-error" : "")); ?>" name="question3_note">
                                                            <option value="">اختر</option>
                                                            <?php $__currentLoopData = $sent_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($sent_type->id); ?>" <?php echo e(old('question3_note') == $sent_type->id ? "selected" : ""); ?> ><?php echo e($sent_type->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php echo $errors->first('question3_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display: none;" id="question31_note">
                                                <p style="font-weight: bold;color: red;">يرجى القيام بشرح قنوات استقبال الاقتراحات والشكاوى المفعلة ضمن هذا المشروع للمستفيد وكيف يمكنه التعامل معها</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>هل ترى صندوق الاقتراحات والشكاوى الخاص في المشروع؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question4') ? " form-error" : "")); ?>" name="question4" id="question4">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question4') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question4') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                                <option <?php echo e(old('question4') == 3 ? "selected" : ""); ?> value="3">الصندوق غير مفعل في المشروع</option>
                                            </select>
                                            <?php echo $errors->first('question4', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question4_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">الرجاء التوضيح:</label>
                                                        <input style="width: 75%;" type="text" class="col-sm-9 form-control <?php echo e(($errors->first('question4_note') ? " form-error" : "")); ?>" value="<?php echo e(old('question4_note')); ?>" name="question4_note" id="question4_note_input" />
                                                        <?php echo $errors->first('question4_note', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5.</td>
                                        <td>هل تعرف أن هناك شخص مسؤول يمكنك التواصل معه مباشرة في حالة الضرورة القصوى؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question5') ? " form-error" : "")); ?>" name="question5" id="question5">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question5') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question5') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                            </select>
                                            <?php echo $errors->first('question5', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6.</td>
                                        <td>هل يوجد لديك أي اقتراح/شكوى تود التحدث عنها لإدارة المشروع؟</td>
                                        <td>
                                            <select class="form-control <?php echo e(($errors->first('question6') ? " form-error" : "")); ?>" name="question6" id="question6">
                                                <option value="">اختر</option>
                                                <option <?php echo e(old('question6') == 1 ? "selected" : ""); ?> value="1">نعم</option>
                                                <option <?php echo e(old('question6') == 2 ? "selected" : ""); ?> value="2">لا</option>
                                            </select>
                                            <?php echo $errors->first('question6', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7.</td>
                                        <td colspan="2">
                                            <div style="text-align: right;font-weight: bold;margin-bottom: 20px;">ملاحظات ذات علاقة:</div>
                                            <div>
                                                <textarea class="form-control <?php echo e(($errors->first('question7') ? " form-error" : "")); ?>" rows="2" name="question7" id="question7"><?php echo e(old('question7')); ?></textarea>
                                                <?php echo $errors->first('question7', '<p class="help-block" style="color:red;">:message</p>'); ?>

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
            $("#question1").on('change', function(){
                if ($('#question1').val() == 2) {
                    $('#question1_note').show();
                    $("#question2").prop('disabled', 'disabled');
                    $("#question3").prop('disabled', 'disabled');
                    $("#question4").prop('disabled', 'disabled');
                    $("#question5").prop('disabled', 'disabled');
                    $("#question6").prop('disabled', '');
                } else {
                    $('#question1_note').hide();
                    $("#question2").prop('disabled', '');
                }
            });

            $("#question2").on('change', function(){
                if ($('#question2').val() == 2) {
                    $('#question2_note').show();
                } else {
                    $('#question2_note').hide();
                }

                $("#question3").prop('disabled', '');
            });

            $("#question3").on('change', function(){
                if ($('#question3').val() == 1) {
                    $('#question3_note').show();
                    $('#question31_note').hide();
                } else {
                    $('#question3_note').hide();
                    $('#question31_note').show();
                }

                $("#question4").prop('disabled', '');
            });

            $("#question4").on('change', function(){
                if ($('#question4').val() == 2) {
                    $('#question4_note').show();
                } else {
                    $('#question4_note').hide();
                }

                $("#question5").prop('disabled', '');
            });

            $("#question5").on('change', function(){
                $("#question6").prop('disabled', '');
            });

            $("#question6").on('change', function(){
                if ($('#question6').val() == 1){
                    window.open('https://maancomplaints.com/citizen/editorcreatcitizen?project_id=<?php echo e($item->project_id); ?>&id_number=<?php echo e($item->id_number); ?>&citizen_id=0&type=1&sent_type=4', '_blank');
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>