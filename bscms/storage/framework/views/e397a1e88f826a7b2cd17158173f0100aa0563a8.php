<?php $__env->startSection('main-table'); ?>
    <?php echo Form::open(['url' => route('custom-fields.import'), 'class' => 'import-field-group']); ?>

        <input type="file" accept="application/json" class="hidden" id="import_json">
        ##parent-placeholder-4423c4f43412fe476d1d4421d407f85dc60a1e83##
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.table::table', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>