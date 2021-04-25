<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_service'))
{
    function s7upf_vc_service($attr, $content = false)
    {
        $html = $icon_html = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'list'          => '',
            'itemres'       => '',
            'speed'         => '',
            'size'          => '',
            'column'        => '1',
            'display'       => '', 
            'item'          => '',
            'item_res'      => '',
            'speed'         => '',                      
            'el_class'      => '',
            'custom_css'    => '',
            'icon3'         => '',
            'title3'        => '',
            'des3'          => '',
            'link3'         => '',
            'display_map'   => '',
            'style_map'     => 'default',
            'market'        => '',
            'zoom'          => '16',
            'location'      => '',
            'control'       => 'yes',
            'scrollwheel'   => 'yes',
            'disable_ui'    => 'no',
            'draggable'     => 'yes',
            'width'         => '100%',
            'height'        => '500px',
            'content'       => $content,
        ),$attr);
        extract($attr);

        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'title'         => '',
            'des'           => '',
            'link'          => '',
            'icon'          => '',
            'pos'           => '',
            'image_bot'     => '',
            'list_bot'      => '', 
            'display_list'  => '',
            'display_img'   => '',
            );
        $default_bot = array(
            'icon_bot'     => '',
            'text_bot'     => '',
            'des_bot'      => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'data'          => $data,
            'default_val'   => $default_val,
            'size'          => $size,
            'default_bot'   => $default_bot,
            ));

        // Call function get template
        $html = s7upf_get_template_element('service-list/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_service','s7upf_vc_service');


vc_map( array(
    "name"          => esc_html__("Service list", 'hama'),
    "base"          => "sv_service",
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
                esc_html__("Default",'hama')    => 'service',
                esc_html__("Style 2",'hama')    => 'style2',
                esc_html__("Map",'hama')        => 'style3',
                ),
            "description"   => esc_html__( 'Choose a style to display.', 'hama' )
        ),
        array(
            'heading'     => esc_html__( 'Column', 'hama' ),
            'type'        => 'dropdown',
            'param_name'  => 'column',
            'value' => array(
                esc_html__('1 columns','hama')  => '1',                   
                esc_html__('2 columns','hama')  => '2',
                esc_html__('3 columns','hama')  => '3',
                esc_html__('4 columns','hama')  => '4',
                esc_html__('5 columns','hama')  => '5',
                esc_html__('6 columns','hama')  => '6',
            ),
            'description' => esc_html__( 'Select Column display ', 'hama' ),
            "group"         => esc_html__("Grid Settings",'hama'),
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
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => array("style2","service"),    
            ), 
            "param_name"    => "list",
            "params"        => array(
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Add icon', 'hama' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'iconsPerPage'  => 4000,
                    ),
                    "dependency"    => array(
                        "element"       => "style",
                        "value"     => array("service",'adver2'),
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'hama' ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Title",'hama'),
                    "param_name"    => "title",
                ),
                array(
                    "type"          => "textfield",
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
                    "heading"       => esc_html__("Link",'hama'),
                    "param_name"    => "link",
                ),
                array(
                    'heading'     => esc_html__( 'Show List Text', 'hama' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Display List', 'hama' ),
                    'param_name'  => 'display_list',
                    'value'       => array(                        
                        esc_html__('No','hama')      => 'no',
                        esc_html__('Yes','hama')      => 'yes',
                    )
                ), 
                array(
                    "type"          => "param_group",
                    "heading"       => esc_html__("Add Bottom",'hama'),
                    "param_name"    => "list_bot",
                    "dependency"    =>  array(
                        "element"       => "display_list",
                        "value"         => "yes",
                    ), 
                    "params"        => array(
                        array(
                            'type'          => 'iconpicker',
                            'heading'       => esc_html__( 'Add icon', 'hama' ),
                            'param_name'    => 'icon_bot',
                            'value'         => '',
                            'settings'      => array(
                                'emptyIcon'     => true,
                                'iconsPerPage'  => 4000,
                            ),
                            "dependency"    => array(
                                "element"       => "style",
                                "value"     => array("service",'adver2'),
                            ),
                            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
                        ),
                        array(
                            "type"          => "textfield",
                            "heading"       => esc_html__("Text bottom",'hama'),
                            "param_name"    => "text_bot",
                        ),
                        array(
                            "type"          => "textfield",
                            "heading"       => esc_html__("Description bottom",'hama'),
                            "param_name"    => "des_bot",
                        ),
                    ),
                ),
                array(
                    'heading'     => esc_html__( 'Show image', 'hama' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Display Image', 'hama' ),
                    'param_name'  => 'display_img',
                    'value'       => array(                        
                        esc_html__('No','hama')      => 'no',
                        esc_html__('Yes','hama')      => 'yes',
                    )
                ), 
                array(
                    "type"          => "attach_image",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Image Bottom",'hama'),
                    "param_name"    => "image_bot",
                    "description"   => esc_html__( 'Select image from media library.', 'hama' ),
                    "dependency"    =>  array(
                        "element"       => "display_img",
                        "value"         => "yes",
                    ),  
                ),
                
            ),
            'description'   => esc_html__( 'Add more image with link', 'hama' ),
        ), 
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Add icon list top', 'hama' ),
            'param_name'    => 'icon3',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("style3"),
            ),
            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Title list top",'hama'),
            "param_name"    => "title3",
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("style3"),
            ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description list top",'hama'),
            "param_name"    => "des3",
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("style3"),
            ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link list top",'hama'),
            "param_name"    => "link3",
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("style3"),
            ),
        ), 
        array(
            'heading'     => esc_html__( 'Show map', 'hama' ),
            "admin_label"   => true,
            'type'        => 'dropdown',
            'description' => esc_html__( 'Display google map', 'hama' ),
            'param_name'  => 'display_map',
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "style3",
            ),  
            'value'       => array(                        
                esc_html__('No','hama')      => 'no',
                esc_html__('Yes','hama')      => 'yes',
            )
        ), 
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Map Style",'hama'),
            "param_name"    => "style_map",
            'value' => array(
                esc_html__('Default','hama') => 'default',
                esc_html__('Grayscale','hama') => 'grayscale',
                esc_html__('Blue','hama') => 'blue',
                esc_html__('Dark','hama') => 'dark',
                esc_html__('Pink','hama') => 'pink',
                esc_html__('Light','hama') => 'light',
                esc_html__('Blueessence','hama') => 'blueessence',
                esc_html__('Bentley','hama') => 'bentley',
                esc_html__('Retro','hama') => 'retro',
                esc_html__('Cobalt','hama') => 'cobalt',
                esc_html__('Brownie','hama') => 'brownie'
            ),
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ),   
        ),
        array(
            "type"          => "add_location_map",
            "heading"       => esc_html__( "Add Map Location", 'hama' ),
            "param_name"    => "location",
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
            "description"   => esc_html__( "Click Add more button to add location.", 'hama' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__( "Map Zoom", 'hama' ),
            "param_name"    => "zoom",
            "description"   => esc_html__( "Enter zoom for map. Default is 16", 'hama' ),
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
        ),
        array(
            'type'          => 'attach_image',
            "admin_label"   => true,
            'heading'       => esc_html__( 'Marker Image', 'hama' ),
            'param_name'    => 'market',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
            "description"   => esc_html__( 'Select image from media library.', 'hama' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Map Width', 'hama' ),
            'param_name'    => 'width',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
            "description"   => esc_html__( "This is value to set width for map. Unit % or px. Example: 100%,500px. Default is 100%", 'hama' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Map Height', 'hama' ),
            'param_name'    => 'height',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
            "description"   => esc_html__( "This is value to set height for map. Unit % or px. Example: 100%,500px. Default is 500px", 'hama' )
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("MapTypeControl",'hama'),
            "param_name"    => "control",
            'value'         => array(
                esc_html__('Yes','hama') => 'yes',
                esc_html__('No','hama') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Scrollwheel",'hama'),
            "param_name"    => "scrollwheel",
            'value'         => array(
                esc_html__('Yes','hama') => 'yes',
                esc_html__('No','hama') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("DisableDefaultUI",'hama'),
            "param_name"    => "disable_ui",
            'value'         => array(
                esc_html__('No','hama') => 'no',
                esc_html__('Yes','hama') => 'yes',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Draggable",'hama'),
            "param_name"    => "draggable",
            'value'         => array(
                esc_html__('Yes','hama') => 'yes',
                esc_html__('No','hama') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "dependency"    =>  array(
                "element"       => "display_map",
                "value"         => "yes",
            ), 
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