<?php get_header( 'buddydocs' );?>

<div id="container" class="clearfix">    <!-- container starts here -->
    <div id="contents" class="padder clearfix page-404-contents one-col">
        <div id="content">
                
            <?php if ( function_exists( 'breadcrumb_trail' ) ): ?>
                <div id="navigation"> 
                    <?php breadcrumb_trail( buddydocs_get_breadcrumbs_args() ); ?>
                </div>
             <?php endif; ?>
            <article class="error404">
                <header class="clearfix">
                    <hgroup class="clearfix">
                        <h1><i class="icon-linux"></i></h1> 
                        <h3>
                            <span><?php _e( 'Page', 'buddy-docs' )?></span> <br>
                            <span><?php _e( 'Not Found', 'buddy-docs' )?></span>
                        </h3>

                    </hgroup>
                </header>
                <div class="entry">
                    <p><?php _e( 'The page you requested is missing. While we are looking for it,', 'buddy-docs' );?> </p>
                    <p><?php _e( 'Why not Search <a href="#search-box"><i class="icon-search"></i></a> again?', 'buddy-docs' );?> </p>

                </div>
            </article>
                
          </div>	<!-- content ends here -->
    </div><!-- padder ends here -->
</div>   <!-- container ends here -->

<?php get_footer( 'buddydocs' );?>