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
    <section class="section-banner while_after">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        <?php echo e(__("Liên hệ")); ?>

                        <?php echo Theme::breadcrumb()->render(); ?>

                    </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="section-contacts">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module">
                        <div class="bs-row row-md-15">
                            <div class="bs-col md-40-15">
                                <div class="module-info">
                                    <div class="module-header">
                                        <div class="title" data-aos="fade-down" data-aos-delay="0">
                                            <h2><?php echo e(trans('plugins.contact::contact.contact_information')); ?></h2>
                                        </div>
                                    </div>
                                    <div class="module-content">
                                        <div class="information">
                                            <div class="item">
                                                <h4 class="sub-title" data-aos="fade-down" data-aos-delay="200">TRỤ SỞ
                                                    CHÍNH TẠI HÀ NỘI</h4>
                                                <p class="address" data-aos="fade-down" data-aos-delay="400"><i
                                                            class="fas fa-map-marker-alt"></i><?php echo e(theme_option("address")); ?>

                                                </p>
                                                <p class="phone-number" data-aos="fade-down" data-aos-delay="600"><i
                                                            class="fas fa-phone-square"></i><?php echo e(theme_option("phone_number")); ?>

                                                </p>
                                                <p class="mail" data-aos="fade-down" data-aos-delay="800"><i
                                                            class="fas fa-envelope"></i><?php echo e(theme_option("email")); ?></p>
                                            </div>
                                            <div class="item">
                                                <h4 class="sub-title" data-aos="fade-down" data-aos-delay="1200">CHI
                                                    NHÁNH TẠI TP HỒ CHÍ MINH</h4>
                                                <p class="address" data-aos="fade-down" data-aos-delay="1400"><i
                                                            class="fas fa-map-marker-alt"></i><?php echo e(theme_option("branch")); ?>

                                                </p>
                                                <p class="phone-number" data-aos="fade-down" data-aos-delay="1600"><i
                                                            class="fas fa-phone-square"></i><?php echo e(theme_option("phone_number")); ?>

                                                </p>
                                                <p class="mail" data-aos="fade-down" data-aos-delay="1800"><i
                                                            class="fas fa-envelope"></i><?php echo e(theme_option("email")); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-col md-60-15">
                                <div class="module-form">
                                    <div class="module-header">
                                        <div class="title" data-aos="fade-down" data-aos-delay="0">
                                            <h2><?php echo e(trans('plugins.contact::contact.form_title')); ?></h2>
                                        </div>
                                    </div>
                                    <div class="module-content">
                                        <?php echo Theme::partial('contact'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-map" data-aos="fade-up" data-aos-delay="0">
        <div class="module module-map">
            <div class="module-content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0085651672866!2d105.76500951450481!3d21.032343285996436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b98dce4b6f%3A0x536956e4e6c376ea!2zQ8O0bmcgdHkgQ-G7lSBwaOG6p24gQnl0ZVNvZnQgVmnhu4d0IE5hbQ!5e0!3m2!1sen!2s!4v1536286318837"
                        width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</main>
<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


</body>
</html>