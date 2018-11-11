<?php
/**
 * @var array $values
 */
$values = (array)$values;
?>
<?php if(sizeof($values) > 1): ?> <div class="mt-checkbox-list"> <?php endif; ?>
    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $name = isset($value[0]) ? $value[0] : '';
        $currentValue = isset($value[1]) ? $value[1] : '';
        $label = isset($value[2]) ? $value[2] : '';
        $selected = isset($value[3]) ? (bool)$value[3] : false;
        $disabled = isset($value[4]) ? (bool)$value[4] : false;
    ?>
    <label>
        <input type="checkbox"
               value="<?php echo e($currentValue); ?>"
               <?php echo e($selected ? 'checked' : ''); ?>

               name="<?php echo e($name); ?>" <?php echo e($disabled ? 'disabled' : ''); ?>>
        <?php echo e($label); ?>

    </label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(sizeof($values) > 1): ?> </div> <?php endif; ?>