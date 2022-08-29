<?php
class Elementor_ConsultancyMission_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'ConsultancyMission';
    }

    public function get_name()
    {
        return 'ConsultancyMission';
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
                'default' => __('<h5 class="title">“Market forecast size $416 billion Amit”</h5>
                                    <p class="content text-16-normal">
                                        While there is no dearth of Ideas and Capital, there is always shortage of the right people, 
                                        talent capabilities and collective capacities to deliver.</p>
                                    <p class="content text-16-normal">
                                        By joining this exclusive group of Global Open Banking Subject Matter Experts, 
                                        your profile will be searched and sought by our global community for expert advice, opinions, 
                                        signposting and who knows, you could be delivering some game changing opportunities too.</p>
                                    <div class="arrow-action">
                                        <a href="javascript:void(0)" class=" link">Get Involved</a>
                                        <div class="wrapper-img">
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
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
        <div class="wrapper-consultancy-mission">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="consultancy-mission">
                        <?= $this->get_render_attribute_string('mission') ?><?= $settings['mission'] ?>
                    </div>
                    <div class="wrapper-consultancy-video-mission">
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
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
