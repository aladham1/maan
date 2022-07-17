<?php $__env->startSection("title", "تقارير الاقتراحات والشكاوى الخاصة بمشاريع المركز"); ?>
<?php $__env->startSection('css'); ?>
    <style>

        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: right;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: left;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        @media  print {
            .accordion .collapsed {
                height: auto;
            }
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="mybody">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card card-border">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row pb-50">
                                <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                                    <div>
                                        <h4 class="page-title text-bold-500 mb-25">
                                            هذه الواجهة مخصصة للتحكم في إدارة تقارير الاقتراحات والشكاوى المسجلة في
                                            النظام
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
                            <div class="card-title">
                                <button type="button" style="margin-left: 10px;"
                                        class="btn btn-primary msg-btn add-btn">
                                    <span class="fa fa-plus fa-2x" aria-hidden="true"></span>
                                </button>
                                يمكنك استدعاء بيانات التقرير من خلال خيارات الفرز أدناه
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <fieldset>
                                            <div id="report_critiria">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="code" class="form-control">
                                                            <option value="" selected>رمز المشروع</option>
                                                            <?php $__currentLoopData = $allprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php if(request('code')===''.$project->id): ?>selected
                                                                    <?php endif; ?>
                                                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="project_id" class="form-control">
                                                            <option value="" selected>اسم المشروع</option>
                                                            <?php $__currentLoopData = $allprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                                                    <?php endif; ?>
                                                                    value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="coordinator" class="form-control">
                                                            <option value="" selected>منسق المشروع</option>
                                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($account->circle_id == 2): ?>
                                                                    <option
                                                                        <?php if(request('coordinator')===''.$account->id): ?>selected
                                                                        <?php endif; ?>
                                                                        value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="support" class="form-control">
                                                            <option value="" selected>ممثل قسم المتابعة والتقييم
                                                            </option>
                                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($account->circle_id == 4): ?>
                                                                    <option
                                                                        <?php if(request('support')===''.$account->id): ?>selected
                                                                        <?php endif; ?>
                                                                        value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="manager" class="form-control">
                                                            <option value="" selected>مدير البرنامج</option>
                                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($account->circle_id == 3): ?>
                                                                    <option
                                                                        <?php if(request('manager')===''.$account->id): ?>selected
                                                                        <?php endif; ?>
                                                                        value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3  adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="active" class="form-control">
                                                            <option value=""> حالة المشروع</option>
                                                            <?php $__currentLoopData = $project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php echo e(request('active')==$pstatus->id?"selected":""); ?> value="<?php echo e($pstatus->id); ?>"><?php echo e($pstatus->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="sent_type" class="form-control">

                                                            <option value="">قنوات الاستقبال</option>
                                                            <?php $__currentLoopData = $sent_typeexx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php echo e(request('sent_type')==$sent_type->id?"selected":""); ?> value="<?php echo e($sent_type->id); ?>"><?php echo e($sent_type->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select class="form-control" name="governorate">
                                                            <option value="">المحافظة</option>
                                                            <option
                                                                value="شمال غزة" <?php echo e(old('governorate')=='شمال غزة'?"selected":""); ?>>
                                                                شمال غزة
                                                            </option>
                                                            <option
                                                                value="غزة" <?php echo e(old('governorate')=='غزة'?"selected":""); ?>>
                                                                غزة
                                                            </option>
                                                            <option
                                                                value="الوسطى" <?php echo e(old('governorate')=='الوسطى'?"selected":""); ?>>
                                                                الوسطى
                                                            </option>
                                                            <option
                                                                value="خانيونس" <?php echo e(old('governorate')=='خانيونس'?"selected":""); ?>>
                                                                خانيونس
                                                            </option>
                                                            <option
                                                                value="رفح" <?php echo e(old('governorate')=='رفح'?"selected":""); ?>>
                                                                رفح
                                                            </option>

                                                            <option
                                                                value="أريحا" <?php echo e(old('governorate')=='أريحا'?"selected":""); ?>>
                                                                أريحا
                                                            </option>

                                                            <option
                                                                value="الخليل" <?php echo e(old('governorate')=='الخليل'?"selected":""); ?>>
                                                                الخليل
                                                            </option>

                                                            <option
                                                                value="القدس" <?php echo e(old('governorate')=='القدس'?"selected":""); ?>>
                                                                القدس
                                                            </option>

                                                            <option
                                                                value="بيت لحم" <?php echo e(old('governorate')=='بيت لحم'?"selected":""); ?>>
                                                                بيت لحم
                                                            </option>
                                                            <option
                                                                value="جنين" <?php echo e(old('governorate')=='جنين'?"selected":""); ?>>
                                                                جنين
                                                            </option>
                                                            <option
                                                                value="رام الله والبيرة" <?php echo e(old('governorate')=='رام الله والبيرة'?"selected":""); ?>>
                                                                رام الله والبيرة
                                                            </option>
                                                            <option
                                                                value="سلفيت" <?php echo e(old('governorate')=='سلفيت'?"selected":""); ?>>
                                                                سلفيت
                                                            </option>
                                                            <option
                                                                value="طوباس" <?php echo e(old('governorate')=='طوباس'?"selected":""); ?>>
                                                                طوباس
                                                            </option>
                                                            <option
                                                                value="طولكرم" <?php echo e(old('governorate')=='طولكرم'?"selected":""); ?>>
                                                                طولكرم
                                                            </option>
                                                            <option
                                                                value="قلقيلية" <?php echo e(old('governorate')=='قلقيلية'?"selected":""); ?>>
                                                                قلقيلية
                                                            </option>
                                                            <option
                                                                value="نابلس" <?php echo e(old('governorate')=='نابلس'?"selected":""); ?>>
                                                                نابلس
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="type" class="form-control">
                                                            <option value="">التصنيف (اقتراح أو شكوى)</option>
                                                            <?php $__currentLoopData = $form_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($ftype->id != 3): ?>
                                                                    <option
                                                                        <?php echo e(request('type')==$ftype->id?"selected":""); ?> value="<?php echo e($ftype->id); ?>"><?php echo e($ftype->name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected>فئة الاقتراح/شكوى</option>
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($category->id != 1 && $category->id != 2): ?>
                                                                    <option
                                                                        <?php if(request('category_id')===''.$category->id): ?>selected
                                                                        <?php endif; ?>
                                                                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="status" class="form-control">
                                                            <option value="">حالة الرد</option>
                                                            <?php $__currentLoopData = $form_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php echo e(request('status')==$fstatus->id?"selected":""); ?> value="<?php echo e($fstatus->id); ?>"><?php echo e($fstatus->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <select name="replay_status" class="form-control">
                                                            <option value="">حالة تبيلغ الرد</option>
                                                            <option value="1">تم التبليغ</option>
                                                            <option value="0">قيد التبليغ</option>
                                                            <option value="2">لم يتم التبليغ</option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:24px;margin-bottom:0px;">
                                                        <select name="evaluate" class="form-control">
                                                            <option value="">التغذية الراجعة</option>
                                                            <option value="0">غير راضي عن الرد</option>
                                                            <option value="1">راضي بشكل ضعيف</option>
                                                            <option value="2">راضي بشكل متوسط</option>
                                                            <option value="3">راضي بشكل كبير</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <label for="from_date">تاريخ تسجيل محدد</label>
                                                        <input type="date" class="form-control" name="datee"
                                                               value="<?php echo e(request('datee')); ?>"
                                                               placeholder="تاريخ تسجيل محدد"/>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <label for="from_date">من تاريخ تسجيل </label>
                                                        <input type="date" class="form-control" name="from_date"
                                                               value="<?php echo e(request('from_date')); ?>"
                                                               placeholder="من تاريخ تسجيل"/>
                                                    </div>
                                                    <div class="col-sm-3 adv-search"
                                                         style="margin-top:0px;margin-bottom:0px;">
                                                        <label for="from_date">إلى تاريخ تسجيل </label>
                                                        <input type="date" class="form-control" name="to_date"
                                                               value="<?php echo e(request('to_date')); ?>"
                                                               placeholder="إلى تاريخ تسجيل"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="form-group row" align="left">
                                            <div class="col-sm-12">
                                                <button type="submit" target="_blank" name="theaction"
                                                        title="تصدير إكسل" id="excel_b"
                                                        value="excel" class="btn btn-primary adv-export-btnn"
                                                        style="margin-left: 10px;width: 100px;margin-top: 10px;">
                                                    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                                                    تصدير
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        function printDiv(divName) {
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].classList.toggle("active");
                var panel = acc[i].nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            }

            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        $('#report_critiria').hide();
        $('.add-btn').click(function () {
            $('#report_critiria').slideToggle()
        });

    </script>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>