<?php

namespace Bytesoft\Review\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Review\Http\Requests\ReviewRequest;

class ReviewForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(REVIEW_MODULE_SCREEN_NAME)
            ->setValidatorClass(ReviewRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core.base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core.base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('link', 'text', [
                'label' => 'Youtube Link',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'https://youtube.com/watch?v=jagsduyi',
                    'data-counter' => 255,
                ],
            ])
            ->add('file', 'mediaImage', [
                'label' => 'Or File',
                'label_attr' => ['class' => 'control-label required'],
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
            ->setBreakFieldPoint('status');
    }
}