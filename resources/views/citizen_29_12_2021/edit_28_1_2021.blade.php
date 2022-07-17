@extends("layouts._citizen_layout")

@section("title", "متابعة نموذج ")


@section("content")
  <div class="row">
     <h1 class="wow bounceIn" style="text-align:center;margin-top:120px;">أهلا بك عزيزي المواطن<hr class="h1-hr"></h1>
  </div><br>
  <div style="text-align:center;" class="row">
      <div class="col-sm-12">
              <h4>يمكنك مراجعة بيانتك الخاصة وتعديل رقم التواصل الخاص بك</h4>
      </div>
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
<div class="row">
    <div class="col-sm-12">
          <form method="POST" class="form-horizontal" action="/citizen/saveolde/{{$citizen['id']}}">
       @method('patch')
        @csrf
       <input type="hidden" name="type" value="{{$type}}">
       <input type="hidden" name="project_id" value="{{$project_id}}">
    <div class="row form-group">
        <div class="col-sm-5">
          <label class="control-label" for="email">  الاسم الأول: </label> 
        </div>
      <div class="col-sm-5">
        <input type="text" readonly  class="form-control" id="email" placeholder="الاسم الأول" name="first_name" 
               value="{{$citizen["first_name"]}}">
      </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
        <label class="control-label" for="email">اسم الاب:</label>
        </div>
      <div class="col-sm-5">             
        <input type="text" readonly  class="form-control" id="email" placeholder="اسم الأب"  value="{{$citizen["father_name"]}}" name="father_name">
      </div>
    </div> 
      <div class="row form-group">
          <div class="col-sm-5">
             <label class="control-label" for="email">اسم الجد :</label>

          </div>
      <div class="col-sm-5">

        <input type="text" readonly  class="form-control" id="email" placeholder="اسم الجد" value="{{$citizen["grandfather_name"]}}" name="grandfather_name">

      </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
          <label class="control-label" for="email">اسم العائلة :</label>

        </div>
      <div class="col-sm-5">

        <input type="text" readonly  class="form-control" id="email" placeholder="اسم العائلة" value="{{$citizen["last_name"]}}"  name="last_name">
      </div>
    </div>
   <!-- رقم اله-->
   <div class="row form-group">
       <div class="col-sm-5">
           <label style="font-size:16px;" class="control-label" for="email"> رقم الهوية/جواز السفر:</label>

       </div>
      <div class="col-sm-5">

        <input readonly  type="number" class="form-control" id="email" placeholder="أدخل رقم الهوية" value="{{$citizen["id_number"]}}"  name="id_number">

      </div>
    </div>
    <!--  رقم التواصل-->
    <div class="row form-group">
        <div class="col-sm-5">
          <label class="control-label" for="email"> رقم التواصل :</label>

        </div>
      <div class="col-sm-5">

          <input type="number" class="form-control" id="email" value="{{$citizen["mobile"]}}" value="{{old("mobile")}}" name="mobile">
      </div>
  </div><br>
 <!--  المحافظة-->
  <div class="row form-group">
      <div class="col-sm-5">
           <label class="control-label" for="email">المحافظة:</label>

      </div>
    <div class="col-sm-5">

      <select readonly class="form-control" id="sel1" name="governorate">
                     <option value="">اختر</option>
                    <option value="الشمال" {{($citizen['governorate']=='الشمال'||$citizen['governorate']=='شمال غزة')?"selected":""}}>الشمال</option>
                    <option value="غزة" {{$citizen['governorate']=='غزة'?"selected":""}}>غزة</option>
                    <option value="الوسطى" {{($citizen['governorate']=='دير البلح'||$citizen['governorate']=='الوسطى')?"selected":""}}>الوسطى</option>
                    <option value="خانيونس" {{($citizen['governorate']=='خان يونس'||$citizen['governorate']=='خانيونس')?"selected":""}}>خانيونس</option>
                    <option value="رفح" {{$citizen['governorate']=='رفح'?"selected":""}}>رفح</option>
               
      </select>

      </div>
  </div>
  <!--  المنظقة-->
  <div class="row form-group">
      <div class="col-sm-5">
          <label class="control-label" for="email">المنطقة:</label>

      </div>
     <div class="col-sm-5">

       <input type="text" readonly  class="form-control" id="email" value="{{$citizen["city"]}}"  placeholder="أكتب اسم المنطقة" name="city">
     </div>
      
     </div>
 <!--  العنوان -->
 <div class="row form-group">
     <div class="col-sm-5">
         <label class="control-label" for="email">العنوان:</label>

     </div>
   <div class="col-sm-5">

     <input type="text" readonly  class="form-control" id="email" value="{{$citizen["street"]}}"  placeholder="أدخل العنوان بالتفصيل" name="street">
   </div>
 </div><br>
 <!--  الانتقال لتعبئة النموج-->
<div class="form-group row" align="center">
  <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
  <div class="col-sm-12">
     <input type="submit" style="width: 30%; background-color:#BE2D45;" class="btn btn-primary wow bounceIn" value="الانتقال لتعبئة النموذج ">
  </div>
 </div>
  </form>

    </div>
</div>
</div>

<!--****************************************************** start footer **************************************************************-->
@endsection