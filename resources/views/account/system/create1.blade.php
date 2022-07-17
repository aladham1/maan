@extends("layouts._account_layout")

@section("title", "إضافة متابعة دقة البيانات المسجلة على النظام")


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
                                        هذه الواجهة مخصصة لإضافة متابعة دقة البيانات المسجلة على النظام
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
                        <div class="card-title">أولاً: معلومات عامة</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered"
                                   style="text-align:right;white-space:normal;">
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">الرقم المرجعي:</td>
                                    <td>{{$item->accuracy_form_id}}</td>
                                    <td style="font-weight:bold;word-break: normal;">الاسم رباعي:</td>
                                    <td>{{$item->first_name." ".$item->father_name." ".$item->grandfather_name." ".$item->last_name}}</td>
                                    <td style="font-weight:bold;word-break: normal;">رقم الهوية:</td>
                                    <td>{{$item->id_number}}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">المحافظة:</td>
                                    <td>{{$item->governorate}}</td>
                                    <td style="font-weight:bold;word-break: normal;">رقم التواصل (1):</td>
                                    <td>{{$item->mobile}}</td>
                                    <td style="font-weight:bold;word-break: normal;">رقم التواصل (2):</td>
                                    <td>@if($item->mobile2){{$item->mobile2}}@else{{'-'}}@endif</td>
                                </tr>
                                <tr>

                                    <td style="font-weight:bold;word-break: normal;">فئة مقدم الاقتراح /الشكوى:</td>
                                    <td>{{$item->project_accuracy_id == 1 ? 'غير مستفيد' : ' مستفيد'}}</td>
                                    <td style="font-weight:bold;word-break: normal;">رمز المشروع:</td>
                                    <td>{{$item->code}}</td>
                                    <td style="font-weight:bold;word-break: normal;">اسم المشروع:</td>
                                    <td style="width: 350px;word-break: break-word;">{{$item->name}}</td>

                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">حالة المشروع:</td>
                                    <td>{{$item->end_date <= now() ?  'منتهي' : 'مستمر'}}</td>
                                    <td style="font-weight:bold;word-break: normal;">منسق المشروع:</td>
                                    <td>{{$item->project_coordinator}}</td>
                                    <td style="font-weight:bold;word-break: normal;">ممثل المتابعة والتقييم:</td>
                                    <td>{{$item->project_followup}}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;word-break: normal;">حالة التقدم باقتراح/شكوى:</td>
                                    <td>
                                        @if($item->progress_status == 1)
                                            {{'اقتراح'}}
                                        @elseif($item->progress_status == 1)
                                            {{'شكوى'}}
                                        @else
                                            {{'لا يوجد'}}
                                        @endif
                                    </td>
                                    <td style="font-weight:bold;word-break: normal;">حالة المتابعة:</td>
                                    <td>
                                        @if($item->status)
                                            {{'تمت'}}
                                        @else
                                            {{'لم تتم'}}
                                        @endif
                                    </td>
                                    <td style="font-weight:bold;word-break: normal;">تاريخ المتابعة:</td>
                                    <td>
                                        @if($item->datee)
                                            {{$item->datee}}
                                        @else
                                            {{'_'}}
                                        @endif
                                    </td>
                                </tr>
                            </table>
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
                        <div class="card-title">ثانياً: قياس مدى دقة بيانات الاقتراحات والشكاوى المسجلة على النظام</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/account/system/store_accuracy_system" autocomplete="off">
                        @csrf
                            <input type="hidden" value="{{$item->accuracy_form_id}}" name="id">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" style="text-align:right;white-space:normal;">
                                    <thead>
                                    <tr>
                                        <th style="word-break: normal;">#</th>
                                        <th style="word-break: normal;">البند</th>
                                        <th style="word-break: normal;">البيانات المسجلة على النظام</th>
                                        <th style="word-break: normal;">مدى مطابقته للبيانات المسجلة على النظام</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>1.</td>
                                        <td>حالة التقدم باقتراح/شكوى: </td>
                                        <td>{{$item->form_type_name}}</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question1') ? " form-error" : "")}}" name="question1" id="question1">
                                                <option value="">اختر</option>
                                                <option {{ old('question1') == 1 ? "selected" : "" }} value="1">مطابق</option>
                                                <option {{ old('question1') == 2 ? "selected" : "" }} value="2">غير مطابق</option>
                                            </select>

                                            {!! $errors->first('question1', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div style="display: none;" id="question1_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">الرجاء التوضيح:</label>
                                                        <input style="width: 75%;" type="text" class="col-sm-9 form-control {{($errors->first('question1_note') ? " form-error" : "")}}" value="{{ old('question1_note')}}" name="question1_note" id="question1_note_input" />
                                                        {!! $errors->first('question1_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td>قناة استقبال الاقتراح/الشكوى:</td>
                                        <td>{{$item->sent_type_name}}</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question2') ? " form-error" : "")}}" name="question2" id="question2">
                                                <option value="">اختر</option>
                                                <option {{ old('question2') == 1 ? "selected" : "" }} value="1">مطابق</option>
                                                <option {{ old('question2') == 2 ? "selected" : "" }} value="2">غير مطابق</option>
                                            </select>
                                            {!! $errors->first('question2', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question2_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-6" style="font-weight: bold;color: red;text-align: right">ما هي القناة التي قمت من خلالها تقديم الاقتراح/الشكوى؟</label>
                                                        <select style="width: 50%" class="form-control  {{($errors->first('question2_note') ? " form-error" : "")}}" name="question2_note">
                                                            <option value="">اختر</option>
                                                            @foreach($sent_types as $sent_type)
                                                                <option value="{{$sent_type->id}}" {{ old('question2_note') == $sent_type->id ? "selected" : "" }} >{{$sent_type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('question2_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3.</td>
                                        <td>موضوع الاقتراح/الشكوى:</td>
                                        <td>{{$item->content}}</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question3') ? " form-error" : "")}}" name="question3" id="question3">
                                                <option value="">اختر</option>
                                                <option {{ old('question3') == 1 ? "selected" : "" }} value="1">مطابق بشكل كلي</option>
                                                <option {{ old('question3') == 2 ? "selected" : "" }} value="2">مطابق بشكل جزئي</option>
                                                <option {{ old('question3') == 3 ? "selected" : "" }} value="3">غير مطابق</option>
                                            </select>

                                            {!! $errors->first('question3', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question3_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">ما هو موضوع اقتراحك/شكوتك؟</label>
                                                        <input style="width: 75%;" type="text" class="col-sm-9 form-control {{($errors->first('question3_note') ? " form-error" : "")}}" value="{{ old('question3_note')}}" name="question3_note" id="question3_note_input" />
                                                        {!! $errors->first('question3_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>حالة تبليغ الرد: </td>

                                        @if($item->form_follow_id && $item->form_follow_solve == 2)
                                            <td style="max-width: 100px;word-break: normal;"> لم يتم التبليغ</td>
                                        @elseif($item->form_follow_id && $item->form_follow_solve == 1)
                                            <td style="max-width: 100px;word-break: normal;"> تم التبليغ</td>
                                        @else
                                            <td style="max-width: 100px;word-break: normal;"> قيد التبليغ</td>

                                        @endif
                                        <td>
                                            <select class="form-control {{($errors->first('question4') ? " form-error" : "")}}" name="question4" id="question4">
                                                <option value="">اختر</option>
                                                <option {{ old('question4') == 1 ? "selected" : "" }} value="1">مطابق</option>
                                                <option {{ old('question4') == 2 ? "selected" : "" }} value="2">غير مطابق</option>
                                            </select>
                                            {!! $errors->first('question4', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question4_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">الرجاء التوضيح:</label>
                                                        <input style="width: 75%;" type="text" class="col-sm-9 form-control {{($errors->first('question4_note') ? " form-error" : "")}}" value="{{ old('question4_note')}}" name="question4_note" id="question4_note_input" />
                                                        {!! $errors->first('question4_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5.</td>
                                        <td>تاريخ تبليغ الرد:</td>
                                        <td>{{$item->follow_datee}}</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question5') ? " form-error" : "")}}" name="question5" id="question5">
                                                <option value="">اختر</option>
                                                <option {{ old('question5') == 1 ? "selected" : "" }} value="1">مطابق</option>
                                                <option {{ old('question5') == 2 ? "selected" : "" }} value="2">غير مطابق</option>
                                            </select>
                                            {!! $errors->first('question5', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question5_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">ما هو التاريخ الذي تلقيت فيه الرد؟</label>
                                                        <input style="width: 75%;" type="date" class="col-sm-9 form-control {{($errors->first('question5_note') ? " form-error" : "")}}" value="{{ old('question5_note')}}" name="question5_note" id="question5_note_input" />
                                                        {!! $errors->first('question5_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6.</td>
                                        <td>الرد النهائي على الاقتراح/الشكوى:</td>
                                        <td>{{$item->response}}</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question6') ? " form-error" : "")}}" name="question6" id="question6">
                                                <option value="">اختر</option>
                                                <option {{ old('question6') == 1 ? "selected" : "" }} value="1">مطابق بشكل كلي</option>
                                                <option {{ old('question6') == 2 ? "selected" : "" }} value="2">مطابق بشكل جزئي</option>
                                                <option {{ old('question6') == 3 ? "selected" : "" }} value="3">غير مطابق</option>
                                            </select>
                                            {!! $errors->first('question6', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question6_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-3" style="font-weight: bold;color: red;text-align: right">ما هو الرد الذي تلقيته على اقتراحك/شكوتك؟</label>
                                                        <input style="width: 75%;" type="date" class="col-sm-9 form-control {{($errors->first('question6_note') ? " form-error" : "")}}" value="{{ old('question6_note')}}" name="question6_note" id="question6_note_input" />
                                                        {!! $errors->first('question6_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7.</td>
                                        <td>التغذية الراجعة:</td>
                                        @if($item->form_follow_id &&  $item->form_follow_evaluate)
                                            @if($item->form_follow_evaluate == 1)
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل كبير</td>
                                            @elseif($item->form_follow_evaluate==2)
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل متوسط</td>
                                            @elseif($item->form_follow_evaluate == 3)
                                                <td style="max-width: 100px;word-break: normal;"> راضي بشكل ضعيف</td>
                                            @else
                                                <td style="max-width: 100px;word-break: normal;"> غير راضي عن الرد</td>
                                            @endif
                                        @else
                                            <td style="max-width: 100px;word-break: normal;">لا يوجد رد</td>
                                        @endif
                                        <td>
                                            <select class="form-control {{($errors->first('question7') ? " form-error" : "")}}" name="question7" id="question7">
                                                <option value="">اختر</option>
                                                <option {{ old('question7') == 1 ? "selected" : "" }} value="1">مطابق</option>
                                                <option {{ old('question7') == 2 ? "selected" : "" }} value="2">غير مطابق</option>
                                            </select>
                                            {!! $errors->first('question7', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div  style="display: none;" id="question7_note">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label col-sm-6" style="font-weight: bold;color: red;text-align: right">ما هي القناة التي قمت من خلالها تقديم الاقتراح/الشكوى؟</label>
                                                        <select style="width: 50%" class="form-control  {{($errors->first('question7_note') ? " form-error" : "")}}" name="question7_note">
                                                            <option value="">التغذية الراجعة</option>
                                                            <option value="4">غير راضي عن الرد</option>
                                                            <option value="3">راضي بشكل ضعيف</option>
                                                            <option value="2">راضي بشكل متوسط</option>
                                                            <option value="1">راضي بشكل كبير</option>
                                                        </select>
                                                        {!! $errors->first('question7_note', '<p class="help-block" style="color:red;">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>8.</td>
                                        <td colspan="2">هل يوجد لديك أي اقتراح/شكوى تود التحدث عنها لإدارة المشروع؟</td>
                                        <td>
                                            <select class="form-control {{($errors->first('question8') ? " form-error" : "")}}" name="question8" id="question8">
                                                <option value="">اختر</option>
                                                <option {{ old('question8') == 1 ? "selected" : "" }} value="1">نعم</option>
                                                <option {{ old('question8') == 2 ? "selected" : "" }} value="2">لا</option>
                                            </select>
                                            {!! $errors->first('question8', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>9.</td>
                                        <td colspan="3">
                                            <div style="text-align: right;font-weight: bold;margin-bottom: 20px;">ملاحظات ذات علاقة:</div>
                                            <div>
                                                <textarea class="form-control {{($errors->first('question9') ? " form-error" : "")}}" rows="2" name="question9" id="question9">{{ old('question9') }}</textarea>
                                                {!! $errors->first('question9', '<p class="help-block" style="color:red;">:message</p>') !!}
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 col-sm-offset-9" style="text-align: left;">
                                    <input type="submit" class="btn btn-success" value="حفظ"/>
                                    <a href="/account/project" class="btn btn-light">إلغاء الأمر</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $("#question2").prop('disabled', 'disabled');
            $("#question3").prop('disabled', 'disabled');
            $("#question4").prop('disabled', 'disabled');
            $("#question5").prop('disabled', 'disabled');
            $("#question6").prop('disabled', 'disabled');
            $("#question7").prop('disabled', 'disabled');
            $("#question8").prop('disabled', 'disabled');

            $("#question1").on('change', function(){
                if ($('#question1').val() == 2) {
                    $('#question1_note').show();
                    $("#question2").prop('disabled', 'disabled');
                    $("#question3").prop('disabled', 'disabled');
                    $("#question4").prop('disabled', 'disabled');
                    $("#question5").prop('disabled', 'disabled');
                    $("#question6").prop('disabled', 'disabled');
                    $("#question7").prop('disabled', 'disabled');
                    $("#question8").prop('disabled', '');
                } else {
                    $('#question1_note').hide();
                    $("#question2").prop('disabled', '');
                }
            });

            $("#question2").on('change', function(){
                if ($('#question2').val() == 2) {
                    $('#question2_note').show();
                } else {
                    $('#question2_note').hide();
                }

                $("#question3").prop('disabled', '');
            });

            $("#question3").on('change', function(){
                if ($('#question3').val() == 1) {
                    $('#question3_note').show();
                } else {
                    $('#question3_note').hide();
                }

                $("#question4").prop('disabled', '');
            });

            $("#question4").on('change', function(){
                if ($('#question4').val() == 2) {
                    $('#question4_note').show();
                    $("#question5").prop('disabled', 'disabled');
                    $("#question8").prop('disabled', '');
                } else {
                    $('#question4_note').hide();
                    $("#question5").prop('disabled', '');
                }
            });

            $("#question5").on('change', function(){
                if ($('#question5').val() == 2) {
                    $('#question5_note').show();
                } else {
                    $('#question5_note').hide();
                }
                $("#question6").prop('disabled', '');
            });

            $("#question6").on('change', function(){
                if ($('#question6').val() == 1) {
                    $('#question6_note').show();
                } else {
                    $('#question6_note').hide();
                }
                $("#question7").prop('disabled', '');
            });

            $("#question7").on('change', function(){
                if ($('#question7').val() == 2) {
                    $('#question7_note').show();
                } else {
                    $('#question7_note').hide();
                }
                $("#question8").prop('disabled', '');
            });



            $("#question8").on('change', function(){
                if ($('#question8').val() == 1){
                    window.open('https://maancomplaints.com/citizen/editorcreatcitizen?project_id={{$item->project_id}}&id_number={{$item->id_number}}&citizen_id=0&type=1&sent_type=4', '_blank');
                }
            });

        });
    </script>
@endsection

