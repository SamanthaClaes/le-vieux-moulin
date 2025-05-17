<?php $headline = get_sub_field('headline') ?>
<?php $gallery = get_sub_field('gallery') ?>
<?php $class = get_sub_field('class') ?>




<section class="section_container">
<div class="div_title_img">
    <?= $headline ?>
</div>

<?php if ($gallery): ?>
    <div class="gallery_flex_wrapper  ">
        <?php foreach ($gallery as $image): ?>
            <div class="div_container">
                <?= responsive_image($image, ['classes' => 'img_gallery', 'lazy' => true]) ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Image non disponible</p>
<?php endif; ?>
</section>
