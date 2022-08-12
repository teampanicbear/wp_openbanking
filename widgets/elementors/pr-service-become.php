<?php
class Elementor_PRServiceBecome_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PRServiceBecome';
    }

    public function get_name()
    {
        return 'PRServiceBecome';
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
                                    <div class="wrapper-pr-become">
                                        <div class="wrapper">
                                            <h3 class="title">Become a Consultant</h3>
                                            <p class="content text-20-light">
                                                If you’re a consultant or expert in any of the above areas and would like to become a part of our consulting network, please register with us.
                                            </p>
                                            <button class="btn-primary">Register now</button>
                                        </div>
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
            <?= $settings['content'] ?>
        <?php
    }

    protected function _content_template() {

    }
}