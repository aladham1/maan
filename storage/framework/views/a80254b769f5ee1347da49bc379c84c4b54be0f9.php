<?php $__env->startSection("title", "إدارة حسابات موظفي النظام"); ?>
<?php $__env->startSection("content"); ?>
    <div id="mybody">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card card-border">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row pb-50">
                                <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                                    <div>
                                        <h4 class="page-title text-bold-500 mb-25">
                                            هذه الواجهة مخصصة للتحكم في إدارة حسابات موظفي النظام
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
                                <div class="col-md-4 col-4">
                                    <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                                        <button type="button" style="width:110px;"
                                                class="btn btn-primary adv-search-btnn"><span
                                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            بحث متقدم
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group adv-searchh">
                                        <select name="account_id" class="form-control">
                                            <option value="" selected>اسم المستخدم</option>
                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php if(request('account_id')===''.$account->id): ?>selected
                                                    <?php endif; ?>
                                                    value="<?php echo e($account->full_name); ?>"><?php echo e($account->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group adv-searchh">
                                        <select class="form-control" name="circles">
                                            <option value="">المستوى الإداري</option>
                                            <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($circle->id); ?>"
                                                        <?php if(request('circles')== $circle->id): ?>selected <?php endif; ?>><?php echo e($circle->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group adv-searchh">
                                        <select name="project_id" class="form-control">
                                            <option value="" selected>رمز المشروع</option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php if(request('project_id')===''.$project->id): ?>selected
                                                    <?php endif; ?>
                                                    value="<?php echo e($project->id); ?>"><?php echo e($project->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group adv-searchh">
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
                                </div>











                                <div class="col-md-2">
                                    <button type="submit" name="theaction" value="search"
                                            style="width:110px;margin-top:0px"
                                            class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                                                      aria-hidden="true"></span> بحث
                                    </button>

                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <?php if($items): ?>

                                    <?php if($items->count()>0): ?>
                                        <div class="table-responsive" style="width:100%">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">
                                                        #
                                                    </th>
                                                    <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">
                                                        اسم المستخدم
                                                    </th>
                                                    <th style="max-width:100px;text-overflow: ellipsis;white-space: nowrap;">
                                                        المستوى الإداري
                                                    </th>



                                                    <th style="max-width:300px;text-overflow: ellipsis;white-space: nowrap;">
                                                        التفاصيل ذات العلاقة بالحساب
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $css = ""; ?>
                                                    <?php if($a->projects->toArray()==null && $a->id !=1 ): ?>
<!--                                                        --><?php //$css = "padding-right: 50px;"?>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;"> <?php echo e($loop->iteration); ?> </td>
                                                        <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->full_name); ?></td>
                                                        
                                                        <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->circle->name); ?></td>


                                                        <td style="text-align: center; <?php echo $css; ?> max-width: 300px;text-overflow: ellipsis;white-space: nowrap;">





                                                            <?php if(check_permission_by_id('108')): ?>
                                                                <a class="btn btn-sm green-btn"
                                                                   href="/account/account/select-project/<?php echo e($a->id); ?>">المشاريع</a>
                                                            <?php endif; ?>

                                                            <?php if(check_permission('تعديل بيانات المستخدم')): ?>
                                                                <a class="btn btn-sm btn-primary" title="تعديل"
                                                                   href="/account/account/<?php echo e($a->id); ?>/edit"><i
                                                                        class="fa fa-edit"></i>
                                                                </a>
                                                            <?php endif; ?>

                                                            <?php if(check_permission('حذف المستخدم')): ?>
                                                                <a class="btn btn-sm Confirm btn-danger"
                                                                   title="يمكن حذفه لأنه غير عامل في أي مشروع"
                                                                   href="/account/account/delete/<?php echo e($a->id); ?>"><i
                                                                        class="fa fa-trash"></i></a>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div style="float:left">  <?php echo e($items->links()); ?>

                                        </div>

                                    <?php else: ?>
                                        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
                                    <?php endif; ?>


                                <?php else: ?>
                                    <div class="table-responsive" style="width:100%">
                                        <table class="table table-hover table-striped" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">
                                                    #
                                                </th>
                                                <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">
                                                    اسم المستخدم
                                                </th>
                                                <th style="max-width:100px;text-overflow: ellipsis;white-space: nowrap;">
                                                    المستوى الإداري
                                                </th>



                                                <th style="max-width:300px;text-overflow: ellipsis;white-space: nowrap;">
                                                    التفاصيل ذات العلاقة بالحساب
                                                </th>
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <script src="https://unpkg.com/vue"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {

            $('.adv-searchh').slideToggle("fast", function () {
                if ($('.adv-searchh').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>