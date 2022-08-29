<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package recruitfirst
 */

get_header();
?>

    <main id="primary" class="site-main">

        <section class="error-404 not-found">
            <div class="error-404__wrapper">
                <h1>404</h1>
                <h2><?php esc_html_e('Page Not Found', 'rf'); ?></h2>
                <p><?php esc_html_e('Sorry, but we are not able to find the page you are looking for.', 'rf'); ?></p>
                <a href="<?php echo home_url(''); ?>" class="btn">
                    <?php esc_html_e('Back to Homepage', 'rf'); ?>
                </a>
                <span><?php esc_html_e('2021 &copy; Copyright RecruitFirst Limited.', 'rf'); ?></span>
            </div>
        </section><!-- .error-404 -->

    </main><!-- #main -->

<?php
get_footer('none');
