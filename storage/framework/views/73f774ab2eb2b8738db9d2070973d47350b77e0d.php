<style>
    table, th, td {
        border: 1px solid black;
    }

</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td colspan="11" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #d8d8ec;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (15): بيانات المستفيدين الخاطئة.
        </td>
    </tr>
    <tr>
        <td colspan="11" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #d8d8ec;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;color: #ff0000;">
            الحقول التى يوجد فيها علامة "*" هي حقول إجبارية، ويمكنك وضع علامة "-" في الحقول الفارغة
        </td>
    </tr>
    <tr>
        <th  style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">الاسم الأول</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم الأب</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم الجد</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم العائلة</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم الهوية</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم التواصل (1)</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم التواصل (2)</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">المحافظة</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">المنطقة</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">العنوان</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم طلب المشروع</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_first_name == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->first_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_father_name == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->father_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_grandfather_name == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->grandfather_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_last_name == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->last_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_id_number == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->id_number); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_mobile == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->mobile); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_mobile2 == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->mobile2 ? $item->mobile2 : '-'); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_governorate == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->governorate); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_city == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->city); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_street == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->street); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;<?php if($item->error_project_request == 1): ?> <?php echo e('background-color: #ff0000;'); ?> <?php endif; ?>"><?php echo e($item->project_request ? $item->project_request : '-'); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
