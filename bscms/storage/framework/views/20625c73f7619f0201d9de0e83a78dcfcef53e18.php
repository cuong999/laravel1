<?php $__env->startSection('page'); ?>
    <!-- Navbar -->
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle offcanvas">
                <span class="sr-only">Toggle navigation</span>
                <i class="icon icon-menu"></i>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('dashboard.index')); ?>">
                <img class="logo">
            </a>
        </div>

    </div>
    <!-- /navbar -->

    <!-- Page container -->
    <div class="page-container col-md-12">
        <!-- Page content -->
        <div class="page-content" style="min-height: calc(100vh - 55px)">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /page content -->
        <div class="clearfix"></div>
    </div>
    <!-- /page container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.base::layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>