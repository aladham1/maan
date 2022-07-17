<?php $__env->startSection("title", "إدارة إعدادات الموقع"); ?>
<?php $__env->startSection("title2"); ?>

   
   <div style="
    float: left;
    max-width: 350px;
    max-height: 100%;
    background: #BE2D45 !important;
    text-align: center;
    color: #fff;
    line-height: 2;
    font-weight: 500;
    border-radius: 10px;
    font-size: 0.85em;
    padding: 2px 8px;
    margin-bottom: 10px;
    ">
            <i class="fa fa-download" aria-hidden="true" style="margin-left: 10px;"></i>تحميل نسخة احتياطية من قاعدة البيانات
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
    <div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <div class="card-title">بيانات إعدادات الموقع</div>
                </div>
                <div class="card-body">
        <form action="/account/company/<?php echo e($item['id']); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <label class="check-label">العنوان/النصوص:</label>
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>عنوان النافذة</label>
                    <input type="text" class="form-control" placeholder="عنوان النافذة" name="title"
                           value="<?php echo e($item['title']); ?>">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label>عبارة الترحيب الرئيسية</label>
                    <input type="text" class="form-control" placeholder="عبارة الترحيب الرئيسية" name="welcom_word"
                           value="<?php echo e($item['welcom_word']); ?>">
                </div>
                </div>
               </div>
               <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>نص الترحيب الرئيسي</label>
                    <textarea rows="3" type="text" class="form-control" placeholder="نص الترحيب الرئيسي"
                              name="welcom_clouse"><?php echo e($item['welcom_clouse']); ?></textarea>
                </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>نص تقديم الشكوى</label>
                    <textarea rows="3" type="text" class="form-control" placeholder="نص تقديم الشكوى"
                              name="add_compline_clouse"><?php echo e($item['add_compline_clouse']); ?></textarea>
                </div>
                </div>
                </div>
                
                <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>نص تقديم الاقتراح</label>
                    <textarea rows="3" type="text" class="form-control" placeholder="نص تقديم الاقتراح"
                              name="add_thanks_clouse"><?php echo e($item['add_propusel_clouse']); ?></textarea>
                </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>نص متابعة الاقتراحات والشكاوى</label>
                    <textarea rows="3" type="text" class="form-control" placeholder="نص متابعة الشكوى"
                              name="follw_compline_clouse"><?php echo e($item['follw_compline_clouse']); ?></textarea>
                </div>
                </div>
                </div>






           <label class="check-label">بيانات التواصل:</label>


            <div class="row">

            <div class="col-md-4">

                <div class="form-group">
                    <label>رقم الهاتف </label>
                    <input type="text" class="form-control" placeholder="رقم الهاتف المحمول" name="mopile"
                           value="<?php echo e($item['mopile']); ?>">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label>رقم التواصل</label>
                    <input type="text" class="form-control" placeholder="رقم التواصل" name="phone"
                           value="<?php echo e($item['phone']); ?>">
                </div>
                </div>
                </div>
                <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>الرقم المجاني</label>
                    <input type="text" class="form-control" placeholder="الرقم المجاني" name="free_number"
                           value="<?php echo e($item['free_number']); ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="text" class="form-control" placeholder="البريد الإلكتروني" name="mail"
                           value="<?php echo e($item['mail']); ?>">
                </div>
            </div>
            </div>
            <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text" class="form-control" placeholder="العنوان" name="address"
                           value="<?php echo e($item['address']); ?>">
                </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>الفاكس</label>
                    <input type="text" class="form-control" placeholder="الفاكس" name="fax" value="<?php echo e($item['fax']); ?>">
                </div>
                </div>
                </div>
                <label class="check-label">رسائل تأكيد الاقتراح/ الشكوى:</label>

            <div class="row">
<div class="col-md-4">
                <div class="form-group">
                    <label>رسالة تأكيد إرسال الاقتراح</label>
                    <input type="text" class="form-control" placeholder="" name="responding_proposal_message"
                           value="<?php echo e($item['responding_proposal_message']); ?>">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label>أقصى مدة للرد على الاقتراح</label>
                    <input type="text" class="form-control" placeholder="" name="maximum_period_responding_proposal"
                           value="<?php echo e($item['maximum_period_responding_proposal']); ?>">
                </div>
                </div>
                </div>
                <div class="row">
<div class="col-md-4">
                <div class="form-group">
                    <label>رسالة تأكيد إرسال الشكوى</label>
                    <input type="text" class="form-control" placeholder="" name="responding_complaint_message"
                           value="<?php echo e($item['responding_complaint_message']); ?>">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label>أقصى مدة للرد على الشكوى</label>
                    <input type="text" class="form-control" placeholder="" name="maximum_period_responding_complaint"
                           value="<?php echo e($item['maximum_period_responding_complaint']); ?>">
                </div>
                </div>
                </div>
                                <label class="check-label">ملف الإرشادات:</label>

                <div class="row">
                    <div class="col-md-12">
                <div class="form-group">
                    
                        <a class="btn btn-primary btn-success" target="_blank" href="<?php echo e(url('uploads/'.$item->steps_file)); ?>">ملف الإرشادات العامة الحالي</a>
                  </div>  
            <div class="form-group">
                        <label>يمكنك تحديث ملف الإرشادات العامة بالضغط أدناه:</label>
                           <input class="form-control" type="file" name="steps_file" style="width: 200px;margin-left: 45px;">
                     </div>
                    </div>
                </div>
      

            <hr/>
            <div class="row">
            <div class="col-md-12">
                <div class="form-actions" style="float: left;margin-bottom: 10px;">
                    <input type="submit" class="btn btn-success" value="تعديل">
                    <a type="button" href="/account" class="btn btn-light">إلغاء الأمر</a>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>