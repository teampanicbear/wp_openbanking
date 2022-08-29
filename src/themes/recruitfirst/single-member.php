<?php
/**
 *
 * @package recruitfirst
 */

get_header('v2');

$about_url = get_page_url('templates/about');

$position = get_post_meta(get_the_ID(), 'rf_designation', true);
$industries = get_post_meta(get_the_ID(), 'rf_industries', true);
$country = get_post_meta(get_the_ID(), 'rf_country', true);
$phone = get_post_meta(get_the_ID(), 'rf_phone', true);
$wechat = get_post_meta(get_the_ID(), 'rf_wechat', true);
$wechat_id = get_post_meta(get_the_ID(), 'rf_wechat_id', true);
$wechat_qr = get_post_meta(get_the_ID(), 'rf_wechat_qr', true);
$linkedin = get_post_meta(get_the_ID(), 'rf_linkedin', true);
$email = get_post_meta(get_the_ID(), 'rf_email', true);
$whatsapp = get_post_meta(get_the_ID(), 'rf_whatsapp', true);
$line = get_post_meta(get_the_ID(), 'rf_line', true);
$telegram = get_post_meta(get_the_ID(), 'rf_telegram', true);
$bio = get_post_meta(get_the_ID(), 'rf_bio', true);

$args = array(
    'post_type' => 'member',
    'posts_per_page' => -1,
    'post__not_in' => array(get_the_ID())
);

$members = get_posts($args);

$locations = array(
    'Singapore' => __('Singapore', 'rf'),
    'Hong Kong' => __('Hong Kong', 'rf'),
    'Kuala Lumpur' => __('Kuala Lumpur', 'rf'),
    'Shanghai' => __('Shanghai', 'rf'),
    'Taipei' => __('Taipei', 'rf'),
    'Jakarta' => __('Jakarta', 'rf')
);

$wechatqr_img = wp_get_attachment_url($wechat_qr);
?>
    <div class="site-main team-detail">
        <section class="team-detail__head">
            <div class="container">
                <div class="team-detail__container eight-twelfths desk--one-whole tablet--one-whole mobile--one-whole">
                    <a href="<?php echo $about_url; ?>" class="page-back">
                        <span class="page-back__icon">
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity=".2" cx="17" cy="17" r="16" transform="rotate(90 17 17)" stroke="#fff"/><line x1="23" y1="17" x2="14" y2="17" stroke="#fff" stroke-width="2" stroke-linecap="round"/><path d="M17 12l-5 5 5 5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="page-back__label"><?php esc_html_e('Back to About us', 'rf'); ?></span>
                    </a>
                    <div class="team-detail__summary">
                        <div class="team-detail__image">
                            <?php the_post_thumbnail() ?>
                        </div>
                        <div class="team-detail__info">
                            <?php if ($position) : ?>
                                <span class="team-detail__position"><?php echo $position; ?></span>
                            <?php endif; ?>
                            <h1 class="h4 team-detail__title"><?php the_title(); ?></h1>
                            <div class="team-detail__information">
                                <ul>
                                    <?php if ($country) : ?>
                                        <li>
                                            <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0C4.1 0 1 3.1 1 7c0 1.9.7 3.7 2.1 5 .1.1 4.1 3.7 4.2 3.8.4.3 1 .3 1.3 0 .1-.1 4.2-3.7 4.2-3.8 1.4-1.3 2.1-3.1 2.1-5 .1-3.9-3-7-6.9-7zm0 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" fill="#fff"/></svg>
                                            <?php echo __($country, 'rf'); ?>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($phone) : ?>
                                        <li>
                                            <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.737 10.535a9.149 9.149 0 01-2.87-.457c-.447-.154-.955-.035-1.249.265l-1.816 1.371C6.717 10.602 5.384 9.27 4.286 7.2l1.335-1.773c.336-.336.456-.828.312-1.289a9.144 9.144 0 01-.46-2.875C5.474.567 4.908 0 4.212 0H1.263C.567 0 0 .567 0 1.263 0 9.39 6.611 16 14.737 16c.696 0 1.263-.567 1.263-1.263v-2.94c0-.696-.567-1.262-1.263-1.262z" fill="#fff"/></svg>
                                            <a target="_blank" href="tel:<?php echo $phone; ?>">
                                                <?php echo $phone; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($email) : ?>
                                        <li>
                                            <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.79 9.893a.164.164 0 00.1.034h4.223a.164.164 0 00.1-.034l5.12-3.838a.167.167 0 00-.005-.27l-6.758-4.7a1.004 1.004 0 00-1.142 0L.675 5.783a.167.167 0 00-.005.27l5.12 3.84z" fill="#fff"/><path d="M11.389 10.262a.166.166 0 00.007.272l2.217 1.477a.497.497 0 01.143.696.499.499 0 01-.698.136l-2.834-1.888a.167.167 0 00-.093-.028H5.867a.167.167 0 00-.093.028l-2.828 1.888a.5.5 0 01-.555-.832l2.216-1.478a.165.165 0 00.057-.21.167.167 0 00-.05-.061L.267 7A.167.167 0 000 7.133v6.627a1.333 1.333 0 001.333 1.333h13.334A1.334 1.334 0 0016 13.76V7.137a.166.166 0 00-.267-.133l-4.344 3.258z" fill="#fff"/></svg>
                                            <a target="_blank" href="mailto:<?php echo $email; ?>">
                                                <?php echo $email; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($bio) : ?>
                                        <li>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 13h-5c0 .6-.4 1-1 1H7c-.6 0-1-.4-1-1H1v2c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-2zM15 4h-3V1c0-.6-.4-1-1-1H5c-.6 0-1 .4-1 1v3H1c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h5v-1c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v1h5c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1zm-5 0H6V2h4v2z" fill="#fff"/></svg>
                                            <?php echo $bio; ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="team-detail__social">
                                <?php if ($whatsapp) : ?>
                                <a href="https://wa.me/<?php esc_html_e($whatsapp); ?>" target="_blank" class="team-detail__social-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M13.7551 2.24487C12.3075.797219 10.3828 0 8.33553 0c-2.04725 0-3.972.797219-5.41966 2.24487C1.46822 3.69253.671031 5.61722.671031 7.66447c0 1.29684.328281 2.57123.951409 3.70003L0 16l4.63541-1.6224c1.12887.6231 2.40325.9514 3.70009.9514 2.0472 0 3.972-.7973 5.4196-2.2449C15.2028 11.6365 16 9.71175 16 7.66447c0-2.04728-.7972-3.97197-2.2449-5.4196zm-1.6306 8.26683l-.8848.8849c-.733.733-2.81286-.1584-4.64539-1.99091-1.83256-1.83257-2.7239-3.91235-1.99087-4.64538l.88481-.88481c.18325-.18325.48038-.18325.66363 0l1.10603 1.10603c.18325.18325.18325.48038 0 .66363l-.66363.66362C7.238 7.66775 8.33225 8.76197 9.69122 9.40569l.66358-.66363c.1833-.18325.4804-.18325.6637 0l1.106 1.10603c.1833.18331.1833.48041 0 .66361z"/></svg>
                                </a>
                                <?php endif; ?>
                                <?php if ($wechat && $wechat_qr) : ?>
                                <div class="wechat">
                                    <a href="javascript:void(0)" class="team-detail__social-item">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M8.546 6.412c-4.828 2.488-1.616 9.163 4.407 7.42.561.219 1.061.572 1.605.835-.14-.474-.29-.942-.45-1.408 1.866-1.33 2.276-3.212 1.586-4.758-1.078-2.452-4.518-3.456-7.148-2.089zm1.687 2.439c-.14.436-.77.567-1.077.235-.337-.307-.206-.95.237-1.087.49-.206 1.055.361.84.852zm3.187.062h.009c-.171.392-.76.484-1.05.18-.14-.128-.18-.32-.23-.488.07-.307.28-.625.62-.64.47-.065.891.518.65.948z"/><path fill="currentColor" d="M11.61 5.499c-.29-1.43-1.29-2.637-2.55-3.334h.019C4.612-.36-.95 3.16.125 7.313c.289 1.232 1.14 2.265 2.175 2.954a53.6 53.6 0 00-.57 1.71c.65-.341 1.3-.698 1.95-1.044.78.251 1.61.374 2.44.346-1.025-2.941 1.605-6.057 5.49-5.78zM7.559 3.79c.523-.21 1.142.23 1.1.794l.002.008c.005.643-.85 1.044-1.33.608-.498-.358-.357-1.23.228-1.41zm-2.937.965c-.115.559-.86.829-1.297.453-.506-.358-.364-1.245.23-1.426.582-.225 1.243.368 1.067.973z"/></svg>
                                    </a>
                                    <div class="wechat-qr text--center">
                                        <h5 class="h6"><?php echo sprintf(__("Let's add %s on WeChat", 'rf'), '<span>'.get_the_title().'</span>');; ?></h5>
                                        <img src="<?php echo $wechatqr_img; ?>" alt="Wechat QRCode" width="200">
                                        <?php if ($wechat_id) : ?>
                                        <p>
                                            <?php if (wp_is_mobile()) {
                                                echo sprintf(__("Screenshot QR code. Scan QR or search for %1s on WeChat to contact", 'rf'), '<span>'.$wechat_id.'</span>');
                                            } else {
                                                echo sprintf(__("Scan QR or search for %1s on WeChat to contact", 'rf'), '<span>'.$wechat_id.'</span>');
                                            }?>
                                        </p>
                                        <?php endif; ?>
                                        <?php if (wp_is_mobile()) : ?>
                                            <a target="_blank" class="btn btn--small" href="weixin://dl/chat?<?php esc_html_e($wechat); ?>"><?php esc_html_e('Open Wechat'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($line) : ?>
                                <a href="https://line.me/ti/p/~<?php esc_html_e($line); ?>" target="_blank" class="team-detail__social-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M8 .333252c-4.41 0-8 2.931998-8 6.535338 0 3.22731 2.84667 5.93131 6.69 6.44531.26067.0554.61533.1734.70533.396.08.202.05267.514.02534.7247l-.10934.684c-.03.202-.16.7953.69934.4327.86066-.3614 4.61063-2.736 6.29063-4.6794C15.4507 9.60525 16 8.30725 16 6.86859 16 3.26525 12.41.333252 8 .333252zM4.86867 9.01125H3.278c-.23 0-.42-.19133-.42-.422V5.38859c0-.23134.19-.42267.42-.42267.232 0 .42.19133.42.42267v2.778h1.17067c.232 0 .41933.19.41933.42266 0 .23067-.188.422-.41933.422zm1.644-.422c0 .23067-.188.422-.42067.422-.23 0-.418-.19133-.418-.422V5.38859c0-.23134.188-.42267.42-.42267.23067 0 .41867.19133.41867.42267v3.20066zm3.82733 0c0 .18134-.116.342-.288.4-.0427.014-.08867.02067-.13267.02067-.14066 0-.26066-.06067-.34-.168L7.95067 6.61659v1.972c0 .23066-.186.422-.42067.422-.23067 0-.41733-.19134-.41733-.422v-3.2c0-.18134.11533-.342.28666-.39934.04-.01533.09067-.022.12934-.022.13 0 .25.07.33.17067L9.5 7.37192V5.38859c0-.23134.188-.42267.42-.42267.23 0 .42.19133.42.42267v3.20066zm2.57-2.02333c.2327 0 .42.19133.42.42333 0 .23134-.1873.42267-.42.42267h-1.17v.75467h1.17c.2327 0 .42.19.42.42266 0 .23067-.1873.422-.42.422h-1.5907c-.23 0-.418-.19133-.418-.422V5.38859c0-.23134.188-.42267.42-.42267h1.5907c.2307 0 .418.19133.418.42267 0 .234-.1873.42266-.42.42266h-1.17v.75467h1.17z"/></svg>
                                </a>
                                <?php endif; ?>

                                <?php if ($telegram) : ?>
                                <a href="https://telegram.me/<?php esc_html_e($telegram); ?>" target="_blank" class="team-detail__social-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M15.6361 1.94766a.325783.325783 0 00-.0785-.15174.32653.32653 0 00-.1445-.09126 1.14589 1.14589 0 00-.6033.04267S1.43046 6.66666.607465 7.11099c-.190667.103-.220667.182-.248.26067-.133334.38067.280666.54867.280666.54867L4.1028 9.04866l1.653 4.49364s.18133.4357.436.4357c.10866 0 .35466-.1143.70633-.4667.74633-.7463 1.46267-1.365 1.82033-1.6666 1.19067.8223 2.47204 1.7313 3.02504 2.207.0925.0897.2022.1598.3225.2063.1202.0464.2486.0682.3775.064.525-.0197.6713-.596.6713-.596s2.4483-9.85367 2.53-11.17367c.008-.12934.019-.21167.0203-.3.0044-.10241-.0054-.20493-.029-.30467zm-10.94564 6.83c1.73-1.09167 7.55364-4.75933 7.92464-4.89567.0667-.01933.113.00267.1.04734-.1646.57833-6.3413 6.07066-6.36397 6.08897-.01431.0134-.02566.0296-.0333.0476-.00763.0181-.01139.0375-.01103.0571l-.24034 2.4683-1.376-3.81364z"/></svg>
                                </a>
                                <?php endif; ?>
                                <?php if ($linkedin) : ?>
                                <a href="<?php echo $linkedin; ?>" target="_blank" class="team-detail__social-item">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.667 0H3.333A3.334 3.334 0 000 3.333v9.334A3.334 3.334 0 003.333 16h9.334A3.333 3.333 0 0016 12.667V3.333A3.333 3.333 0 0012.667 0zM5.333 12.667h-2V5.333h2v7.334zm-1-8.179a1.172 1.172 0 01-1.166-1.176c0-.65.522-1.176 1.166-1.176.644 0 1.167.527 1.167 1.176 0 .65-.522 1.176-1.167 1.176zm9 8.179h-2V8.93c0-2.246-2.666-2.076-2.666 0v3.736h-2V5.333h2V6.51c.93-1.724 4.666-1.851 4.666 1.65v4.507z" fill="currentColor"/></svg>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="team-detail__description rte">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-detail__our">
            <div class="container">
                <div class="team-detail__container ten-twelfths desk--one-whole tablet--one-whole mobile--one-whole">
                    <div class="team-detail__heading">
                        <h3 class="heading"><?php esc_html_e('Our Leaders', 'rf'); ?></h3>
                        <?php if (wp_is_mobile()) : ?>
                            <select class="data-tab-nav-select form__control  form__control--no-label form__control--select" data-tab-nav-select>
                                <?php foreach ($locations as $key => $location) :
                                    $location_id = sanitize_title_with_dashes($key);
                                ?>
                                    <option value="#<?php echo $location_id; ?>" <?php if ($location_id == 'singapore') echo 'selected'; ?> data-tab-nav><?php echo $location; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                        <div class="team-detail__tab">
                            <?php foreach ($locations as $key => $location) :
                                $location_id = sanitize_title_with_dashes($key);
                            ?>
                                <a href="#<?php echo $location_id; ?>" <?php if ($location_id == 'singapore') echo 'class="active"'; ?> data-tab-nav><?php echo $location; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="about-team__list team-detail__members">
                        <div class="about-team__list">
                            <?php foreach ($locations as $key => $location) :
                                $location_id = sanitize_title_with_dashes($key);
                            ?>
                                <div id="<?php echo $location_id; ?>" class="about-members<?php if ($location_id == 'singapore') echo ' active'; ?>" data-tab-content>
                                    <div class="about-members__list">
                                        <div class="about-members__list-inner">
                                            <?php foreach ($members as $member) {
                                                $country = get_post_meta($member->ID, 'rf_country', true);
                                                if (sanitize_title_with_dashes($country) != $location_id) continue;

                                                set_query_var( 'member', $member );
                                                get_template_part( 'template-parts/member-card' );
                                            };?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer('v2');
