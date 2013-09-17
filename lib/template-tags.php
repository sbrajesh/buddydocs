<?php

/**
 * Some Template Tags Used in BuddyDocs Theme
 * 
 */


/**
 * BuddyDocs Pagination
 * 
 * @global type $wp_query 
 */
function buddydocs_pagination() {

    global $wp_query;
    $total = $wp_query->max_num_pages;

    if ( $total > 1 ) {

       if ( ! $current_page = get_query_var( 'paged' ) )
            $current_page = 1;
       
        $perma_struct = get_option( 'permalink_structure' );
        $format = empty( $perma_struct ) ? '&page=%#%' : 'page/%#%/';
        
        if(is_search())
            $format = '&page=%#%';
        
        echo'<div class="pagination">';
        
        echo paginate_links(array(
            'base'      => get_pagenum_link(1) . '%_%',
            'format'    => $format,
            'current'   => $current_page,
            'total'     => $total,
            'mid_size'  => 3,
        ));
        
        echo'</div>';
    }
}



/**
 * Get the Page title
 * 
 * get the title head line for every page 
 * 
 */

function buddydocs_get_page_title(){
      global $post;
      
      $title = '';
      
      if( is_search() )
          $title = sprintf( __( 'Search Results for: %s', 'buddy-docs' ), '<span>' . get_search_query() . '</span>' );
      elseif( is_archive() ){
         
          
          if( is_category() )
            $title = sprintf( __( 'Category Archives: %s', 'buddy-docs' ), '<span>' . single_cat_title( '', false ) . '</span>');
          elseif( is_tag() )
            $title = sprintf( __( 'Articles Tagged  as: %s', 'buddy-docs' ), '<span>' . single_term_title( '', false ) . '</span>');
          elseif( is_author() )
             $title = 	sprintf(__( 'Author Archives: %s', 'buddy-docs' ), '<span>' . get_the_author_meta('display_name', get_queried_object_id ()) . '</span>' ); 
          elseif( is_post_type_archive() ){
              
              if( is_post_type_archive( buddydocs_get_faq_post_type() ) ){
                  $title = buddydocs_get_option( 'faq_page_title' );
                  if( ! $title )
                        $title = __( 'Frequently Asked Questions!', 'buddy-docs' );
              }else{
               
                $post_type_object = get_queried_object();
                $title = 	sprintf( __( '%s Archives', 'buddy-docs' ), '<span>' . $post_type_object->labels->name . '</span>' );
            
                  
              }

          }elseif( is_day() )
              $title = sprintf( __( 'Daily Archives: %s', 'buddy-docs' ), '<span>' . get_the_date() . '</span>' );
          elseif( is_month() )
              $title = sprintf( __( 'Monthly Archives: %s', 'buddy-docs' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'buddy-docs' ) ) . '</span>'); 
          elseif( is_year() )
              $title = sprintf( __( 'Yearly Archives: %s', 'buddy-docs' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'buddy-docs' ) ) . '</span>');
        
          else
              $title = __( 'Blog Archives ', 'buddy-docs' );
        }
        
        return $title;
           
}
/**
 * BuddyDocs Get Breadcrumbs Args
 * 
 * It is used if you have breadcrumb trails plugin installed
 * @return type 
 */
function buddydocs_get_breadcrumbs_args() {
       return array(
           'before'     => false,
           'separator'  => '/',
           'show_home'  => '<i class="icon-home"></i>'
           );
}


/**
 * BuddyDocs List Comment Item
 * 
 * @param type $comment
 * @param type $args
 * @param type $depth 
 */
function buddydocs_the_comment( $comment, $args, $depth ) {
       
        $GLOBALS['comment'] = $comment;
        
        switch ( $comment->comment_type ) {
            case 'pingback' :
            case 'trackback' :
            ?>
                <li class="post pingback">
                    <p><?php _e( 'Pingback:', 'buddy-docs' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'buddy-docs' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
                break;
        default :
        ?>
        <li <?php comment_class(); ?> class="comment-<?php comment_ID(); ?>">
            <div class="comment-avatar-box">
                    <?php echo get_avatar( $comment, 60 ); ?>
            </div><!-- comment-author  -->
            <div id="comment-<?php comment_ID(); ?>" class="comment-content">
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'buddy-docs' ); ?></em>
                    <br />
                <?php endif; ?>
                <div class="comment-meta">
                    <p>
                       <?php printf( __( '%1$s', 'buddy-docs' ), get_comment_date( 'j / m /Y' ) ); ?> -
                       <a class="comment-author-link"><?php printf( '%s', get_comment_author_link() ) ; ?> </a>
                    </p>
                </div>
                <div class="comment-entry">
                    <?php comment_text(); ?>
                </div>
                <div class="comment-options">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div><!-- #comment# -->
        <?php
        break;
      }
  }
