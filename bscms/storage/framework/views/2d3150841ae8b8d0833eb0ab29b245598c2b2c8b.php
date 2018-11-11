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
    <div class="section-content_detial">
        <div class="bs-container ">
            <div class="content_detail">
                <div class="video">
                    <div class="bs-row row-sm-15">
                        <div class="bs-col sm-50-15">
                            <div class="img">
                                <div class="ImagesFrame">
                                    <a href="<?php echo e($product->slug); ?>" class="ImagesFrameCrop0">
                                        <img src="<?php echo e($product->image); ?>"
                                             alt="<?php echo e($product->name); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bs-col sm-50-15">
                            <div class="content_img">
                                <h4 class="title"><?php echo e($product->name); ?></h4>
                                <span class="desc"><?php echo e(trans('plugins.product::product.date.complete')); ?>

                                    : <?php echo e(date_from_database($product->complete_at, 'd/m/Y')); ?></span>
                                <p>
                                    <?php echo e($product->description); ?>

                                </p>
                                <?php if(isset($product->docs)): ?>
                                    <span class="document"><?php echo e(trans('plugins.product::product.file.title')); ?></span>:
                                    <a
                                            href="<?php echo e($product->docs); ?>"><?php echo e($product->name); ?></a>

                                <?php endif; ?>
                                <span class="contact">
                                        <?php echo e(trans('plugins.product::product.share')); ?>:
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </span>

                                <button class="view"><?php echo e(trans('plugins.product::product.file.view')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info_detail">
                    <h4 class="title"><?php echo e(trans('plugins.product::product.detail_info')); ?></h4>
                    <p class="content">
                        <?php echo $product->content; ?>

                    </p>
                </div>
                <div class="related_product">
                    <h4 class="title"><?php echo e(trans('plugins.product::product.related')); ?></h4>
                    <div class="bs-row row-sm-10">
                        <?php $__currentLoopData = get_related_product($product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bs-col sm-33-10">
                                <div class="img">
                                    <div class="ImagesFrame">
                                        <a href="<?php echo e($item->slug); ?>" class="ImagesFrameCrop0">
                                            <img src="<?php echo e(get_image_url($item->image, "thumb")); ?>"
                                                 alt="<?php echo e($item->name); ?>">
                                        </a>
                                    </div>
                                    <a href="<?php echo e($item->slug); ?>" class="text_hover"><?php echo e($item->name); ?></a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>

</main>