<?php

/**
 * Positron functions and definitions
 *
 */

function positronx_set_post_views($post_id) {
    $count_key = 'wp_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function positronx_track_post_views ($post_id) {
    if ( !is_single() )
        return;

    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }

    positronx_set_post_views($post_id);
}

add_action( 'wp_head', 'positronx_track_post_views');

/**
 *   Do something when a new book is created
 */
function new_update_count($post_id, $post, $update) {
    $count_key = 'wp_post_views_count';
    if ($post->post_type == 'post' && get_post_meta($post_id, $count_key, true) == '') {
        # And update the meta so it won't run again
        add_post_meta($post_id, $count_key, '0');
    }
}
add_action( 'wp_insert_post', 'new_update_count', 10, 3 );

// api
//get-list-cates ==> https://developer.wordpress.org/rest-api/reference/categories/
// http://example.com/wp-json/wp/v2/categories
//get-list-regions/{{}}
function get_list_regions( $data ) {
    $field = acf_get_field('region');
//     array_shift($field['choices']);
    return $field['choices'];// trả theo dang pagination
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-regions', array(
        'methods' => 'GET',
        'callback' => 'get_list_regions',
    ));
} );// http://example.com/wp-json/theme/v1/get-list-regions
//get-list-essentials/{{}}"wp/v2"
function get_list_essentials( $data ) {
    $field = acf_get_field('essential');
//     array_shift($field['choices']);
    return $field['choices'];// trả theo dang pagination
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-essentials', array(
        'methods' => 'GET',
        'callback' => 'get_list_essentials',
    ));
} );
// http://example.com/wp-json/theme/v1/get-list-essentials

// http://example.com/wp-json/theme/v1/get-recent-posts?key=abc&category=abc&region=regoina&essential=es1&page=1&size=10
function get_recent_posts( $data ) {

    $id_events_awards = get_category_by_slug("events-and-awards")->term_id;
    $id_news_press  = get_category_by_slug("news-stories-and-press-releases")->term_id;
    $page = $_GET['page'] ? $_GET['page'] : 1;
    $per_page = $_GET['size'] ? $_GET['size'] : 1;
    $args =  array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'paged' => $page,
    );
    if ($_GET['time']) {
        $time = $_GET['time'];
        $args['date_query'] = 
            array(
                'year'  => explode('-', $time)[1],
                'month' => explode('-', $time)[0],
            );
    }
    if ($_GET['category']) {
        if ($_GET['category']=="blog") {
            $args['category__not_in'] = array($id_news_press,$id_events_awards);
        };
        $args['cat'] = $_GET['category'];
    }
    if (isset($_GET['author']) && $_GET['author']) {
        $args['author'] = $_GET['author'];
    }
    if (isset($_GET['s']) && $_GET['s']) {
        $args['s'] = $_GET['s'];
    }
    if (isset($_GET['region']) && isset($_GET['essential']) && $_GET['region'] && $_GET['essential']) {
        $args['meta_query'] = array(
            'relation'		=> 'AND',
            array(
                'key'	 	=> 'essential',
                'value'	  	=> $_GET['essential'],
                'compare' 	=> '=',
            ),
            array(
                'key'	  	=> 'region',
                'value'	  	=> $_GET['region'],
                'compare' 	=> '=',
            ),
        );
    } else {
        if (isset($_GET['region']) && $_GET['region']) {
            $args['meta_key'] = 'region';
            $args['meta_value'] = $_GET['region'];
        }

        if (isset($_GET['essential']) && $_GET['essential']) {
            $args['meta_key'] = 'essential';
            $args['meta_value'] = $_GET['essential'];
        }
    }
	
    if($_GET['category'] == $id_events_awards) {
        $args['meta_query'] = array(
            'relation'		=> 'OR',
            array(
                'key'	 	=> 'event_start_date',
                'compare' 	=> 'NOT EXISTS',
            ),
            array(
                'key'	 	=> 'event_start_date',
                'compare' 	=> 'EXISTS',
            ),
        );
        $args['orderby'] = array( 'event_start_date' => 'DESC', 'date' => 'DESC' );
    
        if (isset($_GET['type']) && $_GET['type']) {
            if($_GET['type'] == 'upcoming') {
                $args['meta_query'] = array(
                    'relation'		=> 'AND',
                    array(
                        'key'	 	=> 'event_start_date',
                        'compare' 	=> '>=',
                        'value' => date("Y/m/d h:i A"),
                        'type' => 'DATE'
                    ),
                    array(
                        'key'	 	=> 'event_start_date',
                        'compare' 	=> 'EXISTS',
                    ),
                );
            }
            if($_GET['type'] == 'previous') {
                $args['meta_query'] = array(
                    'relation'		=> 'AND',
                    array(
                        'key'	 	=> 'event_start_date',
                        'compare' 	=> '<',
                        'value' => date("Y/m/d h:i A"),
                        'type' => 'DATE'
                    ),
                    array(
                        'key'	 	=> 'event_start_date',
                        'compare' 	=> 'EXISTS',
                    ),
                );
            }
            $args['s'] = $_GET['s'];
        }
    }

    $query = new WP_Query($args);
    $max_num_pages = $query->max_num_pages;
    $posts = $query->get_posts();

    $posts = array_map(function ($item) {
        $post_date = strtotime($item->post_date);
        //$item->thumbnail = get_the_post_thumbnail_url($item, 'post-thumbnails');
        $item->thumbnail = get_the_post_thumbnail_url($item, 'full');
        $item->link = get_permalink($item);
        $item->the_date = date_i18n("d", $post_date);
        $item->the_time = date_i18n("M", $post_date) . ', ' .  date_i18n("Y", $post_date);
        $categories = get_the_category($item);
		$id_events_awards = get_category_by_slug("events-and-awards")->term_id;
        if($_GET['category'] == $id_events_awards) {
            $event_start_date = get_field('event_start_date',$item->ID);
            if(isset($event_start_date)) {
                $event_start_date = strtotime($event_start_date);
                $item->the_date = date_i18n("d", $event_start_date);
                $item->the_time = date_i18n("M", $event_start_date) . ', ' .  date_i18n("Y", $event_start_date);
            }
        }
        $item->categories = array_map(function ($item) {
            return [
                'name' => $item->name,
                'link' => get_category_link($item)
            ];
        }, $categories);
        return $item;
    }, $posts);
    return [
        'data' => $posts,
        'maxPage' => $max_num_pages
    ];// trả theo dang pagination
}

add_image_size( 'post-thumbnails', 400, 400 );
add_theme_support( 'post-thumbnails' );

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-recent-posts', array(
        'methods' => 'GET',
        'callback' => 'get_recent_posts',
    ));
} );// http://example.com/wp-json/theme/v1/get-list-regions

function get_list_categories(){
   
    global  $wpdb;
    $sql    = "SELECT * FROM   wp_terms t LEFT JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
             WHERE  tt.taxonomy = 'category' AND ( t.slug!='events-and-awards' AND t.slug!='news-stories-and-press-releases')
             ORDER  BY name"; 
    $res = $wpdb->get_results($sql);
    return $res;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-categories', array(
        'methods' => 'GET',
        'callback' => 'get_list_categories',
    ));
} );// http://example.com/wp-json/theme/v1/get-list-categories

function get_list_times(){
   
   
    $args = array(
        'post_type'   => 'post',
        'post_status' => 'publish',
        'orderby'           => 'date',
        'order'             => 'desc',   
        'category_name' => 'events-and-awards'
    );

    $the_query = new WP_Query( $args );
    $date_array = array();
    $name_array = array();
    foreach($the_query->posts as $post){
        $time=strtotime($post->post_date);
        if (!in_array(date("m",$time)."-".date("Y",$time), $name_array)){
            array_push($name_array,date("m",$time)."-".date("Y",$time));
            array_push($date_array,array(
                "value"    => date("m",$time)."-".date("Y",$time),
                "name" => date("F",$time)." ".date("Y",$time)
            ));
        }
    }
    return $date_array;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-times', array(
        'methods' => 'GET',
        'callback' => 'get_list_times',
    ));
} );// http://example.com/wp-json/theme/v1/get-list-times