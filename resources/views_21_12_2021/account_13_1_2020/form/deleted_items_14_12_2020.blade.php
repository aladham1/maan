@extends("layouts._account_layout")

@section("title", "إدارة الاقتراحات والشكاوى المحذوفة ")
@section("content")

    <div class="row">

        <div class="col-md-9"><h4>هذه الواجهة مخصصة للتحكم في إدارة الاقتراحات والشكاوى المحذوفة من النظام
            </h4> </div>

    </div>
    <br>

    <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form>
                <div class="row">
                    {{-- <div class="col-sm-6">
                        <input type="text" class="form-control"  name="q" value="{{request('q')}}"
                               placeholder="ابحث في الرقم المرجعي، الاسم، رقم الهوية أو اسم المشروع للاقتراح/ الشكوى"/>
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
                <br>
                <div class="row">
                 

                    
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
{{--                            <option value="-1" @if(request('project_id')==='-1')selected--}}
{{--                                @endif>جميع المشاريع--}}
{{--                            </option>--}}
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
                            <option value="">فئة مقدم الاقتراح/الشكوى</option>
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
                        <label for="from_date">من تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                               placeholder="من تاريخ"/>
                    </div>
                    <div class="col-sm-3 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                               placeholder="إلى تاريخ"/>
                    </div>

                    <div class="col-sm-3 adv-search">
                        <label for="delete_date">تاريخ الحذف</label>
                        <input type="date" class="form-control" name="delete_date" value="{{request('delete_date')}}"
                               placeholder="تاريخ الحذف"/>
                    </div>
                    
                </div>

                <div class="row">
{{--                    <div class="col-sm-3 adv-search">--}}
{{--                        <input type="text" class="form-control" name="" value="" placeholder="اسم الموظف الذي قام بالحذف">--}}
{{--                    </div>--}}

                    <div class="col-sm-3 adv-search">
                        <select name="deleted_by" class="form-control">

                            <option value="">اسم الموظف الذي قام بالحذف</option>
                            @foreach($accounts as $account)
                                <option {{request('deleted_by')==$account->id?"selected":""}} value="{{$account->id}}">{{$account->full_name}}</option>
                            @endforeach
                        </select>
                    </div>







                    <div class="col-sm-3 adv-search">
                        <select name="circle_id" class="form-control">
                            <option value="">المستوى الإداري </option>
                            @foreach($circles as $circle)
                                <option {{request('circle_id')==$circle->id ?"selected":""}} value="{{$circle->id}}">{{$circle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 adv-search">

                    <button type="submit" name="theaction" title="بحث" style="width:70px;margin-top:1px" value="search"
                    class="btn btn-primary adv-search"/><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث
            </button>
        </div>


                </div>
                <div class="row" style="margin-top:15px;">




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
                    <th style="max-width: 100px;word-break: normal;">الاسم رباعي
                    </th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">قناة الاستقبال
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التصنيف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/شكوى
                    </th>
                    
                <!--       @if($type!=2 && $type!=3)
                    <th style="max-width: 100px;word-break: normal;">فئة
                        الاقتراح/شكوى
                    </th>@endif
                    <th style="max-width: 100px;word-break: normal;">موضوع
                        الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة
                        المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التاريخ
                    </th> -->
                    {{-- <th style="max-width: 100px;word-break: normal;">الحالة
                    </th> --}}


                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم موظف الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">مستواه الاداري
                    </th>

               
                    <th style="max-width: 100px;word-break: normal;">سبب الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الحذف
                    </th>
                    {{-- <th style="max-width: 100px;word-break: normal;">المرفقات
                    </th> --}}

                    <th style="white-space:normal;">معاينة</th>


                </tr>
                </thead>
                <tbody>
                @foreach($items as $a)

                    <tr>
                        <td style="max-width: 100px;word-break: normal;">{{$a->id}}</td>
                        <td style="max-width: 300px;word-break: normal;">{{$a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->citizen->id_number}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->project->id == 1 ? 'غير مستفيد' : ' مستفيد' }}</td> 
                        <td style="max-width: 100px;word-break: normal;">{{$a->project->name}}</td>
                                                                                                                  
                        <td style="max-width: 100px;word-break: normal;">{{$a->project->end_date <= now() ?  'منتهي' : 'مستمر'}}</td>  
                        <td style="max-width: 100px;word-break: normal;"> {{$a->sent_typee->name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->form_type->name}}</td>
                        <td style="max-width: 300px;word-break: normal;">{{$a->category->name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->datee}}</td>


                    <!--          @if($type!=2 && $type!=3)
                        <td style="max-width: 100px;word-break: normal;"
                            style="padding-left: 0px;padding-right: 0px">

{{$a->category->name}}

                            </td>
                        @endif

                        <td style="max-width: 100px;word-break: normal;">{{$a->title}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->project->name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->project->project_status->name}}</td>
                        <td style="max-width: 100px;word-break: normal;">{{$a->datee}}</td>-->
                        {{-- <td style="max-width: 100px;word-break: normal;">{{$a->form_status->name}} </td> --}}

                        <td style="max-width: 300px;word-break: normal;"> @if($a->deleted_by == 1) مسؤول النظام @else داليا أحمد يونس @endif</td>
                        <td style="max-width: 100px;word-break: normal;">     {{  \App\Account::where('id' , $a->deleted_by)->first()->circle->name }}
                        

                        
                        
                        
                        </td>
                        <td style="max-width: 300px;word-break: normal;"> {{$a->deleted_because}}</td>
                        <td style="max-width: 100px;word-break: normal;"> {{$a->deleted_at}}</td>
                         {{-- <td style="max-width: 100px;word-break: normal;"> المرفقات-- </td> --}}

                        <td style="max-width: 100px;word-break: normal;">
                            <a
                                target="_blank" title="عرض" class="btn btn-xs btn-primary"
                                href="/citizen/form/show/{{$a->citizen->id_number}}/{{$a->id}}">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                        {{--                            @if(--}}
                        {{--                            Auth::user()->account->circle->circle_categories->where('category_id',$a->category->id)->where('to_delete',1)->first()--}}
                        {{--                            &&--}}
                        {{--                            Auth::user()->account->account_projects->where('project_id',$a->project->id)->where('to_delete',1)->first()--}}
                        {{--                            )--}}
                        {{--                                @if ($a->status == "3" )--}}
                        {{--                                    <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفها لأنها مغلقة"--}}
                        {{--                                       href="/account/form/delete/{{$a->id}}"><i--}}
                        {{--                                                class="fa fa-trash"></i></a>--}}
                        {{--                                @endif--}}
                        {{--                        </td>--}}
                        {{--                        @else--}}
                        {{--                        @endif--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        <div style="float:left" >  {{$items->links()}} </div>

        <br>
    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif
    
    
            @else
        <div class="table-responsive">

            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="max-width: 100px;word-break: normal;">الرقم المرجعي</th>
                    <th style="max-width: 100px;word-break: normal;">الاسم رباعي
                    </th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة مقدم الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">قناة الاستقبال
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التصنيف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ تسجيل الاقتراح/شكوى
                    </th>
                    
                <!--       @if($type!=2 && $type!=3)
                    <th style="max-width: 100px;word-break: normal;">فئة
                        الاقتراح/شكوى
                    </th>@endif
                    <th style="max-width: 100px;word-break: normal;">موضوع
                        الاقتراح/شكوى
                    </th>
                    <th style="max-width: 100px;word-break: normal;">المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">حالة
                        المشروع
                    </th>
                    <th style="max-width: 100px;word-break: normal;">التاريخ
                    </th> -->
                    {{-- <th style="max-width: 100px;word-break: normal;">الحالة
                    </th> --}}


                    </th>
                    <th style="max-width: 100px;word-break: normal;">اسم موظف الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">مستواه الاداري
                    </th>

               
                    <th style="max-width: 100px;word-break: normal;">سبب الحذف
                    </th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ الحذف
                    </th>
                    {{-- <th style="max-width: 100px;word-break: normal;">المرفقات
                    </th> --}}

                    <th style="max-width: 100px;white-space:nowrap;">معاينة</th>


                </tr>
                </thead>
                <tbody></tbody>
                </table>
        
        </div>
    
    @endif
@endsection
@section("js")
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
            $('.adv-search').hide();
            $('.adv-search-btn').click(function(){
                $('.adv-search').slideToggle("fast");
            });
        });
    </script>
@endsection
