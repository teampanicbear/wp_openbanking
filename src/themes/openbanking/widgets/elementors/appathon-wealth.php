<?php
class Elementor_AppathonWealth_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AppathonWealth';
    }

    public function get_name()
    {
        return 'AppathonWealth';
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
            'title-entry-1',
            [
                'label' => __( 'Title entry 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Wealth Management', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-entry-1',
            [
                'label' => __( 'Image entry 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-entry-1',
            [
                'label' => __( 'Content entry 1', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="content-wealth">
                                        <p>Do you have a solution that addresses the wealth management needs of individuals or small businesses?</p>
                                        <p class="text-16-bold">This could look like:</p>
                                        <p>- Providing a single view of portfolio.</p>
                                        <p>- Actionable insights around planning and managing savings goals.</p>
                                        <p>- Providing options for investments and insurance.</p>
                                        <p>- Efficiently tracking expenses, instalments and reminders.</p>
                                        <p>If so, you are ideally suited to enter this global competition. Gamification, Crypto assets, smart mortgages, financial literacy…all welcome!</p>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-entry-2',
            [
                'label' => __( 'Title entry 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Retail Payments', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-entry-2',
            [
                'label' => __( 'Image entry 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-entry-2',
            [
                'label' => __( 'Content entry 2', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="content-wealth">
                                        <p>Is your Open Finance solution going further than enabling payments through APIs? Does it have a real use case to enhance the customer shopping experience, whether in-store or online?</p>
                                        <p class="text-16-bold">We’re looking for:</p>
                                        <p>- Frictionless.</p>
                                        <p>- Personalisation.</p>
                                        <p>- Insights into shopping cart.</p>
                                        <p>- Managing loyalty points.</p>
                                        <p>- Responsible purchases.</p>
                                        <p>- Managing returns, associated payments and settlement functions.</p>
                                        <p>If you’re innovating in any of these areas your product could make a very compelling entry.</p>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-entry-3',
            [
                'label' => __( 'Title entry 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Lending', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-entry-3',
            [
                'label' => __( 'Image entry 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-entry-3',
            [
                'label' => __( 'Content entry 3', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="content-wealth">
                                        <p>We’re looking for a product that uses open APIs to reimagine the traditional lending models and process.</p>
                                        <p class="text-16-bold">This can be in the areas of:</p>
                                        <p>- Customer credit checks and credit score.</p>
                                        <p>- Assessing past income/expense patterns.</p>
                                        <p>- P2P lending.</p>
                                        <p>- Affordable credit products.</p>
                                        <p>- Payment deferrals.</p>
                                        <p>- Micro financing.</p>
                                        <p>- Blockchain-based contracts and document management.</p>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'title-entry-4',
            [
                'label' => __( 'Title entry 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gain an advantage', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'img-entry-4',
            [
                'label' => __( 'Image entry 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );
        
        $this->add_control(
            'content-entry-4',
            [
                'label' => __( 'Content entry 4', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <div class="content-wealth">
                                        <p>The entries shall score additional points if their product/solutions are also able to make an impact in the following areas</p>
                                        <p>- <strong>Diversity:</strong> Addresses the needs of diverse consumer groups, 
                                        touching on gender, ageing populations, LGBTQ+, ethnic/racial minorities, etc.</p>
                                        <p>- <strong>Inclusion:</strong> Addresses the needs of financially excluded or underserved consumer groups.</p>
                                        <p>- <strong>Sustainability:</strong> Enables a lower carbon footprint, is environmentally friendly, drives responsible behaviour towards climate change..</p>
                                    </div>
                                ', 'plugin-name' ),
            ]
        );
        

        $this->add_control(
            'wrapper-participate',
            [
                'label' => __( 'Wrapper participate', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                                    <h3 class="title">Who can <br> participate?</h3>
                                    <div class="content">We would love for fintech start-ups and scale-ups from around the world to get involved. Ideally you have:</div>
                                    <ul class="list-service">
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            A registered company
                                        </li>
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            A clear business case and product market fit
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            At least a minimum viable product
                                        </li>
                                        <li class="rule-item">
                                            <img src="wp-content/themes/Mplus-OBE/assets/images/tick_icon.svg" alt="">
                                            Target consumer/customers
                                        </li>
                                    </ul>
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
    <div class="wrapper-appathon-wealth">
        <div class="wrapper">
            <div class="wrapper-content">
				<img class="thumbnail-wealth" src="" alt="">
                <div class="list-item">
                    <div class="wrapper-info" data-src='<?= $settings['img-entry-1']['url'] ?>'>
                        <h3 class="title"><?= $settings['title-entry-1'] ?></h3>
                        <?= $settings['content-entry-1'] ?>
                    </div>
                    <div class="wrapper-info" data-src='<?= $settings['img-entry-2']['url'] ?>'>
                        <h3 class="title"><?= $settings['title-entry-2'] ?></h3>
                        <?= $settings['content-entry-2'] ?>
                    </div>
                    <div class="wrapper-info" data-src='<?= $settings['img-entry-3']['url'] ?>'>
                        <h3 class="title"><?= $settings['title-entry-3'] ?></h3>
                        <?= $settings['content-entry-3'] ?>
                    </div>
                    <div class="wrapper-info" data-src='<?= $settings['img-entry-4']['url'] ?>'>
                        <h3 class="title"><?= $settings['title-entry-4'] ?></h3>
                        <?= $settings['content-entry-4'] ?>
                    </div>
                </div>
                <div class="slide-controls">
                    <button class="btn btn-icon btn-white prev-wealth">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                            <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                    </button>
                    <button class="btn btn-icon btn-white next-wealth">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                            <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="wrapper-content-mobile">
                <div class="wrapper-info-mobile">
                    <h3>
                        <?= $settings['title-entry-1'] ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                    </h3>
                    <div class="content-wealth-mobile">
                        <img class="thumbnail-wealth" src="<?= $settings['img-entry-1']['url'] ?>" alt="">
                        <?= $settings['content-entry-1'] ?>
                    </div>
                </div>
                <div class="wrapper-info-mobile">
                    <h3>
                        <?= $settings['title-entry-2'] ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                    </h3>
                    <div class="content-wealth-mobile">
                        <img class="thumbnail-wealth" src="<?= $settings['img-entry-2']['url'] ?>" alt="">
                        <?= $settings['content-entry-2'] ?>
                    </div>
                </div>
                <div class="wrapper-info-mobile">
                    <h3>
                        <?= $settings['title-entry-3'] ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                    </h3>
                    <div class="content-wealth-mobile">
                        <img class="thumbnail-wealth" src="<?= $settings['img-entry-3']['url'] ?>" alt="">
                        <?= $settings['content-entry-3'] ?>
                    </div>
                </div>
                <div class="wrapper-info-mobile">
                    <h3>
                        <?= $settings['title-entry-4'] ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                    </h3>
                    <div class="content-wealth-mobile">
                        <img class="thumbnail-wealth" src="<?= $settings['img-entry-4']['url'] ?>" alt="">
                        <?= $settings['content-entry-4'] ?>
                    </div>
                </div>
            </div>
            <div class="wrapper-participate">
                <?= $settings['wrapper-participate'] ?>
            </div>
        </div>
    </div>

    <script>
        var $listItem = $('.list-item');

        $listItem.on('init beforeChange', function(event, slick, currentSlide, nextSlide) {
            if(nextSlide == undefined) {
                nextSlide = 0;
            };
            
            var item = $($(slick.$slides)[nextSlide]);

            $('.thumbnail-wealth').attr('src', item.data('src'));

        });

        $listItem.slick({
            slidesToShow: 1,
            prevArrow: $('.prev-wealth'),
            nextArrow: $('.next-wealth'),
            infinite: true,
            slidesToScroll: 1,
            fade: true,
        });

        $('.wrapper-info-mobile h3').click(function() {
            if($(this).siblings().hasClass('show-wealth')) {
                $(this).siblings().removeClass('show-wealth');
            } else {
                $('.content-wealth-mobile').removeClass('show-wealth');
                $(this).siblings().addClass('show-wealth');
            }
        })
    </script>
<?php
    }

    protected function _content_template()
    {
    }
}
