<?php global $post_id,$args;?>
 <div id="comments">
    <?php if (post_password_required()): ?>
     <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'buddy-docs' ); ?>
 </div><!-- end comment section if post password protected -->
<?php
    /*
    * stop the rest of comments.php from being processed
    */
    return;
?>
<?php endif; ?>
<?php if ( have_comments() ): ?>
    <h3><?php echo get_comments_number(); ?>Comments</h3>
    <ul class="commentlist" >
        <?php
            /*
            * list the comment and see the buddydocs_the_comment() in functions.php
            */
            wp_list_comments( array( 'callback' => 'buddydocs_the_comment' ) );
        ?>
    </ul>

<?php
    //if comments are closed and no comments
    elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')):
?>
   <p class="nocomments"><?php _e('Comments are closed.', 'buddy-docs' ); ?></p>

    <?php endif; ?>
    <?php
        $commenter =  wp_get_current_commenter();
        $user      =  wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $fields = array(
            'author' => '<p class="comment-form-author">' . '<label for="author">' . __( ' Your Name' ) . '</label> ' .
                        '<p class="comment-form-author"><input id="user-name" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="40"' . $aria_req . ' /></p>',
            'email' =>  '<p class="comment-form-email"><label for="email">' . __( ' Your Email' ) . '</label> ' .
                        '<p class="comment-form-email"><input id="user-email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="40"' . $aria_req . ' /></p>',
            'url' =>    '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
                        '<p class="comment-form-url"><input id="user-website" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="40" /></p>',
        );

        $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required"> * </span>' );
        $defaults = array(
            'fields' => apply_filters('comment_form_default_fields', $fields),
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comments', 'noun' ) . '</label><textarea id="comment" name="comment" cols="48" rows="8" aria-required="true"></textarea></p>',
            'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
            'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
            'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.') . ( $req ? $required_text : '' ) . '</p>',
            'comment_notes_after' => '<p class="form-allowed-tags comment-notes">' . sprintf(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s'), ' <code>' . allowed_tags() . '</code>') . '</p>',
            'id_form'        => 'commentform',
            'id_submit'      => 'submit-btn',
            'title_reply'    => __( 'Leave a Comment' ),
            'title_reply_to' => __( 'Post a Reply to %s' ),
            'cancel_reply_link' => __( 'Cancel reply' ),
            'label_submit'      => __( 'Send' ),
        );

        $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
        comment_form( $args );
   ?>
   </div><!-- comment ends here -->