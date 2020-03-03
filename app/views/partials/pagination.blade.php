@if ($paginator->getLastPage() > 1)
    <div class="text-center w-100">
        <a href="{{ $paginator->getUrl(1) }}" id="page[1]"
           class="{{($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">Previous</a>
        @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
            <a href="{{ $paginator->getUrl($i) }}" id="page[{{$i}}]"
               class="{{($paginator->getCurrentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
        @endfor
        <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" id="page[{{$paginator->getCurrentPage()+1}}]"
           class="{{($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">Next</a>
    </div>
    <hr>
@endif