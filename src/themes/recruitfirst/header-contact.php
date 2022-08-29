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
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <script>
			var wp_is_mobile = <?php echo json_encode(wp_is_mobile()); ?>
    </script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URL;?>/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL;?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL;?>/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo THEME_URL;?>/site.webmanifest">
</head>

<body <?php body_class('contact'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rf' ); ?></a>

	<header id="masthead" class="site-header site-header--v2">
		<div class="site-header__inner">
            <h1 class="h2"><?php the_title(); ?></h1>
            <a href="<?php echo home_url(); ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2l20 20M22 2L2 22" stroke="currentColor" stroke-width="3"/></svg></a>
        </div>
	</header><!-- #masthead -->
