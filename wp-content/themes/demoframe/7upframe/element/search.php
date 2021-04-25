<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_search_form')){
    function s7upf_vc_search_form($attr){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'placeholder'   => esc_html__("Search","hama"),
            'live_search'   => 'on',
            'search_in'     => '',
            'show_cat'      => 'on',
            'cats_product'  => '',
            'cats_post'     => '',
            'title'         => '',
            'custom_css'    => '',
            'el_class'      => '',
        ),$attr);
        extract($attr);
        $cats = '';
        if(!empty($cats_product) && $search_in == 'product') $cats = $cats_product;
        if(!empty($cats_post) && $search_in == 'post') $cats = $cats_post;
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$css_class;
        $search_val = get_search_query();
        if(empty($search_val)) $search_val = $placeholder.'...';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'search_val'    => $search_val,
            'cats'          => $cats,
            ));
        $html = s7upf_get_template_element('search/search',$style,$attr);
        return $html;
    }
}

stp_reg_shortcode('s7upf_search_form','s7upf_vc_search_form');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','sv_add_admin_search',10,100 );
if ( ! function_exists( 'sv_add_admin_search' ) ) {
    function sv_add_admin_search(){
        vc_map( array(
            "name"          => esc_html__("Search Form", 'hama'),
            "base"          => "s7upf_search_form",
            "icon"          => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'hama'),
            "description"   => esc_html__('Display search form', 'hama' ),
            "params"        => array(
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Style",'hama'),
                    "param_name"    => "style",
                    "value"         => array(
                        esc_html__("Default",'hama')   => '',
                        esc_html__("Search style 2",'hama')   => 'style2',
                        esc_html__("Search style 3",'hama')   => 'style3',
                        )
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Live Search",'hama'),
                    "param_name"    => "live_search",
                    "value"         => array(
                        esc_html__("On",'hama')    => 'on',
                        esc_html__("Off",'hama')   => 'off',
                        )
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Title",'hama'),
                    "param_name"    => "title",
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Place holder input",'hama'),
                    "param_name"    => "placeholder",
                ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Search in post type",'hama'),
                    "param_name"    => "search_in",
                    "value"         => array(
                        esc_html__("All",'hama')       => '',
                        esc_html__("Post",'hama')      => 'post',
                        esc_html__("Product",'hama')   => 'product',
                        )
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Show categories dropdown",'hama'),
                    "param_name"    => "show_cat",
                    "value"         => array(
                        esc_html__("On",'hama')    => 'on',
                        esc_html__("Off",'hama')   => 'off',
                        ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'not_empty' => true,
                        )
                ),
                array(
                    'heading'       => esc_html__( 'Post Categories', 'hama' ),
                    'type'          => 'autocomplete',
                    'param_name'    => 'cats_post',
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy('category'),
                    ),
                    'save_always'   => true,
                    'description'   => esc_html__( 'List of post categories', 'hama' ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'value'     => 'post',
                        )
                ),
                array(
                    'heading'       => esc_html__( 'Product Categories', 'hama' ),
                    'type'          => 'autocomplete',
                    'param_name'    => 'cats_product',
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy(),
                    ),
                    'save_always'   => true,
                    'description'   => esc_html__( 'List of product categories', 'hama' ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'value'     => 'product',
                        )
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Extra class name",'hama'),
                    "param_name"    => "el_class",
                    'group'         => esc_html__('Design Options','hama'),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'hama' )
                ),
                array(
                    "type"          => "css_editor",
                    "heading"       => esc_html__("CSS box",'hama'),
                    "param_name"    => "custom_css",
                    'group'         => esc_html__('Design Options','hama')
                ),
            )
        ));
    }
}
add_action( 'wp_ajax_live_search', 's7upf_live_search' );
add_action( 'wp_ajax_nopriv_live_search', 's7upf_live_search' );
if(!function_exists('s7upf_live_search')){
    function s7upf_live_search() {
        $key = $_POST['key'];
        $cat = $_POST['cat'];
        $post_type = $_POST['post_type'];
        $taxonomy = $_POST['taxonomy'];
        $trim_key = trim($key);
        $args = array(
            'post_type' => $post_type,
            's'         => $key,
            );
        $taxonomy = str_replace('_name', '', $taxonomy);
        if(!empty($cat)) {
            $args['tax_query'][]=array(
                'taxonomy'  =>  $taxonomy,
                'field'     =>  'slug',
                'terms'     =>  $cat
            );
        }
        $query = new WP_Query( $args );
        if( $query->have_posts() && !empty($key) && !empty($trim_key)){
            while ( $query->have_posts() ) : $query->the_post();
                echo    '<div class="item-search-pro">
                            <div class="search-ajax-thumb product-thumb">
                                <a href="'.esc_url(get_the_permalink()).'" class="product-thumb-link">
                                    '.get_the_post_thumbnail(get_the_ID(),array(50,50)).'
                                </a>
                            </div>
                            <div class="search-ajax-title"><h3 class="title14"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h3></div>';
                if($post_type == 'product') echo '<div class="search-ajax-price">'.s7upf_get_price_html(false).'</div>';
                echo    '</div>';
            endwhile;
        }
        else{
            echo '<p class="text-center">'.esc_html__("No any results with this keyword.","hama").'</p>';
        }
        wp_reset_postdata();
    }
}