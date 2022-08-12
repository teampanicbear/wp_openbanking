<?php
class Elementor_MyAccountEdit_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'MyAccountEdit';
    }

    public function get_name()
    {
        return 'MyAccountEdit';
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
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <?php
        $current_user = wp_get_current_user();
        $fullname = $current_user->display_name;
        $first_name = $current_user->first_name;
        $last_name = $current_user->last_name;
        $user_email = $current_user->user_email;
        $user_id  = $current_user->ID;

        $user_meta = get_user_meta($user_id);
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
                        </div>
                        <hr />
                        <div class="form-control-inline content-body">
                            <div class="wrapper-inline">
                                <div class="input-left">
                                    <input required class='first_name' value='<?php echo $first_name; ?>' placeholder="Fist Name" />
                                </div>
                                <div class="input-right">
                                    <input required class='last_name' value='<?php echo $last_name; ?>' placeholder="Last Name" />
                                </div>
                            </div>
                            <input disabled value="<?php echo $user_email; ?>" placeholder="Email" />
                            <input class='your_job_title' value="<?php echo $your_job_title; ?>" placeholder="Job title" />
                            <div class="wrapper-inline">
                                <div class="input-left">
                                    <input class='organization' value="<?php echo $organization; ?>" placeholder="Organization" />
                                </div>
                                <div class="input-right">
                                    <select id='organization'>
                                        <option value="hide">Type of Organization</option>
                                        <?php
                                        $args = array(
                                            'post_status' => 'publish',
                                            'post_type' => 'organization',
                                            'posts_per_page' => -1,
                                        );
                                        $the_query = new WP_Query($args);
                                        ?>
                                        <?php if ($the_query->have_posts()) : ?>
                                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                                <option <?php echo $type_of_organization == get_the_title() ? 'selected' : '' ?> value="<?php the_title(); ?>">
                                                    <?php the_title(); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
                                    </select>
                                </div>
                            </div>
                            <select id='country'>
                                <option value="hide">Country</option>
                                <?php
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type' => 'country',
                                    'posts_per_page' => -1,
                                );
                                $the_query = new WP_Query($args);
                                ?>
                                <?php if ($the_query->have_posts()) : ?>
                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <option <?php echo $country == get_the_title() ? 'selected' : '' ?> value="<?php the_title(); ?>">
                                            <?php the_title(); ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </select>
                        </div>
                        <hr class="line-position" />
                        <div class="content-footer-edit">
                            <a href="<?= site_url('my-account') ?>" class="link">Cancel</a>
                            <button id='btn-edit-account' class="btn-primary">Save Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                $('#btn-edit-account').on('click', function() {
                    $('#loader').show();
                    let first_name = $('.first_name').val();
                    let last_name = $('.last_name').val();
                    let your_job_title = $('.your_job_title').val();
                    let organization = $('.organization').val();
                    let organization_opt = $('#organization').find(":selected").val();
                    let country_opt = $('#country').find(":selected").val();

                    let data = {
                        action: 'custom_update_user',
                        first_name: first_name,
                        last_name: last_name,
                        your_job_title: your_job_title,
                        organization: organization,
                        organization_opt: organization_opt,
                        country_opt: country_opt,
                    };
                    $.post(ajax_object.ajaxurl, data, function(response) {
                        if (response === 'success') {
                            $('#loader').hide();
                            $.alert({
                                title: 'Success',
                                content: 'Change info user success',
                                type: 'green',
                                useBootstrap: false
                            });
                        } else {
                            $('#loader').hide();
                            $.alert({
                                title: 'Error',
                                content: 'System error',
                                type: 'red',
                                useBootstrap: false
                            });
                        }
                    });

                });
            });
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
