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
    <?php wp_reset_query(); ?>

    </div><!-- #content -->
    <footer id="colophon" class="footer <?php if ( is_front_page() ) : ?>footer-homepage<?php endif; ?>" role="contentinfo">
        <div class="footer-inner">
            <span class="proudly-powered">
                <?php bloginfo( 'name' ); ?> | Powered by <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'custom-theme' ) ); ?>"><?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( '%s', 'custom-theme' ), 'WordPress' ); ?></a>
            </span>
            <div class="social-media-wrapper">
                <ul class="social-media">
                    <li><a href="https://www.facebook.com/WPBristolPeeps/" target="_blank"><svg class="social-icon"><use xlink:href="#icon-facebook" /></svg></a></li>
                    <li><a href="https://twitter.com/WPBristolPeeps" target="_blank"><svg class="social-icon"><use xlink:href="#icon-twitter" /></svg></a></li>
                    <li><a href="https://www.instagram.com/wpbristolpeeps/" target="_blank"><svg class="social-icon"><use xlink:href="#icon-instagram" /></svg></a></li>
                    <li><a href="https://www.youtube.com/channel/UCAGalVkm_e1elXbyS9hCuSA" target="_blank"><svg class="social-icon"><use xlink:href="#icon-youtube" /></svg></a></li>
                    <li class="icon-meetup"><a href="https://www.meetup.com/wpbristol/" target="_blank"><svg class="social-icon meetup"><use xlink:href="#icon-meetup" /></svg></a></li>
                </ul>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
