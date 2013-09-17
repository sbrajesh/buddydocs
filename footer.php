<footer id="footer" class="clearfix">   <!-- footer starts here -->
   <h1 class="assistive-text"><?php _e( 'Footer', 'buddy-docs' );?></h1>
     <?php if (  is_active_sidebar( 'footer-1'  ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3'  ) ) : ?>
        <div id="t-footer">
                <div class="padder clearfix">

                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div id="first" class="widget-area clearfix" role="complementary">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div><!-- #first .widget-area -->
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div id="second" class="widget-area clearfix" role="complementary">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div><!-- #second .widget-area -->
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div id="third" class="widget-area clearfix" role="complementary">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div><!-- #third .widget-area -->
                <?php endif; ?>
                    		
                </div><!-- padder ends here -->
        </div> <!-- t-footer ends here -->
       <?php endif;?>
        
        <?php if( buddydocs_get_option( 'copyright_text' ) ) : ?>
             <div id="b-footer">
                <div class="padder">
                     <div id="site-description" class="clearfix">	
                            <?php echo buddydocs_get_option( 'copyright_text' ); ?>  
                        </div>
                  </div><!-- padder ends here -->
            </div><!-- b-footer ends here -->
        <?php endif;?>
    </footer>  <!-- footer ends here -->
   </div>	 <!-- page ends here -->

    <?php wp_footer();?>
    <?php 
        $analytic_code = buddydocs_get_option( 'analytic_code' );
            if( !empty( $analytic_code ) )
                 echo $analytic_code;
   ?>
 </body>

</html>