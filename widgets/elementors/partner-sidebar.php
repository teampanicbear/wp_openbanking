<?php
class Elementor_PartnerSidebar_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'PartnerSidebar';
    }

    public function get_name()
    {
        return 'PartnerSidebar';
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
                'default' => __(
                    '
                                    <p class="text-16-normal">
                                        Being seen as an Open Finance powerhouse takes time and effort. 
                                        There’s countless events to sponsor and speak at, media to source and 
                                        build relationships with and content to be produced and placed in 
                                        front of the right potential partners and customers. 
                                        <br/>
                                        <br/>
                                        <br/>
                                        At OBE, we take on this task so you can focus on building your business. 
                                        We are a one-stop shop uniquely positioned to amplify your Open Banking brand messages 
                                        across a variety of critical platforms. We do this through:
                                        <br/>
                                        <br/>
                                    </p>
                                ',
                    'plugin-name'
                ),
            ]
        );


        $this->add_control(
            'whoweare',
            [
                'label' => __('Who we are', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(
                    '
                                    <p class="text-16-normal">
                                        Our team is backed by a combined 50+ years experience across fintech, 
                                        banking and payments, alongside two decades within events, marketing, content and PR. 
                                        We’ve been boosting the Open Banking profiles of some of the biggest names in the industry 
                                        for over three years. 
                                    </p>
                                ',
                    'plugin-name'
                ),
            ]
        );


        $this->add_control(
            'side-content',
            [
                'label' => __('Side content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(
                    "
                <div class='content-row'>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9157 1L14.5744 5.62838L0.860568 29.5019L0 31H1.72768H29.7277H31.4554L30.5948 29.5019L16.8809 5.62838L19.5396 1H17.2331L15.7277 3.62078L14.2222 1H11.9157ZM28 29L15.7277 7.63599L3.45537 29H28Z' fill='black'/>
                            <path d='M16 18L22.9282 30H9.0718L16 18Z' stroke='#FEBF10' stroke-width='2'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Campfires
                        </a>
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='30' height='34' viewBox='0 0 30 34' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M15 2L27.9904 9.5V24.5L15 32L2.00962 24.5V9.5L15 2Z' stroke='#212121' stroke-width='2'/>
                            <path d='M8.14258 12.4286L12.8569 16.7594L8.14258 21.0902M15.0473 21.5714H21.8569' stroke='#FEBF10' stroke-width='2'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Appathon
                        </a>
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <rect x='1' y='3' width='28' height='26' stroke='#1C1B18' stroke-width='2'/>
                            <path d='M7.77734 0V6.11111' stroke='#1C1B18' stroke-width='2'/>
                            <path d='M21.666 0V6.11111' stroke='#1C1B18' stroke-width='2'/>
                            <path d='M1.11133 10.6666H28.8891' stroke='#1C1B18' stroke-width='2'/>
                        <path d='M14.6667 13.4444L16.1634 18.051H21.007L17.0885 20.898L18.5852 25.5045L14.6667 22.6575L10.7481 25.5045L12.2449 20.898L8.32629 18.051H13.1699L14.6667 13.4444Z' fill='#FEBF10'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Roundtables and bespoke events
                        </a>                                     
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M9.33333 26V27.3333C9.33333 30.3333 6 30.6667 6 30.6667C6 30.6667 25.7713 30.6667 26 30.6667C27.8407 30.6667 29.3333 29.174 29.3333 27.3333V26H9.33333Z' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M25.3327 22.6667V3.5M5.99935 30.6667C4.15868 30.6667 2.66602 29.174 2.66602 27.3333V3.51514H25.3327' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M15 15L19 15' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M7 15L11 15' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M15 10L19 10' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M7 10L11 10' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M7 20L19 20' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Blogs
                        </a>   
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <circle cx='16' cy='16' r='7' stroke='#FEBF10' stroke-width='2'/>
                            <circle cx='16' cy='14.5' r='1.5' fill='#1C1B18'/>
                            <path d='M18 20C18 19.4696 17.7893 18.9609 17.4142 18.5858C17.0391 18.2107 16.5304 18 16 18C15.4696 18 14.9609 18.2107 14.5858 18.5858C14.2107 18.9609 14 19.4696 14 20' stroke='#1C1B18' stroke-width='2'/>
                            <circle cx='3.21875' cy='28.3912' r='1.84462' transform='rotate(45 3.21875 28.3912)' stroke='#1C1B18' stroke-width='2'/>
                            <line x1='3.81438' y1='27.6842' x2='9.03176' y2='22.4668' stroke='#1C1B18' stroke-width='2'/>
                            <circle cx='28' cy='3.60869' r='1.84462' transform='rotate(45 28 3.60869)' stroke='#1C1B18' stroke-width='2'/>
                            <line x1='22.0761' y1='9.42333' x2='27.2935' y2='4.20594' stroke='#1C1B18' stroke-width='2'/>
                            <circle cx='3.61006' cy='3.21735' r='1.84462' transform='rotate(135 3.61006 3.21735)' stroke='#1C1B18' stroke-width='2'/>
                            <line x1='4.31648' y1='3.81468' x2='9.53386' y2='9.03206' stroke='#1C1B18' stroke-width='2'/>
                            <circle cx='28.3913' cy='28' r='1.84462' transform='rotate(135 28.3913 28)' stroke='#1C1B18' stroke-width='2'/>
                            <line x1='22.5762' y1='22.0754' x2='27.7936' y2='27.2928' stroke='#1C1B18' stroke-width='2'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        PR & Consultancy services
                        </a>                                      
                    </div>
                </div>

                <div class='item-switcher flex-1 size disable'></div>
                
                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='34' height='34' viewBox='0 0 34 34' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M11.6162 14.6776C11.1264 13.6451 10.0726 12.9273 8.85384 12.9273H4.78111C3.09398 12.9273 1.72656 14.2947 1.72656 15.9819V21.0728H3.76293V28.2H9.87202' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10'/>
                            <path d='M6.81822 9.8727C8.5052 9.8727 9.87276 8.50514 9.87276 6.81816C9.87276 5.13118 8.5052 3.76361 6.81822 3.76361C5.13124 3.76361 3.76367 5.13118 3.76367 6.81816C3.76367 8.50514 5.13124 9.8727 6.81822 9.8727Z' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M22.3828 14.6776C22.8726 13.6451 23.9264 12.9273 25.1451 12.9273H29.2179C30.905 12.9273 32.2724 14.2947 32.2724 15.9819V21.0728H30.2361V28.2H24.127' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10'/>
                            <path d='M27.1815 9.8727C28.8685 9.8727 30.236 8.50514 30.236 6.81816C30.236 5.13118 28.8685 3.76361 27.1815 3.76361C25.4945 3.76361 24.127 5.13118 24.127 6.81816C24.127 8.50514 25.4945 9.8727 27.1815 9.8727Z' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M20.0543 32.2728H13.9452V24.1273H10.8906V17C10.8906 14.7509 12.7142 12.9273 14.9634 12.9273H19.0361C21.2852 12.9273 23.1088 14.7509 23.1088 17V24.1273H20.0543V32.2728Z' stroke='#1C1B18' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                            <path d='M16.9985 9.87275C19.2478 9.87275 21.0712 8.04933 21.0712 5.80002C21.0712 3.55072 19.2478 1.72729 16.9985 1.72729C14.7492 1.72729 12.9258 3.55072 12.9258 5.80002C12.9258 8.04933 14.7492 9.87275 16.9985 9.87275Z' stroke='#FEBF10' stroke-width='2' stroke-miterlimit='10' stroke-linecap='square'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Global Open Banking community
                        </a>                     
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M18.7101 10.4363L22 8V27H10V17L12.7101 14.9363M1 27H31V31H1V27Z' stroke='black' stroke-width='2'/>
                            <path d='M13 0L14.7398 5.60531L20.6085 5.52786L15.8151 8.91469L17.7023 14.4721L13 10.96L8.29772 14.4721L10.1849 8.91469L5.39155 5.52786L11.2602 5.60531L13 0Z' fill='#FEBF10'/>
                        </svg>
                    </div>
                    <div class='title'>
                        <a href='#'>
                        Event and award placement
                        </a>    
                    </div>
                </div>

                <div class='item-switcher flex-1 size'>
                    <div class='icon'>
                        <svg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M28.0736 19.7575H2M28.0736 19.7575V23.4822H2V19.7575M28.0736 19.7575V11.3767M2 19.7575V3.92706H20.624M19.6928 29.0694L17.8304 23.4822H11.312L9.44959 29.0694M19.6928 29.0694H9.44959M19.6928 29.0694H22.4864M9.44959 29.0694H6.656' stroke='#212121' stroke-width='2'/>
                            <path d='M28.1387 2.00004L30.0658 3.92708L21.8863 12.1064L19.7256 12.3401L19.9593 10.1794L28.1387 2.00004Z' stroke='#FEBF10' stroke-width='2'/>
                        </svg>
                    </div>
                    <div class='title'> 
                        <a href='#'>
                        Content creation
                        </a>
                    </div>
                </div>
                
                <div class='item-switcher flex-1 size disable'> </div>
            </div>    
                                ",
                    'plugin-name'
                ),
            ]
        );

        $this->add_control(
            'banner-image',
            [
                'label' => __('Banner image sidebar', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'banner-image-1',
            [
                'label' => __('Banner image sidebar 1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-partner-sidebar">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="header-content">
                        <h1>What we do</h1>
                        <img src="<?= $settings['banner-image']['url'] ?>" alt="" />
                        <div class="header-text">
                            <div class="wrapper-heder-text">
                                <h3>What we do</h3>
                                <div <?= $this->get_render_attribute_string('content') ?>><?= $settings['content'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="body-content" id="side-content">
                        <?= $settings['side-content'] ?>
                    </div>

                    <div class="footer-content">
                        <div class="header-text">
                            <div class="wrapper-heder-text">
                                <h3>Who we are</h3>
                                <div <?= $this->get_render_attribute_string('whoweare') ?>><?= $settings['whoweare'] ?></div>
                            </div>
                        </div>
                        <img src="<?= $settings['banner-image-1']['url'] ?>" alt="" />
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
