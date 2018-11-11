<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('plugins.analytics::analytics.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('plugins.analytics::analytics.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group">
                <label class="text-title-field"
                       for="google_analytics"><?php echo e(trans('plugins.analytics::analytics.settings.tracking_code')); ?></label>
                <input data-counter="120" type="text" class="next-input" name="google_analytics" id="google_analytics"
                       value="<?php echo e(setting('google_analytics')); ?>" placeholder="<?php echo e(trans('plugins.analytics::analytics.settings.tracking_code_placeholder')); ?>">
            </div>
            <div class="form-group">
                <label class="text-title-field"
                       for="view_id"><?php echo e(trans('plugins.analytics::analytics.settings.view_id')); ?></label>
                <input data-counter="120" type="text" class="next-input" name="analytics_view_id" id="analytics_view_id"
                       value="<?php echo e(setting('analytics_view_id', config('plugins.analytics.general.view_id'))); ?>" placeholder="<?php echo e(trans('plugins.analytics::analytics.settings.view_id_description')); ?>">
            </div>
            <?php if(!app()->environment('demo')): ?>
                <div class="form-group">
                    <label class="text-title-field"
                           for="analytics_service_account_credentials"><?php echo e(trans('plugins.analytics::analytics.settings.json_credential')); ?></label>
                    <textarea class="next-input form-control" name="analytics_service_account_credentials" id="analytics_service_account_credentials" rows="5" placeholder="<?php echo e(trans('plugins.analytics::analytics.settings.json_credential_description')); ?>"><?php echo e(setting('analytics_service_account_credentials')); ?></textarea>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>