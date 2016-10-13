<?php /**
* The template for displaying Archive pages.
*
* @package Tiles
* @since Tiles 1.0
*/
 get_header(); ?>
 
<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">
 
<?php if ( have_posts() ) : ?>
 
<header class="page-header">
    <h1 class="page-title">
        <?php
            if ( is_category() ) {
                printf( __( 'Category Archives: %s', 'tiles' ), '<span>' . single_cat_title( '', false ) . '</span>' );
 
            } elseif ( is_tag() ) {
                printf( __( 'Tag Archives: %s', 'tiles' ), '<span>' . single_tag_title( '', false ) . '</span>' );
 
            } elseif ( is_author() ) {
            	// Author queued
                the_post();
                printf( __( 'Author Archives: %s', 'tiles' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                // Rewind to beginning of the loop, using the queued Author
                rewind_posts();
 
            } elseif ( is_day() ) {
                printf( __( 'Daily Archives: %s', 'tiles' ), '<span>' . get_the_date() . '</span>' );
 
            } elseif ( is_month() ) {
                printf( __( 'Monthly Archives: %s', 'tiles' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
 
            } elseif ( is_year() ) {
                printf( __( 'Yearly Archives: %s', 'tiles' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
 
            } else {
                _e( 'Archives', 'tiles' );
 
            }
        ?>
    </h1>
    <?php
        if ( is_category() ) {
            // show category description
            $category_description = category_description();
            if ( ! empty( $category_description ) )
                echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
 
        } elseif ( is_tag() ) {
            // show tag description
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
                echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
        }
    ?>
</header><!-- .page-header -->
 
<?php tiles_content_nav( 'nav-above' ); ?>
 
<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
 
    <?php
       	/* Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file in template-parts/
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
        get_template_part( 'content', get_post_format() );
    ?>
 
<?php endwhile; ?>
 
<?php tiles_content_nav( 'nav-below' ); ?>
 
<?php else : ?>
 
<?php get_template_part( 'no-results', 'archive' ); ?>
 
<?php endif; ?>
 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>