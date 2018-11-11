<?php

namespace Bytesoft\Product\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class ProductGroupMultiField extends FormField
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected function getTemplate()
    {
        return 'plugins.product::groups.partials.groups-multi';
    }
}