<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package custom-theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
            <div class="container">
                <article>
                    <div class="entry-content">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php the_content(); ?>

                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                        
                        <?php $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'posts_per_page' => 10
                            );
                         
                        $talks = new WP_Query( $args ); ?>
                        
                        <?php if( $talks->have_posts() ): ?>
                            <div class="talk-wrapper">
                            <ul class="talk-list">
                                <?php while ( $talks->have_posts() ) : $talks->the_post(); ?>
                                    <li>
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
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                </span>
                                            </div>
                                            <div class="talk-text">
                                                <?php
                                                    the_content( sprintf(
                                                        wp_kses(
                                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                                            __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'custom-theme' ),
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
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                       
            <?php the_posts_navigation(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();