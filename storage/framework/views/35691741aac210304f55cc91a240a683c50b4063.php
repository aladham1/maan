
<table class="table table-bordered table-hover" style="width:100%">
    <?php $__currentLoopData = $failures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $failure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e(is_array($failure->row()) ? json_encode($failure->row()) : $failure->row()); ?> _ <?php echo e(is_array($failure->attribute()) ? json_encode($failure->attribute()) : $failure->attribute()); ?> _ <?php echo e(is_array($failure->errors()) ? json_encode($failure->errors()) : $failure->errors()); ?></b></td>
            <td><?php echo e(is_array($failure->values()) ? json_encode($failure->values()) : $failure->values()); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
