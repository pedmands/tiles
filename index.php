<?php /**
* The main template file.
*/
get_header(); ?>

<div id="primary" class="content-area">
   <div id="content" class="site-content">
<?php
	if ( have_posts() ) {
		tiles_content_nav( 'nav-above' );
		// Start the Loop
		while ( have_posts() ) : the_post();
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file in template-parts/
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
        	get_template_part( 'template-parts/content', get_post_format() );
	    endwhile;
	    tiles_content_nav( 'nav-below' );
	}else{
		get_template_part('no-results','index');
	}
           ?>
   </div><!-- #content .site-content -->
</div>
<!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>