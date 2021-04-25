<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_instagram_box')){
    function s7upf_vc_instagram_box($attr){
        $html = '';
        $attr = shortcode_atts(array(
            'style'         => 'default',
            'source'        => '',
            'title'         => '',
            'des'           => '',
            'user'          => '',
            'photos'        => '6',
            'token'         => '',
            'list'          => '',
            'size'          => '',
            'size_index'    => '0',
            'itemres'       => '',
            'speed'         => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);

        // Variable process
        $el_class .= ' '.$style;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $data = array();
        if($source == 'media'){
            $default_val = array(
                'icon'      => '',
                'link'      => '',
            );
            $data_media = (array) vc_param_group_parse_atts( $list );
            if(is_array($data_media)){
                foreach ($data_media as $key => $value){
                    $value = array_merge($default_val,$value);
                    $data[] = array(
                        'image_url' => wp_get_attachment_url($value['image'],$size),
                        'link'      => $value['link'],
                    );
                }
            }            
        }
        else{
            if(!empty($user) && function_exists('s7upf_scrape_instagram')){
                $media_array = s7upf_scrape_instagram($user, $photos, $token, $size_index);
                if(is_array($media_array)) if(isset($media_array['photos'])) $media_array = $media_array['photos'];
                if(!empty($media_array)){
                    foreach ($media_array as $item) {
                        if(isset($item['link']) && isset($item['thumbnail_src'])){
                            $data[] = array(
                                'image_url' => $item['thumbnail_src'],
                                'link'      => $item['link'],
                            );
                        }
                    }              
                }
            }
        }
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            'data' => $data,
            ));

        // Call function get template
        $html = s7upf_get_template_element('instagram/instagram',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('sv_instagram_box','s7upf_vc_instagram_box');

vc_map( array(
    "name"          => esc_html__("Instagram", 'hama'),
    "base"          => "sv_instagram_box",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display images from instagram', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'hama')     => 'default',
                esc_html__("Slider",'hama')      => 'slider',
                )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Source",'hama'),
            "param_name"    => "source",
            "value"         => array(
                esc_html__("User name",'hama')           => 'username',
                esc_html__("From your media",'hama')     => 'media',
                )
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
            "heading"       => esc_html__("User",'hama'),
            "param_name"    => "user",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__( 'Enter user name of Instagram.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Number",'hama'),
            "param_name"    => "photos",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__( 'Enter number of photos to display. Default is 6.', 'hama' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Token",'hama'),
            "param_name"    => "token",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__("Enter token to view more 12 of photos. Create token your account at: https://outofthesandbox.com/pages/instagram-access-token",'hama'),
        ),
        
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Image custom size",'hama'),
            "param_name"    => "size_index",
            "value"         => array(
                esc_html__("Small",'hama')          => '0',
                esc_html__("Medium",'hama')         => '1',
                esc_html__("Large",'hama')          => '2',
                ),
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            'description'   => esc_html__( 'Choose instagram image size to display', 'hama' ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'hama'),
            "param_name"    => "size",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('media'),
            ),
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300. Default is full', 'hama' ),
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
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link",
                ),
            ),
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('media'),
            ),
            'description'   => esc_html__( 'Add more image with link', 'hama' ),
        ),
        array(
            'heading'       => esc_html__( 'Custom Item', 'hama' ),
            'type'          => 'textfield',
            'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'hama' ),
            'param_name'    => 'itemres',
            'group'         => esc_html__("Slider Settings",'hama'),
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('slider'),
            )
        ),        
        array(
            'heading'       => esc_html__( 'Speed', 'hama' ),
            'type'          => 'textfield',
            'group'         => esc_html__("Slider Settings",'hama'),
            'description'   => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'hama' ),
            'param_name'    => 'speed',
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('slider'),
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