<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package recruitfirst
 */

?>

</div><!-- #page -->
<footer class="site-footer site-footer--v2">
    <div class="container">
        <div class="site-footer__inner">
            <div class="site-footer__left">
                <div class="site-footer__info">
                    <p class="site-footer__copyright">
                        <?php esc_html_e('&copy; RecruitFirst 2021.', 'rf'); ?>
                    </p>
                    <span><?php esc_html_e('EA License number', 'rf'); ?>:</span>
                    <p><?php esc_html_e('Singapore: 13C6342', 'rf'); ?><span>|</span><?php esc_html_e('Hong Kong: 60351', 'rf'); ?></p>
                </div>
            </div>
            <div class="site-footer__right">
                <div class="site-footer__menu">
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu(
                            array(
                                'container'  => 'site-footer__nav',
                                'theme_location' => 'footer',
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
