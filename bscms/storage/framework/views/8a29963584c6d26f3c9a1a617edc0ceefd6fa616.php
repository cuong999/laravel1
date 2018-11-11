<?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($key == $selected): ?>
        <span class="<?php echo e(array_get($status, 'class', 'label-info')); ?> status-label" data-value="<?php echo e($key); ?>" data-text="<?php echo e(ucfirst(array_get($status, 'text'))); ?>">
            <?php echo e(array_get($status, 'text')); ?>

        </span>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>