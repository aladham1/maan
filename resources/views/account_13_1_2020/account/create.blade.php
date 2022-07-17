@extends("layouts._account_layout")

@section("title", "تعريف حساب موظف جديد ")


@section("content")
    <form method="post" enctype="multipart/form-data" action="/account/account">
        {{csrf_field()}}
        <div class="row">
	        <div class="col-sm-4">
		        <div style="display: inline-flex;margin-top:15px;margin-bottom:25px">
		            <div style="width: 3px;height: 20px;background-color: #BE2D45;margin-left: 5px;"></div>
				<span>هذه الحقول إجبارية</span>
			</div>

		</div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="full_name"  class="col-sm-4 col-form-label">الإسم رباعي</label>
                    <input class="form-control {{($errors->first('full_name') ? " form-error" : "")}}" type="text" value="{{old("full_name")}}" id="full_name" name="full_name">
                    {!! $errors->first('full_name', '<p class="help-block" style="color:red;">:message</p>') !!}
            </div>

            <div class="col-sm-5">
                <label for="id_number"  class="col-sm-4 col-form-label">رقم الهوية</label>
                <input class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" type="text" value="{{old("id_number")}}" id="id_number" name="id_number">
                {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="mobile"  class="col-sm-4 col-form-label"> رقم الهاتف</label>

                <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}" type="text" placeholder="يجب ان يكون رقم الهاتف 10 أرقام" value="{{old("mobile")}}" id="mobile" name="mobile">
                {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>
            <div class="col-sm-5">
                <label for="email"  class="col-sm-4 col-form-label">البريد الالكتروني</label>
                <input class="form-control {{($errors->first('email') ? " form-error" : "")}}" type="email" value="{{old("email")}}" id="email" name="email">
                {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="user_name"  class="col-sm-4 col-form-label">اسم المستخدم</label>
                <input class="form-control {{($errors->first('email') ? " form-error" : "")}}" type="text" value="{{old("user_name")}}" id="user_name" name="user_name">
                {!! $errors->first('user_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


            <div class="col-sm-5">
                <label for="password"  class="col-sm-4 col-form-label">كلمة المرور</label>
                <input class="form-control {{($errors->first('password') ? " form-error" : "")}}" type="password" value="{{old("password")}}" id="password" name="password">
                {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>




        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="circle_id"  class="col-sm-4 col-form-label">المستوى الإداري</label>

                    <select class="form-control {{($errors->first('circle_id') ? " form-error" : "")}}" name="circle_id">
                        <option value="">اختر</option>
                        @foreach($circles as $circle)
                            <option value="{{$circle -> id}}" {{old('circle_id')==$circle -> id?"selected":""}}>{{$circle -> name}}</option>
                        @endforeach
                    </select>
                {!! $errors->first('circle_id', '<p class="help-block" style="color:red;">:message</p>') !!}


            </div>

        </div>


       <br><br>
       <div class="form-group row" align="center">
        <div class="col-sm-12">
            <input type="submit" class="btn btn-success" value="اضافة" />
            <a href="/account/account" class="btn btn-light">الغاء الامر</a>
        </div>
    </div>
    </form>
@endsection

