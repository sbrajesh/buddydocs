<?php
/**
 * Handles vartious ajax actions like
 * 
 * Loading More Faqs
 * 
 * Searching through Posts etc 
 */

//ajaxified search
add_action( 'wp_ajax_buddydocs_search', 'buddydocs_search_posts' );
add_action( 'wp_ajax_nopriv_buddydocs_search', 'buddydocs_search_posts' );

function buddydocs_search_posts(){
    $search_string = $_REQUEST['s'];
    
    
    $query = array(
        's'=> $search_string,
        'post_status'=>'publish'
        );
    
     $wpq = new WP_Query( $query );
        $html = '';
        
        if( $wpq->have_posts() ){
         
            $html ="<ul id='buddydocs-search-results'>";
            while( $wpq->have_posts() ){
             
                $wpq->the_post();   
            
                $html .= "<li><a href='". get_permalink (). "'>". get_the_title (). "</a></li>";
        
            }
          $html .= "</ul>"  ;
        }   
        wp_reset_postdata();

           echo $html;
        
        
    exit(0);
}


/*load more posts on a category page*/

/*load more posts on Faq page*/

add_action( 'wp_ajax_buddydocs_load_faq', 'buddydocs_load_more_faqs' );
add_action( 'wp_ajax_nopriv_buddydocs_load_faq', 'buddydocs_load_more_faqs' );
function buddydocs_load_more_faqs(){
    
    $page = $_POST['page'];
    if ( empty( $page ) )
        $page = 1;
    
    
    
     $query = array(
        'post_type' => buddydocs_get_faq_post_type(), 
        'post_status'=>'publish',
        'paged' => $page   
     );
   //echo $offset;
     $wpq = new WP_Query( $query );
    
    if ( $wpq->have_posts() ) :
        $success = 1;
        
    //start buffering
    ob_start();
        
     while ( $wpq->have_posts() ) : $wpq->the_post(); ?>

     <?php   get_template_part( 'entry', 'faq' ); ?> 

   <?php endwhile; ?>

    <?php $content = ob_get_clean();?>

<?php else : 
    
    $success = 0;
$content = __('No more Faqs Found');
    ?>

<?php endif; ?>
<?php

    echo json_encode( array( 'success'=> $success, 'content' => $content ) );
    exit(0);

}