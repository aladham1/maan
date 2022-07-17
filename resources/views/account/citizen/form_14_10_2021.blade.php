<div class="container">
    <form method="post" action="/account/citizen/select-project-post/{{$citizen->id}}"
          style=" padding-top: 20px;border-top: 1px solid #e2e2e2;" autocomplete="off">
        {{csrf_field()}}
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="project_id" class="col-form-label" style="margin-top: 5px;">يرجى ادخال رقم الهوية لفحص
                    معلومات المستفيد/ة:</label>

            </div>
            <div class="col-sm-3">
                <input type="text" autofocus class="form-control" value="{{$citizen->id_number}}" id="id_number"
                       name="id_number">
            </div>
            <div class="col-sm-2">
                <button onclick="gitCitizen();return false;" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                </button>
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="first_name" class="col-form-label"> الاسم الأول</label>

                <input type="text" autofocus class="form-control" value="{{$citizen->first_name}}" id="first_name"
                       name="first_name">
            </div>
            <div class="col-sm-5">
                <label for="father_name" class="col-form-label">اسم الأب</label>

                <input type="text" autofocus class="form-control" value="{{$citizen->father_name}}" id="father_name"
                       name="father_name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">

                <label for="grandfather_name" class="col-form-label">إسم الجد</label>
                <input type="text" autofocus class="form-control" value="{{$citizen->grandfather_name}}"
                       id="grandfather_name" name="grandfather_name">
            </div>

            <div class="col-sm-5">
                <label for="last_name" class="col-form-label">اسم العائلة</label>

                <input type="text" autofocus class="form-control" value="{{$citizen->last_name}}" id="last_name"
                       name="last_name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="id_number" class="col-form-label">رقم الهوية</label>

                <input type="text" disabled autofocus class="form-control" value="{{$citizen->id_number}}"
                       id="id_number" name="id_number">
            </div>

            <div class="col-sm-5">
                <label for="mobile" class="col-form-label"> رقم التواصل(1)</label>

                <input type="text" class="form-control" value="{{$citizen->mobile}}" id="mobile" name="mobile"
                       autocomplete="mobile">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="mobile2" class="col-form-label"> رقم التواصل(2)</label>

                <input type="text" class="form-control" value="{{$citizen->mobile2}}" id="mobile" name="mobile2"
                       autocomplete="mobile2">
            </div>
            <div class="col-sm-5">
                <label for="circle_id" class="col-form-label">المحافظة</label>

                <select class="form-control" name="governorate">
                    <option value="">اختر</option>
                    <option value="شمال غزة" {{$citizen->governorate =='شمال غزة'?"selected":""}}>شمال غزة</option>
                    <option value="غزة" {{$citizen->governorate =='غزة'?"selected":""}}>غزة</option>
                    <option value="الوسطى" {{$citizen->governorate =='الوسطى'?"selected":""}}>الوسطى</option>
                    <option value="خانيونس" {{ $citizen->governorate =='خانيونس'?"selected":""}}>خانيونس</option>
                    <option value="رفح" {{ $citizen->governorate =='رفح'?"selected":""}}>رفح</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="city" class="col-form-label"> المنطقة</label>

                <input type="text" class="form-control" value="{{$citizen->city}}" id="city" name="city"
                       autocomplete="city">
            </div>

            <div class="col-sm-5">
                <label for="street" class="col-form-label"> العنوان</label>

                <input type="text" class="form-control" value="{{$citizen->street}}" id="street" name="street"
                       autocomplete="street">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label class="col-form-label" style="font-weight:600;"> أسماء المشاريع المدرج ضمنها المستفيد
                    حالياً:</label>
                <table class="table table-hover table-striped" style="width: 30%">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>اسم المشروع</td>
                        <td>رقم طلب المشروع</td>
                    </tr>
                    </thead>
                    @forelse  ($citizen->projects as $key=>$project )
                        <?php
                        $xx = $citizen->citizen_projects->where('project_id', $project->id)->first();
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
        <hr>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="project_id" class="col-form-label" style="margin-top: 5px;">لإضافة المستفيد ضمن مشروع آخر،
                    حدد اسم المشروع المراد إدراج المستفيد ضمنه: </label>
            </div>
            <div class="col-sm-6">

                <?php
                $projects = \DB::table("projects")->where('active', 1)->get();
                ?>
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
                                <td><input {{$citizen->projects->contains($project->id)?'checked':''}} type="checkbox"
                                           name="projects[]" value="{{$project->id.'_'.$key}}"/></td>
                                <td><b>{{$project->name}} ( {{$project->code}} )</b></td>
                                @if($citizen->projects->contains($project->id))
                                    <?php
                                    $xx = $citizen->citizen_projects->where('project_id',$project->id)->first();
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

        <div class="form-group row">
            <div class="col-md-3" style="float: left">
                <button type="submit" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </form>

</div>
