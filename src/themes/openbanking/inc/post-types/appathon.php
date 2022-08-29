<?php
// Register Custom Post Type
function appathon_post_type()
{

	$labels = array(
		'name'                  => _x('Appathon', 'Post Type General Name', 'OBE'),
		'singular_name'         => _x('Appathon', 'Post Type Singular Name', 'OBE'),
		'menu_name'             => __('Appathon', 'OBE'),
		'name_admin_bar'        => __('Appathon', 'OBE'),
		'archives'              => __('Item Archives', 'OBE'),
		'attributes'            => __('Item Attributes', 'OBE'),
		'parent_item_colon'     => __('Parent Item:', 'OBE'),
		'all_items'             => __('All Items', 'OBE'),
		'add_new_item'          => __('Add New Item', 'OBE'),
		'add_new'               => __('Add New', 'OBE'),
		'new_item'              => __('New Item', 'OBE'),
		'edit_item'             => __('Edit Item', 'OBE'),
		'update_item'           => __('Update Item', 'OBE'),
		'view_item'             => __('View Item', 'OBE'),
		'view_items'            => __('View Items', 'OBE'),
		'search_items'          => __('Search Item', 'OBE'),
		'not_found'             => __('Not found', 'OBE'),
		'not_found_in_trash'    => __('Not found in Trash', 'OBE'),
		'featured_image'        => __('Featured Image', 'OBE'),
		'set_featured_image'    => __('Set featured image', 'OBE'),
		'remove_featured_image' => __('Remove featured image', 'OBE'),
		'use_featured_image'    => __('Use as featured image', 'OBE'),
		'insert_into_item'      => __('Insert into item', 'OBE'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'OBE'),
		'items_list'            => __('Items list', 'OBE'),
		'items_list_navigation' => __('Items list navigation', 'OBE'),
		'filter_items_list'     => __('Filter items list', 'OBE'),
	);
	$args = array(
		'label'                 => __('Appathon', 'OBE'),
		'description'           => __('Appathon', 'OBE'),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           => 'dashicons-format-status',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('appathon', $args);
}
add_action('init', 'appathon_post_type', 0);

/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 * 
 * Retrieving the values:
 * Description = get_post_meta( get_the_ID(), 'advanced_options_appathon_description', true )
 * Poster Video = get_post_meta( get_the_ID(), 'advanced_options_appathon_poster-video', true )
 * Video = get_post_meta( get_the_ID(), 'advanced_options_appathon_video', true )
 */
class advanced_options_appathon
{
	private $config = '{"title":"Appathon","prefix":"advanced_options_appathon_","domain":"OBE","class_name":"advanced_options_appathon","context":"normal","priority":"default","cpt":"appathon","fields":[
		{"type":"textarea","label":"Description","id":"advanced_options_appathon_description"},
		{"type":"media","label":"Poster Video","button-text":"Upload","return":"url","modal-title":"Choose a file","modal-button":"Select this file","id":"advanced_options_appathon_poster-video"},
		{"type":"media","label":"Video","return":"url","modal-title":"Choose a file","modal-button":"Select this file","id":"advanced_options_appathon_video"}]}';

	public function __construct()
	{
		$this->config = json_decode($this->config, true);
		$this->process_cpts();
		add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
		add_action('admin_head', [$this, 'admin_head']);
		add_action('save_post', [$this, 'save_post']);
	}

	public function process_cpts()
	{
		if (!empty($this->config['cpt'])) {
			if (empty($this->config['post-type'])) {
				$this->config['post-type'] = [];
			}
			$parts = explode(',', $this->config['cpt']);
			$parts = array_map('trim', $parts);
			$this->config['post-type'] = array_merge($this->config['post-type'], $parts);
		}
	}

	public function add_meta_boxes()
	{
		foreach ($this->config['post-type'] as $screen) {
			add_meta_box(
				sanitize_title($this->config['title']),
				$this->config['title'],
				[$this, 'add_meta_box_callback'],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function admin_enqueue_scripts()
	{
		global $typenow;
		if (in_array($typenow, $this->config['post-type'])) {
			wp_enqueue_media();
		}
	}

	public function admin_head()
	{
		global $typenow;
		if (in_array($typenow, $this->config['post-type'])) {
?><script>
				jQuery.noConflict();
				(function($) {
					$(function() {
						$('body').on('click', '.rwp-media-toggle', function(e) {
							e.preventDefault();
							let button = $(this);
							let rwpMediaUploader = null;
							rwpMediaUploader = wp.media({
								title: button.data('modal-title'),
								button: {
									text: button.data('modal-button')
								},
								multiple: true
							}).on('select', function() {
								let attachment = rwpMediaUploader.state().get('selection').first().toJSON();
								button.prev().val(attachment[button.data('return')]);
							}).open();
						});
					});
				})(jQuery);
			</script><?php
					}
				}

				public function save_post($post_id)
				{
					foreach ($this->config['fields'] as $field) {
						switch ($field['type']) {
							default:
								if (isset($_POST[$field['id']])) {
									$sanitized = sanitize_text_field($_POST[$field['id']]);
									update_post_meta($post_id, $field['id'], $sanitized);
								}
						}
					}
				}

				public function add_meta_box_callback()
				{
					$this->fields_table();
				}

				private function fields_table()
				{
						?><table class="form-table" role="presentation">
			<tbody><?php
					foreach ($this->config['fields'] as $field) {
					?><tr>
						<th scope="row"><?php $this->label($field); ?></th>
						<td><?php $this->field($field); ?></td>
					</tr><?php
						}
							?></tbody>
		</table><?php
				}

				private function label($field)
				{
					switch ($field['type']) {
						case 'media':
							printf(
								'<label class="" for="%s_button">%s</label>',
								$field['id'],
								$field['label']
							);
							break;
						default:
							printf(
								'<label class="" for="%s">%s</label>',
								$field['id'],
								$field['label']
							);
					}
				}

				private function field($field)
				{
					switch ($field['type']) {
						case 'media':
							$this->input($field);
							$this->media_button($field);
							break;
						case 'textarea':
							$this->textarea($field);
							break;
						default:
							$this->input($field);
					}
				}

				private function input($field)
				{
					if ($field['type'] === 'media') {
						$field['type'] = 'text';
					}
					printf(
						'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
						isset($field['class']) ? $field['class'] : '',
						$field['id'],
						$field['id'],
						isset($field['pattern']) ? "pattern='{$field['pattern']}'" : '',
						$field['type'],
						$this->value($field)
					);
				}

				private function media_button($field)
				{
					printf(
						' <button class="button rwp-media-toggle" data-modal-button="%s" data-modal-title="%s" data-return="%s" id="%s_button" name="%s_button" type="button">%s</button>',
						isset($field['modal-button']) ? $field['modal-button'] : __('Select this file', 'OBE'),
						isset($field['modal-title']) ? $field['modal-title'] : __('Choose a file', 'OBE'),
						$field['return'],
						$field['id'],
						$field['id'],
						isset($field['button-text']) ? $field['button-text'] : __('Upload', 'OBE')
					);
				}

				private function textarea($field)
				{
					printf(
						'<textarea class="regular-text" id="%s" name="%s" rows="%d">%s</textarea>',
						$field['id'],
						$field['id'],
						isset($field['rows']) ? $field['rows'] : 5,
						$this->value($field)
					);
				}

				private function value($field)
				{
					global $post;
					if (metadata_exists('post', $post->ID, $field['id'])) {
						$value = get_post_meta($post->ID, $field['id'], true);
					} else if (isset($field['default'])) {
						$value = $field['default'];
					} else {
						return '';
					}
					return str_replace('\u0027', "'", $value);
				}
			}
			new advanced_options_appathon;