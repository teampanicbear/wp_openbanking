<?php
class Elementor_SpeakerBanner_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'SpeakerBanner';
    }

    public function get_name()
    {
        return 'SpeakerBanner';
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
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5>OBE’s Speakers</h5>
                                <h1>Experts and pioneers challenging the status quo and taking Open Banking forward.</h1>
                                <button class="btn-primary">Apply to Speak</button>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //	$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-speaker-banner">
            <div class="wrapper">
                <div class="wrapper-banner-content">
                    <div class="wrapper-content-left">
                        <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
                    </div>
                    <div class="content-trail-effect wrapper-content-right">
                    <?php 
                        $args = array(
                            'post_status' => 'publish',
                            'post_type'         => 'speaker',
                            'orderby'           => 'date',
                            'order'             => 'asc',    
                            'posts_per_page'    => 7,     
                            'post__not_in' => array($post->ID)           
                        );
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if( $the_query->have_posts() ): ?>
                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <img class="content__img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="" />
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
