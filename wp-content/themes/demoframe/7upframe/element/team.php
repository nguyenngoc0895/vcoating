<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_team')){
    function s7upf_vc_team($attr, $content = false){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'link'          => '',
            'social'        => '',
            'image'         => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);

        // Variable process
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $data = (array) vc_param_group_parse_atts( $social );
        $default_val = array(
            'icon'      => '',
            'link'      => '',
            );
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            ));

        // Call function get template
        $html = s7upf_get_template_element('team/team',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_team','s7upf_vc_team');

vc_map( array(
    "name"          => esc_html__("Team", 'hama'),
    "base"          => "s7upf_team",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display one person info', 'hama' ),
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
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Image",'hama'),
            "param_name"    => "image",
            "description"   => esc_html__( 'Choose a image to display as logo site.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'hama'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter content logo text to display.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link",'hama'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Enter url to view detail.', 'hama' )
        ),
        array(
            "type"          => "textarea",
            "admin_label"   => true,
            "heading"       => esc_html__("Description",'hama'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter content logo text to display.', 'hama' )
        ),
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Social List",'hama'),
            "param_name"    => "social",
            "params"        => array(
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Icon', 'hama' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'iconsPerPage'  => 4000,
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'hama' ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link",
                    "description"   => esc_html__( 'Enter URL redirect when click to icon.', 'hama' )
                ),
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