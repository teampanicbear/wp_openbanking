<?php
class Elementor_InsightEvent_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'InsightEvent';
    }

    public function get_name()
    {
        return 'InsightEvent';
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
        <div class="wrapper-insight-event">
                <div class="heading wrapper">Events & Awards</div>
                <div class="wrapper-latest-blog">
                    <div class="wrapper">
                        <div class="content-latest-blog">
                            <div class="wrapper-info">
                                <?php
                                $category = get_category_by_slug("events-and-awards");
                                ?>
                                <h5>Upcoming</h5>
                                <h2 class="main-title">Events and <br> Awards</h2>
                                <h2 class="main-title-mobile">Events and Awards</h2>
                                <div class="content text-20-light"><?php echo $category->description ?></div>
                                <div class="wrapper-action">
                                    <a href="<?= site_url('events-awards') ?>" class="btn-primary">View all</a>
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
                                <?php
                                        $args = array(
                                            'post_status'       => 'publish',
                                            'post_type'         => 'post',
                                            'orderby'           => 'date',
                                            'order'             => 'desc',   
                                            'category_name'     => 'events-and-awards'
                                        );
                                        $the_query = new WP_Query( $args );
                                        ?>
                                        <?php if( $the_query->have_posts() ): ?>
                                        <?php while( $the_query->have_posts() ) : $the_query->the_post();
                                    ?>
                                    <div class="item-slide">
                                        <a href="#">
                                            <img class="img-slide" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                        </a>
                                        <div class="description-slide">
                                            <div class="date-time-slide text-12-normal">
                                                <h4> <?php the_date('d'); ?><br></h4><?php the_time('F'); ?>, <?php the_time('Y'); ?>
                                            </div>
                                            <div class="info-slide">
                                                <a href="<?php the_permalink(); ?>"  class="title-slide text-16-normal">
                                                    <?php echo the_title() ?>
                                                </a>
                                                <div class="blog-category text-14-normal">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                                    <span class="author-slide">
                                                       <?php the_time('H'); ?>:<?php the_time('i'); ?>
                                                    </span>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                    <a href="<?= site_url('events-awards') ?>" class="author-slide tag">
                                                        <?php echo get_the_category()[0]->name ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        <script>
            // todo move to site
            var $slickElement = $('#blog-slide');

            $slickElement.on('init beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('#latest-blog-slide').width(`${Math.round(1*100/slick.slideCount)}%`);
                var wSlide = event.type == 'init' ? 0 :  nextSlide;
                $('#latest-blog-slide').css("margin-left", `${Math.round(wSlide*100/slick.slideCount)}%`);
            });

            $slickElement.slick({
                // slidesToShow: 2,
                variableWidth: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                infinite: true,
                slidesToScroll: 1,
                draggable: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }, ]
            });
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
