@extends("layouts._account_layout")

@section("title", "حسابات الموظفين ضمن المشروع  $item->name $item->code ")

@section("content")
        <br>

        <div class="form-group" style="margin-left: 10px;margin-bottom: 10px;">
            <button type="button"  style="width:110px;"  class="btn btn-primary adv-search-btnn">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                بحث متقدم
            </button>
        </div>
        <div class="row">

        <div class="col-md-12">
              <form class="form-inline">

                  <div class="form-group adv-searchh" style="margin-left: 10px; margin-bottom: 10px;">
                     <input type="text" class="form-control" name="" value=""
                       placeholder=" اسم الموظف" style="width: 230px;"/>
                   </div>
                  <div class="form-group adv-searchh" style="margin-left: 10px; margin-bottom: 10px;">
               		<input type="email" class="form-control" name="" value=""
                       placeholder="البريد الالكتروني" style="width: 230px;"/>
                 </div>
                  <div class="form-group adv-searchh" style="margin-left: 10px; margin-bottom: 10px;">
               		<input type="text" class="form-control" name="" value=""
                       placeholder="رقم التواصل" style="width: 230px;"/>
                 </div>
                  <div class="form-group adv-searchh" style="margin-left: 10px; margin-bottom: 10px;">
	                <select name="" class="form-control" style="width: 230px;">
	                    <option value="" selected>المستوى الإداري</option>
	                    <option value="1"></option>
	                </select>
	            </div>
            	<button type="submit"  name="theaction"  value="search" class="btn btn-primary adv-searchh"  style="margin-top: -10px;">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>   بحث
            	</button>

             </form>
             </div>
        </div>
    <!--<div class="row">
        <form>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="q" value="{{request('q')}}"
                       placeholder="ابحث في الإسم او البريد أو الهاتف"/>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="rate">
                    <option value="">جميع الحسابات</option>
                    @foreach($account_rates as $account_rate )
                        <option value="{{$account_rate->id}}" {{request('rate')==$account_rate->id?"selected":""}}>{{$account_rate->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
            </div>
        </form>
    </div>-->
    <div class="mt-3"></div>
    @if($items->count()>0)
<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم الموظف</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى الاداري</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم التواصل</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد الالكتروني</th>
                        {{--
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">نوع الحساب</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($items as $a)
                @if($rate)
                    @if($a->account_projects->where('project_id','=',$item->id)->first()->rate==$rate)
                        <tr>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$loop->iteration}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->circle->name}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" class="text-center" dir="ltr">{{$a->mobile}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                            {{-- <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center !important;">
                                {{$a->account_projects->where('project_id','=',$item->id)->first()->account_rate->name}}
                                </td> --}}

                        </tr>
                    @endif
                @else
                    <tr>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$loop->iteration}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->circle->name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" class="text-center" dir="ltr">{{$a->mobile}}</td>
                        <td style="text-align:center !important;max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                        {{-- <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align:center !important;">
                            {{$a->account_projects->where('project_id','=',$item->id)->first()->account_rate->name}}
                        </td> --}}
                    </tr>
                @endif
            @endforeach
            </tbody>


        </table>
</div>
<br>

    <div style="float:left" >{{$items->links()}} </div>

<br> <br><br>

    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif

        <br> <br><br>
    <div class="form-group row">
        <div class="col-sm-2 col-md-offset-10">
            <a href="/account/project" class="btn btn-success">
                <span class="glyphicon glyphicon-arrow-left"></span>
                رجوع للخلف </a>
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
