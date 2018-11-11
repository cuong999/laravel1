<div class="onoffswitch">
    <input type="checkbox" name="<?php echo e($name); ?>" class="onoffswitch-checkbox" id="<?php echo e($name); ?>" value="1" <?php if($value): ?> checked <?php endif; ?> <?php echo html_attributes_builder($attributes); ?>>
    <label class="onoffswitch-label" for="<?php echo e($name); ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>