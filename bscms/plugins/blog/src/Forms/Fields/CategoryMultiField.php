<?php

namespace Bytesoft\Blog\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CategoryMultiField extends FormField
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected function getTemplate()
    {
        return 'plugins.blog::categories.partials.categories-multi';
    }
}