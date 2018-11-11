<?php $__currentLoopData = config('media.libraries.javascript', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(url($js)); ?>" type="text/javascript"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
