<?php if(empty($object)): ?>
    <div class="form-group <?php if($errors->has('slug')): ?> has-error <?php endif; ?>">
        <?php echo Form::permalink('slug', old('slug'), 0, $prefix); ?>

        <?php echo Form::error('slug', $errors); ?>

    </div>
<?php else: ?>
    <div class="form-group <?php if($errors->has('slug')): ?> has-error <?php endif; ?>">
        <?php echo Form::permalink('slug', $object->slug, $object->slug_id, $prefix); ?>

        <?php echo Form::error('slug', $errors); ?>

    </div>
<?php endif; ?>
<input type="hidden" name="slug-screen" value="<?php echo e($screen); ?>">