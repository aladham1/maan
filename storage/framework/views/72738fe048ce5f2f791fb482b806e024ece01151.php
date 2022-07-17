<?php $__env->startSection("title", " المشاريع المدرجة ضمنها المستفيد  $item->first_name $item->father_name $item->grandfather_name $item->last_name"); ?>


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
هذه الواجهة مخصصة لعرض المشاريع التي يتم الاستفادة منها لهذا المواطن</h4>
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
                    <div class="card-title">المشاريع المدرجة ضمنها المستفيد</div>
                </div>
                <div class="card-body">
    <form method="post" action="/account/citizen/select-project-post/<?php echo e($item->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group row">

            <div class="col-sm-5">
                <?php
                $projects = \DB::table("projects")->get();
                ?>
                <ul class="list-styled">
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($project->id!="1"): ?>
                            <?php if($item->projects->contains($project->id)): ?>
                                <li>
                                    <label> <b><?php echo e($project->name); ?> - <?php echo e($project->code); ?></b></label>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-5">
                
                <a href="/account/citizen" class="btn btn-success">رجوع للخلف</a>
            </div>
        </div>
    </form>
    </div></div></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>