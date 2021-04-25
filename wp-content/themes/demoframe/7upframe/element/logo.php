<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_logo')){
    function s7upf_vc_logo($attr, $content = false){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => 'img',
            'logo_img'      => '',
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,
        ),$attr);
        extract($attr);

        // Variable process
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class
            ));

        // Call function get template
        $html = s7upf_get_template_element('logo/logo',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_logo','s7upf_vc_logo');

vc_map( array(
    "name"          => esc_html__("Logo", 'hama'),
    "base"          => "s7upf_logo",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display logo on your site', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')     => 'img',
                esc_html__("Logo Text",'hama')   => 'text',
            ),
            "description"   => esc_html__( 'Choose logo style to display.', 'hama' )
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Logo image",'hama'),
            "param_name"    => "logo_img",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "img",
            ),
            "description"   => esc_html__( 'Choose a image to display as logo site.', 'hama' )
        ),
        array(
            "type"          => "textarea_html",
            "admin_label"   => true,
            "heading"       => esc_html__("Text",'hama'),
            "param_name"    => "content",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "text",
            ),
            "description"   => esc_html__( 'Enter content logo text to display.', 'hama' )
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