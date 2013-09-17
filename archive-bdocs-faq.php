<?php get_header( 'buddydocs' );?>

<?php $theme_layout = buddydocs_get_option( 'theme_layout' ); ?>      
<div id="container" class="clearfix">     <!-- container starts here -->
    <div id="contents" class="padder clearfix <?php echo $theme_layout; ?> ">
        <section id="content">
            <header id='page-header'>
                <h1> <?php echo buddydocs_get_page_title();?> </h1>

                <?php if ( function_exists( 'breadcrumb_trail' ) ): ?>
                    <div id="navigation"> 
                        <?php breadcrumb_trail( buddydocs_get_breadcrumbs_args() ); ?>
                    </div>
               <?php endif; ?>

            </header>

            <?php if ( have_posts() ) : ?>

               <?php while ( have_posts() ) : the_post(); ?>

                  <?php   get_template_part( 'entry', 'faq' ); ?> 

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
