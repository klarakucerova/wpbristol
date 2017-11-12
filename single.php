<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post, page, product
 */

get_header();  ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <h2 class="meetup-single-title"><?php the_title(); ?></h2>
                            <div class="meetup-single-content">
                                <div class="meetup-list-date meetup-single-date"><?php the_field('event_date'); ?></div>
                                <div>
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <div class="meetup-single-image">
                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php the_content(); ?>
                                    <a href="<?php the_field('event_link'); ?>" class="button meetup-single-button">Go to Meetup</a>
                                </div>
                            </div>
                            <?php the_post_navigation( array(
                                'prev_text' => __( 'previous' ),
                                'next_text' => __( 'next' )
                            ) ); ?>
                        <?php endwhile; ?> 
                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();