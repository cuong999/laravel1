<a href="<?php echo e(route('categories.edit', $item->id)); ?>" class="btn btn-icon btn-primary tip" data-original-title="<?php echo e(trans('core.base::tables.edit')); ?>"><i class="fa fa-edit"></i></a>
<?php if(!$item->is_default): ?>
    <a href="#" class="btn btn-icon btn-danger deleteDialog tip" data-toggle="modal" data-section="<?php echo e(route('categories.delete', $item->id)); ?>" role="button" data-original-title="<?php echo e(trans('core.base::tables.delete_entry')); ?>" >
        <i class="fa fa-trash"></i>
    </a>
<?php endif; ?>

