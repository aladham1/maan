@extends("layouts._account_layout")

@section("title", "توزيع النماذج حسب المشاريع ")
@section('css')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

    </style>
@endsection
@section('content')
    <div class="form-group row">
        <form>
            <div class="col-sm-12"><br></div>
            <div class="col-sm-1" style="    width: 81px;margin-top: 11px"> طريقة الفرز</div>
            <div class="col-sm-2">
                <select name="read" class="form-control">
                    <option value="">المقروءة والغير مقروءة</option>
                    <option {{request('read')=="1"?"selected":""}} value="1">المقروءة</option>
                    <option {{request('read')=="2"?"selected":""}} value="2">الغير مقروءة</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="status" class="form-control">
                    <option value="">جميع حالات الطلب</option>
                    @foreach($form_status as $fstatus)
                        <option {{request('status')==$fstatus->id?"selected":""}} value="{{$fstatus->id}}">{{$fstatus->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <select name="type" class="form-control">
                    <option value="">جميع أنواع الطلب</option>
                    @foreach($form_type as $ftype)
                        <option {{request('type')==$ftype->id?"selected":""}} value="{{$ftype->id}}">{{$ftype->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <select name="sent_type" class="form-control">
                    <option value="">جميع طرق الإرسال</option>
                    @foreach($sent_typee as $sent_type)
                        <option {{request('sent_type')==$sent_type->id?"selected":""}} value="{{$sent_type->id}}">{{$sent_type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12"><br></div>
            <div class="col-sm-1"  style="    width: 81px;margin-top: 11px">طريقة الفرز</div>
            <div class="col-sm-2">
                <select name="evaluate" class="form-control">

                    <option value="">المقيمة والغير مقيمة</option>
                    <option {{request('evaluate')=="1"?"selected":""}} value="1">المقيمة</option>
                    <option {{request('evaluate')=="2"?"selected":""}} value="2">المقيمة بنعم</option>
                    <option {{request('evaluate')=="3"?"selected":""}} value="3">المقيمة بلا</option>
                    <option {{request('evaluate')=="4"?"selected":""}} value="4">الغير مقيمة</option>
                </select>
            </div>
            @if($type==1)
                <div class="col-sm-2">
                    <select name="category_id" class="form-control">
                        <option value="" selected>جميع الفئات</option>
                        @foreach($categories as $category)
                            @if($category->id != 1)
                                <option
                                        @if(request('category_id')===''.$category->id)selected
                                        @endif
                                        value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col-sm-12"><br></div>
            <div class="col-sm-1" style="    width: 81px;margin-top: 11px"> تاريخ محدد</div>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="datee" value="{{request('datee')}}"
                       placeholder="تاريخ النموذج"/>
            </div>

            <div class="col-sm-1" style="    width: 20px;margin-top: 11px"><label>من</label></div>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="from_date" value="{{request('from_date')}}"
                       placeholder="من تاريخ"/>
            </div>
            <div class="col-sm-1" style="    width: 20px;margin-top: 11px"> إلى</div>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="to_date" value="{{request('to_date')}}"
                       placeholder="إلى تاريخ"/>
            </div>
            <div class="col-sm-4">
                <button type="submit" name="theaction" title ="بحث" style="width:70px;" value="search" class="btn btn-primary "/>
                بحث
                </button>
            </div>
        </form>
    </div>
    <div id="chartdiv"></div>
@endsection
@section('js')
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        // Themes begin
        am4core.useTheme(am4themes_dataviz);
        am4core.useTheme(am4themes_animated);

        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);

        // Add data
        var mydata=JSON.parse('{!! $projects !!}');
        mydata = $.grep( mydata, function(e){
            return e.forms_count != 0;
        });
        chart.data = mydata;
        /*[{
            "name": "USA",
            "citizens_count": 2025
        }, {
            "name": "China",
            "citizens_count": 1882
        },];*/

        // Create axes

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());

        categoryAxis.dataFields.category = "name";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
            if (target.dataItem && target.dataItem.index & 2 == 2) {
                return dy + 25;
            }
            return dy;
        });

        var  valueAxis= chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "forms_count";
        series.dataFields.categoryX = "name";
        series.name = "Forms_count";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;
        // Enable export
        chart.exporting.menu = new am4core.ExportMenu();
    </script>
@endsection