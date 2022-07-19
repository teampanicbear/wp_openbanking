<?php
// Register Custom Post Type testimonial
function create_testimonial_cpt()
{

	$labels = array(
		'name' => _x('testimonial', 'Post Type General Name', 'obe'),
		'singular_name' => _x('testimonial', 'Post Type Singular Name', 'obe'),
		'menu_name' => _x('Testimonial', 'Admin Menu text', 'obe'),
		'name_admin_bar' => _x('testimonial', 'Add New on Toolbar', 'obe'),
		'archives' => __('testimonial Archives', 'obe'),
		'attributes' => __('testimonial Attributes', 'obe'),
		'parent_item_colon' => __('Parent testimonial:', 'obe'),
		'all_items' => __('All testimonial', 'obe'),
		'add_new_item' => __('Add New testimonial', 'obe'),
		'add_new' => __('Add New', 'obe'),
		'new_item' => __('New testimonial', 'obe'),
		'edit_item' => __('Edit testimonial', 'obe'),
		'update_item' => __('Update testimonial', 'obe'),
		'view_item' => __('View testimonial', 'obe'),
		'view_items' => __('View testimonial', 'obe'),
		'search_items' => __('Search testimonial', 'obe'),
		'not_found' => __('Not found', 'obe'),
		'not_found_in_trash' => __('Not found in Trash', 'obe'),
		'featured_image' => __('Featured Image', 'obe'),
		'set_featured_image' => __('Set featured image', 'obe'),
		'remove_featured_image' => __('Remove featured image', 'obe'),
		'use_featured_image' => __('Use as featured image', 'obe'),
		'insert_into_item' => __('Insert into testimonial', 'obe'),
		'uploaded_to_this_item' => __('Uploaded to this testimonial', 'obe'),
		'items_list' => __('testimonial list', 'obe'),
		'items_list_navigation' => __('testimonial list navigation', 'obe'),
		'filter_items_list' => __('Filter testimonial list', 'obe'),
	);
	$args = array(
		'label' => __('testimonial', 'obe'),
		'description' => __('Custom post type for testimonial', 'obe'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-buddicons-friends',
		'supports' => array('title', 'thumbnail', 'page-attributes', 'post-formats'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonial_cpt', 0);


add_action('add_meta_boxes', 'testimonial_add_metabox');


// media 
add_action('admin_enqueue_scripts', 'misha_include_js');

function misha_include_js()
{

	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	wp_enqueue_script('myuploadscript', get_stylesheet_directory_uri() . '/inc/post-types/testimonials.js', array('jquery'));
	wp_enqueue_style('myuploadstyle', get_stylesheet_directory_uri() . '/inc/post-types/post-types.css');
}

function testimonial_add_metabox()
{

	add_meta_box(
		'testimonial_metabox', // metabox ID
		'Testimonials', // detail
		'testimonial_metabox_callback', // callback function
		'testimonial', // post type or post types in array
		'normal', // position (normal, side, advanced)
		'default' // priority (default, low, high, core)
	);
}

function testimonial_metabox_callback($post)
{

	$description = get_post_meta($post->ID, 'description', true);
	$position = get_post_meta($post->ID, 'position', true);
	$image_id = get_option('image_id');
	$image_id = get_post_meta($post->ID, 'logo', true);


	$logo =  $post->logo;
	$value = get_post_meta($post->ID, 'type', true);


	// nonce, actually I think it is not necessary here
	wp_nonce_field('somerandomstr', '_mishanonce');
?>
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="description">Description</label></th>

				<td>
					<textarea rows="4" cols="50" id="description" name="description" class="regular-text"><?php echo $description ?></textarea>
				</td>
			</tr>
			<tr>
				<th><label for="position">Position</label></th>
				<td><input type="text" id="position" name="position" value="<?php echo $position ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="type">Type</label></th>
				<td>
					<input type="checkbox" id="html" name="type" <?php checked($value, 'sponsor'); ?> value="sponsor">
					<label for="css">Sponsors</label>
				</td>
			</tr>
			<tr>
				<input style="display:none" name="image_id" id="image_id" value="<?php echo $image_id ?>" class="regular-text" />
			</tr>
		</tbody>
	</table>

	<?php if ($logo == "") { ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="logo">Logo</label></th>
					<td>
						<img style="display:none;" id="misha-img" src="#" alt="your image" />
						<button href="#" class="misha-upl button" id="misha-upl">Upload image</button>
						<input type="hidden" name="misha-img" value="">
					</td>
				</tr>
				<tr>
					<th><label for="logo"></label></th>
					<td>
						<button href="#" class="misha-rmv button" id="misha-rmv" style="display:none">Remove image</button>
					</td>
				</tr>
			</tbody>
		</table>

	<?php } else { ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="logo">Logo</label></th>
					<td>
						<img id="misha-img" src=" <?php echo $logo ?>" alt="your image" />
						<button href="#" style="display:none" class="misha-upl button" id="misha-upl">Upload image</button>
						<input type="hidden" name="misha-img" value="">
					</td>
				</tr>
				<tr>
					<th><label for="logo"></label></th>
					<td>
						<button href="#" class="misha-rmv button" id="misha-rmv">Remove image</button>
					</td>
				</tr>
			</tbody>
		</table>
	<?php	} ?>
<?php
}



add_action('save_post', 'testimonial_save_meta', 10, 2);


function testimonial_save_meta($post_id, $post)
{
	// nonce check
	if (!isset($_POST['_mishanonce']) || !wp_verify_nonce($_POST['_mishanonce'], 'somerandomstr')) {
		return $post_id;
	}

	// check current use permissions
	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post_id;
	}

	// Do not save the data if autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// define your own post type here
	if ($post->post_type != 'testimonial') {
		return $post_id;
	}

	if (isset($_POST['description'])) {
		update_post_meta($post_id, 'description', sanitize_text_field($_POST['description']));
	} else {
		delete_post_meta($post_id, 'description');
	}
	if (isset($_POST['position'])) {
		update_post_meta($post_id, 'position', sanitize_text_field($_POST['position']));
	} else {
		delete_post_meta($post_id, 'position');
	}
	if (isset($_POST['type'])) {
		update_post_meta($post_id, 'type', $_POST['type']);
	} else {
		delete_post_meta($post_id, 'type');
	}
	if ($_POST['image_id'] != "") {
		if (is_numeric($_POST['image_id'])) {
			$image_url = wp_get_attachment_image_src($_POST['image_id'])[0];
		} else $image_url = $_POST['image_id'];
		update_post_meta($post_id, 'logo', $image_url);
	} else {
		delete_post_meta($post_id, 'logo');
	}
	return $post_id;
}
