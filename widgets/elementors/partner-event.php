<?php
class Elementor_PartnerEvent_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'PartnerEvent';
    }

    public function get_name()
    {
        return 'PartnerEvent';
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

        $this->end_controls_section();
    }
    
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-insight-event wrapper-partner-event">
                <div class="wrapper-latest-blog">
                    <div class="wrapper">
                        <div class="content-latest-blog partner-latest">
                            <div class="wrapper-info">
                                <h2 class="main-title">What our clients have to say</h2>
                                <div class="wrapper-action">
                                    <div class="slide-controls">
                                        <button class="btn btn-icon btn-white prev">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                                <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-icon btn-white next">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                                <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-slide">
                                <div class="list-slide" id="blog-slide">
                                    <?php
                                        $args = array(
                                            'post_status'       => 'publish',
                                            'post_type'         => 'testimonial',
                                            'orderby'           => 'date',
                                            'order'             => 'desc',   
                                            'meta_query'  => array(
                                                array(
                                                    'key' => 'type',
                                                    'value' => 'sponsor'
                                                )
                                            ) 
                                        );
                                        $the_query = new WP_Query( $args );
                                        ?>
                                        <?php if( $the_query->have_posts() ): ?>
                                        <?php while( $the_query->have_posts() ) : $the_query->the_post();
                                    ?>
                                    <div class="item-slide">
                                        <div class="wrapper-item">
                                            <img class="wrapper-image-partner"src="<?php echo get_the_post_thumbnail_url(); ?>"></img>
                                            <p class="text-16-normal wrapper-content">
                                                <?php echo get_post_meta(get_the_ID(), 'description', true); ?>
                                            </p>
                                            <div class="wrapper-info-item">
                                                <img class="img-slide" src="<?php echo get_post_meta(get_the_ID(), 'logo', true); ?>" alt="">
                                                <div class="text-16-bold info-right">
                                                    <p><?php the_title() ?></p>
                                                    <p class="text-14-normal"><?php echo get_post_meta(get_the_ID(), 'position', true); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            </div>
                            <div class="wrapper-only-mobile">
                                <div class="wrapper-left">
                                    <ul id="show" />
                                </div>
                                <div class="wrapper-action">
                                    <div class="slide-controls">
                                        <button class="btn btn-icon btn-white prev">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                                <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-icon btn-white next">
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
            var $slickElement = $('#blog-slide');

            var $element = $slickElement.children('.item-slide').length;

            for(var i = 0; i<  $element; i++){
                $('<li><div class="circle"/></li>').appendTo('#show');
            }

            $slickElement.on('init beforeChange', function(event, slick, currentSlide, nextSlide) {
                var wSlide = event.type == 'init' ? 0 :  nextSlide;
                $('#show li div').css("background", "rgba(28, 27, 24, 0.2)");
                $('#show li div').eq(wSlide).css("background", "#FEBF10");
            });
            
            $slickElement.slick({
                // slidesToShow: 2,
                variableWidth: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                infinite: true,
                slidesToScroll: 1,
                draggable: false,
                responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }
             ]
            });
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
