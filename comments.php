<?php /**
 * The template for displaying comments.
 *
 * The area of the page that contains both comments and the comment form. 
 * The display of ping/trackbacks and comments is handled by a callback to 
 * tiles_comment(), which is located in the inc/template-tags.php file.
 *
 * @package Tiles
 * @since Tiles 1.0
 */
?>
 
<?php
    /*
     * If post is password protected, hide comments from users who haven't logged in.
     */
    if ( post_password_required() )
        return;
?>
 
    <div id="comments" class="comments-area">
 
    <?php
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'tiles' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'tiles' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tiles' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tiles' ) ); ?></div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
        <ol class="commentlist">
            <?php
                /* Loop through and list the comment, using tiles_comment() to format the comments.
                 * To use different styling in a child theme, simply override tiles_comment().
                 * See tiles_comment() in inc/template-tags.php for more.
                 */
                wp_list_comments( array( 'callback' => 'tiles_comment' ) );
            ?>
        </ol><!-- .commentlist -->
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'tiles' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tiles' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tiles' ) ); ?></div>
        </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
    <?php endif; // have_comments() ?>
 
    <?php
        // If there are comments but comments are closed, inform users (while ommitting the form.)
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Comments are closed.', 'tiles' ); ?></p>
    <?php endif; ?>
 
    <?php comment_form(); ?>
 
</div><!-- #comments .comments-area -->