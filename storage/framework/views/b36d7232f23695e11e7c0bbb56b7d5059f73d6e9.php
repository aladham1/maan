<?php $__env->startSection("title", "إرسال الرسائل النصية بعد المصادقة"); ?>
<?php $__env->startSection("content"); ?>
    <style>
        #confirm_send_message table tr td {
            vertical-align: middle;
        }
    </style>
         <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في إرسال الرسائل النصية (SMS) من خلال النظام
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
  <div class="col-xl-12 col-md-12 col-sm-12">
    <div class="card card-table">
        <div class="card-body">
    <form style="margin-bottom: 50px" action="/account/message/send_single_message" method="POST" autocomplete="off">
        <?php echo csrf_field(); ?>
        <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <?php if($items): ?>
            <?php if($items->count()>0): ?>
                    <div class="table-responsive">

                <table class="table table-hover table-striped"
                       style="width:100% !important;max-width:100% !important;white-space:normal;">
                    <thead>
                    <tr>
                        <th style="word-break: normal;">#</th>
                        <th style="word-break: normal;">
                        <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                        <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                        <th style="max-width: 100px;word-break: normal;">رقم التواصل</th>
                        <th style="max-width: 100px;word-break: normal;">فئة المواطن</th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">اقتراح/شكوى</th>
                        <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ التسجيل</th>
                        <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="word-break: normal;"><?php echo e($k+1); ?></td>
                            <th style="word-break: normal;">
                                <input type="checkbox" class="checkbox_name" checked name="mobile[]"
                                       value="<?php echo e($a->citizen->mobile); ?>" readonly>
                                <input type="hidden" name="citizen_id[]" value="<?php echo e($a->citizen->id); ?>">
                                <input type="hidden" name="form_id[]" value="<?php echo e($a->id); ?>">
                            </th>

                            <td style="max-width: 250px;word-break: normal;"><?php echo e($a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->citizen->id_number); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->citizen->mobile); ?></td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->binfit <= now() ?  'مستفيد' : 'غير مستفيد'); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->form_type->name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"> <?php echo e($a->category->main_category); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->datee); ?></td>


                            <?php if($a->form_status->id == 1): ?>
                                <td style="max-width: 100px;word-break: normal;"> قيد التبليغ</td>
                            <?php elseif($a->form_status->id == 2): ?>
                                <td style="max-width: 100px;word-break: normal;"> تم التبليغ</td>
                            <?php else: ?>
                                <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ</td>
                            <?php endif; ?>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
                </div>
                <br>
                <div style="float:left"><?php echo e($items->links()); ?> </div>
                <br>
            <?php else: ?>
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="table-responsive">

        <table class="table table-hover table-bordered">
            <tr>
                <td>عدد الأسماء الذي تم تحديدها ضمن المجموعة:</td>
                <td><label id="count_of_names"><?php echo e($sms->count()); ?></label></td>
                <td>حدد نوع الرسالة المراد إرسالها للمجموعة:</td>
                <td>
                    <select id="message_type_id" name="message_type_id" class="form-control">
                        <option value=""> نوع الرسالة</option>
                        <option value="<?php echo e($sms->first()->message_type->id); ?>"
                                selected> <?php echo e($sms->first()->message_type->name); ?> </option>
                    </select>
                </td>
                <td>إجمالي عدد الرسائل:</td>
                <td><label
                        id="count_of_messages"><?php echo e(($sms->first()->message_type->count_of_letter)*($sms->count())); ?></label>
                </td>
            </tr>
        </table>
        </div>
        <br>

        <?php if(!is_null($sms->first()->objection_send_message )): ?>
        <div class="table-responsive">

            <table class="table table-hover table-bordered">
                <tr>
                    <td>الشخص المخول بعملية المصادقة:</td>
                    <td><label><?php echo e($sms->first()->user_confirmation->full_name); ?></label></td>
                    <td>مستواه الإداري:</td>
                    <td><?php echo e($sms->first()->user_confirmation->circle->name); ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <h4>وفيما يلي نتيجة المصادقة من قبل الجهة المختصة على إرسال الرسالة: </h4>
                </div>
            </div>
            </div>
            <br>
            <div class="table-responsive">

            <table class="table table-hover table-striped"
                   style="width:100% !important;max-width:100% !important;white-space:normal;">
                <tr>
                    <td>هل يوجد اعتراض على إرسال الرسالة النصية؟</td>
                    <td><?php if($sms->first()->objection_send_message == 1): ?><?php echo e('نعم'); ?><?php else: ?><?php echo e('لا'); ?> <?php endif; ?></td>
                    <td>سبب الاعتراض:</td>
                    <td><?php echo e($sms->first()->reason_objection_send_message); ?></td>
                </tr>

                <tr>
                    <td>هل يوجد اعتراض على نص الرسالة؟</td>
                    <td><?php if($sms->first()->objection_text_message == 1): ?><?php echo e('نعم'); ?><?php else: ?><?php echo e('لا'); ?> <?php endif; ?></td>
                    <td>نص الرسالة المعدل:</td>
                    <td><?php echo e($sms->first()->reason_objection_text_message); ?></td>
                </tr>
            </table>
	</div>
            <?php if($sms->first()->objection_send_message == 0 && $sms->first()->objection_text_message == 0): ?>
                <div class="form-group row" style="float:left;margin-bottom: 10px;">
                    <input type="submit" name="send" class="btn btn-success" value="إرسال"/>
                    <a href="message" class="btn btn-light">إلغاء الأمر</a>
                </div>
            <?php endif; ?>

        <?php endif; ?>
</div></div>
    </form>
</div></div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <script src="https://unpkg.com/vue"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        $('.adv-search').hide();
        $('.adv-search-btn').click(function () {

            $('.adv-search').slideToggle("fast", function () {
                if ($('.adv-search').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $('.checkbox_name').click(function () {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes + '  ' + 'اسم')
        })
    </script>

    <script>


        $("#message_type_id").change(function () {
            var message_type_id = $("#message_type_id").val();
            if (message_type_id == 1 || message_type_id == 2) {
                $('#send_message').show();
                $('#confirm_send_message').hide();
            } else if (message_type_id > 2) {
                $('#send_message').hide();
                $('#confirm_send_message').show();
            } else {
                $('#send_message').hide();
                $('#confirm_send_message').hide();
            }
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/' + message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType: 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  ' + 'رسالة');
                }
            });
        });

        if ($("#message_type_id").val() != '') {
            var message_type_id = $("#message_type_id").val();
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/' + message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType: 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  ' + 'رسالة');
                }

            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>