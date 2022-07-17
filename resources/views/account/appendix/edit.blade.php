@extends("layouts._account_layout")

@section("title", "ملاحق ذات علاقة بمتطلبات النظام ")

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
يمكنك من خلال هذه الواجهة تعديل الملاحق ذات العلاقة بمتطلبات النظام
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
                    <div class="card-title">بيانات حساب الموظف الجديد</div>
                </div>
                <div class="card-body">

                <form method="post" action="/account/appendix/update/{{$item->id}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="appendix_name" class="col-form-label">اسم الملحق:</label>
     
                    <input type="text" class="form-control" value="{{$item->appendix_name}}" id="appendix_name"
                    name="appendix_name">
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-4">
                            <label for="appendix_describe" class="col-form-label">وصف عن الملحق: </label>
        
                    <input type="text"  class="form-control " value="{{$item->appendix_describe}}" id="appendix_describe"
                     name="appendix_describe">
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-4">
                            <label for="appendix_file" class="col-form-label">  رفع الملحق:</label>
             
                    <input type="file"  class="form-control" value="{{$item->appendix_file}}" id="appendix_file"
                    name="appendix_file">
                </div>
            </div>
<div class="form-group row" align="left">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-success" value="تعديل"/>
                    <a href="events" class="btn btn-light">الغاء الامر</a>
                </div>
            </div>
            <!--<div class="form-group row" style="margin-bottom: 10px;">
                <div class="col-sm-4 col-md-offset-8">
                    <input type="submit" class="btn btn-success" value="تعديل"/>
                    <a href="events" class="btn btn-light">الغاء الامر</a>
                </div>
            </div>-->
        </form>
        </div>
    </div>
 </div>
    </div>
    </div>
@endsection
