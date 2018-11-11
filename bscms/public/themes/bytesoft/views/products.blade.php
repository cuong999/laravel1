@if(!isset($products))
    {{ redirect(route('public.index')) }}
@endif

<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        {{ trans('plugins.product::product.my_product') }}
                    </h4>
                    {!! Theme::breadcrumb()->render() !!}
                </div>
            </div>
        </div>
    </section>
    <div class="section-content_detial">
        <div class="bs-container ">
            <div class="content_detail">
                <div class="video">
                    <div class="bs-row row-sm-15">
                        <div class="bs-col sm-50-15">
                            <div class="img">
                                <div class="ImagesFrame">
                                    <a href="{{ $products->slug }}" class="ImagesFrameCrop0">
                                        <img src="{{ get_image_url($products->image, 'medium') }}}"
                                             alt="{{ $products->name }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bs-col sm-50-15">
                            <div class="content_img">
                                <h4 class="title">{{ $products->name }}</h4>
                                <span class="desc">{{ trans('plugins.product::product.date.complete') }}
                                    : {{ date_from_database($producs->complete_at, 'd/m/Y') }}</span>
                                <p>
                                    {{ $products->description }}
                                </p>
                                <span class="document">{{ trans('plugins.product::product.file.title') }}: <a
                                            href="{{ $products->docs }}">{{ $products->docs }}</a></span>
                                <span class="contact">
                                        {{ trans('plugins.product::product.share') }}:
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </span>

                                <button class="view">{{ $products->video }}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info_detail">
                    <h4 class="title">{{ trans('plugins.product::product.detail_info') }}</h4>
                    <p class="content">
                        {!! $products->content !!}
                    </p>
                </div>
                <div class="related_product">
                    <h4 class="title">{{ trans('plugins.product::product.related') }}</h4>
                    <div class="bs-row row-sm-10">
                        @foreach(get_related_product($products->id) as $product)
                            <div class="bs-col sm-33-10">
                                <div class="img">
                                    <div class="ImagesFrame">
                                        <a href="{{ $product->slug }}" class="ImagesFrameCrop0">
                                            <img src="{{ get_image_url($product->image, "thumb") }}"
                                                 alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                    <a href="{{ $product->slug }}" class="text_hover">{{ $product->name }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-slogan">
        <div class="bs-container">
            <p class="desc" data-aos="zoom-out" data-aos-delay="0">Chúng tôi ở đây để làm mọi thứ tốt hơn</p>
        </div>
    </section>