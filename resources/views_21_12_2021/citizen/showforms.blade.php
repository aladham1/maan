@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")

@section('css')
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: right;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }


        .active, .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: left;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            /*overflow: hidden;*/
            overflow: unset;
            overflow-x: auto;
            transition: max-height 0.2s ease-out;
        }
    </style>
@endsection

@section("content")
<section class="container-fluid login-wrap inner-wrap">

<h1 class="wow bounceIn inner-h1">
         نتائج البحث 
         </h1>
         <h5 class="inner-h5">عزيزي المواطن يمكنك هنا الاطلاع على الاقتراحات والشكاوى التي تقدمت بها للمركز
        </h5>
    <div class="row">
        <div class="col-sm-12">
             @if($forms!=null)
                @if($forms->first())
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="accordion">المعلومات الأساسية</button>
                                <div class="panel" id="first_panel">
                                    <table class="table table-hover table-striped table-bordered table-responsive" style="width:100%;white-space:normal;">
                                        <tr class="showdateciz">
                                            <td>الاسم رباعي:</td>
                                            <td>{{$forms->first()->citizen->first_name ." ".$forms->first()->citizen->father_name." ".$forms->first()->citizen->last_name}}</td>
                                            <td>رقم الهوية/جواز السفر:</td>
                                            <td>{{$forms->first()->citizen->id_number}}</td>
                                        </tr>

                                        <tr class="showdateciz">
                                            <td>المحافظة:</td>
                                            <td>{{$forms->first()->citizen->governorate}}</td>
                                            <td>المنطقة :</td>
                                            <td>{{$forms->first()->citizen->city}}</td>
                                        </tr>

                                        <tr class="showdateciz">
                                            <td>العنوان:</td>
                                            <td colspan="3">{{$forms->first()->citizen->street}}</td>
                                        </tr>

                                        <tr class="showdateciz">
                                            <td>رقم التواصل (1):</td>
                                            <td>{{$forms->first()->citizen->mobile}}</td>
                                            <td>رقم التواصل (2):</td>
                                            <td>{{$forms->first()->citizen->mobile2}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

                <br>
                @if($forms!=null)
                    @if($forms->count()>0)
                    <button class="accordion">طبيعة الاقتراحات/ الشكاوى المسجلة على النظام</button>
                    <div class="panel">
                        <table style="margin-bottom:20px;width:100%;white-space:normal;" class="table table-bordered table-responsive wow bounceIn">
                            <thead>
                            <tr style="background-color:#67647E">
                                <th style="text-align: center;color:white;">#</th>
                                <th style="text-align: center;color:white;">الرقم المرجعي</th>
                                <th style="text-align: center;color:white;">فئة مقدم الاقتراح/الشكوى</th>
                                <th style="text-align: center;color:white;">اسم المشروع</th>
                                <th style="text-align: center;color:white;">النوع</th>
                                <th style="text-align: center;color:white;">الفئة</th>
                                <th style="text-align: center;color:white;">حالة الرد</th>
                                <th style="text-align: center;color:white;">معاينة</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($forms!=null)
                                @foreach ($forms as $key=>$form)
                                    <tr style="background-color:white">
                                        <td style="text-align: center;">{{$key+1}}</td>
                                        <td style="text-align: center;">{{$form->id}}</td>
                                        <td style="text-align: center;"> {{$form->project->id == 1 ? 'غير مستفيد' : ' مستفيد' }} </td>
                                        <td style="text-align: center;"> @if($form->project)  {{$form->project->name }} @endif </td>
                                        <td style="text-align: center;">{{$form->form_type->name}}</td>
                                        <td style="text-align: center;"> @if($form->category)  {{$form->category->name }} @endif </td>
                                        <td style="text-align: center;">{{$form->form_status->name}}
                                        </td>

                                        <td style="text-align: center;">
                                            <a target="_blank" title="عرض"
                                               class="btn btn-xs btn-primary"
                                               href="/citizen/form/show/{{$form->citizen->id_number}}/{{$form->id}}">
                                                عرض
                                            </a>
                                        </td>

                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                    @else
                        <br><br>
                        <div class="alert alert-danger">نأسف لا يوجد بيانات لعرضها</div>
                    @endif
                @else
                    <br><br>
                    <div class="alert alert-danger">نأسف لا يوجد بيانات لعرضها</div>
                @endif
        </div>
    </div>
</section>
<br><br><br><br>
@endsection

@section('js')
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                panel.classList.toggle("open");
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";

                }
            });
        }
    </script>
@endsection

