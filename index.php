<?php /**
* The main template file.
*/
get_header(); ?>

<div id="primary" class="content-area">
   <div id="content" class="site-content">
		<?php /* Start the Loop */
			while (have_posts()) : the_post();
				the_content();
			endwhile; 
		?>
   </div><!-- #content .site-content -->
</div>
<!-- #primary .content-area -->
          
<?php get_sidebar(); ?>
<?php get_footer(); ?>