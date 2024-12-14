<?php
// Charger les styles et scripts du thème
function mon_portfolio_enqueue_assets() {
    // Charger le CSS principal
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');

    // Charger les polices
    wp_enqueue_style('montserrat-font', get_template_directory_uri() . '/assets/fonts/montserrat/stylesheet.css');
    wp_enqueue_style('lato-font', get_template_directory_uri() . '/assets/fonts/lato/stylesheet.css');

    // Charger le fichier JS principal
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mon_portfolio_enqueue_assets');

// Ajouter un support pour les fonctionnalités basiques
function mon_portfolio_setup() {
    // Support pour les balises HTML5
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    // Support pour le titre automatique
    add_theme_support('title-tag');
    // Support pour un logo personnalisé
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    // Support pour les menus
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'mon-portfolio'),
    ));
    // Support pour les miniatures
    add_theme_support('post-thumbnails');
    // Lier le style au mode éditeur
    add_theme_support('editor-styles');
    add_editor_style('assets/css/main.css');
}
add_action('after_setup_theme', 'mon_portfolio_setup');

?>