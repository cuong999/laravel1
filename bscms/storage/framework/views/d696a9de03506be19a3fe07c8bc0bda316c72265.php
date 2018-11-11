<ul <?php echo $options; ?>>
    <?php $__currentLoopData = $menu_nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class=" <?php if($row->parent_id != 0): ?>dropdown-list__item <?php else: ?> menu-list__item <?php endif; ?> <?php echo e($row->css_class); ?> <?php if($row->getRelated()->url == Request::url()): ?> active <?php endif; ?>">
            <a href="<?php echo e($row->getRelated()->url); ?>" target="<?php echo e($row->target); ?>" class="<?php if($row->parent_id != 0): ?> dropdown-list__link <?php else: ?> menu-list__link <?php endif; ?> ">
                <?php echo e($row->getRelated()->name); ?>

            </a>
            <?php if($row->hasChild()): ?>
                <?php echo Menu::generateMenu([
                        'slug' => $menu->slug,
                        'parent_id' => $row->id,
                        'options' => ['class' => 'dropdown-list'],
                        'view' => 'main-menu',
                    ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
