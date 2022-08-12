<?php
class Elementor_BlogDetailBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BlogDetailBanner';
    }

    public function get_name()
    {
        return 'BlogDetailBanner';
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

        // $this->add_control(
        //     'content',
        //     [a
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-blog-detail-banner">
                <div class="wrapper">
                   <div class="wrapper-detail-banner-content">
                       <div class="wrapper-banner-logo">
                           <img class="banner-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_banner.png" alt="" />
                       </div>
                        <div class="banner-show">
                            <span> 
                                <a href="#" class="link sign-link">
                                    Home
                                </a>
                                /
                                <a href="#" class="link sign-link">
                                    Blog
                                </a>
                                /
                                <a href="#" class="link sign-link">
                                    Open Finance: Around the world
                                </a>
                            </span>
                            <h4> 
                                Fork of PancakeBunny on Polygon — QuickDuck.finance.
                            </h4>
                            <hr />
                            <div class="banner-show-info">
                                <div class="info-left text-16-normal">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_people.svg" alt="" />
                                    <a href="#" class="link sign-link">Adison Nguyen</a>
                                </div>
                                <div class="info-right text-16-normal">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_stopwatch.svg" alt="" />
                                    <a href="#" class="link sign-link">15:00 - 10 Otc 2021</a>
                                </div>
                            </div>
                            <hr />
                        </div>
                   </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}