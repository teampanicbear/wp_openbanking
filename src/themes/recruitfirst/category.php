<div>
    <div class="blog-post">
        <div class="grid grid--three-columns grid--doubling grid--stackable">
            <?php
            if (have_posts()) :
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="grid__column">
                        <?php echo get_template_part('template-parts/blog-grid'); ?>
                    </div>
                <?php
                endwhile;

            else :

                echo '<div class="grid__column"><h3 class="h4 no-post">'. __('No Post Found', 'rf' ) .'</h3></div>';

            endif;
            ?>
        </div>
        <?php rf_navigation(); ?>
    </div>

</div>
