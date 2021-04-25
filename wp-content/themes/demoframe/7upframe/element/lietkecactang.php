<?php
/**
 * Created by Sublime text 2.
 * User: vinh253
 * Date: 2018
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_listtang'))
{
    function s7upf_vc_listtang($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => 'list-tang',
            'title'         => '',
            'des'           => '',
            'list'          => '',
            'size'          => '',                     
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,
        ),$attr);
        extract($attr);

        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image1'     => '',
            'image2'     => '',
            'image3'     => '',
            'tang'     	 => '',
            'noidung'    => '',
            'noidung2'    => '',
            'contentgd'    => '',
            'contentgd2'    => '',
            'contentgd3'    => '',
            'link_v'       => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            'size'          => $size,
            ));

        // Call function get template
        $html = s7upf_get_template_element('list-tang/tang',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_listtang','s7upf_vc_listtang');


vc_map( array(
    "name"          => esc_html__("Danh sách các giai đoạn", 'hama'),
    "base"          => "sv_listtang",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display list images ', 'hama' ),
    "params"        => array(
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
            "type"          => "param_group",
            "heading"       => esc_html__("Các giai đoạn",'hama'),
            "param_name"    => "list",
            "params"        => array(
            	array(
		            "type"          => "textfield",
		            "admin_label"   => true,
		            "heading"       => esc_html__("Title",'hama'),
		            "param_name"    => "tang",
		            "description"   => esc_html__( 'Enter title of element.', 'hama' )
		        ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Giai đoạn",'hama'),
                    "param_name"    => "noidung",
                    "description"   => esc_html__( 'Enter title of element.', 'hama' )
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Mô tả chi tiết giai đoạn",'hama'),
                    "param_name"    => "noidung2",
                    "description"   => esc_html__( 'Enter title of element.', 'hama' )
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "heading"       => esc_html__("Chi tiết",'hama'),
                    "param_name"    => "contentgd",
                    "description"   => esc_html__( 'Enter info content of element.', 'hama' )
                ),		
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "heading"       => esc_html__("Chi tiết 2 ",'hama'),
                    "param_name"    => "contentgd2",
                    "description"   => esc_html__( 'Enter info content of element.', 'hama' )
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "heading"       => esc_html__("Chi tiết 3",'hama'),
                    "param_name"    => "contentgd3",
                    "description"   => esc_html__( 'Enter info content of element.', 'hama' )
                ),        
                array(
                    "type"          => "attach_image",
                    "heading"       => esc_html__("Image 1",'hama'),
                    "param_name"    => "image1",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link_v",
                    "description"   => esc_html__( 'link', 'hama' )
                ),  
            ),
            'description'   => esc_html__( 'Thêm thông tin vào giai đoạn', 'hama' ),
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