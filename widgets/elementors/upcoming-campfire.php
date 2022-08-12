<?php
class Elementor_UpcomingCampfire_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'UpcomingCampfire';
    }

    public function get_name()
    {
        return 'UpcomingCampfire';
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
            'is-brazil-campfire',
            [
                'label' => __( 'Is Brazil Campfire', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '0', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
        $isbrazilcampfire = $settings['is-brazil-campfire'];
?>
        <div class="wrapper-upcoming-campfire">
            <div class="wrapper">
                <div class="heading">Upcoming</div>
                <div class="wrapper-content">
                    <?php
                    $today = date('Y-m-d H:i:s');
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'campfire',
                        'posts_per_page' => 4,
                        'meta_key' => 'end_date',
                        'orderby' => array('meta_value' => 'ASC'),
                        'meta_query' => array(
                            'relation' => 'AND',
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
                            ),
                            array(
                                'key'     => 'end_date',
                                'type'    => 'DATETIME',
                                'compare' => '>=',
                                'value'   => $today,
                            ),
                        ),
                    );
                    if($isbrazilcampfire == '1') {
                        $args['meta_query'] = array(
                            'relation' => 'AND',
                            array(
                                'relation' => 'OR',
                                array(
                                    'key'     => 'isbrazilcampfire',
                                    'compare' => '=',
                                    'value'   => '1',
                                ),
                                array(
                                    'key'     => 'isbrazilcampfire',
                                    'compare' => 'EXISTS',
                                )
                            ),
                            array(
                                'key'     => 'end_date',
                                'type'    => 'DATETIME',
                                'compare' => '>=',
                                'value'   => $today,
                            ),
                        );
                    }
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php
                        $first_post = $the_query->posts[0];
                        $unixtimestamp = strtotime($first_post->start_date);
                        $unixtimeend = strtotime($first_post->end_date);
                        $url_image = get_the_post_thumbnail_url($first_post->ID);
                        ?>
                        <div class="primary-video">
                            <div class="thumbnail" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(<?php echo $url_image; ?>)">
                                <?php
                                if (is_user_logged_in()) {
                                    $id = $first_post->ID;
                                    $class = 'btn btn-primary';
                                    echo do_shortcode("[get_btn_user_attend_campfire id='$id' class='$class']");
                                } else {
                                    $link =  get_permalink($first_post->ID);
                                    $title =  'Register to join';
                                    $id = $first_post->ID;
                                    $class = 'btn btn-primary';
                                    echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']");
                                }

                                ?>
                            </div>
                            <div class="info-video-primary">
                                <div class="date">
                                    <h4><?php echo date_i18n("d", $unixtimestamp); ?></h4>
                                    <?php echo date_i18n("M", $unixtimestamp); ?>,
                                    <?php echo date_i18n("Y", $unixtimestamp); ?>
                                </div>
                                <div class="detail">
                                    <div class="time">
                                        <img class="livestream" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream_white.svg" alt="">
                                        <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                        <?php echo date_i18n("g:iA", $unixtimestamp); ?> - <?php echo date_i18n("g:iA", $unixtimeend); ?>
                                    </div>
                                    <?php
                                    $link =  get_permalink($first_post->ID);
                                    $title =  $first_post->post_title;
                                    $id = $first_post->ID;
                                    $class = 'title text-20-bold';
                                    // echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']") 
                                    ?>
                                    <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><?php echo $title; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="list-upcoming-video">
                        <div class="title-upcoming">
                            <h6>Upcoming Campfires</h6>
                            <!-- <div class="action">
                                <a href="#" class="link">See more</a>
                                <div class="wrapper-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                                </div>
                            </div> -->
                        </div>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php if ($the_query->current_post != 0) : ?>
                                    <?php
                                    $unixtimestamp = strtotime(get_field('start_date'));
                                    $unixtimeend = strtotime(get_field('end_date'));
                                    ?>
                                    <div class="item-video">
                                        <div class='item-image'>
                                            <?php
                                            $link = get_the_permalink();
                                            $title = '';
                                            $id = get_the_ID();
                                            $class = 'on-click-link';
                                            //echo do_shortcode("[get_link_campfire_detail_register url='$link' title='$title' id='$id' class='$class']")
                                            ?>
                                            <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><?php echo $title; ?></a>
                                            <img class="thumbnail-item" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/live.svg" alt="">
                                        </div>
                                        <div class="info-video">
                                            <?php
                                            $link = get_the_permalink();
                                            $title = get_the_title();
                                            $id = get_the_ID();
                                            $class = 'title-video text-16-bold';
                                            ?>
                                            <div class='title'>
                                                <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><?php echo $title; ?></a>
                                            </div>

                                            <div class="date-time">
                                                <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                                <?php echo date_i18n("d", $unixtimestamp); ?> <?php echo date_i18n("M", $unixtimestamp); ?> , <?php echo date_i18n("Y", $unixtimestamp); ?>
                                            </div>

                                            <?php
                                            $date = date("Y-m-d H:i:s");
                                            $datetimestamp = strtotime($date);
                                            if ($datetimestamp <= $unixtimestamp) { 
                                               $id = get_the_ID();
                                                $class = 'btn btn-primary btn-attend';
                                                echo do_shortcode("[get_btn_user_attend_campfire id='$id' class='$class']");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
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
