<?php get_header()?>
<?php /* template Name: Template actualités */ ?>

<section class="section-actu" aria-label="Section actualités et projets">
    <h2 class="news__title">Découvrez nos actualités / projets</h2>

    <div class="__div_item_actus">
        <?php
        $projects = new WP_Query([
            'post_type' => 'actu',
            'orderby' => 'asc',
            'posts_per_page' => 4,
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
<?php get_footer()?>