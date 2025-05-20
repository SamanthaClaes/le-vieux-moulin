<?php $headline = get_sub_field('headline') ?>
<?php $gallery = get_sub_field('gallery') ?>
<?php $class = get_sub_field('class') ?>




<section class="section_container">
    <div class="div_title_img">
        <?= $headline ?>
    </div>

    <?php if ($gallery): ?>
        <div class="gallery_flex_wrapper js-carousel">
            <?php foreach ($gallery as $i => $image): ?>
                <div class="div_container <?= $i === 0 ? ' active' : '' ?>">
                    <?= responsive_image($image, ['classes' => 'img_gallery', 'lazy' => true]) ?>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <p>Image non disponible</p>
    <?php endif; ?>
</section>

