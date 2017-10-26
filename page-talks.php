
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

                            <?php the_content(); ?>

                        <?php endwhile; ?>
                        
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

                        <?php $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'paged' => $paged,
                            );

                        $wp_query = new WP_Query( $args ); ?>

                        <?php if( $wp_query->have_posts() ): ?>
                            <div class="talk-wrapper">
                                <ul class="talk-list">
                                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                    <li <?php post_class(); ?>>
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
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <div class="post-navigation talk-post-nav">
                                    <span class="next"><?php next_posts_link('Previous Talks', 0); ?></span>
                                    <span class="prev"><?php previous_posts_link('Next Talks'); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </article>
            </div>
        </main>
    </div>

<?php
get_sidebar();
get_footer();