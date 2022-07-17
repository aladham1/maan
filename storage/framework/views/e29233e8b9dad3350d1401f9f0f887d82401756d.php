<?php $__env->startSection("title", " توصيات مستخدمي النظام"); ?>


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
يمكنك من خلال هذه الواجهة الاطلاع على توصيات مستخدمي النظام ذات العلاقة بالاقتراحات والشكاوى
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
            <form>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" value="excel" class="btn btn-primary adv-export-btnn" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
        </div>
                </div>
                </div>
    <div class="form-group row filter-div" style="margin-bottom: 0px;">

                    <div class="col-sm-3 adv-search">
                        <label for="account_id">اسم المستخدم</label>
                        <select name="account_id" class="form-control">
                            <option value="" selected>اسم المستخدم</option>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('account_id')===''.$account->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="project_id">اسم المشروع</label>
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <option value="-1" <?php if(request('project_id')==='-1'): ?>selected
                                <?php endif; ?>>جميع المشاريع
                            </option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code." ".$project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ </label>
                        <input type="date" class="form-control" name="from_date"
                               value="<?php echo e(request('from_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ </label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>


                </div>
                  <div class="row">
                <div class="col-sm-3 col-sm-offset-9 adv-search" style="text-align: left;">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh" style="width: 110px;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>
            </form>

<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <?php if($items): ?>
        <?php if($items->count()>0): ?>
            <div class="table-responsive">

                <table class="table table-hover table-striped"
                       style="white-space:normal;">
                    <thead>
                    <tr>
                        <th style="word-break: normal;">#</th>
                        <th style="max-width: 250px;word-break: normal;">اسم المستخدم</th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                        <th style="max-width: 150px;word-break: normal;">تاريخ رفع التوصيات</th>
                        <th style="max-width: 100px;word-break: normal;">التوصيات</th>
                        <th style="max-width: 110px;word-break: normal;text-align: center;"> تفاصيل ذات علاقة
                            بالتوصيات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($k+1); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->user->name); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->form->project->name); ?></td>
                                <td style="max-width: 100px;word-break: normal;"><?php echo e($a->created_at); ?></td>
                                <td style="max-width: 200px;word-break: normal;"><?php echo e($a->recommendations_content); ?></td>
                                <td style="text-align: center">
                                    <?php
                                     $form = \App\Form::find($a->form->id);
                                    ?>
                                    <a class="btn btn-xs btn-primary show-btn" href="/citizen/form/show/<?php echo e($form->citizen->id_number); ?>/<?php echo e($form->id); ?>">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
            <div style="float:left"><?php echo e($items->links()); ?> </div>
        <?php else: ?>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        <?php endif; ?>

    <?php else: ?>
<div class="table-responsive">
        <table class="table table-hover table-striped" style="white-space:normal;">
            <thead>
            <tr>
                <th style="word-break: normal;">#</th>
                <th style="max-width: 250px;word-break: normal;">اسم المستخدم</th>
                <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                <th style="max-width: 150px;word-break: normal;">تاريخ رفع التوصيات</th>
                <th style="max-width: 100px;word-break: normal;">التوصيات</th>
                <th style="max-width: 110px;word-break: normal;text-align: center;"> تفاصيل ذات علاقة بالتوصيات</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
</div>
    <?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>
    <div class="modal fade" id="Confirm22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form_modal">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="deleting_reason" placeholder="سبب الحذف" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء الامر</button>
                        <button id="submit_delete" class="btn btn-danger">تأكيد الحذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script>
        $(function () {

            $('.adv-search').hide();
            $('.adv-search-btn').click(function () {
                $('.adv-search').slideToggle("fast", function () {
                    if ($('.adv-search').is(':hidden')) {
                        $('#searchonly').show();
                    } else {
                        $('#searchonly').hide();
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>