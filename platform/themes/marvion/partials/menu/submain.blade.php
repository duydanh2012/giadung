<ul {!! clean($options) !!}>
    @foreach ($menu_nodes as $key => $row)
        <li class="itemMenuSubHeader @if ($row->has_child) menuSub normal @endif {{ $row->css_class }} @if ($row->active) active @endif">
            <a href="{{ $row->url }}" class="linkMenuSubHeader" title="{{ $row->title }}" target="{{ $row->target }}">
                <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zM48 453.5v-395c0-4.6 5.1-7.5 9.1-5.2l334.2 197.5c3.9 2.3 3.9 8 0 10.3L57.1 458.7c-4 2.3-9.1-.6-9.1-5.2z"></path>
                </svg>
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
