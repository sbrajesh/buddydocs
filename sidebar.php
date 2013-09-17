<?php 
    if( !buddydocs_show_sidebar() ):
        return ;
    endif;
?>

<aside id="sidebar">
	<h1 class="assistive-text"><?php _e( 'Sidebar','buddy-docs' );?></h1>
     <ul>
        <?php if( ! dynamic_sidebar('main-sidebar')):?>
            <li class="widget"> <!-- widget starts here -->
                <h3 class="widget-title"><span><?php _e( 'Meta', 'buddy-docs'  ); ?></h3>
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </li>  <!-- widget ends here -->
            <li class="widget"> <!-- widget starts here -->
               <h3 class="widget-title"><?php _e( 'Archives', 'buddy-docs'  ); ?></h3>
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
            </li>  <!-- widget ends here -->
        <?php endif; ?>
     </ul>
</aside><!-- sidebar ends here -->