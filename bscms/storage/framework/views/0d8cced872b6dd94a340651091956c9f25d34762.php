<div class="form-group form-group-no-margin <?php if($errors->has($name)): ?> has-error <?php endif; ?>">
    <div class="multi-choices-widget list-item-checkbox">
        <?php if(isset($options['choices']) && (is_array($options['choices']) || $options['choices'] instanceof \Illuminate\Support\Collection)): ?>
            <?php echo $__env->make('plugins.blog::categories.partials._categories-checkbox-option-line', [
                'categories' => $options['choices'],
                'value' => $options['value'],
                'currentId' => null,
                'name' => $name
            ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </div>
</div>
