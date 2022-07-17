@extends("layouts._account_layout")

@section("title", "صلاحيات المستوى الإداري")

@section("content")
    <style>
        .tt {
            display: inline-flex !important;
        }

        .tt li {
            padding: 10px;
        }

        .table > thead > tr > th {
            text-align: right;
        }

        .table > thead > tr {
            color: #000000 !important;
            background-color: #FFFFFF;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h4>
                هذه الواجهة مخصصة للتحكم في صلاحيات النظام التي يختص بالتعامل معها المستوي الإداري {{$item->name}}
            </h4>
        </div>
    </div>

    <form method="post" action="/account/circle/permission-post/{{$item->id}}">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 25%">البوابة الرئيسية</th>
                        <th style="width: 25%">البوابة الفرعية</th>
                        <th style="width: 50%">التبوبيات الداخلية</th>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: right"><input
                                style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                type="checkbox" class="checkAll"/>
                            <b>تحديد الكل</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $links = \DB::table("links")->where("parent_id", 0)->orderBy('order_in_menu', 'asc')->get(); ?>
                    @foreach($links as $link)
                        <tr>
                            <td style="text-align: start">
                                <label>
                                    <input class="check"
                                           {{$item->links->contains($link->id)?'checked':''}} type="checkbox"
                                           name="permission[]" value="{{$link->id}}"/> <b>{{$link->title}}</b>
                                </label>
                            </td>
                            <td colspan="2" style="text-align: start">
                                <ul class="list-unstyled">
                                    <?php
                                    $sublinks = \DB::table("links")->where("parent_id", $link->id)->get();
                                    ?>
                                    @foreach($sublinks as $sublink)

                                            <?php $inline = 0;
                                            $subsublinks = \DB::table("links")->where("parent_id", $sublink->id)->get();
                                            if (count($subsublinks) > 0)
                                                $inline = 1;
                                            ?>

                                        <li style="<?php if($inline == 1 && $sublink->id != 49) echo 'display: inline'; ?>">
                                            <label><input class="checkx"
                                                          {{$item->links->contains($sublink->id)?'checked':''}}
                                                          type="checkbox" name="permission[]"
                                                          value="{{$sublink->id}}"/> {{$sublink->title}}</label>
                                        </li>

                                        {{--                            --}}
                                        <?php
                                        $subsublinks = \DB::table("links")->where("parent_id", $sublink->id)->get();
                                        ?>
                                        @if(count($subsublinks) > 0)
                                            <li class="checkparen" style="display: inline-flex; @if(count($subsublinks) > 4)width: 615px;@endif">
                                                <ul class="list-unstyled list-inline checkchildren">
                                                    @foreach($subsublinks as $subsublink)

                                                        <li>
                                                            <label><input
                                                                          {{$item->links->contains($subsublink->id)?'checked':''}}
                                                                          type="checkbox" name="permission[]"
                                                                          value="{{$subsublink->id}}"/> {{$subsublink->title}}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                        {{--                            --}}

                                    @endforeach
                                </ul>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-5">
                <input type="submit" class="btn btn-success" value="حفظ"/>
                <a href="/account/circle" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>

@endsection


@section("js")
    <script>
        $(function () {

            $(":checkbox").click(function () {
                $(this).parent().next().find(":checkbox").prop("checked", $(this).prop("checked"));
            });

            $(".checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });

        $(".check").on('change', function () {
            $(this)
                .closest('td')
                .siblings()
                .find('input[type="checkbox"]').prop('checked', this.checked);
        });

        $(".checkx").on('change', function () {
            $(this)
                .next('li')
                .siblings()
                .children('ul.checkchildren')
                .first()
                .find('input[type="checkbox"]').prop('checked', this.checked);
        });

    </script>
@endsection
