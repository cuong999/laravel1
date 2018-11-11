<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['settings.edit']]); ?>

    <div class="max-width-1200">
        <div class="flexbox-annotated-section">

            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core.setting::setting.general.general_block')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core.setting::setting.general.description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                               for="site_title"><?php echo e(trans('core.setting::setting.general.site_title')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="site_title" id="site_title"
                               value="<?php echo e(setting('site_title')); ?>">
                    </div>

                    <div class="form-group">
                        <div class="mt5">
                            <input type="hidden" name="show_site_name" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('show_site_name', false)): ?> checked <?php endif; ?> name="show_site_name"> <?php echo e(trans('core.setting::setting.general.show_site_name')); ?> </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="show_on_front"><?php echo e(trans('core.setting::setting.general.show_on_front')); ?>

                        </label>
                        <div class="ui-select-wrapper">
                            <select name="show_on_front" class="ui-select" id="show_on_front">
                                <option value=""><?php echo e(trans('core.setting::setting.general.select')); ?></option>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($page->id); ?>" <?php if(setting('show_on_front') == $page->id): ?> selected <?php endif; ?>><?php echo e($page->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="admin_email"><?php echo e(trans('core.setting::setting.general.admin_email')); ?></label>
                        <input type="email" class="next-input" name="admin_email" id="admin_email"
                               value="<?php echo e(setting('admin_email')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="time_zone"><?php echo e(trans('core.setting::setting.general.time_zone')); ?>

                        </label>
                        <div class="ui-select-wrapper">
                            <select name="time_zone" class="ui-select" id="time_zone">
                                <?php $__currentLoopData = DateTimeZone::listIdentifiers(DateTimeZone::ALL); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($time_zone); ?>" <?php if(setting('time_zone', 'UTC') === $time_zone): ?> selected <?php endif; ?>><?php echo e($time_zone); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mt5">
                            <input type="hidden" name="optimize_page_speed_enable" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('optimize_page_speed_enable')): ?> checked <?php endif; ?> name="optimize_page_speed_enable"> <?php echo e(trans('core.setting::setting.general.optimize_page_speed')); ?> </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mt5">
                            <input type="hidden" name="enable_send_error_reporting_via_email" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('enable_send_error_reporting_via_email')): ?> checked <?php endif; ?> name="enable_send_error_reporting_via_email"> <?php echo e(trans('core.setting::setting.general.enable_send_error_reporting_via_email')); ?> </label>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="flexbox-annotated-section">

            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core.setting::setting.general.admin_appearance_title')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core.setting::setting.general.admin_appearance_description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                               for="enable_multi_language_in_admin"><?php echo e(trans('core.setting::setting.general.admin_logo')); ?>

                        </label>
                        <div class="admin-logo-image-setting">
                            <?php echo Form::mediaImage('admin_logo', setting('admin_logo', config('core.base.general.logo')), [
                            'allow_thumb' => false,
                        ]); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="enable_multi_language_in_admin"><?php echo e(trans('core.setting::setting.general.admin_favicon')); ?>

                        </label>
                        <div class="admin-logo-image-setting">
                            <?php echo Form::mediaImage('admin_favicon', setting('admin_favicon', config('core.base.general.favicon')), [
                            'allow_thumb' => false,
                        ]); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="admin_title"><?php echo e(trans('core.setting::setting.general.admin_title')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="admin_title" id="admin_title"
                               value="<?php echo e(setting('admin_title')); ?>">
                    </div>

                    <div class="form-group">

                        <label class="text-title-field"
                               for="rich_editor"><?php echo e(trans('core.setting::setting.general.rich_editor')); ?>

                        </label>
                        <label class="hrv-label">
                            <input type="radio" name="rich_editor" class="hrv-radio" value="ckeditor"
                                   <?php if(setting('rich_editor', 'ckeditor') == 'ckeditor'): ?> checked <?php endif; ?>><?php echo e(__('CKEditor')); ?>

                        </label>
                        <label class="hrv-label">
                            <input type="radio" name="rich_editor" class="hrv-radio" value="tinymce"
                                   <?php if(setting('rich_editor', 'ckeditor') == 'tinymce'): ?> checked <?php endif; ?>><?php echo e(__('TinyMCE')); ?>

                        </label>
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="default_admin_theme"><?php echo e(trans('core.setting::setting.general.default_admin_theme')); ?>

                        </label>
                        <div class="ui-select-wrapper">
                            <select name="default_admin_theme" class="ui-select" id="default_admin_theme">
                                <?php $__currentLoopData = Assets::getThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($theme); ?>" <?php if(setting('default_admin_theme', config('core.base.general.default-theme')) === $theme): ?> selected <?php endif; ?>><?php echo e(studly_case($theme)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="mt5">
                            <input type="hidden" name="show_admin_bar" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('show_admin_bar')): ?> checked <?php endif; ?> name="show_admin_bar"> <?php echo e(trans('core.setting::setting.general.show_admin_bar')); ?> </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mt5">
                            <input type="hidden" name="enable_change_admin_theme" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('enable_change_admin_theme')): ?> checked <?php endif; ?> name="enable_change_admin_theme"> <?php echo e(trans('core.setting::setting.general.enable_change_admin_theme')); ?> </label>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="form-group">
                            <div class="mt5">
                                <input type="hidden" name="enable_multi_language_in_admin" value="0">
                                <label><input type="checkbox" class="hrv-checkbox" value="1"
                                              <?php if(setting('enable_multi_language_in_admin')): ?> checked <?php endif; ?> name="enable_multi_language_in_admin"> <?php echo e(trans('core.setting::setting.general.enable_multi_language_in_admin')); ?> </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core.setting::setting.general.seo_block')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core.setting::setting.general.seo_block_description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                               for="seo_title"><?php echo e(trans('core.setting::setting.general.seo_title')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="seo_title" id="seo_title"
                               value="<?php echo e(setting('seo_title')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="text-title-field"
                               for="seo_description"><?php echo e(trans('core.setting::setting.general.seo_description')); ?></label>
                        <textarea data-counter="386"  class="next-input" name="seo_description" id="seo_description"><?php echo e(setting('seo_description')); ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core.setting::setting.general.webmaster_tools_block')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core.setting::setting.general.webmaster_tools_description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                               for="google_site_verification"><?php echo e(trans('core.setting::setting.general.google_site_verification')); ?></label>
                        <input data-counter="120" type="text" class="next-input" name="google_site_verification"
                               id="google_site_verification" value="<?php echo e(setting('google_site_verification')); ?>">
                    </div>

                </div>
            </div>
        </div>

        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2><?php echo e(trans('core.setting::setting.general.cache_block')); ?></h2>
                </div>
                <div class="annotated-section-description pd-all-20 p-none-t">
                    <p class="color-note"><?php echo e(trans('core.setting::setting.general.cache_description')); ?></p>
                </div>
            </div>

            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">

                    <div class="form-group">
                        <label class="text-title-field"
                               for="enable_cache"><?php echo e(trans('core.setting::setting.general.enable_cache')); ?>

                        </label>
                        <label class="hrv-label"><input type="radio" name="enable_cache" class="hrv-radio"
                                                        value="1"
                                                        <?php if(setting('enable_cache')): ?> checked <?php endif; ?>><?php echo e(trans('core.setting::setting.general.yes')); ?>

                        </label>
                        <label class="hrv-label"><input type="radio" name="enable_cache" class="hrv-radio"
                                                        value="0"
                                                        <?php if(!setting('enable_cache')): ?> checked <?php endif; ?>><?php echo e(trans('core.setting::setting.general.no')); ?>

                        </label>
                    </div>

                    <div class="form-group mb0 row">
                        <div class="col-sm-6 p-none-l">
                            <label class="text-title-field"
                                   for="cache_time"><?php echo e(trans('core.setting::setting.general.cache_time')); ?></label>
                            <input type="number" class="next-input" name="cache_time" id="cache_time"
                                   value="<?php echo e(setting('cache_time', 10)); ?>">
                        </div>
                        <div class="col-sm-6 p-none-l">
                            <label class="text-title-field"
                                   for="cache_time_site_map"><?php echo e(trans('core.setting::setting.general.cache_time_site_map')); ?></label>
                            <input type="number" class="next-input" name="cache_time_site_map" id="cache_time_site_map"
                                   value="<?php echo e(setting('cache_time_site_map', 3600)); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mt5">
                            <input type="hidden" name="cache_admin_menu_enable" value="0">
                            <label><input type="checkbox" class="hrv-checkbox" value="1"
                                          <?php if(setting('cache_admin_menu_enable', true)): ?> checked <?php endif; ?> name="cache_admin_menu_enable"> <?php echo e(trans('core.setting::setting.general.cache_admin_menu')); ?> </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo apply_filters(BASE_FILTER_AFTER_SETTING_CONTENT, null); ?>


        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
                &nbsp;
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info" type="submit"><?php echo e(trans('core.setting::setting.save_settings')); ?></button>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.base::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>