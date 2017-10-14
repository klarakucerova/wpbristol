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

                            <h2 class="talk-post-title"><?php the_title(); ?></h2>
                            <div class="talk-post-content">
                                <div class="meetup-date talk-post-date"><?php the_field('event_date'); ?></div>
                                <div>
                                    <?php the_content(); ?>
                                    <a href="<?php the_field('event_link'); ?>" class="button talk-post-button">Go to Meetup</a>
                                </div>
                            </div>
                            <div class="talk-post-image">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>

                        <?php endwhile; ?> 
                    </div><!-- .entry-content -->
                    <div class="talk-navigation">
                        <a href="<?php echo get_site_url(); ?>/talks" class="back-link">Back</a>
                    </div>
                </article><!-- #post-<?php the_ID(); ?> -->
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();