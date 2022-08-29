<div class="blog-post__item">
    <div class="blog-post__thumbnail">
        <a href="<?php echo get_the_permalink(); ?>">
            <?php the_post_thumbnail('blog-card');?>
        </a>
    </div>
    <?php $categories = get_the_category(get_the_ID()); ?>
    <span class="blog-post__category">
        <a href="<?php echo get_category_link( $categories[0]->term_id ) ?>"><?php echo $categories[0]->name; ?></a>
    </span>
    <h5 class="blog-post__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
</div>
