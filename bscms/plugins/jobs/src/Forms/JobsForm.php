<?php

namespace Bytesoft\Jobs\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Jobs\Http\Requests\JobsRequest;

class JobsForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function buildForm()
    {
        $this
            ->setModuleName(JOBS_MODULE_SCREEN_NAME)
            ->setValidatorClass(JobsRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core.base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'editor', [
                'label' => trans('core.base::forms.description'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'data-counter' => 1000,
                ],
            ])
            ->add('featured', 'onOff', [
                'label' => trans('core.base::forms.featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'editor', [
                'label' => 'Content',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'data-counter' => 5000,
                ],
            ])
            ->add('interest', 'editor', [
                'label' => 'Interest',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'data-counter' => 5000,
                ],
            ])
            ->add('num', 'number', [
                'label' => 'Amount',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'Amount Jobs',
                ],
            ])
            ->add('place', 'select', [
                'label' => 'Place',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => [
                    'Hồ Chí Minh' => 'Hồ Chí Minh',
                    'Hà Nội' => 'Hà Nội',
                ],
            ])
            ->add('expiration_at', 'date', [
                'label' => 'Expiration Date',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'Expiration at'
                ],
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core.base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
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

            ->setBreakFieldPoint('num');
    }
}