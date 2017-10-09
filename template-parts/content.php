<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package custom-theme
 */

?>
<img src="<?php bloginfo('template_url'); ?>/images/talk-1.png" alt="" class="talk-image">
<div class="talk-info">
    <div class="talk-header">
        <span class="talk-date"><?php the_field('event_date'); ?></span>
        <span class="talk-title">
            <?php if ( is_singular() ) :
               the_title( '<h4>', '</h4>' );
            else :
               the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
            endif; ?>
        </span>
    </div>
    <p class="talk-text">
        <?php
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'custom-theme' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'custom-theme' ),
                'after'  => '</div>',
            ) );
        ?>
    </p>
</div>
