@extends("layouts._account_layout")

@section("title", "فئات الاقتراحات والشكاوى للمستوى الإداري $item->name  ")

@section("content")

    <style>
        .page-content{
            min-height:750px !important;
        }

    </style>

<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
 هذه الواجهة مخصصة للتحكم في فئات الاقتراحات والشكاوى التي يختص بالتعامل معها المستوي
                الإداري {{$item->name}}                                </h4>
                            </div>
                        </div>
          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card card-table">
        <div class="card-content">
            <div class="card-body">
<form autocomplete="off">
            <div class="row">
    <div class="col-md-4 col-4">
                        <div class="form-group filter-div" style="margin-bottom: 0px;display: inline-flex;">
                     <button type="button" class="btn btn-primary adv-search-btn adv-search-btnn" style="margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                         بحث متقدم
                 </button>
    </div>
</div>
</div>
    <div class="row"  style="margin-top:10px;">
        
            <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                <select class="form-control" name="category_id">
                    <option value="">فئة الاقتراح/الشكوى</option>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{old('category_id') ==$category->id ? 'selected' : ''}} >  {{$category->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-3 form-group adv-searchh" style="margin-bottom: 10px;">
                <select class="form-control" name="is_complaint">
                    <option value="">التصنيف (اقتراح أوشكوى )</option>
                    <option value="0">اقتراح</option>
                    <option value="1">شكوى</option>
                </select>
            </div>

            <div class="col-sm-3 adv-searchh" style="text-align:right;" align="right">
                <button type="submit" name="theaction" title="بحث" value="search"
                        class="btn btn-primary adv-searchh"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    بحث
                </button>
            </div>
        
    </div>

</form>
<div class="row" style="margin-top: 10px;">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    @if($items)
        @if($items->count()>0)
            <form method="post" action="/account/circle/select-category-post/{{$item->id}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="table-responsive" id="editLevelTable2">
                            <table style="width:170% !important;max-width:185% !important;white-space:normal;"
                                   class="table table-hover table-striped">
                                <thead>
                                <tr>

                                    <th style="max-width: 100px;word-break: normal;">#</th>
                                    <th colspan="3" style="word-break: normal;">فئة الاقتراح/الشكوى</th>
                                    <th style="max-width: 100px;word-break: normal;">التصنيف</th>
                                    <th colspan="12" style="max-width: 100px;word-break: normal;">الإجراءات المطلوبة
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td colspan="3" style="word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td colspan="2" style="word-break: normal;">الجهات المختصة بمعالجة الشكوى</td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                </tr>
                                <tr>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td colspan="3" style="max-width: 100px;word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;"></td>
                                    <td style="max-width: 100px;word-break: normal;">تحديد جميع الإجراءات</td>
                                    @foreach($procedureTypes as $procedureType)
                                        <td style="word-break: normal;"
                                            id="{{$procedureType->id}}">{{$procedureType->name}}</td>
                                    @endforeach
                                </tr>
                                <?php $i = 0?>
                                @foreach($items as $category)
                                    <?php
                                    $CategoryCircles = \App\CategoryCircles::where(['category_id'=>$category->id])->get();
                                    $Cat = array();
                                    foreach ($CategoryCircles as $CategoryCircle){
                                        array_push($Cat,$CategoryCircle->procedure_type.'_'.$CategoryCircle->circle_id);
                                    }
                                    ?>
                                    <tr>
                                        <td style="max-width: 100px;word-break: normal;">{{$i+1}}</td>
                                        <td colspan="3" style="max-width: 100px;word-break: normal;">
                                            <input type='hidden' name="category_ids[{{$i}}]"
                                                   value="{{$category->id}}" checked>
                                            {{$category->name}}
                                        </td>
                                        <td style="max-width: 100px;word-break: normal;">{{$category->is_complaint == 1 ?  ' شكوى '  : ' اقتراح '}}</td>
                                        <td style="text-align:center;max-width: 100px;word-break: normal;"><input
                                                style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                                type="checkbox" class="checkAll"/></td>
                                        @foreach($procedureTypes as $procedureType)
                                            <td style="text-align:center;max-width: 100px;word-break: normal;">
                                                <input type="checkbox" name="category_circle[]"
                                                       value="{{$procedureType->id.'_'.$item->id}}" @if(in_array($procedureType->id.'_'.$item->id,$Cat)) {{'checked'}} @endif>
                                            </td>
                                        @endforeach
                                    </tr>
                                    <?php $i++?>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group row left" style="float: left">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="حفظ"/>
                        <a href="/account/circle" class="btn btn-light">الغاء الامر</a>
                    </div>
                </div>
            </form>
        @else

            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    @else
<div class="table-responsive">
        <table style="white-space:normal;" class="table table-hover table-striped">
            <thead>
            <tr>
                <th style="max-width: 100px;word-break: normal;">#</th>
                <th colspan="2" style="max-width: 100px;word-break: normal;">فئة الاقتراح/الشكوى</th>
                <th style="max-width: 100px;word-break: normal;">التصنيف</th>
                <th colspan="12" style="max-width: 100px;word-break: normal;">الإجراءات المطلوبة</th>
            </tr>
            </thead>
        </table>
        </div>
    @endif
 </div> </div> </div> </div> </div></div> </div>
@endsection

@section('js')
    <script>
        $('.adv-searchh').hide();
        $('.adv-search-btnn').click(function () {
            $('.adv-searchh').slideToggle("fast");
        });
    </script>
    <script>
        $(".checkAll").on('change', function () {
            $(this)
                .closest('td')
                .siblings()
                .find('input[type="checkbox"]').prop('checked', this.checked);
        });

    </script>
@endsection
