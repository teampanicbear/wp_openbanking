<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OBE
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
	<script type="text/javascript" src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/plugins/CSSPlugin.min.js"></script>
	<script src="<?= get_template_directory_uri() ?>/js/trailEffect.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>

	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://unpkg.com/tippy.js@6"></script>
	<!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/SplitText3.min.js"></script> -->
	<script src="<?= get_template_directory_uri(); ?>/js/SplitText.min.js"></script>
	<!-- todo use webpack to bundle -->

	<!-- alert-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header id="masthead" class="site-header">
		<div class="content-header">
			<?php
			$custom_logo_id = get_theme_mod('custom_logo');
			$image = wp_get_attachment_image_src($custom_logo_id, 'full');
			?>
			<a class="logo-header" href="<?php echo esc_url(home_url('/')); ?>" class="logo">
				<img src="<?php echo $image[0]; ?>" alt="">
			</a>
			<nav id="site-navigation" class="main-navigation">
				<div class="div">
					<?php
					if (!is_user_logged_in()) { ?>
						<div class="icon-header-mobile ndialog" id="icon-signin" data-target="#signin_popup">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user_login.svg" alt="">
						</div>
					<?php } else { ?>
						<?php
						$current_user = wp_get_current_user();
						$user_email = $current_user->user_email;
						$fullname = $current_user->display_name;
						?>
						<div class="icon-header-mobile my-account">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user_login.svg" alt="">
						</div>
						<div class="user-profile-mobile">
							<div class="user-name text-16-bold"><?php echo $fullname ?></div>
							<div class="user-email text-12-normal"><?php echo $user_email ?></div>
							<div class="setting text-16-normal"><a class='user-link' href="<?= site_url('my-account') ?>">Profile setting</a></div>
							<div class="logout text-16-normal"><a class='user-link' href="<?= wp_logout_url(site_url()); ?>">Logout</a></div>
						</div>
					<?php } ?>
				</div>
				<div class="menu-toggle2">
					<button class="menu-toggle btn-menu" aria-controls="primary-menu" aria-expanded="false">
						<img class="icon-menu" src="<?php echo get_template_directory_uri(); ?>/assets/images/hambuger.svg" alt="">
						<img class="icon-close" src="<?php echo get_template_directory_uri(); ?>/assets/images/close_white.svg" alt="">
					</button>
				</div>
				<?php
				wp_nav_menu(array(
					'theme_location'  => 'menu-1',
					'container'    => 'nav',
					'container_class'  => 'menu',
					'menu_class'    => 'menu__list',
					'link_class'        => 'menu__link',
					'list_item_class'   => 'menu__item'
				));
				?>
			</nav>
			<?php
			if (!is_user_logged_in()) { ?>
				<div>
					<a href="javascript:void(0)" data-target="#signin_popup" class="sign-in ndialog" id="signin">Sign in</a>
				</div>
				<a href="<?= site_url('register') ?>" class="button-join-campfire btn-primary">Join Campfire</a>
			<?php } else { ?>
				<?php
				$current_user = wp_get_current_user();
				$user_email = $current_user->user_email;
				$fullname = $current_user->display_name;
				?>
				<div class="wrapper-my-profile">
					<a href="<?= site_url('my-account') ?>" class="my-profile">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user_login.svg" alt="">
						My Account
					</a>
					<div class="user-profile">
						<div class="user-name text-16-bold"><?php echo $fullname ?></div>
						<div class="user-email text-12-normal"><?php echo $user_email ?></div>
						<div class="setting text-16-normal"><a class='user-link link' href="<?= site_url('my-account') ?>">Profile setting</a></div>
						<div class="logout text-16-normal"><a class='user-link link' href="<?= wp_logout_url(site_url()); ?>">Logout</a></div>
					</div>
				</div>
			<?php } ?>
		</div><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div class="pop-up ndialog-wrap" id="signin_popup">
		<div class="wrapper-popup ndialog-content">
			<div id="sign-container" class="sign-container">
				<div class="sig-container-item">
					<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
					<h5 class="sign-heading">Welcome back</h5>
					<p class="text-16-normal">It's always good to see you back here! Join us around our campfire.</p>
					<?php echo do_shortcode('[wpforms id="565"]'); ?>
					<div class="wrapper-checkbox">
						<input class="checkbox" id='remember-me' type="checkbox"> Remember me
					</div>
					<hr class="sign-line" />
					<div class="wrapper-sign-link">
						<a href="javascript:void(0)" id="btn-forgot-password" data-target="#reset_password_popup" class="link sign-link ndialog">Forgot password</a>
						<span class="text-16-normal">You don’t have an account? <a href="<?= site_url('register') ?>" class="link sign-link">Register now</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="pop-up ndialog-wrap" id="reset_password_popup">
		<div class="wrapper-popup ndialog-content">
			<div id="sign-container" class="sign-container change-password-container">
				<div class="sig-container-item">
					<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
					<h5 class="sign-heading">Reset password</h5>
					<p class="text-16-normal">Enter the email associated with your account and we'll send an email with instructions to reset your password</p>
					<div class="form-control-input pb10">
						<input name="email" id="email" type="email" placeholder="Enter your email" />
					</div>
					<div class="form-control-action">
						<button id="btn-reset-pass" data-target="#check_your_mail_popup" name="reset-pass" class="btn-primary change-button sign-link ndialog">Send Instructions</button>
					</div>
				</div>
			</div>
		</div>
		<div id='loader-pop-up-reset-password' class="load-container loading">
			<div class="loader-pop-up-reset-password"></div>
		</div>
	</div>

	<div class="pop-up ndialog-wrap" id="check_your_mail_popup">
		<div class="wrapper-popup ndialog-content">
			<div id="sign-container" class="sign-container change-password-container">
				<div class="sig-container-item">
					<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
					<div class='check-mail-container'>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/email-sent.svg" alt="">
						<div class='check-mail-text-container'>
							<h5 class="text-center">Check your email</h5>
							<p class="text-check-mail-content text-16-normal text-center">We have sent a password recover instructions to your email.</p>
						</div>
						<div class="form-control-action">
							<button id="btn-check-your-mail" name="check-your-mail" class="btn-primary change-button">Open email app</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id='loader' class="load-container loading">
		<div class="loader"></div>
	</div>
	<div id='loader' class="load-container loading">
		<div class="loader"></div>
	</div>

	<script>
		//Component select
		Vue.component('select-custom', {
			props: {
				options: {
					type: Array,
					required: true,
				},
				default: {
					type: String,
					required: false,
					default: null,
				},
				tabindex: {
					type: Number,
					required: false,
					default: 0,
				},
				firstEmit: {
					type: Boolean,
					required: false,
					default: false,
				},
			},
			data() {
				return {
					selected: this.default ?
						this.default :
						this.options.length > 0 ?
						this.options[0] :
						null,
					open: false,
				};
			},
			mounted() {
				this.firstEmit && this.$emit("input", this.selected);
			},
			template: ` 
		<div class="custom-select" :tabindex="tabindex" @blur="open = false">
			<div class="selected" :class="{ open: open }" @click="open = !open">
			{{ selected ? selected.name : '' }}
			<img class="arrow-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
			</div>
			<div class="items" :class="{ selectHide: !open }">
				<div
					v-for="(option, i) of options"
					:key="i"
					@click="
					selected = option;
					open = false;
					$emit('input', option);
					"
				>
					{{ option.name }}
				</div>
			</div>
		</div>`
		})

		jQuery(document).ready(function($) {
			$('#btn-check-your-mail').on('click', function() {
				window.location.href = "mailto:" + $('#email').val();
			});
			$('#btn-forgot-password').on('click', function() {
				$('#signin_popup').hide();
				$('#reset_password_popup').show();
			});
			$('#signin,#icon-signin').on('click', function() {
				$('#signin_popup').show();
			});
			$('#btn-reset-pass').on('click', function() {
				$('#check_your_mail_popup').hide();
				let email = $('#email').val();
				if (email === '') {
					$.alert({
						title: 'Warning',
						content: 'Not be empty',
						type: 'orange',
						useBootstrap: false
					});
				} else {
					$('#loader-pop-up-reset-password').show();
					let data = {
						action: 'send_link_reset',
						email: email,
					};
					$.post(ajax_object.ajaxurl, data, function(response) {
						if (response === 'success') {
							$('#loader-pop-up-reset-password').hide();
							$.alert({
								title: 'Success',
								content: 'Link sent successfully',
								type: 'green',
								useBootstrap: false
							});
							$('#reset_password_popup').hide();
							$('#check_your_mail_popup').show();
						} else if (response === 'wrong email') {
							$('#loader-pop-up-reset-password').hide();
							$.alert({
								title: 'Warning',
								content: 'Unregistered email',
								type: 'red',
								useBootstrap: false
							});
						} else {
							$('#loader-pop-up-reset-password').hide();
							$.alert({
								title: 'Error',
								content: 'System error',
								type: 'red',
								useBootstrap: false
							});
						}
					});
				}
			});
		});
	</script>