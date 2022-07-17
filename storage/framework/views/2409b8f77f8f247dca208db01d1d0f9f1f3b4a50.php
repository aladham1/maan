<?php $__env->startSection("title", "ملاحق ذات علاقة بمتطلبات النظام "); ?>

<?php $__env->startSection("content"); ?>


    <?php if(check_permission('إضافة ملحق')): ?>
       <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة لتعريف الملاحق ذات العلاقة بمتطلبات النظام
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
              <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card card-table">
                <div class="card-body">
            <h4>
                <button type="button" style="height:30px !important;width: 30px !important;margin-left: 10px;" class="btn btn-primary msg-btn add-btn">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
 يمكنك من خلال هذه الواجهة تعريف الملاحق ذات العلاقة بمتطلبات النظام
 </h4>
     <div class="row msg" style="">
        <div class="col-sm-12">
        <hr>
            <form method="post" action="/account/appendix" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="appendix_name" class="col-form-label">اسم الملحق:</label>
                        <input type="text" class="form-control <?php echo e(($errors->first('appendix_name') ? " form-error" : "")); ?>" value="" id="appendix_name" name="appendix_name">
                        <?php echo $errors->first('appendix_name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                    <div class="col-sm-3">
                        <label for="appendix_describe" class="col-form-label">وصف عن الملحق: </label>

                        <input type="text" class="form-control <?php echo e(($errors->first('appendix_describe') ? " form-error" : "")); ?>" value="" id="appendix_describe"
                               name="appendix_describe">
                        <?php echo $errors->first('appendix_describe', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>

                <div class="col-sm-3">
                        <label for="" class="col-form-label"> رفع الملحق:</label>
                        <input type="file" class="form-control <?php echo e(($errors->first('appendix_file') ? " form-error" : "")); ?>" value="" id="appendix_file" name="appendix_file">
                        <?php echo $errors->first('appendix_file', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                </div>

                <div class="form-group row" align="left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="إضافة"/>
                        <a href="appendix" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php endif; ?>

<div class="row" style="margin-top: 20px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    <?php if($items): ?>
        <?php if($items->count()>0): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 30px;word-break: normal;">#</th>
                        <th style="max-width: 100px;word-break: normal;">اسم الملحق</th>
                        <th style="max-width: 100px;word-break: normal;">وصف الملحق</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ تحديث الملحق</th>
                        <th style="word-break: normal;">تفاصيل ذات علاقة بالملحق</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($a->id): ?>
                            <tr>
                                <td style="word-break: normal;"><?php echo e($a->id); ?></td>
                                <td style="word-break: normal;"><?php echo e($a->appendix_name); ?></td>
                                <td style="max-width: 250px;word-break: normal;"><?php echo e($a->appendix_describe); ?></td>
                                <td style="max-width: 60px;word-break: normal;"><?php echo e($a->updated_at); ?></td>
                                <td style="text-align: center;">
                                    <a class="btn btn-xs btn-primary show-btn"  target="_blank"
                                       href="<?php echo e(route('appendixshow', $a->id)); ?>" title="معاينة">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>

                                    <?php if(check_permission('تعديل ملحق')): ?>
                                    <a class="btn btn-xs btn-primary" title="تعديل"
                                       href="/account/appendix/edit/<?php echo e($a->id); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(check_permission('حذف ملحق')): ?>
                                    <a class="btn btn-xs Confirm btn-danger"
                                       href="/account/appendix/delete/<?php echo e($a->id); ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="float:left; ">  <?php echo e($items->links()); ?> </div>
        <?php else: ?>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        <?php endif; ?>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 30px;word-break: normal;">#</th>
                    <th style="max-width: 100px;word-break: normal;">اسم الملحق</th>
                    <th style="max-width: 100px;word-break: normal;">وصف الملحق</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ تحديث الملحق</th>
                    <th style="word-break: normal;">تفاصيل ذات علاقة بالملحق</th>
                </tr>
                </thead>
            </table>
        </div>
    <?php endif; ?>
       </div>
 </div>
    </div>
    </div>

    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
    <script>
        $('.msg').hide();
        $('.msg-btn').click(function () {

            $('.msg').slideToggle("fast", function () {
                if ($('.msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });


        $(".msg form :input").each(function(){
            if( $(this).hasClass( "form-error" )){
                $('.msg').show();
            }
        });



    </script>
    <script>
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>