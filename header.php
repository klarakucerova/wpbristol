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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3KH4HG"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="accessibly-hidden">
        <?php echo file_get_contents( get_template_directory_uri() . '/images/icons/svgbuild/svgSprite.svg' ); ?>
    </div>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'custom-theme' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="nav-wrapper">
            <div class="nav-header-logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" class="header-logo" alt="WordPress Bristol People logo"></a></div>
            <div class="nav-toggle-wrapper">
                <div for="nav-toggle" class="nav-icon nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <nav id="site-navigation" class="top-navigation" role="navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                ?>
            </nav><!-- #site-navigation -->
        </div>

        <div class="header-wrapper">
            <div class="video-banner-wrapper">
                <?php if ( is_front_page() ) : ?>
                    <div class="video-banner-underlay">
                        <picture>
                            <source srcset="<?php bloginfo('template_url'); ?>/assets/video/video-img@2x.png" media="(min-width: 770px)">
                            <img src="<?php bloginfo('template_url'); ?>/assets/video/video-img.png" alt="Bristol WordPress people">
                        </picture>
                    </div>
                    <div class="video-banner-container">
                        <video class="video-banner" loop autoplay muted>
                            <source src="<?php bloginfo('template_url'); ?>/assets/video/header.webm" type="video/webm">
                            <source src="<?php bloginfo('template_url'); ?>/assets/video/header.mp4" type="video/mp4">
                        </video>
                    </div>
                <?php else: ?>
                    <div class="video-banner-underlay">
                        <picture class="image-banner">
                            <source srcset="<?php bloginfo('template_url'); ?>/images/header@2x.png" media="(min-width: 770px)">
                            <img src="<?php bloginfo('template_url'); ?>/images/header.png" alt="Bristol WordPress people">
                        </picture>
                    </div>
                <?php endif; ?>
                <div class="video-banner-overlay"></div>
            </div>

            <div class="header-branding">
                <div class="header-branding-inner">
                    <div class="header-logo-wrapper"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo-white.svg" class="header-logo" alt="WordPress Bristol People logo"></a></div>
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
