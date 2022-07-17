<?php $__env->startSection('css'); ?>
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
            /*max-height: 0;*/
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title", " نسيت كلمة المرور "); ?>

<?php $__env->startSection("content"); ?>
    <div class="section">
        <section class="container-fluid login-wrap">
            <div class="login-form">
                <form method="POST" action="/account/restpassord" id="restformid">
                    <?php echo csrf_field(); ?>
                    <div id="toresterror">

                    </div>
                    <span class="login-form-title"> نسيت كلمة المرور </span>
                    <div class="form-group">
                        <label class="col-form-label"> البريد
                            الإلكتروني</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="الرجاء ادخال الايميل او رقم الهاتف">
                    </div>

                    <div class="form-group button-login">
                        <input id="restform"
                           type="submit" class="btn btn-primary" value="ارسال">
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._citizen_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>