<?php $__env->startSection('css'); ?>
    <style>
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
            /*max-height: 0;*/
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        @media (min-width: 992px) {
            .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
                float: right;
            }
        }

        @media (min-width: 768px) {
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: right;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title", "متابعة نموذج "); ?>

<?php $__env->startSection("content"); ?>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($project_id != 1): ?>
                    <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;"> أهلاً بك
                        عزيزي <?php echo e($citizen["full_name"]); ?></h3>
            </div>
            <?php else: ?>
                <div class="col-md-12">
                    <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;">أهلاً بك عزيزي المواطن</h3>
                </div>
            <?php endif; ?>
            <?php if($type == 1): ?>
                <div class="col-md-12">

                    <div class="inner-card inner-card-border">
                        <div class="inner-card-content">
                            <div class="inner-card-body">
                                <div class="row pb-50">
                                    <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                        <div>
                                            <h4 class="text-bold-500 mb-25">الرجاء القيام بشرح الشكوى/ المشكلة التي
                                                تواجهها مع التأكيد على أنه سيتم التعامل مع المعلومات التي
                                                ستقدمها بكل جدية وبسرية تامة</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <div class="inner-card inner-card-border">
                        <div class="inner-card-content">
                            <div class="inner-card-body">
                                <div class="row pb-50">
                                    <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                        <div>
                                            <h4 class="text-bold-500 mb-25"> نسعد باستقبال مقترحاتكم بما يساهم في تحسين
                                                الخدمات التي يقدمها المركز، يرجى التفضل بتوضيح
                                                مقترحاتكم
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="col-md-12 col-12">
                <div class="inner-card inner-card-user">
                    <div class="inner-card-header">
                        <div class="inner-card-title"> أولاً: معلوماتك الأساسية:
                        </div>
                    </div>
                    <div class="inner-card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <form method="POST" class="form-horizontal" id="form1"
                                      action="/citizen/saveolde/<?php echo e($citizen['id']); ?>" autocomplete="off">
                                    <?php echo method_field('patch'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="type" value="<?php echo e($type); ?>">

                                    <input type="hidden" name="hide_data" value="<?php echo e($hide_data); ?>">
                                    <input type="hidden" name="private_contact_option" value="<?php echo e($private_contact_option); ?>">
                                    <input type="hidden" name="private_email" value="<?php echo e($private_email); ?>">
                                    <input type="hidden" name="private_mobile" value="<?php echo e($private_mobile); ?>">
                                    <input type="hidden" name="project_id" value="<?php echo e($project_id); ?>">

                                    <div class="form-group row">

                                        <div class="col-md-3 mb-10">
                                            <label for="first_name" class="col-form-label">الاسم الأول</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('first_name') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["first_name"]); ?>" id="first_name"
                                                name="first_name" autocomplete="off">
                                            <?php echo $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <label for="father_name" class="col-form-label">اسم الأب</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('father_name') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["father_name"]); ?>" id="father_name"
                                                name="father_name">
                                            <?php echo $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>
                                        <div class="col-md-3 mb-10">
                                            <label for="grandfather_name" class="col-form-label">اسم الجد</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('grandfather_name') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["grandfather_name"]); ?>"
                                                id="grandfather_name" name="grandfather_name" autocomplete="off">
                                            <?php echo $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <label for="last_name" class="col-form-label">اسم العائلة</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('last_name') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["last_name"]); ?>" id="last_name"
                                                name="last_name">
                                            <?php echo $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>
                                        <div class="col-md-3 mb-10">
                                            <label for="id_number" class="col-form-label">رقم الهوية/جواز السفر</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('id_number') ? " form-error" : "")); ?>"
                                                readonly type="number" value="<?php echo e($citizen["id_number"]); ?>" id="id_number"
                                                name="id_number" autocomplete="off">
                                            <?php echo $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <label for="mobile" class="col-form-label">رقم التواصل (1)</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('mobile') ? " form-error" : "")); ?>"
                                                type="tel" maxlength="10" onchange="phonenumber($(this).val(),1)"
                                                value="<?php echo e($citizen["mobile"]); ?>" id="mobile" name="mobile"
                                                autocomplete="mobile">
                                            <span id="lblError1" style="color: red"></span>
                                            <?php echo $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>


                                        <div class="col-md-3 mb-10">
                                            <label for="mobile2" class="col-form-label">رقم التواصل (2)</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('mobile2') ? " form-error" : "")); ?>"
                                                type="tel"
                                                value="<?php echo e($citizen["mobile2"]); ?>" maxlength="10" id="mobile2"
                                                name="mobile2" onchange="phonenumber($(this).val(),2)"
                                                autocomplete="mobile2">
                                            <span id="lblError2" style="color: red"></span>
                                            <?php echo $errors->first('mobile2', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <label for="governorate" class="col-form-label">المحافظة</label>
                                            <select
                                                class="form-control <?php echo e(($errors->first('governorate') ? " form-error" : "")); ?>"
                                                id="sel1" name="governorate">
                                                <option value="">اختر</option>
                                                <option
                                                    value="شمال غزة" <?php echo e($citizen['governorate']=='شمال غزة'?"selected":""); ?>>
                                                    شمال غزة
                                                </option>
                                                <option value="غزة" <?php echo e($citizen['governorate']=='غزة'?"selected":""); ?>>
                                                    غزة
                                                </option>
                                                <option
                                                    value="الوسطى" <?php echo e($citizen['governorate']=='الوسطى'?"selected":""); ?>>
                                                    الوسطى
                                                </option>
                                                <option
                                                    value="خانيونس" <?php echo e($citizen['governorate']=='خانيونس'?"selected":""); ?>>
                                                    خانيونس
                                                </option>
                                                <option value="رفح" <?php echo e($citizen['governorate']=='رفح'?"selected":""); ?>>
                                                    رفح
                                                </option>

                                                <option value="أريحا" <?php echo e($citizen['governorate']=='أريحا'?"selected":""); ?>>
                                                    أريحا
                                                </option>

                                                <option value="الخليل" <?php echo e($citizen['governorate']=='الخليل'?"selected":""); ?>>
                                                    الخليل
                                                </option>

                                                <option value="القدس" <?php echo e($citizen['governorate']=='القدس'?"selected":""); ?>>
                                                    القدس
                                                </option>

                                                <option value="بيت لحم" <?php echo e($citizen['governorate']=='بيت لحم'?"selected":""); ?>>
                                                    بيت لحم
                                                </option>
                                                <option value="جنين" <?php echo e($citizen['governorate']=='جنين'?"selected":""); ?>>
                                                    جنين
                                                </option>
                                                <option value="رام الله والبيرة" <?php echo e($citizen['governorate']=='رام الله والبيرة'?"selected":""); ?>>
                                                    رام الله والبيرة
                                                </option>
                                                <option value="سلفيت" <?php echo e($citizen['governorate']=='سلفيت'?"selected":""); ?>>
                                                    سلفيت
                                                </option>
                                                <option value="طوباس" <?php echo e($citizen['governorate']=='طوباس'?"selected":""); ?>>
                                                    طوباس
                                                </option>
                                                <option value="طولكرم" <?php echo e($citizen['governorate']=='طولكرم'?"selected":""); ?>>
                                                    طولكرم
                                                </option>
                                                <option value="قلقيلية" <?php echo e($citizen['governorate']=='قلقيلية'?"selected":""); ?>>
                                                    قلقيلية
                                                </option>
                                                <option value="نابلس" <?php echo e($citizen['governorate']=='نابلس'?"selected":""); ?>>
                                                    نابلس
                                                </option>
                                            </select>
                                            <?php echo $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>
                                        <div class="col-md-3 mb-10">
                                            <label for="city" class="col-form-label">المنطقة</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('city') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["city"]); ?>" id="city" name="city"
                                                autocomplete="address">
                                            <?php echo $errors->first('city', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>


                                        <div class="col-md-3 mb-10">
                                            <label for="street" class="col-form-label">العنوان</label>
                                            <input
                                                class="form-control <?php echo e(($errors->first('street') ? " form-error" : "")); ?>"
                                                type="text" value="<?php echo e($citizen["street"]); ?>" id="street" name="street"
                                                autocomplete="street">
                                            <?php echo $errors->first('street', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <?php if($type == 1): ?>
                                                <label for="type_name" class="col-form-label">فئة مقدم الشكوى</label>
                                            <?php elseif($type == 2): ?>
                                                <label for="type_name" class="col-form-label">فئة مقدم الاقتراح</label>
                                            <?php endif; ?>

                                            <?php
                                            $project_arr = array();
                                            foreach ($citizen->projects as $project) {
                                                array_push($project_arr, $project->id);
                                            }
                                            ?>

                                            <input name="type_name"
                                                   value="<?php if(in_array($project_id,$project_arr)): ?><?php echo e('مستفيد'); ?><?php else: ?><?php echo e('غير مستفيد'); ?><?php endif; ?>"
                                                   type="text" readonly class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-10">
                                            <label for="project_name" class="col-form-label">اسم المشروع</label>
                                            <input name="project_name" value="<?php echo e($project_name); ?>" type="text" readonly
                                                   class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!--<h4 class="inner-h4">
                <?php if($type == 1): ?>
            ثانياً: تفاصيل الشكوى:
<?php elseif($type == 2): ?>
            ثانياً: تفاصيل الاقتراح:
<?php else: ?>
            <?php endif; ?>
            </h4>-->
            <!--first row  -->
            <!--<style>
               /* .form-group.row {
                    display: flex;
                    flex-flow: row-reverse;
                }
             .form-group.column-flex {
                    display: flex;
                    flex-flow: column;
                }*/
                @media (max-width: 800px){
                  /*  .form-group.row {
                        display: flex;
                        flex-flow: column;
                    }
                }*/
                .col-form-label{
                    float: right;
                }
            </style>-->
            <?php
            if ($type != 1 && $type != 2)  // type compaint of suggestion ...
                $type = 3;
            ?>
        <!--   <h5 style="font-size:16px;line-height: 1.8;">
                        <?php if($type==1): ?>
            نأسف للازعاج والمشاكل التي تم التسبب بها , الرجاء القيام بشرح المشكلة التي تواجهها , مع العلم أننا سوف
            نقوم بأخذ مشكلتك على محمل الجد وسيتم الرد عليك في أسرع وقت
<?php elseif($type==2): ?>
            أخي المواطن ، يمكنك من هناك إرسال للاقتراحات لتحسين خدماتنا ، مع العلم أنه سيتم أخذ الاقتراحات على محمل
            الجد ومراجعتها
<?php else: ?>
            نفتخر بأننا كنا عند حسن ظنكم يمكنكم من خلال هذا النموذج ارسال رسائل الشكر للقائمين على خدمات المواطنين
<?php endif; ?>
            </h5>-->

            
            
            
            
            


            <div class="row">
                <div class="col-sm-12">
                    <?php if(Session::get("msg")): ?>
                        <?php
                        $msg = Session::get("msg");
                        $msgClass = "alert-info";
                        $first2letters = strtolower(substr($msg, 0, 2));
                        if ($first2letters == "s:") {
                            //قص اول حرفين
                            $msg = substr($msg, 2);
                            $msgClass = "alert-success";
                        } else if ($first2letters == "i:") {
                            $msg = substr($msg, 2);
                            $msgClass = "alert-info";
                        } else if ($first2letters == "w:") {
                            $msg = substr($msg, 2);
                            $msgClass = "alert-warning";
                        } else if ($first2letters == "e:") {
                            $msg = substr($msg, 2);
                            $msgClass = "alert-danger";
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-3"></div>

                            <div class="col-md-6">
                                <div class="alert alert-danger <?php echo e($msgClass); ?> alert-dismissible">
                                    <ul>
                                        <li><?php echo e($msg); ?> </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="col-md-12 col-12">
                <div class="inner-card inner-card-user">
                    <div class="inner-card-header">
                        <div class="inner-card-title">
                            <?php if($type == 1): ?>
                                ثانياً: تفاصيل الشكوى:
                            <?php elseif($type == 2): ?>
                                ثانياً: تفاصيل الاقتراح:
                            <?php else: ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="inner-card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form id="form2" action="/forms/formsavenew" method="POST"
                                              class="form-horizontal" enctype="multipart/form-data"
                                              autocomplete="off"> <?php echo csrf_field(); ?>
                                        <!--<div class="col-sm-12"><br></div>-->
                                            <input type="hidden" name="project_id" value="<?php echo e($project_id); ?>">
                                            <input type="hidden" name="datee" value="<?php echo date("Y/m/d") ?>">
                                            <input type="hidden" name="citizen_id" value="<?php echo e($citzen_id); ?>">
                                            <input type="hidden" name="type" value="<?php echo e($type); ?>">
                                            <input type="hidden" name="hide_data" value="<?php echo e($hide_data); ?>">
                                            <input type="hidden" name="private_contact_option" value="<?php echo e($private_contact_option); ?>">
                                            <input type="hidden" name="private_email" value="<?php echo e($private_email); ?>">
                                            <input type="hidden" name="private_mobile" value="<?php echo e($private_mobile); ?>">

                                            <!--  -->
                                            <?php if(auth()->user()): ?>
                                                <div class="form-group row column-flex">
                                                    <div class="col-sm-4">
                                                        <label for="sent_type" class="col-form-label">آلية
                                                            الاستقبال</label>
                                                        <select
                                                            class="form-control <?php echo e(($errors->first('sent_type') ? " form-error" : "")); ?>"
                                                            id="sent_type_sel1" name="sent_type"
                                                            onchange="getsent_type()">
                                                            <option value=""> اختر آلية الاستقبال</option>
                                                            <?php $__currentLoopData = $sent_typee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                <option value="<?php echo e($sent_type->id); ?>"
                                                                        <?php if(old("sent_type")==$sent_type->id): ?>selected
                                                                        <?php elseif(app('request')->input('sent_type') && app('request')->input('sent_type') ==$sent_type->id): ?>selected <?php endif; ?>><?php echo e($sent_type->name); ?></option>

                                                                
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php echo $errors->first('sent_type', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="datee" class="col-form-label">تاريخ تقديم
                                                            ال<?php echo e($form_type->find($type)->name); ?> </label>
                                                        <input type="date" class="form-control" name="datee"
                                                               value="<?php echo e(old('datee')); ?>"/>
                                                        <?php echo $errors->first('datee', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                    <?php if($type==1): ?>
                                                        <div class="col-md-4">
                                                            <label for="category_id" class="col-form-label">فئة
                                                                الشكوى</label>
                                                            <select id="category"
                                                                    class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>"
                                                                    id="sel1" name="category_id">
                                                                <option value="">اختر فئة الشكوى</option>
                                                                <?php echo e($project_id); ?>

                                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($project_id>1): ?>
                                                                        <?php if($cat->benefic_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 0): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($project_id==1): ?>
                                                                        <?php if($cat->citizen_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 0): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php echo $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                        </div>
                                                    <?php elseif($type == 2): ?>
                                                        <div class="col-md-4">
                                                            <label for="category_id" class="col-form-label">فئة
                                                                الاقتراح</label>
                                                            <select id="category"
                                                                    class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>"
                                                                    id="sel1" name="category_id">
                                                                <option value=""> اختر فئة الاقتراح</option>
                                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    <?php if($project_id>1): ?>
                                                                        <?php if($cat->benefic_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 1): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($project_id==1): ?>
                                                                        <?php if($cat->citizen_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 1): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php echo $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                    <?php else: ?>
                                                        <div style="margin-right:-20px;" class="form-group">
                                                            <input type="hidden" name="category_id" value="1">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group row" id="type_of_box_div"
                                                     style="display: none !important;">
                                                    <div class="col-md-4">
                                                        <label for="box_place" class="col-form-label">مكان تواجد
                                                            الصندوق</label>
                                                        <input id="box_place" type="text"
                                                               class="form-control <?php echo e(($errors->first('box_place') ? " form-error" : "")); ?>"
                                                               value="<?php echo e(old("box_place")); ?>"
                                                               name="box_place">
                                                        <?php echo $errors->first('box_place', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="number_of_open_box" class="col-form-label">رقم
                                                            اجتماع فتح الصندوق</label>
                                                        <input id="number_of_open_box" type="text"
                                                               class="form-control <?php echo e(($errors->first('number_of_open_box') ? " form-error" : "")); ?>"
                                                               value="<?php echo e(old("number_of_open_box")); ?>"
                                                               name="number_of_open_box">
                                                        <?php echo $errors->first('number_of_open_box', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="date_open_box" class="col-form-label">تاريخ فتح
                                                            الصندوق</label>
                                                        <input type="date" class="form-control" name="date_open_box"
                                                               value="<?php echo e(old('date_open_box')); ?>"/>
                                                        <?php echo $errors->first('date_open_box', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>
                                                </div>

                                                <div class="form-group row column-flex" id="type_of_followup_visit_div"
                                                     style="display: none !important;">
                                                    <div class="col-md-4">
                                                        <label for="type_of_followup_visit" class="col-form-label">نوع
                                                            زيارة المتابعة</label>
                                                        <input id="type_of_followup_visit" type="text"
                                                               class="form-control <?php echo e(($errors->first('type_of_followup_visit') ? " form-error" : "")); ?>"
                                                               value="<?php echo e(old("type_of_followup_visit")); ?>"
                                                               name="type_of_followup_visit">
                                                        <?php echo $errors->first('type_of_followup_visit', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>

                                                </div>

                                            <?php else: ?>
                                                <div class="form-group row column-flex">
                                                    <?php if($type==1): ?>
                                                        <div class="col-md-4">
                                                            <label for="category_id" class="col-form-label">فئة
                                                                الشكوى</label>
                                                            <select id="category"
                                                                    class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>"
                                                                    id="sel1" name="category_id">
                                                                <option value="">اختر فئة الشكوى</option>
                                                                <?php echo e($project_id); ?>

                                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($project_id>1): ?>
                                                                        <?php if($cat->benefic_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 0): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($project_id==1): ?>
                                                                        <?php if($cat->citizen_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 0): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php echo $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                        </div>
                                                    <?php elseif($type == 2): ?>
                                                        <div class="col-md-4">
                                                            <label for="category_id" class="col-form-label">فئة
                                                                الاقتراح</label>
                                                            <select id="category"
                                                                    class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>"
                                                                    id="sel1" name="category_id">
                                                                <option value=""> اختر فئة الاقتراح</option>
                                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    <?php if($project_id>1): ?>
                                                                        <?php if($cat->benefic_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 1): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($project_id==1): ?>
                                                                        <?php if($cat->citizen_show==0): ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                        <?php if($cat->is_complaint != 1): ?>
                                                                            <option value="<?php echo e($cat->id); ?>"
                                                                                    <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php echo $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>'); ?>


                                                        </div>
                                                    <?php else: ?>
                                                        <div style="margin-right:-20px;" class="form-group">
                                                            <input type="hidden" name="category_id" value="1">
                                                        </div>
                                                    <?php endif; ?>
                                                    <input type="hidden" name="sent_type" value="1">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group row column-flex">
                                                    <div class="col-md-10">
                                                        <label for="content" class="col-form-label">محتوى
                                                            ال<?php echo e($form_type->find($type)->name); ?></label>
                                                        <textarea id="content"
                                                                  placeholder="<?php if($type == 1): ?><?php echo e('الرجاء كتابة تفاصيل الشكوى بصورة واضحة في أقل من 300 كلمة'); ?><?php elseif($type == 2): ?><?php echo e('الرجاء كتابة تفاصيل الاقتراح بصورة واضحة في أقل من 300 كلمة'); ?><?php endif; ?>"
                                                                  class="form-control <?php echo e(($errors->first('content') ? " form-error" : "")); ?>"
                                                                  rows="6" id="comment"
                                                                  name="content"><?php echo e(old("content")); ?></textarea>

                                                        <?php echo $errors->first('content', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>


                                                </div>


                                                <div class="form-group row column-flex">
                                                    <div class="col-md-4">
                                                        <label for="fileinput" class="col-form-label">تحميل
                                                            المرفقات</label>
                                                        <input style="margin-left:-20px;" type="file"
                                                               class="form-control"
                                                               name="fileinput">
                                                        <?php echo $errors->first('fileinput', '<p class="help-block" style="color:red;">:message</p>'); ?>

                                                    </div>

                                                </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row" align="center" style="text-align: center;">
                    <div class="col-sm-12 text-center">
                        <button type="submit" id="submitBtn" class="wow bounceIn btn btn-info btn-md"
                                style="background-color:#BE2D45;border:0;">
                            إرسال <?php echo e($form_type->find($type)->name); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--****************************************************** start footer **************************************************************-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        function phonenumber(inputtxt, id) {
            // regular expression pattern
            var regexPattern = new RegExp(/^(059|056)[0-9-+]+$/);

            console.log(inputtxt);
            if (id == 2 && !(inputtxt.length === 0)) {
                if (regexPattern.test(inputtxt) && inputtxt.length == 10) {
                    $('#lblError' + id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                } else {
                    $('#lblError' + id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            } else if (id == 1) {
                if (regexPattern.test(inputtxt) && inputtxt.length == 10) {
                    $('#lblError' + id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                } else {
                    $('#lblError' + id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            }
        }
    </script>

    <script>
        $(document).ready(function () {

            var xx = $('#sent_type_sel1').val();

            if (xx == 4) {
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            } else if (xx == 5) {
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            } else {
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

            $('#submitBtn').on('click', function () {
                $('#form1').submit();
                console.log("submitted 1");

                setTimeout(function () {
                    $('#form2').submit();
                    console.log("submitted 2");
                }, 100);


            });

        });
    </script>

    <script>
        function getsent_type() {
            var xx = $('#sent_type_sel1').val();

            if (xx == 4) {
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            } else if (xx == 5) {
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            } else {
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>