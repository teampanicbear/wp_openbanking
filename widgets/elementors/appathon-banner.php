<?php
class Elementor_AppathonBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonBanner';
    }

    public function get_name()
    {
        return 'AppathonBanner';
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
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('
                                    <h1 class="title">OBE original research, <br> ebooks and reports</h1>
                                    <div class="sub-title">Your deep dive into Open Banking.</div>
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
    <div class="wrapper-appathon-banner">
        <div class="wrapper">
			<img class="appathon-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/appathon_banner.svg" alt="">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/appathon.svg" alt="">
            <?= $settings['content'] ?>
            <div class="sponsors">
                <div class="title-sponsor">HEADLINE SPONSORS</div>
                <div class="wrapper-list-sponsors">
                    <!-- loop here -->
                    <?php 
                    $args = array(
                        'post_status' => 'publish',
                        'post_type'         => 'sponsor',
                        'orderby'           => 'date',
                        'order'             => 'asc',    
                        'posts_per_page'    => -1,     
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
<?php
    }

    protected function _content_template()
    {
    }
}
