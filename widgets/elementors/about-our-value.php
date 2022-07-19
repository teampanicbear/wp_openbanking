<?php
class Elementor_AboutOurValue_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AboutOurValue';
    }

    public function get_name()
    {
        return 'AboutOurValue';
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

        // $this->add_control(
        //     'detail',
        //     [
        //         'label' => __('Detail', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __(
        //             '<p>Our values represent who we are and what we stand for - it’s what unites us as a team and are the principles we live by when working with our community and partners.</p>',
        //             'plugin-name'
        //         ),
        //     ]
        // );

        $this->add_control(
            'content-1',
            [
                'label' => __('Content-1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(
                    '
                        <h6>Red hot relevance</h6>
                        <ul>
                            <li>Always on message</li>
                            <li>Business-critical</li>
                            <li>Leading the change within our sector</li>
                            <li>We are the go-to platform for information and expertise</li>
                        </ul>',
                    'plugin-name'
                ),
            ]
        );
        $this->add_control(
            'content-2',
            [
                'label' => __('Content-2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(
                    '
                        <h6>All in</h6>
                        <ul>
                            <li>Inclusive</li>
                            <li>Committed, focused and responsible</li>
                            <li>Empowered</li>
                            <li>We always deliver</li>
                        </ul>',
                    'plugin-name'
                ),
            ]
        );
        $this->add_control(
            'content-3',
            [
                'label' => __('Content-3', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(
                    '
                        <h6>Authenticity</h6>
                        <ul>
                            <li>Trustworthy</li>
                            <li>Mindful and thoughtful</li>
                            <li>We facilitate an environment with fun and laughter</li>
                            <li>There is purpose in everything we do</li>
                        </ul>',
                    'plugin-name'
                ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-our-value">
            <div class="wrapper">
                <h2>Our Values</h2>
                <div class="card-container flex minus-m16-lr">
                    <div class="border-card m16-lr">
                        <img class="value-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/red_hot_relevance.svg" alt="">
                        <?= $this->get_render_attribute_string('content-1') ?><?= $settings['content-1'] ?>
                    </div>
                    <div class="border-card m16-lr">
                        <img class="value-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/all_in.svg" alt="">
                        <?= $this->get_render_attribute_string('content-2') ?><?= $settings['content-2'] ?>
                    </div>
                    <div class="border-card m16-lr">
                        <img class="value-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/authenticity.svg" alt="">
                        <?= $this->get_render_attribute_string('content-3') ?><?= $settings['content-3'] ?>
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
