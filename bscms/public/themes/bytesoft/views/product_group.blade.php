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
    <section class="section-productPage">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-product">
                        <div class="module-header">
                            <h4 class="title" data-aos="fade-down"
                                data-aos-delay="0">{{ $product_group->name}}</h4> 
                        </div>
                        <div><h5>{{ $product_group->description}}</h5></div>

                        <!-- <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                            <div class="product">
                                <div class="bs-row  bs-row-sm10">
                                    @foreach($products as $product)
                                        <div class="bs-col sm-33-10">
                                            <div class="item pro_block">
                                                <div class="img">
                                                    <h4 class="title"><a href="{{ $product->slug }}"
                                                                         class="title_link"><span>{{ $product }}</span></a>
                                                    </h4>
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                                </div>
                                                <div class="description">
                                                    <p class="desc-text">{{ $product->description }}</p>
                                                </div>
                                                <div class="see-more">
                                                    <a href="{{ $product->slug }}"
                                                       class="link">{{ trans('plugins.product::product.view_more') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    {!! do_shortcode('[static-block alias="quy-trinh-dich-vu"]') !!}
    {!! do_shortcode('[static-block alias="phuong-cham"]') !!}
</main>