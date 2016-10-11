<?php /**
* Custom functions that modify existing WP core features/act independently of Tiles' templates.
* @package Tiles
* @since 1.0
*/

// Get wp_page_menu() to show a home link. 
function tiles_page_menu_args($args){
	$args['show_home'] = true;
	return $args;
}
add_filter('wp_page_menu_args', 'tiles_page_menu_args');

// Add .group-blog to blogs with more than one published author
function tiles_body_classes($classes){
	if (is_multi_author()){
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter('body_class', 'tiles_body_classes');

// Moves #main to the end of the next/previous image links on attachment pages
function tiles_enhanced_image_navigation($url,$id){
	if (! is_attachment() && ! wp_attachment_is_image($id) )
		return $url;

	$image = get_post($id);
	if ( ! empty($image->post_parent) && $image->post_parent != $id)
		$url .= '#main';
	return $url;
}
add_filter('attachment_link', 'tiles_enhanced_image_navigation', 10, 2);