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
                <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile; // End of the loop.
                ?>
                <aside class="sidebar">
                    <h3>Our Meet-ups</h3>
                    <ul class="meetup-list">
                        <li>
                            <span class="meetup-date">05<span>Sep</span></span>
                            <span class="meetup-link">Making a blog and user permissions</span>
                        </li>
                        <li>
                            <span class="meetup-date">01<span>Aug</span></span>
                            <span class="meetup-link">Creating truly fluid themes and lightning talks about WordPress tools</span>
                        </li>
                        <li>
                            <span class="meetup-date">04<span>Jul</span></span>
                            <span class="meetup-link">WP-CLI (command line interface)</span>
                        </li>
                        <li>
                            <span class="meetup-date">06<span>Jun</span></span>
                            <span class="meetup-link">Show and Tell and Ask for Help</span>
                        </li>
                        <li>
                            <span class="meetup-date">02<span>May</span></span>
                            <span class="meetup-link">Beginners Night: How to install WordPress and How to create your own theme</span>
                        </li>
                    </ul>
                </aside>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
