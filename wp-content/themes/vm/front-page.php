<?php $stage = get_field('stage'); ?>
<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <figure class="stage__image-container" aria-label="Image principale avec navigation">
            <?= get_the_post_thumbnail(null, 'full', [
                'class' => 'front_img',
                'alt' => get_the_title()
            ]) ?>

            <div class="stage__button-group">
                <section class="stage__section"
                         aria-label="Introduction">
                    <?php if (!empty($stage['subline'])) : ?>
                        <h1 class="stage__subline"><?= esc_html($stage['subline']) ?></h1>
                    <?php endif; ?>
                </section>
                <div class="stage__button-wrapper">
                    <?php
                    $links = dw_get_navigation_links('main');
                    foreach ($links as $i => $link) : ?>
                        <a class="btn-two btn-<?= $i ?>" href="<?= esc_url($link->href) ?>" aria-label="<?= esc_attr($link->label) ?>">
                            <?= esc_html($link->label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </figure>

        <section class="news" aria-label="Section actualités et projets">
            <h2 class="news__title">Découvrez nos actualités / projets</h2>

            <div class="news__list">
                <?php
                $projects = new WP_Query([
                    'post_type' => 'actu',
                    'orderby' => 'asc',
                    'posts_per_page' => 2,
                ]);

                if ($projects->have_posts()) :
                    while ($projects->have_posts()) :
                        $projects->the_post();
                        $title = get_the_title();
                        $image = get_field('image', get_the_ID());
                        $text = get_field('text', get_the_ID());
                        $permalink = get_the_permalink();
                        ?>
                        <!-- Article individuel -->
                        <article class="card-actu__image" aria-labelledby="card-title-<?= get_the_ID(); ?>">
                            <a href="<?= esc_url($permalink); ?>"
                               class="card-actu__link"
                               aria-label="Voir le projet : <?= esc_attr($title) ?>">
                                <span class="sro">Voir le projet : <?= esc_html($title) ?></span>
                            </a>

                            <div class="card-actu__content">
                                <h3 id="card-title-<?= get_the_ID(); ?>" class="card-actu__title">
                                    <?= esc_html($title) ?>
                                </h3>
                                <?= responsive_image($image, [
                                    'classes' => 'actu_img',
                                    'lazy' => 'lazy',
                                    'alt' => $title
                                ]) ?>
                            </div>
                        </article>
                    <?php endwhile;
                else : ?>
                    <p>Aucun projet à afficher.</p>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile;
    else : ?>
        <p>Pas de contenu à afficher.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
