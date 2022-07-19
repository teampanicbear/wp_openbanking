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
    <div class="wrapper-member-detail-banner">
        <div class="wrapper-speaker-detail-banner">
            <div class="wrapper">
                <div class="wrapper-content">
                    <div class="avatar-team">
                        <img class="thumbnail" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                    </div>
                    <div class="info-speaker">
                        <div class="breadcumb">
                            <a href="<?= site_url() ?>">Home </a>
                            <div class="slash">/</div>
                            <a href="<?= site_url('about') ?>">About us</a>
                        </div>
                        <h4 class="name-speaker"><?= the_title() ?></h4>
                        <div class="position">
                            <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/position.svg" alt="<?= the_title() ?>">
                            <span><?php echo get_post_meta(get_the_ID(), 'position', true) ?></span>
                        </div>
                        <div class="description">
                            <p><?php echo get_post_meta(get_the_ID(), 'description', true); ?></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="gradientback"></div>
        </div>
    </div>
    <div class="wrapper-member-detail-team">
        <div class="wrapper">
            <h2 class="title">There's more where <?= the_title() ?> came from...</h2>
            <div class="card-container minus-m16-lr flex">
                <?php
                $args = array(
                    'post_status' => 'publish',
                    'post_type'         => 'team',
                    'orderby'           => 'date',
                    'order'             => 'desc',
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                        <div class="wrapper-card m16-lr">
                            <div class="avatar-card">
                                <a href="<?php the_permalink(); ?>" class="image-container" data-image="<?php echo get_the_post_thumbnail_url(); ?>" style="background: url('<?php echo get_the_post_thumbnail_url() ?>')">
                                    <div class="overlay"></div>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="image-container-hover" data-image="<?php echo get_the_post_thumbnail_url(); ?>" style="background: linear-gradient(0deg, #FEBF10, #FEBF10), url('<?php echo get_the_post_thumbnail_url(); ?>')">
                                    <div class="overlay"></div>
                                </a>
                                <p><?php the_title() ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->