<?php
class Elementor_AboutBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AboutBanner';
    }

    public function get_name()
    {
        return 'AboutBanner';
    }

    public function get_categories()
    {
        return ['basic'];
    }
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'banner',
            [
                'label' => __('Banner', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5>Open Banking Excellence</h5>
                                <h1 class="main-title">The global centre of <br> community & knowledge <br> driving change in Open <br> Finance</h1>
                                <h1 class="main-title-mobile">The global centre <br> of community & <br> knowledge driving <br> change in Open <br> Finance</h1>
                                <p>We enable our community to connect, collaborate and innovate, maximising their impact and growth in our sector.</p>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'banner-image',
            [
                'label' => __( 'Banner image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-about-banner">
            <div class="star-icon">
                <img src="<?= $settings['banner-image']['url'] ?>" alt="">
            </div>
            <div class="wrapper">
                <?= $this->get_render_attribute_string('banner') ?><?= $settings['banner'] ?>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
