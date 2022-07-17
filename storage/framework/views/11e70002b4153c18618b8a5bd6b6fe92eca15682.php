<?php $__env->startSection("title", "إدارة الرسائل النصية (SMS)"); ?>
<?php $__env->startSection('content'); ?>
    <div id="mybody">
            <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في إدارة الرسائل النصية (SMS) المرسلة من خلال النظام
                            </h4>
                            </div>
                        </div>
                         <?php if(check_permission('متابعة رصيد الرسائل النصية (SMS)')): ?>
                        <div class="col-lg-6 col-12 mt-1" align="left">
	                        <a target="_blank" href="https://www.hotsms.ps/portal/user/dashboard" class="btn btn-primary adv-search-btnn">
	                         يمكنك من هنا متابعة رصيد رسائل الموقع
	                         </a>
                        </div>
                         <?php endif; ?>
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
                    <div class="col-md-2 col-2">
                        <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" id="excel_b" value="excel" class="btn btn-primary adv-export-btnn" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
        </div>
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
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="messageType" class="form-control">
                            <option value=""> نوع الرسالة </option>
                            <?php $__currentLoopData = $messagesType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('active')==$messageType->id?"selected":""); ?> value="<?php echo e($messageType->id); ?>"><?php echo e($messageType->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                         <select name="sent_type" class="form-control">
                            <option value="">آلية  الارسال</option>
                            <option value="تلقائي">تلقائي</option>
                            <option value="يدوي">يدوي</option>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="account_id" class="form-control">
                            <option value="" selected>حساب المرسل </option>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 adv-search" style="margin-top: 33px;">
                        <select name="send_status" class="form-control">
                            <option value="">حالة الإرسال</option>
                            <option value="تم الإرسال">تم الإرسال</option>
                            <option value="قيد الإرسال">قيد الإرسال</option>
                            <option value="عالقة">عالقة</option>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">تاريخ إرسال محدد</label>
                        <input type="date" class="form-control" name="datee" value=""
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">من تاريخ إرسال </label>
                        <input type="date" class="form-control" name="from_date"
                               value=""
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="to_date">إلى تاريخ إرسال</label>
                        <input type="date" class="form-control" name="to_date" value=""
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <button type="submit" name="theaction" title="بحث" style="display: block;margin-top:0px;width:110px;margin-top:25px"
                                value="search"
                                class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                              aria-hidden="true"></span>
                            بحث
                        </button>
                </div>
                </div>
            </form>
        </div>

    </div>
    
        <div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <?php if($items): ?>
            <?php if($items->count()>0): ?>
                <table class="table table-hover table-striped" style="width:100% !important;max-width:170% !important;white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                    <th style="max-width: 100px;word-break: normal;">رقم التواصل</th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الرسالة</th>
                    <th style="max-width: 100px;word-break: normal;">حالة الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">توقيت الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">حساب المرسل</th>
                    <th style="max-width: 100px;word-break: normal;"> آلية الإرسال</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-id-<?php echo e($a->id); ?>">
                        <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                        <td style="max-width: 250px;word-break: normal;"><?php echo e($a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->id_number); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->mobile); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->binfit); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->message_type); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->send_status); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->datee); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->timee); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->employee_name); ?></td>
                        <td style="max-width: 100px;word-break: normal;text-align: center;"><?php echo e($a->send_procedure); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
                <div style="float:left"><?php echo e($items->links()); ?> </div>
            <?php else: ?>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>
        <?php else: ?>
            <div class="table-responsive">

            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                    <th style="max-width: 100px;word-break: normal;">رقم التواصل</th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الرسالة</th>
                    <th style="max-width: 100px;word-break: normal;">حالة الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">توقيت الإرسال</th>
                    <th style="max-width: 100px;word-break: normal;">حساب المرسل</th>
                    <th style="max-width: 100px;word-break: normal;"> آلية الإرسال</th>

                </tr>
                </thead>
                <tbody>
                </tbody>
                </table>

            </div>
        <?php endif; ?>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('js'); ?>
            <script src="https://unpkg.com/vue"></script>
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


    </script>
    
    <script>

        jQuery(document).ready(function () {
            jQuery('input').keypress(function (event) {
                var enterOkClass = jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    
    <script>
        $('#excel_b').click(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var uri = window.location.toString();
            var fullUrl = window.location.href;
            if (uri.indexOf("?") > 0) {
                formData += "&theaction=" + encodeURIComponent('excel');
                var finalUrl = fullUrl + "&" + formData;
            } else {
                var finalUrl = fullUrl + "?theaction=excel";
            }

            window.location.href = finalUrl;

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>