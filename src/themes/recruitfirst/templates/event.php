<?php
/**
 * Template Name: Event
 *
 * @package recruitfirst
 */


get_header();

$prefix = 'rf_';
$title = get_post_meta(get_the_ID(), $prefix . 'title', true);
$description = get_post_meta(get_the_ID(), $prefix . 'description', true);
$form_id = get_post_meta(get_the_ID(), $prefix . 'form_id', true);
?>
    <div class="site-main event-page">
        <div class="event-header">
            <h1 class="h2"><?php echo $title; ?></h1>
            <p><?php echo $description; ?></p>
            <div class="event-header__img">
                <picture>
                    <source media="(min-width:600px)" srcset="<?php echo THEME_URL; ?>/images/event-header.png">
                    <img src="<?php echo THEME_URL; ?>/images/event-mb.png" alt="Event">
                </picture>
            </div>
        </div>
        <div class="event-form">
            <div class="container">
                <?php echo do_shortcode($form_id); ?>
            </div>
        </div>
    </div>
<?php
get_footer('v2');
