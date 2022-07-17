@extends("layouts._account_layout")

@section("title", " مستفيدي مشروع  $item->name $item->code ")


@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

   <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
                                هذه الواجهة مخصصة للتحكم في مستفيدي المشروع
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
            @if(check_permission('تعديل مواطن'))
                <form action="{{ route('save-citizen-data-project', $item->id) }}" method="POST" enctype="multipart/form-data"
                      id="dataListForm" style="padding-top: 20px;">
                    @csrf

                    <input type="hidden" name="project_id" id="project_id" value="{{$item->id}}">
                </form>
                <hr>
            @endif

        <form autocomplete="off">
        <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 0px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" value="excel" class="btn btn-primary adv-export-btnn" id="excel_b" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
                </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">

              <div class="col-sm-3 form-group adv-searchh">
                 <input type="text" class="form-control" name="project_request" value="{{old('project_request')}}"
                   placeholder="رقم طلب المشروع"/>
               </div>
              <div class="col-sm-3 form-group adv-searchh">
                <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"
                   placeholder="اسم المستفيد"/>
             </div>
              <div class="col-sm-3 form-group adv-searchh">
                <input type="text" class="form-control" name="id_number" value="{{old('id_number')}}"
                   placeholder="رقم الهوية"/>
             </div>
              <div class="col-sm-3 form-group adv-searchh">
                  <select class="form-control" name="governorate">
                      <option value=""> المحافظة</option>
                      <option value="شمال غزة" {{old('governorate')=='شمال غزة'?"selected":""}}>شمال غزة</option>
                      <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                      <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى</option>
                      <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>خانيونس</option>
                      <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>

                      <option value="أريحا" {{old('governorate')=='أريحا'?"selected":""}}>
                          أريحا
                      </option>

                      <option value="الخليل" {{old('governorate')=='الخليل'?"selected":""}}>
                          الخليل
                      </option>

                      <option value="القدس" {{old('governorate')=='القدس'?"selected":""}}>
                          القدس
                      </option>

                      <option value="بيت لحم" {{old('governorate')=='بيت لحم'?"selected":""}}>
                          بيت لحم
                      </option>
                      <option value="جنين" {{old('governorate')=='جنين'?"selected":""}}>
                          جنين
                      </option>
                      <option value="رام الله والبيرة" {{old('governorate')=='رام الله والبيرة'?"selected":""}}>
                          رام الله والبيرة
                      </option>
                      <option value="سلفيت" {{old('governorate')=='سلفيت'?"selected":""}}>
                          سلفيت
                      </option>
                      <option value="طوباس" {{old('governorate')=='طوباس'?"selected":""}}>
                          طوباس
                      </option>
                      <option value="طولكرم" {{old('governorate')=='طولكرم'?"selected":""}}>
                          طولكرم
                      </option>
                      <option value="قلقيلية" {{old('governorate')=='قلقيلية'?"selected":""}}>
                          قلقيلية
                      </option>
                      <option value="نابلس" {{old('governorate')=='نابلس'?"selected":""}}>
                          نابلس
                      </option>
                  </select>
            </div>
            </div>
           <div class="row">
                <div class="col-sm-3 col-sm-offset-9 adv-searchh" style="text-align: left;" align="left">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>


        </form>
        <div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
         @if($items)
            @if($items->count()>0)
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم طلب المشروع</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستفيد</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهوية</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المحافظة</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (1)</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (2)</th>
                        <th width="21%">التفاصيل ذات العلاقة بالمستفيد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $a)
                        <tr>
                        <td style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$loop->iteration}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->project_request ? $a->project_request : '-' }}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id_number}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->governorate}}</td>
                           <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center;" class="text-left" dir="ltr">{{$a->mobile}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center;" class="text-left" dir="ltr">{{$a->mobile2}}</td>
                            <td style="text-align: center !important;">
                                @if(check_permission('تعديل بيانات المستفيد'))
                                    <a class="btn btn-xs btn-primary" title="تعديل" href="/account/citizen/{{$a->id}}/edit"><i
                                                class="fa fa-edit"></i></a>
                                @endif
                                @if(check_permission('حذف المستفيد'))
                                    <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/citizen/delete/{{$a->id}}"><i
                                            class="fa fa-trash"></i></a>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
                <div style="float:left" >{{$items->links()}} </div>
            @else
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif

        @else
            <div class="table-responsive">

                <table class="table table-hover table-striped" style="white-space:normal;">
                    <thead>
                    <tr>
                        <th style="max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستفيد</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهوية</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المحافظة</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (1)</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل (2)</th>
                        <th>التفاصيل ذات العلاقة بالمستفيد</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        @endif
    <div class="form-group row" style="margin-top:15px;" align="left">
        <div class="col-sm-12">
            <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
     </div>
    </div>
@endsection
@section("js")
        <script>
            $('.adv-searchh').hide();
            $('.adv-search-btnn').click(function(){
                $('.adv-searchh').slideToggle("fast");
            });
        </script>

        <script>
          $('#excel_b').click(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var uri = window.location.toString();
            var fullUrl = window.location.href;
            if (uri.indexOf("?") > 0) {
                formData += "&theaction=" + encodeURIComponent('excel');
                var finalUrl = fullUrl + "&" + formData;
            } else {
                var finalUrl = fullUrl + "?theaction=excel";
            }

            window.location.href = finalUrl;

        });
        </script>
@endsection
