<?php if($showLabel && $showField): ?>
    <?php if($options['wrapper'] !== false): ?>
        <div <?php echo $options['wrapperAttrs']; ?>>
    <?php endif; ?>
<?php endif; ?>

<?php if($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?php echo Form::customLabel($name, $options['label'], $options['label_attr']); ?>

<?php endif; ?>

<?php if($showField): ?>
    <?php
        array_set($options['attr'], 'class', array_get($options['attr'], 'class') . ' ui-select');
        $emptyVal = $options['empty_value'] ? ['' => $options['empty_value']] : null;
    ?>
    <?php echo Form::customSelect($name, (array)$emptyVal + $options['choices'], $options['selected'], $options['attr']); ?>

    <?php echo $__env->make('core.base::forms.partials.help_block', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('core.base::forms.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if($showLabel && $showField): ?>
    <?php if($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
