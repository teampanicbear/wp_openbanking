<?php
class Elementor_AppathonWinner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonWinner';
    }

    public function get_name()
    {
        return 'AppathonWinner';
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
            'tilte',
            [
                'label' => __( 'Tilte', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( ' 
                                    <h2 class="title">Hear from <br> last year’s <br> winners</h2>
                                    <h2 class="title-mobile">Hear from last <br> year’s winners</h2>
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
    <div class="wrapper-appathon-winner">
        <div class="wrapper flex">
            <div class="wrapper-content">
                <?= $settings['title'] ?>
                <div class="content"></div>
            </div>
            <div class="slide-video">
                <div class="list-video">
                <?php
                    $args = array(
                        'post_status'       => 'publish',
                        'post_type'         => 'appathon',
                        'orderby'           => 'date',
                        'order'             => 'desc',    
                    );
                    $the_query = new WP_Query( $args );
                    ?>
                    <?php if( $the_query->have_posts() ): ?>
                    <?php while( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    
                    <div class="video-winner" data-content="<?php echo get_post_meta(get_the_ID(),'advanced_options_appathon_description',true)?>" data-title="<?php the_title() ?>" 
                    style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(<?php echo  get_post_meta(get_the_ID(),'advanced_options_appathon_poster-video',true)?>);">
                        <a ndata-fancybox="video" id="single_image" href="#" data-src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_appathon_video', true) ?>">
                            <button class="btn-play icon-play">
                                <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                            </button>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
                <div class="wrapper-title flex">
                    <div class="title-video"></div>
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
            </div>
        </div>
    </div>

    <script>
        var $listVideo = $('.list-video');

        $listVideo.on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide){
            if(nextSlide == undefined) {
                nextSlide = 0;
            };
            
            var item = $($(slick.$slides)[nextSlide]);

            $('.title-video').text(item.data('title'));
            $('.wrapper-content .content').text(item.data('content'));
        });

        $listVideo.slick({
            slidesToShow: 1,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            infinite: true,
            slidesToScroll: 1,
            fade: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                }
            },
            ]
        });
    </script>
<?php
    }

    protected function _content_template()
    {
    }
}
