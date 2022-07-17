<?php $__env->startSection("title", "إدارة مستفيدي المشاريع"); ?>

<?php $__env->startSection("content"); ?>
<!--<div class="row">
        <div class="col-md-9">
          <h4>هذه الواجهة مخصصة للتحكم في إدارة مستفيدي مشاريع المركز</h4><br>
        </div>

        <?php if(check_permission('إضافة مستفيدين جدد')): ?>
            <div class="col-sm-2">
                <a class="btn btn-success" style="width:150px;" href="/account/citizen/create"><span class="glyphicon glyphicon-plus" style="margin-left: 5px;" aria-hidden="true"></span>إضافة مستفيد جديد</a>
            </div>
        <?php endif; ?>
	<br>
</div>-->

    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
                                هذه الواجهة مخصصة للتحكم في إدارة مستفيدي مشاريع المركز
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
              <form autocomplete="off">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" value="excel" class="btn btn-primary adv-export-btnn" id="excel_b" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
                </div>
                </div>
                </div>
<div class="row filter-div">
               <div class="col-sm-2">
                   <div class="form-group adv-searchh">
                          <input type="text" class="form-control" name="id" value="" placeholder="رقم طلب المشروع" >
                   </div>
               </div>
               <div class="col-sm-2">

                    <div class="form-group adv-searchh" >
                      <input type="text" class="form-control" name="id_number" value="" placeholder="رقم الهوية" >
                    </div>
                    </div>
               <div class="col-sm-2">
                    <div class="form-group adv-searchh" >
                      <input type="text" class="form-control" name="first_name" value="" placeholder="اسم المستفيد" >
                    </div>
               </div>
               <div class="col-sm-2">
                 <div class="form-group adv-searchh" >
                    <select class="form-control" name="governorate">
                        <option value=""> المحافظة</option>
                        <option value="شمال غزة" <?php echo e(old('governorate')=='شمال غزة'?"selected":""); ?>>شمال غزة</option>
                        <option value="غزة" <?php echo e(old('governorate')=='غزة'?"selected":""); ?>>غزة</option>
                        <option value="الوسطى" <?php echo e(old('governorate')=='الوسطى'?"selected":""); ?>>الوسطى</option>
                        <option value="خانيونس" <?php echo e(old('governorate')=='خانيونس'?"selected":""); ?>>خانيونس</option>
                        <option value="رفح" <?php echo e(old('governorate')=='رفح'?"selected":""); ?>>رفح</option>
                    </select>
                </div>
                </div>
               <div class="col-sm-2">

                <div class="form-group adv-searchh" >
                      
                      <select class="form-control" name="project">
                        <option value=""> اسم المشروع</option>

                      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    </div>
                    </div>

               <div class="col-sm-2">
                 <div class="form-group">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh" style="width:110px;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                 </div>
               </div>
</div>
        </form>
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
    <?php if($items->count()>0): ?>
<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم طلب المشروع</th>
                <th>اسم المستفيد </th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th>رقم التواصل(1)</th>
                <th>رقم التواصل (2)</th>
                <th>اسم المشروع</th>
                <th> التفاصيل ذات العلاقة بالمستفيد</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($loop->iteration); ?> </td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->project_request ? $a->project_request :'-'); ?></td>
                    <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name); ?></td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->id_number); ?></td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->governorate); ?></td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr"><?php echo e($a->mobile); ?></td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr"><?php echo e($a->mobile2 ? $a->mobile2 : '-'); ?></td>
                    <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr"><?php echo e($a->name); ?></td>
                    <td style="text-align: center">
                        <?php if(check_permission('تبويب الاقتراحات والشكاوى')): ?>
                        <a class="btn btn-xs btn-success" href="/account/citizen/formincitizen/<?php echo e($a->id); ?>">الاقتراحات/الشكاوى</a>
                        <?php endif; ?>








                        <?php if(check_permission('تعديل بيانات المستفيد')): ?>
                            <a class="btn btn-xs btn-primary blue-btn" title="تعديل" href="/account/citizen/<?php echo e($a->id); ?>/edit"><i
                                        class="fa fa-edit"></i></a>
                        <?php endif; ?>

                        <?php if(check_permission('حذف المستفيد')): ?>
                            <a class="btn btn-xs Confirm btn-danger red-btn" title="حذف" href="/account/citizen/delete/<?php echo e($a->project_request_id); ?>"><i
                                    class="fa fa-trash"></i></a>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>


        </table>

</div>
<br>
      <div style="float:left" >  <?php echo e($items->links()); ?> </div>
        <br> <br><br>

    <?php else: ?>

        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>


    <?php endif; ?>

        <?php else: ?>
<div class="table-responsive">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم طلب المشروع </th>
                <th>اسم المستفيد</th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th>رقم التواصل(1)</th>
                <th>رقم التواصل (2)</th>
                <th>اسم المشروع</th>
                <th> التفاصيل ذات العلاقة بالمستفيد</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

</div>

    <?php endif; ?>
</div></div></div></div></div></div>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true" style=" position: absolute;left: 42%;top: 40%;transform: translate(-50%, -50%);">
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

        $('#excel_b').click(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var uri = window.location.toString();
            var fullUrl = window.location.href;
            if (uri.indexOf("?") > 0) {
                formData += "&theaction=" + encodeURIComponent('excel');
                var finalUrl = fullUrl + "&" + formData;
            } else {
                var finalUrl = fullUrl + "?theaction=excel";
            }

            window.location.href = finalUrl;

        });
    </script>

    <script>
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>

    <script>

        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                $.ajax({
                        url:"/account/citizen/accept/" + id,
                    data:{_token:'<?php echo e(csrf_token()); ?>'},
                error : function (jqXHR, textStatus, errorThrown) {
        // User Not Logged In
        // 401 Unauthorized Response
         window.location.href = "/account/citizen";
    },
                });
            });
        });

    </script>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function(){
            $('.adv-searchh').slideToggle("fast");
        });
    </script>

    <script>

        jQuery(document).ready(function(){
            jQuery('input').keypress(function(event){
                var enterOkClass =  jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>