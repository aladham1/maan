@extends("layouts._account_layout")

@section("title", "إدارة غير مستفيدي المشاريع")

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
                                هذه الواجهة مخصصة للتحكم في إدارة غير مستفيدي مشاريع المركز
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
            <form autocomplete="off">
                <div class="row">
                    <div class="col-md-4 col-4">
                    <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                        <button type="button"  class="btn btn-primary adv-search-btnn" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        بحث متقدم
                        </button>

                        <button type="submit" target="_blank" name="theaction" title ="تصدير إكسل" value="excel" class="btn btn-primary adv-search-btnn" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                        تصدير
                        </button>
                        </div>
                    </div>
                </div>
                <div class="row filter-div">
                   <div class="col-sm-2">
                       <div class="form-group adv-searchh">
                          <input type="text" class="form-control" name="id" value="" placeholder="الرقم المرجعي">
                        </div>
                   </div>
                   <div class="col-sm-2">
                        <div class="form-group adv-searchh">
                          <input type="text" class="form-control" name="id_number" value="" placeholder="رقم الهوية">
                        </div>
                   </div>
                   <div class="col-sm-3">
                        <div class="form-group adv-searchh">
                          <input type="text" class="form-control" name="first_name" value="" placeholder="اسم مقدم الاقتراح/ الشكوى">
                        </div>
                   </div>

                   <div class="col-sm-2">
                       <div class="form-group adv-searchh">
                           <select class="form-control" name="governorate">
                            <option value=""> المحافظة</option>
                            <option value="شمال غزة" {{old('governorate')=='شمال غزة'?"selected":""}}>شمال غزة</option>
                            <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                            <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى</option>
                            <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>خانيونس</option>
                            <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>
                        </select>
                       </div>
                   </div>

                   <div class="col-sm-3">
                     <div class="form-group">
                        <button type="submit" name="theaction" title ="بحث" value="search" class="btn btn-primary adv-searchh">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                              بحث
                        </button>
                     </div>
                   </div>
                </div>
            </form>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
    @if($items->count()>0)

<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>الرقم المرجعي </th>
                <th>الاسم رباعي </th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th style="width:9%">رقم التواصل(1)</th>
                <th style="width:9%">رقم التواصل (2)</th>
                <th> التفاصيل ذات العلاقة بغير المستفيد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $a)
                <tr>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$loop->iteration}} </td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id_number}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->governorate}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr">{{$a->mobile}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr">{{$a->mobile2 ? $a->mobile2 :'-'}}</td>
                    <td style="text-align: center">
                        @if(check_permission('تبويب الاقتراحات والشكاوى'))
                        <a class="btn btn-xs btn-success" href="/account/citizen/formincitizen1/{{$a->id}}">الاقتراحات/الشكاوى</a>
                        @endif

                        @if(check_permission('تعديل بيانات المواطن'))
                            <a class="btn btn-xs btn-primary" title="تعديل" href="/account/citizen/{{$a->id}}/edit"><i
                                        class="fa fa-edit"></i></a>
                        @endif

                        @if(check_permission('حذف مواطن'))
                            <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/citizen/delete_not_benefit/{{$a->id}}"><i
                                    class="fa fa-trash"></i></a>
                         @endif

                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>

</div>

      <div style="float:left" >  {{$items->links()}} </div>
        <br> <br><br>

    @else

        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>


    @endif

        @else
<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>الرقم المرجعي </th>
                <th>الاسم رباعي </th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th>رقم التواصل(1)</th>
                <th>رقم التواصل (2)</th>
                <th> التفاصيل ذات العلاقة بغير المستفيد</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

</div>

    @endif
    
    </div>    
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section("js")

    <script>

        $('#excel_b').click(function (e) {
            e.preventDefault();

            var formData=$(this).serialize();
            formData += "&theaction=" + encodeURIComponent('excel');

            var fullUrl = window.location.href;
            var finalUrl = fullUrl+"&"+formData;
            window.location.href = finalUrl;

        });
    </script>

    <script>

        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                $.ajax({
                        url:"/account/citizen/accept/" + id,
                    data:{_token:'{{ csrf_token() }}'},
                error : function (jqXHR, textStatus, errorThrown) {
        // User Not Logged In
        // 401 Unauthorized Response
         window.location.href = "/account/citizen";
    },
                });
            });
        });

    </script>
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function(){
            $('.adv-searchh').slideToggle("fast");
        });
    </script>

    <script>

        jQuery(document).ready(function(){
            jQuery('button').keypress(function(event){
                var enterOkClass =  jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>

@endsection

