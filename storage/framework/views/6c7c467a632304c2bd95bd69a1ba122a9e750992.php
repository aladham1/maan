












<?php if(Session::get("msg")): ?>
    <?php
        $msg = Session::get("msg");
        $msgClass = "alert-info";
        $first2letters = strtolower(substr($msg,0,2));
        if($first2letters=="s:"){
            //قص اول حرفين
            $msg=substr($msg,2); $msgClass="alert-success";
        }
        else if($first2letters=="i:"){
            $msg=substr($msg,2); $msgClass="alert-info";
        }
        else if($first2letters=="w:"){
            $msg=substr($msg,2); $msgClass="alert-warning";
        }
        else if($first2letters=="e:"){
            $msg=substr($msg,2); $msgClass="alert-danger";
        }
    ?>
    <div class="alert <?php echo e($msgClass); ?> alert-dismissible"><?php echo e($msg); ?>

        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
        <!--    <span aria-hidden="true">&times;</span>-->
        <!--</button>-->
    </div>

<?php endif; ?>
