<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table style="padding: 10px;border: 1px solid black;border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <td colspan="5" style="text-align: center;vertical-align:center;background-color: #cfe3f8; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">
            نظام مركز معاً لإدارة الاقتراحات والشكاوى- ملحق رقم (9):توصيات مستخدمي النظام.
        </td>
    </tr>
    <tr>
        <th  style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">#</th>
        <th  style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم المستخدم</th>
        <th  style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">اسم المشروع</th>
        <th  style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">تاريخ رفع التوصيات</th>
        <th  style="text-align: center;vertical-align:center;background-color: #a9d08e; height: 30px;padding: 10px;border: 1px solid black;border-collapse: collapse;">التوصيات</th>
    </tr>
    </thead>
    <tbody>

    @foreach($items as $key => $item)
        <tr>
            <td style="padding: 10px;border: 1px solid black;border-collapse: collapse;">{{ $key+1 }}</td>
            <td style="max-width: 100px;word-break: normal;">{{$item->user->name}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$item->form->project->name}}</td>
            <td style="max-width: 100px;word-break: normal;">{{$item->created_at}}</td>
            <td style="max-width: 200px;word-break: normal;">{{$item->recommendations_content}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
