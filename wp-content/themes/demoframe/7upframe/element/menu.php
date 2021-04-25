<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_menu')){
    function s7upf_vc_menu($attr,$content = false){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => 'main-nav1',
            'menu'          => '',
            'menu_sticky'   => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);

        // Variable process
        $el_class .= ' '.$style.' '.$menu_sticky;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $menu_data = array(
                        'container'     => false,
                        'menu_class'    => 'list-none',
                        'walker'        => new S7upf_Walker_Nav_Menu(),
                    );
        if(!empty($menu)) $menu_data['menu'] = $menu;
        else $menu_data['theme_location'] = 'primary';

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            'menu_data' => $menu_data,
            ));

        // Call function get template
        $html = s7upf_get_template_element('menu/menu',$style,$attr);
        return $html;
    }
}

stp_reg_shortcode('s7upf_menu','s7upf_vc_menu');

vc_map( array(
    "name"          => esc_html__("Menu", 'hama'),
    "base"          => "s7upf_menu",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display menu navigation', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')   => 'main-nav1',
                esc_html__("Menu 2",'hama')   => 'main-nav2',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'hama' )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Menu Sticky",'hama'),
            "param_name"    => "menu_sticky",
            "value"         => array(
                esc_html__("Off",'hama')   => '',
                esc_html__("On",'hama')   => 'menu-sticky-on',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'hama' )
        ),
        array(
            'type'          => 'dropdown',
            "admin_label"   => true,
            'heading'       => esc_html__( 'Menu name', 'hama' ),
            'param_name'    => 'menu',
            'value'         => s7upf_list_menu_name(),
            'description'   => esc_html__( 'Select Menu name to display.', 'hama' )
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