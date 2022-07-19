<?php
class Elementor_AboutOurMission_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AboutOurMission';
    }

    public function get_name()
    {
        return 'AboutOurMission';
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
            'mission',
            [
                'label' => __('Mission', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h2 class="title">Our <br> Mission</h2>
                                <p class="content text-16-normal">Create exceptional platforms and content that promotes knowledge sharing, new thinking and partnerships within the industry – catalysing the adoption of Open Finance and Data for better financial inclusion worldwide.</p>
                                <div class="arrow-action">
                                    <a href="#" class=" link">Meet our team</a>
                                    <div class="wrapper-img">
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                    </div>
                                </div>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'poster-mission',
            [
                'label' => __( 'Poster mission', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'video-mission',
            [
                'label' => __( 'Video mission', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'video',
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
        <div class="wrapper-our-mission">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="wrapper-video-mission">
                        <div class="video-mission">
                            <img class="thumbnail" src="<?= $settings['poster-mission']['url'] ?>" alt="">
                            <a ndata-fancybox="video" id="single_image" href="#" data-src="<?= $settings['video-mission']['url'] ?>">
                                <button class="btn-play icon-play">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                                </button>
                            </a>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="our-mission">
                        <?= $this->get_render_attribute_string('mission') ?><?= $settings['mission'] ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
