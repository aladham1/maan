@extends("layouts._account_layout")

@section("title", "إدارة المستويات الإدارية")
@section('content')
    <div class="row">

        <div class="col-sm-9 col-md-8">
            <h4>هذه الواجهة مخصصة للتحكم في إدارة المستويات الإدارية</h4>
	</div>

        @if(check_permission('إضافة مستوى إداري جديد'))
        <div class="col-sm-3 col-md-4" style="text-align: center;">
               <a class="btn btn-success" href="/account/circle/create">
                   <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>إضافة مستوي إداري جديد </a>
        </div>
        @endif
    </div>
    <br>
    <br>
    <span id="mybody">
          <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
            <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                بحث متقدم
                 </button>
          </div>
        <div class="row">
              <form autocomplete="off">
                  <br>
                <div class="form-group adv-searchh" style="margin-right: 10px;margin-bottom: 10px;">
                    <select class="form-control" name="circles" style="width: 270px;">
                        <option value="">المستوى الإداري</option>
                        @foreach($allcircles as $circle)
                            <option value="{{$circle->id}}"
                                    @if(request('circles')== $circle->id)selected @endif>{{$circle->name}}</option>
                        @endforeach
                     </select>
              </div>
                    <div class="col-sm-12 adv-searchh"><br></div>

                    <div class="col-sm-3 adv-searchh" style="float:left;">
                        <button type="submit" name="theaction" title="بحث"  value="search"
                                class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث
                        </button>
                    </div>
             </form>
        </div>
        <br>
        <br>
        <div class="mt-3"></div>

         @if($items)
            @if($items->count()>0)
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                         <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">عدد الموظفين</th>
                        <th width="32%">التفاصيل ذات العلاقة بالمستوى الإداري</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($items as $a)
                        <tr>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{count($a->account)}}</td>

                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            @if(check_permission('تبويب الموظفين'))
                            <a class="btn btn-xs btn-info" href="/account/account?circles={{$a->id}}&theaction=search"> الموظفين</a>
                            @endif

                            @if(check_permission('تبويب فئات الاقتراحات والشكاوى'))
                            <a class="btn btn-xs btn-info" href="/account/circle/select-category/{{$a->id}}"> فئات الاقتراحات والشكاوى</a>
                            @endif

                            @if(check_permission('تعديل مستوى إداري'))
                                <a class="btn btn-xs btn-primary" title="تعديل" href="/account/circle/{{$a->id}}/edit"><i
                                            class="fa fa-edit"></i></a>
                            @endif

                            @if(check_permission('تبويب صلاحيات المستوى الإداري'))

                                <a class="btn btn-xs btn-info" title="الصلاحيات"
                                   href="/account/circle/permission/{{$a->id}}"><i
                                        class="fa fa-lock"></i></a>
                            @endif

                            @if(check_permission('حذف مستوى إداري'))

                                @if($a->id != 1 && $a->category->toArray() == null)
                                    <a class="btn btn-xs Confirm btn-danger" title="حذف" href="/account/circle/delete/{{$a->id}}"><i
                                                class="fa fa-trash"></i></a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </span>
<br>
        <div style="float:left" >{{$items->links()}} </div>
        <br> <br><br>
    @else
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif
        @else
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">عدد الموظفين</th>
                    <th width="32%">التفاصيل ذات العلاقة بالمستوى الإداري</th>
                </tr>
                </thead>
            </table>
        @endif
@endsection
@section("js")
        <script>
            $('.adv-searchh').hide();
            $('.adv-search-btnn').click(function(){
                $('.adv-searchh').slideToggle("fast");
            });
        </script>
@endsection
