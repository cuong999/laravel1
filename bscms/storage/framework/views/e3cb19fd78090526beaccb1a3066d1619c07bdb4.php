<div class="tools">
    <a href="#" class="<?php echo e(array_get($settings, 'state', 'expand')); ?> tip" title="<?php echo e(trans('core.dashboard::dashboard.collapse_expand')); ?>" data-state="<?php echo e(array_get($settings, 'state', 'expand') == 'collapse' ? 'expand' : 'collapse'); ?>"></a>
    <a href="#" class="reload tip" title="<?php echo e(trans('core.dashboard::dashboard.reload')); ?>"></a>
    <a href="#" class="fullscreen" data-original-title="<?php echo e(trans('core.dashboard::dashboard.fullscreen')); ?>" title="<?php echo e(trans('core.dashboard::dashboard.fullscreen')); ?>"> </a>
    <a href="#" class="remove tip" title="<?php echo e(trans('core.dashboard::dashboard.hide')); ?>"></a>
</div>