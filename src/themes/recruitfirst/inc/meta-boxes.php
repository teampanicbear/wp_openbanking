<?php
add_filter( 'rwmb_meta_boxes', 'rf_register_meta_boxes' );

function rf_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rf_';

    // Member
    $meta_boxes[] = array (
        'title' => esc_html__( 'Information' ),
        'id' => 'information',
        'post_types' => array(
            0 => 'member',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 'country',
                'name' => esc_html__( 'Location' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item' ),
                'options' => array(
                    'Singapore' => esc_html__( 'Singapore' ),
                    'Hong Kong' => esc_html__( 'Hong Kong' ),
                    'Kuala Lumpur' => esc_html__( 'Kuala Lumpur' ),
                    'Taipei' => esc_html__( 'Taipei' ),
                    'Shanghai' => esc_html__( 'Shanghai' ),
                    'Jakarta' => esc_html__( 'Jakarta' ),
                ),
                'admin_columns' => array(
                    'position' => 'after title',
                    'sort'       => true,
                    'filterable' => true
                )
            ),
            array (
                'id' => $prefix . 'email',
                'name' => esc_html__( 'Email' ),
                'type' => 'email',
            ),
            array (
                'id' => $prefix . 'phone',
                'type' => 'text',
                'name' => esc_html__( 'Phone' ),
            ),
            array (
                'id' => $prefix . 'whatsapp',
                'type' => 'text',
                'name' => esc_html__( 'Whatsapp' ),
            ),
            array (
                'id' => $prefix . 'telegram',
                'type' => 'text',
                'name' => esc_html__( 'Telegram' ),
                'placeholder' => 'Enter username'
            ),
            array (
                'id' => $prefix . 'line',
                'type' => 'text',
                'name' => esc_html__( 'Line account ID' ),
                'placeholder' => '@lineaccount'
            ),
            array (
                'id' => $prefix . 'wechat',
                'type' => 'text',
                'name' => esc_html__( 'Wechat number' ),
            ),
            array (
                'id' => $prefix . 'wechat_id',
                'type' => 'text',
                'name' => esc_html__( 'Wechat ID' ),
            ),
            array (
                'id' => $prefix . 'wechat_qr',
                'type' => 'single_image',
                'name' => esc_html__( 'Wechat QRCode' ),
            ),
            array (
                'id' => $prefix . 'linkedin',
                'type' => 'text',
                'name' => esc_html__( 'Linkedin' ),
            ),
            array (
                'id' => $prefix . 'designation',
                'type' => 'text',
                'name' => esc_html__( 'Designation' ),
            ),
            array (
                'id' => $prefix . 'industries',
                'type' => 'textarea',
                'name' => esc_html__( 'Industries in member card' ),
                'admin_columns' => array(
                    'position' => 'after title',
                    'title'    => 'Industries'
                ),
            ),
            array (
                'id' => $prefix . 'bio',
                'type' => 'textarea',
                'name' => esc_html__( 'Full Industries' )
            ),
        ),
        'text_domain' => 'rf',
    );

    // Homepage
    $meta_boxes[] = array (
        'title' => esc_html__( 'Home - Section 1' ),
        'id' => 'home-section-1',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's1_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Hi, I’m Ruby the Recruiter. n<strong>May I help you ?</strong>',
            ),
            array (
                'id' => $prefix . 's1_btn_1',
                'type' => 'text',
                'name' => esc_html__( 'Job search' ),
                'std' => 'Job search',
            ),
            array (
                'id' => $prefix . 's1_btn_2',
                'type' => 'text',
                'name' => esc_html__( 'Talent solutions' ),
                'std' => 'Talent solutions',
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/homepage.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Home - Section 2' ),
        'id' => 'home-section-2',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's2_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'We\'re the <br>right fit for you',
            ),
            array (
                'id' => $prefix . 's2_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Because we make your business, a part of ours',
            ),
            array (
                'id' => $prefix . 's2_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Content: {rf_title}',
                'max_clone' => 6,
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/homepage.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Home - Section 3' ),
        'id' => 'home-section-3',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's3_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'We place over <span>11,000 roles</span> in a year,',
            ),
            array (
                'id' => $prefix . 's3_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Your dream job is just <br>a click a way.',
            ),
            array (
                'id' => $prefix . 's3_button',
                'type' => 'text',
                'name' => esc_html__( 'Button text' ),
                'std' => 'View all jobs',
            ),
            array (
                'id' => $prefix . 's3_button_empty',
                'type' => 'text',
                'name' => esc_html__( 'Button text when no jobs' ),
                'std' => 'View other jobs',
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/homepage.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Home - Section 4' ),
        'id' => 'home-section-4',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's4_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Thousands of satisfied clients and candidates',
            ),
            array (
                'id' => $prefix . 's4_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Come on board and be the next one!',
            ),
            array (
                'id' => $prefix . 's4_score',
                'type' => 'number',
                'name' => esc_html__( 'NPS score' ),
                'std' => 84,
            ),
            array (
                'id' => $prefix . 's4_reviews',
                'type' => 'group',
                'name' => esc_html__( 'Reviews' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'name',
                        'type' => 'text',
                        'name' => esc_html__( 'Author name' ),
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Content' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Review {#}',
                'max_clone' => 9,
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/homepage.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Home - Section 5' ),
        'id' => 'home-section-5',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's5_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => '#recruitfirst',
            ),
            array (
                'id' => $prefix . 's5_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => "We've got everything from job opportunities to quick tips and tricks to ace your interviews, career and more! ",
            ),
            array(
                'id'               => 'wechat_qr',
                'name'             => 'Wechat QR Code',
                'type'             => 'single_image'
            ),
            array(
                'id'               => 'wechat_text',
                'name'             => 'Wechat help text',
                'type'             => 'textarea',
                'std'              => 'Scan QR or search for RecruitFirst on WeChat to follow us.'
            ),
            array(
                'id'               => 'wechat_text_mb',
                'name'             => 'Mobile Wechat help text',
                'type'             => 'textarea',
                'std'              => 'Screenshot QR code. Scan QR or search for RecruitFirst on WeChat to follow us.'
            ),
            array(
                'id'               => 'wechat_text_mbdf',
                'type'             => 'divider',
            ),

            array(
                'id'               => 's5_sg_images',
                'name'             => 'Gallery Images',
                'type'             => 'image_advanced',
                'force_delete'     => true,
                'max_file_uploads' => 8,
                'max_status'       => 'false',
                'image_size'       => 'thumbnail',
            ),
        ),

        'text_domain' => 'rf',
        'include' => array(
            'template' => array('templates/homepage.php')
        )
    );

    // About page
    $meta_boxes[] = array (
        'title' => esc_html__( 'About - Section 1' ),
        'id' => 'about-section-1',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's1_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'We focus on delivering tangible results',
            ),
            array (
                'id' => $prefix . 's1_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'The kind that helps you grow and creates a lasting impact',
            ),
            array (
                'id' => $prefix . 's1_video',
                'type' => 'url',
                'name' => esc_html__( 'Youtube video' ),
                'std' => 'https://www.youtube.com/watch?v=Csvc5JJqwEo',
            ),
            array(
                'id' => $prefix . 's1_video_mp4',
                'name'             => 'Mp4 video',
                'type'             => 'video',
                'force_delete'     => true,

                'max_file_uploads' => 1,
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/about.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'About - Section 2' ),
        'id' => 'about-section-2',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's2_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'subtitle',
                        'type' => 'text',
                        'name' => esc_html__( 'Subtitle' ),
                        'std' => 'OUR PROMISE',
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Delivering <br>Transformative Solutions',
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                        'std' => 'We know how important it is to be able to work with a team that can deliver and provide the experience that best meets your needs.
That is why working with us feels like an extension of your HR team and not just an external resource.
Our primary focus is to understand your concerns, design services that address those concerns, and root them in technology so that they always remain relevant.',
                    ),
                    array (
                        'id' => $prefix . 'image',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Image' ),
                        'force_delete' => 1,
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Section: {rf_title}',
                'max_clone' => 5,
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/about.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'About - Section 3' ),
        'id' => 'about-section-3',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's3_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'number',
                        'type' => 'text',
                        'name' => esc_html__( 'Number' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'image',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Image' ),
                        'force_delete' => 1,
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Item: {rf_title}',
                'max_clone' => 5,
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/about.php')
        )
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'About - Section 4' ),
        'id' => 'about-section-4',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 's4_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Meet our Leaders',
            ),
            array (
                'id' => $prefix . 's4_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Across our 6 cities, these awesome leaders are always on hand to provide insights to clients, advice to candidates, and direction to our consultants. Connect with our leaders to find out how they can help take your organisation to the next level.',
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
          'template' => array('templates/about.php')
        )
    );

    // Candidate
    $meta_boxes[] = array (
        'title' => esc_html__( 'Candidate' ),
        'id' => 'candidate',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/candidate.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 'page_title',
                'type' => 'textarea',
                'name' => esc_html__( 'Page title' ),
                'std' => 'Let’s get started on your job search!',
            ),
            array (
                'id' => $prefix . 'job_board_title',
                'type' => 'textarea',
                'name' => esc_html__( 'Job board title' ),
                'std' => 'Our Job Board',
            ),
            array (
                'id' => $prefix . 'heading_w7h7sz5g7rl',
                'type' => 'heading',
                'name' => esc_html__( 'Step-by-Step Job Application Guide' ),
            ),
            array (
                'id' => $prefix . 'step_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Steps heading' ),
                'std' => 'Your Step-by-Step Job Application Guide',
            ),
            array (
                'id' => $prefix . 'steps',
                'type' => 'group',
                'name' => esc_html__( 'Step-by-Step' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Step {#}',
                'max_clone' => 5,
            ),
            array (
                'id' => $prefix . 'heading_w7h7esz5g7rl',
                'type' => 'heading',
                'name' => esc_html__( 'Form settings' ),
            ),
            array (
                'id' => $prefix . 'alert_form_message',
                'type' => 'textarea',
                'name' => esc_html__( 'Alert form message' ),
                'std' => 'Thanks for subscribing to us! We will be in touch with you shortly.',
            ),
            array (
                'id' => $prefix . 'resume_form_message',
                'type' => 'textarea',
                'name' => esc_html__( 'Resume drop form message' ),
                'std' => 'Thanks for submitting to us! We will be in touch with you shortly.',
            ),
        ),
        'text_domain' => 'rf',
    );

    // Employer
    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 1' ),
        'id' => 'employer-section-1',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's1_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Work with our team of experts',
            ),
            array (
                'id' => $prefix . 's1_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Check out the 360° RecruitFirst Experience',
            ),
            array (
                'id' => $prefix . 's1_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
                'max_clone' => 7,
            ),
        ),
        'text_domain' => 'rf',
    );

    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 2' ),
        'id' => 'employer-section-2',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's2_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'How It Works',
            ),
            array(
                'type' => 'heading',
                'name' => 'Initiation Process'
            ),
            array (
                'id' => $prefix . 'initiation_title',
                'type' => 'text',
                'name' => esc_html__( 'Title' ),
                'std' => 'Initiation Process'
            ),
            array (
                'id' => $prefix . 's2_initiation',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
            ),
            array(
                'type' => 'heading',
                'name' => 'Hiring Process'
            ),
            array (
                'id' => $prefix . 'hiring_title',
                'type' => 'text',
                'name' => esc_html__( 'Title' ),
                'std' => 'Hiring Process'
            ),
            array (
                'id' => $prefix . 's2_hiring',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
            ),
            array(
                'type' => 'heading',
                'name' => 'Digital Onboarding Experience'
            ),
            array (
                'id' => $prefix . 'digital_title',
                'type' => 'text',
                'name' => esc_html__( 'Title' ),
                'std' => 'Digital Onboarding Experience'
            ),
            array (
                'id' => $prefix . 's2_digital',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 3' ),
        'id' => 'employer-section-3',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's3_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'A Holistic Suite of Digital Solutions',
            ),
            array (
                'id' => $prefix . 's3_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Our digital toolbox covers every stage of our client and candidate\'s journey.',
            ),
            array (
                'id' => $prefix . 's3_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
                'max_clone' => 10,
            ),
        ),
        'text_domain' => 'rf',
    );

    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 4' ),
        'id' => 'employer-section-4',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's4_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Experts in the field',
            ),
            array (
                'id' => $prefix . 's4_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Our consultants have deep expertise in these areas of specialization.',
            ),
            array (
                'id' => $prefix . 's4_content',
                'type' => 'group',
                'name' => esc_html__( 'Industries' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'locations',
                        'type' => 'select',
                        'name' => esc_html__( 'Locations' ),
                        'options'         => array(
                            'singapore'       => 'Singapore',
                            'hong-kong' => 'Hong Kong',
                            'kuala-lumpur'        => 'Kuala Lumpur',
                            'shanghai'     => 'Shanghai',
                            'taipei' => 'Taipei',
                            'jakarta'     => 'Jakarta',
                        ),
                        // Allow to select multiple value?
                        'multiple'        => true,
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'expanded',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 5' ),
        'id' => 'employer-section-5',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's5_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Core HR Solutions',
            ),
            array (
                'id' => $prefix . 'form_message',
                'type' => 'textarea',
                'name' => esc_html__( 'Form message' ),
                'std' => 'Thanks for submitting to us! We will be in touch with you shortly.',
            ),
            array (
                'id' => $prefix . 'divider_6ve57jtf8ov',
                'type' => 'divider',
                'name' => esc_html__( 'Divider' ),
            ),
            array (
                'id' => $prefix . 's5_staffing',
                'type' => 'group',
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                        'force_delete' => 1,
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Staffing and Placement',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'name' => esc_html__( 'Content' ),
                        'type' => 'wysiwyg',
                        'raw' => 1,
                        'options' => array(
                            'textarea_rows' => 4,
                            'teeny'         => true,
                            'media_buttons' => false
                        ),
                    )
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Staffing and Placement',
            ),
            array (
                'id' => $prefix . 's5_payroll',
                'type' => 'group',
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                        'force_delete' => 1,
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Payroll',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'name' => esc_html__( 'Content' ),
                        'type' => 'wysiwyg',
                        'raw' => 1,
                        'options' => array(
                            'textarea_rows' => 4,
                            'teeny'         => true,
                            'media_buttons' => false
                        ),
                    )
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Payroll',
            ),
            array (
                'id' => $prefix . 's5_rpo-bpo',
                'type' => 'group',
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Icon' ),
                        'force_delete' => 1,
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'RPO and BPO',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'name' => esc_html__( 'Content' ),
                        'type' => 'wysiwyg',
                        'raw' => 1,
                        'options' => array(
                            'textarea_rows' => 4,
                            'teeny'         => true,
                            'media_buttons' => false
                        ),
                    )
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'RPO and BPO',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 6' ),
        'id' => 'employer-section-6',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's6_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Full Suite of Services',
            ),
            array (
                'id' => $prefix . 's6_subtitle',
                'type' => 'text',
                'name' => esc_html__( 'Subtitle' ),
                'std' => 'Alternatively, have a look at our',
            ),
            array (
                'id' => $prefix . 's6_acquisition',
                'type' => 'group',
//                'name' => esc_html__( 'Talent Acquisition' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Talent Acquisition',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'type' => 'text',
                        'name' => esc_html__( 'Content' ),
                        'clone' => 1,
                        'sort_clone' => 1,
                    ),
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Talent Acquisition',
            ),
            array (
                'id' => $prefix . 's6_management',
                'type' => 'group',
//                'name' => esc_html__( 'Talent Management' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Talent Management',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'type' => 'text',
                        'name' => esc_html__( 'Content' ),
                        'clone' => 1,
                        'sort_clone' => 1,
                    ),
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Talent Management',
            ),
            array (
                'id' => $prefix . 's6_advisory',
                'type' => 'group',
//                'name' => esc_html__( 'Talent Advisory' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                        'std' => 'Talent Advisory',
                    ),
                    array (
                        'id' => $prefix . 'content',
                        'type' => 'text',
                        'name' => esc_html__( 'Content' ),
                        'clone' => 1,
                        'sort_clone' => 1,
                    ),
                ),
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Talent Advisory',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Employer - Section 7' ),
        'id' => 'employer-section-7',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/employer.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's7_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Get in touch with us for other customized solutions.',
            ),
        ),
        'text_domain' => 'rf',
    );

    // Join us
    $meta_boxes[] = array (
        'title' => esc_html__( 'Join us - Section 1' ),
        'id' => 'join-us-section-1',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/joinus.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's1_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Passionate about making a positive impact in someone’s life?',
            ),
            array (
                'id' => $prefix . 's1_button',
                'type' => 'text',
                'name' => esc_html__( 'Button text' ),
                'std' => 'Join Us Today',
            ),
            array (
                'id' => $prefix . 's1_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'We treat every day as an opportunity to do good. Whether it is for our teammates, candidates, or clients, we are driven to make a holistic impact on those we have crossed paths with.',
            ),
            array(
                'id'               => 's1_images',
                'name'             => 'Gallery Images',
                'type'             => 'image_advanced',
                'force_delete'     => true,
                'max_file_uploads' => 10,
                'max_status'       => 'false',
                'image_size'       => 'thumbnail',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Join us - Section 2' ),
        'id' => 'join-us-section-2',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/joinus.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's2_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Why work at RecruitFirst',
            ),
            array (
                'id' => $prefix . 's2_content',
                'type' => 'group',
                'name' => esc_html__( 'Content' ),
                'fields' => array(
                    array (
                        'id' => $prefix . 'icon',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Icon' ),
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Title' ),
                    ),
                    array (
                        'id' => $prefix . 'description',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Description' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'expanded',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => '{rf_title}',
            ),
        ),
        'text_domain' => 'rf',
    );
    $meta_boxes[] = array (
        'title' => esc_html__( 'Join us - Section 3' ),
        'id' => 'join-us-section-3',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/joinus.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's3_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Job Description',
            ),
            array (
                'id' => $prefix . 's3_image',
                'type' => 'single_image',
                'name' => esc_html__( 'Image' ),
            ),
            array (
                'id' => $prefix . 's3_content',
                'name' => esc_html__( 'Content' ),
                'type' => 'wysiwyg',
                'raw' => 1,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false
                ),
            ),
        ),
        'text_domain' => 'rf',
    );

    $meta_boxes[] = array (
        'title' => esc_html__( 'Join us - Section 4' ),
        'id' => 'join-us-section-4',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/joinus.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 's4_heading',
                'type' => 'textarea',
                'name' => esc_html__( 'Heading' ),
                'std' => 'Go ahead, take that first step!',
            ),
            array (
                'id' => $prefix . 's4_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Fill in the form and our HR team will get in touch with you.',
            ),
            array (
                'id' => $prefix . 'heading1234',
                'type' => 'heading',
                'name' => esc_html__( 'Form settings' )
            ),
            array (
                'id' => $prefix . 'form_message',
                'type' => 'textarea',
                'name' => esc_html__( 'Form message' ),
                'std' => 'Thanks for submitting to us! We will be in touch with you shortly.',
            ),
        ),
        'text_domain' => 'rf',
    );

    // Contact
    $meta_boxes[] = array (
        'title' => esc_html__( 'Contact' ),
        'id' => 'contact',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'include' => array(
            'template' => array('templates/contact.php')
        ),
        'fields' => array(
            array (
                'id' => $prefix . 'title',
                'type' => 'textarea',
                'name' => esc_html__( 'Page title' ),
                'std' => 'Contact Our Experts Today!',
            ),
            array (
                'id' => $prefix . 'form_title',
                'type' => 'text',
                'name' => esc_html__( 'Form title' ),
                'std' => 'Drop Us a Message',
            ),
            array (
                'id' => $prefix . 'form_description',
                'type' => 'textarea',
                'name' => esc_html__( 'Form description' ),
                'std' => 'We\'ll get back to you as soon as we can.',
            ),
            array (
                'id' => $prefix . 'form_message',
                'type' => 'textarea',
                'name' => esc_html__( 'Form message' ),
                'std' => 'Thanks for contacting us! We will be in touch with you shortly.',
            ),
            array (
                'id' => $prefix . 'divider_6ve57jtf8ov',
                'type' => 'divider',
                'name' => esc_html__( 'Divider' ),
            ),
            array (
                'id' => $prefix . 'locations',
                'type' => 'group',
                'name' => esc_html__( 'Locations' ),
                'fields' => array(
                    array(
                        'name'            => 'Country/Region',
                        'id'              => $prefix . 'country',
                        'type'            => 'select',
                        'options'         => array(
                            'singapore'   => 'Singapore',
                            'hong-kong'   => 'Hong Kong',
                            'malaysia' => 'Malaysia',
                            'china'       => 'Mainland China',
                            'taiwan' =>   'Taiwan',
                            'indonesia'     => 'Indonesia'
                        ),
                        'multiple'        => false,
                        'placeholder' => 'Select an option',
                    ),
                    array (
                        'id' => $prefix . 'title',
                        'type' => 'text',
                        'name' => esc_html__( 'Location name' ),
                    ),
                    array (
                        'id' => $prefix . 'address',
                        'name' => esc_html__( 'Address' ),
                        'type' => 'wysiwyg',
                        "raw"  => 1,
                        'options' => array(
                            'textarea_rows' => 4,
                            'teeny'         => true,
                            'media_buttons' => false
                        ),
                    ),
                    array (
                        'id' => $prefix . 'email',
                        'name' => esc_html__( 'Email' ),
                        'type' => 'email',
                        'std' => 'hello.sg@recruitfirst.co',
                    ),
                    array (
                        'id' => $prefix . 'phone',
                        'type' => 'textarea',
                        'name' => esc_html__( 'Phone number' ),
                    ),
                    array (
                        'id' => $prefix . 'fax',
                        'type' => 'text',
                        'name' => esc_html__( 'Fax' ),
                    ),
                    array (
                        'id' => $prefix . 'working_hour',
                        'type' => 'text',
                        'name' => esc_html__( 'Working hour' ),
                        'std' => 'Monday – Friday, 8:30am – 6pm',
                    ),
                    array (
                        'id' => $prefix . 'heading_i0g2tifls4f',
                        'type' => 'heading',
                        'name' => esc_html__( 'Socials' ),
                    ),
                    array (
                        'id' => $prefix . 'facebook',
                        'type' => 'url',
                        'name' => esc_html__( 'Facebook' ),
                    ),
                    array (
                        'id' => $prefix . 'instagram',
                        'type' => 'url',
                        'name' => esc_html__( 'Instagram' ),
                    ),
                    array (
                        'id' => $prefix . 'linkedin',
                        'type' => 'url',
                        'name' => esc_html__( 'Linkedin' ),
                    ),
                    array (
                        'id' => $prefix . 'wechat',
                        'type' => 'text',
                        'name' => esc_html__( 'Wechat profile' ),
                    ),
//                    array (
//                        'id' => $prefix . 'wechat_id',
//                        'type' => 'text',
//                        'name' => esc_html__( 'Wechat ID' ),
//                    ),
                    array (
                        'id' => $prefix . 'wechat_qr',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Wechat QR Code' ),
                    ),
                    array (
                        'id' => $prefix . 'tiktok',
                        'type' => 'url',
                        'name' => esc_html__( 'Tiktok' ),
                    ),
                    array (
                        'id' => $prefix . 'xiaohongshu',
                        'type' => 'url',
                        'name' => esc_html__( 'Xiaohongshu' ),
                    ),
                ),
                'clone' => 1,
                'sort_clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Location {rf_title}',
            ),
            array (
                'id' => $prefix . 'tw_document',
                'name' => esc_html__( 'Taiwan document' ),
                'type' => 'wysiwyg',
                'raw' => 1,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'wpautop' => false
                ),
            ),
        ),
        'text_domain' => 'rf',
    );

    // Blog post
    $meta_boxes[] = array (
        'title' => esc_html__( 'Blog' ),
        'id' => 'blog',
        'post_types' => array(
            0 => 'post',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 'cover',
                'type' => 'single_image',
                'name' => esc_html__( 'Cover image' )
            ),
            array (
                'id' => $prefix . 'author',
                'type' => 'text',
                'name' => esc_html__( 'Post author' )
            ),
        ),
        'text_domain' => 'rf',
    );

    //
    $meta_boxes[] = array (
        'title' => esc_html__( 'Event' ),
        'id' => 'blog',
        'post_types' => array(
            0 => 'page',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 'title',
                'type' => 'text',
                'name' => esc_html__( 'Title' ),
                'std' => 'Hi! Thanks for joining our event!'
            ),
            array (
                'id' => $prefix . 'description',
                'type' => 'textarea',
                'name' => esc_html__( 'Description' ),
                'std' => 'Fill up the form below to get in touch with us.'
            ),
            array (
                'id' => $prefix . 'form_id',
                'type' => 'text',
                'name' => esc_html__( 'Form ID' )
            ),
        ),
        'text_domain' => 'rf',
        'include' => array(
            'template' => array('templates/event.php')
        ),
    );

    // Sticker
    $meta_boxes[] = array (
        'title' => esc_html__( 'Sticker information'),
        'id' => 'sticker-information',
        'post_types' => array(
            0 => 'sticker',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 'language',
                'type' => 'group',
                'fields' => array(
                    array (
                        'id' => $prefix . 'language',
                        'name' => esc_html__( 'Select language'),
                        'type' => 'select',
                        'std' => 'English',
                        'placeholder' => esc_html__( 'Select an Item'),
                        'options' => array(
                            'English' => esc_html__( 'English'),
                            'Mandarin' => esc_html__( 'Mandarin'),
                            'Cantonese' => esc_html__( 'Cantonese'),
                        ),
                        'required' => 1,
                    ),
                    array (
                        'id' => $prefix . 'telegram',
                        'type' => 'text',
                        'name' => esc_html__( 'Telegram'),
                    ),
                    array (
                        'id' => $prefix . 'whatsapp',
                        'type' => 'text',
                        'name' => esc_html__( 'Whatsapp'),
                    ),
                    array (
                        'id' => $prefix . 'wechat',
                        'type' => 'text',
                        'name' => esc_html__( 'Wechat'),
                    ),
                    array (
                        'id' => $prefix . 'qrcode',
                        'type' => 'single_image',
                        'name' => esc_html__( 'QR Code'),
                    ),
                    array (
                        'id' => $prefix . 'preview',
                        'type' => 'single_image',
                        'name' => esc_html__( 'Preview'),
                    ),
                ),
                'clone' => 1,
                'default_state' => 'collapsed',
                'collapsible' => true,
                'save_state' => true,
                'group_title' => 'Language: {rf_language}',
            ),
        ),
        'text_domain' => 'rf',
    );

    // Calendar
    $meta_boxes[] = array (
        'title' => esc_html__( 'Information'),
        'id' => 'information',
        'post_types' => array(
            0 => 'calendar',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array (
                'id' => $prefix . 'preview',
                'type' => 'single_image',
                'name' => esc_html__( 'Preview'),
            ),
            array (
                'id' => $prefix . 'full_preview',
                'type' => 'single_image',
                'name' => esc_html__( 'Full preview'),
            ),
            array (
                'id' => $prefix . 'download',
                'type' => 'url',
                'name' => esc_html__( 'Download link'),
                'required' => 1,
            ),
        ),
        'text_domain' => 'rf',
    );

    return $meta_boxes;
}
