<?php
class Elementor_BlogPopular_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BlogPopular';
    }

    public function get_name()
    {
        return 'BlogPopular';
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
        $slugs = array("events-and-awards","news-stories-and-press-releases");
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-blog-popular wrapper">
                <div class="wrapper-logo">
                    <img class="blog-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_logo.svg" alt="">
                </div>
                <div class="wrapper-content">
                    <?php 
                        $args = array(
                            'post_type'   => 'post',
                            'post_status' => 'publish'
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                        <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                                if (!in_array(get_the_category()[0]->slug,$slugs)){
                        ?>
                            <div class="primary-video">
                                <div class="thumbnail-box">
                                    <div class="thumbnail" style="background: url(<?= get_the_post_thumbnail_url() ?>)">
                                        <a href="<?php the_permalink(); ?>" class="on-click-link"></a>
                                        <!-- <a href="#" target="blank" class="btn btn-primary">Register to join</a> -->
                                    </div>
                                </div>
                                <div class="info-video-primary">
                                    <div class="date">
                                        <h4><?php the_date('d'); ?></h4><?php the_time('M'); ?>, <?php the_time('Y'); ?>
                                    </div>
                                    <div class="detail">
                                        <div class="time">
                                            <div class="wrapper-item-time">
                                                <img class="article" src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                <div class="author-slide">
                                                    <?php   the_category(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="title text-20-bold"><?php the_title(); ?>.</a>
                                    </div>
                                </div>
                            </div>
                        <?php break;}  endwhile; ?>
                        <?php endif; ?>
                    <?php wp_reset_query(); ?>
                
                    
                    <div class="list-upcoming-video">
                        <div class="title-upcoming">
                            <h6>Popular</h6>
                            <!-- <div class="arrow-action">
                                <a href="#" class="link">See more</a>
                                <div class="wrapper-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                                </div>
                            </div> -->
                        </div>
                        <?php 
                        $args = array(
                            'meta_key'  => 'wp_post_views_count', // set custom meta key
                            'orderby'    => 'meta_value_num',
                            'order'      => 'DESC',
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                        <?php if( $the_query->have_posts() ):  $count = 0;?>
                            <?php while( $the_query->have_posts() && $count<4 ) : $the_query->the_post();
                             if (!in_array(get_the_category()[0]->slug,$slugs)){ 
                            ?>
                            <div class="item-video">
                                <div class='item-img'>
                                    <a href="<?php the_permalink(); ?>" class="">
                                        <img class="thumbnail-item" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                    <a>
                                </div>
                                <div class="info-video">
                                    <a href="<?php the_permalink(); ?>" class="title-video text-16-bold"><?php the_title(); ?></a>
                                    <div class="date-time">
                                        <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                        <div class="wrapper-cate">
                                            <?php the_category(','); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $count=$count+1; }
                                endwhile; ?>
                            <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}