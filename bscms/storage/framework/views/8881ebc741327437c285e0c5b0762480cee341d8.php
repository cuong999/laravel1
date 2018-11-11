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

    <section class="section-banner white_after">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        GIỚI THIỆU BYTESOFT
                    </h4>
                    <?php echo Theme::breadcrumb()->render(); ?>

                </div>
            </div>
        </div>
    </section>

    <section class="section-aboutPage">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-about">
                        <div class="module-content">
                            <div class="introduct">
                                <div class="bs-row row-md-10">
                                    <div class="bs-col lg-50-10 md-50-10">
                                        <div class="img" data-aos="fade-down" data-aos-delay="1400">
                                            <img src="images/img-about-1.gif" alt="">
                                        </div>
                                    </div>
                                    <div class="bs-col lg-50-10 md-50-10">
                                        <div class="experience">
                                            <div class="year">
                                                <div class="border" data-aos="fade-down" data-aos-delay="1600">
                                                    <span class="number" data-aos="fade-down"
                                                          data-aos-delay="1800">05</span>
                                                    <p class="text" data-aos="fade-down" data-aos-delay="2000">Kinh
                                                        nghiệm làm việc nhiều năm</p>
                                                </div>
                                            </div>
                                            <h4 class="title" data-aos="fade-down" data-aos-delay="2200">CHÚNG TÔI LÀ
                                                AI?
                                            </h4>
                                            <p class="desc" data-aos="fade-down" data-aos-delay="2400">Giữa bối cảnh hội
                                                nhập của nền kinh tế, cùng với sự phát triển như vũ bão của internet và
                                                thương mại điện tử, ByteSoft VN ra đời như một tất yếu với những hoài
                                                bão lớn lao trong sự nghiệp Thiết kế website, Lập trình phần mềm, Phần
                                                mềm giáo dục, Phần mềm Blockchain. Trước nhu cầu mạnh mẽ và cần thiết
                                                của các doanh nghiệp, tổ chức, cá nhân, ByteSoft đã cho ra đời hàng trăm
                                                website ấn tượng, phần mềm giáo dục, video quảng cáo duy nhất và độc đáo
                                                theo cách riêng biệt có chiều sâu.
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
    </section>

    <section class="section-box">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module-box">
                        <div class="module-content">
                            <div class="bs-row row-sm-15">
                                <div class="bs-col sm-50-15">
                                    <div class="item-box vision" data-aos="fade-down" data-aos-delay="0">
                                        <div class="img">
                                            <img src="images/icon-box-about-1.gif" alt="Tầm nhìn">
                                        </div>
                                        <h4 class="title">TẦM NHÌN</h4>
                                        <p class="desc">Bytesoft thấu hiểu được sứ mệnh của mình là nghiên cứu và xây
                                            dựng các giải pháp, sản phẩm IT tối ưu nhất nhằm đem lại những giá trị thực
                                            tế cho khách hàng. Đồng thời chúng tôi cũng nỗ lực tạo ra những đóng góp
                                            tích cực cho sự phát triển của ngành CNTT Việt Nam nói riêng và sự phát
                                            triển của đất nước nói chung.
                                        </p>
                                    </div>
                                </div>
                                <div class="bs-col sm-50-15">
                                    <div class="item-box mission" data-aos="fade-down" data-aos-delay="200">
                                        <div class="img">
                                            <img src="images/icon-box-about-2.gif" alt="Sứ mệnh">
                                        </div>
                                        <h4 class="title">SỨ MỆNH</h4>
                                        <p class="desc">Bytesoft thấu hiểu được sứ mệnh của mình là nghiên cứu và xây
                                            dựng các giải pháp, sản phẩm IT tối ưu nhất nhằm đem lại những giá trị thực
                                            tế cho khách hàng. Đồng thời chúng tôi cũng nỗ lực tạo ra những đóng góp
                                            tích cực cho sự phát triển của ngành CNTT Việt Nam nói riêng và sự phát
                                            triển của đất nước nói chung.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-our">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module-our">
                        <div class="module-content" data-aos="fade-left" data-aos-delay="600">
                            <p class="subtitle">Về chúng tôi</p>
                            <h4 class="title">ĐIỀU GÌ LÀM BYTESOFT <span class="green">KHÁC BIỆT?</span></h4>
                            <p class="desc">Chúng tôi muốn tạo ra khác biệt không chỉ ở công nghệ mà còn ở con người.
                                Ngoài việc thường cập nhật những xu hướng công nghệ mới nhất cũng như những kiến thức về
                                chuyên môn, tại Bytesoft chúng tôi luôn đặt con người làm trung tâm.
                            </p>

                            <div class="item customer">
                                <div class="icon">
                                    <img src="images/icon-our-1.gif" alt="Khách hàng">
                                </div>
                                <div class="text">
                                    <p class="desc"><span class="green">Khách hàng: </span>Chúng tôi luôn nỗ lực thấu
                                        hiểu và đáp ứng mọi nhu cầu của khách hàng từ những chi tiết nhỏ nhất. Đến với
                                        Bytesoft, khách hàng không chỉ giải được bài toán khó về công nghệ thông tin còn
                                        đang vướng mắc và còn được trải nghiệm cung cách làm việc chuyên nghiệp, uy tín
                                        và hiệu quả tuyệt đối của chúng tôi.</p>
                                </div>
                            </div>
                            <div class="item employees">
                                <div class="icon">
                                    <img src="images/icon-our-2.gif" alt="Nhân viên">
                                </div>
                                <div class="text">
                                    <p class="desc"><span class="green"> Nhân viên: </span>Với nguồn lực tinh nhuệ đang
                                        nắm giữ, Bytesoft tự tin khẳng định sự khác biệt trong từng sản phẩm, dịch vụ
                                        của mình. Bằng những phương pháp đào tạo riêng biệt, chúng tôi đã, đang và sẽ ra
                                        những đội ngũ không chỉ giỏi về chuyên môn mà còn đầy nhiệt huyết và trách nhiệm
                                        với công việc.</p>
                                </div>
                            </div>

                            <div class="img" data-aos="fade-right" data-aos-delay="800">
                                <img src="images/img-about-2.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(is_plugin_active('service')): ?>
        <section class="section-service  section-servicePage">
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
                                                <a href="<?php echo e($service->slug); ?>"
                                                   class="link"></a>
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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    

    <?php echo do_shortcode('[static-block alias="phuong-cham"]'); ?>


</main>

<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


</body>
</html>