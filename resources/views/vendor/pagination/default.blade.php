@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')"><i class="ci-arrow-left me-2"></i>Prev</a></li>
            @endif
        </ul>

        @foreach ($elements as $element)
            <ul class="pagination">
                @if (is_string($element))
                    <li class="page-item d-sm-none"><span class="page-link page-link-static">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active d-none d-sm-block" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item d-none d-sm-block"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
        @endforeach
        </ul>

        <ul class="pagination">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">Next
                        <i class="ci-arrow-right ms-2"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-disabled="true" rel="prev"
                        aria-label="@lang('pagination.next')">Next
                        <i class="ci-arrow-right ms-2"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
