<?php
class Elementor_PRServiceConsultant_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PRServiceConsultant';
    }

    public function get_name()
    {
        return 'PRServiceConsultant';
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
            'consultant',
            [
                'label' => __( 'Consultant', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="intro">
                                    <div class="content-title text-20-light">
                                    The number of fintech companies since 2018 to 2020 has exploded from 12k to over 21k globally, with EMEA alone seeing over 50% growth. 
                                    </div>
                                    <div class="content text-16-normal">
                                        The global Open Banking market is expected to reach over $43b in the next 5 years, growing at a CAGR of nearly 25% from 2019 to 2026 (Allied Market Research, Nov 2020).  <br>
                                        <p></p>
                                        There’s no time for complacency with an estimated $416b in revenue at stake as an Open Finance and Data wave arrives . <br>
                                        <p></p>
                                    </div>
                                    <button class="btn-primary btn-pr">Get in touch</button>
                                </div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'prizes',
            [
                'label' => __( 'Prizes', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '  <ul class="list-service">
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Payment and card consulting
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Banking as a Service
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            SCA and security
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Go-to-market strategies
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Define business models for fintech
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            RTS (Regulatory Technical Standards)
                                        </li>
                                        <li>
                                            <img src="/wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Embedded Finance
                                        </li>
                                    </ul>
                                    <button class="btn-primary btn-pr-mobile">Get in touch</button>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'banner-image',
            [
                'label' => __('Banner image consultant', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'title-consultant',
            [
                'label' => __( 'Title consultant', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Consultancy', 'plugin-name' ),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-pr-consultant">
                <div class="container">
                    <div class="wrapper-banner-pr">
                        <h1 class="title"><?= $settings['title-consultant'] ?></h1>
                        <div class="banner-pr-consultant">
                            <img src="<?= $settings['banner-image']['url'] ?>" alt="">
                        </div>
                    </div>
                    <div class="wrapper-content wrapper">
                        <div class="wrapper-intro-pr">
                            <?= $this->get_render_attributes('consultant') ?><?= $settings['consultant'] ?>
                        </div>
                        <?= $settings['prizes'] ?>
                       
                    </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}