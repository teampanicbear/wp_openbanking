<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package recruitfirst
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rf' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo THEME_URL;?>/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo-white" width="134" height="26">
                        <?php if (wp_is_mobile()): ?>
                            <img src="<?php echo THEME_URL;?>/images/logo-black.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo-black" width="134" height="26">
                        <?php endif; ?>
                    </a>
                </h1>
				<?php
			else :
				?>
				<h2 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo THEME_URL;?>/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>" width="134" height="26">
                        <?php if (wp_is_mobile()): ?>
                            <img src="<?php echo THEME_URL;?>/images/logo-black.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo-black" width="134" height="26">
                        <?php endif; ?>
                    </a>
                </h2>
				<?php
			endif;
			?>
		</div><!-- .site-branding -->
        <?php if (!wp_is_mobile()) : ?>
        <button class="site-nav__toggle">
            <span class="site-nav__toggle-text">
                <span class="site-nav__toggle--open"><?php esc_html_e('Menu', 'rf'); ?></span>
                <span class="site-nav__toggle--close"><?php esc_html_e('Close', 'rf'); ?></span>
            </span>
            <span class="site-nav__toggle-icon">
                <svg width="18" height="16" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2.5" cy="1.5" r="1.5" fill="currentColor"/><circle cx="2.5" cy="12.5" r="1.5" fill="currentColor"/><circle cx="13.5" cy="1.5" r="1.5" fill="currentColor"/><circle cx="13.5" cy="12.5" r="1.5" fill="currentColor"/></svg>
            </span>
        </button>
        <?php endif; ?>
	</header><!-- #masthead -->
    <?php if (wp_is_mobile()) : ?>
        <button class="site-nav__toggle">
            <span class="site-nav__toggle-text">
                <span class="site-nav__toggle--open"><?php esc_html_e('Menu', 'rf'); ?></span>
                <span class="site-nav__toggle--close"><?php esc_html_e('Close', 'rf'); ?></span>
            </span>
            <span class="site-nav__toggle-icon">
                <svg width="18" height="16" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2.5" cy="1.5" r="1.5" fill="currentColor"/><circle cx="2.5" cy="12.5" r="1.5" fill="currentColor"/><circle cx="13.5" cy="1.5" r="1.5" fill="currentColor"/><circle cx="13.5" cy="12.5" r="1.5" fill="currentColor"/></svg>
            </span>
        </button>
    <?php endif; ?>
    <div class="site-nav">
        <div class="site-nav__bg"></div>
        <div class="site-nav__bg--front"></div>
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu(
                array(
                    'container'  => 'site-nav',
                    'theme_location' => 'primary',
                )
            );
        }
        ?>
        <div class="site-nav__language-switcher">
            <div class="line-wrapper">
                <div class="site-nav__language-switcher-inner">
                    <span class="text--note text--nowrap mobile--hidden tablet--hidden"><?php esc_html_e('Lang', 'rf'); ?>:</span>
                    <ul>
                        <?php
                        if (function_exists('pll_the_languages')) {
                            pll_the_languages(array(
                                "hide_if_no_translation" => true,
                                "show_flags" => false,
                            ));
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if (!wp_is_mobile() && !is_front_page()) : ?>
    <div class="header-v2">
        <div class="site-branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo THEME_URL;?>/images/logo-black.svg" alt="<?php bloginfo( 'name' ); ?>" width="134" height="26">
            </a>
        </div>
        <div class="header-v2__nav">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                    array(
                        'container'  => 'site-nav',
                        'theme_location' => 'primary',
                    )
                );
            }
            ?>
        </div>
        <ul class="header-v2__language-switcher">
            <?php
            if (function_exists('pll_the_languages')) {
                pll_the_languages(array(
                    "hide_if_no_translation" => true,
                    "show_flags" => false,
                ));
            }
            ?>
        </ul>
    </div>
    <?php endif; ?>
