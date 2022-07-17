<?php $__env->startSection("title", "اضافة نموذج "); ?>


<?php $__env->startSection("content"); ?>
    <!--first row  -->
    <style>
        .form-group.row {
            display: flex;
        }
        .col-form-label{
            float: right;
        }
    </style>
    <?php
    if ($type != 1 && $type != 2)  // type compaint of suggestion ...
        $type = 3;
    ?>
    <div class="row">
        <h1 style="margin-top:120px;margin-bottom:20px;">تقديم
            <?php echo e($form_type->find($type)->name); ?><hr class="h1-hr" style="margin-right: 10px;"></h1>

    </div><br>
    <div class="row">
        <div class="col-md-12">
            <?php if($type == 1): ?>
                <h4>ثانياً: تفاصيل الشكوى: </h4>
            <?php elseif($type == 2): ?>
                <h4>ثانياً: تفاصيل الاقتراح: </h4>
            <?php else: ?>
                <h4></h4>
            <?php endif; ?>
        </div>
    </div>
    <div style="margin-top:-50px;line-height: 1.8;" class="row">
        <h5 style="font-size:16px;">
            <?php if($type==1): ?>
                نأسف للازعاج والمشاكل التي تم التسبب بها , الرجاء القيام بشرح المشكلة التي تواجهها , مع العلم أننا سوف
                نقوم بأخذ مشكلتك على محمل الجد وسيتم الرد عليك في أسرع وقت
            <?php elseif($type==2): ?>
                أخي المواطن ، يمكنك من هناك إرسال للاقتراحات لتحسين خدماتنا ، مع العلم أنه سيتم أخذ الاقتراحات على محمل
                الجد ومراجعتها
            <?php else: ?>
                نفتخر بأننا كنا عند حسن ظنكم يمكنكم من خلال هذا النموذج ارسال رسائل الشكر للقائمين على خدمات المواطنين
            <?php endif; ?>
        </h5>
        <br>
        <h4><B>المواطن : </B><?php echo e($citizen_name); ?></h4>
        <h4><B>المشروع : </B><?php echo e($project_name); ?></h4>

    </div>

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
            <div class="col-sm-3"></div>

            <div class="col-sm-6">
                <div class="alert alert-danger <?php echo e($msgClass); ?> alert-dismissible">
                    <ul>
                        <li><?php echo e($msg); ?> </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          <div class="col-sm-3"></div>

        </div>
    <?php endif; ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <form action="/forms/formsavenew"  method="POST"
          class="form-horizontal" enctype="multipart/form-data" id="addformid"> <?php echo csrf_field(); ?>
        <div class="col-sm-12"><br></div>
        <input type="hidden" name="project_id" value="<?php echo e($project_id); ?>">
        <input type="hidden" name="datee" value="<?php echo date("Y/m/d") ?>">
        <input type="hidden" name="citizen_id" value="<?php echo e($citzen_id); ?>">
        <input type="hidden" name="type" value="<?php echo e($type); ?>">

        <!--  -->
        <?php if(auth()->user()): ?>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="sent_type"  class="col-sm-4 col-form-label">قنوات الاستقبال</label>
                    <select class="form-control <?php echo e(($errors->first('sent_type') ? " form-error" : "")); ?>" id="sent_type_sel1" name="sent_type" onchange="getsent_type()">
                        <option value=""> اختر نوع الاستقبال</option>
                        <?php $__currentLoopData = $sent_typee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($sent_type->id != 1 && $sent_type->id != 6): ?>
                            <option value="<?php echo e($sent_type->id); ?>"
                                    <?php if(old("sent_type")==$sent_type->name): ?>selected <?php endif; ?>><?php echo e($sent_type->name); ?></option>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php echo $errors->first('sent_type', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>
            </div>

            <div class="form-group row" id="type_of_box_div" style="display: none !important;">
                <div class="col-sm-4">
                    <label for="box_place"  class="col-sm-6 col-form-label">مكان تواجد الصندوق</label>
                    <input id="box_place" type="text" class="form-control <?php echo e(($errors->first('box_place') ? " form-error" : "")); ?>" value="<?php echo e(old("box_place")); ?>"
                           name="box_place">
                    <?php echo $errors->first('box_place', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>

                <div class="col-sm-4">
                    <label for="number_of_open_box"  class="col-sm-6 col-form-label">رقم اجتماع فتح الصندوق</label>
                    <input id="number_of_open_box" type="text" class="form-control <?php echo e(($errors->first('number_of_open_box') ? " form-error" : "")); ?>" value="<?php echo e(old("number_of_open_box")); ?>"
                           name="number_of_open_box">
                    <?php echo $errors->first('number_of_open_box', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>

                <div class="col-sm-4">
                    <label for="box_place"  class="col-sm-6 col-form-label">تاريخ فتح الصندوق</label>
                    <input type="text" class="form-control datepicker" name="date_open_box"  value="<?php echo e(old('date_open_box')); ?>" />
                    <?php echo $errors->first('box_place', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>
            </div>

            <div class="form-group row" id="type_of_followup_visit_div" style="display: none !important;">
                <div class="col-sm-6">
                    <label for="type_of_followup_visit"  class="col-sm-4 col-form-label">نوع زيارة  المتابعة</label>
                    <input id="type_of_followup_visit" type="text" class="form-control <?php echo e(($errors->first('type_of_followup_visit') ? " form-error" : "")); ?>" value="<?php echo e(old("type_of_followup_visit")); ?>"
                            name="type_of_followup_visit">
                    <?php echo $errors->first('type_of_followup_visit', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="datee"  class="col-sm-4 col-form-label">تاريخ تقديم <?php echo e($form_type->find($type)->name); ?></label>
                    <input type="text" class="form-control datepicker" name="datee"  value="<?php echo e(old('datee')); ?>" />
                    <?php echo $errors->first('datee', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>
            </div>

        <?php else: ?>
            <input type="hidden" name="sent_type" value="1">
        <?php endif; ?>

    <?php if($type==1): ?>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="category_id"  class="col-sm-4 col-form-label">فئات الشكوى</label>

                    <select id="category" class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>" id="sel1" name="category_id">
                        <option value="">اختر فئة الشكوى </option>

                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($project_id>1): ?>
                                <?php if($cat->benefic_show==0): ?>
                                    <?php continue; ?>
                                <?php endif; ?>
                                <?php if($cat->is_complaint != 0): ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php if(old("category_id")==$cat->id): ?>selected <?php endif; ?>><?php echo e($cat->name); ?></option>
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
            </div>

        <?php elseif($type == 2): ?>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="category_id"  class="col-sm-4 col-form-label">فئة الاقتراح</label>
                <select id="category" class="form-control <?php echo e(($errors->first('category_id') ? " form-error" : "")); ?>" id="sel1" name="category_id">
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
        </div>
        <?php else: ?>
            <div style="margin-right:-20px;" class="form-group">
                <input type="hidden" name="category_id" value="1">
            </div>

        <?php endif; ?>

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="title"  class="col-sm-4 col-form-label">موضوع <?php echo e($form_type->find($type)->name); ?></label>
                <input id="title" type="text" class="form-control <?php echo e(($errors->first('title') ? " form-error" : "")); ?>" value="<?php echo e(old("title")); ?>"
                       placeholder="الموضوع" name="title">
                <?php echo $errors->first('title', '<p class="help-block" style="color:red;">:message</p>'); ?>

            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="content"  class="col-sm-4 col-form-label">محتوى <?php echo e($form_type->find($type)->name); ?></label>
                <textarea id="content" placeholder="<?php if($type == 1): ?><?php echo e('الرجاء كتابة تفاصيل الشكوى بصورة واضحة في أقل من 300 كلمة'); ?><?php elseif($type == 2): ?><?php echo e('الرجاء كتابة تفاصيل الاقتراح بصورة واضحة في أقل من 300 كلمة'); ?><?php endif; ?>" class="form-control <?php echo e(($errors->first('content') ? " form-error" : "")); ?>"
                          rows="6" id="comment" name="content"><?php echo e(old("content")); ?></textarea>

                <?php echo $errors->first('content', '<p class="help-block" style="color:red;">:message</p>'); ?>

            </div>
        </div>


        <div class="form-group row" style="margin-top: 45px;">
            <div class="col-sm-6">
                <label for="fileinput"  class="col-sm-4 col-form-label">تحميل المرفقات</label>
                <input style="margin-left:-20px;" type="file" class="form-control" name="fileinput">
                <?php echo $errors->first('fileinput', '<p class="help-block" style="color:red;">:message</p>'); ?>

            </div>
        </div>

        <br>
        <hr>
        <div class="form-group row" align="right">
            <div class="col-sm-4">
                <input type="button" name="btn"
                       value="    إرسال <?php echo e($form_type->find($type)->name); ?>

                           " id="submitBtn" data-toggle="modal" data-target="#confirm-submit"
                       style="border:0;width: 100%; background-color:#BE2D45;"
                       class="wow bounceIn btn btn-info btn-md"/>
            </div>
        </div>

    </form>
        </div>
    </div>
    <div class="modal" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="confirm-submitLabel" aria-hidden="true">
    <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <span style="color:#4cae4c;">&#10003;</span>
                        تأكيد إرسال نموذج
                    </div>
                    <div class="modal-body">
                        <p><B>فئة <?php echo e($form_type->find($type)->name); ?>: </B>
                            <span id="category2"> </span></p>
                        <p><B>عنوان <?php echo e($form_type->find($type)->name); ?>: </B>
                            <span id="title2"> </span></p>
                        <p><B>المحتوى:<p id="content2"></p>


                        <!-- We display the details entered by the user here -->
                          <p class="text-center text-justify">
                                     <b style="color:red;">تأكيد:</b>
                                     لا مانع لدي من مشاركة معلوماتي لدى الجهة المخولة في معالجة الشكاوى والاقتراحات (ستبقى معلوماتك سرية أثناء معالجتها)
                          </p>
                        <!-- We display the details entered by the user here -->

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">رجوع</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#check-submit">لا أوافق</button>
                        <button  type="submit" id="submit" class="btn btn-success success">تأكيد</button>
                    </div>
                </div>
            </div>
        </div>
       <div class="modal fade" id="check-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <span style="color:#4cae4c;">&#10003;</span>
                        تأكيد إرسال نموذج
                    </div>
                    <div class="modal-body">


                        <!-- We display the details entered by the user here -->
                        <p class="text-center text-justify">  سوف تبقى معلوماتك سرية أثناء مراجعة النموذج ولن تظهر إلا للتواصل معك وإعطائك الرد </p>

                        <!-- We display the details entered by the user here -->

                    </div>

                    <div class="modal-footer">
                        <button href="#" id="submit" class="btn btn-default" data-dismiss="modal">حسناً</button>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function  getsent_type() {
            var xx = $('#sent_type_sel1').val();

            if(xx == 4){
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            }else if(xx == 5){
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            }else{
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>