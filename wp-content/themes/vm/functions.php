<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');
// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Vérifier et ajouter le fichier JavaScript
        if (isset($manifest['wp-content/themes/vm/resources/js/main.js'])) {
            wp_enqueue_script('vm', get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/js/main.js']['file']), [], null, true);
        }

        // Vérifier et ajouter le fichier CSS
        if (isset($manifest['wp-content/themes/vm/resources/css/styles.scss'])) {
            wp_enqueue_style('vm', get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/css/styles.scss']['file']));
        }
    }
}

//enqueue_assets_from_vite_manifest();

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function dw_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/vm/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/vm/resources/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/css/styles.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}
// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['page']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":
register_post_type('actu', [
    'label' => 'Actualités',
    'description' => 'Les actualités',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-calendar-alt',
    'public' => true,
    'has_archive' => true,
    'rewrite' => [
        'slug' => 'actualités',
    ],
    'supports' => ['title', 'thumbnail'],
]);

// Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :


// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header', 'Le menu de navigation principal en haut de la page.');
register_nav_menu('main', 'Le menu du main de la page.');
register_nav_menu('footer', 'Le menu de navigation de fin de page.');

// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

function dw_get_navigation_links(string $location): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // Transformer le menu en un tableau de liens, chaque lien étant un objet personnalisé

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;
        $link->icon = function_exists('get_field') ? get_field('icon', $post) : null;

        $links[] = $link;
    }

    // Retourner ce tableau d'objets (liens).

    return $links;
}

function hepl_trad_load_textdomain(): void
{
    load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

add_action('after_setup_theme', 'hepl_trad_load_textdomain');
function __hepl(string $translation, array $replacement = [])
{
    $base = __($translation, 'hepl-trad');

    foreach ($replacement as $key => $value) {
        $variable = ":" . $key;
        $base = str_replace($variable, $value, $base);
    }
    return $base;
}

function create_site_options_page()
{
    if (function_exists('acf_add_options_page')) {
        // Page principale
        acf_add_options_page([

            'page_title' => 'Site Options',
            'menu_title' => 'Site Settings',
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);

        // Sous-pages
        acf_add_options_sub_page([
            'page_title' => 'Company Settings',
            'menu_title' => 'Company',
            'parent_slug' => 'site-options',
        ]);
        acf_add_options_sub_page([
            'page_title' => 'SEO Settings',
            'menu_title' => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');


// Ajouter une fonctionnalité de formulaire de contact totalement sur-mesure:

add_action('admin_post_dw_contact_form_submit', 'dw_handle_contact_form_submit');
add_action('admin_post_nopriv_dw_contact_form_submit', 'dw_handle_contact_form_submit');

require_once(__DIR__.'/form/ContactForm.php');

register_post_type('contact_message', [
    'label' => 'Messages',
    'description' => 'Les formulaires envoyés sur la page de contact',
    'public' => false,
    'show_ui' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'supports' => ['title','editor'],
]);

function dw_handle_contact_form_submit()
{
    (new DW_Theme\Forms\ContactForm())
        ->rule('firstname', 'required')
        ->rule('lastname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'valid_email')
        ->rule('subject', 'required')
        ->rule('message', 'required')
        ->rule('message', 'no_test')
        ->sanitize('firstname', 'sanitize_text_field')
        ->sanitize('lastname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('subject', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field')
        ->handle($_POST);
}

/**
 * Génère une image responsive au format <picture> avec les attributs srcset et sizes.
 *
 * Cette fonction accepte différents formats d'entrée pour l'image (ID, tableau associatif ou URL),
 * et retourne un bloc HTML contenant une balise <picture> incluant une balise <img>.
 * Elle utilise les fonctions natives de WordPress pour récupérer les différentes tailles d'image
 * et ainsi permettre au navigateur de choisir la version la plus adaptée à l'affichage.
 *
 * @param mixed $image    ID de l'image, tableau contenant la clé 'ID' ou URL de l'image.
 * @param array $settings Tableau d'options complémentaires :
 *                        - 'lazy'    => attribut loading (default: "eager").
 *                        - 'classes' => classes CSS à ajouter à la balise <img>.
 *
 * @return bool|string Retourne le code HTML de l'image responsive, ou une chaîne vide si l'image est invalide.
 */
function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        // si c'est un nombre, on considère que cela s'agit d'un ID
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        // Si c'est un tableau associatif contenant la clé ID, on récupère cet ID
        $image_id = $image['ID'];
    } else {
        // Générer un tag img par défaut
    }

// Récupération des informations de l'image depuis la base de données.
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Attribut alt
    $image_post = get_post($image_id); // Object WP_Post de l'image
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';


// Récupération des URLS et attributs pour l'image en taille "full"
// Wordpress génère automatiquement un srcset basé sur les tailles existantes
    $src = wp_get_attachment_image_url($image_id, 'medium');
    $srcset = wp_get_attachment_image_srcset($image_id, 'medium');
    $sizes = wp_get_attachment_image_sizes($image_id, 'medium');

// Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres.
    $lazy = $settings['lazy'] ?? 'eager';

// Gestion des classes (si des classes sont fournies dans $settings).
    $classes = '';
    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }

    ob_start();
    ?>
    <picture class="<?= esc_attr($classes) ?>--picture">
        <!-- Ici, vous pouvez ajouter manuellement des balises <source> pour d'autres formats (WebP, AVIF, etc.)
             si ces formats sont disponibles via un plugin ou un traitement personnalisé. -->
        <img
            src="<?= esc_url($src) ?>"
            alt="<?= esc_attr($alt) ?>"
            loading="<?= esc_attr($lazy) ?>"
            srcset="<?= esc_attr($srcset) ?>"
            sizes="<?= esc_attr($sizes) ?>"
            class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}

register_taxonomy('project_type', ['project'], [
    'labels' => [
        'name' => 'Types de projet',
        'singular_name' => 'Type de projet',
        'menu_name' => 'Types de projet',
        'all_items' => 'Tous les types',
        'edit_item' => 'Modifier le type',
        'view_item' => 'Voir le type',
        'update_item' => 'Mettre à jour le type',
        'add_new_item' => 'Ajouter un nouveau type',
        'new_item_name' => 'Nom du nouveau type',
        'search_items' => 'Rechercher un type',
        'not_found' => 'Aucun type trouvé',
    ],
    'description' => 'Types de projets',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'type-projet'],
]);
