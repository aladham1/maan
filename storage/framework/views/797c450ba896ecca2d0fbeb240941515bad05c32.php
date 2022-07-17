<?php $__env->startSection("title", "تعريف حساب موظف جديد "); ?>


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
                                        هذه الواجهة مخصصة لتعريف حساب موظف جديد في النظام
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
                        <form method="post" enctype="multipart/form-data" action="/account/account" autocomplete="off">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="user_name" class="col-form-label">اسم المستخدم</label>
                                    <input class="form-control <?php echo e(($errors->first('user_name') ? " form-error" : "")); ?>"
                                           type="text" value="<?php echo e(old("user_name")); ?>" id="user_name" name="user_name"
                                           autocomplete="user_name">
                                    <input type="hidden" value="<?php echo e(old("user_name")); ?>" id="full_name" name="full_name">
                                    <?php echo $errors->first('user_name', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>

                                <div class="col-sm-4">
                                    <label for="id_number" class="col-form-label">رقم الهوية</label>
                                    <input class="form-control <?php echo e(($errors->first('id_number') ? " form-error" : "")); ?>"
                                           type="text" value="<?php echo e(old("id_number")); ?>" id="id_number" name="id_number">
                                    <?php echo $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>


                            </div>
                            <div class="form-group row">

                                <div class="col-sm-4">
                                    <label for="mobile" class="col-form-label">رقم الهاتف المحمول</label>

                                    <input class="form-control <?php echo e(($errors->first('mobile') ? " form-error" : "")); ?>"
                                           type="text" placeholder="" value="<?php echo e(old("mobile")); ?>" id="mobile"
                                           name="mobile" autocomplete="mobile">
                                    <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>

                                <div class="col-sm-4">
                                    <label for="email" class="col-form-label">البريد الإلكتروني</label>
                                    <input class="form-control <?php echo e(($errors->first('email') ? " form-error" : "")); ?>"
                                           type="email" value="<?php echo e(old("email")); ?>" id="email" name="email">
                                    <?php echo $errors->first('email', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>


                            </div>
                            <div class="form-group row">

                                <div class="col-sm-4">
                                    <label for="password" class="col-form-label">كلمة المرور</label>
                                    <input class="form-control <?php echo e(($errors->first('password') ? " form-error" : "")); ?>"
                                           type="password" value="<?php echo e(old("password")); ?>" id="password" name="password"
                                           autocomplete="new-password">
                                    <?php echo $errors->first('password', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                </div>

                                <div class="col-sm-4">
                                    <label for="circle_id" class="col-form-label">المستوى الإداري</label>

                                    <select class="form-control <?php echo e(($errors->first('circle_id') ? " form-error" : "")); ?>"
                                            name="circle_id">
                                        <option value="">اختر</option>
                                        <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($circle -> id); ?>" <?php echo e(old('circle_id')==$circle -> id?"selected":""); ?>><?php echo e($circle -> name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $errors->first('circle_id', '<p class="help-block" style="color:red;">:message</p>'); ?>



                                </div>

                            </div>
                            <div class="form-group row">
                                <br>
                                <div class="col-sm-4">
                                    <label for="private" class="col-form-label">إمكانية تعامل هذا المستخدم مع
                                        الاقتراحات والشكاوى ذات الخصوصية لرغبة مقدمها بإخفاء معلوماته الأساسية خلال
                                        معالجتها</label>
                                </div>
                                <div class="col-sm-4">
                                    <select
                                        class="form-control <?php echo e(($errors->first('private') ? " form-error" : "")); ?>"
                                        name="private">
                                        <option value="">اختر</option>
                                        <option value="1" <?php echo e(old('private') == 1 ?"selected":""); ?>>نعم</option>
                                        <option value="0" <?php echo e(old('private') == 0 ?"selected":""); ?>>لا</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <?php echo $errors->first('private', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row" align="left">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="إضافة"/>
                                    <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>