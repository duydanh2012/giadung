<?php

use Platform\Widget\AbstractWidget;

class NewVideosWidget extends AbstractWidget
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
    protected $widgetDirectory = 'new-videos';

    /**
     * NewVideosWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'           => __('New videos'),
            'description'    => __('New videos widget.'),
            'number_display' => 5,
        ]);
    }
}
