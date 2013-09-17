<?php
/**
 * Get faq post type name
 * @return string
 */
function buddydocs_get_faq_post_type(){
    
    return 'bdocs-faq';
}

/**
 * Get faq post type slug
 * @return string
 */
function buddydocs_get_faq_slug(){
    
    $slug = buddydocs_get_option( 'faq_slug' );
    
    if( empty( $slug ) )
        $slug = 'faq';
    
    return $slug;
}


/**
 * Register Faq post type
 */
function buddydocs_register_faq(){
    
    $post_type = buddydocs_get_faq_post_type();
    $slug = buddydocs_get_faq_slug();
    
    register_post_type( $post_type, array(
            'label'     => __( 'FAQ', 'buddy-docs' ),
            'labels'    => array(     
                    'name'                => _x( 'FAQs', 'Faq Post type plural name ', 'buddy-docs' ),
                    'singular_name'       => _x( 'FAQ', 'Faq Post type singular name ', 'buddy-docs' ),
                    'add_new_item'        => _x( 'Add New FAQ', 'Add New FAQ item label', 'buddy-docs' ),
                    'new_item'            => _x( 'New FAQ', 'New FAQ item label', 'buddy-docs' ),
                    'view_item'           => _x( 'View FAQ', 'View FAQ item label', 'buddy-docs' ),
                    'edit_item'           => _x( 'Edit FAQ', 'Edit FAQ item label', 'buddy-docs' ),
                    'search_items'        => _x( 'Search FAQs', 'Search FAQ label', 'buddy-docs' ),
                    'not_found'           => _x( 'No FAQs found', 'No FAQ found label', 'buddy-docs' ),
                    'not_found_in_trash'  => _x( 'No FAQs found in trash', 'No FAQ found in trash label', 'buddy-docs' ),
            ),
            'public'                => true,
            'exclude_from_search'   => false,
            'supports'=> array(
                    'title',
                    'editor',
                    
            ),
            'has_archive' => true,
            'rewrite'=> array(
                'slug'       =>$slug,
                'with_front' => false,
                
            )
        
    ) );
}

add_action( 'init', 'buddydocs_register_faq' );