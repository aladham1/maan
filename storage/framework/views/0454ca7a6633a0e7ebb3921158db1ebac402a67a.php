<?php $__env->startSection("title", "تعديل فئة اقتراح/شكوى"); ?>

<?php
$name = "";
$main = "";
if($item->is_complaint == 1){
    $name =$item->parentCategory->name;
    $main = $item->main_category_id;
}else{
    $name =$item->parentSuggest->name;
    $main = $item->main_suggest_id;
}

$Cat = [];
foreach ($CategoryCircles as $CategoryCircle){
    array_push($Cat,$CategoryCircle->procedure_type.'_'.$CategoryCircle->circle_id);
}


?>

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
هذه الواجهة مخصصة للتحكم في تعديل فئات الاقتراحات والشكاوى والمستويات الإدارية في التعامل معها
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
    <div class="col-md-12 col-12" id="app">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title"> تعديل بيانات فئات الاقتراحات والشكاوى</div>
                </div>
                <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="/account/category/update/<?php echo e($item->id); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
			<div class="row">
                        <div class="col-md-3 form-group">
                                <label>الفئة الفرعية</label>
                                <input type="text" class="form-control"  name="name"
                                       value="<?php echo e($item->name); ?>">
                        </div>
                        <div class="col-md-3 form-group">
                                <label>نوع الفئة</label>
                                  <select name="is_complaint" class="form-control">
                                    <option value="">نوع الفئة</option>
                                    <option value="0" <?php echo e($item->is_complaint == 0 ? 'selected' : ''); ?>>اقتراح</option>
                                    <option value="1" <?php echo e($item->is_complaint == 1 ? 'selected' : ''); ?>>شكوى</option>
                                </select>
                        </div>
                        <div class="col-md-3 form-group">
                                <label> الفئة الرئيسية </label>
            
                                <select class="form-control" class="col-md-12" name="main_category_id">
                                    <option value="<?php echo e($item->main_category_id); ?>">الفئات الرئيسية</option>
                                    <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($category->id); ?>" <?php echo e($main ==$category->id ? 'selected' : ''); ?> >  <?php echo e($category->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="main_suggest_id" id="main_suggest_id" value="<?php echo e($main); ?>">

                        </div>
             </div>
		<label class="check-label">فئة مقدم الاقتراح/ الشكوى:</label>
                        <div class="row form-group" dir="rtl">
            
                                <div class="col-md-4 form-check">
                                    
                                    <input class="form-check-input" <?php if($item->citizen_show == 1): ?><?php echo e("checked"); ?><?php endif; ?> type="checkbox" id="citizen_show"
                                           name="citizen_show" value="1">
                                    <label class="form-check-label" for="citizen_show">
                                        غير مستفيد من مشاريع المركز
                                    </label>
                                </div>
                                <div class="col-md-4 form-check">

                                    <input class="form-check-input" <?php if($item->benefic_show == 1): ?><?php echo e("checked"); ?> <?php endif; ?> type="checkbox" id="benefic_show"
                                           name="benefic_show" value="1">
                                    <label class="form-check-label" for="benefic_show">

                                        مستفيد من مشاريع المركز
                                    </label>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-md-12">
                    <hr>
                <div class="form-check">
                    <input id="editLevelCheck2" type="checkbox" name="editLevel" value="editLevel"
                           onclick="editLevel2()" <?php if($CategoryCircles): ?> <?php echo e('checked'); ?> <?php endif; ?> >
                    <label for="editLevel" style="vertical-align: middle;">المستويات الإدارية المختصة في التعامل مع هذه الفئة</label>
                </div>
                </div>
                </div>

                <div class="table-responsive" id="editLevelTable2"style="margin-bottom: 20px;">
                    <table style="width:185% !important;max-width:185% !important;white-space:normal;" class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="max-width: 100px;word-break: normal;">الفئة الرئيسية</th>
                            <th style="max-width: 100px;word-break: normal;">الفئة الفرعية</th>
                            <th colspan="2" style="max-width: 100px;word-break: normal;">نوع الإجراء</th>
                            <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th style="max-width: 100px;word-break: normal;"><?php echo e($circle->name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td  colspan="1" rowspan="6" scope="col" style="word-break: normal;" id="maincat"><?php echo e($name); ?></td>
                            <td  colspan="1" rowspan="6" scope="col" style="word-break: normal;" id="subcat"><?php echo e($item->name); ?></td>
                        </tr>
                        <?php $__currentLoopData = $procedureTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedureType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php if($procedureType->id != 2 && $procedureType->id != 3): ?>
                                    <td colspan="2" style="word-break: normal;" id="<?php echo e($procedureType->id); ?>"><?php echo e($procedureType->name); ?></td>
                                <?php else: ?>
                            
                                    <td class="two" style="word-break: normal;">الجهات المختصة بمعالجة الاقتراح/الشكوى</td>
                                    <td  style="word-break: normal;" id="<?php echo e($procedureType->id); ?>"><?php echo e($procedureType->name); ?></td>
                            
                                <?php endif; ?>
                                <?php $__currentLoopData = $circles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $circle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td  style="text-align:center;max-width: 100px;word-break: normal;">
                                        <input type="checkbox" name="category_circle[]" value="<?php echo e($procedureType->id.'_'.$circle->id); ?>" <?php if(in_array($procedureType->id.'_'.$circle->id,$Cat)): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-actions" style="text-align: left;">
                    <input type="submit" class="btn btn-success" value="تعديل">
                    <a type="button" href="/account/category" class="btn btn-light">إلغاء الأمر</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        // new Vue({
        //     el: '#app',
        //     data: {
        //         benefic_show: false,
        //         citizen_show: false,
        //     },
        // });

        function editLevel2() {
            // Get the checkbox
            var checkBox = document.getElementById("editLevelCheck2");
            // Get the output text
            var text = document.getElementById("editLevelTable2");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>
    <script>
        $('#main_category_id').change(function () {
            $('#main_suggest_id').val($('#main_category_id').val());
        });
    </script>
    <script>
        $('tr td.two').each(
    function(){
        var that = $(this),
            next = that.parent().next().find('.two');
        if (next.length){
            that
                .text(next.remove().text())
                .attr('rowspan','2');
        }
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>