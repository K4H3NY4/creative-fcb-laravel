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
    ?>

        <article <?php post_class('bg-white shadow-lg rounded-lg overflow-hidden mb-8'); ?>>
            <div class="p-6">
                <header class="mb-6">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-4"><?php the_title(); ?></h1>
                    <div class="text-sm text-gray-600 mb-4">
                        <span><?php the_date(); ?></span> | <span><?php the_author(); ?></span>
                    </div>
                </header>

                <div class="prose lg:prose-xl text-gray-800">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

  

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main><!-- #primary -->

