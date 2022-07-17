@extends("layouts._account_layout")

@section("title", "إدارة فئات الاقتراحات والشكاوى")

@section('content')

    <div class="row">
            <div class="col-md-8">
            <h4>هذه الواجهة مخصصة للتحكم في إدارة فئات الاقتراحات والشكاوى</h4><br>
            </div>
            <div class="col-md-4">
                <a class="btn btn-success" href="/account/category/create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>إضافة فئة اقتراح/شكوى جديدة</a>
            </div>

        </div>
        <br>
        <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
	            <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	                بحث متقدم
	                 </button>
		</div>

        <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                  <div class="col-md-3">
                    <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                      <select   class="form-control" name="main_category_id" style="width: 230px">
                          <option value="">الفئات الرئيسية</option>
                          @foreach($mainCategories as $category)
                              <option value="{{$category->id}}" {{old('main_category_id') ==$category->id ? 'selected' : ''}}  >  {{$category->name}} </option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                        <input type="text" style="width: 230px" class="form-control" name="category_id" placeholder="الفئات الفرعية" >
                    </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                        <select class="form-control" name="type" style="width: 230px">
                            <option value="">نوع الفئة</option>
                            @foreach($form_type as $ftype)
                                @if($ftype->id != 3)
                                    <option {{request('type')==$ftype->id?"selected":""}} value="{{$ftype->id}}">{{$ftype->name}}</option>
                                @endif
                            @endforeach

                         </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                            <select class="form-control" name="category_name" style="width: 230px">
                                <option value="">فئة مقدم الاقتراح/الشكوى</option>
                                <option value="0" >مستفيد</option>
                                <option value="1">غير مستفيد</option>

                             </select>
                        </div>
                  </div>
                  <div class="col-md-3 col-md-offset-9">
                      <button type="submit"  name="theaction"  value="search" style="width:70px;margin-left: 10px;margin-bottom: 10px;" class="btn btn-primary adv-searchh">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>بحث
                      </button>
                  </div>
             </form>
             </div>
        </div>
        <div class="mt-3"></div>
        <br/>
        @if($items->count()>0)
<div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <hr>

                    <tr>
                        <th style="max-width: 30px;word-break: normal;"># </th>
                        <th style="max-width: 100px;word-break: normal;">اسم الفئة الرئيسية</th>
                        <th style="max-width: 100px;word-break: normal;">اسم الفئة الفرعية</th>
                        <th style="max-width: 100px;word-break: normal;">نوع الفئة</th>
                        <th style="word-break: normal;">فئة مقدم الاقتراح/الشكوى</th>
                        <th style="word-break: normal;">التفاصيل ذات العلاقة بالفئة الفرعية</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $a)
					@if($a->id !=1 && $a->id !=2)
                        <tr>
                            <td style="word-break: normal;">{{$a->id}}</td>
                            <td style="word-break: normal;">{{$a->is_complaint == 1 ? $a->parentCategory->name  : $a->parentSuggest->name }}</td>
                            <td style="word-break: normal;"></td>
                            <td style="max-width: 60px;word-break: normal;">{{$a->is_complaint == 1 ?  ' شكوي '  : ' اقتراح '}}</td>
                            <td style="word-break: normal;">{{$a->name}}</td>

                            <td style="text-align:center;word-break: normal;">
                                @if(Auth::user()->account->links->contains(\App\Link::where('title','=','تعديل فئة')->first()->id))
                                    <a class="btn btn-xs btn-primary" title="تعديل" href="/account/category/{{$a->id}}/edit"><i
                                                class="fa fa-edit"></i></a>
                                    @if($a->id > 12)
                                        <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/category/delete/{{$a->id}}"><i
                                                    class="fa fa-trash"></i></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
					@endif
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
@endsection
@section('js')
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
@endsection
