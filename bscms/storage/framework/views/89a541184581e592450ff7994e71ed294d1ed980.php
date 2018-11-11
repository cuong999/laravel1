<div class="container">
    <h3 class="page-intro__title"><?php echo e($page->name); ?></h3>
    <?php echo Theme::breadcrumb()->render(); ?>

</div>
<div>
    <?php echo $page->content; ?>

</div>