<?php

use App\Category;use App\Form;

$complaint = Category::where('is_complaint', 1)->get();
$not_complaint = Category::where('is_complaint', '!=', 1)->get();

$no_complaint = Category::where('is_complaint', '!=', 1)->count();
$is_complaint = Category::where('is_complaint', 1)->count();
?>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td colspan="44"
            style="text-align: center;vertical-align:center;background-color: #cfe3f8; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (9): تقرير الاقتراحات والشكاوى المسجلة على النظام.
        </td>
    </tr>
    <tr>
        <th colspan="9"
            style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            معلومات المشروع الأساسية
        </th>
        <th colspan="2"
            style="text-align: center;vertical-align:center;background-color: #9bc2e6; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;word-wrap: break-word;">
            فترة تسجيل الاقتراحات والشكاوى على النظام
        </th>
        <th colspan="7"
            style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            تصنيف الاقتراحات والشكاوى حسب قنوات الاستقبال
        </th>
        <th colspan="5"
            style="text-align: center;vertical-align:center;background-color: #9bc2e6; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            تصنيف الاقتراحات والشكاوى حسب المحافظات
        </th>
        <th colspan="{{$no_complaint+1}}"
            style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            معلومات الاقتراحات المسجلة على النظام
        </th>
        <th colspan="{{$is_complaint+1}}"
            style="text-align: center;vertical-align:center;background-color: #9bc2e6; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            معلومات الشكاوى المسجلة على النظام
        </th>
        <th colspan="4"
            style="text-align: center;vertical-align:center;background-color: #9bc2e6; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            تصنيف الاقتراحات والشكاوى حسب حالة الرد والمتابعة من قبل الجهات المختصة
        </th>
        <th colspan="3"
            style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            تصنيف الاقتراحات والشكاوى حسب حالة تبيلغ الرد من قبل الجهات المختصة
        </th>
        <th colspan="4"
            style="text-align: center;vertical-align:center;background-color: #9bc2e6; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            تصنيف الاقتراحات والشكاوى حسب التغذية الراجعة للحالات التى تم تبيلغها الرد
        </th>
    </tr>

    <tr>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">#
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">رمز المشروع
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">اسم المشروع باللغة العربية
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">منسق المشروع
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">ممثل قسم المتابعة والتقييم
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">مدير البرنامج
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تاريخ بداية المشروع
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تاريخ نهاية المشروع
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">حالة المشروع
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">من تاريخ
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">إلى تاريخ
        </th>

        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تطبيق الهاتف المحمول
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">الموقع الإلكتروني
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">صندوق الاقتراحات والشكاوى
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">الاتصال بالرقم المجاني
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">الحضور الشخصي للمركز
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">اتصالات/زيارات المتابعة الدورية
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">موظفي المركز
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">شمال غزة
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">غزة
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">الوسطي
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">خانيونس
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">رفح
        </th>

        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">إجمالي عدد الاقتراحات
        </th>
        @foreach($not_complaint as $Category)
            <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
                rowspan="2">{{ $Category->name }}</th>
        @endforeach
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">إجمالي عدد الشكاوى
        </th>
        @foreach($complaint as $Category)
            <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
                rowspan="2">{{ $Category->name }}</th>
        @endforeach

        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تم الرد عليها
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">قيد الدراسة حاليا
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">لم يتم الرد
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تم حذفها من النظام
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">تم تبليغ الرد
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">قيد تبليغ الرد
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #9bc2e6;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">لم يتم تبليغ الرد
        </th>

        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">راضي بشكل كبير
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">راضي بشكل متوسط
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">راضي بشكل ضعيف
        </th>
        <th style="text-align: center;vertical-align:center;background-color: #c6e0b4;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;"
            rowspan="2">غير راضي عن الرد
        </th>

    </tr>

    <tr></tr>

    </thead>
    <tbody>

    @foreach($items as $k=>$item)

        <tr>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $k+1 }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->code }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->name }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                @if($item->account_projects->where('rate','=','2')->first())
                    {{$item->account_projects->where('rate','=','2')->first()->account->full_name}}
                @endif
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                @if($item->account_projects->where('rate','=','4')->first())
                    {{$item->account_projects->where('rate','=','4')->first()->account->full_name}}
                @endif
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                @if($item->account_projects->where('rate','=','3')->first())
                    {{$item->account_projects->where('rate','=','3')->first()->account->full_name}}
                @endif
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->start_date }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->end_date }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;"> @if($item->end_date < now() )
                    منتهي@elseمستمر@endif</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->min_date }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $item->max_date }}</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 6,
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 1
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 5
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 3
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 2
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 4
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $sent_type_count = Form::where(
                    [
                        'project_id' => $item->id,
                        'sent_type' => 7
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $sent_type_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $governorate_count = Form::join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'citizens.governorate' => 'شمال غزة'
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $governorate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $governorate_count = Form::join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'citizens.governorate' => 'غزة'
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $governorate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $governorate_count = Form::join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'citizens.governorate' => 'الوسطى'
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $governorate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $governorate_count = Form::join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'citizens.governorate' => 'خانيونس'
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $governorate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $governorate_count = Form::join('citizens', 'citizens.id', '=', 'forms.citizen_id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'citizens.governorate' => 'رفح'
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $governorate_count }}
            </td>

            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $complaint_count = Form::where(
                    [
                        'forms.project_id' => $item->id,
                        'forms.type' => 2
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $complaint_count }}
            </td>

            @foreach($not_complaint as $Category)
                <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                    <?php
                    $Category_count = Form::where(
                        [
                            'forms.project_id' => $item->id,
                            'forms.type' => 2,
                            'forms.category_id' => $Category->id
                        ])
                        ->whereIn('forms.id', $ids)
                        ->count();
                    ?>
                    {{ $Category_count }}
                </td>
            @endforeach

            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $complaint_count = Form::where(
                    [
                        'forms.project_id' => $item->id,
                        'forms.type' => 1
                    ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $complaint_count }}
            </td>

            @foreach($complaint as $Category)
                <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                    <?php
                    $Category_count = Form::where(
                        [
                            'forms.project_id' => $item->id,
                            'forms.type' => 1,
                            'forms.category_id' => $Category->id
                        ])
                        ->whereIn('forms.id', $ids)
                        ->count();
                    ?>
                    {{ $Category_count }}
                </td>
            @endforeach

            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $response_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                        ])
                    ->whereNotNull('form_follows.form_id')
                    ->whereNotNull('form_responses.response')
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $response_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">0</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">0</td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $deleted_count = Form::where(
                    [
                        'forms.project_id' => $item->id,
                    ])
                    ->whereNotNull('forms.deleted_at')
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $deleted_count }}
            </td>

            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_follow_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'form_follows.solve' => 1
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_follow_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_follow_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                        ])
                    ->whereNotIn('form_follows.solve', [1, 2])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_follow_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_follow_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'form_follows.solve' => 2
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_follow_count }}
            </td>

            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_evaluate_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'form_follows.evaluate' => 1
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_evaluate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_evaluate_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'form_follows.evaluate' => 2
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_evaluate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_evaluate_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                            'form_follows.evaluate' => 3
                        ])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_evaluate_count }}
            </td>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">
                <?php
                $form_evaluate_count = Form::leftjoin('form_follows', 'form_follows.form_id', '=', 'forms.id')
                    ->leftjoin('form_responses', 'form_responses.form_id', '=', 'forms.id')
                    ->where(
                        [
                            'forms.project_id' => $item->id,
                        ])
                    ->whereNotIn('form_follows.evaluate', [1, 2, 3])
                    ->whereIn('forms.id', $ids)
                    ->count();
                ?>
                {{ $form_evaluate_count }}
            </td>

        </tr>
    @endforeach
    </tbody>
</table>



