<?php $__env->startSection("title", "اضافة نموذج "); ?>

<?php

if($type == 1){
    $formtype = 'شكواك';
    $formtype_1 = 'شكوتك';
}else{
    $formtype = 'اقتراحك';
    $formtype_1 = 'اقتراحك';
}

?>

<?php $__env->startSection("content"); ?>
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: right;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }


        .active, .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: left;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
        .table-striped>tbody>tr>td:nth-child(odd) {
    background-color: #f9f9f9;
    font-weight: 600;
}
.table-striped>tbody>tr:nth-child(odd) {
    background-color: #ffffff;
}
    </style>
<section class="container">
     <div class="row">
<div class="col-md-12">

                <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;"> لقد تم اضافة <?php echo e($formtype); ?> بنجاح</h1>
            </div>
              <div class="col-md-12">

        <div class="inner-card inner-card-border">
            <div class="inner-card-content">
                <div class="inner-card-body">
                    <div class="row pb-50">

                        <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                              <h4 class="text-bold-500 mb-25">عزيزي المواطن يمكنك متابعة <?php echo e($formtype); ?> من خلال الرقم المرجعي أو رقم الهوية عن طريق المواقع الالكتروني، تطبيق الهاتف المحمول أو التواصل مع المركز بشكل مباشر بالاتصال على الرقم المجاني 1800900901</h4>



                            </div>
                        </div>

                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-2"></div>
                    </div>
                </div>
            </div>
        </div>

            </div>

    <!--<div class="row">
        <div class="col-sm-12">
            <h1 style="margin-top:120px;margin-bottom:20px;text-align: center;">لقد تم اضافة <?php echo e($formtype); ?> بنجاح<hr class="h1-hr"></h1>
        </div>
    </div>-->
 <div class="col-md-12 col-12">
	    <div class="inner-card inner-card-user">
	<div class="inner-card-header">
	    <div class="inner-card-title"> أولاً: معلوماتك الأساسية:
</div>
	</div>
	<div class="inner-card-body">
	    <div class="row">
	        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

               <table class="table table-hover table-striped table-bordered table-responsive" style="width:100%;white-space:normal;table-layout: fixed">
                   <tr class="showdateciz">
                       <td colspan="2">الرقم المرجعي:</td>
                       <td colspan="2"><?php echo e($item->id); ?></td>
                       <td colspan="2">الاسم رباعي:</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name); ?><?php endif; ?></td>
                       <td colspan="2">رقم الهوية/جواز السفر:</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->id_number); ?><?php endif; ?></td>
                   </tr>

                   <tr class="showdateciz">
                       <td colspan="2">رقم التواصل (1):</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php if($item->mobile_private): ?><?php echo e($item->mobile_private); ?><?php else: ?><?php echo e('_'); ?><?php endif; ?> <?php else: ?><?php echo e($item->citizen->mobile); ?><?php endif; ?></td>
                       <td colspan="2">رقم التواصل (2):</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->mobile2); ?><?php endif; ?></td>
                       <td colspan="2">البريد الإلكتروني:</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php if($item->email_private): ?><?php echo e($item->email_private); ?><?php else: ?><?php echo e('_'); ?><?php endif; ?> <?php else: ?><?php echo e('_'); ?><?php endif; ?></td>
                        <td colspan="2">المحافظة:</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->governorate); ?><?php endif; ?></td>
                   </tr>

                   <tr class="showdateciz">

                       <td colspan="2">المنطقة :</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->city); ?><?php endif; ?></td>

                       <td colspan="2">العنوان:</td>
                       <td colspan="2"><?php if($item->hide_data == 2): ?><?php echo e('_'); ?><?php else: ?><?php echo e($item->citizen->street); ?><?php endif; ?></td>
                       <td colspan="2">فئة مقدم <?php echo e($form_type->find($type)->name); ?>:</td>
                       <?php
                       $project_arr = array();
                       if($item->hide_data !=2){
                           foreach ($item->citizen->projects as $project) {
                               array_push($project_arr, $project->id);
                           }
                       }


                       ?>
                       <td colspan="2"><?php if($item->project_id == 1): ?><?php echo e('غير مستفيد من مشاريع المركز'); ?><?php else: ?><?php echo e('مستفيد من مشاريع المركز '); ?><?php endif; ?></td>
                   </tr>

                   <tr>
                       <td colspan="2">رقم طلب المشروع:</td>
                       <td colspan="2"><?php if($item->hide_data !=2 && $item->project->id !=1): ?><?php echo e($item->citizen->citizen_project($item->project->id)->project_request); ?><?php else: ?> <?php echo e('_'); ?> <?php endif; ?></td>
                       <td colspan="2">رمز المشروع:</td>
                       <td colspan="2"><?php echo e($item->project->code); ?></td>
                       <td colspan="2">اسم المشروع:</td>
                       <td colspan="2"><?php echo e($item->project->name); ?></td>
                   </tr>

               </table>

</div>
</div>
</div>
</div>
</div>

           
 <div class="col-md-12 col-12">
	    <div class="inner-card inner-card-user">
	<div class="inner-card-header">
	    <div class="inner-card-title">

	                   ثانياً: تفاصيل <?php echo e($formtype_1); ?>


</div>
	</div>
	<div class="inner-card-body">
	    <div class="row">
	        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover table-striped table-bordered table-responsive" style="width:100%;white-space:normal;">
                   <tr>
                       <td class="mo" colspan="2">طريقة الاستقبال:</td>
                       <td colspan="2"><?php echo e($item->sent_typee->name); ?></td>

                       <td class="mo" colspan="2">تاريخ تقديم ال<?php echo e($form_type->find($type)->name); ?>:</td>
                       <td colspan="2"><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                       <td class="mo" colspan="2">تاريخ تسجيل ال<?php echo e($form_type->find($type)->name); ?> علي النظام:</td>
                       <td colspan="2"><?php echo e(date('d-m-Y', strtotime( $item->created_at))); ?></td>
                   </tr>

                   <tr>
                       <td class="mo" colspan="2">فئة ال<?php echo e($form_type->find($type)->name); ?>:</td>
                       <td colspan="10"><?php echo e($item->category->name); ?></td>
                   </tr>

                   <?php if($item->old_category_id): ?>
                       <tr>
                           <td class="mo" colspan="2">فئة ال<?php echo e($form_type->find($type)->name); ?> المعدلة بناءً على محتوى ال<?php echo e($form_type->find($type)->name); ?>:</td>
                           <td colspan="4"><?php echo e($item->old_category->name); ?></td>

                           <td class="mo" colspan="2">:اسم المستخدم الذي قام بالتعديل</td>
                           <td colspan="4"><?php echo e($item->user_change_category->name); ?></td>
                       </tr>

                   <?php endif; ?>

                   <tr>
                       <td class="mo" colspan="2">موضوع ال<?php echo e($form_type->find($type)->name); ?>:</td>
                       <td colspan="10"><?php echo e($item->form_type->name); ?> <?php echo e($item->title); ?></td>
                   </tr>
                   <tr>
                       <td class="mo" colspan="2">محتوى ال<?php echo e($form_type->find($type)->name); ?>:</td>
                       <td colspan="10"><?php echo e($item->content); ?></td>
                   </tr>

                   <?php if($item->reformulate_content): ?>
                       <tr>
                           <td class="mo" colspan="2">محتوى  ال<?php echo e($form_type->find($type)->name); ?> :المعدل بناءً على نتيجة الاستيضاح</td>
                           <td colspan="4"><?php echo e($item->reformulate_content); ?></td>

                           <td class="mo" colspan="2">اسم المستخدم الذي قام بالاستيضاح:</td>
                           <td colspan="4"><?php echo e($item->user_change_content->full_name); ?></td>
                       </tr>
                   <?php endif; ?>

                   <tr>
                       <td class="mo" colspan="2">المرفقات:</td>
                       <td colspan="10"><?php
                           $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

                           if(!$form_files->isEmpty()){
                           ?>
                           <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton"
                              data-target="#smallModal"
                              data-attr="<?php echo e(route('citizenshowfiles', $item->id)); ?>" title="اضغظ هنا">
                               <i class="fa fa-eye"></i>
                           </a>
                           <?php }else{?>
                           <a class="btn btn-xs btn-primary" title="لايوجد مرفقات لعرضها" disabled="disabled">
                               <i class="fa fa-eye"></i>
                           </a>
                           <?php } ?></td>
                   </tr>

               </table>
               </div>
</div>
</div>
</div>
</div>
           
       </div>

    <div class="form-group row" align="center">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <form style="display:inline"
                  action="/form/confirm/<?php echo e($item->id); ?>">
                <button type="submit" target="_blank"  title="طباعة" style="background-color:#67647E ;"
                        value="print3"
                        class="btn btn-primary" onclick="print_form();">
                    طباعة
                </button>
            </form>
            <a style="color:#fff;text-decoration:none;" href="/">
                <button class="btn btn-danger button">الرجوع إلى الصفحة الرئيسية</button>
            </a>







        </div>
        <div class="col-sm-3"></div>

    </div>

    <!--*************************************************POPuP  **********************************************************************-->
    <!--HTML  -->
</section>
    <!-- use this for popup-->
    <div id="boxes">
        <div style="top: 199.5px; left: 551.5px; display: none;color:#af0922;" id="dialog" class="window">
            <!--<img width="15%" src="<?php echo e(asset("/green.png")); ?>">-->

                 <h3 style="font-weight:600;color:#BE2D45;background-color: rgba(0,0,0,.03);">لقد تم اضافة <?php echo e($formtype); ?> بنجاح </h3>

                <h6 style="font-size:18px;color:#111;margin-top:22px;font-weight:600;"> الرقم المرجعي ل<?php echo e($formtype); ?> هو :  <b><?php echo e($form->id); ?></b></h6>
            <h6 style="font-size:18px;color:#111;font-weight:600;">يجب الاحتفاظ به لاستعماله في متابعة الرد على <?php echo e($formtype); ?>.</h6>


            <div id="lorem" style="color:black;text-align: center;" ;>

                <p style="margin-left:30px;margin-top:22px;text-align:center;font-size:18px;text-indent:25px; ">
                        سيتم مراجعة <?php echo e($formtype); ?> والرد عليك خلال
                    <?php if($form->type == 1): ?>
                        <?php echo e($itemco->maximum_period_responding_complaint); ?>

                    <?php else: ?>
                        <?php echo e($itemco->maximum_period_responding_proposal); ?>

                    <?php endif; ?>
                    يوم/أيام
                </p>
               <!-- <?php if($form->type == 1): ?>
                <p  style="font-size:16px;text-align: center;"><?php echo e($itemco->responding_complaint_message); ?></p>
                <?php else: ?>
                    <p  style="font-size:16px;text-align: center;"><?php echo e($itemco->responding_proposal_message); ?></p>
                <?php endif; ?>
                <b style="font-size:24px;color:red;text-align: center;"><?php echo e($itemco->free_number); ?></b>-->
            </div>
            <div id="popupfoot"><a href="http://webenlance.com/" class="close btn btn-primary wow bounceIn btn-style" style="float: none;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    opacity: 1;width:120px;">
                    <span>إغلاق</span></a></div>
        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height:760px; display: none; opacity: 0.8;"
             id="mask"></div>
    </div>

    <!--CSS  -->
    <style>
        #mask {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #000;
            display: none;
        }

        #boxes .window {
            position: absolute;
            left: 0;
            top: 0;
            width: 440px;
            height: 200px;
            display: none;
            z-index: 9999;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        #boxes #dialog {
            width: 450px;
            height: auto;
            padding: 0px;
            background-color: #ffffff;
            font-family: 'Segoe UI Light', sans-serif;
            font-size: 15pt;
        }

        .maintext {
            text-align: center;
            font-family: "Segoe UI", sans-serif;
            text-decoration: none;
        }

        body {
            background: url('bg.jpg');
        }

        #lorem {
            font-family: "Segoe UI", sans-serif;
            font-size: 12pt;
            text-align: left;
        }

        #popupfoot {
            font-family: "Segoe UI", sans-serif;
            font-size: 16pt;
            padding: 10px 20px;
        }

        #popupfoot a {
            text-decoration: none;
        }

        .agree:hover {
            background-color: #D1D1D1;
        }

        .popupoption:hover {
            background-color: #D1D1D1;
            color: green;
        }

        .popupoption2:hover {

            color: red;
        }


        @media  print
        {
            button[type=submit],input[type=submit],.button
            {
                display: none !important;
            }

            @page  {
                margin-top: 0;
                margin-bottom: 0;
            }
            body {
                padding-top: 72px;
                padding-bottom: 72px;
            }
        }
    </style>
    <!--java script  -->
    <!-- Modal -->

<!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="dialog" class="window">

                 <h3 style="font-weight:600;color:#BE2D45;">لقد تم اضافة <?php echo e($formtype); ?> بنجاح </h3>

                <h6 style="font-size:18px;color:#333;font-weight:500;"> الرقم المرجعي ل<?php echo e($formtype); ?> هو :  <b><?php echo e($form->id); ?></b></h6>
            <h6 style="font-size:18px;color:#333;font-weight:500;">يجب الاحتفاظ به لاستعماله في متابعة الرد على <?php echo e($formtype); ?>.</h6>

            <br>
            <div id="lorem" style="color:black;text-align: center;" ;>

                <p style="margin-left:30px;text-align:center;font-size:18px;text-indent:25px; ">
                        سيتم مراجعة <?php echo e($formtype); ?> والرد عليك خلال
                    <?php if($form->type == 1): ?>
                        <?php echo e($itemco->maximum_period_responding_complaint); ?>

                    <?php else: ?>
                        <?php echo e($itemco->maximum_period_responding_proposal); ?>

                    <?php endif; ?>
                    يوم/أيام
                </p>
                <?php if($form->type == 1): ?>
                <p  style="font-size:16px;text-align: center;"><?php echo e($itemco->responding_complaint_message); ?></p>
                <?php else: ?>
                    <p  style="font-size:16px;text-align: center;"><?php echo e($itemco->responding_proposal_message); ?></p>
                <?php endif; ?>
                <b style="font-size:24px;color:red;text-align: center;"><?php echo e($itemco->free_number); ?></b>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>-->
    <script>
        var id = '#dialog';

        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        //Set heigth and width to mask to fill up the whole screen
        $('#mask').css({'width': maskWidth, 'height': maskHeight});

        //transition effect
        $('#mask').fadeIn(500);
        $('#mask').fadeTo("slow", 0.9);

        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        $(id).css('top', winH / 2 - $(id).height() / 2);
        $(id).css('left', winW / 2 - $(id).width() / 2);

        //transition effect
        $(id).fadeIn(2000);

        //if close button is clicked
        $('.window .close').click(function (e) {
            //Cancel the link behavior
            e.preventDefault();

            $('#mask').hide();
            $('.window').hide();
        });

        //if mask is clicked
        $('#mask').click(function () {
            $(this).hide();
            $('.window').hide();
        });

    </script>
    <script>
                        var acc = document.getElementsByClassName("accordion");
                        var i;

                        for (i = 0; i < acc.length; i++) {
                            acc[i].addEventListener("click", function () {
                                this.classList.toggle("active");
                                var panel = this.nextElementSibling;
                                panel.classList.toggle("open");
                                if (panel.style.maxHeight) {
                                    panel.style.maxHeight = null;
                                } else {
                                    panel.style.maxHeight = panel.scrollHeight + "px";

                                }
                            });
                        }
                    </script>
    <script>
        function print_form(){
            $('.accordion').addClass('active');
            $('.panel').addClass('open');
            $('.panel').css('max-height','258px');
            window.print();
        }

    </script>
    <!--****************************************************** start footer ********************************************************************-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>