<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/12/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_mailchimp') && class_exists('MC4WP_MailChimp')){
    function s7upf_vc_mailchimp($attr){
        $html = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'image'         => '',
            'placeholder'   => '',
            'submit'        => '',
            'form_id'       => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);

        // Variable process
        $el_class .= ' '.$style;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $form_html = apply_filters('s7upf_mailchimp_form',do_shortcode('[mc4wp_form id="'.$form_id.'"]'));

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'form_html' => $form_html,
            ));

        // Call function get template
        $html = s7upf_get_template_element('mailchimp/mailchimp',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_mailchimp','s7upf_vc_mailchimp');

vc_map( array(
    "name"          => esc_html__("MailChimp", 'hama'),
    "base"          => "s7upf_mailchimp",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display mailchimp form', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')         => '',
                esc_html__("Popup",'hama')         => 'popup',
            ),
            "description"   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image",'hama'),
            "param_name"    => "image",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "popup",
            ),
            "description"   => esc_html__( 'Choose a image from media.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Form ID",'hama'),
            "param_name"    => "form_id",
            "description"   => esc_html__( 'Enter mailchimp form ID.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'hama'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title of element.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'hama'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description of element.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Placeholder Input",'hama'),
            "param_name"    => "placeholder",
            "description"   => esc_html__( 'Enter placeholder of input email. Default is value of mailchimp form.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Submit Label",'hama'),
            "param_name"    => "submit",
            "description"   => esc_html__( 'Enter label for submit button. Default is value of mailchimp form.', 'hama' )
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