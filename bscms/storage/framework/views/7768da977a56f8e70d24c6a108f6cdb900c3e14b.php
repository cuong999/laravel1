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

<?php echo Theme::content(); ?>

<?php echo Theme::partial('footer'); ?>


<?php echo Theme::footer(); ?>


<script>
    $(".item-language").find(".title").click(function () {
        $(this).parent(".item-language").find(".social-list").toggleClass("active");
    });

</script>
<script>
    (function () {

        var youtube = document.querySelectorAll(".youtube");
        for (var i = 0; i < youtube.length; i++) {
            var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";
            var image = new Image();
            image.src = source;
            image.addEventListener("load", function () {
                youtube[i].appendChild(image);
            }(i));
            youtube[i].addEventListener("click", function () {
                var iframe = document.createElement("iframe");
                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("allowfullscreen", "");
                iframe.setAttribute("width", "100%");
                iframe.setAttribute("height", "100%");
                iframe.setAttribute("allow", "autoplay");
                iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&autoplay=1");
                this.innerHTML = "";
                this.appendChild(iframe);
            });
        }
        ;
    })();

</script>

</body>
</html>