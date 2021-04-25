<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_advertisement'))
{
    function s7upf_vc_advertisement($attr,$content = false)
    {
        $html = $css_class = $css_class2 = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'image'         => '',
            'image2'        => '',
            'link'          => '',
            'image_size'    => '',
            'link_video'    => '',
            'animation'     => '',
            'el_class'      => '',
            'el_class2'     => '',
            'custom_css'    => '',
            'custom_css2'   => '',
            'text_alignment'=> '1',
            'size'          => '',
            'content'       => $content,
        ),$attr);
        extract($attr);
        $el_class .= ' '.$style.' '.$animation;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        if(!empty($custom_css2)) $el_class2 .= ' '.vc_shortcode_custom_css_class( $custom_css2 );
        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'el_class2' => $el_class2,
            'size'      => $size,
        ));

        $html = s7upf_get_template_element('advertisement/advertisement',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_advertisement','s7upf_vc_advertisement');

vc_map( array(
    "name"          => esc_html__("Advertisement", 'hama'),
    "base"          => "s7upf_advertisement",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display a advertisement', 'hama' ),
    "params"        => array(        
        array(
            "type"          => "textarea_html",
            "holder"        => "div",
            "heading"       => esc_html__("Content Info",'hama'),
            "param_name"    => "content",
            "description"   => esc_html__( 'Enter info content of element.', 'hama' )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')   => '',
                esc_html__("About",'hama')   => 'about',
                esc_html__("Banner Style2",'hama')   => 'banner-style2',
                esc_html__("Banner Style3",'hama')   => 'banner-style3',
                esc_html__("Banner Style4",'hama')   => 'banner-style4',
                esc_html__("Banner Style5",'hama')   => 'banner-style5',
                esc_html__("Banner Style6",'hama')   => 'banner-style6',
                esc_html__("Banner Style7",'hama')   => 'banner-style7',
                esc_html__("Banner Style8",'hama')   => 'banner-style8',
                esc_html__("Banner Video",'hama')    => 'video',
                esc_html__("Banner image separates text",'hama')    => 'title',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'hama' )
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Text Alignment",'hama'),
            "param_name"    => "text_alignment",
            "value"         => array(
                esc_html__("Bottom",'hama')   => '1',
                esc_html__("Top",'hama')   => '2',
            ),
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("title"),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Size', 'hama'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => array('video')
            ),
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'hama'),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link video",'hama'),
            "param_name"    => "link_video",
            "description"   => esc_html__( 'Enter Link/URL Youtube.', 'hama' ),
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("video"),
            ),
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Image",'hama'),
            "param_name"    => "image",
            "description"   => esc_html__( 'Select image from media library.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link",'hama'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Enter URL redirect when click to image.', 'hama' )
        ),
        array(
            "type"          => "dropdown",
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
            "description"   => esc_html__( 'Select type of animation for image.', 'hama' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image fade",'hama'),
            "param_name"    => "image2",
            "dependency"    => array(
                "element"       => "animation",
                "value"     => array("zoom-out","zoom-out overlay-image"),
            ),
            "description"   => esc_html__( 'Select image from media library.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'hama'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
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
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'hama'),
            "param_name"    => "el_class2",
            'group'         => esc_html__('Design Info Box','hama'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'hama' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'hama'),
            "param_name"    => "custom_css2",
            'group'         => esc_html__('Design Info Box','hama')
        ),
    )
));