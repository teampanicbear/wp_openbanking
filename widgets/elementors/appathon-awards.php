<?php
class Elementor_AppathonAwards_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonAwards';
    }

    public function get_name()
    {
        return 'AppathonAwards';
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
            'awards',
            [
                'label' => __( 'Awards', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <ul class="list-service">
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                            Best of Wealth Management
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                            Best of Retail Payments
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                            Best of Lending
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                            Best of Fintech for Good
                                        </li>
                                    </ul>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'prizes',
            [
                'label' => __( 'Prizes', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <ul class="list-service">
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                        Payment and card consulting
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                        Banking as a Service
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                        SCA and security
                                    </li>
                                    <li>
                                        <img src="/wp-content/themes/Mplus-OBE/assets/images/cup.svg" alt="">
                                        Go-to-market strategies
                                    </li>
                                </ul>
                                ', 'plugin-name' ),
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
    <div class="wrapper-appathon-awards">
        <div class="wrapper">
            <div class="wrapper-awards">
                <div class="wrapper-title">
                    <h2 class="title">
                        Awards
                    </h2>
                    <div class="split"></div>
                </div>
                <?= $settings['awards'] ?>
            </div>
            <div class="wrapper-prizes">
                <div class="wrapper-title">
                    <h2 class="title">
                        Prizes
                    </h2>
                    <div class="split"></div>
                </div>
                <?= $settings['prizes'] ?>
            </div>
        </div>
    </div>
<?php
    }

    protected function _content_template()
    {
    }
}
