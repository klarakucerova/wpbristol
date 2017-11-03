<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package custom-theme
 */

?>

<section class="no-results not-found container">
    <header class="page-header">
        <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'custom-theme' ); ?></h2>
    </header><!-- .page-header -->

    <div class="entry-content">
        <p>
            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                <p><?php
                    printf(
                        wp_kses(
                            /* translators: 1: link to WP admin new post page. */
                            __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'custom-theme' ),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ),
                        esc_url( admin_url( 'post-new.php' ) )
                    );
                ?></p>

            <?php elseif ( is_search() ) : ?>

                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'custom-theme' ); ?></p>
                <div class="search-wrapper"><?php get_search_form(); ?></div>

                <?php else : ?>

                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'custom-theme' ); ?></p>
                <div class="search-wrapper"><?php get_search_form(); ?></div>
            <?php endif; ?>
        </p>
    </div><!-- .page-content -->
</section><!-- .no-results -->
