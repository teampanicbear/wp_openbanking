<?php
class Elementor_BlogDetailContent_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BlogDetailContent';
    }

    public function get_name()
    {
        return 'BlogDetailContent';
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
         
            <div class="wrapper-blog-detail-content">
                <div class="wrapper">
                   <div class="wrapper-blog-detail">
                       <div class="wrapper-blog-detail-content">
                           <div class="text-16-normal blog-detail-content">
                               <?php 
                                   $args = array(
                                       'posts_per_page' => 10,
                                       'post_type'   => 'post',
                                       'post_status' => 'publish'
                                   );
                                   $the_query = new WP_Query( $args );
                                   ?>
                                   <?php if( $the_query->have_posts() ): ?>
                                   <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                       <?php the_excerpt(); ?>
                                   <?php endwhile; ?>
                                   <?php endif; ?>
                               <?php wp_reset_query(); ?>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}