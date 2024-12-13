<?php
// Charger les styles et scripts du thème
function mon_portfolio_enqueue_assets() {
    // Charger le CSS compilé
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
    
    // Charger le fichier JS
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mon_portfolio_enqueue_assets');

// Ajouter un support pour les fonctionnalités basiques
function mon_portfolio_setup() {
    // Support pour les balises HTML5
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    // Support pour le titre du site
    add_theme_support('title-tag');
    // Support pour un logo personnalisé
    add_theme_support('custom-logo');
    // Support pour les menus
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'mon-portfolio'),
    ));
}
add_action('after_setup_theme', 'mon_portfolio_setup');
?>