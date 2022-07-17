@extends("layouts._account_layout")
<?php $test = Auth::user()->account->account_projects->where('project_id', "!=", "1")->groupBy('rate')?>

@section("title", "الصفحة الرئيسية")

@section("content")
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">هذه الواجهة مخصصة لعرض المشاريع التي تقع ضمن مسؤوليتك</h4>
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
        <?php
                                    if (!Auth::guest()) {
                                        Auth::user()->account->image;
                                        if (Auth::user()->account->image == null) {
                                            $image = "http://placehold.it/300/300";
                                        } else {
                                            if (file_exists(public_path() . '/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image) && Auth::user()->account->image != null)
                                                $image = asset('/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image);
                                            else
                                                $image = "http://placehold.it/300/300";
                                        }
                                    } else
                                        $image = "http://placehold.it/300/300";
                                    ?>
                            <div class="card card-user">
                                <div class="card-header">
                                    <div class="card-title">معلومات الحساب الأساسية</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tbody>                                   <tr>
                                                    <td class="font-weight-bold">الاسم</td>
                                                    <td>{{ Auth::user()->account->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">المستوى الإداري</td>
                                                    <td>{{ Auth::user()->account->circle->name }}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tbody><tr>
                                                    <td class="font-weight-bold">البريد الالكتروني</td>
                                                    <td>{{auth()->user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">رقم التواصل</td>
                                                    <td>{{ Auth::user()->account->mobile }}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                             
                        
	


                                <!--end row-->
                                @if($items->count()>0)
                                <div class="card card-table">
                                <div class="card-header">
                                    <div class="card-title">يمكنك رؤية المشاريع التي تعمل بها من خلال الجدول أدناه</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="table-responsive">

                                        <table class="table table-striped table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                   #
                                                </th>
                                                <th>
                                                  رمز المشروع
                                                </th>
                                                <th>
                                                   اسم المشروع باللغة العربية
                                                </th>
                                                <th class="hidden-xs">
                                                  منسق المشروع
                                                </th>


                                                <th class="hidden-xs">
                                                    ممثل المتابعة والتقييم
                                                </th>
                                                <th class="hidden-xs">
                                                    مدير البرنامج
                                                </th>
                                                <th class="hidden-xs">
                                                   حالة المشروع
                                                </th>
                                                <th>
                                                    التفاصيل ذات العلاقة بالحساب
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $a)
                                                <tr>
                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                         {{$loop->iteration}}
                                                    </td>
                                                    <td class="hidden-xs"> {{$a->code}} </td>

                                                    <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        {{$a->name}}
                                                    </td>
                                                    <td class="hidden-xs"> @if($a->account_projects->where('rate','=','2')->first())
                                                        {{$a->account_projects->where('rate','=','2')->first()->account->full_name}}
                                                    @endif </td>

                                                        <td class="hidden-xs"> @if($a->account_projects->where('rate','=','4')->first())
                                                            {{$a->account_projects->where('rate','=','4')->first()->account->full_name}}
                                                        @endif </td>

                                                    <td class="hidden-xs"> @if($a->account_projects->where('rate','=','3')->first())<!-- المشرف مسبقا , ممثل المتابعة والتقييم حاليا  -->
                                                        {{$a->account_projects->where('rate','=','3')->first()->account->full_name}}
                                                        @endif </td>
                                                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                            @if($a->end_date < now() )  منتهي@else  مستمر @endif
                                                       </td>

                                                    <td>
                                                        @if(check_permission_by_id('104'))
                                                        <a class="btn btn-sm green-btn"
                                                        href="/account/project/forminproject/{{$a->id}}"> الاقتراحات والشكاوى </a>
                                                        @endif


                                                        @if($a->id != 1)
                                                                @if(check_permission('تبويب المستفيدين'))
                                                                    <a class="btn btn-sm green-btn"
                                                                       href="/account/project/citizeninproject/{{$a->id}}"> المستفيدين </a>
                                                                @endif
                                                             @else
                                                                @if(check_permission('إدارة غير مستفيدي المشاريع'))
                                                                    <a class="btn btn-sm green-btn"
                                                                       href="/notbenfit"> غير المستفيدين </a>
                                                                @endif

                                                             @endif


                                                        {{-- <a class="btn btn-sm"
                                                           href="/account/project/{{$a->id}}" style="border-color: unset;
                                                                color: #ffffff;
                                                                border: none;
                                                                background: #32c5d2!important;"> عرض </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        </div>
                                        <br>
                                        <div style="float:left">  {{$items->links()}}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                </div>
                                <!--tab-pane-->

                            @else
                                <br><br>
                                <div class="alert alert-warning">أنت غير عامل في أي من المشاريع</div>
                            @endif
                        </div>

                        <!--end tab-pane-->


@endsection
@section('js')
<script>
    $('.adv-searchh').hide();
    $('.adv-search-btnn').click(function(){
        $('.adv-searchh').slideToggle("fast");
    });
</script>
@endsection
