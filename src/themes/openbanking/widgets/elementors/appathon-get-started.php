<?php
class Elementor_AppathonGetStarted_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonGetStarted';
    }

    public function get_name()
    {
        return 'AppathonGetStarted';
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
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="wrapper flex">
                                    <div class="wrapper-title">
                                        <h3 class="title">Get started in <br> just 3 easy steps</h3>
                                        <button class="btn-primary">Get Started now</button>
                                    </div>
                                    <div class="wrapper-step">
                                        <div class="item-step">
                                            <img class="line-mobile"  src="wp-content/themes/Mplus-OBE/assets/images/line_vertical.svg" alt="">
                                            <div class="content-item">
                                                <h3>
                                                    01 
                                                    <img class="line"  src="wp-content/themes/Mplus-OBE/assets/images/line.svg" alt="">
                                                </h3>
                                                <p>Explore the APIs and get developer access</p>
                                                <div class="arrow-action">
                                                    <a href="#" class=" link">Developer access</a>
                                                    <div class="wrapper-img">
                                                        <img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-step">
                                            <img class="line-mobile"  src="wp-content/themes/Mplus-OBE/assets/images/line_vertical.svg" alt="">
                                            <div class="content-item">
                                                <h3>
                                                    02
                                                    <img class="line" src="wp-content/themes/Mplus-OBE/assets/images/line.svg" alt="">
                                                </h3>
                                                <p>Build your solution</p>
                                                <div class="arrow-action">
                                                    <a href="#" class=" link">Watch API Deep Dives</a>
                                                    <div class="wrapper-img">
                                                        <img  src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-step">
                                            <div class="content-item">
                                                <h3>
                                                    03
                                                </h3>
                                                <p>Submit your solution</p>
                                                <div class="arrow-action">
                                                    <a href="#" class=" link">Register and Submit</a>
                                                    <div class="wrapper-img">
                                                        <img  src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <div class="wrapper-appathon-get-started">
        <?= $settings['content'] ?>
    </div>
<?php
    }

    protected function _content_template()
    {
    }
}
