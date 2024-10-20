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

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        @if ($page == $paginator->currentPage())
                            <span>{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach
            @endif
        @endforeach

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
