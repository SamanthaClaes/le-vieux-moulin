<?php $stage = get_field('stage'); ?>

<section class="stage">
    <?php if (isset($stage['supline']) && $stage['supline'] !== ""): ?>
        <p class="stage__supline">
            <?= $stage['supline'] ?>
        </p>
    <?php endif; ?>
    <?php if (isset($stage['headline']) && $stage['headline'] !== ""): ?>
        <h2 class="stage__headline">
            <?= $stage['headline'] ?>
        </h2>
    <?php endif; ?>
    <?php if (isset($stage['subline']) && $stage['subline'] !== ""): ?>
        <p class="stage__supline">
            <?= $stage['subline'] ?>
        </p>
    <?php endif; ?>
    <?php if (isset($stage['text']) && $stage['text'] !== ""): ?>
        <div class="stage__description">
            <?= $stage['text'] ?>
        </div>
    <?php endif; ?>
    <?php if (isset($stage['link']) && $stage['link'] !== ""): ?>
        <a class="stage__link"
           href="<?= $stage['link']['url'] ?>"
           title="<?= $stage['link']['title'] ?>">
            <?= $stage['link']['title'] ?>
        </a>
    <?php endif; ?>
    <?php if (isset($stage['image']) && $stage['image'] !== ""): ?>
        <?= responsive_image($stage['image'], ['lazy' => 'true', 'classes' => 'stage__image']) ?>
    <?php endif; ?>
</section>