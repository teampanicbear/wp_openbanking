<?php
/**
 * Template Name: Join us
 *
 * @package recruitfirst
 */

get_header();

$settings = get_option( 'rf-settings' );
$api_key = $settings['google_captcha_api'];

// Get page content
$prefix = 'rf_';
$s1_heading = get_post_meta(get_the_ID(), $prefix . 's1_heading', true);
$s1_button = get_post_meta(get_the_ID(), $prefix . 's1_button', true);
$s1_description = get_post_meta(get_the_ID(), $prefix . 's1_description', true);

$s2_heading = get_post_meta(get_the_ID(), $prefix . 's2_heading', true);
$s2_content = get_post_meta(get_the_ID(), $prefix . 's2_content', true);

$s3_heading = get_post_meta(get_the_ID(), $prefix . 's3_heading', true);
$s3_image = get_post_meta(get_the_ID(), $prefix . 's3_image', true);
$s3_content = get_post_meta(get_the_ID(), $prefix . 's3_content', true);

$s4_heading = get_post_meta(get_the_ID(), $prefix . 's4_heading', true);
$s4_description = get_post_meta(get_the_ID(), $prefix . 's4_description', true);
$country_code = RF_Language::get_country_code();
$locations = array(
    'SG' => 'Singapore',
    'TW' => 'Taiwan',
    'HK' => 'Hong Kong',
    'ID' => 'Indonesia',
    'MY' => 'Malaysia',
    'CN' => 'Mainland China'
);
$form_message = get_post_meta(get_the_ID(), $prefix . 'form_message', true);

$s1_images = rwmb_meta( 's1_images', array( 'size' => 'medium' ) );
?>

    <div class="site-main joinus">
        <div class="joinus-first">
            <div class="joinus-header">
                <h1 class="page-title">
                    <?php the_title(); ?>
                </h1>
                <div class="joinus-header__content">
                    <div class="container">
                        <div class="joinus-header__heading">
                            <h2 class="joinus-header__title">
                                <?php echo $s1_heading; ?>
                            </h2>
                            <a href="#joinus-form" class="btn anchor">
                                <?php echo $s1_button; ?>
                            </a>
                        </div>
                        <?php if (!wp_is_mobile()) : ?>
                            <p class="joinus-header__description text--large">
                                <?php echo $s1_description; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (count($s1_images) > 0) : ?>
                <?php if (!wp_is_mobile()) : ?>
                            <div class="joinus-header__banner">
                                <?php foreach ( $s1_images as $image ) : ?>
                                    <div class="joinus-header__gallery parallax-element">
                                        <img loading="lazy" src="<?php echo $image['full_url']; ?>" alt="<?php echo $image['alt']; ?>" width="430">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                <?php endif; ?>
                <?php if (wp_is_mobile()) : ?>
                <div class="joinus-header__slider swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ( $s1_images as $image ) : ?>
                            <div class="joinus-header__gallery swiper-slide">
                                <img loading="lazy" src="<?php echo $image['full_url']; ?>" alt="<?php echo $image['alt']; ?>" width="430">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <p class="joinus-header__description">
                    <?php echo $s1_description; ?>
                </p>
            <?php endif; ?>
            <?php endif; ?>
            <div class="joinus-why">
                <div class="container">
                    <?php if (!wp_is_mobile()) : ?>
                        <div class="joinus-why__image">
                            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/why-image.png"
                                 alt="Why work at RecruitFirst">
                        </div>
                    <?php endif; ?>
                    <div class="joinus-why__star">
                        <img loading="lazy" src="<?php echo THEME_URL; ?>/images/join-us/star.png" alt="Why work at RecruitFirst star">
                    </div>
                    <h2 class="joinus-why__heading">
                        <?php echo $s2_heading; ?>
                    </h2>
                    <div class="joinus-why__content">
                        <div class="joinus-why__main">
                            <?php foreach ($s2_content as $item) : ?>
                                <div class="joinus-why__info">
                                    <div class="joinus-why__icon">
                                        <?php echo $item['rf_icon']; ?>
                                    </div>
                                    <h5 class="joinus-why__title splitting-line"><?php echo $item['rf_title']; ?></h5>
                                    <p class="joinus-why__description splitting-line">
                                        <?php echo $item['rf_description']; ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="joinus-why__list">
                            <?php foreach ($s2_content as $key => $item) : ?>
                                <div class="joinus-why__list-item<?php if ($key == 0) echo ' active'; ?>">
                                    <div class="joinus-why__list-icon">
                                        <?php echo $item['rf_icon']; ?>
                                    </div>
                                    <span>
                                    <?php echo $item['rf_title']; ?>
                                </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="joinus-job">
            <div class="container">
                <div class="joinus-job__wrapper ten-twelfths">
                    <div class="grid justify--between align--center">
                        <div class="grid__column six-twelfths desk--eight-twelfths tablet--one-whole mobile--one-whole">
                            <div class="joinus-job__content">
                                <h2 class="joinus-job__heading"><?php echo $s3_heading; ?></h2>
                                <div class="joinus-job__content">
                                    <?php echo $s3_content; ?>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column five-twelfths tablet--one-whole mobile--one-whole">
                            <div class="joinus-job__image">
                                <img loading="lazy" src="<?php echo wp_get_attachment_url($s3_image); ?>"
                                     alt="<?php echo $s3_heading; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="joinus-application" id="joinus-form">
            <div class="container">
                <h3 class="joinus-application__heading">
                    <?php echo $s4_heading; ?>
                </h3>
                <span class="joinus-application__description">
                <?php echo $s4_description; ?>
            </span>
                <div class="joinus-application__form">
                    <form id="join-us-form" class="rf-form" method="POST" action="" novalidate="novalidate" data-message-success="<?php echo $form_message; ?>">
                        <div class="form__container">
                            <h5 class="form__heading form__heading--large"><?php esc_html_e('Job type', 'rf'); ?></h5>
                            <div class="form__row">
                                <div class="form__field">
                                    <label class="form__radio">
                                        <input type="radio" checked name="JobType" value="Full-time">
                                        <span class="checkmark"></span>
                                        <span class="mask"></span>
                                        <span><?php esc_html_e('Full-time', 'rf'); ?></span>
                                    </label>
                                </div>
                                <span class="gap"></span>
                                <div class="form__field">
                                    <label class="form__radio">
                                        <input type="radio" name="JobType" value="Internship">
                                        <span class="checkmark"></span>
                                        <span class="mask"></span>
                                        <span><?php esc_html_e('Internship', 'rf'); ?></span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="form__heading form__heading--large"><?php esc_html_e('Personal Information', 'rf'); ?></h5>
                            <div class="form__row">
                                <div class="form__field">
                                    <label class="form__label" for="name"><?php esc_html_e('Full name', 'rf'); ?></label>
                                    <input type="text" id="name" class="form__control" name="FullName">
                                </div>
                                <span class="gap"></span>
                                <div class="form__field">
                                    <label class="form__label" for="email"><?php esc_html_e('Email', 'rf'); ?></label>
                                    <input type="email" id="email" class="form__control" name="EmailAddress" required>
                                </div>
                            </div>
                            <div class="form__row">
                                <div class="form__field">
                                    <label class="form__label" for="phone"><?php esc_html_e('Phone number', 'rf'); ?></label>
                                    <input type="tel" id="phone" name="PhoneNumber" class="form__control">
                                </div>
                                <span class="gap"></span>
                                <div class="form__field form__field--select">
                                    <label class="form__label" for="location"><?php esc_html_e('Location', 'rf'); ?></label>
                                    <select id="location" class="form__control form__control--select" name="CountryCode">
                                        <?php foreach ($locations as $key => $location) : ?>
                                            <option value="<?php echo $key; ?>"<?php if ($key == $country_code) echo ' selected'; ?>><?php echo esc_html__($location, 'rf'); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <h5 class="form__heading form__heading--large">
                                <?php esc_html_e('Say Hello to Our Hiring Manager', 'rf'); ?>
                            </h5>
                            <div class="form__field wpforms-field-textarea">
                                <label class="form__label<?php if (wp_is_mobile()) echo ' hidden'; ?>" for="message"><?php esc_html_e('Share with our hiring manager why do you want to work here', 'rf'); ?></label>
                                <textarea id="message" placeholder="<?php if (wp_is_mobile()) echo __('Share with our hiring manager why do you want to work here', 'rf'); ?>" class="form__control form__control--textarea" name="Content"></textarea>
                            </div>
                            <div class="form__field">
                                <div id="dropzone" class="dropzone" data-remove-text="<?php esc_html_e('Remove file', 'rf'); ?>">
                                    <p class="dz-message"><?php esc_html_e('Drag & drop your resume/cv here or click here to browse', 'rf'); ?></p>
                                </div>
                                <input type="hidden" name="fileUploaded">
                            </div>
                        </div>
                        <div class="form__field form__field--submit text--center">
                            <input type="hidden" name="action" value="send_contact_ir">
                            <input type="hidden" name="verify_nonce" value="<?php echo wp_create_nonce( "verify_form_request" ); ?>">
                            <button
                                class="btn btn-submit g-recaptcha"
                                data-sitekey="<?php echo $api_key; ?>"
                                data-callback="onSubmit"
                                data-action="submit"
                            >
                                <span class="btn-text"><?php esc_html_e('Submit', 'rf'); ?></span>
                                <span class="btn-spinner">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-spinner" viewBox="0 0 20 20"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z" fill="currentColor"/></svg>
                                    </span>
                            </button>
                        </div>
                        <div class="form__message form__heading--large form__message--push-top"></div>
                    </form>
                </div>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="joinus-application__plane">
                    <img loading="lazy" src="<?php echo THEME_URL; ?>/images/join-plane2.png" alt="Join us">
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit() {
            theme.submitJoinUsForm()
        }
    </script>
<?php
get_footer('v2');
