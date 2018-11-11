<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e(trans('plugins.product::product.my_product')); ?>

                    </h4>
                    <?php echo Theme::breadcrumb()->render(); ?>

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
                                data-aos-delay="0"><?php echo e($product_group->name); ?></h4>
                        </div>
                        <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                            <div class="product">
                                <div class="bs-row  bs-row-sm10">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="bs-col sm-33-10">
                                            <div class="item pro_block">
                                                <div class="img">
                                                    <h4 class="title"><a href="<?php echo e($product->slug); ?>"
                                                                         class="title_link"><span><?php echo e($product->name); ?></span></a>
                                                    </h4>
                                                    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                                </div>
                                                <div class="description">
                                                    <p class="desc-text"><?php echo e($product->description); ?></p>
                                                </div>
                                                <div class="see-more">
                                                    <a href="<?php echo e($product->slug); ?>"
                                                       class="link"><?php echo e(trans('plugins.product::product.view_more')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo do_shortcode('[static-block alias="quy-trinh-dich-vu"]'); ?>

    <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>

</main>