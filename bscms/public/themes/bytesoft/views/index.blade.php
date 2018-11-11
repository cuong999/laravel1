<main id="main">
    @if(is_plugin_active('slider'))
        <section class="section-bannerIndex">
            <div class="banner-slide">
                @foreach(get_all_slider() as $slider)
                    <div class="banner-item" style="background-image: url('{{ $slider->background }}')">
                        <div class="bs-container">
                            <div class="banner-content">
                                <div class="banner-text" data-aos="fade-right" data-aos-delay="1500">
                                    <p class="desc">{{ $slider->title }}</p>
                                    <p class="desc italic">{{ $slider->description }}</p>
                                    <h1 class="title">BYTESOFT JSC</h1>
                                </div>
                                <div class="banner-img">
                                    <img src="{{ $slider->image }}"
                                         data-aos="fade-up"
                                         data-aos-delay="1000">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {!! do_shortcode('[static-block alias="tai-sao-chon-bytesoft"]') !!}


    @if(is_plugin_active('service'))
        <section class="section-service">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-service">
                            <div class="module-header">
                                <h2 class="title" data-aos="fade-down" data-aos-delay="0">DỊCH VỤ - BYTESOFT</h2>
                                <p class="desc" data-aos="fade-down" data-aos-delay="200">Với tiêu chí "Chất lượng hơn
                                    số
                                    lượng.
                                    ByteSoft luôn tạo ra những sản phẩm có giá trị cao nhất". <span>Đến với chúng tôi, khách hàng sẽ luôn được cung cấp những dịch vụ tốt nhất</span>
                                </p>
                            </div>
                            <div class="module-content">
                                <div class="bs-row row-sm-15">
                                    @foreach(get_service() as $service)
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="service-item" data-aos="fade-left" data-aos-delay="800">
                                                <div class="img">
                                                    <img src="{{ $service->image_hover }}"
                                                         alt="{{ $service->name }}"
                                                         class="active__img">
                                                    <img src="{{ $service->image }}"
                                                         alt="{{ $service->name }}"
                                                         class="base__img">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title">{{ $service->name }}</h3>
                                                    <p class="desc">{!! $service->description  !!}</p>
                                                </div>
                                                <a href="/dich-vu"
                                                   class="link" tab-show="#tab{{$service->id }}"></a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(is_plugin_active('product'))
        <section class="section-product">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-product">
                            <div class="module-header">
                                <h4 class="title" data-aos="fade-down"
                                    data-aos-delay="0">{{ strtoupper(__("Nhóm sản phẩm")) }}</h4>
                            </div>
                            <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                                <div class="bs-row row-sm-15">
                                    @foreach(get_all_product_group() as $group)
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="product-item">
                                                <div class="item-content">
                                                    <h3 class="title">
                                                        <span>{{ __("Sản phẩm") }}</span> {{ $group->name }}</h3>
                                                    <div class="img">
                                                        @if($group->image=='')
                                                            <img src="{!! Theme::asset()->url('images/no-image-icon-15.png
') !!}" alt="$group->name ">
                                                            @else  
                                                            <img src="{{ $group->image }}"
                                                                alt="{{ $group->name }}">
                                                            @endif     

                                                    </div>
                                                    <a href="{{ $group->slug }}" class="link">{{ __("Xem thêm") }}</a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(is_plugin_active('review'))


        <section class="section-opinion">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-opinion">
                            <div class="module-header">
                                <h3 class="title" data-aos="fade-down" data-aos-delay="0">Ý KIẾN PHẢN HỒI TỪ KHÁCH
                                    HÀNG</h3>
                            </div>
                            <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                                <div class="video-show" data-aos="fade-up" data-aos-delay="600">
                                    <div class="show-slide">
                                        @foreach(get_all_review() as $id)
                                            <div class="item">
                                                <div class="slide-item">
                                                    <div class="video-content">
                                                        <div class="youtube" data-embed="$id->link">
                                                            <div class="play-button"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="video-control">
                                    <div class="control-part">
                                        <button class="next__slide">&lsaquo;</button>
                                        <button class="prev__slide">&rsaquo;</button>
                                    </div>
                                    <div class="control-slide" data-aos="fade-down" data-aos-delay="600">
                                        @foreach(get_all_review() as $image)
                                            <div class="item">
                                                <div class="slide-item">
                                                    <div class="video-content">
                                                        <div class="youtube" data-embed="{{ $image->link }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        s
    @endif

    @if (is_plugin_active('blog'))
        <section class="section-news">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-news">
                            <div class="module-header">
                                <h3 class="title" data-aos="fade-down" data-aos-delay="0">{{ __("TIN TỨC") }}</h3>
                            </div>
                            <div class="module-content">
                                <div class="bs-row row-sm-15">
                                    @foreach(get_latest_posts(3) as $post)
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="news-item" data-aos="fade-left" data-aos-delay="600">
                                                <div class="img">
                                                    <!-- lay duong dan = slug vd slug plugin $post -->
                                                    <div class="ImagesFrame">
                                                        <a href="{{ route('public.single', $post->slug) }}" 
                                                           class="ImagesFrameCrop0">
                                                           @if($post->image=='')
                                                            <img src="{!! Theme::asset()->url('images/no-image-icon-15.png
') !!}" alt="$post->name ">
                                                            @else  
                                                            <img src="{{ $post->image }}"
                                                                alt="{{ $post->name }}">
                                                            @endif     
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <div class="text-content">
                                                        <p class="time"><i class="far fa-clock"></i>
                                                            on {{ date_from_database($post->created_at, 'd/m/Y') }}
                                                        </p>
                                                        <h4 class="title"><a
                                                                    href="{{ route('public.single', $post->slug) }}">{{ $post->name }}</a>
                                                        </h4>
                                                        <p class="desc">{{ $post->description }}</p>
                                                        <a href="{{ route('public.single', $post->slug) }}"
                                                           class="link">{{ __("Đọc tiếp") }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="news-button" data-aos="fade-down" data-aos-delay="600">
                                    <a href="/blog"
                                       class="show__more">{{ __("Xem thêm") }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (is_plugin_active('jobs'))
        <section class="section-recruitment">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-recruitment">
                            <div class="module-header">
                                <h4 class="title" data-aos="fade-down"
                                    data-aos-delay="0">{{ __("THÔNG TIN TUYỂN DỤNG") }}</h4>
                            </div>
                            <div class="module-content">
                                <div class="bs-row bs-row-md15">
                                    <div class="bs-col lg-40-15">
                                        <div class="recruitment-img" data-aos="fade-down" data-aos-delay="400">
                                            <img src="{{  Theme::Asset()->url('images/recruitment_item.gif') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="bs-col lg-60-15">
                                        <div class="recruitment-content" data-aos="fade-left" data-aos-delay="800">
                                            <div class="bs-row row-sm-15">
                                                @foreach(get_all_jobs() as $job)
                                                    <div class="bs-col sm-50-15">
                                                        <div class="recruitment-item">
                                                            <h4 class="title">
                                                                <a href="{{ route('public.single', $job->slug) }}">{{ $job->name }}</a>
                                                                <span class="note">{{ __("Nổi bật") }}</span>
                                                            </h4>
                                                            <p class="information">
                                                        <span class="information-day"><i
                                                                    class="fas fa-calendar-alt"></i>
                                                            {{ __('Ngày đăng') }}
                                                            : {{ date_from_database($job->created_at,'d/m/Y') }}</span>
                                                                <span class="information-deadline">
                                                            <i class="fas fa-clock"></i>
                                                                    {{ __("Hạn nộp") }}
                                                                    : {{ date_from_database($job->expiration_at, 'd/m/Y') }}
                                                        </span>
                                                            </p>
                                                            <p class="desc">{!! str_limit($job->description) !!}</p>
                                                            <a href="{{ route('public.single', $job->slug) }}" class="link">Xem thêm</a>
                                                            <a href="#" class="link">Ứng tuyển CV</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recruitment-footer">
                                    <a href="/list-job" class="link" data-aos="fade-left"
                                       data-aos-delay="1000">{{ __("Xem tất cả") }}</a>
                                    <a href="#" class="link" data-aos="fade-right"
                                       data-aos-delay="1000">{{ __("Ứng tuyển ngay") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    {!! do_shortcode('[static-block alias="phuong-cham"]') !!}

</main>