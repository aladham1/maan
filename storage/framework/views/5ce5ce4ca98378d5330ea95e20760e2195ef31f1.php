<?php $__env->startSection("title", "إدارة الاقتراحات والشكاوى المحذوفة "); ?>
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
هذه الواجهة مخصصة للتحكم في إدارة الاقتراحات والشكاوى المحذوفة من النظام
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
    <div class="form-group row filter-div">
        <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="id" placeholder="الرقم المرجعي" >
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="citizen_id" placeholder="اسم مقدم الاقتراح / الشكوى" >
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="id_number" placeholder="رقم الهوية" >
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="">فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0">مستفد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-3 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code." ".$project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="active" class="form-control">
                            <option value=""> حالة المشروع </option>
                            <?php $__currentLoopData = $project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(request('active')==$pstatus->id?"selected":""); ?> value="<?php echo e($pstatus->id); ?>"><?php echo e($pstatus->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="sent_type" class="form-control">

                            <option value="">قناة الاستقبال</option>
                            <?php $__currentLoopData = $sent_typee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sent_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('sent_type')==$sent_type->id?"selected":""); ?> value="<?php echo e($sent_type->id); ?>"><?php echo e($sent_type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
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
                </div>

                <div class="row">

                    <div class="col-sm-3 adv-search">
                        <select name="category_id" class="form-control">
                            <option value="" selected>فئة الاقتراح/الشكوى</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        <?php if(request('category_id')===''.$category->id): ?>selected
                                        <?php endif; ?>
                                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="deleted_by" class="form-control">

                            <option value="">اسم المستخدم الذي قام بالحذف</option>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('deleted_by')==$account->id?"selected":""); ?> value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="circle_id" class="form-control">
                            <option value="">المستوى الإداري</option>
                            <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e(request('circle_id')==$circle->id ?"selected":""); ?> value="<?php echo e($circle->id); ?>"><?php echo e($circle->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>



                </div>

                <div class="row">

                    <div class="col-sm-3 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee" value="<?php echo e(request('datee')); ?>"
                               placeholder="يوم / شهر / سنة" />
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>"
                               placeholder="يوم / شهر / سنة" />
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                         <div  class="form-group adv-searchh" style="margin-left: 20px;margin-top:20px;">

                        <button type="submit" name="theaction" title="بحث" style="display: block;margin-top:0px;width:110px;"
                                value="search"
                                class="btn btn-primary adv-search adv-searchh"><span class="glyphicon glyphicon-search"
                                                              aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>
                    <!--<div class="col-sm-3 adv-search">

                        <button type="submit" name="theaction" title="بحث" style="width:70px;margin-top:22px"
                                value="search"
                                class="btn btn-primary adv-search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>-->
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
                       style="width:170% !important;max-width:170%;white-space:normal;">
                    <thead>
                    <tr>
                        <th style="max-width: 100px;word-break: normal;">الرقم المرجعي</th>

                        <th style="max-width: 100px;word-break: normal;">الاسم رباعي
                        </th>
                        <th style="max-width: 100px;word-break: normal;">رقم الهوية
                        </th>
                        <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح/الشكوى
                        </th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع
                        </th>
                        <th style="max-width: 100px;word-break: normal;">حالة المشروع
                        </th>
                        <th style="max-width: 100px;word-break: normal;">قناة الاستقبال
                        </th>
                        <th style="max-width: 100px;word-break: normal;">التصنيف
                        </th>
                        <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى
                        </th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى
                        </th>
                        <th style="max-width: 100px;word-break: normal;">اسم المستخدم الذي قام بالحذف
                        </th>
                        <th style="max-width: 100px;word-break: normal;">مستواه الاداري
                        </th>


                        <th style="max-width: 100px;word-break: normal;">سبب الحذف
                        </th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ الحذف
                        </th>
                        <th style="max-width: 100px;word-break: normal;">المرفقات
                        </th>
                        <th style="max-width: 100px;white-space:nowrap;">معاينة</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td style="word-break: normal;"><?php if($a->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($a->id); ?><?php endif; ?></td>
                            <td style="max-width: 250px;word-break: normal;"><?php if($a->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name); ?><?php endif; ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php if($a->hide_data == 1): ?><?php echo e('_'); ?><?php else: ?><?php echo e($a->citizen->id_number); ?><?php endif; ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->id == 1 ? 'غير مستفيد' : ' مستفيد'); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->name); ?></td>

                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
                            <td style="max-width: 100px;word-break: normal;"> <?php echo e($a->sent_typee->name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->form_type->name); ?></td>
                            <td style="max-width: 300px;word-break: normal;"><?php echo e($a->category->name); ?></td>
                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->datee); ?></td>


                        <!--          <?php if($type!=2 && $type!=3): ?>
                            <td style="max-width: 100px;word-break: normal;"
                                style="padding-left: 0px;padding-right: 0px">

<?php echo e($a->category->name); ?>


                                </td>
<?php endif; ?>

                            <td style="max-width: 100px;word-break: normal;"><?php echo e($a->title); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->name); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->project->project_status->name); ?></td>
                        <td style="max-width: 100px;word-break: normal;"><?php echo e($a->datee); ?></td>-->
                            

                            <!--<td style="max-width: 300px;word-break: normal;"> <?php if($a->deleted_by == 1): ?> مسؤول-->
                            <!--    النظام <?php else: ?> داليا أحمد يونس <?php endif; ?></td>-->
                            <td style="max-width: 100px;word-break: normal;">     <?php echo e(\App\Account::where('id' , $a->deleted_by)->first()->full_name); ?></td>
                            <td style="max-width: 100px;word-break: normal;">     <?php echo e(\App\Account::where('id' , $a->deleted_by)->first()->circle->name); ?>



                            </td>
                            <td style="max-width: 300px;word-break: normal;"> <?php echo e($a->deleted_because); ?></td>
                            <td style="max-width: 100px;word-break: normal;"> <?php echo e($a->deleted_at); ?></td>
                            <td style="max-width: 100px;word-break: normal;">
                                <?php
                                $form_files = \App\Form_file::where('form_id', '=', $a->id)->get();

                                if(!$form_files->isEmpty()){
                                ?>
                                <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton" data-target="#smallModal"
                                   data-attr="<?php echo e(route('showfiles', $a->id)); ?>" title="اضغظ هنا">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                <?php }else{?>
                                <a class="btn btn-xs btn-primary" title="لا يوجد مرفقات لعرضها" disabled="disabled">
                                    <i class="glyphicon glyphicon-eye-close"></i>
                                </a>
                                <?php } ?>
                            </td>
                            <td style="max-width: 100px;word-break: normal;">
                                <a
                                    target="_blank" title="عرض" class="btn btn-xs btn-primary"
                                    href="/citizen/form/show/<?php echo e($a->citizen->id_number); ?>/<?php echo e($a->id); ?>">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="float:left">  <?php echo e($items->links()); ?> </div>

            <br>
        <?php else: ?>
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        <?php endif; ?>


    <?php else: ?>
        <div class="table-responsive">

            <table class="table table-hover table-striped"
                   style="white-space:normal;">
                <thead>
                <tr>
                    <th style="max-width: 100px;word-break: normal;">الرقم المرجعي</th>
                    <th style="max-width: 100px;word-break: normal;">الاسم رباعي
                    </th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح/الشكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">قناة الاستقبال
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التصنيف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم المستخدم الذي قام بالحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">مستواه الاداري
                    </th>


                    <th style="max-width: 100px;word-break: normal;">سبب الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">المرفقات
                    </th>
                    <th style="max-width: 100px;white-space:nowrap;">معاينة</th>
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
            $(".cbActive").change(function () {
                var id = $(this).attr('content');
                var cat_id = $(this).val();

                $.ajax({
                    method: 'POST',
                    url: "/account/form/change-category/" + id,
                    data: {_token: '<?php echo e(csrf_token()); ?>', _method: 'PUT', 'category_id': cat_id},
                    error: function (jqXHR, textStatus, errorThrown) {
                        // User Not Logged In
                        // 401 Unauthorized Response
                        //window.location.href = "/account/form";
                    },
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