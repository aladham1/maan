@extends("layouts._account_layout")

@if(count($item->projects) > 0)
@section("title","تعديل بيانات مستفيدي المشاريع")
@else
@section("title", "تعديل بيانات غير مستفيدي المشاريع")
@endif



@section("content")

    @if(count($item->projects) > 0)
        <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
يمكنك من خلال هذه الواجهة تعديل بيانات مستفيدي المشاريع
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

@else
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
يمكنك من خلال هذه الواجهة تعديل بيانات غير مستفيدي المشاريع                            </h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات مستفيدي المشاريع  </div>
                </div>
                <div class="card-body">
    <form method="post" enctype="multipart/form-data" action="/account/citizen/{{$item['id']}}"  autocomplete="off">
        {{csrf_field()}}
        @method('patch')
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="id_number" class="col-form-label" style="vertical-align: sub;">رقم الهوية لفحص معلومات المستفيد/ة:</label>
	    </div>
	    <div class="col-sm-3">
                <input type="text"  autofocus class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" value="{{$item["id_number"]}}" id="id_number"
                       name="id_number">
            {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}

        </div>
        </div>

{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-12">--}}
{{--                @if(count($item->projects) > 0)--}}
{{--                    <div class="alert alert-info">--}}
{{--                        <strong>المواطن مستفيد من مشروع: </strong>--}}
{{--                        <ul style="padding-right:15px;">--}}
{{--                            @foreach($item->projects as $project )--}}
{{--                                <li>{{ $project->name }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="alert alert-info">--}}
{{--                        <strong>المواطن غير مستفيد من مشاريع المركز.</strong>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
<h5 class="form-head">البيانات الشخصية:</h5>

        <div class="form-group row">
            <div class="col-sm-3">
               <label for="first_name" class="col-form-label">الإسم الأول</label>
               <input type="text" autofocus class="form-control {{($errors->first('first_name') ? " form-error" : "")}}" value="{{$item["first_name"]}}" id="first_name"
                       name="first_name">
                {!! $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-3">
               <label for="father_name" class="col-form-label">إسم الأب</label>
               <input type="text" autofocus class="form-control {{($errors->first('father_name') ? " form-error" : "")}}" value="{{$item["father_name"]}}" id="father_name"
                       name="father_name">
                {!! $errors->first('father_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-3">
                <label for="grandfather_name" class="col-form-label">إسم الجد</label>
                <input type="text" autofocus class="form-control {{($errors->first('grandfather_name') ? " form-error" : "")}}" value="{{$item["grandfather_name"]}}" id="grandfather_name"
                       name="grandfather_name">
                {!! $errors->first('grandfather_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
        </div>
        
	<div class="form-group row">
            <div class="col-sm-3">
                <label for="last_name" class="col-form-label">إسم العائلة</label>
                <input type="text" autofocus class="form-control {{($errors->first('last_name') ? " form-error" : "")}}" value="{{$item["last_name"]}}" id="last_name"
                       name="last_name">
                {!! $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

        
            <div class="col-sm-3">
                <label for="id_number" class=" col-form-label">رقم الهوية</label>

                <input type="text" autofocus class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" value="{{$item["id_number"]}}" id="id_number"
                       name="id_number">
                {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
	</div>
	<h5 class="form-head">بيانات التواصل:</h5>

	<div class="form-group row">
            <div class="col-sm-3">
                <label for="mobile" class="col-form-label">رقم التواصل(1)</label>

                <input type="text" class="form-control {{($errors->first('mobile') ? " form-error" : "")}}" value="{{$item["mobile"]}}" id="mobile" name="mobile">
                {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

        <div class="col-sm-3">
                <label for="mobile" class="col-form-label">رقم التواصل(2)</label>

                <input type="text" class="form-control {{($errors->first('mobile') ? " form-error" : "")}}" value="{{$item["mobile"]}}" id="mobile" name="mobile">
            {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

        </div>
        </div>
        <h5 class="form-head">بيانات العنوان:</h5>

        <div class="form-group row">
            <div class="col-sm-3">
                <label for="circle_id" class="col-form-label">المحافظة</label>
                <select class="form-control {{($errors->first('governorate') ? " form-error" : "")}}" name="governorate">
                    <option value="">اختر</option>
                    <option value="شمال غزة" {{($item['governorate']=='شمال غزة'||$item['governorate']=='شمال غزة')?"selected":""}}>شمال غزة</option>
                    <option value="غزة" {{$item['governorate']=='غزة'?"selected":""}}>غزة</option>
                    <option value="الوسطى" {{($item['governorate']=='دير البلح'||$item['governorate']=='الوسطى')?"selected":""}}>الوسطى</option>
                    <option value="خانيونس" {{($item['governorate']=='خان يونس'||$item['governorate']=='خانيونس')?"selected":""}}>خانيونس</option>
                    <option value="رفح" {{$item['governorate']=='رفح'?"selected":""}}>رفح</option>
                </select>
                {!! $errors->first('governorate', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
            <div class="col-sm-3">
                <label for="city" class="col-form-label"> المنطقة</label>

                <input type="text" class="form-control {{($errors->first('city') ? " form-error" : "")}}" value="{{$item["city"]}}" id="city" name="city">
                {!! $errors->first('city', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-3">
                <label for="street" class="col-form-label"> العنوان</label>

                <input type="text" class="form-control {{($errors->first('street') ? " form-error" : "")}}" value="{{$item["street"]}}" id="street" name="street">
                {!! $errors->first('street', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-form-label" style="font-weight:600;margin-top:20px;margin-bottom:20px;"> أسماء المشاريع المدرج ضمنها المستفيد
                    حالياً:</label>
                    
            <div class="table-wrapper-scroll-y custom-scrollbar-2">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>اسم المشروع</td>
                        <td>رقم طلب المشروع</td>
                    </tr>
                    </thead>
                    @forelse  ($item->projects as $key=>$project )
                        <?php
                        $xx = $item->citizen_projects->where('project_id',$project->id)->first();
                        ?>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{$xx->project_request}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">لايوجد مشاريع</td>
                        <tr>
                    @endforelse
                </table>
            </div>
        </div>
</div>
               
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="project_id" class="col-form-label" style="font-weight:600;margin-bottom:20px;">لإضافة المستفيد ضمن مشروع آخر، حدد اسم المشروع المراد إدراج المستفيد ضمنه: </label>


                        <?php
                        $projects = \DB::table("projects")->where('active',1)->get();
                        ?>
                        <div class="table-wrapper-scroll-y custom-scrollbar">

                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td></td>
                                <td>اسم المشروع</td>
                                <td>رقم طلب المشروع</td>
                            </tr>
                            </thead>
                            @foreach($projects as $key => $project)
                                @if($project->id !=1)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><input {{$item->projects->contains($project->id)?'checked':''}} type="checkbox" name="projects[]" value="{{$project->id.'_'.$key}}"/></td>
                                        <td><b>{{$project->name}} ( {{$project->code}} )</b></td>
                                        @if($item->projects->contains($project->id))
                                            <?php
                                            $xx = $item->citizen_projects->where('project_id',$project->id)->first();
                                            ?>
                                            <td><input type="text" class="form-control" value="{{$xx->project_request}}"  id="project_request" name="project_request[]"></td>
                                        @else
                                            <td><input type="text" class="form-control"   id="project_request" name="project_request[]"></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
</div>

        <div class="form-group row" style="float:left;text-align:left;" align="left">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="حفظ"/>
                <a href="/account/citizen" class="btn btn-light">إلغاء الأمر</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection

@section("js")
<script>



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

@endsection
