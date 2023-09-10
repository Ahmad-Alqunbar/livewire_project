@if ($paginator->hasPages())
<nav aria-label="Page navigation example">

    <ul class="pagination">    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="page-item"><a class="page-link" >Prev</a></li>
    @else
    <li class="page-item" ><a class="page-link"wire:click="previousPage">Prev</a></li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item"><a class="page-link"wire:click="gotoPage({{$page}})">{{$page}}</a></li>
        @else
        <li class="page-item"><a class="page-link"wire:click="gotoPage({{$page}})">{{$page}}</a></li>
        @endif
        @endforeach
        @endif

    @endforeach
    <!-- end numbers -->
    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" wire:click="nextPage">Next</a></li>
    @else
    <li class="page-item"><a class="page-link">Next</a></li>
    @endif
    <!-- next end -->
</ul>
</nav>
@endif
