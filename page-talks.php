
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
        <main id="main" class="site-main container" role="main">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

        <?php $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish'
            );
         
        $talks = new WP_Query( $args ); ?>

        <?php if( $talks->have_posts() ): ?>
            <ul>
                <?php while ( $talks->have_posts() ) : $talks->the_post(); ?>
                <li>
                    <h3><?php the_title(); ?></h3>
                    <div><?php the_content(); ?></div>
                </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        </main>
    </div>


<?php
get_sidebar();
get_footer();