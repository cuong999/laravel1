<?php $__env->startSection('content'); ?>

    <div>
        <div class="col-md-10">
            <h3><?php echo e(trans('core.base::errors.404_title')); ?></h3>
            <p><?php echo e(trans('core.base::errors.reasons')); ?></p>
            <ul>
                <?php echo trans('core.base::errors.404_msg'); ?>

            </ul>

            <p><?php echo trans('core.base::errors.try_again'); ?></p>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.base::layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>