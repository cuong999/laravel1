<?php $__currentLoopData = $bodyScripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo Html::script($script['src'], $script['attributes']); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>