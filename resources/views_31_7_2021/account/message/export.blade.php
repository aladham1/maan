<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;" colspan="11">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (7): بيانات الرسائل النصية (SMS) المستخدمة في النظام.
        </td>
    </tr>
    <tr>
        <th  style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">#</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">الرقم المرجعي</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">الاسم رباعي</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم الهوية</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم المشروع</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">رقم التواصل</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">نوع الرسالة</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">حالة الإرسال</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">نص الرسالة النصية</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">تاريخ الإرسال</th>
        <th style="text-align: center;vertical-align:center;background-color: #b4c6e7;;height: 20px;padding: 10px;border: 1px solid black;border-collapse: collapse;">توقيت الإرسال</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $i=>$a)
        <tr>
            <td style="word-break: normal;">{{$i+1}}</td>
            <td style="word-break: normal;">{{$a->id}}</td>
            <td style="max-width: 250px;word-break: normal;">{{$a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->id_number}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->binfit}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->mobile}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->message_type}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->send_status}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->message_text}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->datee}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$a->timee}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
