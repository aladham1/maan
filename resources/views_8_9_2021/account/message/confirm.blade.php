@extends("layouts._account_layout")
@section("title", "المصادقة على ارسال الرسائل النصية")
@section("content")
    <style>
        #confirm_send_message table tr td {
            vertical-align: middle;
        }
    </style>

        <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في المصادقة على إرسال الرسائل النصية (SMS) من خلال النظام</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
    $ids = "ids=";
    foreach ($items as $item) {
//            array_push($ids,$item->form_id);
        $ids .= $item->form_id . ",";
    }

    ?>
   <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
            <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
             <h4 style="font-weight: 600 !important;">أولاً: معلومات عامة عن الرسالة النصية</h4>
        <div class="table-responsive">

            <table class="table table-hover table-striped"
                   style="width:100% !important;max-width:100% !important;white-space:normal;text-align: right;">
                <tr>
                    <td style="font-weight: 600 !important;">اسم المشروع الذي تتبعه الرسالة:</td>
                    <td>{{$items->first()->form->project->name}}</td>
                    <td style="font-weight: 600 !important;">نوع الرسالة:</td>
                    <td>{{$items->first()->message_type->name}}</td>
                </tr>

                <tr>
                    <td style="font-weight: 600 !important;">فئة الاقتراح/الشكوى:</td>
                    <td>{{$items->first()->form->category->name}}</td>
                    <td style="font-weight: 600 !important;">معاينة محتوى الاقتراحات/ الشكاوى:</td>
                    <td><a class="btn btn-xs btn-primary" href="{{route('form.index',[$ids,'theaction=search']) }}"
                           title="اضغظ هنا">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td><label style="font-weight: 600 !important;">نص الرسالة: </label></td>
                    <td colspan="3"><p>{{$items->first()->message_type->text}}</p></td>
                </tr>

                <tr>
                    <td style="font-weight: 600 !important;">عدد الأشخاص المراد ارسال الرسالة لهم:</td>
                    <td>{{$items->count()}}</td>
                    <td style="font-weight: 600 !important;">إجمالي عدد الرسائل:</td>
                    <td>{{($items->first()->message_type->count_of_letter)*($items->count())}}</td>
                </tr>

                <tr>
                    <td style="font-weight: 600 !important;">اسم الموظف الذي يريد إرسال الرسالة:</td>
                    <td>{{$items->first()->user->full_name}}</td>
                    <td style="font-weight: 600 !important;">مستواه الإداري:</td>
                    <td>{{$items->first()->user->circle->name}}</td>
                </tr>

            </table>
       
        </div>
        @if(auth()->user()->account->id == 1 )
            @if(is_null($items->first()->objection_send_message ))
          
                <h4 style="font-weight: 600 !important;">ثانياً: إجراءات المصادقة على إرسال الرسالة النصية: </h4>
            
                <form action="/account/message/confirm_send_message_post" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="message_group" value="{{$id}}">
                    <div class="form-group row">
                        <div class="col-md-12"  style="display: inline-flex;">
                            <label for="sent_type" class="col-form-label" style="margin-left: 20px;">هل يوجد اعتراض على إرسال الرسالة
                                النصية؟</label>

                            <div class="form-check" style="margin-left: 20px;">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="objection_send_message"
                                           value="1">
                                    نعم
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="objection_send_message"
                                           value="0"> لا
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! $errors->first('objection_send_message', '<p class="help-block" style="color:red;">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div id="explain_main_div1" style="display: none;">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="sent_type" class="col-form-label">وضح السبب:</label>
                                        <input class="form-control {{($errors->first('reason_objection_send_message') ? " form-error" : "")}}" type="text" id="reason_objection_send_message"
                                               name="reason_objection_send_message" autocomplete="off">
                                        {!! $errors->first('reason_objection_send_message', '<p class="help-block" style="color:red;">:message</p>') !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12" style="display: inline-flex;">
                            <label for="sent_type" class="col-form-label" style="margin-left: 20px;">هل يوجد اعتراض على نص الرسالة؟</label>
                   
                            <div class="form-check" style="margin-left: 20px;">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="objection_text_message"
                                           value="1">
                                    نعم
                                </label>
                            </div>
  
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="objection_text_message"
                                           value="0"> لا
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-2">
                            {!! $errors->first('objection_text_message', '<p class="help-block" style="color:red;">:message</p>') !!}
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div id="explain_main_div2" style="display: none;">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="sent_type" class="col-form-label">يرجي إعادة صياغة نص
                                            الرسالة:</label>
                                        <input class="form-control {{($errors->first('reason_objection_text_message') ? " form-error" : "")}}" type="text" id="reason_objection_text_message"
                                               name="reason_objection_text_message" autocomplete="off">
                                        {!! $errors->first('reason_objection_text_message', '<p class="help-block" style="color:red;">:message</p>') !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    <div class="form-group row" style="float:left;margin-bottom: 10px;">
                        <div class="col-md-12">
                        <input type="submit" class="btn btn-success" value="إرسال"/>
                        <a href="message" class="btn btn-light">إلغاء الأمر</a>
                        </div>
                    </div>
                </form>
            @else
       
                <h4 style="font-weight: 600 !important;">وفيما يلي نتيجة المصادقة من قبل الجهة المختصة على إرسال الرسالة: </h4>
            <div class="table-responsive">
                <table class="table table-hover table-striped"
                       style="width:100% !important;max-width:100% !important;white-space:normal;text-align: right;">
                    <tr>
                        <td>هل يوجد اعتراض على إرسال الرسالة النصية؟</td>
                        <td>@if($items->first()->objection_send_message == 1){{'نعم'}}@else{{'لا'}} @endif</td>
                        <td>سبب الاعتراض:</td>
                        <td>{{$items->first()->reason_objection_send_message}}</td>
                    </tr>

                    <tr>
                        <td>هل يوجد اعتراض على نص الرسالة؟</td>
                        <td>@if($items->first()->objection_text_message == 1){{'نعم'}}@else{{'لا'}} @endif</td>
                        <td>نص الرسالة المعدل:</td>
                        <td>{{$items->first()->reason_objection_text_message}}</td>
                    </tr>
                </table>
            </div>
            @endif
        @endif

    </div></div></div></div></div></div>
@endsection

@section('css')
    <script src="https://unpkg.com/vue"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
@endsection

@section('js')

    <script>
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
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $('.checkbox_name').click(function () {
            var checkboxes = $('.checkbox_name:checked').length;
            $('#count_of_names').text(checkboxes + '  ' + 'اسم')
        })
    </script>

    <script>


        $("#message_type_id").change(function () {
            var message_type_id = $("#message_type_id").val();
            if (message_type_id == 1 || message_type_id == 2) {
                $('#send_message').show();
                $('#confirm_send_message').hide();
            } else if (message_type_id > 2) {
                $('#send_message').hide();
                $('#confirm_send_message').show();
            } else {
                $('#send_message').hide();
                $('#confirm_send_message').hide();
            }
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/' + message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType: 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  ' + 'رسالة');
                }
            });
        });

        if ($("#message_type_id").val() != '') {
            var message_type_id = $("#message_type_id").val();
            var checkboxes = $('.checkbox_name:checked').length;
            route = '/account/message/get_messagecount/' + message_type_id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                dataType: 'json',
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (response) {
                    x = response.count_of_letter;
                    $('#count_of_messages').text((x * checkboxes) + '  ' + 'رسالة');
                }

            });
        }
    </script>

    <script>
        $(document).ready(function () {

            $('input:radio[name="objection_send_message"]').click(function () {
                var inputValue = $("input[name='objection_send_message']:checked").val();
                if (inputValue == 1) {
                    $('#explain_main_div1').show();
                } else {
                    $('#explain_main_div1').hide();
                }
            });

            $('input:radio[name="objection_text_message"]').click(function () {
                var inputValue = $("input[name='objection_text_message']:checked").val();
                if (inputValue == 1) {
                    $('#explain_main_div2').show();
                } else {
                    $('#explain_main_div2').hide();
                }
            });
        });
    </script>

@endsection
