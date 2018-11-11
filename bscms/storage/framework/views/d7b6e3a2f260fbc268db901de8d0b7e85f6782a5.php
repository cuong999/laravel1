<header id="header">
    <div class="header-top">
        <div class="bs-container">
            <div class="top-content">
                <div class="header-social">
                    <div class="social-item item-language">
                        <?php echo apply_filters('language_switcher'); ?>

                    </div>
                </div>

                <div class="header-right clearfix">
                    <?php if(is_plugin_active('blog')): ?>
                        <div class="right-item">
                            <div class="form-search">
                                <form action="<?php echo e(route('public.search')); ?>" role="search" accept-charset="UTF-8"
                                      method="GET">
                                    <input type="text" name="q" class="search__input"
                                           placeholder="<?php echo e(__("Tìm kiếm ...")); ?>" autocomplete="off">
                                    <button class="search__btn" type="button"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="right-item">
                        <a href="tel://<?php echo e(theme_option('phone_number')); ?>" class="link"><i
                                    class="fas fa-phone"></i><?php echo e(__("Đường dây nóng")); ?>

                            : <?php echo e(theme_option('phone_number')); ?></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="bs-container">
            <div class="nav-content">
                <div class="logo">
                    <a href="<?php echo e(route('public.index')); ?>" title="<?php echo e(setting('site_title')); ?>">
                        <img src="<?php echo e(url(theme_option('logo', Theme::asset()->url('images/logo.gif')))); ?>"
                             alt="<?php echo e(setting('site_title')); ?>">
                    </a>
                </div>
                <div class="nav">
                    <span class="show__menu">
                        <i class="fas fa-bars" data-aos="zoom-out"
                                                data-aos-delay="1200"></i>
                    </span>
                    <div class="menu">
                        <?php echo Menu::generateMenu([
                            'slug' => 'main-menu',
                            'options' => [],
                            'theme' => true,
                            'view' => 'main-menu',
                            'options' => ['class' => 'menu-list'],
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>