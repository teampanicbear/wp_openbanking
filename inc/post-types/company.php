<?php
// Register Custom Post Type
function company_post_type() {

	$labels = array(
		'name'                  => _x( 'Company', 'Post Type General Name', 'OBE' ),
		'singular_name'         => _x( 'Company', 'Post Type Singular Name', 'OBE' ),
		'menu_name'             => __( 'Company', 'OBE' ),
		'name_admin_bar'        => __( 'Company', 'OBE' ),
		'archives'              => __( 'Item Archives', 'OBE' ),
		'attributes'            => __( 'Item Attributes', 'OBE' ),
		'parent_item_colon'     => __( 'Parent Item:', 'OBE' ),
		'all_items'             => __( 'All Items', 'OBE' ),
		'add_new_item'          => __( 'Add New Item', 'OBE' ),
		'add_new'               => __( 'Add New', 'OBE' ),
		'new_item'              => __( 'New Item', 'OBE' ),
		'edit_item'             => __( 'Edit Item', 'OBE' ),
		'update_item'           => __( 'Update Item', 'OBE' ),
		'view_item'             => __( 'View Item', 'OBE' ),
		'view_items'            => __( 'View Items', 'OBE' ),
		'search_items'          => __( 'Search Item', 'OBE' ),
		'not_found'             => __( 'Not found', 'OBE' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'OBE' ),
		'featured_image'        => __( 'Featured Image', 'OBE' ),
		'set_featured_image'    => __( 'Set featured image', 'OBE' ),
		'remove_featured_image' => __( 'Remove featured image', 'OBE' ),
		'use_featured_image'    => __( 'Use as featured image', 'OBE' ),
		'insert_into_item'      => __( 'Insert into item', 'OBE' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'OBE' ),
		'items_list'            => __( 'Items list', 'OBE' ),
		'items_list_navigation' => __( 'Items list navigation', 'OBE' ),
		'filter_items_list'     => __( 'Filter items list', 'OBE' ),
	);
	$rewrite = array(
		'slug'                  => 'company',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Company', 'OBE' ),
		'description'           => __( 'Company', 'OBE' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'          	=> 'dashicons-building',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'company', $args );

}
add_action( 'init', 'company_post_type', 0 );