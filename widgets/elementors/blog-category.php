<?php
class Elementor_BlogCategory_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BlogCategory';
    }

    public function get_name()
    {
        return 'BlogCategory';
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
        //     [
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
            <div class="wrapper-blog-category">
                <div class="wrapper">
                    <div class="wrapper-title">
                        <h3 class="title">Category</h3>
                        <!-- <div class="split"></div> -->
                        <div class="slide-controls">
                            <button class="btn btn-icon btn-white prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                    <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                </svg>
                            </button>
                            <button class="btn btn-icon btn-white next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                    <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-container minus-m16-lr">
                        <?php
                            $args = array(
                                'type'      => 'post',
                                'number'    => 20,
                                'parent'    => 0
                            );
                            $slug = array("events-and-awards","news-stories-and-press-releases");
                            $categories = get_categories( $args );
                            foreach ( $categories as $category ) {
                                  if (!in_array($category->slug,$slug)){
                                    $icon_id = get_term_meta( $category->term_id, 'pix_term_icon', true );
                                    $src_icon = wp_get_attachment_url( $icon_id);
                            ?>
                            <a href="<?= get_category_link($category) ?>">
                                <div class="item-switcher m16-lr flex-1">
                                    <div class="icon">
                                        <img src="<?= $src_icon ?>" alt="<?= $category->name ?>"/>
<!--                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                            <g clip-path="url(#clip0)">-->
<!--                                            <path d="M16 1L1 9V13H31V9L16 1Z" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M4 24V16" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M12 24V16" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M20 24V16" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M28 24V16" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M16 10C17.1046 10 18 9.10457 18 8C18 6.89543 17.1046 6 16 6C14.8954 6 14 6.89543 14 8C14 9.10457 14.8954 10 16 10Z" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            <path d="M31 27H1V31H31V27Z" stroke="#212121" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>-->
<!--                                            </g>-->
<!--                                            <defs>-->
<!--                                            <clipPath id="clip0">-->
<!--                                            <rect width="32" height="32" fill="white"/>-->
<!--                                            </clipPath>-->
<!--                                            </defs>-->
<!--                                        </svg>-->
                                    </div>
                                    <div class="title"><?php echo $category->name ; ?></div>
                                </div>
                            </a>
                        <?php }} ?>
                    </div>
                </div>
            </div>

            <script>
                $('.card-container').slick({
                    infinite: true,
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    prevArrow: false,
                    nextArrow: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    prevArrow: $(".prev"),
                    nextArrow: $(".next"),
                    dots: true,
                    responsive: [
                        {
                            breakpoint: 1360,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                variableWidth: true,
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            }
                        },
                    ]
                });
            </script>
        <?php
    }

    protected function _content_template() {

    }
}