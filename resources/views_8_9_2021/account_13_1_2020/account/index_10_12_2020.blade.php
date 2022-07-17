@extends("layouts._account_layout")

@section("title", "إدارة حسابات موظفي النظام")
@section("content")
    <span id="mybody">
            <div class="row">
                <div class="col-md-9"><h4>هذه الواجهة مخصصة للتحكم في إدارة حسابات موظفي النظام </h4> </div>
                <div class="col-md-2">
                    <a class="btn btn-success" style="width:150px" href="/account/account/create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>    إضافة مستخدم جديد   </a>
            </div>
        </div>
        <br>


        <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
            <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                بحث متقدم     
                 </button>
            {{-- <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/> --}}

        </div>
      


        <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                    {{-- <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في الإسم او المستوى الإداري" style="width: 230px;"/>
                    </div>  --}}
                  <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                        <select class="form-control" name="circles" style="width: 230px;">
                            <option value="">  المستوى الإداري</option>
                            @foreach($circles as $circle)
                            <option value="{{$circle->id}}" 
                                    @if(request('circles')== $circle->id)selected @endif>{{$circle->name}}</option>
                            @endforeach
                         </select>
                    </div>
                  <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                <select name="project_id" class="form-control" style="width: 230px;">
                    <option value="" selected>اسم المشروع </option>
                    @foreach($projects as $project)
                        <option
                                @if(request('project_id')===''.$project->id)selected
                                @endif
                                value="{{$project->id}}">{{$project->code." ".$project->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                <select name="account_id" class="form-control" style="width: 230px;">
                    <option value="" selected>اسم الموظف </option>
                    @foreach($accounts as $account)
                        <option
                                @if(request('account_id')===''.$account->id)selected
                                @endif
                                value="{{$account->full_name}}">{{$account->full_name}}</option>
                    @endforeach
                </select>
            </div>
                 
                  {{-- <div class="form-group adv-searchh" style="margin-left: 10px;margin-bottom: 10px;">
                <select name="rate_id" class="form-control" style="width: 230px;">
                    <option value="" selected>جميع الوظائف</option>
                     @foreach($account_rates as $account_rate )
                        <option value="{{$account_rate->id}}" {{request('rate_id')==$account_rate->id?"selected":""}}>{{$account_rate->name}}</option>
                    @endforeach
                </select>
            </div> --}}
            {{-- <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
                <select name="the_type" class="form-control adv-searchh" style="width: 230px;">
                    <option value="" selected>جميع الحسابات</option>
                    <option value="1" @if(request('the_type')==1)selected @endif>
                        مدراء النظام
                        </option>
                    <option value="2" @if(request('the_type')==2)selected @endif> 
                    موظفو النظام
                    </option>
                </select>
            </div> --}}

            <button type="submit"  name="theaction"  value="search" style="width:90px;margin-top:-10px" class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>     بحث    </button>

            
                 
                  
             </form>
             </div>
        </div>
        <div class="mt-3"></div>

        @if($items)

        @if($items->count()>0)
            <br/>
            <div class="table-responsive"style="width:60%">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>

                        <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم الموظف</th>
                        {{-- <th style="max-width: 200px: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد الالكتروني</th>
                        <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهاتف</th> --}}
                        <th style="max-width:100px: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                        <th style="max-width:300px: hidden;text-overflow: ellipsis;white-space: nowrap;"> التفاصيل ذات العلاقة بالحساب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $a)
                        <tr>
                            <td style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;"> {{$loop->iteration}} </td>
                        <td style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>
                        {{-- <td style="max-width: 200px: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                        <td style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;" class="text-left" dir="ltr">{{$a->mobile}}</td> --}}
                            <td style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->circle->name}}</td>

                        <td style="text-align: center; max-width: 300px: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            <a class="btn btn-xs btn-info" href="/account/account/forminaccount/{{$a->id}}">الاقتراحات/الشكاوي</a>
                            {{-- <a class="btn btn-xs btn-info" href="/account/account/formtoaccount/{{$a->id}}">ردوده</a> --}}
                            <a class="btn btn-xs btn-info"
                               href="/account/account/select-project/{{$a->id}}">المشاريع</a>
                            @if(Auth::user()->account->links->contains(\App\Link::where('title','=','تعديل حسابات')->first()->id))
                                <a class="btn btn-xs btn-info" title="الصلاحيات" href="/account/account/permission/{{$a->id}}"><i
                                            class="fa fa-lock"></i></a>
                                <a class="btn btn-xs btn-primary" title="تعديل" href="/account/account/{{$a->id}}/edit"><i
                                            class="fa fa-edit"></i></a>

                            @if($a->projects->toArray()==null && $a->id !=1 )

                                    <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفه لأنه غير عامل في أي مشروع"
                                       href="/account/account/delete/{{$a->id}}"><i
                                                class="fa fa-trash"></i></a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    
            </table>
            </div>
            <br>
      <div style="float:left" >  {{$items->links()}} </div>
        <br> <br><br>
    </span><br>

    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif


    @else 

    <table class="table table-hover table-striped" style="width:60%">
        <thead>
            <tr>
                <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>

                <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم الموظف</th>
                {{-- <th style="max-width: 200px: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد الالكتروني</th>
                <th style="max-width: 100px: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهاتف</th> --}}
                <th style="max-width:100px: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الإداري</th>
                <th style="max-width:300px: hidden;text-overflow: ellipsis;white-space: nowrap;"> التفاصيل ذات العلاقة بالحساب</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    @endif
@endsection
@section('css')
    <script src="https://unpkg.com/vue"></script>
@endsection
@section('js')
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
@endsection

