<?php
class Elementor_PartnerBecome_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PartnerBecome';
    }

    public function get_name()
    {
        return 'PartnerBecome';
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
                                    <div class="wrapper-content-left">
                                        <h2>Looking to ignite change and supercharge your growth?</h2>
                                        <h3>Looking to ignite change and supercharge your growth?</h3>
                                    </div>
                                    <div class="wrapper-content-right"> 
                                        <p class="text-16-light">Access to our global OBE community of over 
                                        15,000 Open Banking pioneers, raft of writers, marketing and events 
                                        experts as well as PR office will ramp up your connections, 
                                        brand visibility, learnings and deals done.</p>
                                        <button class="btn-primary">Get Involved</button> 
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-speaker-become wrapper-partner-become">
                <div class="wrapper wrapper-content wrapper-partner-content">
                    <?= $settings['content'] ?>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}