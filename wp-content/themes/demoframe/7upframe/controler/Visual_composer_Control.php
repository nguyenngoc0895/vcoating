<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(class_exists('Vc_Manager')){
    function s7upf_add_custom_shortcode_param( $name, $form_field_callback, $script_url = null ) {
        return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
    }    

    // Mutil location param

    s7upf_add_custom_shortcode_param('add_location_map', 's7upf_add_location_map', get_template_directory_uri(). '/assets/js/vc_js.js');

    function s7upf_add_location_map($settings, $value)
    {
        $val = $value;
        $html = '<div class="st_add_location">';
        
        parse_str(urldecode($value), $locations);
        if(is_array($locations)) 
        {
            $i = 1;
            foreach ($locations as $key => $value) {
                $html .= '<div class="location-item" data-item="'.$i.'">';
                    $html .= '<div class="wpb_element_label">'.esc_html__("Location",'hama').' '.$i.'</div>';
                    $html .= '<label>'.esc_html__("Latitude",'hama').'</label><input class="st-input st-location-save st-title" name="'.$i.'[lat]" value="'.$value['lat'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Longitude",'hama').'</label><input class="st-input st-location-save st-des" name="'.$i.'[lon]" value="'.$value['lon'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Marker Title",'hama').'</label><input class="st-input st-location-save st-label" name="'.$i.'[title]" value="'.$value['title'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Info Box",'hama').'</label>';
                    $html .= '<label>'.esc_html__("Info Box",'hama').'</label><textarea id="content'.$i.'" class="st-input st-location-save info-content" name="'.$i.'[boxinfo]">'.$value['boxinfo'].'</textarea>';
                    $html .= '<a href="#" class="st-del-item">delete</a>';
                $html .= '</div>';
                $i++;
            }
        }
        $html .= '</div>';
        $html .= '<div class="add-location"><button style="margin-top: 10px;padding: 5px 12px" class="vc_btn vc_btn-primary vc_btn-sm st-location-add-map" type="button">'.esc_html__('Add more', 'hama').' </button></div>';
        $html .= '<input name="'.$settings['param_name'].'" class="st-location-value wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$val.'">';
        return $html;
    }

    // Mutil location param

    if(!class_exists('S7upf_VisualComposerController'))
    {
        class  S7upf_VisualComposerController
        {

            static function _init()
            {
                add_filter('vc_shortcodes_css_class',array(__CLASS__,'_change_class'), 10, 2);
                self::s7upf_add_custum_shortcode_param('s7up_number', array(__CLASS__,'_s7upf_number_field_shortcode_param'));
                self::s7upf_add_custum_shortcode_param('s7up_image_check', array(__CLASS__,'_s7upf_image_show_shortcode_param'), get_template_directory_uri(). '/assets/js/vc_js.js');
                self::_custom_vc_param();
                $list = array(
                    'post',
                    'page',
                    's7upf_header',
                    's7upf_footer',
                    's7upf_mega_item',
                );
                vc_set_default_editor_post_types( $list );
            }
            static function _custom_vc_param()
            {
                $add_animation = array(                    
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Style', 'hama' ),
                        'param_name' => 'style',
                        'value' => array(
                            esc_html__( 'Default', 'hama' ) => '',
                            esc_html__( '7up style', 'hama' ) => '7up-style',
                            ),
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Tab active', 'hama' ),
                        'param_name' => 'tab_active',
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Tab ajax', 'hama' ),
                        'param_name' => 'tab_ajax',
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                );
                vc_add_params('vc_tta_section',$add_animation);
               
            }
            static function s7upf_add_custum_shortcode_param($name, $form_field_callback, $script_url = null)
            {
                return WpbakeryShortcodeParams::addField($name, $form_field_callback, $script_url);
            }
            static function _change_class($class_string, $tag)
            {
                if($tag=='vc_row' || $tag=='vc_row_inner') {
                    $class_string = str_replace('vc_row-fluid', '', $class_string);
                }

                if(defined ('WPB_VC_VERSION'))
                {
                    if(version_compare(WPB_VC_VERSION,'4.2.3','>'))
                    {
                        if($tag=='vc_column' || $tag=='vc_column_inner') {
                            $class_string=str_replace('vc_col', 'col', $class_string);
                        }
                    }else
                    {
                        if($tag=='vc_column' || $tag=='vc_column_inner') {
                            $class_string = preg_replace('/vc_span(\d{1,2})/', 'col-lg-$1', $class_string);
                        }
                    }
                }

                return $class_string;
            }

            static function _s7upf_number_field_shortcode_param($settings, $value)
            {
                $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                $type = isset($settings['type']) ? $settings['type'] : '';
                $min = isset($settings['min']) ? $settings['min'] : '';
                $max = isset($settings['max']) ? $settings['max'] : '';
                $step = isset($settings['step']) ? $settings['step'] : '';
                $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
                $class = isset($settings['class']) ? $settings['class'] : '';
                $output_html = '<input type="number" min="'.$min.'" max="'.$max.'" step="'.$step.'" class="wpb_vc_param_value st-vc-type-st-number form-control' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'"/>';
                if(!empty($suffix)){
                    $output_html .= '<span class="suffix">'.$suffix.'</span>';
                }

                return $output_html;
            }

            //Show Image
            static function _s7upf_image_show_shortcode_param($settings, $value){
                if(!empty($settings['element'])){
                    $element = $settings['element'];
                    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                    $title_view = isset($settings['title_view']) ? $settings['title_view'] : esc_html__('View demo','hama');
                    $std = isset($settings['std']) ? $settings['std'] : '';
                    $url_image_default = get_template_directory_uri().'/assets/admin/image/s7up-image-check/'.$param_name.'/'.$std.'.jpg';
                    $html = '<div class="s7up_image_check" data-element="'.$element.'" data-param_name="'.$param_name.'" data-img_url="'.get_template_directory_uri().'/assets/admin/image/element_name/'.'">';
                    $html .= '<img class = "image_icon_mb" src="'.esc_url($url_image_default).'" alt="'.esc_attr__('Image','hama').'" style="height:40px">';
                    $html .= '<span class="title-view-demo">'.$title_view.'</span><i class="fa fa-share" aria-hidden="true"></i></div>';

                    return $html;
                }else{
                    return false;
                }
            }
        }

        S7upf_VisualComposerController::_init();
    }
    
}