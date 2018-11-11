<header id="header">
    <div class="header-top">
        <div class="bs-container">
            <div class="top-content">
                <div class="header-social">
                    <div class="social-item item-language">
                        {!! apply_filters('language_switcher') !!}
                    </div>
                </div>

                <div class="header-right clearfix">
                    @if (is_plugin_active('blog'))
                        <div class="right-item">
                            <div class="form-search">
                                <form action="{{ route('public.search') }}" role="search" accept-charset="UTF-8"
                                      method="GET">
                                    <input type="text" name="q" class="search__input"
                                           placeholder="{{  __("Tìm kiếm ...") }}" autocomplete="off">
                                    <button class="search__btn" type="button"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="right-item">
                        <a href="tel://{{ theme_option('phone_number') }}" class="link"><i
                                    class="fas fa-phone"></i>{{ __("Đường dây nóng") }}
                            : {{ theme_option('phone_number') }}</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="bs-container">
            <div class="nav-content">
                <div class="logo">
                    <a href="{{ route('public.index') }}" title="{{ setting('site_title') }}">
                        <img src="{{ url(theme_option('logo', Theme::asset()->url('images/logo.gif'))) }}"
                             alt="{{ setting('site_title') }}">
                    </a>
                </div>
                <div class="nav">
                    <span class="show__menu">
                        <i class="fas fa-bars" data-aos="zoom-out"
                                                data-aos-delay="1200"></i>
                    </span>
                    <div class="menu">
                        {!!
                        Menu::generateMenu([
                            'slug' => 'main-menu',
                            'options' => [],
                            'theme' => true,
                            'view' => 'main-menu',
                            'options' => ['class' => 'menu-list'],
                        ])
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>