<?php

/**
 * Template Name: Page iframe form
 * This template will only display the content you entered in the page editor
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wrapper-page-iframe">
		<div class="wrapper-page-iframe-banner">
			<div class="wrapper">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>

		<div class="wrapper-page-iframe-info">
			<div class="bottom-header"></div>
			<div class="wrapper wrapper-page-iframe-content">
				<div class="wrapper-page-iframe">
					<div class="wrapper-content">
						<div class="content-header">
							<h5><?php echo get_field('title_form'); ?></h5>
							<h3><?php echo get_field('title_form'); ?></h3>
						</div>
						<hr />
						<div class="content-body">
							<iframe src="<?php echo get_field('url_iframe_form'); ?>" title="<?php the_title(); ?>"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
