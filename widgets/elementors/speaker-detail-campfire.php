<?php
class Elementor_SpeakerDetailCampfire_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'SpeakerDetailCampfire';
    }

    public function get_name()
    {
        return 'SpeakerDetailCampfire';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // $this->add_control(  
        //     'content',
        //     [
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-own-campfire">
            <div class="wrapper">
                <h2 class="title">Adison's Campfire</h2>
                <div class="list-item minus-m16-lr">
                    <div class="item-previous">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnail_video_upcoming.png" alt="">
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <a href="#">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </a>
                        </div>
                        <div class="title-item text-16-bold">
                            <a href="#">Sharing the learnings from the uk and the way forward in open banking.</a>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            03:00 - 05:00PM
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            24 Sep 2021
                        </div>
                    </div>
                    <div class="item-previous">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnail_video_upcoming.png" alt="">
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <a href="#">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </a>
                        </div>
                        <div class="title-item text-16-bold">
                            <a href="#">Sharing the learnings from the uk and the way forward in open banking.</a>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            03:00 - 05:00PM
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            24 Sep 2021
                        </div>
                    </div>
                    <div class="item-previous">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnail_video_upcoming.png" alt="">
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <a href="#">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </a>
                        </div>
                        <div class="title-item text-16-bold">
                            <a href="#">Sharing the learnings from the uk and the way forward in open banking.</a>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            03:00 - 05:00PM
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            24 Sep 2021
                        </div>
                    </div>
                    <div class="item-previous">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnail_video_upcoming.png" alt="">
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <a href="#">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </a>
                        </div>
                        <div class="title-item text-16-bold">
                            <a href="#">Sharing the learnings from the uk and the way forward in open banking.</a>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            03:00 - 05:00PM
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            24 Sep 2021
                        </div>
                    </div>
                    <div class="item-previous">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumbnail_video_upcoming.png" alt="">
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <a href="#">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </a>
                        </div>
                        <div class="title-item text-16-bold">
                            <a href="#">Sharing the learnings from the uk and the way forward in open banking.</a>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            03:00 - 05:00PM
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            24 Sep 2021
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}