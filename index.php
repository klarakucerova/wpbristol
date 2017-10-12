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
                        <h2>Our Talks</h2>
                        <div class="talk-wrapper">
                            <ul class="talk-list">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <li>
                                        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
