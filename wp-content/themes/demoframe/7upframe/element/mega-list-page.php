<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_mega_list_page'))
{
    function s7upf_vc_mega_list_page($attr)
    {
        $html = '';
        extract(shortcode_atts(array(
            'title'         => '',
            'list_ids'      => '',
            'list'          => '',
        ),$attr));
        if(!empty($list_ids)){
            if(!empty($list)) $list .= ','.$list_ids;
            else $list .= $list_ids;
        }
        $html .=    '<div class="mega-list-cat">';
        if(!empty($title)) $html .= '<h2 class="title18 font-bold text-uppercase">'.esc_html($title).'</h2>';
        if(!empty($list)){
            $html .=    '<ul class="list-none">';
            $list = str_replace(' ', '', $list);
            $list = explode(",",$list);
            if(is_array($list)){
                foreach ($list as $key => $page) {
                    $html .=    '<li><a href="'.get_the_permalink($page).'">'.get_the_title($page).'</a></li>';
                }
            }
            $html .=    '</ul>';
        }
        $html .=    '</div>';
        return $html;
    }
}

stp_reg_shortcode('s7upf_mega_list_page','s7upf_vc_mega_list_page');

vc_map( array(
    "name"      => esc_html__("Mega List Pages", 'hama'),
    "base"      => "s7upf_mega_list_page",
    "icon"      => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display list of page', 'hama' ),
    "params"    => array(
        array(
            "type" => "textfield",
            "admin_label"   => true,
            "heading" => esc_html__("Title",'hama'),
            "param_name" => "title",
        ),
        array(
            'heading'     => esc_html__( 'List page', 'hama' ),
            'type'        => 'autocomplete',
            'param_name'  => 'list',
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'values' => s7upf_list_all_page(true),
            ),
            'save_always' => true,
            'description' => esc_html__( 'List of pages', 'hama' ),
        ),        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Append Custom links with ID",'hama'),
            "param_name" => "list_ids",
            'description' => esc_html__( 'Enter list ID page,post or product and separate values by ",". Example is 3,7,11', 'hama' ),
        ),
    )
));