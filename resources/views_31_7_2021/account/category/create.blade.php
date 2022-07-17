@extends("layouts._account_layout")

@section("title", "إضافة فئة اقتراح/شكوى جديدة")
@section('css')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
@endsection
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
هذه الواجهة مخصصة للتحكم في إضافة فئات الاقتراحات والشكاوى الجديدة والمستويات الإدارية في التعامل معها
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
                    <div class="card-title"> إضافة فئات الاقتراحات والشكاوى الجديدة</div>
                </div>
                <div class="card-body">
            <form action="/account/category" method="post" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-md-2">
                                <label>الفئة الفرعية</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control {{($errors->first('name') ? " form-error" : "")}}" placeholder="اضافة فئة فرعية جديدة" name="name"
                                       value="" id="name">
                                {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-md-12"></div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>نوع الفئة</label>
                            </div>
                            <div class="col-md-4">
                                <select name="is_complaint" class="form-control {{($errors->first('is_complaint') ? " form-error" : "")}}" id="is_complaint">
                                    <option value="">نوع الفئة</option>
                                    <option value="0">اقتراح</option>
                                    <option value="1">شكوى</option>
                                </select>
                                {!! $errors->first('is_complaint', '<p class="help-block" style="color:red;">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-md-12"></div>
                        <br><br>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label> الفئة الرئيسية </label>
                            </div>

                            <div class="col-md-4">
                                <select class="form-control {{($errors->first('main_category_id') ? " form-error" : "")}}" class="col-md-12" name="main_category_id" id="main_category_id">
                                    <option value="">الفئات الرئيسية</option>
                                    @foreach($mainCategories as $category)
                                        <option
                                            value="{{$category->id}}" {{old('main_category_id') ==$category->id ? 'selected' : ''}} >  {{$category->name}} </option>
                                    @endforeach
                                </select>

                                {!! $errors->first('main_category_id', '<p class="help-block" style="color:red;">:message</p>') !!}

                                <input type="hidden" name="main_suggest_id" id="main_suggest_id" value="{{old('main_category_id')}}">
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12"></div>
                        <br><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label>فئة مقدم الاقتراح/ الشكوى</label>
                            </div>
{{--                            <div class="col-md-12"></div><br><br>--}}

                            <div class="col-md-4 form-check">
                                <input class="form-check-input" type="checkbox"  id="citizen_show" name="citizen_show" value="1">
                                <label class="form-check-label" for="citizen_show">
                                    غير مستفيد من مشاريع المركز
                                </label>
                            </div>
                            <div class="col-md-4 form-check">
                                <input class="form-check-input" type="checkbox"  id="benefic_show" name="benefic_show" value="1">
                                <label class="form-check-label" for="citizen_show">

                                    مستفيد من مشاريع المركز
                                </label>

                            </div>

                            {!! $errors->first('benefic_show', '<p class="help-block" style="color:red;">:message</p>') !!}

                        </div>

                    </div>
                </div>
                <div class="form-check">

                    <div class="col-md-12"></div>
                    <br><br>
                    <input id="editLevelCheck2" type="checkbox" name="editLevel" value="editLevel"
                           onclick="editLevel2()">
                    <label for="editLevel" style="vertical-align: middle;">المستويات الإدارية المختصة في التعامل مع هذه الفئة</label>
                </div>
                <br>

                <div class="mt-3"></div>

                <div class="table-responsive" id="editLevelTable1" style="display:none;">
                    <table style="white-space:normal;" class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td style="background-color: #ed6b75;color: #fff !important;max-width: 100px;word-break: normal;">الفئة الرئيسية</td>
                                <td style="word-break: normal;" id="maincat"></td>
                            </tr>
                            <tr>
                                <td style="background-color: #ed6b75;color: #fff !important;max-width: 100px;word-break: normal;">الفئة الفرعية</td>
                                <td  style="word-break: normal;" id="subcat"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive" id="editLevelTable2" style="display:none;">
                    <table style="width:185% !important;max-width:185% !important;white-space:normal;" class="table table-hover table-striped">
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
                                    <td colspan="2" style="word-break: normal;" id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                @else
                                    <td  style="word-break: normal;">الجهات المختصة بمعالجة الشكوى</td>
                                    <td  style="word-break: normal;" id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                @endif
                                @foreach($circles as $circle)
                                    <td style="text-align:center;max-width: 100px;word-break: normal;">
                                        <input type="checkbox" name="category_circle[]" value="{{$procedureType->id.'_'.$circle->id}}">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-actions" style="
    text-align: center;">
                    <input type="submit" class="btn btn-success" value="إضافة">
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
        new Vue({
            el: '#app',
            data: {
                benefic_show: false,
                citizen_show: false,
            },
        });


        function editLevel2() {

            $('#subcat').text($('#name').val());
            $('#maincat').text($('#main_category_id option:selected').text());
            // Get the checkbox
            var checkBox = document.getElementById("editLevelCheck2");
            // Get the output text
            var text = document.getElementById("editLevelTable2");
            var text1 = document.getElementById("editLevelTable1");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
                text1.style.display = "block";
            } else {
                text.style.display = "none";
                text1.style.display = "none";
            }
        }
    </script>

    <script>
        $('#main_category_id').change(function () {
            $('#main_suggest_id').val($('#main_category_id').val());
        });


        $("#is_complaint").change(function () {
            var is_complaint = $("#is_complaint").val();
            route = '/account/category/get_categories/'+ is_complaint;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType : 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response)
                    $("#main_category_id").empty();
                    $("#main_category_id").append("<option value=''>الفئات الرئيسية</option>");
                    $.each(response, function (key, value) {
                        $("#main_category_id").append('<option value="' + value.id + '">' + value.name + '</option>');

                    });
                }
            });
        });

    </script>

    <script>
        const table = document.querySelector('table');

        let headerCell = null;

        for (let row of table.rows) {
            const firstCell = row.cells[0];

            if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
                headerCell = firstCell;
            } else {
                headerCell.rowSpan++;
                headerCell.style = "vertical-align: middle";
                firstCell.remove();
            }
        }
    </script>
@endsection
