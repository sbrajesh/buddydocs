<header id='page-header'>
    <h1> <?php the_title();?> </h1>
    
    <?php if ( function_exists( 'breadcrumb_trail' ) ): ?>
     <div id="navigation"> 
         <?php breadcrumb_trail( buddydocs_get_breadcrumbs_args() ); ?>
     </div>
  <?php endif; ?>
</header>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

    <div class="entry clearfix">
        <div class="entry-content clearfix">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'buddy-docs' ) ); ?>
            <?php
                wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'buddy-docs' ),
                        'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

    <footer class="entry-footer clearfix">

     </footer>

    <?php edit_post_link(__( 'Edit', 'buddy-docs' ), '<p class="edit-link">', '</p>'); ?>
   </div>                        
</article>