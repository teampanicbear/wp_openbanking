<?php
class Elementor_SpeakerDetailBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'SpeakerDetailBanner';
    }

    public function get_name()
    {
        return 'SpeakerDetailBanner';
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
                <div class="wrapper-speaker-detail-banner">
                    <div class="wrapper">
                        <div class="wrapper-content">
                            <div class="avatar-speaker">
                                <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/speaker-detail.png" alt="">
                            </div>
                            <div class="info-speaker">
                                <div class="breadcumb">
                                    <a href="#">Home </a>
                                    <div class="slash">/</div>
                                    <a href="#">Speakers</a>
                                </div>
                                <h4 class="name-speaker">Adison Nguyen</h4>
                                <div class="position">
                                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/article.svg" alt="">
                                    <span>Cryptocurrency</span>
                                    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt="">
                                    <span>Scottland</span>
                                </div>
                                <div class="description">
                                    <p>
                                        Et mollis quam nunc at cursus elit lacinia. Suspendisse diam congue risus porttitor quis eget elementum senectus magna. Metus eget accumsan adipiscing sed molestie. At sagittis orci, mauris, sit vitae euismod pellentesque. Elementum posuere eget dolor, elementum eget feugiat at ut eget.
                                    </p>
                                    <p>
                                        Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                    </p>
                                </div>
                                <div class="arrow-action">
                                    <a href="#" class=" link">Visit Adison’s Linkedin</a>
                                    <div class="wrapper-img">
                                        <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
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