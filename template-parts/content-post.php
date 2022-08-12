<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OBE
 */

$categories = get_the_category();
$author_id=$post->post_author;
$slugCategory = $categories[0]->slug;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="wrapper-blog-detail-banner">
            <div class="wrapper">
                <div class="wrapper-detail-banner-content">
                    <div class="wrapper-banner-logo">
                        <img class="banner-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_banner.png" alt="" />
                    </div>
                    <div class="banner-show">
                        <span> 
                            <a href="<?= site_url() ?>" class=" sign-link">
                                Home
                            </a>
                            /
                            <a href="<?= site_url('blog') ?>" class=" sign-link">
                                Blog
                            </a>
                            /
                            <?php if ($slugCategory=='events-and-awards') { ?>
                                <a href="<?= site_url('events-awards') ?>" class=" sign-link">
                                    Events and Awards
                                </a>
                            <?php } else { ?>
                                <?php
                                    foreach ($categories as $key => $category) {
                                ?>
                                    <a href="<?= esc_url( get_category_link( $category->term_id ) ) ?>" class=" sign-link">
                                        <?= $category->name ?>
                                    </a>
                                        <?php
                                            if ($key !== count($categories) - 1) {
                                                echo ", ";
                                            }
                                        ?>
                                <?php } ?>
                            <?php } ?>
                           
                        </span>
                        <h4> 
                            <?= the_title() ?>
                        </h4>
                        <hr />
                        <div class="banner-show-info">
                            <div class="info-left text-16-normal">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_people.svg" alt="" />
                                <a href="<?php echo get_author_posts_url($author_id); ?>" class=" sign-link"><?= get_author_name($author_id) ?></a>
                            </div>
                            <div class="info-right text-16-normal">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_detail_stopwatch.svg" alt="" />
								<?php if(get_field('event_start_date')) : ?>
								<?= date('H:i d M Y', strtotime(get_field('event_start_date'))); ?>
								<?php else : ?>
                                <?= the_date('H:i d M Y') ?>
								<?php endif; ?>
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
                    <div class="text-16-normal blog-detail-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-insight-event wrapper-blog-detail-event">
            <div class="wrapper-latest-blog">
                <div class="wrapper">
                    <div class="content-latest-blog blog-detail-latest">
                        <div class="wrapper-info">
                            <h5>Explore more</h5>
                            <?php 
                                $titleOther = '';
                                if ($slugCategory=='events-and-awards'){
                                    $titleOther = 'Events ';
                                }
                                else if($slugCategory=='news-stories-and-press-releases'){
                                    $titleOther = 'Press News';
                                }
                                else{
                                    $titleOther = 'Articles';
                                }
                            
                            ?>
                            <h2 class="main-title">Other <br> <?php echo $titleOther; ?></h2>
                            <h2 class="main-title-mobile">Other <?php echo $titleOther; ?></h2>
                            <div class="blog-detail-text text-20-light">
                                <?= get_option('other_article_detail_ncc_theme_options')['other_article_detail_ncc_theme_options'] ?>
                            </div>
                            <div class="wrapper-action">
                                <a href="<?= site_url('blog') ?>" class="btn-primary">Read more</a>
                                <div class="slide-controls">
                                    <button class="btn btn-icon btn-white prev">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 12H2" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M9 19L2 12L9 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-icon btn-white next">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 12H22" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            <path d="M15 19L22 12L15 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-slide">
                            <div class="row-split">
                                <div class="slide-progress" id="latest-blog-slide"></div>
                            </div>
                            <div class="list-slide" id="blog-slide">
                                <?php 
                                    $args = array(
                                        'posts_per_page' => 10,
                                        'post_type'      => 'post',
                                        'post__not_in' => array($post->ID)
                                    );
                                    $categories_id = array_map(function ($item) {
                                        return $item->term_id;
                                    }, $categories);
                                    if(!empty($categories_id)) {
                                        $args['cat'] = $categories_id;
                                    }
                                    $the_query = new WP_Query( $args );
                                ?>
                                <?php if( $the_query->have_posts() ): ?>
                                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        <div class="item-slide">
                                            <a href="<?php the_permalink(); ?> ">
                                                <img class="img-slide" src="<?= get_the_post_thumbnail() ?>" alt="">
                                            </a>
                                            <div class="description-slide">
                                                <div class="date-time-slide text-12-normal">
                                                    <h4><?php the_time('d'); ?><br></h4><?php the_time('F'); ?>, <?php the_time('Y'); ?>
                                                </div>
                                                <div class="info-slide">
                                                    <a href="<?php the_permalink(); ?> " class="title-slide text-16-normal">
                                                    <?php the_title(); ?>
                                                    </a>
                                                    <div class="blog-category text-14-normal">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                                        <span class="author-slide">
                                                        <?php the_category(); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // todo move to site
            var $slickElement = $('#blog-slide');

            $slickElement.on('init beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('#latest-blog-slide').width(`${Math.round(1*100/slick.slideCount)}%`);
                var wSlide = event.type == 'init' ? 0 :  nextSlide;
                $('#latest-blog-slide').css("margin-left", `${Math.round(wSlide*100/slick.slideCount)}%`);
            });
            
            $slickElement.slick({
                // slidesToShow: 2,
                variableWidth: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                infinite: true,
                slidesToScroll: 1,
                draggable: false,
                responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        variableWidth: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }
             ]
            });
        </script>
</article><!-- #post-<?php the_ID(); ?> -->
