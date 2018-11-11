<?php $__env->startSection('body-class'); ?>
    login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div class="copyright">
        <p>
            <?php echo trans('core.base::layouts.copyright', ['year' => Carbon\Carbon::now()->format('Y'), 'company' => config('core.base.general.base_name'), 'version' => get_cms_version()]); ?>

        </p>
        <p>
            <?php $__currentLoopData = Assets::getAdminLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span <?php if(app()->getLocale() == $key): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(route('admin.language', $key)); ?>">
                        <?php echo language_flag($value['flag'], $value['name']); ?> <span><?php echo e($value['name']); ?></span>
                    </a>
                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.base::layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>