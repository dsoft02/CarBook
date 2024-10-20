<div class="block-27">
    <ul>
        {{-- Previous Page Link --}}
        <li>
            @if ($paginator->onFirstPage())
                <span>&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
            @endif
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

        {{-- Next Page Link --}}
        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
            @else
                <span>&gt;</span>
            @endif
        </li>
    </ul>
</div>
