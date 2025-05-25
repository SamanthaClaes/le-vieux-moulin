<?php /* Template Name: Template About */ ?>
<?php get_header(); ?>
<div class="wrapper">
    <?php include('templates/content/flexible.php') ?>
    <?php the_content(); ?>

    <?php
    //on ouvre "la boucle" (the loop), la strcuture de contrôle de contenu propre a wp
    if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php endwhile; else: ?>
        <!--// on ferme la boucle-->
        <p>Pas de contenu à afficher. </p>
    <?php endif; ?>
</div>
<?php get_footer() ?>

