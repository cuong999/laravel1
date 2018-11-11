<ul <?php echo $options; ?>>
    <?php $__currentLoopData = $object; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <label for="menu_id_<?php echo e($screen); ?>_<?php echo e($row->id); ?>" data-title="<?php echo e($row->name); ?>" data-related-id="<?php echo e($row->id); ?>"
                   data-type="<?php echo e($screen); ?>">
                <?php echo Form::checkbox('menu_id', $row->id, null, ['id' => 'menu_id_' . $screen . '_' . $row->id]); ?>

                <?php echo e($row->name); ?>

            </label>

            <?php if(Schema::hasColumn($model->getTable(), 'parent_id')): ?>
                <?php echo Menu::generateSelect([
                        'model' => $model,
                        'screen' => $screen,
                        'parent_id' => $row->id
                    ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
