<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package custom-theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container container-404">
                <div class="entry-content">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h2 class="page-title"><?php esc_html_e( 'Page not found', 'custom-theme' ); ?></h2>
                        </header><!-- .page-header -->

                        <div class="page-content error-404-container">
                            <span class="error-404-text"><?php esc_html_e( 'You look a little lost here..', 'custom-theme' ); ?></span>
                            <div class="error-404-image">
                                <img src="<?php bloginfo('template_url'); ?>/images/404.gif" alt="Bristol WordPress people">
                                <div class="error-404-image-text"><?php esc_html_e( 'Try turning it on and off again!', 'custom-theme' ); ?></div>
                            </div>
                            <div class="error-404-btn">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><svg class="svg-icon icon-turn-off"><use xlink:href="#icon-turn-off" /></svg></a>
                            </div>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
