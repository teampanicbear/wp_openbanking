<?php
/**
 * Template Name: Register Page
 * This template will only display the content you entered in the page editor
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- <link href="https://db.onlinewebfonts.com/c/0d39a4e3c36c494c84e2c38618bfed33?family=Publico+Text+Web" rel="stylesheet" type="text/css"/> -->

	<!-- todo use webpack to bundle -->
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main">
	<div class="wrapper-signup">
		<div class="sign-up-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sig_up_logo.svg" alt="">
		</div>
		<div class="sign-up-background">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sign_up_background.jpg" alt="">
		</div>
		<div class="sign-up-form">
			<div class="wrapper-form">
				<div class="form-header">
					<div class="header-action">
						<a href="<?= site_url() ?>" class="link header-action-left">Back to Homepage</a>
						<?php
							$link =  site_url('login');
							if(isset($_GET['id'])){
								$link = $link.'?id='.$_GET['id'];
							}
						?>
						<a href="<?php echo $link; ?>" class="link header-action-right">Sign in</a>
					</div>
					
					<p class="text-16-normal"> Welcome to OBE</p>
					<h4> Great to See You Here!</h4>
				</div>    
				<div class="form-control-inline form-control">
					<?php echo do_shortcode( '[wpforms id="566"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->
<script>
	let id_campfire = '<?php echo $_GET['id']; ?>';
	document.getElementById('wpforms-566-field_14').value = id_campfire;
</script>
<?php wp_footer(); ?>
</body>
