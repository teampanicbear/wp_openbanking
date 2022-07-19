<?php
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Testimonial';
    }

    public function get_name()
    {
        return 'Testimonial';
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
                                    <h2 class="title-testimonial --reveal">Sweet love <br> from our <br> Community</h2>
                                    <h2 class="title-testimonial-mobile">Sweet love from our Community</h2>
                                    <div class="sub-title text-20-light --fade-in">What OBE’s partners, sponsors and members have to say about us.</div>
                                ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-testimonial schero">
            <div class="wrapper">
                <div class="heading">Testimonials</div>
                <div class="wrapper-info">
                    <div class="intro">
                        <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                    </div>
                    <div class="content">
                        <div class="banner-content --fade-in" id="banner-content">
                            <h5></h5>
                        </div>
                        <div class="wrapper-slide">
                            <div class="wrapper-action">
                                <div class="slide-controls">
                                    <button class="btn btn-icon btn-white testimonial-prev">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-icon btn-white testimonial-next">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div id="slide-testimonial" class="slide-testimonial-container">
                                <?php 
                                    $args = array(
                                        'post_status' => 'publish',
                                        'post_type'         => 'testimonial',
                                        'orderby'           => 'date',
                                        'order'             => 'desc',    
                                        'posts_per_page'    => -1,     
                                    );
                                    $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <div class="slide-testimonial" data-content="<?php echo get_post_meta(get_the_ID(), 'description', true) ?>">
                                    <div class='slide-testimonial-active'>    
                                    <div class="logo-slide" style="background-image: linear-gradient(0deg, #FEBF10, #FEBF10),  url(<?php echo get_post_meta(get_the_ID(), 'logo', true) ?>)">
                                        </div>
                                        <div class="content-slide">
                                            <div class="name-testimonial text-20-bold"><?php the_title(); ?></div>
                                            <div class="position-testimonial text-12-normal"><?php echo get_post_meta(get_the_ID(), 'position', true) ?></div>
                                            <img class="badge-testimonial" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                        </div>
                                    </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                            <div class="wrapper-action-mobile">
                                <div class="slide-controls">
                                    <button class="btn btn-icon testimonial-prev btn-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-icon btn-slide testimonial-next btn-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // todo move to site
            var $slickElement1 = $('#slide-testimonial');// $('.slide-testimonial-container');

            $slickElement1.on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide){
                if(nextSlide == undefined) {
                    nextSlide = 0;
                };
                
                var item = $($(slick.$slides)[nextSlide]);

                $("#banner-content h5").addClass('hide');

                setTimeout(function () {
                    $("#banner-content h5").removeClass('hide');
                    $('#banner-content h5').text(item.data('content'));
                }, 300);

            });

            $slickElement1.slick({
                slidesToShow: 1,
                prevArrow: $('.testimonial-prev'),
                nextArrow: $('.testimonial-next'),
                infinite: true,
                slidesToScroll: 1,
                fade: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
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