<?php
$jobs_list_url = get_page_url('templates/candidate');
$employer_url = get_page_url('templates/employer');

$wechat_text_mb = get_post_meta(get_the_ID(), 'wechat_text_mb', true);
?>

<div class="home-sections">
    <div class="home-section home-s1">
        <div class="home-s1__content">
            <h1 class="h3 home-s1__title"><?php echo $args['s1_heading']; ?></h1>
        </div>
        <div class="home-s1__actions">
            <a href="<?php echo $jobs_list_url; ?>">
                <span class="home-s1__actions-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 22 22"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.74779 18.0956c4.61041 0 8.34781-3.7374 8.34781-8.34781 0-4.61038-3.7374-8.34783-8.34781-8.34783-4.61038 0-8.34783 3.73745-8.34783 8.34783 0 4.61041 3.73745 8.34781 8.34783 8.34781zM20.5999 20.5999l-4.9494-4.9494"/></svg>
                </span>
                <span><?php echo $args['s1_btn_1']; ?></span>
            </a>
            <a href="<?php echo $employer_url; ?>">
                <span class="home-s1__actions-icon">
                   <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor"><path d="M13.5 14.934v3.484c0 .173.044.546.049.607l.453 5.407a.497.497 0 00.498.456h4a.502.502 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.5.5 0 00.5-.498v-3.484a5.447 5.447 0 00-.933-3.056 5.486 5.486 0 00-2.49-2.016 5.515 5.515 0 00-6.008 1.256.246.246 0 00-.036.299 6.885 6.885 0 01.967 3.517v0zM16.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 0016.5 1C14.567 1 13 2.56 13 4.484a3.492 3.492 0 003.5 3.483zM1 18.418a.496.496 0 00.5.498h1.81a.25.25 0 01.249.228L4 24.432a.497.497 0 00.5.456h4a.501.501 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.501.501 0 00.5-.498v-3.484c0-1.451-.58-2.844-1.61-3.87A5.513 5.513 0 006.5 9.46a5.513 5.513 0 00-3.89 1.604A5.461 5.461 0 001 14.934v3.484zM6.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 006.5 1C4.567 1 3 2.56 3 4.484a3.492 3.492 0 003.5 3.483z"/><path d="M13.5 14.934v3.484c0 .173.044.546.049.607l.453 5.407a.497.497 0 00.498.456h4a.502.502 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.5.5 0 00.5-.498v-3.484a5.447 5.447 0 00-.933-3.056 5.486 5.486 0 00-2.49-2.016 5.515 5.515 0 00-6.008 1.256.246.246 0 00-.036.299 6.885 6.885 0 01.967 3.517v0zM16.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 0016.5 1C14.567 1 13 2.56 13 4.484a3.492 3.492 0 003.5 3.483zM1 18.418a.496.496 0 00.5.498h1.81a.25.25 0 01.249.228L4 24.432a.497.497 0 00.5.456h4a.501.501 0 00.5-.456l.443-5.288a.249.249 0 01.247-.228h1.81a.501.501 0 00.5-.498v-3.484c0-1.451-.58-2.844-1.61-3.87A5.513 5.513 0 006.5 9.46a5.513 5.513 0 00-3.89 1.604A5.461 5.461 0 001 14.934v3.484zM6.5 7.967c1.933 0 3.5-1.56 3.5-3.483A3.492 3.492 0 006.5 1C4.567 1 3 2.56 3 4.484a3.492 3.492 0 003.5 3.483z"/></g></svg>
                </span>
                <span><?php echo $args['s1_btn_2']; ?></span>
            </a>
        </div>
        <div class="home-s1__video video-container">
            <img src="<?php echo THEME_URL;?>/images/video-1-cover.png" alt="">
<!--            <img loading=lazy src="--><?php //echo THEME_URL;?><!--/images/videos/01-loop.gif" alt="">-->
        </div>
        <a class="home-s1__scroll anchor" href="#section-2" data-offset="60">
            <span><?php esc_html_e('Scroll down', 'rf'); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="38" fill="none" viewBox="0 0 32 38"><path stroke="#fff" stroke-linecap="round" stroke-width="3" d="M16 1.5v32.2"/><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M2 22l14 14 14-14"/></svg>
        </a>
    </div>
    <div class="home-section home-s2" id="section-2">
        <div class="home-s2__title">
            <h2><?php echo $args['s2_heading']; ?></h2>
            <p class="home-s2__content-desc"><?php echo $args['s2_description']; ?></p>
        </div>
        <div class="home-s2__video video-container">
            <img loading="lazy" src="<?php echo THEME_URL;?>/images/video-2-cover.png">
        </div>
        <div class="home-s2__steps">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <span class="home-s2__steps-icon<?php if ($i == 0) echo ' active'; ?>" data-index="<?php echo $i; ?>">
                    <img loading="lazy" src="<?php echo THEME_URL; ?>/images/icon-<?php echo $i + 1; ?>.png" alt="">
                </span>
            <?php endfor; ?>
        </div>
        <div class="home-s2__content-wrapper swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($args['s2_content'] as $key => $content) : ?>
                    <div class="home-s2__content swiper-slide">
                        <h3 class="h4 home-s2__content-title"><?php echo $content['rf_title']; ?></h3>
                        <p class="home-s2__content-desc"><?php echo $content['rf_description']; ?></p>
                    </div>
                <?php endforeach; ?>
                <div class="home-s2__content swiper-slide"></div>
            </div>
        </div>
    </div>
    <div class="home-section home-s3">
        <div class="home-section__header">
            <div class="text--bold">
                <div class="line home-s3__subtitle"><?php echo $args['s3_description']; ?></div>
            </div>
            <h2 class="home-section__title"><?php echo $args['s3_heading']; ?></h2>
            <?php if (count($args['jobs_list']) > 0) : ?>
                <div class="line-wrapper">
                    <div class="line">
                        <a href="<?php echo $jobs_list_url; ?>" class="btn"><?php echo $args['s3_button']; ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (count($args['jobs_list']) > 0) : ?>
        <div class="swiper-container job-list__container mgt--40">
            <div class="job-list swiper-wrapper">
                <?php
                foreach ($args['jobs_list'] as $job) :
                    set_query_var( 'job', $job );
                    ?>
                    <div class="swiper-slide">
                        <?php get_template_part( 'template-parts/job', 'card' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <?php else : ?>
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
                        <a href="<?php echo $jobs_list_url; ?>" class="btn"><?php echo $args['s3_button_empty'] ? $args['s3_button_empty'] : __('View other jobs', 'rf'); ?></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="home-s3__plane">
            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/plane-mb.png" alt="Plane" width="300">
        </div>
    </div>
    <div class="home-section home-s4">
        <div class="home-s4__rocket">
            <img loading="lazy" src="<?php echo THEME_URL; ?>/images/rocket-mb.png" alt="Rocket">
        </div>
        <div class="home-s4__content">
            <h2><?php echo $args['s4_heading']; ?></h2>
            <p><?php echo $args['s4_description']; ?></p>
            <div class="home-s4__reviews">
                <div class="home-s4__reviews-title">
                    <?php if ($args['s4_score']) : ?>
                    <h4><?php esc_html_e('NPS score', 'rf'); ?>: <span><?php echo $args['s4_score']; ?></span></h4>
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
                <?php if ($args['review']) : ?>
                    <div class="home-s4__reviews-item">
                        <?php echo do_shortcode( $args['review'] ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="home-s4__testimonial">
            <svg class="home-s4__small-bubbles" xmlns="http://www.w3.org/2000/svg" width="375" height="408" fill="none" viewBox="0 0 375 408"><circle cx="352.557" cy="231.943" r="5.90662" fill="#BD60D4"/><circle cx="199.828" cy="325.605" r="5.90662" fill="#6066FB"/><circle cx="377.87" cy="169.502" r="5.90662" fill="#6066FB"/><circle cx="330.907" cy="106.907" r="5.90662" fill="#FFBD6B"/><circle cx="369.011" cy="306.62" r="2.95331" fill="#5393FF"/><circle cx="347.953" cy="8.95331" r="2.95331" fill="#5393FF"/><circle cx="62.7101" cy="292.275" r="2.95331" fill="#FFBD6B"/><circle cx="100.682" cy="347.122" r="2.95331" fill="#D46072"/><circle cx="10.3947" cy="270.336" r="2.95331" fill="#D46072"/><circle cx="261.848" cy="341.216" r="2.95331" fill="#D46072"/><circle cx="294.756" cy="286.368" r="2.95331" fill="#D46072"/><circle cx="330.953" cy="65.9533" r="2.95331" fill="#D46072"/><circle cx="250.953" cy="53.9533" r="2.95331" fill="#D46072"/><circle cx="121.953" cy="65.9533" r="2.95331" fill="#D46072"/><circle cx="47.9533" cy="29.9533" r="2.95331" fill="#BD60D4"/></svg>
            <div class="home-s4__testimonial-slider swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($args['s4_reviews'] as $key => $review) : ?>
                        <div class="home-s4__testimonial-item swiper-slide">
                            <h5 class="home-s4__testimonial-name"><?php echo $review['rf_name']; ?></h5>
                            <div class="home-s4__testimonial-content"><?php echo $review['rf_content']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="home-section home-s5">
        <div class="home-s5__content">
            <?php if ($args['countryCode'] == 'CN') : ?>
                <div class="line">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 36 36"><g clip-path="url(#wechat)"><path fill="url(#paint0_linear)" d="M19.2297 14.427c-10.86298 5.598-3.6375 20.6175 9.915 16.6965 1.263.4905 2.388 1.2855 3.612 1.8765-.3165-1.065-.654-2.118-1.014-3.1665 4.2-2.9925 5.121-7.227 3.5685-10.707-2.424-5.5155-10.164-7.7745-16.0815-4.6995zm3.795 5.487c-.3135.9825-1.734 1.2765-2.4225.5295-.759-.6915-.4635-2.136.5325-2.445 1.101-.465 2.373.8115 1.89 1.9155zm7.17.141h.021c-.3855.8805-1.7115 1.0875-2.3625.405-.3135-.288-.405-.7215-.516-1.0995.156-.69.63-1.4055 1.395-1.4385 1.0575-.147 2.004 1.164 1.4625 2.133z"/><path fill="url(#paint1_linear)" d="M19.2297 14.427c-10.86298 5.598-3.6375 20.6175 9.915 16.6965 1.263.4905 2.388 1.2855 3.612 1.8765-.3165-1.065-.654-2.118-1.014-3.1665 4.2-2.9925 5.121-7.227 3.5685-10.707-2.424-5.5155-10.164-7.7745-16.0815-4.6995zm3.795 5.487c-.3135.9825-1.734 1.2765-2.4225.5295-.759-.6915-.4635-2.136.5325-2.445 1.101-.465 2.373.8115 1.89 1.9155zm7.17.141h.021c-.3855.8805-1.7115 1.0875-2.3625.405-.3135-.288-.405-.7215-.516-1.0995.156-.69.63-1.4055 1.395-1.4385 1.0575-.147 2.004 1.164 1.4625 2.133z"/><path fill="url(#paint2_linear)" d="M26.1212 12.372c-.654-3.21597-2.904-5.93247-5.736-7.49997h.0405v-.0015C10.3757-.808469-2.1373 7.11303.280695 16.455c.6495 2.772 2.566495 5.0955 4.892995 6.6465-.45 1.2795-.87749 2.559-1.28249 3.8475 1.4625-.768 2.925-1.5705 4.389-2.3505 1.755.5655 3.6225.8415 5.49.78-2.307-6.618 3.6105-13.629 12.351-13.0065zm-9.1155-3.84147c1.1775-.474 2.5695.5175 2.4765 1.78497l.003.018c.012 1.4475-1.9125 2.3505-2.9925 1.3695-1.1205-.807-.8025-2.76747.513-3.17247zM10.3982 10.701c-.258 1.257-1.93651 1.8645-2.919 1.02-1.13851-.8055-.81901-2.80197.51749-3.20847 1.30951-.507 2.79751.828 2.40151 2.18847z"/><path fill="url(#paint3_linear)" d="M26.1212 12.372c-.654-3.21597-2.904-5.93247-5.736-7.49997h.0405v-.0015C10.3757-.808469-2.1373 7.11303.280695 16.455c.6495 2.772 2.566495 5.0955 4.892995 6.6465-.45 1.2795-.87749 2.559-1.28249 3.8475 1.4625-.768 2.925-1.5705 4.389-2.3505 1.755.5655 3.6225.8415 5.49.78-2.307-6.618 3.6105-13.629 12.351-13.0065zm-9.1155-3.84147c1.1775-.474 2.5695.5175 2.4765 1.78497l.003.018c.012 1.4475-1.9125 2.3505-2.9925 1.3695-1.1205-.807-.8025-2.76747.513-3.17247zM10.3982 10.701c-.258 1.257-1.93651 1.8645-2.919 1.02-1.13851-.8055-.81901-2.80197.51749-3.20847 1.30951-.507 2.79751.828 2.40151 2.18847z"/></g><defs><linearGradient id="paint0_linear" x1="24.9894" x2="24.9894" y1="13.043" y2="33" gradientUnits="userSpaceOnUse"><stop stop-color="#75FF98"/><stop offset="1" stop-color="#00A328"/></linearGradient><linearGradient id="paint1_linear" x1="24.9894" x2="24.9894" y1="13.043" y2="33" gradientUnits="userSpaceOnUse"><stop offset=".364583" stop-color="#fff"/><stop offset="1" stop-color="#959595"/></linearGradient><linearGradient id="paint2_linear" x1="13.0491" x2="13.0491" y1="2.96191" y2="26.949" gradientUnits="userSpaceOnUse"><stop stop-color="#75FF98"/><stop offset="1" stop-color="#00A328"/></linearGradient><linearGradient id="paint3_linear" x1="13.0491" x2="13.0491" y1="2.96191" y2="26.949" gradientUnits="userSpaceOnUse"><stop offset=".364583" stop-color="#fff"/><stop offset="1" stop-color="#959595"/></linearGradient><clipPath id="wechat"><path fill="#fff" d="M0 0h36v36H0z"/></clipPath></defs></svg>
                </div>
            <?php else: ?>
                <img loading="lazy" class="line" src="<?php echo THEME_URL; ?>/images/insta.svg" alt="Recruitfirst on Instagram" width="30" height="30">
            <?php endif; ?>
            <h4 class="text--bold">
                <?php if ($args['countryCode'] == 'CN') {
                    esc_html_e('Join us on Wechat', 'rf');
                } else {
                    esc_html_e('Join us on Instagram', 'rf');
                }; ?>
            </h4>
            <h2 class="h1"><?php echo $args['s5_heading']; ?></h2>
            <div class="home-s5__content-desc"><?php echo $args['s5_description']; ?></div>
            <?php if (!empty($args['s5_qrcode']) && $args['countryCode'] == 'CN') : ?>
                <div class="line-button">
                    <div class="wechat">
                        <a href="javascript:void(0)" class="btn"><?php esc_html_e('Follow us', 'rf'); ?></a>
                        <div class="wechat-qr wechat-qr--top wechat-qr--bordered wechat-qr--small text--center">
                            <img loading="lazy" src="<?php echo wp_get_attachment_url($args['s5_qrcode']); ?>" alt="Wechat QRCode" width="200">
                            <p class="mgt--10">
                                <?php
                                   echo $wechat_text_mb;
                                ?>
                            </p>
                            <a target="_blank" class="btn btn--small" href="<?php echo $args['follow_url']; ?>"><?php esc_html_e('Open Wechat'); ?></a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="line-button">
                    <a href="<?php echo $args['follow_url']; ?>" target="_blank" class="btn"><?php esc_html_e('Follow us', 'rf'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
