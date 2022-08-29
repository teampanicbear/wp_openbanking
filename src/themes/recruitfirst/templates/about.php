<?php
/**
 * Template Name: About
 *
 * @package recruitfirst
 */

get_header();

$current_lang = 'en';
if (function_exists('pll_current_language')) {
    $current_lang = pll_current_language();
}

$args = array(
    'post_type' => 'member',
    'posts_per_page' => -1
);

$members = get_posts($args);



// Get page content
$prefix = 'rf_';
$s1_heading = get_post_meta(get_the_ID(), $prefix . 's1_heading', true);
$s1_description = get_post_meta(get_the_ID(), $prefix . 's1_description', true);
$s1_video = get_post_meta(get_the_ID(), $prefix . 's1_video', true);
$video_id = get_youtube_video_id($s1_video);

$s1_video_mp4 = get_post_meta( get_the_ID(), $prefix . 's1_video_mp4', true );

$s2_content = get_post_meta(get_the_ID(), $prefix . 's2_content', true);

$s3_content = get_post_meta(get_the_ID(), $prefix . 's3_content', true);

$s4_heading = get_post_meta(get_the_ID(), $prefix . 's4_heading', true);
$s4_description = get_post_meta(get_the_ID(), $prefix . 's4_description', true);

$bg_colors = array('#9048EB', '#F66F51', '#F9A133');

// Locations
$locations = array(
    'Singapore' => __('Singapore', 'rf'),
    'Hong Kong' => __('Hong Kong', 'rf'),
    'Kuala Lumpur' => __('Kuala Lumpur', 'rf'),
    'Shanghai' => __('Shanghai', 'rf'),
    'Taipei' => __('Taipei', 'rf'),
    'Jakarta' => __('Jakarta', 'rf')
);
$country_code = RF_Language::get_country_code();
$current_city = get_city_name($country_code);

if ($current_city) {
    $locations = array($current_city => __($current_city, 'rf')) + $locations;
    $locations = array_unique($locations);
}

?>

<div class="site-main">
    <div class="about-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="about-header__img">
            <picture style="width: 100%;">
                <source media="(max-width: 767px)" srcset="<?php echo THEME_URL; ?>/images/about/about-header-mb.png">
                <img loading="lazy" src="<?php echo THEME_URL; ?>/images/about/about-header.png" alt="<?php the_title(); ?>">
            </picture>
        </div>
        <div class="about-header__bg"></div>
    </div>
    <div class="about-video">
        <div class="container">
            <h2 class="h3 text--center text--dark"><?php echo $s1_heading; ?></h2>
            <p class="text--center text--dark text--medium text--large"><?php echo $s1_description; ?></p>
            <?php if ($video_id && $current_lang != 'zh') : ?>
            <div class="about-video__player">
                <div class="plyr__video-embed" id="about-player">
                    <iframe
                        src="https://www.youtube.com/embed/<?php echo $video_id; ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($s1_video_mp4 && $current_lang == 'zh') : ?>
            <div class="about-video__player">
                <video id="about-player" playsinline controls>
                    <source src="<?php echo wp_get_attachment_url($s1_video_mp4); ?>" type="video/mp4" />
                </video>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="about-features">
        <div class="container">
            <div class="about-features__inner">
                <?php if (!wp_is_mobile()) : ?>
                <div class="about-features__content">
                    <?php foreach ($s2_content as $key => $item) : ?>
                        <div class="about-features__content-text" data-marker-content=".about-features__img--<?php echo $key + 1; ?>">
                            <h4><?php echo $item['rf_subtitle']; ?></h4>
                            <h3><?php echo $item['rf_title']; ?></h3>
                            <div class="about-features__desc">
                                <?php echo $item['rf_description']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="about-features__images">
                    <?php foreach ($s2_content as $key => $item) :
                        $image = wp_get_attachment_url($item['rf_image']);
                    ?>
                        <img loading="lazy" class="about-features__img about-features__img--<?php echo $key + 1; ?>" data-bg="<?php echo $bg_colors[$key]; ?>" src="<?php echo $image; ?>" />
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                    <div class="swiper-container about-features__slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($s2_content as $key => $item) :
                                $image = wp_get_attachment_url($item['rf_image']);
                                ?>
                                <div class="swiper-slide">
                                    <div class="about-features__content-text">
                                        <div class="about-features__images">
                                            <img loading="lazy"  class="about-features__img about-features__img--<?php echo $key + 1; ?>" data-bg="<?php echo $bg_colors[$key]; ?>" src="<?php echo $image; ?>" />
                                        </div>
                                        <h4><?php echo $item['rf_subtitle']; ?></h4>
                                        <h3><?php echo $item['rf_title']; ?></h3>
                                        <div class="about-features__desc">
                                            <?php echo $item['rf_description']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                <?php endif; ?>
<!--                <div class="about-features__number">-->
<!--                    <span>0</span>-->
<!--                    <span class="number one">1</span>-->
<!--                    <span class="number two">2</span>-->
<!--                    <span class="number three">3</span>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="about-stats">
        <div class="about-stats__inner">
            <?php foreach ($s3_content as $item) :
                $image = wp_get_attachment_image_src($item['rf_image'], 'full');
            ?>
                <div class="about-stats__item">
                <span class="about-stats__item-icon">
                    <img loading="lazy"  src="<?php echo $image[0]; ?>" alt="<?php echo $item['rf_title']; ?>" width="<?php echo $image[1] / 2; ?>">
                </span>
                    <h3><?php echo $item['rf_number']; ?> <span><?php echo $item['rf_title']; ?></span></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="about-team">
        <div class="container">
            <div class="grid justify--center">
                <div class="grid__column ten-twelfths desk--one-whole tablet--one-whole mobile--one-whole">
                    <div class="about-section__header">
                        <h2><?php echo $s4_heading; ?></h2>
                        <p><?php echo $s4_description; ?></p>
                    </div>
                    <div class="about-team__inner">
                        <?php if (wp_is_mobile()) : ?>
                        <div class="about-team__locations">
                            <select class="data-tab-nav-select form__control  form__control--no-label form__control--select" data-tab-nav-select>
                                <?php foreach ($locations as $key => $location) :
                                    $location_id = sanitize_title_with_dashes($key);
                                ?>
                                    <option value="#<?php echo strtolower($location_id); ?>"<?php if ($location_id == sanitize_title_with_dashes($current_city)) echo ' selected'; ?>><?php echo $location; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php else : ?>
                            <div class="about-team__locations">
                                <?php foreach ($locations as $key => $location) :
                                    $location_id = sanitize_title_with_dashes($key);
                                ?>
                                    <a href="#<?php echo $location_id; ?>" <?php if ($location_id == sanitize_title_with_dashes($current_city)) echo 'class="active"'; ?> data-tab-nav><?php echo $location; ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="about-team__list">
                            <?php foreach ($locations as $key => $location) :
                                $location_id = sanitize_title_with_dashes($key);
                            ?>
                                <div id="<?php echo strtolower($location_id) ?>" class="about-members<?php if ($location_id == sanitize_title_with_dashes($current_city)) echo ' active'; ?>" data-tab-content>
                                    <div class="about-members__list">
                                        <div class="about-members__list-inner">
                                            <?php foreach ($members as $member) {
                                                $country = get_post_meta($member->ID, 'rf_country', true);

//                                                var_dump($country);
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
        </div>
        <?php if (!wp_is_mobile()) : ?>
        <div class="about-team__rocket mobile--hidden tablet--hidden desk--hidden">
            <img src="<?php echo THEME_URL; ?>/images/about/rocket.png" loading="lazy" alt="Rocket">
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer('v2');
