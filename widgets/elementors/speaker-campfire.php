<?php
class Elementor_SpeakerCampfire_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'SpeakerCampfire';
    }

    public function get_name()
    {
        return 'SpeakerCampfire';
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
        <div class="wrapper-speaker-campfire">
            <div class="wrapper">
                <div class="wrapper-sponsor">
                    <div class="content-sponsor wrapper">
                        <div class="title-sponsor">
                            Headline sponsors
                        </div>
                        <div class="wrapper-icon">
                        <?php 
                            $args = array(
                                'post_status' => 'publish',
                                'post_type'         => 'sponsor',
                                'orderby'           => 'date',
                                'order'             => 'asc',    
                                'posts_per_page'    => 4,     
                                'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                'meta_value' => 'headline-sponsor',             
                            );
                            $the_query = new WP_Query( $args );
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="icon-sponsor">
                                <a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'>
                                    <img alt='<?php the_title(); ?>' src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true)!='' ?  get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) : get_the_post_thumbnail_url() ?>">
                                </a>
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
                <div class="wrapper-slide-speaker">
                    <div class="wrapper-action">
                        <h5>Speaker</h5>
                        <div class="slide-controls">
                            <button class="btn btn-icon speaker-prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                    <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                </svg>
                            </button>
                            <button class="btn btn-icon btn-slide speaker-next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                    <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="list-slide-speaker-mobile">
                        <?php 
                        $args = array(
                            'post_status' => 'publish',
                            'post_type'         => 'company',
                            'orderby'           => 'date',
                            'order'             => 'asc',    
                            'posts_per_page'    => 24,     
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                        <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="item-slide">
                            <img class="img-item" src="<?php echo  get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
            <div class="list-slide-speaker">
                        <?php 
                        $args = array(
                            'post_status' => 'publish',
                            'post_type'         => 'company',
                            'orderby'           => 'date',
                            'order'             => 'asc',    
                            'posts_per_page'    => 24,     
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                        <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="item-slide">
                            <img class="img-item" src="<?php echo  get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>

        <script>
            $('.list-slide-speaker').slick({
                slidesToShow: 8,
                slidesToScroll: 8,
                arrow: true,
                variableWidth: true,
                prevArrow: $('.speaker-prev'),
                nextArrow: $('.speaker-next'),
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
                cssEase: 'ease-in-out',
                dots: true,
            });

            $('.list-slide-speaker-mobile').slick({
                slidesToScroll: 1,
                variableWidth: true,
                prevArrow: $('.speaker-prev'),
                nextArrow: $('.speaker-next'),
                infinite: true,
            });
        </script>
        <?php
    }

    protected function _content_template() {

    }
}