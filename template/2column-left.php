<?php
/**
 * Template Name: Two Column Left Sidebar
 */
?>
<?php get_header(); ?>
       
<div id="container" class="clearfix">     <!-- Container starts here -->
    <div id="contents" class="padder clearfix two-col-left">
                                                                                                                              
        <section id="content">
            <?php if ( have_posts() ) : ?>
            
                <?php  while ( have_posts() ) : the_post(); ?>
            
                      <?php  get_template_part( 'entry', 'page' ); ?> 

                   <?php endwhile; ?>
            <?php endif; ?>
        </section><!-- left-content ends here -->

        <?php get_sidebar();?>

    </div><!-- #contents ends  -->
</div>   <!-- container ends here -->

<?php get_footer();?>