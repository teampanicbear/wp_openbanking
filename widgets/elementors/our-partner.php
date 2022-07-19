<?php
class Elementor_OurPartner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'OurPartner';
    }

    public function get_name()
    {
        return 'OurPartner';
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
                'default' => __( '
                                    <div class="title">
                                        <h2 class="--reveal">Our <br> Partners</h2>
                                    </div>
                                    <div class="title-mobile">
                                        <h2>Our Partners</h2>
                                    </div>
                                    <p class="text-20-light --fade-in">Together, we take Open Banking forward through brand awareness, earned media and thought leadership.</p>
                                    <a class="btn btn-primary" href="#">Get Involved</a>
                                ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper partner-card-container schero">
            <div class="partner-container">
                <div class="partner-card">
                    <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                </div>
            </div>
        </div>
        <div class="sponsor-container">
            <div class="wrapper">
                <div class="partner-content">
                    <div class="wrapper-pop-up">
                        <div class="my-pop-up">
                            <img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
                            <h5></h5>
                            <p class="text-16-normal"></p>
                            <div class="arrow-action">
                                <a href="<?php echo get_site_url(); ?>/sponsor-detail" class="link">See more details</a>
                                <div class="wrapper-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="headline-contaner">
                        <div class="headline-sponsors sponsor-card">
                            <div class="sponsor-title text-16-bold">Headline sponsors</div>
                            <div class="sponsor-content">
                                <!-- loop here -->
                                <?php 
                                    $args = array(
                                        'post_status' => 'publish',
                                        'post_type'         => 'sponsor',
                                        'orderby'           => 'date',
                                        'order'             => 'asc',    
                                        'posts_per_page'    => 3,     
                                        'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                        'meta_value' => 'headline-sponsor',             
                                    );
                                    $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="sponsor-avatar" data-tooltip="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                </a>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="community-sponsors sponsor-card">
                        <div class="sponsor-title text-16-bold">Community sponsors</div>
                        <div class="sponsor-content">
                            <!-- loop here -->
                            <?php 
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type'         => 'sponsor',
                                    'orderby'           => 'date',
                                    'order'             => 'asc',    
                                    'posts_per_page'    => -1,     
                                    'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                    'meta_value' => 'community-sponsor',             
                                );
                                $the_query = new WP_Query( $args );
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>            
                            <a href="<?php the_permalink(); ?>" class="sponsor-avatar" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>"
                            data-tooltip="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                            </a> 
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>       
                        </div>
                    </div>
                    <div class="headline-contaner-mobile">
                        <div class="headline-sponsors sponsor-card-mobile">
                            <div class="sponsor-title text-16-bold">Headline sponsors</div>
                            <div class="sponsor-content">
                                <!-- loop here -->
                                <?php 
                                    $args = array(
                                        'post_status' => 'publish',
                                        'post_type'         => 'sponsor',
                                        'orderby'           => 'date',
                                        'order'             => 'asc',    
                                        'posts_per_page'    => 3,     
                                        'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                        'meta_value' => 'headline-sponsor',             
                                    );
                                    $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="sponsor-avatar" data-src="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                           
                            </div>
                        </div>
                    </div>
                    <div class="community-sponsors-mobile sponsor-card-mobile">
                        <div class="sponsor-title text-16-bold">Community sponsors</div>
                        <div class="sponsor-content">
                            <!-- loop here -->
                            <?php 
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type'         => 'sponsor',
                                    'orderby'           => 'date',
                                    'order'             => 'asc',    
                                    'posts_per_page'    => -1,     
                                    'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                    'meta_value' => 'community-sponsor',             
                                );
                                $the_query = new WP_Query( $args );
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="sponsor-avatar" data-src="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            if($(window).innerWidth() <= 768) {
                $('.sponsor-avatar').click(function() {
                    $('.wrapper-pop-up').css('display', 'block');
                    $('.my-pop-up h5').text($(this).data('title'));
                    $('.my-pop-up p').text($(this).data('content'));
                    $('.my-pop-up .link').attr('href',$(this).data('src'));
                });

                $('.wrapper-pop-up .close-pop-up').click(function() {
                    $('.wrapper-pop-up').css('display', 'none');
                })
                $('.icon-header-mobile').click(function(){
                	$(".sponsor-avatar .wrapper-pop-up").css("display", "flex");
                });

                $(window).click(function(event) {
                    if (event.target.className == 'wrapper-pop-up') {
                        $('.wrapper-pop-up').css('display', 'none');
                    }
                });
            }
        </script>
        <?php
    }

    protected function _content_template() {

    }
}