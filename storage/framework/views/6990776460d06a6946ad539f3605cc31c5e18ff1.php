<?php $__env->startSection("title", "تعريف الرسائل النصية (SMS)"); ?>
<?php $__env->startSection("content"); ?>
    <div class="col-md-12">
        <h4>هذه الواجهة مخصصة للتحكم في تعريف الرسائل النصية (SMS) في النظام.</h4>
    </div>

    <?php if(check_permission('تعريف الرسالة النصية (SMS)')): ?>
    <div class="col-sm-12">
        <br>
        <button type="button" style="width:50px;margin-left: 10px;" class="btn btn-primary msg-btn">
            <span class="icon-plus" aria-hidden="true"></span>
        </button>
        يمكنك تعريف الرسائل النصية التي يقوم النظام بإرسالها من خلال التالي:
    </div>

    <div class="col-sm-12 msg">
        <br>
        <br>
        <form method="post" action="/account/message/store" autocomplete="off" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="message_name" class="col-form-label">نوع الرسالة: </label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control <?php echo e(($errors->first('name') ? " form-error" : "")); ?>" value="" id="name" name="name">
                    <?php echo $errors->first('name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="text" class="col-form-label">نص الرسالة:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control <?php echo e(($errors->first('text') ? " form-error" : "")); ?>" onkeyup="countChar(this);" value="" id="message_text" name="text">
                    <?php echo $errors->first('text', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>

            </div>














            <br>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="" class="col-form-label">تفاصيل ذات علاقة بحجم الرسالة:</label>
                </div>

                <div class="col-sm-2" style="margin-right: 15px;margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid red;">
                    <label for="Remaining_letters" class="col-form-label">عدد الرسائل :</label>
                    <span id="count_of_letter" style="color:red;" name="count_of_letter">0</span>
                    <input type="hidden" id="hidden_count_of_letter" name="count_of_letter">
                </div>

                <div class="col-sm-2" style="margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid gray;">
                    <label for="Remaining_letters" class="col-form-label">الحروف المتبقية :</label>
                    <span id="charNum" style="color:red;" name="Remaining_letters">0</span>
                    <input type="hidden"  id="hidden_Remaining_letters" name="Remaining_letters">
                </div>

                <div class="col-sm-2" style="margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid yellow;">
                    <label for="consumed_letters" class="col-form-label">الحروف المستهلكة :</label>
                    <span id="count_of_letters" style="color:red;" name="consumed_letters">0</span>
                    <input type="hidden"  id="hidden_consumed_letters" name="consumed_letters">

                </div>

            </div>
            <br>
            <div class="form-group row" style="float:left;margin-bottom: 10px;">
                <input type="submit" class="btn btn-success" value="إضافة"/>
                <a href="events" class="btn btn-light">إلغاء الأمر</a>
            </div>
        </form>
    </div>

    <div class="clearfix"></div>
    <br><hr>
    <?php endif; ?>

    <?php if($items): ?>
        <?php if($items->count()>0): ?>

            <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 30px;word-break: normal;">#</th>
                        <th style="max-width: 100px;word-break: normal;">نوع الرسالة</th>
                        <th style="max-width: 200px;word-break: normal;"> نص رسالة</th>
                        <th style="word-break: normal;" colspan="3">تفاصيل ذات علاقة بالرسالة</th>
                        <th style="word-break: normal;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($a->id): ?>
                            <tr>
                                <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                                <td style="word-break: normal;"><?php echo e($a->name); ?></td>
                                <td style="max-width:200px;word-break: normal;"><?php echo e($a->text); ?></td>
                                <td style="word-break: normal;" colspan="3">
                                    <div class="col-sm-3" style="margin-right: 15px;margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid red;">
                                        <label for="Remaining_letters" class="col-form-label">عدد الرسائل :</label>
                                        <span id="count_of_letter" style="color:red;" name="count_of_letter"><?php echo e($a->count_of_letter); ?></span>
                                    </div>

                                    <div class="col-sm-3" style="margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid gray;">
                                        <label for="Remaining_letters" class="col-form-label">الحروف المتبقية :</label>
                                        <span id="charNum" style="color:red;" name="Remaining_letters"><?php echo e($a->Remaining_letters); ?></span>
                                    </div>

                                    <div class="col-sm-4" style="margin-left: 10px;padding:5px;border-radius: 5px;border: 1px solid yellow;">
                                        <label for="consumed_letters" class="col-form-label">الحروف المستهلكة :</label>
                                        <span id="count_of_letters" style="color:red;" name="consumed_letters"><?php echo e($a->consumed_letters); ?></span>

                                    </div>
                                </td>

                                <td>
                                    <?php if(Auth::user()->account->circle_id==1): ?>

                                        <?php if(check_permission('تعديل الرسالة النصية (SMS)')): ?>
                                        <a class="btn btn-xs btn-primary" title="تعديل"
                                           href="/account/message/edit/<?php echo e($a->id); ?>"><i class="fa fa-edit"></i></a>

                                        <?php endif; ?>

                                            <?php if(check_permission('حذف الرسالة النصية (SMS)')): ?>
                                                <a class="btn btn-xs Confirm btn-danger"
                                           href="/account/message/delete/<?php echo e($a->id); ?>"><i
                                                class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <br>
            <br>
        <?php else: ?>
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        <?php endif; ?>
    <?php else: ?>
        <br>
        <br>
        <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 30px;word-break: normal;">#</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الرسالة</th>
                    <th style="max-width: 100px;word-break: normal;"> نص رسالة</th>
                    <th style="word-break: normal;" colspan="2">تفاصيل ذات علاقة بالرسالة</th>
                </tr>
                </thead>
            </table>
    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://unpkg.com/vue"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>
        $('.msg').hide();
        $('.msg-btn').click(function () {

            $('.msg').slideToggle("fast", function () {
                if ($('.msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });


    </script>
    <script>
        function countChar(val) {
            var message = 70;
            var len = val.value.length;
            $('#count_of_letters').text(len);
            $('#hidden_consumed_letters').val(len);
            if(len <= message && len != 0){
                $('#count_of_letter').text(1);
                $('#hidden_count_of_letter').val(1);
                $('#charNum').text(message - len);
                $('#hidden_Remaining_letters').val(message - len);
            }else if(len <= message*2 && len != 0){
                $('#count_of_letter').text(2);
                $('#hidden_count_of_letter').val(2);
                $('#charNum').text(message*2 - len);
                $('#hidden_Remaining_letters').val(message*2 - len);
            }else if(len <= message*3 && len != 0){
                $('#count_of_letter').text(3);
                $('#hidden_count_of_letter').val(3);
                $('#charNum').text(message*3 - len);
                $('#hidden_Remaining_letters').val(message*3 - len);
            }else{
                $('#count_of_letter').text(4);
                $('#hidden_count_of_letter').val(4);
                $('#charNum').text(message*4 - len);
                $('#hidden_Remaining_letters').val(message*4 - len);
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>