<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creativeFCB-wordpress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('border border-gray-300 rounded-lg p-6 mb-6 bg-white shadow-md hover:shadow-lg transition-shadow duration-300'); ?>>
    <header class="entry-header mb-4">
        <?php the_title( sprintf( '<h2 class="entry-title text-3xl font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-300"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta text-sm text-gray-600 mt-2">
            <?php
            creativefcb_wordpress_posted_on();
            creativefcb_wordpress_posted_by();
            ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-thumbnail mb-4">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-64 object-cover rounded-lg']); ?>
        </div><!-- .entry-thumbnail -->
    <?php endif; ?>

    <div class="entry-summary text-gray-700 mb-4">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:text-blue-700 font-medium">Read More</a>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
