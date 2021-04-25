<?php
/**
 * User: Vinhhihi
 * Date: 2018
 */

if(!function_exists('s7upf_vc_time_count'))
{
    function s7upf_vc_time_count($attr)
    {
        $html = '';
        extract(shortcode_atts(array(
            'title'      => '',
            'time'      => '',
        ),$attr));
        $html .=    '
                    <div class="title-box">
                        <h2><span>'.esc_html($title).'</span></h2>
                    </div>            
                    <div class="box-count-down text-center">
                        <div class="content-deal-countdown" data-date="'.esc_attr($time).'"></div>
                    </div>';
        return $html;
    }
}

stp_reg_shortcode('s7upf_time_count','s7upf_vc_time_count');

vc_map( array(
    "name"      => esc_html__("Time Countdown", 'hama'),
    "base"      => "s7upf_time_count",
    "icon"      => "icon-st",
    "category"  => esc_html__("7UP-Elements", 'hama'),
    "params"    => array(
        array(
            "type" => "textfield",
            "holder" => "h3",
            "heading" => esc_html__("Title",'hama'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Time CountDown",'hama'),
            "param_name" => "time",
            'description'   => esc_html__( 'Entert Time for countdown. Format is mm/dd/yyyy. Example: 12/15/2016.', 'hama' ),
        )
    )
));