@extends("layouts._account_layout")
<?php
$name = "";
if ($item->is_complaint == 1) {
    $name = $item->parentCategory->name;
} else {
    $name = $item->parentSuggest->name;
}

$Cat = array();
foreach ($CategoryCircles as $CategoryCircle) {
    array_push($Cat, $CategoryCircle->procedure_type . '_' . $CategoryCircle->circle_id);
}
?>
@section("title","المستويات الإدارية لفئة الاقتراح/ الشكوى")


@section("content")
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة لعرض المستويات الإدارية التابعة لفئة الاقتراح/ الشكوى
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
<div class="row"  id="app">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
            <div class="card-body">
<div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <div class="card card-user">
                                <!--<div class="card-header">-->
                                <!--    <div class="card-title">بيانات فئات الاقتراحات والشكاوى</div>-->
                                <!--</div>-->
                                <div class="card-body">
                                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive" id="editLevelTable2">

                <table style="white-space:normal;;width: 100%;">

                    <tr>
                        <th class="font-weight-bold" style="max-width: 100px;word-break: normal">الفئة الرئيسية
                        </th>
                        <td style="word-break: normal;" id="maincat">{{$name}}</td>
                        
                        <th class="font-weight-bold" style="max-width: 100px;word-break: normal;">الفئة الفرعية
                        </th>
                        <td style="word-break: normal;" id="subcat">{{$item->name}}</td>

                    </tr>

             
                </table>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <form method="post" enctype="multipart/form-data" action="/account/category/updateCategoryCircles/{{$item->id}}">
                @csrf
                <div class="table-responsive" id="editLevelTable2">
                    <table style="width:185% !important;max-width:185% !important;white-space:normal;"
                           class="table table-hover table-striped">
                        <thead>
                        <tr>

                            <th colspan="2" style="max-width: 100px;word-break: normal;">نوع الإجراء</th>
                            @foreach($circles as $circle)
                                <th style="max-width: 100px;word-break: normal;">{{$circle->name}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($procedureTypes as $procedureType)
                            <tr>
                                @if($procedureType->id != 2 && $procedureType->id != 3)
                                    <td colspan="2" style="word-break: normal;"
                                        id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                @else
                                    <td class="two" style="word-break: normal;">الجهات المختصة بمعالجة
                                                    الاقتراح/الشكوى
                                                </td>
                                    <td style="word-break: normal;"
                                        id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                @endif
                                @foreach($circles as $circle)
                                    <td style="text-align:center;max-width: 100px;word-break: normal;">
                                        <input type="checkbox" name="category_circle[]"
                                               value="{{$procedureType->id.'_'.$circle->id}}" @if(in_array($procedureType->id.'_'.$circle->id,$Cat)) {{'checked'}} @endif>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <br>
                <br>
                <div class="form-group row" align="left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="تعديل">
                        <a type="button" href="/account/category" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
     </div>
    </div>
@endsection
@section('js')
        <script>
        $('tr td.two').each(
            function () {
                var that = $(this),
                    next = that.parent().next().find('.two');
                if (next.length) {
                    that
                        .text(next.remove().text())
                        .attr('rowspan', '2');
                }
            });
    </script>
@endsection
