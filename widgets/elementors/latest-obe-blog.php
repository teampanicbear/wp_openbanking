<?php
class Elementor_LatestObeBlog_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'LatestObeBlog';
    }

    public function get_name()
    {
        return 'LatestObeBlog';
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
                                    <h2 class="main-title --reveal">Latest from <br> the OBE Blog</h2>
                                    <div class="content text-20-light --fade-in">Where the Open Banking and Finance community shares knowledge, gains perspective and sparks conversation.</div>
                                    <div class="wrapper-action">
                                        <a href="#" class="btn-primary">Read more</a>
                                        <div class="slide-controls">
                                            <button class="btn btn-icon prev">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                                    <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                                </svg>
                                            </button>
                                            <button class="btn btn-icon btn-slide next">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                                    <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'img-thumbnail',
            [
                'label' => __( 'Background blog', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_events_awards = get_category_by_slug("events-and-awards")->term_id;
        $id_news_press  = get_category_by_slug("news-stories-and-press-releases")->term_id;
        ?>
        <div class="wrapper-latest-blog schero" style="background-image: url('<?= $settings['img-thumbnail']['url'] ?>')">
            <div class="wrapper">
                <div class="content-latest-blog">
                    <div class="wrapper-info">
                        <div class="logo-blog">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_logo.svg" alt="">
                        </div>
                        <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                    </div>
                    <div class="wrapper-slide">
                        <div class="row-split">
                            <div class="slide-progress" id="latest-blog-slide"></div>
                        </div>
                        <div class="list-slide" id="blog-slide">
                            <?php 
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type'         => 'post',
                                    'orderby'           => 'date',
                                    'order'             => 'desc',    
                                    'category__not_in'  => array($id_news_press,$id_events_awards),
                                    'posts_per_page'    => 8,     
                                );
                                $the_query = new WP_Query( $args );
                            ?>
                            <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="item-slide">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="img-slide" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                    </a>
                                    <div class="description-slide">
                                        <div class="date-time-slide text-12-normal">
                                            <h4><?php the_date('d'); ?><br></h4><?php the_time('F'); ?>, <?php the_time('Y'); ?>
                                        </div>
                                        <div class="info-slide">
                                            <a href="<?php the_permalink(); ?>" class="title-slide text-16-normal --fade-in" title='<?php the_title(); ?>'>
                                                <?php the_title(); ?>
                                            </a>
                                            <div class="blog-category text-14-normal">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article.svg" alt="">
                                                <?php the_category(' , '); ?>
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

    protected function _content_template() {

    }
}