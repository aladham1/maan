@extends("layouts._account_layout")

@if($type && $items->first())

    @section("title", "ادراة نماذج ال". $items->first()->form_type->name)
@else
    @section("title", "إدارة الاقتراحات والشكاوى")
@endif


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
                                هذه الواجهة مخصصة للتحكم في إدارة الاقتراحات والشكاوى المسجلة في النظام
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
                    <div class="col-md-2 col-2">
                        <div class="form-group filter-div" style="margin-bottom: 10px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
                  <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" id="excel_b" value="excel" class="btn btn-primary adv-export-btnn" style="margin-left: 10px;">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                </button>
        </div>
                </div>

                </div>


    <div class="form-group row filter-div">
        <div class="col-sm-12">
                <!--<div class="row">
                    <div class="col-sm-4">
                        {{--                        <button id="searchonly" type="submit" name="themainaction" value="search" style="width:100px;"--}}
                        {{--                                class="btn btn-primary"><span class="glyphicon glyphicon-search"--}}
                        {{--                                                              aria-hidden="true"></span>     بحث    </button>--}}
                        <button type="button" style="width:100px;" class="btn btn-primary adv-search-btn">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث متقدم
                        </button>
                        <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" style="width:100px;"
                                value="excel" class="btn btn-primary">
                            <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
                            تصدير
                        </button>

                    </div>
                </div>-->
                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="id" placeholder="الرقم المرجعي">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="citizen_id"
                               placeholder="اسم مقدم الاقتراح / الشكوى">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <input type="text" class="form-control" name="id_number" placeholder="رقم الهوية">
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="">فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0">مستفيد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-3 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            <option value="-1" @if(request('project_id')==='-1')selected
                                @endif>جميع المشاريع
                            </option>
                            @foreach($projects as $project)
                                <option
                                    @if(request('project_id')===''.$project->id)selected
                                    @endif
                                    value="{{$project->id}}">{{$project->code." ".$project->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="active" class="form-control">
                            <option value=""> حالة المشروع</option>
                            @foreach($project_status as $pstatus)
                                <option
                                    {{request('active')==$pstatus->id?"selected":""}} value="{{$pstatus->id}}">{{$pstatus->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="sent_type" class="form-control">

                            <option value="">قناة الاستقبال</option>
                            @foreach($sent_typee as $sent_type)
                                <option
                                    {{request('sent_type')==$sent_type->id?"selected":""}} value="{{$sent_type->id}}">{{$sent_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="type" class="form-control">
                            <option value="">التصنيف (اقتراح أو شكوى)</option>
                            @foreach($form_type as $ftype)
                                @if($ftype->id != 3)
                                    <option
                                        {{request('type')==$ftype->id?"selected":""}} value="{{$ftype->id}}">{{$ftype->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="category_id" class="form-control">
                            <option value="" selected>فئة الاقتراح/شكوى</option>
                            @foreach($categories as $category)
{{--                                @if($category->id != 1 && $category->id != 2)--}}
                                    <option
                                        @if(request('category_id')===''.$category->id)selected
                                        @endif
                                        value="{{$category->id}}">{{$category->name}}</option>
{{--                                @endif--}}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="status" class="form-control">
                            <option value="">حالة الرد</option>
                            @foreach($form_status as $fstatus)
                                @if($fstatus->id != 3 && $fstatus->id != 4 && $fstatus->id != 5 )

                                    {{$fstatus->name = 'قيد الدراسة'}}
                                    <option {{request('status')==$fstatus->id?"selected":""}} value="{{$fstatus->id}}">
                                        @if($fstatus->id == 1)
                                            قيد الدراسة
                                        @else
                                            تم الرد
                                        @endif

                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="evaluate" class="form-control">
                            <option value="">التغذية الراجعة</option>
                            <option value="4">غير راضي عن الرد</option>
                            <option value="3">راضي بشكل ضعيف</option>
                            <option value="2">راضي بشكل متوسط</option>
                            <option value="1">راضي بشكل كبير</option>

                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="replay_status" class="form-control">
                            <option value="">حالة تبليغ الرد</option>
                            <option value="1">تم التبليغ</option>
                            <option value="0">قيد التبليغ</option>
                            <option value="2">لم يتم التبليغ</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee" value="{{request('datee')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ تسجيل </label>
                        <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                         <div  class="form-group adv-searchh" style="margin-left: 20px;margin-top:20px;">

                        <button type="submit" name="theaction" title="بحث" style="display: block;margin-top:0px;width:110px;"
                                value="search"
                                class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                              aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>

                </div>
        </div>

    </div>
                </form>


<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
            <div class="table-responsive">

                <table class="table table-hover table-striped"
                       style="width:180% !important;max-width:170% !important;white-space:normal;">
                    <thead>
                    <tr>
                        <th style="word-break: normal;">الرقم المرجعي</th>
                        <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                        <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                        <th style="max-width: 150px;word-break: normal;">فئة مقدم الاقتراح /الشكوى</th>
                        <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                        <th style="max-width: 100px;word-break: normal;">قناة الاستقبال</th>
                        <th style="max-width: 100px;word-break: normal;">النوع</th>
                        @if($type!=2 && $type!=3)
                            <th style="max-width: 400px;word-break: normal;">فئة الاقتراح/الشكوى</th>@endif
                        <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى</th>
                        <th style="max-width: 100px;word-break: normal;">حالة الرد</th>
                        <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>
                        <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                        <th style="max-width: 100px;word-break: normal;">المرفقات</th>
                        <th style="max-width: 110px;word-break: normal;text-align: center;" colspan="2"> معاينة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $a)
                        <tr class="tr-id- @if($a->hide_data == 2){{'_'}}@else{{$a->id}}@endif">
                            <td style="word-break: normal;">@if($a->hide_data == 2){{'_'}}@else{{$a->id}}@endif</td>
                            <td style="max-width: 250px;word-break: normal;">@if($a->hide_data == 2){{'_'}}@else{{$a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name}}@endif</td>
                            <td style="max-width: 100px;word-break: normal;">@if($a->hide_data == 2){{'_'}}@else{{$a->citizen->id_number}}@endif</td>
                            <td style="max-width: 150px;word-break: normal;;">{{$a->project->id == 2 ? 'غير مستفيد' : ' مستفيد' }}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->project->name}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->project->end_date <= now() ?  'منتهي' : 'مستمر'}}</td>
                            <td style="max-width: 100px;word-break: normal;"> {{$a->sent_typee->name}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->form_type->name}}</td>
                            @if($type!=2 && $type!=3)
                                <td style="max-width: 400px;word-break: normal;"
                                    style="padding-left: 0px;padding-right: 0px">

                                    {{$a->category->name}}

                                </td>
                            @endif
                            {{-- <td style="max-width: 100px;word-break: normal;">{{$a->title}}</td> --}}
                            <td style="max-width: 100px;word-break: normal;">{{$a->datee}}</td>

                            @if($a->form_follow && $a->form_response->response)
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                    تم الرد
                                </td>
                            @else
                                <td style="max-width: 100px;word-break: normal;">قيد الدراسة</td>
                            @endif


                            @if($a->form_follow && $a->form_follow->solve == 2)
                                <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ</td>
                            @elseif($a->form_follow && $a->form_follow->solve == 1)
                                <td style="max-width: 100px;word-break: normal;"> تم التبليغ</td>
                            @else
                                <td style="max-width: 100px;word-break: normal;"> قيد التبليغ</td>
                            @endif

                            @if($a->form_follow &&  $a->form_follow->evaluate)
                                @if($a->form_follow->evaluate == 1)
                                    <td style="max-width: 100px;word-break: normal;"> راضي بشكل كبير</td>
                                @elseif($a->form_follow->evaluate==2)
                                    <td style="max-width: 100px;word-break: normal;"> راضي بشكل متوسط</td>
                                @elseif($a->form_follow->evaluate == 3)
                                    <td style="max-width: 100px;word-break: normal;"> راضي بشكل ضعيف</td>
                                @else
                                    <td style="max-width: 100px;word-break: normal;"> غير راضي عن الرد</td>
                                @endif
                            @else
                                <td style="max-width: 100px;word-break: normal;">لا يوجد رد</td>
                            @endif

                            <td style="max-width: 100px;word-break: normal;">
                                <?php
                                $form_files = \App\Form_file::where('form_id', '=', $a->id)->get();

                                if(!$form_files->isEmpty()){
                                ?>
                                <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton"
                                   data-target="#smallModal"
                                   data-attr="{{ route('showfiles', $a->id) }}" title="اضغظ هنا">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                <?php }else{?>
                                <a class="btn btn-xs btn-primary btn-green" title="لايوجد مرفقات لعرضها" disabled="disabled">
                                    <i class="glyphicon glyphicon-eye-close"></i>
                                </a>
                                <?php } ?>
                            </td>
                            <td style="width: 110px;word-break: normal;text-align: center;">
                                <?php
                                if($a->hide_data == 2){
                                    $id_number = 0;
                                }else{
                                    $id_number = $a->citizen->id_number;
                                }
                                ?>
                                <a
                                    target="_blank" title="عرض" class="btn btn-xs btn-primary"
                                    href="/citizen/form/show/{{$id_number}}/{{$a->id}}">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                @if(
                                Auth::user()->account->circle->circle_categories->where('category_id',$a->category->id)->where('to_delete',1)->first()
                                &&
                                Auth::user()->account->account_projects->where('project_id',$a->project->id)->where('to_delete',1)->first()
                                )
                                    @if ($a->status == "3" )
                                        <a class="btn btn-xs Confirm22 btn-danger" data-id="{{$a->id}}"
                                           title="يمكن حذفها لأنها مغلقة"><i class="fa fa-trash"></i></a>
                                    @endif
                            </td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <div style="float:left">{{$items->links()}} </div>
        @else
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>


        @endif

    @else

        <div class="table-responsive">

            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;">الرقم المرجعي</th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                    <th style="max-width: 150px;word-break: normal;">فئة مقدم الاقتراح /الشكوى</th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">حالة المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">قناة الاستقبال</th>
                    <th style="max-width: 100px;word-break: normal;">النوع</th>
                    @if($type!=2 && $type!=3)
                        <th style="max-width: 400px;word-break: normal;">فئة الاقتراح/الشكوى</th>@endif
                    <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/الشكوى</th>
                    <th style="max-width: 100px;word-break: normal;">حالة الرد</th>
                    <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>
                    <th style="max-width: 100px;word-break: normal;">التغذية الراجعة</th>
                    <th style="max-width: 100px;word-break: normal;">المرفقات</th>
                    <th style="max-width: 110px;word-break: normal;text-align: center;"> معاينة</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>



    @endif
</div>
</div>

  </div>
        </div>

    </div>
</div>
    <div class="modal fade" id="Confirm22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                      <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                </div>
                <form id="delete_form_modal">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="deleting_reason" placeholder="سبب الحذف" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">الغاء الامر</button>
                        <button id="submit_delete" class="btn btn-danger main-btn">تأكيد الحذف</button>
                    </div>
                </form>
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
    <script>
        $(function () {
            var id = false;
            $(".Confirm22").click(function (e) {
                e.preventDefault();
                id = $(this).attr('data-id');
                $("#Confirm22").modal("show");
                return false;
            });
            $('#delete_form_modal').submit(function (e) {
                e.preventDefault();
                if (!id)
                    return;
                var reason = $("#deleting_reason").val();
                console.log('Reason Before: ', reason);
                $("#Confirm22").modal("hide");
                $.post("{{route('delete_form')}}", {
                    "_token": "{{csrf_token()}}",
                    'id': id,
                    'reason': reason
                }, function (data) {
                    console.log('data: ', data);
                    $('.tr-id-' + id).fadeOut("fast", function () {
                        $('.tr-id-' + id).remove();
                    });
                    id = false;
                });
            });
            $('.adv-search').hide();
            $('.adv-search-btn').click(function () {
                $('.adv-search').slideToggle("fast", function () {
                    if ($('.adv-search').is(':hidden')) {
                        $('#searchonly').show();
                    } else {
                        $('#searchonly').hide();
                    }
                });
            });

            {{--    $(".submit_delete").onclick(function () {--}}
            {{--    $.ajax({--}}
            {{--        type: 'POST',--}}
            {{--        url: '/account/form/delete/{{$a->id}}',--}}
            {{--        data: {--}}
            {{--            _token: '{{ csrf_token() }}' ,--}}
            {{--            'deleting_reason': $(".deleting_reason").val()--}}

            {{--        },--}}
            {{--        success: function (){--}}
            {{--            $("#Confirm22").modal("hide");--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}
        });
    </script>
    <script>
        $(function () {
            $(".cbActive").change(function () {
                var id = $(this).attr('content');
                var cat_id = $(this).val();

                $.ajax({
                    method: 'POST',
                    url: "/account/form/change-category/" + id,
                    data: {_token: '{{ csrf_token() }}', _method: 'PUT', 'category_id': cat_id},
                    error: function (jqXHR, textStatus, errorThrown) {
                        // User Not Logged In
                        // 401 Unauthorized Response
                        //window.location.href = "/account/form";
                    },
                });
            });
        });
    </script>

    <script>

        jQuery(document).ready(function () {
            jQuery('input').keypress(function (event) {
                var enterOkClass = jQuery(this).attr('class');
                if (event.which == 13 && enterOkClass != 'noEnterSubmit') {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endsection