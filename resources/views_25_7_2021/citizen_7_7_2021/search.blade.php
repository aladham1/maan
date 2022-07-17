@extends("layouts._citizen_layout")

@section("title", "متابعة الاقتراحات والشكاوى")


@section("content")
    <div class="row" style="margin-top:150px;">
        <div class="col-sm-12 text-center wow bounceIn">
            <h1 class="wow bounceIn" style="text-align:center;color:#af0922;margin-top:120px;">أهلا بك عزيزي المواطن
                <hr class="h1-hr">
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center wow bounceIn text-center">
            <h5>الرجاء تحديد نوع الطريقة التي تريد البحث من خلالها</h5>
        </div>
    </div>
    <div class="container" style="margin-bottom: 30px;">

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form class="" action="/citizen/form/getforms" method="get" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12 n">
                            <label style="text-align: right;" class="control-label col-sm-12" for="email">البحث عن
                                طريق</label>

                            <select style="text-align: center; margin-bottom:20px;"
                                    class="form-control input {{($errors->first('type') ? " form-error" : "")}}" id="id"
                                    name="type">
                                <option value="">اختر طريقة البحث</option>
                                <option class="input" value="2">رقم الهوية</option>
                                <option class="input" value="1">الرقم المرجعي للاقتراح/ الشكوى</option>
                            </select>


                            {{--            {!! $errors->first('type', '<p class="help-block" style="color:red;">:message</p>') !!}--}}

                        </div>
                    </div>
                    <div class="row">
                        <div id="body">
                            <div class="col-sm-12" id="div1">
                                <input id="sample" name="sample" style="display: none;margin-bottom:20px;"
                                       placeholder="الرجاء ادخال الرقم المرجعي للاقتراح/ الشكوى " type="text"
                                       class="form-control input {{($errors->first('sample') ? " form-error" : "")}}">
                                {{--                 {!! $errors->first('sample', '<p class="help-block" style="color:red;">:message</p>') !!}--}}

                                <input id="mo" name="id" style="display: none;margin-bottom:20px;" maxlength="9"
                                       placeholder="الرجاء ادخال الهوية " type="text"
                                       class="form-control input {{($errors->first('id') ? " form-error" : "")}}">
                                {{--                 {!! $errors->first('id', '<p class="help-block" style="color:red;">:message</p>') !!}--}}
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="help-block" style="color:red;"> {{ $error }} </p>
                        @endforeach

                    @endif
                    <script>
                        $('#id').change(function () {

                            if ($(this).val() == '1') {
                                $("#mo").css("display", "none");
                                $("#sample").css("display", "block");
                            } else if ($(this).val() == '2') {
                                $("#mo").css("display", "block");
                                $("#sample").css("display", "none");
                            } else {
                                $("#mo").css("display", "none");
                                $("#sample").css("display", "none");
                            }

                        });
                    </script>
                    <div class="form-group row" align="center">
                        <label class="col-sm-4 col-form-label form-control-label"></label>

                        <div class="col-lg-12">
                            <input type="submit" style="width: 60%; background-color:#BE2D45;"
                                   class="btn btn-primary wow bounceIn" value="التالي ">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
@endsection
