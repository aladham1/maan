<?php $__env->startSection("title","توظيف حسابات على المشروع"); ?>



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
هذه الواجهة مخصصة لتوظيف العاملين على  <?php echo e($item->name); ?>

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
                <div class="col-md-3 form-group adv-searchh">
                    <select name="status_worker" class="form-control">
                        <option value="" selected>موظفي/ غير موظفي المشروع </option>
                        <option value="1">موظفي المشروع</option>
                        <option value="2">غير موظفي المشروع</option>

                    </select>
                </div>
                <div class="col-md-3 form-group adv-searchh">
                    <select name="account_id" class="form-control">
                        <option value="" selected>اسم المستخدم</option>
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3 form-group adv-searchh">
                    <select name="circle_id" class="form-control">
                        <option value="" selected>المستوى الإداري </option>
                        <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($circle->id); ?>"><?php echo e($circle->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3 adv-searchh">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
    <?php if($items->count()>0): ?>
        <form method="post" action="/account/project/stuffinproject/<?php echo e($item->id); ?>">
            <?php echo csrf_field(); ?>
            <table class="table table-hover table-striped" style="width:100% !important;max-width:100% !important;white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;">#</th>
                    <th style="word-break: normal;text-align: center">
                        <input type="checkbox" id="checkAll" name="checkbox" value="">
                        تحديد الكل
                    </th>

                    <th style="max-width: 100px;word-break: normal;">اسم المستخدم</th>
                    <th style="max-width: 100px;word-break: normal;">المستوى الإداري</th>
                    <th style="max-width: 100px;word-break: normal;text-align: center">مشاريع المستخدم الحالية</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td style="word-break: normal;"><?php echo e($key+1); ?></td>
                            <th style="word-break: normal;text-align: center;border-top: none;">
                                <input class="checkbox_name"  value="<?php echo e($account->id); ?>"
                                       <?php echo e($item->accounts->contains($account->id)?'checked':''); ?> type="checkbox"
                                       name="accounts[]">
                                <input type="hidden" name="account_id[]" value="<?php echo e($account->id); ?>">

                            </th>

                            <td style="max-width: 250px;word-break: normal;"><?php echo e($account->full_name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($account->circle->name); ?></td>
                            <td style="max-width: 100px;word-break: normal;text-align: center">
                                <a class="btn btn-xs btn-primary" target="_blank" href="/account/account/select-project/<?php echo e($account->id); ?>" title="اضغظ هنا">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div style="float:left;margin-bottom: 20px" ><?php echo e($items->links()); ?> </div>
            <div class="form-group row" style="margin-top:15px;" align="left">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="حفظ"/>
                    <a href="/account/project" class="btn btn-light">إلغاء الأمر</a>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    <?php endif; ?>
    <?php else: ?>
        <table class="table table-hover table-striped" style="white-space:normal;">
            <thead>
            <tr>
                <th style="word-break: normal;">#</th>
                <th style="word-break: normal;text-align: center">
                    <input type="checkbox" id="checkAll" name="checkbox" value="">
                    تحديد الكل
                </th>

                <th style="max-width: 100px;word-break: normal;">اسم المستخدم</th>
                <th style="max-width: 100px;word-break: normal;">المستوى الإداري</th>
                <th style="max-width: 100px;word-break: normal;">مشاريع المستخدم الحالية</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    <?php endif; ?>
    </div> </div> </div> </div> </div> </div>
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>