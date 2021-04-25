<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_breadcrumb')){
    function s7upf_vc_breadcrumb($attr, $content = false){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);

        // Variable process
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' breadcrumb-element';
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'breadcrumb'    => 'on'
            ));

        // Call function get template
        $html = s7upf_get_template('breadcrumb',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_breadcrumb','s7upf_vc_breadcrumb');

vc_map( array(
    "name"          => esc_html__("Breadcrumb", 'hama'),
    "base"          => "s7upf_breadcrumb",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display breadcrumb on your site', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')     => '',
            ),
            "description"   => esc_html__( 'Choose style to display.', 'hama' )
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