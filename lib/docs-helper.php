<?php
/**
 * Docs Helper
 */
/**
 * Get all categories object array
 */
function buddydocs_get_all_categories(){
    
    $categories = get_categories( array(
            'get'=>'all'
    ) );
    
    return $categories;
}

/**
 *  Get all categories but do not include child categories
 * @return type
 */
function buddydocs_get_all_toplevel_categories(){
    
   return buddydocs_get_child_categories( 0 );
}

/**
 *  Get all Child categories of the given 
 * @return type
 */
function buddydocs_get_child_categories( $parent_id = 0 ){
    
    $categories = get_categories( array(
            'get'=>'all',
            'parent'=> $parent_id
    ) );
    
    return $categories;
}

