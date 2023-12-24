<div class="col-xxl-12">
    <div class="basic-pagination wow fadeInUp text-center mt-20" data-wow-delay=".2s" >

        @if ($paginator->hasPages())

            <ul>
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span></span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class="fas fa-chevron-right"></i></a></li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="{{ $page == $paginator->currentPage() ? 'active-Page' : '' }}">
                                @if ($page == $paginator->currentPage())
                                    <span>{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-left"></i></a>
                    </li>
                @else
                    <li class="disabled"></li>
                @endif


            </ul>
        @endif

    </div>
</div>
