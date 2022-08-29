<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package OBE
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class='error-404-page-content'>
			<div class='error-404-img-left'>
				<img class="icon-ball" src="<?php echo get_template_directory_uri(); ?>/assets/images/404-bubble-left.svg" alt="">
			</div>
			<div class='error-404-content'>
				<p class='text-404'>404</p>
				<h4 class='title-404'>Oops! Page not found</h4>
				<p class='text-16-normal'>It looks like you may have taken a wrong turn. Don't worry, it happens to most of us</p>
				<a class="btn btn-primary" href="<?= site_url() ?>">Back to Homepage</a>
			</div>
			<div class='error-404-img-right'>
				<img class="icon-ball" src="<?php echo get_template_directory_uri(); ?>/assets/images/404-bubble-right.svg" alt="">
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
