<?php $__env->startSection("title", "تعديل مستوى إداري"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="/account/circle/<?php echo e($items['id']); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="form-group">
                    <label>اسم المستوى الإداري</label>
                    <input type="text" class="form-control" placeholder="اسم المستوى الإداري" name="name" value="<?php echo e($items['name']); ?>">
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success"  style="width: 95px;" value="حفظ"/>
                        <a href="/account/circle" class="btn btn-light">إلغاء</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>