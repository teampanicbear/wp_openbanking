<?php
class Elementor_SpeakerDetailOther_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'SpeakerDetailOther';
    }

    public function get_name()
    {
        return 'SpeakerDetailOther';
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-other-speaker">
            <div class="wrapper">
                <div class="wrapper-title">
                    <h2 class="title">Other Speakers</h2>
                    <div class="slide-controls">
                        <button class="btn btn-icon btn-white prev">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                            </svg>
                        </button>
                        <button class="btn btn-icon btn-white next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="list-item">
                    <div class="wrapper-item">
                        <div class="wrapper-speaker-item">
                            <a href="<?php echo get_site_url(); ?>/speaker-detail"  class="ava-speaker">
                                <img class="ava-speaker" src="<?php echo get_template_directory_uri(); ?>/assets/images/speaker_member.png" alt="">
                            </a>
                            <div class="position-item-content">
                                <div class="wrapper-item-content">
                                    <a href="<?php echo get_site_url(); ?>/speaker-detail" class="text-20-bold header-item">Ashlynn Torffs</a>
                                    <p class="text-14-normal">Head of innovation</p>
                                    <hr />
                                    <div class="bottom-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                        <p class="text-14-normal paragraph-item">Company name</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-item">
                        <div class="wrapper-speaker-item">
                            <a href="<?php echo get_site_url(); ?>/speaker-detail" class="ava-speaker">
                                <img class="ava-speaker" src="<?php echo get_template_directory_uri(); ?>/assets/images/speaker_member.png" alt="">
                            </a>
                            <div class="position-item-content">
                                <div class="wrapper-item-content">
                                    <a href="<?php echo get_site_url(); ?>/speaker-detail" class="text-20-bold header-item">Ashlynn Torffs</a>
                                    <p class="text-14-normal">Head of innovation</p>
                                    <hr />
                                    <div class="bottom-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                        <p class="text-14-normal paragraph-item">Company name</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-item">
                        <div class="wrapper-speaker-item">
                            <a href="<?php echo get_site_url(); ?>/speaker-detail" class="ava-speaker">
                                <img class="ava-speaker" src="<?php echo get_template_directory_uri(); ?>/assets/images/speaker_member.png" alt="">
                            </a>
                            <div class="position-item-content">
                                <div class="wrapper-item-content">
                                    <a href="<?php echo get_site_url(); ?>/speaker-detail" class="text-20-bold header-item">Ashlynn Torffs</a>
                                    <p class="text-14-normal">Head of innovation</p>
                                    <hr />
                                    <div class="bottom-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                        <p class="text-14-normal paragraph-item">Company name</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-item">
                        <div class="wrapper-speaker-item">
                            <a href="<?php echo get_site_url(); ?>/speaker-detail" class="ava-speaker">
                                <img class="ava-speaker" src="<?php echo get_template_directory_uri(); ?>/assets/images/speaker_member.png" alt="">
                            </a>
                            <div class="position-item-content">
                                <div class="wrapper-item-content">
                                    <a href="<?php echo get_site_url(); ?>/speaker-detail" class="text-20-bold header-item">Ashlynn Torffs</a>
                                    <p class="text-14-normal">Head of innovation</p>
                                    <hr />
                                    <div class="bottom-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                        <p class="text-14-normal paragraph-item">Company name</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-border">Load more</button>
            </div>
        </div>

        <script>
            if($(window).innerWidth() > 768) {
                var $slickElement98 = $('.wrapper-other-speaker .list-item'); // $('.slide-testimonial-container');

                $slickElement98.slick({
                    slidesToShow: 3,
                    prevArrow: $('.prev'),
                    nextArrow: $('.next'),
                    infinite: true,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true,
                            }
                        },
                    ]
                });
            }
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
