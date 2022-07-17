<?php $__env->startSection("title", "إضافة مستوى إداري جديد"); ?>

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
هذه الواجهة مخصصة لتعريف المستويات الإدارية الجديدة في النظام
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
                    <div class="card-title">المستوى الإداري </div>
                </div>
                <div class="card-body">
            <form action="/account/circle" method="post" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control <?php echo e(($errors->first('name') ? " form-error" : "")); ?>" placeholder="اسم المستوى الإداري" name="name" value="<?php echo e(old('name')); ?>">
                    <?php echo $errors->first('name', '<p class="help-block" style="color:red;">:message</p>'); ?>


                </div>
                </div>
                <div class="form-group row" style="margin-left:10px;float:right;">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success"  style="width: 95px;" value="إضافة"/>
                        <a href="/account/circle" class="btn btn-light">إلغاء الأمر</a>
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