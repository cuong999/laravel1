<div class="header-banner">
    <div class="banner-pages">
        <div class="bs-container">
            <div class="banner-content">
                <h1 class="title" data-aos="fade-down"
                    data-aos-delay="1200">{{ trans('plugins.contact::contact.title_contact') }}</h1>
                <p class="desc" data-aos="fade-down" data-aos-delay="1200"><a href="#">{{ trans('bytesoft.home') }}</a>
                    / <a href="#">{{ trans('bytesoft.blog') }}</a></p>
            </div>
        </div>
    </div>
</div>
</header>
<main id="main" class="main-pages">
    <section class="section-contacts">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-box">
                        <div class="module-content">
                            <div class="bs-row bs-row-sm10">
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-right" data-aos-delay="1600">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="title">
                                            <h5>{{ trans('bytesoft.address_title') }}</h5>
                                        </div>
                                        <div class="desc">
                                            <p>{{ theme_option('address') }}</p> <!-- lay trong theme option -->
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-down" data-aos-delay="1400">
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="title">
                                            <h5>{{ trans('bytesoft.email_title')}}</h5>
                                        </div>
                                        <div class="desc">
                                            <p>{{ theme_option('email') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-left" data-aos-delay="1600">
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="title">
                                            <h5>{{ trans('bytesoft.phone_number_title') }}</h5>
                                        </div>
                                        <div class="desc">
                                            <p>{{ theme_option('phone_number') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bs-col">
                    <div class="module module-form">
                        <div class="module-header">
                            <div class="title" data-aos="fade-down" data-aos-delay="0">
                                <h2>{{ trans('plugins.contact::contact.talk_about') }}</h2>
                            </div>
                            {!! Theme::partial('contact') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-map" data-aos="fade-up" data-aos-delay="0">
        <div class="module module-map">
            <div class="module-content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0085651672866!2d105.76500951450481!3d21.032343285996436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b98dce4b6f%3A0x536956e4e6c376ea!2zQ8O0bmcgdHkgQ-G7lSBwaOG6p24gQnl0ZVNvZnQgVmnhu4d0IE5hbQ!5e0!3m2!1sen!2s!4v1536286318837"
                        width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    {!! do_shortcode('[static-block alias="phuong-cham"]') !!}
</main>