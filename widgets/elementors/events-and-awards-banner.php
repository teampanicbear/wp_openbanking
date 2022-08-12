<?php
class Elementor_EventsAndAwardsBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'EventsAndAwardsBanner';
    }

    public function get_name()
    {
        return 'EventsAndAwardsBanner';
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
                'default' => __('<h1 class="site-name">Events and Awards</h1>
                                <div class="intro text-20-light ">
                                Vitae consectetur morbi risus semper aliquam. Ut ut nam semper elementum egestas dui metus donec accumsan pulvinar. 
                                </div>', 'plugin-name'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'plugin-name' ),
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
        		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-pr-banner">
            <div class="container">
            </div>
            <div class="wrapper">
                <div class="wrapper-content">
                    <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
                    <div class="thumbnail">
                        <img src="<?= $settings['image']['url'] ?>" alt="">
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
