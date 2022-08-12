<?php
class Elementor_SignUp_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'SignUp';
    }

    public function get_name()
    {
        return 'SignUp';
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

        // $this->add_control(  
        //     'content',
        //     [
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-signup">
                <div class="sign-up-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sig_up_logo.svg" alt="">
                </div>
                <div class="sign-up-background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sign_up_background.jpg" alt="">
                </div>
                <div class="sign-up-form">
                    <div class="wrapper-form">
                        <div class="form-header">
                            <div class="header-action">
                                <a href="#" class="link header-action-left">Back to Homepage</a>
                                <a href="#" class="link header-action-right">Sign in</a>
                            </div>
                            <hr>
                            <p class="text-16-normal"> Welcome to OBE</p>
                            <h4> Great to See You Here!</h4>
                        </div>    
                        <div class="form-control-inline form-control">
                            <div class="wrapper-inline">
                                <div class="input-left">
                                    <input placeholder="Fist Name" />
                                </div>
                                <div class="input-right">
                                    <input placeholder="Last Name"/>
                                </div>
                            </div>
                            <input placeholder="Enter your name"/>
                            <div class="wrapper-inline">
                                <div class="input-left">
                                    <input type="password" placeholder="Password*" />
                                </div>
                                <div class="input-right">
                                    <input type="password" placeholder="Confirm Password*"/>
                                </div>
                            </div>
                            <input placeholder="Your Job title"/>
                            <input placeholder="Organization"/>
                            <div class="wrapper-inline">
                                <div class="input-left">
                                    <select>
                                        <option value="hide">Select type of Organization</option>
                                        <option value="january">Ncc1</option>
                                        <option value="february">Ncc2</option>
                                    </select> 
                                </div>
                                <div class="input-right">
                                    <select>
                                        <option value="hide">Select Country</option>
                                        <option value="january">Viet Nam</option>
                                        <option value="february">English</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="check-item">
                                <input class="checkbox" type="checkbox">
                                <p class="text-14-normal">
                                    I consent to allow OBE to store and process my personal information submitted above to provide the content requested
                                </p>
                            </div>
                            <div class="check-item">
                                <input class="checkbox" type="checkbox">
                                <p class="text-14-normal">
                                    I agree to receive other communications from Open Banking Excellence via email
                                </p>
                            </div>
                            <button class="btn-primary">Create New Account</button>
                            <p class="text-14-normal text-privacy">
                                This information is stored in our CRM database and is used only to contact you. We never share your data with third parties. For details, see our
                                <a class="link">
                                    Privacy Policy.
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    protected function _content_template() {

    }
}