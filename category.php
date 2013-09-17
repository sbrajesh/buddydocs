<?php get_header( 'buddydocs' );?>
<?php $theme_layout = buddydocs_get_option( 'theme_layout' ); ?>      
<div id="container" class="clearfix">     <!-- container starts here -->
    <div id="contents" class="padder clearfix <?php echo $theme_layout;?> ">
       
        <section id="content">
            <header id='page-header'>
                <h1> Category : <span><?php echo single_term_title();?> </span> </h1>

                <p class="category-description"><?php echo term_description();?></p>

                <?php if ( function_exists( 'breadcrumb_trail' ) ): ?>
                    <div id="navigation"> 
                        <?php breadcrumb_trail( buddydocs_get_breadcrumbs_args() ); ?>
                    </div>
               <?php endif; ?>

            </header>

            <h1 class="assistive-text"><?php _e( 'Articles', 'buddy-docs' );?></h1>

                <?php  $categories = buddydocs_get_child_categories( get_queried_object_id() );?>
                <?php if( !empty( $categories ) ):?>
                    <div id="categories-list" class="categories-list home-categories">
                        <div class="clearfix category-row">
                            <?php $i=0;?>

                            <?php foreach ( $categories  as $category ): $i++; ?>
                                <div class="category-item">

                                    <h3> 
                                        <a href="<?php echo get_category_link($category);?>" title="View all posts in <?php esc_attr($category->name);?>">
                                        <?php echo $category->name; ?></a>
                                        <span class='cat-post-count'>(<?php echo absint($category->count);?>)</span>
                                    </h3>
                                    <?php //echo BPDev_Taxonomy_Posts_List_Helper::generate_toc(array('term_id'=>$category->term_id,'max'=>5));?>

                                </div> 
                                <?php if($i%2==0):?>
                                </div><div class="clearfix category-row">
                                <?php endif;?>      

                            <?php endforeach;?>
                        </div> <!-- end of row -->
                    </div><!-- end of categories list -->   
              <?php endif;?>  

                <?php if ( have_posts() ) : ?>

                   <?php while ( have_posts() ) : the_post(); ?>

                      <?php   get_template_part('entry'); ?> 

                    <?php endwhile; ?>

                  <?php buddydocs_pagination(); ?>  


               <?php endif; ?>
        </section><!-- left-content ends here -->

        <?php if($theme_layout!='one-col'):?>
           <?php get_sidebar(); ?>
       <?php endif;  ?>
       
    </div><!-- padder ends here -->
</div>   <!-- container ends here -->

<?php get_footer( 'buddydocs' );?>
