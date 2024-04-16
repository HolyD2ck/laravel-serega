@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">

        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">


            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
<style>
    .pagination-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .page-item {
        margin: 0 0.25rem;
    }

    .page-link {
        display: block;
        padding: 0.5rem 0.75rem;
        border-radius: 0.25rem;
        background-color: purple !important;
        color: white !important;
        text-decoration: none;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }

    .page-link:hover {
        background-color: #7851a9 !important;
        color: white !important;
    }

    .page-link:focus {
        box-shadow: 0 0 0 0.2rem rgba(120, 81, 169, 0.5);
    }

    .page-item.active.page-link {
        background-color: purple !important;
        color: white !important;
    }

    .page-item.disabled.page-link {
        background-color: purple !important;
        color: white !important;
        cursor: not-allowed;
    }

    .prev,
    .next {
        font-size: 1.25rem;
        line-height: 1;
    }

    .prev.page-link,
    .next.page-link {
        padding: 0.5rem;
    }

    .table {
        margin-bottom: 2rem;
    }
</style>
