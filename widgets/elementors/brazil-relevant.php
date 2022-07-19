<?php
class Elementor_BrazilRelevant_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BrazilRelevant';
    }

    public function get_name()
    {
        return 'BrazilRelevant';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="title-relevant">
                                    Red Hot <span>Relevant.</span>
                                  </div> 
                                ', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'relevant',
            [
                'label' => __('relevant', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<p class="content text-16-normal">
                                    We create <strong>exceptional platforms and content</strong> that promote new thinking, 
                                    partnerships and ways of working for financial service providers, banks, fintechs, 
                                    regulators and the wider ecosystem – catalysing the adoption of Open Finance and Data 
                                    for better financial inclusion worldwide.
                                </p>
                                <div class="arrow-action">
                                    <a href="javascript:void(0)" class="link">Get Involved</a>
                                    <div class="wrapper-img">
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                    </div>
                                </div>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'poster-relevant',
            [
                'label' => __( 'Poster relevant', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'video-relevant',
            [
                'label' => __( 'Video relevant', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'video',
                ]
            ]
        );

      

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'advanced' );
        $this->add_inline_editing_attributes( 'main', 'advanced' );
        $this->add_inline_editing_attributes( 'block1', 'advanced' );
        $this->add_inline_editing_attributes( 'block2', 'advanced' );
        $this->add_inline_editing_attributes( 'block3', 'advanced' );
        ?>
        <div class="wrapper-relevant wrapper schero">
            <?= $settings['title'] ?>
            <div class="wrapper-consultancy-relevant">
                <div class="wrapper">
                    <div class="wrapper-content">
                        <div class="consultancy-relevant">
                            <?= $this->get_render_attribute_string('relevant') ?><?= $settings['relevant'] ?>
                        </div>
                        <div class="wrapper-consultancy-video-relevant">
                            <div class="video-relevant">
                                <img class="thumbnail" src="<?= $settings['poster-relevant']['url'] ?>" alt="">
                                <a ndata-fancybox="video" id="single_image" href="#" data-src="<?= $settings['video-relevant']['url'] ?>">
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
            <div class="star-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star_benefit.svg" alt="">
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}