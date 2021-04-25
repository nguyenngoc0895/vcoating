<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_shop')){
    function s7upf_vc_shop($attr){
        $html = $css_class = '';
        $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if($order_default == 'menu_order') $order_default = $order_default.' title';
        $attr = shortcode_atts(array(
            'style'         => 'grid',
            'number'        => '12',
            'cats'          => '',
            'orderby'       => $order_default,
            'column'        => '2',
            'size'          => '',
            'size_list'     => '',
            'item_style'    => '',
            'item_style_list' => '',
            'grid_type'     => '',
            'shop_style'    => '',
            'check_type'    => 'on',
            'check_number'  => 'on',
            'el_class'      => '',
            'custom_css'    => '',
            'animation'     => '',
            'gap'           => '',
            'shop_ajax'     => '',
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' product-'.$style.'-view '.$grid_type.' '.$css_class .' '.$gap;
        if(isset($_GET['orderby'])) $orderby = $_GET['orderby'];
        if(isset($_GET['type'])) $style = $_GET['type'];
        if(isset($_GET['number'])) $number = $_GET['number'];
        if(!empty($size)) $size = explode('x', $size);
        if(!empty($size_list)) $size_list = explode('x', $size_list);
        $attr = array_merge($attr,array(
            'style'     => $style,
            'size'      => $size,
            'size_list' => $size_list,
            'number'    => $number,
            ));
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'         => 'product',
            'order'             => 'ASC',
            'posts_per_page'    => $number,
            'paged'             => $paged,
            );
        $attr_taxquery = array();
        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        if(!empty($_chosen_attributes) && is_array($_chosen_attributes)){
            $attr_taxquery = array('relation ' => 'AND');
            foreach ($_chosen_attributes as $key => $value) {
                $attr_taxquery[] =  array(
                                    'taxonomy'      => $key,
                                    'terms'         => $value['terms'],
                                    'field'         => 'slug',
                                    'operator'      => 'IN'
                                );
            }            
        }
        if(isset( $_GET['product_cat'])) $cats = $_GET['product_cat'];
        if(!empty($cats)) {
            $cats = explode(",",$cats);
            $attr_taxquery[]=array(
                'taxonomy'=>'product_cat',
                'field'=>'slug',
                'terms'=> $cats
            );
        }
        if (!empty($attr_taxquery)){
            $attr_taxquery['relation'] = 'AND';
            $args['tax_query'] = $attr_taxquery;
        }
        if( isset( $_GET['min_price']) && isset( $_GET['max_price']) ){
            $min = $_GET['min_price'];
            $max = $_GET['max_price'];
            $args['post__in'] = s7upf_filter_price($min,$max);
        }
        switch ($orderby) {
            case 'price' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'ASC';
                $args['meta_key'] = '_price';
            break;

            case 'price-desc' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'DESC';
                $args['meta_key'] = '_price';
            break;

            case 'popularity' :
                $args['meta_key'] = 'total_sales';                        
                $args['order']    = 'DESC';
            break;

            case 'rating' :
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['order']    = 'DESC';
            break;

            case 'date':
                $args['orderby'] = 'date';
                $args['order']    = 'DESC';
                break;
            
            default:
                $args['orderby'] = $order_default;
                break;
        }
        $html .= s7upf_get_template('top-filter','',array('style'=>$style,'number'=>$number,'check_number'=>$check_number,'check_type'=>$check_type,'check_order'=>true),false);
        $attr_ajax = array(
                'item_style'    => $item_style,
                'item_style_list'=> $item_style_list,
                'column'        => $column,
                'size'          => $size,
                'size_list'     => $size_list,
                'shop_style'    => $shop_style,
                'number'        => $number,
                'animation'     => $animation,
                'cats'          => $cats,
                );
            $data_ajax = array(
                "attr"        => $attr_ajax,
                );
            $data_ajax = json_encode($data_ajax);
        $html .=    '<div class="'.esc_attr($el_class).' products-wrap js-content-wrap" data-load="'.esc_attr($data_ajax).'">
                        <div class="products row list-product-wrap js-content-main">';
        $product_query = new WP_Query($args);
        $max_page = $product_query->max_num_pages;
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($product_query->have_posts()) {
            while($product_query->have_posts()) {
                $product_query->the_post();
                $html .= s7upf_get_template_woocommerce('loop/'.$style.'/'.$style,$slug,$attr,false);
            }
        }
        $html .=    '</div>';
        if($shop_style == 'load-more' && $max_page > 1){
            $data_load = array(
                "args"        => $args,
                "attr"        => $attr,
                );
            $data_loadjs = json_encode($data_load);
            $html .=    '<div class="btn-loadmore">
                            <a href="#" class="product-loadmore loadmore" 
                                data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                                data-maxpage="'.esc_attr($max_page).'">
                                '.esc_html__("Load more","hama").'
                            </a>
                        </div>';
        }
        else $html .= s7upf_get_template_woocommerce('loop/pagination','',array('wp_query'=>$product_query),false);
        $html .=    '</div>';        
        wp_reset_postdata();
        return $html;
    }
}

stp_reg_shortcode('s7upf_shop','s7upf_vc_shop');
$order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
if($order_default == 'menu_order') $order_default = $order_default.' title';
vc_map( array(
    "name"      => esc_html__("Shop", 'hama'),
    "base"      => "s7upf_shop",
    "icon"      => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display shop page', 'hama' ),
    "params"    => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Active Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Grid",'hama')   => 'grid',
                esc_html__("List",'hama')   => 'list',
                ),
            ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Shop ajax",'hama'),
            "param_name"    => "shop_ajax",
            "value"         => array(
                esc_html__("Off",'hama')   => '',
                esc_html__("On",'hama')   => 'on',
                ),
            ),
        array(
            'heading'     => esc_html__( 'Number', 'hama' ),
            'type'        => 'textfield',
            'description' => esc_html__( 'Enter number of product. Default is 12.', 'hama' ),
            'param_name'  => 'number',
            ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Order By",'hama'),
            "param_name" => "orderby",
            "value"         => array(
                esc_html__( 'Default sorting', 'hama' )          => $order_default,
                esc_html__( 'Popularity (sales)', 'hama' )       => 'popularity',
                esc_html__( 'Average Rating', 'hama' )           => 'rating',
                esc_html__( 'Sort by most recent', 'hama' )      =>'date',
                esc_html__( 'Sort by price (asc)', 'hama' )      => 'price',
                esc_html__( 'Sort by price (desc)', 'hama' )     =>'price-desc',
                ),
            ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(List)",'hama'),
            "param_name"    => "size_list",
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
            ),
        array(
            'heading'     => esc_html__( 'Gap products', 'hama' ),
            'type'        => 'dropdown',
            'param_name'  => 'gap',
            'value' => array(                   
                esc_html__('Default','hama')  => '',
                esc_html__('0px','hama')   => 'gap-0',
                esc_html__('5px','hama')   => 'gap-5',
                esc_html__('10px','hama')  => 'gap-10',
                esc_html__('15px','hama')  => 'gap-15',
                esc_html__('20px','hama')  => 'gap-20',
                esc_html__('30px','hama')  => 'gap-30',
                esc_html__('40px','hama')  => 'gap-40',
                esc_html__('50px','hama')  => 'gap-50',
            ),
            'description' => esc_html__( 'Select space for products.', 'hama' ),
        ),
        array(
            'heading'       => esc_html__( 'Thumbnail animation', 'hama' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'    => 'animation',
            'value'         => s7upf_get_product_thumb_animation(),
            ),
        array(
            'heading'       => esc_html__( 'List item style', 'hama' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'    => 'item_style_list',
            'value'         => s7upf_get_product_list_style(),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Show type filter",'hama'),
            "param_name"    => "check_type",
            "value"         => array(
                esc_html__("On",'hama')   => 'on',
                esc_html__("Off",'hama')   => 'off',
                ),
            'description'   => esc_html__( 'Show/hide type filter(list/grid) on blog page.', 'hama' ),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Show number filter",'hama'),
            "param_name"    => "check_number",
            "value"         => array(
                esc_html__("On",'hama')   => 'on',
                esc_html__("Off",'hama')   => 'off',
                ),
            'description'   => esc_html__( 'Show/hide number filter on blog page.', 'hama' ),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Shop Display",'hama'),
            "param_name"    => "shop_style",
            "value"         => array(
                esc_html__("Default",'hama')             => '',
                esc_html__("Load more button",'hama')    => 'load-more',
                ),
            ),        
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Grid Display",'hama'),
            "param_name"    => "grid_type",
            "value"         => array(
                esc_html__("Default",'hama')   => '',
                esc_html__("Masonry",'hama')   => 'list-masonry',
                ),
            'group'         => esc_html__('Grid Settings','hama'),
            ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(Grid)",'hama'),
            "param_name"    => "size",
            'group'         => esc_html__('Grid Settings','hama'),
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
            ),
        array(
            'heading'       => esc_html__( 'Grid item style', 'hama' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'    => 'item_style',
            'value'         => s7upf_get_product_style(),            
            'group'         => esc_html__('Grid Settings','hama'),
            ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column",'hama'),
            "param_name" => "column",
            "value"         => array(
                esc_html__("2 Column","hama")  => '2',
                esc_html__("3 Column","hama")  => '3',
                esc_html__("4 Column","hama")  => '4',
                esc_html__("5 Column","hama")  => '5',
                esc_html__("6 Column","hama")  => '6',
                esc_html__("7 Column","hama")  => '7',
                esc_html__("8 Column","hama")  => '8',
                esc_html__("9 Column","hama")  => '9',
                esc_html__("10 Column","hama") => '10',
                ),
            'group'         => esc_html__('Grid Settings','hama'),
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
        ),        
));
