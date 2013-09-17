<article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

    <div class="entry clearfix">
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddy-docs' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        </header>

        <?php if ( ! is_singular() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                 <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'buddy-docs' ) ); ?>
                <?php
                    wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'buddy-docs' ),
                            'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->
        <?php endif; ?>

        <footer class="entry-footer">
             <a href="<?php  the_permalink();?>" class="read-more"><?php _e( 'Continue Reading','buddy-docs' ); ?></a>
         </footer>

        <?php edit_post_link(__( 'Edit', 'buddy-docs' ), '<p class="edit-link">', '</p>'); ?>
        </div>                        
</article>