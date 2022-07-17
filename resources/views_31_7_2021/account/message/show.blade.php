@extends("layouts._account_layout")
@section("title", "إرسال الرسائل النصية")
@section("content")
    <style>
        #confirm_send_message table tr td{
            vertical-align: middle;
        }
    </style>

        <div class="row">
            <div class="col-md-12">
                <h4>هذه الواجهة مخصصة للتحكم في إرسال الرسائل النصية (SMS) من خلال النظام </h4>
            </div>
        </div>

        <br>

        <div class="form-group row filter-div">
        <div class="col-sm-12">
            <form autocomplete="off">
                <div class="row">
                    <div class="col-sm-8">
                        <button type="button" style="width:50px;" class="btn btn-primary adv-search-btn">
                            <span class="icon-plus" aria-hidden="true"></span>

                        </button>

                        يمكنك استدعاء معلومات الأشخاص المراد إرسال الرسائل النصية لهم من خلال الخيارات التالية:
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2 adv-search">
                        <input type="text" class="form-control" name="citizen_id" placeholder="الاسم رباعي" >
                    </div>
                    <div class="col-sm-2 adv-search">
                        <input type="text" class="form-control" name="id_number" placeholder="رقم الهوية" >
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="category_name" class="form-control">
                            <option value="" >فئة مقدم الاقتراح/الشكوى</option>
                            <option value="0" >مستفيد</option>
                            <option value="1">غير مستفيد</option>
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="project_id" class="form-control">
                            <option value="" selected>اسم المشروع</option>
                            @foreach($projects as $project)
                                <option
                                    @if(request('project_id')===''.$project->id)selected
                                    @endif
                                    value="{{$project->id}}">{{$project->code." ".$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <select name="type" class="form-control">
                            <option value="">التصنيف (اقتراح أو شكوى)</option>
                            @foreach($form_type as $ftype)
                                @if($ftype->id != 3)
                                    <option {{request('type')==$ftype->id?"selected":""}} value="{{$ftype->id}}">{{$ftype->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
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

                </div>

                <div class="row">
                    <div class="col-sm-2 adv-search" style="margin-top: 33px;">
                        <select name="replay_status" class="form-control">
                            <option value="">حالة تبليغ الرد </option>
                            <option value="2" >تم التبليغ</option>
                            <option value="1">قيد التبليغ</option>
                            <option value="0">لم يتم التبليغ</option>

                        </select>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">تاريخ تسجيل محدد</label>
                        <input type="date" class="form-control" name="datee"  value="{{request('datee')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="from_date">من تاريخ تسجيل </label>
                        <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <label for="to_date">إلى تاريخ تسجيل</label>
                        <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                               placeholder="يوم / شهر / سنة"/>
                    </div>
                    <div class="col-sm-2 adv-search">
                        <button type="submit" name="theaction" title="بحث" style="width:70px;margin-top:25px" value="search"
                                class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
            <br>

    </div>
    <div class="mt-3"></div>
    <form style="margin-bottom: 50px" action="/account/message/send_single_message" method="POST" autocomplete="off" >
            @csrf
    @if($items)
            @if($items->count()>0)
            <table class="table table-hover table-striped" style="width:100% !important;max-width:100% !important;white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="word-break: normal;">
                        <input type="checkbox" id="checkAll" name="checkbox" value="">
                        تحديد الكل
                        </th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                    <th style="max-width: 100px;word-break: normal;">رقم التواصل</th>
                    <th style="max-width: 100px;word-break: normal;">فئة المواطن</th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">اقتراح/شكوى</th>
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ التسجيل</th>
                    <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>


                </tr>
                </thead>
                <tbody>
                    @foreach($items as $k=>$a)

                        <tr >
                            <td style="word-break: normal;">{{$k+1}}</td>
                            <th style="word-break: normal;">
                                <input type="checkbox" class="checkbox_name" name="mobile[]" value="{{$a->citizen->mobile.'_'.$a->citizen->id.'_'.$a->id}}">
                            </th>
                            <td style="max-width: 250px;word-break: normal;">{{$a->citizen->first_name." ".$a->citizen->father_name." ".$a->citizen->grandfather_name." ".$a->citizen->last_name}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->citizen->id_number}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->citizen->mobile}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->binfit <= now() ?  'مستفيد' : 'غير مستفيد'}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->project->name}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->form_type->name}}</td>
                            <td style="max-width: 100px;word-break: normal;"> {{$a->category->main_category}}</td>
                            <td style="max-width: 100px;word-break: normal;">{{$a->datee}}</td>



                            @if($a->form_status->id == 1)
                                <td style="max-width: 100px;word-break: normal;"> قيد التبليغ </td>
                            @elseif($a->form_status->id == 2)
                                <td style="max-width: 100px;word-break: normal;"> تم التبليغ </td>
                            @else
                                <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ </td>
                            @endif


                        </tr>
                    @endforeach


                </tbody>
            </table>
            <br>
            <div style="float:left" >{{$items->links()}} </div>
            <br>
            @else
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif
        @else
            <table class="table table-hover table-striped" style="white-space:normal;">
                <thead>
                <tr>
                    <th style="word-break: normal;"># </th>
                    <th style="word-break: normal;">
                    <input type="checkbox" id="checkAll" name="checkbox" value="">
                    تحديد الكل
                    </th>
                    <th style="max-width: 250px;word-break: normal;">الاسم رباعي</th>
                    <th style="max-width: 100px;word-break: normal;">رقم الهوية</th>
                    <th style="max-width: 100px;word-break: normal;">رقم التواصل</th>
                    <th style="max-width: 100px;word-break: normal;">فئة المواطن</th>
                    <th style="max-width: 100px;word-break: normal;">اسم المشروع</th>
                    <th style="max-width: 100px;word-break: normal;">اقتراح/شكوى</th>
                    <th style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى</th>
                    <th style="max-width: 100px;word-break: normal;">تاريخ التسجيل</th>
                    <th style="max-width: 100px;word-break: normal;">حالة تبليغ الرد</th>


                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        @endif

        {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

        <table class="table table-hover table-bordered">
            <tr>
                <td>عدد الأسماء الذي تم تحديدها ضمن المجموعة:</td>
                <td><label id="count_of_names"></label></td>
                <td>حدد نوع الرسالة المراد إرسالها للمجموعة:</td>
                <td>
                    <select id="message_type_id" name="message_type_id" class="form-control">
                        <option value=""> نوع الرسالة </option>
                        @foreach($messagesType as $messagetype)
                            <option  value="{{$messagetype->id}}">{{$messagetype->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>إجمالي عدد الرسائل:</td>
                <td><label id="count_of_messages"></label></td>
            </tr>
            <tr>
                <td colspan="6">
                    {!! $errors->first('message_type_id', '<p class="help-block" style="color:red;">:message</p>') !!}
                </td>
            </tr>
        </table>
        <br>



        <div class="form-group" style="float: left;display: none" id="send_message">
            <input type="submit" class="btn btn-success" name="send"  value="إرسال"/>
        </div>

        <div class="form-group" style="display: none" id="confirm_send_message">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="color: #ed6b75;">ولأجل استكمال عملية إرسال الرسالة النصية يحب اتباع إجراءات المصادقة عليها من قبل الجهات المختصة بعملية المصادقة قبل الإرسال:</h4>
                </div>
            </div>

            <table class="table table-hover table-bordered">
                <tr>
                    <td>الشخص المخول بعملية  المصادقة:</td>
                    <td><label>{{$account_confirmation->full_name}}</label></td>
                    <td>مستواه الإداري:</td>
                    <td>{{$account_confirmation->circle->name}}</td>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" name="confirm"  value="إرسال للمصادقة"/></td>
                </tr>
            </table>
        </div>
    </form>

@endsection

@section('css')
    <script src="https://unpkg.com/vue"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
@endsection

@section('js')

     <script>
        $('.adv-search').hide();
        $('.adv-search-btn').click(function () {

            $('.adv-search').slideToggle("fast", function() {
                if ($('.adv-search').is(':hidden'))
                {
                    $('#searchonly').show();
                }
                else
                {
                    $('#searchonly').hide();
                }
            });
        });
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $('.checkbox_name').click(function() {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes  +'  ' + 'اسم')
        })

        $('#checkAll').click(function() {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes  +'  ' + 'اسم')
        })
    </script>

    <script>


        $("#message_type_id").change(function () {
            var message_type_id = $("#message_type_id").val();
            if(message_type_id == 1 ||  message_type_id == 2){
                $('#send_message').show();
                $('#confirm_send_message').hide();
            }else if(message_type_id > 2){
                $('#send_message').hide();
                $('#confirm_send_message').show();
            }else{
                $('#send_message').hide();
                $('#confirm_send_message').hide();
            }
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/'+ message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType : 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  '+ 'رسالة');
                }
            });
        });

        if($("#message_type_id").val() != ''){
            var message_type_id = $("#message_type_id").val();
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/'+ message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType : 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  '+ 'رسالة');
                }

            });
        }
    </script>

    @endsection
