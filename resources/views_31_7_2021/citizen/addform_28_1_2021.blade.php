@extends("layouts._citizen_layout")

@section("title", "اضافة نموذج ")


@section("content")
    <!--first row  -->

    <?php
    if ($type != 1 && $type != 2)  // type compaint of suggestion ...
        $type = 3;
    ?>
    <div class="row">
        <h1 style="margin-top:120px;margin-bottom:20px;text-align: center;">تقديم
            {{$form_type->find($type)->name}}<hr class="h1-hr"></h2>

    </div><br><br>
    <div style="margin-top:-50px; text-align:center;line-height: 1.8;" class="row">
        <h5 style="font-size:16px;">
            @if($type==1)
                نأسف للازعاج والمشاكل التي تم التسبب بها , الرجاء القيام بشرح المشكلة التي تواجهها , مع العلم أننا سوف
                نقوم بأخذ مشكلتك على محمل الجد وسيتم الرد عليك في أسرع وقت
            @elseif($type==2)
                أخي المواطن ، يمكنك من هناك إرسال للاقتراحات لتحسين خدماتنا ، مع العلم أنه سيتم أخذ الاقتراحات على محمل
                الجد ومراجعتها
            @else
                نفتخر بأننا كنا عند حسن ظنكم يمكنكم من خلال هذا النموذج ارسال رسائل الشكر للقائمين على خدمات المواطنين
            @endif
        </h5>
        <br>
        <h4><B>المواطن : </B>{{$citizen_name}}</h4>
        <h4><B>المشروع : </B>{{$project_name}}</h4>

    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
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
        <div class="col-sm-3"></div>
    </div>
    @if(Session::get("msg"))
        <?php
        $msg = Session::get("msg");
        $msgClass = "alert-info";
        $first2letters = strtolower(substr($msg, 0, 2));
        if ($first2letters == "s:") {
            //قص اول حرفين
            $msg = substr($msg, 2);
            $msgClass = "alert-success";
        } else if ($first2letters == "i:") {
            $msg = substr($msg, 2);
            $msgClass = "alert-info";
        } else if ($first2letters == "w:") {
            $msg = substr($msg, 2);
            $msgClass = "alert-warning";
        } else if ($first2letters == "e:") {
            $msg = substr($msg, 2);
            $msgClass = "alert-danger";
        }
        ?>
        <div class="row">
            <div class="col-sm-3"></div>

            <div class="col-sm-6">
                <div class="alert alert-danger {{$msgClass}} alert-dismissible">
                    <ul>
                        <li>{{$msg}} </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          <div class="col-sm-3"></div>

        </div>
    @endif
    </div>

        <div class="container">
            <form action="/forms/formsavenew" style="margin-left:157px;margin-left:60px;" method="POST"
                  class="form-horizontal" enctype="multipart/form-data" id="addformid"> @csrf
                <div class="col-sm-12"><br></div>
                <input type="hidden" name="project_id" value="{{$project_id}}">
                <input type="hidden" name="datee" value="<?php echo date("Y/m/d") ?>">
                <input type="hidden" name="citizen_id" value="{{$citzen_id}}">
                <input type="hidden" name="type" value="{{$type}}">
                @if($type==1)
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                          <label class="control-label">فئات الشكوى</label>

                            <select id="category" class="form-control" id="sel1" name="category_id">
                                <option value="">اختر فئة الشكوى </option>
                                @foreach($category as $cat)
                                    @if($cat->id != 1 && $cat->id != 2)
                                        @if($project_id>1)
                                            @if($cat->benefic_show==0)
                                                @continue
                                            @endif
                                            @if($cat->is_complaint != 0)
                                                <option value="{{$cat->id}}"
                                                        @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                            @endif
                                        @endif
                                        @if($project_id==1)
                                            @if($cat->citizen_show==0)
                                                @continue
                                            @endif
                                            @if($cat->is_complaint != 0)
                                                <option value="{{$cat->id}}"
                                                        @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3"></div>

                    </div>

                @else
                    <div style="margin-right:-20px;" class="form-group">
                        <input type="hidden" name="category_id" value="1">
                    </div>
                @endif
             
                <div class="row">
                    <div class="col-sm-3"></div>

                    <div class="col-sm-6">

                    <label class="control-label" for="email">موضوع {{$form_type->find($type)->name}}</label>
                    
                        <input id="title" type="text" class="form-control" value="{{old("title")}}"
                               placeholder="عنوان النموذج" name="title">
                               <br>
                               @if($type==2)
                               <select id="category" class="form-control" id="sel1" name="category_id">
                                <option value=""> اختر فئة الاقتراح</option>
                                @foreach($category as $cat)
                                    @if($cat->id != 1 && $cat->id != 2)
                                        @if($project_id>1)
                                            @if($cat->benefic_show==0)
                                                @continue
                                            @endif
                                            @if($cat->is_complaint != 1)
                                                <option value="{{$cat->id}}"
                                                        @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                            @endif
                                        @endif
                                        @if($project_id==1)
                                            @if($cat->citizen_show==0)
                                                @continue
                                            @endif
                                            @if($cat->is_complaint != 1)
                                                <option value="{{$cat->id}}"
                                                        @if(old("category_id")==$cat->id)selected @endif>{{$cat->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                            @endif
                            <br>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
                <!--  -->
                @if(auth()->user())
                
                    <div class="row">
                        <div class="col-sm-3"></div>
                    
                        <div class="col-sm-6">
                           <label class="control-label" for="email">الاستقبال</label>

                            <select class="form-control" id="sel1" name="sent_type">
                                <option value=""> اختر نوع الاستقبال</option>
                                @foreach($sent_typee as $sent_type)
                                    <option value="{{$sent_type->id}}"
                                            @if(old("content")==$sent_type->name)selected @endif>{{$sent_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3"></div>

                    </div>
                @else
                    <input type="hidden" name="sent_type" value="1">
                @endif
            
                <div class="row">
                   <div class="col-sm-3"></div>

                    <div class="col-sm-6">
                         <label class="control-label" for="email">محتوى النموذج</label>

                        <textarea id="content" placeholder="الرجاء قم بشرح طلبك في أقل من 300 كلمة" class="form-control"
                                  rows="6" id="comment" name="content">{{old("content")}}</textarea>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
              
                <!--<div class="row">
                     <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">لا مانع لدي من  مشاركة معلوماتي لدى الجهة المخولة في معالجة الشكاوي والاقتراحات (ستبقى معلوماتك سرية أثناء معالجتها)</label>
                    </div>
                    <div class="col-sm-1"></div>

                </div>-->
               
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <label class="control-label" for="email">يمكنك تحميل المرفقات:</label>

                        <input style="margin-left:-20px;" type="file" class="form-control" name="fileinput">
                    </div>
                   <div class="col-sm-3"></div>

                </div>
                <br><br>
                <div class="form-group row" align="center">
                   <div class="col-sm-3"></div>
                    <!--<label class="col-lg-1 col-form-label form-control-label"></label>-->
                    <div class="col-sm-6">
                        <input type="button" name="btn"
                               value="    إرسال {{$form_type->find($type)->name}}
                                       " id="submitBtn" data-toggle="modal" data-target="#confirm-submit"
                               style="border:0;width: 100%; background-color:#BE2D45;"
                               class="wow bounceIn btn btn-info btn-md"/>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <span style="color:#4cae4c;">&#10003;</span>
                        تأكيد إرسال نموذج
                    </div>
                    <div class="modal-body">
                        <p><B>فئة {{$form_type->find($type)->name}}: </B>
                            <span id="category2"> </span></p>
                        <p><B>عنوان {{$form_type->find($type)->name}}: </B>
                            <span id="title2"> </span></p></p>
                        <p><B>المحتوى:<p id="content2"></p> </B></p>
                        

                        <!-- We display the details entered by the user here -->
                          <p class="text-center text-justify">
                                     <b style="color:red;">تأكيد:</b>
                                     لا مانع لدي من مشاركة معلوماتي لدى الجهة المخولة في معالجة الشكاوي والاقتراحات (ستبقى معلوماتك سرية أثناء معالجتها)
                          </p>
                        <!-- We display the details entered by the user here -->

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">رجوع</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#check-submit">لا أوافق</button>
                        <button  id="submit" class="btn btn-success success">تأكيد</button>
                    </div>
                </div>
            </div>
        </div>
       <div class="modal fade" id="check-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <span style="color:#4cae4c;">&#10003;</span>
                        تأكيد إرسال نموذج
                    </div>
                    <div class="modal-body">
              

                        <!-- We display the details entered by the user here -->
                        <p class="text-center text-justify">  سوف تبقى معلوماتك سرية أثناء مراجعة النموذج ولن تظهر إلا للتواصل معك وإعطائك الرد </p>

                        <!-- We display the details entered by the user here -->

                    </div>

                    <div class="modal-footer">
                        <button href="#" id="submit" class="btn btn-default" data-dismiss="modal">حسناً</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
