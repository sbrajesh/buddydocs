<?php get_header( 'buddydocs' );?>

<?php $theme_layout = buddydocs_get_option( 'theme_layout' ); ?>
       
<div id="container" class="clearfix">     <!-- Container starts here -->
    <div id="contents" class="padder clearfix <?php echo $theme_layout ?>">
                                                                                                                              
        <section id="content">
            <?php if ( have_posts() ) : ?>
            
                <?php  while ( have_posts() ) : the_post(); ?>
            
                      <?php  get_template_part( 'entry', 'single' ); ?> 

                   <?php endwhile; ?>
            <?php endif; ?>
        </section><!-- #contents ends here -->

        <?php get_sidebar();?>

    </div><!-- #contents ends  -->
</div>   <!-- container ends here -->

<?php get_footer( 'buddydocs' );?>