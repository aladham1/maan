<?php $__env->startSection("title", "متابعة نموذج "); ?>


<?php $__env->startSection("content"); ?>
<section class="container-fluid login-wrap">
            <h1 class="wow bounceIn inner-h1">
                   <?php if($citizen && $citizen != 'none'): ?>
            أهلاً بك عزيزي
            <?php echo e($citizen->first_name); ?> <?php echo e($citizen->father_name); ?> <?php echo e($citizen->grandfather_name); ?> <?php echo e($citizen->last_name); ?>

        <?php else: ?>
            أهلاً بك عزيزي المواطن
        <?php endif; ?>
            </h1>
             <h4 class="inner-h5 wow bounceIn">
        <?php if($citizen && $citizen != 'none'): ?>
            <?php if($projects): ?>
                <?php if($projects->first()): ?>
                    أنت مستفيد من مشاريع المركز الموضحة أدناه.
                    اختار المشروع الذي تريد تقديم  <?php if($type == 1): ?><?php echo e('شكواك'); ?><?php elseif($type == 2): ?><?php echo e('اقتراحك'); ?><?php endif; ?> بخصوصه
                <?php else: ?>
                    أنت غير مستفيد من مشاريع المركز،
                    <?php if($type>2): ?>
                        نأسف لا يمكنك تقديم نموذج شكر ، يمكنكم الذهاب لصفحة اضافة الاقتراحات أو الشكاوى
                    <?php else: ?>
                        ويمكنك تقديم  <?php if($type == 1): ?><?php echo e('شكواك'); ?><?php elseif($type == 2): ?><?php echo e('اقتراحك'); ?><?php endif; ?> بالضغط على الزر أدناه.
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            أنت غير مستفيد من مشاريع المركز،
            <?php if($type>2): ?>
                نأسف لا يمكنك تقديم نموذج شكر ، يمكنكم الذهاب لصفحة اضافة الاقتراحات أو الشكاوى
            <?php else: ?>
                 ويمكنك تقديم  <?php if($type == 1): ?><?php echo e('شكواك'); ?><?php elseif($type == 2): ?><?php echo e('اقتراحك'); ?><?php endif; ?> بالضغط على الزر أدناه
            <?php endif; ?>
        <?php endif; ?>  </h4>
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
        <form method="get" action="/citizen/editorcreatcitizen">


    <div class="row">
        <div class="col-sm-12 text-center">

            <?php if($projects): ?>
                <?php if($projects->first()): ?>
                    <select style="text-align:center; margin-bottom:20px;" class="form-control input2" name="project_id">
                        <option value="">اختر مشروعك</option>
                        <?php if($hide_data == 1): ?>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($project->id != 1): ?>
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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



        </div>
    </div>

    <!-- second row -->
    <?php if(!($projects) && ($type>2)): ?>

    <?php else: ?>
      <div class="form-group row" align="center">
            <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
            <div class="col-sm-12">
                <input type="submit"
                       class="btn btn-primary wow bounceIn btn-style" value="انتقل إلى تقديم  <?php if($type == 1): ?><?php echo e('شكواك'); ?><?php elseif($type == 2): ?><?php echo e('اقتراحك'); ?><?php endif; ?>">
               </div>
    </div>
    <?php endif; ?>
</form>
</section>
<!--****************************************************** start footer **************************************************************-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>