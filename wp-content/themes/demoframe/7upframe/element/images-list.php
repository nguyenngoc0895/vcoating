<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_payment'))
{
    function s7upf_vc_payment($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => 'brand-slider',
            'title'         => '',
            'des'           => '',
            'list'          => '',
            'itemres'       => '',
            'speed'         => '',
            'size'          => '',
            'display'       => '', 
            'item'          => '',
            'item_res'      => '',
            'speed'         => '',                      
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,
        ),$attr);
        extract($attr);

        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image'     => '',
            'title'     => '',
            'des'       => '',
            'link'      => '',
            'pos'       => '',
            'animation' => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            'size'          => $size,
            ));

        // Call function get template
        $html = s7upf_get_template_element('images-list/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_payment','s7upf_vc_payment');


vc_map( array(
    "name"          => esc_html__("Images list", 'hama'),
    "base"          => "sv_payment",
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
                esc_html__("Default-home-top",'hama')    => 'brand-slider',
                esc_html__("Home - brand bottom",'hama')    => 'style2',
                esc_html__("Home - testimonial",'hama')    => 'style3',
                ),
            "description"   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
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
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'hama'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
        ),
        array(
            'heading'     => esc_html__( 'Display', 'hama' ),
            "admin_label"   => true,
            'type'        => 'dropdown',
            'description' => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'  => 'display',
            'value'       => array(                        
                esc_html__('Grid','hama')      => 'grid',
                esc_html__('Slider','hama')    => 'slider',
                )

        ), 
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Item",'hama'),
            "param_name"    => "item",
            "group"         => esc_html__("Slider Settings",'hama'),
            "dependency"    =>  array(
                "element"       => "display",
                "value"         => "slider",
            ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Item Responsive",'hama'),
            "param_name"    => "item_res",
            "group"         => esc_html__("Slider Settings",'hama'),
            'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'hama' ),
            "dependency"    =>  array(
                "element"       => "display",
                "value"         => "slider",
            ),
        ),       
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Speed",'hama'),
            "param_name"    => "speed",
            "group"         => esc_html__("Slider Settings",'hama'), 
            'description'   => esc_html__( 'Enter number speed to auto slider (ms). Example is 5000. Default auto is disable.', 'hama' ),
            "dependency"    =>  array(
                "element"       => "display",
                "value"         => "slider",
            ),                   
        ),
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Add Image List",'hama'),
            "param_name"    => "list",
            "params"        => array(
                array(
                    "type"          => "attach_image",
                    "heading"       => esc_html__("Image",'hama'),
                    "param_name"    => "image",
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Title",'hama'),
                    "param_name"    => "title",
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Description",'hama'),
                    "param_name"    => "des",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Position",'hama'),
                    "param_name"    => "pos",
                    'description'   => esc_html__( 'Only testimonial item', 'hama' ),
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link",
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Animation",'hama'),
                    "param_name"    => "animation",
                    "value"         => array(
                        esc_html__("Default",'hama')                    => '',
                        esc_html__("Zoom",'hama')                       => 'zoom-image',
                        esc_html__("Zoom out",'hama')                   => 'zoom-out',
                        esc_html__("Zoom out Overlay",'hama')           => 'zoom-out overlay-image',
                        esc_html__("Fade out-in",'hama')                => 'fade-out-in',
                        esc_html__("Zoom Fade out-in",'hama')           => 'zoom-image fade-out-in',
                        esc_html__("Fade in-out",'hama')                => 'fade-in-out',
                        esc_html__("Zoom rotate",'hama')                => 'zoom-rotate',
                        esc_html__("Zoom rotate Fade out-in",'hama')    => 'zoom-rotate fade-out-in',
                        esc_html__("Overlay",'hama')                    => 'overlay-image',
                        esc_html__("Overlay Zoom",'hama')               => 'overlay-image zoom-image',
                        esc_html__("Zoom image line",'hama')            => 'zoom-image line-scale',
                        esc_html__("Gray image",'hama')                 => 'gray-image',
                        esc_html__("Gray image line",'hama')            => 'gray-image line-scale',
                        esc_html__("Pull curtain",'hama')               => 'pull-curtain',
                        esc_html__("Pull curtain gray image",'hama')    => 'pull-curtain gray-image',
                        esc_html__("Pull curtain zoom image",'hama')    => 'pull-curtain zoom-image',
                    ),
                    "description"   => esc_html__( 'Select type of animation for image.Only use with Style 3 and there are link.', 'hama' )
                ),
            ),
            'description'   => esc_html__( 'Add more image with link', 'hama' ),
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