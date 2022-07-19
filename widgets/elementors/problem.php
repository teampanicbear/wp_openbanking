<?php
class Elementor_Problem_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'Problem Banner';
    }

    public function get_name()
    {
        return 'Problem Banner';
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
            'content-banner-problem',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h5 class="question-problem">Missing out?</h5>
                                    <h2 class="answer-problem">Not</h2>
                                    <h2 class="answer-problem">Anymore.</h2>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="intro --fade-in">
                                        Tired of feeling out of the loop on <b>Open Banking and Finance</b>?<br> 
                                        Time poor and disheartened at having to root out a hundred different 
                                        sources for the latest insights, updates and connections?<br> 
                                        It can be a bit of a Wild West out there, but it doesn’t have to be.
                                    </div>
                                    <div class="intro-mobile">
                                        Tired of feeling out of the loop on Open Banking and Open Finance? 
                                        Time poor and disheartened at having to root out a hundred different 
                                        sources for the latest insights, updates and connections? 
                                        It can be a bit of a Wild West out there, but it doesn’t have to be. 
                                    </div>
                                    <div class="wrapper-solution --fade-in">
                                        <div class="item-solution">
                                            <h3>01<span>.</span></h3>
                                            <p>There’s no one place to find the necessary information needed to keep up to date on (as well as share) the latest developments within Open Banking. Vital in such a fast-paced sector.</p>
                                        </div>
                                        <div class="item-solution">
                                            <h3>02<span>.</span></h3>
                                            <p>It’s difficult to find where to go to meet the right people within Open Banking. Crucial for partnerships and growth.</p>
                                        </div>
                                        <div class="item-solution">
                                            <h3>03<span>.</span></h3>
                                            <p>Lack of visibility in the Open Banking universe. You can’t be an industry leader without having your voice heard and your brand amplified.</p>
                                        </div>
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
                <div class="banner-problem">
                    <div class="content-banner-problem --reveal">
                        <?= $settings['content-banner-problem'] ?>
                    </div>
                    <div class="star-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star_problem.svg" alt="">
                    </div>
                </div>
                <div <?= $this->get_render_attribute_string( 'content' ) ?>><?= $settings['content'] ?></div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }
}