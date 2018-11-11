<?php $__env->startSection('content'); ?>
    <?php if($showStart): ?>
        <?php echo Form::open(array_except($formOptions, ['template'])); ?>

    <?php endif; ?>

    <?php if($form->getModuleName()): ?>
        <?php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, $form->getModuleName(), request(), $form->getModel()) ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-9">
            <?php if($showFields && $form->hasMainFields()): ?>
                <div class="main-form">
                    <div class="<?php echo e($form->getWrapperClass()); ?>">
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($field->getName() == $form->getBreakFieldPoint()): ?>
                                    <?php break; ?>
                                <?php else: ?>
                                    <?php unset($fields[$key]); ?>
                                <?php endif; ?>
                                <?php if(!in_array($field->getName(), $exclude)): ?>
                                    <?php echo $field->render(); ?>

                                    <?php if($field->getName() == 'name'): ?>
                                        <?php echo apply_filters(BASE_FILTER_SLUG_AREA, $form->getModuleName(), $form->getModel()); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php $__currentLoopData = $form->getMetaBoxes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $metaBox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $form->getMetaBox($key); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($form->getModuleName()): ?>
                <?php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'advanced', $form->getModel()) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-3 right-sidebar">
            <?php echo $form->getActionButtons(); ?>

            <?php if($form->getModuleName()): ?>
                <?php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'top', $form->getModel()) ?>
            <?php endif; ?>

            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!in_array($field->getName(), $exclude)): ?>
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4><?php echo Form::customLabel($field->getName(), $field->getOption('label'), $field->getOption('label_attr')); ?></h4>
                        </div>
                        <div class="widget-body">
                            <?php echo $field->render([], in_array($field->getType(), ['radio', 'checkbox'])); ?>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($form->getModuleName()): ?>
                <?php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'side', $form->getModel()) ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if($showEnd): ?>
        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php if($form->getValidatorClass()): ?>
    <?php if($form->isUseInlineJs()): ?>
        <?php echo Assets::getJavascriptItemToHtml('jquery'); ?>

        <?php echo Assets::getAppModuleItemToHtml('form-validation'); ?>

        <?php echo $form->renderValidatorJs(); ?>

    <?php else: ?>
        <?php $__env->startPush('footer'); ?>
            <?php echo $form->renderValidatorJs(); ?>

        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>