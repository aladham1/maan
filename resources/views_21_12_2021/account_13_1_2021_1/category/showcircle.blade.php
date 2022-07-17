@extends("layouts._account_layout")

@section("title","المستويات الإدارية لفئة  ". $item->parentCategory->name  )


@section("content")
    <div class="row" id="app">
        <div class="col-md-12">
            <div class="table-responsive" id="editLevelTable">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;word-break: normal;">الفئة الرئيسية</th>
                    <th style="max-width: 100px;word-break: normal;">الفئة الفرعية</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الإجراء</th>
                    <th style="max-width: 100px;word-break: normal;">موظف الاستقبال</th>
                    <th style="max-width: 100px;word-break: normal;">طاقم مشروع ميداني</th>
                    <th style="max-width: 100px;word-break: normal;">منسق مشروع</th>
                    <th style="max-width: 100px;word-break: normal;">ممثل متابعة وتقييم</th>
                    <th style="max-width: 100px;word-break: normal;">مدير برنامج</th>
                    <th style="max-width: 100px;word-break: normal;">مدير برامج</th>
                    <th style="max-width: 100px;word-break: normal;">إدارة المركز</th>
                    <th style="max-width: 100px;word-break: normal;">مختص/ة العنف المبنى على النوع الاجتماعي</th>
                    <th style="max-width: 100px;word-break: normal;">مختص/ة حماية الطفولة</th>
                    <th style="max-width: 100px;word-break: normal;">مجلس الإدارة</th>
                    <th style="max-width: 100px;word-break: normal;">مدير النظام</th>

                </tr>
                </thead>
                <tbody>
                <tr>
	                <td  colspan="1" rowspan="4" scope="col" style="word-break: normal;">الشكاوى المتعلقة بطلب الحصول على معلومات</td>
	                <td  colspan="1" rowspan="4" scope="col" style="word-break: normal;">الاستهداف/ اختيار المستفيدين غير عادل</td>
	                <td style="max-width: 100px;word-break: normal;">تسجيل الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>

                </tr>
                 <tr>
	                <td style="word-break: normal;">جهة مختصة بمعالجة الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>

                <tr>
	                <td style="word-break: normal;">جهة مسؤولة عن تبليغ الرد (موظف اتصال)</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>

                </tr>
                <tr>
	                <td style="word-break: normal;">جهة إدارية مسؤولة عن متابعة معالجة الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>

                </tr>
                </tbody>
        </table>
</div>
        </div>
    </div>
@endsection
