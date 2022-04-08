<div class="col-sm-6 col-lg-3 colLinkFooter">
    <div class="contentLinkFooter">
        <div class="titleFooter">{{ $config['name'] }}</div>

        <div class="listLinkFooter">
            {!!
                Menu::generateMenu([
                    'slug'    => $config['menu_id'],
                    'options' => ['class' => ''],
                    'view'    => 'menu.footer'
                ])
            !!}
        </div>
    </div>
</div>
