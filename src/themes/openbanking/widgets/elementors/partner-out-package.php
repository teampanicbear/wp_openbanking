<?php
class Elementor_PartnerOutPackage_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'PartnerOutPackage';
    }

    public function get_name()
    {
        return 'PartnerOutPackage';
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
            'title1',
            [
                'label' => __( 'Title Headline Sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Headline Sponsorship', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'image1',
            [
                'label' => __( 'Image Headline Sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'content1',
            [
                'label' => __( 'Content Headline Sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="text-16-normal">
                                    An opportunity to promote your brand year-round across multiple global touchpoints, including Campfires, 
                                    Blogs, Appathon and press - aligning yourself as a thought leader, industry pioneer and 
                                    innovation champion. Reinforce and amplify your key brand messages across a variety of platforms and formats.
                                    </p>
                                ', 
                                'plugin-name' ),
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => __( 'Title Community sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Community sponsorship', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'image2',
            [
                'label' => __( 'Image Community sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'content2',
            [
                'label' => __( 'Content Community sponsorship', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="text-16-normal">
                                        An opportunity to promote your brand across several global touchpoints, 
                                        including Campfires and Blogs, aligning yourself as a thought leader at the 
                                        forefront of Open Finance. Reinforce and amplify key brand messages.
                                    </p>
                                ', 
                                'plugin-name' ),
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => __( 'Title Bespoke services', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Bespoke services', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'image3',
            [
                'label' => __( 'Image Bespoke services', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'content3',
            [
                'label' => __( 'Content Bespoke services', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="text-16-normal">
                                        - Bespoke public and private events, including Masterclasses and Roundtables
                                        <br />- Event and award placement
                                        <br />- Content creation
                                    </p>
                                ', 
                                'plugin-name' ),
            ]
        );


        $this->add_control(
            'title4',
            [
                'label' => __( 'Title Bespoke Packages', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Bespoke Packages', 'plugin-name' ),
            ]
        );
        $this->add_control(
            'image4',
            [
                'label' => __( 'Image Bespoke Packages', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        $this->add_control(
            'content4',
            [
                'label' => __( 'Content Bespoke Packages', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <p class="text-16-normal">
                                        We could also build a package that suits to your need. 
                                        Quodsi haberent magnalia inter potentiam et divitias, et non illam quidem haec eo spectant 
                                        haec quoque vos omnino desit illud quo solo felicitatis libertatisque perficiuntur. 
                                    </p>
                                ', 
                                'plugin-name' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link Download our highlights', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<a href="/obe/sponsorsip-download-highlights" class="btn-primary btn-partner btn-partner-pc">Download our highlights</a>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-out-package">
                <div class="wrapper">
                    <div class="wrapper-content">
                        <h1>Our Packages</h1>
                        <div class="wrapper-content-action">
                            <div class="wrapper-internal">
                                <div class="wrapper-center">
                                    <h6>Our Packages</h6>
                                    <hr />
                                    <ul>
                                        <li class="item-menu" id="item-menu-1" data-scroll="#item-1">
                                            <?= $settings['title1'] ?>
                                        </li>
                                        <li class="item-menu" id="item-menu-2" data-scroll="#item-2">
                                            <?= $settings['title2'] ?>
                                        </li>
                                        <li class="item-menu" id="item-menu-3" data-scroll="#item-3">
                                            <?= $settings['title3'] ?>
                                        </li>
                                        <li class="item-menu" id="item-menu-4" data-scroll="#item-4">
                                            <?= $settings['title4'] ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?= $settings['link'] ?>
                        </div>
                        <div class="wrapper-list">
                            <ul class="right-container">
                                <li class="content-item-menu" id="item-1">
                                    <div class="list-item">
                                        <img src="<?= $settings['image1']['url'] ?>" alt="" />
                                        <h4><?= $settings['title1'] ?></h4>
                                        <h2><?= $settings['title1'] ?></h2>
                                        <?= $settings['content1'] ?>
                                    </div>
                                </li>
                                <li class="content-item-menu" id="item-2">
                                    <div class="list-item">
                                        <img src="<?= $settings['image2']['url'] ?>" alt="" />
                                        <h4><?= $settings['title2'] ?></h4>
                                        <h2><?= $settings['title2'] ?></h2>
                                        <?= $settings['content2'] ?>
                                    </div>
                                </li>

                                <li class="content-item-menu" id="item-3">
                                    <div class="list-item">
                                        <img src="<?= $settings['image3']['url'] ?>" alt="" />
                                        <h4><?= $settings['title3'] ?></h4>
                                        <h2><?= $settings['title3'] ?></h2>
                                        <?= $settings['content3'] ?>
                                    </div>
                                </li>
                                <li class="content-item-menu" id="item-4">
                                    <div class="list-item">
                                        <img src="<?= $settings['image4']['url'] ?>" alt="" />
                                        <h4><?= $settings['title4'] ?></h4>
                                        <h2><?= $settings['title4'] ?></h2>
                                        <?= $settings['content4'] ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?= $settings['link'] ?>
                    </div>
                </div>
            </div>

            <script>
                function loadScrollPartner() {
                    const arrIndex = [];
                    const offsetIndex = [];
                    const countElement = $('.right-container').children('.content-item-menu').length;
                    $('.item-menu').click(function () {
                        $('html, body').animate({
                            scrollTop: $($(this).data('scroll')).offset().top - 50
                        }, 500);
                    })
                    for(var i = 0; i < countElement; i++) {
                        arrIndex.push({index: i+1, offset: $(`#item-${i+1}`).offset()?.top})
                    }
                    arrIndex.forEach((element, index, arr) => {
                        if(arr[index+ 1]) {
                            const height = $(`#item-${index+1}`).height() / 2;
                            offsetIndex.push({...element, offset: arr[index].offset - height, offsetBottom: arr[index + 1].offset });
                        }
                        else {
                            const height = $(`#item-${index +1}`).height() / 2;
                            offsetIndex.push({...element, offset: arr[index].offset - height, offsetBottom: height + element.offset });
                        }
                    })
                    $(window).scroll(function(){
                        var scrollTop = $(window).scrollTop();
                        offsetIndex.forEach((element,index, arr) => {
                            if(element.offset < scrollTop && scrollTop< element.offsetBottom){
                                $('.item-menu').removeClass('actived-item-menu'); 
                                $(`#item-menu-${element.index}`).addClass('actived-item-menu');
                                return;    
                            }
                            if (arr[0].offset > scrollTop || scrollTop > arr[arr.length - 1].offsetBottom){
                                $('.item-menu').removeClass('actived-item-menu');
                                return;
                            }
                        })
                    }); 
                }
                $(".right-container .content-item-menu").ready(function() {
                    loadScrollPartner();
                });
                $( window ).resize(function() {
                    loadScrollPartner();
                });
            </script>
        <?php
    }

    protected function _content_template() {

    }
}