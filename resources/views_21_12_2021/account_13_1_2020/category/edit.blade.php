@extends("layouts._account_layout")

@section("title", "تعديل فئة اقتراح/شكوى")


@section("content")

<div class="row">

        <div class="col-sm-9 col-md-8"><h4>هذه الواجهة مخصصة للتحكم في تعديل فئات الاقتراحات والشكاوى والمستويات الإدارية في التعامل معها</h4>
	</div>

    </div>
    <br>
    <br>
    
    <div class="row" id="app">
        <div class="col-md-6">
            <form action="/account/category/{{$item['id']}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>تعديل اسم الفئة الفرعية</label>
                    <input type="text" class="form-control" placeholder="تعديل اسم الفئة الفرعية" name="name" value="">
                </div>
                <div  class="form-group">
                       <label>اسم الفئة الرئيسية</label>

	                <select name="category_name" class="form-control">
	                    <option value="" >اسم الفئة الرئيسية</option>
	                    <option value="0" >1</option>
	                    <option value="1">2</option>                   
	       		</select>
                </div>
                <div  class="form-group">
                        <label>نوع الفئة</label>

	                <select name="" class="form-control">
	                    <option value="" >نوع الفئة</option>
	                    <option value="0" >اقتراح</option>
	                    <option value="1">شكوى</option>                   
	       		</select>
                </div>
                <br>
                <label class="col-form-label" style="font-weight:600;">فئة مقدم الاقتراح/الشكوى</label>
                <br><br>
                <div class="form-check">
                    <input class="form-check-input" name="benefic_show" type="hidden" value="0">
                    <input class="form-check-input" type="checkbox" id="benefic_show" name="benefic_show"
                           v-model="benefic_show">
                    <label class="form-check-label" for="citizen_show">
			مستفيد من مشاريع المركز
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="citizen_show" type="hidden" value="0">
                    <input class="form-check-input" type="checkbox" id="citizen_show" name="citizen_show"
                           v-model="citizen_show">
                    <label class="form-check-label" for="citizen_show">
                        غير مستفيد من مشاريع المركز
                    </label>
                </div>
                
                <!--<div class="form-group">
                    <label>الاسم</label>
                    <input type="text" class="form-control" placeholder="الاسم" name="name" value="{{$item['name']}}">
                </div>


                <label>الفئات الرئيسية </label>
                @if($item->is_complaint == 1)
                    <div  class="form-group">
                        <select   class="form-control"  class="col-md-12"  name="main_category_id">
                            @foreach($maimCategories as $category)
                                <option value="{{$category->id}}" {{$item->main_category_id ==$category->id ? 'selected' : ''}}  >  {{$category->name}} </option>
                        @endforeach
                    </div>
                @else
                    <div  class="form-group">
                        <select    class="form-control"  class="col-md-12"  name="main_category_id">
                            @foreach($maimSuggest as $category)
                                <option value="{{$category->id}}" {{$item->main_suggest_id ==$category->id ? 'selected' : ''}}  >  {{$category->name}} </option>
                        @endforeach
                    </div>
                @endif

                <div class="form-check">
                    <input class="form-check-input" name="citizen_show" type="hidden" value="0">
                    <input class="form-check-input" type="checkbox" id="citizen_show" name="citizen_show"
                           v-model="citizen_show">
                    <label class="form-check-label" for="citizen_show">
                        ظهور لغير المستفيد
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="benefic_show" type="hidden" value="0">
                    <input class="form-check-input" type="checkbox" id="benefic_show" name="benefic_show"
                           v-model="benefic_show">
                    <label class="form-check-label" for="citizen_show">
                        ظهور للمستفيد
                    </label>
                </div>
                <div v-if="citizen_show">
                    <div v-cloak class="form-group">
                        <label for="code">رسالة تأكيد الإرسال لغير المستفيد</label>
                        <textarea class="form-control" id="details" name="citizen_msg">
                    {{$item['citizen_msg']}}
                </textarea>
                    </div>
                    <div class="form-group">
                        <label>اقصى مدة للرد على غير المستفيد</label>
                        <input type="number" class="form-control" placeholder="المدة" name="citizen_wait" value="{{$item['citizen_wait']}}">
                    </div>
                </div>
                <div v-if="benefic_show">
                    <div v-cloak class="form-group">
                        <label for="code">رسالة تأكيد الإرسال للمستفيد</label>
                        <textarea class="form-control" id="details" name="benefic_msg">
                    {{$item['benefic_msg']}}
                </textarea>
                    </div>
                    <div class="form-group">
                        <label>اقصى مدة للرد على المستفيد</label>
                        <input type="number" class="form-control" placeholder="المدة" name="benefic_wait" value="{{$item['benefic_wait']}}">
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-success" value="تعديل">
                    <a type="button" href="/account/category" class="btn default">إلغاء</a>
                </div>-->
            </form>
        </div>
    </div>
    <br>
    <div class="form-check">
	   <input id="editLevelCheck" type="checkbox" name="editLevel" value="editLevel"  onclick="editLevel()">
	   <label for="editLevel" style="vertical-align: middle;">تعديل المستويات الإدارية المختصة في التعامل مع هذه الفئة</label>
   </div>
       <br>

   <div class="mt-3"></div>
        <div class="table-responsive" id="editLevelTable"  style="display:none;">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;word-break: normal;">الفئة الرئيسية</th>
                    <th style="max-width: 100px;word-break: normal;">الفئة الفرعية</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الإجراء</th>
                    <th style="max-width: 100px;word-break: normal;">موظف الاستقبال</th>
                    <th style="max-width: 100px;word-break: normal;">طاقم مشروع ميداني</th>
                    <th style="max-width: 100px;word-break: normal;">منسق مشروع</th>
                    <th style="max-width: 100px;word-break: normal;">ممثل متابعة وتقييم</th>
                    <th style="max-width: 100px;word-break: normal;">مدير برنامج</th>
                    <th style="max-width: 100px;word-break: normal;">مدير برامج</th>
                    <th style="max-width: 100px;word-break: normal;">إدارة المركز</th>
                    <th style="max-width: 100px;word-break: normal;">مختص/ة العنف المبنى على النوع الاجتماعي</th>
                    <th style="max-width: 100px;word-break: normal;">مختص/ة حماية الطفولة</th>
                    <th style="max-width: 100px;word-break: normal;">مجلس الإدارة</th>
                    <th style="max-width: 100px;word-break: normal;">مدير النظام</th>

                </tr>
                </thead>
                <tbody>
                <tr>
	                <td  colspan="1" rowspan="4" scope="col" style="word-break: normal;">الشكاوى المتعلقة بطلب الحصول على معلومات</td>
	                <td  colspan="1" rowspan="4" scope="col" style="word-break: normal;">الاستهداف/ اختيار المستفيدين غير عادل</td>
	                <td style="max-width: 100px;word-break: normal;">تسجيل الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                
                </tr>
                 <tr>
	                <td style="word-break: normal;">جهة مختصة بمعالجة الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	              
                <tr>
	                <td style="word-break: normal;">جهة مسؤولة عن تبليغ الرد (موظف اتصال)</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	               
                </tr>
                <tr>
	                <td style="word-break: normal;">جهة إدارية مسؤولة عن متابعة معالجة الاقتراح/الشكوى</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	                <td>2</td>
	                <td>1</td>
	               
                </tr>
                </tbody>
        </table>
</div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                benefic_show: JSON.parse(' {{$item['benefic_show']}}'),
                citizen_show: JSON.parse('{{$item['citizen_show']}}'),
            },
        });
        
    function editLevel() {
	  // Get the checkbox
	  var checkBox = document.getElementById("editLevelCheck");
	  // Get the output text
	  var text = document.getElementById("editLevelTable");
	
	  // If the checkbox is checked, display the output text
	  if (checkBox.checked == true){
	    text.style.display = "block";
	  } else {
	    text.style.display = "none";
	  }
	}
    </script>
@endsection
