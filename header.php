<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-theme
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700|Ubuntu+Condensed" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'custom-theme' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="nav-wrapper">
            <div class="nav-header-logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/svg/logo.svg" class="header-logo" alt="WordPress Bristol People logo"></a></div>
            <div class="nav-toggle-wrapper">
                <div for="nav-toggle" class="nav-icon nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <nav id="site-navigation" class="navigation" role="navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                ?>
            </nav><!-- #site-navigation -->
        </div>

        <div class="header-wrapper">
            <picture>
                <source srcset="<?php bloginfo('template_url'); ?>/images/header@2x.png" media="(min-width: 770px)">
                <img src="<?php bloginfo('template_url'); ?>/images/header.png" alt="Bristol WordPress people">
            </picture>
            <div class="header-branding">
                <div class="header-branding-inner">
                    <div class="header-logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/svg/logo-white.svg" class="header-logo" alt="WordPress Bristol People logo"></a></div>
                    <div class="header-branding-text">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <span class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></span>
                        <?php
                        endif; ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-branding -->

    </header><!-- #masthead -->

    <div id="content" class="site-content">
