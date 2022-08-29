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
<footer class="site-footer">
    <div class="site-footer__inner">
        <p class="site-footer__copyright text--note"><?php esc_html_e('2021 &copy; Copyright RecruitFirst Limited.', 'rf'); ?></p>
        <div class="scroll-down">
            <button class="scroll-down__btn scroll-down__btn--back" data-action="back" disabled>
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="6" y1="1" x2="6" y2="10" stroke="#fff" stroke-width="2" stroke-linecap="round"/><path d="M1 7l5 5 5-5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <button class="scroll-down__btn" data-action="next">
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="6" y1="1" x2="6" y2="10" stroke="#fff" stroke-width="2" stroke-linecap="round"/><path d="M1 7l5 5 5-5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
