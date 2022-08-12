<?php
class Elementor_Benefit_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Home Benefit';
    }

    public function get_name()
    {
        return 'Home Benefit';
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
            'main',
            [
                'label' => __( 'Main', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h1 class="title-invitations --reveal --trigger" data-splitting>Let be a part <br> of our community</h1>
                                    <h1 class="title-invitations-mobile">Let be a part of <br> our community</h1>
                                    <div class="content-invitations text-20-light --fade-in">
                                        At <b>Open Banking Excellence</b> we understand the frustration of having to attend 
                                        hundreds of events to build an Open Banking network, find relevant partners or 
                                        hunt down a variety of content to keep informed and inspired. 
                                        This is why we started the OBE community and platform, so all of your needs 
                                        could be met in one place.
                                    </div>
                                    <div class="content-invitations-mobile text-20-light">
                                        At Open Banking Excellence we understand the frustration of having to 
                                        attend hundreds of events to build an Open Banking network, find relevant 
                                        partners or hunt down a variety of content to keep informed and inspired. 
                                        This is why we started the OBE community and platform, so all of your 
                                        needs could be met in one place. 
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-block1',
            [
                'label' => __( 'Image block 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block1',
            [
                'label' => __( 'Block 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="name-benefit text-16-bold">Supported by Open <br> Banking leaders </div>
                                    <div class="name-benefit-mobile text-16-bold">Supported by Open Banking leaders </div>
                                    <div class="content-benefit text-16-normal">
                                        In the past year of hosting our Campfires, and more recently in the launch of our blog, 
                                        we’ve had over 100 Open Banking, Finance and Data experts speak and write on the most red-hot 
                                        relevant topics, from Ron Kalifa to the World Bank.</div>
                                    <div class="navi-benefit">
                                        <a href="#" class="link">See Speakers</a>
                                        <div class="wrapper-img">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                        </div>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-block2',
            [
                'label' => __( 'Image block 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block2',
            [
                'label' => __( 'Block 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( "
                <div class='name-benefit text-16-bold'>Where your voice <br> is heard</div>
                <div class='name-benefit-mobile text-16-bold'>Where your voice is heard</div>
                <div class='content-benefit text-16-normal'>This is the place where you can share your innovations, 
                    challenges and lightbulb moments with peers or potential partners. We've got your back.
                </div>
                <div class='navi-benefit'>
                    <a href='#' class='link'>Get involved</a>
                    <div class='wrapper-img'>
                        <img src='wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg' alt=''>
                    </div>
                </div>
            ", 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-block3',
            [
                'label' => __( 'Image block 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'block3',
            [
                'label' => __( 'Blog 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="name-benefit text-16-bold">Truly Global</div>
                                    <div class="name-benefit-mobile text-16-bold">Truly Global</div>
                                    <div class="content-benefit text-16-normal">In the space of three years, 
                                    we’ve grown from 30 fintechs passionate about Open Banking and meeting over pizza and beer, 
                                    to over 10,000 individuals in 40+ countries. You’re in good company.</div>
                                    <div class="navi-benefit">
                                        <a href="#" class="link">Attend a Campfire</a>
                                        <div class="wrapper-img">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                        </div>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'main', 'advanced' );
        $this->add_inline_editing_attributes( 'block1', 'advanced' );
        $this->add_inline_editing_attributes( 'block2', 'advanced' );
        $this->add_inline_editing_attributes( 'block3', 'advanced' );
        ?>
        <div class="wrapper-benefit wrapper schero">
            <div class="title-benefit">
                Benefits.
            </div>
            <div class="wrapper-content-benefit">
                <div class="invitations">
                    <div <?= $this->get_render_attribute_string( 'main' ) ?>><?= $settings['main'] ?></div>
                </div>
                <div class="list-benefit --fade-in">
                    <div class="item-benefit">
                        <div class="wrapper-icon-benefit">
                            <img src="<?= $settings['img-block1']['url'] ?>" alt="">
                        </div>
                        <div <?= $this->get_render_attribute_string( 'block1' ) ?>><?= $settings['block1'] ?></div>
                    </div>
                    <div class="item-benefit">
                        <div class="wrapper-icon-benefit">
                            <img src="<?= $settings['img-block2']['url'] ?>" alt="">
                        </div>
                        <div <?= $this->get_render_attribute_string( 'block2' ) ?>><?= $settings['block2'] ?></div>
                    </div>
                    <div class="item-benefit">
                        <div class="wrapper-icon-benefit">
                            <img src="<?= $settings['img-block3']['url'] ?>" alt="">
                        </div>
                        <div <?= $this->get_render_attribute_string( 'block3' ) ?>><?= $settings['block3'] ?></div>
                    </div>
                </div>
                <div class="star-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star_benefit.svg" alt="">
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}