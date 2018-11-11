<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__currentLoopData = config('media.libraries.stylesheets', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link href="<?php echo e(url($css)); ?>" rel="stylesheet" type="text/css"/>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('media::config', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
