<?php

use Platform\Widget\AbstractWidget;

class NewsletterWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $widgetDirectory = 'newsletter';

    /**
     * NewsletterWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'           => __('Newsletter'),
            'description'    => __('Newsletter'),
        ]);
    }
}
