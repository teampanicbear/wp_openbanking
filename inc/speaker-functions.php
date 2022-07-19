<?php

// http://example.com/wp-json/theme/v1/get-recent-posts?key=abc&category=abc&region=regoina&essential=es1&page=1&size=10
function title_filter($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('title_filter')) :
        $search_term = $wpdb->esc_like($search_term);
        $search_term = ' \'%' . $search_term . '%\'';
        $title_filter_relation = (strtoupper($wp_query->get('title_filter_relation')) == 'OR' ? 'OR' : 'AND');
        $where .= ' ' . $title_filter_relation . ' ' . $wpdb->posts . '.post_title LIKE ' . $search_term . "AND wp_posts.post_type = 'speaker'";
    endif;
    return $where;
}
function get_speakers($data)
{
    $page = $_GET['page'] ? $_GET['page'] : 1;
    $per_page = $_GET['size'] ? $_GET['size'] : 1;

    $order = 'DESC';
    $orderby = 'post_date';
    if ($_GET['sort']) {
        $sort = $_GET['sort'];
        if ($sort == 'newest') {
            $order = 'DESC';
            $orderby = 'post_date';
        } else if ($sort == 'oldest') {
            $order = 'ASC';
            $orderby = 'post_date';
        } else if ($sort == 'az') {
            $order = 'ASC';
            $orderby = 'title';
        } else {
            $order = 'DESC';
            $orderby = 'title';
        }
    }

    add_filter('posts_where', 'title_filter', 10, 2);
    $searching = $_GET['s']; // Change from $_GET to any absolute variable if necessary;

    $args =  array(
        'post_type' => 'speaker',
        'title_filter' => $searching,
        'title_filter_relation' => 'OR',
        'posts_per_page' => $per_page,
        'paged' => $page,
        'order' =>  $order,
        'orderby' =>  $orderby,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'advanced_options_speaker_company',
                'value' => $searching,
                'compare' => 'LIKE'
            )
        )
    );

    $query = new WP_Query($args);
    $max_num_pages = $query->max_num_pages;
    $posts = $query->get_posts();

    $posts = array_map(function ($item) {
        $item->thumbnail = get_the_post_thumbnail_url($item, 'full');
        $item->link = get_permalink($item);
        $item->position = $item->advanced_options_speaker_position;
        $item->company = $item->advanced_options_speaker_company;
        return $item;
    }, $posts);
    remove_filter('posts_where', 'title_filter', 10, 2);
    return [
        'data' => $posts,
        'maxPage' => $max_num_pages
    ]; // trả theo dang pagination
}

add_image_size('post-thumbnails', 400, 400);
add_theme_support('post-thumbnails');

add_action('rest_api_init', function () {
    register_rest_route('theme/v1', 'get-speakers', array(
        'methods' => 'GET',
        'callback' => 'get_speakers',
    ));
});// http://example.com/wp-json/theme/v1/get-list-regions