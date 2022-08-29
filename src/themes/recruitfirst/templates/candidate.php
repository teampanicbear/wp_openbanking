<?php
/**
 * Template Name: Candidate
 *
 * @package recruitfirst
 */


get_header();
$settings = get_option( 'rf-settings' );
$api_key = $settings['google_captcha_api'];

$jobs_list = [];
$paging = null;

$current_page = max(1, get_query_var('paged'));
$current_location = $_GET['location'];
$current_area = $_GET['area'];
$current_industry = $_GET['industry'];
$current_jobtype = $_GET['jobtype'];
$search_term = $_GET['searchTerm'];

$jobs_data = RF_API::get_jobs($current_page, 10, $current_location, $current_area, $current_industry, $current_jobtype, $search_term);

if (!empty($jobs_data)) {
    $paging = $jobs_data['paging'];
    $jobs_list = $jobs_data['body']->data;
}

$prefix = 'rf_';
$page_title = get_post_meta(get_the_ID(), $prefix . 'page_title', true);
$job_board_title = get_post_meta(get_the_ID(), $prefix . 'job_board_title', true);
$step_heading = get_post_meta(get_the_ID(), $prefix . 'step_heading', true);
$steps = get_post_meta(get_the_ID(), $prefix . 'steps', true);

$original_country_code = RF_Language::get_country_code();

$country_code = $original_country_code ? $original_country_code : 'SG';

if ($country_code) {
    echo '<script>window.country_code = "'.$country_code.'";window.original_country_code = "'.$original_country_code.'";</script>';
};

$locations = array(
    'SG' => 'Singapore',
    'TW' => 'Taiwan',
    'HK' => 'Hong Kong',
    'ID' => 'Indonesia',
    'MY' => 'Malaysia',
    'CN' => 'Mainland China'
);

$alert_form_message = get_post_meta(get_the_ID(), $prefix . 'alert_form_message', true);
$resume_form_message = get_post_meta(get_the_ID(), $prefix . 'resume_form_message', true);


$wechat_qr = $settings['jobalert_qrcode'];
$qr_img = THEME_URL . '/images/wechat-qr.jpg';
if ($wechat_qr) {
    $qr_img = wp_get_attachment_image_url($wechat_qr, 'full');
}
?>
    <div class="site-main">
        <div class="candidate-header">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="candidate-header__description">
                    <div class="five-twelfths mobile--one-whole tablet--one-whole desk--one-whole">
                        <h2><?php echo $page_title; ?></h2>
                    </div>
                </div>
            </div>

            <div class="candidate-header__img">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo THEME_URL; ?>/images/candidate/header-mb.png">
                    <img class="candidate-header__img-banner" src="<?php echo THEME_URL; ?>/images/candidate/candidate-banner.png" alt="<?php the_title(); ?>">
                </picture>
            </div>
            <div class="candidate-header__objs">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/candidate/book.png" width="60" alt="Book" class="candidate-header__obj">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/candidate/laptop.png" width="90" alt="laptop" class="candidate-header__obj">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/candidate/rubic.png" width="65" alt="rubik" class="candidate-header__obj">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/candidate/star.png" width="40" alt="star" class="candidate-header__obj">
            </div>
        </div>
        <div class="candidate-content">
            <div class="container">
                <div class="candidate-content__wrapper ten-twelfths mobile--one-whole tablet--one-whole">
                    <div class="candidate-content__table">
                        <h3 class="h3 candidate-heading">
                            <?php echo $job_board_title; ?>
                        </h3>
                        <div class="candidate-filter">
                            <div>
                                <div class="form__field">
                                    <input type="text" name="searchTerm" class="form__control form__control--search" placeholder="<?php esc_html_e('Search for job title', 'rf'); ?>">
                                </div>
                            </div>
                            <div>
                                <div class="form__field form__field--select">
                                    <label for="" class="form__label"><?php esc_html_e('Location', 'rf'); ?></label>
                                    <select name="location" class="form__control form__control--select">
                                        <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form__field form__field--select">
                                    <label for="" class="form__label"><?php esc_html_e('Area/District', 'rf'); ?></label>
                                    <select name="area" class="form__control form__control--select2">
                                        <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form__field form__field--select">
                                    <label class="form__label"><?php esc_html_e('Industry', 'rf'); ?></label>
                                    <select name="industry" class="form__control form__control--select">
                                        <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form__field form__field--select">
                                    <label class="form__label"><?php esc_html_e('Type of contract', 'rf'); ?></label>
                                    <select name="jobtype" class="form__control form__control--select">
                                        <option value=""><?php esc_html_e('All', 'rf'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="candidate-table">
                            <div class="candidate-table__wrapper">
                                <?php if (wp_is_mobile()) : ?>

                                    <?php if (!empty($jobs_list)) :
                                        foreach ($jobs_list as $job) {
                                            set_query_var( 'job', $job );
                                            get_template_part( 'template-parts/job-table-card' );
                                        }
                                    endif; ?>

                                <?php else : ?>
                                <table id="jobTable" class="responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="four-twelfths"><?php esc_html_e('Job Title', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Industry', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Location', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Area/District', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Job type', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Salary', 'rf'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($jobs_list)) :
                                        foreach ($jobs_list as $job) {
                                            set_query_var( 'job', $job );
                                            get_template_part( 'template-parts/job-table-row' );
                                        }
                                    endif; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                                <div class="candidate-loading">
                                    <span class="candidate-loading__text"><?php esc_html_e('Loading', 'rf'); ?></span>
                                </div>
                            </div>
                            <?php rf_navigation($paging->totalPages); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="candidate-step pdb--50">
            <div class="candidate-step__content pdb--70">
                <div class="container">
                    <div class="candidate-content__wrapper ten-twelfths mobile--one-whole tablet--one-whole">
                        <div class="grid grid--two-columns grid--doubling">
                            <div class="grid__column">
                                <h3 class="candidate-step__heading">
                                    <?php echo $step_heading; ?>
                                </h3>
                            </div>
                            <div class="grid__column">
                                <div class="candidate-step__wrapper">
                                    <?php foreach ($steps as $key => $step) : ?>
                                        <div class="candidate-step__item">
                                            <div class="candidate-step__icon">
                                                <img loading="lazy" src="<?php echo wp_get_attachment_url($step['rf_icon']); ?>" alt="<?php echo $step['rf_title']; ?>"
                                                     width="48">
                                            </div>
                                            <div class="candidate-step__info">
                                                <span class="candidate-step__title text--upper"><?php echo $step['rf_title']; ?></span>
                                                <p class="candidate-step__desc">
                                                    <?php echo $step['rf_description']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img loading="lazy" class="planet planet-1" src="<?php echo THEME_URL; ?>/images/planet-1.png" alt="planet" width="120">
                <img loading="lazy" class="planet planet-2" src="<?php echo THEME_URL; ?>/images/planet-2.png" alt="planet" width="130">
            </div>

            <div class="candidate-card">
                <div class="container">
                    <div class="candidate-card__grid ten-twelfths mobile--one-whole">
                        <div class="grid">
                            <div class="grid__column six-twelfths mobile--one-whole">
                                <div class="candidate-card__item">
                                    <div class="candidate-card__logo">
                                        <img loading="lazy" src="<?php echo THEME_URL; ?>/images/candidate/glossy.png"
                                             alt="<?php esc_html_e('Job Alert!', 'rf'); ?>">
                                    </div>
                                    <div class="candidate-card__info">
                                        <h5 class="candidate-card__title">
                                            <?php esc_html_e('Job Alert!', 'rf'); ?>
                                        </h5>
                                        <p class="candidate-card__desc">
                                            <?php esc_html_e('If you don\'t see a suitable role yet, don\'t worry about it. Sign up for a job alert so that we can notify you when other opportunities pop up.', 'rf'); ?>
                                        </p>
                                        <a href="#job-alert" class="btn btn--primary" data-open-popup>
                                            <?php esc_html_e('Sign up', 'rf'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid__column six-twelfths mobile--one-whole">
                                <div class="candidate-card__item candidate-card__item--orange">
                                    <div class="candidate-card__logo">
                                        <img loading="lazy" class="folder" src="<?php echo THEME_URL; ?>/images/candidate/folder.png"
                                             alt="<?php esc_html_e('Resume Drop', 'rf'); ?>" width="129">
                                    </div>
                                    <div class="candidate-card__info">
                                        <h5 class="candidate-card__title">
                                            <?php esc_html_e('Resume Drop', 'rf'); ?>
                                        </h5>
                                        <p class="candidate-card__desc">
                                            <?php esc_html_e("If you've already got your resume in hand, send it across to us. We'll get in touch with you if your profile matches a role we're looking to fill.", 'rf'); ?>
                                        </p>
                                        <a href="#submit-resume" class="btn" data-open-popup>
                                            <?php esc_html_e('Submit', 'rf'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" defer></script>

    <div class="rf-popup job-alert" id="job-alert">
        <div class="rf-popup__overlay"></div>
        <div class="rf-popup__container">
            <button class="rf-popup__close"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5l-9 9m9 0l-9-9 9 9z"/></svg></button>
            <div class="scroll-container scroll-container--dark">
                <div class="rf-popup__inner">
                    <div class="rf-popup__header">
                        <h3 class="h5"><?php esc_html_e('Get Notified!', 'rf'); ?></h3>
                        <p><?php esc_html_e('Be the first to know when your ideal job is available.', 'rf'); ?></p>
                    </div>
                    <div class="rf-popup__content">
                        <form id="alert-form" class="rf-form" data-message-success="<?php echo $alert_form_message ?>">
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
                                    <input class="form__control" type="email" name="EmailAddress">
                                </div>
                                <div class="form__field form__field--whatsapp hidden">
                                    <div class="whatsapp-field">
                                        <span class="phone-code-wrapper">
                                            <select name="PhoneCode" class="phone-code"></select>
                                        </span>
                                        <input class="phone-number" type="tel" placeholder="---------" name="MobileNo" />
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
                                <div class="form__field form__field-industries">
                                    <select class="form__control form__control--select2" name="JobIndustryIDs[]" multiple="multiple" data-placeholder="<?php esc_html_e('Industries','rf'); ?>" data-text="<?php esc_html_e('Select all', 'rf'); ?>">
                                        <option disabled>select-all</option>
                                    </select>
                                </div>
                                <div class="form__row">
                                    <div class="form__field form__field--select">
                                        <label class="form__label"><?php esc_html_e('Location','rf'); ?></label>
                                        <select class="form__control form__control--select" name="JobCountryID">
                                            <option value=""><?php esc_html_e('Select location', 'rf'); ?></option>
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
                                    <button
                                        class="btn btn-submit g-recaptcha"
                                        data-sitekey="<?php echo $api_key; ?>"
                                        data-callback="onSubmit"
                                        data-action="submit"
                                    >
                                        <span class="btn-text"><?php esc_html_e('Notify me', 'rf'); ?></span>
                                        <span class="btn-spinner">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-spinner" viewBox="0 0 20 20"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z" fill="currentColor"/></svg>
                                    </span>
                                    </button>
                                    <input type="hidden" name="JobFunctionIDs[]">
                                    <input type="hidden" name="OriginalCountryID" value="<?php echo $country_code; ?>">
                                    <input type="hidden" name="CountryID">
                                    <input type="hidden" name="PeriodFrom">
                                    <input type="hidden" name="PeriodTo">
                                    <input type="hidden" name="IsSubscripted" value="true">
                                    <input type="hidden" name="verify_nonce" value="<?php echo wp_create_nonce( "verify_form_request" ); ?>">
                                    <input type="hidden" name="action" value="send_subscribe_form">
                                </div>
                            </div>
                            <?php if ($country_code == 'CN') :?>
                                <div id="form-wechat" class="form-wechat form-content hidden">
                                    <h4 class="form__heading"><?php esc_html_e('Follow us to begin!', 'rf'); ?>:</h4>
                                    <p class="text--left"><?php esc_html_e('Scan the QR code or search our ID "RecruitFirst".', 'rf'); ?></p>
                                    <img class="mgt--40" src="<?php echo $qr_img; ?>" alt="Wechat QR Code" width="240">
                                </div>
                            <?php endif; ?>
                            <div class="form__message form__message--large form__message--push-top"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rf-popup submit-resume" id="submit-resume">
        <div class="rf-popup__overlay"></div>
        <div class="rf-popup__container">
            <button class="rf-popup__close"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5l-9 9m9 0l-9-9 9 9z"/></svg></button>
            <div class="rf-popup__inner scroll-container scroll-container--dark">
                <div class="rf-popup__header">
                    <h3 class="h5"><?php esc_html_e('Send Us Your Resume!', 'rf'); ?></h3>
                    <p><?php esc_html_e('Our consultants will get in touch with you if your profile matches a job.', 'rf'); ?></p>
                </div>
                <div class="rf-popup__content">
                    <form id="submit-resume-form" class="rf-form" method="POST" action="" novalidate="novalidate" data-message-success="<?php echo $resume_form_message; ?>">
                        <div class="form__container">
                            <div class="form__field">
                                <label class="form__label" for="name"><?php esc_html_e('Full name', 'rf'); ?></label>
                                <input type="text" id="name" class="form__control" name="FullName">
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="email"><?php esc_html_e('Email address', 'rf'); ?></label>
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
                                    <select id="location" class="form__control" name="CountryCode">
                                    </select>
                                </div>
                            </div>
                            <div class="form__field">
                                <label class="form__label<?php if (wp_is_mobile()) echo ' hidden'; ?>" for="message"><?php esc_html_e('Let us know if you\'re looking for any specific roles', 'rf'); ?></label>
                                <textarea id="message" placeholder="<?php if (wp_is_mobile()) echo __('Let us know if you\'re looking for any specific roles', 'rf'); ?>" class="form__control form__control--textarea" name="Content"></textarea>
                            </div>
                            <div class="form__field">
                                <div id="dropzone" class="dropzone">
                                    <p class="dz-message"><?php esc_html_e('Drag & drop your resume/cv here or click here to browse', 'rf'); ?></p>
                                </div>
                                <input type="hidden" name="fileUploaded">
                            </div>
                        </div>
                        <div class="form__field form__field--submit text--center">
                            <input type="hidden" name="action" value="send_resume_drop">
                            <input type="hidden" name="Subject" value="<?php esc_html_e('New Candidate Resume Drop'); ?>">
                            <input type="hidden" name="verify_nonce" value="<?php echo wp_create_nonce( "verify_form_request" ); ?>">
                            <button type="submit" class="btn btn-submit g-recaptcha" data-sitekey="<?php echo $api_key; ?>"
                                    data-callback="onSubmitResumeForm"
                                    data-action="submit">
                                <span class="btn-text"><?php esc_html_e('Submit', 'rf'); ?></span>
                                <span class="btn-spinner">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-spinner" viewBox="0 0 20 20"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z" fill="currentColor"/></svg>
                                    </span>
                            </button>
                        </div>
                        <div class="form__message form__message--large form__message--push-top"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit() {
        	console.log('alertForm')
            theme.alertForm()
        }
        function onSubmitResumeForm() {
            theme.resumeDropForm()
        }
    </script>
<?php
get_footer('v2');
