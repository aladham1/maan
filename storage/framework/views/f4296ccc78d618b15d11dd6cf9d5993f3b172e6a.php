<?php $__env->startSection("title", "حسابات الموظفين ضمن   $item->name $item->code "); ?>

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
                                هذه الواجهة مخصصة للتحكم في إدارة حسابات الموظفين ضمن مشروع 
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
    <div class="col-md-12 col-12">
        <div class="card card-table">
                <div class="card-body">
    <div class="form-group">
        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btnn">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث متقدم
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off">
<div class="row" style="margin-bottom: 5px;">
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
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
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <select class="form-control" id="circles" name="circles" value="<?php echo e(old('circles')); ?>">
                        <option value="">المستوي الاداري</option>
                        <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($circle->id); ?>"
                                    <?php if(request('circles')== $circle->id): ?>selected <?php endif; ?>><?php echo e($circle->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <input type="text" class="form-control" autocomplete="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>"
                           placeholder="رقم التواصل"/>
                </div>
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>"
                           placeholder="البريد الإلكتروني"/>
                </div>
                </div>
	<div class="row">
                <div class="col-sm-3 col-sm-offset-9 adv-searchh" style="text-align: left;" align="left">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <?php if($items): ?>
        <?php if($items->count()>0): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                            المستخدم
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            المستوى الاداري
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                            التواصل
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            البريد الإلكتروني
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($rate): ?>
                            <?php if($a->account_projects->where('project_id','=',$item->id)->first()->rate==$rate): ?>
                                <tr>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($loop->iteration); ?></td>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->full_name); ?></td>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->circle->name); ?></td>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                                        class="text-center" dir="ltr"><?php echo e($a->mobile); ?></td>
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->user->email); ?></td>
                                    

                                </tr>
                            <?php endif; ?>
                        <?php else: ?>
                            <tr>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($loop->iteration); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->full_name); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->circle->name); ?></td>
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                                    class="text-center" dir="ltr"><?php echo e($a->mobile); ?></td>
                                <td style="text-align:center !important;max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($a->user->email); ?></td>
                                
                            </tr>
                        <?php endif; ?>
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
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                        المستخدم
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى
                        الاداري
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                        التواصل
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد
                        الإلكتروني
                    </th>
                    
                </tr>
                </thead>
            </table>
        </div>
    <?php endif; ?>


    <div class="form-group row" style="margin-top:15px;" align="left">
        <div class="col-sm-12">
            <a href="/account/project" class="btn btn-success">
                <span class="glyphicon glyphicon-arrow-left"></span>
                رجوع للخلف </a>
        </div>
    </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {
            $('.adv-searchh').slideToggle("fast");
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>