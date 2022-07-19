<?php
class Elementor_SponsorDetailBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'SponsorDetailBanner';
    }

    public function get_name()
    {
        return 'SponsorDetailBanner';
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
        //     [a
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
        <div class="wrapper-our-mission wrapper-sponsor-banner">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="wrapper-video-mission">
                        <div class="video-mission">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sponer-banner.png" alt="">
                            <a ndata-fancybox="video" id="single_image" href="#" data-src="<?php echo get_template_directory_uri(); ?>/assets/videos/video-hero.mp4">
                                <button class="btn-play icon-play">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                                </button>
                            </a>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="wrapper-content-title">
                        <span>
                            <a href="#">
                                Home
                            </a>
                            <span>/</span>
                            <a href="#">
                                Sponpors
                            </a>
                        </span>
                        <h4>Railsbanking</h4>
                        <hr />
                        <div class="banner-show-info">
                            <div class="info-left text-16-normal">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt="" />
                                <a href="#" class="sign-link">USA</a>
                            </div>
                            <div class="info-right text-16-normal">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.svg" alt="" />
                                <a href="#" class="sign-link">Headline Sponsorship</a>
                            </div>
                        </div>
                        <hr />
                        <p>
                            Et mollis quam nunc at cursus elit lacinia. Suspendisse diam congue risus porttitor quis eget elementum senectus magna. Metus eget accumsan adipiscing sed molestie. At sagittis orci, mauris, sit vitae euismod pellentesque.
                            Elementum posuere eget dolor, elementum eget feugiat at ut eget.
                            <br />
                            <br />
                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                        </p>
                        <div class="banner-action">
                            <div class="arrow-action link-action">
                                <a href="#" class=" link">Visit Railsbanking</a>
                                <div class="wrapper-img">
                                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                                </div>
                            </div>
                            <div class="link-icon">
                                <a href="#">
                                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="">
                                </a>
                                <a href="#">
                                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/fb.svg" alt="">
                                </a>
                                <a href="#">
                                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/vector.svg" alt="">
                                </a>
                                <a href="#">
                                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="">
                                </a>
                            </div>                            
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