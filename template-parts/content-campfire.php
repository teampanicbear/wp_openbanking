<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OBE
 */
// date_default_timezone_set('Europe/London');
date_default_timezone_set('UTC');
$start_date = $post->start_date;
$end_date = $post->end_date;
$unixtimestamp = strtotime($start_date);
$unixtimeend = strtotime($end_date);
$value_tag = $post->tag;
// $hosts = $post->hosts;
// $panellists = $post->panellists;
$slot = $post->slot;
$category = '';
if ($value_tag == 'event') {
    $category = 'Before Covid';
} else if ($value_tag == 'appathon') {
    $category = 'Appathon';
} else {
    $category = 'Live Stream';
}



$today = date('Y-m-d H:i:s');
$time_now = strtotime($today);
$eventDate = strtotime(get_field('start_date'));
$endDate = strtotime(get_field('end_date'));

// Check if event is happening now
// $liveChatStart = strtotime(get_field('start_date')) - 60 * 60;
// $liveChatEnd = strtotime(get_field('end_date')) + 60 * 60;

// Check if event is today
$campfireDate = get_field('start_date');
$campfireDate = DateTime::createFromFormat('g:ia F j, Y', $campfireDate);
$todayDate = DateTime::createFromFormat('Y-m-d H:i:s', $today);
$campfireDate = $campfireDate->format('Y-m-d');
$todayDate = $todayDate->format('Y-m-d');
$itsToday = false;
if ($campfireDate == $todayDate) {
    $itsToday = true;
}

$liveEvent = true;
// if (($liveChatStart <= $time_now) && ($liveChatEnd >= $time_now)) {
//     $liveEvent = true;
// }

$user_attended = get_field('users');
$current_user_id  = get_current_user_id();
$isAttend = in_array($current_user_id, $user_attended);
?>

<div class="banner-show-info-campfire sticky campfire-detail-fixed">
    <div class='banner-show-info__left'>
        <div class="info-left text-16-normal">
            <h4 class='title'><?= the_title() ?></h4>
        </div>
    </div>
    <div class='banner-show-info__right'>
        <div class="info-left text-16-normal item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="" />
            <?php echo date_i18n("g:iA", $unixtimestamp); ?>
            -
            <?php echo date_i18n("g:iA", $unixtimeend); ?>
        </div>
        <div class="info-right text-16-normal item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="" />
            <?php echo date_i18n("d", $unixtimestamp); ?>
            <?php echo date_i18n("M", $unixtimestamp); ?>
            ,
            <?php echo date_i18n("Y", $unixtimestamp); ?>
        </div>
        <?php
        $date = date("Y-m-d H:i:s");
        $datetimestamp = strtotime($date);
        if ($datetimestamp <= $unixtimestamp) { 
            $id = get_the_ID();
            $class = 'btn btn-primary btn-attend';
            echo do_shortcode("[get_btn_user_attend_campfire id='$id' class='$class']");
        }
        ?>
    </div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper-campfire-detail">
        <div class="wrapper-blog-detail-banner">
            <div class="wrapper">
                <div class="wrapper-detail-banner-content">
                    <div class="wrapper-banner-logo">
                        <img class="banner-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_banner.png" alt="" />
                    </div>
                    <div class="banner-show">
                        <span>
                            <a href="<?= site_url() ?>" class="sign-link">
                                Home
                            </a>
                            /
                            <a href="<?= site_url('campfires') ?>" class="sign-link">
                                Campfires
                            </a>
                            /
                            <a href="javascript:void(0)" class="sign-link">
                                <?php echo $category; ?>
                            </a>
                        </span>
                        <h4>
                            <?= the_title() ?>
                        </h4>
                        <hr />
                        <div class="banner-show-info-campfire">
                            <div class='banner-show-info__left'>
                                <div class="info-left text-16-normal item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch-white.svg" alt="" />
                                    <?php echo date_i18n("g:iA", $unixtimestamp); ?>
                                    -
                                    <?php echo date_i18n("g:iA", $unixtimeend); ?>
                                </div>
                                <div class="info-right text-16-normal item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar-white.svg" alt="" />
                                    <?php echo date_i18n("d", $unixtimestamp); ?>
                                    <?php echo date_i18n("M", $unixtimestamp); ?>
                                    ,
                                    <?php echo date_i18n("Y", $unixtimestamp); ?>
                                </div>
                            </div>
                            <div>
                                <?php
                                $date = date("Y-m-d H:i:s");
                                $datetimestamp = strtotime($date);
                                if ($datetimestamp <= $unixtimestamp) { 
                                    $id = get_the_ID();
                                    $class = 'btn btn-primary btn-attend';
                                    echo do_shortcode("[get_btn_user_attend_campfire id='$id' class='$class']");
                                }
                                ?>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper-blog-detail-content">
            <div class="wrapper">
                <div class="wrapper-blog-detail">
                    <div class="wrapper-banner-logo">
                        <?php
                        if (get_field('live_url') && $liveEvent && $isAttend) :
                            $image = get_field('banner');
                            $liveVideoURL = get_field('live_url');
                            $dayImage = get_field('on_the_day_image');
                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                            if ($itsToday && $dayImage) {
                                $holding = wp_get_attachment_image_url($dayImage, $size);
                            } elseif ($image) {
                                $holding = wp_get_attachment_image_url($image, $size);
                            }
                        ?>
                            <div class="live">
                                <div class="video">
                                    <?php if (strpos($liveVideoURL, 'vimeo') !== false) { ?>
                                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="<?php echo $liveVideoURL; ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                                    <?php } else { ?>
                                        <video-js id="my_video_1" class="vjs-theme-fantasy vjs-matrix vjs-16-9" controls preload="auto" width="100%" height="350" poster="<?php echo $holding; ?>">
                                            <source src="<?php the_field('live_url'); ?>" type="application/x-mpegURL">
                                        </video-js>
                                    <?php }; ?>
                                </div>
                                <div class="chat">
                                    <?php if (get_field('chat_embed')) {
                                        the_field('chat_embed');
                                    } else { ?>
                                        <iframe src="https://app.sli.do/event/dk4mvgcl" height="100%" width="100%"></iframe>
                                    <?php }; ?>
                                </div>
                            </div>
                        <?php
                        else :
                            if (get_field('embed_url')) {
                                the_field('embed_url');
                            } else {
                                $image = get_field('banner');
                                $dayImage = get_field('on_the_day_image');
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if ($itsToday && $dayImage) {
                                    echo wp_get_attachment_image($dayImage, $size);
                                } elseif ($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }
                            }
                        endif;
                        ?>
                    </div>

                    <?php if (have_rows('additional_sponsors')) : ?>
                        <div class="wrapper-campfire-detail-sponsor">
                            <div class="">
                                <div class="wrapper-item">
                                    <?php while (have_rows('additional_sponsors')) : the_row(); ?>
                                        <?php
                                        $image = get_sub_field('sponsor');
                                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                        if ($image) {
                                            if (get_sub_field('link')) { ?>
                                                <div class="wrapper-sponsor-logo">
                                                    <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                                        <?php echo wp_get_attachment_image($image, $size); ?>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="wrapper-sponsor-logo">
                                                    <?php echo wp_get_attachment_image($image, $size); ?>
                                                </div>
                                        <?php };
                                        }; ?>

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="text-16-normal blog-detail-content">
                        <?php
                        if (get_field('below_video_sponsor')) { ?>
                            <div class="wrapper-banner-logo">
                                <?php
                                $image = get_field('below_video_sponsor');
                                $size = 'full';
                                if (get_field('bv_sponsor_link')) { ?>
                                    <a href="<?php the_field('bv_sponsor_link'); ?>" target="_blank">
                                        <?php echo wp_get_attachment_image($image, $size); ?>
                                    </a>
                                <?php } else {
                                    echo wp_get_attachment_image($image, $size);
                                }; ?>
                            </div>
                        <?php
                        };
                        ?>
                        <?php if (have_rows('slot')) : ?>
                            <div class="wrapper-timeline">
                                <h4 class='title'>Agenda</h4>
                                <ul>
                                    <?php while (have_rows('slot')) : the_row();
                                        $time = get_sub_field('time');
                                        $title = get_sub_field('title');
                                    ?>
                                        <li>
                                            <p class='line'><span class='time'><?php echo $time; ?></span><span class='des'><?php echo $title; ?></span></p>
                                        <li>
                                        <?php endwhile; ?>
                                        <p>* All times are in BST / UTC+1. This is a provisional programme and subject to change.</p>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('additional_sponsors_bottom')) : ?>
                            <div class="wrapper-campfire-detail-sponsor bottom">
                                <div class="">
                                    <div class="wrapper-item bottom">
                                        <!-- additional_sponsors_bottom -->
                                        <?php while (have_rows('additional_sponsors_bottom')) : the_row(); ?>
                                            <?php
                                            $image = get_sub_field('sponsor');
                                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                            if ($image) {
                                                if (get_sub_field('link')) { ?>
                                                    <div class="wrapper-sponsor-logo">
                                                        <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                                            <?php echo wp_get_attachment_image($image, $size); ?>
                                                        </a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="wrapper-sponsor-logo">
                                                        <?php echo wp_get_attachment_image($image, $size); ?>
                                                    </div>
                                            <?php };
                                            }; ?>

                                        <?php endwhile; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper-other-speaker campfire-detail">
            <?php
            $hosts = get_field('hosts');
            if ($hosts) { ?>
                <div class="wrapper">
                    <h2 class="title">Host</h2>
                    <div class="wrapper-speaker-content minus-m16-lr">
                        <?php foreach ($hosts as $post) :
                            setup_postdata($post); ?>
                            <div class="wrapper-item m16-lr">
                                <div class="wrapper-speaker-item">
                                    <a href="<?php the_permalink(); ?>" class="ava-speaker">
                                        <img class="ava-speaker" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                    </a>
                                    <div class="position-item-content">
                                        <div class="wrapper-item-content">
                                            <a href="<?php the_permalink(); ?>" class="text-20-bold header-item"><?= the_title() ?></a>
                                            <p class="text-14-normal"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_position', true) ?></p>
                                            <hr />
                                            <div class="bottom-item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                                <p class="text-14-normal paragraph-item"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_company', true) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            <?php }; ?>
            <?php
            $cohosts = get_field('cohosts');
            if ($cohosts) { ?>
                <div class="wrapper">
                    <h2 class="title">Co-Host</h2>
                    <div class="wrapper-speaker-content minus-m16-lr">
                        <?php foreach ($cohosts as $post) :
                            setup_postdata($post); ?>
                            <div class="wrapper-item m16-lr">
                                <div class="wrapper-speaker-item">
                                    <a href="<?php the_permalink(); ?>" class="ava-speaker">
                                        <img class="ava-speaker" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                    </a>
                                    <div class="position-item-content">
                                        <div class="wrapper-item-content">
                                            <a href="<?php the_permalink(); ?>" class="text-20-bold header-item"><?= the_title() ?></a>
                                            <p class="text-14-normal"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_position', true) ?></p>
                                            <hr />
                                            <div class="bottom-item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                                <p class="text-14-normal paragraph-item"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_company', true) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            <?php }; ?>
            <?php
            $panellists = get_field('panellists');
            if ($panellists) { ?>
                <div class="wrapper">
                    <h2 class="title">Panel</h2>
                    <div class="wrapper-speaker-content minus-m16-lr">
                        <?php foreach ($panellists as $post) :
                            setup_postdata($post); ?>
                            <div class="wrapper-item m16-lr">
                                <div class="wrapper-speaker-item">
                                    <a href="<?php the_permalink(); ?>" class="ava-speaker">
                                        <img class="ava-speaker" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                    </a>
                                    <div class="position-item-content">
                                        <div class="wrapper-item-content">
                                            <a href="<?php the_permalink(); ?>" class="text-20-bold header-item"><?= the_title() ?></a>
                                            <p class="text-14-normal"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_position', true) ?></p>
                                            <hr />
                                            <div class="bottom-item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                                <p class="text-14-normal paragraph-item"><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_company', true) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            <?php }; ?>

        </div>

        <div class="wrapper-own-campfire other">
            <div class="wrapper">
                <div class="wrapper-title">
                    <h2 class="title">Other Campfires</h2>
                    <div class="slide-controls">
                        <button class="btn btn-icon btn-white prev">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                            </svg>
                        </button>
                        <button class="btn btn-icon btn-white next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="list-item minus-m16-lr">
                    <?php
                    $whereBrazilCampfire = array();
                    $isbrazilcampfire = $post->isbrazilcampfire;
                    if (in_array("1", $isbrazilcampfire)) {
                        $whereBrazilCampfire =  array(
                            array(
                                'key'     => 'isbrazilcampfire',
                                'compare' => 'LIKE',
                                'value'   => '1',
                            )
                        );
                    } else {
                        $whereBrazilCampfire =  array(
                            'relation' => 'OR',
                            array(
                                'key'     => 'isbrazilcampfire',
                                'compare' => 'NOT LIKE',
                                'value'   => '1',
                            ),
                            array(
                                'key'     => 'isbrazilcampfire',
                                'compare' => 'NOT EXISTS',
                            )
                        );
                    }

                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'campfire',
                        'posts_per_page' => 6,
                        'post__not_in' => array($post->ID),
                        'meta_key' => 'start_date',
                        'orderby' => array('meta_value' => 'DESC'),
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key'     => 'tag',
                                'value'   => $value_tag,
                            ),
                            $whereBrazilCampfire
                        ),
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) :
                        $total = $the_query->found_posts;
                    ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php
                            $unixtimestamp = strtotime($post->start_date);
                            $unixtimeend = strtotime($post->end_date);
                            ?>
                            <div class="item-previous">
                                <div class="thumnail-item-previous">
                                    <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                    <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                                    </a>
                                </div>
                                <div class="title-item text-16-bold">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="date-time">
                                    <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                    <?php echo date_i18n("g:iA", $unixtimestamp); ?> - <?php echo date_i18n("g:iA", $unixtimeend); ?>
                                    <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                                    <?php echo date_i18n("d", $unixtimestamp); ?> <?php echo date_i18n("M", $unixtimestamp); ?> , <?php echo date_i18n("Y", $unixtimestamp); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        if ($(window).innerWidth() > 768) {
            var $slickElement98 = $(".wrapper-own-campfire .list-item"); // $('.slide-testimonial-container');
            var count = <?php echo $total ?>;
            $slickElement98.slick({
                slidesToShow: count == 1 ? 1 : count == 2 ? 2 : 3,
                prevArrow: $(".prev"),
                nextArrow: $(".next"),
                infinite: true,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                    },
                }, ],
            });
        }
    </script>
    <?php if (get_field('live_url')) : ?>
        <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
        <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">

        <style type="text/css">
            .video-js .vjs-control-bar,
            .video-js .vjs-big-play-button,
            .video-js .vjs-modal-dialog {
                color: #9fbdcc;
            }

            .video-js .vjs-big-play-button {
                z-index: 3;
            }
        </style>
        <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
        <script>
            var player = videojs('my_video_1', {

                html5: {
                    hls: {
                        overrideNative: false
                    }
                },
                liveui: true,
                errorDisplay: false
            });

            player.on('error', function() {
                console.log(player.error());
            });
        </script>
    <?php endif; ?>

    <?php if ('campfire' === get_post_type()) : ?>
        <!-- <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "VideoObject",
                "name": "<?php the_title(); ?>",
                "startDate": "<?php the_field('start_date'); ?>",
                "description": "<?php the_content(); ?>",
                "contentUrl": "<?php the_permalink(); ?>",
                "thumbnailUrl": "<?php echo get_the_post_thumbnail_url(); ?>",
                "uploadDate": "<?php echo get_the_date(); ?>",
                "publication": {
                    "@type": "BroadcastEvent",
                    "isLiveBroadcast": true,
                    "startDate": "<?php the_field('start_date'); ?>",
                    "endDate": "<?php the_field('end_date'); ?>"
                }
            }
        </script> -->
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "VideoObject",
                "name": "<?php the_title(); ?>",
                "startDate": "<?php the_field('start_date'); ?>",
                "description": "<?php the_content(); ?>",
                "contentUrl": "<?php the_permalink(); ?>",
                "thumbnailUrl": "<?php echo get_the_post_thumbnail_url(); ?>",
                "uploadDate": "<?php echo get_the_date(); ?>",
                "publication": {
                    "@type": "BroadcastEvent",
                    "isLiveBroadcast": true,
                }
            }
        </script>
        <script>
            <?php // Store event data in localStorage for HubSpot 
            ?>
            var event = window.location.href;
            localStorage.setItem('recentEvent', event);
            localStorage.setItem('recentEventTitle', "<?php the_title(); ?>");

            <?php if (get_field('hubspot_list')) : ?>
                localStorage.setItem('hubspotList', "<?php the_field('hubspot_list'); ?>");
            <?php endif; ?>

            <?php
            if ($itsToday) { ?>

                function refreshAt(hours, minutes, seconds) {
                    var now = new Date();
                    var then = new Date();

                    if (now.getHours() > hours ||
                        (now.getHours() == hours && now.getMinutes() > minutes) ||
                        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
                        then.setDate(now.getDate() + 1);
                    }
                    then.setHours(hours);
                    then.setMinutes(minutes);
                    then.setSeconds(seconds);

                    var timeout = (then.getTime() - now.getTime());
                    setTimeout(function() {
                        window.location.reload(true);
                    }, timeout);
                }

                // Refresh 
                console.log("Today");
            <?php }; ?>
        </script>

    <?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> -->