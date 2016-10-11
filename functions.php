<?php
/**
 * Tiles functions and definitions
 *
 * @package Tiles
 * @since Tiles 1.0
 */

/**
 * Used to temporarily set content width based on the theme's design.
 */
if ( ! isset( $content_width ) )
    $content_width = 1010; 
if ( ! function_exists('tiles_setup')) :

	function tiles_setup(){
		require( get_template_directory() . '/inc/template-tags.php' );
		require( get_template_directory() . '/inc/tweaks.php' );
		/** translation textdomain */
		load_theme_textdomain('tiles', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'whitenoise' ),
		) );

		add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		) );
		add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tiles_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );


	} // tiles_setup
endif; 
add_action('after_setup_theme', 'tiles_setup');
