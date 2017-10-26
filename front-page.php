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

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container container-home">
                <section>
                    <?php
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'page' );
                        endwhile;
                    ?>

                    <?php require_once 'next-meetup.php'; ?>
                </section>

                <?php get_sidebar('home'); ?>
            </div>
            <div class="sponsors">
                <span class="sponsors-title">Proudly sponsored by</span>
                <div class="sponsor-content">
                    <div class="sponsor">
                        <a href="https://www.34sp.com/"><img class="sponsor-logo" src="<?php bloginfo('template_url'); ?>/images/34sp.svg" alt="34sp.com"></a>
                        <?php the_field('sponsor_one'); ?>
                        <p>34SP provide excellent WordPress hosting and amazing support. On top of that our members receive a discount code which gives them three months of free hosting, which you can cancel at any time (no getting sucked into a twelve month contract if you don’t want). The code is WPBRUG.</p>
                    </div>
                    <div class="sponsor">
                        <a href="https://developme.training/"><img class="sponsor-logo" src="<?php bloginfo('template_url'); ?>/images/developme.svg" alt="Developme"></a>
                        <?php the_field('sponsor_two'); ?>
                        <p>DevelopMe are a Bristol based tech training company. They run a variety of training courses including a 12-week full-time developers bootcamp and day long courses covering topics like WordPress and design skills. Their next Intro to WordPress course is on Sat 25th November at the Paintworks.</p>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
