<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-theme
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="footer-wrapper" role="contentinfo">
        <div class="site-info">
            <div>
                <div>Sponsored by</div>
                <img src="<?php bloginfo('template_url'); ?>/images/34sp.svg" alt="34sp.com">
            </div>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'custom-theme' ) ); ?>"><?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'custom-theme' ), 'WordPress' );
            ?></a>
        </div><!-- .site-info -->
        <ul class="social-media">
            <li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/email.svg" alt="Email"></a></li>
            <li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/facebook.svg" alt="Facebook"></a></li>
            <li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/twitter.svg" alt="Twitter"></a></li>
            <li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/instagram.svg" alt="Instagram"></a></li>
            <li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/youtube.svg" alt="You Tube"></a></li>
            <li class="icon-meetup"><a href=""><img src="<?php bloginfo('template_url'); ?>/images/meetup.svg" alt="Meetup"></a></li>
        </ul>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
