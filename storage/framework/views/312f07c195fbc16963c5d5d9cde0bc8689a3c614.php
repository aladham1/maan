<?php $__env->startSection("title", "متابعة نموذج "); ?>


<?php $__env->startSection("content"); ?>
<section class="container-fluid login-wrap">
    <div class="login-form">
         <h1 class="wow bounceIn inner-h1">
         رقم الهوية
         </h1>
        <h5>عزيزي المواطن: يرجى إدخال رقم هويتك في المكان المخصص</h5>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12" style="margin:auto;">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible alert-id">
                                    <ul style="margin: 0;">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form class="" action="/citizen/getproject" method="get" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="<?php echo e($type); ?>">
                        <div class="form-group row" align="center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="number" onfocus="this.value=''" class="form-control input2" id=""
                                           placeholder="أدخل رقم الهوية" maxlength="9" name="id_number" onKeyPress="if(this.value.length==9) return false;" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row  btn-check" align="center">
                            <label class="col-lg-1 col-form-label form-control-label form-label"></label>
                            <div class="col-lg-12">
                                <input type="submit"
                                       class="btn btn-primary wow bounceIn btn-style" value="فحص">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>

    <script>
        function submitForm(form) {
            var url = form.attr("action");
            var formData = {};
            $(form).find("input[name]").each(function (index, node) {
                formData[node.name] = node.value;
            });
            $.post(url, formData).done(function (data) {
                alert(data);
            });
        }

        // $(document).ready(function () {
        //     $("#search_number").click(function(){
        //         $.ajax({
        //             url: 'citizen/getproject',
        //             type: 'get',
        //             data: [
        //                 $('#type').val(),
        //                 $('#id_number').val(),
        //             ]
        //         })
        //     })
        // });
    </script>
    <!--****************************************************** start footer **************************************************************-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>