@extends("layouts._account_layout")

@section("title", "إضافة مستفيدين جدد ")


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
هذه الواجهة مخصصة لإضافة بيانات مستفيدي مشاريع المركز في النظام                            </h4>
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
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات المستفيدين</div>
                </div>
                <div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <h4>يمكنك إضافة بيانات المستفيدين من خلال : </h4>
        </div>
    </div>
    <div id="dataListPanel" class="panel panel-default" style="margin-top:15px;background: #fafafa;">
        <div class="panel-body">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <input id="dataListCheck" type="checkbox" name="dataListC" value="dataListC" onclick="dataList()">
            <label for="dataListC" style="vertical-align: middle;font-weight: 500 !important;
    font-size: 16px;">رفع بيانات المستفيدين</label>
            <form action="{{ route('save-citizen-data') }}" method="POST" enctype="multipart/form-data"
                  id="dataListForm" style="display:none; padding-top: 20px;border-top: 1px solid #e2e2e2;" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <h5> يجب رفع بيانات المستفيدين من المشروع حسب النموذج المرفق: </h5>
                        <a href="{{ route('download-citizen-file') }}" class="btn btn-primary btn-success"
                           style="margin-top:10px;"><i class="fa fa-download" style=""></i> تحميل
                            نموذج الملف المطلوب </a>
                    </div>

                    <div class="col-sm-6" style="display: inline-flex;margin-top: 2%;">
                        <input class="form-control {{($errors->first('data_file') ? " form-error" : "")}}" type="file" name="data_file" style="width: 200px;margin-left: 45px;"/>
                        {!! $errors->first('data_file', '<p class="help-block" style="color:red;">:message</p>') !!}
                        <input type="submit" value="رفع" class="btn btn-primary upload-btn"/>



                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="project_id" class="col-form-label" style="margin-top: 5px;">حدد اسم المشروع المدرجة
                            ضمنها هذه القائمة: </label>
                    </div>
                    <div class="col-sm-4">

                        <select class="form-control {{($errors->first('project_id') ? " form-error" : "")}}" name="project_id">
                            <option value="">اختر</option>
                            @foreach ($projects as $project )
                            @if($project->active ==1)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        {!! $errors->first('project_id', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="addNewPanel" class="panel panel-default" style="margin-top:15px;background: #fafafa;">
        <div class="panel-body">
            <input id="addNewCheck" type="checkbox" name="addNewC" value="addNewC" onclick="addNewCitizen()">
            <label for="addNewC" style="vertical-align: middle;font-weight: 500 !important;
    font-size: 16px;">إضافة مستفيد جديد بشكل منفصل</label>

            <form id="addNewForm" method="post" action="/account/citizen"
                  style="display:none; padding-top: 20px;border-top: 1px solid #e2e2e2;"  autocomplete="off">
                @csrf
{{--                <span style="font-weight:600;">المعلومات المطلوبة</span>--}}
                <br>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="project_id" class="col-form-label" style="margin-top: 5px;">يرجى ادخال رقم الهوية لفحص معلومات المستفيد/ة:</label>
                    </div>

                    <div class="col-sm-4">
                        <input type="text"  autofocus class="form-control" value="{{old("id_number")}}" id="id_number" name="id_number">
                    </div>
                    <div class="col-sm-2">
                        <button onclick="gitCitizen();return false;" class="btn btn-primary adv-searchh">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>

<h5 class="form-head">البيانات الشخصية:</h5>

                <div class="form-group row">

                    <div class="col-sm-3">
                        <label for="first_name" class="col-form-label"> الاسم الأول</label>

                        <input type="text" autofocus class="form-control {{($errors->first('first_name') ? " form-error" : "")}}" value="{{old("first_name")}}" id="first_name"
                               name="first_name">
                        {!! $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-sm-3">
                        <label for="father_name" class="col-form-label">اسم الأب</label>

                        <input type="text" autofocus class="form-control {{($errors->first('father_name') ? " form-error" : "")}}" value="{{old("father_name")}}"
                               id="father_name" name="father_name">
                        {!! $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>

                    <div class="col-sm-3">

                        <label for="grandfather_name" class="col-form-label">اسم الجد</label>
                        <input type="text" autofocus class="form-control {{($errors->first('grandfather_name') ? " form-error" : "")}}" value="{{old("grandfather_name")}}"
                               id="grandfather_name" name="grandfather_name">
                        {!! $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
</div>
<div class="form-group row">
                    <div class="col-sm-3">
                        <label for="last_name" class="col-form-label">اسم العائلة</label>

                        <input type="text" autofocus class="form-control {{($errors->first('last_name') ? " form-error" : "")}}" value="{{old("last_name")}}" id="last_name"
                               name="last_name">
                        {!! $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>

                    <div class="col-sm-3">
                        <label for="id_number" class="col-form-label">رقم الهوية</label>

                        <input type="text" autofocus class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" value="{{old("id_number")}}" id="id_number_1"
                               name="id_number">
                        {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    </div>
                    <h5 class="form-head">بيانات التواصل:</h5>
                    <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="mobile"  class="col-form-label">رقم التواصل (1)</label>
                        <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}"  type="tel"
                         maxlength="10" onchange="phonenumber($('#mobile').val(),1)" value="{{old("mobile")}}" id="mobile" name="mobile" autocomplete="nope">
                        <span id="lblError1" style="color: red"></span>
                        {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
       
                    <div class="col-sm-3">
                        <label for="mobile2"  class="col-form-label">رقم التواصل (2)</label>
                        <input class="form-control {{($errors->first('mobile2') ? " form-error" : "")}}" type="tel"
                              value="{{old("mobile2")}}" maxlength="10" id="mobile2" name="mobile2" onchange="phonenumber($('#mobile2').val(),2)" autocomplete="nope">
                        <span id="lblError2" style="color: red"></span>
                        {!! $errors->first('mobile2', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
</div>
 <h5 class="form-head">بيانات العنوان:</h5>
 <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="circle_id" class="col-form-label">المحافظة</label>

                        <select class="form-control {{($errors->first('governorate') ? " form-error" : "")}}" name="governorate">
                            <option value="">اختر</option>
                            <option value="شمال غزة" {{old('governorate')=='شمال غزة'?"selected":""}}>شمال غزة</option>
                            <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                            <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى</option>
                            <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>خانيونس</option>
                            <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>
                        </select>
                        {!! $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
       
                    <div class="col-sm-3">
                        <label for="city" class="col-form-label"> المنطقة</label>
                        <input type="text" class="form-control {{($errors->first('city') ? " form-error" : "")}}" value="{{old("city")}}" id="city" name="city" autocomplete="nope">
                        {!! $errors->first('city', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>

                    <div class="col-sm-3">
                        <label for="street" class="col-form-label"> العنوان</label>
                        <input type="text" class="form-control {{($errors->first('street') ? " form-error" : "")}}" value="{{old("street")}}" id="street" name="street" autocomplete="nope">
                        {!! $errors->first('street', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="project_id" class="col-form-label" style="font-weight:600;margin-top:20px;margin-bottom:20px;">لإضافة المستفيد ضمن مشروع آخر، حدد اسم المشروع المراد إدراج المستفيد ضمنه:</label>
           
                        <?php
                        $projects = \DB::table("projects")->where('active',1)->get();
                        ?>
                        <div class="table-wrapper-scroll-y custom-scrollbar">

                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</td>
                                <th></td>
                                <th>اسم المشروع</td>
                                <th>رقم طلب المشروع</td>
                            </tr>
                            </thead>
                            @foreach($projects as $key => $project)
                                @if($project->id !=1)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input  type="checkbox" name="projects[]" value="{{$project->id.'_'.$key}}"/></td>
                                        <td><b>{{$project->name}} ( {{$project->code}} )</b></td>
                                        <td><input type="text" class="form-control"   id="project_request" name="project_request[]"></td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>

                <div class="form-group row" style="float:left;text-align:left;" align="left">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success" value="حفظ"/>
                        <a href="/account/citizen" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>


        </div>

        <div id="mo"></div>


    </div>
</div></div></div></div></div>
@endsection
@section("js")

    <script>
        $( document ).ready(function(){
            if($("#dataListForm input").hasClass('form-error') || $("#dataListForm select").hasClass('form-error')){
                $("#dataListForm").show();
            }
        });

    </script>
    <script>

        $('#id_number').change(function () {
            $('#id_number_1').val($('#id_number').val());
            $('#id_number_1').attr('readonly', true);
        });

        if($( "#first_name" ).hasClass( "form-error" )){
            $("#addNewCheck").prop('checked', true);
            $("#addNewForm").show();
        }

        function dataList() {
            // Get the checkbox
            var checkBox = document.getElementById("dataListCheck");
            // Get the output text
            var text = document.getElementById("dataListForm");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        function addNewCitizen() {
            // Get the checkbox
            var checkBox = document.getElementById("addNewCheck");
            // Get the output text
            var text = document.getElementById("addNewForm");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        function gitCitizen() {

            var id_number = document.getElementById("id_number").value;
            console.log(id_number);

            $.ajax({
                url: "{{ route('get-citizen-data') }}",
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_number,
                },
                success: function (data) {
                    console.log(data);
                    document.getElementById("addNewForm").style.display = "none";
                    $('#mo').html(data);
                }
            });


        }


    </script>
    <script>
        function phoneno(){
            $('#mobile2').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });

            $('#mobile').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
    </script>

<script>
    function phonenumber(inputtxt,id)
    {
        var regexPattern=new RegExp(/^(059|056)[0-9-+]+$/);    // regular expression pattern
        console.log(regexPattern.test(inputtxt));
Success!
        if(regexPattern.test(inputtxt))
        {
            $('#lblError'+id).html('');
            return true;

        }
        else
        {
            $('#lblError'+id).html('يرجى إدخال رقم تواصل صحيح');
            return false;
        }
    }
</script>
@endsection
