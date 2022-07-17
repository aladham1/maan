<?php $__env->startSection("title", "تعريف المشاريع لحساب المستخدم "); ?>

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
هذه الواجهة مخصصة لتعريف المشاريع التى يعمل عليها المستخدم  <?php echo e($item->full_name); ?>

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
      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btnn">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث متقدم
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form>
            <div class="row">
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="status_work" class="form-control">
                        <option value="" selected>حالة العمل على المشاريع </option>
                        <option value="1">المشاريع التي يعمل عليها حالياً</option>
                        <option value="2">المشاريع التي لا يعمل عليها حالياً</option>

                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_code" class="form-control">
                        <option value="" selected>رمز المشروع </option>
                        <?php $__currentLoopData = $projects_for_select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($project->id); ?>"><?php echo e($project->code); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_name" class="form-control">
                        <option value="" selected>اسم المشروع </option>
                        <?php $__currentLoopData = $projects_for_select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <select name="project_status" class="form-control">
                        <option value="" selected>حالة المشروع </option>
                        <?php $__currentLoopData = $project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php if(request('project_status')===''.$status->id): ?>selected
                                <?php endif; ?>
                                value="<?php echo e($status->id); ?>"><?php echo e($status->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
		</div>
		</div>
		<div class="row">
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <div>
                        <label for="from_date">تاريخ بداية المشروع </label>
                    </div>
                    <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>"
                           placeholder="يوم / شهر / سنة"/>
                </div>
                </div>
                <div class="col-md-3 col-3">
                <div class="form-group adv-searchh">
                    <div>
                        <label for="to_date">تاريخ نهاية المشروع</label>
                    </div>

                    <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                           placeholder="يوم / شهر / سنة"/>
                </div>
		        </div>
		<div class="col-md-3 col-3">
                <button type="submit" name="theaction" value="search" style="width:110px;margin-top:20px"
                        class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                                  aria-hidden="true"></span>     بحث    </button>
               </div>
                </div>
            </form>
        </div>
    </div>
<div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    <?php if(check_permission('تعديل بيانات المستخدم')): ?>

        <form method="post" action="/account/account/select-project-post/<?php echo e($item->id); ?>">
            <?php echo csrf_field(); ?>
            <?php if($projects): ?>
                <?php if($projects->count()>0): ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" style="width:100% !important;max-width:100% !important;white-space:normal;">
                        <thead>
                        <tr>
                            <th style="word-break: normal;">#</th>
                            <th style="word-break: normal;text-align: center">
                                <input type="checkbox" id="checkAll" name="checkbox" value="">
                                تحديد الكل
                            </th>

                            <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">تاريخ بداية المشروع</th>
                            <th style="max-width: 100px;word-break: normal;">تاريخ نهاية المشروع</th>
                            <th style="max-width: 100px;word-break: normal;text-align: center;">حالة المشروع</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                                <th style="word-break: normal;text-align: center;border-top: none;">
                                    <input class="checkbox_name"  value="<?php echo e($a->id); ?>"
                                           <?php echo e($item->projects->contains($a->id)?'checked':''); ?> type="checkbox"
                                           name="projects[]">
                                    <input type="hidden" name="project_id[]" value="<?php echo e($a->id); ?>">

                                </th>

                                <td style="max-width: 250px;word-break: normal;"><?php echo e($a->code); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->name); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->start_date); ?></td>
                                <td style="max-width: 100px;word-break: normal;"> <?php echo e($a->end_date); ?></td>
                                <td style="max-width: 100px;word-break: normal;text-align: center">  <?php if($a->end_date < now() ): ?>  منتهي<?php else: ?>مستمر<?php endif; ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
</div>
                    <div style="float:left;margin-bottom: 20px"><?php echo e($projects->links()); ?></div>
                <?php else: ?>
                    <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
                <?php endif; ?>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped" style="white-space:normal;">
                    <thead>
                    <tr>
                        <th style="word-break: normal;">#</th>
                        <th style="word-break: normal;">
                            <input type="checkbox" id="checkAll" name="checkbox" value="">
                            تحديد الكل
                        </th>

                        <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ بداية المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ نهاية المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            <?php endif; ?>
            <div class="form-group row" style="margin-top:15px;" align="left">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="حفظ"/>
                    <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-warning">ليس من صلاحيتك هذه الصفحة</div>
    <?php endif; ?>
    </div></div></div></div></div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {

            $('.adv-searchh').slideToggle("fast", function() {
                if ($('.adv-searchh').is(':hidden'))
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



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>