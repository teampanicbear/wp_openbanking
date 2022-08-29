<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package recruitfirst
 */

get_header('v2');

$settings = get_option( 'rf-settings' );

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

$cover_image = get_post_meta(get_the_ID(), 'rf_cover', true);
$author = get_post_meta(get_the_ID(), 'rf_author', true);

$args = array(
    'posts_per_page' => 3,
    'category__in' => wp_get_post_categories(get_the_ID()),
    'post__not_in' => array(get_the_ID())
);

$my_query = new wp_query($args);

?>

    <div class="site-main blog-detail">
        <section class="blog-detail__head<?php if (empty($cover_image)) echo ' blog-detail__head--no-cover'; ?>">
            <?php while (have_posts()) :
            the_post(); ?>
            <div class="container">
                <div class="blog-detail__wrapper eight-twelfths tablet--one-whole mobile--one-whole">
                    <div class="text--center">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="page-back page-back--center">
                        <span class="page-back__icon">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity=".2" cx="17" cy="17" r="16" transform="rotate(90 17 17)" stroke="#fff"/><line x1="23" y1="17" x2="14" y2="17" stroke="#fff" stroke-width="2" stroke-linecap="round"/><path d="M17 12l-5 5 5 5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span class="page-back__label"><?php esc_html_e('Back to Blog', 'rf'); ?></span>
                        </a>
                    </div>
                    <h1 class="h2 blog-detail__title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="blog-detail__info">
                        <?php if ($author) : ?>
                        <div class="blog-detail__info-item">
                            <span class="blog-detail__info-icon">
                                <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.333 14v-1.333A2.667 2.667 0 0010.666 10H5.333a2.667 2.667 0 00-2.667 2.667V14m5.333-6.667a2.667 2.667 0 100-5.333 2.667 2.667 0 000 5.333z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <?php echo $author; ?>
                        </div>
                        <?php endif; ?>

                        <?php
                        $categories = get_the_category(get_the_ID());
                        if (!empty($categories)) :
                            ?>
                            <div class="blog-detail__info-item">
                                <span class="blog-detail__info-icon">
                                    <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><g
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"><path
                                                    d="M2 2h4.667v4.667H2V2zM9.334 2h4.667v4.667H9.334V2zM9.334 9.333h4.667V14H9.334V9.333zM2 9.333h4.667V14H2V9.333z"/></g></svg>
                                </span>
                                <?php echo $categories[0]->name; ?>
                            </div>
                        <?php endif; ?>
                        <div class="blog-detail__info-item">
                            <span class="blog-detail__info-icon">
                                <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><g
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"><path
                                                d="M8 14.667A6.667 6.667 0 108 1.333a6.667 6.667 0 000 13.334z"/><path
                                                d="M8 4v4l2.667 1.333"/></g></svg>
                            </span>
                            <?php echo get_the_date('d M Y'); ?>
                        </div>
                    </div>
                    <?php if (!empty($cover_image)) :
                        $image = wp_get_attachment_image_url($cover_image, 'full');
                        ?>
                        <div class="blog-detail__thumbnail">
                            <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section class="blog-detail__content">
            <div class="container">
                <div class="blog-detail__wrapper six-twelfths desk--eight-twelfths tablet--one-whole mobile--one-whole">
                    <div class="blog-detail__rte">
                        <?php echo the_content(); ?>
                    </div>
                    <div class="blog-detail__social">
                        <?php if ($countryCode != 'cn') : ?>
                        <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>"
                           class="blog-detail__social-item">
                            <span class="blog-detail__social-icon">
                                <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path
                                            d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                            fill="currentColor"/></svg>
                            </span>
                        </a>
                        <?php endif; ?>
                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_the_permalink(); ?>"
                           class="blog-detail__social-item">
                            <span class="blog-detail__social-icon">
                                <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path
                                            d="M12.667 0H3.333A3.334 3.334 0 000 3.333v9.334A3.334 3.334 0 003.333 16h9.334A3.333 3.333 0 0016 12.667V3.333A3.333 3.333 0 0012.667 0zM5.333 12.667h-2V5.333h2v7.334zm-1-8.179a1.172 1.172 0 01-1.166-1.176c0-.65.522-1.176 1.166-1.176.644 0 1.167.527 1.167 1.176 0 .65-.522 1.176-1.167 1.176zm9 8.179h-2V8.93c0-2.246-2.666-2.076-2.666 0v3.736h-2V5.333h2V6.51c.93-1.724 4.666-1.851 4.666 1.65v4.507z"
                                            fill="currentColor"/></svg>
                            </span>
                        </a>
                        <?php if ($countryCode != 'cn') : ?>
                        <a href="https://wa.me/?text=<?php echo rawurlencode( get_the_permalink()); ?>" class="blog-detail__social-item" target="_blank">
                            <svg class="blog-detail__social-icon" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M13.7551 2.3812C12.3075.9206 10.3828.1162 8.3355.1162c-2.0472 0-3.972.8044-5.4196 2.265C1.4682 3.8418.671 5.7837.671 7.8492c0 1.3085.3283 2.5943.9514 3.7332L0 16.2594l4.6354-1.6369a7.608 7.608 0 003.7001.9599c2.0472 0 3.972-.8044 5.4196-2.265C15.2028 11.8568 16 9.9149 16 7.8493s-.7972-4.0075-2.2449-5.4681zm-1.6306 8.3408l-.8848.8928c-.733.7395-2.8129-.1598-4.6454-2.0087-1.8325-1.849-2.7239-3.9474-1.9909-4.687l.8849-.8927a.4663.4663 0 01.6636 0l1.106 1.116a.4765.4765 0 010 .6695l-.6636.6696c.6437 1.371 1.738 2.475 3.097 3.1246l.6635-.6696a.4664.4664 0 01.6637 0l1.106 1.1159a.4764.4764 0 010 .6696z"
                                      fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="https://t.me/share/url?url=<?php echo rawurlencode( get_the_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" target="_blank" class="blog-detail__social-item">
                            <svg class="blog-detail__social-icon" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M15.6371 2.0814a.3298.3298 0 00-.0785-.1531.3262.3262 0 00-.1445-.092 1.1361 1.1361 0 00-.6033.043S1.4314 6.8426.6084 7.2908c-.1906.104-.2206.1837-.248.263-.1333.384.2807.5536.2807.5536l3.4627 1.1384 1.653 4.5339s.1813.4396.436.4396c.1086 0 .3546-.1154.7063-.4709.7463-.753 1.4627-1.3772 1.8203-1.6815 1.1907.8296 2.472 1.7468 3.025 2.2267a.961.961 0 00.3226.2082.9546.9546 0 00.3774.0646c.525-.0199.6714-.6014.6714-.6014s2.4483-9.9418 2.53-11.2736c.008-.1305.019-.2136.0203-.3027a1.135 1.135 0 00-.029-.3074zM4.6914 8.9725c1.73-1.1014 7.5537-4.802 7.9247-4.9395.0667-.0195.113.0027.1.0478-.1647.5835-6.3413 6.125-6.364 6.1435a.1408.1408 0 00-.0443.1056l-.2404 2.4904-1.376-3.8478z"
                                      fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="https://social-plugins.line.me/lineit/share?url=<?php echo rawurlencode( get_the_permalink()); ?>" class="blog-detail__social-item" target="_blank">
                            <svg class="blog-detail__social-icon" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <g>
                                    <path d="M8 .4526c-4.41 0-8 2.9583-8 6.5939 0 3.2562 2.8467 5.9844 6.69 6.503.2607.0558.6153.1749.7053.3995.08.2038.0527.5186.0254.7312l-.1094.6901c-.03.2038-.16.8024.6994.4365.8606-.3645 4.6106-2.7605 6.2906-4.7212C15.4507 9.8076 16 8.498 16 7.0465 16 3.4109 12.41.4526 8 .4526zM4.8687 9.2083H3.278c-.23 0-.42-.193-.42-.4258V5.5532c0-.2334.19-.4264.42-.4264.232 0 .42.193.42.4264v2.8029h1.1707c.232 0 .4193.1917.4193.4264 0 .2327-.188.4258-.4193.4258zm1.644-.4258c0 .2327-.188.4258-.4207.4258-.23 0-.418-.193-.418-.4258V5.5532c0-.2334.188-.4264.42-.4264.2307 0 .4187.193.4187.4264v3.2293zm3.8273 0c0 .183-.116.345-.288.4036a.4272.4272 0 01-.1327.0209c-.1406 0-.2606-.0613-.34-.1696L7.9507 6.7922v1.9897c0 .2327-.186.4257-.4207.4257-.2307 0-.4173-.193-.4173-.4257V5.5532a.424.424 0 01.2866-.4029c.04-.0155.0907-.0222.1294-.0222.13 0 .25.0706.33.1722L9.5 7.5543v-2.001c0-.2335.188-.4265.42-.4265.23 0 .42.193.42.4264v3.2293zm2.57-2.0414c.2327 0 .42.193.42.4271 0 .2334-.1873.4264-.42.4264h-1.17v.7615h1.17c.2327 0 .42.1917.42.4264 0 .2327-.1873.4258-.42.4258h-1.5907c-.23 0-.418-.193-.418-.4258V5.5532c0-.2334.188-.4264.42-.4264h1.5907c.2307 0 .418.193.418.4264 0 .2361-.1873.4265-.42.4265h-1.17v.7614h1.17z"
                                          fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath>
                                        <path fill="#fff" transform="translate(0 .1162)"
                                              d="M0 0h16v16.1432H0z"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <?php endif; ?>
                        <a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>" class="blog-detail__social-item" target="_blank">
                            <svg class="blog-detail__social-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.79 9.893a.164.164 0 00.1.033h4.223a.164.164 0 00.1-.033l5.12-3.839a.167.167 0 00-.005-.27l-6.758-4.7a1.004 1.004 0 00-1.142 0L.675 5.782a.167.167 0 00-.005.27l5.12 3.841z"
                                      fill="#A0AEC0"/>
                                <path d="M11.389 10.262a.166.166 0 00.007.272l2.217 1.476a.5.5 0 11-.555.832l-2.834-1.888a.168.168 0 00-.093-.028H5.867a.168.168 0 00-.093.028l-2.828 1.888a.5.5 0 01-.555-.832l2.216-1.477a.166.166 0 00.007-.271L.267 7A.167.167 0 000 7.133v6.627a1.334 1.334 0 001.333 1.333h13.334A1.334 1.334 0 0016 13.76V7.137a.166.166 0 00-.267-.133l-4.344 3.258z"
                                      fill="#A0AEC0"/>
                            </svg>
                        </a>
                        <a href="#" class="copy-link blog-detail__social-item" data-link="<?php echo get_the_permalink(); ?>">
                            <svg class="blog-detail__social-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M9.62647 1.09333c1.45773-1.457772 3.82123-1.457772 5.27903 0 1.4578 1.45777 1.4578 3.82128-.0001 5.27905l-3.394 3.39405c-.4774.47757-1.0755.81667-1.73037.98117h-.02934l-.15463.032-.08533.016-.18396.0266h-.09064c-.04019 0-.0777.0045-.11355.0088-.02599.0031-.05111.0061-.07576.0072l-.15997.0187H8.68523a3.697737 3.697737 0 01-.39727-.0374c-.1093-.0186-.21597-.0399-.3226-.0666l-.15732-.0426c-.05599-.016-.11463-.0347-.17062-.056-.02051-.0079-.04138-.0153-.06234-.0228-.03626-.013-.07281-.026-.10829-.0412-.01866-.008-.03732-.0157-.05598-.0234-.03733-.0154-.07466-.0308-.11199-.0486-.3968-.1839-.75786-.4366-1.06646-.74653-.21615-.21668-.32879-.51578-.30929-.8212.01715-.25742.12704-.49991.30929-.68253.42089-.39615 1.07746-.39615 1.49838 0 .62458.62379 1.63637.62379 2.26094 0l.87452-.86919.0213-.02399 2.5009-2.49821c.6251-.62508.6251-1.63852 0-2.2636-.6251-.62507-1.6385-.62507-2.2636 0L9.11718 4.61804c-.07605.07655-.19078.09973-.2906.05864a4.479337 4.479337 0 00-1.7037-.33328h-.09864c-.10891.00209-.20815-.0623-.25061-.16263-.04296-.10004-.02081-.21611.05599-.29329l2.79685-2.79415zm-.48988 4.63913c.22687.14426.43702.31326.62654.50391.21615.21665.32877.51575.30937.82117-.0184.25558-.12824.49597-.30933.67722-.4209.39615-1.07747.39615-1.49839 0-.62458-.62379-1.63636-.62379-2.26094 0L2.59911 11.1368c-.62507.6251-.62507 1.6385 0 2.2636.62508.6251 1.63852.6251 2.26359 0l2.01299-2.0156c.07604-.0766.19077-.0998.2906-.0587a4.485561 4.485561 0 001.70635.3306h.10664c.14725-.0008.26732.1178.26817.2651.0004.0716-.028.1404-.07886.1908l-2.7995 2.7995c-.69881.6997-1.64805 1.0913-2.63687 1.0878-2.0615-.0013-3.731578-1.6735-3.730267-3.735.000626-.9879.392868-1.9353 1.090747-2.63448l3.39139-3.39405c.69906-.7015 1.64917-1.09499 2.63952-1.09314.71353 0 1.41209.20446 2.01298.58923z" clip-rule="evenodd"/></svg>
                            <span class="tooltip"><?php esc_html_e('Copied', 'rf'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
        </section>
        <?php if ($my_query->have_posts()) : ?>
        <section class="blog-detail__related">
            <div class="container">
                <div class="blog-detail__wrapper ten-twelfths">
                    <div class="page-heading">
                        <h3 class="heading"><?php esc_html_e('Related Articles', 'rf'); ?></h3>
                    </div>
                    <div class="grid grid--three-columns grid--stackable">
                        <?php
                        while ($my_query->have_posts()) :
                            $my_query->the_post();
                            ?>
                            <div class="grid__column">
                                <?php echo get_template_part('template-parts/blog-grid'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <div class="blog-footer">
            <div class="container">
                <h2 class="text--bold"><?php echo $social_heading; ?></h2>
                <p><?php echo $social_desc; ?></p>
                <?php if ($countryCode === 'cn') : ?>
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
                                    <img src="<?php echo $wechat_qr_img; ?>" alt="Wechat QRCode" width="200">
                                    <p class="mgt--10">
                                        <?php if (wp_is_mobile()) {
                                            echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                        } else {
                                            echo sprintf(__("Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                        }?>
                                    </p>
                                    <?php if (wp_is_mobile()) : ?>
                                        <a target="_blank" class="btn btn--small" href="<?php echo $wechat; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($tiktok) : ?>
                            <a href="<?php echo $tiktok; ?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32"><path fill="currentColor" d="M21.2574 13.009c-.6849 0-1.3168-.2268-1.8242-.6096-.5819-.4387-1.0001-1.0823-1.1477-1.8241-.0366-.1833-.0563-.3724-.0581-.5663H16.271v5.3457l-.0023 2.928c0 .7828-.5098 1.4466-1.2164 1.68-.2051.0677-.4266.0999-.6572.0872-.2944-.0162-.5702-.105-.81-.2484-.5102-.3052-.8562-.8588-.8656-1.4921-.0147-.9897.7854-1.7967 1.7745-1.7967.1952 0 .3827.0319.5583.0898V14.6161c-.1852-.0274-.3736-.0417-.5642-.0417-1.0825 0-2.095.45-2.8188 1.2607-.547.6127-.8751 1.3943-.9258 2.2139-.0663 1.0768.3277 2.1003 1.0917 2.8554.1123.1109.2302.2138.3535.3087.6551.5041 1.4559.7774 2.2994.7774.1906 0 .379-.014.5642-.0415.788-.1167 1.515-.4774 2.0887-1.0446.705-.6968 1.0946-1.6218 1.0988-2.6065l-.0101-4.3725c.3363.2595.7041.4742 1.0988.6408.6138.259 1.2646.3903 1.9345.39v-1.9476c.0005.0004-.0052.0004-.0056.0004z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($xiaohongshu) : ?>
                            <a href="<?php echo $xiaohongshu; ?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32"><path fill="currentColor" d="M25.0002 16.3891c0-.3035-.1301-.5636-.3685-.7587-.2601-.195-.5419-.2818-.8671-.2818-.1083 0-.13-.0216-.13-.13v-.8237c-.0217-.4769-.1951-.867-.6503-1.1055-.3035-.1734-.6503-.195-.9971-.195-.3251 0-.3251 0-.3468-.3252v-.0217c0-.0867-.0217-.1083-.1084-.1083h-.737c-.1083 0-.2601-.0434-.3251.0216-.065.0651-.0217.2168-.0217.3252s-.0433.13-.13.1084h-.5636c-.0867 0-.1084.0216-.1084.1083v.9754c0 .0868.0217.1084.1084.1084h.5419c.1084 0 .1517.0217.1517.1301v.7803c0 .1084-.0433.1301-.1517.1301h-.9321c-.0867 0-.13.0216-.13.13v.9321c0 .1301.0433.1517.1517.1517h.9104c.1084 0 .1301.0217.1301.1301v2.276c0 .1083.0433.13.13.13h.867c.1951 0 .1951 0 .1951-.1951v-2.2109c0-.1084.0434-.1517.1518-.1517h1.5606c.3252 0 .4552.1517.4552.4551v.7804c0 .1951-.065.2601-.2601.2601h-.7803c-.1084 0-.1301.0217-.0867.13.13.2602.2384.5419.3468.8021.0217.0433.0433.0867.1084.0867.3468 0 .6936.0216 1.0187-.0434.4986-.0867.8454-.5202.8237-.9754.0217-.4986.0434-1.0621.0434-1.6257zm-2.6445-1.0405h-.6069c-.0867 0-.0867-.0433-.0867-.1083 0-.2818 0-.5419-.0217-.8237 0-.0867.0217-.1084.1084-.1084h.4769c.1517 0 .2167.065.2167.2384v.7153c0 .0651-.0217.0867-.0867.0867zM19.1907 17.8847h-.9104c-.0867 0-.1083-.0217-.1083-.1084v-3.3598c0-.1084.0433-.13.13-.1084h.5202c.0651 0 .1084-.0216.1084-.1083v-.9971c0-.0651-.0433-.0867-.1084-.0867h-2.536c-.0867 0-.1084.0216-.1084.1083v.9755c0 .1083.0433.13.13.1083h.4769c.1084 0 .1517.0217.1517.1301v3.3381c0 .0867-.0216.1301-.13.1301h-.8454c-.065 0-.1084 0-.1517.065-.1734.3685-.3252.737-.5202 1.1271.0433 0 .0433.0217.065.0217h3.8366c.0867 0 .1084-.0217.1084-.1084v-.9754c.0217-.1084-.0217-.1517-.1084-.1517zM10.4993 12.8993c0-.1517-.0433-.195-.1951-.1734-.2818.0217-.56355.0217-.82367 0-.15173 0-.1734.0434-.1734.1734v4.8771c0 .2818-.04336.3252-.32514.3252H8.6135c-.10838 0-.13006.0216-.08671.13.10838.2601.23844.5202.34682.7804.04335.0867.0867.1083.17341.1083h.52022c.39016-.0216.67196-.2167.82366-.5852.0651-.1951.0867-.3685.0867-.5853v-2.471c.0217-.8671.0217-1.7124.0217-2.5795z"/><path d="M15.5713 16.4324h-.3685c-.3252 0-.3468-.0216-.2168-.3251.2601-.5636.4986-1.1055.7587-1.669.0433-.1084.0217-.1518-.0867-.1518h-.802c-.1734 0-.1951-.065-.1301-.2167.1734-.4119.3685-.802.5419-1.2139.0217-.065.0867-.13.0867-.2167h-.9971c-.13 0-.2167.0433-.2601.1734-.2168.5202-.4552 1.0404-.6936 1.5606-.0867.1734-.1734.3468-.2168.5419-.065.2385.0217.4119.2601.4986.1518.065.3252.0433.4986.0433s.1734 0 .1084.1734c-.1735.4119-.3469.802-.5203 1.2139-.0433.0867-.065.1734-.0433.2601.0433.1951.1951.3251.4552.3468.4118.0217.8237 0 1.2355 0 .065 0 .0867-.0217.1301-.065.13-.2818.2384-.5419.3685-.8237.0216-.1084-.0217-.1301-.1084-.1301zM8.37456 14.3081h-.95374c-.10838 0-.13005.0434-.13005.1301-.04336.5419-.06503 1.0838-.13006 1.604-.04335.3685 0 .737-.15173 1.1055-.02168.0433 0 .065.02167.1083.17341.3902.34682.7804.52023 1.1705.04335.1084.0867.1084.15173.0217.30346-.4335.47687-.9321.56357-1.4523.13006-.8453.13006-1.7124.21676-2.5794.02168-.1084-.02167-.1084-.10838-.1084zM12.688 16.8227c-.0216-.2601-.0433-.5202-.065-.7803-.0433-.5419-.0867-1.0838-.13-1.6474 0-.0867-.0434-.1084-.1301-.1084h-.9104c-.13 0-.1517.0434-.1517.1518.065.7586.1084 1.4956.1734 2.2542.065.607.2384 1.1922.5852 1.7124.0867.1301.0867.1301.1518 0 .13-.3034.2601-.6069.4118-.9103.0867-.1951.1951-.3685.065-.5853v-.0867zM15.0938 17.8846h-1.1055c-.1734 0-.3685 0-.5419-.065-.0867-.0217-.13 0-.1734.0867-.1301.3035-.2818.6069-.4118.9321-.0867.1734-.0867.1734.1083.2167.2818.065.5853.0217.802.0434h.7804c.065 0 .1084-.0217.1517-.0867.1517-.3468.3035-.672.4769-1.0188.0217-.0867 0-.1084-.0867-.1084zM23.8513 14.2647c.0651.0651.2168.0217.3468.0217h.1951c.3902 0 .607-.2384.607-.6286 0-.3035-.1951-.5202-.4769-.5636-.3035-.0433-.5636.1084-.672.3902-.0433.1517-.0433.2818-.0433.4335.0217.1084-.0434.2818.0433.3468z" fill="currentColor"/></svg>
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
                                    <img src="<?php echo $wg_wechat_qr_img; ?>" alt="Wechat QRCode" width="200">
                                    <p class="mgt--10">
                                        <?php if (wp_is_mobile()) {
                                            echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                        } else {
                                            echo sprintf(__("Scan QR or search for %1s on WeChat to follow us", 'rf'), '<span>RecruitFirst</span>');
                                        }?>
                                    </p>
                                    <?php if (wp_is_mobile()) : ?>
                                        <a target="_blank" class="btn btn--small" href="<?php echo $sg_wechat; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="blog-footer__plane">
                <img src="<?php echo THEME_URL; ?>/images/blog-plane.png" alt="Plane">
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard(text) {
            var input = document.body.appendChild(document.createElement("input"));
            input.value = text;
            input.select();
            document.execCommand('copy');
            input.parentNode.removeChild(input);
        }
        document.querySelector('.copy-link').addEventListener('click', function (e) {
            e.preventDefault()
            const link = this.dataset.link
            copyToClipboard(link)
            this.classList.add('copied')
            const button = this
            setTimeout(function () {
                button.classList.remove('copied')
            }, 1500)
        })
    </script>
<?php
get_footer('v2');
