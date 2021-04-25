<?php
if(class_exists("woocommerce")){
    if(!function_exists('s7upf_vc_tabproduct')){
        function s7upf_vc_tabproduct($attr, $content = false){
            $html = $css_class = '';
            $attr = shortcode_atts(array(
                'display'       => 'grid',
                'style'         => 'default',
                'number'        => '8',
                'row_style7'    => '1',
                'row_number'    => '1',
                'gap'           => '',
                'item_style'    => '',
                'position_special1' => '1',
                'position_special2' => '3',
                'position_special3' => '2',
                'position_special4' => '4',
                'position_special5' => '1',
                'position_special6' => '3',
                'position_special7' => '2',
                'item'          => '',
                'item_res'      => '',
                'list'          => '',
                'speed'         => '',
                'slider_navi'   => '',
                'slider_pagi'   => '',
                'el_class'      => '',
                'custom_css'    => '',
            ),$attr);
            extract($attr);

            $data = (array) vc_param_group_parse_atts( $list );
            $default_val = array(
            'title'     => '',
            'display'       => '',
            'item_style'    => '',
            'animation'     => '',
            'size'          => '',
            'cats'          => '',
            'time'          => '',
            'product_type'  => '',
            'number'        => '8',
            'column'        => '',
            );

            $args = array(
                'post_type'         => 'product',
            );
            $number_rand = rand();
            $count = 1;
            $attr = array_merge($attr,array(
                'count'         => $count,
                'args'          => $args,
                'data'          => $data,
                'default_val'   => $default_val,
                'number_rand'   => $number_rand,
            ));
            $html = s7upf_get_template_element('tabproduct/'.$display,$style,$attr);
            wp_reset_postdata();
            return $html;
        }
    }
stp_reg_shortcode('s7upf_tabproduct','s7upf_vc_tabproduct');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_tabproduct',10,100 );
if ( ! function_exists( 's7upf_add_list_tabproduct' ) ) {
    function s7upf_add_list_tabproduct(){
        $tab_id = 's7upf_'.uniqid();
        vc_map( array(
            "name"      => esc_html__("Tab Products", 'hama'),
            "base"      => "s7upf_tabproduct",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'hama'),
            "description"   => esc_html__( 'Display list of product', 'hama' ),
            "params"    => array(  
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
                    "type"          => "param_group",
                    "heading"       => esc_html__("Add Tab Product",'hama'),
                    "param_name"    => "list",
                    "params"        => array(              
                        array(
                            'type'        => 'textfield',
                            "admin_label"   => true,
                            'heading'     => esc_html__( 'Title', 'hama' ),
                            'param_name'  => 'title',
                        ),
                        array(
                            'heading'     => esc_html__( 'Number', 'hama' ),
                            'type'        => 'textfield',
                            'description' => esc_html__( 'Enter number of product. Default is 8.', 'hama' ),
                            'param_name'  => 'number',
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
                            "type" => "textfield",
                            "heading" => esc_html__("Time CountDown",'hama'),
                            "param_name" => "time",
                            'description'   => esc_html__( 'Entert Time for countdown. Format is mm/dd/yyyy. Example: 12/15/2022.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "style",
                                "value"         => "deals",
                            ),
                        ),
                        array(
                            'heading'     => esc_html__( 'Product Type', 'hama' ),
                            'type'        => 'dropdown',
                            'param_name'  => 'product_type',
                            'value' => array(
                                esc_html__('Default','hama')            => '',
                                esc_html__('Trending','hama')          => 'trending',
                                esc_html__('Featured Products','hama')  => 'featured',
                                esc_html__('Best Sellers','hama')       => 'bestsell',
                                esc_html__('On Sale','hama')            => 'onsale',
                                esc_html__('Top rate','hama')           => 'toprate',
                                esc_html__('Most view','hama')          => 'mostview',
                            ),
                            'description' => esc_html__( 'Select Product View Type', 'hama' ),
                        ),
                        array(
                            'heading'     => esc_html__( 'Product Categories', 'hama' ),
                            'type'        => 'autocomplete',
                            'param_name'  => 'cats',
                            'settings' => array(
                                'multiple' => true,
                                'sortable' => true,
                                'values' => s7upf_get_list_taxonomy(),
                            ),
                            'save_always' => true,
                            'description' => esc_html__( 'List of product categories', 'hama' ),
                        ),
                        array(
                            'heading'       => esc_html__( 'Product style', 'hama' ),
                            'type'          => 'dropdown',
                            "admin_label"   => true,
                            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
                            'param_name'    => 'item_style',
                            'value'         => array(
                                esc_html__('Default','hama')      => '',
                                esc_html__('Product grid 2','hama')      => 'style2',
                                esc_html__('Product grid 3','hama')      => 'style3',
                                esc_html__('Product grid 4','hama')      => 'style4',
                                esc_html__('Product grid 5','hama')      => 'style5',   
                                esc_html__('Product grid 6','hama')      => 'style6',   
                                esc_html__('Product grid 8','hama')      => 'style8',    
                                esc_html__('Product grid 9','hama')      => 'style9', 
                                esc_html__('Product deals','hama')       => 'style10',
                                esc_html__('Product grid 11','hama')      => 'style11',  
                            ),
                        ),
                        array(
                            'heading'     => esc_html__( 'Row of Product show deals ', 'hama' ),
                            'type'        => 'dropdown',
                            'param_name'  => 'row_style7',
                            'value' => array(                   
                                esc_html__('1 Row','hama')  => '1',
                                esc_html__('2 Row','hama')  => '2',
                                esc_html__('3 Row','hama')  => '3',
                            ),
                            'description' => esc_html__( 'Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 1",'hama'),
                            "param_name" => "position_special1",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 2",'hama'),
                            "param_name" => "position_special2",
                            'description'   => esc_html__( 'Inpu is at numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 3",'hama'),
                            "param_name" => "position_special3",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 4",'hama'),
                            "param_name" => "position_special4",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 5",'hama'),
                            "param_name" => "position_special5",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 6",'hama'),
                            "param_name" => "position_special6",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => esc_html__("Position product special 7",'hama'),
                            "param_name" => "position_special7",
                            'description'   => esc_html__( 'Input is a numbers 1 -> 4 or leave blank, Example is 1.Only used for slider type products.', 'hama' ),
                            "dependency"    =>  array(
                                "element"       => "item_style",
                                "value"         => "style7",
                            ),
                            'edit_field_class'=>'vc_col-sm-3 vc_column',
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
                                esc_html__('7 columns','hama')  => '7',
                                esc_html__('8 columns','hama')  => '8',
                                esc_html__('9 columns','hama')  => '9',
                                esc_html__('10 columns','hama')  => '10',
                            ),
                            'description' => esc_html__( 'Select Column display,Only used for grid type products. ', 'hama' ),
                            "group"         => esc_html__("Grid Settings",'hama'),
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
                            'heading'       => esc_html__( 'Thumbnail animation', 'hama' ),
                            'type'          => 'dropdown',
                            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
                            'param_name'    => 'animation',
                            'value'         => s7upf_get_product_thumb_animation(),
                        ),
                    ),
                    'description'   => esc_html__( 'Add more image with link', 'hama' ),
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