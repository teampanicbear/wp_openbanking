<?php
class Elementor_Brazil_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Brazil';
    }

    public function get_name()
    {
        return 'Brazil';
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
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '
                                Brazil
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'wrapper-image',
            [
                'label' => __( 'Wapper image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'main',
            [
                'label' => __( 'Main', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                <h1 class="title-invitations --reveal --trigger" data-splitting>
                                OBE Brazil is a local chapter of
                                Open Banking Excellence (OBE)</h1>
                                <div class="content-invitations text-20-light --fade-in">
                                    It’s born at an exciting time for <strong>Open Banking</strong> within the country, 
                                    and designed to spark connections and knowledge that shape the future of 
                                    Open Finance within Brazil. This is also an opportunity to hear from UK pioneers sharing their 
                                    lessons learned as well as use cases that are changing consumers’ lives.
                                </div>
                                <div class="content-invitations text-20-light --fade-in">
                                    Sponsored by Mastercard and Accenture, 
                                    OBE Brazil is a big family that fuels collaboration, 
                                    ideas and knowledge sharing between peers, countries and continents through its campfires, 
                                    hackathons, masterclasses and events. 
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
        <div class="wrapper-brazil" style="background:url('<?= $settings['wrapper-image']['url'] ?>');background-size: cover;padding: 50px 0;">
            <div class="wrapper-brazil wrapper schero">
                <div class="title-brazil">
                    <?= $settings['title'] ?>
                </div>
                <div class="wrapper-content-brazil">
                    <div class="invitations">
                        <div <?= $this->get_render_attribute_string( 'main' ) ?>><?= $settings['main'] ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}