<?php
/**
 * Template Name: Modify notification
 *
 * @package recruitfirst
 */


get_header();

$settings = get_option( 'rf-settings' );
$api_key = $settings['google_captcha_api'];

$country_code = RF_Language::get_country_code() ? RF_Language::get_country_code() : 'SG';

if ($country_code) {
    echo '<script>window.country_code = "'.$country_code.'";</script>';
};

$id = $_GET['id'];
$id = urlencode($id);
$sub_data = null;
if ($id) {
    $res = RF_API::get_sub_details($id);
    if ($res->success) {
        $sub_data = $res->data;
    }
}

$job_alert_url = get_page_url('templates/consolidation');

if ($id && $sub_data) :
    ?>
    <script id="sub-data" type="application/json">
        <?php echo json_encode($sub_data); ?>
    </script>
    <div class="site-main">
        <div class="consolidation-header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="container">
            <div class="consolidation-inner modify-form">
                <div class="modify-form__header text--center">
                    <h5><?php esc_html_e('Modify Notification', 'rf'); ?></h5>
                    <p><?php esc_html_e('Change your job alert filters', 'rf'); ?></p>
                </div>
                <form class="rf-form" id="alert-form" data-message-success="Update successfully!">
                    <h4 class="form__heading"><?php esc_html_e('Notify me by', 'rf'); ?>:</h4>
                    <div class="form__row">
                        <div class="form__field">
                            <label class="form__radio">
                                <input type="radio" checked name="notify_type" value="email">
                                <span class="checkmark"></span>
                                <span class="mask"></span>
                                <span><?php esc_html_e('Email', 'rf'); ?></span>
                            </label>
                        </div>
                        <span class="gap"></span>
                        <?php if ($country_code == 'CN') : ?>
                            <div class="form__field">
                                <label class="form__radio">
                                    <input type="radio" name="notify_type" value="wechat">
                                    <span class="checkmark"></span>
                                    <span class="mask"></span>
                                    <span><?php esc_html_e('Wechat', 'rf'); ?></span>
                                </label>
                            </div>
                        <?php else : ?>
                            <div class="form__field">
                                <label class="form__radio">
                                    <input type="radio" name="notify_type" value="whatsapp">
                                    <span class="checkmark"></span>
                                    <span class="mask"></span>
                                    <span><?php esc_html_e('Whatsapp', 'rf'); ?></span>
                                </label>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="form-email" class="form-email form-content">
                        <div class="form__field form__field--email">
                            <label class="form__label"><?php esc_html_e('Enter your email','rf'); ?></label>
                            <input class="form__control" type="email" name="EmailAddress" value="<?php echo $sub_data->EmailAddress; ?>">
                        </div>
                        <div class="form__field form__field--whatsapp hidden">
                            <div class="whatsapp-field">
                                (<span class="phone-code" contenteditable></span>)
                                <input class="phone-number" type="tel" placeholder="---------" name="OriginalMobileNo" />
                            </div>
                        </div>
                        <h4 class="form__heading"><?php esc_html_e('Select your preference', 'rf'); ?>:</h4>
                        <div class="form__field form__field--select">
                            <label class="form__label"><?php esc_html_e('Duration of notification','rf'); ?></label>
                            <input class="form__control form__control--date form__control--select" readonly type="text" name="duration" placeholder="<?php esc_html_e('DD-MM-YYYY to DD-MM-YYYY','rf'); ?>">
                        </div>
                        <div class="form__field form__field--select form__field-date">
                            <label class="form__label"><?php esc_html_e('Job type','rf'); ?></label>
                            <select class="form__control form__control--select" name="JobRoleTypeID">
                                <option value="1" selected><?php esc_html_e('Fulltime/Contract', 'rf'); ?></option>
                                <option value="2"><?php esc_html_e('Temporary/Part-time', 'rf'); ?></option>
                            </select>
                        </div>
                        <div class="form__field">
                            <select class="form__control form__control--select2" name="JobIndustryIDs[]" multiple="multiple" data-placeholder="<?php esc_html_e('Industries','rf'); ?>" data-text="<?php esc_html_e('Select all', 'rf'); ?>">
                                <option disabled>select-all</option>
                            </select>
                        </div>
                        <div class="form__row">
                            <div class="form__field form__field--select">
                                <label class="form__label"><?php esc_html_e('Location','rf'); ?></label>
                                <select class="form__control form__control--select" name="JobCountryID">
                                    <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                </select>
                            </div>
                            <span class="gap"></span>
                            <div class="form__field form__field--select">
                                <label class="form__label"><?php esc_html_e('District/Area','rf'); ?></label>
                                <select class="form__control form__control--select" name="JobCityLandmarkID">
                                    <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form__field form__field--submit text--center">
                            <a class="btn btn--plain btn-back" href="<?php echo $job_alert_url; ?>?id=<?php echo $id; ?>">
                                <?php esc_html_e('Back', 'rf'); ?>
                            </a>
                            <button
                                class="btn btn-submit g-recaptcha"
                                data-sitekey="<?php echo $api_key; ?>"
                                data-callback="onSubmit"
                                data-action="submit"
                            >
                                <span class="btn-text"><?php esc_html_e('Save changes'); ?></span>
                                <span class="btn-spinner">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-spinner" viewBox="0 0 20 20"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z" fill="currentColor"/></svg>
                                    </span>
                            </button>
                            <input type="hidden" name="PhoneCode">
                            <input type="hidden" name="JobFunctionIDs">
                            <input type="hidden" name="PeriodFrom">
                            <input type="hidden" name="PeriodTo">
                            <input type="hidden" name="IsSubscripted" value="true">
                            <input type="hidden" name="verify_nonce" value="<?php echo wp_create_nonce( "verify_form_request" ); ?>">
                            <input type="hidden" name="action" value="send_subscribe_form">
                        </div>
                    </div>
                    <?php if ($country_code == 'CN') : ?>
                        <div id="form-wechat" class="form-wechat form-content hidden">
                            <h4 class="form__heading"><?php esc_html_e('Follow us to begin!', 'rf'); ?>:</h4>
                            <p class="text--left"><?php esc_html_e('Scan the QR code or search our ID "RecruitFirst".', 'rf'); ?></p>
                            <img class="mgt--40" src="<?php echo THEME_URL; ?>/images/wechat-qr.jpg" alt="Wechat QR Code" width="240">
                        </div>
                    <?php endif; ?>
                    <div class="form__message form__message--large form__message--push-top"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit() {
            theme.alertForm()
        }
    </script>
<?php else : ?>
    <section class="error-404 not-found">
        <div class="error-404__wrapper">
            <h1>404</h1>
            <h2><?php esc_html_e('No found subscription data', 'rf'); ?></h2>
            <p><?php esc_html_e('Sorry, but we are not able to find the job you are looking for.', 'rf'); ?></p>
        </div>
    </section><!-- .error-404 -->
<?php endif;
get_footer('v2');
