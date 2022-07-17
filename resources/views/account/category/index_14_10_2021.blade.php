@extends("layouts._account_layout")

@section("title", "إدارة فئات الاقتراحات والشكاوى")

@section('content')
  <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
هذه الواجهة مخصصة للتحكم في إدارة فئات الاقتراحات والشكاوى
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
                    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 10px;">
	            <button type="button"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	                بحث متقدم
	                 </button>
		</div>
</div>
</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
              <select   class="form-control" name="main_category_id">
                  <option value="">الفئات الرئيسية</option>
                  @foreach($mainCategories as $category)
                      <option value="{{$category->id}}" {{old('main_category_id') ==$category->id ? 'selected' : ''}}  >  {{$category->name}} </option>
                  @endforeach
              </select>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
                    <select   class="form-control" name="category_id">
                        <option value="">الفئات الفرعية</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') ==$category->id ? 'selected' : ''}}  >  {{$category->name}} </option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group adv-searchh">
                <select class="form-control" name="is_complaint">
                    <option value="">نوع الفئة</option>
                    <option value="0">اقتراح</option>
                    <option value="1">شكوى</option>

                 </select>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group adv-searchh">
                    <select class="form-control" name="citizen_benefic">
                        <option value="">فئة مقدم الاقتراح/الشكوى</option>
                        <option value="0" >مستفيد</option>
                        <option value="1">غير مستفيد</option>

                     </select>
                </div>
                </div>
                </div>
                <div class="row" align="left" style="text-align:left;">
                <div class="col-sm-12 adv-searchh">
                <button type="submit"  name="theaction"  value="search" class="btn btn-primary adv-searchh" style="width:110px;">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>بحث
                      </button>
                      </div>
                      </div>

  </form>
<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                <thead>
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
                        <tr>
                            <td style="word-break: normal;">{{$a->id}}</td>
                            <td style="word-break: normal;">{{$a->is_complaint == 1 ? $a->parentCategory->name  : $a->parentSuggest->name }}</td>
                            <td style="word-break: normal;">{{$a->name}}</td>
                            <td style="max-width: 60px;word-break: normal;">{{$a->is_complaint == 1 ?  ' شكوي '  : ' اقتراح '}}</td>
                            <td style="word-break: normal;">{{$a->citizen_show == 1 ?  ' غير مستفيد من مشاريع المركز '  : ' مستفيد من مشاريع المركز '}}</td>

                            <td style="text-align:center;word-break: normal;">
                                @if(check_permission('تبويب المستويات الإدارية'))
                                <a class="btn btn-xs btn-success" href="/account/category/showcircle/{{$a->id}}">
                                        المستويات الإدارية</a>
                                @endif

                                @if(check_permission('تعديل فئة'))
                                    <a class="btn btn-xs btn-primary" title="تعديل" href="/account/category/{{$a->id}}/edit"><i
                                                class="fa fa-edit"></i></a>
                                @endif

                                @if(check_permission('حذف فئة'))
                                   <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/category/delete/{{$a->id}}"><i
                                                    class="fa fa-trash"></i></a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

            <div style="float:left">  {{$items->links()}} </div>
        @else
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 30px;word-break: normal;"># </th>
                    <th style="max-width: 100px;word-break: normal;">اسم الفئة الرئيسية</th>
                    <th style="max-width: 100px;word-break: normal;">اسم الفئة الفرعية</th>
                    <th style="max-width: 100px;word-break: normal;">نوع الفئة</th>
                    <th style="word-break: normal;">فئة مقدم الاقتراح/الشكوى</th>
                    <th style="word-break: normal;">التفاصيل ذات العلاقة بالفئة الفرعية</th>
                </tr>
                </thead>
            </table>
        </div>
    @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
@endsection
