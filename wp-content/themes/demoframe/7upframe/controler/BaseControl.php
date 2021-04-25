<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!defined('ABSPATH')) return;

if(!class_exists('S7upf_BaseController')){
    class S7upf_BaseController{
        static function _init(){
            //Default Framwork Hooked
            add_filter( 'wp_title', array(__CLASS__,'_wp_title'), 10, 2 );
            add_action( 'wp', array(__CLASS__,'_setup_author') );
            add_action( 'after_setup_theme', array(__CLASS__,'_after_setup_theme') );
            add_action( 'widgets_init',array(__CLASS__,'_add_sidebars'));
            add_action( 'wp_enqueue_scripts',array(__CLASS__,'_add_scripts'));
            add_action( 'wp_footer', 's7upf_get_custom_javascript');

            //Custom hooked
            add_filter( 's7upf_get_sidebar',array(__CLASS__,'_blog_filter_sidebar'));
            add_action( 'admin_enqueue_scripts',array(__CLASS__,'_add_admin_scripts'));

            if(class_exists("woocommerce") && !is_admin()){
                add_action('woocommerce_product_query', array(__CLASS__, '_woocommerce_product_query'), 20);
            }
            add_filter('body_class', array(__CLASS__,'s7upf_body_classes'));

            // 7up hook
            add_action( 'pre_get_posts', array(__CLASS__,'s7upf_custom_posts_per_page'));
            add_action( 's7upf_before_main_content', array(__CLASS__,'s7upf_display_breadcrumb'),20);
            // Before/After append settings
            $terms = array('product_cat','product_tag','category','post_tag');
            foreach ($terms as $term_name) {
                add_action($term_name.'_add_form_fields', array(__CLASS__,'s7upf_product_cat_metabox_add'), 10, 1);
                add_action($term_name.'_edit_form_fields', array(__CLASS__,'s7upf_product_cat_metabox_edit'), 10, 1);    
                add_action('created_'.$term_name, array(__CLASS__,'s7upf_product_save_category_metadata'), 10, 1);    
                add_action('edited_'.$term_name, array(__CLASS__,'s7upf_product_save_category_metadata'), 10, 1);
            }
            // Before/After append display
            add_action('s7upf_before_main_content', array(__CLASS__,'s7upf_append_content_before'), 10);
            add_action('s7upf_after_main_content', array(__CLASS__,'s7upf_append_content_after'), 10);
        }

        static function _add_scripts(){
            $css_url = get_template_directory_uri() . '/assets/css/';
            $js_url  = get_template_directory_uri() . '/assets/js/';
            $api_key = s7upf_get_option('map_api_key');
            
            /*
             * Javascript
             * */
            if ( is_singular() && comments_open()){
            wp_enqueue_script( 'comment-reply' );
            }
            if(class_exists("woocommerce")){
                wp_enqueue_script( 'wc-add-to-cart-variation' );
            }
            //ENQUEUE JS
            wp_enqueue_script( 'bootstrap',$js_url.'lib/bootstrap.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'fancybox',$js_url.'lib/jquery.fancybox.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'carousel',$js_url.'lib/owl.carousel.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'jcarousellite',$js_url.'lib/jquery.jcarousellite.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'mCustomScrollbar',$js_url.'lib/jquery.mCustomScrollbar.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'elevatezoom',$js_url.'lib/jquery.elevatezoom.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'timecircles',$js_url.'lib/TimeCircles.min.js',array('jquery'),null,true);
            wp_enqueue_script( 'slick',$js_url.'lib/slick.min.js',array('jquery'),null,true);
            wp_enqueue_script( 's7upf-script',$js_url.'script.js',array('jquery'),null,true);
            // Load script form wp lib
            wp_enqueue_script('jquery-masonry');
            wp_enqueue_script( 'jquery-ui-tabs');
            // Map script
            if(s7upf_check_enqueue('sv_map,sv_service') && !empty($api_key)){
                wp_enqueue_script( 'google-map', "//maps.google.com/maps/api/js?key=".$api_key, array('jquery'), null, true );
                wp_enqueue_script( 's7upf-script-map',$js_url.'map.min.js',array('jquery'),null,true);
            }
            //AJAX
            wp_enqueue_script( 's7upf-ajax', $js_url.'ajax.js', array( 'jquery' ),null,true);
            wp_localize_script( 's7upf-ajax', 'ajax_process', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

            


            //ENQUEUE CSS
            wp_enqueue_style('s7upf-google-fonts',s7upf_get_google_link() );
            wp_enqueue_style('bootstrap',$css_url.'lib/bootstrap.min.css');
            wp_enqueue_style('font-awesome',$css_url.'lib/font-awesome.min.css');
            wp_enqueue_style('bootstrap-theme',$css_url.'lib/bootstrap-theme.min.css');
            wp_enqueue_style('jquery-fancybox',$css_url.'lib/jquery.fancybox.min.css');
            wp_enqueue_style('jquery-ui',$css_url.'lib/jquery-ui.min.css');
            wp_enqueue_style('owl-carousel',$css_url.'lib/owl.carousel.min.css');
            wp_enqueue_style('slick',$css_url.'lib/slick.css');
            wp_enqueue_style('slick-theme',$css_url.'lib/slick-theme.css');
            wp_enqueue_style('owl-theme',$css_url.'lib/owl.theme.min.css');
            wp_enqueue_style('owl-transitions',$css_url.'lib/owl.transitions.min.css');
            wp_enqueue_style('jquery-mCustomScrollbar',$css_url.'lib/jquery.mCustomScrollbar.min.css');           
            wp_enqueue_style('s7upf-color',$css_url.'lib/color.min.css');
            wp_enqueue_style('s7upf-theme',$css_url.'lib/theme.min.css');
            wp_enqueue_style('s7upf-theme-style',$css_url.'custom-style.css');
            wp_enqueue_style('s7upf-responsive',$css_url.'lib/responsive.css');
            wp_enqueue_style('animate-css');

            $custom_style = S7upf_Template::load_view('custom_css');
            if(!empty($custom_style)) {
                wp_add_inline_style('s7upf-theme-style',$custom_style);
            }
            wp_enqueue_style('s7upf-theme-default',get_stylesheet_uri());

        }

        static function _blog_filter_sidebar($sidebar){
            if((!is_front_page() && is_home()) || (is_front_page() && is_home())){
                $pos=s7upf_get_option('s7upf_sidebar_position_blog');
                $sidebar_id=s7upf_get_option('s7upf_sidebar_blog');
            }
            else{
                if(is_single()){
                    $pos = s7upf_get_option('s7upf_sidebar_position_post');
                    $sidebar_id = s7upf_get_option('s7upf_sidebar_post');
                }
                else{
                    $pos = s7upf_get_option('s7upf_sidebar_position_page');
                    $sidebar_id = s7upf_get_option('s7upf_sidebar_page');
                }        
            }
            if(class_exists( 'WooCommerce' )){
                if(s7upf_is_woocommerce_page()){
                    $pos = s7upf_get_option('s7upf_sidebar_position_woo');
                    $sidebar_id = s7upf_get_option('s7upf_sidebar_woo');    
                    if(is_single()){
                        $pos = s7upf_get_option('sv_sidebar_position_woo_single');
                        $sidebar_id = s7upf_get_option('sv_sidebar_woo_single');
                    }
                }
            }
            if(is_archive() && !s7upf_is_woocommerce_page()){
                $pos = s7upf_get_option('s7upf_sidebar_position_page_archive');
                $sidebar_id = s7upf_get_option('s7upf_sidebar_page_archive');
            }
            else{
                if(!is_home()){
                    $id = get_the_ID();
                    if(is_404()) $id = s7upf_get_option('s7upf_404_page');
                    if(is_front_page()) $id = (int)get_option('page_on_front');
                    if(is_archive() || is_search()) $id = 0;
                    if (class_exists('woocommerce')) {
                        if(is_shop()) $id = (int)get_option('woocommerce_shop_page_id');
                        if(is_cart()) $id = (int)get_option('woocommerce_cart_page_id');
                        if(is_checkout()) $id = (int)get_option('woocommerce_checkout_page_id');
                        if(is_account_page()) $id = (int)get_option('woocommerce_myaccount_page_id');
                    }
                    $sidebar_pos = get_post_meta($id,'s7upf_sidebar_position',true);
                    $id_side_post = get_post_meta($id,'s7upf_select_sidebar',true);
                    if(!empty($sidebar_pos)){
                        $pos = $sidebar_pos;
                        if(!empty($id_side_post)) $sidebar_id = $id_side_post;
                    }
                }
            }
            if(is_search() && !s7upf_is_woocommerce_page()) {
                $pos = s7upf_get_option('s7upf_sidebar_position_page_search','right');
                $sidebar_id = s7upf_get_option('s7upf_sidebar_page_search','blog-sidebar');                
            }
            if($sidebar_id) $sidebar['id'] = $sidebar_id;
            if($pos) $sidebar['position'] = $pos;
            return $sidebar;
        }
        
        
        // -----------------------------------------------------
        // Default Hooked, Do not edit

        /**
         * Hook setup theme
         *
         *
         * */

        static function _after_setup_theme(){
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on stframework, use a find and replace
             * to change LANGUAGE to the name of your theme in all the template files
             */

            // This theme uses wp_nav_menu() in one location.
            global $s7upf_config;
            $menus= $s7upf_config['nav_menu'];
            if(is_array($menus) and !empty($menus) ){
                register_nav_menus($menus);
            }


            add_theme_support( "title-tag" );
            add_theme_support('automatic-feed-links');
            add_theme_support('post-thumbnails');
            add_theme_support('html5',array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
            ));
            add_theme_support('post-formats',array(
                'image', 'video', 'gallery','audio','quote'
            ));
            add_theme_support('custom-header');
            add_theme_support('custom-background');
            add_theme_support('woocommerce');
        }

        /**
         * Add default sidebar to website
         *
         *
         * */
        static function _add_sidebars(){
            // From config file
            global $s7upf_config;
            $sidebars = $s7upf_config['sidebars'];
            if(is_array($sidebars) and !empty($sidebars) ){
                foreach($sidebars as $value){
                    register_sidebar($value);
                }
            }
            $add_sidebars = s7upf_get_option('s7upf_add_sidebar');
            if(is_array($add_sidebars) and !empty($add_sidebars) ){
                foreach($add_sidebars as $sidebar){
                    if(!empty($sidebar['title'])){
                        $id = strtolower(str_replace(' ', '-', $sidebar['title']));
                        $custom_add_sidebar = array(
                                'name' => $sidebar['title'],
                                'id' => $id,
                                'description' => esc_html__( 'SideBar created by add sidebar in theme options.', 'hama'),
                                'before_title' => '<'.$sidebar['widget_title_heading'].' class="widget-title">',
                                'after_title' => '</'.$sidebar['widget_title_heading'].'>',
                                'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s '.$sidebar['widget_class_heading'].'">',
                                'after_widget'  => '</div>',
                            );
                        register_sidebar($custom_add_sidebar);
                        unset($custom_add_sidebar);
                    }
                }
            }

        }


        /**
         * Set up author data
         *
         * */
        static function _setup_author(){
            global $wp_query;

            if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
                $GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
            }
        }


        /**
         * Hook to wp_title
         *
         * */
        static function _wp_title($title,$sep){
            return $title;
        }


        static function _add_admin_scripts(){
            $admin_url = get_template_directory_uri().'/assets/admin/';
            wp_enqueue_media();
            add_editor_style();            
            wp_enqueue_script( 's7upf-admin-js', $admin_url . '/js/admin.js', array( 'jquery' ),null,true );
            wp_enqueue_style( 'font-awesome',$admin_url.'css/font-awesome.css');
            wp_enqueue_style( 's7upf-custom-admin',$admin_url.'css/custom.css');
            wp_enqueue_style( 's7upf-custom-option',$admin_url.'css/custom-option.css');
        }

        static function _woocommerce_product_query($query){
            if($query->get( 'post_type' ) == 'product'){
                $query->set('post__not_in', '');
            } 
        }

        static function s7upf_body_classes($classes){
            $page_style     = s7upf_get_value_by_id('s7upf_page_style');
            $menu_fixed     = s7upf_get_value_by_id('s7upf_menu_fixed');
            $shop_ajax      = s7upf_get_option('shop_ajax');
            $show_preload   = s7upf_get_option('show_preload');
            $theme_info     = wp_get_theme();
            if(!empty($page_style)) $classes[] = $page_style;
            if(is_rtl()) $classes[] = 'rtl-enable';
            if($show_preload == 'on') $classes[] = 'preload';
            if($shop_ajax == 'on' && s7upf_is_woocommerce_page()) $classes[] = 'shop-ajax-enable';
            if(!empty($theme_info['Template'])) $theme_info = wp_get_theme($theme_info['Template']);
            $classes[]  = 'theme-ver-'.$theme_info['Version'];
            global $post;
            if(isset($post->post_content)){
                if(strpos($post->post_content, '[s7upf_shop')){
                    $classes[] = 'woocommerce';
                    if(strpos($post->post_content, 'shop_ajax="on"')) $classes[] = 'shop-ajax-enable';
                }
            }
            return $classes;
        }

        // theme function
        static function s7upf_display_breadcrumb(){       
            echo s7upf_get_template('breadcrumb');
        }

        static function s7upf_product_cat_metabox_add($tag) { 
            ?>
            <div class="form-field">
                <label><?php esc_html_e('Append Content Before','hama'); ?></label>
                <div class="wrap-metabox">
                    <select name="before_append" id="before_append">
                        <?php
                        $mega_pages = s7upf_list_post_type('s7upf_mega_item',false);
                        foreach ($mega_pages as $key => $value) {
                            echo '<option value="'.esc_attr($key).'">'.esc_html($value).'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label><?php esc_html_e('Append Content After','hama'); ?></label>
                <div class="wrap-metabox">
                    <select name="after_append" id="after_append">
                        <?php
                        foreach ($mega_pages as $key => $value) {
                            echo '<option value="'.esc_attr($key).'">'.esc_html($value).'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        <?php }
        static function s7upf_product_cat_metabox_edit($tag) { ?>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label><?php esc_html_e('Append Content Before','hama'); ?></label>
                </th>
                <td>            
                    <div class="wrap-metabox">
                        <select name="before_append" id="before_append">
                            <?php
                            $page = get_term_meta($tag->term_id, 'before_append', true);
                            $mega_pages = s7upf_list_post_type('s7upf_mega_item',false);
                            foreach ($mega_pages as $key => $value) {
                                $selected = selected($key,$page,false);
                                echo '<option '.$selected.' value="'.esc_attr($key).'">'.esc_html($value).'</option>';
                            }
                            ?>
                        </select>
                    </div>            
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label><?php esc_html_e('Append Content After','hama'); ?></label>
                </th>
                <td>            
                    <div class="wrap-metabox">
                        <select name="after_append" id="after_append">
                            <?php
                            $page = get_term_meta($tag->term_id, 'after_append', true);
                            foreach ($mega_pages as $key => $value) {
                                $selected = selected($key,$page,false);
                                echo '<option '.$selected.' value="'.esc_attr($key).'">'.esc_html($value).'</option>';
                            }
                            ?>
                        </select>
                    </div>            
                </td>
            </tr>
        <?php }
        static function s7upf_product_save_category_metadata($term_id){
            if (isset($_POST['before_append'])) update_term_meta( $term_id, 'before_append', $_POST['before_append']);
            if (isset($_POST['after_append'])) update_term_meta( $term_id, 'after_append', $_POST['after_append']);
        }

        static function s7upf_append_content_before(){
            $page_id = s7upf_get_value_by_id('before_append');
            if(function_exists('is_shop')) $is_shop = is_shop();
            else $is_shop = false;           
            if(is_archive() && !$is_shop){
                global $wp_query;
                $term = $wp_query->get_queried_object();
                if(isset($term->term_id)) $page_id = get_term_meta($term->term_id, 'before_append', true);
            }
            if(!empty($page_id)) echo '<div class="content-append-before"><div class="container">'.S7upf_Template::get_vc_pagecontent($page_id).'</div></div>';
        }
        static function s7upf_append_content_after(){
            $page_id = s7upf_get_value_by_id('after_append');
            if(function_exists('is_shop')) $is_shop = is_shop();
            else $is_shop = false;           
            if(is_archive() && !$is_shop){
                global $wp_query;
                $term = $wp_query->get_queried_object();
                $page_id = get_term_meta($term->term_id, 'after_append', true);
            }
            if(!empty($page_id)) echo '<div class="content-append-after"><div class="container">'.S7upf_Template::get_vc_pagecontent($page_id).'</div></div>';
        }

        static function s7upf_custom_posts_per_page($query){
            if( $query->is_main_query() && ! is_admin() && $query->get( 'post_type' ) != 'product') {
                $number         = get_option('posts_per_page');
                if(isset($_GET['number'])) $number = $_GET['number'];
                $query->set( 'posts_per_page', $number );
            }
        }
    }

    S7upf_BaseController::_init();
}
