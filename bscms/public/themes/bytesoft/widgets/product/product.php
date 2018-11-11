<?php

use Bytesoft\Widget\AbstractWidget;

class ProductWidget extends AbstractWidget
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
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'product';

    /**
     * Widget constructor.
     * @author Bytesoft
     */
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'description' => __('This is a sample widget'),
        ]);
    }
}