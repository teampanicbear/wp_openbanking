
<?php
class Elementor_Banner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Hero Banner';
    }

    public function get_name()
    {
        return 'Hero Banner';
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
            'img-thumbnail',
            [
                'label' => __( 'Image thumbnail', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'video-home-banner',
            [
                'label' => __( 'Video', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'video',
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h5 class="demo-text-banner --reveal" data-splitting>The Global Community</h5>
                                    <h1 class="main-text-banner --reveal" data-splitting>For Open Banking and Finance Pioneers.</h1>
                                    <div class="sub-text-banner text-20-light --fade-in">The place to maximise your growth and magnify your brand value.</div>
                                    <div class="wrapper-navi-banner">
                                        <div class="item-navi-banner">collaborate</div>
                                        <div class="split"></div>
                                        <div class="item-navi-banner">learn</div>
                                        <div class="split"></div>
                                        <div class="item-navi-banner">innovate</div>
                                    </div>
                                    <div class="wrapper-btn">
                                        <a href="/contact-us" class="btn btn-primary">Join Our Community</a>
                                    </div>
                                    ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-banner schero home-banner">
            <div class="overlay"></div>
            <img class="wrapper-image" src="<?= $settings['wrapper-image']['url'] ?>"></img>
            <video class="video-thumbnail" src="<?= $settings['video-home-banner']['url'] ?>" autoplay muted loop></video>
            <img class="img-thumbnail" src="<?= $settings['img-thumbnail']['url'] ?>"></img>
            <div class="wrapper">
                <div class="wrapper-content-banner">
                    <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                </div>
            </div>
        </div>

        <script>
            // var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
            var ua = navigator.userAgent.toLowerCase(); 
            if (ua.indexOf('safari') != -1) { 
            if (ua.indexOf('chrome') > -1) {
                isSafari = false;
            } else {
                isSafari = true;
            }
            }
            if(isSafari) {
                $('.video-thumbnail').css('display', 'none');
                $('.img-thumbnail').css('display', 'block');
            } else {
                $('.img-thumbnail').css('display', 'none');
            }

        </script>
        <?php
    }

    protected function _content_template() {

    }
}