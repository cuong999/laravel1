<?php

namespace Bytesoft\Product\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Product\Http\Requests\ProductGroupRequest;

class ProductGroupForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $list = get_product_group();

        $groups = [];
        foreach ($list as $row) {
            $groups[$row->id] = $row->indent_text . ' ' . $row->name;
        }
        $groups = [0 => trans('plugins.blog::categories.none')] + $groups;

        $this
            ->setModuleName(PRODUCT_GROUP_MODULE_SCREEN_NAME)
            ->setValidatorClass(ProductGroupRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core.base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('parent_id', 'select', [
                'label' => trans('core.base::forms.parent'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => $groups,
            ])
            ->add('description', 'textarea', [
                'label' => trans('core.base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core.base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('is_default', 'onOff', [
                'label' => trans('core.base::forms.is_default'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('image', 'mediaImage', [
                'label' => 'Image',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => 'Ex: fa fa-home',
                    'data-counter' => 60,
                ],
            ])
            ->add('order', 'number', [
                'label' => trans('core.base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('featured', 'onOff', [
                'label' => trans('core.base::forms.featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core.base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => [
                    1 => trans('core.base::system.activated'),
                    0 => trans('core.base::system.deactivated'),
                ],
            ])
            ->setBreakFieldPoint('image');
    }
}