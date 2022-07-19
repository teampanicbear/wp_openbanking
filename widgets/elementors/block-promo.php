<?php
class Elementor_BlockPromo_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'BlockPromo';
    }

    public function get_name()
    {
        return 'BlockPromo';
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
			'show_promo',
			[
				'label' => __( 'Show Promo', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'true',
			]
		);


        $this->add_control(
            'image',
            [
                'label' => __('Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [
                    'image',
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<div class="item content">
                                    <h6 class="sign-heading">Want to know more about Open Finance?</h6>
                                    <a href="#" class="link sign-link" >Download our E-book<img src="wp-content/themes/Mplus-OBE/assets/images/navi_benefit.svg" alt=""></a>	
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
        <div class="promo-popup">
            <div class="">
                <div id="promo-container" class="promo-container">
                    <div class="sig-container-item">
                        <img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
                        <div class="container">
                            <div class="item image">
                                <img class="icon-ball" src="<?= $settings['image']['url'] ?>" alt="">
                            </div>
                            <?= $this->get_render_attribute_string('content') ?><?= $settings['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //Show popup
	window.addEventListener('DOMContentLoaded', (event) => {
            function loadPopupPromo()
            {
			let is_show_promo = '<?php echo $settings['show_promo'] ?>';
			if (is_show_promo === 'true')
			{
                //new visitor
                let result = checkCookie("PROMO_POPUP");
                if (result == true) {
                    $(".promo-popup").addClass('pop-show');
                }
            }
            else{
                    //always show when visit
                    $(".promo-popup").addClass('pop-show');
                }			
            }

            function closePopupPromo(){
                $(".promo-popup").removeClass('pop-show');
            }

            $('.promo-popup .close-pop-up').on('click', function(e) {
                closePopupPromo();
            });

            function checkCookie(cname) {
                let cookie = getCookie(cname);
                if (cookie != "") {
                    return false;
                } else {
                    return setCookie(cname, true, 1);
                }
            }

            function setCookie(cname,cvalue,exdays) {
                let d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                let expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                return true;
            }

            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            let isHomePage = '<?php echo is_front_page(); ?>';
            if(isHomePage=='1'){
                loadPopupPromo();
            }
        });
        </script>

<?php
    }

    protected function _content_template()
    {
    }
}
