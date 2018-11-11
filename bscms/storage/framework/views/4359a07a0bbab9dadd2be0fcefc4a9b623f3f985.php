<?php $__currentLoopData = $stylesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo Html::style($style['src'], $style['attributes']); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $headScripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo Html::script($script['src'], $script['attributes']); ?>

    <?php if(!empty($script['fallback'])): ?>
        <script>window.<?php echo $script['fallback']; ?> || document.write('<script src="<?php echo e($script['fallbackURL']); ?>"><\/script>')</script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>