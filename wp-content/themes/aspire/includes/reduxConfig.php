<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "mgk_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */



    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
          'menu_title' => esc_html__('Aspire Options', 'aspire'),
        'page_title' => esc_html__('Aspire Options', 'aspire'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'aspire_Options',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
     

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
   
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

   

 // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf(__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'aspire' ), $v );
    } else {
        $args['intro_text'] = '<p>'.esc_html__('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'aspire' ).'</p>';
    }

    // Add content after the form.
    $args['footer_text'] ='<p>'. esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'aspire' ).'</p>';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'aspire' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'aspire' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'aspire' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'aspire' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'aspire' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
  global $woocommerce;
               $cat_arg=array();
               $cat_data='';
              
                if(class_exists('WooCommerce')) {
                   
                    $cat_data='terms';
                    $cat_arg=array('taxonomies'=>'product_cat', 'args'=>array());
                   }
// -> START Basic Fields
    // -> Home Settings
       Redux::setSection( $opt_name, array(
        'title' => esc_html__('Home Settings', 'aspire'),
        'desc' => esc_html__('Home page settings ', 'aspire'),
        'icon' => 'el-icon-home',
  
        'fields' => array( 

            array(
                'id' => 'theme_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Theme Variation', 'aspire'),
                'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'aspire'),
                'options' => array(
                    'default' => array(
                        'title' => esc_html__('Default', 'aspire'),
                        'alt' => esc_html__('Default', 'aspire'),
                        'img' => MAGIKASPIRE_THEME_URI . '/images/variations/screen1.jpg'
                    ),
                    'version2' => array(
                        'title' => esc_html__('Version2', 'aspire'),
                        'alt' => esc_html__('Version 2', 'aspire'),
                        'img' => MAGIKASPIRE_THEME_URI . '/images/variations/screen2.jpg'
                    ),


                ),
                'default' => 'default'
            ), 

            array(
                'id'      => 'home_blocks',
                'type'    => 'sorter',
                'required' => array('theme_layout', '=', 'default'),
                'title'   => 'Homepage Layout Manager',
                'desc'    => 'Organize how you want the layout to appear on the homepage',
                'options' => array(
                    'enabled'  => array(           
                        'slider'     => esc_html__('Slider', 'aspire'),    
                        'home_offer_banners'=>esc_html__('Top Banners', 'aspire'),         
                        'newproduct' => esc_html__('New Products', 'aspire'),
                        'hodealproduct' => esc_html__('Hotdeal Product', 'aspire'),           
                        'bestseller' => esc_html__('Best Selling Products', 'aspire'),
                        'featured'=>esc_html__('Featured Products', 'aspire'),
                        'onsale'   => esc_html__('On Sale Products', 'aspire'),
                        'categorywise_products'=> esc_html__('CategoryWise Product Sliders', 'aspire'),
                        'recentlyviewed'=>esc_html__('Recently Viewed Products', 'aspire'),
                        'recentlypurchased'=>esc_html__('Recently Purchase', 'aspire'),            
                        'recommended'=>esc_html__('Recommended Products', 'aspire'),
                        'home_bottombanner'=>esc_html__('Bottom Banners', 'aspire'),                
                        'home_blog_posts'=>esc_html__('Home Blog Posts', 'aspire'),
                        'headerservice' => esc_html__('Service Section', 'aspire'),
                        'home_customsection'=>esc_html__('Home Custom Section', 'aspire')            
                    ),
                    'disabled' => array(
                    )
                ),
            ),


            array(
                'id'      => 'home_blocks2',
                'type'    => 'sorter',
                'required' => array('theme_layout', '=', 'version2'),
                'title'   => 'Homepage Layout Manager',
                'desc'    => 'Organize how you want the layout to appear on the homepage',
                'options' => array(
                    'enabled'  => array( 
                     'headerservice' => esc_html__('Service Section', 'aspire'),           
                     'slider'     => esc_html__('Slider', 'aspire'),                
                     'home_offer_banners'=>esc_html__('Top Banners', 'aspire'),         
                     'newproduct' => esc_html__('New Products', 'aspire'),                  
                     'bestseller' => esc_html__('Best Selling Products', 'aspire'),
                     'featured'=>esc_html__('Featured Products', 'aspire'),
                     'onsale'   => esc_html__('On Sale Products', 'aspire'),
                     'categorywise_products'=> esc_html__('CategoryWise Product Sliders', 'aspire'),
                     'recentlyviewed'=>esc_html__('Recently Viewed Products', 'aspire'),
                     'recentlypurchased'=>esc_html__('Recently Purchase', 'aspire'),            
                     'recommended'=>esc_html__('Recommended Products', 'aspire'),
                     'home_bottombanner'=>esc_html__('Bottom Banners', 'aspire'),                
                     'home_blog_posts'=>esc_html__('Home Blog Posts', 'aspire'),               
                     'home_customsection'=>esc_html__('Home Custom Section', 'aspire')            
                 ),
                    'disabled' => array(
                    )
                ),
            ),
            array(
                'id' => 'enable_welcome_msg',
                'type' => 'switch',
                'title' => esc_html__('Enable Home Page welcome message', 'aspire'),
                'subtitle' => esc_html__('You can enable/disable Home page welcome message', 'aspire')
            ),  
            array(
                'id' => 'welcome_msg',
                'type' => 'text',
                'required' => array('enable_welcome_msg', '=', '1'),
                'title' => esc_html__('Enter your welcome message here', 'aspire'),
                'subtitle' => esc_html__('Enter your welcome message here.', 'aspire'),
                'desc' => esc_html__('', 'aspire'),               

            ),             
            array(
                'id' => 'enable_home_gallery',
                'type' => 'switch',
                'title' => esc_html__('Enable Home Page Gallery', 'aspire'),
                'subtitle' => esc_html__('You can enable/disable Home page Gallery', 'aspire')
            ),

            array(
                'id' => 'home-page-slider',
                'type' => 'slides',
                'title' => esc_html__('Home Slider Uploads', 'aspire'),
                'required' => array('enable_home_gallery', '=', '1'),
                'subtitle' => esc_html__('Unlimited slide uploads with drag and drop sortings.', 'aspire'),
                'placeholder' => array(
                    'title' => esc_html__('This is a title', 'aspire'),
                    'description' => esc_html__('Description Here', 'aspire'),
                    'url' => esc_html__('Give us a link!', 'aspire'),
                ),

            ),



            array(
                'id' => 'enable_home_hotdeal_products',
                'type' => 'switch',                    
                'title' => esc_html__('Show Hot Deal/Daily Deal Product', 'aspire'),
                'subtitle' => esc_html__('You can show Hot Deal product on home page.', 'aspire')
            ),
            array(
                'id' => 'enable_home_hotdeal_on_products_page',
                'type' => 'switch',

                'title' => esc_html__('Show Hot Deal on Product Detail Page', 'aspire'),
                'subtitle' => esc_html__('You can show Hot Deal on Product Detail page.', 'aspire')
            ),


            array(
                'id' => 'home_daily_deal_title',
                'type' => 'text',
                'required' => array(array('theme_layout', '=', 'default'),array('enable_home_hotdeal_products', '=', '1')),
                'title' => esc_html__('Home Daily Deal Title', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Home Daily Deal Title', 'aspire')

            ),
            array(
                'id' => 'home_daily_deal_text',
                'type' => 'text',
                'required' => array(array('theme_layout', '=', 'default'),array('enable_home_hotdeal_products', '=', '1')),
                'title' => esc_html__('Home Daily Deal Text', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('home page daily deal text ', 'aspire')

            ),
            array(
                'id' => 'daily_deal_image',
                'type' => 'media',
                'required' => array(array('theme_layout', '=', 'default'),array('enable_home_hotdeal_products', '=', '1')),
                'title' => esc_html__('Home Daily Deal Image', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload daily deal image appear to the left of best seller on  home page ', 'aspire')
            ),

            array(
                'id' => 'daily_deal_url',
                'type' => 'text',
                'required' => array( array('theme_layout', '=', 'default'),array('enable_home_hotdeal_products', '=', '1')),
                'title' => esc_html__('Home Daily Deal Url', 'aspire'),
                'subtitle' => esc_html__('Home daily deal Url.', 'aspire'),
            ),



            array(
                'id' => 'enable_home_offer_banners',
                'type' => 'switch',              
                'title' => esc_html__('Enable Home Page Offer Banners', 'aspire'),
                'subtitle' => esc_html__('You can enable/disable Home page offer Banners', 'aspire')
            ),
            array(
                'id' => 'home-offer-banner1',
                'type' => 'media',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner 1', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload offer banner to appear on  home page', 'aspire'),                                    
            ),   
            array(
                'id' => 'home-offer-banner1-url',
                'type' => 'text',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner-1 URL', 'aspire'),
                'subtitle' => esc_html__('URL for the offer banner.', 'aspire'),
            ), 
            array(
                'id' => 'home-offer-banner2',
                'type' => 'media',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner 2', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload offer banner to appear on  home page', 'aspire')
            ),
            array(
                'id' => 'home-offer-banner2-url',
                'type' => 'text',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner-2 URL', 'aspire'),
                'subtitle' => esc_html__('URL for the offer banner.', 'aspire'),
            ),                     
            array(
                'id' => 'home-offer-banner3',
                'type' => 'media',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner 3', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload offer banner to appear on  home page', 'aspire')
            ),
            array(
                'id' => 'home-offer-banner3-url',
                'type' => 'text',
                'required' => array('enable_home_offer_banners', '=', '1'),
                'title' => esc_html__('Home offer Banner-3 URL', 'aspire'),
                'subtitle' => esc_html__('URL for the offer banner.', 'aspire'),
            ),



            array(
                'id' => 'enable_home_new_products',
                'type' => 'switch',
                'title' => esc_html__('Show New Products', 'aspire'),
                'subtitle' => esc_html__('You can show Show New Products on home page.', 'aspire')
            ),   
            array(
                'id'=>'home_newproduct_categories',
                'type' => 'select',
                'multi'=> true,                        
                'data' => $cat_data,                            
                'args' => $cat_arg,
                'title' => esc_html__('New Product Category', 'aspire'), 
                'required' => array('enable_home_new_products', '=', '1'),
                'subtitle' => esc_html__('Please choose New Product Category to show  its product in home page.', 'aspire'),
                'desc' => '',
            ),

            array(
                'id' => 'enable_home_bestseller_products',
                'type' => 'switch',
                'title' => esc_html__('Show Best Seller Products', 'aspire'),
                'subtitle' => esc_html__('You can show best seller products on home page.', 'aspire')
            ),

            array(
                'id' => 'home_bestseller_products-text',
                'type' => 'text',
                'required' => array('enable_home_bestseller_products', '=', '1'),
                'title' => esc_html__('Home bestseller products text', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('home page bestseller_products-text ', 'aspire')

            ),

            array(
                'id' => 'bestseller_image',
                'type' => 'media',

                'required' => array('enable_home_bestseller_products', '=', '1'),
                'title' => esc_html__('Home Best Seller image', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload bestseller image appear to the left of best seller on  home page ', 'aspire')
            ),
            array(
                'id' => 'bestseller_image-text',
                'type' => 'text',
                'required' => array('enable_home_bestseller_products', '=', '1'),
                'title' => esc_html__('Home bestseller image text', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('bestseller image text ', 'aspire')

            ),

            array(
                'id' => 'bestseller_product_url',
                'type' => 'text',
                'required' =>array('enable_home_bestseller_products', '=', '1'),
                'title' => esc_html__('Home Best seller   Url', 'aspire'),
                'subtitle' => esc_html__('Home Best seller  Url.', 'aspire'),
            ),
            array(
                'id' => 'bestseller_per_page',
                'type' => 'text',
                'required' => array('enable_home_bestseller_products', '=', '1'),
                'title' => esc_html__('Number of Bestseller Products', 'aspire'),
                'subtitle' => esc_html__('Number of Bestseller products on home page.', 'aspire')
            ), 


            array(
                'id' => 'enable_home_featured_products',
                'type' => 'switch',
                'title' => esc_html__('Show Featured Products', 'aspire'),
                'subtitle' => esc_html__('You can show featured products on home page.', 'aspire')
            ),

            array(
                'id' => 'featured_image',
                'type' => 'media',
                'required' => array(array('theme_layout', '=', 'version2'),array('enable_home_featured_products', '=', '1')),
                'title' => esc_html__('Home Featured image', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('Upload featured image appear to right of Featured product on  home page ', 'aspire')
            ),
            array(
                'id' => 'featured_image-text',
                'type' => 'text',
                'required' => array(array('theme_layout', '=', 'version2'),array('enable_home_featured_products', '=', '1')),
                'title' => esc_html__('Featured Image Text', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('featured image text ', 'aspire')
            ),

            array(
                'id' => 'featured_product_url',
                'type' => 'text',
                'required' => array(array('theme_layout', '=', 'version2'),array('enable_home_featured_products', '=', '1')),
                'title' => esc_html__('Home Featured  Url', 'aspire'),
                'subtitle' => esc_html__('Home Featured  Url.', 'aspire'),
            ),

            array(
                'id' => 'featured_per_page',
                'type' => 'text',
                'required' => array('enable_home_featured_products', '=', '1'),
                'title' => esc_html__('Number of Featured Products', 'aspire'),
                'subtitle' => esc_html__('Number of Featured products on home page.', 'aspire')
            ),                             


            array(
                'id' => 'enable_home_related_products',
                'type' => 'switch',
                'title' => esc_html__('Show Related Products', 'aspire'),
                'subtitle' => esc_html__('You can show Related products on home page.', 'aspire')
            ),
             
            array(
                'id' => 'related_per_page',
                'type' => 'text',
                'required' => array('enable_home_related_products', '=', '1'), 
                'title' => esc_html__('Number of Related Products', 'aspire'),
                'subtitle' => esc_html__('Number of Related products on home page.', 'aspire')
            ),


            array(
                'id' => 'enable_home_upsell_products',
                'type' => 'switch',
                'title' => esc_html__('Show Upsell Products', 'aspire'),
                'subtitle' => esc_html__('You can show Upsell products on home page.', 'aspire')
            ),
            
            array(
                'id' => 'upsell_per_page',
                'type' => 'text',
                'required' => array('enable_home_upsell_products', '=', '1'), 
                'title' => esc_html__('Number of Upsell Products', 'aspire'),
                'subtitle' => esc_html__('Number of Upsell products on home page.', 'aspire')
            ),

            array(
                'id' => 'enable_cross_sells_products',
                'type' => 'switch',
                'title' => esc_html__('Show cross sells Products', 'aspire'),
                'subtitle' => esc_html__('You can show cross sells products.', 'aspire')
            ),

            array(
                'id' => 'cross_per_page',
                'type' => 'text',
                'required' => array('enable_cross_sells_products', '=', '1'), 
                'title' => esc_html__('Number of cross sells Products', 'aspire'),
                'subtitle' => esc_html__('Number of cross sells Products', 'aspire')
            ),

            array(
                'id' => 'enable_home_blog_posts',
                'type' => 'switch',
                'title' => esc_html__('Show Home Blog', 'aspire'),
                'subtitle' => esc_html__('You can show latest blog post on home page.', 'aspire')
            ),
            array(
                'id' => 'home_blog-text',
                'type' => 'text',
                'required' => array('enable_home_blog_posts', '=', '1'),
                'title' => esc_html__('Home Blog text', 'aspire'),
                'desc' => esc_html__('', 'aspire'),
                'subtitle' => esc_html__('home page blog text ', 'aspire')

            ),

            array(
                'id'       => 'enable_testimonial',
                'type'     => 'switch',                    
                'title'    => esc_html__( 'Enable Testimonial ', 'aspire' ),
                'subtitle' => esc_html__( 'You can enable/disable Testimonial Uploads', 'aspire' ),
                'default' => '0'
            ),                   
            array(
                'id' => 'all_testimonial',
                'type' => 'slides',
                'required' => array('enable_testimonial', '=', '1'),
                'title' => esc_html__('Add Testimonial here', 'aspire'),
                'subtitle' => esc_html__('Unlimited testimonial.', 'aspire'),
                'placeholder' => array(
                    'title' => esc_html__('This is a title', 'aspire'),
                    'description' => esc_html__('Description Here', 'aspire'),
                    'url' => esc_html__('Give us a link!', 'aspire'),
                ),
            ),
            array(
                'id' => 'enable_home_bottom_slider',
                'type' => 'switch',
                'title' => esc_html__('Enable Home Page Bottom Slider', 'aspire'),
                'subtitle' => esc_html__('You can enable/disable Home page Bottom Slider', 'aspire')
            ),

            array(
                'id' => 'home_page_bottom_slider',
                'type' => 'slides',
                'title' => esc_html__('Home page Bottom Slider Uploads', 'aspire'),
                'required' => array('enable_home_bottom_slider', '=', '1'),
                'subtitle' => esc_html__('Unlimited slide uploads with drag and drop sortings.', 'aspire'),
                'placeholder' => array(
                    'title' => esc_html__('This is a title', 'aspire'),
                    'description' => esc_html__('Description Here', 'aspire'),
                    'url' => esc_html__('Give us a link!', 'aspire'),
                ),

            ),

            array(
                'id' => 'enable_home_product_categories',
                'type' => 'switch',

                'title' => esc_html__('Show Products Category Wise', 'aspire'),
                'subtitle' => esc_html__('You can show Products Slider Category Wise on Homepage.', 'aspire')
            ),

            array(
               'id'=>'home_product_categories',
               'type' => 'select',
               'multi'=> true,   
               'required' => array('enable_home_product_categories', '=', '1'),
               'data' => $cat_data,                            
               'args' => $cat_arg,         
               'title' => esc_html__('Product Categories ', 'aspire'), 
               'subtitle' => esc_html__('Please choose Categories to show Product Category Sliders on Homepage', 'aspire'),                       
           ),
            array(
                'id'=>'product_categories_per_page',
                'type' => 'text',                     
                'required' => array('enable_home_product_categories', '=', '1'),                                   
                'title' => esc_html__('Product Categories - Limit', 'aspire'), 
                'subtitle' => esc_html__('Number of products show from category', 'aspire'),                           
            ),


            array(
                'id' => 'enable_home_recommended_products',
                'type' => 'switch',
                'title' => esc_html__('Show Recommended Products', 'aspire'),
                'subtitle' => esc_html__('You can show Recommended products on home page.', 'aspire')
            ),

            array(
                'id' => 'recommended_per_page',
                'type' => 'text',
                'required' => array('enable_home_recommended_products', '=', '1'),
                'title' => esc_html__('Number of Recommended Products', 'aspire'),
            ), 

            array(
                'id' => 'enable_home_recently_purchased_product',
                'type' => 'switch',

                'title' => esc_html__('Show Recently Purchased Products', 'aspire'),
                'subtitle' => esc_html__('You can show Recently Purchased Products on Homepage.', 'aspire')
            ),
            array(
                'id'=>'recently_purchased_per_page',
                'type' => 'text',                     
                'required' => array('enable_home_recently_purchased_product', '=', '1'),                                   

                'title' => esc_html__('Number of Recently Purchased Products', 'aspire'),                         
            ),

            array(
                'id' => 'enable_home_recently_viewed_product',
                'type' => 'switch',

                'title' => esc_html__('Show Recently Viewed Products', 'aspire'),
                'subtitle' => esc_html__('You can show Recently Viewed Products on Homepage', 'aspire')
            ),
            array(
                'id'=>'recently_viewed_per_page',
                'type' => 'text',                     
                'required' => array('enable_home_recently_viewed_product', '=', '1'),                                   

                'title' => esc_html__('Number of Recently Viewed Products', 'aspire'),                         
            ),

            array(
                'id' => 'enable_home_onsale_products',
                'type' => 'switch',
                'title' => esc_html__('Show On Sale Products', 'aspire'),
                'subtitle' => esc_html__('You can show On Sale Products on home page', 'aspire')
            ),



            array(
                'id' => 'onsale_per_page',
                'type' => 'text',
                'required' => array('enable_home_onsale_products', '=', '1'),
                'title' => esc_html__('Number On Sale Products', 'aspire'),
            ),



                ), // fields array ends
) );
       // Edgesettings: General Settings Tab
Redux::setSection( $opt_name,array(
    'icon' => 'el-icon-cogs',
    'title' => esc_html__('General Settings', 'aspire'),
    'fields' => array(

        array(
            'id'       => 'category_pagelayout',
            'type'     => 'radio',
            'title'    => esc_html__('Set Category Page Default Layout', 'aspire'), 
            'subtitle' => esc_html__('Set Category Page Default Layout', 'aspire'),
            'desc'     => esc_html__('You cans set Category Page Default Layout here ', 'aspire'),
                    //Must provide key => value pairs for radio options
            'options'  => array(
                'grid' => 'Grid', 
                'list' => 'List', 

            ),
            'default' => 'grid'
        ),

        array(
           'id'       => 'category_item',
           'type'     => 'spinner', 
           'title'    => esc_html__('Product display in product category page', 'aspire'),
           'subtitle' => esc_html__('Number of item display in product category page','aspire'),
           'desc'     => esc_html__('Number of item display in product category page', 'aspire'),
           'default'  => '9',
           'min'      => '0',
           'step'     => '1',
           'max'      => '100',
       ),


        array(
            'id'       => 'enable_product_socialshare',
            'type'     => 'switch',                    
            'title'    => esc_html__( 'Enable Product Page Social Share ', 'aspire' ),
            'subtitle' => esc_html__( 'You can enable/disable Product Page Social Share', 'aspire' ),
            'default' => '0'
        ), 



        array(
            'id' => 'back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top Button', 'aspire'),
            'subtitle' => esc_html__('Toggle whether or not to enable a back to top button on your pages.', 'aspire'),
            'default' => true,
        ),



    )
));

  // Edgesettings: General Options -> Styling Options Settings Tab
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-website',
    'title' => esc_html__('Styling Options', 'aspire'),

    'fields' => array(

      array(
        'id'          => 'body-typography',
        'type'        => 'typography', 
        'title'       => esc_html__('Body Typography', 'aspire'),
        'google'      => true, 
        'font-backup' => true,
        'output'      => array('body','h1','h2'),
        'units'       =>'px',
        'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'aspire'),
        'default'     => array(
            'color'       => '', 
            'font-style'  => '', 
            'font-family' => '"Poppins", sans-serif', 
            'google'      => true,
            'font-size'   => '', 
            'line-height' => ''
        ),
    ),

      array(
        'id' => 'opt-animation',
        'type' => 'switch',
        'title' => esc_html__('Use animation effect', 'aspire'),
        'subtitle' => esc_html__('', 'aspire'),
        'default' => 0,
        'on' => 'On',
        'off' => 'Off',
    ), 

      array(
        'id' => 'set_body_background_img_color',
        'type' => 'switch',
        'title' => esc_html__('Set Body Background', 'aspire'),
        'subtitle' => esc_html__('', 'aspire'),
        'default' => 0,
        'on' => 'On',
        'off' => 'Off',
    ),
      array(
        'id' => 'opt-background',
        'type' => 'background',
        'required' => array('set_body_background_img_color', '=', '1'),
        'output' => array('body'),
        'title' => esc_html__('Body Background', 'aspire'),
        'subtitle' => esc_html__('Body background with image, color, etc.', 'aspire'),               
        'transparent' => false,
    ),                   
      array(
        'id' => 'opt-color-footer',
        'type' => 'color',
        'title' => esc_html__('Footer Background Color', 'aspire'),
        'subtitle' => esc_html__('Pick a background color for the footer.', 'aspire'),
        'validate' => 'color',
        'transparent' => false,
        'mode' => 'background',
        'output' => array('.footer')
    ),
      array(
        'id' => 'opt-color-rgba',
        'type' => 'color',
        'title' => esc_html__('Header Nav Menu Background', 'aspire'),
        'output' => array('nav','.mgk-main-menu','.sticky-header'),
        'mode' => 'background',
        'validate' => 'color',
        'transparent' => false,
    ),
      array(
        'id' => 'opt-color-header',
        'type' => 'color',
        'title' => esc_html__('Header Background', 'aspire'),
        'transparent' => false,
        'output' => array('header','.header-container'),
        'mode' => 'background',
    ),  

  )
));

  // header tab
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-file-alt',
    'title' => esc_html__('Header', 'aspire'),
    'heading' => esc_html__('All header related options are listed here.', 'aspire'),
    'desc' => esc_html__('', 'aspire'),
    'fields' => array(
        array(
                        'id' => 'enable_sticky_header',
                        'type' => 'switch',
                        'title' => esc_html__('Sticky Header Option', 'aspire'),
                        'subtitle' => esc_html__('You can switch on/off sticky header.', 'aspire'),
                        'default' => 1
            ),
        array(
            'id' => 'enable_header_currency',
            'type' => 'switch',
            'title' => esc_html__('Show Currency HTML', 'aspire'),
            'subtitle' => esc_html__('You can show Currency in the header.', 'aspire')
        ),
        array(
            'id' => 'enable_header_language',
            'type' => 'switch',
            'title' => esc_html__('Show Language HTML', 'aspire'),
            'subtitle' => esc_html__('You can show Language in the header.', 'aspire')
        ),

        array(
            'id' => 'enable_mini_cart',
            'type' => 'switch',
            'title' => esc_html__('Show Mini Cart', 'aspire'),
            'subtitle' => esc_html__('You can enable/disable Mini Cart', 'aspire'),
              'default' => '1'
        ),
        array(
            'id' => 'header_use_imagelogo',
            'type' => 'checkbox',
            'title' => esc_html__('Use Image for Logo?', 'aspire'),
            'subtitle' => esc_html__('If left unchecked, plain text will be used instead (generated from site name).', 'aspire'),
            'desc' => esc_html__('', 'aspire'),
            'default' => '1'
        ),
        array(
            'id' => 'header_logo',
            'type' => 'media',
            'required' => array('header_use_imagelogo', '=', '1'),
            'title' => esc_html__('Logo Upload', 'aspire'),
            'desc' => esc_html__('', 'aspire'),
            'subtitle' => esc_html__('Upload your logo here and enter the height of it below', 'aspire'),
        ),
        array(
            'id' => 'header_logo_height',
            'type' => 'text',
            'required' => array('header_use_imagelogo', '=', '1'),
            'title' => esc_html__('Logo Height', 'aspire'),
            'subtitle' => esc_html__('Don\'t include "px" in the string. e.g. 30', 'aspire'),
            'desc' => '',
            'validate' => 'numeric'
        ),
        array(
            'id' => 'header_logo_width',
            'type' => 'text',
            'required' => array('header_use_imagelogo', '=', '1'),
            'title' => esc_html__('Logo Width', 'aspire'),
            'subtitle' => esc_html__('Don\'t include "px" in the string. e.g. 30', 'aspire'),
            'desc' => '',
            'validate' => 'numeric'
        ),    

        array(
            'id' => 'header_remove_header_search',
            'type' => 'checkbox',
            'title' => esc_html__('Remove Header Search', 'aspire'),
            'subtitle' => esc_html__('Active to remove the search functionality from your header', 'aspire'),
            'desc' => esc_html__('', 'aspire'),
            'default' => '0'
        ),

         array(
            'id' => 'header_show_ajax_search',
            'type' => 'checkbox',
            'title' => esc_html__('Enable Ajax Search', 'aspire'),
            'subtitle' => esc_html__('Header ajax search active only when magik wooajax search plugin activated and option enable', 'aspire'),
            'desc' => esc_html__('', 'aspire'),
            'default' => '0'
        ),
        array(
            'id' => 'header_show_info_banner',
            'type' => 'switch',
            'title' => esc_html__('Show Info Banners', 'aspire'),
            'default' => '0'
        ),


        array(
            'id' => 'header_shipping_banner',
            'type' => 'text',
            'required' => array('header_show_info_banner', '=', '1'),
            'title' => esc_html__('Shipping Banner Text', 'aspire'),
        ),

        array(
            'id' => 'header_customer_support_banner',
            'type' => 'text',
            'required' => array('header_show_info_banner', '=', '1'),
            'title' => esc_html__('Customer Support Banner Text', 'aspire'),
        ),

        array(
            'id' => 'header_moneyback_banner',
            'type' => 'text',
            'required' => array('header_show_info_banner', '=', '1'),
            'title' => esc_html__('Warrant/Gaurantee Banner Text', 'aspire'),
        ),
        array(
            'id' => 'header_returnservice_banner',
            'type' => 'text',
            'required' => array('header_show_info_banner', '=', '1'),
            'title' => esc_html__('Return service Banner Text', 'aspire'),
        ),



                ) //fields end
));
      // Edgesettings: Menu Tab
Redux::setSection( $opt_name, array(
    'icon' => 'el el-website icon',
    'title' => esc_html__('Menu', 'aspire'),
    'heading' => esc_html__('All Menu related options are listed here.', 'aspire'),
    'desc' => esc_html__('', 'aspire'),
    'fields' => array(
     array(
        'id' => 'show_menu_arrow',
        'type' => 'switch',
        'title' => esc_html__('Show Menu Arrow', 'aspire'),
        'desc'  => esc_html__('Show arrow in menu.', 'aspire'),

    ),               
     array(
        'id'       => 'login_button_pos',
        'type'     => 'radio',
        'title'    => esc_html__('Show Login/sign and logout link', 'aspire'),                   
        'desc'     => esc_html__('Please Select any option from above.', 'aspire'),
                     //Must provide key => value pairs for radio options
        'options'  => array(
            'none' => 'None', 
            'toplinks' => 'In Top Menu', 
            'main_menu' => 'In Main Menu'
        ),
        'default' => 'none'
    )

                ) // fields ends here
));
 // Edgesettings: Footer Tab
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-file-alt',
    'title' => esc_html__('Footer', 'aspire'),
    'heading' => esc_html__('All footer related options are listed here.', 'aspire'),
    'desc' => esc_html__('', 'aspire'),
    'fields' => array(
       array(
        'id'       => 'enable_mailchimp_form',
        'type'     => 'switch',                    
        'title'    => esc_html__( 'Enable Mailchimp Form', 'aspire' ),
        'subtitle' => esc_html__( 'You can enable/disable Mailchimp Form', 'aspire' ),
        'default' => '0'
    ), 
       array(
        'id' => 'footer_color_scheme',
        'type' => 'switch',
        'title' => esc_html__('Custom Footer Color Scheme', 'aspire'),
        'subtitle' => esc_html__('', 'aspire')
    ),               
       array(
        'id' => 'footer_copyright_background_color',
        'type' => 'color',
        'required' => array('footer_color_scheme', '=', '1'),
        'transparent' => false,
        'title' => esc_html__('Footer Copyright Background Color', 'aspire'),
        'subtitle' => esc_html__('', 'aspire'),
        'validate' => 'color',
    ),
       array(
        'id' => 'footer_copyright_font_color',
        'type' => 'color',
        'required' => array('footer_color_scheme', '=', '1'),
        'transparent' => false,
        'title' => esc_html__('Footer Copyright Font Color', 'aspire'),
        'subtitle' => esc_html__('', 'aspire'),
        'validate' => 'color',
    ), 



       array(
        'id' => 'enable_footer_middle',
        'type' => 'switch',                       
        'title' => esc_html__('Enable footer middle', 'aspire'),
        'subtitle' => esc_html__('You can enable/disable Footer Middle', 'aspire')
    ),

       array(
        'id' => 'footer_middle',
        'type' => 'editor',
        'title' => esc_html__('Footer Middle Text ', 'aspire'), 
        'required' => array('enable_footer_middle', '=', '1'),               
        'subtitle' => esc_html__('You can use the following shortcodes in your footer text: [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-title] [site-tagline] [current-year]', 'aspire'),
        'default' => '',
    ),    

       array(
        'id' => 'bottom-footer-text',
        'type' => 'editor',
        'title' => esc_html__('Bottom Footer Text', 'aspire'),
        'subtitle' => esc_html__('You can use the following shortcodes in your footer text: [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-title] [site-tagline] [current-year]', 'aspire'),
        'default' => esc_html__('Powered by Magik', 'aspire'),
    ),


                ) // fields ends here
));

    // -> Blog Tab
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-pencil',
    'title' => esc_html__('Blog Page', 'aspire'),
    'fields' => array( 
     array(
        'id' => 'blog-page-layout',
        'type' => 'image_select',
        'title' => esc_html__('Blog Page Layout', 'aspire'),
        'subtitle' => esc_html__('Select main blog listing and category page layout from the available blog layouts.', 'aspire'),
        'options' => array(
            '1' => array(
                'alt' => 'Left sidebar',
                'img' => MAGIKASPIRE_THEME_URI . '/images/magik_col/category-layout-1.png'

            ),
            '2' => array(
                'alt' => 'Right Right',
                'img' => MAGIKASPIRE_THEME_URI . '/images/magik_col/category-layout-2.png'
            ),
            '3' => array(
                'alt' => '2 Column Right',
                'img' => MAGIKASPIRE_THEME_URI . '/images/magik_col/category-layout-3.png'
            )                                                                                 

        ),
        'default' => '2'
    ), 
     array(
        'id' => 'blog_show_authors_bio',
        'type' => 'switch',
        'title' => esc_html__('Author\'s Bio', 'aspire'),
        'subtitle' => esc_html__('Show Author Bio on Blog page.', 'aspire'),
        'default' => true,
        'desc' => esc_html__('', 'aspire')
    ),                  
     array(
        'id' => 'blog_show_post_by',
        'type' => 'switch',
        'title' => esc_html__('Display Post By', 'aspire'),
        'default' => true,
        'subtitle' => esc_html__('Display Psot by Author on Listing Page', 'aspire')
    ),
     array(
        'id' => 'blog_display_tags',
        'type' => 'switch',
        'title' => esc_html__('Display Tags', 'aspire'),
        'default' => true,
        'subtitle' => esc_html__('Display tags at the bottom of posts.', 'aspire')
    ),
     array(
        'id' => 'blog_full_date',
        'type' => 'switch',
        'title' => esc_html__('Display Full Date', 'aspire'),
        'default' => true,
        'subtitle' => esc_html__('This will add date of post meta on all blog pages.', 'aspire')
    ),
     array(
        'id' => 'blog_display_comments_count',
        'type' => 'switch',
        'default' => true,
        'title' => esc_html__('Display Comments Count', 'aspire'),
        'subtitle' => esc_html__('Display Comments Count on Blog Listing.', 'aspire')
    ),
     array(
        'id' => 'blog_display_category',
        'type' => 'switch',
        'title' => esc_html__('Display Category', 'aspire'),
        'default' => true,
        'subtitle' => esc_html__('Display Comments Category on Blog Listing.', 'aspire')
    ),
     array(
        'id' => 'blog_display_view_counts',
        'type' => 'switch',
        'title' => esc_html__('Display View Counts', 'aspire'),
        'default' => true,
        'subtitle' => esc_html__('Display View Counts on Blog Listing.', 'aspire')
    ),                  
 )
));
  // Edgesettings: Social Media Tab
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-file',
    'title' => esc_html__('Social Media', 'aspire'),
    'fields' => array(
       array(
        'id'       => 'enable_social_link_footer',
        'type'     => 'switch',                    
        'title'    => esc_html__( 'Enable Social Link In Footer', 'aspire' ),                        
        'default' => '0'
    ),
       array(
        'id' => 'social_facebook',
        'type' => 'text',
        'title' => esc_html__('Facebook URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Facebook URL.', 'aspire'),
    ),
       array(
        'id' => 'social_twitter',
        'type' => 'text',
        'title' => esc_html__('Twitter URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Twitter URL.', 'aspire'),
    ),
       array(
        'id' => 'social_googlep',
        'type' => 'text',
        'title' => esc_html__('Google+ URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Google Plus URL.', 'aspire'),
    ),

       array(
        'id' => 'social_pinterest',
        'type' => 'text',
        'title' => esc_html__('Pinterest URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Pinterest URL.', 'aspire'),
    ),
       array(
        'id' => 'social_youtube',
        'type' => 'text',
        'title' => esc_html__('Youtube URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Youtube URL.', 'aspire'),
    ),
       array(
        'id' => 'social_linkedin',
        'type' => 'text',
        'title' => esc_html__('LinkedIn URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your LinkedIn URL.', 'aspire'),
    ),
       array(
        'id' => 'social_instagram',
        'type' => 'text',
        'title' => esc_html__('Instagram URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your Instagram URL.', 'aspire'),
    ),
       array(
        'id' => 'social_rss',
        'type' => 'text',
        'title' => esc_html__('RSS URL', 'aspire'),
        'subtitle' => esc_html__('Please enter in your RSS URL.', 'aspire'),
    )                   
   )
));
    /*
     * <--- END SECTIONS
     */
