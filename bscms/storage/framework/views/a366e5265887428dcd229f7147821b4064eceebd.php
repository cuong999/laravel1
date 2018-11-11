<main id="main">
    <?php if(is_plugin_active('slider')): ?>
        <section class="section-bannerIndex">
            <div class="banner-slide">
                <?php $__currentLoopData = get_all_slider(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="banner-item" style="background-image: url('<?php echo e($slider->background); ?>')">
                        <div class="bs-container">
                            <div class="banner-content">
                                <div class="banner-text" data-aos="fade-right" data-aos-delay="1500">
                                    <p class="desc"><?php echo e($slider->title); ?></p>
                                    <p class="desc italic"><?php echo e($slider->description); ?></p>
                                    <h1 class="title">BYTESOFT JSC</h1>
                                </div>
                                <div class="banner-img">
                                    <img src="<?php echo e($slider->image); ?>"
                                         data-aos="fade-up"
                                         data-aos-delay="1000">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php echo do_shortcode('[static-block alias="tai-sao-chon-bytesoft"]'); ?>



    <?php if(is_plugin_active('service')): ?>
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
                                    <?php $__currentLoopData = get_service(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="service-item" data-aos="fade-left" data-aos-delay="800">
                                                <div class="img">
                                                    <img src="<?php echo e($service->image_hover); ?>"
                                                         alt="<?php echo e($service->name); ?>"
                                                         class="active__img">
                                                    <img src="<?php echo e($service->image); ?>"
                                                         alt="<?php echo e($service->name); ?>"
                                                         class="base__img">
                                                </div>
                                                <div class="text">
                                                    <h3 class="title"><?php echo e($service->name); ?></h3>
                                                    <p class="desc"><?php echo $service->description; ?></p>
                                                </div>
                                                <a href="/dich-vu"
                                                   class="link" tab-show="#tab<?php echo e($service->id); ?>"></a>
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
    <?php endif; ?>
    <?php if(is_plugin_active('product')): ?>
        <section class="section-product">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-product">
                            <div class="module-header">
                                <h4 class="title" data-aos="fade-down"
                                    data-aos-delay="0"><?php echo e(strtoupper(__("Nhóm sản phẩm"))); ?></h4>
                            </div>
                            <div class="module-content" data-aos="fade-up" data-aos-delay="400">
                                <div class="bs-row row-sm-15">
                                    <?php $__currentLoopData = get_all_product_group(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="product-item">
                                                <div class="item-content">
                                                    <h3 class="title">
                                                        <span><?php echo e(__("Sản phẩm")); ?></span> <?php echo e($group->name); ?></h3>
                                                    <div class="img">
                                                        <?php if($group->image==''): ?>
                                                            <img src="<?php echo Theme::asset()->url('images/no-image-icon-15.png
'); ?>" alt="$group->name ">
                                                            <?php else: ?>  
                                                            <img src="<?php echo e($group->image); ?>"
                                                                alt="<?php echo e($group->name); ?>">
                                                            <?php endif; ?>     

                                                    </div>
                                                    <a href="<?php echo e($group->slug); ?>" class="link"><?php echo e(__("Xem thêm")); ?></a>
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
        </section>
    <?php endif; ?>
    <?php if(is_plugin_active('review')): ?>


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
                                        <?php $__currentLoopData = get_all_review(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <div class="slide-item">
                                                    <div class="video-content">
                                                        <div class="youtube" data-embed="$id->link">
                                                            <div class="play-button"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="video-control">
                                    <div class="control-part">
                                        <button class="next__slide">&lsaquo;</button>
                                        <button class="prev__slide">&rsaquo;</button>
                                    </div>
                                    <div class="control-slide" data-aos="fade-down" data-aos-delay="600">
                                        <?php $__currentLoopData = get_all_review(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <div class="slide-item">
                                                    <div class="video-content">
                                                        <div class="youtube" data-embed="<?php echo e($image->link); ?>">
                                                        </div>
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
        s
    <?php endif; ?>

    <?php if(is_plugin_active('blog')): ?>
        <section class="section-news">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-news">
                            <div class="module-header">
                                <h3 class="title" data-aos="fade-down" data-aos-delay="0"><?php echo e(__("TIN TỨC")); ?></h3>
                            </div>
                            <div class="module-content">
                                <div class="bs-row row-sm-15">
                                    <?php $__currentLoopData = get_latest_posts(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="bs-col md-33-15 sm-50-15">
                                            <div class="news-item" data-aos="fade-left" data-aos-delay="600">
                                                <div class="img">
                                                    <!-- lay duong dan = slug vd slug plugin $post -->
                                                    <div class="ImagesFrame">
                                                        <a href="<?php echo e(route('public.single', $post->slug)); ?>" 
                                                           class="ImagesFrameCrop0">
                                                           <?php if($post->image==''): ?>
                                                            <img src="<?php echo Theme::asset()->url('images/no-image-icon-15.png
'); ?>" alt="$post->name ">
                                                            <?php else: ?>  
                                                            <img src="<?php echo e($post->image); ?>"
                                                                alt="<?php echo e($post->name); ?>">
                                                            <?php endif; ?>     
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <div class="text-content">
                                                        <p class="time"><i class="far fa-clock"></i>
                                                            on <?php echo e(date_from_database($post->created_at, 'd/m/Y')); ?>

                                                        </p>
                                                        <h4 class="title"><a
                                                                    href="<?php echo e(route('public.single', $post->slug)); ?>"><?php echo e($post->name); ?></a>
                                                        </h4>
                                                        <p class="desc"><?php echo e($post->description); ?></p>
                                                        <a href="<?php echo e(route('public.single', $post->slug)); ?>"
                                                           class="link"><?php echo e(__("Đọc tiếp")); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="news-button" data-aos="fade-down" data-aos-delay="600">
                                    <a href="/blog"
                                       class="show__more"><?php echo e(__("Xem thêm")); ?></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(is_plugin_active('jobs')): ?>
        <section class="section-recruitment">
            <div class="bs-container">
                <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-recruitment">
                            <div class="module-header">
                                <h4 class="title" data-aos="fade-down"
                                    data-aos-delay="0"><?php echo e(__("THÔNG TIN TUYỂN DỤNG")); ?></h4>
                            </div>
                            <div class="module-content">
                                <div class="bs-row bs-row-md15">
                                    <div class="bs-col lg-40-15">
                                        <div class="recruitment-img" data-aos="fade-down" data-aos-delay="400">
                                            <img src="<?php echo e(Theme::Asset()->url('images/recruitment_item.gif')); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="bs-col lg-60-15">
                                        <div class="recruitment-content" data-aos="fade-left" data-aos-delay="800">
                                            <div class="bs-row row-sm-15">
                                                <?php $__currentLoopData = get_all_jobs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="bs-col sm-50-15">
                                                        <div class="recruitment-item">
                                                            <h4 class="title">
                                                                <a href="<?php echo e(route('public.single', $job->slug)); ?>"><?php echo e($job->name); ?></a>
                                                                <span class="note"><?php echo e(__("Nổi bật")); ?></span>
                                                            </h4>
                                                            <p class="information">
                                                        <span class="information-day"><i
                                                                    class="fas fa-calendar-alt"></i>
                                                            <?php echo e(__('Ngày đăng')); ?>

                                                            : <?php echo e(date_from_database($job->created_at,'d/m/Y')); ?></span>
                                                                <span class="information-deadline">
                                                            <i class="fas fa-clock"></i>
                                                                    <?php echo e(__("Hạn nộp")); ?>

                                                                    : <?php echo e(date_from_database($job->expiration_at, 'd/m/Y')); ?>

                                                        </span>
                                                            </p>
                                                            <p class="desc"><?php echo str_limit($job->description); ?></p>
                                                            <a href="<?php echo e(route('public.single', $job->slug)); ?>" class="link">Xem thêm</a>
                                                            <a href="#" class="link">Ứng tuyển CV</a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recruitment-footer">
                                    <a href="/list-job" class="link" data-aos="fade-left"
                                       data-aos-delay="1000"><?php echo e(__("Xem tất cả")); ?></a>
                                    <a href="#" class="link" data-aos="fade-right"
                                       data-aos-delay="1000"><?php echo e(__("Ứng tuyển ngay")); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>


</main>