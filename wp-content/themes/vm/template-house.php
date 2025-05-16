<body class="body_projects">
<?php get_header(); ?>
<?php /* template Name: Template "template-house" */ ?>
    <div class="wrapper">
        <?php include('templates/content/stage/stage.php') ?>
        <?php include('templates/content/flexible.php') ?>

        <?php
        if (have_posts()): while (have_posts()): the_post(); ?>

        <?php
            // On ferme "la boucle" (The Loop):
        endwhile;
        else: ?>
            <p>Pas de contenu à afficher.</p>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>
</body>

