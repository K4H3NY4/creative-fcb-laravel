<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package creativeFCB-wordpress
 */

get_header();
?>

<main id="primary" class="site-main max-w-3xl mx-auto px-4 py-8">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', get_post_type() );

        the_post_navigation(
            array(
                'prev_text' => '<span class="text-gray-600 text-sm">' . esc_html__( 'Previous:', 'creativefcb-wordpress' ) . '</span> <span class="text-lg font-semibold text-gray-900">%title</span>',
                'next_text' => '<span class="text-gray-600 text-sm">' . esc_html__( 'Next:', 'creativefcb-wordpress' ) . '</span> <span class="text-lg font-semibold text-gray-900">%title</span>',
                'screen_reader_text' => __( 'Post navigation', 'creativefcb-wordpress' ),
            )
        );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main><!-- #primary -->

<?php

