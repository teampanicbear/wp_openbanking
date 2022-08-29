<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recruitfirst
 */

get_header();


$settings = get_option('rf-settings');

$headings = $settings['blog_heading'];
$social_headings = $settings['social_heading'];
$social_desc_en = $settings['social_description_en'];
$social_desc_zh = $settings['social_description_zh'];
$social_desc_tw = $settings['social_description_tw'];
$social_desc_id = $settings['social_description_id'];

$facebooks = $settings['facebook'];
$instagrams = $settings['instagram'];
$linkedins = $settings['linkedin'];
$tiktok = $settings['tiktok'];
$xiaohongshu = $settings['xiaohongshu'];
$wechat = $settings['wechat'];
$wechat_qr = $settings['wechat_qr'];
$wechat_qr_img = '';
if (!empty($wechat_qr)) {
    $wechat_qr_img = wp_get_attachment_url($wechat_qr);
}

$sg_wechat = $settings['sg_wechat'];
$sg_wechat_qr = $settings['sg_wechat_qr'];
$wg_wechat_qr_img = '';
if (!empty($sg_wechat_qr)) {
    $wg_wechat_qr_img = wp_get_attachment_url($sg_wechat_qr);
}

$current_lang = 'en';
if (function_exists('pll_current_language')) {
    $current_lang = pll_current_language();
}
$heading = $headings[$current_lang];
$social_heading = $social_headings[$current_lang];

if ($current_lang == 'zh') {
    $social_desc = $social_desc_zh;
} else if ($current_lang == 'tw') {
    $social_desc = $social_desc_tw;
} else if ($current_lang == 'id') {
    $social_desc = $social_desc_id;
} else {
    $social_desc = $social_desc_en;
}

$countryCode = RF_Language::get_country_code();

$countryCode = $countryCode ? strtolower($countryCode) : 'sg';

if (in_array($countryCode, ['sg', 'id', 'hk', 'cn', 'tw', 'my'])) {
    $instagram = $instagrams[$countryCode];
    $facebook = $facebooks[$countryCode];
    $linkedin = $linkedins[$countryCode];
} else {
    $instagram = $instagrams['sg'];
    $facebook = $facebooks['sg'];
    $linkedin = $linkedins['sg'];
}

$args = array(
    'post_type' => 'sticker',
    'posts_per_page' => -1
);

$stickers = get_posts($args);

$sticker_data = [];
$prefix = 'rf_';

foreach ($stickers as $sticker) {
    $languages = get_post_meta($sticker->ID, $prefix . 'language', true);

    foreach ($languages as $language) {
        $qrcode_img = $language['rf_qrcode'] ? wp_get_attachment_image_url($language['rf_qrcode'], 'large') : '';
        $preview_img = $language['rf_preview'] ? wp_get_attachment_image_url($language['rf_preview'], 'full') : '';
        $sticker_data[] = array(
            'id' => $sticker->ID,
            'title' => $sticker->post_title,
            'language' => strtolower($language['rf_language']),
            'whatsapp' => $language['rf_whatsapp'],
            'telegram' => $language['rf_telegram'],
            'wechat' => $language['rf_wechat'],
            'qrcode' => $qrcode_img,
            'preview' => $preview_img,
        );
    }
}

$cal_args = array(
    'post_type' => 'calendar',
    'posts_per_page' => -1
);

$calendars = get_posts($cal_args);

?>
<div class="site-main blogs">
    <section class="blogs-header">
        <div class="container">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <div class="blogs-header__image">
                <img src="<?php echo THEME_URL; ?>/images/blog-hero.png" alt="<?php single_post_title(); ?>">
            </div>
        </div>
    </section>
    <section class="blogs-post">
        <div class="container">
            <div class="grid">
                <div class="grid__column">
                    <div class="page-heading">
                        <h3 class="heading"><?php echo $heading; ?></h3>
                        <div class="page-tab">
                            <a class="is-active"
                               href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php esc_html_e('All', 'rf'); ?></a>
                            <?php
                            $categories = get_categories(array(
                                'hide_empty' => false,
                                'orderby' => 'ID',
                                'order' => 'ASC'
                            ));

                            foreach ($categories as $category) {
                                ?>
                                <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-post pdt--20" data-blog-list>
                <div class="grid grid--three-columns grid--doubling grid--stackable">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();
                            ?>
                            <div class="grid__column">
                                <?php echo get_template_part('template-parts/blog-grid'); ?>
                            </div>
                        <?php
                        endwhile;

                    else :

                        echo '<div class="grid__column"><h3 class="h4 no-post">' . __('No Post Found', 'rf') . '</h3></div>';

                    endif;
                    ?>
                </div>
                <?php rf_navigation(); ?>
            </div>
        </div>
    </section>
    <div class="sticker">
        <div class="sticker-header">
            <div class="container">
                <div class="grid grid--two-columns grid--stackable">
                    <div class="grid__column">
                        <div class="sticker-header__content">
                            <h2><?php esc_html_e('Ruby Media Library', 'rf'); ?></h2>
                            <p><?php esc_html_e('Spice up the boring group chats and make your conversations cooler by sending our fun and entertaining Ruby The Recruiter collections.', 'rf'); ?></p>
                        </div>
                    </div>
                    <div class="grid__column">
                    </div>
                </div>
            </div>
            <div class="sticker-header__img">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/sticker/sticker1.png" alt="Ruby Media Library" width="725px">
            </div>
        </div>
        <div class="sticker-download">
            <div class="container">
                <div class="grid grid--two-columns grid--stackable">
                    <div class="grid__column">
                        <div class="sticker-filter">
                            <h4 class="text--bold"><?php esc_html_e('Download Ruby Stickers', 'rf'); ?></h4>
                            <p><?php esc_html_e('Please select language and platform of the Ruby stickers that you want to download.', 'rf'); ?></p>
                            <div class="sticker-form">
                                <div class="form__field form__field--select">
                                    <select id="location" class="form__control form__control--select" name="language">
                                        <option value=""><?php esc_html_e('Select Language', 'rf'); ?></option>
                                        <option value="english">English</option>
                                        <option value="mandarin">Mandarin</option>
                                        <option value="cantonese">Cantonese</option>
                                    </select>
                                </div>
                                <div class="form__field form__field--select">
                                    <select id="location" class="form__control form__control--select" name="sticker_pack">
                                        <option value=""><?php esc_html_e('Select Sticker Pack', 'rf'); ?></option>
                                        <?php foreach ($stickers as $sticker) : ?>
                                            <option value="<?php echo $sticker->ID; ?>"><?php echo $sticker->post_title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form__field form__field--select">
                                    <select id="location" class="form__control form__control--select" name="message_app">
                                        <option value=""><?php esc_html_e('Select Message App', 'rf'); ?></option>
                                        <option value="whatsapp">WhatsApp</option>
                                        <option value="telegram">Telegram</option>
                                        <option value="wechat">Wechat</option>
                                    </select>
                                </div>
                                <div class="form__field form__field--submit text--center form__field-submit">
                                    <a href="#" target="_blank" disabled class="btn btn-submit btn--full" data-btn-download>
                                        <span class="btn-text"><?php esc_html_e('Download', 'rf'); ?></span>
                                    </a>
                                    <div class="sticker-qrcode">
                                        <img loading="lazy" src="" alt="">
                                        <p><?php esc_html_e('Scan QR Code to download Ruby Stickers on your WeChat app.', 'rf'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column">
                        <div class="sticker-preview scroll-container">
                            <img loading="lazy" data-sticker-preview src="<?php echo THEME_URL; ?>/images/sticker/sticker2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticker-calendar">
            <div class="container">
                <div class="grid">
                    <div class="grid__column">
                        <h2 class="h4 text--bold"><?php esc_html_e('Download Ruby Calendars & Wallpapers', 'rf'); ?></h2>
                    </div>
                </div>
                <div class="grid grid--two-columns grid--stackable grid--equal-height">
                    <?php foreach ($calendars as $calendar) :
                        $preview = get_post_meta($calendar->ID, 'rf_preview', true);
                        $full_preview = get_post_meta($calendar->ID, 'rf_full_preview', true);
                        $download = get_post_meta($calendar->ID, 'rf_download', true);
                        $preview_img = $preview ? wp_get_attachment_image_url($preview, 'large') : '';
                        $full_preview_img = $full_preview ?  wp_get_attachment_image_url($full_preview, 'large') : '';
                    ?>
                    <div class="grid__column">
                        <div class="calendar-card">
                            <div class="calendar-card__img">
                                <img loading="lazy" src="<?php echo $preview_img ?>" alt="<?php echo $calendar->post_title; ?>">
                            </div>
                            <div class="calendar-card__info">
                                <h4 class="text--bold"><?php echo $calendar->post_title; ?></h4>
                                <div class="flex align--center">
                                    <a href="#calendar-preview" data-preview="<?php echo $full_preview_img ?>" data-open-popup data-title="<?php echo $calendar->post_title; ?>" data-download-url="<?php echo $download; ?>" class="calendar-card__preview"><?php esc_html_e('Preview full collection', 'rf'); ?></a>
                                    <a href="<?php echo $download; ?>" class="btn btn-download" target="_blank"><?php esc_html_e('Download', 'rf'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-footer">
        <div class="container">
            <h2 class="text--bold"><?php echo $social_heading; ?></h2>
            <p><?php echo $social_desc; ?></p>
            <?php if ($countryCode == 'cn') : ?>
                <div class="blog-footer__socials">
                    <?php if ($linkedin) : ?>
                        <a href="<?php echo $linkedin; ?>" target="_blank">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.508 10h-7a2.5 2.5 0 00-2.5 2.5v7a2.5 2.5 0 002.5 2.5h7a2.5 2.5 0 002.5-2.5v-7a2.5 2.5 0 00-2.5-2.5zm-5.5 9.5h-1.5V14h1.5v5.5zm-.75-6.134a.879.879 0 01-.875-.882c0-.487.392-.882.875-.882s.875.395.875.882a.878.878 0 01-.875.882zm6.75 6.134h-1.5v-2.802c0-1.684-2-1.556-2 0V19.5h-1.5V14h1.5v.883c.698-1.293 3.5-1.389 3.5 1.238V19.5z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($wechat) : ?>
                        <div class="wechat">
                            <a href="javascript:void(0)">
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.418 14.809c-3.621 1.866-1.213 6.873 3.305 5.566.42.163.796.428 1.204.625a26.441 26.441 0 00-.338-1.055c1.4-.998 1.707-2.41 1.19-3.57-.809-1.838-3.389-2.591-5.361-1.566zm1.265 1.829c-.105.327-.578.425-.808.176-.253-.23-.154-.712.178-.815.367-.155.79.271.63.639zm2.39.047h.007c-.129.294-.57.363-.788.135-.104-.096-.135-.24-.172-.367.052-.23.21-.468.465-.479.353-.049.668.388.488.711z"
                                          fill="currentColor"></path>
                                    <path d="M18.715 14.124c-.218-1.072-.968-1.978-1.912-2.5h.013c-3.35-1.893-7.52.747-6.715 3.861.217.924.856 1.698 1.631 2.216-.15.426-.292.852-.427 1.282.487-.256.975-.524 1.463-.784.585.189 1.207.281 1.83.26-.77-2.206 1.203-4.543 4.117-4.335zm-3.039-1.28c.393-.159.857.172.826.595v.005c.005.483-.637.784-.997.457-.373-.269-.267-.922.171-1.057zm-2.202.723c-.086.419-.646.621-.973.34-.38-.268-.273-.934.172-1.07.437-.168.933.277.8.73z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="wechat-qr wechat-qr--top wechat-qr--bordered wechat-qr--small text--center">
                                <img loading="lazy" src="<?php echo $wechat_qr_img; ?>" alt="Wechat QRCode" width="200">
                                <p class="mgt--10">
                                    <?php if (wp_is_mobile()) {
                                        echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                    } else {
                                        echo sprintf(__("Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                    } ?>
                                </p>
                                <?php if (wp_is_mobile()) : ?>
                                    <a target="_blank" class="btn btn--small"
                                       href="<?php echo $wechat; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($tiktok) : ?>
                        <a href="<?php echo $tiktok; ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                                 viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M21.2574 13.009c-.6849 0-1.3168-.2268-1.8242-.6096-.5819-.4387-1.0001-1.0823-1.1477-1.8241-.0366-.1833-.0563-.3724-.0581-.5663H16.271v5.3457l-.0023 2.928c0 .7828-.5098 1.4466-1.2164 1.68-.2051.0677-.4266.0999-.6572.0872-.2944-.0162-.5702-.105-.81-.2484-.5102-.3052-.8562-.8588-.8656-1.4921-.0147-.9897.7854-1.7967 1.7745-1.7967.1952 0 .3827.0319.5583.0898V14.6161c-.1852-.0274-.3736-.0417-.5642-.0417-1.0825 0-2.095.45-2.8188 1.2607-.547.6127-.8751 1.3943-.9258 2.2139-.0663 1.0768.3277 2.1003 1.0917 2.8554.1123.1109.2302.2138.3535.3087.6551.5041 1.4559.7774 2.2994.7774.1906 0 .379-.014.5642-.0415.788-.1167 1.515-.4774 2.0887-1.0446.705-.6968 1.0946-1.6218 1.0988-2.6065l-.0101-4.3725c.3363.2595.7041.4742 1.0988.6408.6138.259 1.2646.3903 1.9345.39v-1.9476c.0005.0004-.0052.0004-.0056.0004z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($xiaohongshu) : ?>
                        <a href="<?php echo $xiaohongshu; ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                                 viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M25.0002 16.3891c0-.3035-.1301-.5636-.3685-.7587-.2601-.195-.5419-.2818-.8671-.2818-.1083 0-.13-.0216-.13-.13v-.8237c-.0217-.4769-.1951-.867-.6503-1.1055-.3035-.1734-.6503-.195-.9971-.195-.3251 0-.3251 0-.3468-.3252v-.0217c0-.0867-.0217-.1083-.1084-.1083h-.737c-.1083 0-.2601-.0434-.3251.0216-.065.0651-.0217.2168-.0217.3252s-.0433.13-.13.1084h-.5636c-.0867 0-.1084.0216-.1084.1083v.9754c0 .0868.0217.1084.1084.1084h.5419c.1084 0 .1517.0217.1517.1301v.7803c0 .1084-.0433.1301-.1517.1301h-.9321c-.0867 0-.13.0216-.13.13v.9321c0 .1301.0433.1517.1517.1517h.9104c.1084 0 .1301.0217.1301.1301v2.276c0 .1083.0433.13.13.13h.867c.1951 0 .1951 0 .1951-.1951v-2.2109c0-.1084.0434-.1517.1518-.1517h1.5606c.3252 0 .4552.1517.4552.4551v.7804c0 .1951-.065.2601-.2601.2601h-.7803c-.1084 0-.1301.0217-.0867.13.13.2602.2384.5419.3468.8021.0217.0433.0433.0867.1084.0867.3468 0 .6936.0216 1.0187-.0434.4986-.0867.8454-.5202.8237-.9754.0217-.4986.0434-1.0621.0434-1.6257zm-2.6445-1.0405h-.6069c-.0867 0-.0867-.0433-.0867-.1083 0-.2818 0-.5419-.0217-.8237 0-.0867.0217-.1084.1084-.1084h.4769c.1517 0 .2167.065.2167.2384v.7153c0 .0651-.0217.0867-.0867.0867zM19.1907 17.8847h-.9104c-.0867 0-.1083-.0217-.1083-.1084v-3.3598c0-.1084.0433-.13.13-.1084h.5202c.0651 0 .1084-.0216.1084-.1083v-.9971c0-.0651-.0433-.0867-.1084-.0867h-2.536c-.0867 0-.1084.0216-.1084.1083v.9755c0 .1083.0433.13.13.1083h.4769c.1084 0 .1517.0217.1517.1301v3.3381c0 .0867-.0216.1301-.13.1301h-.8454c-.065 0-.1084 0-.1517.065-.1734.3685-.3252.737-.5202 1.1271.0433 0 .0433.0217.065.0217h3.8366c.0867 0 .1084-.0217.1084-.1084v-.9754c.0217-.1084-.0217-.1517-.1084-.1517zM10.4993 12.8993c0-.1517-.0433-.195-.1951-.1734-.2818.0217-.56355.0217-.82367 0-.15173 0-.1734.0434-.1734.1734v4.8771c0 .2818-.04336.3252-.32514.3252H8.6135c-.10838 0-.13006.0216-.08671.13.10838.2601.23844.5202.34682.7804.04335.0867.0867.1083.17341.1083h.52022c.39016-.0216.67196-.2167.82366-.5852.0651-.1951.0867-.3685.0867-.5853v-2.471c.0217-.8671.0217-1.7124.0217-2.5795z"/>
                                <path d="M15.5713 16.4324h-.3685c-.3252 0-.3468-.0216-.2168-.3251.2601-.5636.4986-1.1055.7587-1.669.0433-.1084.0217-.1518-.0867-.1518h-.802c-.1734 0-.1951-.065-.1301-.2167.1734-.4119.3685-.802.5419-1.2139.0217-.065.0867-.13.0867-.2167h-.9971c-.13 0-.2167.0433-.2601.1734-.2168.5202-.4552 1.0404-.6936 1.5606-.0867.1734-.1734.3468-.2168.5419-.065.2385.0217.4119.2601.4986.1518.065.3252.0433.4986.0433s.1734 0 .1084.1734c-.1735.4119-.3469.802-.5203 1.2139-.0433.0867-.065.1734-.0433.2601.0433.1951.1951.3251.4552.3468.4118.0217.8237 0 1.2355 0 .065 0 .0867-.0217.1301-.065.13-.2818.2384-.5419.3685-.8237.0216-.1084-.0217-.1301-.1084-.1301zM8.37456 14.3081h-.95374c-.10838 0-.13005.0434-.13005.1301-.04336.5419-.06503 1.0838-.13006 1.604-.04335.3685 0 .737-.15173 1.1055-.02168.0433 0 .065.02167.1083.17341.3902.34682.7804.52023 1.1705.04335.1084.0867.1084.15173.0217.30346-.4335.47687-.9321.56357-1.4523.13006-.8453.13006-1.7124.21676-2.5794.02168-.1084-.02167-.1084-.10838-.1084zM12.688 16.8227c-.0216-.2601-.0433-.5202-.065-.7803-.0433-.5419-.0867-1.0838-.13-1.6474 0-.0867-.0434-.1084-.1301-.1084h-.9104c-.13 0-.1517.0434-.1517.1518.065.7586.1084 1.4956.1734 2.2542.065.607.2384 1.1922.5852 1.7124.0867.1301.0867.1301.1518 0 .13-.3034.2601-.6069.4118-.9103.0867-.1951.1951-.3685.065-.5853v-.0867zM15.0938 17.8846h-1.1055c-.1734 0-.3685 0-.5419-.065-.0867-.0217-.13 0-.1734.0867-.1301.3035-.2818.6069-.4118.9321-.0867.1734-.0867.1734.1083.2167.2818.065.5853.0217.802.0434h.7804c.065 0 .1084-.0217.1517-.0867.1517-.3468.3035-.672.4769-1.0188.0217-.0867 0-.1084-.0867-.1084zM23.8513 14.2647c.0651.0651.2168.0217.3468.0217h.1951c.3902 0 .607-.2384.607-.6286 0-.3035-.1951-.5202-.4769-.5636-.3035-.0433-.5636.1084-.672.3902-.0433.1517-.0433.2818-.0433.4335.0217.1084-.0434.2818.0433.3468z"
                                      fill="currentColor"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="blog-footer__socials">
                    <?php if ($instagram) : ?>
                        <a href="<?php echo $instagram; ?>" target="_blank">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.258 10h-4.5a3.75 3.75 0 00-3.75 3.75v4.5a3.75 3.75 0 003.75 3.75h4.5a3.75 3.75 0 003.75-3.75v-4.5a3.75 3.75 0 00-3.75-3.75zm2.625 8.25a2.628 2.628 0 01-2.625 2.625h-4.5a2.628 2.628 0 01-2.625-2.625v-4.5a2.628 2.628 0 012.625-2.625h4.5a2.628 2.628 0 012.625 2.625v4.5z"
                                      fill="currentColor"></path>
                                <path d="M16.008 13a3 3 0 100 6 3 3 0 000-6zm0 4.875A1.878 1.878 0 0114.133 16c0-1.034.841-1.875 1.875-1.875 1.033 0 1.875.84 1.875 1.875a1.878 1.878 0 01-1.875 1.875zM19.233 13.175a.4.4 0 100-.8.4.4 0 000 .8z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($facebook) : ?>
                        <a href="<?php echo $facebook; ?>" target="_blank">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.525 22l-.017-5.25h-2.25V14.5h2.25V13c0-2.024 1.253-3 3.06-3 .864 0 1.608.064 1.824.093v2.116H18.14c-.982 0-1.172.467-1.172 1.152V14.5h2.79l-.75 2.25h-2.04V22h-2.443z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($linkedin) : ?>
                        <a href="<?php echo $linkedin; ?>" target="_blank">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.508 10h-7a2.5 2.5 0 00-2.5 2.5v7a2.5 2.5 0 002.5 2.5h7a2.5 2.5 0 002.5-2.5v-7a2.5 2.5 0 00-2.5-2.5zm-5.5 9.5h-1.5V14h1.5v5.5zm-.75-6.134a.879.879 0 01-.875-.882c0-.487.392-.882.875-.882s.875.395.875.882a.878.878 0 01-.875.882zm6.75 6.134h-1.5v-2.802c0-1.684-2-1.556-2 0V19.5h-1.5V14h1.5v.883c.698-1.293 3.5-1.389 3.5 1.238V19.5z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($sg_wechat && $countryCode == 'sg') : ?>
                        <div class="wechat">
                            <a href="javascript:void(0)">
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.418 14.809c-3.621 1.866-1.213 6.873 3.305 5.566.42.163.796.428 1.204.625a26.441 26.441 0 00-.338-1.055c1.4-.998 1.707-2.41 1.19-3.57-.809-1.838-3.389-2.591-5.361-1.566zm1.265 1.829c-.105.327-.578.425-.808.176-.253-.23-.154-.712.178-.815.367-.155.79.271.63.639zm2.39.047h.007c-.129.294-.57.363-.788.135-.104-.096-.135-.24-.172-.367.052-.23.21-.468.465-.479.353-.049.668.388.488.711z"
                                          fill="currentColor"></path>
                                    <path d="M18.715 14.124c-.218-1.072-.968-1.978-1.912-2.5h.013c-3.35-1.893-7.52.747-6.715 3.861.217.924.856 1.698 1.631 2.216-.15.426-.292.852-.427 1.282.487-.256.975-.524 1.463-.784.585.189 1.207.281 1.83.26-.77-2.206 1.203-4.543 4.117-4.335zm-3.039-1.28c.393-.159.857.172.826.595v.005c.005.483-.637.784-.997.457-.373-.269-.267-.922.171-1.057zm-2.202.723c-.086.419-.646.621-.973.34-.38-.268-.273-.934.172-1.07.437-.168.933.277.8.73z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="wechat-qr wechat-qr--top wechat-qr--bordered wechat-qr--small text--center">
                                <img loading="lazy" src="<?php echo $wg_wechat_qr_img; ?>" alt="Wechat QRCode" width="200">
                                <p class="mgt--10">
                                    <?php if (wp_is_mobile()) {
                                        echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                    } else {
                                        echo sprintf(__("Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                    } ?>
                                </p>
                                <?php if (wp_is_mobile()) : ?>
                                    <a target="_blank" class="btn btn--small"
                                       href="<?php echo $sg_wechat; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="blog-footer__plane">
            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/blog-plane.png" alt="Plane">
        </div>
    </div>
</div>

<div class="rf-popup calendar-preview" id="calendar-preview">
    <div class="rf-popup__overlay"></div>
    <div class="rf-popup__container">
        <button class="rf-popup__close"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5l-9 9m9 0l-9-9 9 9z"/></svg></button>
        <h5 data-title></h5>
        <img src="" alt="" data-preview-image>
        <a href="#" class="btn btn-download" target="_blank" data-download-btn><?php esc_html_e('Download', 'rf'); ?></a>
    </div>
</div>
<script type="application/json" id="sticker-data">
    <?php echo wp_json_encode($sticker_data); ?>
</script>
<?php
get_footer('v2');
?>
<script>
	$('.page-tab a').click(function (e) {
		e.preventDefault()
		$(this).siblings('a').removeClass('is-active')
		$(this).addClass('is-active')
		const url = $(this).attr('href')
		loadHtml(url)
	})
	$('body').on('click', '.page-numbers', function (e) {
		e.preventDefault()
		const url = $(this).attr('href')
		loadHtml(url)
		document.querySelector('.blogs-post').scrollIntoView({
			behavior: 'smooth'
		})
	})

	function loadHtml(url) {
		$.get(url, function (res) {
			const html = $(res).find('.blog-post').html()
			console.log(html)
			$('[data-blog-list]').html(html)
		})
	}
</script>
