<?php $__env->startSection("title", " مستفيدي مشروع  $item->name $item->code "); ?>


<?php $__env->startSection("content"); ?>
    <br>
    <br>

    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-sm-12">
            <h4>هذه الواجهة مخصصة للتحكم في مستفيدي المشروع</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php if(check_permission('تعديل مواطن')): ?>
                <form action="<?php echo e(route('save-citizen-data-project', $item->id)); ?>" method="POST" enctype="multipart/form-data"
                      id="dataListForm" style="padding-top: 20px;">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="project_id" id="project_id" value="<?php echo e($item->id); ?>">
                </form>
            <?php endif; ?>
        </div>

        <hr>

        <form class="form-inline">
        <div class="col-sm-12">
            <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث متقدم
                </button>

                <button type="submit"  name="theaction" id="excel_b"  value="excel" class="btn btn-primary" style="width:110px;">
                    <span class="glyphicon glyphicon-export"></span>
                    تصدير
                </button>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px;">

              <div class="form-group adv-searchh"  style="margin-left: 5px;">
                 <input type="text" class="form-control" name="id" value="<?php echo e(old('id')); ?>"
                   placeholder="رقم طلب المشروع" style="width: 230px;"/>
               </div>
              <div class="form-group adv-searchh" style="margin-left: 5px;">
                <input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>"
                   placeholder="اسم المستفيد" style="width: 230px;"/>
             </div>
              <div class="form-group adv-searchh" style="margin-left: 5px;">
                <input type="text" class="form-control" name="id_number" value="<?php echo e(old('id_number')); ?>"
                   placeholder="رقم الهوية" style="width: 230px;"/>
             </div>
              <div class="form-group adv-searchh" style="margin-left: 5px;">
                  <select class="form-control" name="governorate" style="width: 230px;">
                      <option value=""> المحافظة</option>
                      <option value="شمال غزة" <?php echo e(old('governorate')=='شمال غزة'?"selected":""); ?>>شمال غزة</option>
                      <option value="غزة" <?php echo e(old('governorate')=='غزة'?"selected":""); ?>>غزة</option>
                      <option value="الوسطى" <?php echo e(old('governorate')=='الوسطى'?"selected":""); ?>>الوسطى</option>
                      <option value="خانيونس" <?php echo e(old('governorate')=='خانيونس'?"selected":""); ?>>خانيونس</option>
                      <option value="رفح" <?php echo e(old('governorate')=='رفح'?"selected":""); ?>>رفح</option>
                  </select>
            </div>
            <button type="submit"  name="theaction"  value="search" class="btn btn-primary adv-searchh">
            <span class="glyphicon glyphicon-search"></span>
                بحث
            </button>


        </div>

        </form>

    </div>
    <div class="mt-3"></div>
         <?php if($items): ?>
            <?php if($items->count()>0): ?>
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم طلب المشروع</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستفيد</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهوية</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المحافظة</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (1)</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (2)</th>
                        <th width="21%">التفاصيل ذات العلاقة بالمستفيد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($loop->iteration); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project_request ? $a->project_request : '-'); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name); ?></td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->id_number); ?></td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->governorate); ?></td>
                           <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center;" class="text-left" dir="ltr"><?php echo e($a->mobile); ?></td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center;" class="text-left" dir="ltr"><?php echo e($a->mobile2); ?></td>
                            <td style="text-align: center !important;">
                                <?php if(check_permission('تعديل بيانات المستفيد')): ?>
                                    <a class="btn btn-xs btn-primary" title="تعديل" href="/account/citizen/<?php echo e($a->id); ?>/edit"><i
                                                class="fa fa-edit"></i></a>
                                <?php endif; ?>
                                <?php if(check_permission('حذف المستفيد')): ?>
                                    <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/citizen/delete/<?php echo e($a->id); ?>"><i
                                            class="fa fa-trash"></i></a>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        </div>
                <br>
                <div style="float:left" ><?php echo e($items->links()); ?> </div>
                <br>
                <br>
                <br>
            <?php else: ?>
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>

        <?php else: ?>
             <br>
             <br>
            <div class="table-responsive">

                <table class="table table-hover table-striped" style="white-space:normal;">
                    <thead>
                    <tr>
                        <th style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستفيد</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهوية</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المحافظة</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (1)</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (2)</th>
                        <th>التفاصيل ذات العلاقة بالمستفيد</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        <?php endif; ?>


    <br><br>
    <div class="form-group row">
        <div class="col-sm-2 col-md-offset-10">
            <a href="/account/project"  class="btn btn-success">الغاء الامر</a>
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

        <script>

            $('#excel_b').click(function (e) {
                e.preventDefault();

                var formData=$(this).serialize();
                if(formData){
                    formData += "&theaction=" + encodeURIComponent('excel');
                    var fullUrl = window.location.href;
                    var finalUrl = fullUrl + "&" + formData;
                }else{
                    formData += "?theaction=" + encodeURIComponent('excel');
                    var fullUrl = window.location.href;
                    var finalUrl = fullUrl + "?" + formData;
                }
                window.location.href = finalUrl;

            });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>