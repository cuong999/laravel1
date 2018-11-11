<?php if(!$jobs): ?>
    <?php echo e(redirect(route('public.index'))); ?>

<?php endif; ?>

<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e(trans('plugins.jobs::jobs.title')); ?>

                        <span data-aos="zoom-out" data-aos-delay="1200">
                            <?php echo Theme::breadcrumb()->render(); ?>

                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="section-recruitDetail">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-recruitDetail" data-aos="zoom-in" data-aos-delay="1200">
                        <div class="module-content">
                            <div class="detail">
                                <div class="item">
                                    <div class="border-item">
                                        <div class="bs-row bs-row-lg15">
                                            <div class="bs-col lg-50-15">
                                                <div class="left">
                                                    <h4 class="title maintitle"><?php echo e($jobs->name); ?><span
                                                                class="status">Urgent</span></h4>
                                                    <div class="date">
                                                        <p class="date-posts"><i
                                                                    class="fas fa-calendar-alt"></i><?php echo e(trans('plugins.jobs::jobs.created_at')); ?>

                                                            : <?php echo e(date_from_database($jobs->created_at,'d/m/Y')); ?></p>
                                                        <p class="deadline"><i
                                                                    class="fas fa-clock"></i><?php echo e(trans('plugins.jobs::jobs.expired ')); ?>

                                                            : <?php echo e(date_from_database($jobs->expiration_at, 'd/m/Y')); ?>

                                                        </p>
                                                    </div>
                                                    <div class="amount-address">
                                                        <p class="text"><?php echo e(trans('plugins.jobs::jobs.count ')); ?>

                                                            <span><?php echo e($jobs->num); ?></span></p>
                                                        <p class="text"><?php echo e(trans('plugins.jobs::jobs.count ')); ?>

                                                            <span> <?php echo e($jobs->place); ?></span></p>
                                                    </div>
                                                    <div class="description">
                                                        <h4 class="subtitle title"><?php echo e(trans('plugins.jobs::jobs.description ')); ?></h4>
                                                        <p class="text">
                                                            <?php echo $jobs->description; ?>


                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bs-col lg-50-15">
                                                <div class="right">
                                                    <div class="border">
                                                        <a href="/" class="apply"><?php echo e(trans('plugins.jobs::jobs.apply ')); ?></a>
                                                        <a href="/" class="see-all"><?php echo e(trans('plugins.jobs::jobs.view_all ')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="bs-row bs-row-sm15">
                                        <div class="bs-col sm-50-15">
                                            <div class="left request">
                                                <h4 class="subtitle title"><?php echo e(trans('plugins.jobs::jobs.require ')); ?></h4>
                                                <p class="text">
                                                    <?php echo $jobs->content; ?>

                                                </p>
                                            </div>
                                        </div>
                                        <div class="bs-col sm-50-15">
                                            <div class="right bnf">
                                                <h4 class="subtitle title"><?php echo e(trans('plugins.jobs::jobs.interest ')); ?></h4>
                                                <p class="text">
                                                    <?php echo $jobs->interest; ?>

                                                </p>
                                            </div>
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