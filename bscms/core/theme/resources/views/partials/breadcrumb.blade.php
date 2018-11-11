<ul class="link-list" itemscope itemtype="http://schema.org/BreadcrumbList">
    @foreach ($crumbs as $i => $crumb)
        @if ($i != (count($crumbs) - 1))
            <li itemprop="link-list__item" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="{{ $i + 1}}" />
                <a href="{{ $crumb['url'] }}" itemprop="item" title="{{ $crumb['label'] }}" class="link-list__link">
                    {!! $crumb['label'] !!}
                    <meta itemprop="name" content="{{ $crumb['label'] }}" />
                </a>
            </li>
        @else
            <li class="link-list__item">{!! $crumb['label'] !!}</li>
        @endif
    @endforeach
</ul>