<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Site du Vieux Moulin ASBL"/>
    <meta name="author" content="Le Vieux Moulin"/>
    <meta name="robots" content="index, follow"/>
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>

<body class="site">
<h1 class="sro">ASBL Le Vieux Moulin</h1>
<div class="site__container">
    <header class="header">
        <div class="header__container">
            <a href="http://le-vieux-moulin.test/" aria-label="Accueil - Le Vieux Moulin">
                <!-- logo -->
                <svg class="house" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30"
                     aria-hidden="true">
                    <title>Logo Maison</title>
                    <path d="M493.2,193.5L331.4,31.6c-41.7-41.6-109.2-41.6-150.9,0L18.8,193.5C6.7,205.4,0,221.7,0,238.7v209.4c0,35.3,28.7,64,64,64h384c35.3,0,64-28.7,64-64v-209.4c0-17-6.7-33.3-18.8-45.2ZM320,469.5h-128v-83.9c0-35.3,28.7-64,64-64s64,28.7,64,64v83.9ZM469.3,448.1c0,11.8-9.6,21.3-21.3,21.3h-85.3v-83.9c0-58.9-47.8-106.7-106.7-106.7s-106.7,47.8-106.7,106.7v83.9h-85.3c-11.8,0-21.3-9.6-21.3-21.3v-209.4c0-5.7,2.3-11.1,6.3-15.1L210.7,61.9c25-24.9,65.5-24.9,90.5,0l161.8,161.8c4,4,6.2,9.4,6.3,15v209.4Z"/>
                </svg>
            </a>

            <input type="checkbox" id="menu-toggle" class="header__toggle" aria-label="Ouvrir ou fermer le menu principal"/>
            <label for="menu-toggle" class="header__burger">
                <span class="sro">Ouvrir ou fermer le menu</span>
                <span></span>
                <span></span>
                <span></span>
            </label>

            <nav class="header__nav" aria-label="Menu principal">
                <h2 class="sro">Navigation Principale</h2>
                <?php
                $menu_locations = get_nav_menu_locations();
                $menu_id = $menu_locations['header'] ?? null;

                if ($menu_id) {
                    $menu_items = wp_get_nav_menu_items($menu_id);
                    $parents = [];
                    foreach ($menu_items as $item) {
                        if (empty($item->menu_item_parent)) {
                            $parents[$item->ID] = [
                                'parent' => $item,
                                'children' => []
                            ];
                        }
                    }
                    foreach ($menu_items as $item) {
                        if (!empty($item->menu_item_parent) && isset($parents[$item->menu_item_parent])) {
                            $parents[$item->menu_item_parent]['children'][] = $item;
                        }
                    }
                    ?>
                    <div class="header__menu">
                        <?php foreach ($parents as $group): ?>
                            <div class="header__item">
                                <?php if (!empty($group['children'])): ?>
                                    <input type="checkbox"
                                           id="submenu-<?= $group['parent']->ID ?>"
                                           class="header__submenu-toggle"
                                           aria-controls="submenu-panel-<?= $group['parent']->ID ?>">

                                    <label for="submenu-<?= $group['parent']->ID ?>"
                                           class="header__link header__link--has-submenu">
                                        <?= esc_html($group['parent']->title) ?> <span
                                                class="header__icon-toggle">+</span>
                                    </label>

                                    <div class="header__submenu" id="submenu-panel-<?= $group['parent']->ID ?>"
                                         role="menu">
                                        <?php foreach ($group['children'] as $child): ?>
                                            <a href="<?= esc_url($child->url) ?>" role="menuitem"
                                               class="header__sublink">
                                                <?= esc_html($child->title) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>

                                <?php else: ?>
                                    <a href="<?= esc_url($group['parent']->url) ?>" class="header__link">
                                        <?= esc_html($group['parent']->title) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </nav>
        </div>
    </header>
    <main>
