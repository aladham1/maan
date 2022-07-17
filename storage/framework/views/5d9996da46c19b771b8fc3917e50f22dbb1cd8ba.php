<div class="container">
    <form method="post" action="/account/citizen/select-project-post/<?php echo e($citizen->id); ?>"
          style=" padding-top: 20px;border-top: 1px solid #e2e2e2;width: 88%;" autocomplete="off" id="addNewForm1">
        <?php echo e(csrf_field()); ?>

        <div class="form-group row">
            <div class="col-sm-5">
                <label for="project_id" class="col-form-label" style="margin-top: 5px;">يرجى ادخال رقم الهوية لفحص
                    معلومات المستفيد/ة:</label>

            </div>
            <div class="col-sm-3">
                <input type="text" autofocus class="form-control" value="<?php echo e($citizen->id_number); ?>" id="id_number"
                       name="id_number">
            </div>
            <div class="col-sm-2">
                <button onclick="gitCitizen();return false;" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                </button>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-3">
                <label for="first_name" class="col-form-label"> الاسم الأول</label>

                <input type="text" autofocus class="form-control <?php echo e(($errors->first('first_name') ? " form-error" : "")); ?>" value="<?php echo e($citizen->first_name); ?>" id="first_name"
                       name="first_name">
                <?php echo $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

            </div>
            <div class="col-sm-3">
                <label for="father_name" class="col-form-label">اسم الأب</label>

                <input type="text" autofocus class="form-control" value="<?php echo e($citizen->father_name); ?>" id="father_name"
                       name="father_name">
            </div>
            <div class="col-sm-3">

                <label for="grandfather_name" class="col-form-label">إسم الجد</label>
                <input type="text" autofocus class="form-control" value="<?php echo e($citizen->grandfather_name); ?>"
                       id="grandfather_name" name="grandfather_name">
            </div>
            <div class="col-sm-3">
                <label for="last_name" class="col-form-label">اسم العائلة</label>

                <input type="text" autofocus class="form-control" value="<?php echo e($citizen->last_name); ?>" id="last_name"
                       name="last_name">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label for="id_number" class="col-form-label">رقم الهوية</label>

                <input type="text" disabled autofocus class="form-control" value="<?php echo e($citizen->id_number); ?>"
                       id="id_number" name="id_number">
            </div>
            <div class="col-sm-3">
                <label for="mobile" class="col-form-label"> رقم التواصل(1)</label>

                <input type="text" class="form-control" value="<?php echo e($citizen->mobile); ?>" id="mobile" name="mobile"
                       autocomplete="mobile">
            </div>
            <div class="col-sm-3">
                <label for="mobile2" class="col-form-label"> رقم التواصل(2)</label>

                <input type="text" class="form-control" value="<?php echo e($citizen->mobile2); ?>" id="mobile" name="mobile2"
                       autocomplete="mobile2">
            </div>
            <div class="col-sm-3">
                <label for="circle_id" class="col-form-label">المحافظة</label>

                <select class="form-control" name="governorate">
                    <option value="">اختر</option>
                    <option value="شمال غزة" <?php echo e($citizen->governorate =='شمال غزة'?"selected":""); ?>>شمال غزة</option>
                    <option value="غزة" <?php echo e($citizen->governorate =='غزة'?"selected":""); ?>>غزة</option>
                    <option value="الوسطى" <?php echo e($citizen->governorate =='الوسطى'?"selected":""); ?>>الوسطى</option>
                    <option value="خانيونس" <?php echo e($citizen->governorate =='خانيونس'?"selected":""); ?>>خانيونس</option>
                    <option value="رفح" <?php echo e($citizen->governorate =='رفح'?"selected":""); ?>>رفح</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
                <label for="city" class="col-form-label"> المنطقة</label>

                <input type="text" class="form-control" value="<?php echo e($citizen->city); ?>" id="city" name="city"
                       autocomplete="city">
            </div>
            <div class="col-sm-3">
                <label for="street" class="col-form-label"> العنوان</label>

                <input type="text" class="form-control" value="<?php echo e($citizen->street); ?>" id="street" name="street"
                       autocomplete="street">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label class="col-form-label" style="font-weight:600;"> أسماء المشاريع المدرج ضمنها المستفيد
                    حالياً:</label>
                <table class="table table-hover table-striped" style="width: 30%;text-align: right;">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>اسم المشروع</td>
                        <td>رقم طلب المشروع</td>
                    </tr>
                    </thead>
                    <?php $__empty_1 = true; $__currentLoopData = $citizen->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                        $xx = $citizen->citizen_projects->where('project_id', $project->id)->first();
                        ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($project->name); ?></td>
                            <td><?php echo e($xx->project_request); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3">لايوجد مشاريع</td>
                        <tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="project_id" class="col-form-label" style="margin-top: 5px;">لإضافة المستفيد ضمن مشروع آخر،
                    حدد اسم المشروع المراد إدراج المستفيد ضمنه: </label>

                <p class="help-block" id="error-projec" style="color:red;display: none;">اسم المشروع غير محدد، يرجى تحديده مع إضافة رقم طلبه في المشروع .</p>
            </div>
            <div class="col-sm-6">

                <?php
                $projects = \DB::table("projects")->where('active', 1)->get();
                ?>
                <table class="table table-hover table-striped" style="text-align: right;">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td></td>
                        <td>اسم المشروع</td>
                        <td>رقم طلب المشروع</td>
                    </tr>
                    </thead>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($project->id !=1): ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><input <?php echo e($citizen->projects->contains($project->id)?'checked':''); ?> type="checkbox"
                                           name="projects[]" value="<?php echo e($project->id.'_'.$key); ?>"/></td>
                                <td><b><?php echo e($project->name); ?></b></td>
                                <?php if($citizen->projects->contains($project->id)): ?>
                                    <?php
                                    $xx = $citizen->citizen_projects->where('project_id',$project->id)->first();
                                    ?>
                                    <td><input type="text" class="form-control" value="<?php echo e($xx->project_request); ?>"  id="project_request" name="project_request[]"></td>
                                <?php else: ?>
                                    <td><input type="text" class="form-control"   id="project_request" name="project_request[]"></td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="form-group row" style="float:left;text-align:left;" align="left">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success cccc">حفظ</button>
            </div>
        </div>
    </form>

</div>

<script>
    $("#addNewForm1").submit(function () {
        var checked = $("#addNewForm1 input[name='projects[]']:checked").length > 0;
        var checked1 = $("#addNewForm1 input[name='project_request[]']:checked").length > 0;

        console.log(checked +'--'+checked1);

        if (!checked && !checked1 ) {
            $('#error-projec').show();
            return false;
        }else{
            $('#error-projec').hide();
        }
    });
</script>
