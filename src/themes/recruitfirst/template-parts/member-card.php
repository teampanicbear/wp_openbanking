<?php
$position = get_post_meta($member->ID, 'rf_designation', true);
$industries = get_post_meta($member->ID, 'rf_industries', true);

$industries = explode(', ', $industries);
?>

<div class="member-card">
    <a href="<?php echo get_permalink($member) ?>" class="member-card__link"></a>
    <div class="member-card__avatar">
        <img class="member-card__avatar-img slide-up" loading="lazy" src="<?php echo get_the_post_thumbnail_url($member) ?>" alt="" width="220">
    </div>
    <div class="member-card__info">
        <h4 class="h5 member-card__name"><?php echo $member->post_title; ?></h4>
        <?php if ($position) : ?>
            <p class="member-card__position"><?php echo $position; ?></p>
        <?php endif; ?>
        <?php if (!empty($industries)) : ?>
            <div class="member-card__fields">
                <?php foreach ($industries as $industry) {
                    echo '<p>'. $industry .'</p>';
                }; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
