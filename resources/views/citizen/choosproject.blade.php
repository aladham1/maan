@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")


@section("content")
<section class="container-fluid login-wrap">
            <h1 class="wow bounceIn inner-h1">
                   @if($citizen && $citizen != 'none')
            أهلاً بك عزيزي
                       <br>
                    {{$citizen->first_name}} {{$citizen->father_name}} {{$citizen->grandfather_name}} {{$citizen->last_name}}

                @else
            أهلاً بك عزيزي المواطن
        @endif
            </h1>
             <h4 class="inner-h5 wow bounceIn">
        @if($citizen && $citizen != 'none')
            @if($projects)
                @if($projects->first())
                    أنت مستفيد من مشاريع المركز الموضحة أدناه.
                    اختار المشروع الذي تريد تقديم  @if($type == 1){{ 'شكواك' }}@elseif($type == 2){{ 'اقتراحك' }}@endif بخصوصه
                @else
                    أنت غير مستفيد من مشاريع المركز،
                    @if($type>2)
                        نأسف لا يمكنك تقديم نموذج شكر ، يمكنكم الذهاب لصفحة اضافة الاقتراحات أو الشكاوى
                    @else
                        ويمكنك تقديم  @if($type == 1){{ 'شكواك' }}@elseif($type == 2){{ 'اقتراحك' }}@endif بالضغط على الزر أدناه.
                    @endif
                @endif
            @endif
        @else
            أنت غير مستفيد من مشاريع المركز،
            @if($type>2)
                نأسف لا يمكنك تقديم نموذج شكر ، يمكنكم الذهاب لصفحة اضافة الاقتراحات أو الشكاوى
            @else
                 ويمكنك تقديم  @if($type == 1){{ 'شكواك' }}@elseif($type == 2){{ 'اقتراحك' }}@endif بالضغط على الزر أدناه
            @endif
        @endif  </h4>
<div class="row">
    <div class="col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible alert-id">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>

<!--first row  -->
        <form method="get" action="/citizen/editorcreatcitizen">


    <div class="row">
        <div class="col-sm-12 text-center">

            @if($projects)
                @if($projects->first())
                    <select style="text-align:center; margin-bottom:20px;" class="form-control input2" name="project_id">
                        <option value="">اختر مشروعك</option>
                        @if($hide_data == 1)
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        @else
                            @foreach($projects as $project)
                                @if($project->id != 1)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>

                @else
                    <input type="hidden" name="project_id" value="1">
                @endif
            @else
                <input type="hidden" name="project_id" value="1">
            @endif

            @if(isset($_GET['id_number']))
                    <input type="hidden" name="id_number" value="{{$_GET['id_number']}}">
                @else
                    <input type="hidden" name="id_number" value="0">
                @endif

            @if($citizen)
                <input type="hidden" name="citizen_id" value="{{$citizen->id}}">
            @else
                <input type="hidden" name="citizen_id" value="0">
            @endif

                <input type="hidden" name="type" value="{{$type}}">
                <input type="hidden" name="hide_data" value="{{$hide_data}}">
{{--                <input type="hidden" name="private_contact_option" value="{{$private_contact_option}}">--}}
{{--                <input type="hidden" name="mobile_private" value="{{$mobile_private}}">--}}
{{--                <input type="hidden" name="email_private" value="{{$email_private}}">--}}
        </div>
    </div>

    <!-- second row -->
    @if(!($projects) && ($type>2))

    @else
      <div class="form-group row" align="center">
            <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
            <div class="col-sm-12">
                <input type="submit"
                       class="btn btn-primary wow bounceIn btn-style" value="انتقل إلى تقديم  @if($type == 1){{ 'شكواك' }}@elseif($type == 2){{ 'اقتراحك' }}@endif">
               </div>
    </div>
    @endif
</form>
</section>
<!--****************************************************** start footer **************************************************************-->
@endsection
