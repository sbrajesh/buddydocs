<!DOCTYPE html>
<!--[if IE 7]>
   <html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->

<!--[if !(IE 7) ><!-->
    <html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
    <meta  charset="<?php bloginfo( 'charset' ); ?>" />
           <title>
                <?php
                    global $page, $paged;
                    wp_title( '|', true, 'right' );
                    bloginfo( 'name' );
                    $site_description = get_bloginfo( 'description', 'display' );
                    if ( $site_description && ( is_home() || is_front_page() ) ) 
                        echo " | $site_description";
                    
                ?>
            </title>
            <meta name="viewport" content="width=device-width, initial-scale=1" />
           <?php $favicon_icon = buddydocs_get_option( 'favicon_icon' ); ?>
              
            <?php if ( $favicon_icon): ?>

                <link rel="icon" href="<?php echo $favicon_icon;?>" type="image/x-ico" />

             <?php endif;?>
             

            <?php wp_head();?>
            <?php 
             //get header script here from theme option
              $scripts = buddydocs_get_option( 'header_scripts' );
              
              if( !empty( $scripts ) )
                echo $scripts;
            ?>    
           
           <?php  $template_dir = get_template_directory_uri(); ?>
         <!--[if lt IE 9]>
             <script src="<?php echo $template_dir; ?>/_inc/js/html5shiv.js"></script>
             <script src="<?php echo $template_dir; ?>/_inc/js/ie7/ie9.js" type="text/javascript"></script>
             <script src="<?php echo $template_dir; ?>/_inc/js/ie7/ie7-squish.js" type="text/javascript"></script>
        <![endif]-->
          <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="<?php echo $template_dir; ?>/_inc/css/ie.css" />
        <![endif]-->

</head>
<body <?php body_class(); ?> >

<div id="page">    <!-- page starts here --> 
    <header id="header" class="clearfix">   <!-- header starts here -->
        <div class="padder clearfix">
            <?php
                $logo_src = buddydocs_get_option( 'logo_src' );
                $logo_alt = buddydocs_get_option( 'logo_alt_text' );
                $logo_alt = $logo_alt ? $logo_alt : get_bloginfo( 'name' );
            ?>
            <div id="header-left"> 
                    <?php if ( $logo_src ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo $logo_src; ?>" alt="<?php echo $logo_alt ?>" /></a>
                    <?php else: ?>
                        <h1><a href="<?php echo site_url('/'); ?>" class="logo" title="<?php echo $logo_alt; ?>"><?php bloginfo( 'name' ); ?></a></h1>
                   <?php endif;?>
            </div> <!-- header-left end here -->
            <div id="header-right" > 
                   <nav id="top-bar" class="clearfix">
                        <h3 class="assistive-text"><?php _e( 'Main Menu','buddy-docs' );?></h3>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
                    </nav>
            </div><!-- search-box ends here -->
        </div> <!-- padder ends here -->
   </header>  <!-- header ends here -->

<div id="featured-box">
    <div class="padder clearfix">
        <div id="search-box">
       <?php get_search_form(); ?>
        </div>    
    </div>
</div><!-- featured search box ends here -->   