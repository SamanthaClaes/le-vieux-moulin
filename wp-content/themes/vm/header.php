<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Site du Vieux Moulin ASBL"/>
    <meta name="author" content="Le Vieux Moulin"/>
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>

<body class="site">
<h1 class="sro">ASBL Le Vieux Moulin</h1>
<div class="site__container">
    <header class="header">
        <div class="header__container">
            <a href="<?= esc_url(home_url('/')); ?>" aria-label="Accueil - Le Vieux Moulin">
                <!-- logo -->
                <svg id="logo" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 318 300" width="80" height="80">
                    <rect class="st2" x="222.3" y="133.6" width="3.1" height="9.4" transform="translate(124.7 -105.4) rotate(36.1)"/>
                    <g>
                        <polygon class="st1" points="39.2 195.3 60.6 195.3 72.3 81.1 119.4 186.6 134.1 184.4 183.1 78.9 192.9 195.3 226.8 195.3 206.8 21.1 189.2 21.1 128.9 152.7 74.6 21.1 62.9 21.1 39.2 195.3"/>
                        <polygon class="st1" points="81.7 21.7 98.3 21.7 128.5 101.2 164.5 21.7 180.3 21.7 128.5 134.5 81.7 21.7"/>
                    </g>
                    <path class="st3" d="M120.7,235.7c22.9-12.8,45.7-21,71.6-19,10.5.3,21.3,3,32,8.8,1.1.6,2.2,1.2,3.3,1.7,7.2,3.4,18.9,11,55.5,1.2,4.4-1.2,8.6-3,12.6-5.3l24.1-14.1c-28.1,14.8-39.8,17.7-74.1,2-.6-.3-1.2-.5-1.8-.8-25.2-9.7-44.5-6.1-67.4-.8-18.2,4.6-39.6,14.2-55.8,26.3Z"/>
                    <path class="st0" d="M82.8,203.8c22.9-12.8,45.7-21,71.6-19,10.5.3,21.3,3,32,8.8,1.1.6,2.2,1.2,3.3,1.7,7.2,3.4,18.9,11,55.5,1.2,4.4-1.2,8.6-3,12.6-5.3l24.1-14.1c-28.1,14.8-39.8,17.7-74.1,2-.6-.3-1.2-.5-1.8-.8-25.2-9.7-44.5-6.1-67.4-.8-18.2,4.6-39.6,14.2-55.8,26.3Z"/>
                    <path class="st5" d="M42.5,172.2c22.9-12.8,45.7-21,71.6-19,10.5.3,21.3,3,32,8.8,1.1.6,2.2,1.2,3.3,1.7,7.2,3.4,18.9,11,55.5,1.2,4.4-1.2,8.6-3,12.6-5.3l24.1-14.1c-28.1,14.8-39.8,17.7-74.1,2-.6-.3-1.2-.5-1.8-.8-25.2-9.7-44.5-6.1-67.4-.8-18.2,4.6-39.6,14.2-55.8,26.3Z"/>
                    <rect class="st2" x="219.8" y="47.1" width="12.6" height="25.5" transform="translate(11.3 -32.7) rotate(8.5)"/>
                    <rect class="st2" x="241.5" y="55.6" width="12.6" height="25.5" transform="translate(44.3 -88.7) rotate(22.2)"/>
                    <rect class="st2" x="262.9" y="70.5" width="10.6" height="24.3" transform="translate(88.7 -133.1) rotate(33.1)"/>
                    <rect class="st2" x="279.5" y="89.6" width="12.6" height="23.2" transform="translate(166.6 -177.6) rotate(47.4)"/>
                    <rect class="st2" x="266.9" y="120.8" width="7.2" height="17.4" transform="translate(205.8 -163.3) rotate(51.9)"/>
                    <rect class="st2" x="254.5" y="105.2" width="7.6" height="17.4" transform="translate(136.6 -140.8) rotate(40.7)"/>
                    <rect class="st2" x="241.7" y="93.5" width="7.6" height="17.4" transform="translate(95.7 -117.5) rotate(33.1)"/>
                    <rect class="st2" x="223.7" y="84.9" width="7.6" height="17.4" transform="translate(42.8 -68.8) rotate(19)"/>
                    <rect class="st2" x="223.6" y="111" width="6.1" height="14.1" transform="translate(61.6 -77) rotate(22.2)"/>
                    <rect class="st2" x="235.6" y="119.1" width="6.1" height="14.1" transform="translate(120.3 -116.5) rotate(36.1)"/>
                    <rect class="st2" x="246.1" y="128.2" width="5" height="14.1" transform="translate(168.5 -136.1) rotate(45)"/>
                    <rect class="st2" x="253.1" y="139.6" width="4.5" height="14.1" transform="translate(213.5 -144.8) rotate(51.9)"/>
                    <rect class="st2" x="258.3" y="155.7" width="4.5" height="12.3" transform="translate(353.4 -130.5) rotate(75.8)"/>
                    <rect class="st2" x="260.6" y="170.6" width="4.5" height="13" transform="translate(439.9 -85.8) rotate(90)"/>
                    <rect class="st2" x="244" y="167" width="2.8" height="9" transform="translate(405.3 -81.5) rotate(87.4)"/>
                    <rect class="st2" x="241.3" y="157.6" width="2.8" height="9" transform="translate(298.4 -124.3) rotate(67.3)"/>
                    <rect class="st2" x="236.6" y="147.4" width="2.8" height="9" transform="translate(199 -127.8) rotate(49.5)"/>
                    <rect class="st2" x="230.7" y="140.5" width="2.8" height="9" transform="translate(152.9 -117) rotate(41.2)"/>
                    <rect class="st2" x="244.9" y="177.6" width="2.8" height="9" transform="translate(438 -56.8) rotate(92.3)"/>
                    <rect class="st2" x="294.1" y="112.3" width="10.5" height="21.7" transform="translate(247.8 -196.4) rotate(58.5)"/>
                    <rect class="st2" x="275.8" y="137.8" width="7.6" height="18.6" transform="translate(307.3 -167.6) rotate(67.3)"/>
                    <rect class="st2" x="302.8" y="138.9" width="11" height="22.4" transform="translate(377.9 -185.6) rotate(75.8)"/>
                    <rect class="st2" x="305.3" y="163.6" width="11.1" height="22.4" transform="translate(487.7 -134.9) rotate(90.4)"/>
                    <polygon class="st2" points="275.8 172.7 275.9 165.6 292.8 163.3 292.7 171.2 275.8 172.7"/>
                    <polyline class="st4" points="251.9 34.8 251.9 2.1 29.7 2.1 29.7 248.8 250.8 248.8"/>
                    <g>
                        <path d="M15.8,295.3l-10.7-32.8h4.6l5.1,16.2c1.4,4.4,2.6,8.4,3.5,12.3h0c.9-3.8,2.3-7.9,3.7-12.2l5.5-16.2h4.5l-11.7,32.8h-4.7Z"/>
                        <path d="M40,262.5v32.8h-4.2v-32.8h4.2Z"/>
                        <path d="M64.4,279.9h-12.8v11.8h14.2v3.6h-18.4v-32.8h17.7v3.6h-13.5v10.4h12.8v3.5Z"/>
                        <path d="M75.6,262.5v19.4c0,7.3,3.3,10.5,7.6,10.5s8-3.2,8-10.5v-19.4h4.3v19.1c0,10.1-5.3,14.2-12.4,14.2s-11.8-3.8-11.8-14v-19.3h4.3Z"/>
                        <path d="M120.8,295.3l-4.2-7.3c-1.7-2.8-2.8-4.6-3.8-6.5h0c-.9,1.9-1.8,3.7-3.6,6.5l-3.9,7.2h-4.9l10-16.6-9.6-16.2h4.9l4.3,7.7c1.2,2.1,2.1,3.8,3,5.5h.1c.9-1.9,1.8-3.5,3-5.5l4.5-7.7h4.9l-10,16,10.2,16.8h-4.9Z"/>
                        <path d="M168.6,280.9c-.2-4.6-.5-10.1-.5-14.2h-.1c-1.1,3.8-2.5,7.9-4.1,12.5l-5.8,15.9h-3.2l-5.3-15.6c-1.6-4.6-2.9-8.9-3.8-12.8h0c0,4.1-.3,9.6-.6,14.5l-.9,14.1h-4l2.3-32.8h5.4l5.6,15.9c1.4,4,2.5,7.6,3.3,11h.1c.8-3.3,2-6.9,3.5-11l5.8-15.9h5.4l2,32.8h-4.1l-.8-14.4Z"/>
                        <path d="M208.2,278.6c0,11.3-6.9,17.3-15.2,17.3s-14.7-6.7-14.7-16.6,6.5-17.2,15.2-17.2,14.7,6.9,14.7,16.6ZM182.7,279.1c0,7,3.8,13.3,10.5,13.3s10.5-6.2,10.5-13.6-3.4-13.3-10.5-13.3-10.5,6.5-10.5,13.7Z"/>
                        <path d="M217.9,262.5v19.4c0,7.3,3.3,10.5,7.6,10.5s8-3.2,8-10.5v-19.4h4.3v19.1c0,10.1-5.3,14.2-12.4,14.2s-11.8-3.8-11.8-14v-19.3h4.3Z"/>
                        <path d="M245.2,262.5h4.2v29.3h14v3.6h-18.3v-32.8Z"/>
                        <path d="M272.4,262.5v32.8h-4.2v-32.8h4.2Z"/>
                        <path d="M279.8,295.3v-32.8h4.6l10.5,16.6c2.4,3.8,4.3,7.3,5.9,10.7h0c-.4-4.4-.5-8.4-.5-13.5v-13.7h4v32.8h-4.3l-10.4-16.6c-2.3-3.7-4.5-7.4-6.1-11h-.1c.2,4.2.3,8.1.3,13.6v14h-4Z"/>
                    </g>
                    <g>
                        <path d="M44.4,214.5c.8,0,1.7,0,2.4.2.8.1,1.6.4,2.3.8l-.6,2.1c-.8-.4-1.5-.6-2.1-.8-.6-.2-1.3-.2-1.9-.2-1,0-1.9.2-2.5.7-.6.5-.9,1.1-.9,1.9s.2,1.3.7,1.7c.4.4,1.2.8,2.2,1.1l1.7.5c1.6.5,2.7,1.2,3.3,2s1,1.8,1,2.9-.2,1.4-.5,2c-.3.6-.7,1.1-1.3,1.6-.5.4-1.2.8-1.9,1s-1.5.3-2.4.3-1.8,0-2.7-.2c-.9-.2-1.8-.4-2.7-.9l.6-2.1c.8.4,1.6.7,2.3.9.7.2,1.5.3,2.4.3s1.8-.2,2.5-.7c.7-.5,1-1.1,1-2s0-.6-.2-.9c-.1-.3-.3-.6-.5-.8s-.6-.5-1-.7c-.4-.2-1-.4-1.6-.6l-1.7-.5c-1.3-.4-2.2-1-2.9-1.6-.7-.7-1-1.6-1-2.8s.5-2.7,1.5-3.6c1-.9,2.4-1.3,4.3-1.3Z"/>
                        <path d="M51.8,230.6c0-.5.2-.9.5-1.2.3-.3.7-.5,1.2-.5s.8.2,1.2.5c.3.3.5.7.5,1.2s-.2,1-.5,1.3c-.3.3-.7.5-1.2.5s-.9-.2-1.2-.5c-.3-.3-.5-.7-.5-1.3Z"/>
                        <path d="M58.3,214.8h5.6c.9,0,1.7.1,2.4.4.7.3,1.3.6,1.7,1.1s.8,1,1,1.6c.2.6.4,1.3.4,2.1s-.1,1.3-.3,1.8c-.2.5-.5,1-.8,1.4-.3.4-.7.7-1.1,1-.4.3-.9.5-1.3.7l4.6,7.2h-2.8l-4.1-6.8h-2.8v6.8h-2.4v-17.3ZM60.7,223.2h2.1c.6,0,1.1,0,1.6-.2s.9-.3,1.3-.5c.4-.2.6-.6.9-1s.3-.9.3-1.5c0-1.1-.3-1.9-.9-2.5s-1.5-.8-2.7-.8h-2.5v6.4Z"/>
                        <path d="M72.3,230.6c0-.5.2-.9.5-1.2.3-.3.7-.5,1.2-.5s.8.2,1.2.5c.3.3.5.7.5,1.2s-.2,1-.5,1.3c-.3.3-.7.5-1.2.5s-.9-.2-1.2-.5c-.3-.3-.5-.7-.5-1.3Z"/>
                        <path d="M86.4,214.5c1,0,1.9,0,2.7.2s1.6.4,2.3.8l-.6,2c-.7-.3-1.3-.5-2-.7-.6-.1-1.3-.2-2.1-.2s-1.6.1-2.3.4c-.7.2-1.4.6-1.9,1.2-.6.5-1,1.2-1.3,2.1-.3.9-.5,1.9-.5,3.2,0,2.2.5,3.9,1.5,5,1,1.2,2.4,1.7,4.3,1.7s1.3,0,1.8-.1c.5,0,1-.2,1.5-.4v-4.8h-3.3v-2h5.6v8.3c-.7.3-1.5.5-2.4.7-.9.2-2,.3-3.2.3s-2.3-.2-3.3-.6c-1-.4-1.9-1-2.7-1.7-.8-.8-1.4-1.7-1.8-2.8-.4-1.1-.7-2.4-.7-3.8s.2-2.7.6-3.8,1-2,1.8-2.8c.8-.8,1.6-1.3,2.7-1.7,1-.4,2.2-.6,3.4-.6Z"/>
                        <path d="M95.1,230.6c0-.5.2-.9.5-1.2.3-.3.7-.5,1.2-.5s.8.2,1.2.5c.3.3.5.7.5,1.2s-.2,1-.5,1.3c-.3.3-.7.5-1.2.5s-.9-.2-1.2-.5c-.3-.3-.5-.7-.5-1.3Z"/>
                    </g>
                </svg>
            </a>

            <input type="checkbox" id="menu-toggle" class="header__toggle" aria-label="Ouvrir ou fermer  le menu principal"/>
                <span class="sro">Ouvrir ou fermer le menu</span>
            <label for="menu-toggle" class="header__burger">
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
