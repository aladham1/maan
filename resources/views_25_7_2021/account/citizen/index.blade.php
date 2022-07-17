@extends("layouts._account_layout")

@section("title", "إدارة مستفيدي المشاريع")

@section("content")
<div class="row">
        <div class="col-md-9">
          <h4>هذه الواجهة مخصصة للتحكم في إدارة مستفيدي مشاريع المركز</h4><br>
        </div>

        @if(check_permission('إضافة مستفيدين جدد'))
            <div class="col-sm-2">
                <a class="btn btn-success" style="width:150px;" href="/account/citizen/create"><span class="glyphicon glyphicon-plus"     style="margin-left: 5px;" aria-hidden="true"></span>إضافة مستفيد جديد</a>
            </div>
        @endif
	<br>
</div>

<br>
<br>


<div class="form-group row filter-div">
    <div class="col-sm-12">
        <form autocomplete="off">
            <div class="row">
                <div class="col-sm-4">
                    <button type="button"  style="width:100px;"  class="btn btn-primary adv-search-btnn">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث متقدم
                    </button>

                    <button type="submit" name="theaction" title ="تصدير إكسل"  value="excel"
                            class="btn btn-primary" style="width: 110px" id="excel_b">
                        <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                        تصدير
                    </button>
                </div>
            </div>
            <br>
            <div class="">
               <div class="col-sm-2">
                   <div class="form-group adv-searchh">
                          <input type="text" class="form-control" name="id" value="" placeholder="رقم طلب المشروع" >
                   </div>
               </div>
               <div class="col-sm-2">

                    <div class="form-group adv-searchh" >
                      <input type="text" class="form-control" name="id_number" value="" placeholder="رقم الهوية" >
                    </div>
                    </div>
               <div class="col-sm-2">
                    <div class="form-group adv-searchh" >
                      <input type="text" class="form-control" name="first_name" value="" placeholder="اسم المستفيد" >
                    </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-2">
                 <div class="form-group adv-searchh" >
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
               <div class="col-sm-2">

                <div class="form-group adv-searchh" >
                      {{--  <input type="text" class="form-control" name="project_id" value="" placeholder="اسم المشروع" style="width: 230px;">  --}}
                      <select class="form-control" name="project">
                        <option value=""> اسم المشروع</option>

                      @foreach ($projects as $project )
                      <option value="{{ $project->id }}">{{ $project->name }}</option>

                      @endforeach
                    </select>

                    </div>
                    </div>

               <div class="col-sm-2">
                 <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh" style="width: 110px" >
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                 </div>
               </div>
            </div>

        </form>
    </div>
</div>

    <div class="mt-3"> </div>
    @if($items)
    @if($items->count()>0)
<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم طلب المشروع</th>
                <th>اسم المستفيد </th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th>رقم التواصل(1)</th>
                <th>رقم التواصل (2)</th>
                <th>اسم المشروع</th>
                <th> التفاصيل ذات العلاقة بالمستفيد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $a)
                <tr>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$loop->iteration}} </td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $a->project_request ? $a->project_request :'-' }}</td>
                    <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->first_name." ".$a->father_name." ".$a->grandfather_name." ".$a->last_name}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id_number}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->governorate}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr">{{$a->mobile}}</td>
                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr">{{$a->mobile2 ? $a->mobile2 : '-'}}</td>
                    <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center;" dir="ltr">{{ $a->name }}</td>
                    <td style="text-align: center">
                        @if(check_permission('تبويب الاقتراحات والشكاوى'))
                        <a class="btn btn-xs btn-success" href="/account/citizen/formincitizen/{{$a->id}}">الاقتراحات/الشكاوى</a>
                        @endif

{{--                        @if(check_permission('تبويب المشاريع'))--}}
{{--                        <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton" data-target="#smallModal"--}}
{{--                           data-attr="{{ route('showprojects', $a->id) }}">--}}
{{--                            المشاريع--}}
{{--                        </a>--}}
{{--                        @endif--}}

                        @if(check_permission('تعديل بيانات المستفيد'))
                            <a class="btn btn-xs btn-primary" title="تعديل" href="/account/citizen/{{$a->id}}/edit"><i
                                        class="fa fa-edit"></i></a>
                        @endif

                        @if(check_permission('حذف المستفيد'))
                            <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/citizen/delete/{{$a->project_request_id}}"><i
                                    class="fa fa-trash"></i></a>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>

</div>
<br>
      <div style="float:left" >  {{$items->links()}} </div>
        <br> <br><br>

    @else

        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>


    @endif

        @else

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم طلب المشروع </th>
                <th>اسم المستفيد</th>
                <th>رقم الهوية</th>
                <th>المحافظة</th>
                <th>رقم التواصل(1)</th>
                <th>رقم التواصل (2)</th>
                <th>اسم المشروع</th>
                <th> التفاصيل ذات العلاقة بالمستفيد</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>



    @endif

<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true" style=" position: absolute;left: 42%;top: 40%;transform: translate(-50%, -50%);">
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
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
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
            jQuery('input').keypress(function(event){
                var enterOkClass =  jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>



@endsection

