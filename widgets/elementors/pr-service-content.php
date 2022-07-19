<?php
class Elementor_PRServiceContent_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'PRServiceContent';
    }

    public function get_name()
    {
        return 'PRServiceContent';
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
            'list-content',
            [
                'label' => __('List Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h6 class="title-menu">PR Services</h6>
                                <div class="list-item-menu">
                                    <div class="item-menu" id="item-menu-1" data-scroll="#item-1">
                                        Earned Media
                                    </div>
                                    <div class="item-menu" id="item-menu-2" data-scroll="#item-2">
                                        Paid Media
                                    </div>
                                    <div class="item-menu" id="item-menu-3" data-scroll="#item-3">
                                        Other Media
                                    </div>
                                </div>', 'plugin-name'),
            ]
        );

        $this->add_control(
            'content-1',
            [
                'label' => __('Content-1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="title-item">Earned Media</h5>
                                <ul class="list-service">
                                    <li>
                                    <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Thought leadership
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Press release writing, distribution placement and reporting
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Op-Ed’s placement within the fintech and national press
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Op-Ed’s placement work with industry partners
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Commentary
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        News jacking
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Global press coverage
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Scheduled editorial placement
                                    </li>
                                </ul>', 'plugin-name'),
            ]
        );

        $this->add_control(
            'content-2',
            [
                'label' => __('Content-2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="title-item">Paid Media</h5>
                                <ul class="list-service">
                                    <li>
                                    <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Sponsored social media posts
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Display and video ads
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Paid search results
                                    </li>
                                </ul>', 'plugin-name'),
            ]
        );

        $this->add_control(
            'content-3',
            [
                'label' => __('Content-3', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="title-item">Other Services</h5>
                                <ul class="list-service">
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Media relations and outreach
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Proactive opportunity searches tailored to your sector
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        PR collaboration with joint press releases - let us do the heavy lifting for you by coordinating the finer details
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        Global translation and copywriting with our team of writers to help you reach the widest audience
                                    </li>
                                    <li>
                                        <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                        In-house graphic design team to incorporate your brand positioning where desired
                                    </li>
                                </ul>', 'plugin-name'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link Download our highlights', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<a href="/obe/pr-download-highlights" class="btn-primary">Download our highlights</a>', 'plugin-name'),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-pr-content">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="left-container">
                        <div class="anchor-menu">
                            <?= $this->get_render_attributes('list-content') ?><?= $settings['list-content'] ?>
                        </div>
                        <?= $settings['link'] ?>
                    </div>
                    <div class="right-container">
                        <div class="content-item-menu" id="item-1">
                            <?= $this->get_render_attributes('content-1') ?><?= $settings['content-1'] ?>
                        </div>
                        <div class="content-item-menu" id="item-2">
                            <?= $this->get_render_attributes('content-2') ?><?= $settings['content-2'] ?>
                        </div>
                        <div class="content-item-menu" id="item-3">
                            <?= $this->get_render_attributes('content-3') ?><?= $settings['content-3'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function loadScrollService() {
                const arrIndex = [];
                const offsetIndex = [];
                const countElement = $('.right-container').children('.content-item-menu').length;
                $('.item-menu').click(function() {
                    $('html, body').animate({
                        scrollTop: $($(this).data('scroll')).offset().top
                    }, 500);
                })
                for (var i = 0; i < countElement; i++) {
                    arrIndex.push({
                        index: i + 1,
                        offset: $(`#item-${i+1}`).offset()?.top
                    })
                }
                arrIndex.forEach((element, index, arr) => {
                    if (arr[index + 1]) {
                        const height = $(`#item-${index+1}`).height() / 2;
                        offsetIndex.push({
                            ...element,
                            offset: arr[index].offset - height,
                            offsetBottom: arr[index + 1].offset
                        });
                    } else {
                        const height = $(`#item-${index +1}`).height() / 2;
                        offsetIndex.push({
                            ...element,
                            offset: arr[index].offset - height,
                            offsetBottom: height + element.offset
                        });
                    }
                })
                $(window).scroll(function() {
                    var scrollTop = $(window).scrollTop();
                    offsetIndex.forEach((element, index, arr) => {
                        if (element.offset < scrollTop && scrollTop < element.offsetBottom) {
                            $('.item-menu').removeClass('actived-item-menu');
                            $(`#item-menu-${element.index}`).addClass('actived-item-menu');
                            return;
                        }
                        if (arr[0].offset > scrollTop || scrollTop > arr[arr.length - 1].offsetBottom) {
                            $('.item-menu').removeClass('actived-item-menu');
                            return;
                        }
                    })
                });
            }
            $(".right-container").ready(function() {
                loadScrollService();
            });
            $(window).resize(function() {
                loadScrollService();
            });
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
