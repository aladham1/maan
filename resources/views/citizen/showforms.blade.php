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

        .btn-circle {
            width: 70px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 14px;
            line-height: 1.428571429;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .pull-right {
            float: left !important;
        }

        .table-striped > tbody > tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table-striped > tbody > tr > td:nth-child(odd) {
            background-color: #f9f9f9;
            font-weight: 600;
        }
    </style>
@endsection

@section("content")
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;"> أهلاً بك عزيزي المواطن </h3>
            </div>


            <div class="col-md-12">

                <div class="inner-card inner-card-border">
                    <div class="inner-card-content">
                        <div class="inner-card-body">
                            <div class="row pb-50">
                                <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                    <div>
                                        <h4 class="text-bold-500 mb-25">عزيزي المواطن يمكنك هنا الاطلاع على الاقتراحات
                                            والشكاوى التي تقدمت بها للمركز</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-12">
                @if($forms!=null)
                    @if($forms->first())
                        <div class="inner-card inner-card-user">
                            <div class="inner-card-header">
                                <div class="inner-card-title">
                                    <button type="button"
                                            style="height:30px !important;width: 30px !important;margin-left: 10px;"
                                            class="btn btn-primary add-btn" id="first_msg_btn">
                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                    </button>
                                    أولاً: المعلومات الأساسية

                                </div>
                            </div>


                            <div class="inner-card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">


                                        <div id="first_msg">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered"
                                                       style="width:100%;white-space:normal;">
                                                    <tr class="showdateciz">
                                                        <td colspan="2">الاسم رباعي:</td>
                                                        <td colspan="2">{{$forms->first()->citizen->first_name ." ".$forms->first()->citizen->father_name." ".$forms->first()->citizen->last_name}}</td>
                                                        <td colspan="2">رقم الهوية/جواز السفر:</td>
                                                        <td colspan="2">{{$forms->first()->citizen->id_number}}</td>
                                                        <td colspan="2">رقم التواصل (1):</td>
                                                        <td colspan="2">{{$forms->first()->citizen->mobile}}</td>
                                                    </tr>

                                                    <tr class="showdateciz">
                                                        <td colspan="2">رقم التواصل (2):</td>
                                                        <td colspan="2">{{$forms->first()->citizen->mobile2}}</td>
                                                        <td colspan="2">المحافظة:</td>
                                                        <td colspan="2">{{$forms->first()->citizen->governorate}}</td>
                                                        <td colspan="2">المنطقة:</td>
                                                        <td colspan="2">{{$forms->first()->citizen->city}}</td>
                                                    </tr>

                                                    <tr class="showdateciz">
                                                        <td colspan="2">العنوان:</td>
                                                        <td colspan="5">{{$forms->first()->citizen->street}}</td>

                                                        <td colspan="2">فئة مقدم الشكوى:</td>
                                                        <td colspan="2">{{$forms->first()->project->id == 1 ? 'غير مستفيد' : ' مستفيد'}}</td>

                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endif
                @endif
            </div>

            @if($forms!=null)
                @if($forms->count()>0)
                    <div class="col-md-12 col-12">
                        <div class="inner-card inner-card-user">
                            <div class="inner-card-header">
                                <div class="inner-card-title">
                                    <button type="button"
                                            style="height:30px !important;width: 30px !important;margin-left: 10px;"
                                            class="btn btn-primary add-btn" id="second_msg_btn">
                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                    </button>
                                    ثانياً: تفاصيل الاقتراحات والشكاوى المسجلة على النظام

                                </div>
                            </div>

                            <div class="inner-card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div id="second_msg">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" style="width:100%;white-space:normal;">s
                                                    <table style="margin-bottom:20px;width:100%;white-space:normal;"
                                                           class="table table-bordered table-responsive wow bounceIn">
                                                        <thead>
                                                        <tr style="background-color: #f9f9f9;font-weight: 600;border: 1px solid #ddd;color: #333;">
                                                            <th style="text-align: center;color:#333;">#</th>
                                                            <th style="text-align: center;color:#333;">الرقم المرجعي
                                                            </th>
                                                            <th style="text-align: center;color:#333;">فئة مقدم
                                                                الاقتراح/الشكوى
                                                            </th>
                                                            <th style="text-align: center;color:#333;">اسم المشروع</th>
                                                            <th style="text-align: center;color:#333;">النوع</th>
                                                            <th style="text-align: center;color:#333;">فئة
                                                                الاقتراح/الشكوى
                                                            </th>
                                                            <th style="text-align: center;color:#333;">حالة الرد</th>
{{--                                                            <th style="text-align: center;color:#333;">المرفقات</th>--}}
                                                            <th style="text-align: center;color:#333;">معاينة</th>
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
                                                                           href="/citizen/form/follow_form/{{$form->id}}">
                                                                            عرض
                                                                        </a>
                                                                    </td>

                                                            @endforeach
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
             aria-hidden="true"
             style=" position: absolute;left: 42%;top: 40%;transform: translate(-50%, -50%);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('js')
    <script>
        $('#first_msg').hide();
        $('#first_msg_btn').click(function () {

            $('#first_msg').slideToggle("fast", function () {
                if ($('#first_msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });

    </script>
    <script>
        $('#second_msg').hide();
        $('#second_msg_btn').click(function () {

            $('#second_msg').slideToggle("fast", function () {
                if ($('#second_msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });

    </script>
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

    <script>
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
// return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>
@endsection

