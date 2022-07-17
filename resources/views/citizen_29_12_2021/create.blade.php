@extends("layouts._citizen_layout")

@section("title", "معالجة  نموذج ")

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
               @media (min-width: 992px){
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: right;
}
}
@media (min-width: 768px){
.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
    float: right;
}
}
    </style>
@endsection

@section("content")
<section class="container citizen-section">
    <div class="row">
        <div class="col-md-12">
            <h3 class="inner-h1 page-title wow bounceIn">أهلاً بك عزيزي المواطن</h3>
        </div>
        @if($type == 1)
      <div class="col-md-12">

        <div class="inner-card inner-card-border">
            <div class="inner-card-content">
                <div class="inner-card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="text-bold-500 mb-25">الرجاء القيام بشرح الشكوى/ المشكلة التي تواجهها مع التأكيد على أنه سيتم التعامل مع المعلومات التي
                    ستقدمها بكل جدية وبسرية تامة</h4>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
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
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                <h4 class="text-bold-500 mb-25"> نسعد باستقبال مقترحاتكم بما يساهم في تحسين الخدمات التي يقدمها المركز، يرجى التفضل بتوضيح
                    مقترحاتكم
                </h4>
                </div>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        @endif
    
    </div>
    <div class="row">
<div class="col-md-12 col-12">
	    <div class="inner-card inner-card-user">
	<div class="inner-card-header">
	    <div class="inner-card-title"> أولاً: معلوماتك الأساسية:
</div>
	</div>
	<div class="inner-card-body">
	    <div class="row">
	        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
	        <form method="POST" id="form1" class="form-horizontal" action="/citizen/savenew" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-3 mb-10">
                                    <label for="first_name" class="col-form-label">الاسم الأول</label>
                                    <input class="form-control {{($errors->first('first_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("first_name")}}" id="first_name" name="first_name"
                                           autocomplete="off">
                                    {!! $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="father_name" class="col-form-label">اسم الأب</label>
                                    <input class="form-control {{($errors->first('father_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("father_name")}}" id="father_name"
                                           name="father_name">
                                    {!! $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="grandfather_name" class="col-form-label">اسم الجد</label>
                                    <input
                                        class="form-control {{($errors->first('grandfather_name') ? " form-error" : "")}}"
                                        type="text" value="{{old("grandfather_name")}}" id="grandfather_name"
                                        name="grandfather_name" autocomplete="off">
                                    {!! $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="last_name" class="col-form-label">اسم العائلة</label>
                                    <input class="form-control {{($errors->first('last_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("last_name")}}" id="last_name" name="last_name">
                                    {!! $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="id_number" class="col-form-label">رقم الهوية/جواز السفر</label>
                                    <input class="form-control {{($errors->first('id_number') ? " form-error" : "")}}"
                                           readonly type="number" value="{{$id_number}}" id="id_number" name="id_number"
                                           autocomplete="off">
                                    {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="mobile"  class="col-form-label">رقم التواصل (1)</label>
                                    <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}"  type="tel" maxlength="10" onchange="phonenumber($(this).val(),1)" value="{{old('mobile')}}" id="mobile" name="mobile" autocomplete="mobile">
                                    <span id="lblError1" style="color: red"></span>
                                    {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>


                                <div class="col-sm-3 mb-10">
                                    <label for="mobile2"  class="col-form-label">رقم التواصل (2)</label>
                                    <input class="form-control {{($errors->first('mobile2') ? " form-error" : "")}}" type="tel"
                                           value="{{old('mobile2')}}" maxlength="10" id="mobile2" name="mobile2" onchange="phonenumber($(this).val(),2)" autocomplete="mobile2">
                                    <span id="lblError2" style="color: red"></span>
                                    {!! $errors->first('mobile2', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="governorate" class="col-form-label">المحافظة</label>
                                    <select
                                        class="form-control {{($errors->first('governorate') ? " form-error" : "")}}"
                                        id="sel1" name="governorate">
                                        <option value="">اختر</option>
                                        <option value="شمال غزة" {{old('governorate')=='شمال غزة'?"selected":""}}>شمال غزة
                                        </option>
                                        <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                                        <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى
                                        </option>
                                        <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>
                                            خانيونس
                                        </option>
                                        <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>
                                    </select>
                                    {!! $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="city" class="col-form-label">المنطقة</label>
                                    <input class="form-control {{($errors->first('city') ? " form-error" : "")}}"
                                           type="text" value="{{old("city")}}" id="city" name="city" autocomplete="cityxx">
                                    {!! $errors->first('city', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="street" class="col-form-label">العنوان</label>
                                    <input class="form-control {{($errors->first('street') ? " form-error" : "")}}"
                                           type="text" value="{{old("street")}}" id="street" name="street" autocomplete="streetxx">
                                    {!! $errors->first('street', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>


                                <div class="col-sm-3 mb-10">
                                    <input type="hidden" name="type" value="{{$type}}">
                                    <label for="type_name" class="col-form-label">فئة مقدم الشكوى</label>
                                    <input name="type_name"
                                           value="@if($type=='0'){{'مستفيد'}}@else{{'غير مستفيد'}}@endif" type="text"
                                           readonly class="form-control">
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <input type="hidden" name="project_id" value="1">
                                    <label for="project_name" class="col-form-label">اسم المشروع</label>
                                    <input name="project_name" value="{{$project_name}}" type="text"
                                           readonly class="form-control">
                                </div>
                            </div>

                        </form>
	        </div>
	    </div>
</div>
    <!--<div class="container" style="" id="app">
            <div class="row">
         
            <h4 class="inner-h4">
                أولاً: معلوماتك الأساسية:
            </h4>
                        <form method="POST" id="form1" class="form-horizontal" action="/citizen/savenew" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-3 mb-10">
                                    <label for="first_name" class="col-form-label">الاسم الأول</label>
                                    <input class="form-control {{($errors->first('first_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("first_name")}}" id="first_name" name="first_name"
                                           autocomplete="off">
                                    {!! $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="father_name" class="col-form-label">اسم الأب</label>
                                    <input class="form-control {{($errors->first('father_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("father_name")}}" id="father_name"
                                           name="father_name">
                                    {!! $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="grandfather_name" class="col-form-label">اسم الجد</label>
                                    <input
                                        class="form-control {{($errors->first('grandfather_name') ? " form-error" : "")}}"
                                        type="text" value="{{old("grandfather_name")}}" id="grandfather_name"
                                        name="grandfather_name" autocomplete="off">
                                    {!! $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="last_name" class="col-form-label">اسم العائلة</label>
                                    <input class="form-control {{($errors->first('last_name') ? " form-error" : "")}}"
                                           type="text" value="{{old("last_name")}}" id="last_name" name="last_name">
                                    {!! $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="id_number" class="col-form-label">رقم الهوية/جواز السفر</label>
                                    <input class="form-control {{($errors->first('id_number') ? " form-error" : "")}}"
                                           readonly type="number" value="{{$id_number}}" id="id_number" name="id_number"
                                           autocomplete="off">
                                    {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="mobile"  class="col-form-label">رقم التواصل (1)</label>
                                    <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}"  type="tel" maxlength="10" onchange="phonenumber($(this).val(),1)" value="{{old('mobile')}}" id="mobile" name="mobile" autocomplete="mobile">
                                    <span id="lblError1" style="color: red"></span>
                                    {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>


                                <div class="col-sm-3 mb-10">
                                    <label for="mobile2"  class="col-form-label">رقم التواصل (2)</label>
                                    <input class="form-control {{($errors->first('mobile2') ? " form-error" : "")}}" type="tel"
                                           value="{{old('mobile2')}}" maxlength="10" id="mobile2" name="mobile2" onchange="phonenumber($(this).val(),2)" autocomplete="mobile2">
                                    <span id="lblError2" style="color: red"></span>
                                    {!! $errors->first('mobile2', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="governorate" class="col-form-label">المحافظة</label>
                                    <select
                                        class="form-control {{($errors->first('governorate') ? " form-error" : "")}}"
                                        id="sel1" name="governorate">
                                        <option value="">اختر</option>
                                        <option value="شمال غزة" {{old('governorate')=='شمال غزة'?"selected":""}}>شمال غزة
                                        </option>
                                        <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                                        <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى
                                        </option>
                                        <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>
                                            خانيونس
                                        </option>
                                        <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>
                                    </select>
                                    {!! $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="city" class="col-form-label">المنطقة</label>
                                    <input class="form-control {{($errors->first('city') ? " form-error" : "")}}"
                                           type="text" value="{{old("city")}}" id="city" name="city" autocomplete="cityxx">
                                    {!! $errors->first('city', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <label for="street" class="col-form-label">العنوان</label>
                                    <input class="form-control {{($errors->first('street') ? " form-error" : "")}}"
                                           type="text" value="{{old("street")}}" id="street" name="street" autocomplete="streetxx">
                                    {!! $errors->first('street', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>


                                <div class="col-sm-3 mb-10">
                                    <input type="hidden" name="type" value="{{$type}}">
                                    <label for="type_name" class="col-form-label">فئة مقدم الشكوى</label>
                                    <input name="type_name"
                                           value="@if($type=='0'){{'مستفيد'}}@else{{'غير مستفيد'}}@endif" type="text"
                                           readonly class="form-control">
                                </div>

                                <div class="col-sm-3 mb-10">
                                    <input type="hidden" name="project_id" value="1">
                                    <label for="project_name" class="col-form-label">اسم المشروع</label>
                                    <input name="project_name" value="{{$project_name}}" type="text"
                                           readonly class="form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                    </div>-->
            <!--<h4 class="inner-h4">
                @if($type == 1)
                    ثانياً: تفاصيل الشكوى:
                @elseif($type == 2)
                    ثانياً: تفاصيل الاقتراح:
                @else
                @endif
            </h4>
                <!--first row  -->
                <style>
                    /*.form-group.row {
                        display: flex;
                    }

                    .col-form-label {
                        float: right;
                    }*/
                </style>
                <?php
                if ($type != 1 && $type != 2)  // type compaint of suggestion ...
                    $type = 3;
                ?>

                   <!-- <h5 style="font-size:16px;line-height: 1.8;">
                        @if($type==1)
                            نأسف للازعاج والمشاكل التي تم التسبب بها , الرجاء القيام بشرح المشكلة التي تواجهها , معالعلم
                            أننا سوف
                            نقوم بأخذ مشكلتك على محمل الجد وسيتم الرد عليك في أسرع وقت
                        @elseif($type==2)
                            أخي المواطن ، يمكنك من هناك إرسال للاقتراحات لتحسين خدماتنا ، مع العلم أنه سيتم أخذ
                            الاقتراحات على محمل
                            الجد ومراجعتها
                        @else
                            نفتخر بأننا كنا عند حسن ظنكم يمكنكم من خلال هذا النموذج ارسال رسائل الشكر للقائمين على خدمات
                            المواطنين
                        @endif
                    </h5>-->

{{--                    @if(auth()->user())--}}
{{--                        <br>--}}
{{--                        <h4><B>المواطن : </B>{{$citizen_name}}</h4>--}}
{{--                        <h4><B>المشروع : </B>{{$project_name}}</h4>--}}
{{--                    @endif--}}
</div>

</div>
</div>
<div class="row">
<div class="col-md-12 col-12">
	    <div class="inner-card inner-card-user">
	<div class="inner-card-header">
	    <div class="inner-card-title">
                @if($type == 1)
                    ثانياً: تفاصيل الشكوى:
                @elseif($type == 2)
                    ثانياً: تفاصيل الاقتراح:
                @else
                @endif
            
</div>
	</div>
	<div class="inner-card-body">
	    <div class="row">
	        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-12">
                        @if(Session::get("msg"))
                            <?php
                            $msg = Session::get("msg");
                            $msgClass = "alert-info";
                            $first2letters = strtolower(substr($msg, 0, 2));
                            if ($first2letters == "s:") {
                                //قص اول حرفين
                                $msg = substr($msg, 2);
                                $msgClass = "alert-success";
                            } else if ($first2letters == "i:") {
                                $msg = substr($msg, 2);
                                $msgClass = "alert-info";
                            } else if ($first2letters == "w:") {
                                $msg = substr($msg, 2);
                                $msgClass = "alert-warning";
                            } else if ($first2letters == "e:") {
                                $msg = substr($msg, 2);
                                $msgClass = "alert-danger";
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-3"></div>

                                <div class="col-sm-6">
                                    <div class="alert alert-danger {{$msgClass}} alert-dismissible">
                                        <ul>
                                            <li>{{$msg}} </li>
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>

                            </div>
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <form id="form2" action="/forms/formsavenew" method="POST"
                              class="form-horizontal" enctype="multipart/form-data" autocomplete="off"> @csrf
                            <div class="col-sm-12"><br></div>
                            <input type="hidden" name="project_id" value="1">
                            <input type="hidden" name="datee" value="<?php echo date("Y/m/d") ?>">
                            <input type="hidden" name="citizen_id" value="{{$_GET['id_number']}}">
                            <input type="hidden" name="type" value="{{$type}}">

                            <!--  -->
                            @if(auth()->user())
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="sent_type" class="col-form-label">آلية الاستقبال</label>
                                        <select
                                            class="form-control {{($errors->first('sent_type') ? " form-error" : "")}}"
                                            id="sent_type_sel1" name="sent_type" onchange="getsent_type()">
                                            <option value=""> اختر آلية الاستقبال</option>
                                            @foreach($sent_typee as $sent_type)
                                                @if($sent_type->id != 1 && $sent_type->id != 6)
                                                    <option value="{{$sent_type->id}}"
                                                            @if(old("sent_type")==$sent_type->name)selected @elseif(app('request')->input('sent_type') && app('request')->input('sent_type') ==$sent_type->id)selected @endif>{{$sent_type->name}}</option>

                                                @endif
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
                                <div class="col-sm-4">
                                    <label for="title"
                                           class="ol-form-label">موضوع ال{{$form_type->find($type)->name}}</label>
                                    <input id="title" type="text"
                                           class="form-control {{($errors->first('title') ? " form-error" : "")}}"
                                           value="{{old("title")}}"
                                           placeholder="الموضوع" name="title">
                                    {!! $errors->first('title', '<p class="help-block" style="color:red;">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
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
                        </form>
                    </div>
                </div>
</div>
        </div>
        </div>
        </div>
        </div>
        </div>
        

            <div class="form-group row" align="center" style="text-align: center;">
            <div class="col-sm-12">
                <button type="submit" id="submitBtn" class="wow bounceIn btn btn-info btn-md"
                        style="background-color:#BE2D45;border:0;">
                    إرسال {{$form_type->find($type)->name}}</button>
            </div>
        
</div>

    </section>
@endsection

@section('js')

    <script>
        function phonenumber(inputtxt,id)
        {
            // regular expression pattern
            var regexPattern=new RegExp(/^(059|056)[0-9-+]+$/);

            console.log(inputtxt);
            if(id ==2 && !(inputtxt.length === 0)){
                if(regexPattern.test(inputtxt) && inputtxt.length == 10 )
                {
                    $('#lblError'+id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                }
                else
                {
                    $('#lblError'+id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            }else if(id == 1){
                if(regexPattern.test(inputtxt) && inputtxt.length == 10 )
                {
                    $('#lblError'+id).html('');
                    console.log(regexPattern.test(inputtxt));
                    return true;

                }
                else
                {
                    $('#lblError'+id).html('يرجى إدخال رقم تواصل صحيح');
                    return false;
                }
            }
        }
    </script>

    <script>
        $(document).ready(function(){
 <?php $x = 250;

 if (!auth()->user()){
     $x= 2000;
 }?>

     var ime = <?php echo $x;?>;
            $('#submitBtn').on('click',function(){
                $('#form1').submit();
                console.log("submitted 1");

                setTimeout( function () {
                    $('#form2').submit();
                    console.log("submitted 2");
                }, 1500);


            });

        });
    </script>

    <script>
        function  getsent_type() {
            var xx = $('#sent_type_sel1').val();

            if(xx == 4){
                $('#type_of_followup_visit_div').show();
                $('#type_of_box_div').hide();
            }else if(xx == 5){
                $('#type_of_box_div').show();
                $('#type_of_followup_visit_div').hide();
            }else{
                $('#type_of_followup_visit_div').hide();
                $('#type_of_box_div').hide();
            }

        }
    </script>
@endsection

