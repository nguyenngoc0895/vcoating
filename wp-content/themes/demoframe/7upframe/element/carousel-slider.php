<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 31/08/15
 * Time: 10:00 AM
 */
/************************************Main Carousel*************************************/
if(!function_exists('s7upf_vc_slide_carousel'))
{
    function s7upf_vc_slide_carousel($attr, $content = false)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'item'          => '1',
            'title'         => '',
            'des'           => '',
            'speed'         => '',
            'itemres'       => '',
            'navigation'    => '',
            'pagination'    => '',
            'nav_next'      => '',
            'nav_prev'      => '',
            'banner_bg'     => '',
            'animation'     => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$banner_bg.' '.$css_class;
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));
        $html = s7upf_get_template_element('slide-carousel/carousel','',$attr);
        return $html;
    }
}
stp_reg_shortcode('slide_carousel','s7upf_vc_slide_carousel');
vc_map(
    array(
        'name'          => esc_html__( 'Carousel Slider', 'hama' ),
        'base'          => 'slide_carousel',
        "category"      => esc_html__("7UP-Elements", 'hama'),
        "description"   => esc_html__( 'Display banner slider', 'hama' ),
        'icon'          => 'icon-st',
        'as_parent'     => array( 'only' => 'vc_column_text,vc_single_image,slide_banner_item,s7upf_banner_video,s7upf_advertisement,slide_testimonial_item' ),
        'content_element' => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(                       
            array(
                'heading'     => esc_html__( 'Item slider display', 'hama' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter number of item. Default is 1.', 'hama' ),
                'param_name'  => 'item',
            ),
            array(
                'type'        => 'textfield',
                "admin_label"   => true,
                'heading'     => esc_html__( 'Title', 'hama' ),
                'param_name'  => 'title',
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Description', 'hama' ),
                'param_name'  => 'des',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image style', 'hama' ),
                'param_name'  => 'banner_bg',
                'value'       => array(
                    esc_html__( 'Default', 'hama' )                        => '',
                    esc_html__( 'Banner Background', 'hama' )              => 'bg-slider',
                    esc_html__( 'Banner Background Parallax', 'hama' )     => 'bg-slider parallax-slider', 
                ),
            ),
            array(
                'heading'     => esc_html__( 'Speed', 'hama' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'hama' ),
                'param_name'  => 'speed',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'hama' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__( 'Hidden', 'hama' )                  => '',
                    esc_html__( 'Default Navigation', 'hama' )      => 'navi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Text prev', 'hama' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html previous button slider', 'hama' ),
                'param_name'  => 'nav_prev',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'heading'     => esc_html__( 'Text next', 'hama' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html next button slider', 'hama' ),
                'param_name'  => 'nav_next',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'hama' ),
                'param_name'  => 'pagination',
                'value'       => array(
                    esc_html__( 'Hidden', 'hama' )                  => '',
                    esc_html__( 'Default Pagination', 'hama' )      => 'pagi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Custom Item', 'hama' ),
                'type'        => 'textfield',
                'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'hama' ),
                'param_name'  => 'itemres',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Animation', 'hama' ),
                'param_name'  => 'animation',
                'value'       => array(
                    esc_html__( 'None', 'hama' )        => '',
                    esc_html__( 'Fade', 'hama' )        => 'fade',
                    esc_html__( 'BackSlide', 'hama' )   => 'backSlide',
                    esc_html__( 'GoDown', 'hama' )      => 'goDown',
                    esc_html__( 'FadeUp', 'hama' )      => 'fadeUp',
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
    )
);

/*******************************************END MAIN*****************************************/


/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_banner_item'))
{
    function s7upf_vc_slide_banner_item($attr, $content = false)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'             => '',
            'image'             => '',
            'link'              => '',
            'info_animation'    => '',
            'info_style'        => '',
            'info_align'        => '',
            'info_transform'    => '',
            'custom_css'        => '',
            'el_class'          => '',
            'content'           => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$style.' '.$css_class;
        $info_class = $info_style.' '.$info_align.' '.$info_transform;
        if(!empty($info_animation)) $info_class .= ' animated';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'info_class'    => $info_class,
            ));
        if(!empty($image)){
            $html = s7upf_get_template_element('slide-carousel/item',$style,$attr);
        }
        return $html;
    }
}
stp_reg_shortcode('slide_banner_item','s7upf_vc_slide_banner_item');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Banner Item', 'hama' ),
        'base'     => 'slide_banner_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'slide_carousel'),
        'params'   => array(            
            array(
                "type"          => "textarea_html",
                "holder"        => "div",
                "heading"       => esc_html__("Content",'hama'),
                "param_name"    => "content",
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'hama' ),
                'param_name'    => 'style',
                'value'         => array(
                    esc_html__( 'Default', 'hama' ) => '',
                    esc_html__( 'Style 2', 'hama' ) => 'style2',
                    esc_html__( 'Style 3', 'hama' ) => 'style3',
                    )
            ),            
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( 'Image', 'hama' ),
                'param_name'    => 'image',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Link Banner', 'hama' ),
                'param_name'    => 'link',
            ),
            array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Info Animation', 'hama' ),
                'param_name'    => 'info_animation',
                'admin_label'   => true,
                'value'         => '',
                'settings'      => array(
                    'type'          => 'in',
                    'custom'        =>  array(
                        array(
                            'label'     => esc_html__( 'Default', 'hama' ),
                            'values'    => array(
                                esc_html__( 'Top to bottom', 'hama' ) => 'top-to-bottom',
                                esc_html__( 'Bottom to top', 'hama' ) => 'bottom-to-top',
                                esc_html__( 'Left to right', 'hama' ) => 'left-to-right',
                                esc_html__( 'Right to left', 'hama' ) => 'right-to-left',
                                esc_html__( 'Appear from center', 'hama' ) => 'appear',
                            ),
                        ),
                    ),
                ),
                'description' => esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'hama' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Style', 'hama' ),
                'param_name'    => 'info_style',
                'value'         => array(
                    esc_html__( 'None', 'hama' )     => '',
                    esc_html__( 'Black', 'hama' )    => 'black',
                    esc_html__( 'White', 'hama' )    => 'white',
                    esc_html__( 'Navi', 'hama' )     => 'navi',
                    )
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Align', 'hama' ),
                'param_name'    => 'info_align',
                'value'         => array(
                    esc_html__( 'Default', 'hama' )    => '',
                    esc_html__( 'Left', 'hama' )       => 'text-left',
                    esc_html__( 'Right', 'hama' )      => 'text-right',
                    esc_html__( 'Center', 'hama' )     => 'text-center',
                    )
                ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Transform', 'hama' ),
                'param_name'    => 'info_transform',
                'value'         => array(
                    esc_html__( 'Default', 'hama' )     => '',
                    esc_html__( 'Uppercase', 'hama' )   => 'text-uppercase',
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
    )
);

/**************************************END ITEM************************************/

/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_testimonial_item'))
{
    function s7upf_vc_slide_testimonial_item($attr, $content = false)
    {
        $html = $view_html = $view_html2 = '';
        extract(shortcode_atts(array(
            'style'         => '',
            'title'         => '',
            'image'         => '',
            'name'          => '',
            'position'      => '',            
            'des'           => '',
            'link'          => '',
        ),$attr));
        switch ($style) {
            case 'style3':
                $html .=    '<div class="item-about-client testimo-style3">
                                <h3 class="title18"><a href="'.esc_url($link).'" class="title">'.esc_html($title).'</a></h3>
                                <p class="desc">'.esc_html($des).'</p>
                                <a href="'.esc_url($link).'" class="name">'.esc_html($name).'</a>
                            </div>';
                break;

            case 'about-page':
                $html .=    '<div class="item-about-client testimo-style2">
                                <h3 class="title14"><a href="'.esc_url($link).'" class="color">'.esc_html($name).'</a></h3>
                                <div class="client-thumb"><div class="img-testimo"><a href="'.esc_url($link).'">'.wp_get_attachment_image($image,'full').'</a></div></div>
                                <div class="client-info">
                                    <p class="desc">'.esc_html($des).'</p>
                                    <span class="silver">'.esc_html($position).'</span>
                                </div>
                            </div>';
                break;
            
            default:
                $html .=    '<div class="item-testimo4 table">
                                <div class="testimo-thumb">
                                    <a href="'.esc_url($link).'">'.wp_get_attachment_image($image,'full',0,array("class"=>"round")).'</a>
                                </div>
                                <div class="testimo-info">
                                    <p class="desc">'.esc_html($des).'</p>
                                    <ul class="list-inline-block">
                                        <li><a href="'.esc_url($link).'" class="color text-uppercase">'.esc_html($name).'</a></li>
                                        <li><span>'.esc_html($position).'</span></li>
                                    </ul>
                                </div>
                            </div>';
                break;
        }        
        return $html;
    }
}
stp_reg_shortcode('slide_testimonial_item','s7upf_vc_slide_testimonial_item');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Testimonial Item', 'hama' ),
        'base'     => 'slide_testimonial_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'slide_carousel'),
        'params'   => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Style', 'hama' ),
                'param_name'  => 'style',
                'value'       => array(
                    esc_html__( 'Default', 'hama' ) => '',
                    esc_html__( 'Testimonial sytle 2', 'hama' ) => 'about-page',
                    esc_html__( 'Testimonial sytle 3', 'hama' ) => 'style3',
                    )
            ),
            array(
                'type'        => 'textfield',
                "admin_label"   => true,
                'heading'     => esc_html__( 'Title', 'hama' ),
                'param_name'  => 'title',
                "dependency"    =>  array(
                    "element"       => "style",
                    "value"         => "style3",
                ),
            ),            
            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Image', 'hama' ),
                'param_name'  => 'image',
            ),
            array(
                'type'        => 'textfield',
                "holder"        => "h3",
                'heading'     => esc_html__( 'Name', 'hama' ),
                'param_name'  => 'name',
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Position', 'hama' ),
                'param_name'  => 'position',
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Link', 'hama' ),
                'param_name'  => 'link',
            ),  
            array(
                "type"          => "textarea",
                "holder"        => "p",
                "heading"       => esc_html__("Description",'hama'),
                "param_name"    => "des",
            ),
        )
    )
);

/**************************************END ITEM************************************/

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Slide_Carousel extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Slide_Banner_Item extends WPBakeryShortCode {}
}