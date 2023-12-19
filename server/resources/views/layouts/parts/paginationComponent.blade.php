@if ($paginator->hasPages())
    <div class="pagination-area">
        <div class="pagination-container">
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="btn prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="bi bi-arrow-left"></i>
                        前のページへ
                    </a>
                </li>
            @endif

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="btn next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        次のページへ
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            @endif
        </div>
    </div>
@endif
