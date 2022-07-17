<?php $__env->startSection("title", "صلاحيات المستوى الإداري"); ?>

<?php $__env->startSection("content"); ?>
    <style>
        .tt {
            display: inline-flex !important;
        }

        .tt li {
            padding: 10px;
        }

        .table > thead > tr > th {
            text-align: right;
        }

        .table > thead > tr {
            color: #000000 !important;
            background-color: #FFFFFF;
        }
    </style>
   <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-border">
            <div class="card-content">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column mt-1">
                            <div>
                                <h4 class="page-title text-bold-500 mb-25">
   هذه الواجهة مخصصة للتحكم في صلاحيات النظام التي يختص بالتعامل معها المستوي الإداري <?php echo e($item->name); ?></h4>
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
                    <div class="card-title">صلاحيات النظام</div>
                </div>
                <div class="card-body">

    <form method="post" action="/account/circle/permission-post/<?php echo e($item->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>البوابة الرئيسية</th>
                        <th>البوابة الفرعية</th>
                        <th>التبوبيات الداخلية</th>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: right"><input
                                style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                type="checkbox" class="checkAll"/>
                            <b>تحديد الكل</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $links = \DB::table("links")->where("parent_id", 0)->orderBy('order_in_menu', 'asc')->get();?>
                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-align: start">
                                <label>
                                    <input class="check"
                                           <?php echo e($item->links->contains($link->id)?'checked':''); ?> type="checkbox"
                                           name="permission[]" value="<?php echo e($link->id); ?>"/> <b><?php echo e($link->title); ?></b>
                                </label>
                            </td>
                            <td colspan="2" style="text-align: start">
                                <ul class="list-unstyled">
                                    <?php
                                    $sublinks = \DB::table("links")->where("parent_id", $link->id)->orderBy('order_in_menu', 'asc')->get();
                                    ?>
                                    <?php $__currentLoopData = $sublinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sublink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $inline = 0;
                                            $subsublinks = \DB::table("links")->where("parent_id", $sublink->id)->get();
                                            if (count($subsublinks) > 0)
                                                $inline = 1;
                                            ?>

                                        <li style="<?php if($inline == 1 && $sublink->id != 49) echo 'display: inline'; ?>">
                                            <label><input class="checkx"
                                                          <?php echo e($item->links->contains($sublink->id)?'checked':''); ?>

                                                          type="checkbox" name="permission[]"
                                                          value="<?php echo e($sublink->id); ?>"/> <?php echo e($sublink->title); ?></label>
                                        </li>

                                        
                                        <?php
                                        $subsublinks = \DB::table("links")->where("parent_id", $sublink->id)->get();
                                        ?>
                                        <?php if(count($subsublinks) > 0): ?>
                                            <li class="checkparen" style="margin-right: 25%;<?php if(count($subsublinks) > 4): ?><?php endif; ?>">
                                                <ul class="list-unstyled list-inline checkchildren">
                                                    <?php $__currentLoopData = $subsublinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsublink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li>
                                                            <label><input
                                                                          <?php echo e($item->links->contains($subsublink->id)?'checked':''); ?>

                                                                          type="checkbox" name="permission[]"
                                                                          value="<?php echo e($subsublink->id); ?>"/> <?php echo e($subsublink->title); ?>

                                                            </label>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                        

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>

        <div class="form-group row" style="text=align:left;" align="left">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="حفظ"/>
                <a href="/account/circle" class="btn btn-light">إلغاء الأمر</a>
            </div>
        </div>
    </form>
</div></div></div></div></div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("js"); ?>
    <script>
        $(function () {

            $(":checkbox").click(function () {
                $(this).parent().next().find(":checkbox").prop("checked", $(this).prop("checked"));
            });

            $(".checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });

        $(".check").on('change', function () {
            $(this)
                .closest('td')
                .siblings()
                .find('input[type="checkbox"]').prop('checked', this.checked);
        });


        $(".checkx").on('change', function () {

          var currentli= $(this).parent().parent();
           currentli
                .next('li')
               // .siblings()
                .children('ul.checkchildren')
                .first()
                .find('input[type="checkbox"]').prop('checked', this.checked);
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts._account_layout", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>