<?php
class Elementor_InsightIntro_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'InsightIntro';
    }

    public function get_name()
    {
        return 'InsightIntro';
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
            'content',
            [
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="site-name">OBE Insights</h5>
                                <h1 class="main-title">OBE original research, ebooks and reports - your deep dive into Open Banking.</h1>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'sub_content',
            [
                'label' => __('Sub_Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="title">Open <br> Banking for <br> Good</h5>
                                <h6 class="title-mobile">Open Banking for Good</h6>
                                <div class="wrapper-content">
                                    <p class="content text-20-light">Want to make a difference and test the hottest use case in Open Banking (in less than 60 seconds?) We’ve partnered with Open Banking data and payments expert Moneyhub and Streeva, the creator of Swiftaid, to demonstrate Open Banking payments with an innovative QR code solution - making donations easier for the public and more-cost effective for charities.</p>
                                    <div class="arrow-action">
                                        <a href="#" class=" link">Learn more</a>
                                        <div class="wrapper-img">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                        </div>
                                    </div>
                                </div>', 'plugin-name'),
            ]
        );


        $this->add_control(
            'img-qr-code',
            [
                'label' => __('Image QR code', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'video-insight',
            [
                'label' => __('Video insight', 'plugin-name'),
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
        <div class="wrapper-intro">
            <img class="logo-star-world" src="<?php echo get_template_directory_uri(); ?>/assets/images/star_world.png" alt="">
            <div class="wrapper">
                <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>

                <div class="wrapper-info">
                    <?= $this->get_render_attribute_string('sub_content') ?><?= $settings['sub_content'] ?>
                    <div class="qr-code">
                        <img src="<?= $settings['img-qr-code']['url'] ?>" alt="">
                        <p class="text-14-normal scan-code">Scan QR Code to <br> donate today</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-video wrapper">
            <button class="btn-play icon-play">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
            </button>
            <video id="video" src="<?= $settings['video-insight']['url'] ?>" loop></video>
        </div>

        <script>
            var ctrlVideo = document.getElementById("video");

            $('.btn-play').click(function(e) {
                if (ctrlVideo.paused) {
                    ctrlVideo.play();
                    $('.wrapper-video').addClass('playing');
                }
            })

            $('#video').click(function() {
                if (!ctrlVideo.paused) {
                    $('.wrapper-video').removeClass('playing');
                    ctrlVideo.pause();
                }
            })
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
