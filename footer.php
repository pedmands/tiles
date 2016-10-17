<?php /**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package Tiles
* @since Tiles 1.0
*/
?>

</div><!-- #content .site-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <?php do_action( 'tiles_credits' ); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'tiles' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'tiles' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( __( 'Theme: %1$s by %2$s.', 'tiles' ), 'tiles', '<a href="https://themetilesr.com/" rel="designer">Themetilesr</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
</body>
</html>
