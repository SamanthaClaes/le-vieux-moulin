<?php $supline = get_sub_field('supline') ?>
<?php $headline = get_sub_field('headline') ?>
<?php $subline = get_sub_field('subline') ?>
<?php $text = get_sub_field('text') ?>
<?php $cta = get_sub_field('cta') ?>
<?php $cta2 = get_sub_field('cta_copier') ?>
<?php $image = get_sub_field('image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<?php $media_type = get_sub_field('media_type') ?>
<?php $class = get_sub_field('cs_class') ?>


<section class="text-media">
    <div class="text-media__position text-media__position--<?= $media_position ?>">
        <div class="text-media__content-container">
            <?php if ($supline !== '' && isset($supline)): ?>
                <p class="text-media__content-supline"><?= $supline ?></p>
            <?php endif; ?>

            <?php if (!empty($headline)): ?>
                <h2 class="text-media__content-headline <?= $class !== '' ? $class : '' ?>">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($subline)): ?>
                <p class="text-media__content-subline"><?= $subline ?></p>
            <?php endif; ?>

            <?php if (!empty($text)): ?>
                <div class="text-media__content-text"><?= $text ?></div>
            <?php endif; ?>

            <?php if (!empty($cta)): ?>
                <a class="text-media__content-link"
                   href="<?= $cta['url'] ?>"
                   title="<?= $cta['title'] ?>">
                    <?= $cta['title'] ?>
                </a>
            <?php endif; ?>

            <?php if (!empty($cta2)): ?>
                <a class="text-media__content-link"
                   href="<?= $cta2['url'] ?>"
                   title="<?= $cta2['title'] ?>">
                    <?= $cta2['title'] ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if (!empty($image)): ?>
            <?= responsive_image($image, ['classes' => 'text-media__image', 'lazy' => true]) ?>
        <?php endif; ?>
    </div>
</section>
