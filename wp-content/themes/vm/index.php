<?php get_header();?>
<?php
//on ouvre "la boucle" (the loop), la strcuture de contrôle de contenu propre a wp
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?= get_the_title();?></h2>
<div><?= get_the_content();?></div>

<?php endwhile; else: ?>
<!--// on ferme la boucle-->
<p>Pas de contenu à afficher. </p>
<?php endif;?>
<?php get_footer();?>

