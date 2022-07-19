<?php
class Elementor_BlogNewsLetter_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'BlogNewsLetter';
    }

    public function get_name()
    {
        return 'BlogNewsLetter';
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
                'default' => __('<div class="wrapper-content">
                <div class="wrapper-title">
                    <h5 class="title">Subscribe to our news letter</h5>
                    <p class="content">Malesuada dictumst nisl, id scelerisque quis tincidunt vulputate a</p>
                </div>
                <div class="form-control-input pb10">
                    <a href="/newsletter-enquiries" class="btn-primary">Subcribe</a>
                </div>
            </div>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-blog-news-letter wrapper">
            <?= $settings['content'] ?>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
