<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h2 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e(trans('plugins.blog::blog.search.result_for')); ?> "<?php echo e(Request::input('q')); ?>"
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
                            <?php if($posts->count() > 0): ?>

                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="blog-item">
                                        <div class="content">
                                            <div class="time-post">
                                                <div class="day"><?php echo e(date_from_database($post->created_at, 'd')); ?></div>
                                                <div class="month_year"><?php echo e(date_from_database($post->created_at, 'm/Y')); ?></div>
                                            </div>
                                            <div class="img">
                                                <div class="ImagesFrame">
                                                    <a href="<?php echo e(route('public.single', $post->slug)); ?>"
                                                       class="ImagesFrameCrop0">
                                                        <img src="<?php echo e(get_object_image($post->image, 'medium')); ?>"
                                                             alt="<?php echo e($post->name); ?>">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h4 class="title"><a
                                                            href="<?php echo e(route('public.single', $post->slug)); ?>"><?php echo e($post->name); ?></a>
                                                </h4>
                                                <p class="desc"><?php echo e($post->description); ?></p>
                                                <a href="<?php echo e(route('public.single', $post->slug)); ?>"
                                                   class="link"><?php echo e(trans('plugins.blog::blog.view_more')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="content">
                                    <p>
                                        <?php echo e(trans('plugins.blog::blog.search.empty')); ?>

                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($posts->count() > 0): ?>
                            <nav class="blog-pagination">
                                <?php echo $posts->links(); ?>

                            </nav>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bs-col md-33-15 lg-30-15">
                    <div class="main-right" data-aos="fade-right" data-aos-delay="1400">
                        <div class="bs-row bs-row-md15">
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="sidebar">
                                    <div class="head">
                                        <h3 class="title"><?php echo e(trans('plugins.blog::blog.popular')); ?></h3>
                                    </div>
                                    <div class="content">
                                        <?php $__currentLoopData = get_popular_posts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sidebar-item">
                                                <div class="bs-row bs-row-tn5">
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="<?php echo e(route('public.single', $post->slug)); ?>"
                                                                   class="ImagesFrameCrop0"
                                                                   title="<?php echo e($post->name); ?>">
                                                                    <img src="<?php echo e(get_object_image($post->image, 'thumb')); ?>"
                                                                         alt="<?php echo e($post->name); ?>">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title"><a
                                                                        href="<?php echo e(route('public.single', $post->slug)); ?>"><?php echo e($post->name); ?></a>
                                                            </h4>
                                                            <p class="desc"><?php echo e(date_from_database($post->created_at, 'd/m/Y')); ?></p>
                                                            <p class="desc"><?php echo e(__("Đăng bởi")); ?> <?php echo e($post->user->getFullName()); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="sidebar recruitment">
                                    <div class="head">
                                        <h3 class="title"><?php echo e(trans('plugins.jobs::jobs.title')); ?></h3>
                                    </div>
                                    <div class="content">
                                        <div class="sidebar-item">
                                            <div class="bs-row bs-row-tn5">
                                                <?php $__currentLoopData = get_featured_jobs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="#" class="ImagesFrameCrop0">
                                                                    <img src="<?php echo e(get_image_url($job->image,'thumb')); ?>"
                                                                         alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title"><a
                                                                        href="<?php echo e($job->slug); ?>"><?php echo e($job->name); ?></a>
                                                            </h4>
                                                            <p class="desc"><?php echo e(date_from_database($job->created_at,'d,m,Y')); ?></p>
                                                            <p class="desc"><?php echo e(__("Bởi")); ?> <?php echo e(__("Tuyển dụng Bytesoft")); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-col md-100-15 sm-50-15">
                                <div class="tag">
                                    <div class="head">
                                        <h3 class="title"><?php echo e(trans('plugins.blog::tags.model')); ?></h3>
                                    </div>
                                    <div class="content">
                                        <div class="bs-row bs-row-tn5">
                                            <?php $__currentLoopData = get_popular_tags(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a
                                                        href="<?php echo e(route('public.tag', $tag->slug)); ?>"
                                                        class="tag__item"
                                                        title="<?php echo e($tag->name); ?>">
                                                    <?php echo e($tag->name); ?>

                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>

</main>