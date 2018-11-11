<?php

namespace Bytesoft\Base\Forms;

use Kris\LaravelFormBuilder\FormBuilder as BaseFormBuilder;

class FormBuilder extends BaseFormBuilder
{
    /**
     * @param string $formClass
     * @param array $options
     * @param array $data
     * @return FormAbstract|\Kris\LaravelFormBuilder\Form
     * @author Bytesoft
     */
    public function create($formClass, array $options = [], array $data = [])
    {
        return parent::create($formClass, $options, $data);
    }
}