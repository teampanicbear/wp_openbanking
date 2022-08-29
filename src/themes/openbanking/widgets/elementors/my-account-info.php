<?php
class Elementor_MyAccountInfo_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'MyAccountInfo';
    }

    public function get_name()
    {
        return 'MyAccountInfo';
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
        <?php
           $current_user = wp_get_current_user();
           $fullname = $current_user->display_name;
           $user_email = $current_user->user_email;
           $user_id  = $current_user->ID;

           $user_meta = get_user_meta( $user_id );
           $your_job_title = $user_meta['your_job_title'][0];
           $type_of_organization = $user_meta['type_of_organization'][0];
           $organization = $user_meta['organization'][0];
           $country = $user_meta['country'][0];
           $campfire = $user_meta['campfire'][0];
        ?>
            <div class="wrapper-account-info">
                <div class="bottom-header"></div>
                <div class="wrapper wrapper-account-content">
                    <div class="wrapper-account">
                        <div class="wrapper-content">
                            <div class="content-header">
                                <h5>General information</h5>
                                <h3>General information</h3>
                                <span>
                                    <img class="bg-blog-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/edit.svg" alt="">
                                    <a href="<?= site_url('my-account-edit') ?>" class="link"> Edit</a>
                                </span>
                            </div>
                            <hr />
                            <div class="content-body">
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Full name</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $fullname; ?></p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Email</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $user_email; ?></p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Job title</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $your_job_title; ?> </p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Organization</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $organization; ?></p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Type of Organization</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $type_of_organization; ?></p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Country</p>
                                    </div>
                                    <div class="content-body-text">
                                        <p><?php echo $country; ?></p>
                                    </div>
                                </div>
                                <div class="content-body-item">
                                    <div class="content-body-field">
                                        <p class="text-16-bold">Password</p>
                                    </div>
                                    <div class="content-body-text text-color-disable">
                                        <p  class="text-color-disable"> <?php if(get_user_meta($user_id,"last_time_change",false)[0]) echo "Last changed from ".get_user_meta($user_id,"last_time_change",false)[0] ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="content-footer">
                                <!-- <p>
                                    <a href="#"  class="text-color-disable">
                                        Delete your account
                                    </a>
                                </p>
                                </p> -->
                                <a id="change-pass" class="link-change ndialog"  data-target="#change_password_popup"> Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pop-up ndialog-wrap" id="change_password_popup">
			<div class="wrapper-popup ndialog-content">
				<div id="sign-container" class="sign-container change-password-container">
					<div class="sig-container-item">
						<img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
						<h5 class="sign-heading">Change password</h5>
						<p class="text-16-normal"> <?php if (get_user_meta($user_id,"last_time_change",false)[0]) echo "Your password is changed from ".get_user_meta($user_id,"last_time_change",false)[0] ?></p>
						<div class="form-control-input pb10">
							<input name="current-pass" id="current-pass" type="password" placeholder="Current password"/>
							<input name="new-pass" id="new-pass" type="password" placeholder="New password"/>
							<input name="confirm-pass" id="confirm-pass" type="password" placeholder="Confirm new password"/>
                            <span id='message'></span>
						</div>
						<div class="form-control-action">
							<button id="btn-change-pass" name="submit-change" class="btn-primary change-button">Update new password</button>
						</div>
					</div>
				</div>
			</div>
            <div  id ='loader-pop-up-change-password' class="load-container loading"><div class="loader-pop-up-change-password"></div></div>
		</div>
        <script>
            jQuery(document).ready(function($) {
                $('#change-pass').on('click',function(){
                    $('.ndialog-wrap').show();
                })
                $('#btn-change-pass').on('click', function(e) {
                    let new_pass = $('#new-pass').val();
                    let confirm_pass = $('#confirm-pass').val();
                    let current_pass = $('#current-pass').val();
                    if (current_pass === '' || confirm_pass === '' || new_pass === '') {
                        $.alert({
							title: 'Warning',
							content: 'Not be empty',
							type: 'orange',
							useBootstrap: false
						});
                    }
                    else if (confirm_pass !== new_pass){
                        $.alert({
							title: 'Warning',
							content: 'Passwords do not match',
							type: 'orange',
							useBootstrap: false
						});
                    }
                    else{
                        $('#loader-pop-up-change-password').show();
                        let data =  {
                                action: 'custom_change_password',
                                new_pass: new_pass,
                                confirm_pass: confirm_pass,
                                current_pass: current_pass
                            };
                        $.post(ajax_object.ajaxurl,data,function(response){
                            if(response === 'success') {
                                $('#loader-pop-up-change-password').hide();
                                $.alert({
									title: 'Success',
									content: 'Change password success',
									type: 'green',
									useBootstrap: false
								});
                                $('.ndialog-wrap').hide();
                            }
                            else if (response === 'wrong password') {
                                $('#loader-pop-up-change-password').hide();
                                $('#loader-pop-up-reset-password').hide();
								$.alert({
									title: 'Warning',
									content: 'Incorrect password',
									type: 'red',
									useBootstrap: false
								});
                            }
                            else{
                                $('#loader-pop-up-change-password').hide();
                                $.alert({
									title: 'Error',
									content: 'System error',
									type: 'red',
									useBootstrap: false
								});
                            }
                        });
                    }
                    });
            });
        </script>
        <?php
    }

    protected function _content_template() {

    }
}