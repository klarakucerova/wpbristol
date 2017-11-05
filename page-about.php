
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

                            <div class="about-text"><?php the_content(); ?></div>

                        <?php endwhile; ?>
                        
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

                        <?php $args = array(
                            'post_type'      => 'wpbristol_organisers',
                            'post_status'    => 'publish',
                            'paged' => $paged,
                            );

                        $loop = new WP_Query( $args ); ?>

                        <?php if( $loop->have_posts() ): ?>
                            <div class="organiser-wrapper">
                                <div class="organiser-title">The group is co-organised by</div>
                                <ul class="organiser-list accordion">
                                    <div class="organiser-overlay accordion-overlay"></div>
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <li class="organiser-item">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="organiser-image"><?php the_post_thumbnail( 'full' ); ?></div>
                                        <?php endif; ?>

                                        <h6 class="organiser-name"><?php the_title(); ?></h6>
                                        <a href="<?php the_field('twitter_link'); ?>" class="organiser-twitter" target="_blank"><?php the_field('twitter'); ?></a>
                                        <div class="organiser-info accordion-content"><?php the_content(); ?></div>
                                        <div class="accordion-trigger"><svg class="svg-icon icon-arrow"><use xlink:href="#icon-arrow" /></svg></div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                        <div class="about-text"><?php the_field('about_text'); ?></div>
                    </div>
                </article>
            </div>
        </main>
    </div>

<?php
get_sidebar();
get_footer();

