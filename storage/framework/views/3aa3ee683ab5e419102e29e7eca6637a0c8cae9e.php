<?php $__env->startSection("title", "متابعة الاقتراحات والشكاوى"); ?>


<?php $__env->startSection("content"); ?>
<section class="container-fluid login-wrap">
             <div class="login-form">

            <h1 class="wow bounceIn inner-h1">
                أهلا بك عزيزي المواطن
               <!--<hr class="h1-hr">-->
            </h1>
            <h5 class="inner-h5">الرجاء تحديد نوع الطريقة التي تريد البحث من خلالها</h5>
            <form class="" action="/citizen/form/getforms" method="get" autocomplete="off">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-12 form-label" for="email">البحث عن
                            طريق</label>

                        <select class="input2" class="form-control input <?php echo e(($errors->first('type') ? " form-error" : "")); ?>" id="id"
                                name="type">
                            <option value="">اختر طريقة البحث</option>
                            <option class="input" value="2" style="margin:5px 0px;">رقم الهوية</option>
                            <option class="input" value="1" style="margin:5px 0px;">الرقم المرجعي للاقتراح/ الشكوى</option>
                        </select>


                        

                    </div>
                </div>
                <div class="row">
                    <div id="body">
                        <div class="col-sm-12" id="div1">
                            <input class="input2" id="sample" name="sample" style="display: none;margin-bottom:20px;margin-top:20px;"
                                   placeholder="الرجاء ادخال الرقم المرجعي للاقتراح/ الشكوى " type="text"
                                   class="form-control input <?php echo e(($errors->first('sample') ? " form-error" : "")); ?>">
                            

                            <input class="input2" id="mo" name="id" style="display: none;margin-bottom:20px;margin-top:20px;" maxlength="9"
                                   placeholder="الرجاء ادخال الهوية " type="text"
                                   class="form-control input <?php echo e(($errors->first('id') ? " form-error" : "")); ?>">
                            
                        </div>
                    </div>
                </div>
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="help-block" style="color:red;"> <?php echo e($error); ?> </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
                <script>
                    $('#id').change(function () {

                        if ($(this).val() == '1') {
                            $("#mo").css("display", "none");
                            $("#sample").css("display", "block");
                        } else if ($(this).val() == '2') {
                            $("#mo").css("display", "block");
                            $("#sample").css("display", "none");
                        } else {
                            $("#mo").css("display", "none");
                            $("#sample").css("display", "none");
                        }

                    });
                </script>
                <div class="form-group row" align="center">
                    <label class="col-sm-4 col-form-label form-control-label"></label>

                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-primary wow bounceIn btn-style" value="التالي ">
                    </div>
                </div>
            </form>
            </div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>