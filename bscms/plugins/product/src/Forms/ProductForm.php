<?php

namespace Bytesoft\Product\Forms;

use Bytesoft\Base\Forms\FormAbstract;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use Bytesoft\Product\Http\Requests\ProductRequest;
use Bytesoft\Product\Forms\Fields\ProductGroupMultiField;


class ProductForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function buildForm()
    {

        // $selected_groups = [];
        // if ($this->getModel()) {
        //     $selected_groups = $this->getModel()->groups()->pluck('product_group_id')->all();
        // }

        // if (empty($selected_groups)) {
        //     $selected_groups = app(ProductGroupInterface::class)->getModel()->where('is_default', 1)->pluck('id')->all();
        // }

        // $this->addCustomField('groupMulti', ProductGroupMultiField::class);

        $this
            ->setModuleName(PRODUCT_MODULE_SCREEN_NAME)
            ->setValidatorClass(ProductRequest::class)
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
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'data-counter' => 255,
                ],
            ])
            ->add('featured', 'onOff', [
                'label' => trans('core.base::forms.featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'editor', [
                'label' => trans('core.base::forms.content'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'data-counter' => 255,
                ],
            ])
            ->add('complete_at', 'date', [
                'label' => 'Complete Date',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'Expiration at'
                ],
            ])
            // ->add('product_groups[]', 'groupMulti', [
            //     'label' => trans('plugins.blog::posts.form.categories'),
            //     'label_attr' => ['class' => 'control-label required'],
            //     'choices' => get_product_groups_with_children(),
            //     'value' => old('product_groups', $selected_groups),
            // ])
            ->add('docs', 'mediaImage', [
                'label' => 'Documents',
                'label_attr' => ['class' => 'control-label'],
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
            ->setBreakFieldPoint('complete_at');
    }
}