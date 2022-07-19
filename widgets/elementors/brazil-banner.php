
<?php
class Elementor_BrazilBanner_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BrazilBanner';
    }

    public function get_name()
    {
        return 'BrazilBanner';
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
            'wrapper-image',
            [
                'label' => __( 'Wapper image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'img-thumbnail',
            [
                'label' => __( 'Image thumbnail', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h5 class="demo-text-banner --reveal" data-splitting>The Global Comunidade</h5>
                                    <h1 class="main-text-banner --reveal" data-splitting>For Open Banking and <br/> Finance Pioneers</h1>
                                    <div class="sub-text-banner text-20-light --fade-in">COLLABORATE.LEARN.PIONEER</div>
                                    <div class="wrapper-btn">
                                        <a href="/register" class="btn btn-primary">Join Our Community</a>
                                    </div>
                                    ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-banner schero home-banner brazil-banner">
            <div class="overlay"></div>
            <img class="wrapper-image" src="<?= $settings['wrapper-image']['url'] ?>"></img>
            <video class="video-thumbnail" src="<?= $settings['video-home-banner']['url'] ?>" autoplay muted loop></video>
            <img class="img-thumbnail" src="<?= $settings['img-thumbnail']['url'] ?>"></img>
            <div class="wrapper">
                <div class="wrapper-content-banner">
                    <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
                </div>
            </div>
        </div>
        <div class="wrapper-problem schero">
            <div class="wrapper">
                <div class="wrapper-sponsor">
                    <div class="content-sponsor wrapper">
                        <div class="title-sponsor">
                            Headline sponsors
                        </div>
                        <div class="wrapper-icon">
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
                            <div class="icon-sponsor">
                                <a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'><img alt='<?php the_title(); ?>' src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true)!='' ?  get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) : get_the_post_thumbnail_url() ?>" alt=""></a>
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
            // var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
            var ua = navigator.userAgent.toLowerCase(); 
            if (ua.indexOf('safari') != -1) { 
            if (ua.indexOf('chrome') > -1) {
                isSafari = false;
            } else {
                isSafari = true;
            }
            }
            if(isSafari) {
                $('.video-thumbnail').css('display', 'none');
                $('.img-thumbnail').css('display', 'block');
            } else {
                $('.img-thumbnail').css('display', 'none');
            }

        </script>
        <?php
    }

    protected function _content_template() {

    }
}