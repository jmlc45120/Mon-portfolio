<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="site-logo">
        <?php if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        } ?>
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