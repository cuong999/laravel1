<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        {{ $post->name }}
                    </h4>
                    {!! Theme::breadcrumb()->render() !!}
                </div>
            </div>
        </div>
    </section>
    <section class="section-blog">
        <div class="bs-container">
            <div class="bs-row bs-row-md">
                <div class="bs-col md-66-15 lg-70-15">
                    <div class="main-left" data-aos="fade-left" data-aos-delay="1400">
                        <div class="detail-content">
                            <img src="{{ $post->image }}" alt="{{ $post->name }}">
                            <h4 class="title">{{ $post->name }}</h4>
                            <p class="time__desc">
                                <span>{{ trans('plugins.blog::posts.post_by') }}</span> {{ $post->user->getFullName() }}
                                , <span>{{ trans('plugins.blog::posts.in') }}
                                    </span>
                                @if (!$post->categories->isEmpty())
                                    <a href="{{ route('public.single', $post->categories->first()->slug) }}">{{ $post->categories->first()->name }}</a>
                                @endif</p>
                            <div class="post-content">
                                @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post->id, POST_MODULE_SCREEN_NAME)))
                                    {!! render_object_gallery($galleries, ($post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'))) !!}
                                @endif
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="detail-social bs-row">
                            <p class="title">{{ trans('plugins.blog::posts.share') }}</p>
                            <div class="social-content">
                                <div class="social-item">
                                    <a href="{{ Request::url() }}" class="link"><i
                                                class="fab fa-facebook-square"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="{{ Request::url() }}" class="link"><i class="fab fa-twitter"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="{{ Request::url() }}" class="link"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="{{ Request::url() }}" class="link"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bs-col md-33-15 lg-30-15">
                    <div class="main-right" data-aos="fade-right" data-aos-delay="1400">
                        <div class="bs-row bs-row-md15">
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="sidebar">
                                    <div class="head">
                                        <h3 class="title">{{ trans('plugins.blog::blog.related') }}</h3>
                                    </div>
                                    <div class="content">
                                        @foreach (get_related_posts($post->id, 5) as $related_item)
                                            <div class="sidebar-item">
                                                <div class="bs-row bs-row-tn5">
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="{{ route('public.single', $related_item->slug) }}"
                                                                   class="ImagesFrameCrop0"
                                                                   title="{{ $related_item->name }}">
                                                                    <img src="{{ get_object_image($related_item->image, 'thumb') }}"
                                                                         alt="{{ $related_item->name }}">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title">
                                                                <a href="{{ route('public.single', $related_item->slug) }}">
                                                                    {{ $related_item->name }}
                                                                </a>
                                                            </h4>
                                                            <p class="desc">{{ $related_item->created_at }}</p>
                                                            <p class="desc">
                                                                {{ trans('plugins.blog::posts.post_by') }} {{ $related_item->user->getFullName() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
                                            @if (!$post->tags->isEmpty())
                                                @foreach ($post->tags as $tag)
                                                    <div class="bs-col tn-33-5">
                                                        <a
                                                                href="{{ route('public.tag', $tag->slug) }}"
                                                                class="tag__item">{{ $tag->name }}</a>
                                                    </div>
                                                @endforeach
                                            @endif
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