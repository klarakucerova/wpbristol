<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package custom-theme
 */

?>
<div class="talk-image talk-img-<?php global $post; echo $post->post_name; ?>">
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

        <style>
            .talk-img-<?php global $post; echo $post->post_name; ?> {
                background-image: url('<?php echo $image[0]; ?>');
            }
        </style>
        <div class="talk-image-inner"></div>
    <?php else: ?>
        <div class="talk-image-inner"></div>
    <?php endif; ?>
</div>
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
    <div class="talk-text">
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
    </div>
</div>
