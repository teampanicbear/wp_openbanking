<?php
class Elementor_CreateNewPassword_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'CreateNewPassword';
    }

    public function get_name()
    {
        return 'CreateNewPassword';
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $user_login = $_GET['login'];
        $key     = $_GET['key'];

        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-account-banner">
                <div class="wrapper">
                    <h1>Reset password</h1>
                </div>
        </div>
        <div class="wrapper-account-info">
            <div class="bottom-header"></div>
            <div class="wrapper wrapper-account-content">
                <div class="wrapper-account">
                    <div class="wrapper-content">
                        <div class="content-header">
                            <h5>Create new password</h5>
                            <h3>Create new password</h3>
                        </div>
                        <div class="content-title">
                            <p class="text-16-normal">Your new password must be different from your previous password</p>
                        </div>
                        <hr />
                        <div class="form-control-inline content-body">
                            <input type='password' id="new_pass" name="new_pass" placeholder="New password" />
                            <input type='password' id="confirm_new_pass" name="confirm_new_pass" placeholder="Confirm new password" />
                            <input id="user_login" type="hidden" name="user_login" value="<?php echo $user_login?>" />
                            <input id="key" type="hidden" name="user_login" value="<?php echo $key?>" />
                        </div>
                    </div>
                </div>
                <hr class="line-position" />
                <div class="content-footer-edit">
                    <a href="<?= site_url('') ?>" class="link">Cancel</a>
                    <button id='btn-create-new-pass' class="btn-primary">Save Update</button>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                $('#btn-create-new-pass').on('click', function() {
                    let new_pass = $('#new_pass').val();
                    let confirm_new_pass = $('#confirm_new_pass').val();
                    let user_login = $('#user_login').val();
                    let key = $('#key').val();
                    if (confirm_new_pass === '' || new_pass === '') {
                        $.alert({
							title: 'Warning',
							content: 'Not be empty',
							type: 'orange',
							useBootstrap: false
						});
                    }
                    else if (confirm_new_pass !== new_pass){
                        $.alert({
							title: 'Warning',
							content: 'Passwords do not match',
							type: 'orange',
							useBootstrap: false
						});
                    }
                    else{
                    $('#loader').show();
                    let data = {
                        action: 'create_new_password',
                        password: new_pass,
                        user_login: user_login,
                        key: key,
                    };
                    $.post(ajax_object.ajaxurl, data, function(response) {
                        if (response === 'success') {
                            $('#loader').hide();
                            $.alert({
                                title: 'Success',
                                content: 'Create new password success',
                                type: 'green',
                                useBootstrap: false
                            });
                        }
                        else {
                            $('#loader').hide();
                            $.alert({
									title: 'Error',
									content: 'The link has expired',
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

    protected function _content_template()
    {
    }
}
