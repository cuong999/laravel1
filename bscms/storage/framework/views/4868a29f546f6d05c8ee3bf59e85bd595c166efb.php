<?php if(empty($widget_setting) || $widget_setting->status == 1): ?>
    <div class="col-12 widget_item" id="<?php echo e($widget->name); ?>" data-url="<?php echo e(route('analytics.general')); ?>">
        <div class="portlet light bordered portlet-no-padding widget-load-has-callback">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark"><?php echo e(trans('plugins.analytics::analytics.' . $widget->name)); ?></span>
                </div>
                <?php echo $__env->make('core.dashboard::partials.tools', ['settings' => !empty($widget_setting) ? $widget_setting->settings : []], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="row portlet-body widget-content <?php echo e(array_get(!empty($widget_setting) ? $widget_setting->settings : [], 'state')); ?>" style="padding: 15px;"></div>
        </div>
    </div>
<?php endif; ?>