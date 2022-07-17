<?php $__env->startSection("title", " مستفيدي مشروع  $item->name $item->code "); ?>


<?php $__env->startSection("content"); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

   <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
                                هذه الواجهة مخصصة للتحكم في مستفيدي المشروع
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
            <?php if(check_permission('تعديل مواطن')): ?>
                <form action="<?php echo e(route('save-citizen-data-project', $item->id)); ?>" method="POST" enctype="multipart/form-data"
                      id="dataListForm" style="padding-top: 20px;">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="project_id" id="project_id" value="<?php echo e($item->id); ?>">
                </form>
                <hr>
            <?php endif; ?>

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
            <div class="row" style="margin-top: 5px;">

              <div class="col-sm-3 form-group adv-searchh">
                 <input type="text" class="form-control" name="project_request" value="<?php echo e(old('project_request')); ?>"
                   placeholder="رقم طلب المشروع"/>
               </div>
              <div class="col-sm-3 form-group adv-searchh">
                <input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>"
                   placeholder="اسم المستفيد"/>
             </div>
              <div class="col-sm-3 form-group adv-searchh">
                <input type="text" class="form-control" name="id_number" value="<?php echo e(old('id_number')); ?>"
                   placeholder="رقم الهوية"/>
             </div>
              <div class="col-sm-3 form-group adv-searchh">
                  <select class="form-control" name="governorate">
                      <option value=""> المحافظة</option>
                      <option value="شمال غزة" <?php echo e(old('governorate')=='شمال غزة'?"selected":""); ?>>شمال غزة</option>
                      <option value="غزة" <?php echo e(old('governorate')=='غزة'?"selected":""); ?>>غزة</option>
                      <option value="الوسطى" <?php echo e(old('governorate')=='الوسطى'?"selected":""); ?>>الوسطى</option>
                      <option value="خانيونس" <?php echo e(old('governorate')=='خانيونس'?"selected":""); ?>>خانيونس</option>
                      <option value="رفح" <?php echo e(old('governorate')=='رفح'?"selected":""); ?>>رفح</option>

                      <option value="أريحا" <?php echo e(old('governorate')=='أريحا'?"selected":""); ?>>
                          أريحا
                      </option>

                      <option value="الخليل" <?php echo e(old('governorate')=='الخليل'?"selected":""); ?>>
                          الخليل
                      </option>

                      <option value="القدس" <?php echo e(old('governorate')=='القدس'?"selected":""); ?>>
                          القدس
                      </option>

                      <option value="بيت لحم" <?php echo e(old('governorate')=='بيت لحم'?"selected":""); ?>>
                          بيت لحم
                      </option>
                      <option value="جنين" <?php echo e(old('governorate')=='جنين'?"selected":""); ?>>
                          جنين
                      </option>
                      <option value="رام الله والبيرة" <?php echo e(old('governorate')=='رام الله والبيرة'?"selected":""); ?>>
                          رام الله والبيرة
                      </option>
                      <option value="سلفيت" <?php echo e(old('governorate')=='سلفيت'?"selected":""); ?>>
                          سلفيت
                      </option>
                      <option value="طوباس" <?php echo e(old('governorate')=='طوباس'?"selected":""); ?>>
                          طوباس
                      </option>
                      <option value="طولكرم" <?php echo e(old('governorate')=='طولكرم'?"selected":""); ?>>
                          طولكرم
                      </option>
                      <option value="قلقيلية" <?php echo e(old('governorate')=='قلقيلية'?"selected":""); ?>>
                          قلقيلية
                      </option>
                      <option value="نابلس" <?php echo e(old('governorate')=='نابلس'?"selected":""); ?>>
                          نابلس
                      </option>
                  </select>
            </div>
            </div>
           <div class="row">
                <div class="col-sm-3 col-sm-offset-9 adv-searchh" style="text-align: left;" align="left">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>


        </form>
        <div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
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
                <div style="float:left" ><?php echo e($items->links()); ?> </div>
            <?php else: ?>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            <?php endif; ?>

        <?php else: ?>
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
    <div class="form-group row" style="margin-top:15px;" align="left">
        <div class="col-sm-12">
            <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
        </div>
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