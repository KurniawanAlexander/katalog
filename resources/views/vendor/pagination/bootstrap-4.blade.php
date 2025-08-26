@if ($paginator->hasPages())
    <nav>
        <div class="row">
            {{-- Informasi jumlah data --}}
            <div class="col-sm-12 col-md-5 d-flex align-items-center mb-3 mb-md-0">
                <div class="dataTables_info" role="status" aria-live="polite">
                    Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}
                    entries
                </div>
            </div>

            {{-- Bagian Pagination --}}
            <div class="col-sm-12 col-md-7">
                <ul class="pagination justify-content-end">
                    {{-- Previous Page Link (hanya untuk layar kecil) --}}
                    <li class="page-item d-block d-md-none">
                        @if ($paginator->onFirstPage())
                            <span class="page-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                &lsaquo; Previous
                            </span>
                        @else
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">
                                &lsaquo; Previous
                            </a>
                        @endif
                    </li>

                    {{-- Pagination Elements (hanya untuk layar besar) --}}
                    <div class="d-none d-md-flex">
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

                        {{-- Link Halaman --}}
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true"><span
                                        class="page-link">{{ $element }}</span></li>
                            @endif
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
                    </div>

                    {{-- Next Page Link (hanya untuk layar kecil) --}}
                    <li class="page-item d-block d-md-none">
                        @if ($paginator->hasMorePages())
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">
                                Next &rsaquo;
                            </a>
                        @else
                            <span class="page-link disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                Next &rsaquo;
                            </span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif
