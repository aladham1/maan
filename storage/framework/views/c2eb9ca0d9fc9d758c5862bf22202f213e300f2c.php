<div class="alert alert-info">
    <strong>المواطن <?php echo e($item->full_name); ?> مستفيد من مشروع: </strong>
    <ul style="padding-right:15px;">
        <?php $__currentLoopData = $item->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($project->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
