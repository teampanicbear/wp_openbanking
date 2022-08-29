<?php
class Elementor_AppathonJudges_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonJudges';
    }

    public function get_name()
    {
        return 'AppathonJudges';
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
                'default' => __( ' <h3 class="title">Meet the judges</h3>
                <p class="sub-title">Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.</p>', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
    <div class="wrapper-appathon-judges">
        <div class="wrapper">
            <div class="wrapper-title">
                <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
            </div>
            <div class="wrapper-speaker-content minus-m16-lr">
                <?php 
                    $args = array(
                        'post_status' => 'publish',
                        'post_type'         => 'speaker',
                        'orderby'           => 'date',
                        'order'             => 'asc',    
                        'posts_per_page'    => 9,     
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="wrapper-item m16-lr">
                    <div class="wrapper-speaker-item">
                        <a href="<?php the_permalink(); ?>" class="ava-speaker">
                            <img class="ava-speaker" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                        </a>
                        <div class="position-item-content">
                            <div class="wrapper-item-content">
                                <a href="<?php the_permalink(); ?>" class="text-20-bold header-item"><?= the_title() ?></a>
                                <p class="text-14-normal"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_position', true) ?></p>
                                <hr />
                                <div class="bottom-item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                    <p class="text-14-normal paragraph-item"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_company', true) ?></p>
                                </div>
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
<?php
    }

    protected function _content_template()
    {
    }
}
