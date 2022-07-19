<?php
class Elementor_AppathonTimeline_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonTimeline';
    }

    public function get_name()
    {
        return 'AppathonTimeline';
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
                'default' => __( '<h3 class="title">Timeline</h3>
                                    <div class="sub-title">Et tristique vitae, ac nunc erat pretium tellus amet, <br> purus. Amet commodo, mauris tortor mi.</div>
                                    <div class="sub-title-mobile">Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.</div>', 
                                'plugin-name' ),
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'content_section_1',
            [
                'label' => __('Content-1', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon-1',
            [
                'label' => __( 'Icon-1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-1',
            [
                'label' => __( 'Info-1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="date">17 Jul 2021</div>
                                <div class="name">Launch</div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-1',
            [
                'label' => __( 'Title-1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '1 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
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
            'icon-2',
            [
                'label' => __( 'Icon-2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-2',
            [
                'label' => __( 'Info-2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="date">17 Jul 2021</div>
                                <div class="name">Building Phase</div>', 
                                'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-2',
            [
                'label' => __( 'Title-1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '2 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_3',
            [
                'label' => __('Content-3', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon-3',
            [
                'label' => __( 'Icon-3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-3',
            [
                'label' => __( 'Info-3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="date">17 Jul 2021</div>
                                <div class="name">APIs Deep Dive</div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-3',
            [
                'label' => __( 'Title-3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '3 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_4',
            [
                'label' => __('Content-4', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon-4',
            [
                'label' => __( 'Icon-4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-4',
            [
                'label' => __( 'Info-4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="date">17 Jul 2021</div>
                                    <div class="name">Submission closing date</div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-4',
            [
                'label' => __( 'Title-4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '4 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_5',
            [
                'label' => __('Content-5', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon-5',
            [
                'label' => __( 'Icon-5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-5',
            [
                'label' => __( 'Info-5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<div class="date">17 Jul 2021</div>
                                <div class="name">Shortlist of 12 to be announced</div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-5',
            [
                'label' => __( 'Title-5', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '5 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_6',
            [
                'label' => __('Content-6', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon-6',
            [
                'label' => __( 'Icon-6', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'info-6',
            [
                'label' => __( 'Info-6', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( ' <div class="date">17 Jul 2021</div>
                                <div class="name">Announcement of the winner</div>', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-6',
            [
                'label' => __( 'Title-6', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '6 Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus. Amet commodo, mauris tortor mi. Amet commodo, mauris tortor mi.Et tristique vitae, ac nunc erat pretium tellus amet, purus.', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();

      
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
    <div class="wrapper-appathon-timeline">
        <div class="wrapper">
            <div class="wrapper-title">
            <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
            </div>
            <div class="grid-timeline wrapper">
                <div class="line-grid"></div>
                <div class="line-grid"></div>
                <div class="line-grid"></div>
                <div class="line-grid"></div>
                <div class="line-grid"></div>
                <div class="line-grid"></div>
            </div>
            
            <div class="wrapper-timeline-mobile">
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-1']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-1') ?><?= $settings['info-1'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
                <div class="step-line"></div>
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-2']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-2') ?><?= $settings['info-2'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
                <div class="step-line"></div>
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-3']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-3') ?><?= $settings['info-3'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
                <div class="step-line"></div>
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-4']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-4') ?><?= $settings['info-4'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
                <div class="step-line"></div>
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-5']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-5') ?><?= $settings['info-5'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
                <div class="step-line"></div>
                <div class="card-timeline">
                    <div class="wrapper-icon-timeline">
                        <img src="<?= $settings['icon-6']['url'] ?>" alt="">
                    </div>
                    <div class="info">
                        <?= $this->get_render_attribute_string('info-6') ?><?= $settings['info-6'] ?>
                    </div>
                    <div class="border-right-card">
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-timeline">
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-1') ?><?= $settings['title-1'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-1']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-1') ?><?= $settings['info-1'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-2') ?><?= $settings['title-2'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-2']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-2') ?><?= $settings['info-2'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-3') ?><?= $settings['title-3'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-3']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-3') ?><?= $settings['info-3'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-4') ?><?= $settings['title-4'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-4']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-4') ?><?= $settings['info-4'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-5') ?><?= $settings['title-5'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-5']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-5') ?><?= $settings['info-5'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
            <div class="card-timeline" data-tooltips="<?= $this->get_render_attribute_string('title-6') ?><?= $settings['title-6'] ?>">
                <div class="wrapper-icon-timeline">
                    <img src="<?= $settings['icon-6']['url'] ?>" alt="">
                </div>
                <div class="info">
                    <?= $this->get_render_attribute_string('info-6') ?><?= $settings['info-6'] ?>
                </div>
                <div class="border-right-card">
                </div>
            </div>
        </div>
        <div class="row-split">
            <div class="slide-progress" id="timeline-slide"></div>
        </div>
    </div>

    <script>
        // var listItems = $('.wrapper-circle-card');

        // listItems.each(function(index, value) {
        //     $(value).find('.card-timeline').each(function(i, item) {
        //         if(i == 3) {
        //             $(item).css('margin-top', 102)
        //         } else {
        //             $(item).css('margin-top', i * 102)
        //         }

        //         if (i % 2 > 0) {
        //             $(item).css('background-color', '#33322E');
        //             console.log( $(item).find('wrapper-icon-timeline'))
        //             $(item).find('.wrapper-icon-timeline').css('border', '10px solid #33322E');
        //             $(item).find('.border-right-card').css('background-color', '#33322E');
        //         }
        //     })
        // });

        tippy('.card-timeline', {
            content(reference) {
                const data = reference.getAttribute('data-tooltips');
                return data;
            },
            theme: 'light',
            maxWidth: 320,
            distance: 30,
        });

        var $listItems = $('.wrapper-timeline');

        $listItems.on('init beforeChange', function(event, slick, currentSlide, nextSlide) {
            $('#timeline-slide').width(`${Math.round(1*100/slick.slideCount)}%`);
            var wSlide = event.type == 'init' ? 0 :  nextSlide;
            $('#timeline-slide').css("margin-left", `${Math.round(wSlide*100/slick.slideCount)}%`);
        });

        $listItems.each(function(index, value) {
            $(value).find('.card-timeline').each(function(i, item) {
                if(i%4 == 3) {
                    $(item).css('margin-top', 102);
                } else {
                    $(item).css('margin-top', i % 4 * 102);
                }

                if (i % 2 > 0) {
                    $(item).css('background-color', '#33322E');
                    $(item).find('.wrapper-icon-timeline').css('border', '10px solid #33322E');
                    $(item).find('.border-right-card').css('background-color', '#33322E');
                }
            })
        });

        $('.wrapper-timeline-mobile').each(function(index, value) {
            $(value).find('.card-timeline').each(function(i, item) {
                if (i % 2 > 0) {
                    $(item).find('.wrapper-icon-timeline').css('border', '10px solid #33322E');
                }
            })
        });

        $listItems.slick({
            variableWidth: true,
            prevArrow: false,
            nextArrow: false,
            infinite: false,
            swipeToSlide: true,
        });

    </script>
<?php
    }

    protected function _content_template()
    {
    }
}
