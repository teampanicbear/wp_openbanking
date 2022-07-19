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
    <div class="wrapper-speaker-detail-banner">
        <div class="wrapper">
            <div class="wrapper-content">
                <div class="avatar-speaker">
                    <img class="thumbnail" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                </div>
                <div class="info-speaker">
                    <div class="breadcumb">
                        <a href="<?= site_url() ?>">Home </a>
                        <div class="slash">/</div>
                        <a href="<?= site_url('speakers') ?>">Speakers</a>
                    </div>
                    <h4 class="name-speaker"><?= the_title() ?></h4>
                    <?php 
                        if(get_post_meta(get_the_ID(), 'advanced_options_speaker_logo', true)!=''){?>
                            <img class="logo" src="<?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_logo', true)?>" alt="">
                        <?php } ?>
                    <div class="position">
                        <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/position.svg" alt="<?= the_title() ?>">
                        <span><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_position', true) ?></span>
                        <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/company.svg" alt="">
                        <span><?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_company', true) ?></span>
                    </div>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                    <div class="arrow-action">
                        <a href="<?php echo get_post_meta(get_the_ID(), 'advanced_options_speaker_linkedin', true) ?>" class=" link">Visit <?= the_title() ?>'s Linkedin</a>
                        <div class="wrapper-img">
                            <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/navi_benefit.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-own-campfire">
        <div class="wrapper">
            <?php 
                $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'campfire',
                    'posts_per_page' => 6,
                    'meta_key' => 'start_date',  
                    'orderby' => array('meta_value' => 'DESC'),
                    'meta_query' => array(     
                        'relation' => 'OR',                 
                        array(
                            'key'     => 'hosts',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => 'panellists',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                        ,
                        array(
                            'key'     => 'cohosts',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                        ), 
                );
                $the_query = new WP_Query( $args );
            ?>
            <?php 
            if( $the_query->have_posts() ){
                $title_campfire = "'s Campfire";
                // var_dump($the_query->found_posts);
                if($the_query->found_posts==1){
                $title_campfire = " Campfire";
                }
            }
            ?>
            
            <h2 class="title"><?= the_title() ?><?php echo $title_campfire; ?></h2>
            <div class="list-item minus-m16-lr">
                <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                    $unixtimestamp = strtotime($post->start_date);
                    $unixtimeend = strtotime($post->end_date);
                    $link = get_the_permalink();
                    $title = get_the_title();
                    $id = get_the_ID();
                ?>
                <div class="item-previous">
                    <div class="thumnail-item-previous">
                        <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                        <?php
                            $class = '';
                            $tag_html='img';
                            echo do_shortcode("[get_link_campfire_detail tag_html='$tag_html' url='$link' title='$title' id='$id' class='$class']") 
                        ?>
                    </div>
                    <div class="title-item text-16-bold">
                        <?php
                            $class = '';
                            echo do_shortcode("[get_link_campfire_detail url='$link' title='$title' id='$id' class='$class']") 
                        ?>
                    </div>
                    <div class="date-time">
                        <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                        <?php echo date_i18n( "g:iA", $unixtimestamp ); ?> - <?php echo date_i18n( "g:iA", $unixtimeend ); ?>
                        <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                        <?php echo date_i18n( "d", $unixtimestamp ); ?> <?php echo date_i18n( "M", $unixtimestamp ); ?> , <?php echo date_i18n( "Y", $unixtimestamp ); ?> 
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <div class="wrapper-other-speaker">
        <div class="wrapper">
            <div class="wrapper-title">
                <h2 class="title">Other Speakers</h2>
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
            <div class="list-item">
                <?php 
                    $args = array(
                        'post_status' => 'publish',
                        'post_type'         => 'speaker',
                        'orderby'           => 'date',
                        'order'             => 'asc',    
                        'posts_per_page'    => 6,     
                        'post__not_in' => array($post->ID)           
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="wrapper-item">
                        <div class="wrapper-speaker-item">
                            <a href="<?php the_permalink(); ?>"  class="ava-speaker">
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
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?> 
            </div>
            <button class="btn-border">Load more</button>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<script>
    if($(window).innerWidth() > 768) {
        var $slickElement98 = $('.wrapper-other-speaker .list-item'); // $('.slide-testimonial-container');

        $slickElement98.slick({
            slidesToShow: 3,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            infinite: true,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
            ]
        });
    }
</script>
