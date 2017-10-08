<?php /* Template Name: Talks */ ?>
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
                <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile; // End of the loop.
                ?>
                
                <div class="talk-wrapper">
                    <ul class="talk-list">
                        <li>
                            <img src="<?php bloginfo('template_url'); ?>/images/talk-1.png" alt="" class="talk-image">
                            <div class="talk-info">
                                <div class="talk-header">
                                    <span class="talk-date">03<span>Oct</span></span>
                                    <span class="talk-title"><h4>Introduction to AMP and WordPress Security</h4></span>
                                </div>
                                <p class="talk-text">Fast loading pages and security are hot topics in the WordPress world, so we've got two great talks lined up: Introduction to AMP (accelerated mobile pages) and WordPress security. <a href="#">Read More</a></p>
                            </div>
                        </li>
                        <li>
                            <img src="<?php bloginfo('template_url'); ?>/images/talk-1.png" alt="" class="talk-image">
                            <div class="talk-info">
                                <div class="talk-header">
                                    <span class="talk-date">03<span>Oct</span></span>
                                    <span class="talk-title"><h4>Introduction to AMP and WordPress Security</h4></span>
                                </div>
                                <p class="talk-text">Fast loading pages and security are hot topics in the WordPress world, so we've got two great talks lined up: Introduction to AMP (accelerated mobile pages) and WordPress security. <a href="#">Read More</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
