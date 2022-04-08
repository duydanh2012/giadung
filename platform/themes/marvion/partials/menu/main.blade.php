<ul {!! clean($options) !!}>
    @foreach ($menu_nodes as $key => $row)
        <li class="itemMenuMainHeader @if ($row->has_child) menuSub normal @endif {{ $row->css_class }} @if ($row->active) active @endif">
            <a class="linkMenuMainHeader" href="{{ $row->url }}" title="{{ $row->title }}" target="{{ $row->target }}">
                @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif {{ $row->title }}
            </a>
            @if ($row->has_child)
                <a href="#" class="btnDropdownMenuSub" title="Dropdown">
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"></path>
                    </svg>
                </a>
                <div class="wrapListMenuSubHeader">
                    {!!
                        Menu::generateMenu([
                            'menu'       => $menu,
                            'menu_nodes' => $row->child,
                            'view'       => 'menu.submain',
                            'options'    => ['class' => 'listMenuSubHeader'],
                        ])
                    !!}
                </div>
            @endif
        </li>
    @endforeach
</ul>
