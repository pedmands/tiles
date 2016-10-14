<?php
/**
 * Tiles functions and definitions
 *
 * @package Tiles
 * @since Tiles 1.0
 */

/**
 * Used to temporarily set content width based on the theme's design.
 *
 * @global int $content_width
 */
// function tiles_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'tiles_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'tiles_content_width', 0 );

if ( ! function_exists('tiles_setup')) :
	function tiles_setup(){
	require( get_template_directory() . '/inc/template-tags.php' );
	require( get_template_directory() . '/inc/tweaks.php' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	
	// Translation textdomain
	load_theme_textdomain( 'tiles', get_template_directory() . '/languages' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tiles' ),
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
}
endif;
add_action( 'after_setup_theme', 'tiles_setup' );


// Register widget areas.
function tiles_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'tiles' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tiles' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'tiles' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'tiles' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tiles_widgets_init' );

// Enqueue scripts and styles
function tiles_scripts() {
	wp_enqueue_style('style', get_stylesheet_uri());

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161011', true);

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20161011' );
	}
}
add_action( 'wp_enqueue_scripts', 'tiles_scripts');
