<?php
class Elementor_BannerImage_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'Hero BannerImage';
    }

    public function get_name()
    {
        return 'Hero BannerImage';
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
            'video-home-banner',
            [
                'label' => __('Video', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'video',
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h1 class="main-text-banner">Red-hot-relevant debates, sessions and insights designed to inspire, educate and catalyse sector growth.</h1>
                                <div class="sub-text-banner text-20-light">Join your peers across financial services, fintech and regulation at our free-to-attend events. Meet potential partners and collaborators - learn, share and shape the conversation. </div>
                                ', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('content', 'advanced');
?>
        <div class="wrapper-banner banner-image">
            <div class="overlay"></div>
            <img class="wrapper-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner_campfire_page_min.png"></img>
            <!-- <video class="video-thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/videos/video-hero.mp4" autoplay muted loop></video> -->
            <div class="wrapper">
                <div class="wrapper-content-banner">
                    <img class="logo-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/campfire.svg" alt="">
                    <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
