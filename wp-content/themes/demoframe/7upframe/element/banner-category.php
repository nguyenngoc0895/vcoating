<?php
if(!function_exists('s7upf_vc_banner_category'))
{
    function s7upf_vc_banner_category($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => 'border-top5',
            'title'         => '',
            'des'           => '',
            'list'          => '',   
            'size'          => '',          
            'el_class'      => '',
            'column'        => '',
            'custom_css'    => '',
            'content'       => $content,
        ),$attr);
        extract($attr);

        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image'     => '',
            'cats'     => '',
        );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            'size'          => $size,
        ));

        // Call function get template
        $html = s7upf_get_template_element('category-list/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_banner_category','s7upf_vc_banner_category');

$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_category',10,100 );
if ( ! function_exists( 's7upf_add_list_category' ) ) {
    function s7upf_add_list_category(){
        vc_map( array(
            "name"          => esc_html__("Category list", 'hama'),
            "base"          => "sv_banner_category",
            "icon"          => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'hama'),
            "description"   => esc_html__( 'Display list images ', 'hama' ),
            "params"        => array(
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Style",'hama'),
                    "param_name"    => "style",
                    "value"         => array(
                        esc_html__("Default",'hama')    => '',
                        esc_html__("Style 2",'hama')    => 'style2',
                        esc_html__("Style 3 Show All Category",'hama')    => 'style3',
                    ),
                    "description"   => esc_html__( 'Choose a style to display.', 'hama' )
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Title",'hama'),
                    "param_name"    => "title",
                    "description"   => esc_html__( 'Enter title of element.', 'hama' )
                ),
                array(
                    "admin_label"   => true,
                    "type"          => "textfield",
                    "heading"       => esc_html__("Description",'hama'),
                    "param_name"    => "des",
                    "description"   => esc_html__( 'Enter description of element.', 'hama' )
                ),   
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Image custom size",'hama'),
                    "param_name"    => "size",
                    'description'   => esc_html__( 'Not used with  style: Style 3 Show All Category.Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
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
                    'description' => esc_html__( 'Select Column display.Not used with style: Style 3 Show All Category.', 'hama' ),
                ),                      
                array(
                    "type"          => "param_group",
                    "heading"       => esc_html__("Add Category List",'hama'),
                    "param_name"    => "list",
                    "params"        => array(
                        array(
                            'heading'     => esc_html__( 'Categories', 'hama' ),
                            'type'        => 'autocomplete',
                            "admin_label"   => true,
                            'param_name'  => 'cats',
                            'settings' => array(
                                'multiple' => false,
                                'sortable' => false,
                                'values' => s7upf_get_list_taxonomy(),
                            ),
                            'save_always' => true,
                            'description' => esc_html__( 'List categories', 'hama' ),
                        ),
                        array(
                            "type"          => "attach_image",
                            "heading"       => esc_html__("Image",'hama'),
                            "param_name"    => "image",
                        ),
                    ),
                    'description'   => esc_html__( 'Add more image with link,Not used with  style: Style 3 Show All Category.', 'hama' ),
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
