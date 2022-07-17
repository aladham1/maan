@extends("layouts._account_layout")

@if($type && $items->first())

    @section("title", "ادراة نماذج ال". $items->first()->form_type->name)
@else
    @section("title", "إدارة الاقتراحات والشكاوى")
@endif

@section("content")

    <div class="row">

        <div class="col-sm-7 col-md-6"><h4>هذه الواجهة مخصصة للتحكم في إدارة الاقتراحات والشكاوى المسجلة في النظام
            </h4> </div>

        <div class="col-sm-4 col-md-6" style="text-align: center;">
            <a target="_blank" class="btn btn-success" href=""><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> إضافة اقتراح/شكوى</a>

            <a target="_blank" class="btn btn-success" href="/citizen/form/search"></span>متابعة الاقتراحات والشكاوى</a>
        </div>
    </div>
    <br>
    <br>


    <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form>
                <div class="row">
                    {{-- <div class="col-sm-4">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في الرقم المرجعي ,الاسم او رقم الهوية "/>
                    </div> --}}
                    <div class="col-sm-4">
                        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btn"/> <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        بحث متقدم
                        </button>
                        <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" style="width:70px;"
                                value="excel" class="btn btn-primary"/>
                        تصدير
                        </button>

                    </div>
                </div>

                        <div class="row">
                            {{-- <div class="col-sm-3 adv-search">
                                <select name="read" class="form-control">
                                    <option value="">المقروءة والغير مقروءة</option>
                                    <option {{request('read')=="1"?"selected":""}} value="1">المقروءة</option>
                                    <option {{request('read')=="2"?"selected":""}} value="2">الغير مقروءة</option>
                                </select>
                            </div> --}}


                            <div class="col-sm-3 adv-search">
                                <input type="text" class="form-control" name="id" placeholder="الرقم المرجعي" >
                            </div>

                            <div class="col-sm-3 adv-search">
                                <input type="text" class="form-control" name="id_number" placeholder="رقم الهواية" >
                            </div>
                        
                            <div class="col-sm-3 adv-search">
                                <input type="text" class="form-control" name="citizen_id" placeholder="اسم مقدم الاقتراح / الشكوي" >
                            </div>
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
                        </div>

                <div class="row">

                    <div class="col-sm-3 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="" >فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0" >مستفد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <select name="sent_type" class="form-control">

                            <option value="">قنوات الاستقبال</option>
                            @foreach($sent_typee as $sent_type)
                                <option {{request('sent_type')==$sent_type->id?"selected":""}} value="{{$sent_type->id}}">{{$sent_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="type" class="form-control">
                            <option value="">التصنيف</option>
                            @foreach($form_type as $ftype)
                                @if($ftype->id != 3)
                                    <option {{request('type')==$ftype->id?"selected":""}} value="{{$ftype->id}}">{{$ftype->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <select name="category_id" class="form-control">
                            <option value="" selected>فئة الاقتراح/شكوى</option>
                            @foreach($categories as $category)
                                @if($category->id != 1 && $category->id != 2)
                                    <option
                                        @if(request('category_id')===''.$category->id)selected
                                        @endif
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <select name="status" class="form-control">
                            <option value="">حالة الرد</option>
                            @foreach($form_status as $fstatus)
                                @if($fstatus->id != 3 && $fstatus->id != 4)

                                    {{$fstatus->name = 'لم يتم الرد'}}
                                    <option {{request('status')==$fstatus->id?"selected":""}} value="{{$fstatus->id}}">
                                        @if($fstatus->id == 1)
                                            لم يتم الرد
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
                            <option value="0" >غير راضي</option>
                            <option value="1">راضي بشكل ضعيف</option>
                            <option value="2">راضي بشكل متوسط </option>
                            <option value="3">راضي بشكل قوي</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee" value="{{request('datee')}}"
                               placeholder="تاريخ النموذج"/>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="from_date">من تاريخ التسجيل </label>
                        <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                               placeholder="من تاريخ"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ التسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                               placeholder="إلى تاريخ"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <button type="submit" name="theaction" title="بحث" style="width:70px;margin-top:25px" value="search"
                        class="btn btn-primary"/><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        بحث
                        </button>
                </div>

                </div>

                <div class="row" style="margin-top:15px;">


                    <div class="col-sm-6">
                        {{-- <button type="submit" target="_blank" name="theaction" title="طباعة" style="width:70px;" value="print"
                                class="btn btn-primary "/>
                        <i class="glyphicon glyphicon-print icon-white"></i>
                        </button> --}}


                    </div>


                </div>
            </form>

        </div>

    </div>
    <div class="mt-3"></div>
    @if($items)
    @if($items->count()>0)
        <div class="table-responsive">

            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="max-width: 100px;word-break: normal;">الرقم المرجعي</th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي
                    </th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية
                    </th>
                    <th style="max-width: 150px;word-break: normal;">فئة مقدم الاقتراح /الشكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة
                        المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">قناة الاستقبال
                    </th>
                    <th style="max-width: 100px;word-break: normal;">النوع
                    </th>
                    @if($type!=2 && $type!=3)
                    <th style="max-width: 400px;word-break: normal;">فئة الاقتراح/الشكوى
                    </th>@endif
                  

                    {{-- <th style="max-width: 100px;word-break: normal;;">الموضوع
                    </th> --}}


                    <th style="max-width: 100px;word-break: normal;">التاريخ
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة الرد
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد
                    </th>
                    {{-- <th style="max-width: 100px;word-break: normal;">التغذية الراجعة
                    </th> --}}
                    {{-- <th style="max-width: 100px;word-break: normal;">اجراءات مطولة
                    </th>
                    <th style="max-width: 100px;word-break: normal;">الإجراءات المطولة
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الاجراءات
                    </th> --}}
                 

                    <th style="max-width: 110px;word-break: normal;text-align: center;"> معاينة </th>

                </tr>
                </thead>
                <tbody>
                @foreach($items as $a)

                    <tr class="tr-id-{{$a->id}}">
                        <td style="max-width: 100px;word-break: normal;">{{$a->id}}</td>
                        <td style="max-width: 250px;word-break: normal;">{{$a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->citizen->id_number}}</td>
                        <td style="max-width: 150px;word-break: normal;;">{{$a->project->id == 1 ? 'غير مستفيد' : ' مستفيد' }}</td>

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

                        @if($a->form_status->id == 2)
                              <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">تم الرد </td>
                        @else
                              <td style="max-width: 100px;word-break: normal;">قيد الدراسة</td>
                        @endif

                        @if($a->form_status->id == 1)
                             <td style="max-width: 100px;word-break: normal;"> قيد التبليغ </td>
                        @elseif($a->form_status->id == 2)
                             <td style="max-width: 100px;word-break: normal;"> تم التبليغ </td>
                        @else
                             <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ </td>
                        @endif
                        {{-- <td style="max-width: 100px;word-break: normal;"> -- </td>



                        <td style="max-width: 100px;word-break: normal;"> {{$a->response_type == 1 ? 'يحتاج' : 'لا يحتاج' }}</td>
                        <td style="max-width: 100px;word-break: normal;"> {{$a->required_respond}}</td> --}}
                        {{-- <td style="max-width: 100px;word-break: normal;">    التغذية الراجعة  -- </td>  --}}
                      




                        <td style="width: 110px;word-break: normal;text-align: center;">
                            <a
                                target="_blank" title="عرض" class="btn btn-xs btn-primary"
                                href="/citizen/form/show/{{$a->citizen->id_number}}/{{$a->id}}">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            @if(
                            Auth::user()->account->circle->circle_categories->where('category_id',$a->category->id)->where('to_delete',1)->first()
                            &&
                            Auth::user()->account->account_projects->where('project_id',$a->project->id)->where('to_delete',1)->first()
                            )
                                @if ($a->status == "3" )
                                    <a class="btn btn-xs Confirm22 btn-danger" data-id="{{$a->id}}" title="يمكن حذفها لأنها مغلقة"><i class="fa fa-trash"></i></a>
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
        <br>
        <div style="float:left" >  {{$items->links()}} </div>
        <br> <br><br>
    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        

    @endif
    
            @else

            <div class="table-responsive">

            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="max-width: 60px;word-break: normal;">الرقم المرجعي</th>
                    <th style="max-width: 80px;word-break: normal;">الاسم رباعي
                    </th>
                    <th style="max-width: 60px;word-break: normal;">رقم الهوية
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح /الشكوى
                    </th>
                    <th style="max-width: 60px;word-break: normal;">اسم المشروع
                    </th>
                    <th style="max-width: 60px;word-break: normal;">حالة
                        المشروع
                    </th>
                    <th style="max-width: 60px;word-break: normal;">قناة الاستقبال
                    </th>
                    <th style="max-width: 60px;word-break: normal;">النوع
                    </th>
                    @if($type!=2 && $type!=3)
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى
                    </th>@endif
                  

                    {{-- <th style="max-width: 50px;word-break: normal;;">الموضوع
                    </th> --}}


                    <th style="max-width: 50px;word-break: normal;">التاريخ
                    </th>
                    <th style="max-width: 50px;word-break: normal;">حالة الرد
                    </th>
                    <th style="max-width: 40px;word-break: normal;">حالة تبليغ الرد
                    </th>
                    {{-- <th style="max-width: 60px;word-break: normal;">التغذية الراجعة
                    </th> --}}
                    {{-- <th style="max-width: 60px;word-break: normal;">اجراءات مطولة
                    </th>
                    <th style="max-width: 60px;word-break: normal;">الإجراءات المطولة
                    </th>
                    <th style="max-width: 60px;word-break: normal;">تاريخ الاجراءات
                    </th> --}}
                 

                    <th style="max-width: 50px;word-break: normal;"> معاينة </th>

                </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
        
            </div>
    
    
    
    @endif

    <div class="modal fade" id="Confirm22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form_modal">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="deleting_reason" placeholder="سبب الحذف" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء الامر</button>
                        <button id="submit_delete" class="btn btn-danger">تأكيد الحذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section("js")
    <script>
        $(function () {
            var id = false;
            $(".Confirm22").click(function (e) {
                e.preventDefault();
                id = $(this).attr('data-id');
                $("#Confirm22").modal("show");
                return false;
            });
            $('#delete_form_modal').submit(function(e) {
                e.preventDefault();
                if (!id)
                    return;
                var reason = $("#deleting_reason").val();
                console.log('Reason Before: ', reason);
                $("#Confirm22").modal("hide");
                $.post("{{route('delete_form')}}", {"_token": "{{csrf_token()}}", 'id': id, 'reason': reason}, function(data){
                    console.log('data: ', data);
                    $('.tr-id-'+id).fadeOut("fast", function() {
                        $('.tr-id-'+id).remove();
                    });
                    id = false;
                });
            });
            $('.adv-search').hide();
            $('.adv-search-btn').click(function(){
                $('.adv-search').slideToggle("fast");
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
@endsection
