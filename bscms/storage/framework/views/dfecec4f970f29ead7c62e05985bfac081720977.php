<?php $__env->startSection('head'); ?>
    <?php echo RvMedia::renderHeader(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo RvMedia::renderContent(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo RvMedia::renderFooter(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>