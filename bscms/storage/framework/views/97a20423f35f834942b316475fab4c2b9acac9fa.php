<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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
                         <?php echo e(__("Liên hệ")); ?><span data-aos="zoom-out" data-aos-delay="1200"><?php echo Theme::breadcrumb()->render(); ?></span>
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="section-contacts">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-box">
                        <div class="module-content">
                            <div class="bs-row bs-row-sm10">
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-right" data-aos-delay="1600">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="title">
                                            <h5>địa chỉ</h5>
                                        </div>
                                        <div class="desc">
                                            <p><?php echo e(theme_option("address")); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-down" data-aos-delay="1400">
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="title">
                                            <h5>email</h5>
                                        </div>
                                        <div class="desc">
                                            <p><?php echo e(theme_option("email")); ?></p>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-col sm-33-10">
                                    <div class="item" data-aos="fade-left" data-aos-delay="1600">
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="title">
                                            <h5>điện thoại</h5>
                                        </div>
                                        <div class="desc">
                                            
                                            <p><?php echo e(theme_option("phone_number")); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bs-col">
                    <div class="module module-form">
                        <div class="module-header">
                            <div class="title" data-aos="fade-down" data-aos-delay="0">
                               
                            </div>
                        </div>
                        <div class="module-content">
                            <form method="post" action="admin/contacts/add">

                                <div class="form">
                                    <div class="bs-row ns-row-md15">
                                          <?php echo e(csrf_field()); ?>

                                        <div class="bs-col md-100-15">
                                            <input type="text" placeholder="Chủ đề" data-aos="fade-down" data-aos-delay="200" name="theme"  id="theme" >
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('theme')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="bs-col md-50-15">
                                            <input type="text" placeholder="Tên:" data-aos="fade-left" data-aos-delay="400" name="name" id="name"  >
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>

                                        </div>
                                        <div class="bs-col md-50-15">
                                            <input type="text" placeholder="Email:" data-aos="fade-right" data-aos-delay="400" name="email" id="email"  >
                                           
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            
                                        </div>
                                        <div class="bs-col md-100-15">
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Tin nhắn..." data-aos="fade-up" data-aos-delay="600"  ></textarea>
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('message')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="bs-col md-100-15">
                                            <button id="send" data-aos="fade-up" data-aos-delay="800">gửi tin nhắn</button>
                                        </div>
                                        <?php if(session('success')): ?>
                                        <div class="success">
                                              <h4><?php echo e(session('success')); ?></h4>
                                        </div>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-map" data-aos="fade-up" data-aos-delay="0">
        <div class="module module-map">
            <div class="module-content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0085651672866!2d105.76500951450481!3d21.032343285996436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b98dce4b6f%3A0x536956e4e6c376ea!2zQ8O0bmcgdHkgQ-G7lSBwaOG6p24gQnl0ZVNvZnQgVmnhu4d0IE5hbQ!5e0!3m2!1sen!2s!4v1536286318837" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


</body>
</html>
