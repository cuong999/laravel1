<?php $__env->startSection('page'); ?>

    <?php echo $__env->make('core.base::layouts.partials.svg-icon', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="page-wrapper">
        <?php echo $__env->make('core.base::layouts.partials.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="clearfix"></div>
        <!-- Page container -->
        <div class="page-container col-md-12">

            <!-- Sidebar -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse">
                    <div class="sidebar">
                        <div class="sidebar-content">
                            <ul class="page-sidebar-menu page-header-fixed navigation" data-keep-expanded="true" data-auto-scroll="true" data-slide-speed="200">
                                <?php echo $__env->make('core.base::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /sidebar -->

            <div class="page-content-wrapper">
                <div class="page-content <?php if(Route::currentRouteName() == 'media.index'): ?> rv-media-integrate-wrapper <?php endif; ?>">
                    <?php echo AdminBreadcrumb::render(); ?>

                    <div class="clearfix"></div>
                    <?php echo $__env->yieldContent('content'); ?>
                    <?php echo $__env->make('core.table::modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('core.base::layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /page container -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo $__env->make('media::partials.media', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('core.base::layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>