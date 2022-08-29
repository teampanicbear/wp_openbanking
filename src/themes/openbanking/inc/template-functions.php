<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package OBE
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function obe_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'obe_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function obe_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'obe_pingback_header' );

// Add siteOrigin widget
function add_my_awesome_widgets_collection($folders)
{
    $folders[] = get_template_directory().'/widgets/'; // important: Slash on end string is required.
    return $folders;
}

add_filter('siteorigin_widgets_widget_folders', 'add_my_awesome_widgets_collection');
function mytheme_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('NCC', 'ncc'),
        'filter' => array(
            'groups' => array('ncc')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'mytheme_add_widget_tabs', 20);

// Hook setting page

/**
 * Theme Option Page Example
 */
function ncc_theme_menu()
{
    add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'ncc_theme_options.php', 'ncc_theme_page');
}
add_action('admin_menu', 'ncc_theme_menu');
/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */
function ncc_theme_page()
{
    ?>
    <div class="section panel">
        <h1>Custom Theme Options</h1>
        <form method="post" enctype="multipart/form-data" action="options.php">
            <?php
            settings_fields('ncc_theme_options');
            do_settings_sections('ncc_theme_options.php');
            ?>
            <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </form>
    </div>
    <?php
}

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'ncc_register_settings' );
/**
 * Function to register the settings
 */
function ncc_register_settings()
{
    // Register the settings with Validation callback
    add_settings_section( 'ncc_text_section', '', 'ncc_display_section', 'ncc_theme_options.php' );
    // Create textbox field
    $config_textbox = ['linkedin_ncc_theme_options' => 'Linkedin', 'twitter_ncc_theme_options' => 'Twitter',
        'youtube_ncc_theme_options' => 'Youtube', 'email_ncc_theme_options' => 'Email',
        'copyright_ncc_theme_options' => 'Copyright',
        'other_article_detail_ncc_theme_options' => 'Other Articles'];
    foreach ($config_textbox as $key => $item) {
        register_setting( 'ncc_theme_options', $key );
        $field_args = array(
            'type'      => 'text',
            'id'        => $key,
            'name'      => $key,
            'desc'      => $item,
            'label_for' => $key,
        );
        add_settings_field($key, $item, 'ncc_display_setting', 'ncc_theme_options.php', 'ncc_text_section', $field_args );
    }
}
/**
 * Function to add extra text to display on each section
 */
function ncc_display_section($section){
}
/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function ncc_display_setting($args)
{
    extract( $args );
    $option_name = $name;

    $options = get_option( $option_name );
    switch ( $type ) {
        case 'text':
            $options[$id] = stripslashes($options[$id]);
            $options[$id] = esc_attr( $options[$id]);
            echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";
            break;
    }
}
