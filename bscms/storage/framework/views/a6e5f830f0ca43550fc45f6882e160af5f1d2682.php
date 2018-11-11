<!-- <?php if($supported_locales): ?>
    <?php
        $language_display = setting('language_display', 'all');
        $show_related = setting('language_show_default_item_if_current_version_not_existed', true);
    ?>
    <?php if(setting('language_switcher_display', 'dropdown') == 'dropdown'): ?>
        <?php echo array_get($options, 'before'); ?>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?>
                    <?php echo language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?>
                    <?php echo e(Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu language_bar_chooser <?php echo e(array_get($options, 'class')); ?>">
                <?php $__currentLoopData = $supported_locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li <?php if($localeCode == Language::getCurrentLocale()): ?> class="active" <?php endif; ?>>
                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e($show_related ? Language::getLocalizedURL($localeCode) : url($localeCode)); ?>">
                            <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?><?php echo language_flag($properties['lang_flag'], $properties['lang_name']); ?><?php endif; ?>
                            <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?><span><?php echo e($properties['lang_name']); ?></span><?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php echo array_get($options, 'after'); ?>

    <?php else: ?>
        <ul class="language_bar_list <?php echo e(array_get($options, 'class')); ?>">
            <?php $__currentLoopData = $supported_locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li <?php if($localeCode == Language::getCurrentLocale()): ?> class="active" <?php endif; ?>>
                    <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e($show_related ? Language::getLocalizedURL($localeCode) : url($localeCode)); ?>">
                        <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?><?php echo language_flag($properties['lang_flag'], $properties['lang_name']); ?><?php endif; ?>
                        <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?><span><?php echo e($properties['lang_name']); ?></span><?php endif; ?>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
<?php endif; ?> -->

<?php if($supported_locales): ?>
    <?php
        $language_display = setting('language_display', 'all');
        $show_related = setting('language_show_default_item_if_current_version_not_existed', true);
    ?>
    <?php if(setting('language_switcher_display', 'dropdown') == 'dropdown'): ?>
        <?php echo array_get($options, 'before'); ?>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?>
                    <?php echo language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?>
                    <?php echo e(Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu language_bar_chooser <?php echo e(array_get($options, 'class')); ?>">
                <?php $__currentLoopData = $supported_locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li <?php if($localeCode == Language::getCurrentLocale()): ?> class="active" <?php endif; ?>>
                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e($show_related ? Language::getLocalizedURL($localeCode) : url($localeCode)); ?>">
                            <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?><?php echo language_flag($properties['lang_flag'], $properties['lang_name']); ?><?php endif; ?>
                            <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?><span><?php echo e($properties['lang_name']); ?></span><?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php echo array_get($options, 'after'); ?>

    <?php else: ?>

                <p class="title" data-aos="fade-right" data-aos-delay="0"><?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?>
                    <?php echo language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?>
                    <?php echo e(Language::getCurrentLocaleName()); ?>

                <?php endif; ?>
                 <i class="fas fa-chevron-down"></i></p>
                            <ul class="social-list">
                                <?php $__currentLoopData = $supported_locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="social-list__item">
                                    <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e($show_related ? Language::getLocalizedURL($localeCode) : url($localeCode)); ?>" class="social-item__link">
                        <?php if(array_get($options, 'lang_flag', true) && ($language_display == 'all' || $language_display == 'flag')): ?><?php echo language_flag($properties['lang_flag'], $properties['lang_name']); ?><?php endif; ?>
                        <?php if(array_get($options, 'lang_name', true) && ($language_display == 'all' || $language_display == 'name')): ?><span><?php echo e($properties['lang_name']); ?></span><?php endif; ?>
                            </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
    <?php endif; ?>
<?php endif; ?>