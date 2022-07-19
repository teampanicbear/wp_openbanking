<?php
class Elementor_PRServiceBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'PRServiceBanner';
    }

    public function get_name()
    {
        return 'PRServiceBanner';
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
            'pr-service',
            [
                'label' => __('PR Service', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h1 class="site-name">PR Service</h1>
                                <div class="intro text-20-light ">
                                 Our aim is to keep you red-hot relevant and build your brand. We’re at the heart of the Open Finance community, giving us an edge when it comes to positioning you as a leader in the sector. How do we do that?
                                </div>', 'plugin-name'),
            ]
        );
        $this->add_control(
            'banner-image',
            [
                'label' => __('Image slider 1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'banner-image-1',
            [
                'label' => __('Image slider 2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'banner-image-2',
            [
                'label' => __('Image slider 3', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'img-thumbnail',
            [
                'label' => __('Background pr service', 'plugin-name'),
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
        <div class="wrapper-pr-banner">
            <div class="container" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url('<?= $settings['img-thumbnail']['url'] ?>') no-repeat center center;">
            </div>
            <div class="wrapper">
                <div class="wrapper-content">
                    <?= $this->get_render_attribute_string('pr-service') ?><?= $settings['pr-service'] ?>

                    <div class="slider single-item">
                        <div class="thumbnail">
                            <img src="<?= $settings['banner-image']['url'] ?>" alt="">
                        </div>
                        <div class="thumbnail">
                            <img src="<?= $settings['banner-image-1']['url'] ?>" alt="">
                        </div>
                        <div class="thumbnail">
                            <img src="<?= $settings['banner-image-2']['url'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // todo move to site
            var $slickElementPr = $('.wrapper-pr-banner .single-item'); // $('.slide-testimonial-container');
            $slickElementPr.slick({
                slidesToShow: 1,
                infinite: true,
                dots: true,
                arrows: false,

            });
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
