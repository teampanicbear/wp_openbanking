<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OBE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper-our-mission wrapper-sponsor-banner">
        <div class="wrapper">
            <div class="wrapper-content">
                <div class="wrapper-video-mission">
                    <div class="video-mission">
                        <?php
                        if (get_post_meta(get_the_ID(), 'advanced_options_sponsor_video', true) != "") {
                        ?>
                            <img class="thumbnail" src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_poster-video', true) ?>" alt="">
                            <a ndata-fancybox="video" id="single_image" href="#" data-src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_video', true) ?>">
                                <button class="btn-play icon-play">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="">
                                </button>
                            </a>
                            <div class="overlay"></div>
                        <?php
                        } else {
                        ?>
                            <img class="thumbnail" src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_poster-video', true) ?>" alt="">
                        <?php } ?>

                    </div>
                </div>
                <div class="wrapper-content-title">
                    <span>
                        <a href="<?= site_url() ?>">
                            Home
                        </a>
                        <span>/</span>
                        <a href="javascript:void(0)">
                            Sponsors
                        </a>
                    </span>
                    <div class="info-title">
                        <?php
                        if (get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) != "") {
                        ?>
                            <img class="thumbnail" src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_logo', true) ?>" alt="">
                        <?php
                        } else {
                        ?>
                            <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        <?php } ?>
                        <h4><?= the_title() ?></h4>
                    </div>
                    <div class="banner-show-info">
                        <div class="info-left text-16-normal">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt="" />
                            <a href="#" class="sign-link"><?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_location', true) ?></a>
                        </div>
                        <div class="info-right text-16-normal">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.svg" alt="" />
                            <?php
                            $type_sponsor = get_post_meta(get_the_ID(), 'advanced_options_sponsor_type-sponsor', true);
                            $value_type_sponsor = 'Headline sponsors';
                            if ($type_sponsor == 'community-sponsor') {
                                $value_type_sponsor = 'Community sponsors';
                            }
                            ?>
                            <a href="javascript:void(0)" class="sign-link"><?php echo $value_type_sponsor; ?></a>
                        </div>
                    </div>

                    <?php the_content(); ?>
                    <div class="banner-action">
                        <div class="arrow-action link-action">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_url-sponsor', true) ?>" class=" link">Visit website</a>
                            <div class="wrapper-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                            </div>
                        </div>
                        <div class="link-icon">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_linkedin', true) ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="">
                            </a>
                            <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_facebook', true) ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fb.svg" alt="">
                            </a>
                            <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_twitter', true) ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vector.svg" alt="">
                            </a>
                            <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_instagram', true) ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sponsor-container wrapper-sponsor-other">
        <div class="wrapper">
            <div class="partner-content">
                <div class="wrapper-pop-up">
                    <div class="my-pop-up">
                        <img class="close-pop-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="">
                        <h5></h5>
                        <p class="text-16-normal"></p>
                    </div>
                </div>
                <h2>Other sponsors</h2>
                <div class="headline-contaner headline-container-other">
                    <div class="headline-sponsors sponsor-card sponsor-card-other">
                        <div class="sponsor-title text-16-bold">Headline sponsors</div>
                        <div class="sponsor-content">
                            <!-- loop here -->
                            <?php
                            $args = array(
                                'post_status' => 'publish',
                                'post_type'         => 'sponsor',
                                'orderby'           => 'date',
                                'order'             => 'asc',
                                'posts_per_page'    => 8,
                                'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                'meta_value' => 'headline-sponsor',
                                'post__not_in' => array($post->ID)
                            );
                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <?php 
                                        $url = get_the_permalink(); 
                                        $redirect = get_post_meta(get_the_ID(), 'advanced_options_sponsor_redirect', true);
                                        $target = false;
                                        if(!empty($redirect)) {
                                            $url = $redirect;
                                            $target = true;
                                        }
                                    ?>
                                    <div class="sponsor-avatar" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                        <a href="<?php echo $url; ?>" title='<?php the_title(); ?>' <?php echo $target ? 'target="_blank"' : ''; ?>><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"></a>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
                <div class="community-sponsors sponsor-card sponsor-card-community">
                    <div class="sponsor-title text-16-bold">Community sponsors</div>
                    <div class="sponsor-content">
                        <!-- loop here -->
                        <?php
                        $args = array(
                            'post_status' => 'publish',
                            'post_type'         => 'sponsor',
                            'orderby'           => 'date',
                            'order'             => 'asc',
                            'posts_per_page'    => 8,
                            'meta_key' => 'advanced_options_sponsor_type-sponsor',
                            'meta_value' => 'community-sponsor',
                            'post__not_in' => array($post->ID)
                        );
                        $the_query = new WP_Query($args);
                        ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php 
                                    $url = get_the_permalink(); 
                                    $redirect = get_post_meta(get_the_ID(), 'advanced_options_sponsor_redirect', true);
                                    $target = false;
                                    if(!empty($redirect)) {
                                        $url = $redirect;
                                        $target = true;
                                    }
                                ?>
                                <div class="sponsor-avatar sponsor-other" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                    <a href="<?php echo $url; ?>" title='<?php the_title(); ?>' <?php echo $target ? 'target="_blank"' : ''; ?>><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                    </div>
                </div>
                <div class="headline-contaner-mobile headline-container-other">
                    <div class="headline-sponsors sponsor-card-mobile">
                        <div class="sponsor-title text-16-bold">Headline sponsors</div>
                        <div class="sponsor-content">
                            <!-- loop here -->
                            <?php
                            $args = array(
                                'post_status' => 'publish',
                                'post_type'         => 'sponsor',
                                'orderby'           => 'date',
                                'order'             => 'asc',
                                'posts_per_page'    => 8,
                                'meta_key' => 'advanced_options_sponsor_type-sponsor',
                                'meta_value' => 'headline-sponsor',
                                'post__not_in' => array($post->ID)
                            );
                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>\
                                    <?php 
                                        $url = get_the_permalink(); 
                                        $redirect = get_post_meta(get_the_ID(), 'advanced_options_sponsor_redirect', true);
                                        $target = false;
                                        if(!empty($redirect)) {
                                            $url = $redirect;
                                            $target = true;
                                        }
                                    ?>
                                    <div class="sponsor-avatar" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                        <a href="<?php echo $url; ?>" title='<?php the_title(); ?>' <?php echo $target ? 'target="_blank"' : ''; ?>><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"></a>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
                <div class="community-sponsors-mobile sponsor-card-mobile sponsor-card-community">
                    <div class="sponsor-title text-16-bold">Community sponsors</div>
                    <div class="sponsor-content">
                        <!-- loop here -->
                        <?php
                        $args = array(
                            'post_status' => 'publish',
                            'post_type'         => 'sponsor',
                            'orderby'           => 'date',
                            'order'             => 'asc',
                            'posts_per_page'    => 8,
                            'meta_key' => 'advanced_options_sponsor_type-sponsor',
                            'meta_value' => 'community-sponsor',
                            'post__not_in' => array($post->ID)
                        );
                        $the_query = new WP_Query($args);
                        ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php 
                                    $url = get_the_permalink(); 
                                    $redirect = get_post_meta(get_the_ID(), 'advanced_options_sponsor_redirect', true);
                                    $target = false;
                                    if(!empty($redirect)) {
                                        $url = $redirect;
                                        $target = true;
                                    }
                                ?>
                                <div class="sponsor-avatar" data-title="<?php the_title(); ?>" data-content="<?php echo get_post_meta(get_the_ID(), 'advanced_options_sponsor_description', true) ?>">
                                    <a href="<?php echo $url; ?>" title='<?php the_title(); ?>' <?php echo $target ? 'target="_blank"' : ''; ?>><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper-speaker-become wrapper-partner-become">
        <div class="wrapper wrapper-content wrapper-partner-content">
            <div class="wrapper-content-left">
                <h2>Looking to ignite change and supercharge your growth?</h2>
                <h3>Looking to ignite change and supercharge your growth?</h3>
            </div>
            <div class="wrapper-content-right">
                <p class="text-16-light">Access to our global OBE community of over
                    15,000 Open Banking pioneers, raft of writers, marketing and events
                    experts as well as PR office will ramp up your connections,
                    brand visibility, learnings and deals done.</p>
                <a href='/sponsorship-enquires' class="btn-primary">Get Involved</a>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->