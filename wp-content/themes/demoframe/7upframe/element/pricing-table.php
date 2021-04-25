<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_pricing_table')){
    function s7upf_vc_pricing_table($attr, $content = false){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'price'         => '',
            'unit'          => '$',
            'duration'      => '',
            'color'         => '',
            'link'          => '',
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,
        ),$attr);
        extract($attr);

        // Variable process
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $el_class .= $style;

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));

        // Call function get template
        $html = s7upf_get_template_element('pricing-table/table',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_pricing_table','s7upf_vc_pricing_table');

vc_map( array(
    "name"          => esc_html__("Pricing table", 'hama'),
    "base"          => "s7upf_pricing_table",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display pricing table', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')     => '',
                esc_html__("Color",'hama')     => 'pricing-color',
            ),
            "description"   => esc_html__( 'Choose style to display.', 'hama' )
        ),
        array(
            "type"          => "colorpicker",
            "heading"       => esc_html__("Color",'hama'),
            "param_name"    => "color",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "pricing-color",
            ),
            "description"   => esc_html__( 'Choose color.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'hama'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'hama'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Price",'hama'),
            "param_name"    => "price",
            "description"   => esc_html__( 'Enter price.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Unit",'hama'),
            "param_name"    => "unit",
            "description"   => esc_html__( 'Enter unit of price. Default is $.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Duration",'hama'),
            "param_name"    => "duration",
            "description"   => esc_html__( 'Enter duration of pricing table.', 'hama' )
        ),
        array(
            "type"          => "vc_link",
            "heading"       => esc_html__("Link",'hama'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Link view detail.', 'hama' )
        ),
        array(
            "type"          => "textarea_html",
            "admin_label"   => true,
            "heading"       => esc_html__("Content",'hama'),
            "param_name"    => "content",
            "description"   => esc_html__( 'Enter content to display.', 'hama' )
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