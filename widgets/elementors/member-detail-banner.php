<?php
class Elementor_MemberDetailBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'MemberDetailBanner';
    }

    public function get_name()
    {
        return 'MemberDetailBanner';
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
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( ' <div class="info-speaker">
                                    <div class="breadcumb">
                                        <a href="#">Home </a>
                                        <div class="slash">/</div>
                                        <a href="#">About us</a>
                                    </div>
                                    <h4 class="name-speaker">Adison Nguyen</h4>
                                    <div class="position">
                                        <img class="thumbnail" src="wp-content/themes/Mplus-OBE/assets/images/location.svg" alt="">
                                        <span>Scottland</span>
                                    </div>  
                                    <div class="description">
                                        <p>
                                            Et mollis quam nunc at cursus elit lacinia. Suspendisse diam congue risus porttitor quis eget elementum senectus magna. Metus eget accumsan adipiscing sed molestie. At sagittis orci, mauris, sit vitae euismod pellentesque. Elementum posuere eget dolor, elementum eget feugiat at ut eget.
                                        </p>
                                        <p>
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                            Diam nunc pretium, commodo consequat at elit volutpat. Purus lectus nunc netus massa elementum. Turpis turpis maecenas lobortis nibh massa consequat blandit cum purus. Mi in aenean eu mattis sit est enim. Diam commodo orci vitae.
                                        </p>
                                    </div>
                                </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'avatar',
            [
                'label' => __( 'Avatar', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="wrapper-member-detail-banner">
            <div class="wrapper-speaker-detail-banner">
                <div class="wrapper">
                    <div class="wrapper-content">
                        <div class="avatar-team">
                        <img class="thumbnail" src="<?= $settings['avatar']['url'] ?>" >
                        </div>
                        <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?>
                    </div>
                </div>
                <div class="gradientback"></div>
            </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}