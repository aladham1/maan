<?php $__env->startSection("title", "متابعة نموذج "); ?>

<?php $__env->startSection("css"); ?>
    <style>
        .alert.alert-danger.alert-dismissible.alert-id ul {
            margin: 0 !important;
        }

        #footer {
            bottom: 60px !important;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <section class="container-fluid login-wrap">
        <h1 class="wow bounceIn inner-h1">
            أهلاً بك عزيزي المواطن
        </h1>
        <h4 class="inner-h5 wow bounceIn">
            <?php if($type == 1): ?>
                يرجى القيام بتحديد اسم المشروع الذي تريد تقديم الشكوى بخصوصه.
            <?php elseif($type == 2): ?>
                يرجى القيام بتحديد اسم المشروع الذي تريد تقديم الاقتراح بخصوصه.
            <?php endif; ?>
        </h4>
        <div class="row">
            <div class="col-sm-12">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible alert-id">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!--first row  -->
        <form method="get" action="/citizen/createcitizenprivate">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-12 text-center">

                    <?php if($projects): ?>
                        <?php if($projects->first()): ?>
                            <select class="select2 narrow wrap form-control input2"
                                    name="project_id">
                                <option value="">اختر مشروعك</option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($project->id); ?>">
                                        <?php if($project->id == 1): ?>
                                            <?php echo e('لست مستفيد حالياً من مشاريع المركز'); ?>

                                        <?php else: ?>
                                            <?php echo e($project->name); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        <?php else: ?>
                            <input type="hidden" name="project_id" value="1">
                        <?php endif; ?>
                    <?php else: ?>
                        <input type="hidden" name="project_id" value="1">
                    <?php endif; ?>

                    <?php if(isset($_GET['id_number'])): ?>
                        <input type="hidden" name="id_number" value="<?php echo e($_GET['id_number']); ?>">
                    <?php else: ?>
                        <input type="hidden" name="id_number" value="0">
                    <?php endif; ?>

                    <?php if($citizen): ?>
                        <input type="hidden" name="citizen_id" value="<?php echo e($citizen->id); ?>">
                    <?php else: ?>
                        <input type="hidden" name="citizen_id" value="0">
                    <?php endif; ?>

                    <input type="hidden" name="type" value="<?php echo e($type); ?>">
                    <input type="hidden" name="hide_data" value="<?php echo e($hide_data); ?>">
                    <input type="hidden" name="private_contact_option" value="<?php echo e($private_contact_option); ?>">
                    <input type="hidden" name="mobile_private" value="<?php echo e($mobile_private); ?>">
                    <input type="hidden" name="email_private" value="<?php echo e($email_private); ?>">
                </div>
            </div>

            <!-- second row -->
            <?php if(!($projects) && ($type>2)): ?>

            <?php else: ?>
                <div class="form-group row" align="center">
                    <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
                    <div class="col-sm-12">
                        <input type="submit"
                               class="btn btn-primary wow bounceIn btn-style"
                               value="انتقل إلى تقديم  <?php if($type == 1): ?><?php echo e('شكواك'); ?><?php elseif($type == 2): ?><?php echo e('اقتراحك'); ?><?php endif; ?>">
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </section>
    <!--****************************************************** start footer **************************************************************-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var $select2 = $('.select2').select2({
            containerCssClass: "wrap"
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>