@extends("layouts._account_layout")

@section("title", "إضافة مستوى إداري جديد")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>هذه الواجهة مخصصة لتعريف المستويات الإدارية الجديدة في النظام</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <form action="/account/circle" method="post" autocomplete="off">
                @csrf
                <div class="form-group col-md-6">
                    <input type="text" class="form-control {{($errors->first('name') ? " form-error" : "")}}" placeholder="اسم المستوى الإداري" name="name" value="{{old('name')}}">
                    {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}

                </div>
<br><br><br>
                <div class="form-group row" style="margin-left:10px;float:left;">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success"  style="width: 95px;" value="إضافة"/>
                        <a href="/account/circle" class="btn btn-light">إلغاء الأمر</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
