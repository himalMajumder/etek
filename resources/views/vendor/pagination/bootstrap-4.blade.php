@if ($paginator->hasPages())
<div class="pagination-area">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true"><span>&laquo;</span></li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
        <li class="disabled" aria-disabled="true"><span>&raquo;</span></li>
        @endif
    </ul>

    <div class="pagination-btn">
        {{-- Previous Button --}}
        @if ($paginator->onFirstPage())
        <a class="prev-btn theme-btn secondary-btn icon-right disabled" aria-disabled="true">
            <i class="fi-rr-arrow-left"></i>Previous
        </a>
        @else
        <a class="prev-btn theme-btn secondary-btn icon-right" href="{{ $paginator->previousPageUrl() }}">
            <i class="fi-rr-arrow-left"></i>Previous
        </a>
        @endif

        {{-- Next Button --}}
        @if ($paginator->hasMorePages())
        <a class="next-btn theme-btn secondary-btn" href="{{ $paginator->nextPageUrl() }}">
            Next<i class="fi-rr-arrow-right"></i>
        </a>
        @else
        <a class="next-btn theme-btn secondary-btn disabled" aria-disabled="true">
            Next<i class="fi-rr-arrow-right"></i>
        </a>
        @endif
    </div>
</div>
@endif