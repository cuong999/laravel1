<span class="admin-list-language-chooser">
    <span><?php echo e(trans('plugins.language::language.translations')); ?>: </span>
    <?php $__currentLoopData = Language::getActiveLanguage(['lang_id', 'lang_name', 'lang_code', 'lang_flag']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($language->lang_code !== Language::getCurrentAdminLocaleCode()): ?>
            <span>
                <?php echo language_flag($language->lang_flag, $language->lang_name); ?>

                <a href="<?php echo e(route($route, $language->lang_code == Language::getDefaultLocaleCode() ? [] : ['ref_lang' => $language->lang_code])); ?>"><?php echo e($language->lang_name); ?></a>
            </span>&nbsp;
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" name="ref_lang" value="<?php echo e(request()->input('ref_lang')); ?>">
</span>