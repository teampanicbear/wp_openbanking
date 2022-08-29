<?php
class Elementor_Appathon_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Appathon';
    }

    public function get_name()
    {
        return 'Appathon';
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
                'default' => __(' 
                                    <h2 class="title-appathon --reveal --trigger">
                                        The annual competition for Fintech Startups
                                    </h2>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(' 
                                    <div class="content-appathon text-20-light --fade-in">
                                    The annual competition for fintech startups/scaleups to build innovative Open Finance solutions will come back on early 2020.
                                    </div>
                                    <div class="wrapper-action-appathon">
                                        <a href="/appathon-register" class="btn btn-primary btn-aplly-appathon">Register your Interest</a>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-thumbnail',
            [
                'label' => __( 'Banner appathon', 'plugin-name' ),
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
        <!-- <div class="banner_appathon-mobile">
            <img src="<?= $settings['img-thumbnail']['url'] ?>" alt="">
        </div> -->
        <div class="wrapper-appathon wrapper schero">
            <div class="wrapper-content-appathon">
                <div class="banner_appathon">
                    <img src="<?= $settings['img-thumbnail']['url'] ?>" alt="">
                </div>

                <div class="info-appathon">
                    <div class="logo-appathon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/appathon.svg" alt="">
                    </div>
                    <?= $settings['title'] ?>
                    <div class="banner_appathon-mobile">
                        <img src="<?= $settings['img-thumbnail']['url'] ?>" alt="">
                    </div>
                    <?= $settings['content'] ?>
                </div>
            </div>
            <img class="icon-ball" src="<?php echo get_template_directory_uri(); ?>/assets/images/bubble-new.svg" alt="">
        </div>
        <?php
    }

    protected function _content_template() {

    }
}