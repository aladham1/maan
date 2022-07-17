<?php

$form_type = \App\Form_type::where('id', $type)->first()->name;
?>
<?php $__env->startSection('css'); ?>
    <style>
        body {
            overflow-y: hidden;
            height: 75% !important;
        }

        #footer {
            bottom: 40px !important;
        }

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
            /*max-height: 0;*/
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        @media (min-width: 992px) {
            .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
                float: right;
            }
        }

        @media (min-width: 768px) {
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: right;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php
$button = "";
$text = "";
if ($type == 1) {
    $button = "انتقل لتقديم شكواك";
    $text = "شكواك";
    $type_f = "الشكوى";

} elseif ($type == 2) {
    $button = "انتقل لتقديم اقتراحك";
    $text = "اقتراحك";
    $type_f = "الاقتراح";
}
?>
<?php $__env->startSection("title", "متابعة نموذج "); ?>

<?php $__env->startSection("content"); ?>

    <section class="container-fluid" style="width: 60%;margin: 6% auto;padding: 30px 20px;border-radius: 10px;
    border: 0px solid rgba(255,255,255,0.01);height: 100%;background-color: #fff;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%) !important;position: unset;">
        <div class="row">
            <div class="col-md-12">
                <h3 class="inner-h1 page-title wow bounceIn" style="padding-right: 0px;text-align: center;">الرغبة في
                    إخفاء معلوماتك
                    الأساسية</h3>
            </div>

            <div class="col-md-12">

                <div class="inner-card inner-card-border">
                    <div class="inner-card-content">
                        <div class="inner-card-body">
                            <div class="row pb-50">
                                <div class="col-lg-12 col-12 d-flex justify-content-between flex-column mt-1">
                                    <div>
                                        <h4 class="text-bold-500 mb-25">

                                            عزيزي المواطن/ة يرجى العلم بأن نظام الاقتراحات والشكاوى الخاص بالمركز يتيح
                                            لك خيار عدم الإفصاح عن هويتك (الاسم، رقم الهوية) عند تقديمك <?php echo e($type_f); ?>


                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <form class="" action="/citizen/showdate" method="get" autocomplete="off">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="<?php echo e($type); ?>">

            <div class="form-group row">
                <div class="col-md-8">
                    <label for="hide_data" class="col-form-label">
                        هل ترغب بالإفصاح عن هويتك (الاسم، رقم الهوية)؟
                    </label>
                </div>
                <div class="col-md-4">
                    <select
                        class="form-control <?php echo e(($errors->first('hide_data') ? " form-error" : "")); ?>" name="hide_data"
                        id="private_option">
                        <option value="" selected>اختر</option>
                        <option value="1" <?php if(old('hide_data') == 1): ?> selected <?php endif; ?>>
                            نعم
                        </option>

                        <option value="2" <?php if(old('hide_data') == 2): ?> selected <?php endif; ?>>
                            لا
                        </option>

                    </select>
                </div>
                <div class="col-md-12">
                    <?php echo $errors->first('hide_data', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>

            </div>

            <div class="form-group row" style="display: none;" id="private_account_option">
                <div class="col-md-8">
                    <label for="private_contact_option" class="col-form-label">كيف ترغب بتلقي الرد على <?php echo e($text); ?>

                        ؟</label>
                </div>

                <div class="col-md-2 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_contact_option" id="inlineRadio1"
                           value="1" <?php if(old('private_contact_option') == 1): ?> checked <?php endif; ?> />
                    <label class="form-check-label" for="inlineRadio1">اتصال هاتفي</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_contact_option" id="inlineRadio2"
                           value="2" <?php if(old('private_contact_option') == 2): ?> checked <?php endif; ?> />
                    <label class="form-check-label" for="inlineRadio2">بريد إلكتروني</label>
                </div>

                <div class="col-md-12">
                    <?php echo $errors->first('private_contact_option', '<p class="help-block" style="color:red;">:message</p>'); ?>

                </div>

                <div id="mobile_private_div" style="display: none">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="mobile_private" class="col-form-label">رقم التواصل</label>
                        <input id="mobile_private"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type="number" maxlength="10"
                               class="form-control <?php echo e(($errors->first('mobile_private') ? " form-error" : "")); ?>"
                               value="<?php echo e(old("mobile_private")); ?>"
                               name="mobile_private">
                        <?php echo $errors->first('mobile_private', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>

                </div>

                <div id="email_private_div" style="display: none">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="email_private" class="col-form-label">البريد الإلكتروني</label>
                        <input id="email_private" type="text"
                               class="form-control <?php echo e(($errors->first('email_private') ? " form-error" : "")); ?>"
                               value="<?php echo e(old("email_private")); ?>"
                               name="email_private">
                        <?php echo $errors->first('email_private', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                </div>

            </div>


            <div class="form-group row  btn-check" align="center">
                <label class="col-lg-1 col-form-label form-control-label form-label"></label>
                <div class="col-lg-12">
                    <input type="submit" style="width: 25% !important;"
                           class="btn btn-primary wow bounceIn btn-style" value="<?php echo e($button); ?>">
                </div>
            </div>
        </form>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {

            var inputValue = $("#private_option").val();
            if (inputValue == 2) {
                $('#private_account_option').show();
            }

            var inputValue1 = $("input[name='private_contact_option']:checked").val();

            if (inputValue1 == 1) {
                $('#mobile_private_div').show();
                $('#email_private_div').hide();
            } else if (inputValue1 == 2) {
                $('#mobile_private_div').hide();
                $('#email_private_div').show();
            } else {
                $('#mobile_private_div').hide();
                $('#email_private_div').hide();
            }


            $('#private_option').change(function () {
                var inputValue = $("#private_option").val();
                if (inputValue == 2) {
                    $('#private_account_option').show();
                } else {
                    $('#private_account_option').hide();
                }
            });

            $("input[name='private_contact_option']").change(function () {
                var inputValue = $("input[name='private_contact_option']:checked").val();
                if (inputValue == 1) {
                    $('#mobile_private_div').show();
                    $('#email_private_div').hide();
                } else if (inputValue == 2) {
                    $('#mobile_private_div').hide();
                    $('#email_private_div').show();
                } else {
                    $('#mobile_private_div').hide();
                    $('#email_private_div').hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>