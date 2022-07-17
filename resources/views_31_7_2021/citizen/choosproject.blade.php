@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")


@section("content")
<section class="container-fluid login-wrap">
            <h1 class="wow bounceIn inner-h1">
                   @if($citizen)
            أهلاً بك عزيزي
            {{$citizen->first_name}} {{$citizen->father_name}} {{$citizen->grandfather_name}} {{$citizen->last_name}}
        @else
            أهلاً بك عزيزي المواطن
        @endif
            </h1>
             <h4 class="inner-h5 wow bounceIn">
        @if($citizen)
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
                        @foreach($projects as $project)
                            @if($project->id != 1)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endif
                        @endforeach
                    </select>

                @else
                    <input type="hidden" name="project_id" value="1">
                @endif
            @else
                <input type="hidden" name="project_id" value="1">
            @endif

            <input type="hidden" name="id_number" value="{{$_GET['id_number']}}">
            @if($citizen)
                <input type="hidden" name="citizen_id" value="{{$citizen->id}}">
            @else
                <input type="hidden" name="citizen_id" value="0">
            @endif

            <input type="hidden" name="type" value="{{$type}}">
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
