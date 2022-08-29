<?php
class Elementor_ConsultancyService_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'ConsultancyService';
    }

    public function get_name()
    {
        return 'ConsultancyService';
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
            'list-content',
            [
                'label' => __('List Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="title-menu">Our OBE campfires are viewed in over 50+ countries</h5>
                                <p class="list-item-menu">
                                    We’re constantly receiving enquiries and being invited to work with banks and organisations 
                                    globally that seek high calibre advice and support in everything from:
                                </p>
                                <a class="btn-primary" href="javascript:void(0)">Apply Now</a>
                                ', 'plugin-name'),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<ul class="list-service">
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Creating strategy that solves problems with effective use cases
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Ideating, designing, building and delivering innovation
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Networking communities to connect the best fit partners
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Data designers and engineers to identify, source and connect the data points required to solve problems
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Leader, developers for agile digital transformation projects
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Tech talent and cultural ways of working for impactful fast delivery
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Practical support on how to commercialise Open Banking
                                    </li>
                                </ul>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-consultancy-content">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="left-container">
                        <div>
                            <?= $this->get_render_attributes('list-content') ?><?= $settings['list-content'] ?>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="content-item-menu" id="item-1">
                            <?= $this->get_render_attributes('content') ?><?= $settings['content'] ?>
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
