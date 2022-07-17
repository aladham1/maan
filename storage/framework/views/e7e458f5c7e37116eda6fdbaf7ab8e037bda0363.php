<?php $__env->startSection("title", "إدارة المستويات الإدارية"); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في إدارة المستويات الإدارية        
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
    <div id="mybody">
    <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
            <div class="card-body">
              <form autocomplete="off">
                <div class="row">
                    <div class="col-md-4 col-4">
                      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                        <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث متقدم
                        </button>
                      </div>
                    </div>
                </div>
        <div class="row">
                <div class="col-sm-3 form-group adv-searchh">
                    <select class="form-control" name="circles" style="margin-left: 10px;">
                        <option value="">المستوى الإداري</option>
                        <?php $__currentLoopData = $allcircles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($circle->id); ?>"
                                    <?php if(request('circles')== $circle->id): ?>selected <?php endif; ?>><?php echo e($circle->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
              </div>
            <div class="col-sm-2 adv-searchh">
                <button type="submit" name="theaction" title="بحث"  value="search"
                        class="btn btn-primary adv-searchh" style="width:110px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                </button>
            </div>
        </div>
        </form>
        <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
         <?php if($items): ?>
            <?php if($items->count()>0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                         <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">عدد الموظفين</th>
                        <th width="32%">التفاصيل ذات العلاقة بالمستوى الإداري</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->id); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->name); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e(count($a->account)); ?></td>

                        <td style="max-width: 350px;text-align: right;">
                            <?php if(check_permission('تبويب الموظفين')): ?>
                            <a class="btn btn-xs btn-success" href="/account/account?circles=<?php echo e($a->id); ?>&theaction=search"> الموظفين</a>
                            <?php endif; ?>

                            <?php if(check_permission('تبويب فئات الاقتراحات والشكاوى')): ?>
                            <a class="btn btn-xs btn-success" href="/account/circle/select-category/<?php echo e($a->id); ?>"> فئات الاقتراحات والشكاوى</a>
                            <?php endif; ?>

                            <?php if(check_permission('تعديل مستوى إداري')): ?>
                                <a class="btn btn-xs btn-primary" title="تعديل" href="/account/circle/<?php echo e($a->id); ?>/edit"><i
                                            class="fa fa-edit"></i></a>
                            <?php endif; ?>

                            <?php if(check_permission('تبويب صلاحيات المستوى الإداري')): ?>

                                <a class="btn btn-xs btn-info" title="الصلاحيات"
                                   href="/account/circle/permission/<?php echo e($a->id); ?>"><i
                                        class="fa fa-lock"></i></a>
                            <?php endif; ?>

                            <?php if(check_permission('حذف مستوى إداري')): ?>

                                <?php if($a->id != 1 && $a->category->toArray() == null): ?>
                                    <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/circle/delete/<?php echo e($a->id); ?>"><i
                                                class="fa fa-trash"></i></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div style="float:left" ><?php echo e($items->links()); ?> </div>
    <?php else: ?>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">عدد الموظفين</th>
                    <th width="32%">التفاصيل ذات العلاقة بالمستوى الإداري</th>
                </tr>
                </thead>
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
<?php $__env->startSection("js"); ?>
        <script>
            $('.adv-searchh').hide();
            $('.adv-search-btnn').click(function(){
                $('.adv-searchh').slideToggle("fast");
            });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>