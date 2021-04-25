<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_mini_cart'))
{
    function s7upf_vc_mini_cart($attr)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => 'mini-cart1',
            'type'          => 'dropdown-box',
            'icon'          => 'fa-shopping-cart',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$style.' '.$type.' '.$css_class; 
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));

        if(!is_admin()){
            $html = s7upf_get_template_element('mini-cart/mini-cart',$style,$attr);
        }
        return apply_filters('s7upf_tempalte_mini_cart',$html);
    }
}

stp_reg_shortcode('sv_mini_cart','s7upf_vc_mini_cart');

vc_map( array(
    "name"          => esc_html__("Mini Cart", 'hama'),
    "base"          => "sv_mini_cart",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display mini cart', 'hama' ),
    "params"    => array(
        array(
            'heading'       => esc_html__( 'Style', 'hama' ),
            "admin_label"   => true,
            'type'          => 'dropdown',
            'param_name'    => 'style',
            'value'         => array(
                esc_html__('Default','hama') => 'mini-cart1',
                esc_html__('Mini cart style 2','hama') => 'style2',
                esc_html__('Mini cart style 3','hama') => 'style3',
                esc_html__('Mini cart style 4','hama') => 'style4',
                ),
            'description'   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
        array(
            'heading'       => esc_html__( 'Type', 'hama' ),
            "admin_label"   => true,
            'type'          => 'dropdown',
            'param_name'    => 'type',
            'value'         => array(
                esc_html__('Default','hama') => 'dropdown-box',
                esc_html__('Side box','hama') => 'aside-box',
                ),
            'description'   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Cart ion', 'hama' ),
            'param_name'    => 'icon',
            'value'         => '',
            'settings' => array(
                'emptyIcon' => false,
                'iconsPerPage' => 100,
                ),
            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
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