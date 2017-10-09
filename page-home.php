<?php /* Template Name: Home */ ?>
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

<?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container container-home">
                <section>
                    <?php
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'page' );
                        endwhile; // End of the loop.
                    ?>
                    
                    <div class="next-meetup">
                        <?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <div class="next-meetup-header">
                                <div class="next-meetup-date"><?php the_field('event_date'); ?></div>
                                <div>
                                    <a href="<?php the_field('event_link'); ?>" class="next-meetup-title"><?php the_title(); ?></a>
                                    <div class="next-meetup-place">at Famous Royal Navy Volunteer</div>
                                </div>
                            </div>
                            <div><?php the_content(); ?></div>

                        <?php endwhile; 
                        wp_reset_postdata(); ?>
                    </div>
                </section>

                <aside class="sidebar">
                    <h3>Our Meet-ups</h3>

                    <?php if ( $wpb_all_query->have_posts() ) : ?>
                        <ul class="meetup-list">
                            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                <li>
                                    <span class="meetup-date"><?php the_field('event_date'); ?></span>
                                    <span class="meetup-link">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </span>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </aside>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
