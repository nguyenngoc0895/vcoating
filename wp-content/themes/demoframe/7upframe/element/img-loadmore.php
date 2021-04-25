<?php
/**
 * Created by Sublime text 2.
 * User: vjnh253
 */
if(!function_exists('s7upf_vc_payment_v'))
{
    function s7upf_vc_payment_v($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'list'          =>  '',
            'el_class'      =>  '',
            'custom_css'      =>  '',
        ),$attr);
        extract($attr);

        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image'     => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            ));

        // Call function get template
        $html = s7upf_get_template_element('images-loadmore/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_payment_v','s7upf_vc_payment_v');


vc_map( array(
    "name"          => esc_html__("Load more ảnh", 'hama'),
    "base"          => "sv_payment_v",
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
                esc_html__("Loadmore",'hama')    => '',
                esc_html__("Không có loadmore",'hama')    => 'style2',
                ),
            "description"   => esc_html__( 'Chọn kiểu hiển thị.', 'hama' )
        ),    
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Add Image List",'hama'),
            "param_name"    => "list",
            "params"        => array(
                array(
                    "type"          => "attach_image",
                    "heading"       => esc_html__("Image",'hama'),
                    "admin_label"   => true,
                    "param_name"    => "image",
                ),                
            ),
            'description'   => esc_html__( 'Add more image', 'hama' ),
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