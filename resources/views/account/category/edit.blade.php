@extends("layouts._account_layout")

@section("title", "تعديل فئة اقتراح/شكوى")

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

            <form method="post" enctype="multipart/form-data" action="/account/category/update/{{$item->id}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
			<div class="row">
                        <div class="col-md-3 form-group">
                                <label>الفئة الفرعية</label>
                                <input type="text" class="form-control"  name="name"
                                       value="{{$item->name}}">
                        </div>
                        <div class="col-md-3 form-group">
                                <label>نوع الفئة</label>
                                  <select name="is_complaint" class="form-control">
                                    <option value="">نوع الفئة</option>
                                    <option value="0" {{$item->is_complaint == 0 ? 'selected' : ''}}>اقتراح</option>
                                    <option value="1" {{$item->is_complaint == 1 ? 'selected' : ''}}>شكوى</option>
                                </select>
                        </div>
                        <div class="col-md-3 form-group">
                                <label> الفئة الرئيسية </label>
            
                                <select class="form-control" class="col-md-12" name="main_category_id">
                                    <option value="{{$item->main_category_id}}">الفئات الرئيسية</option>
                                    @foreach($mainCategories as $category)
                                        <option
                                            value="{{$category->id}}" {{$main ==$category->id ? 'selected' : ''}} >  {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="main_suggest_id" id="main_suggest_id" value="{{$main}}">

                        </div>
             </div>
		<label class="check-label">فئة مقدم الاقتراح/ الشكوى:</label>
                        <div class="row form-group" dir="rtl">
            
                                <div class="col-md-4 form-check">
                                    {{-- <input class="form-check-input" name="citizen_show" type="hidden" value="0">--}}
                                    <input class="form-check-input" @if($item->citizen_show == 1){{"checked"}}@endif type="checkbox" id="citizen_show"
                                           name="citizen_show" value="1">
                                    <label class="form-check-label" for="citizen_show">
                                        غير مستفيد من مشاريع المركز
                                    </label>
                                </div>
                                <div class="col-md-4 form-check">
{{--                                    <input class="form-check-input" :checked="{{$item->benefic_show}}" name="benefic_show" type="hidden" value="0">--}}
                                    <input class="form-check-input" @if($item->benefic_show == 1){{"checked"}} @endif type="checkbox" id="benefic_show"
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
                           onclick="editLevel2()" @if($CategoryCircles) {{'checked'}} @endif >
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
                            @foreach($circles as $circle)
                                <th style="max-width: 100px;word-break: normal;">{{$circle->name}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td  colspan="1" rowspan="6" scope="col" style="word-break: normal;" id="maincat">{{$name}}</td>
                            <td  colspan="1" rowspan="6" scope="col" style="word-break: normal;" id="subcat">{{$item->name}}</td>
                        </tr>
                        @foreach($procedureTypes as $procedureType)
                            <tr>
                                @if($procedureType->id != 2 && $procedureType->id != 3)
                                    <td colspan="2" style="word-break: normal;" id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                @else
                            
                                    <td class="two" style="word-break: normal;">الجهات المختصة بمعالجة الاقتراح/الشكوى</td>
                                    <td  style="word-break: normal;" id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                            
                                @endif
                                @foreach($circles as $circle)
                                    <td  style="text-align:center;max-width: 100px;word-break: normal;">
                                        <input type="checkbox" name="category_circle[]" value="{{$procedureType->id.'_'.$circle->id}}" @if(in_array($procedureType->id.'_'.$circle->id,$Cat)) {{'checked'}} @endif>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
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
@endsection
@section('js')
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
@endsection
