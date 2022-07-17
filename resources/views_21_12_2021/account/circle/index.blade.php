@extends("layouts._account_layout")

@section("title", "إدارة المستويات الإدارية")
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
هذه الواجهة مخصصة للتحكم في إدارة المستويات الإدارية        
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
    <div id="mybody">
    <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
            <div class="card-body">
              <form autocomplete="off">
                <div class="row">
                    <div class="col-md-4 col-4">
                      <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                        <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            بحث متقدم
                        </button>
                      </div>
                    </div>
                </div>
        <div class="row">
                <div class="col-sm-3 form-group adv-searchh">
                    <select class="form-control" name="circles" style="margin-left: 10px;">
                        <option value="">المستوى الإداري</option>
                        @foreach($allcircles as $circle)
                            <option value="{{$circle->id}}"
                                    @if(request('circles')== $circle->id)selected @endif>{{$circle->name}}</option>
                        @endforeach
                     </select>
              </div>
            <div class="col-sm-2 adv-searchh">
                <button type="submit" name="theaction" title="بحث"  value="search"
                        class="btn btn-primary adv-searchh" style="width:110px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                </button>
            </div>
        </div>
        </form>
        <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
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

                        <td style="max-width: 350px;text-align: right;">
                            @if(check_permission('تبويب الموظفين'))
                            <a class="btn btn-xs btn-success" href="/account/account?circles={{$a->id}}&theaction=search"> الموظفين</a>
                            @endif

                            @if(check_permission('تبويب فئات الاقتراحات والشكاوى'))
                            <a class="btn btn-xs btn-success" href="/account/circle/select-category/{{$a->id}}"> فئات الاقتراحات والشكاوى</a>
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
        <div style="float:left" >{{$items->links()}} </div>
    @else
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif
        @else
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
            </table>
        </div>
        @endif
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection
@section("js")
        <script>
            $('.adv-searchh').hide();
            $('.adv-search-btnn').click(function(){
                $('.adv-searchh').slideToggle("fast");
            });
        </script>
@endsection
