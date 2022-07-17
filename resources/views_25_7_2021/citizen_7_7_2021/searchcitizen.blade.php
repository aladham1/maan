@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")


@section("content")
    <div class="row" style="margin-top:150px;">
        <div class="col-sm-12 text-center wow bounceIn">
            <h1>رقم الهوية
                <hr class="h1-hr">
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center wow bounceIn">
            <h5>عزيزي المواطن: يرجى إدخال رقم هويتك في المكان المخصص</h5>
        </div>
    </div>
    <div class="container" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 col-lg-12  col-md-12 col-xs-12" style="margin:auto;">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <form class="" action="/citizen/getproject" method="get" autocomplete="off">
                    @csrf
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="form-group row" align="center">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="number" onfocus="this.value=''" class="form-control" id=""
                                       placeholder="أدخل رقم الهوية" maxlength="9" name="id_number" onKeyPress="if(this.value.length==9) return false;" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" align="center">
                        <label class="col-lg-1 col-form-label form-control-label"></label>
                        <div class="col-lg-12">
                            <input style="width: 100%; background-color:#BE2D45;" type="submit"
                                   class="btn btn-info wow bounceIn" value="فحص">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script>
        function submitForm(form) {
            var url = form.attr("action");
            var formData = {};
            $(form).find("input[name]").each(function (index, node) {
                formData[node.name] = node.value;
            });
            $.post(url, formData).done(function (data) {
                alert(data);
            });
        }

        // $(document).ready(function () {
        //     $("#search_number").click(function(){
        //         $.ajax({
        //             url: 'citizen/getproject',
        //             type: 'get',
        //             data: [
        //                 $('#type').val(),
        //                 $('#id_number').val(),
        //             ]
        //         })
        //     })
        // });
    </script>
    <!--****************************************************** start footer **************************************************************-->
@endsection
