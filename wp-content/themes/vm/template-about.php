<?php /* Template Name: Template About */ ?>
<?php get_header(); ?>
<div class="main_content_house">
<div class="background_house">
    <span class="circle circle-1-house"></span>
    <span class="circle circle-2-house"></span>
    <span class="circle circle-3-house"></span>
    <span class="circle circle-4-house"></span>
    <span class="circle circle-5-house"></span>
    <span class="circle circle-6-house"></span>
    <span class="circle circle-7-house"></span>
    <span class="circle circle-8-house"></span>
    <span class="circle circle-9-house"></span>
    <span class="circle circle-10-house"></span>
    <span class="circle circle-11-house"></span>
</div>
<div class="wrapper">
<?php include('templates/content/stage/stage.php') ?>
<?php include('templates/content/flexible.php') ?>

<body>

<?php the_content(); ?>

<?php
//on ouvre "la boucle" (the loop), la strcuture de contrôle de contenu propre a wp
if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php endwhile; else: ?>
    <!--// on ferme la boucle-->
    <p>Pas de contenu à afficher. </p>
<?php endif; ?>
</div>
</div>
<?php get_footer() ?>
</body>
