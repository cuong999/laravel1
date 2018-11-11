<?php if(empty($widget_setting) || $widget_setting->status == 1): ?>
    <div class="col-md-6 col-sm-6 col-12 widget_item" id="<?php echo e($widget->name); ?>" data-url="<?php echo e(route('audit-log.widget.activities')); ?>">
        <div class="portlet light bordered portlet-no-padding">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark"><?php echo e(trans('plugins.audit-log::history.' . $widget->name)); ?></span>
                </div>
                <?php echo $__env->make('core.dashboard::partials.tools', ['settings' => !empty($widget_setting) ? $widget_setting->settings : []], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="portlet-body equal-height scroll-table widget-content <?php echo e(array_get(!empty($widget_setting) ? $widget_setting->settings : [], 'state')); ?>"></div>
        </div>
    </div>
<?php endif; ?>