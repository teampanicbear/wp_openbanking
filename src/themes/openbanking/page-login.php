<?php

/**
 * Template Name: Login Page
 * This template will only display the content you entered in the page editor
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
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
		<div class="wrapper-signup wrapper-signin-page">
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
								$link =  site_url('register');
								if(isset($_GET['id'])){
									$link = $link.'?id='.$_GET['id'];
								}
							?>
							<a href="<?php echo $link; ?>" class="link header-action-right">Sign up</a>
						</div>
						<p class="text-16-normal"> Sign in</p>
						<h4> Welcome back</h4>
						<p class="text-16-normal"> It's always good to see you back here! Join us around our campfire.</p>


					</div>
					<div class="form-control-inline form-control">
						<?php echo do_shortcode('[wpforms id="565"]'); ?>

						<span class="text-16-normal special">This information is stored
							in our CRM database and is used only to contact you.
							We never share your data with third parties.
							For details, see our
							<a href="<?= site_url('term-policy') ?>" class="link sign-link">Privacy Policy</a>.
						</span>

					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
	<?php wp_footer(); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		let html_remember = `<div class="wrapper-checkbox">
								<input class="checkbox" id='remember-me' type="checkbox"><span class='text-remmember'> Remember me</span> 
							</div>`;
		document.getElementsByClassName("wpforms-submit-container")[0].insertAdjacentHTML("beforebegin", html_remember);
		document.getElementById("wpforms-submit-565").innerHTML = 'Sign in to your account';
		//remember-me
		let user_cookie = '<?php echo $_COOKIE["user_login_details"]; ?>';
		$('#remember-me').click(function() {
			if ($(this).prop("checked") == true) {
				$('#wpforms-565-field_5').val('true');
			} else if ($(this).prop("checked") == false) {
				$('#wpforms-565-field_5').val('false');
			}
		});
		if (user_cookie !== '') {
			user_cookie_arr = user_cookie.split("_obe_aaa_");
			$('#wpforms-565-field_0').val(user_cookie_arr[0]);
			$('#wpforms-565-field_1').val(user_cookie_arr[1]);
		}

		let id_campfire = '<?php echo $_GET['id']; ?>';
		document.getElementById('wpforms-565-field_2').value = id_campfire;
	</script>
</body>