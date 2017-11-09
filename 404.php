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
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h3 class="page-title"><?php esc_html_e( 'You look little lost here..', 'custom-theme' ); ?></h3>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <img src="<?php bloginfo('template_url'); ?>/images/404.gif" alt="Bristol WordPress people">
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
