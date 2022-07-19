<?php
class Elementor_AppathonRules_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonRules';
    }

    public function get_name()
    {
        return 'AppathonRules';
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
            'img-rule-banner-mobile',
            [
                'label' => __( 'Image rule banner mobile', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'img-rule-banner',
            [
                'label' => __( 'Image rule banner', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-rule',
            [
                'label' => __( 'Content rule', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="sub-title">Participants must submit a solution that:</div>
                                    <ul class="list-service">
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Aligns to one of the challenge areas.
                                        </li>
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Makes use of at least one APIs from Railsbank, Plaid or Yolt Technology Services and 
                                            demonstrates the integrated solution.
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            By using the API, entrants should be able to articulate the additional value they are 
                                            able to offer to their customers and/or to themselves. For example: a more seamless 
                                            customer experience, one stop shops for customers, extension to product 
                                            functionality/platform, market reach and penetration.
                                        </li>
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Serves the UK and/or European market (it can also be a global solution).
                                        </li>
                                    </ul>
                                    <button class="btn-primary">Register your interest</button>
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
    <div class="wrapper-appathon-rule">
        <div class="wrapper flex">
			<div class="wrapper-content">
                <h3 class="title">What are the rules?</h3>
                <img class="rule-banner-mobile" src="<?= $settings['img-rule-banner-mobile']['url'] ?>" alt="">
                <?= $settings['content-rule'] ?>
            </div>
			<img class="rule-banner" src="<?= $settings['img-rule-banner']['url'] ?>" alt="">
        </div>
    </div>  
<?php
    }

    protected function _content_template()
    {
    }
}
