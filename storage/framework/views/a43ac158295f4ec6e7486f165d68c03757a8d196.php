<?php $__env->startSection("title", "تعديل حساب $item->full_name"); ?>


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
                                        هذه الواجهة مخصصة لتعديل حساب المستخدم
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
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="card-title">بيانات حساب الموظف الجديد</div>
                    </div>
                    <div class="card-body">

                        <form method="post" enctype="multipart/form-data"
                              action="/account/account/profileup/<?php echo e($item['id']); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo method_field('patch'); ?>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="email" class="col-form-label">البريد الإلكتروني</label>
                                    <input type="email" class="form-control <?php echo e(($errors->first('email') ? " form-error" : "")); ?>" value="<?php echo e($item["email"]); ?>" id="email"
                                           name="email">
                                    <?php echo $errors->first('email', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="user_name" class="col-form-label">اسم المستخدم</label>
                                    <input type="text" class="form-control <?php echo e(($errors->first('user_name') ? " form-error" : "")); ?>" value="<?php echo e($item["user_name"]); ?>"
                                           id="user_name" name="user_name">
                                    <?php echo $errors->first('user_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                </div>

                                <div class="col-sm-4">
                                    <label for="mobile" class="col-form-label"> رقم الهاتف المحمول</label>
                                    <input type="text" class="form-control <?php echo e(($errors->first('mobile') ? " form-error" : "")); ?>" value="<?php echo e($item["mobile"]); ?>" id="mobile"
                                           name="mobile">
                                    <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                </div>
                            </div>
                    </div>
                    <div class="form-group row" align="left">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success" value="تعديل"/>
                            <a href="/account" class="btn btn-light">إلغاء الأمر</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('metronic-rtl/assets/pages/css/profile-rtl.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>