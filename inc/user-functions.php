<?php
//
function wpforms_campfires()
{
    $today = date('Y-m-d H:i:s');
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'campfire',
        'posts_per_page' => -1,
        'meta_key' => 'end_date',
        'orderby' => array('meta_value' => 'ASC'),
        'meta_query' => array(
            array(
                'key'     => 'end_date',
                'type'    => 'DATETIME',
                'compare' => '>=',
                'value'   => $today,
            ),
        ),
    );
    $query = new WP_Query($args);
    $campfires = $query->get_posts();

    return apply_filters('wpforms_campfires', $campfires);
}


/**
 * Dynamically add campfires to a select field.
 * 
 * This snippet should go in your theme's function.php file.
 * 
 * @param array $field
 * @param array $field_atts
 * @param array $form_data
 * @return array
 */
function wpf_campfire_select($field, $field_atts, $form_data)
{

    if (isset($_GET['id'])) {
        $id_campfire = $_GET['id'];
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'campfire',
            'posts_per_page' => 1,
            'post__in' => array($id_campfire),
        );
        $the_query = new WP_Query($args);
        $first_post = $the_query->posts[0];
        $title =  $first_post->post_title;
    }

    if ($form_data['id'] == '566' && $field['id'] == '7') {
        $campfires = wpforms_campfires();
        $choices = array();
        foreach ($campfires as $campfire) {
            if ($campfire->post_title === $title) {
                array_push($choices, [
                    "label" => $campfire->post_title,
                    "value" => $campfire->post_title,
                    "default" => '1',
                ]);
            } else {
                array_push($choices, [
                    "label" => $campfire->post_title,
                    "value" => $campfire->post_title,
                ]);
            }
        }

        $field['choices'] = $choices;
    }

    return $field;
}
add_filter('wpforms_select_field_display', 'wpf_campfire_select', 10, 3);


//Conutries
function wpforms_obe_countries()
{

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'country',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    $countries = $query->get_posts();

    return apply_filters('wpforms_obe_countries', $countries);
}

function wpf_obe_country_select($field, $field_atts, $form_data)
{
    if ($form_data['id'] == '566' && $field['id'] == '10') {
        $campfires = wpforms_obe_countries();
        $choices = array();
        foreach ($campfires as $post) {
            $choices[] = [
                'label'   => $post->post_title,
                'value'   => $post->post_title,
            ];
        }

        $field['choices'] = $choices;
    }

    return $field;
}
add_filter('wpforms_select_field_display', 'wpf_obe_country_select', 10, 3);


function wpforms_obe_organizations()
{

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'organization',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    $organization = $query->get_posts();

    return apply_filters('wpforms_obe_organization', $organization);
}

function wpf_organization_select($field, $field_atts, $form_data)
{
    if ($form_data['id'] == '566' && $field['id'] == '9') {
        $organizations = wpforms_obe_organizations();
        $choices = array();
        foreach ($organizations as $post) {
            $choices[] = [
                'label'   => $post->post_title,
                'value'   => $post->post_title,
            ];
        }

        $field['choices'] = $choices;
    }

    return $field;
}
add_filter('wpforms_select_field_display', 'wpf_organization_select', 10, 3);







//Capture the wpform submit, and call the "processForm" function
add_action('wpforms_process_complete', 'processForm', 15, 4);

function processForm($form_fields, $entry, $form_data, $entry_id)
{
    $form_id = $form_data['id'];
    if ($form_id == 565) {
        $url_campfire = $entry['fields']['3'];
        //remember me
        $remember = $entry['fields']['5'];
        $user_login_details = $entry['fields']['0'] . '_obe_aaa_' . $entry['fields']['1'];
        if ($remember == 'true') {
            setcookie("user_login_details", $user_login_details, time() + 3600, "/", "", 0);
        } else {
            if (isset($_COOKIE["user_login_details"])) {
                setcookie("user_login_details", "");
            }
        }
        //remember me
        $id_campfire = $entry['fields']['2'];
        if (!empty($id_campfire)) {
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'campfire',
                'posts_per_page' => 1,
                'post__in' => array($id_campfire),
            );
            $the_query = new WP_Query($args);
            $first_post = $the_query->posts[0];
            $link =  get_permalink($first_post->ID);
        }

        if (!empty($link)) {
            wp_redirect($link);
            exit();
        } else {
            $url_redirect = $_SERVER['HTTP_REFERER'];
            $page_login = site_url('login') . '/';
            if ($url_redirect == $page_login || $url_redirect == site_url('login')) {
                wp_redirect(site_url());
            }
            wp_redirect($url_redirect);
        }
    }
    if ($form_id == 566) {
        //Register user 566
        $titleCampfire = $entry['fields']['7'];
        if (!empty($titleCampfire)) {
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'campfire',
                'posts_per_page' => 1,
                's' => $titleCampfire,
            );

            $the_query = new WP_Query($args);
            $first_post = $the_query->posts[0];
            $link =  get_permalink($first_post->ID);
            $id_campfire = $first_post->ID;
        }

        if (!empty($link)) {
            wp_redirect($link);
            exit();
        } else {
            $link = site_url();
            wp_redirect($link);
        }
    }
}

/**
 * Automatically log in user after registration form is submitted.
 *
 * @link https://wpforms.com/developers/automatically-log-in-users-after-registration/
 *
 */
function wpf_dev_autologin($user_id, $fields, $form_data, $userdata)
{
    if (empty($userdata['user_login']) || empty($userdata['user_pass'])) {
        return;
    }

    //Add user in campfire when register
    $titleCampfire =  $fields['7']['value'];
    if (!empty($titleCampfire)) {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'campfire',
            'posts_per_page' => 1,
            's' => $titleCampfire,
        );

        $the_query = new WP_Query($args);
        $first_post = $the_query->posts[0];
        $id_campfire = $first_post->ID;

        $user_attended = $first_post->users;
        $current_user_id  = $user_id;
        if ($user_attended == '') {
            $value = array($current_user_id);
        } else {
            array_push($user_attended, $current_user_id);
            $value = $user_attended;
        }
        update_field('users', $value, $id_campfire);
    }
    //End
    wp_signon(
        array(
            'user_login'    => $userdata['user_login'],
            'user_password' => $userdata['user_pass'],
            'remember'      => false,
        )
    );
}
add_action('wpforms_user_registered', 'wpf_dev_autologin', 4, 4);



function add_ajax_scripts()
{
    wp_enqueue_script('ajaxcalls', get_template_directory_uri() . '/js/ajax-calls.js', array(), '1.0.0', true);

    wp_localize_script('ajaxcalls', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'add_ajax_scripts');

function custom_update_user()
{

    $user_id = get_current_user_id();
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $your_job_title = $_POST['your_job_title'];
    $organization = $_POST['organization'];
    $organization_opt = $_POST['organization_opt'];
    $country_opt = $_POST['country_opt'];
    $display_name = $first_name . " " . $last_name;

    $result = wp_update_user(array(
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' =>  $last_name,
        'your_job_title' =>  $your_job_title,
        'organization' =>  $organization,
        'display_name' => $display_name
    ));
    //Meta user
    update_user_meta($user_id, 'your_job_title', $your_job_title);
    update_user_meta($user_id, 'organization', $organization);
    update_user_meta($user_id, 'type_of_organization', $organization_opt);
    update_user_meta($user_id, 'country', $country_opt);
    if (!is_wp_error($result)) {
        wp_die('success');
    }

    wp_die();
}

add_action('wp_ajax_custom_update_user', 'custom_update_user');



add_action('template_redirect', 'redirect_my_homepage');
function redirect_my_homepage()
{
    if (!is_user_logged_in()) {
        if (is_page('my-account') || is_page('my-edit-account')) {
            $link = site_url();
            wp_redirect($link);
            exit();
        }
    } else {
        if (is_page('login') || is_page('register')) {
            $link = site_url('my-account');
            wp_redirect($link);
            exit();
        }
    }
}

//User register or login view detail campfire
// add_action('template_redirect', 'redirect_up_campfire');
// function redirect_up_campfire()
// {
//     global $post;
//     $post_type = $post->post_type;
//     if (!is_user_logged_in()) {
//         if ($post_type == 'campfire') {
//             $id_campfire = $post->ID;
//             $today = date('Y-m-d H:i:s');
//             $time_now = strtotime($today);
//             $unixtimeend = strtotime($post->end_date);
//             if ($unixtimeend >= $time_now) {
//                 $link = site_url('register') . '?id=' . $id_campfire;
//                 wp_redirect($link);
//                 exit();
//             }
//         }
//     }
// }

function custom_change_password()
{
    $user = wp_get_current_user();
    $date = date('F d Y', time());
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    if (wp_check_password($current_pass, $user->data->user_pass, $user->ID)) {
        $update = wp_set_password($new_pass, $user->ID);
        if (!is_wp_error($update)) {
            update_user_meta($user->ID, "last_time_change", $date, false);
            wp_set_auth_cookie($user->ID);
            wp_set_current_user($user->ID);
            do_action('wp_login', $user->user_login, $user);
            echo "success";
        } else echo "error";
    } else echo "wrong password";

    exit();
}
add_action('wp_ajax_custom_change_password', 'custom_change_password');

function retrieve_password_by_link($user_data)
{
    global $wpdb, $current_site;

    // redefining user_login ensures we return the right case in the email
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;

    do_action('retreive_password', $user_login);  // Misspelled and deprecated
    do_action('retrieve_password', $user_login);

    $allow = apply_filters('allow_password_reset', true, $user_data->ID);

    if (!$allow)
        return false;
    else if (is_wp_error($allow))
        return false;

    $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
    if (empty($key)) {
        // Generate something random for a key...
        $key = wp_generate_password(20, false);
        do_action('retrieve_password_key', $user_login, $key);
        // Now insert the new md5 key into the db
        $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
    }
    $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
    $message .= network_home_url('/') . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
    $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
    $message .= '<' . network_site_url("create-new-password?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

    if (is_multisite())
        $blogname = $GLOBALS['current_site']->site_name;
    else
        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $title = sprintf(__('[%s] Password Reset'), $blogname);

    $title = apply_filters('retrieve_password_title', $title);
    $message = apply_filters('retrieve_password_message', $message, $key);

    wp_mail($user_email, $title, $message);
    if ($message && !wp_mail($user_email, $title, $message))
        wp_die(__('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...'));

    return true;
}
function send_link_reset()
{
    $email = $_POST['email'];
    $user_data = get_user_by('email', trim($email));
    if (empty($user_data))
        echo "wrong email";
    else {
        if (retrieve_password_by_link($user_data)) {
            echo "success";
        } else {
            echo "error";
        }
    }



    exit();
}
add_action('wp_ajax_send_link_reset', 'send_link_reset');
add_action('wp_ajax_nopriv_send_link_reset', 'send_link_reset');

function create_new_password()
{
    global $wpdb;
    $password   = $_POST['password'];
    $user_login    = $_POST['user_login'];
    $user    = get_user_by("login", $user_login);
    $key        = $_POST['key'];
    $key_data = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
    if ($key == $key_data) {
        wp_set_password($password, $user->ID);
        echo "success";
    } else echo "error";
    exit();
}
add_action('wp_ajax_create_new_password', 'create_new_password');
add_action('wp_ajax_nopriv_create_new_password', 'create_new_password');
