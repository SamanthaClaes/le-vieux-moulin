<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>
<body class="wp_header">
<div class="site">
    <header>

        <div class="container_logo">
            <nav class="nav_header">
                <a href="http://le-vieux-moulin.test/">
                    <svg class="house" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512" width="30"
                         height="30">
                        <path d="M493.2,193.5L331.4,31.6c-41.7-41.6-109.2-41.6-150.9,0L18.8,193.5C6.7,205.4,0,221.7,0,238.7v209.4c0,35.3,28.7,64,64,64h384c35.3,0,64-28.7,64-64v-209.4c0-17-6.7-33.3-18.8-45.2ZM320,469.5h-128v-83.9c0-35.3,28.7-64,64-64s64,28.7,64,64v83.9ZM469.3,448.1c0,11.8-9.6,21.3-21.3,21.3h-85.3v-83.9c0-58.9-47.8-106.7-106.7-106.7s-106.7,47.8-106.7,106.7v83.9h-85.3c-11.8,0-21.3-9.6-21.3-21.3v-209.4c0-5.7,2.3-11.1,6.3-15.1L210.7,61.9c25-24.9,65.5-24.9,90.5,0l161.8,161.8c4,4,6.2,9.4,6.3,15v209.4Z"/>
                    </svg>
                </a>
                <div class="menu_links">
                    <!-- Le parent cliquable -->
                    <?php
                    // On récupère tous les liens de navigation
                    $links = dw_get_navigation_links('header');
                    // On suppose que le premier lien dans le tableau est le parent
                    $parent_link = $links[0] ?? null;
                    ?>
                    <!-- Affichage du parent uniquement une fois -->
                    <?php if ($parent_link): ?>
                        <a href="<?= esc_url($parent_link->href) ?>" class="menu-parent">
                            <?= esc_html($parent_link->label) ?>
                        </a>
                    <?php endif; ?>
                    <!-- Les sous-liens seulement (en excluant le parent) -->
                    <div class="nav_main_menu">
                        <?php foreach ($links as $link): ?>
                            <?php if ($link !== $parent_link): ?> <!-- Ne pas afficher à nouveau le parent -->
                                <a href="<?= esc_url($link->href) ?>">
                                    <?= esc_html($link->label) ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>

