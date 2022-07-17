<div class="col-md-12" style="float: left;margin-left:8px">
<?php if($paginator->hasPages()): ?>
    <ul class="pagination" role="navigation">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->getFromJson('pagination.previous'); ?>">
                <span class="page-link" aria-hidden="true">&lsaquo;&lsaquo;</span>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->getFromJson('pagination.previous'); ?>">&lsaquo;&lsaquo;</a>
            </li>
        <?php endif; ?>

        <?php
        $start = $paginator->currentPage() - 2; // show 3 pagination links before current
        $end = $paginator->currentPage() + 2; // show 3 pagination links after current
        if($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        }
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
        ?>










        <?php for($i = $start; $i <= $end; $i++): ?>
            <li class="page-item <?php echo e(($paginator->currentPage() == $i) ? ' active' : ''); ?>">
                <a class="page-link" href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>










        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->getFromJson('pagination.next'); ?>">&rsaquo;&rsaquo;</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->getFromJson('pagination.next'); ?>">
                <span class="page-link" aria-hidden="true">&rsaquo;&rsaquo;</span>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

</div>