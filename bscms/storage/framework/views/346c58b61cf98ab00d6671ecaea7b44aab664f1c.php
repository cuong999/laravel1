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
                        <?php if(isset($jobs)): ?>
                            True
                        <?php else: ?>
                            False
                        <?php endif; ?>
                    </h4>
                    <ul class="link-list" data-aos="zoom-out" data-aos-delay="1200">
                        <li class="link-list__item">
                            <a href="" class="link-list__link">Trang chủ</a>
                        </li>
                        <li class="link-list__item">
                            <a href="" class="link-list__link">Tuyển dụng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-recruitment-step">
        <div class="bs-container">
            <div class="bs-row">
                <div class="bs-col">
                    <div class="module module-step">
                        <div class="box-form">
                            <div class="title-rec">
                                <p class="text">
                                    Hãy gửi thông tin ứng tuyển đến chúng tôi theo bước sau
                                </p>
                            </div>
                            <div class="step-recruitment clearfix">
                                <div class="step clearfix">
                                    <div class="step1 step-item active">
                                        <div class="number">
                                            <p>1</p>
                                        </div>
                                        <p class="desc">
                                            Nhập thông tin
                                        </p>
                                    </div>
                                    <div class="step2 step-item">
                                        <div class="number">
                                            <p>2</p>
                                        </div>
                                        <p class="desc">
                                            Xác nhận thông tin
                                        </p>
                                    </div>
                                    <div class="step3 step-item">
                                        <div class="number">
                                            <p>3</p>
                                        </div>
                                        <p class="desc">
                                            hoàn thành
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="step-content">
                                <div class="step-content-1 active" id="step1">
                                    <div class="form-content">
                                        <div class="item">
                                            <label>Họ và tên:</label>
                                            <input type="text" class="input-item">
                                        </div>
                                        <div class="item">
                                            <label>Email:</label>
                                            <input type="text" class="input-item">
                                        </div>
                                        <div class="item">
                                            <label>Số điện thoại:</label>
                                            <input type="text" class="input-item">
                                        </div>
                                        <div class="item">
                                            <label>Liên hệ về vị trí:</label>
                                            <select name="" id="" class="form-control">
                                                
                                                
                                                
                                            </select>
                                        </div>
                                        <div class="item">
                                            <label>Giới thiệu:</label>
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="cv-file">
                                            <div class="cv">
                                                <p class="text">CV của bạn *</p>
                                                <p class="desc">Click để chọn & tải lên CV của bạn</p>
                                            </div>
                                            <input type="file" class="input-item">
                                        </div>
                                        <div class="button">
                                            <button class="comfirm step-color" data-show="#step2">xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content-1" id="step2">
                                    <div class="form-content">
                                        <div class="item">
                                            <label>Họ và tên:</label>
                                            <input type="text" class="input-item" value="Thùy Dung">
                                        </div>
                                        <div class="item">
                                            <label>Email:</label>
                                            <input type="text" class="input-item" value="Dungbeo@gmail.com">
                                        </div>
                                        <div class="item">
                                            <label>Số điện thoại:</label>
                                            <input type="text" class="input-item" value="0989898989">
                                        </div>
                                        <div class="item">
                                            <label>Liên hệ về vị trí:</label>
                                            <select name="" id="" class="form-control">
                                                <option>Design</option>
                                                <option>Tester</option>
                                            </select>
                                        </div>
                                        <div class="item">
                                            <label>Giới thiệu:</label>
                                            <textarea name="" id="" cols="30" rows="10" value="Design"></textarea>
                                        </div>
                                        <div class="cv-file">
                                            <div class="cv">
                                                <p class="text">CV của bạn *</p>
                                                <p class="desc">Click để chọn & tải lên CV của bạn</p>
                                            </div>
                                            <input type="file" class="input-item">
                                        </div>
                                        <div class="button">
                                            <button class="comfirm comfirm2 step-color-2" data-show="#step3">xác nhận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content-1 tks" id="step3">
                                    <div class="form-content">
                                        <div class="text-sussces">
                                            <div class="form1">
                                                <p class="text1">
                                                    Gửi thông tin ứng tuyển thành công!
                                                </p>
                                                <p class="text2">Xin cảm ơn bạn đã ứng tuyển vào công ty chúng tôi. <br>Phòng
                                                    tuyển dụng công ty BYTESOFT sẽ liên lạc với bạn sớm nhất có thể.</p>
                                            </div>
                                            <div class="form2">
                                                <p class="text">
                                                    Phòng tuyển dụng BYTESOFT <br> Email: tuyendung@bytesoft.vn<br> Điện
                                                    thoại: 04.5552.846<br> Ms Đỗ Yến
                                                </p>
                                            </div>
                                            <div class="thanks">
                                                <img src="images/tks-text.gif" alt="">
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
    <section class="section-slogan">
        <div class="bs-container">
            <p class="desc" data-aos="zoom-out" data-aos-delay="0">Chúng tôi ở đây để làm mọi thứ tốt hơn</p>
        </div>
    </section>
</main>

<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


<script>
    $(".comfirm").click(function () {
        $(".step-recruitment").children(".step").find(".step2").addClass("active");

        $(this).parents(".step-content-1").slideUp();
        $($(this).attr("data-show")).slideDown();


    });
    $(".comfirm2").click(function () {
        $(".step-recruitment").children(".step").find(".step3").addClass("active");
    });
    $(".step-color").click(function () {
        $(".step-recruitment").children(".step").addClass("active1");
    });
    $(".step-color-2").click(function () {
        $(".step-recruitment").children(".step").addClass("active2");
    });

</script>

</body>
</html>