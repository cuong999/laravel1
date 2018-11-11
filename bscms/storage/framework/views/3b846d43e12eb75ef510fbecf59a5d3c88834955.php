<?php
/**
 * @var string $value
 */
$value = isset($value) ? (array)$value : [];
?>
<?php if($groups): ?>
    <ul>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($group->id != $currentId): ?>
                <li value="<?php echo e($group->id ?? ''); ?>"
                        <?php echo e($group->id == $value ? 'selected' : ''); ?>>
                    <?php echo Form::customCheckbox([
                        [
                            $name, $group->id, $group->name, in_array($group->id, $value),
                        ]
                    ]); ?>

                    <?php echo $__env->make('plugins.product::groups.partials._groups-checkbox-option-line', [
                        'product_group' => $group->child_groups,
                        'value' => $value,
                        'currentId' => $currentId,
                        'name' => $name
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>