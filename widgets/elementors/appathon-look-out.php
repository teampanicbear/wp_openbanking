<?php
class Elementor_AppathonLookOut_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonLookOut';
    }

    public function get_name()
    {
        return 'AppathonLookOut';
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
        //     'content',
        //     [
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '
                                    <h3 class="title">What the judges are on the <br> look-out for</h3>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-item-1',
            [
                'label' => __( 'Title item 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Business value', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-item-1',
            [
                'label' => __( 'Image item 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-item-1',
            [
                'label' => __( 'Content item 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="content">
                                        Scale of potential business and innovative business models.
                                    </p>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-item-2',
            [
                'label' => __( 'Title item 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Technology innovation', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-item-2',
            [
                'label' => __( 'Image item 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-item-2',
            [
                'label' => __( 'Content item 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="content">
                                        Use of innovative technology, AI/machine learning and use of APIs.
                                    </p>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-item-3',
            [
                'label' => __( 'Title item 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Market potential', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-item-3',
            [
                'label' => __( 'Image item 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-item-3',
            [
                'label' => __( 'Content item 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="content">
                                        Time to market and product readiness.
                                    </p>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-item-4',
            [
                'label' => __( 'Title item 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Relevance to category', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-item-4',
            [
                'label' => __( 'Image item 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-item-4',
            [
                'label' => __( 'Content item 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="content">
                                        Ability to solve a challenge and pain point. 
                                    </p>
                                ', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'title-item-5',
            [
                'label' => __( 'Title item 5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fintech for good', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-item-5',
            [
                'label' => __( 'Image item 5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-item-5',
            [
                'label' => __( 'Content item 5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="content">
                                        Impact on the financially underserved and/or the planet. 
                                    </p>
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
    <div class="wrapper-appathon-look-out">
        <div class="wrapper">
            <?= $settings['title'] ?>
            <div class="list-item-look-out minus-m16-lr">
                <div class="item-look-out m16-lr">
                    <img class="line" src="<?= $settings['img-item-1']['url'] ?>" alt="">
                    <h6 class="title-item"><?= $settings['title-item-1'] ?></h6>
                    <?= $settings['content-item-1'] ?>
                </div>
                <div class="item-look-out m16-lr">
                    <img class="line" src="<?= $settings['img-item-2']['url'] ?>" alt="">
                    <h6 class="title-item"><?= $settings['title-item-2'] ?></h6>
                    <?= $settings['content-item-2'] ?>
                </div>
                <div class="item-look-out m16-lr">
                    <img class="line" src="<?= $settings['img-item-3']['url'] ?>" alt="">
                    <h6 class="title-item"><?= $settings['title-item-3'] ?></h6>
                    <?= $settings['content-item-3'] ?>
                </div>
                <div class="item-look-out m16-lr">
                    <img class="line" src="<?= $settings['img-item-4']['url'] ?>" alt="">
                    <h6 class="title-item"><?= $settings['title-item-4'] ?></h6>
                    <?= $settings['content-item-4'] ?>
                </div>
                <div class="item-look-out m16-lr">
                    <img class="line" src="<?= $settings['img-item-5']['url'] ?>" alt="">
                    <h6 class="title-item"><?= $settings['title-item-5'] ?></h6>
                    <?= $settings['content-item-5'] ?>
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
