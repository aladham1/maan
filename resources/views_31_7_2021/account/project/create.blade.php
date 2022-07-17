@extends("layouts._account_layout")

@section("title", "إضافة مشروع جديد")


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
                            هذه الواجهة مخصصة لإضافة مشاريع المركز في النظام
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
                    <div class="card-title">بيانات المشروع الجديد</div>
                </div>
                <div class="card-body">
            <form method="post" action="/account/project" autocomplete="off">
        @csrf

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="code" class="col-form-label">رمز المشروع</label>
                            <input type="text" class="form-control" value="{{old('code')}}" id="code" name="code">
                        {!! $errors->first('code', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
     
                    <div class="col-sm-4">
                        <label for="name" class="col-form-label">اسم المشروع بالعربية</label>
                         <input type="text" autofocus class="form-control" value="{{old('name')}}" id="name" name="name">
                        {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="start_date" class="col-form-label"> تاريخ بداية المشروع</label>
                          <input type="date" class="form-control" value="{{old('start_date')}}" id="start_date" name="start_date" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('start_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
           
                    <div class="col-sm-4">
                        <label for="end_date" class="col-form-label"> تاريخ نهاية المشروع</label>
                        <input type="date" class="form-control" value="{{old('end_date')}}" id="end_date" name="end_date" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('end_date', '<p class="help-block" style="color:red;">:message</p>') !!}

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="active" class="col-form-label">حالة المشروع</label>
                        <input type="text" class="form-control" value="" id="project_status" name="project_status" readonly>
                    </div>
                </div>


                <input type="hidden" name="active" value="1" >

        <div class="form-group row">
            <div class="col-sm-3 col-sm-offset-9" style="text-align: left;">
                <input type="submit" class="btn btn-success" value="إضافة"/>
                <a href="/account/project" class="btn btn-light">إلغاءالأمر</a>
            </div>
        </div>
    </form>

    </div>
</div>
 </div>
</div>
</div>
 @endsection
@section('js')
    <script>

        $('#end_date').change(function () {
            // var today = new Date();
            // var dd = String(today.getDate()).padStart(2, '0');
            // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            // var yyyy = today.getFullYear();
            //
            // today = yyyy + '/' + mm + '/' + dd;
            // console.log(today);
            // console.log($('#end_date').val());

            if($('#end_date').val() <= new Date()){
                $('#project_status').val('منتهي');
            }else{
                $('#project_status').val('مستمر');
            }

        });
    </script>
@endsection
