@extends("layouts._account_layout")
@section("title", "إدارة حسابات موظفي النظام")
@section("content")
    <div id="mybody">
        <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
                                    هذه الواجهة مخصصة للتحكم في إدارة حسابات موظفي النظام
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
     <form>
         <div class="row">
            <div class="col-md-4 col-4">
        <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
            <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                بحث متقدم
                 </button>
        </div>
</div></div>
        <div class="row">
            <div class="col-md-3">
              
                  <div class="form-group adv-searchh">
                <select name="account_id" class="form-control">
                    <option value="" selected>اسم المستخدم </option>
                    @foreach($accounts as $account)
                        <option
                            @if(request('account_id')===''.$account->id)selected
                            @endif
                            value="{{$account->full_name}}">{{$account->full_name}}</option>
                    @endforeach
                </select>
            </div>
</div>
<div class="col-md-3">
                  <div class="form-group adv-searchh">
                        <select class="form-control" name="circles">
                            <option value="">المستوى الإداري</option>
                            @foreach($circles as $circle)
                                <option value="{{$circle->id}}"
                                        @if(request('circles')== $circle->id)selected @endif>{{$circle->name}}</option>
                            @endforeach
                         </select>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group adv-searchh">
                      <select name="project_id" class="form-control">
                    <option value="" selected>اسم المشروع </option>
                    @foreach($projects as $project)
                        <option
                            @if(request('project_id')===''.$project->id)selected
                            @endif
                            value="{{$project->id}}">{{$project->code." ".$project->name}}</option>
                    @endforeach
                </select>
                  </div>
</div>
<div class="col-md-3">
                    <button type="submit" name="theaction" value="search" style="width:110px;margin-top:0px"
                    class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search"
                                                              aria-hidden="true"></span>     بحث    </button>
            
             </div>
        </div>
         </form>
<div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        @if($items)

            @if($items->count()>0)
                <div class="table-responsive" style="width:100%">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">اسم المستخدم</th>
                        <th style="max-width:100px;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                        <th style="max-width:300px;text-overflow: ellipsis;white-space: nowrap;"> التفاصيل ذات العلاقة بالحساب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $a)
                        <?php $css = ""; ?>
                        @if($a->projects->toArray()==null && $a->id !=1 )
                            <?php $css = "padding-right: 50px;"?>
                        @endif
                        <tr>
                            <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;"> {{$loop->iteration}} </td>
                        <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>
                        {{-- <td style="max-width: 200px: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                        <td style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;" class="text-left" dir="ltr">{{$a->mobile}}</td> --}}
                            <td style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">{{$a->circle->name}}</td>

                        <td style="text-align: center; <?php echo $css; ?> max-width: 300px;text-overflow: ellipsis;white-space: nowrap;">
                            @if(check_permission_by_id('107'))
                            <a class="btn btn-sm green-btn" href="/account/account/forminaccount/{{$a->id}}">الاقتراحات/الشكاوى</a>
                            @endif

                            @if(check_permission_by_id('108'))
                                <a class="btn btn-sm green-btn"
                               href="/account/account/select-project/{{$a->id}}">المشاريع</a>
                            @endif

                            @if(check_permission('تعديل بيانات المستخدم'))
                                <a class="btn btn-sm btn-primary" title="تعديل" href="/account/account/{{$a->id}}/edit"><i
                                        class="fa fa-edit"></i>
                                </a>
                            @endif

                            @if(check_permission('حذف المستخدم'))
                                <a class="btn btn-sm Confirm btn-danger" title="يمكن حذفه لأنه غير عامل في أي مشروع"
                                   href="/account/account/delete/{{$a->id}}"><i
                                        class="fa fa-trash"></i></a>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            </div>
                <div style="float:left">  {{$items->links()}}
                </div>

    @else
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif


    @else
<div class="table-responsive" style="width:100%">
        <table class="table table-hover table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">#</th>
                <th style="max-width: 100px;text-overflow: ellipsis;white-space: nowrap;">اسم المستخدم</th>
                <th style="max-width:100px;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                <th style="max-width:300px;text-overflow: ellipsis;white-space: nowrap;"> التفاصيل ذات العلاقة بالحساب
                </th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
</div>
    @endif
    </div></div></div></div></div></div></div>
@endsection
@section('css')
    <script src="https://unpkg.com/vue"></script>

@endsection
@section('js')
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {

            $('.adv-searchh').slideToggle("fast", function() {
                if ($('.adv-searchh').is(':hidden'))
                {
                    $('#searchonly').show();
                }
                else
                {
                    $('#searchonly').hide();
                }
            });
        });


    </script>
@endsection

