<?php
class Elementor_PartnerBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PartnerBanner';
    }

    public function get_name()
    {
        return 'PartnerBanner';
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
                'default' => __( '
                                    <div class="content-text">
                                        <h1>Partner with us</h1>
                                        <p class="text-20-normal">
                                            Maximise your innovation, business and partner 
                                            pportunities - and accelerate the adoption of Open Banking and Finance.
                                        </p>
                                    </div>
                                    <div class="content-action">
                                        <button class="btn-primary">Download Partner Overview</button>
                                    </div>
                                ', 
                                'plugin-name' ),
            ]
        );

        $this->add_control(
            'banner-image',
            [
                'label' => __('Banner image partner', 'plugin-name'),
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
            <div class="wrapper-partner-banner">
                <img src="<?= $settings['banner-image']['url'] ?>"></img>
                <div class="wrapper-content">
                    <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}