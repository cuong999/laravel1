<?php if(array_get($meta_box, 'before_wrapper')): ?>
    <?php echo array_get($meta_box, 'before_wrapper'); ?>

<?php endif; ?>

<?php if(array_get($meta_box, 'wrap', true)): ?>
    <div class="widget meta-boxes" <?php echo e(Html::attributes(array_get($meta_box, 'attributes', []))); ?>>
        <div class="widget-title">
            <h4>
                <span> <?php echo e(array_get($meta_box, 'title')); ?></span>
            </h4>
        </div>
        <div class="widget-body">
            <?php echo array_get($meta_box, 'content'); ?>

        </div>
    </div>
<?php else: ?>
    <?php echo array_get($meta_box, 'content'); ?>

<?php endif; ?>

<?php if(array_get($meta_box, 'after_wrapper')): ?>
    <?php echo array_get($meta_box, 'after_wrapper'); ?>

<?php endif; ?>