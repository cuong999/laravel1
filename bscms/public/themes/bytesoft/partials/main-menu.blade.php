<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        <li class=" @if ($row->parent_id != 0)dropdown-list__item @else menu-list__item @endif {{ $row->css_class }} @if ($row->getRelated()->url == Request::url()) active @endif">
            <a href="{{ $row->getRelated()->url }}" target="{{ $row->target }}" class="@if ($row->parent_id != 0) dropdown-list__link @else menu-list__link @endif ">
                {{ $row->getRelated()->name}}
            </a>
            @if ($row->hasChild())
                {!!
                    Menu::generateMenu([
                        'slug' => $menu->slug,
                        'parent_id' => $row->id,
                        'options' => ['class' => 'dropdown-list'],
                        'view' => 'main-menu',
                    ])
                !!}
            @endif
        </li>
    @endforeach
</ul>
