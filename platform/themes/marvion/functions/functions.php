<?php

register_page_template([
    'default'      => 'Default',
    'homepage'     => __('Homepage'),
    'creator'      => 'Creator',
    'hybrid-nft'   => 'Hybrid NFT',
    'news'         => 'News',
    'faqs'         => 'FAQs',
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('Area for footer widgets'),
]);

RvMedia::setUploadPathAndURLToPublic();
RvMedia::addSize('featured', 565)->addSize('medium', null, 360);
