<?php
/**
 * User: vinh
 * Date: 2018
 */

if(!function_exists('s7upf_vc_banner_video'))
{
    function s7upf_vc_banner_video($attr , $content = false)
    {
        $html = $settings = '';
        extract(shortcode_atts(array(
            'poster'        => '',
            'video_link'    => '',
            'loop'          => 'loop',
            'audio'         => 'muted',
            'autoplay'      => 'autoplay',
            'link'          => '',
            'info_animation'    => '',
            'info_align'        => '',
        ),$attr));
        if(!empty($poster)) $settings .= 'poster="'.wp_get_attachment_image_url($poster,'full').'"';
        if($loop != 'no') $settings .= ' '.$loop;
        if($audio != 'no') $settings .= ' '.$audio;
        if($autoplay != 'no') $settings .= ' '.$autoplay;
        $html .=    '<div class="banner-video">';
        if(!empty($link)) $html .=    '<a href="'.esc_url($link).'">';
        $html .=        '<video '.$settings.' class="video-fullscreen">
                            <source src="'.esc_url($video_link).'" type="video/mp4">
                        </video>';
        if(!empty($link)) $html .=    '</a>';
        if(!empty($content)){
            $html .=    '
                        <div class="banner-info">
                            <div class="slider-content-text animated '.esc_attr($info_animation).' '.esc_attr($info_align).'" data-animated="'.esc_attr($info_animation).'">
                                '.wpb_js_remove_wpautop($content, true).'
                            </div>
                        </div>';
        }
        $html .=    '</div>';
        
        return $html;
    }
}

stp_reg_shortcode('s7upf_banner_video','s7upf_vc_banner_video');

vc_map( array(
    "name"      => esc_html__("Banner Video", 'hama'),
    "base"      => "s7upf_banner_video",
    "icon"      => "icon-st",
    "category"  => esc_html__("7UP-Elements", 'hama'),
    "params"    => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Poster Image",'hama'),
            "param_name" => "poster",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video source",'hama'),
            "param_name" => "video_link",
            "description" => esc_html__( "Enter video source.", 'hama' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Redirect Link",'hama'),
            "param_name" => "link",
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Loop', 'hama' ),
            'param_name'  => 'loop',
            'value'       => array(
                esc_html__( 'Yes', 'hama' )                  => 'loop',
                esc_html__( 'No', 'hama' )                  => 'no',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Audio', 'hama' ),
            'param_name'  => 'loop',
            'value'       => array(
                esc_html__( 'No', 'hama' )                  => 'muted',
                esc_html__( 'Yes', 'hama' )                  => 'no',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Autoplay', 'hama' ),
            'param_name'  => 'autoplay',
            'value'       => array(
                esc_html__( 'Yes', 'hama' )                  => 'autoplay',
                esc_html__( 'No', 'hama' )                  => 'no',
            ),
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Content",'hama'),
            "param_name" => "content",
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
                'heading'       => esc_html__( 'Info Align', 'hama' ),
                'param_name'    => 'info_align',
                'value'         => array(
                    esc_html__( 'Default', 'hama' )    => '',
                    esc_html__( 'Left', 'hama' )       => 'text-left',
                    esc_html__( 'Right', 'hama' )      => 'text-right',
                    esc_html__( 'Center', 'hama' )     => 'text-center',
                    )
                ),
    )
));