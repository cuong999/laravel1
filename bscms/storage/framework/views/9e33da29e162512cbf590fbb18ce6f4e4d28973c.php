<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="canonical" href="<?php echo e(url('/')); ?>">
    <meta http-equiv="content-language" content="<?php echo e(app()->getLocale()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
    <?php echo Theme::header(); ?>

</head>
<body>
<?php echo Theme::partial('header'); ?>

<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                         <span data-aos="zoom-out" data-aos-delay="1200"><?php echo Theme::breadcrumb()->render(); ?></span>
                    </h4>
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
                            
                            <?php $__currentLoopData = get_all_posts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blog-item">
                                <div class="content">
                                    <div class="time-post">
                                        <div class="day">06</div>
                                        <div class="month_year">09/2018</div>
                                    </div>
                                    <div class="img">
                                        <div class="ImagesFrame">
                                            <a href="<?php echo e(route('public.single', $post->slug)); ?>" class="ImagesFrameCrop0">
                                                <?php if($post->image==''): ?>
                                                            <img src="<?php echo Theme::asset()->url('images/no-image-icon-15.png
'); ?>" alt="$post->name ">
                                                            <?php else: ?>  
                                                            <img src="<?php echo e($post->image); ?>"
                                                                alt="<?php echo e($post->name); ?>">
                                                            <?php endif; ?>     
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h4 class="title"><a href="<?php echo e(route('public.single', $post->slug)); ?>"> <?php echo e($post->name); ?> </a></h4>
                                        <p class="time__desc"><span>Posted by</span> <?php echo e($post->user->getFullName()); ?> <span>In</span> Business</p>
                                        <p class="desc"> <?php echo e($post->description); ?> </p>
                                        <a href="<?php echo e(route('public.single', $post->slug)); ?>" class="link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- <div class="blog-pagination">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item "><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                        <?php echo get_all_posts()->links(); ?>

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
                                                                        href="<?php echo e($job->slug); ?>"><?php echo e($job->name); ?></a></h4>
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
                                                <div class="bs-col tn-33-5">
                                                    <a
                                                            href="<?php echo e(route('public.tag', $tag->slug)); ?>"
                                                            class="tag__item"
                                                            title="<?php echo e($tag->name); ?>">
                                                        <?php echo e($tag->name); ?>

                                                    </a>
                                                </div>
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

    <section class="section-slogan">
        <div class="bs-container">
            <p class="desc" data-aos="zoom-out" data-aos-delay="0">Chúng tôi ở đây để làm mọi thứ tốt hơn</p>
        </div>
    </section>
</main>
<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


</body>
</html>