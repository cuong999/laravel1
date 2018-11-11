<?php

namespace Bytesoft\Svprocess\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Svprocess\Http\Requests\SvprocessRequest;

class SvprocessForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(SVPROCESS_MODULE_SCREEN_NAME)
            ->setValidatorClass(SvprocessRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core.base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
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
            ->add('featured', 'onOff', [
                'label' => trans('core.base::forms.featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'editor', [
                'label' => trans('core.base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core.base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('order', 'number', [
                'label' => 'Order',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => 'Order',
                    'data-counter' => 2,
                ],
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core.base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('image_hover', 'mediaImage', [
                'label' => 'Image Hover',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core.base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => [
                    1 => trans('core.base::system.activated'),
                    0 => trans('core.base::system.deactivated'),
                ],
            ])
            ->setBreakFieldPoint('order');
    }
}