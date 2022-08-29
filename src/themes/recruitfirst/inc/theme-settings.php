<?php
// Register a theme options page
add_filter( 'mb_settings_pages', function ( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'rf-settings',
        'option_name' => 'rf-settings',
        'menu_title'  => 'RF Settings',
        'icon_url'    => 'dashicons-edit',
        'style'       => 'boxes',
        'columns'     => 1,
        'position' => 2,
        'tabs'        => array(
            'general' => 'General settings',
            'blog'     => 'Blog settings',
        ),
    );
    return $settings_pages;
} );

// Register meta boxes and fields for settings page
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'             => 'social-links',
        'title'          => 'Social links',
        'settings_pages' => 'rf-settings',
        'tab'            => 'general',
        'fields' => array(
            array(
                'id'      => 'sg_link',
                'name'    => 'Singapore',
                'type'    => 'text'
            ),
            array(
                'id'      => 'hk_link',
                'name'    => 'Hong Kong',
                'type'    => 'text'
            ),
            array(
                'id'      => 'tw_link',
                'name'    => 'Taiwan',
                'type'    => 'text'
            ),
            array(
                'id'      => 'id_link',
                'name'    => 'Indonesia',
                'type'    => 'text'
            ),
            array(
                'id'      => 'my_link',
                'name'    => 'Malaysia',
                'type'    => 'text'
            ),
            array(
                'id'      => 'cn_link',
                'name'    => 'Mainland China',
                'type'    => 'text'
            ),

        ),
    );

    $meta_boxes[] = array(
        'id'             => 'custom_code',
        'title'          => 'Custom code',
        'settings_pages' => 'rf-settings',
        'tab'            => 'general',
        'fields' => array(
            array(
                'id'      => 'before_head',
                'name'    => 'Code before close head',
                'type'    => 'textarea',
                'sanitize_callback' => 'none'
            ),
            array(
                'id'      => 'before_body',
                'name'    => 'Code before close body',
                'type'    => 'textarea',
                'sanitize_callback' => 'none'
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'social_reviews',
        'title'          => 'Social reviews',
        'settings_pages' => 'rf-settings',
        'tab'            => 'general',
        'fields' => array(
            array(
                'id'      => 'reviews_sg',
                'name'    => 'Singapore',
                'type'    => 'text'
            ),
            array(
                'id'      => 'reviews_hk',
                'name'    => 'Hong Kong',
                'type'    => 'text'
            ),
            array(
                'id'      => 'reviews_cn',
                'name'    => 'China',
                'type'    => 'text'
            ),
            array(
                'id'      => 'reviews_tw',
                'name'    => 'Taiwan',
                'type'    => 'text'
            ),
            array(
                'id'      => 'reviews_my',
                'name'    => 'Malaysia',
                'type'    => 'text'
            ),
            array(
                'id'      => 'reviews_id',
                'name'    => 'Indonesia',
                'type'    => 'text'
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'integration',
        'title'          => 'Integration',
        'settings_pages' => 'rf-settings',
        'tab'            => 'general',
        'fields' => array(
            array(
                'id'      => 'google_captcha_api',
                'name'    => 'Google captcha API key',
                'type'    => 'text',
                'std'    => '6LeB_YAbAAAAAEk5Cq26apKR7I4bDhTJADbZ2kfy'
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'job_alert',
        'title'          => 'Job alert',
        'settings_pages' => 'rf-settings',
        'tab'            => 'general',
        'fields' => array(
            array(
                'id'      => 'jobalert_qrcode',
                'name'    => 'Wechat QR code',
                'type'    => 'single_image'
            ),
        ),
    );


    $meta_boxes[] = array(
        'id'             => 'blog',
        'title'          => 'Social links',
        'settings_pages' => 'rf-settings',
        'tab'            => 'blog',
        'fields' => array(
            array (
                'id' => 'blog_heading',
                'type' => 'fieldset_text',
                'name' => esc_html__( 'Page heading' ),
                'options' => array(
                    'en'    => 'English',
                    'zh' => 'Chinese (简)',
                    'tw'   => 'Chinese (繁)',
                    'id'   => 'Indonesia (Bahasa)',
                ),
            ),
            array (
                'id' => 'blog_divider',
                'type' => 'heading',
                "name" => "Social section"
            ),
            array (
                'id' => 'social_heading',
                'type' => 'fieldset_text',
                'name' => esc_html__( 'Heading' ),
                'options' => array(
                    'en'    => 'English',
                    'zh' => 'Chinese (简)',
                    'tw'   => 'Chinese (繁)',
                    'id'   => 'Indonesia (Bahasa)',
                ),
            ),
            array (
                'id' => 'blog_ddivi23der',
                'type' => 'heading',
                "name" => "Description"
            ),
            array (
                'id' => 'social_description_en',
                'type' => 'textarea',
                'name' => esc_html__( 'English' ),
                'std' => 'Keep a lookout for job opportunities and learn quick tips & tricks to ace your interviews.',
            ),
            array (
                'id' => 'social_description_zh',
                'type' => 'textarea',
                'name' => esc_html__( 'Chinese (简)' ),
                'std' => 'Keep a lookout for job opportunities and learn quick tips & tricks to ace your interviews.',
            ),
            array (
                'id' => 'social_description_tw',
                'type' => 'textarea',
                'name' => esc_html__( 'Chinese (繁)' ),
                'std' => 'Keep a lookout for job opportunities and learn quick tips & tricks to ace your interviews.',
            ),
            array (
                'id' => 'social_description_id',
                'type' => 'textarea',
                'name' => esc_html__( 'Indonesia' ),
                'std' => 'Keep a lookout for job opportunities and learn quick tips & tricks to ace your interviews.',
            ),
            array (
                'id' => 'blog_divi23der',
                'type' => 'divider'
            ),
            array(
                'id'      => 'facebook',
                'name'    => 'Facebook',
                'type'    => 'fieldset_text',
                'options' => array(
                    'sg'    => 'Singapore',
                    'hk' => 'Hong Kong',
                    'my'   => 'Malaysia',
                    'tw'   => 'Taiwan',
                    'id'   => 'Indonesia'
                ),
            ),
            array(
                'id'      => 'instagram',
                'name'    => 'Instagram',
                'type'    => 'fieldset_text',
                'options' => array(
                    'sg'    => 'Singapore',
                    'hk' => 'Hong Kong',
                    'my'   => 'Malaysia',
                    'tw'   => 'Taiwan',
                    'id'   => 'Indonesia'
                ),
            ),
            array(
                'id'      => 'linkedin',
                'name'    => 'LinkedIn',
                'type'    => 'fieldset_text',
                'options' => array(
                    'sg'    => 'Singapore',
                    'hk' => 'Hong Kong',
                    'my'   => 'Malaysia',
                    'tw'   => 'Taiwan',
                    'id'   => 'Indonesia',
                    'cn'  => 'Mainland China'
                ),
            ),
            array(
                'name'    => 'China socials',
                'type'    => 'heading'
            ),
            array (
                'id' => 'tiktok',
                'type' => 'url',
                'name' => esc_html__( 'Tiktok' ),
            ),
            array (
                'id' => 'xiaohongshu',
                'type' => 'url',
                'name' => esc_html__( 'Xiaohongshu' ),
            ),
            array(
                'id'      => 'wechat',
                'name'    => 'Wechat profile',
                'type'    => 'text'
            ),
            array(
                'id'      => 'wechat_qr',
                'name'    => 'Wechat QR code',
                'type'    => 'single_image'
            ),
            array(
                'name'    => 'Wechat for Singapore',
                'type'    => 'heading'
            ),
            array(
                'id'      => 'sg_wechat',
                'name'    => 'Wechat profile',
                'type'    => 'text'
            ),
            array(
                'id'      => 'sg_wechat_qr',
                'name'    => 'Wechat QR code',
                'type'    => 'single_image'
            ),
        ),
    );

    return $meta_boxes;
} );
