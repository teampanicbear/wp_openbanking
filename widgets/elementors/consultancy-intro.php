<?php
class Elementor_ConsultancyIntro_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'ConsultancyIntro';
    }

    public function get_name()
    {
        return 'ConsultancyIntro';
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
            'title',
            [
                'label' => __( 'Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="title-consultancy">
                                    Ready to apply your <span>expertise?</span>
                                  </div> 
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'main',
            [
                'label' => __( 'Main', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="content-invitations text-20-light">
                                    The UK created the ‘blueprint’ for Open Banking. Industry leaders around the world look to the UK for lessons learned, 
                                    expertise and practical advice. Adoption of Open Banking and Open Finance is expected to ramp up rapidly. 
                                    It will generate a tremendous amount of opportunities across the spectrum. 
                                    Collectively we know the principles of Open Banking (Finance and Life) embedded into new products, 
                                    services will lead us to ESG innovation that solves real world problems.
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

       

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'main', 'advanced' );
        $this->add_inline_editing_attributes( 'title', 'advanced' );
        ?>
        <div class="wrapper-consultancy wrapper schero">       
            <?= $settings['title'] ?>
            <div class="wrapper-content-consultancy">
                <div class="invitations">
                    <div <?= $this->get_render_attribute_string( 'main' ) ?>><?= $settings['main'] ?></div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}