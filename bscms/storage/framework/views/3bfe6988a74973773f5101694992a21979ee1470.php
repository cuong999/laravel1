<main id="main" class="main-pages">
        <section class="section-banner">
            <div class="banner-page">
                <div class="bs-container">
                    <div class="banner-text">
                        <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                            <?php echo e(__("Sản Phẩm")); ?><span data-aos="zoom-out" data-aos-delay="1200"><?php echo Theme::breadcrumb()->render(); ?></span>
                        </h4>
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
                                <h4 class="title" data-aos="fade-down" data-aos-delay="0">SẢN PHẨM BYTESOFT</h4>
                            </div>
                            <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                                <div class="product">
                                    <div class="bs-row  bs-row-sm10">
                                        <?php $__currentLoopData = get_all_product_group(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="bs-col sm-33-10">
                                            <div class="item pro_block">
                                                <div class="img">
                                                    <h4 class="title"><a href="<?php echo e($group->slug); ?>" class="title_link"><span><?php echo e($group->name); ?></h4>
                                                    <?php if($group->image ==''): ?>    
                                                    <img src="<?php echo Theme::asset()->url('images/no-image-icon-15.png
'); ?>" alt="">
                                                    <?php else: ?>
                                                    <img src="<?php echo e($group->image); ?>" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="description">
                                                    
                                                </div>
                                                <div class="see-more">
                                                    <a href="" class="link">XEM THÊM</a>
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
        <section class="section-productProcedure">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-productProcedure">
                            <div class="module-header">
                                <h3 class="title" data-aos="fade-down" data-aos-delay="0">QUY TRÌNH DỊCH VỤ BYTESOFT</h3>
                                <!-- <p class="desc" data-aos="fade-down" data-aos-delay="200">Chi phí thấp – Giá trị lớn – Chuyên nghiệp - Độc đáo - Tin cậy - Riêng biệt - Thành công</p> -->
                                
                            </div>
                            <div class="module-content">
                                <div class="bs-row bs-row-sm15 bs-row-xs5">
                                    <?php $__currentLoopData = get_svprocess(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bs-col md-25-15 xs-50-5 sm-50-15">
                                        <div class="item" data-aos="fade-down" data-aos-delay="400">
                                            <span class="number"> <?php echo e($process->id); ?> </span>
                                            <div class="img">
                                                <img class="icon" src="<?php echo e($process->image); ?>" alt="">
                                                <img class="icon_hover" src="<?php echo e($process->image_hover); ?>" alt="">
                                            </div>
                                            <p class="title">  <?php echo e($process->name); ?> </p>
                                            <p class="desc"> <?php echo e($process->description); ?> </p>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>

    </main>