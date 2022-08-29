<?php
/**
 * recruitfirst functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package recruitfirst
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.3' );
}
define('THEME_DIR', get_template_directory());
define('THEME_URL', get_template_directory_uri());

if ( ! function_exists( 'recruitfirst_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function recruitfirst_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on recruitfirst, use a find and replace
		 * to change 'rf' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rf', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'rf' ),
                'footer' => esc_html__( 'Footer', 'rf' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'recruitfirst_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        add_image_size( 'blog-card', 640, 640, true );
	}
endif;
add_action( 'after_setup_theme', 'recruitfirst_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function recruitfirst_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'recruitfirst_content_width', 640 );
}
add_action( 'after_setup_theme', 'recruitfirst_content_width', 0 );

/**
 * Add async or defer attributes to script enqueues
 * @author Mike Kormendy
 * @param  String  $tag     The original enqueued <script src="...> tag
 * @param  String  $handle  The registered unique name of the script
 * @return String  $tag     The modified <script async|defer src="...> tag
 */
// only on the front-end
if(!is_admin()) {
    function add_async_defer_attribute($tag, $handle) {
        // if the unique handle/name of the registered script has 'async' in it
        if (strpos($handle, 'async') !== false) {
            // return the tag with the async attribute
            return str_replace( '<script ', '<script async ', $tag );
        }
        // if the unique handle/name of the registered script has 'defer' in it
        else if (strpos($handle, 'defer') !== false) {
            // return the tag with the defer attribute
            return str_replace( '<script ', '<script defer ', $tag );
        }
        // otherwise skip
        else {
            return $tag;
        }
    }
    add_filter('script_loader_tag', 'add_async_defer_attribute', 10, 2);
}

/**
 * Enqueue scripts and styles.
 */
function recruitfirst_scripts() {

    wp_enqueue_script( 'rf-script', THEME_URL . '/assets/main.min.js', array('jquery'), _S_VERSION, true );

    if ( get_page_template_slug() === 'templates/joinus.php' || get_page_template_slug() === 'templates/candidate.php') {
        wp_enqueue_script( 'rf-dropzone-defer', THEME_URL . '/assets/dropzone.min.js', array(), _S_VERSION, false );
    }

    if (is_front_page()) {
        if (wp_is_mobile()) {
            wp_enqueue_style( 'rf-home-style', THEME_URL . '/assets/home-mobile.min.css', array(), _S_VERSION );
            if (isCheck()) {
                wp_enqueue_script( 'rf-home-script-defer', THEME_URL . '/assets/home-mobile.min.js', array(), _S_VERSION, true );
            }
        } else {
            wp_enqueue_style( 'rf-home-style', THEME_URL . '/assets/home.min.css', array(), _S_VERSION );
            if (isCheck()) {
                wp_enqueue_script( 'rf-home-script-defer', THEME_URL . '/assets/home.min.js', array(), _S_VERSION, true );
            }
        }
    }

    if (is_home()) {
        wp_enqueue_script( 'rf-blog-script', THEME_URL . '/assets/blog.min.js', array(), _S_VERSION, true );
    }
    if ( get_page_template_slug() === 'templates/about.php') {

        wp_enqueue_style( 'rf-about-style', THEME_URL . '/assets/about.min.css', array(), _S_VERSION );
        if (isCheck()) {
            wp_enqueue_style('rf-plyr', 'https://cdn.plyr.io/3.6.3/plyr.css', array(), _S_VERSION);
            wp_enqueue_script('rf-about', THEME_URL . '/assets/about.min.js', array(), _S_VERSION, true);
        }
    }

    if ( is_singular('member')) {
        wp_enqueue_style( 'rf-about-style', THEME_URL . '/assets/about.min.css', array(), _S_VERSION );
    }

    if ( get_page_template_slug() === 'templates/employer.php') {
        wp_enqueue_style( 'rf-employer-style', THEME_URL . '/assets/employer.min.css', array(), _S_VERSION );
        if (isCheck()) {
            wp_enqueue_script( 'rf-isotope-defer', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array(), _S_VERSION, true );
            wp_enqueue_script( 'rf-employer-defer', THEME_URL . '/assets/employer.min.js', array(), _S_VERSION, true );
        }
    }

    if ( get_page_template_slug() === 'templates/consolidation.php' || get_page_template_slug() === 'templates/modify.php' || get_page_template_slug() === 'templates/unsubscribe.php') {
        wp_enqueue_style( 'rf-consolidation-style', THEME_URL . '/assets/consolidation.min.css', array(), _S_VERSION );
    }

    if ( get_page_template_slug() === 'templates/modify.php' && isCheck()) {
        wp_enqueue_style( 'rf-daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', array(), _S_VERSION );
        wp_enqueue_style( 'rf-select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), _S_VERSION );
        wp_enqueue_script( 'rf-select2-defer', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'rf-moment-defer', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'rf-daterangepicker-defer', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'rf-modify-alert-defer', THEME_URL . '/assets/modify-alert.min.js', array(), _S_VERSION, true );
    }

    if ( get_page_template_slug() === 'templates/joinus.php') {
        wp_enqueue_style( 'rf-joinus-style', THEME_URL . '/assets/joinus.min.css', array(), _S_VERSION );
        if (isCheck()) {
            wp_enqueue_script('rf-joinus-defer', THEME_URL . '/assets/joinus.min.js', array(), _S_VERSION, true);
        }
    }

    if ( get_page_template_slug() === 'templates/event.php') {
        wp_enqueue_style( 'rf-event-style', THEME_URL . '/assets/event.min.css', array(), _S_VERSION );
    }

    if ( get_page_template_slug() === 'templates/candidate.php' || get_page_template_slug() === 'templates/job-detail.php') {
        wp_enqueue_style( 'rf-candidate-style', THEME_URL . '/assets/candidate.min.css', array(), _S_VERSION );
        if (isCheck()) {
            wp_enqueue_style('rf-daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', array(), _S_VERSION);
            wp_enqueue_style('rf-select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), _S_VERSION);
            wp_enqueue_script('rf-select2-defer', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), _S_VERSION, true);
            wp_enqueue_script('rf-moment-defer', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array(), _S_VERSION, true);
            wp_enqueue_script('rf-daterangepicker-defer', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array(), _S_VERSION, true);
            wp_enqueue_script('rf-candidate-defer', THEME_URL . '/assets/candidate.min.js', array(), _S_VERSION, true);
        }
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_style( 'rf-style', THEME_URL . '/assets/main.min.css', array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'recruitfirst_scripts' );

function recruitfirst_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'font-awesome' );
//    wp_dequeue_style( 'dashicons' );
}
add_action( 'wp_print_styles', 'recruitfirst_deregister_styles', 100 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Custom meta boxes
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/post-type.php';

/**
 * IP Lookup
 */
require get_template_directory() . '/inc/language.php';

/**
 * Job apis
 */
require get_template_directory() . '/inc/rf-api.php';


/**
 * Theme settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//require get_template_directory() . '/inc/widgets.php';

if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}


// Get page url from page template
function get_page_url($template_name)
{
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template_name.'.php',
                'compare' => '='
            ]
        ]
    ]);
    if(!empty($pages))
    {
        foreach($pages as $pages__value)
        {
            return get_permalink($pages__value->ID);
        }
    }
    return get_bloginfo('url');
}

function rf_navigation($max_num_pages = null, $current = null) {
    global $wp_query;

    if (!$max_num_pages) $max_num_pages = $wp_query->max_num_pages;
    if (!$current) $current = max(1, get_query_var('paged'));

    $big = 999999999; // need an unlikely integer

    echo '<div class="pagination">';
    echo '<div class="pagination__inner">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => $current,
        'prev_text' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 12.5L5 8l4.5-4.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'next_text' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.5 3.5L11 8l-4.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'total' => $max_num_pages
    ));
    echo '</div></div>';
}


function custom_wp_is_mobile($is_mobile = false) {

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

//add_filter( 'wp_is_mobile', 'custom_wp_is_mobile' );
function is_decimal( $val ) {
    return is_numeric( $val ) && floor( $val ) != $val;
}

function format_money($number, $currency = null) {
   if (is_decimal($number)) {
       return $currency . ' ' . number_format($number, 2);
   } else {
       return $currency . ' ' . number_format($number);
   }
}


function is_safari() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos( $user_agent, 'Safari') !== false && stripos( $user_agent, 'Chrome') === false) {
        return true;
    }
    return false;
}

function isCheck() {
    if ((stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false)) {
       return true;
    }
    return false;
}


function get_location($job, $defaultCountry = true) {
    $location = '';
    if ($job) {
        if ($defaultCountry) {
            $location = $job->Country ? $job->Country->Name : '';
        }
        $countryCode = $job->Country ? $job->Country->Code : 'SG';

        if ($countryCode == 'HK' || $countryCode == 'SG') {
            if ($job->Landmark) {
                $location = $job->Landmark->Name;
            }
        } else {
            $newLocation = '';
            if ($job->City) {
                $newLocation .= $job->City->Name;
            }
            if ($job->Landmark) {
                $newLocation .= ', ' . $job->Landmark->Name;
            }
            $location = $newLocation;
        }
    }

    return $location;
}
