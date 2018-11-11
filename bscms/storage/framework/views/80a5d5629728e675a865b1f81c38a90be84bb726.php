<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="widget meta-boxes">
                <div class="widget-title">
                    <h4><i class="icon-magic-wand"></i> <?php echo e(trans('core.theme::theme.theme')); ?></h4>
                </div>
                <div class="widget-body">
                    <div class="row pad">
                        <?php $__currentLoopData = ThemeManager::getThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <div class="img-thumbnail-wrap" style="background-image: url('<?php echo e(url(config('core.theme.general.themeDir'))); ?>/<?php echo e($key); ?>/screenshot.png')"></div>
                                    <div class="caption">
                                        <div class="col-12" style="background: #eee; padding: 15px;">
                                            <div style="word-break: break-all">
                                                <h4><?php echo e($theme['name']); ?></h4>
                                                <p><?php echo e(trans('core.theme::theme.author')); ?>: <?php echo e(array_get($theme, 'author')); ?></p>
                                                <p><?php echo e(trans('core.theme::theme.version')); ?>: <?php echo e(array_get($theme, 'version')); ?></p>
                                                <p><?php echo e(trans('core.theme::theme.description')); ?>: <?php echo e(array_get($theme, 'description')); ?></p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <?php if(setting('theme') == $key): ?>
                                                    <a href="#" class="btn btn-info" disabled="disabled"><i class="fa fa-check"></i> <?php echo e(trans('core.theme::theme.activated')); ?></a>
                                                <?php else: ?>
                                                    <?php if(Auth::user()->hasPermission('theme.activate')): ?>
                                                        <a href="#" class="btn btn-primary btn-trigger-active-theme" data-theme="<?php echo e($key); ?>"><?php echo e(trans('core.theme::theme.active')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->hasPermission('theme.remove')): ?>
                                                        <a href="#" class="btn btn-danger btn-trigger-remove-theme" data-theme="<?php echo e($key); ?>"><?php echo e(trans('core.theme::theme.remove')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo Form::modalAction('remove-theme-modal', trans('core.theme::theme.remove_theme'), 'danger', trans('core.theme::theme.remove_theme_confirm_message'), 'confirm-remove-theme-button', trans('core.theme::theme.remove_theme_confirm_yes')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>