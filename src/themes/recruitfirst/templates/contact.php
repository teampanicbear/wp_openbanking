<?php
/**
 * Template Name: Contact
 *
 * @package recruitfirst
 */

get_header();
$settings = get_option( 'rf-settings' );
$api_key = $settings['google_captcha_api'];

$prefix = 'rf_';

$page_title = get_post_meta(get_the_ID(), $prefix . 'title', true);
$form_title = get_post_meta(get_the_ID(), $prefix . 'form_title', true);
$form_desc = get_post_meta(get_the_ID(), $prefix . 'form_description', true);
$locations = get_post_meta(get_the_ID(), $prefix . 'locations', true);
$form_message = get_post_meta(get_the_ID(), $prefix . 'form_message', true);
$taiwan_document = get_post_meta(get_the_ID(), $prefix . 'tw_document', true);


$country_code = RF_Language::get_country_code();
$current_city = get_country_name($country_code);

$countries = array(
    'SG' => __('Singapore', 'rf'),
    'TW' => __('Taiwan', 'rf'),
    'HK' => __('Hong Kong', 'rf'),
    'ID' => __('Indonesia', 'rf'),
    'MY' => __('Malaysia', 'rf'),
    'CN' => __('Mainland China', 'rf')
);


?>

<div class="site-main" style="overflow: hidden">
    <div class="contact-header">
        <svg width="775" height="362" viewBox="0 0 775 362" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 361C21.6667 316.667 100.4 232.6 242 251C419 274 556 274 665 179C752.2 103 773.333 -5.33333 773 -50"
                  stroke="#C8A8F1" stroke-width="2" stroke-linecap="round" stroke-dasharray="3 8"/>
        </svg>
        <div class="contact-header__bg">
            <?php if (!wp_is_mobile()) : ?>
                <img src="<?php echo THEME_URL; ?>/images/contact-header.png" alt="Contact us">
            <?php else : ?>
                <img src="<?php echo THEME_URL; ?>/images/contact-header-mobile.png" alt="Contact us">
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="grid grid--two-columns grid--doubling">
                <div class="grid__column"></div>
                <div class="grid__column">
                    <h1 class="h2"><?php echo $page_title; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-wrapper">
        <div class="container">
            <div class="grid grid--two-columns grid--doubling">
                <div class="grid__column">
                    <div class="contact-form">
                        <div class="contact-form__header">
                            <h2 class="h3"><?php echo $form_title; ?></h2>
                            <p><?php echo $form_desc; ?></p>
                        </div>
                        <div class="wpforms-container">
                            <form id="contact-form" class="rf-form" method="post"
                                  action="" novalidate="novalidate" data-message-success="<?php echo $form_message; ?>">
                                <div class="form__field">
                                    <label class="form__label" for="fullname"><?php esc_html_e('Full name', 'rf'); ?></label>
                                    <input type="text" id="fullname" class="form__control" name="FullName">
                                </div>
                                <div class="form__field">
                                    <label class="form__label"
                                           for="phone"><?php esc_html_e('Phone number', 'rf'); ?></label>
                                    <input type="tel" pattern="\d*" id="phone" class="form__control"
                                           name="PhoneNumber">
                                </div>
                                <div class="form__field">
                                    <label class="form__label"
                                           for="email"><?php esc_html_e('Email', 'rf'); ?><span
                                                class="wpforms-required-label">*</span></label>
                                    <input type="email" id="email"
                                           class="form__control" name="EmailAddress" required>
                                </div>
                                <div class="form__field form__field--select">
                                    <label class="form__label" for="location"><?php esc_html_e('Location', 'rf'); ?></label>
                                    <select id="location" class="form__control form__control--select" name="CountryCode">
                                        <?php foreach ($countries as $key => $location) : ?>
                                            <option value="<?php echo $key; ?>"<?php if ($key == $country_code) echo ' selected'; ?>><?php echo $location; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form__field">
                                    <label class="form__label<?php if (wp_is_mobile()) echo ' hidden'; ?>"
                                           for="message"><?php esc_html_e('Share with us a line or two about your needs', 'rf'); ?></label>
                                    <textarea id="message" class="form__control form__control--textarea" name="Content"
                                              required placeholder="<?php if (wp_is_mobile()) echo __('Share with us a line or two about your needs', 'rf'); ?>"></textarea>
                                </div>

                                <div class="form__field">
                                    <label class="form__checkbox">
                                        <input type="checkbox" id="register_newsletter"
                                               name="register_newsletter" value="1">
                                        <span class="checkmark"></span>
                                        <span><?php esc_html_e('Receive Market Intelligence', 'rf'); ?></span>
                                    </label>
                                </div>
                                <div class="form__field form__field--submit text--center">
                                    <input type="hidden" value="send_contact_form" name="action">
                                    <input type="hidden" value="<?php esc_html_e('New Enquiry from RecruitFirst.co', 'rf'); ?>" name="Subject">
                                    <input type="hidden" name="verify_nonce" value="<?php echo wp_create_nonce( "verify_form_request" ); ?>">
                                    <button
                                        class="btn btn-submit g-recaptcha"
                                        data-sitekey="<?php echo $api_key; ?>"
                                        data-callback="onSubmit"
                                        data-action="submit"
                                    >
                                        <span class="btn-text"><?php esc_html_e('Send message', 'rf'); ?></span>
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
                <div class="grid__column">
                    <div class="contact-map">
                        <?php if (!wp_is_mobile()) { ?>
                            <div class="contact-map__header mobile--hidden">
                                <?php foreach ($locations as $key => $location) {
                                    $selected = sanitize_title_with_dashes($current_city);
                                    $location_id = sanitize_title_with_dashes($location['rf_country']);
                                    if ($selected == $location_id) {
                                        echo '<a href="#' . $location_id . '" class="active" data-tab-nav>' . $location['rf_title'] . '</a>';
                                    } else {
                                        echo '<a href="#' . $location_id . '" data-tab-nav>' . $location['rf_title'] . '</a>';
                                    }
                                }; ?>
                            </div>
                        <?php } else { ?>
                            <div class="contact-form__header">
                                <h2 class="h3"><?php esc_html_e('Our Locations', 'rf'); ?></h2>
                            </div>
                            <div class="contact-map__header">
                                <select class="data-tab-nav-select form__control  form__control--no-label form__control--select" data-tab-nav-select>
                                    <?php foreach ($locations as $key => $location) {
                                        $selected = sanitize_title_with_dashes($current_city);
                                        $location_id = sanitize_title_with_dashes($location['rf_country']);
                                        if ($selected == $location_id) {
                                            echo '<option value="#' . $location_id . '" selected>' . $location['rf_title'] . '</option>';
                                        } else {
                                            echo '<option value="#' . $location_id . '">' . $location['rf_title'] . '</option>';
                                        }
                                    }; ?>
                                </select>
                            </div>
                        <?php }; ?>
                        <div class="contact-map__countries">
                            <?php foreach ($locations as $key => $location) :
                                $location_id = sanitize_title_with_dashes($location['rf_country']);
                                $selected = sanitize_title_with_dashes($current_city);
                                $wechatqr_img = wp_get_attachment_url($location['rf_wechat_qr']);

                                ?>
                                <div class="country<?php if ($selected == $location_id) echo ' active'; ?>"
                                     id="<?php echo $location_id; ?>" data-tab-content>
                                    <div class="country__inner">
                                        <div class="country__map">
                                            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/contact/<?php echo $location_id; ?>.svg"
                                                 alt="<?php $location['rf_title']; ?>">
                                            <span class="country__map-location pin"></span>
                                            <?php if ($location_id == 'singapore') {
                                                echo '<span class="country__map-location pin"></span>';
                                            } ?>
                                        </div>
                                        <div class="country__info">
                                            <?php echo $location['rf_address']; ?>
                                            <ul class="country-info__contact">
                                                <?php if ($location['rf_phone']) : ?>
                                                    <li>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.164 10.584c-.522-.516-1.175-.516-1.694 0-.397.393-.793.786-1.182 1.186-.107.11-.197.133-.327.06-.256-.14-.529-.254-.775-.407-1.15-.722-2.111-1.651-2.964-2.697-.423-.519-.799-1.075-1.062-1.7-.053-.127-.043-.21.06-.314.396-.383.783-.776 1.172-1.168.543-.546.543-1.186-.003-1.735-.31-.313-.62-.62-.93-.932-.319-.32-.635-.643-.958-.96-.523-.509-1.175-.509-1.695.004-.4.393-.782.796-1.188 1.182-.377.356-.566.792-.606 1.302-.064.829.14 1.611.426 2.374.586 1.578 1.478 2.98 2.56 4.265a15.844 15.844 0 005.248 4.105c.918.446 1.87.79 2.906.846.713.04 1.332-.14 1.828-.696.34-.38.723-.726 1.082-1.089.533-.54.536-1.192.007-1.725-.633-.635-1.269-1.268-1.905-1.9z"
                                                                  fill="#A0AEC0"/>
                                                            <path d="M11.528 7.93l1.229-.209a5.492 5.492 0 00-1.535-2.963 5.461 5.461 0 00-3.13-1.562L7.92 4.432c.922.13 1.761.546 2.424 1.208a4.237 4.237 0 011.185 2.29zM13.45 2.59A9.06 9.06 0 008.254 0l-.173 1.235a7.855 7.855 0 014.488 2.238 7.85 7.85 0 012.201 4.245L16 7.508a9.125 9.125 0 00-2.55-4.918z"
                                                                  fill="#7E8CA0"/>
                                                        </svg>
                                                        <?php if ($location_id == 'taipei') {
                                                            echo '<p>' . $location['rf_phone'] . '</p>';
                                                        } else {
                                                            echo '<a target="_blank" href="tel:' . $location['rf_phone'] . '">' . $location['rf_phone'] . '</a>';
                                                        }; ?>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($location['rf_fax']) : ?>
                                                    <li>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 0H3v3h10V0zM15 5H1c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h2v2c0 .6.4 1 1 1h8c.6 0 1-.4 1-1v-2h2c.6 0 1-.4 1-1V6c0-.6-.4-1-1-1zm-4 9H5V9h6v5z"
                                                                  fill="#A0AEC0"/>
                                                        </svg>
                                                        <p><?php echo $location['rf_fax']; ?></p>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($location['rf_email']): ?>
                                                    <li>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.79 9.893a.164.164 0 00.1.033h4.223a.164.164 0 00.1-.033l5.12-3.839a.167.167 0 00-.005-.27l-6.758-4.7a1.004 1.004 0 00-1.142 0L.675 5.782a.167.167 0 00-.005.27l5.12 3.841z"
                                                                  fill="#A0AEC0"/>
                                                            <path d="M11.389 10.262a.166.166 0 00.007.272l2.217 1.476a.5.5 0 11-.555.832l-2.834-1.888a.168.168 0 00-.093-.028H5.867a.168.168 0 00-.093.028l-2.828 1.888a.5.5 0 01-.555-.832l2.216-1.477a.166.166 0 00.007-.271L.267 7A.167.167 0 000 7.133v6.627a1.334 1.334 0 001.333 1.333h13.334A1.334 1.334 0 0016 13.76V7.137a.166.166 0 00-.267-.133l-4.344 3.258z"
                                                                  fill="#A0AEC0"/>
                                                        </svg>
                                                        <a target="_blank" href="mailto:<?php echo $location['rf_email']; ?>"><?php echo $location['rf_email']; ?></a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($location['working_hour']) : ?>
                                                    <li>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M15.334 8A7.333 7.333 0 11.667 8a7.333 7.333 0 0114.667 0zM8.667 3.333a.667.667 0 10-1.333 0V8c0 .368.298.666.666.666h4.667a.667.667 0 100-1.333h-4v-4z"
                                                                  fill="#A0AEC0"/>
                                                        </svg>
                                                        <span><?php echo $location['working_hour']; ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="country-info__socials">
                                                <?php if ($location['rf_facebook']) : ?>
                                                    <a href="<?php echo $location['rf_facebook']; ?>" target="_blank">
                                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16.008" cy="16" r="16" fill="#F2F5F8"></circle>
                                                            <path d="M14.525 22l-.017-5.25h-2.25V14.5h2.25V13c0-2.024 1.253-3 3.06-3 .864 0 1.608.064 1.824.093v2.116H18.14c-.982 0-1.172.467-1.172 1.152V14.5h2.79l-.75 2.25h-2.04V22h-2.443z"
                                                                  fill="#7E8CA0"></path>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($location['rf_linkedin']) : ?>
                                                    <a href="<?php echo $location['rf_linkedin']; ?>" target="_blank">
                                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16.008" cy="16" r="16" fill="#F2F5F8"></circle>
                                                            <path d="M19.508 10h-7a2.5 2.5 0 00-2.5 2.5v7a2.5 2.5 0 002.5 2.5h7a2.5 2.5 0 002.5-2.5v-7a2.5 2.5 0 00-2.5-2.5zm-5.5 9.5h-1.5V14h1.5v5.5zm-.75-6.134a.879.879 0 01-.875-.882c0-.487.392-.882.875-.882s.875.395.875.882a.878.878 0 01-.875.882zm6.75 6.134h-1.5v-2.802c0-1.684-2-1.556-2 0V19.5h-1.5V14h1.5v.883c.698-1.293 3.5-1.389 3.5 1.238V19.5z"
                                                                  fill="#7E8CA0"></path>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($location['rf_wechat']) : ?>
                                                <div class="wechat">
                                                    <a href="javascript:void(0)">
                                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16.008" cy="16" r="16" fill="#F2F5F8"></circle>
                                                            <path d="M16.418 14.809c-3.621 1.866-1.213 6.873 3.305 5.566.42.163.796.428 1.204.625a26.441 26.441 0 00-.338-1.055c1.4-.998 1.707-2.41 1.19-3.57-.809-1.838-3.389-2.591-5.361-1.566zm1.265 1.829c-.105.327-.578.425-.808.176-.253-.23-.154-.712.178-.815.367-.155.79.271.63.639zm2.39.047h.007c-.129.294-.57.363-.788.135-.104-.096-.135-.24-.172-.367.052-.23.21-.468.465-.479.353-.049.668.388.488.711z"
                                                                  fill="#7E8CA0"></path>
                                                            <path d="M18.715 14.124c-.218-1.072-.968-1.978-1.912-2.5h.013c-3.35-1.893-7.52.747-6.715 3.861.217.924.856 1.698 1.631 2.216-.15.426-.292.852-.427 1.282.487-.256.975-.524 1.463-.784.585.189 1.207.281 1.83.26-.77-2.206 1.203-4.543 4.117-4.335zm-3.039-1.28c.393-.159.857.172.826.595v.005c.005.483-.637.784-.997.457-.373-.269-.267-.922.171-1.057zm-2.202.723c-.086.419-.646.621-.973.34-.38-.268-.273-.934.172-1.07.437-.168.933.277.8.73z"
                                                                  fill="#7E8CA0"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="wechat-qr wechat-qr--top wechat-qr--bordered wechat-qr--small text--center">
                                                        <img loading="lazy" src="<?php echo $wechatqr_img; ?>" alt="Wechat QRCode" width="200">
                                                        <p class="mgt--10">
                                                            <?php if (wp_is_mobile()) {
                                                                echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                                            } else {
                                                                echo sprintf(__("Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                                            }?>
                                                        </p>
                                                        <?php if (wp_is_mobile()) : ?>
                                                            <a target="_blank" class="btn btn--small" href="<?php echo $location['rf_wechat']; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php endif; ?>


                                                <?php if ($location['rf_tiktok']) : ?>
                                                    <a href="<?php echo $location['rf_tiktok']; ?>" target="_blank">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32"><circle cx="16" cy="16" r="16" fill="#F2F5F8"/><path fill="#7E8CA0" d="M21.2574 13.009c-.6849 0-1.3168-.2268-1.8242-.6096-.5819-.4387-1.0001-1.0823-1.1477-1.8241-.0366-.1833-.0563-.3724-.0581-.5663H16.271v5.3457l-.0023 2.928c0 .7828-.5098 1.4466-1.2164 1.68-.2051.0677-.4266.0999-.6572.0872-.2944-.0162-.5702-.105-.81-.2484-.5102-.3052-.8562-.8588-.8656-1.4921-.0147-.9897.7854-1.7967 1.7745-1.7967.1952 0 .3827.0319.5583.0898V14.6161c-.1852-.0274-.3736-.0417-.5642-.0417-1.0825 0-2.095.45-2.8188 1.2607-.547.6127-.8751 1.3943-.9258 2.2139-.0663 1.0768.3277 2.1003 1.0917 2.8554.1123.1109.2302.2138.3535.3087.6551.5041 1.4559.7774 2.2994.7774.1906 0 .379-.014.5642-.0415.788-.1167 1.515-.4774 2.0887-1.0446.705-.6968 1.0946-1.6218 1.0988-2.6065l-.0101-4.3725c.3363.2595.7041.4742 1.0988.6408.6138.259 1.2646.3903 1.9345.39v-1.9476c.0005.0004-.0052.0004-.0056.0004z"/></svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($location['rf_xiaohongshu']) : ?>
                                                <a href="<?php echo $location['rf_xiaohongshu']; ?>" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32"><circle cx="16" cy="16" r="16" fill="#F2F5F8"/><path fill="#7E8CA0" d="M25.0002 16.3891c0-.3035-.1301-.5636-.3685-.7587-.2601-.195-.5419-.2818-.8671-.2818-.1083 0-.13-.0216-.13-.13v-.8237c-.0217-.4769-.1951-.867-.6503-1.1055-.3035-.1734-.6503-.195-.9971-.195-.3251 0-.3251 0-.3468-.3252v-.0217c0-.0867-.0217-.1083-.1084-.1083h-.737c-.1083 0-.2601-.0434-.3251.0216-.065.0651-.0217.2168-.0217.3252s-.0433.13-.13.1084h-.5636c-.0867 0-.1084.0216-.1084.1083v.9754c0 .0868.0217.1084.1084.1084h.5419c.1084 0 .1517.0217.1517.1301v.7803c0 .1084-.0433.1301-.1517.1301h-.9321c-.0867 0-.13.0216-.13.13v.9321c0 .1301.0433.1517.1517.1517h.9104c.1084 0 .1301.0217.1301.1301v2.276c0 .1083.0433.13.13.13h.867c.1951 0 .1951 0 .1951-.1951v-2.2109c0-.1084.0434-.1517.1518-.1517h1.5606c.3252 0 .4552.1517.4552.4551v.7804c0 .1951-.065.2601-.2601.2601h-.7803c-.1084 0-.1301.0217-.0867.13.13.2602.2384.5419.3468.8021.0217.0433.0433.0867.1084.0867.3468 0 .6936.0216 1.0187-.0434.4986-.0867.8454-.5202.8237-.9754.0217-.4986.0434-1.0621.0434-1.6257zm-2.6445-1.0405h-.6069c-.0867 0-.0867-.0433-.0867-.1083 0-.2818 0-.5419-.0217-.8237 0-.0867.0217-.1084.1084-.1084h.4769c.1517 0 .2167.065.2167.2384v.7153c0 .0651-.0217.0867-.0867.0867zM19.1907 17.8847h-.9104c-.0867 0-.1083-.0217-.1083-.1084v-3.3598c0-.1084.0433-.13.13-.1084h.5202c.0651 0 .1084-.0216.1084-.1083v-.9971c0-.0651-.0433-.0867-.1084-.0867h-2.536c-.0867 0-.1084.0216-.1084.1083v.9755c0 .1083.0433.13.13.1083h.4769c.1084 0 .1517.0217.1517.1301v3.3381c0 .0867-.0216.1301-.13.1301h-.8454c-.065 0-.1084 0-.1517.065-.1734.3685-.3252.737-.5202 1.1271.0433 0 .0433.0217.065.0217h3.8366c.0867 0 .1084-.0217.1084-.1084v-.9754c.0217-.1084-.0217-.1517-.1084-.1517zM10.4993 12.8993c0-.1517-.0433-.195-.1951-.1734-.2818.0217-.56355.0217-.82367 0-.15173 0-.1734.0434-.1734.1734v4.8771c0 .2818-.04336.3252-.32514.3252H8.6135c-.10838 0-.13006.0216-.08671.13.10838.2601.23844.5202.34682.7804.04335.0867.0867.1083.17341.1083h.52022c.39016-.0216.67196-.2167.82366-.5852.0651-.1951.0867-.3685.0867-.5853v-2.471c.0217-.8671.0217-1.7124.0217-2.5795z"/><path d="M15.5713 16.4324h-.3685c-.3252 0-.3468-.0216-.2168-.3251.2601-.5636.4986-1.1055.7587-1.669.0433-.1084.0217-.1518-.0867-.1518h-.802c-.1734 0-.1951-.065-.1301-.2167.1734-.4119.3685-.802.5419-1.2139.0217-.065.0867-.13.0867-.2167h-.9971c-.13 0-.2167.0433-.2601.1734-.2168.5202-.4552 1.0404-.6936 1.5606-.0867.1734-.1734.3468-.2168.5419-.065.2385.0217.4119.2601.4986.1518.065.3252.0433.4986.0433s.1734 0 .1084.1734c-.1735.4119-.3469.802-.5203 1.2139-.0433.0867-.065.1734-.0433.2601.0433.1951.1951.3251.4552.3468.4118.0217.8237 0 1.2355 0 .065 0 .0867-.0217.1301-.065.13-.2818.2384-.5419.3685-.8237.0216-.1084-.0217-.1301-.1084-.1301zM8.37456 14.3081h-.95374c-.10838 0-.13005.0434-.13005.1301-.04336.5419-.06503 1.0838-.13006 1.604-.04335.3685 0 .737-.15173 1.1055-.02168.0433 0 .065.02167.1083.17341.3902.34682.7804.52023 1.1705.04335.1084.0867.1084.15173.0217.30346-.4335.47687-.9321.56357-1.4523.13006-.8453.13006-1.7124.21676-2.5794.02168-.1084-.02167-.1084-.10838-.1084zM12.688 16.8227c-.0216-.2601-.0433-.5202-.065-.7803-.0433-.5419-.0867-1.0838-.13-1.6474 0-.0867-.0434-.1084-.1301-.1084h-.9104c-.13 0-.1517.0434-.1517.1518.065.7586.1084 1.4956.1734 2.2542.065.607.2384 1.1922.5852 1.7124.0867.1301.0867.1301.1518 0 .13-.3034.2601-.6069.4118-.9103.0867-.1951.1951-.3685.065-.5853v-.0867zM15.0938 17.8846h-1.1055c-.1734 0-.3685 0-.5419-.065-.0867-.0217-.13 0-.1734.0867-.1301.3035-.2818.6069-.4118.9321-.0867.1734-.0867.1734.1083.2167.2818.065.5853.0217.802.0434h.7804c.065 0 .1084-.0217.1517-.0867.1517-.3468.3035-.672.4769-1.0188.0217-.0867 0-.1084-.0867-.1084zM23.8513 14.2647c.0651.0651.2168.0217.3468.0217h.1951c.3902 0 .607-.2384.607-.6286 0-.3035-.1951-.5202-.4769-.5636-.3035-.0433-.5636.1084-.672.3902-.0433.1517-.0433.2818-.0433.4335.0217.1084-.0434.2818.0433.3468z" fill="#7E8CA0"/></svg>
                                                </a>
                                                <?php endif; ?>

                                                <?php if ($location['rf_instagram']) : ?>
                                                    <a href="<?php echo $location['rf_instagram']; ?>" target="_blank">
                                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="16.008" cy="16" r="16" fill="#F2F5F8"></circle>
                                                            <path d="M18.258 10h-4.5a3.75 3.75 0 00-3.75 3.75v4.5a3.75 3.75 0 003.75 3.75h4.5a3.75 3.75 0 003.75-3.75v-4.5a3.75 3.75 0 00-3.75-3.75zm2.625 8.25a2.628 2.628 0 01-2.625 2.625h-4.5a2.628 2.628 0 01-2.625-2.625v-4.5a2.628 2.628 0 012.625-2.625h4.5a2.628 2.628 0 012.625 2.625v4.5z"
                                                                  fill="#7E8CA0"></path>
                                                            <path d="M16.008 13a3 3 0 100 6 3 3 0 000-6zm0 4.875A1.878 1.878 0 0114.133 16c0-1.034.841-1.875 1.875-1.875 1.033 0 1.875.84 1.875 1.875a1.878 1.878 0 01-1.875 1.875zM19.233 13.175a.4.4 0 100-.8.4.4 0 000 .8z"
                                                                  fill="#7E8CA0"></path>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($location_id == 'taiwan') : ?>
                                                <div class="country-info__contact mgt--30">
                                                    <?php echo $taiwan_document; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('v2');
?>
<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
	$('[data-tab-nav].active').prependTo('.contact-map__header')
    // Validate email
    let canSubmit = false
    const emailField = $('[name="EmailAddress"]')

    function validateEmail() {
        const emailIsValid = validEmail(emailField.val())
        const fieldWrap = emailField.closest('.form__field')
        fieldWrap.removeClass('form__field--error')
        emailField.next('.form__message--error').remove()

        if (emailField.val() === '' || !emailIsValid) {
            fieldWrap.addClass('form__field--error')
            if (emailField.val() === '') {
                emailField.after('<p class="form__message form__message--error">'+requiredMessage+'</p>')
                return false
            }
            if (!emailIsValid) {
                emailField.after('<p class="form__message form__message--error">'+inValidEmail+'</p>')
                return false
            }
        } else {
            canSubmit = true
        }
    }

    $(emailField).on('change', function (e) {
        validateEmail()
    })

    const submitBtn = $('.btn-submit')
    const form = $('#contact-form')
	function handleSubmit() {
        validateEmail()
        if (!canSubmit) return false

        submitBtn.addClass('loading')
        const message = form.data('message-success')
        let form_data = form.serializeArray()

        $.ajax({
            url: AJAX_URL,
            type: 'post',
            data: form_data
        }).done(function(response) {
            console.log(response)
            if (response.success) {
                $('.form__message').html('<p>'+message+'</p>')
            }
        })
            .always(function() {
                submitBtn.removeClass('loading')
                $('[name="FullName"]').val('')
                $('[name="EmailAddress"]').val('')
                $('[name="PhoneNumber"]').val('')
                $('[name="Content"]').val('')
                $('.form__field.form__field--active').removeClass('form__field--active')
            });

        return false
    }

    function onSubmit() {
        handleSubmit()
    }
</script>
