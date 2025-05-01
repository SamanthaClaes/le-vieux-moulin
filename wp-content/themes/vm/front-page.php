
<?php $stage = get_field('stage'); ?>


<?php get_header(); ?>
<div class="main_content">
<div class="background">
    <span class="circle circle-1"></span>
    <span class="circle circle-2"></span>
    <span class="circle circle-3"></span>
    <span class="circle circle-4"></span>
    <span class="circle circle-5"></span>
    <span class="circle circle-6"></span>
    <span class="circle circle-7"></span>
    <span class="circle circle-8"></span>
    <span class="circle circle-9"></span>
    <span class="circle circle-10"></span>
    <span class="circle circle-11"></span>
</div>

<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="section_container <?= $class !== '' ? $class : '' ?>">
        <?php if (isset($stage['subline']) && $stage['subline'] !== ""): ?>
            <h2 class="stage__subline">
                <?= $stage['subline'] ?>
            </h2>
        <?php endif; ?>
    </section>
    <figure class="img_container">
        <?= get_the_post_thumbnail(null, 'medium', ['class' => 'front_img'])?>

        <div class="__container_button">
            <div class="div_item">
                <?php
                $links = dw_get_navigation_links('main');
                foreach ($links as $i => $link): ?>
                    <a class="btn-two btn-<?= $i ?>" href="<?= esc_url($link->href) ?>">
                        <?= esc_html($link->label) ?>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </figure>


    <section class="section-projets">
        <h2 class="section_item">Mes projets récents</h2>

        <div class="__div_item_actu">
            <?php
            $projects = new WP_Query([
                'post_type' => 'actu',
                'orderby' => 'asc',
                'posts_per_page' => 3,
            ]);

            if ($projects->have_posts()): while ($projects->have_posts()):
                $projects->the_post();
                $title = get_the_title();
                $image = get_field('image', get_the_ID());
                $text = get_field('text', get_the_ID());
                $permalink = get_the_permalink();
                ?>

                <article class="actu">
                    <?php /* Le "a" est en dehors de la carte "story__card" afin de pouvoir
                        garder un lien propre (accessibilité), rajouter du contenu utile
                        (référençabilité) tout en gardant un design attractif. */ ?>

                    <div class="div__actu__container">
                            <h3 class="__header__item"><?= $title ?></h3>
                        <?= responsive_image($image, ['classes' => 'actu_fig', 'lazy' => true]) ?>
                    </div>

                </article>

            <?php endwhile; else: ?>
                <p>Je n'ai aucun projet a vous montrer.</p>
            <?php endif; ?>

        </div>
    </section>
</div>



<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p>Pas de contenu à afficher.</p>
<?php endif; ?>

<?php get_footer(); ?>

