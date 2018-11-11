<?php if(empty($widget_setting) || $widget_setting->status == 1): ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo e(route('plugins.list')); ?>">
            <div class="visual">
                <i class="fa fa-plug"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($plugins); ?>"></span></div>
                <div class="desc"> <?php echo e(trans('core.base::layouts.plugins')); ?> </div>
            </div>
        </a>
    </div>
<?php endif; ?>