<?php
class Elementor_BlogBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BlogBanner';
    }

    public function get_name()
    {
        return 'BlogBanner';
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
            <div class="wrapper-blog-banner">
				<img class="bg-blog-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-banner-min.png" alt="">
				<img class="star-blog-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/star-dot.svg" alt="">
            </div>
        <?php
    }

    protected function _content_template() {

    }
}