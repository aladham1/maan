@extends("layouts._account_layout")

@section("title", "تعديل فئة اقتراح/شكوى")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h4>
                هذه الواجهة مخصصة للتحكم في إضافة فئات الاقتراحات والشكاوى الجديدة والمستويات الإدارية في التعامل معها.
            </h4>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12" id="app">
            <form action="/account/suggest" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-md-2">
                                <label>اضافة فئة فرعية جديدة</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="اضافة فئة فرعية جديدة" name="name"
                                       value="{{$item->name}}">
                            </div>
                        </div>

                        <div class="col-md-12"></div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>نوع الفئة</label>
                            </div>
                            <div class="col-md-4">
                                <select name="is_complaint" class="form-control">
                                    <option value="">نوع الفئة</option>
                                    <option value="0">اقتراح</option>
                                    <option value="1">شكوى</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <br><br>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label>اسم الفئة الرئيسية </label>
                            </div>

                            <div class="col-md-4">
                                <select class="form-control" class="col-md-12" name="main_category_id">
                                    <option value="{{$item->main_category_id}}">الفئات الرئيسية</option>
                                    @foreach($mainCategories as $category)
                                        <option
                                            value="{{$category->id}}" {{old('main_category_id') ==$category->id ? 'selected' : ''}} >  {{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12"></div>
                        <br><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label>فئة مقدم الاقتراح/ الشكوى</label>
                            </div>
                            <div class="col-md-12"></div><br><br>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="citizen_show" type="hidden" value="0">
                                    <input class="form-check-input" type="checkbox" id="citizen_show"
                                           name="citizen_show" v-model="citizen_show">
                                    <label class="form-check-label" for="citizen_show">
                                        غير مستفيد من مشاريع المركز
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-12">

                                <div v-if="citizen_show">
                                    <hr>
                                    <div v-cloak class="form-group">
                                        <label for="code">رسالة تأكيد الإرسال لغير المستفيد</label>
                                        <textarea class="form-control" id="details" name="citizen_msg">
                {{old("citizen_msg")}}
            </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>اقصى مدة للرد على غير المستفيد</label>
                                        <input type="number" class="form-control" placeholder="المدة" name="citizen_wait"
                                               value=" {{old("citizen_wait")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="benefic_show" type="hidden" value="0">
                                    <input class="form-check-input" type="checkbox" id="benefic_show"
                                           name="benefic_show" v-model="benefic_show">
                                    <label class="form-check-label" for="citizen_show">

                                        مستفيد من مشاريع المركز
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-12">

                                <div v-if="benefic_show">
                                    <hr>
                                    <div v-cloak class="form-group">
                                        <label for="code">رسالة تأكيد الإرسال للمستفيد</label>
                                        <textarea class="form-control" id="details" name="benefic_msg">
                           {{old("benefic_msg")}}
                         </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>اقصى مدة للرد على المستفيد</label>
                                        <input type="number" class="form-control" placeholder="المدة" name="benefic_wait"
                                               value=" {{old("benefic_wait")}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-check">

                    <div class="col-md-12"></div>
                    <br><br>
                    <input id="editLevelCheck2" type="checkbox" name="editLevel" value="editLevel"
                           onclick="editLevel2()">
                    <label for="editLevel" style="vertical-align: middle;">اضافة المستويات الإدارية المختصة في التعامل
                        مع هذه الفئة</label>
                </div>
                <br>

                <div class="mt-3"></div>
                <div class="table-responsive" id="editLevelTable2" style="display:none;">
                    <table class="table table-hover table-striped" style="width:185% !important;max-width:185% !important;white-space:normal;">
                        <thead>
                        <tr>
                            <th>الفئة الرئيسية</th>
                            <th>الفئة الفرعية</th>
                            <th>نوع الإجراء</th>
                            <th>موظف الاستقبال</th>
                            <th>طاقم مشروع ميداني</th>
                            <th>منسق مشروع</th>
                            <th>ممثل متابعة وتقييم</th>
                            <th>مدير برنامج</th>
                            <th>مدير برامج</th>
                            <th>إدارة المركز</th>
                            <th>مختص/ة العنف المبنى على النوع الاجتماعي</th>
                            <th>مختص/ة حماية الطفولة</th>
                            <th>مجلس الإدارة</th>
                            <th>مدير النظام</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="1" rowspan="4" scope="col" style="word-break: normal;">الشكاوى المتعلقة بطلب
                                الحصول على معلومات
                            </td>
                            <td colspan="1" rowspan="4" scope="col" style="word-break: normal;">الاستهداف/ اختيار
                                المستفيدين غير عادل
                            </td>
                            <td style="max-width: 100px;word-break: normal;">تسجيل الاقتراح/الشكوى</td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td style="text-align: center"><span class="glyphicon glyphicon-ok"></span></td>

                        </tr>
                        <tr>
                            <td style="word-break: normal;">جهة مختصة بمعالجة الاقتراح/الشكوى</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        <tr>
                            <td style="word-break: normal;">جهة مسؤولة عن تبليغ الرد (موظف اتصال)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td style="word-break: normal;">جهة إدارية مسؤولة عن متابعة معالجة الاقتراح/الشكوى</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <br>
                <div class="form-actions" style="
    text-align: center;">
                    <input type="submit" class="btn btn-success" value="تعديل">
                    <a type="button" href="/account/category" class="btn btn-light">إلغاء</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                benefic_show: false,
                citizen_show: false,
            },
        });

        function editLevel2() {
            // Get the checkbox
            var checkBox = document.getElementById("editLevelCheck2");
            // Get the output text
            var text = document.getElementById("editLevelTable2");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>
@endsection
