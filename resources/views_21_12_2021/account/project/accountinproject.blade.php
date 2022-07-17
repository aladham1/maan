@extends("layouts._account_layout")

@section("title", "حسابات الموظفين ضمن   $item->name $item->code ")

@section("content")
     <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
                                هذه الواجهة مخصصة للتحكم في إدارة حسابات الموظفين ضمن مشروع 
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
    <div class="col-md-12 col-12">
        <div class="card card-table">
                <div class="card-body">
    <div class="form-group">
        <button type="button" style="width:110px;" class="btn btn-primary adv-search-btnn">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            بحث متقدم
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off">
<div class="row" style="margin-bottom: 5px;">
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <select name="account_id" class="form-control">
                        <option value="" selected>اسم المستخدم</option>
                        @foreach($accounts as $account)
                            <option
                                @if(request('account_id')===''.$account->id)selected
                                @endif
                                value="{{$account->full_name}}">{{$account->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <select class="form-control" id="circles" name="circles" value="{{old('circles')}}">
                        <option value="">المستوي الاداري</option>
                        @foreach($circles as $circle)
                            <option value="{{$circle->id}}"
                                    @if(request('circles')== $circle->id)selected @endif>{{$circle->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <input type="text" class="form-control" autocomplete="mobile" name="mobile" value="{{old('mobile')}}"
                           placeholder="رقم التواصل"/>
                </div>
                <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}"
                           placeholder="البريد الإلكتروني"/>
                </div>
                </div>
	<div class="row">
                <div class="col-sm-3 col-sm-offset-9 adv-searchh" style="text-align: left;" align="left">
                    <button type="submit" name="theaction" title ="بحث"  value="search"
                            class="btn btn-primary adv-searchh">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                    </button>
                </div>

            </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top:15px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                            المستخدم
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            المستوى الاداري
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                            التواصل
                        </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            البريد الإلكتروني
                        </th>
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
                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                                        class="text-center" dir="ltr">{{$a->mobile}}</td>
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
                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                                    class="text-center" dir="ltr">{{$a->mobile}}</td>
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

            <div style="float:left">{{$items->links()}} </div>


        @else

            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم
                        المستخدم
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستوى
                        الاداري
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم
                        التواصل
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد
                        الإلكتروني
                    </th>
                    {{--
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">نوع الحساب</th> --}}
                </tr>
                </thead>
            </table>
        </div>
    @endif


    <div class="form-group row" style="margin-top:15px;" align="left">
        <div class="col-sm-12">
            <a href="/account/project" class="btn btn-success">
                <span class="glyphicon glyphicon-arrow-left"></span>
                رجوع للخلف </a>
        </div>
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
        $('.adv-search-btnn').click(function () {
            $('.adv-searchh').slideToggle("fast");
        });
    </script>
@endsection