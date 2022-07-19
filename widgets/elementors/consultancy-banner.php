<?php
class Elementor_ConsultancyBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'ConsultancyBanner';
    }

    public function get_name()
    {
        return 'ConsultancyBanner';
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
                'default' => __('<h5>Consultancy Services</h5>
                                <h1 class="main-title">We’re calling expert <br> Consultants, Organisations <br> and Open Banking <br> Practitioners</h1>
                                <h1 class="main-title-mobile">We’re calling expert <br> Consultants, Organisations <br> and Open Banking <br> Practitioners</h1>
                                <p class="main-des">
                                    That want to share their insights and in-depth knowledge globally.
                                </p>
                                <a class="btn-primary" href="javascript:void(0)">Apply Now</a>
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
