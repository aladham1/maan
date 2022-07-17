<?php $__env->startSection("title", "  الاقتراحات والشكاوى الخاصة بحساب الموظف $item->full_name    "); ?>


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
هذه الواجهة مخصصة للتحكم في إدارة الاقتراحات والشكاوى التي تقع ضمن مسؤولية صاحب
                الحساب
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

            <form>
                <div class="row">

                    <div class="col-md-2 col-2">
                        <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-dden="true"></span>
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
                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="form_id" placeholder="الرقم المرجعي">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="citizen_id"
                               placeholder="اسم مقدم الاقتراح / الشكوي">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="id_number" placeholder="رقم الهوية">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="">فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0">مستفد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <option value="-1" <?php if(request('project_id')==='-1'): ?>selected
                                <?php endif; ?>>جميع المشاريع
                            </option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code." ".$project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="active" class="form-control">
                            <option value=""> حالة المشروع</option>
                            <?php $__currentLoopData = $project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('active')==$pstatus->id?"selected":""); ?> value="<?php echo e($pstatus->id); ?>"><?php echo e($pstatus->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="sent_type" class="form-control">

                            <option value="">قناة الاستقبال</option>
                            <?php $__currentLoopData = $sent_typee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('sent_type')==$sent_type->id?"selected":""); ?> value="<?php echo e($sent_type->id); ?>"><?php echo e($sent_type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="type" class="form-control">
                            <option value="">التصنيف (اقتراح أو شكوى)</option>
                            <?php $__currentLoopData = $form_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ftype->id != 3): ?>
                                    <option
                                        <?php echo e(request('type')==$ftype->id?"selected":""); ?> value="<?php echo e($ftype->id); ?>"><?php echo e($ftype->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 adv-search">
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
                    <div class="col-sm-3 adv-search">
                        <select name="status" class="form-control">
                            <option value="">حالة الرد</option>
                            <?php $__currentLoopData = $form_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($fstatus->id != 3 && $fstatus->id != 4 && $fstatus->id != 5): ?>

                                    <?php echo e($fstatus->name = 'لم يتم الرد'); ?>

                                    <option <?php echo e(request('status')==$fstatus->id?"selected":""); ?> value="<?php echo e($fstatus->id); ?>">
                                        <?php if($fstatus->id == 1): ?>
                                            قيد الدراسة
                                        <?php else: ?>
                                            تم الرد
                                        <?php endif; ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="replay_status" class="form-control">
                            <option value="">حالة تبليغ الرد</option>
                            <option value="1">تم التبليغ</option>
                            <option value="0">قيد التبليغ</option>
                            <option value="2">لم يتم التبليغ</option>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="evaluate" class="form-control">
                            <option value="">التغذية الراجعة</option>
                            <option value="4">غير راضي عن الرد</option>
                            <option value="3">راضي بشكل ضعيف</option>
                            <option value="2">راضي بشكل متوسط</option>
                            <option value="1">راضي بشكل كبير</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee" value="<?php echo e(request('datee')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ تسجيل </label>
                        <input type="date" class="form-control" name="from_date"
                               value="<?php echo e(request('from_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                     <div  class="form-group adv-searchh" style="margin-left: 20px;margin-top:20px;">

                
                        
                        <button type="submit" name="theaction" value="search" style="width:110px;margin-top:0px"
                    class="btn btn-primary adv-searchh noEnterSubmit"><span class="glyphicon glyphicon-search"
                                                              aria-hidden="true"></span>     بحث    </button>
                    </div>
                     </div>
                </div>
            </form>

<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
        <?php if($items->count()>0): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped"
                       style="width:170% !important;max-width:170% !important;white-space:normal;">
                    <thead>
                    <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الرقم
                            المرجعي
                        </th>
                        <th style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الاسم رباعي</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                            الهوية
                        </th>
                        <th style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">فئة مقدم
                            الاقتراح/الشكوى
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                            المشروع
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                            المشروع
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">قناة
                            الاستقبال
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            النوع
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">فئة
                            الاقتراح/ الشكوى
                        </th>
                        <th style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">تاريخ تسجيل
                            الاقتراح/الشكوى
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                            الرد
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                            تبليغ الرد
                        </th>
                        <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                        <th style="white-space:normal;">معاينة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::user()->account->projects->contains($a->project->id)): ?>
                            <tr>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($index + 1); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->id); ?></td>
                                <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->citizen->id_number); ?></td>
                                <td style="max-width: 150px;word-break: normal;;"><?php echo e($a->project->id == 1 ? 'غير مستفيد' : ' مستفيد'); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->name); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->project->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                                <td style="word-break: normal;"> <?php echo e($a->sent_typee->name); ?></td>
                                <td style="white-space:nowrap;"><?php echo e($a->form_type->name); ?></td>
                                <?php if($type!=2 && $type!=3): ?>
                                    <td style="max-width: 400px;word-break: normal;padding-left: 0px;padding-right: 0px">
                                        <?php echo e($a->category->name); ?>

                                    </td>
                                <?php endif; ?>

                                <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->datee); ?></td>

                                <?php if($a->form_follow && $a->form_response->response): ?>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                        تم الرد
                                    </td>
                                <?php else: ?>
                                    <td style="max-width: 100px;word-break: normal;">قيد الدراسة</td>
                                <?php endif; ?>

                                <?php if($a->form_follow && $a->form_follow->solve == 2): ?>
                                    <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ</td>
                                <?php elseif($a->form_follow && $a->form_follow->solve == 1): ?>
                                    <td style="max-width: 100px;word-break: normal;"> تم التبليغ</td>
                                <?php else: ?>
                                    <td style="max-width: 100px;word-break: normal;"> قيد التبليغ</td>
                                <?php endif; ?>

                                <?php if($a->form_follow &&  $a->form_follow->evaluate): ?>
                                    <?php if($a->form_follow->evaluate == 1): ?>
                                        <td style="max-width: 100px;word-break: normal;"> راضي بشكل كبير</td>
                                    <?php elseif($a->form_follow->evaluate==2): ?>
                                        <td style="max-width: 100px;word-break: normal;"> راضي بشكل متوسط</td>
                                    <?php elseif($a->form_follow->evaluate == 3): ?>
                                        <td style="max-width: 100px;word-break: normal;"> راضي بشكل ضعيف</td>
                                    <?php else: ?>
                                        <td style="max-width: 100px;word-break: normal;"> غير راضي عن الرد</td>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <td style="max-width: 100px;word-break: normal;">لا يوجد رد</td>
                                <?php endif; ?>

                                <td><a target="_blank" class="btn btn-xs btn-primary" title="عرض"
                                       href="/citizen/form/show/<?php echo e($a->citizen->id_number); ?>/<?php echo e($a->id); ?>"><i
                                            class="glyphicon glyphicon-eye-open"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div style="float:left">  <?php echo e($items->links()); ?> </div>
        <?php else: ?>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        <?php endif; ?>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الرقم
                        المرجعي
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الاسم
                        رباعي
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                        الهوية
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">فئة مقدم
                        الاقتراح/الشكوى
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                        المشروع
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                        المشروع
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">قناة
                        الاستقبال
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">النوع
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;word-break: normal;">فئة
                        الاقتراح/ الشكوى
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;word-break: normal;">تاريخ
                        تسجيل الاقتراح/الشكوى
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                        الرد
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">حالة
                        تبليغ الرد
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                    <th style="white-space:normal;">معاينة</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    <?php endif; ?>
    <div class="form-group row" style="margin-top:15px;" align="left">
        <div class="col-sm-12">
           <a href="/account/account" class="btn btn-light">إلغاء الأمر</a></a>
        </div>
    </div>

  </div>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>