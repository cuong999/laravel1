<?php $__env->startSection('content'); ?>
    <?php echo apply_filters(DASHBOARD_FILTER_ADMIN_NOTIFICATIONS, null); ?>

    <div class="row">
        <?php echo apply_filters(DASHBOARD_FILTER_TOP_BLOCKS, null); ?>

    </div>
    <div class="clearfix"></div>
    <div id="list_widgets" class="row">
        <?php $__currentLoopData = $user_widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $widget; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="clearfix"></div>
    </div>

    <a href="#" class="manage-widget"><i class="fa fa-plus"></i> <?php echo e(trans('core.dashboard::dashboard.manage_widgets')); ?></a>

    <?php echo $__env->make('core.dashboard::partials.modals', compact('widgets'), \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>