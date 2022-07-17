@extends("layouts._account_layout")

@section("title", "تعريف حساب موظف جديد ")


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
هذه الواجهة مخصصة لتعريف حساب موظف جديد في النظام
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
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات حساب الموظف الجديد</div>
                </div>
                <div class="card-body">
    <form method="post" enctype="multipart/form-data" action="/account/account" autocomplete="off">
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
            <div class="col-sm-4">
                <label for="user_name"  class="col-form-label">اسم المستخدم</label>
                <input class="form-control {{($errors->first('user_name') ? " form-error" : "")}}" type="text" value="{{old("user_name")}}" id="user_name" name="user_name" autocomplete="off">
                <input type="hidden" value="{{old("user_name")}}" id="full_name" name="full_name">
                {!! $errors->first('user_name', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-4">
                <label for="id_number"  class="col-form-label">رقم الهوية</label>
                <input class="form-control {{($errors->first('id_number') ? " form-error" : "")}}" type="text" value="{{old("id_number")}}" id="id_number" name="id_number">
                {!! $errors->first('id_number', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


        </div>
        <div class="form-group row">

            <div class="col-sm-4">
                <label for="mobile" class="col-form-label">رقم الهاتف المحمول</label>

                <input class="form-control {{($errors->first('mobile') ? " form-error" : "")}}" type="text" placeholder="" value="{{old("mobile")}}" id="mobile" name="mobile" autocomplete="mobile">
                {!! $errors->first('mobile', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-4">
                <label for="email"  class="col-form-label">البريد الإلكتروني</label>
                <input class="form-control {{($errors->first('email') ? " form-error" : "")}}" type="email" value="{{old("email")}}" id="email" name="email">
                {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>


        </div>
        <div class="form-group row">

            <div class="col-sm-4">
                <label for="password"  class="col-form-label">كلمة المرور</label>
                <input  class="form-control {{($errors->first('password') ? " form-error" : "")}}" type="password" value="{{old("password")}}" id="password" name="password" autocomplete="password">
                {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}

            </div>

            <div class="col-sm-4">
                <label for="circle_id"  class="col-form-label">المستوى الإداري</label>

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
       <div class="form-group row" align="left">
        <div class="col-sm-12">
            <input type="submit" class="btn btn-success" value="إضافة" />
            <a href="/account/account" class="btn btn-light">إلغاء الأمر</a>
        </div>
    </div>
    </form>
     </div> </div> </div> </div> </div>
@endsection
