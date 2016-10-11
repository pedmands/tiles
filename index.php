<?php /**
* The main template file.
*/
get_header(); ?>

<div id="primary" class="content-area">
   <div id="content" class="site-content">
	

<?php 
	if ( have_posts() ) : 
		// Start the Loop
		while ( have_posts() ) : the_post(); 
        	get_template_part( 'content-templates/content', get_post_format() );
	    endwhile; 
   	endif; 
           ?>
   </div><!-- #content .site-content -->
</div>
<!-- #primary .content-area -->
          
<?php get_sidebar(); ?>
<?php get_footer(); ?>