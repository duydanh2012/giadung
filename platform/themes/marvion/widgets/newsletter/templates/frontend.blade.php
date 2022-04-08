<div class="col-sm-6 col-lg-3 colSubscibeFooter">
    <div class="contentSubscibeFooter">
        <div class="titleFooter">{{ $config['name'] }}</div>

        <div class="wrapTextSubscibe">{{ $config['description'] }}</div>

        <div class="wrapFrmSubcribe">
            <div class="clearfix contentFrmSearchPopup">
                {!! render_newsletter_subscribe_form() !!}
            </div>
        </div>

        <div class="wrapFanpageFooter">
            {!! Theme::partial('socials') !!}
        </div>
    </div>
</div>
