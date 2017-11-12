
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

                <div class="getinvolved-wrapper">
                    <?php $fields = get_field_objects();
                    if( $fields ): ?>
                        <ul class="getinvolved-list">
                            <?php foreach( $fields as $field_name => $field): ?>
                                <li>
                                    <div class="icon-involved">
                                        <svg class="svg-icon icon-<?php echo $field['name']; ?>"><use xlink:href="#icon-<?php echo $field['name']; ?>" /></svg>
                                    </div>
                                    <div>
                                        <h5><?php echo $field['label']; ?></h5>
                                        <span><?php echo $field['value']; ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <a href="mailto:"><div class="button getinvolved-email">
                        <span>Email Us</span>
                        <span><svg class="svg-icon icon-email-us"><use xlink:href="#icon-email-us" /></svg></span>
                    </div></a>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
