<?php

namespace Bytesoft\Widget\Widgets;

use Bytesoft\Widget\AbstractWidget;

class Text extends AbstractWidget
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
    protected $frontendTemplate = 'core.widget::widgets.text.frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'core.widget::widgets.text.backend';

    /**
     * @var bool
     */
    protected $is_core = true;

    /**
     * Text constructor.
     * @author Bytesoft
     */
    public function __construct()
    {
        parent::__construct([
            'name' => trans('core.widget::global.widget_text'),
            'description' => trans('core.widget::global.widget_text_description'),
            'content' => null,
        ]);
    }
}
