<ul <?php echo $options; ?>>
    <?php $__currentLoopData = $menu_nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo e($row->css_class); ?> <?php if($row->getRelated(true)->url == Request::url()): ?> current <?php endif; ?>">
            <a href="<?php echo e($row->getRelated(true)->url); ?>" target="<?php echo e($row->target); ?>">
                <i class='<?php echo e(trim($row->icon_font)); ?>'></i> <span><?php echo e($row->getRelated(true)->name); ?></span>
            </a>
            <?php if($row->hasChild()): ?>
                <?php echo Menu::generateMenu([
                    'slug' => $menu->slug,
                    'parent_id' => $row->id
                ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
