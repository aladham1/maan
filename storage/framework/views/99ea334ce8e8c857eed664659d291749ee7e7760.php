<?php $__env->startSection("title", "إرسال الرسائل النصية"); ?>
<?php $__env->startSection("content"); ?>
    <style>
        #confirm_send_message table tr td{
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
        <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form autocomplete="off">
                <div class="row">
                    <div class="col-sm-12">
		<h4>
	                <button type="button" style="margin-left: 10px;" class="btn btn-primary msg-btn add-btn adv-search-btn">
	                    <span class="fa fa-plus fa-2x" aria-hidden="true"></span>
	                </button>
	                        يمكنك استدعاء معلومات الأشخاص المراد إرسال الرسائل النصية لهم من خلال الخيارات التالية:
		</h4>
                	</div>
                </div>
                <div class="row">
                    <div class="col-sm-2 adv-search">
                        <input type="text" class="form-control" name="citizen_id" placeholder="الاسم رباعي" >
                    </div>
                    <div class="col-sm-2 adv-search">
                        <input type="text" class="form-control" name="id_number" placeholder="رقم الهوية" >
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="" >فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0" >مستفيد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code." ".$project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="type" class="form-control">
                            <option value="">التصنيف (اقتراح أو شكوى)</option>
                            <?php $__currentLoopData = $form_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ftype->id != 3): ?>
                                    <option <?php echo e(request('type')==$ftype->id?"selected":""); ?> value="<?php echo e($ftype->id); ?>"><?php echo e($ftype->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="category_id" class="form-control">
                            <option value="" selected>فئة الاقتراح/شكوى</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->id != 1 && $category->id != 2): ?>
                                    <option
                                        <?php if(request('category_id')===''.$category->id): ?>selected
                                        <?php endif; ?>
                                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-2 adv-search" style="margin-top: 33px;">
                        <select name="replay_status" class="form-control">
                            <option value="">حالة تبليغ الرد </option>
                            <option value="2" >تم التبليغ</option>
                            <option value="1">قيد التبليغ</option>
                            <option value="0">لم يتم التبليغ</option>

                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee"  value="<?php echo e(request('datee')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">من تاريخ تسجيل </label>
                        <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                    <button type="submit" name="theaction" value="search" style="width: 110px; margin-top: 25px; display: block;" class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>     بحث    </button>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <form style="margin-bottom: 50px" action="/account/message/send_single_message" method="POST" autocomplete="off" >
            <?php echo csrf_field(); ?>
    <?php if($items): ?>
            <?php if($items->count()>0): ?>
            <table class="table table-hover table-striped" style="width:100% !important;max-width:100% !important;white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="word-break: normal;">
                        <input type="checkbox" id="checkAll" name="checkbox" value="">
                        تحديد الكل
                        </th>
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

                        <tr >
                            <td style="word-break: normal;"><?php echo e($k+1); ?></td>
                            <th style="word-break: normal;">
                                <input type="checkbox" class="checkbox_name" name="mobile[]" value="<?php echo e($a->citizen->mobile.'_'.$a->citizen->id.'_'.$a->id); ?>">
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
                                <td style="max-width: 100px;word-break: normal;"> قيد التبليغ </td>
                            <?php elseif($a->form_status->id == 2): ?>
                                <td style="max-width: 100px;word-break: normal;"> تم التبليغ </td>
                            <?php else: ?>
                                <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ </td>
                            <?php endif; ?>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
            <div style="float:left" ><?php echo e($items->links()); ?> </div>
           
            <?php else: ?>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>
        <?php else: ?>
         <br>
            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="word-break: normal;">
                    <input type="checkbox" id="checkAll" name="checkbox" value="">
                    تحديد الكل
                    </th>
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
                </tbody>
            </table>
        <?php endif; ?>

        <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>

 <br>
        <table class="table table-hover table-bordered">
            <tr>
                <td>عدد الأسماء الذي تم تحديدها ضمن المجموعة:</td>
                <td><label id="count_of_names"></label></td>
                <td>حدد نوع الرسالة المراد إرسالها للمجموعة:</td>
                <td>
                    <select id="message_type_id" name="message_type_id" class="form-control">
                        <option value=""> نوع الرسالة </option>
                        <?php $__currentLoopData = $messagesType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messagetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option  value="<?php echo e($messagetype->id); ?>"><?php echo e($messagetype->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td>إجمالي عدد الرسائل:</td>
                <td><label id="count_of_messages"></label></td>
            </tr>
            <tr>
                <td colspan="6">
                    <?php echo $errors->first('message_type_id', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </td>
            </tr>
        </table>
          <div class="form-group" style="float: left;display: none" id="send_message">
            <input type="submit" class="btn btn-success" name="send"  value="إرسال"/>
        </div>

        <div class="form-group" style="display: none" id="confirm_send_message">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="color: #ed6b75;margin-bottom:10px;">ولأجل استكمال عملية إرسال الرسالة النصية يحب اتباع إجراءات المصادقة عليها من قبل الجهات المختصة بعملية المصادقة قبل الإرسال:</h4>
                </div>
            </div>

            <table class="table table-hover table-bordered">
                <tr>
                    <td>الشخص المخول بعملية  المصادقة:</td>
                    <td><label><?php echo e($account_confirmation->full_name); ?></label></td>
                    <td>مستواه الإداري:</td>
                    <td><?php echo e($account_confirmation->circle->name); ?></td>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" name="confirm"  value="إرسال للمصادقة"/></td>
                </tr>
            </table>
        </div>
    </form>
</div></div></div></div></div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <script src="https://unpkg.com/vue"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

     <script>
        $('.adv-search').hide();
        $('.adv-search-btn').click(function () {

            $('.adv-search').slideToggle("fast", function() {
                if ($('.adv-search').is(':hidden'))
                {
                    $('#searchonly').show();
                }
                else
                {
                    $('#searchonly').hide();
                }
            });
        });
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $('.checkbox_name').click(function() {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes  +'  ' + 'اسم')
        })

        $('#checkAll').click(function() {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes  +'  ' + 'اسم')
        })
    </script>

    <script>


        $("#message_type_id").change(function () {
            var message_type_id = $("#message_type_id").val();
            if(message_type_id == 1 ||  message_type_id == 2){
                $('#send_message').show();
                $('#confirm_send_message').hide();
            }else if(message_type_id > 2){
                $('#send_message').hide();
                $('#confirm_send_message').show();
            }else{
                $('#send_message').hide();
                $('#confirm_send_message').hide();
            }
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/'+ message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType : 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  '+ 'رسالة');
                }
            });
        });

        if($("#message_type_id").val() != ''){
            var message_type_id = $("#message_type_id").val();
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/'+ message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType : 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  '+ 'رسالة');
                }

            });
        }
    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>