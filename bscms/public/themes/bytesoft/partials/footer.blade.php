<footer id="footer">
    <div class="bs-container">
        <div class="footer-content">
            <div class="footer-top">
                <img src="{{ Theme::asset()->url('images/icon_b.gif') }}" data-aos="fade-up" data-aos-delay="0">
            </div>
            <div class="footer-logo">
                <a href="/"><img src="{{ Theme::asset()->url('images/logo_footer.gif') }}" data-aos="zoom-out"
                                 data-aos-delay="200"></a>

            </div>
            <div class="footer-location">
                <div class="bs-row row-sm-15">
                    <div class="bs-col md-33-15 sm-50-15">
                        <div class="location-item" data-aos="fade-down" data-aos-delay="700">
                            <h4 class="title">{{ __("Trụ sở Hà Nội") }}</h4>

                            <p class="desc">{{ __("Địa chỉ") }}: {{ theme_option('address') }}</p>
                            <p class="desc">{{ __("Số điện thoại") }}: {{ theme_option('phone_number') }}</p>
                            <p class="desc">{{ __("Thư điện tử") }}: {{ theme_option('email') }}</p>
                            <a href="#" class="link"><i class="fas fa-map-marked-alt"></i>{{ __("Xem bản đồ") }}
                            </a>
                        </div>
                    </div>
                    <div class="bs-col md-33-15 sm-50-15" data-aos="fade-down" data-aos-delay="800">
                        <div class="location-item">
                            <h4 class="title">{{ __("Chi nhánh Hồ Chí Minh")  }}</h4>
                            <p class="desc">{{ __("Địa chỉ") }}: {{ theme_option('branch') }}</p>
                            <p class="desc">{{ __("Số điện thoại") }}: {{ theme_option('phone_number') }}</p>
                            <p class="desc">{{ __("Thư điện tử") }}: {{ theme_option('email') }}</p>
                            <a href="#" class="link"><i class="fas fa-map-marked-alt"></i>{{ __("Xem bản đồ") }}
                            </a>

                        </div>
                    </div>
                    <div class="bs-col md-33-15 sm-100-15">
                        <div class="location-item social-content" data-aos="fade-down" data-aos-delay="600">
                            <h4 class="title" data-aos="fade-up"
                                data-aos-delay="400">{{ __("Theo dõi chúng tôi trên mạng xã hội") }}</h4>
                            <div class="footer-social">
                                <div class="social-item">
                                    <a href="{{ theme_option('facebook') }}" class="link"><i
                                                class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="{{ theme_option('twitter') }}" class="link"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="bs-container">
            <p class="desc" data-aos="zoom-in" data-aos-delay="1000"
               data-aos-offset="-200">{{ theme_option('copyright') }}</p>
        </div>

    </div>
</footer>
<div class="back-top">
    <img src="{{ Theme::asset()->url('images/icon_backTop.gif') }}" alt="back to top">
</div>