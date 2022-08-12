<?php

function ct_post_title_filter($where, $wp_query) {
    global $wpdb;

    if ( $search_term = $wp_query->get( 'ct_search_post_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like( $search_term ) . '%\'';
    }

    return $where;
}

// http://example.com/wp-json/theme/v1/get-recent-posts?key=abc&category=abc&region=regoina&essential=es1&page=1&size=10
function get_previous_campfires($data)
{
    $page = $_GET['page'] ? $_GET['page'] : 1;
    $per_page = $_GET['size'] ? $_GET['size'] : 1;
    $today = date('Y-m-d H:i:s');

    $whereBrazilCampfire = array();
    if (isset($_GET['isbrazilcampfire'])) {
        $isbrazilcampfire = $_GET['isbrazilcampfire'];
        if($isbrazilcampfire == "1"){
           $whereBrazilCampfire =  array(
                array(
                    'key'     => 'isbrazilcampfire',
                    'compare' => 'LIKE',
                    'value'   => '1',
                )
            );
        }
        else{
            $whereBrazilCampfire =  array(
                'relation' => 'OR',
                array(
                    'key'     => 'isbrazilcampfire',
                    'compare' => 'NOT LIKE',
                    'value'   => '1',
                ),
                array(
                    'key'     => 'isbrazilcampfire',
                    'compare' => 'NOT EXISTS',
                )
            );
        }
    } 

    $args =  array(
        'post_type' => 'campfire',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'paged' => $page,
        'meta_key' => 'start_date',
        'orderby' => array('meta_value' => 'DESC'),
        'meta_query' => array(
            array(
                'key'     => 'end_date',
                'type'    => 'DATETIME',
                'compare' => '<',
                'value'   => $today,
            ),
        )
    );

    if ($_GET['s']) {
        $args['ct_search_post_title'] = $_GET['s'];
    }
    if (isset($_GET['cate'])) {
        $cate = $_GET['cate'];

        // if ($cate=='coming-up') {
        //     $args['meta_key'] = 'end_date';
        //     $args['orderby'] = array('meta_value' => 'ASC');
        //     $args['meta_query'] = array(
        //         array(
        //             'key'     => 'end_date',
        //             'type'    => 'DATETIME',
        //             'compare' => '>=',
        //             'value'   => $today,
        //         ),
        //     );
        // }
        // else if ($cate=='previous') {
        //     $args['meta_key'] = 'start_date';
        //     $args['orderby'] = array('meta_value' => 'DESC');
        //     $args['meta_query'] = array(
        //         array(
        //             'key'     => 'start_date',
        //             'type'    => 'DATETIME',
        //             'compare' => '<=',
        //             'value'   => $today,
        //         ),
        //         array(
        //             'key'     => 'start_date',
        //             'type'    => 'DATETIME',
        //             'orderby' => 'meta_value_num',
        //             'order' => 'ASC'
        //         ),
        //     );
        // }

        if ($cate == 'live-stream') {
            $args['meta_key'] = 'start_date';
            $args['orderby'] = array('meta_value' => 'DESC');
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'tag',
                    'value'   => 'livestream',
                ),
                array(
                    'key'     => 'end_date',
                    'type'    => 'DATETIME',
                    'compare' => '<',
                    'value'   => $today,
                ),
                $whereBrazilCampfire
            );
        } else if ($cate == 'appathon') {
            $args['meta_key'] = 'start_date';
            $args['orderby'] = array('meta_value' => 'DESC');
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'tag',
                    'value'   => 'appathon',
                ),
                array(
                    'key'     => 'end_date',
                    'type'    => 'DATETIME',
                    'compare' => '<',
                    'value'   => $today,
                ),
                $whereBrazilCampfire
            );
        } else if ($cate == 'before-covid') {
            $args['meta_key'] = 'start_date';
            $args['orderby'] = array('meta_value' => 'DESC');
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'tag',
                    'value'   => 'event',
                ),
                array(
                    'key'     => 'end_date',
                    'type'    => 'DATETIME',
                    'compare' => '<',
                    'value'   => $today,
                ),
                $whereBrazilCampfire
            );
        } else {
            $args['meta_key'] = 'start_date';
            $args['orderby'] = array('meta_value' => 'DESC');
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'end_date',
                    'type'    => 'DATETIME',
                    'compare' => '<',
                    'value'   => $today,
                ),
                $whereBrazilCampfire
            );
        }
    }

    if (!empty($_GET['region']) && !empty($_GET['essential'])) {
        $args['meta_query'] = array(
            'relation'		=> 'AND',
            array(
                'key'	 	=> 'essential_campfire',
                'value'	  	=> $_GET['essential'],
                'compare' 	=> '=',
            ),
            array(
                'key'	  	=> 'region_campfire',
                'value'	  	=> $_GET['region'],
                'compare' 	=> '=',
            ),
        );
    } else {
        if (!empty($_GET['region'])) {
            $args['meta_key'] = 'region_campfire';
            $args['meta_value'] = $_GET['region'];
        }

        if (!empty($_GET['essential'])) {
            $args['meta_key'] = 'essential_campfire';
            $args['meta_value'] = $_GET['essential'];
        }
    }

    add_filter( 'posts_where', 'ct_post_title_filter', 10, 2 );
    $query = new WP_Query($args);

    $max_num_pages = $query->max_num_pages;
    $posts = $query->get_posts();
    remove_filter( 'posts_where', 'ct_post_title_filter', 10 );

    $posts = array_map(function ($item) {
        $unixtimestamp = strtotime($item->start_date);
        $unixtimeend = strtotime($item->end_date);
        $item->thumbnail = get_the_post_thumbnail_url($item, 'post-thumbnails');
        $link = get_permalink($item);
        $title = $item->post_title;
        $is_login =  $page = $_GET['login'] ? $_GET['login'] : 0;
        $id = $item->ID;
        $item->link = do_shortcode("[get_link_campfire_detail url='$link' title='$title' id='$id' login='$is_login']");
        $item->link_img = do_shortcode("[get_link_campfire_detail tag_html='img' url='$link' title='$title' id='$id' login='$is_login']");
        $item->start_date =  date_i18n("d", $unixtimestamp) . ' ' . date_i18n("M", $unixtimestamp) . ' , ' .  date_i18n("Y", $unixtimestamp);
        $item->stopwatch = date_i18n("g:iA", $unixtimestamp) . ' ' . date_i18n("g:iA", $unixtimeend);
        return $item;
    }, $posts);
    return [
        'data' => $posts,
        'maxPage' => $max_num_pages
    ]; // trả theo dang pagination
}

function get_link_campfire_detail($args)
{
    $url = $args['url'];
    $title = $args['title'];
    $id = $args['id'];
    $login = $args['login'];
    $tag_html = !empty($args['tag_html']) ? $args['tag_html'] : '';
    $directory_uri = get_template_directory_uri();

    if ($tag_html == 'img') {
        return "<a href='$url'>
                    <img class='icon-play' src='$directory_uri/assets/images/play.svg' alt=''>
                </a>";
    }
    return "<a href='$url'>$title</a>";

    // if (is_user_logged_in() || $login == 1) {
    //     if ($tag_html == 'img') {
    //         return "<a href='$url'>
    //                     <img class='icon-play' src='$directory_uri/assets/images/play.svg' alt=''>
    //                 </a>";
    //     }
    //     return "<a href='$url'>$title</a>";
    // } else {
    //     if ($tag_html == 'img') {
    //         return "<a href='javascript:void(0)' data-target='#signin_popup' data-url='$url' data-id='$id' class='ndialog'>
    //                     <img data-target='#signin_popup' data-url='$url' data-id='$id' class='icon-play' src='$directory_uri/assets/images/play.svg' alt=''>
    //                 </a>";
    //     }
    //     return "<a href='javascript:void(0)' data-target='#signin_popup' data-url='$url' data-id='$id' class='ndialog'>$title</a>
    //     ";
    // }
}

add_shortcode('get_link_campfire_detail', 'get_link_campfire_detail');

//View detail campfire upcoming
function get_link_campfire_detail_register($args)
{
    //id campfire
    $url = $args['url'];
    $title = $args['title'];
    $id = $args['id'];
    $class = $args['class'];
    if (is_user_logged_in()) {
        return "<a href='$url' class='$class'>$title</a>";
    } else {
        $url = site_url('register');
        return "<a href='$url?id=$id' class='$class'>$title</a>";
    }
}

add_shortcode('get_link_campfire_detail_register', 'get_link_campfire_detail_register');


function get_btn_user_attend_campfire($args)
{
    //id campfire
    $id = $args['id'];
    $class = $args['class'];
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'campfire',
        'posts_per_page' => 1,
        'post__in' => array($id),
    );
    $the_query = new WP_Query($args);
    $first_post = $the_query->posts[0];
    $user_attended = $first_post->users;
    $current_user_id  = get_current_user_id();

    if (is_user_logged_in()) {
        if ($user_attended == '') {
            return "<a class='$class btn-attend-campfire-click btn-attend-campfire-$id' data-id='$id' href='javascript:void(0)'>
                        Attend 
                    </a>";
        } else {
            if (!in_array($current_user_id, $user_attended)) {
                return "<a class='$class btn-attend-campfire-click btn-attend-campfire-$id' data-id='$id' href='javascript:void(0)'>
                            Attend
                        </a>";
            }
            return "<a class='$class attended' href='javascript:void(0)'>
                        Attending
                    </a>";
        }
    } else {
        $url = site_url('register');
        return "<a href='$url?id=$id' class='$class' >
                    Register  
                </a>";
    }
    return "";
}

add_shortcode('get_btn_user_attend_campfire', 'get_btn_user_attend_campfire');

add_image_size('post-thumbnails', 400, 400);
add_theme_support('post-thumbnails');

add_action('rest_api_init', function () {
    register_rest_route('theme/v1', 'get-previous-campfires', array(
        'methods' => 'GET',
        'callback' => 'get_previous_campfires',
    ));
});// http://example.com/wp-json/theme/v1/get-list-regions


// api
//get-list-cates ==> https://developer.wordpress.org/rest-api/reference/categories/
// http://example.com/wp-json/wp/v2/categories
//get-list-regions/{{}}
function get_list_campfire_regions( $data ) {
	$field = acf_get_field('region_campfire');
//     array_shift($field['choices']);
    return $field['choices'];// trả theo dang pagination
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-campfire-regions', array(
        'methods' => 'GET',
        'callback' => 'get_list_campfire_regions',
    ));
} );// http://example.com/wp-json/theme/v1/get-list-regions
//get-list-essentials/{{}}"wp/v2"
function get_list_campfire_essentials( $data ) {
    $field = acf_get_field('essential_campfire');
//     array_shift($field['choices']);
    return $field['choices'];// trả theo dang pagination
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'theme/v1', 'get-list-campfire-essentials', array(
        'methods' => 'GET',
        'callback' => 'get_list_campfire_essentials',
    ));
} );
// http://example.com/wp-json/theme/v1/get-list-essentials