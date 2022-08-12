<?php
class Elementor_BrazilConnect_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BrazilConnect';
    }

    public function get_name()
    {
        return 'BrazilConnect';
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
            'img-block1',
            [
                'label' => __( 'Image block 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block1',
            [
                'label' => __( 'Block 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="name-connect">40+</div>
                                  <div class="content-connect">Countries</div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-block2',
            [
                'label' => __( 'Image block 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block2',
            [
                'label' => __( 'Block 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="name-connect ">11,000+</div>
                                  <div class="content-connect ">Audience</div>
                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-block3',
            [
                'label' => __( 'Image block 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block3',
            [
                'label' => __( 'Blog 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="name-connect ">98.8M</div>
                                  <div class="content-connect ">Potential Reach</div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Stay connect', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="wrapper-btn">
                                        <a class="" href="javascript:void">
                                            Stay Connected
                                        </a>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'link', 'advanced' );
        $this->add_inline_editing_attributes( 'block1', 'advanced' );
        $this->add_inline_editing_attributes( 'block2', 'advanced' );
        $this->add_inline_editing_attributes( 'block3', 'advanced' );
        ?>
        <div class="wrapper-connect schero">
            <div class="wrapper-content-connect wrapper">
                <div class="list-connect --fade-in">
                    <div class="item-connect">
                        <div class="wrapper-icon-connect">
                            <img src="<?= $settings['img-block1']['url'] ?>" alt="">
                        </div>
                        <div class="content" <?= $this->get_render_attribute_string( 'block1' ) ?>><?= $settings['block1'] ?></div>
                        <div class="star-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star_problem.svg" alt="">
                        </div>
                    </div>
                    <div class="item-connect">
                        <div class="wrapper-icon-connect">
                            <img src="<?= $settings['img-block2']['url'] ?>" alt="">
                        </div>
                        <div class="content" <?= $this->get_render_attribute_string( 'block2' ) ?>><?= $settings['block2'] ?></div>
                    </div>
                    <div class="item-connect">
                        <div class="wrapper-icon-connect">
                            <img src="<?= $settings['img-block3']['url'] ?>" alt="">
                        </div>
                        <div class="content" <?= $this->get_render_attribute_string( 'block3' ) ?>><?= $settings['block3'] ?></div>
                    </div>
                </div>
                <?= $settings['link'] ?>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}