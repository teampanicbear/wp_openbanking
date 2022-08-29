<?php
class Elementor_InsightInformation_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'InsightInformation';
    }

    public function get_name()
    {
        return 'InsightInformation';
    }

    public function get_categories()
    {
        return ['basic'];
    }
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section_1',
            [
                'label' => __('Content-1', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image-1',
            [
                'label' => __('Image-1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'content-1',
            [
                'label' => __('Content-1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<div class="info-card">
                                    <div class="title text-20-bold">Index</div>
                                    <div class="content text-16-normal">Nunc est sodales lectus sagittis, amet, varius consequat. Id volutpat sem urna, ullamcorper. Dictum vitae libero in ultricies sit nunc massa risus montes. Mattis vestibulum pharetra aliquet vitae ullamcorper vitae viverra.</div>
                                    <div class="arrow-action">
                                        <a href="#" class=" link">Learn more</a>
                                        <div class="wrapper-img">
                                            <img  src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                        </div>
                                    </div>
                                </div>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_2',
            [
                'label' => __('Content-2', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image-2',
            [
                'label' => __('Image-2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'content-2',
            [
                'label' => __('Content-2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<div class="info-card">
                                    <div class="title text-20-bold">Index</div>
                                    <div class="content text-16-normal">Nunc est sodales lectus sagittis, amet, varius consequat. Id volutpat sem urna, ullamcorper. Dictum vitae libero in ultricies sit nunc massa risus montes. Mattis vestibulum pharetra aliquet vitae ullamcorper vitae viverra.</div>
                                    <div class="arrow-action">
                                        <a href="#" class=" link">Learn more</a>
                                        <div class="wrapper-img">
                                            <img  src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt="">
                                        </div>
                                    </div>
                                </div>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-insight-info">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="item-card">
                        <img class="logo-info" src="<?= $settings['image-1']['url'] ?>">
                        <?= $this->get_render_attribute_string('content-1') ?><?= $settings['content-1'] ?>
                    </div>
                    <div class="item-card">
                        <img class="logo-info" src="<?= $settings['image-2']['url'] ?>">
                        <?= $this->get_render_attribute_string('content-2') ?><?= $settings['content-2'] ?>
                    </div>
                </div>
            </div>
            <!-- <div class="list-partner">
                <?php
                $args = array(
                    'post_status'       => 'publish',
                    'post_type'         => 'sponsor',
                    'orderby'           => 'date',
                    'order'             => 'desc',
                    'meta_key' => 'advanced_options_sponsor_type-sponsor',
                    'meta_value' => 'community-sponsor',
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="item-partner">
                            <a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'>
                                <img alt='<?php the_title(); ?>' src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) != '' ?  get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) : get_the_post_thumbnail_url() ?>" alt="">
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div> -->
        </div>

        <script>
            if ($(window).innerWidth() > 1024) {
                $('.list-partner').slick({
                    slidesToScroll: 1,
                    slidesToShow: 8,
                    infinite: true,
                    dots: false,
                    prevArrow: false,
                    nextArrow: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            }
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
