<?php
/**.
 * User: vjnh253
 * Date: 2018
 */
if(!function_exists('list_img'))
{
    function list_img($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'list'          => '',                    
            'el_class'      => '',
            'custom_css'    => '',
            'column'		=> '3',
            'content'       => $content,
        ),$attr);
        extract($attr);

        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'link'      => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            ));

        // Call function get template
        $html = s7upf_get_template_element('list-video/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_list_img','list_img');


vc_map( array(
    "name"          => esc_html__("List Video", 'hama'),
    "base"          => "sv_list_img",
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
                ),
            "description"   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
		array(
            'heading'     => esc_html__( 'Column', 'hama' ),
            'type'        => 'dropdown',
            'param_name'  => 'column',
            'value' => array(
                esc_html__('3 columns','hama')  => '3',
                esc_html__('4 columns','hama')  => '4',
            ),
            'description' => esc_html__( 'Select Column display ', 'hama' )
        ),                                   
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Thêm đường link video,Lưu ý đọc hướng dẫn ở dưới.",'hama'),
            "param_name"    => "list",
            "params"        => array(
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link",
                ),
            ),
            'description'   => esc_html__( 'Ví dụ, khi bạn lên xem một video trên Youtube có địa chỉ là https://www.youtube.com/watch?v=Lt-U_t2pUHI thì phần chữ Lt-U_t2pUHI chính là id', 'hama' ),
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