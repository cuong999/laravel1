<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h2 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        {{ trans('plugins.blog::blog.search.result_for') }} "{{ Request::input('q') }}"
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="section-blog">
        <div class="bs-container">
            <div class="bs-row bs-row-md">
                <div class="bs-col md-66-15 lg-70-15">
                    <div class="main-left" data-aos="fade-left" data-aos-delay="1400">
                        <div class="blog-content">
                            @if ($posts->count() > 0)

                                @foreach ($posts as $post)
                                    <div class="blog-item">
                                        <div class="content">
                                            <div class="time-post">
                                                <div class="day">{{ date_from_database($post->created_at, 'd') }}</div>
                                                <div class="month_year">{{ date_from_database($post->created_at, 'm/Y') }}</div>
                                            </div>
                                            <div class="img">
                                                <div class="ImagesFrame">
                                                    <a href="{{ route('public.single', $post->slug) }}"
                                                       class="ImagesFrameCrop0">
                                                        <img src="{{ get_object_image($post->image, 'medium') }}"
                                                             alt="{{ $post->name }}">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4 class="title"><a
                                                            href="{{ route('public.single', $post->slug) }}">{{ $post->name }}</a>
                                                </h4>
                                                <p class="desc">{{ $post->description }}</p>
                                                <a href="{{ route('public.single', $post->slug) }}"
                                                   class="link">{{ trans('plugins.blog::blog.view_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="content">
                                    <p>
                                        {{ trans('plugins.blog::blog.search.empty') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                        @if ($posts->count() > 0)
                            <nav class="blog-pagination">
                                {!! $posts->links() !!}
                            </nav>
                        @endif
                    </div>
                </div>
                <div class="bs-col md-33-15 lg-30-15">
                    <div class="main-right" data-aos="fade-right" data-aos-delay="1400">
                        <div class="bs-row bs-row-md15">
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="sidebar">
                                    <div class="head">
                                        <h3 class="title">{{ trans('plugins.blog::blog.popular') }}</h3>
                                    </div>
                                    <div class="content">
                                        @foreach(get_popular_posts() as $post)
                                            <div class="sidebar-item">
                                                <div class="bs-row bs-row-tn5">
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="{{ route('public.single', $post->slug) }}"
                                                                   class="ImagesFrameCrop0"
                                                                   title="{{ $post->name }}">
                                                                    <img src="{{ get_object_image($post->image, 'thumb') }}"
                                                                         alt="{{ $post->name }}">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title"><a
                                                                        href="{{ route('public.single', $post->slug) }}">{{ $post->name }}</a>
                                                            </h4>
                                                            <p class="desc">{{ date_from_database($post->created_at, 'd/m/Y') }}</p>
                                                            <p class="desc">{{ __("Đăng bởi") }} {{ $post->user->getFullName() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="sidebar recruitment">
                                    <div class="head">
                                        <h3 class="title">{{ trans('plugins.jobs::jobs.title') }}</h3>
                                    </div>
                                    <div class="content">
                                        <div class="sidebar-item">
                                            <div class="bs-row bs-row-tn5">
                                                @foreach(get_featured_jobs() as $job)
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="#" class="ImagesFrameCrop0">
                                                                    <img src="{{ get_image_url($job->image,'thumb') }}"
                                                                         alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title"><a
                                                                        href="{{$job->slug}}">{{ $job->name }}</a>
                                                            </h4>
                                                            <p class="desc">{{ date_from_database($job->created_at,'d,m,Y') }}</p>
                                                            <p class="desc">{{ __("Bởi") }} {{ __("Tuyển dụng Bytesoft") }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="tag">
                                    <div class="head">
                                        <h3 class="title">{{ trans('plugins.blog::tags.model') }}</h3>
                                    </div>
                                    <div class="content">
                                        <div class="bs-row bs-row-tn5">
                                            @foreach(get_popular_tags() as $tag)
                                                <a
                                                        href="{{ route('public.tag', $tag->slug) }}"
                                                        class="tag__item"
                                                        title="{{ $tag->name }}">
                                                    {{ $tag->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! do_shortcode('[static-block alias="phuong-cham"]') !!}
</main>