<?php

namespace Bytesoft\Slug\Forms\Fields;

use Assets;
use Kris\LaravelFormBuilder\Fields\FormField;

class PermalinkField extends FormField
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected function getTemplate()
    {
        Assets::addAppModule(['slug']);
        return 'core.slug::forms.fields.permalink';
    }
}