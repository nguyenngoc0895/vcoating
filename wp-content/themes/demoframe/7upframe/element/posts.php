<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 05/09/15
 * Time: 10:00 AM
 */
if(class_exists("woocommerce")){
    if(!function_exists('s7upf_vc_posts')){
        function s7upf_vc_posts($attr, $content = false){
            $html = $css_class = '';
            $attr = shortcode_atts(array(
                'display'       => 'grid',
                'style'         => 'default',
                'title'         => '',
                'des'           => '',
                'number'        => '8',
                'cats'          => '',
                'order_by'      => 'date',
                'order'         => 'DESC',
                'column'        => '',
                'row_number'    => '1',
                'pagination'    => '',
                'grid_type'     => '',
                'item_style'    => '',
                'item'          => '',
                'item_res'      => '',
                'speed'         => '',
                'slider_navi'   => '',
                'slider_pagi'   => '',
                'size'          => '',
                'el_class'      => '',
                'custom_css'    => '',
                'excerpt'       => '',
                'custom_ids'    => '',
            ),$attr);
            extract($attr);
            $el_class .= ' blog-'.$display.'-view '.$grid_type.' '.$style;
            if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
            $paged = (get_query_var('paged') && $display != 'slider') ? get_query_var('paged') : 1;
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $number,
                'orderby'           => $order_by,
                'order'             => $order,
                'paged'             => $paged,
                );            
            if(!empty($cats)) {
                $custom_list = explode(",",$cats);
                $args['tax_query'][]=array(
                    'taxonomy'=>'category',
                    'field'=>'slug',
                    'terms'=> $custom_list
                );
            }
            if(!empty($custom_ids)){
                $args['post__in'] = explode(',', $custom_ids);
            }
            $post_query = new WP_Query($args);
            $count = 1;
            $count_query = $post_query->post_count;
            $max_page = $post_query->max_num_pages;
            if(!empty($size)) $size = explode('x', $size);
            $attr = array_merge($attr,array(
                'el_class'      => $el_class,
                'post_query'    => $post_query,
                'count'         => $count,
                'count_query'   => $count_query,
                'max_page'      => $max_page,
                'args'          => $args,
                'size'          => $size,
            ));
            $html = s7upf_get_template_element('posts/'.$display,$style,$attr);
            wp_reset_postdata();
            return $html;
        }
    }
stp_reg_shortcode('s7upf_posts','s7upf_vc_posts');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_post',10,100 );
if ( ! function_exists( 's7upf_add_list_post' ) ) {
    function s7upf_add_list_post(){
        vc_map( array(
            "name"      => esc_html__("Posts", 'hama'),
            "base"      => "s7upf_posts",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'hama'),
            "description"   => esc_html__( 'Display list of post', 'hama' ),
            "params"    => array(                
                array(
                    'type'        => 'textfield',
                    "admin_label"   => true,
                    'heading'     => esc_html__( 'Title', 'hama' ),
                    'param_name'  => 'title',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Description', 'hama' ),
                    'param_name'  => 'des',
                ),
                array(
                    'heading'     => esc_html__( 'Style', 'hama' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'hama' ),
                    'param_name'  => 'style',
                    'value'       => array(                        
                        esc_html__('Default','hama')     => 'default',
                        ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Display', 'hama' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'hama' ),
                    'param_name'  => 'display',
                    'value'       => array(                        
                        esc_html__('Grid','hama')      => 'grid',
                        esc_html__('Slider','hama')    => 'slider',
                        ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Number', 'hama' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 8.', 'hama' ),
                    'param_name'  => 'number',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Custom IDs', 'hama' ),
                    'param_name'  => 'custom_ids',
                    'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'hama' ),
                ),
                array(
                    'heading'     => esc_html__( 'Post Categories', 'hama' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_list_taxonomy('category'),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of post categories', 'hama' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order By', 'hama' ),
                    'value' => s7upf_get_order_list(),
                    'param_name' => 'orderby',
                    'description' => esc_html__( 'Select Orderby Type ', 'hama' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Order', 'hama' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'order',
                    'value' => array(                   
                        esc_html__('Desc','hama')  => 'DESC',
                        esc_html__('Asc','hama')  => 'ASC',
                    ),
                    'description' => esc_html__( 'Select Order Type ', 'hama' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Grid Sub string excerpt",'hama'),
                    "param_name"    => "excerpt",
                    'description'   => esc_html__( 'Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.', 'hama' ),
                ),
                array(
                    'heading'       => esc_html__( 'Post style', 'hama' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'hama' ),
                    'param_name'    => 'item_style',
                    'value'         => s7upf_get_post_style(),
                ),             
                array(
                    'heading'     => esc_html__( 'Grid style', 'hama' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'grid_type',
                    'value' => array(                   
                        esc_html__('Default','hama')  => '',
                        esc_html__('Masonry','hama')  => 'list-masonry',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'hama' ),
                    "group"         => esc_html__("Grid Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),  
                array(
                    'heading'     => esc_html__( 'Column', 'hama' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'column',
                    'value' => array(              
                        esc_html__('1 columns','hama')  => '1',     
                        esc_html__('2 columns','hama')  => '2',
                        esc_html__('3 columns','hama')  => '3',
                        esc_html__('4 columns','hama')  => '4',
                        esc_html__('5 columns','hama')  => '5',
                        esc_html__('6 columns','hama')  => '6',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'hama' ),
                    "group"         => esc_html__("Grid Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),                
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Pagination",'hama'),
                    "param_name"    => "pagination",
                    "value"         => array(
                        esc_html__("None",'hama')                => '',
                        esc_html__("Pagination",'hama')          => 'pagination',
                        esc_html__("Load more button",'hama')    => 'load-more',
                        ),
                    'group'         => esc_html__('Grid Settings','hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),              
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Size Thumbnail",'hama'),
                    "param_name"    => "size",
                    'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item",'hama'),
                    "param_name"    => "item",
                    "group"         => esc_html__("Slider Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item Responsive",'hama'),
                    "param_name"    => "item_res",
                    "group"         => esc_html__("Slider Settings",'hama'),
                    'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'hama' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Speed",'hama'),
                    "param_name"    => "speed",
                    "group"         => esc_html__("Slider Settings",'hama'), 
                    'description'   => esc_html__( 'Enter number speed to auto slider (ms). Example is 5000. Default auto is disable.', 'hama' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),                   
                ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Row / item slider",'hama'),
                    "param_name"    => "row_number",
                    'value' => array(                   
                        esc_html__('1 row','hama')  => '1',
                        esc_html__('2 rows','hama')  => '2',
                        esc_html__('3 rows','hama')  => '3',
                        esc_html__('4 rows','hama')  => '4',
                        esc_html__('5 rows','hama')  => '5',
                        esc_html__('6 rows','hama')  => '6',
                        esc_html__('7 rows','hama')  => '7',
                        esc_html__('8 rows','hama')  => '8',
                        esc_html__('9 rows','hama')  => '9',
                        esc_html__('10 rows','hama')  => '10',
                    ),
                    'description'   => esc_html__( 'Choose number row to display', 'hama' ),
                    "group"         => esc_html__("Slider Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),  
                ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'hama' ),
                'param_name'  => 'slider_navi',
                'value'       => array(
                    esc_html__( 'Hidden', 'hama' )                  => '',
                    esc_html__( 'Default Navigation', 'hama' )      => 'navi-nav-style',
                    esc_html__( 'Group Navigation', 'hama' )        => 'group-navi',
                ),
                "group"         => esc_html__("Slider Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ), 
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'hama' ),
                'param_name'  => 'slider_pagi',
                'value'       => array(
                    esc_html__( 'Hidden', 'hama' )                  => '',
                    esc_html__( 'Default Pagination', 'hama' )      => 'pagi-nav-style',
                ),
                "group"         => esc_html__("Slider Settings",'hama'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ), 
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
}