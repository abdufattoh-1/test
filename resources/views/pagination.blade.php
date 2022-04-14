
@if ($paginator->hasPages())
<div class="wrap_center">
    <nav aria-label="Page navigation example">
        <div class="pagination col-12 d-flex justify-content-between align-items-center tm-paging-col">
            @if($paginator->onFirstPage())
            <a href="#" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary tm-btn-next">Previous</a>
            @endif
            
            @foreach ($elements as $element)
                @if (is_string($element))
                    <a class="tm-paging-link disabled" href="#"><span></span> {{ $element }}</a>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="tm-paging-link active" href="#"><span></span> {{ $page }}</a>
                        @else
                            <a class="tm-paging-link" href="{{ $url }}"><span></span> {{ $page }}</a>
                        @endif
                    @endforeach
                @endif


            @endforeach

            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary tm-btn-next">Next Page</a>
            @else
            <a href="" class="disabled btn btn-primary tm-btn-next">Next Page</a>
            @endif
        </div>
    </nav>
</div>
@endif 