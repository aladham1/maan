@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")


@section("content")
  <div class="row">
    <h1 class="wow bounceIn" style="text-align:center;color:#af0922;margin-top:120px;">أهلا بك عزيزي المواطن</h1>
  </div><br>
  <div style="margin-top:-50px" class="row">
    <h5><B>النجمة الحمراء <B style= 'color:red;font-size: 18px'>*</B> تعني أن الحقل إلزامي</B> </h5>
      <br>
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
    
  <form style="margin-left:700px;width:500px;" method="POST" class="form-horizontal" action="/citizen/savenew">
       <input type="hidden" name="type" value="{{$type}}">
      @csrf
    <div class="form-group">
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" placeholder="الاسم الأول" name="first_name" 
               value="{{old("first_name")}}"       >
      </div>
      <label class="control-label col-sm-3" for="email">  الاسم الأول:<span style= 'color:red;font-size: 18px'>*</span> </label>
    </div>
    <div class="form-group">
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" placeholder="اسم الأب"  value="{{old("father_name")}}" name="father_name">
      </div>
      <label class="control-label col-sm-3" for="email">اسم الاب:<span style= 'color:red;font-size: 18px'>*</span> </label>
    </div> 
      <div class="form-group">
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" placeholder="اسم الجد" value="{{old("grandfather_name")}}" name="grandfather_name">
      </div>
      <label class="control-label col-sm-3" for="email">اسم الجد : <span style= 'color:red;font-size: 18px'>*</span> </label>
    </div>
    <div class="form-group">
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" placeholder="اسم العائلة" value="{{old("last_name")}}" name="last_name">
      </div>
      <label class="control-label col-sm-3" for="email">اسم العائلة :<span style= 'color:red;font-size: 18px'>*</span> </label>
    </div>
      <!-- رقم اله-->
   <div class="form-group ">
      <div class="col-sm-8">
        <input type="number" class="form-control" id="email" placeholder="أدخل رقم الهوية" value="{{$id_number}}" name="id_number">
      </div>
      <label style="font-size:16px;" class="control-label col-sm-3" for="email"> رقم الهوية/جواز السفر:<span style= 'color:red;font-size: 18px'>*</span> </label>
    </div>
    <!--  رقم التواصل-->
    <div class="form-group ">
      <div class="col-sm-8">
          <input type="number" class="form-control" id="email" placeholder="أدخل رقم الجوال" value="{{old("mobile")}}" name="mobile">
      </div>
      <label class="control-label col-sm-3" for="email"> رقم التواصل : <span style= 'color:red;font-size: 18px'>*</span></label>
  </div><br>
 <!--  المحافظة-->
  <div class="form-group">
    <div class="col-sm-8">
      <select class="form-control" id="sel1" name="governorate">
                    <option value="">اختر</option>
                    <option value="الشمال" {{old('governorate')=='الشمال'?"selected":""}}>الشمال</option>
                    <option value="غزة" {{old('governorate')=='غزة'?"selected":""}}>غزة</option>
                    <option value="الوسطى" {{old('governorate')=='الوسطى'?"selected":""}}>الوسطى</option>
                    <option value="خانيونس" {{old('governorate')=='خانيونس'?"selected":""}}>خانيونس</option>
                    <option value="رفح" {{old('governorate')=='رفح'?"selected":""}}>رفح</option>
               
      </select>
      </div>
      <label class="control-label col-sm-3" for="email">المحافظة:<span style= 'color:red;font-size: 18px'>*</span> </label>
  </div>
  <!--  المنظقة-->
  <div class="form-group">
     <div class="col-sm-8">
       <input type="text" class="form-control" id="email" value="{{old("city")}}"  placeholder="أكتب اسم المنطقة" name="city">
     </div>
       <label class="control-label col-sm-3" for="email">المنطقة:<span style= 'color:red;font-size: 18px'>*</span> </label>
     </div>
 <!--  العنوان -->
 <div class="form-group">
   <div class="col-sm-8">
     <input type="text" class="form-control" id="email" value="{{old("street")}}"  placeholder="أدخل العنوان بالتفصيل" name="street">
   </div>
   <label class="control-label col-sm-3" for="email">العنوان:<span style= 'color:red;font-size: 18px'>*</span> </label>
 </div><br>
      <input type="hidden" name="project_id" value="1">
 <!--  الانتقال لتعبئة النموج-->
<div class="form-group row" align="center">
  <label class="col-lg-1 col-form-label form-control-label"></label>
  <div class="col-lg-11">
     <input type="submit" class="btn btn-primary wow bounceIn" value="الانتقال لتعبئة النموذج ">
  </div>
 </div>
  </form>
</div>

<!--****************************************************** start footer **************************************************************-->
@endsection