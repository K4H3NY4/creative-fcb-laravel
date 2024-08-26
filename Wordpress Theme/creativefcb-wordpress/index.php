<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativeFCB-wordpress
 */

get_header();
?>

<main id="primary" class="site-main max-w-4xl mx-auto px-4 py-8">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
        ?>
            <header class="mb-8">
                <h1 class="page-title text-4xl font-extrabold text-gray-900 shadow-md p-4 bg-white rounded-md"><?php single_post_title(); ?></h1>
            </header>
        <?php
        endif;

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
        ?>
            <article <?php post_class('mb-8 bg-white shadow-lg rounded-lg overflow-hidden'); ?>>
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600"><?php the_title(); ?></a>
                    </h2>
                    <div class="text-gray-700">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </article>
        <?php
        endwhile;

        the_posts_navigation(array(
            'prev_text' => '<span class="sr-only">' . esc_html__( 'Previous page', 'creativefcb-wordpress' ) . '</span><span aria-hidden="true" class="text-gray-700">&larr;</span>',
            'next_text' => '<span class="sr-only">' . esc_html__( 'Next page', 'creativefcb-wordpress' ) . '</span><span aria-hidden="true" class="text-gray-700">&rarr;</span>',
        ));

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
</main><!-- #main -->


