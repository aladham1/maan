<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td colspan="27" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #d8d8ec;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (11): بيانات متابعة نشر إجراءات النظام للفئات المستهدفة في مشاريع المركز.
        </td>
    </tr>
    <tr>
        <td colspan="17" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">المعلومات الأساسية:</td>
        <td colspan="10" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #f4b084;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">معلومات المتابعة:</td>
    </tr>
    <tr>
        <th style="background-color:#bdd7ee;word-break: normal;">رقم طلب المشروع</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">اسم المستفيد</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">رقم الهوية</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">رقم التواصل (1)</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">رقم التواصل (2)</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">المحافظة</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">المنطقة</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">العنوان</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">رمز المشروع</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">اسم المشروع</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">حالة المشروع</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">منسق المشروع</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">مدير البرنامج</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">ممثل قسم المتابعة والتقييم</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">حالة التقدم باقتراح/شكوى</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">حالة المتابعة</th>
        <th style="background-color:#bdd7ee;max-width: 100px;word-break: normal;">تاريخ المتابعة</th>


        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل تم تعريفك بنظام الاقتراحات والشكاوى الخاص بالمشروع؟</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل تم تسليمك بروشور الاقتراحات والشكاوى الخاص بالمشروع؟</th>
        <th style="background-color:#fce4d6;max-width: 100px;word-break: normal;">في حال الإجابة بـ (لا)، الرجاء التوضيح:</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل تعلم كيف يمكنك التقدم باقتراح/شكوى للنظام؟</th>
        <th style="background-color:#fce4d6;max-width: 100px;word-break: normal;"> في حال الإجابة بـ (نعم): ما هي القنوات التي يمكنك استخدامها لتقديم الاقتراح/الشكوى؟</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل ترى صندوق الاقتراحات والشكاوى الخاص في المشروع؟</th>
        <th style="background-color:#fce4d6;max-width: 100px;word-break: normal;">في حال الإجابة بـ (لا)، الرجاء التوضيح:</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل تعرف أن هناك شخص مسؤول يمكنك التواصل معه مباشرة في حالة الضرورة القصوى؟</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">هل يوجد لديك أي اقتراح/شكوى تود التحدث عنها لإدارة المشروع؟</th>
        <th style="background-color:#f8cbad;max-width: 100px;word-break: normal;">ملاحظات ذت علاقة</th>





    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="tr-id-<?php echo e($item->id); ?>">
            <td style="word-break: normal;"><?php echo e($item->project_request); ?></td>
            <td style="max-width: 250px;word-break: normal;"><?php echo e($item->first_name." ".$item->father_name." ".$item->grandfather_name." ".$item->last_name); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->id_number); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->mobile); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->mobile2?$item->mobile2:'_'); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->governorate); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->city); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->street); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->code); ?></td>
            <td style="max-width: 100px;word-break: normal;"><?php echo e($item->name); ?></td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->end_date <= now() ?  'منتهي' : 'مستمر'); ?></td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->project_coordinator); ?></td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->project_program); ?></td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->project_followup); ?></td>

            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                <?php if($item->progress_status == 1): ?>
                    <?php echo e('اقتراح'); ?>

                <?php elseif($item->progress_status == 1): ?>
                    <?php echo e('شكوى'); ?>

                <?php else: ?>
                    <?php echo e('لا يوجد'); ?>

                <?php endif; ?>
            </td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                <?php if($item->status): ?>
                    <?php echo e('تمت'); ?>

                <?php else: ?>
                    <?php echo e('لم تتم'); ?>

                <?php endif; ?>
            </td>
            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                <?php if($item->datee): ?>
                    <?php echo e(date('d-m-Y', strtotime($item->datee))); ?>

                <?php else: ?>
                    <?php echo e('_'); ?>

                <?php endif; ?>
            </td>
            <?php if($item->followup_post_system_id): ?>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question1==1?'نعم':'لا'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question2==1?'نعم':'لا'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question2_note); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question3==1?'نعم':'لا'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                    <?php
                    if ($item->question3_note) {
                        $question3_note =  \App\Sent_type::find($item->question3_note);
                        echo $question3_note->name;
                    }
                    ?>
                </td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                    <?php if($item->question4==1): ?>
                        <?php echo e('نعم'); ?>

                    <?php elseif($item->question4==2): ?>
                        <?php echo e('لا'); ?>

                    <?php else: ?>
                        <?php echo e('الصندوق غير مفعل في المشروع'); ?>

                    <?php endif; ?>
                </td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question4_note); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question5==1?'نعم':'لا'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question6==1?'نعم':'لا'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e($item->question7); ?></td>
            <?php else: ?>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo e('_'); ?></td>
            <?php endif; ?>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
