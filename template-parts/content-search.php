<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package custom-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h3><a href="%s" class="search-title" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>

        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="search-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <?php custom_theme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
