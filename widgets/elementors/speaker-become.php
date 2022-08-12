<?php
class Elementor_SpeakerBecome_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'SpeakerBecome';
    }

    public function get_name()
    {
        return 'SpeakerBecome';
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
                'default' => __('<div class="wrapper-content-left">
                                    <h5>Become Speaker</h5>
                                    <h2>Get your mic drop moment</h2>
                                </div>
                                <div class="wrapper-content-right">
                                    <p class="text-20-light">Breaking boundaries in Open Banking? Built a real-world use case making a difference in people’s lives? Have a thoughtful, expert opinion or insight you’d like to share? Apply to be a speaker and lead the conversation.</p>
                                    <button class="btn-primary">Apply to Speak</button>
                                </div>
                                ', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-speaker-become">
            <div class="wrapper wrapper-content">
                <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
                
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
