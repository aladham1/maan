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
                    <input type="text" autofocus class="form-control" value="{{old("full_name")}}" id="full_name" name="full_name">
                  
            </div>

            <div class="col-sm-5">
                <label for="id_number"  class="col-sm-4 col-form-label"> رقم الهوية</label>
                
                    <input type="text" class="form-control" value="{{old("id_number")}}" id="id_number" name="id_number">
                </div>


        </div>
        <div class="form-group row">
          
            <div class="col-sm-5">
                <label for="mobile"  class="col-sm-4 col-form-label"> رقم الهاتف</label>
                
                    <input type="text" class="form-control" placeholder="يجب ان يكون رقم الهاتف 10 أرقام" value="{{old("mobile")}}" id="mobile" name="mobile">
                </div>
            <div class="col-sm-5">
                <label for="email" class="col-sm-4 col-form-label">البريد الالكتروني</label>
                    <input type="email" class="form-control" value="{{old("email")}}" id="email" name="email">
            </div>
            

        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="user_name"  class="col-sm-4 col-form-label">اسم المستخدم</label>
                    <input type="text" class="form-control" value="{{old("user_name")}}" id="user_name" name="user_name">
                </div>


            <div class="col-sm-5">
                <label for="password"  class="col-sm-4 col-form-label">كلمة المرور</label>
                    <input type="password" class="form-control" value="{{old("password")}}" id="password" name="password">
                </div>




        </div>
        <div class="form-group row">

            <div class="col-sm-5">
                <label for="circle_id"  class="col-sm-4 col-form-label">المستوى الإداري</label>
               
                    <select class="form-control" name="circle_id">
                        <option value="">اختر</option>
                        @foreach($circles as $circle)
                            <option value="{{$circle -> id}}" {{old('circle_id')==$circle -> id?"selected":""}}>{{$circle -> name}}</option>
                        @endforeach
                    </select>
            </div>
{{-- 
            <div class="col-sm-5">
             <label for="type" class="col-sm-4 col-form-label">نوع الحساب</label>
            
                <select class="form-control" name="type">
                    <option value="">اختر </option>
                    <option value="1" {{old('type')==1?"selected":""}}>مدير </option>
                    <option value="2" {{old('type')==2?"selected":""}}>موظف </option>
                </select>
            </div> --}}





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
{{-- @section('js')
<script>

$("#PalID").keyup(function()
{
	//$("#result").html($("#PalID").val());
	
	id=$("#id_number").val();
	if(id.length != 9 || isNaN(id) ){$("#result").html("Invalid ID, ID Must Be 9 Digits");}
	else 
	{
	// our ID calculation here 
	// 123456789
	var Ldigit=id%10;
		var j1=1; // division
		var j2=10; // mod
		var t1; 
		var t2 ; 
		var arr=Array();
		var arr2=Array();
	for(i=0;i<8;i++)
	{
		j1=j1*10; 
		j2=j2*10;
		
		t1=id%j2;
		t2=(t1/j1) | 0 ; 
		arr[i]=t2
				
	}
	j=7;
	for(i=0;i<8;i++)
	{
		arr2[j]=arr[i];
		j--;
	}
	odd=1;
	for(i=0;i<8;i++)
	{
		if(odd==1){	arr2[i]=arr2[i]*1; odd=2; }
		else {arr2[i]=arr2[i]*2; odd=1;}
		
		if(arr2[i]>9) // if elemenet  > 9 
		{
			temp=arr2[i].toString().split(""); // 12
			temp=Number(temp[0])+Number(temp[1]);
			arr2[i]=temp;
		}		
	}
	sub=0;
	for(i=0;i<8;i++)
	{
		sub+=arr2[i];
		
	}
	var Valid;
	Valid=sub.toString().split(""); // 38
	Valid=Valid[1];
	Valid=10-Valid; 	
	if(Ldigit==Valid){$("#result").html("<b>Valid ID<b>");}
	else {$("#result").html("INVALID ID");}
	}
})

</script>
@endsection --}}
