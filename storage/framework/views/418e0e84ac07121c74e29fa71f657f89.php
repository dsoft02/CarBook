<div class="block-27">
    <ul>
        
        <li>
            <?php if($paginator->onFirstPage()): ?>
                <span>&lt;</span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>">&lt;</a>
            <?php endif; ?>
        </li>

        <?php
        // Calculate the total number of pages
        $totalPages = $paginator->lastPage();
        $currentPage = $paginator->currentPage();
        $visiblePages = 3; // Number of pages to show around the current page

        // Show first page
        if ($currentPage > $visiblePages + 1) {
            echo '<li><a href="' . $paginator->url(1) . '">1</a></li>';
            if ($currentPage > $visiblePages + 2) {
                echo '<li class="paginate_button"><span>...</span></li>';
            }
        }

        // Show pages before the current page
        for ($i = max(1, $currentPage - $visiblePages); $i <= min($totalPages, $currentPage + $visiblePages); $i++) {
            if ($i == $currentPage) {
                echo '<li class="active"><span>' . $i . '</span></li>';
            } else {
                echo '<li><a href="' . $paginator->url($i) . '">' . $i . '</a></li>';
            }
        }

        // Show last page
        if ($currentPage < $totalPages - $visiblePages) {
            if ($currentPage < $totalPages - $visiblePages - 1) {
                echo '<li><span>...</span></li>';
            }
            echo '<li><a href="' . $paginator->url($totalPages) . '">' . $totalPages . '</a></li>';
        }
        ?>

        
        <li>
            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>">&gt;</a>
            <?php else: ?>
                <span>&gt;</span>
            <?php endif; ?>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\carbook\resources\views/vendor/pagination/custom-pagination.blade.php ENDPATH**/ ?>