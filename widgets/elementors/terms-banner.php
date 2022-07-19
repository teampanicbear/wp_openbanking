<?php
class Elementor_TermsBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'TermsBanner';
    }

    public function get_name()
    {
        return 'TermsBanner';
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
        <div class="wrapper-terms-banner">
            <div class="wrapper">
                <h2>Terms of Use</h2>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}