<?php $__env->startSection('content'); ?>
    <?php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, WIDGET_MANAGER_MODULE_SCREEN_NAME, request(), null) ?>
    <div class="widget-main" id="wrap-widgets">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php echo e(trans('core.widget::global.available')); ?></h2>
                <p><?php echo e(trans('core.widget::global.instruction')); ?></p>
                <ul id="wrap-widget-1">
                    <?php $__currentLoopData = Widget::getWidgets(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-id="<?php echo e($widget->getId()); ?>">
                            <div class="widget-handle">
                                <p class="widget-name"><?php echo e($widget->getConfig()['name']); ?> <span class="text-right"><i class="fa fa-caret-up"></i></span>
                                </p>
                            </div>
                            <div class="widget-content">
                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo e($widget->getId()); ?>">
                                    <?php echo $widget->form(); ?>

                                    <div class="widget-control-actions">
                                        <div class="float-left">
                                            <button class="btn btn-danger widget-control-delete"><?php echo e(trans('core.widget::global.delete')); ?></button>
                                        </div>
                                        <div class="float-right text-right">
                                            <button class="btn btn-primary widget_save"><?php echo e(trans('core.base::forms.save')); ?></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-description">
                                <p><?php echo e($widget->getConfig()['description']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-6" id="added-widget">
                <?php echo apply_filters(WIDGET_TOP_META_BOXES, null, WIDGET_MANAGER_MODULE_SCREEN_NAME); ?>

                <div class="row">
                    <?php $index = 1; ?>
                    <?php $__currentLoopData = WidgetGroup::getGroups(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 sidebar-item" data-id="<?php echo e($group->getId()); ?>">
                            <div class="sidebar-area">
                                <div class="sidebar-header">
                                    <h3><?php echo e($group->getName()); ?></h3>
                                    <p><?php echo e($group->getDescription()); ?></p>
                                </div>
                                <?php $index++; $widget_areas = $group->getWidgets() ?>
                                <ul id="wrap-widget-<?php echo e($index); ?>">
                                    <?php echo $__env->make('core.widget::item', compact('widget_areas', 'position'), \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                        </div>
                        <?php if($loop->index % 2 != 0): ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        var BWidget = BWidget || {};
        BWidget.routes = {
            'delete': '<?php echo e(route('widgets.delete', ['ref_lang' => request()->input('ref_lang')])); ?>',
            'save_widgets_sidebar': '<?php echo e(route('widgets.save_widgets_sidebar', ['ref_lang' => request()->input('ref_lang')])); ?>'
        };
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>