<?php
class Elementor_BlogDetailEvent_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'BlogDetailEvent';
    }

    public function get_name()
    {
        return 'BlogDetailEvent';
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
        <div class="wrapper-insight-event wrapper-blog-detail-event ">
                <div class="wrapper-latest-blog">
                    <div class="wrapper">
                        <div class="content-latest-blog blog-detail-latest">
                            <div class="wrapper-info">
                                <h5>Explore more</h5>
                                <h2 class="main-title">Other <br> Articles</h2>
                                <h2 class="main-title-mobile">Other Articles</h2>
                                <div class="blog-detail-text text-20-light">Vitae consectetur morbi risus semper aliquam. Ut ut nam semper elementum egestas dui metus donec accumsan pulvinar.</div>
                                <div class="wrapper-action wrapper-action-full">
                                    <a href="#" class="btn-primary">View All</a>
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
                                <div class="row-split">
                                    <div class="slide-progress" id="latest-blog-slide"></div>
                                </div>
                                <div class="list-slide" id="blog-slide">
                                    <div class="item-slide">
                                        <a href="#">
                                            <img class="img-slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="">
                                        </a>
                                        <div class="description-slide">
                                            <div class="date-time-slide text-12-normal">
                                                <h4>16<br></h4>Aug, 2021
                                            </div>
                                            <div class="info-slide">
                                                <a href="#" class="title-slide text-16-normal">
                                                    Putting consumers at the core of Open Banking and Finance in Europe: We’re behind the curve
                                                </a>
                                                <div class="blog-category text-14-normal">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                    <a href="#" class="author-slide tag">
                                                        Open Banking: Goes Green
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <a href="#">
                                            <img class="img-slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_slide.png" alt="">
                                        </a>
                                        <div class="description-slide">
                                            <div class="date-time-slide text-12-normal">
                                                <h4>16<br></h4>Aug, 2021
                                            </div>
                                            <div class="info-slide">
                                                <a href="#" class="title-slide text-16-normal">
                                                    90-days Reauth is killing Open Banking’s ability to do good at scale
                                                </a>
                                                <div class="blog-category text-14-normal">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                    <a href="#" class="author-slide tag">
                                                        Open Banking: Goes Green
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <a href="#">
                                            <img class="img-slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_slide2.png" alt="">
                                        </a>
                                        <div class="description-slide">
                                            <div class="date-time-slide text-12-normal">
                                                <h4><?php the_date('a'); ?><br></h4><?php the_date('F'); ?>, <?php the_date('Y'); ?>
                                            </div>
                                            <div class="info-slide">
                                                <a href="#" class="title-slide text-16-normal">
                                                    Putting consumers at the core of Open Banking and Finance in Europe: We’re behind the curve
                                                </a>

                                                <div class="blog-category text-14-normal">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                    <a href="#" class="author-slide">
                                                        Open Banking: Goes Green
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-only-mobile">
                                <div class="circle-split">
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
                               <a href="#" class="btn-primary">View All</a>
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
                $('#latest-blog-slide').width(`${Math.round(1*100/slick.slideCount)}%`);
                var wSlide = event.type == 'init' ? 0 :  nextSlide;
                $('#latest-blog-slide').css("margin-left", `${Math.round(wSlide*100/slick.slideCount)}%`);
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
