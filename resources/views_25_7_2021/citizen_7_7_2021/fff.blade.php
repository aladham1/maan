<div class="panel-body">
    @if(in_array(2,$auth_circle_user) && is_null($item->deleting))
        <form id="delete_form_modal">
            <input type="hidden" id="deleted_id" value="{{$item->id}}">
            <div class="form-group row">
                <div class="col-sm-6 col-sm-offset-6">
                    <label for="sent_type" class="col-form-label">هل
                        ال{{$form_type->find($type)->name}} بحاجة
                        للحذف؟</label>
                    <div class="col-sm-2">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio"
                                       value="0">لا
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input"
                                       id="post-format-gallery"
                                       name="optradio" value="1"> نعم
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-sm-offset-6">
                    <p id="optradiop" class="help-block" style="color:red;"></p>
                </div>

            </div>
            <hr>
            <div class="form-group row deleted_div">
                <div class="col-sm-5">
                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ الحذف</label>
                    <input type="text" class="form-control" name="deleted_at" readonly
                           value="{{\Carbon\Carbon::now()}}">


                </div>
                <div class="col-sm-7">
                    <label for="sent_type" class="col-sm-4 col-form-label">اسم موظف الذي قام
                        بالحذف</label>
                    <input type="hidden" class="form-control" name="deleted_by"
                           value="{{Auth::user()->id}}">
                    <?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>
                    <input type="text" class="form-control" name="deleted_by_name" readonly
                           value="{{ Auth::user()->account->full_name }}">

                </div>
            </div>

            <div class="form-group row deleted_div">
                <div class="col-sm-10">
                    <label for="sent_type" class="col-sm-4 col-form-label">سبب الحذف</label>
                    <input type="text" class="form-control" id="deleting_reason"
                           placeholder="سبب الحذف">
                    <p id="deleting_reasonp" class="help-block" style="color:red;"></p>
                </div>
            </div>

            <div class="form-group row">
                <div style="float:left; margin-left: 50px;">
                    <button id="submit_delete" class="btn btn-primary nextBtn pull-right  button">
                        التالي
                    </button>

                    <button class="btn btn-primary prevBtn pull-right button">
                        السابق
                    </button>
                </div>
            </div>
        </form>

    @else
        <input type="hidden" id="deleted_id" value="{{$item->id}}">
        <div class="form-group row">
            <div class="col-sm-6 col-sm-offset-6">
                <label for="sent_type" class="col-form-label">هل
                    ال{{$form_type->find($type)->name}} بحاجة
                    للحذف؟</label>
                <div class="col-sm-2">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio"
                                   value="0"
                                   @if($item->deleting == 0){{'checked'}}@endif disabled>لا
                        </label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"
                                   id="post-format-gallery"
                                   name="optradio" value="1"
                                   @if($item->deleting == 1){{'checked'}}@endif disabled> نعم
                        </label>
                    </div>
                </div>
            </div>

        </div>

        @if(!is_null($item->need_clarification) && $item->need_clarification == 0 && $item->deleting == 0)
            <br>
            <button class="btn btn-primary nextBtn pull-right button">
                التالي
            </button>

            <button class="btn btn-primary prevBtn pull-right button">
                السابق
            </button>
        @endif
        {{--                    </form>--}}
        @if($item->deleting == 1)
            <hr>
            <div class="form-group row">
                <div class="col-sm-5">
                    <label for="sent_type" class="col-sm-4 col-form-label">تاريخ الحذف</label>
                    <input type="text" class="form-control" name="deleted_at" readonly
                           value="@if(!$item->deleted_at){{$item->confirm_deleting}}@else{{$item->deleted_at}}@endif">
                </div>
                <div class="col-sm-7">
                    <label for="sent_type" class="col-sm-4 col-form-label">اسم موظف الذي قام
                        بالحذف</label>
                    <input type="text" class="form-control" name="deleted_by_name" readonly
                           value="{{ $item->deleted_user->name }}" readonly>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="sent_type" class="col-sm-4 col-form-label">سبب الحذف</label>
                    <input type="text" class="form-control" id="deleting_reason"
                           placeholder="سبب الحذف"
                           value="{{$item->deleted_because}}" readonly>
                </div>
            </div>

            @if(in_array(5,$auth_circle_user) && $item->confirm_deleting && is_null($item->recommendations_for_deleting))
                <form id="confirm_delete_form_modal">
                    <input type="hidden" id="deleted_id" value="{{$item->id}}">
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label">هل ال{{$form_type->find($type)->name}}
                                بحاجة لحذف؟</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <div id="confirm_deleting_div" style="display: none">
                                    <h4 style="color: red">إتمام عملية الحذف</h4>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio6"
                                           value="1"> نعم
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <div id="reprocessing_deleteing_div" style="display: none">
                                    <h4>إعادة معالجة ال{{$form_type->find($type)->name}}</h4>
                                    <h4>التوصيات</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                                                <textarea class="form-control" rows="3"
                                                                          id="deleting_reprocessing_recommendations"
                                                                          name="deleting_reprocessing_recommendations"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio6"
                                           value="0"> لا
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div style="float:left; margin-left: 50px;">
                            <button id="submit_delete" class="btn btn-primary nextBtn pull-right button">
                                التالي
                            </button>

                            <button class="btn btn-primary prevBtn pull-right button">
                                السابق
                            </button>
                        </div>
                    </div>

                </form>
            @endif
        @endif
        @if($item->recommendations_for_deleting)
            <hr>
            <h4>وفيما يلي توصيات الجهة الإدارية المسؤولة بخصوص حذف {{$form_type->find($type)->name}}
                :</h4>
            <table class="table table-bordered">
                <tr>
                    <td>الجهة الإدارية المسؤولة عن متابعة الجهة المختصة
                        بمعالجة {{$form_type->find($type)->name}}:
                    </td>
                    <td>{{$item->user_recommendations_for_deleting->full_name}}</td>
                </tr>
                <tr>
                    <td>التوصيات:</td>
                    <td>{{$item->recommendations_for_deleting}}</td>
                </tr>
            </table>
        @endif

    @endif
</div>
