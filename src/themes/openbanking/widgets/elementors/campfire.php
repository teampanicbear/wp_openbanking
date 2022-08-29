<?php
class Elementor_Campfire_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'Campfire';
    }

    public function get_name()
    {
        return 'Campfire';
    }

    public function get_categories()
    {
        return ['basic'];
    }
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('
                                    <h2 class="title-campfire --reveal --trigger">
                                        All free to attend.
                                    </h2>
                                    <div class="content-campfire text-20-light --fade-in">
                                        Red-hot-relevant debates, sessions and insights designed to inspire, educate and ignite sector growth.
                                    </div>
                                    <div class="wrapper-action-campfire">
                                        <a class="btn btn-primary btn-register-campfire" href="/campfires">See All Campfires</a>
                                        <a class="see-all-campfire link" ndata-fancybox="video" id="single_image" href="#" data-src="https://www.youtube.com/watch?v=B3PZqcxnjt8">Learn About Campfire</a>
                                    </div>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'img-thumbnail',
            [
                'label' => __('Background campfire', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <?php
        $today = date('Y-m-d H:i:s');
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'campfire',
            'posts_per_page' => 1,
            'meta_key' => 'start_date',
            'orderby' => array('meta_value' => 'ASC'),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => 'start_date',
                    'type'    => 'DATETIME',
                    'compare' => '>=',
                    'value'   => $today,
                ),
				array(
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
				)
            ),
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php
            $first_post = $the_query->posts[0];
            $unixtimestamp = strtotime($first_post->start_date);
            $unixtimeend = strtotime($first_post->end_date);
            $url_image = get_the_post_thumbnail_url($first_post->ID);
            ?>
        <?php endif; ?>
        <div class="wrapper-campfire schero">
            <div class="banner-campfire jarallax" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?= $settings['img-thumbnail']['url'] ?>') ;"></div>
            <div class="wrapper-bottom-campfire wrapper">
                <div class="intro-join-campfire">
                    <div class="content-intro">
                        <div class="logo-campfire">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/campfire.svg" alt="">
                        </div>
                        <?= $settings['content'] ?>
                    </div>
                </div>
                <div class="upcoming-campfire">
                    <div class="heading-campfire">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bell.svg" alt=""> <span class="text-14-bold">Upcoming campfire</span>
                    </div>
                    <div class="wrapper-content">
                        <div class="bg-upcoming-campfire" style="background-image: linear-gradient(
0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo $url_image; ?>) ;">
                            <?php
                            $link = get_permalink($first_post->ID);
                            $title = '';
                            $id = $first_post->ID;
                            $class = 'on-click-link';
                            //echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']")
                            ?>
                            <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><?php echo $title; ?></a>
                            <img class="bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                        </div>
                        <div class="content">
                            <div class="time-upcoming">
                                <div class="date-time">
                                    <img class="bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                    <span class="text-14-normal">
                                        <?php echo date_i18n("g:iA", $unixtimestamp); ?> -
                                        <?php echo date_i18n("g:iA", $unixtimeend); ?>
                                    </span>
                                </div>
                                <div class="date-time">
                                    <img class="bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                                    <span class="text-14-normal"><?php echo date_i18n("d", $unixtimestamp); ?>
                                        <?php echo date_i18n("M", $unixtimestamp); ?>,
                                        <?php echo date_i18n("Y", $unixtimestamp); ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $link = get_permalink($first_post->ID);
                            $title = $first_post->post_title;
                            $id = $first_post->ID;
                            $class = 'title-upcoming text-16-bold --fade-in';
                            // echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']")
                            ?>
                            <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><?php echo $title; ?></a>

                            <?php
                            if (!is_user_logged_in()) {
                                $link = get_permalink($first_post->ID);
                                $title = 'Register now';
                                $id = $first_post->ID;
                                $class = 'btn btn-border';
                                echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']");
                            } else {
                                $class = 'btn btn-primary btn-attend';
                                echo do_shortcode("[get_btn_user_attend_campfire id='$id' class='$class']");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }

    protected function _content_template()
    {
    }
}
