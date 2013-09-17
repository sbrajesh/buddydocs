<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if (!class_exists('NHP_Options')) {
    require_once( dirname(__FILE__) . '/options/options.php' );
}




/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options() {
    $args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
    $args['dev_mode'] = false;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;
//Add HTML before the form
   // $args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'nhp-opts');

//Setup custom links in the footer for share icons
     $args['share_icons']['facebook'] = array(
        'link' => 'https://www.facebook.com/bpdev',
        'title' => 'Folow Us on Facebook',
        'img' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_320_facebook.png'
    );
    $args['share_icons']['twitter'] = array(
        'link' => 'https://twitter.com/buddydev',
        'title' => 'Folow Us on Twitter',
        'img' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_322_twitter.png'
    );
   
    $args['share_icons']['github'] = array(
        'link' => 'https://github.com/sbrajesh',
        'title' => 'Find me on Github',
        'img' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_341_github.png'
    );

//Choose to disable the import/export feature
//$args['show_import_export'] = false;
//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
    $args['opt_name'] = 'buddydocs';

//Custom menu icon
//$args['menu_icon'] = '';
//Custom menu title for options page - default is "Options"
    $args['menu_title'] = __('BuddyDocs Options', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
    $args['page_title'] = __('BuddyDocs Theme Options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
    $args['page_slug'] = 'buddydocs_theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';
//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
    $args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    $args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
    $args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';
//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
    $args['help_tabs'][] = array(
        'id' => 'nhp-opts-1',
        'title' => __('Documentation', 'nhp-opts'),
        'content' => __('<p>For the detailed explanation on the various setting, please read <a href="http://buddydev.com/docs/themes/wordpress-themes/buddydocs/">BuddyDocs Documentation</a>.</p>', 'nhp-opts')
    );


//Set the Help Sidebar for the options page - no sidebar by default										
   // $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'nhp-opts');



    $sections = array();

    $sections[] = array(
        'title' => __('General Settings'),
        'desc' => __('<p class="description">These are the common settings which apply globally.</p>', 'nhp-opts'),
        'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_119_adjust.png',
        'fields' => array(
                array(
                    'id' => 'logo_src',
                    'type' => 'upload',
                    'title' => __('Upload Logo', 'nhp-opts'),
                    'desc' => __('Browse image for <b>logo</b> showing in header.', 'nhp-opts')
                ),

                array(
                    'id' => 'logo_alt_text',
                    'type' => 'text',
                    'title' => __('Logo Alt Text', 'nhp-opts'),
                    'desc' => __('<br/>Write logo <b>alt text</b>.', 'nhp-opts')
                ),
                 array(
                    'id' => 'favicon_icon',
                    'type' => 'upload',
                    'title' => __('Favicon Icon', 'nhp-opts'),
                    'desc' => __('<br/>Browse <b>favicon icon</b>.', 'nhp-opts')
                ),
             
               array(
                    'id'=>'header_scripts',
                    'type'=>'textarea',
                    'title'=>__('Header Scripts','nhp-opts'),
                    'desc'=>__('Enter scripts you want to add in <b>the header</b>.','nhp-opts')
                )
            ));

   /*

      $sections[] = array(
            'title' => __('Home Colorization', 'nhp-opts'),
            'desc' => __('<p class="description">Home page <b>colorization</b> section.</p>', 'nhp-opts'),
            'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_021_snowflake.png',
            'fields' => array(
                   array(
                            'id' => 'header_bgcolor',
                            'type' => 'color',
                            'title' => __('Header Background Color', 'nhp-opts'), 

                        ),

                   array(
                        'id' => 'featured_boxes_background',
                        'type' => 'color',
                        'title' => __('Featured  Boxes Background Color', 'nhp-opts'),
                        'desc'

                     ),
                   array(
                        'id' => 'featured_boxes',
                        'type' => 'color',
                        'title' => __('Featured Boxes Color', 'nhp-opts'),
                        'desc'
                     ),
                  
                  array(
                        'id' => 'featured_title_color',
                        'type' => 'color',
                        'title' => __(' Featured Boxes Title Color', 'nhp-opts'),

                    ),
                  array(
                        'id' => 'featured_text_color',
                        'type' => 'color',
                        'title' => __(' Featured Boxes Text Color', 'nhp-opts'),

                    ),
                  array(
                        'id' => 's_main_title_color',
                        'type' => 'color',
                        'title' => __('Services/Team Main Title Color', 'nhp-opts'),

                    ),
                  array(
                        'id' => 's_sub_title_color',
                        'type' => 'color',
                        'title' => __(' Services/Team Sub Title Color', 'nhp-opts'),

                    ),
                  array(
                        'id' => 'footer_top_background',
                        'type' => 'color',
                        'title' => __('Footer Top Background Color', 'nhp-opts')
                      ),

                  array(
                        'id' => 'footer_bottom_background',
                        'type' => 'color',
                        'title' => __('Footer Bottom Background Color', 'nhp-opts'),

                    )
      ));     
      
    */
    
    $sections[] = array(
            'title' => __('Layout', 'nhp-opts'),
            'desc' => __('<p class="description">Select <b> layout</b> for your site.</p>', 'nhp-opts'),
            'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_111_align_center.png',
            'fields' => array(
                array(
                    'id' => 'theme_layout',
                    'type' => 'radio_img',
                    'title' => __('Select Layout', 'nhp-opts'),
                    'desc' => __('<br/><p class="description">You can choose <b>2 column</b> (right or left sidebar) , <b>single cloumn layout</b>.</p>', 'nhp-opts'),
                    'options' => array(
                        'one-col' => array('title' => '1 Column', 'img' => NHP_OPTIONS_URL . 'img/1col.png'),
                        'two-col-right' => array('title' => '2 Column Right', 'img' => NHP_OPTIONS_URL . 'img/2cr.png'),
                        'two-col-left' => array('title' => '2 Column Left', 'img' => NHP_OPTIONS_URL . 'img/2cl.png')
                    ), //Must provide key => value(array:title|img) pairs for radio options
                    'std' => 'two-col-right'
                ),

        ));
            
            
          
  
    
    /*

    $sections[] = array(
        'title' => __('Color', 'nhp-opts'),
        'desc' => __('<p class="description">Color settings for different sections.</p>', 'nhp-opts'),
        'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_021_snowflake.png',
        'fields' => array(
             
             array(
                'id' => 'header_inner_color',
                'type' => 'color',
                'title' => __('Header Inner Background', 'nhp-opts'), 
                
              ),
              array(
                'id' => 'logo_color',
                'type' => 'color',
                'title' => __('Logo Color', 'nhp-opts'), 
                
              ),
            array(
                'id' => 'body_background',
                'type' => 'color',
                'title' => __('Body Background Color', 'nhp-opts'), 
              
              ),
          
           array(
                'id' => 'title_color',
                'type' => 'color',
                'title' => __('Body Title Color', 'nhp-opts'),
             
            ),
            array(
                'id' => 'text_color',
                'type' => 'color',
                'title' => __('Body Text Color', 'nhp-opts'),
                
            ),
            array(
                'id' => 'date_comment_color',
                'type' => 'color',
                'title' => __('Post Meta Color', 'nhp-opts'),
                
            ),
            array(
                'id' => 'readmore_color',
                'type' => 'color',
                'title' => __('Readmore Color', 'nhp-opts'),
               
             ),
              
            array(
                'id' => 'readmore_color_hover',
                'type' => 'color',
                'title' => __('Readmore Hover Background Color', 'nhp-opts'),
               
            ),
            array(
                'id' => 'sidebar_title_color',
                'type' => 'color',
                'title' => __('Sidebar Title Color', 'nhp-opts'),
                
            ),  array(
                'id' => 'sidebar_link_color',
                'type' => 'color',
                'title' => __('Sidebar Link Color', 'nhp-opts'),
                
              ),
             array(
                'id' => 'footer_title_color',
                'type' => 'color',
                'title' => __('Footer Title Color', 'nhp-opts'),
                
             ),
             array(
                'id' => 'footer_link_color',
                'type' => 'color',
                'title' => __('Footer Link Color', 'nhp-opts'),
                
             ),
          array(
                'id' => 'heading_color',
                'type' => 'color',
                'title' => __('Heading Color(H1,H2,H3,H4......H6)', 'nhp-opts'),
                
            )
          
            ));

*/
    
    $sections[] = array(
        'title' => __('Footer Settings', 'nhp-opts'),
        'desc' => __('<p class="description">From here you can manage your <b>footer section</b>.</p>', 'nhp-opts'),
        'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_151_edit.png',
        'fields' => array(
                
             
               
             array(
                    'id' => 'copyright_text',
                    'type' => 'textarea',
                    'title' => __('Copyright Text', 'nhp-opts'),
                    'desc' => __('<p class="description">Copyright <b>text</b>.</p>', 'nhp-opts'),
                    'std' => __('<p class="alignleft">Copyright &copy;2013 BuddyDev.Com. All rights reserved .</p>
                                    <p class="alignright">BuddyDocs theme by <a href="http://BuddyDev.com">BuddyDev</a></p>', 'nhp-opts')
                ),
            array(
                'id' => 'analytic_code',
                'type' => 'textarea',
                'title' => __('Analytical Code', 'nhp-opts'),
                'desc' => __('<p class="description">Add <b>google analytics code</b> here or you can use it to add any javascript/css code in footer.</p>.', 'nhp-opts')
            )
           
            ));
    
    
    
       



    $tabs = array();

                if (function_exists('wp_get_theme')) {
                    $theme_data = wp_get_theme();
                    $theme_uri = $theme_data->get('ThemeURI');
                    $description = $theme_data->get('Description');
                    $author = $theme_data->get('Author');
                    $version = $theme_data->get('Version');
                    $tags = $theme_data->get('Tags');
                } else {
                    $theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()) . 'style.css');
                    $theme_uri = $theme_data['URI'];
                    $description = $theme_data['Description'];
                    $author = $theme_data['Author'];
                    $version = $theme_data['Version'];
                    $tags = $theme_data['Tags'];
                }

        $theme_info = '<div class="nhp-opts-section-desc">';
        $theme_info .= '<p class="nhp-opts-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'nhp-opts') . '<a href="' . $theme_uri . '" target="_blank">' . $theme_uri . '</a></p>';
        $theme_info .= '<p class="nhp-opts-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'nhp-opts') . $author . '</p>';
        $theme_info .= '<p class="nhp-opts-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'nhp-opts') . $version . '</p>';
        $theme_info .= '<p class="nhp-opts-theme-data description theme-description">' . $description . '</p>';
        $theme_info .= '<p class="nhp-opts-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'nhp-opts') . implode(', ', $tags) . '</p>';
        $theme_info .= '</div>';



    $tabs['theme_info'] = array(
                'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_195_circle_info.png',
                'title' => __('Theme Information', 'nhp-opts'),
                'content' => $theme_info
    );

    if (file_exists(trailingslashit(get_stylesheet_directory()) . 'README.html')) {
        $tabs['theme_docs'] = array(
            'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_071_book.png',
            'title' => __('Documentation', 'nhp-opts'),
            'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()) . 'README.html'))
        );
    }//if

    global $NHP_Options;
    $NHP_Options = new NHP_Options($sections, $args, $tabs);
}


add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */

function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}



/*
 * 
 * Custom function for the callback validation referenced above
 *
 */

function validate_callback_function($field, $value, $existing_value) {

    $error = false;
    $value = 'just testing';
    /*
      do your validation

      if(something){
      $value = $value;
      }elseif(somthing else){
      $error = true;
      $value = $existing_value;
      $field['msg'] = 'your custom error message';
      }
     */

    $return['value'] = $value;
    if ($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
?>