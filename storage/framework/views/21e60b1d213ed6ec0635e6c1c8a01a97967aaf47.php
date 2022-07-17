<?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

<?php $__env->startSection("title", "الصفحة الرئيسية"); ?>

<?php $__env->startSection("content"); ?>
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">هذه الواجهة مخصصة لعرض المشاريع التي تقع ضمن مسؤوليتك</h4>
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
        <?php
                                    if (!Auth::guest()) {
                                        Auth::user()->account->image;
                                        if (Auth::user()->account->image == null) {
                                            $image = "http://placehold.it/300/300";
                                        } else {
                                            if (file_exists(public_path() . '/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image) && Auth::user()->account->image != null)
                                                $image = asset('/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image);
                                            else
                                                $image = "http://placehold.it/300/300";
                                        }
                                    } else
                                        $image = "http://placehold.it/300/300";
                                    ?>
                            <div class="card card-user">
                                <div class="card-header">
                                    <div class="card-title">معلومات الحساب الأساسية</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tbody>                                   <tr>
                                                    <td class="font-weight-bold">الاسم</td>
                                                    <td><?php echo e(Auth::user()->account->full_name); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">المستوى الإداري</td>
                                                    <td><?php echo e(Auth::user()->account->circle->name); ?></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tbody><tr>
                                                    <td class="font-weight-bold">البريد الالكتروني</td>
                                                    <td><?php echo e(auth()->user()->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">رقم التواصل</td>
                                                    <td><?php echo e(Auth::user()->account->mobile); ?></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                                <!--<div class="col-md-12 profile-info">
                                <h4 class="font-green sbold uppercase">معلومات الحساب الأساسية</h4>
                                <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-advance table-hover" style="width: 40%;">
					  <tr>
					    <th style="width: 30%;">الاسم:</th>
					    <td style="width: 100px;"><?php echo e(Auth::user()->account->full_name); ?></th>

					  </tr>
					  <tr>
					    <th style="width: 30%;">المستوى الإداري:</th>
					    <td style="width: 100px;"><?php echo e(Auth::user()->account->circle->name); ?></td>
					  </tr>
					  <tr>
					    <th style="width: 30%;;">البريد الإلكتروني:</th>
					    <td style="width: 100px;"><a href="javascript:;"> <?php echo e(auth()->user()->email); ?> </a></td>

					  </tr>
					  <tr>
					    <th style="width: 30%;">رقم التواصل:</th>
					    <td style="width: 100px;"><?php echo e(Auth::user()->account->mobile); ?></td>

					  </tr>

				</table>
				</div>-->

				<!--<h4 class="font-green sbold uppercase">ويمكنك رؤية المشاريع التي تعمل بها من خلال الجدول أدناه:</h4>
                 <!--
                                    <h2 class="font-green sbold uppercase">
                                        <?php echo e(Auth::user()->account->full_name); ?></h2>
                                    <p>
                                        يمكن من خلال لوحة التحكم الخاصة بك ، تنفيذ المهام الخاصة بك في المشاريع التي
                                        تعمل بها، </p>
                                    يمكنك رؤية المشاريع التي تعمل بها في الجدول أدناه.

                                        <br><br>
                                            <div class="col-sm-3" style="padding-right: 0px;">
                        <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"/>
                      معلومات الحساب
                        </button>
                    </div>
                    <br><br>

                                    <p class="adv-searchh">
                                        <a href="javascript:;"> <?php echo e(auth()->user()->email); ?> </a>
                                    </p>

                                    <ul class="list-inline">
                                        <li>

                                             <span class="username username-hide-on-mobile adv-searchh">
                            <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

                             <?php echo e(Auth::user()->account->full_name); ?> </span>  </li>

                                          <?php echo e(auth()->user()->account->job_name); ?> </li>
                                        <li class="adv-searchh">

                                             <?php echo e(auth()->user()->account->circle->name); ?> </li>
                                    </ul>
                                </div>
                            </div>-->
                                <!--end col-mdclass="adv-searchh-8-->


                                <!--end row-->
                                <?php if($items->count()>0): ?>
                                <div class="card card-table">
                                <div class="card-header">
                                    <div class="card-title">يمكنك رؤية المشاريع التي تعمل بها من خلال الجدول أدناه</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="table-responsive">

                                        <table class="table table-striped table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th style="max-width: 100px;">
                                                   #
                                                </th>
                                                <th style="max-width: 100px;">
                                                  رمز المشروع
                                                </th>
                                                <th style="max-width: 100px;">
                                                   اسم المشروع باللغة العربية
                                                </th>
                                                <th class="hidden-xs" style="max-width: 100px;">
                                                  منسق المشروع
                                                </th>


                                                <th class="hidden-xs" style="max-width: 100px;">
                                                    ممثل المتابعة والتقييم
                                                </th>
                                                <th class="hidden-xs" style="max-width: 100px;">
                                                    مدير البرنامج
                                                </th>
                                                <th class="hidden-xs" style="max-width: 100px;">
                                                   حالة المشروع
                                                </th>
                                                <th style="max-width: 100px;">
                                                    التفاصيل ذات العلاقة بالحساب
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                         <?php echo e($loop->iteration); ?>

                                                    </td>
                                                    <td class="hidden-xs"> <?php echo e($a->code); ?> </td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;">
                                                        <?php echo e($a->name); ?>

                                                    </td>
                                                    <td class="hidden-xs"> <?php if($a->account_projects->where('rate','=','2')->first()): ?>
                                                        <?php echo e($a->account_projects->where('rate','=','2')->first()->account->full_name); ?>

                                                    <?php endif; ?> </td>

                                                        <td class="hidden-xs"> <?php if($a->account_projects->where('rate','=','4')->first()): ?>
                                                            <?php echo e($a->account_projects->where('rate','=','4')->first()->account->full_name); ?>

                                                        <?php endif; ?> </td>

                                                    <td class="hidden-xs"> <?php if($a->account_projects->where('rate','=','3')->first()): ?><!-- المشرف مسبقا , ممثل المتابعة والتقييم حاليا  -->
                                                        <?php echo e($a->account_projects->where('rate','=','3')->first()->account->full_name); ?>

                                                        <?php endif; ?> </td>
                                                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                            <?php if($a->end_date < now() ): ?>  منتهي<?php else: ?>  مستمر <?php endif; ?>
                                                       </td>

                                                    <td>
                                                        <?php if(check_permission_by_id('104')): ?>
                                                        <a class="btn btn-sm green-btn"
                                                        href="/account/project/forminproject/<?php echo e($a->id); ?>"> الاقتراحات والشكاوى </a>
                                                        <?php endif; ?>


                                                        <?php if($a->id != 1): ?>
                                                                <?php if(check_permission('تبويب المستفيدين')): ?>
                                                                    <a class="btn btn-sm green-btn"
                                                                       href="/account/project/citizeninproject/<?php echo e($a->id); ?>"> المستفيدين </a>
                                                                <?php endif; ?>
                                                             <?php else: ?>
                                                                <?php if(check_permission('إدارة غير مستفيدي المشاريع')): ?>
                                                                    <a class="btn btn-sm green-btn"
                                                                       href="/notbenfit"> غير المستفيدين </a>
                                                                <?php endif; ?>

                                                             <?php endif; ?>


                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                        </div>
                                        <br>
                                        <div style="float:left">  <?php echo e($items->links()); ?>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                </div>
                                <!--tab-pane-->

                            <?php else: ?>
                                <br><br>
                                <div class="alert alert-warning">أنت غير عامل في أي من المشاريع</div>
                            <?php endif; ?>
                        </div>

                        <!--end tab-pane-->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>