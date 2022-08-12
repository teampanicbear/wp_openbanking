<?php
class Elementor_AboutMeeting_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AboutMeeting';
    }

    public function get_name()
    {
        return 'AboutMeeting';
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
                'default' => __('
                                    <div class="intro">
                                        <h2 class="title">Meet <br> the team</h2>
                                        <p class="content">We believe constructive conversations and serendipity can forge new business leads and partnerships. Our mission is to educate and bring together key market players to connect, contribute exceptional content and collaborate.</p>
                                    </div>
                                ', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-about-meeting">
            <div class="wrapper">
                <?= $settings['content'] ?>
                <div class="card-container minus-m16-lr flex">
                    <?php
                    $args = array(
                        'post_status'       => 'publish',
                        'post_type'         => 'team',
                        'orderby'           => 'date',
                        'order'             => 'desc',
                        'posts_per_page'    => -1
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <div class="wrapper-card m16-lr">
                                <div class="avatar-card">
                                    <a href="<?php the_permalink(); ?>" class="image-container" data-image="<?php echo get_the_post_thumbnail_url(); ?>" style="background: url('<?php echo get_the_post_thumbnail_url() ?>')">
                                        <div class="overlay"></div>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="image-container-hover" data-image="<?php echo get_the_post_thumbnail_url(); ?>" style="background: linear-gradient(0deg, #FEBF10, #FEBF10), url('<?php echo get_the_post_thumbnail_url(); ?>')">
                                        <div class="overlay"></div>
                                    </a>
                                    <p><?php the_title() ?></p>
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
