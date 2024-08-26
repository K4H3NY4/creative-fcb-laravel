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
 * @package creativeFCB-wordpress
 */

get_header();
?>

<main id="primary" class="site-main max-w-4xl mx-auto px-4 py-8">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            echo '<div class="mt-8 border-t border-gray-300 pt-4">';
            comments_template();
            echo '</div>';
        endif;

    endwhile; // End of the loop.
    ?>
</main><!-- #main -->


