@extends("layouts._account_layout")

@section("title", "تعديل مستوى إداري")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>هذه الواجهة مخصصة لتعديل المستويات الإدارية في النظام</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <form action="/account/circle/{{$items['id']}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group col-md-6">
                    <label>اسم المستوى الإداري</label>
                    <input type="text" class="form-control"  name="name" value="{{$items['name']}}">
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success"  style="width: 95px;" value="حفظ"/>
                        <a href="/account/circle" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
