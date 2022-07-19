<?php
class Elementor_PartnerConsultancy_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PartnerConsultancy';
    }

    public function get_name()
    {
        return 'PartnerConsultancy';
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

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(' 
                                    <h2>PR & Consultancy</h2>
                                    <P class="text-20-light">
                                    We’re more than a PR agency, we’re your community. 
                                    We understand the industry because we are a part of it. As such, 
                                    we speak your language (and can therefore position you in the best way). 
                                    We’re behind some of the biggest global stories in the industry.
                                    <br />
                                    <br />
                                    We want to help you develop the right messaging and positioning and deliver 
                                    locally in front of your target audience, by strategically pitching and educating 
                                    the media whilst making company spokespeople a real thought leader.                                     
                                    </P>
                                    <a href = "/pr-service" class="btn-primary">Read more</a>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'banner-image',
            [
                'label' => __('Banner image consultancy', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-speaker-consultancy">
                <img src="<?= $settings['banner-image']['url'] ?>"></img>
                <div class="wrapper">
                    <div class="wrapper-consultancy">
                        <div class="wrapper-content">
                            <?= $settings['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}