<?php $headline = get_sub_field('headline') ?>
<?php $text = get_sub_field('text') ?>
<?php $link = get_sub_field('link') ?>
<?php $image = get_sub_field('image') ?>
<?php $class = get_sub_field('cs_class') ?>

<div class="section-group">
    <section class="section <?= $class !== '' ? $class : '' ?>">
        <?php if (!empty($headline)): ?>
            <h2 class="section__title <?= $class !== '' ? $class : '' ?>">
                <?= $headline ?>
            </h2>
        <?php endif; ?>

        <div class="section__content">
            <?php if (!empty($text)): ?>
                <div class="section__text">
                    <?= $text ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($link)): ?>
            <a class="section__link" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"
               title="<?= $link['title'] ?>"><?= $link['title'] ?></a>
        <?php endif; ?>
    </section>
</div>











