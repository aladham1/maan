<?php $__env->startSection("title", "إدارة فئات الاقتراحات والشكاوى"); ?>

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
هذه الواجهة مخصصة للتحكم في إدارة فئات الاقتراحات والشكاوى
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
        <form autocomplete="off">
         <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 10px;">
	            <button type="button"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	                بحث متقدم
	                 </button>
		</div>
</div>
</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
              <select   class="form-control" name="main_category_id">
                  <option value="">الفئات الرئيسية</option>
                  <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>" <?php echo e(old('main_category_id') ==$category->id ? 'selected' : ''); ?>  >  <?php echo e($category->name); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
                    <select   class="form-control" name="category_id">
                        <option value="">الفئات الفرعية</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') ==$category->id ? 'selected' : ''); ?>  >  <?php echo e($category->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group adv-searchh">
                <select class="form-control" name="is_complaint">
                    <option value="">نوع الفئة</option>
                    <option value="0">اقتراح</option>
                    <option value="1">شكوى</option>

                 </select>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
                    <select class="form-control" name="citizen_benefic">
                        <option value="">فئة مقدم الاقتراح/الشكوى</option>
                        <option value="0" >مستفيد</option>
                        <option value="1">غير مستفيد</option>

                     </select>
                </div>
                </div>
                </div>
                <div class="row" align="left" style="text-align:left;">
                <div class="col-sm-12 adv-searchh">
                <button type="submit"  name="theaction"  value="search" class="btn btn-primary adv-searchh" style="width:110px;">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>بحث
                      </button>
                      </div>
                      </div>

  </form>
<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
        <?php if($items->count()>0): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="max-width: 30px;word-break: normal;"># </th>
                        <th style="max-width: 100px;word-break: normal;">اسم الفئة الرئيسية</th>
                        <th style="max-width: 100px;word-break: normal;">اسم الفئة الفرعية</th>
                        <th style="max-width: 100px;word-break: normal;">نوع الفئة</th>
                        <th style="word-break: normal;">فئة مقدم الاقتراح/الشكوى</th>
                        <th style="word-break: normal;">التفاصيل ذات العلاقة بالفئة الفرعية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                            <td style="word-break: normal;"><?php echo e($a->is_complaint == 1 ? $a->parentCategory->name  : $a->parentSuggest->name); ?></td>
                            <td style="word-break: normal;"><?php echo e($a->name); ?></td>
                            <td style="max-width: 60px;word-break: normal;"><?php echo e($a->is_complaint == 1 ?  ' شكوى '  : ' اقتراح '); ?></td>
                            <td style="word-break: normal;">
                                <?php if($a->benefic_show == 1 && $a->citizen_show == 1): ?>
                                    <?php echo e('مستفيد وغير مستفيد'); ?>

                                <?php elseif($a->benefic_show == 1): ?>
                                    <?php echo e(' مستفيد '); ?>

                                <?php else: ?>
                                    <?php echo e(' غير مستفيد '); ?>

                                <?php endif; ?>
                            </td>

                            <td style="text-align:center;word-break: normal;">
                                <?php if(check_permission('تبويب المستويات الإدارية')): ?>
                                <a class="btn btn-xs btn-success" href="/account/category/showcircle/<?php echo e($a->id); ?>">
                                        المستويات الإدارية</a>
                                <?php endif; ?>

                                <?php if(check_permission('تعديل فئة')): ?>
                                    <a class="btn btn-xs btn-primary" title="تعديل" href="/account/category/<?php echo e($a->id); ?>/edit"><i
                                                class="fa fa-edit"></i></a>
                                <?php endif; ?>

                                <?php if(check_permission('حذف فئة')): ?>
                                   <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/category/delete/<?php echo e($a->id); ?>"><i
                                                    class="fa fa-trash"></i></a>
                                <?php endif; ?>

                            </td>
                        </tr>
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
                    <th style="max-width: 30px;word-break: normal;"># </th>
                    <th style="max-width: 100px;word-break: normal;">اسم الفئة الرئيسية</th>
                    <th style="max-width: 100px;word-break: normal;">اسم الفئة الفرعية</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الفئة</th>
                    <th style="word-break: normal;">فئة مقدم الاقتراح/الشكوى</th>
                    <th style="word-break: normal;">التفاصيل ذات العلاقة بالفئة الفرعية</th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>