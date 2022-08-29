<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OBE
 */

?>

<footer id="colophon" class="site-footer">
	<div class="icon-star">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/star_gray.svg" alt="">
	</div>
	<div class="subscribe-container">
		<div class="wrapper">
			<div class="subscribe-title text-20-bold">Stay in the know</div>
			<div class="subscribe-subtitle">Subscribe to our monthly newsletter & stay updated</div>
			<div class="subscribe-form">
				<form>
					<div class="form-control-inline">
						<a href='<?= site_url('newsletter-enquiries') ?>' class="btn btn-black">Subscribe</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<?php
		global $wp;
		$current_post_type =  get_post_type();
		$current_slug = add_query_arg(array(), $wp->request);
		$f_title = '';
		$f_content = '';
		$f_button = '';
		$f_url = '';
		if ($current_slug == 'blog') {
			$f_title = 'Louder, for those at the back <br> &nbsp';
			$f_content = 'Breaking boundaries in Open Banking? Have an expert opinion you’d like to share? 
			Become an OBE blog contributor and we’ll help you shout it from the rooftops.';
			$f_button = 'Get Involved';
			$f_url = site_url('blog-enquiries');
		} else if ($current_slug == 'speakers' || $current_post_type == 'speaker') {
			$f_title = 'Get your mic drop moment <br> &nbsp';
			$f_content = 'Breaking boundaries in Open Banking? Have an expert opinion you’d like to share? Apply to be a speaker and lead the conversation.';
			$f_button = 'Apply to Speak';
			$f_url = site_url('apply-to-speak');
		} else if ($current_slug == 'about') {
			$f_title = 'Contacts and Assets <br> &nbsp';
			$f_content = 'For media enquiries, or add any commentaries in our PR pieces please contact us.';
			$f_button = 'Contact Us Now';
			$f_url = 'mailto:becci@openbankingexcellence.org';
		} else if ($current_slug == 'partners') {
			$f_title = 'Looking to supercharge your growth? <br> &nbsp';
			$f_content = 'Access to our global OBE community of over 15K Open Banking pioneers, marketing and events experts as well as PR office will ramp up your connections, brand visibility and deals done.';
			$f_button = 'Get Involved';
			$f_url = site_url('sponsorship-enquires');
		} else {
			$f_title = 'Are you <br> Ready to join?';
			$f_content = 'Collaborate, learn and innovate from the latest insights on the hottest topics, from crypto to financial inclusion.';
			$f_button = 'Register for an account';
			$f_url = site_url('register');
		}
		?>
		<div class="footer-register-container">
			<div class="footer-register-card">
				<img class="icon-box" src="<?php echo get_template_directory_uri(); ?>/assets/images/email_box.svg" alt="">
				<h5><?php echo $f_title; ?></h5>
				<p class="text-16-normal"><?php echo $f_content; ?></p>
				<a href="<?php echo $f_url; ?>" class="btn btn-primary"><?php echo $f_button; ?></a>
			</div>
		</div>
	</div>
	<div class="bottom-footer wrapper">
		<div class="content-bottom-footer">
			<div class="item">
				<div class="more-info">
					<h2 class="main-text-bt-ft">Get in</h2>
					<h2 class="main-text-bt-ft">touch with us</h2>
					<div class="sub-text-bt-ft text-20-light">Don't hesitate to contact</div>
					<div class="wrapper-social-ft text-14-normal">
						<a class="item-social-ft" href="<?= get_option('linkedin_ncc_theme_options')['linkedin_ncc_theme_options'] ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt=""> linkedin
						</a>
						<a class="item-social-ft" href="<?= get_option('twitter_ncc_theme_options')['twitter_ncc_theme_options'] ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/vector.svg" alt=""> twitter
						</a>
						<a class="item-social-ft" href="<?= get_option('youtube_ncc_theme_options')['youtube_ncc_theme_options'] ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.svg" alt=""> youtube
						</a>
					</div>
					<div class="wrapper-contact-ft">
						<div class="title-contact-ft text-14-normal">email</div>
						<a href="mailto:<?= get_option('email_ncc_theme_options')['email_ncc_theme_options'] ?>" class="item-contact-ft text-16-normal"><?= get_option('email_ncc_theme_options')['email_ncc_theme_options'] ?></a>
					</div>
					<div class="copyright"><?= get_option('copyright_ncc_theme_options')['copyright_ncc_theme_options'] ?></div>
				</div>
			</div>
			<div class="item">
				<div class="footer-nav">
					<div class="col-list-navi">
						<div class="title-navi text-16-bold">OBE</div>
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'footer-menu-1',
							'container_class'  => 'menu-ft',
							'menu_class'    => 'ft-menu-ul',
							'link_class'        => 'ft-menu-link',
							'list_item_class'   => 'item-navi'
						));
						?>
					</div>
					<div class="col-list-navi">
						<div class="title-navi">Resources</div>
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'footer-menu-2',
							'container_class'  => 'menu-ft',
							'menu_class'    => 'ft-menu-ul',
							'link_class'        => 'ft-menu-link',
							'list_item_class'   => 'item-navi'
						));
						?>
					</div>
					<div class="col-list-navi">
						<div class="title-navi">Explore</div>
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'footer-menu-3',
							'container_class'  => 'menu-ft',
							'menu_class'    => 'ft-menu-ul',
							'link_class'        => 'ft-menu-link',
							'list_item_class'   => 'item-navi'
						));
						?>

					</div>
				</div>
			</div>
			<div class="copyright-mobile text-14-normal"><?= get_option('copyright_ncc_theme_options')['copyright_ncc_theme_options'] ?></div>

		</div>
	</div>
	<?php
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'promotion',
		'posts_per_page' => 1,
	);
	$the_query = new WP_Query($args);
	?>
	<?php if ($the_query->have_posts()) : ?>
		<?php
		$first_post = $the_query->posts[0];
		$url_image = get_the_post_thumbnail_url($first_post->ID);
		$content = $first_post->post_content;
		$is_show_promo = get_post_meta($first_post->ID, 'advanced_options_promotionshow-or-hide', true);
		$is_show_promo_visit = get_post_meta($first_post->ID, 'advanced_options_promotionshow-new-visitor-or-always-show', true);
		$list_page_show = get_post_meta($first_post->ID, 'advanced_options_promotionshow-in-pages', true);
		?>
		<div class="promo-popup">
			<div class="">
				<div id="promo-container" class="promo-container">
					<div class="sig-container-item">
						<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
						<div class="container">
							<div class="item image">
								<img class="icon-ball" src="<?php echo $url_image; ?>" alt="">
							</div>
							<?php echo $content; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			//Show popup
			window.addEventListener('DOMContentLoaded', (event) => {

				function loadPopupPromo() {
					let is_show_promo_visit = `<?php echo $is_show_promo_visit; ?>`;
					if (is_show_promo_visit === 'true') {
						//new visitor
						let result = checkCookie("PROMO_POPUP");
						if (result == true) {
							$(".promo-popup").addClass('pop-show');
						}
					} else {
						//always show when visit
						$(".promo-popup").addClass('pop-show');
					}
				}

				function closePopupPromo() {
					$(".promo-popup").removeClass('pop-show');
				}

				$('.promo-popup .close-pop-up').on('click', function(e) {
					closePopupPromo();
				});

				function checkCookie(cname) {
					let cookie = getCookie(cname);
					if (cookie != "") {
						return false;
					} else {
						return setCookie(cname, true, 1);
					}
				}

				function setCookie(cname, cvalue, exdays) {
					let d = new Date();
					d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
					let expires = "expires=" + d.toGMTString();
					document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
					return true;
				}

				function getCookie(cname) {
					let name = cname + "=";
					let decodedCookie = decodeURIComponent(document.cookie);
					let ca = decodedCookie.split(';');
					for (let i = 0; i < ca.length; i++) {
						let c = ca[i];
						while (c.charAt(0) == ' ') {
							c = c.substring(1);
						}
						if (c.indexOf(name) == 0) {
							return c.substring(name.length, c.length);
						}
					}
					return "";
				}
				let list_page_show = '<?php echo $list_page_show; ?>';
				let is_show_promo = `<?php echo $is_show_promo; ?>`;
				let current_url = window.location.href;
				if (is_show_promo === 'true') {
					var arr = list_page_show.split(',');
					for (var i = 0; i < arr.length; i++) {
						if (arr[i].trim() === current_url.trim()) {
							loadPopupPromo();
						}
					}
				}

			});
		</script>
	<?php endif; ?>
	<!-- <div class="banner-register">
			<div class="main-text-rg">Are you</div>
			<div class="main-text-rg">Ready to join?</div>
			<div class="description-text-rg">Collaborate, learn and innovate from the latest insights on the hottest topics, from crypto to financial inclusion.</div>
			<button class="button-join-campfire">Register for an account</button>
		</div> -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

<script>
	// todo refactor use webpack
	// var $clickSignIn = $('.icon-header-mobile');
	// var $isOpenSignIn = false;
	// $clickSignIn.click(function(){
	// 	$isOpenSignIn = !$isOpenSignIn; 
	// 	$(".pop-up").css("display",$isOpenSignIn? "flex" : "none");
	// 	$("#sign-container").css("opacity",$isOpenSignIn? "1" : "0");
	// 	$("#sign-container").css("visibility",$isOpenSignIn? "visible" : "hidden");
	// });

	// $('.close-pop-up').click(function() {
	// 	$(".pop-up").css("display",$isOpenSignIn? "flex" : "none");
	// })

	// $(window).click(function(e) {
	// 	$isOpenSignIn = false;
	// 	if (e.target.className == "pop-up") {
	// 		$(".pop-up").css("display", "none");	
	// 	}
	// });

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

	var dialogModule = (function() {
		function init() {
			$('.ndialog-content .close-pop-up').click(function() {
				// console.log('$(this).', $(this));
				$('body').removeClass('mobile-menu-open');
				$('.main-navigation.toggled').removeClass('toggled');
				$(this).closest('.ndialog-wrap')
					.css({
						"opacity": 0,
					});
				setTimeout(() => {
					$(this).closest('.ndialog-wrap')
						.css({
							"visibility": "hidden",
							"position": 'absolute',
							"z-index": -1
						});
				}, 300);
			})

			$('.ndialog').click(function() {
				var main_popup = $(this).data('target');
				let id_campfire = $(this).data('id');
				let url_campfire = $(this).data('url');
				$('#wpforms-565-field_2').val(id_campfire);
				$('#wpforms-565-field_3').val(url_campfire);
				$(main_popup).css({
					"visibility": "visible",
					"opacity": 1,
					"position": "fixed",
					"z-index": 9999
				})
				// .css('display', 'flex');
			})

			$('.ndialog-content').click(function(event) {
				event.stopPropagation();
			})

			$('.ndialog-wrap').click(function(e) {
				$('body').removeClass('mobile-menu-open');
				$('.main-navigation.toggled').removeClass('toggled');
				// console.log('e.target.className', e.target.className);
				// if (e.target.className == "ndialog-content") {
				$(".ndialog-wrap")
					.css({
						"opacity": 0,
					})
				setTimeout(() => {
					$(".ndialog-wrap")
						.css({
							"visibility": "hidden",
							"position": 'absolute',
							"z-index": -1
						});
				}, 300);
				// }
			});
		}

		return {
			init: init
		}
	})();
	dialogModule.init()
	// add some example
	function animateHero(element) {
		var scHero = $(element),
			subheadings = scHero.find('.--reveal'),
			fadeInTexts = scHero.find('.--fade-in'),
			heading1Hero = scHero.find('.--mainheading'),
			textFadeUp = scHero.find('.--fadeUp');
		var gsapWithCSS = gsap;
		var scrollMain = $('body');
		var optAniText = {
			stagger: 0.02,
			staggerContent: 0.008,
			duration: 0.7,
			durationContent: 0.4,
			y: '40%'
		}
		var triggerPoint = '85%';

		for (var subheading of subheadings) {
			var tlHero = gsapWithCSS.timeline({
				scrollTrigger: {
					trigger: subheading,
					scroller: scrollMain,
					scrub: false,
					pin: false,
					start: 'top ' + triggerPoint,
					end: 'bottom',
					// markers: true,
					// onEnter: ({progress, direction, isActive}) => console.log('vao', progress, direction, isActive)
				}
			});
			gsapWithCSS.set(subheading, {
				autoAlpha: 1
			});
			var mySplitText = new SplitText(subheading, {
				type: "words, chars",
				charsClass: "char",
				wordsClass: "word",
				display: "inline"
			});
			// var tl = gsap.timeline(), 
			chars = mySplitText.chars; //an array of all the divs that wrap each character
			// console.log('headingHero', chars);
			//end 
			tlHero.from(chars, {
				y: optAniText.y,
				autoAlpha: 0,
				duration: optAniText.duration,
				stagger: optAniText.stagger,
			}).fromTo(textFadeUp, {
				y: 40,
				autoAlpha: 0,
				duration: optAniText.duration,
				stagger: 0.15
			}, {
				y: 0,
				autoAlpha: 1,
				duration: optAniText.duration,
				stagger: 0.15
			}, '=-1');
		}

		// fadeInTexts start
		for (var fadeInText of fadeInTexts) {
			var tlFadeHero = gsapWithCSS.timeline({
				scrollTrigger: {
					trigger: fadeInText,
					scroller: scrollMain,
					scrub: false,
					pin: false,
					start: 'top ' + triggerPoint,
					end: 'bottom',
					// markers: true,
					// onEnter: ({progress, direction, isActive}) => console.log('vao', progress, direction, isActive)
				}
			});
			tlFadeHero.fromTo(fadeInText, {
				opacity: 0,
				y: 50
			}, {
				opacity: 1,
				y: 0,
				duration: optAniText.duration
			})
		}
	}

	var isMobile = (function() {
		let check = false;
		(function(a) {
			if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	})();
	$(document).ready(function() {
		console.log("ready!");
		// if (!isMobile) {
		for (var item of $('.schero')) {
			// animateHero(item);
		}
		// }

		// menu 
		$(".menu-toggle").click(function() {
			$('body').toggleClass('mobile-menu-open');
		});

		$('[ndata-fancybox="video"]').fancybox({
			// Options will go here
			video: {
				tpl: '<video class="fancybox-video" controls controlsList="nodownload">' +
					'<source src="{{src}}" type="{{format}}" />' +
					'Sorry, your browser doesn\'t support embedded videos, <a href="{{src}}">download</a> and watch with your favorite video player!' +
					"</video>",
				autoStart: true
			},
		});

		// $('select').each(function(){
		// 	var $this = $(this), numberOfOptions = $(this).children('option').length;
		// 	$this.addClass('select-hidden'); 
		// 	$this.wrap('<div class="select"></div>');
		// 	$this.after('<div class="select-styled"></div>');

		// 	var $styledSelect = $this.next('div.select-styled');
		// 	$styledSelect.text($this.children('option').eq(0).text());

		// 	var $list = $('<ul />', {'class': 'select-options'}).insertAfter($styledSelect);

		// 	for (var i = 0; i < numberOfOptions; i++) {
		// 		$('<li />', {
		// 			text: $this.children('option').eq(i).text(),
		// 			rel: $this.children('option').eq(i).val()
		// 		}).appendTo($list);
		// 	}

		// 	var $listItems = $list.children('li');
		// 	var $elementDropdown = null;
		// 	var $countShow = 0;
		// 	var $countDrop = false;

		// 	$styledSelect.click(function(e) {
		// 		$elementDropdown = this;
		// 		if( $countShow > 0) {
		// 			$($elementDropdown,'div.select-styled').removeClass('selected-after').addClass('select-before');
		// 		}
		// 		$('ul.select-options').css("opacity", "1");
		// 		e.stopPropagation();
		// 		$('div.select-styled.active').each(function(){
		// 			$(this).removeClass('active').next('ul.select-options').hide();
		// 		});
		// 		$(this).toggleClass('active').next('ul.select-options').toggle();
		// 	});

		// 	$listItems.click(function(e) {
		// 		++$countShow;
		// 		$countDrop = true;
		// 		if($countShow > 0 && $countDrop == true) {
		// 			$($elementDropdown,'div.select-styled')
		// 			$($elementDropdown,'div.select-styled').removeClass('select-before').addClass('selected-after');
		// 		}
		// 		e.stopPropagation();
		// 		$styledSelect.text($(this).text()).removeClass('active');
		// 		$this.val($(this).attr('rel'));
		// 		$list.hide();
		// 	});

		// 	$(document).click(function() {
		// 		$styledSelect.removeClass('active');
		// 		$list.hide();
		// 		$countDrop = false;
		// 		if($countDrop === false && $countShow > 0) {
		// 			$($elementDropdown,'div.select-styled').removeClass('select-before').addClass('selected-after');
		// 		}
		// 	});
		// });
	});



	//Show div my account
	$('.icon-header-mobile.my-account').click(function() {
		// alert($('.user-profile-mobile').css("opacity"));
		if ($('.user-profile-mobile').css("opacity") == "0") {
			$('.user-profile-mobile').css('opacity', '1')
			$('.user-profile-mobile').css('display', 'block')
		} else {
			$('.user-profile-mobile').css('opacity', '0')
			$('.user-profile-mobile').css('display', 'none')
		}
	});


	function scrollDetect() {
		var lastScroll = 0;
		window.onscroll = function() {
			let currentScroll = document.documentElement.scrollTop || document.body.scrollTop; // Get Current Scroll Value
			if (currentScroll > 0 && lastScroll <= currentScroll) {
				lastScroll = currentScroll;
				$('.site-header').addClass('--fixed');
				$('.site-header').removeClass('--bgwhite');
				if (currentScroll > 80) {
					$('.campfire-detail-fixed').addClass('show');
				}
			} else if (currentScroll == 0) {
				lastScroll = currentScroll;
				$('.site-header').removeClass('--fixed');
				$('.site-header').removeClass('--bgwhite');
				$('.campfire-detail-fixed').removeClass('show');
			} else {
				lastScroll = currentScroll;
				$('.site-header').addClass('--bgwhite');
				$('.site-header').removeClass('--fixed');
				$('.campfire-detail-fixed').removeClass('show');
			}
		};
	}
	scrollDetect();
</script>
<script>
	jQuery(document).ready(function($) {
		$('.btn-attend-campfire-click').on('click', function() {
			let id_campfire = $(this).data('id');
			let data = {
				action: 'user_attend_campfire',
				id_campfire: id_campfire,
			};
			$.post(ajax_object.ajaxurl, data, function(response) {
				if (response['code'] == '200') {
					$('.btn-attend-campfire-' + response['id_campfire']).addClass('attended');
					$('.btn-attend-campfire-' + response['id_campfire']).text('Attending');
				}
			});
		});
	});
</script>
<!-- alert-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</html>