<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('plugins.captcha::captcha.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('plugins.captcha::captcha.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group">
                <label class="text-title-field"
                       for="enable_captcha"><?php echo e(trans('plugins.captcha::captcha.settings.enable_captcha')); ?>

                </label>
                <label class="hrv-label">
                    <input type="radio" name="enable_captcha" class="hrv-radio"
                                                value="1"
                                                <?php if(setting('enable_captcha')): ?> checked <?php endif; ?>><?php echo e(trans('core.setting::setting.general.yes')); ?>

                </label>
                <label class="hrv-label">
                    <input type="radio" name="enable_captcha" class="hrv-radio"
                                                value="0"
                                                <?php if(!setting('enable_captcha')): ?> checked <?php endif; ?>><?php echo e(trans('core.setting::setting.general.no')); ?>

                </label>
            </div>

            <div class="form-group">
                <label class="text-title-field"
                       for="captcha_site_key"><?php echo e(trans('plugins.captcha::captcha.settings.captcha_site_key')); ?></label>
                <input data-counter="120" type="text" class="next-input" name="captcha_site_key" id="captcha_site_key"
                       value="<?php echo e(setting('captcha_site_key', config('plugins.captcha.general.site_key'))); ?>" placeholder="<?php echo e(trans('plugins.captcha::captcha.settings.captcha_site_key')); ?>">
            </div>
            <div class="form-group">
                <label class="text-title-field"
                       for="captcha_secret"><?php echo e(trans('plugins.captcha::captcha.settings.captcha_secret')); ?></label>
                <input data-counter="120" type="text" class="next-input" name="captcha_secret" id="captcha_secret"
                       value="<?php echo e(setting('captcha_secret', config('plugins.captcha.general.secret'))); ?>" placeholder="<?php echo e(trans('plugins.captcha::captcha.settings.captcha_secret')); ?>">
            </div>
            <div class="form-group">
                <span class="help-ts"><?php echo e(trans('plugins.captcha::captcha.settings.helper')); ?></span>
            </div>
        </div>
    </div>
</div>