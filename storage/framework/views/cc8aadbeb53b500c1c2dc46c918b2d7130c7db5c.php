<?php $__env->startSection("title", "متابعة دقة البيانات المسجلة على النظام"); ?>
<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card card-border">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row pb-50">
                            <div class="col-lg-8 col-12 d-flex justify-content-between flex-column mt-1">
                                <div>
                                    <h4 class="page-title text-bold-500 mb-25">
                                        هذه الواجهة مخصصة لمتابعة دقة بيانات الاقتراحات والشكاوى المسجلة على النظام.
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
                            <div class="col-md-2 col-2">
                                <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                                    <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn"
                                            style="margin-left: 10px;"><span class="glyphicon glyphicon-search"
                                                                             aria-hidden="true"></span>
                                        بحث متقدم
                                    </button>
                                    <button type="submit" target="_blank" name="theaction" title="تصدير إكسل"
                                            id="excel_b" value="excel" class="btn btn-primary adv-export-btnn"
                                            style="margin-left: 10px;">
                                        <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                                        تصدير
                                    </button>
                                </div>
                            </div>

                        </div>


                        <div class="form-group row filter-div">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 adv-search">
                                        <input type="text" class="form-control" name="id" placeholder="الرقم المرجعي">
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <input type="text" class="form-control" name="citizen_id"
                                               placeholder="الاسم رباعي">
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <input type="text" class="form-control" name="id_number"
                                               placeholder="رقم الهوية">
                                    </div>

                                    <div class="col-sm-3 adv-search">
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

                                <div class="row">
                                    <div class="col-sm-3 adv-search">
                                        <select name="category_name" class="form-control">
                                            <option value="">فئة مقدم الاقتراح/الشكوى</option>
                                            <option value="0">مستفيد</option>
                                            <option value="1">غير مستفيد</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <select name="project_code" class="form-control">
                                            <option value="" selected>رمز المشروع</option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php if(request('project_code')===''.$project->id): ?>selected
                                                    <?php endif; ?>
                                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <select name="project_id" class="form-control">
                                            <option value="" selected>اسم المشروع</option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                                    <?php endif; ?>
                                                    value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <select name="active" class="form-control">
                                            <option value=""> حالة المشروع</option>
                                            <?php $__currentLoopData = $project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e(request('active')==$pstatus->id?"selected":""); ?> value="<?php echo e($pstatus->id); ?>"><?php echo e($pstatus->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-3 adv-search">
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

                                    <div class="col-sm-3 adv-search">
                                        <select name="support" class="form-control">
                                            <option value="" selected>ممثل قسم المتابعة والتقييم</option>
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

                                    <div class="col-sm-3 adv-search">
                                        <select name="progress_status" class="form-control">
                                            <option value="">حالة التقدم باقتراح/شكوى</option>
                                            <option value="1">اقتراح</option>
                                            <option value="2">شكوى</option>
                                            <option value="3">لا يوجد</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <select name="status" class="form-control">
                                            <option value="">حالة المتابعة</option>
                                            <option value="1">تمت</option>
                                            <option value="2">لم تتم</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 adv-search">
                                        <label for="from_date">تاريخ متابعة محدد</label>
                                        <input type="date" class="form-control" name="datee"
                                               value="<?php echo e(request('datee')); ?>"
                                               placeholder="يوم / شهر / سنة"/>
                                    </div>

                                    <div class="col-sm-3 adv-search">
                                        <label for="from_date">من تاريخ متابعة</label>
                                        <input type="date" class="form-control" name="from_date"
                                               value="<?php echo e(request('from_date')); ?>"
                                               placeholder="يوم / شهر / سنة"/>
                                    </div>
                                    <div class="col-sm-3 adv-search">
                                        <label for="to_date">إلى تاريخ متابعة</label>
                                        <input type="date" class="form-control" name="to_date"
                                               value="<?php echo e(request('to_date')); ?>"
                                               placeholder="يوم / شهر / سنة"/>
                                    </div>
                                    <div class="col-sm-3 adv-search">
                                        <div class="form-group adv-searchh" style="margin-left: 20px;margin-top:20px;">

                                            <button type="submit" name="theaction" title="بحث"
                                                    style="display: block;margin-top:0px;width:110px;"
                                                    value="search"
                                                    class="btn btn-primary adv-searchh"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span>
                                                بحث
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <?php if($items): ?>
                                <?php if($items->count()>0): ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped"
                                               style="width:180% !important;max-width:170% !important;white-space:normal;">
                                            <thead>
                                            <tr>
                                                <th style="word-break: normal;">الرقم المرجعي</th>
                                                <th style="max-width: 100px;word-break: normal;">الاسم رباعي</th>
                                                <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                                                <th style="max-width: 100px;word-break: normal;">المحافظة</th>
                                                <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح /الشكوى</th>
                                                <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                                                <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                                                <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                                                <th style="max-width: 100px;word-break: normal;">منسق المشروع</th>
                                                <th style="max-width: 100px;word-break: normal;">ممثل قسم المتابعة والتقييم</th>
                                                <th style="max-width: 100px;word-break: normal;">حالة التقدم باقتراح/شكوى</th>
                                                <th style="max-width: 100px;word-break: normal;">حالة المتابعة</th>
                                                <th style="max-width: 100px;word-break: normal;">تاريخ المتابعة</th>
                                                <th style="max-width: 100px;word-break: normal;text-align: center;">التفاصيل ذات العلاقة بالمتابعة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="tr-id-<?php echo e($a->accuracy_form_id); ?>">
                                                    <td style="word-break: normal;"><?php echo e($a->accuracy_form_id); ?></td>
                                                    <td style="max-width: 250px;word-break: normal;"><?php echo e($a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name); ?></td>
                                                    <td style="max-width: 100px;word-break: normal;"><?php echo e($a->id_number); ?></td>
                                                    <td style="max-width: 100px;word-break: normal;"><?php echo e($a->governorate); ?></td>
                                                    <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project_accuracy_id == 1 ? 'غير مستفيد' : ' مستفيد'); ?></td>
                                                    <td style="max-width: 100px;word-break: normal;"><?php echo e($a->code); ?></td>
                                                    <td style="max-width: 100px;word-break: normal;"><?php echo e($a->name); ?></td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->project_coordinator); ?></td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->project_followup); ?></td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        <?php if($a->progress_status == 1): ?>
                                                            <?php echo e('اقتراح'); ?>

                                                        <?php elseif($a->progress_status == 1): ?>
                                                            <?php echo e('شكوى'); ?>

                                                        <?php else: ?>
                                                            <?php echo e('لا يوجد'); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        <?php if($a->status): ?>
                                                            <?php echo e('تمت'); ?>

                                                        <?php else: ?>
                                                            <?php echo e('لم تتم'); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        <?php if($a->datee): ?>
                                                            <?php echo e(date('d-m-Y', strtotime($a->datee))); ?>

                                                        <?php else: ?>
                                                            <?php echo e('_'); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                    <td style="max-width: 150px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        <?php if(!$a->followup_accuracy_id): ?>
                                                            <a
                                                                target="_blank" title="معاينة" class="btn btn-xs btn-primary"
                                                                href="/account/system/create1/<?php echo e($a->accuracy_form_id); ?>">
                                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <a
                                                                target="_blank" title="معاينة" class="btn btn-xs btn-primary"
                                                                href="/account/system/edit1/<?php echo e($a->followup_accuracy_id); ?>">
                                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if($a->followup_accuracy_id): ?>
                                                            <a
                                                                target="_blank" title="معاينة" class="btn btn-xs btn-primary"
                                                                href="/account/system/edit1/<?php echo e($a->followup_accuracy_id); ?>">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <a
                                                                target="_blank" title="معاينة" class="btn btn-xs btn-primary" disabled="disabled">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                        <a class="btn btn-xs Confirm22 btn-danger" data-id="<?php echo e($a->followup_accuracy_id); ?>"><i class="fa fa-trash"></i></a>
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
                                            <th style="word-break: normal;">الرقم المرجعي</th>
                                            <th style="max-width: 100px;word-break: normal;">الاسم رباعي</th>
                                            <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                                            <th style="max-width: 100px;word-break: normal;">المحافظة</th>
                                            <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح /الشكوى</th>
                                            <th style="max-width: 100px;word-break: normal;">رمز المشروع</th>
                                            <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                                            <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                                            <th style="max-width: 100px;word-break: normal;">منسق المشروع</th>
                                            <th style="max-width: 100px;word-break: normal;">ممثل قسم المتابعة والتقييم</th>
                                            <th style="max-width: 100px;word-break: normal;">حالة التقدم باقتراح/شكوى</th>
                                            <th style="max-width: 100px;word-break: normal;">حالة المتابعة</th>
                                            <th style="max-width: 100px;word-break: normal;">تاريخ المتابعة</th>
                                            <th style="max-width: 100px;word-break: normal;text-align: center;">التفاصيل ذات العلاقة بالمتابعة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                </div>
                <form id="delete_form_modal">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">الغاء الامر
                        </button>
                        <button id="submit_delete" class="btn btn-danger main-btn">تأكيد الحذف</button>
                    </div>
                </form>
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
            var id = false;
            $(".Confirm22").click(function (e) {
                e.preventDefault();
                id = $(this).attr('data-id');
                $("#Confirm22").modal("show");
                return false;
            });
            $('#delete_form_modal').submit(function (e) {
                e.preventDefault();
                if (!id)
                    return;
                $("#Confirm22").modal("hide");
                $.post("<?php echo e(route('delete_accuracy_system')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'id': id,
                }, function (data) {
                    console.log('data: ', data);
                    $('.tr-id-' + id).fadeOut("fast", function () {
                        $('.tr-id-' + id).remove();
                    });
                    id = false;
                });
            });
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
    <script>
        $(function () {
            $(".cbActive").change(function () {
                var id = $(this).attr('content');
                var cat_id = $(this).val();

                $.ajax({
                    method: 'POST',
                    url: "/account/form/change-category/" + id,
                    data: {_token: '<?php echo e(csrf_token()); ?>', _method: 'PUT', 'category_id': cat_id},
                    error: function (jqXHR, textStatus, errorThrown) {
                    },
                });
            });
        });
    </script>

    <script>

        jQuery(document).ready(function () {
            jQuery('input').keypress(function (event) {
                var enterOkClass = jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>