<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/montserrat/Montserrat-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/lato/Lato-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>
<div id="page-loader" class="loader">
    <div class="spinner"></div>
</div>
<div class="container">
    <header class="site-header">
        <div class="site-logo">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo(); 
            } else {
                echo '<h1><a href="' . home_url('/') . '">' . get_bloginfo('name') . '</a></h1>';
            } 
            ?>
        </div>
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => 'ul',
                'menu_class' => 'main-navigation',
            ));
            ?>
        </nav>
    </header>