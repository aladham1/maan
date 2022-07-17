@extends("layouts._citizen_layout")

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
            /*max-height: 0;*/
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        @media (min-width: 992px) {
            .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
                float: right;
            }
        }

        @media (min-width: 768px) {
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: right;
            }
        }
    </style>
@endsection

@section("title", "متابعة نموذج ")

@section("content")

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;">أهلاً بك عزيزي المواطن</h3>
                </div>

                @if($type == 1)
                    <div class="col-md-12">
                        <div class="inner-card inner-card-border">
                            <div class="inner-card-content">
                                <div class="inner-card-body">
                                    <div class="row pb-50">
                                        <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                            <div>
                                                <h4 class="text-bold-500 mb-25">الرجاء القيام بشرح الشكوى/ المشكلة التي
                                                    تواجهها مع التأكيد على أنه سيتم التعامل مع المعلومات التي
                                                    ستقدمها بكل جدية وبسرية تامة</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="col-md-12">
                        <div class="inner-card inner-card-border">
                            <div class="inner-card-content">
                                <div class="inner-card-body">
                                    <div class="row pb-50">
                                        <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                            <div>
                                                <h4 class="text-bold-500 mb-25"> نسعد باستقبال مقترحاتكم بما يساهم في
                                                    تحسين
                                                    الخدمات التي يقدمها المركز، يرجى التفضل بتوضيح
                                                    مقترحاتكم
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

{{--                --}}
                <div class="col-md-12 col-12">
                    <div class="inner-card inner-card-user">
                        <div class="inner-card-header">
                            <div class="inner-card-title">
                                @if($type == 1)
                                    أولاً : تفاصيل الشكوى:
                                @elseif($type == 2)
                                    أولاً : تفاصيل الاقتراح:
                                @else
                                @endif

                            </div>
                        </div>
                        <div class="inner-card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form action="/forms/formsavenew" method="POST"
                                                  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <br>
                                                </div>
                                                <input type="hidden" name="project_id" value="{{$project_id}}">
                                                <input type="hidden" name="datee" value="<?php echo date("Y/m/d") ?>">
                                                <input type="hidden" name="type" value="{{$type}}">
                                                <input type="hidden" name="hide_data" value="{{$hide_data}}">
                                                <input type="hidden" name="private_contact_option"
                                                       value="{{$private_contact_option}}">
                                                <input type="hidden" name="email_private" value="{{$email_private}}">
                                                <input type="hidden" name="mobile_private" value="{{$mobile_private}}">

                                                <!--  -->
                                                @if(auth()->user())
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="sent_type" class="col-form-label">آلية الاستقبال</label>
                                                            <select
                                                                class="form-control {{($errors->first('sent_type') ? " form-error" : "")}}"
                                                                id="sent_type_sel1" name="sent_type"
                                                                onchange="getsent_type()">
                                                                <option value=""> اختر آلية الاستقبال</option>
                                                                @foreach($sent_typee as $sent_type)
                                                                    {{--                                                @if($sent_type->id != 1 && $sent_type->id != 6)--}}
                                                                    <option value="{{$sent_type->id}}"
                                                                            @if(old("sent_type")==$sent_type->id)selected
                                                                            @elseif(app('request')->input('sent_type') && app('request')->input('sent_type') ==$sent_type->id)selected @endif>{{$sent_type->name}}</option>

                                                                    {{--                                                @endif--}}
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('sent_type', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="type_of_box_div" style="display: none !important;">
                                                        <div class="col-sm-4">
                                                            <label for="box_place" class="col-form-label">مكان تواجد
                                                                الصندوق</label>
                                                            <input id="box_place" type="text"
                                                                   class="form-control {{($errors->first('box_place') ? " form-error" : "")}}"
                                                                   value="{{old("box_place")}}"
                                                                   name="box_place">
                                                            {!! $errors->first('box_place', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <label for="number_of_open_box" class="col-form-label">رقم اجتماع فتح
                                                                الصندوق</label>
                                                            <input id="number_of_open_box" type="text"
                                                                   class="form-control {{($errors->first('number_of_open_box') ? " form-error" : "")}}"
                                                                   value="{{old("number_of_open_box")}}"
                                                                   name="number_of_open_box">
                                                            {!! $errors->first('number_of_open_box', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <label for="date_open_box" class="col-form-label">تاريخ فتح الصندوق</label>
                                                            <input type="date" class="form-control" name="date_open_box"
                                                                   value="{{old('date_open_box')}}"/>
                                                            {!! $errors->first('date_open_box', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="type_of_followup_visit_div"
                                                         style="display: none !important;">
                                                        <div class="col-sm-6">
                                                            <label for="type_of_followup_visit" class="col-form-label">نوع زيارة
                                                                المتابعة</label>
                                                            <input id="type_of_followup_visit" type="text"
                                                                   class="form-control {{($errors->first('type_of_followup_visit') ? " form-error" : "")}}"
                                                                   value="{{old("type_of_followup_visit")}}"
                                                                   name="type_of_followup_visit">
                                                            {!! $errors->first('type_of_followup_visit', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="datee" class="col-form-label">تاريخ
                                                                تقديم {{$form_type->find($type)->name}}</label>
                                                            <input type="date" class="form-control" name="datee"
                                                                   value="{{old('datee')}}"/>
                                                            {!! $errors->first('datee', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                @else
                                                    <input type="hidden" name="sent_type" value="1">
                                                @endif


                                                @if($type==1)
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="category_id" class="col-form-label">فئة الشكوى</label>
                                                            <select id="category"
                                                                    class="form-control {{($errors->first('category_id') ? " form-error" : "")}}"
                                                                    id="sel1" name="category_id">
                                                                <option value="">اختر فئة الشكوى</option>
                                                                @foreach($category as $cat)
                                                                    @if($project_id>1)
                                                                        @if($cat->benefic_show==0)
                                                                            @continue
                                                                        @endif
                                                                        @if($cat->is_complaint != 0)
                                                                            <option value="{{$cat->id}}"
                                                                                    @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                                                        @endif
                                                                    @endif
                                                                    @if($project_id==1)
                                                                        @if($cat->citizen_show==0)
                                                                            @continue
                                                                        @endif
                                                                        @if($cat->is_complaint != 0)
                                                                            <option value="{{$cat->id}}"
                                                                                    @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                        </div>
                                                    </div>

                                                @elseif($type == 2)
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="category_id" class="col-form-label">فئة الاقتراح</label>
                                                            <select id="category"
                                                                    class="form-control {{($errors->first('category_id') ? " form-error" : "")}}"
                                                                    id="sel1" name="category_id">
                                                                <option value=""> اختر فئة الاقتراح</option>
                                                                @foreach($category as $cat)
                                                                    @if($project_id>1)
                                                                        @if($cat->benefic_show==0)
                                                                            @continue
                                                                        @endif
                                                                        @if($cat->is_complaint != 1)
                                                                            <option value="{{$cat->id}}"
                                                                                    @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                                                        @endif
                                                                    @endif
                                                                    @if($project_id==1)
                                                                        @if($cat->citizen_show==0)
                                                                            @continue
                                                                        @endif
                                                                        @if($cat->is_complaint != 1)
                                                                            <option value="{{$cat->id}}"
                                                                                    @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('category_id', '<p class="help-block" style="color:red;">:message</p>') !!}

                                                        </div>
                                                    </div>
                                                @else
                                                    <div style="margin-right:-20px;" class="form-group">
                                                        <input type="hidden" name="category_id" value="1">
                                                    </div>

                                                @endif

                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <label for="content"
                                                               class="col-form-label">محتوى ال{{$form_type->find($type)->name}}</label>
                                                        <textarea id="content"
                                                                  placeholder="@if($type == 1){{'الرجاء كتابة تفاصيل الشكوى بصورة واضحة في أقل من 300 كلمة'}}@elseif($type == 2){{'الرجاء كتابة تفاصيل الاقتراح بصورة واضحة في أقل من 300 كلمة'}}@endif"
                                                                  class="form-control {{($errors->first('content') ? " form-error" : "")}}"
                                                                  rows="6" id="comment" name="content">{{old("content")}}</textarea>

                                                        {!! $errors->first('content', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>


                                                <div class="form-group row" style="margin-top: 45px;">
                                                    <div class="col-sm-4">
                                                        <label for="fileinput" class="col-form-label">تحميل المرفقات</label>
                                                        <input style="margin-left:-20px;" type="file" class="form-control" name="fileinput">
                                                        {!! $errors->first('fileinput', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="center" style="text-align: center;">
                                                    <div class="col-sm-12 text-center">
                                                        <input type="submit" class="btn btn-info btn-md"
                                                                style="background-color:#BE2D45;border:0;"
                                                               value=" إرسال {{$form_type->find($type)->name}}"
                                                             />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                --}}

            </div>
        </div>
    </section>
    <!--****************************************************** start footer **************************************************************-->
@endsection

@section('js')

    <script>
        function phonenumber(inputtxt, id) {
            // regular expression pattern
            var regexPattern = new RegExp(/^(059|056)[0-9-+]+$/);

            console.log(inputtxt);
            if (id == 2 && !(inputtxt.length === 0)) {
                if (regexPattern.test(inputtxt) && inputtxt.length == 10) {
                    $('#lblError' + id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                } else {
                    $('#lblError' + id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            } else if (id == 1) {
                if (regexPattern.test(inputtxt) && inputtxt.length == 10) {
                    $('#lblError' + id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                } else {
                    $('#lblError' + id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            }
        }
    </script>

    <script>
        $(document).ready(function () {

            var xx = $('#sent_type_sel1').val();

            if (xx == 4) {
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            } else if (xx == 5) {
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            } else {
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

            $('#submitBtn').on('click', function () {
                $('#form1').submit();
                console.log("submitted 1");

                setTimeout(function () {
                    $('#form2').submit();
                    console.log("submitted 2");
                }, 100);


            });

        });
    </script>

    <script>
        function getsent_type() {
            var xx = $('#sent_type_sel1').val();

            if (xx == 4) {
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            } else if (xx == 5) {
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            } else {
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

        }
    </script>
@endsection

