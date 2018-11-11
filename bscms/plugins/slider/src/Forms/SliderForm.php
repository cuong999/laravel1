<?php

namespace Bytesoft\Slider\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Slider\Http\Requests\SliderRequest;

class SliderForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(SLIDER_MODULE_SCREEN_NAME)
            ->setValidatorClass(SliderRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core.base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('title', 'text', [
                'label' => trans('core.base::forms.slider_title'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.slider_title_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'text', [
                'label' => trans('core.base::forms.slider_description'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.slider_description_placeholder'),
                    'data-counter' => 256,
                ],
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core.base::forms.slider_image'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.slider_image_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('background', 'mediaImage', [
                'label' => 'Background',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.slider_image_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('status', 'select', [
                'label' => trans('core.base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => [
                    1 => trans('core.base::system.activated'),
                    0 => trans('core.base::system.deactivated'),
                ],
            ])
            ->setBreakFieldPoint('image');
    }
}