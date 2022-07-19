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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
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
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
	<!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/SplitText3.min.js"></script> -->
	<script src="<?= get_template_directory_uri(); ?>/js/SplitText.min.js"></script>
	<!-- todo use webpack to bundle -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="masthead" class="site-header">
		<div class="content-header">
			<?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			?>
			<a class="logo-header" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<img src="<?php echo $image[0];?>" alt="">
			</a>
			<nav id="site-navigation" class="main-navigation">
				<div class="icon-header-mobile ndialog"  data-target="#signin_popup">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user_login.svg" alt="">
				</div>
				<div class="menu-toggle2">
					<button class="menu-toggle btn-menu" aria-controls="primary-menu" aria-expanded="false">
						<img class="icon-menu" src="<?php echo get_template_directory_uri(); ?>/assets/images/hambuger.svg" alt="">
						<img class="icon-close" src="<?php echo get_template_directory_uri(); ?>/assets/images/close_white.svg" alt="">
					</button>
				</div>
				<?php
					wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'container'    => 'nav',
					'container_class'  => 'menu',
					'menu_class'    => 'menu__list',
					'link_class'        => 'menu__link',
					'list_item_class'   => 'menu__item'
					) );
				?>
			</nav>
			<a href="#" data-target="#signin_popup" class="sign-in ndialog" id="signin">Sign in</a>
			<a href="#" class="button-join-campfire btn-primary">Join Campfire</a>
		</div><!-- #site-navigation -->
		<div class="pop-up ndialog-wrap" id="signin_popup">
			<div class="wrapper-popup ndialog-content">
				<div id="sign-container" class="sign-container">
					<div class="sig-container-item">
						<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
						<h5 class="sign-heading">Welcome back</h5>
						<p class="text-16-normal">It's always good to see you back here! Join us around our campfire.</p>
						<div class="form-control-input pb10">
							<input  type="text" placeholder="User name or Email"/>
							<input  type="password" placeholder="Password	"/>
						</div>
						<div class="form-control-action">
							<div class="wrapper-checkbox">
								<input class="checkbox" type="checkbox"> Remember me
							</div>
							<div class="wrapper-button">
								<button class="btn-primary sign-button"> sign in</button>
							</div>
						</div>
						<hr class="sign-line"/>
						<div class="wrapper-sign-link">
							<a href="#" class="link sign-link" >Forgot password</a>
							<span class="text-16-normal">You don’t have an account? <a href="#" class="link sign-link" >Register now</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</header><!-- #masthead -->