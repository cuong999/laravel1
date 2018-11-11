<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e(trans('plugins.service::service.title')); ?>

                        <?php echo Theme::breadcrumb()->render(); ?>

                       
                           
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="section-service">
        <div class="bs-container">
            <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-service">
                            <div class="module-content">
                                <div class="bs-tab tab-left">
                                    <div class="tab-container">
                                        <div class="tab-control">
                                            <span class="control__show"><span class="img"><img src="images/icon_service1_1.gif" alt="" class="base__img"><img src="images/icon_service1.gif" alt="" class="active__img"></span> TƯ VẤN CHIẾN LƯỢC CNTT</span>
                                            <ul class="control-list">
                                                 <?php $e=1 ?>
                                                <?php $__currentLoopData = get_service(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="control-list__item <?php echo e($e==1?'active':''); ?>" tab-show="#tab<?php echo e($service->id); ?>"><span class="img"><img src="<?php echo e($service->image); ?>" alt="" class="base__img"><img src="<?php echo e($service->image); ?>" alt="" class="active__img"></span> <?php echo e($service->name); ?></li>
                                                <?php $e++;?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <?php $i=1 ?>
                                            <?php $__currentLoopData = get_service(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tab-item <?php echo e($i==1?'active':''); ?> " id="tab<?php echo e($service->id); ?>">
                                                <h3 class="title"> <?php echo e($service->name); ?> </h3>
                                                <div class="item">
                                                    <?php echo $service->content; ?>

                                                </div>
                                                <div class="img">
                                                    <img src="<?php echo e($service->image); ?>" alt="">
                                                </div>
                                    
                                            </div>
                                            <?php $i++;?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
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