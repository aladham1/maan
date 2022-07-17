<?php $__env->startSection("title", "   الاقتراحات والشكاوى  التي تقدم بها المستفيد $item->first_name $item->father_name $item->grandfather_name $item->last_name "); ?>


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
                                 للتحكم في إدارة الاقتراحات والشكاوى المسجلة في النظام باسم المستفيد
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
                    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 0px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" value="excel" class="btn btn-primary adv-export-btnn" id="excel_b" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 adv-search">
                    <input type="text" class="form-control" name="form_id" placeholder="الرقم المرجعي" >
                </div>

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
                        <option value="" > حالة المشروع</option>
                        <option value="1" >مستمر</option>
                        <option value="2">منتهي</option>
                    </select>
                </div>

                <div class="col-sm-3 adv-search">
                    <select name="sent_type" class="form-control">

                        <option value="">قناة الاستقبال</option>
                        <?php $__currentLoopData = $sent_typee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(request('sent_type')==$sent_type->id?"selected":""); ?> value="<?php echo e($sent_type->id); ?>"><?php echo e($sent_type->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-3 adv-search">
                    <select name="type" class="form-control">
                        <option value="">التصنيف (اقتراح أو شكوى)</option>
                        <?php $__currentLoopData = $form_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ftype->id != 3): ?>
                                <option <?php echo e(request('type')==$ftype->id?"selected":""); ?> value="<?php echo e($ftype->id); ?>"><?php echo e($ftype->name); ?></option>
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
                        <option value="">حالة تبليغ الرد </option>
                        <option value="2" >تم التبليغ</option>
                        <option value="1">قيد التبليغ</option>
                        <option value="0">لم يتم التبليغ</option>

                    </select>
                </div>
                <div class="col-sm-3  adv-search">
                    <select name="evaluate" class="form-control">
                        <option value="">التغذية الراجعة</option>
                        <option value="0" >غير راضي عن الرد</option>
                        <option value="1">راضي بشكل ضعيف</option>
                        <option value="2">راضي بشكل متوسط </option>
                        <option value="3">راضي بشكل كبير</option>

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
                    <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>"
                           placeholder="يوم / شهر / سنة"/>
                </div>
                <div class="col-sm-3 adv-search">
                    <label for="to_date">إلى تاريخ تسجيل</label>
                    <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                           placeholder="يوم / شهر / سنة"/>
                </div>

                <div class="col-sm-3 adv-search">
                    <button type="submit" name="theaction" title="بحث" style="width:110px;margin-top:25px;" value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
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
<div class="table-responsive">

        <table class="table table-hover table-striped" style="width:170% !important;max-width:170% !important;white-space:normal;">
            <thead>
            <tr>
                <th style="word-break: normal;">الرقم المرجعي</th>
                <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                <th style="max-width: 100px;word-break: normal;">قناة الاستقبال</th>
                <th style="max-width: 100px;word-break: normal;">النوع</th>
                <?php if($type!=2 && $type!=3): ?><th style="max-width: 400px;word-break: normal;">فئة الاقتراح/الشكوى</th><?php endif; ?>
                <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى</th>
                <th style="max-width: 100px;word-break: normal;">حالة الرد</th>
                <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>
                <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                <th style="max-width: 110px;word-break: normal;text-align: center;"> معاينة </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Auth::user()->account->projects->contains($a->project->id) && Auth::user()->account->circle->category->contains($a->category->id)): ?>
                    <tr class="tr-id-<?php echo e($a->id); ?>">
                        <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                        <td style="word-break: normal;"><?php echo e($a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name); ?></td>
                        <td style="word-break: normal;"><?php echo e($a->citizen->id_number); ?></td>
                        <td style="word-break: normal;"><?php echo e($a->project->name); ?></td>
                        <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->project->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                        <td style="word-break: normal;"> <?php echo e($a->sent_typee->name); ?></td>
                        <td style="word-break: normal;"><?php echo e($a->form_type->name); ?></td>
                        <?php if($type!=2 && $type!=3): ?>
                            <td style="max-width: 400px;word-break: normal;"
                                style="padding-left: 0px;padding-right: 0px">

                                <?php echo e($a->category->name); ?>


                            </td>
                        <?php endif; ?>
                        <td style="word-break: normal;"><?php echo e($a->datee); ?></td>

                        <?php if($a->form_status->id == 2): ?>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">تم الرد </td>
                        <?php else: ?>
                            <td style="max-width: 100px;word-break: normal;">قيد الدراسة</td>
                        <?php endif; ?>

                        <?php if($a->form_status->id == 1): ?>
                            <td style="max-width: 100px;word-break: normal;"> قيد التبليغ </td>
                        <?php elseif($a->form_status->id == 2): ?>
                            <td style="max-width: 100px;word-break: normal;"> تم التبليغ </td>
                        <?php else: ?>
                            <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ </td>
                        <?php endif; ?>

                        <?php if($a->evaluate): ?>
                            <?php if($a->evaluate == 1): ?>
                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل كبير </td>
                            <?php elseif($a->evaluate==2): ?>
                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل متوسط </td>
                            <?php elseif($a->evaluate == 3): ?>
                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل ضعيف </td>
                            <?php else: ?>
                                <td style="max-width: 100px;word-break: normal;"> غير راضي عن الرد </td>
                            <?php endif; ?>
                        <?php else: ?>
                            <td style="max-width: 100px;word-break: normal;">لا يوجد رد</td>
                        <?php endif; ?>

                        <td style="width: 110px;word-break: normal;text-align: center;">
                            <a
                                target="_blank" title="عرض" class="btn btn-xs btn-primary"
                                href="/citizen/form/show/<?php echo e($a->citizen->id_number); ?>/<?php echo e($a->id); ?>">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <?php if(
                            Auth::user()->account->circle->circle_categories->where('category_id',$a->category->id)->where('to_delete',1)->first()
                            &&
                            Auth::user()->account->account_projects->where('project_id',$a->project->id)->where('to_delete',1)->first()
                            ): ?>
                                <?php if($a->status == "3" ): ?>
                                    <a class="btn btn-xs Confirm22 btn-danger" data-id="<?php echo e($a->id); ?>" title="يمكن حذفها لأنها مغلقة"><i class="fa fa-trash"></i></a>
                                <?php endif; ?>
                        </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>

                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
</div>
<div style="float:left" >  <?php echo e($items->links()); ?> </div>
    <?php else: ?>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    <?php endif; ?>
    <?php else: ?>
    <div class="table-responsive">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th style="word-break: normal;">الرقم المرجعي</th>
                <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                <th style="max-width: 100px;word-break: normal;">قناة الاستقبال</th>
                <th style="max-width: 100px;word-break: normal;">النوع</th>
                <?php if($type!=2 && $type!=3): ?><th style="max-width: 400px;word-break: normal;">فئة الاقتراح/الشكوى</th><?php endif; ?>
                <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى</th>
                <th style="max-width: 100px;word-break: normal;">حالة الرد</th>
                <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>
                <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                <th style="max-width: 110px;word-break: normal;text-align: center;"> معاينة </th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
</div>
    <?php endif; ?>
    <div class="form-group row" style="text-left:left;" align="left">
        <div class="col-sm-12">
            <a href="/account/citizen" class="btn btn-success">رجوع للخلف</a>
        </div>
    </div>
    </div></div></div></div></div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>

    <script>
        $('.adv-search').hide();
        $('.adv-search-btn').click(function(){
            $('.adv-search').slideToggle("fast");
        });
    </script>

    <script>

        jQuery(document).ready(function(){
            jQuery('input').keypress(function(event){
                var enterOkClass =  jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>