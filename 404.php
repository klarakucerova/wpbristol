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
                            <h2 class="page-title"><?php esc_html_e( '404 page', 'custom-theme' ); ?></h2>
                        </header><!-- .page-header -->

                        <div class="page-content error-404-container">
                            <span class="error-404-text"><?php esc_html_e( 'You look little lost here..', 'custom-theme' ); ?></span>
                            <img class="error-404-image" src="<?php bloginfo('template_url'); ?>/images/404.gif" alt="Bristol WordPress people">
                            <button class="error-404-btn button">Take me home</button>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
