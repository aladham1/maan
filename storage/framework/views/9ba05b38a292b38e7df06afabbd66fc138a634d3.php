<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td colspan="14" style="font-weight:bold;text-align: center;vertical-align:center;background-color: #d8d8ec;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (4): بيانات غير مستفيدي المشاريع المسجلة على النظام.
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
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"> فئة مقدم الاقتراح/ الشكوى</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"> عدد الاقتراحات التي تقدم بها غير المستفيد</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">عدد الشكاوى التي تقدم بها غير المستفيد</th>

    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
        $r = 0;
        $t= 0;
        if(!empty($item->forms) && !empty($item->forms->first())){
            foreach ($item->forms as $f){
                if($f->type == 2){
                    $r +=1;
                }elseif ($f->type == 1){
                    $t +=1;
                }
            }

        }
        ?>
        <tr>

            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->first_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->father_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->grandfather_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->last_name); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->id_number); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->mobile); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->mobile2 ? $item->mobile2 : '-'); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->governorate); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->city); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($item->street); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;">غير مستفيد</td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($r); ?></td>
            <td style="text-align: center;padding: 10px;border: 1px solid black;border-collapse: collapse;"><?php echo e($t); ?></td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
