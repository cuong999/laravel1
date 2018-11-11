<?php $__env->startSection('content'); ?>
    <div id="plugin-list" class="clearfix app-grid--blank-slate row">
        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="app-card-item col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="app-item app-<?php echo e($plugin->path); ?>">
                    <div class="app-icon">
                        <?php if($plugin->image): ?>
                            <img src="data:image/png;base64,<?php echo e($plugin->image); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="app-details">
                        <h4 class="app-name"><?php echo e($plugin->name); ?></h4>
                    </div>
                    <div class="app-footer">
                        <div class="app-description" title="<?php echo e($plugin->description); ?>"><?php echo e($plugin->description); ?></div>
                        <div class="app-author"><?php echo e(trans('core.base::system.author')); ?>: <a href="<?php echo e($plugin->url); ?>" target="_blank"><?php echo e($plugin->author); ?></a></div>
                        <div class="app-version"><?php echo e(trans('core.base::system.version')); ?>: <?php echo e($plugin->version); ?></div>
                        <div class="app-actions">
                            <?php if(Auth::user()->hasPermission('plugins.edit')): ?>
                                <a href="#" class="btn <?php if($plugin->status): ?> btn-warning <?php else: ?> btn-info <?php endif; ?> btn-trigger-change-status" data-plugin="<?php echo e($plugin->path); ?>" data-status="<?php echo e($plugin->status); ?>"><?php if($plugin->status): ?> <?php echo e(trans('core.base::system.deactivate')); ?> <?php else: ?> <?php echo e(trans('core.base::system.activate')); ?> <?php endif; ?></a>
                            <?php endif; ?>
                            
                            <?php if(Auth::user()->hasPermission('plugins.remove')): ?>
                            <a href="#" class="btn btn-danger btn-trigger-remove-plugin" data-plugin="<?php echo e($plugin->path); ?>"><?php echo e(trans('core.base::system.remove')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo Form::modalAction('remove-plugin-modal', trans('core.base::system.remove_plugin'), 'danger', trans('core.base::system.remove_plugin_confirm_message'), 'confirm-remove-plugin-button', trans('core.base::system.remove_plugin_confirm_yes')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>