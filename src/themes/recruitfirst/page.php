<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recruitfirst
 */

get_header();
?>

	<div class="site-main">
        <div class="page-header">
            <div class="container">
                <h1 class="h2"><?php the_title(); ?></h1>
            </div>
        </div>
		<div class="page-content">
            <div class="page-content__inner">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
        </div>

	</div><!-- #main -->

<?php
get_footer('v2');
