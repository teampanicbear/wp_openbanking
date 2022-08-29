<?php
/**
 * Template Name: Employer
 *
 * @package recruitfirst
 */

get_header();
$settings = get_option( 'rf-settings' );
$api_key = $settings['google_captcha_api'];
$contact_url = get_page_url('templates/contact');

// Get page content
$prefix = 'rf_';

$s1_heading = get_post_meta(get_the_ID(), $prefix . 's1_heading', true);
$s1_description = get_post_meta(get_the_ID(), $prefix . 's1_description', true);
$s1_content = get_post_meta(get_the_ID(), $prefix . 's1_content', true);

$s2_heading = get_post_meta(get_the_ID(), $prefix . 's2_heading', true);
$s2_initiation = get_post_meta(get_the_ID(), $prefix . 's2_initiation', true);
$s2_hiring = get_post_meta(get_the_ID(), $prefix . 's2_hiring', true);
$s2_digital = get_post_meta(get_the_ID(), $prefix . 's2_digital', true);
$initiation_title = get_post_meta(get_the_ID(), $prefix . 'initiation_title', true);
$hiring_title = get_post_meta(get_the_ID(), $prefix . 'hiring_title', true);
$digital_title = get_post_meta(get_the_ID(), $prefix . 'digital_title', true);

$s3_heading = get_post_meta(get_the_ID(), $prefix . 's3_heading', true);
$s3_description = get_post_meta(get_the_ID(), $prefix . 's3_description', true);
$s3_content = get_post_meta(get_the_ID(), $prefix . 's3_content', true);

$s4_heading = get_post_meta(get_the_ID(), $prefix . 's4_heading', true);
$s4_description = get_post_meta(get_the_ID(), $prefix . 's4_description', true);
$s4_content = get_post_meta(get_the_ID(), $prefix . 's4_content', true);

$s5_heading = get_post_meta(get_the_ID(), $prefix . 's5_heading', true);
$s5_payroll = get_post_meta(get_the_ID(), $prefix . 's5_payroll', true);
$s5_staffing = get_post_meta(get_the_ID(), $prefix . 's5_staffing', true);
$s5_rpobpo = get_post_meta(get_the_ID(), $prefix . 's5_rpo-bpo', true);

$s6_heading = get_post_meta(get_the_ID(), $prefix . 's6_heading', true);
$s6_subtitle = get_post_meta(get_the_ID(), $prefix . 's6_subtitle', true);
$s6_acquisition = get_post_meta(get_the_ID(), $prefix . 's6_acquisition', true);
$s6_management = get_post_meta(get_the_ID(), $prefix . 's6_management', true);
$s6_advisory = get_post_meta(get_the_ID(), $prefix . 's6_advisory', true);

$s7_heading = get_post_meta(get_the_ID(), $prefix . 's7_heading', true);
$form_message = get_post_meta(get_the_ID(), $prefix . 'form_message', true);

$country_code = RF_Language::get_country_code();
$current_city = get_city_name($country_code);

$countries = RF_API::get_locations()->data;

$locations = array(
    'Singapore' => __('Singapore', 'rf'),
    'Hong Kong' => __('Hong Kong', 'rf'),
    'Kuala Lumpur' => __('Kuala Lumpur', 'rf'),
    'Shanghai' => __('Shanghai', 'rf'),
    'Taipei' => __('Taipei', 'rf'),
    'Jakarta' => __('Jakarta', 'rf')
);

if ($current_city) {
    $locations = array($current_city => __($current_city, 'rf')) + $locations;
    $locations = array_unique($locations);
}

?>

<div class="site-main">
    <div class="employer-featured">
        <div class="employer-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="employer-header__bg">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo THEME_URL; ?>/images/employer/header-mb.png">
                    <img src="<?php echo THEME_URL; ?>/images/employer/employer-header.png" alt="<?php the_title(); ?>">
                </picture>
            </div>
        </div>
        <div class="container">
            <div class="employer-section__header">
                <h2><?php echo $s1_heading; ?></h2>
                <p><?php echo $s1_description ?></p>
            </div>

            <div class="employer-circle">
                <?php if (!custom_wp_is_mobile()) : ?>
                <div class="employer-circle__items">
                    <?php foreach ($s1_content as $key => $item) :
                        $icon = wp_get_attachment_image_src($item['rf_icon']);
                        $label_position = array('top', 'right', 'right', 'bottom', 'bottom', 'left', 'left')
                    ?>
                        <div class="employer-circle__item">
                            <span class="employer-circle__label employer-circle__label--<?php echo $label_position[$key]; ?>"><?php echo $item['rf_title']; ?></span>
                            <span class="employer-circle__icon<?php if ($key == 0) echo ' active'; ?>">
                            <img loading="lazy" src="<?php echo $icon[0];?>" alt="<?php echo $item['rf_title']; ?>" width="<?php echo $icon[1] / 2;?>">
                        </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                    <div class="employer-bubbles">
                        <span class="employer-bubble-1">
                        </span>
                        <span class="employer-bubble-2">
                        </span>
                        <span class="employer-bubble-3">
                        </span>
                        <span class="employer-bubble-4">
                        </span>
                    </div>
                <?php endif; ?>
                <div class="employer-circle__content">
                    <?php foreach ($s1_content as $key => $item) :
                        $icon = wp_get_attachment_image_src($item['rf_icon']);
                    ?>
                        <div class="employer-circle__content-item">
                            <span class="employer-circle__icon hidden">
                                <img loading="lazy" src="<?php echo $icon[0];?>" alt="<?php echo $item['rf_title']; ?>" width="<?php echo $icon[1] / 2;?>">
                            </span>
                            <h4 class="h5 splitting-line"><?php echo $item['rf_title']; ?></h4>
                            <p class="splitting-line"><?php echo $item['rf_description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="how">
        <div class="container">
            <div class="how-header">
                <h2><?php echo $s2_heading; ?></h2>
            </div>
            <div class="grid grid--stackable">
                <?php if (!wp_is_mobile()) : ?>
                <div class="grid__column three-twelfths mobile--hidden tablet--hidden">
                    <div class="how__nav">
                        <a href="#step-1" class="active anchor" data-offset="240"><?php echo $initiation_title; ?></a>
                        <a href="#step-2" class="anchor" data-offset="240"><?php echo $hiring_title; ?></a>
                        <a href="#step-3" class="anchor" data-offset="240"><?php echo $digital_title; ?></a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="grid__column five-twelfths desk--one-whole tablet--one-whole mobile--one-whole">
                    <div class="how__content">
                        <div class="how__content-inner">
                            <div id="step-1" class="how__step">
                                <div class="how__step-header">
                                    <p><?php esc_html_e('Step 1', 'rf'); ?></p>
                                    <h3 class="h4 how__step-title"><?php echo $initiation_title; ?></h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 30 30"><circle cx="15" cy="15" r="15" fill="#fff" opacity=".1"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M10.5 13.5L15 18l4.5-4.5"/></svg>
                                </div>
                                <ul class="how__step-list">
                                    <?php foreach ($s2_initiation as $item) : ?>
                                        <li class="how-animate">
                                            <h5><?php echo $item['rf_title'] ;?></h5>
                                            <?php if ($item['rf_description']) {
                                                echo $item['rf_description'];
                                            } ?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div id="step-2" class="how__step">
                                <div class="how__step-header">
                                    <p><?php esc_html_e('Step 2', 'rf'); ?></p>
                                    <h3 class="h4 how__step-title"><?php echo $hiring_title; ?></h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 30 30"><circle cx="15" cy="15" r="15" fill="#fff" opacity=".1"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M10.5 13.5L15 18l4.5-4.5"/></svg>
                                </div>
                                <ul class="how__step-list">
                                    <?php foreach ($s2_hiring as $item) : ?>
                                        <li class="how-animate">
                                            <h5><?php echo $item['rf_title'] ;?></h5>
                                            <?php if ($item['rf_description']) {
                                                echo $item['rf_description'];
                                            } ?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div id="step-3" class="how__step">
                                <div class="how__step-header">
                                    <p><?php esc_html_e('Step 3', 'rf'); ?></p>
                                    <h3 class="h4 how__step-title"><?php echo $digital_title; ?></h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 30 30"><circle cx="15" cy="15" r="15" fill="#fff" opacity=".1"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M10.5 13.5L15 18l4.5-4.5"/></svg>
                                </div>
                                <ul class="how__step-list">
                                    <?php foreach ($s2_digital as $item) : ?>
                                        <li class="how-animate">
                                            <h5><?php echo $item['rf_title'] ;?></h5>
                                            <?php if ($item['rf_description']) {
                                                echo $item['rf_description'];
                                            } ?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid__column four-twelfths desk--one-whole tablet--one-whole mobile--one-whole">
                    <div class="how__rocket-wrapper">
                        <div class="how__rocket-circle">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <img loading="lazy" class="how__rocket" src="<?php echo THEME_URL; ?>/images/employer/how-rocket2.png" alt="How it works" width="470">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="employer-series">
        <div class="container">
            <div class="employer-section__header employer-section__header--dark">
                <h2><?php echo $s3_heading; ?></h2>
                <p><?php echo $s3_description; ?></p>
            </div>
            <div class="grid grid--four-columns justify--center grid--doubling grid--equal-height mgt--80">
                <?php foreach ($s3_content as $item) :
                    $icon = wp_get_attachment_image_src($item['rf_icon']);
                ?>
                    <div class="grid__column">
                        <div class="series-card">
                        <span class="series-card__icon">
                            <img loading="lazy" src="<?php echo $icon[0]; ?>" alt="<?php echo $item['rf_title']; ?>" width="<?php echo $icon[1] / 2; ?>" height="<?php echo $icon[1] / 2; ?>">
                        </span>
                            <h3><?php echo $item['rf_title']; ?></h3>
                            <p><?php echo $item['rf_description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="experts">
        <div class="container">
            <div class="employer-section__header">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/employer/star.png" alt="<?php echo $s4_heading; ?>" width="64">
                <h2><?php echo $s4_heading; ?></h2>
                <p><?php echo $s4_description; ?></p>
            </div>
            <?php if (custom_wp_is_mobile()) : ?>
            <div class="experts__header">
                <select name="industries" class="form__control form__control--no-label form__control--select">
                    <option value="*" selected><?php esc_html_e('All locations', 'rf'); ?></option>
                    <?php foreach ($locations as $key => $location) : ?>
                        <option value=".<?php echo sanitize_title_with_dashes($key); ?>"><?php echo $location; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php else: ?>
            <div class="experts__header">
                <a href="*" class="active"><?php esc_html_e('All', 'rf'); ?></a>
                <?php foreach ($locations as $key => $location) : ?>
                    <a href=".<?php echo sanitize_title_with_dashes($key); ?>"><?php echo $location; ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="experts__field">
                <?php foreach ($s4_content as $item) :
                    $class = implode(' ', $item['rf_locations']);
                ?>
                    <div class="field-card <?php echo $class; ?>">
                        <div class="field-card__inner">
                            <?php if ($item['rf_icon']) :
                                $icon = wp_get_attachment_image_url($item['rf_icon']);
                            ?>
                                <span class="field-card__icon">
                                    <img loading="lazy" src="<?php echo $icon; ?>" alt="<?php echo $item['rf_title']; ?>">
                                </span>
                            <?php endif; ?>
                            <h3><?php echo $item['rf_title']; ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="employer-services">
        <div class="container">
            <div class="employer-section__header">
                <h2><?php echo $s5_heading; ?></h2>
            </div>
            <div class="grid justify--center grid--equal-height mgt--70">
                <div class="grid__column four-twelfths tablet--one-half mobile--one-whole">
                    <div class="service-card">
                        <div class="service-card__header">
                            <span class="service-card__icon">
                                <img loading="lazy" src="<?php echo wp_get_attachment_url($s5_staffing['rf_icon']); ?>" alt="<?php echo $s5_staffing['rf_title']; ?>" width="100">
                            </span>
                            <h3><?php echo $s5_staffing['rf_title']; ?></h3>
                        </div>
                        <div class="service-card__content">
                            <?php echo $s5_staffing['rf_content']; ?>
                        </div>
                        <div class="service-card__footer">
                            <a href="#book-package" data-field="0" data-open-popup class="btn btn--primary"><?php esc_html_e('Get Started', 'rf'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="grid__column four-twelfths tablet--one-half mobile--one-whole">
                    <div class="service-card service-card--secondary">
                        <div class="service-card__header">
                            <span class="service-card__icon">
                                <img loading="lazy" src="<?php echo wp_get_attachment_url($s5_payroll['rf_icon']); ?>" alt="<?php echo $s5_payroll['rf_title']; ?>" width="100">
                            </span>
                            <h3><?php echo $s5_payroll['rf_title']; ?></h3>
                        </div>
                        <div class="service-card__content">
                            <?php echo $s5_payroll['rf_content']; ?>
                        </div>
                        <div class="service-card__footer">
                            <a href="#book-package" data-field="1" data-open-popup class="btn btn--white"><?php esc_html_e('Get Started', 'rf'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="grid__column four-twelfths tablet--one-half mobile--one-whole">
                    <div class="service-card service-card--primary">
                        <div class="service-card__header">
                            <span class="service-card__icon">
                                <img loading="lazy" src="<?php echo wp_get_attachment_url($s5_rpobpo['rf_icon']); ?>" alt="<?php echo $s5_rpobpo['rf_title']; ?>" width="100">
                            </span>
                            <h3><?php echo $s5_rpobpo['rf_title']; ?></h3>
                        </div>
                        <div class="service-card__content scroll-container">
                            <?php echo $s5_rpobpo['rf_content']; ?>
                        </div>
                        <div class="service-card__footer">
                            <a href="#book-package" data-field="2" data-open-popup class="btn"><?php esc_html_e('Get Started', 'rf'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid justify--center mgt--90">
                <div class="grid__column eight-twelfths tablet--one-whole mobile--one-whole">
                    <h4 class="h5"><?php echo $s6_subtitle; ?></h4>
                    <h2><?php echo $s6_heading; ?></h2>
                </div>
            </div>
            <div class="grid">
                <div class="grid__column two-twelfths tablet--hidden mobile--hidden"></div>
                <div class="grid__column three-twelfths tablet--four-twelfths mobile--one-whole">
                    <div class="employer-services__list">
                        <h4 class="h5"><?php echo $s6_acquisition['rf_title']; ?></h4>
                        <ul>
                            <?php foreach ($s6_acquisition['rf_content'] as $item) {
                                echo '<li>'. $item .'</li>';
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="grid__column three-twelfths tablet--four-twelfths mobile--one-whole">
                    <div class="employer-services__list">
                        <h4 class="h5"><?php echo $s6_management['rf_title']; ?></h4>
                        <ul>
                            <?php foreach ($s6_management['rf_content'] as $item) {
                                echo '<li>'. $item .'</li>';
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="grid__column three-twelfths tablet--four-twelfths mobile--one-whole">
                    <div class="employer-services__list">
                        <h4 class="h5"><?php echo $s6_advisory['rf_title']; ?></h4>
                        <ul>
                            <?php foreach ($s6_advisory['rf_content'] as $item) {
                                echo '<li>'. $item .'</li>';
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="employer-cta">
            <div class="container">
                <div class="grid justify--center align--center grid--stackable">
                    <div class="grid__column five-twelfths tablet--one-whole">
                        <div class="employer-cta__content">
                            <h2><?php echo $s7_heading; ?></h2>
                        </div>
                    </div>
                    <div class="grid__column five-twelfths tablet--one-whole">
                        <div class="employer-cta__inner">
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                            <a href="<?php echo $contact_url; ?>" class="employer-cta__btn parallax-btn" data-movement="75">
                                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/employer/plane.png" alt="<?php echo $s7_heading; ?>" width="108">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rf-popup" id="book-package">
    <div class="rf-popup__overlay"></div>
    <div class="rf-popup__container">
        <button class="rf-popup__close"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5l-9 9m9 0l-9-9 9 9z"/></svg></button>
        <div class="scroll-container scroll-container--dark">
            <div class="rf-popup__inner">
                <form id="register-package" class="rf-form" method="POST" action="" novalidate="novalidate" data-message-success="<?php echo $form_message; ?>">
                    <div class="form__container">
                        <h5 class="form__heading form__heading--large"><?php esc_html_e('Service Packages', 'rf'); ?></h5>
                        <div class="form__row form__row--vertical">
                            <div class="form__field">
                                <label class="form__radio">
                                    <input type="radio" checked name="TypeOfServiceEnquiry" value="<?php esc_html_e('New Client Request: Staffing and Placement', 'rf'); ?>">
                                    <span class="checkmark"></span>
                                    <span class="mask"></span>
                                    <span><?php esc_html_e('Staffing and Placement', 'rf'); ?></span>
                                </label>
                            </div>
                            <div class="form__field">
                                <label class="form__radio">
                                    <input type="radio" name="TypeOfServiceEnquiry" value="<?php esc_html_e('New Client Request: Payroll', 'rf'); ?>">
                                    <span class="checkmark"></span>
                                    <span class="mask"></span>
                                    <span><?php esc_html_e('Payroll', 'rf'); ?></span>
                                </label>
                            </div>
                            <div class="form__field">
                                <label class="form__radio">
                                    <input type="radio" name="TypeOfServiceEnquiry" value="<?php esc_html_e('New Client Request: RPO and BPO', 'rf'); ?>">
                                    <span class="checkmark"></span>
                                    <span class="mask"></span>
                                    <span><?php esc_html_e('RPO and BPO', 'rf'); ?></span>
                                </label>
                            </div>
                        </div>
                        <h5 class="form__heading form__heading--large"><?php esc_html_e('Personal Information', 'rf'); ?></h5>
                        <div class="form__field">
                            <label class="form__label" for="name"><?php esc_html_e('Full name', 'rf'); ?></label>
                            <input type="text" id="name" class="form__control" name="FullName">
                        </div>
                        <div class="form__field">
                            <label class="form__label" for="email"><?php esc_html_e('Email', 'rf'); ?></label>
                            <input type="email" id="email" class="form__control" name="EmailAddress" required>
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
                                    <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                    <?php foreach ($countries as $country) : ?>
                                        <option value="<?php echo $country->Code; ?>"<?php if ($country->Code == $country_code) echo ' selected'; ?>><?php echo esc_html__($country->Name, 'rf'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form__field">
                            <label class="form__label<?php if (wp_is_mobile()) echo ' hidden'; ?>" for="message"><?php esc_html_e('Let us know if you\'re looking for any specific roles', 'rf'); ?></label>
                            <textarea id="message" required placeholder="<?php if (wp_is_mobile()) echo __('Let us know if you\'re looking for any specific roles', 'rf'); ?>" class="form__control form__control--textarea" name="Content"></textarea>
                        </div>
                    </div>
                    <div class="form__field form__field--submit text--center">
                        <input type="hidden" name="action" value="send_service_form">
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
    </div>
</div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit() {
            theme.submitServiceForm()
        }
    </script>
<?php
get_footer('v2');
