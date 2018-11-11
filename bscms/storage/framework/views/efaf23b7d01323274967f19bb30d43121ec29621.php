<?php
/**
 * @var string $name
 * @var array $values
 * @var string $selected
 */
$values = (array)$values;
?>
<?php if(count($values) > 1): ?> <div class="mt-radio-list"> <?php endif; ?>
    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $value = isset($line[0]) ? $line[0] : '';
            $label = isset($line[1]) ? $line[1] : '';
            $disabled = isset($line[2]) ? $line[2] : '';
        ?>
        <label>
            <input type="radio"
                   value="<?php echo e($value); ?>"
                   <?php echo e((string)$selected === (string)$value ? 'checked' : ''); ?>

                   name="<?php echo e($name); ?>" <?php echo e($disabled ? 'disabled' : ''); ?>>
            <?php echo e($label); ?>

        </label>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($values) > 1): ?> </div> <?php endif; ?>
