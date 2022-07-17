@extends("layouts._account_layout")

@section("title", "إضافة مشروع جديد")


@section("content")
<div class="row">
    <div class="col-sm-12">
        <h4>هذه الواجهة مخصصة لإضافة مشاريع المركز في النظام</h4>
    </div>
</div>

        <div class="row">
            <div class="col-sm-12">
            <form method="post" action="/account/project" autocomplete="off">
        @csrf

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="code" class="col-form-label">رمز المشروع</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{old('code')}}" id="code" name="code">
                        {!! $errors->first('code', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="name" class="col-form-label">اسم المشروع بالعربية</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" autofocus class="form-control" value="{{old('name')}}" id="name" name="name">
                        {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="start_date" class="col-form-label"> تاريخ بداية المشروع</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" value="{{old('start_date')}}" id="start_date" name="start_date" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('start_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="end_date" class="col-form-label"> تاريخ نهاية المشروع</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" value="{{old('end_date')}}" id="end_date" name="end_date" placeholder="يوم / شهر / سنة">
                        {!! $errors->first('end_date', '<p class="help-block" style="color:red;">:message</p>') !!}

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="active" class="col-form-label">حالة المشروع</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="" id="project_status" name="project_status" readonly>
                    </div>
                </div>


                <input type="hidden" name="active" value="1" >

        <div class="form-group row">
            <div style="float: left;margin-left:30px;margin-top: 50px;">
                <input type="submit" class="btn btn-success" value="إضافة"/>
                <a href="/account/project" class="btn btn-light">إلغاءالأمر</a>
            </div>
        </div>
    </form>

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
