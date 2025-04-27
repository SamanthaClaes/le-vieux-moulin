<?php get_header(); ?>

<?php include ('templates/content/stage/stage.php') ?>
<?php include ('templates/content/flexible.php') ?>

    <div class="__div_item_project">
        <?php
        $projects = new WP_Query([
            'post_type' => 'project',
            'orderby' => 'rand',
            'posts_per_page' => 3,
            'post__not_in'=>[$post->ID]
        ]);

        if ($projects->have_posts()): while ($projects->have_posts()):
            $projects->the_post();
            $title = get_the_title();
            $image = get_field('image', get_the_ID());
            $text = get_field('text', get_the_ID());
            $permalink = get_the_permalink();
            ?>

            <article class="projects">
                <?php /* Le "a" est en dehors de la carte "story__card" afin de pouvoir
                        garder un lien propre (accessibilité), rajouter du contenu utile
                        (référençabilité) tout en gardant un design attractif. */ ?>
                <a href="<?= $permalink; ?>" class="project__link">
                    <span class="sro"> <?= __hepl('Accéder à ce projet') ?></span>
                </a>

                <div class="div__card__container">
                        <h3 class="__header__item"><?= $title ?></h3>
                    <?= responsive_image($image, ['classes' => 'story__fig', 'lazy' => true]) ?>
                </div>

            </article>

        <?php endwhile; else: ?>
            <p>Je n'ai aucun projet a vous montrer.</p>
        <?php endif; ?>

    </div>

<?php get_footer(); ?>