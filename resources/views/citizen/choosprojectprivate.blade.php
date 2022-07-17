@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")

@section("css")
    <style>
        .alert.alert-danger.alert-dismissible.alert-id ul {
            margin: 0 !important;
        }

        #footer {
            bottom: 60px !important;
        }

    </style>
@endsection
@section("content")
    <section class="container-fluid login-wrap">
        <h1 class="wow bounceIn inner-h1">
            أهلاً بك عزيزي المواطن
        </h1>
        <h4 class="inner-h5 wow bounceIn">
            @if($type == 1)
                يرجى القيام بتحديد اسم المشروع الذي تريد تقديم الشكوى بخصوصه.
            @elseif($type == 2)
                يرجى القيام بتحديد اسم المشروع الذي تريد تقديم الاقتراح بخصوصه.
            @endif
        </h4>
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
        <form method="get" action="/citizen/createcitizenprivate">
            @csrf
            <div class="row">
                <div class="col-sm-12 text-center">

                    @if($projects)
                        @if($projects->first())
                            <select class="select2 narrow wrap form-control input2"
                                    name="project_id">
                                <option value="">اختر مشروعك</option>
                                @foreach($projects as $project)
                                    <option  value="{{$project->id}}">
                                        @if($project->id == 1)
                                            {{'لست مستفيد حالياً من مشاريع المركز'}}
                                        @else
                                            {{$project->name}}
                                        @endif
                                    </option>
                                @endforeach
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
                    <input type="hidden" name="private_contact_option" value="{{$private_contact_option}}">
                    <input type="hidden" name="mobile_private" value="{{$mobile_private}}">
                    <input type="hidden" name="email_private" value="{{$email_private}}">
                </div>
            </div>

            <!-- second row -->
            @if(!($projects) && ($type>2))

            @else
                <div class="form-group row" align="center">
                    <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
                    <div class="col-sm-12">
                        <input type="submit"
                               class="btn btn-primary wow bounceIn btn-style"
                               value="انتقل إلى تقديم  @if($type == 1){{ 'شكواك' }}@elseif($type == 2){{ 'اقتراحك' }}@endif">
                    </div>
                </div>
            @endif
        </form>
    </section>
    <!--****************************************************** start footer **************************************************************-->
@endsection

@section('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var $select2 = $('.select2').select2({
            containerCssClass: "wrap"
        })
    </script>
@endsection
