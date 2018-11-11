<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e($post->name); ?>

                    </h4>
                    <?php echo Theme::breadcrumb()->render(); ?>

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
                            <img src="<?php echo e($post->image); ?>" alt="<?php echo e($post->name); ?>">
                            <h4 class="title"><?php echo e($post->name); ?></h4>
                            <p class="time__desc">
                                <span><?php echo e(trans('plugins.blog::posts.post_by')); ?></span> <?php echo e($post->user->getFullName()); ?>

                                , <span><?php echo e(trans('plugins.blog::posts.in')); ?>

                                    </span>
                                <?php if(!$post->categories->isEmpty()): ?>
                                    <a href="<?php echo e(route('public.single', $post->categories->first()->slug)); ?>"><?php echo e($post->categories->first()->name); ?></a>
                                <?php endif; ?></p>
                            <div class="post-content">
                                <?php if(defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post->id, POST_MODULE_SCREEN_NAME))): ?>
                                    <?php echo render_object_gallery($galleries, ($post->categories()->first() ? $post->categories()->first()->name : __('Uncategorized'))); ?>

                                <?php endif; ?>
                                <?php echo $post->content; ?>

                            </div>
                        </div>
                        <div class="detail-social bs-row">
                            <p class="title"><?php echo e(trans('plugins.blog::posts.share')); ?></p>
                            <div class="social-content">
                                <div class="social-item">
                                    <a href="<?php echo e(Request::url()); ?>" class="link"><i
                                                class="fab fa-facebook-square"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="<?php echo e(Request::url()); ?>" class="link"><i class="fab fa-twitter"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="<?php echo e(Request::url()); ?>" class="link"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="<?php echo e(Request::url()); ?>" class="link"><i class="fab fa-instagram"></i></a>
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
                                        <h3 class="title"><?php echo e(trans('plugins.blog::blog.related')); ?></h3>
                                    </div>
                                    <div class="content">
                                        <?php $__currentLoopData = get_related_posts($post->id, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sidebar-item">
                                                <div class="bs-row bs-row-tn5">
                                                    <div class="bs-col tn-40-5">
                                                        <div class="img">
                                                            <div class="ImagesFrame">
                                                                <a href="<?php echo e(route('public.single', $related_item->slug)); ?>"
                                                                   class="ImagesFrameCrop0"
                                                                   title="<?php echo e($related_item->name); ?>">
                                                                    <img src="<?php echo e(get_object_image($related_item->image, 'thumb')); ?>"
                                                                         alt="<?php echo e($related_item->name); ?>">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bs-col tn-60-5">
                                                        <div class="text">
                                                            <h4 class="title">
                                                                <a href="<?php echo e(route('public.single', $related_item->slug)); ?>">
                                                                    <?php echo e($related_item->name); ?>

                                                                </a>
                                                            </h4>
                                                            <p class="desc"><?php echo e($related_item->created_at); ?></p>
                                                            <p class="desc">
                                                                <?php echo e(trans('plugins.blog::posts.post_by')); ?> <?php echo e($related_item->user->getFullName()); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php if(!$post->tags->isEmpty()): ?>
                                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="bs-col tn-33-5">
                                                        <a
                                                                href="<?php echo e(route('public.tag', $tag->slug)); ?>"
                                                                class="tag__item"><?php echo e($tag->name); ?></a>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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