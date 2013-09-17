<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) )
    exit;
/**
 * BuddyDocs Theme Helper Class
 * 
 * Helps to setup the widgets, register features support etc
 * It is implemented as singleton class, Use BuddyDocsThemeHelper::get_instance() to access the singleton object and de-register actions/filters in the child theme 
 */

class BuddyDocsThemeHelper {

    private static $instance;

    private function __construct() {

        add_action( 'after_setup_theme',    array( $this, 'setup' ) ); //initialize the setup, load files
        add_action( 'widgets_init',         array( $this, 'register_widget' ) ); //initialize register widget, load widget
        add_action( 'wp_head',              array( $this, 'head_script' ) );
        add_action( 'wp_print_styles',      array( $this, 'load_fonts' ) ); //initialize load fonts
        add_action( 'wp_print_styles',      array( $this, 'load_css' ) ); //initialize load css
        add_action( 'wp_print_scripts',     array( $this, 'load_js' ) ); //initialize load scripts
         
        //post class filter
        add_filter( 'post_class',           array( $this, 'filter_post_class' ), 10, 3 );
       
    }

    public static function get_instance() {

        if ( !isset( self::$instance ) )
            self::$instance = new self();

        return self::$instance;
    }

    public function setup() {
        
        $template_dir = get_template_directory();
        
        $files = array(
                
                '/lib/docs-helper.php',
                '/lib/faq.php',
                '/lib/ajax.php',
                '/lib/template-tags.php'
            
        );
        //if the taxonmy posts lis plugin is not included, include it
         if( ! class_exists( 'BPDev_Taxonomy_Posts_List_Helper' ) )
             $files[] = '/lib/post-list.php';
      
         //load breadcrumb_trail plugin if it does not exists
         if( ! function_exists( 'breadcrumb_trail' ) )
              $files[] = '/lib/breadcrumb-trail/breadcrumb-trail.php';
        
        //are we inside the admin
        if ( is_admin() ) {
             $files[] = '/admin/theme-options.php' ;  
         }
       
         //include files
         foreach ( $files as $file )
             require_once $template_dir . $file ;
            
        load_theme_textdomain( 'buddy-docs', $template_dir . '/languages' ); // Makes theme translation ready

         $this->register_features();
         $this->register_menus();
    }
    /**
     * Register featured images size 
     */
    public function register_features() {
        //support post thumbnail
        //add_theme_support( 'post-thumbnails' );
        //set_post_thumbnail_size( 580, 300 );
       
        //add support for post format
        //add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'link', 'gallery', 'image', 'quote' ) );
        
        
    }
    /**
     * Register menu
     */
    public function register_menus() {
      
        register_nav_menus( array(
            'primary' => __( 'Top Main Menu', 'buddy-docs' ),
            
        ) );
    }
   /**
    * Register widgets 
    */
    public function register_widget() {
        //main sidebar
        register_sidebar( array(
                'name'          => __( 'Sidebar', 'buddy-docs' ),
                'id'            => 'main-sidebar',
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => '</li>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );

        //footer col 1
        register_sidebar( array(    
                'name'          => __( 'Footer Column 1', 'buddy-docs' ),
                'id'            => 'footer-1',
                'description'   => __( 'Footer Column 1 ', 'buddy-docs' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
        
        //footer col2
        register_sidebar( array(
                'name'          => __( 'Footer Column 2', 'buddy-docs' ),
                'id'            => 'footer-2',
                'description'   => __( 'Footer Column 2 ', 'buddy-docs' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
        
        //footer col 3
        register_sidebar( array(
                'name'          => __( 'Footer Column 3', 'buddy-docs' ),
                'id'            => 'footer-3',
                'description'   => __( 'Footer Column 3 ', 'buddy-docs' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );

    }

     /**
     * Load Google Fonts 
     */
    public function load_fonts() { 
       
        wp_register_style( 'google-font-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans', array(), false, 'screen' ); 
        wp_enqueue_style( 'google-font-open-sans' ); // load google fonts
    }
     /**
     * Load css function
     */
    public function load_css() {
        
            $template_dir = get_template_directory_uri();
            $stylesheet_dir = get_stylesheet_directory_uri();
            //font awesome css
            wp_enqueue_style( 'font-awesome-css', $template_dir . '/_inc/vendors/font-awesome/css/font-awesome.min.css' );
            wp_enqueue_style( 'main-css', $stylesheet_dir . '/style.css' );
            wp_enqueue_style( 'men-menu-css', $template_dir . '/_inc/vendors/meanmenu/meanmenu.css' );
            wp_enqueue_style( 'live-search-css', $template_dir . '/_inc/vendors/live-search/jquery.liveSearch.css' );

    } 
    /**
     * Echo ajaxurl
     */
    function head_script(){?>
        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' );?>";
        </script>
        
    <?php }
     /**
     * Load js function 
     */
    public function load_js() {
        
        $template_dir = get_template_directory_uri();
        //live search plugin js
        wp_register_script( 'jquery-easing', $template_dir . '/_inc/js/jquery.easing.1.3.js', array( 'jquery' ), true );
        wp_register_script( 'live-search', $template_dir . '/_inc/vendors/live-search/jquery.liveSearch.js', array( 'jquery' ), true );
        //mobile menu js
        wp_register_script( 'meanmenu-js', $template_dir . '/_inc/vendors/meanmenu/jquery.meanmenu.min.js', array( 'jquery' ), true );
        wp_register_script( 'scroll-up', $template_dir . '/_inc/vendors/scroll-up/jquery.scrollUp.min.js', array( 'jquery' ), true );
        //theme js
        wp_register_script( 'theme-js', $template_dir . '/_inc/js/theme.js', array( 'jquery' ), true );
        
        wp_enqueue_script( 'jquery-easing' );
        
        wp_enqueue_script( 'live-search' );
        
        wp_enqueue_script( 'scroll-up' );
        
        wp_enqueue_script( 'meanmenu-js' );
        
        wp_enqueue_script( 'theme-js' );
        
        if ( is_singular() )
		wp_enqueue_script( 'comment-reply' );
           
    }
    
    function filter_post_class( $classes, $class, $post_id ){
    
        array_unshift( $classes, 'clearfix' );
    
        return $classes;
    }

}

BuddyDocsThemeHelper::get_instance(); //instantiate the helper which will setup the theme in turn



 /**
 * Get Theme Option
 * 
 * This function is used to get theme 
 * option selected by user from wp admin
 * @param type $option
 * @return type 
 */
function buddydocs_get_option( $option ) { 
  
  $settings = get_option( 'buddydocs' );
   
  if ( isset( $settings[$option] ) )
       return $settings[$option];
   
   return false;//if empty return false
    
}
 /**
 * Get All Theme Options as Associative array
 * 
 * This function is used to get theme 
 * options selected by user from wp admin
 * @return array of key=>val for options 
 */
function buddydocs_get_all_options() {
    
  $settings = get_option( 'buddydocs' );
  
  return $settings;
    
}


/**
 * Show/Hide Sidebar
 */

function buddydocs_show_sidebar(){
    
    $show = true;
    //if the layout is set to be single column
    if( buddydocs_get_option( 'theme_layout' ) == 'one-col' ){
        $show = false;
    
    //now check if we are on page and the page is using 2 column layout
    
        if( is_page() && ( is_page_template('template/2column-left.php') || is_page_template( 'template/2column-right.php' ) ) )
            $show = true;
        
    }
    return apply_filters( 'buddydocs_show_sidebar', $show );
}