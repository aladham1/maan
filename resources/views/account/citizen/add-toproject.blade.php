@extends("layouts._account_layout")

@section("title", " المشاريع المدرجة ضمنها المستفيد  $item->first_name $item->father_name $item->grandfather_name $item->last_name")


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
هذه الواجهة مخصصة لعرض المشاريع التي يتم الاستفادة منها لهذا المواطن</h4>
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
                    <div class="card-title">المشاريع المدرجة ضمنها المستفيد</div>
                </div>
                <div class="card-body">
    <form method="post" action="/account/citizen/select-project-post/{{$item->id}}">
        @csrf
        <div class="form-group row">

            <div class="col-sm-5">
                <?php
                $projects = \DB::table("projects")->get();
                ?>
                <ul class="list-styled">
                    @foreach($projects as $project)
                        @if($project->id!="1")
                            @if($item->projects->contains($project->id))
                                <li>
                                    <label> <b>{{$project->name}} - {{$project->code}}</b></label>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-5">
                {{-- <input type="submit" class="btn btn-success" value="حفظ" /> --}}
                <a href="/account/citizen" class="btn btn-success">رجوع للخلف</a>
            </div>
        </div>
    </form>
    </div></div></div></div></div>
@endsection
