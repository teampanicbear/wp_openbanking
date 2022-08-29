<?php
/**
 * Template Name: Homepage
 *
 * @package recruitfirst
 */

get_header();

$jobs_list = [];
$countryCode = RF_Language::get_country_code();

if ($countryCode) $jobs_list = RF_API::get_jobs_by_country($countryCode);

$candidate_url = get_page_url('templates/candidate');
$employer_url = get_page_url('templates/employer');

// Get page content
$prefix = 'rf_';

$s1_heading = get_post_meta(get_the_ID(), $prefix . 's1_heading', true);
$s1_btn_1 = get_post_meta(get_the_ID(), $prefix . 's1_btn_1', true);
$s1_btn_2 = get_post_meta(get_the_ID(), $prefix . 's1_btn_2', true);

$s2_heading = get_post_meta(get_the_ID(), $prefix . 's2_heading', true);
$s2_description = get_post_meta(get_the_ID(), $prefix . 's2_description', true);
$s2_content = get_post_meta(get_the_ID(), $prefix . 's2_content', true);

$s3_heading = get_post_meta(get_the_ID(), $prefix . 's3_heading', true);
$s3_description = get_post_meta(get_the_ID(), $prefix . 's3_description', true);
$s3_button = get_post_meta(get_the_ID(), $prefix . 's3_button', true);
$s3_button_empty = get_post_meta(get_the_ID(), $prefix . 's3_button_empty', true);

$s4_heading = get_post_meta(get_the_ID(), $prefix . 's4_heading', true);
$s4_description = get_post_meta(get_the_ID(), $prefix . 's4_description', true);
$s4_score = get_post_meta(get_the_ID(), $prefix . 's4_score', true);
$s4_reviews = get_post_meta(get_the_ID(), $prefix . 's4_reviews', true);
$avatar_positions = array(
    array(
        'top' => 30,
        'left' => 240
    ),
    array(
        'top' => 85,
        'left' => 290
    ),
    array(
        'top' => 200,
        'left' => 300
    ),
    array(
        'top' => 300,
        'left' => 200
    ),
    array(
        'top' => 300,
        'left' => 100
    ),
    array(
        'top' => 220,
        'left' => 30
    ),
    array(
        'top' => 133,
        'left' => 10
    ),
    array(
        'top' => 65,
        'left' => 50
    ),
    array(
        'top' => 120,
        'left' => 120
    )
);

$s5_heading = get_post_meta(get_the_ID(), $prefix . 's5_heading', true);
$s5_description = get_post_meta(get_the_ID(), $prefix . 's5_description', true);
$s5_qrcode = get_post_meta(get_the_ID(), 'wechat_qr', true);
$wechat_text = get_post_meta(get_the_ID(), 'wechat_text', true);

$image_path = 'sg';
if ($countryCode == 'CN' || $countryCode == 'TW') {
    $image_path = sanitize_title_with_dashes($countryCode);
};

$s5_images = rwmb_meta( 's5_sg_images', array( 'size' => 'medium' ) );

$settings = get_option( 'rf-settings' );

$instagram_urls = array(
    'sg' => $settings['sg_link'],
    'hk' => $settings['hk_link'],
    'tw' => $settings['tw_link'],
    'id' => $settings['id_link'],
    'my' => $settings['my_link'],
    'cn' => $settings['cn_link'],
);

$follow_url = $instagram_urls[strtolower($countryCode)] ? $instagram_urls[strtolower($countryCode)] : 'https://www.instagram.com/recruitfirst/';

$reviews = array(
    'sg' => $settings['reviews_sg'],
    'hk' => $settings['reviews_hk'],
    'tw' => $settings['reviews_tw'],
    'id' => $settings['reviews_id'],
    'my' => $settings['reviews_my'],
    'cn' => $settings['reviews_cn'],
);

$review = $reviews[strtolower($countryCode)] ? $reviews[strtolower($countryCode)] : $settings['reviews_sg'];
?>
<?php if (wp_is_mobile()) :
    get_template_part( 'templates/homepage', 'mb', array(
        'jobs_list' => $jobs_list,
        's1_heading' => $s1_heading,
        's1_btn_1' => $s1_btn_1,
        's1_btn_2' => $s1_btn_2,
        's2_heading' => $s2_heading,
        's2_description' => $s2_description,
        's2_content' => $s2_content,
        's3_heading' => $s3_heading,
        's3_description' => $s3_description,
        's3_button' => $s3_button,
        's3_button_empty' => $s3_button_empty,
        's4_heading' => $s4_heading,
        's4_description' => $s4_description,
        's4_score' => $s4_score,
        's4_reviews' => $s4_reviews,
        's5_heading' => $s5_heading,
        's5_description' => $s5_description,
        'follow_url' => $follow_url,
        'review' => $review,
        'countryCode' => $countryCode,
        's5_qrcode' => $s5_qrcode,
        's5_images' => $s5_images
    ) );
else:
?>
<div class="home-sections">
    <div class="home-section home-s1 home--current">
        <div class="home-s1__videos">
            <video class="home-s1__video home-s1__video--before" autoplay muted loop playsinline preload="auto">
                <?php if (!is_safari()) : ?>
                <source src="<?php echo THEME_URL;?>/images/videos/01-loop.webm" type="video/webm">
                <?php endif; ?>
                <source src="<?php echo THEME_URL;?>/images/videos/01-loop.mov" type="video/mp4">
            </video>
            <video class="home-s1__video home-s1__video--trans-next" muted playsinline preload="auto">
                <?php if (!is_safari()) : ?>
                    <source src="<?php echo THEME_URL;?>/images/videos/02-trans.webm" type="video/webm">
                <?php endif; ?>
                <source src="<?php echo THEME_URL;?>/images/videos/02-trans.mov" type="video/mp4">
            </video>
            <video class="home-s1__video home-s1__video--trans-back" muted playsinline preload="auto">
                <?php if (!is_safari()) : ?>
                    <source src="<?php echo THEME_URL;?>/images/videos/04-reverse.webm" type="video/webm">
                <?php endif; ?>
                <source src="<?php echo THEME_URL;?>/images/videos/04-reverse.mov" type="video/mp4">
            </video>
            <video class="home-s1__video home-s1__video--after" muted playsinline preload="auto">
                <?php if (!is_safari()) : ?>
                    <source src="<?php echo THEME_URL;?>/images/videos/03-loop.webm" type="video/webm">
                <?php endif; ?>
                <source src="<?php echo THEME_URL;?>/images/videos/03-loop.mov" type="video/mp4">
            </video>
        </div>
        <img loading="lazy" class="home-s1__obj home-s1__lap" src="<?php echo THEME_URL;?>/images/laptop.png" alt="Laptop" width="88" height="65">
        <img loading="lazy" class="home-s1__obj home-s1__paper" src="<?php echo THEME_URL;?>/images/paper.png" alt="Paper" width="66" height="75">
        <img loading="lazy" class="home-s1__obj home-s1__pen" src="<?php echo THEME_URL;?>/images/pen.png" alt="Pencil" width="50" height="50">
        <div class="home-s1__content">
            <h1 class="home-section__title splitting-line"><?php echo $s1_heading; ?></h1>
        </div>
        <div class="home-s1__actions">
            <a href="<?php echo $candidate_url; ?>">
                <span class="home-s1__actions-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 22 22"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.74779 18.0956c4.61041 0 8.34781-3.7374 8.34781-8.34781 0-4.61038-3.7374-8.34783-8.34781-8.34783-4.61038 0-8.34783 3.73745-8.34783 8.34783 0 4.61041 3.73745 8.34781 8.34783 8.34781zM20.5999 20.5999l-4.9494-4.9494"/></svg>
                </span>
                <span><?php echo $s1_btn_1; ?></span>
            </a>
            <a href="<?php echo $employer_url; ?>">
                <span class="home-s1__actions-icon">
                   <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor"><path d="M13.5 14.934v3.484c0 .173.044.546.049.607l.453 5.407a.497.497 0 00.498.456h4a.502.502 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.5.5 0 00.5-.498v-3.484a5.447 5.447 0 00-.933-3.056 5.486 5.486 0 00-2.49-2.016 5.515 5.515 0 00-6.008 1.256.246.246 0 00-.036.299 6.885 6.885 0 01.967 3.517v0zM16.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 0016.5 1C14.567 1 13 2.56 13 4.484a3.492 3.492 0 003.5 3.483zM1 18.418a.496.496 0 00.5.498h1.81a.25.25 0 01.249.228L4 24.432a.497.497 0 00.5.456h4a.501.501 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.501.501 0 00.5-.498v-3.484c0-1.451-.58-2.844-1.61-3.87A5.513 5.513 0 006.5 9.46a5.513 5.513 0 00-3.89 1.604A5.461 5.461 0 001 14.934v3.484zM6.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 006.5 1C4.567 1 3 2.56 3 4.484a3.492 3.492 0 003.5 3.483z"/><path d="M13.5 14.934v3.484c0 .173.044.546.049.607l.453 5.407a.497.497 0 00.498.456h4a.502.502 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.5.5 0 00.5-.498v-3.484a5.447 5.447 0 00-.933-3.056 5.486 5.486 0 00-2.49-2.016 5.515 5.515 0 00-6.008 1.256.246.246 0 00-.036.299 6.885 6.885 0 01.967 3.517v0zM16.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 0016.5 1C14.567 1 13 2.56 13 4.484a3.492 3.492 0 003.5 3.483zM1 18.418a.496.496 0 00.5.498h1.81a.25.25 0 01.249.228L4 24.432a.497.497 0 00.5.456h4a.501.501 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.501.501 0 00.5-.498v-3.484c0-1.451-.58-2.844-1.61-3.87A5.513 5.513 0 006.5 9.46a5.513 5.513 0 00-3.89 1.604A5.461 5.461 0 001 14.934v3.484zM6.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 006.5 1C4.567 1 3 2.56 3 4.484a3.492 3.492 0 003.5 3.483z"/></g></svg>
                </span>
                <span><?php echo $s1_btn_2; ?></span>
            </a>
        </div>
    </div>
    <div class="home-section home-s2">
        <h2 class="home-s2__title home-hidden"><?php esc_html_e('Why RecruitFirst?', 'rf'); ?></h2>
        <div class="home-s2__subtitle">
            <h2 class="splitting-line"><?php echo $s2_heading; ?></h2>
            <p class="home-s2__content-desc splitting-line"><?php echo $s2_description; ?></p>
        </div>
        <div class="home-s2__steps home-hidden">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <span class="home-s2__steps-icon" data-index="<?php echo $i; ?>">
                    <svg width="98" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="49" cy="49" r="48" stroke="#fff" stroke-opacity=".2" stroke-width="2"/>
                        <circle class="home-s2__steps-icon-border" cx="49" cy="49" r="48" stroke="#fff" stroke-width="2"/>
                    </svg>
                    <img loading="lazy" src="<?php echo THEME_URL; ?>/images/icon-<?php echo $i; ?>.png" alt="">
                </span>
            <?php endfor; ?>
            <div class="home-s2__steps-path">
                <svg width="1066" height="275" viewBox="0 0 1066 275" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="home-s2__steps-path--dashed" d="M2.009 272.413A655.992 655.992 0 01532.724 2a655.999 655.999 0 01530.716 270.413" stroke="#fff" stroke-opacity=".2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="home-s2__steps-path--fill" d="M2.009 272.413A656.01 656.01 0 01532.724 2a656 656 0 01530.716 270.413" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="0"/>
                </svg>
            </div>

            <div class="home-s2__controls">
                <button class="home-s2__arrow home-s2__arrow-back" data-action="back" disabled>
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="-1" x2="10" y2="-1" transform="matrix(-1 0 0 1 13 7)" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M6 11L1 6l5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <button class="home-s2__arrow home-s2__arrow-next" data-action="next">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="6" x2="10" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 11l5-5-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
        <div class="home-s2__content-wrapper">
            <?php foreach ($s2_content as $key => $content) : ?>
                <div class="home-s2__content home-s2__content--<?php echo $key + 1; ?>">
                    <h3 class="h4 home-s2__content-title splitting-line"><?php echo $content['rf_title']; ?></h3>
                    <p class="home-s2__content-desc splitting-line"><?php echo $content['rf_description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="home-section home-s3">
        <div class="home-section__header">
            <div class="text--bold line-wrapper">
                <div class="line home-s3__subtitle"><?php echo $s3_description; ?></div>
            </div>
            <h2 class="home-section__title splitting-line"><?php echo $s3_heading; ?></h2>
            <?php if (count($jobs_list) > 0) : ?>
            <div class="line-wrapper">
                <div class="line-button">
                    <a href="<?php echo $candidate_url; ?>" class="btn"><?php echo $s3_button; ?></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if (count($jobs_list) > 0) : ?>
        <div class="swiper-container job-list__container">
            <div class="job-list swiper-wrapper">
                <?php
                foreach ($jobs_list as $job) :

                    set_query_var( 'job', $job );
                    ?>
                    <div class="swiper-slide">
                        <?php get_template_part( 'template-parts/job', 'card' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="home-s3__controls">
            <button class="home-s3__controls-arrow home-s3__controls-prev">
                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="-1" x2="10" y2="-1" transform="matrix(-1 0 0 1 13 7)" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M6 11L1 6l5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <div class="swiper-pagination"></div>
            <button class="home-s3__controls-arrow home-s3__controls-next">
                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="6" x2="10" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 11l5-5-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </div>
        <?php else: ?>
            <div class="home-s3__empty">
                <div class="line-wrapper">
                    <div class="line">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 64 64"><g stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" opacity=".4"><path stroke="#E2E8F0" d="M54 2H10C7.79086 2 6 3.79086 6 6v52c0 2.2091 1.79086 4 4 4h44c2.2091 0 4-1.7909 4-4V6c0-2.20914-1.7909-4-4-4z"/><path stroke="#F8FAFC" d="M18 14h28M18 26h28M18 38h28M18 50h12"/></g></svg>
                    </div>
                </div>
                <div class="line-wrapper">
                    <h6 class="line"><?php esc_html_e('Currently, no jobs are available in your country!', 'rf'); ?></h6>
                </div>
                <div class="line-wrapper">
                    <div class="line">
                        <a href="<?php echo $candidate_url; ?>" class="btn"><?php echo $s3_button_empty ? $s3_button_empty : __('View other jobs', 'rf'); ?></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="home-s3__plane">
            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/plane.png" alt="Plane">
        </div>
    </div>
    <div class="home-section home-s4">
        <div class="home-s4__rocket">
            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/rocket.png" alt="Rocket" width="607" height="439">
        </div>
        <div class="home-s4__bg">
            <video loop muted playsinline autoplay>
                <source src="<?php echo THEME_URL; ?>/images/bg-sky.mp4" type="video/mp4">
            </video>
        </div>
        <div class="home-s4__content">
            <h3 class="splitting-line h4"><?php echo $s4_heading; ?></h3>
            <p class="splitting-line"><?php echo $s4_description; ?></p>
            <div class="home-s4__content-divider"></div>
            <div class="home-s4__reviews">
                <div class="home-s4__reviews-title">
                    <?php if ($s4_score) : ?>
                    <div class="line-wrapper">
                        <h4 class="line"><?php esc_html_e('NPS score', 'rf'); ?>: <span><?php echo $s4_score; ?></span></h4>
                    </div>
                    <?php endif; ?>
                    <div class="tooltip">
                    <span class="tooltip__activator">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 0C2.692 0 0 2.692 0 6c0 3.309 2.692 6 6 6 3.309 0 6-2.691 6-6 0-3.308-2.691-6-6-6zm1.329 9.142c-.33.13-1.476.677-2.136.096a.838.838 0 01-.295-.66c0-.498.164-.933.46-1.978.052-.197.115-.454.115-.656 0-.351-.133-.444-.494-.444-.176 0-.37.063-.547.128l.097-.399c.394-.16.888-.355 1.311-.355.635 0 1.101.317 1.101.919 0 .173-.03.477-.093.687l-.364 1.291c-.076.261-.213.837-.001 1.007.208.168.7.079.944-.036l-.098.4zM6.726 4a.75.75 0 110-1.5.75.75 0 010 1.5z" fill="#fff"/></svg>
                    </span>
                        <div class="tooltip__content">
                            <?php esc_html_e('Net Promoter Score - A universal customer experience metric of the likelihood our clients & candidates will recommend our services to others', 'rf'); ?>
                        </div>
                    </div>
                </div>
                <?php if ($review) : ?>
                    <div class="line-wrapper">
                        <div class="home-s4__reviews-item line">
                            <?php echo do_shortcode($review); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="home-s4__testimonial">
            <svg xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </defs>
            </svg>
            <svg class="home-s4__small-bubbles" width="589" height="645" viewBox="0 0 589 645" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="483" cy="437" r="7" fill="#BD60D4"/><circle cx="302" cy="548" r="7" fill="#6066FB"/><circle cx="223" cy="87" r="7" fill="#6066FB"/><circle cx="513" cy="363" r="7" fill="#6066FB"/><circle cx="7" cy="638" r="7" fill="#6066FB"/><circle cx="33" cy="373" r="7" fill="#FFBD6B"/><circle cx="264" cy="7" r="7" fill="#FFBD6B"/><circle cx="470" cy="267" r="7" fill="#FFBD6B"/><circle cx="585.5" cy="347.5" r="3.5" fill="#5393FF"/><circle cx="502.5" cy="525.5" r="3.5" fill="#5393FF"/><circle cx="444.5" cy="150.5" r="3.5" fill="#5393FF"/><circle cx="139.5" cy="508.5" r="3.5" fill="#FFBD6B"/><circle cx="184.5" cy="573.5" r="3.5" fill="#D46072"/><circle cx="77.5" cy="482.5" r="3.5" fill="#D46072"/><circle cx="375.5" cy="566.5" r="3.5" fill="#D46072"/><circle cx="414.5" cy="501.5" r="3.5" fill="#D46072"/><circle cx="8.5" cy="288.5" r="3.5" fill="#D46072"/><circle cx="482.5" cy="189.5" r="3.5" fill="#D46072"/><circle cx="328.5" cy="97.5" r="3.5" fill="#D46072"/><circle cx="361.5" cy="10.5" r="3.5" fill="#D46072"/><circle cx="12.5" cy="197.5" r="3.5" fill="#5393FF"/><circle cx="118.5" cy="134.5" r="3.5" fill="#BD60D4"/></svg>
            <div class="home-s4__circle">
                <svg class="home-s4__circle-progress" width="404" height="404" viewBox="0 0 404 404" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="202" cy="202" r="201" stroke="#F88900" stroke-width="3" />
                </svg>
                <div class="home-s4__circle-inner">
                    <?php foreach ($s4_reviews as $key => $review) : ?>
                        <div class="home-s4__review" data-index="<?php echo $key; ?>" data-active="<?php echo ($key == 0) ? 'true' : 'false'; ?>">
                            <h5 class="home-s4__testimonial-name splitting-line"><?php echo $review['rf_name']; ?></h5>
                            <div class="home-s4__testimonial-content splitting-line"><?php echo $review['rf_content']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="home-s4__bubbles">
                    <?php foreach ($s4_reviews as $key => $review) : ?>
                        <div class="home-s4__bubble" data-top="<?php echo $avatar_positions[$key]['top']; ?>" data-left="<?php echo $avatar_positions[$key]['left']; ?>" data-index="<?php echo $key; ?>">
                            <span><?php echo substr($review['rf_name'], 0, 2); ?></span>
                        </div>
                    <?php endforeach; ?>
                    <span class="satellite">
                        <img loading="lazy" src="<?php echo THEME_URL; ?>/images/glossy1.png" alt="satellite 1" width="46">
                    </span>
                    <span class="satellite">
                        <img loading="lazy" src="<?php echo THEME_URL; ?>/images/glossy2.png" alt="satellite 2" width="90">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="home-section home-s5">
        <?php if ($s5_images) : ?>
            <div class="home-s5__grid">
                <?php foreach ( $s5_images as $image ) : ?>
                    <img loading="lazy" class="home-s5__grid-img" src="<?php echo $image['full_url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="home-s5__content">
            <div class="line-wrapper">
                <?php if ($countryCode == 'CN') : ?>
                    <div class="line">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 36 36"><g clip-path="url(#wechat)"><path fill="url(#paint0_linear)" d="M19.2297 14.427c-10.86298 5.598-3.6375 20.6175 9.915 16.6965 1.263.4905 2.388 1.2855 3.612 1.8765-.3165-1.065-.654-2.118-1.014-3.1665 4.2-2.9925 5.121-7.227 3.5685-10.707-2.424-5.5155-10.164-7.7745-16.0815-4.6995zm3.795 5.487c-.3135.9825-1.734 1.2765-2.4225.5295-.759-.6915-.4635-2.136.5325-2.445 1.101-.465 2.373.8115 1.89 1.9155zm7.17.141h.021c-.3855.8805-1.7115 1.0875-2.3625.405-.3135-.288-.405-.7215-.516-1.0995.156-.69.63-1.4055 1.395-1.4385 1.0575-.147 2.004 1.164 1.4625 2.133z"/><path fill="url(#paint1_linear)" d="M19.2297 14.427c-10.86298 5.598-3.6375 20.6175 9.915 16.6965 1.263.4905 2.388 1.2855 3.612 1.8765-.3165-1.065-.654-2.118-1.014-3.1665 4.2-2.9925 5.121-7.227 3.5685-10.707-2.424-5.5155-10.164-7.7745-16.0815-4.6995zm3.795 5.487c-.3135.9825-1.734 1.2765-2.4225.5295-.759-.6915-.4635-2.136.5325-2.445 1.101-.465 2.373.8115 1.89 1.9155zm7.17.141h.021c-.3855.8805-1.7115 1.0875-2.3625.405-.3135-.288-.405-.7215-.516-1.0995.156-.69.63-1.4055 1.395-1.4385 1.0575-.147 2.004 1.164 1.4625 2.133z"/><path fill="url(#paint2_linear)" d="M26.1212 12.372c-.654-3.21597-2.904-5.93247-5.736-7.49997h.0405v-.0015C10.3757-.808469-2.1373 7.11303.280695 16.455c.6495 2.772 2.566495 5.0955 4.892995 6.6465-.45 1.2795-.87749 2.559-1.28249 3.8475 1.4625-.768 2.925-1.5705 4.389-2.3505 1.755.5655 3.6225.8415 5.49.78-2.307-6.618 3.6105-13.629 12.351-13.0065zm-9.1155-3.84147c1.1775-.474 2.5695.5175 2.4765 1.78497l.003.018c.012 1.4475-1.9125 2.3505-2.9925 1.3695-1.1205-.807-.8025-2.76747.513-3.17247zM10.3982 10.701c-.258 1.257-1.93651 1.8645-2.919 1.02-1.13851-.8055-.81901-2.80197.51749-3.20847 1.30951-.507 2.79751.828 2.40151 2.18847z"/><path fill="url(#paint3_linear)" d="M26.1212 12.372c-.654-3.21597-2.904-5.93247-5.736-7.49997h.0405v-.0015C10.3757-.808469-2.1373 7.11303.280695 16.455c.6495 2.772 2.566495 5.0955 4.892995 6.6465-.45 1.2795-.87749 2.559-1.28249 3.8475 1.4625-.768 2.925-1.5705 4.389-2.3505 1.755.5655 3.6225.8415 5.49.78-2.307-6.618 3.6105-13.629 12.351-13.0065zm-9.1155-3.84147c1.1775-.474 2.5695.5175 2.4765 1.78497l.003.018c.012 1.4475-1.9125 2.3505-2.9925 1.3695-1.1205-.807-.8025-2.76747.513-3.17247zM10.3982 10.701c-.258 1.257-1.93651 1.8645-2.919 1.02-1.13851-.8055-.81901-2.80197.51749-3.20847 1.30951-.507 2.79751.828 2.40151 2.18847z"/></g><defs><linearGradient id="paint0_linear" x1="24.9894" x2="24.9894" y1="13.043" y2="33" gradientUnits="userSpaceOnUse"><stop stop-color="#75FF98"/><stop offset="1" stop-color="#00A328"/></linearGradient><linearGradient id="paint1_linear" x1="24.9894" x2="24.9894" y1="13.043" y2="33" gradientUnits="userSpaceOnUse"><stop offset=".364583" stop-color="#fff"/><stop offset="1" stop-color="#959595"/></linearGradient><linearGradient id="paint2_linear" x1="13.0491" x2="13.0491" y1="2.96191" y2="26.949" gradientUnits="userSpaceOnUse"><stop stop-color="#75FF98"/><stop offset="1" stop-color="#00A328"/></linearGradient><linearGradient id="paint3_linear" x1="13.0491" x2="13.0491" y1="2.96191" y2="26.949" gradientUnits="userSpaceOnUse"><stop offset=".364583" stop-color="#fff"/><stop offset="1" stop-color="#959595"/></linearGradient><clipPath id="wechat"><path fill="#fff" d="M0 0h36v36H0z"/></clipPath></defs></svg>
                    </div>
                <?php else: ?>
                    <img loading="lazy" class="line" src="<?php echo THEME_URL; ?>/images/insta.svg" alt="Recruitfirst on Instagram" width="30" height="30">
                <?php endif; ?>
            </div>
            <h4 class="splitting-line text--bold pdb--10">
                <?php if ($countryCode == 'CN') {
                    esc_html_e('Join us on Wechat', 'rf');
                } else {
                    esc_html_e('Join us on Instagram', 'rf');
                }; ?>
            </h4>
            <h2 class="splitting-line"><?php echo $s5_heading; ?></h2>
            <div class="home-s5__content-desc splitting-line"><?php echo $s5_description; ?></div>
            <?php if (!empty($s5_qrcode) && $countryCode == 'CN' ) : ?>
                <div class="line-button">
                    <div class="wechat">
                        <a href="javascript:void(0)" class="btn"><?php esc_html_e('Follow us', 'rf'); ?></a>
                        <div class="wechat-qr wechat-qr--top wechat-qr--bordered wechat-qr--small text--center">
                            <img src="<?php echo wp_get_attachment_url($s5_qrcode); ?>" alt="Wechat QRCode" width="200">
                            <p class="mgt--10">
                                <?php echo $wechat_text;?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="line-button">
                    <a href="<?php echo $follow_url; ?>" target="_blank" class="btn"><?php esc_html_e('Follow us', 'rf'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="home-progress">
    <span class="home-progress__page home-progress--current">1</span>
    <div class="home-progress__bar">
        <span class="home-progress__value" style="height: 20%"></span>
    </div>
    <span class="home-progress__page home-progress--last">5</span>
</div>
<?php endif;

get_footer();
