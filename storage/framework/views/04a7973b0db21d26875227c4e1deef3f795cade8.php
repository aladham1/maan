<div class="row">
    <div class="col-md-12">
        <h4> مرفقات اقتراح/شكوى رقم <?php echo e($item->id); ?></h4>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="list-styled" style="direction:rtl;text-align:right;">
        <?php $__currentLoopData = $form_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a  style="text-decoration: none;color: #3f688d;" target="_blank"
                    href="<?php echo e(asset('/uploads/'.$follow_file['name'])); ?>">
                      مرفقات اقتراح/شكوى رقم <?php echo e($item->id); ?>

                    - تاريخ الاستخراج <?php echo e(" ".strtotime($follow_file->created_at)); ?>

                </a>
            </li>
            <hr style="border:1px solid #CCC">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>



