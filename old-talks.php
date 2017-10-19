
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

                            <?php get_template_part( 'template-parts/content', 'page' ); ?>

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
                                <span><?php //previous_posts_link(); ?></span>
                                <span><?php //next_posts_link(); ?></span>
                                <nav class="pagination">
                                    <?php pagination_bar(); ?>
                                </nav>
                                </ul>
                            </div>
                        <?php endif; ?>
                         
                        <?php wp_reset_postdata(); ?>
                    </div>
                </article>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
