@extends("layouts._account_layout")

@section("title", "ملاحق ذات علاقة بمتطلبات النظام ")

@section("content")


    @if(check_permission('إضافة ملحق'))
       <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة لتعريف الملاحق ذات العلاقة بمتطلبات النظام
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
              <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card card-table">
                <div class="card-body">
            <h4>
                <button type="button" style="margin-left: 10px;" class="btn btn-primary msg-btn add-btn">
                    <span class="fa fa-plus fa-2x" aria-hidden="true"></span>
                </button>
 يمكنك من خلال هذه الواجهة تعريف الملاحق ذات العلاقة بمتطلبات النظام
 </h4>
     <div class="row msg" style="">
        <div class="col-sm-12">
        <hr>
            <form method="post" action="/account/appendix" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="appendix_name" class="col-form-label">اسم الملحق:</label>
                        <input type="text" class="form-control {{($errors->first('appendix_name') ? " form-error" : "")}}" value="" id="appendix_name" name="appendix_name">
                        {!! $errors->first('appendix_name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-sm-3">
                        <label for="appendix_describe" class="col-form-label">وصف عن الملحق: </label>
   
                        <input type="text" class="form-control {{($errors->first('appendix_describe') ? " form-error" : "")}}" value="" id="appendix_describe"
                               name="appendix_describe">
                        {!! $errors->first('appendix_describe', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>

                <div class="col-sm-3">
                        <label for="" class="col-form-label"> رفع الملحق:</label>
                        <input type="file" class="form-control {{($errors->first('appendix_file') ? " form-error" : "")}}" value="" id="appendix_file" name="appendix_file">
                        {!! $errors->first('appendix_file', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row" align="left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="إضافة"/>
                        <a href="appendix" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

 
    @endif

<div class="row" style="margin-top: 20px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    @if($items)
        @if($items->count()>0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 30px;word-break: normal;">#</th>
                        <th style="max-width: 100px;word-break: normal;">اسم الملحق</th>
                        <th style="max-width: 100px;word-break: normal;">وصف الملحق</th>
                        <th style="max-width: 100px;word-break: normal;">تاريخ تحديث الملحق</th>
                        <th style="word-break: normal;">تفاصيل ذات علاقة بالملحق</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $a)

                        @if($a->id)
                            <tr>
                                <td style="word-break: normal;">{{$a->id}}</td>
                                <td style="word-break: normal;">{{$a->appendix_name }}</td>
                                <td style="max-width: 250px;word-break: normal;">{{$a->appendix_describe}}</td>
                                <td style="max-width: 60px;word-break: normal;">{{$a->updated_at }}</td>
                                <td style="text-align: center;">
                                    <a class="btn btn-xs btn-primary show-btn"  target="_blank"
                                       href="{{ route('appendixshow', $a->id) }}" title="معاينة">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>

                                    @if(check_permission('تعديل ملحق'))
                                    <a class="btn btn-xs btn-primary" title="تعديل"
                                       href="/account/appendix/edit/{{$a->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(check_permission('حذف ملحق'))
                                    <a class="btn btn-xs Confirm btn-danger"
                                       href="/account/appendix/delete/{{$a->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                </td>

                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="float:left; ">  {{$items->links()}} </div>
        @else
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 30px;word-break: normal;">#</th>
                    <th style="max-width: 100px;word-break: normal;">اسم الملحق</th>
                    <th style="max-width: 100px;word-break: normal;">وصف الملحق</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ تحديث الملحق</th>
                    <th style="word-break: normal;">تفاصيل ذات علاقة بالملحق</th>
                </tr>
                </thead>
            </table>
        </div>
    @endif
       </div>
 </div>
    </div>
    </div>

    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("js")
    <script>
        $('.msg').hide();
        $('.msg-btn').click(function () {

            $('.msg').slideToggle("fast", function () {
                if ($('.msg').is(':hidden')) {
                    $('#searchonly').show();
                } else {
                    $('#searchonly').hide();
                }
            });
        });


        $(".msg form :input").each(function(){
            if( $(this).hasClass( "form-error" )){
                $('.msg').show();
            }
        });



    </script>
    <script>
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>
@endsection

