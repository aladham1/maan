<?php $__env->startSection("title", " عرض إشعارات النظام"); ?>
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
هذه الواجهة مخصصة للتحكم في إدارة إشعارات النظام
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
    <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form>
                <div class="row">
                    <div class="col-md-4 col-4">
                      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                        <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btn adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث متقدم
                        </button>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <select name="notification_type" class="form-control">
                            <option value="" >نوع الإشعار</option>

                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('notification_type')===''.$notification->title): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($notification->title); ?>"><?php echo e($notification->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="user_name" class="form-control">
                            <option value="" >المستوى الإداري لمرسل الإشعار</option>
                            <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($circle->id); ?>" <?php echo e(old('circle_id')==$circle -> id?"selected":""); ?>><?php echo e($circle->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <option value="-1" <?php if(request('project_id')==='-1'): ?>selected
                                <?php endif; ?>>جميع المشاريع
                            </option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search" >
                        <select name="account_id" class="form-control">
                            <option value="" selected>حساب مرسل الإشعار</option>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php if(request('account_id')===''.$account->id): ?>selected
                                    <?php endif; ?>
                                    value="<?php echo e($account->id); ?>"><?php echo e($account->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-3 adv-search" style="margin-top: 34px;">
                        <select name="notification_status" class="form-control">
                            <option value="" >حالة الإشعار</option>
                            <option value="0" >مقروء</option>
                            <option value="1">غير مقروء</option>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="datee">تاريخ محدد:</label>
                        <input type="date" class="form-control" name="datee" value="<?php echo e(request('datee')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ: </label>
                        <input type="date" class="form-control" name="from_date" value="<?php echo e(request('from_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ:</label>
                        <input type="date"  class="form-control" name="to_date" value="<?php echo e(request('to_date')); ?>"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-12 adv-search" align="left">
                        <button type="submit" name="theaction" title="بحث" value="search"
                                class="btn btn-primary adv-searchh" style="width:110px;">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <!--<h4 class="table-head">يمكنك من خلال الجدول أدناه عرض الرسائل المدرجة في النظام:</h4>-->

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
        <?php if($items->count()>0): ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="overflow: hidden;text-overflow: ellipsis;">#</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">نوع الإشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">المستوى الإداري لمرسل الإشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">حساب مرسل الاشعار</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">اسم المشروع</th>
                        <th style="overflow: hidden;text-overflow: ellipsis;">تاريخ الإشعار</th>
                        <th style="text-align:center;overflow: hidden;text-overflow: ellipsis;">معاينة</th>
                    </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php

                        $array = explode('/',  $a->link);

                        $id = $array[ count($array) - 1 ];

                        $form = App\Form::find($id);

                        $Account = \App\Account::find($a->receiver_id);
                        if ($Account){
                            $circle = \App\Circle::find($Account->circle_id);

                        }

                    ?>
                    <tr style="<?php if(empty($a->read_at) || is_null($a->read_at)): ?> background-color: #f1cfc0;<?php endif; ?>">
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->id); ?></td>
                        <td style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: normal;"><?php echo e($a->title); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e(($a->receiver_id != 0) ? $circle->name  : 'مدير النظام'); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e(($a->receiver_id != 0) ? $Account->full_name  : 'مدير النظام'); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e(($form and $form->project) ? $form->project->name  : ''); ?></td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->created_at); ?></td>
                        <td style="text-align:center;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            <a onclick="make_read(<?php echo $a->id;?>)" class="btn btn-xs btn-primary" title="انتقل" href="<?php echo e($a->link); ?>">
                                <i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div style="float:left" ><?php echo e($items->links()); ?> </div>
    <?php else: ?>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    <?php endif; ?>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th style="overflow: hidden;text-overflow: ellipsis;">#</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">نوع الإشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">المستوى الإداري لمرسل الإشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">حساب مرسل الاشعار</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">اسم المشروع</th>
                <th style="overflow: hidden;text-overflow: ellipsis;">تاريخ الإشعار</th>
                <th style="text-align:center;overflow: hidden;text-overflow: ellipsis;">معاينة</th>
            </tr>
            </thead>
        </table>
    </div>
    <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script>
        $(function () {
            $('.adv-search').hide();
            $('.adv-search-btn').click(function(){
                $('.adv-search').slideToggle("fast");
            });

        });

        function make_read(id) {
            $.post("<?php echo e(route('make_read')); ?>", {
                "_token": "<?php echo e(csrf_token()); ?>",
                'id': id,
            }, function (data) {

            });
        }
    </script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>