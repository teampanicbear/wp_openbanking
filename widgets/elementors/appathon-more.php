<?php
class Elementor_AppathonMore_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonMore';
    }

    public function get_name()
    {
        return 'AppathonMore';
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
            'img',
            [
                'label' => __( 'Image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h3 class="title">Want to know more <br> about Open Finance?</h3>
                                    <h3 class="title-mobile">Want to know more about Open Finance?</h3>
                                    <button class="btn-primary">Download our-e-book for FREE</button>
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
    <div class="wrapper-appathon-more">
        <div class="wrapper wrapper-content">
            <?= $settings['content'] ?>
			<img class="appathon-more" src="<?= $settings['img']['url'] ?>" alt="">
        </div>
    </div>  
<?php
    }

    protected function _content_template()
    {
    }
}
