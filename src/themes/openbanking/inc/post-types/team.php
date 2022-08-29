<?php
// Register Custom Post Type team
function create_team_cpt()
{

	$labels = array(
		'name' => _x('team', 'Post Type General Name', 'obe'),
		'singular_name' => _x('team', 'Post Type Singular Name', 'obe'),
		'menu_name' => _x('Team', 'Admin Menu text', 'obe'),
		'name_admin_bar' => _x('team', 'Add New on Toolbar', 'obe'),
		'archives' => __('team Archives', 'obe'),
		'attributes' => __('team Attributes', 'obe'),
		'parent_item_colon' => __('Parent team:', 'obe'),
		'all_items' => __('All team', 'obe'),
		'add_new_item' => __('Add New team', 'obe'),
		'add_new' => __('Add New', 'obe'),
		'new_item' => __('New team', 'obe'),
		'edit_item' => __('Edit team', 'obe'),
		'update_item' => __('Update team', 'obe'),
		'view_item' => __('View team', 'obe'),
		'view_items' => __('View team', 'obe'),
		'search_items' => __('Search team', 'obe'),
		'not_found' => __('Not found', 'obe'),
		'not_found_in_trash' => __('Not found in Trash', 'obe'),
		'featured_image' => __('Featured Image', 'obe'),
		'set_featured_image' => __('Set featured image', 'obe'),
		'remove_featured_image' => __('Remove featured image', 'obe'),
		'use_featured_image' => __('Use as featured image', 'obe'),
		'insert_into_item' => __('Insert into team', 'obe'),
		'uploaded_to_this_item' => __('Uploaded to this team', 'obe'),
		'items_list' => __('team list', 'obe'),
		'items_list_navigation' => __('team list navigation', 'obe'),
		'filter_items_list' => __('Filter team list', 'obe'),
	);
	$args = array(
		'label' => __('team', 'obe'),
		'description' => __('Custom post type for team', 'obe'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-buddicons-buddypress-logo',
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
	register_post_type('team', $args);
}
add_action('init', 'create_team_cpt', 0);


add_action('add_meta_boxes', 'team_add_metabox');




function team_add_metabox()
{

	add_meta_box(
		'team_metabox', // metabox ID
		'Teams', // detail
		'team_metabox_callback', // callback function
		'team', // post type or post types in array
		'normal', // position (normal, side, advanced)
		'default' // priority (default, low, high, core)
	);
}

function team_metabox_callback($post)
{

	$description = get_post_meta($post->ID, 'description', true);
	$position = get_post_meta($post->ID, 'position', true);
   
	// nonce, actually I think it is not necessary here
	wp_nonce_field('somerandomstr', '_mishanonce');


	echo '<table class="form-table">
		<tbody>
            <tr>
                <th><label for="description">Description</label></th>
				
                <td>
					<textarea rows="4" cols="50" id="description" name="description" class="regular-text">'.esc_attr($description).'</textarea>
				</td>
			</tr>
            <tr>
				<th><label for="position">Position</label></th>
				<td><input type="text" id="position" name="position" value="' . esc_attr($position) . '" class="regular-text"></td>
			</tr>
		</tbody>
	</table>';

}

add_action('save_post', 'team_save_meta', 10, 2);


function team_save_meta($post_id, $post)
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
	if ($post->post_type != 'team') {
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
   
	
	return $post_id;
}
