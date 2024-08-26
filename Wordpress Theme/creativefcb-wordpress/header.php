<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativeFCB-wordpress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site min-h-screen flex flex-col">
    <a class="skip-link sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'creativefcb-wordpress' ); ?></a>

    <header id="masthead" class="site-header bg-gray-800 text-white py-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="site-branding flex items-center space-x-4">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                }
                if ( is_front_page() && is_home() ) :
                ?>
                    <h1 class="site-title text-3xl font-bold">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-white hover:text-gray-400"><?php bloginfo( 'name' ); ?></a>
                    </h1>
                <?php
                else :
                ?>
                    <p class="site-title text-2xl font-semibold">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-white hover:text-gray-400"><?php bloginfo( 'name' ); ?></a>
                    </p>
                <?php
                endif;
                $creativefcb_wordpress_description = get_bloginfo( 'description', 'display' );
                if ( $creativefcb_wordpress_description || is_customize_preview() ) :
                ?>
                    <p class="site-description text-sm text-gray-300"><?php echo esc_html( $creativefcb_wordpress_description ); ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle text-white focus:outline-none md:hidden" aria-controls="primary-menu" aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <?php esc_html_e( 'Menu', 'creativefcb-wordpress' ); ?>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container_class' => 'hidden md:flex space-x-6', // Hide on mobile, show on desktop
                        'menu_class'     => 'flex space-x-6',
                        'link_class'     => 'text-white hover:text-gray-400'
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
