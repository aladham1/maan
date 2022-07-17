<?php if(count($item->projects) > 0): ?>
<?php $__env->startSection("title","تعديل بيانات مستفيدي المشاريع"); ?>
<?php else: ?>
<?php $__env->startSection("title", "تعديل بيانات غير مستفيدي المشاريع"); ?>
<?php endif; ?>



<?php $__env->startSection("content"); ?>

    <?php if(count($item->projects) > 0): ?>
        <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
يمكنك من خلال هذه الواجهة تعديل بيانات مستفيدي المشاريع
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

<?php else: ?>
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
يمكنك من خلال هذه الواجهة تعديل بيانات غير مستفيدي المشاريع                            </h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات مستفيدي المشاريع  </div>
                </div>
                <div class="card-body">
    <form method="post" enctype="multipart/form-data" action="/account/citizen/<?php echo e($item['id']); ?>"  autocomplete="off">
        <?php echo e(csrf_field()); ?>

        <?php echo method_field('patch'); ?>
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="id_number" class="col-form-label" style="vertical-align: sub;">رقم الهوية لفحص معلومات المستفيد/ة:</label>
	    </div>
	    <div class="col-sm-3">
                <input type="text"  autofocus class="form-control <?php echo e(($errors->first('id_number') ? " form-error" : "")); ?>" value="<?php echo e($item["id_number"]); ?>" id="id_number"
                       name="id_number">
            <?php echo $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>'); ?>


        </div>
        </div>





















        <div class="form-group row">
            <div class="col-sm-3">
               <label for="first_name" class="col-form-label">الإسم الأول</label>
               <input type="text" autofocus class="form-control <?php echo e(($errors->first('first_name') ? " form-error" : "")); ?>" value="<?php echo e($item["first_name"]); ?>" id="first_name"
                       name="first_name">
                <?php echo $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>

            <div class="col-sm-3">
               <label for="father_name" class="col-form-label">إسم الأب</label>
               <input type="text" autofocus class="form-control <?php echo e(($errors->first('father_name') ? " form-error" : "")); ?>" value="<?php echo e($item["father_name"]); ?>" id="father_name"
                       name="father_name">
                <?php echo $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>

            <div class="col-sm-3">
                <label for="grandfather_name" class="col-form-label">إسم الجد</label>
                <input type="text" autofocus class="form-control <?php echo e(($errors->first('grandfather_name') ? " form-error" : "")); ?>" value="<?php echo e($item["grandfather_name"]); ?>" id="grandfather_name"
                       name="grandfather_name">
                <?php echo $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>
        </div>

	<div class="form-group row">
            <div class="col-sm-3">
                <label for="last_name" class="col-form-label">إسم العائلة</label>
                <input type="text" autofocus class="form-control <?php echo e(($errors->first('last_name') ? " form-error" : "")); ?>" value="<?php echo e($item["last_name"]); ?>" id="last_name"
                       name="last_name">
                <?php echo $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>


            <div class="col-sm-3">
                <label for="id_number" class=" col-form-label">رقم الهوية</label>

                <input type="text" autofocus class="form-control <?php echo e(($errors->first('id_number') ? " form-error" : "")); ?>" value="<?php echo e($item["id_number"]); ?>" id="id_number"
                       name="id_number">
                <?php echo $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>
	</div>


	<div class="form-group row">
            <div class="col-sm-3">
                <label for="mobile" class="col-form-label">رقم التواصل(1)</label>

                <input type="text" class="form-control <?php echo e(($errors->first('mobile') ? " form-error" : "")); ?>" value="<?php echo e($item["mobile"]); ?>" id="mobile" name="mobile">
                <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>

        <div class="col-sm-3">
                <label for="mobile" class="col-form-label">رقم التواصل(2)</label>

                <input type="text" class="form-control <?php echo e(($errors->first('mobile') ? " form-error" : "")); ?>" value="<?php echo e($item["mobile"]); ?>" id="mobile" name="mobile">
            <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>


        </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-3">
                <label for="circle_id" class="col-form-label">المحافظة</label>
                <select class="form-control <?php echo e(($errors->first('governorate') ? " form-error" : "")); ?>" name="governorate">
                    <option value="">اختر</option>
                    <option value="شمال غزة" <?php echo e(($item['governorate']=='شمال غزة'||$item['governorate']=='شمال غزة')?"selected":""); ?>>شمال غزة</option>
                    <option value="غزة" <?php echo e($item['governorate']=='غزة'?"selected":""); ?>>غزة</option>
                    <option value="الوسطى" <?php echo e(($item['governorate']=='دير البلح'||$item['governorate']=='الوسطى')?"selected":""); ?>>الوسطى</option>
                    <option value="خانيونس" <?php echo e(($item['governorate']=='خان يونس'||$item['governorate']=='خانيونس')?"selected":""); ?>>خانيونس</option>
                    <option value="رفح" <?php echo e($item['governorate']=='رفح'?"selected":""); ?>>رفح</option>

                    <option value="أريحا" <?php echo e($item['governorate']=='أريحا'?"selected":""); ?>>
                        أريحا
                    </option>

                    <option value="الخليل" <?php echo e($item['governorate']=='الخليل'?"selected":""); ?>>
                        الخليل
                    </option>

                    <option value="القدس" <?php echo e($item['governorate']=='القدس'?"selected":""); ?>>
                        القدس
                    </option>

                    <option value="بيت لحم" <?php echo e($item['governorate']=='بيت لحم'?"selected":""); ?>>
                        بيت لحم
                    </option>
                    <option value="جنين" <?php echo e($item['governorate']=='جنين'?"selected":""); ?>>
                        جنين
                    </option>
                    <option value="رام الله والبيرة" <?php echo e($item['governorate']=='رام الله والبيرة'?"selected":""); ?>>
                        رام الله والبيرة
                    </option>
                    <option value="سلفيت" <?php echo e($item['governorate']=='سلفيت'?"selected":""); ?>>
                        سلفيت
                    </option>
                    <option value="طوباس" <?php echo e($item['governorate']=='طوباس'?"selected":""); ?>>
                        طوباس
                    </option>
                    <option value="طولكرم" <?php echo e($item['governorate']=='طولكرم'?"selected":""); ?>>
                        طولكرم
                    </option>
                    <option value="قلقيلية" <?php echo e($item['governorate']=='قلقيلية'?"selected":""); ?>>
                        قلقيلية
                    </option>
                    <option value="نابلس" <?php echo e($item['governorate']=='نابلس'?"selected":""); ?>>
                        نابلس
                    </option>

                </select>
                <?php echo $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>
            <div class="col-sm-3">
                <label for="city" class="col-form-label"> المنطقة</label>

                <input type="text" class="form-control <?php echo e(($errors->first('city') ? " form-error" : "")); ?>" value="<?php echo e($item["city"]); ?>" id="city" name="city">
                <?php echo $errors->first('city', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>

            <div class="col-sm-3">
                <label for="street" class="col-form-label"> العنوان</label>

                <input type="text" class="form-control <?php echo e(($errors->first('street') ? " form-error" : "")); ?>" value="<?php echo e($item["street"]); ?>" id="street" name="street">
                <?php echo $errors->first('street', '<p class="help-block" style="color:red;">:message</p>'); ?>


            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-form-label" style="font-weight:600;margin-top:20px;margin-bottom:20px;"> أسماء المشاريع المدرج ضمنها المستفيد
                    حالياً:</label>

            <div class="table-wrapper-scroll-y custom-scrollbar-2">

                <table class="table table-hover table-striped" style="text-align: right;">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>اسم المشروع</td>
                        <td>رقم طلب المشروع</td>
                    </tr>
                    </thead>
                    <?php $__empty_1 = true; $__currentLoopData = $item->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                        $xx = $item->citizen_projects->where('project_id',$project->id)->first();
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
</div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="project_id" class="col-form-label" style="font-weight:600;margin-bottom:20px;">لإضافة المستفيد ضمن مشروع آخر، حدد اسم المشروع المراد إدراج المستفيد ضمنه: </label>


                        <?php
                        $projects = \DB::table("projects")->where('active',1)->get();
                        ?>
                        <div class="table-wrapper-scroll-y custom-scrollbar">

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
                                        <td><input <?php echo e($item->projects->contains($project->id)?'checked':''); ?> type="checkbox" name="projects[]" value="<?php echo e($project->id.'_'.$key); ?>"/></td>
                                        <td><b><?php echo e($project->name); ?></b></td>
                                        <?php if($item->projects->contains($project->id)): ?>
                                            <?php
                                            $xx = $item->citizen_projects->where('project_id',$project->id)->first();
                                            ?>
                                            <td><input type="text" class="form-control" value="<?php echo e($xx->project_request); ?>"  id="project_request" name="project_request[<?php echo e($key); ?>]"></td>
                                        <?php else: ?>
                                            <td><input type="text" class="form-control"   id="project_request" name="project_request[<?php echo e($key); ?>]"></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
</div>

        <div class="form-group row" style="float:left;text-align:left;" align="left">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="حفظ"/>
                <a href="/account/citizen" class="btn btn-light">إلغاء الأمر</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script>



    function dataList() {
        // Get the checkbox
        var checkBox = document.getElementById("dataListCheck");
        // Get the output text
        var text = document.getElementById("dataListForm");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
    function addNewCitizen() {
            // Get the checkbox
            var checkBox = document.getElementById("addNewCheck");
            // Get the output text
            var text = document.getElementById("addNewForm");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

    function gitCitizen() {

        var id_number = document.getElementById("id_number").value;
        console.log(id_number);

        $.ajax({
            url: "<?php echo e(route('get-citizen-data')); ?>",
            type: "GET",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id_number,
            },
            success: function (data) {
                console.log(data);
                document.getElementById("addNewForm").style.display = "none";
                $('#mo').html(data);
            }
        });


    }


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>