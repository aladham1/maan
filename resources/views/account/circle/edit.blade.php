@extends("layouts._account_layout")

@section("title", "تعديل مستوى إداري")

@section('content')
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة لتعديل المستويات الإدارية في النظام
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
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="card-title">المستوى الإداري </div>
                    </div>
                    <div class="card-body">
                        <form action="/account/circle/{{$items['id']}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                            <div class="form-group col-md-4">
                                <!--<label>اسم المستوى الإداري</label>-->
                                <input type="text" class="form-control"  name="name" value="{{$items['name']}}">
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success"  style="width: 95px;" value="حفظ"/>
                                    <a href="/account/circle" class="btn btn-light">إلغاء الأمر</a>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
