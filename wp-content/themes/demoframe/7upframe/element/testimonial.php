<?php
if(!function_exists('s7upf_vc_testimonial2')){
    function s7upf_vc_testimonial2($attr, $content = false){
        $html = '';
        $attr = shortcode_atts(array(
            'style'         => 'default',
            'custom_css'    => '',
            'list'          => '',
            'el_class'      => '',
            'title'			=> '',
            'desc_title'	=> '',
        ),$attr);
        extract($attr);

        // Variable process
        $el_class .= ' '.$style;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image'         => '',
            'link'      	=> '',
            'des'			=> '',
            'name'          => '',
            );
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            ));

        // Call function get template
        $html = s7upf_get_template_element('testimonial/testimonial',$style,$attr);

		return  $html;
    }
}

stp_reg_shortcode('s7upf_testimonial2','s7upf_vc_testimonial2');


vc_map(
    array(
        'name'     => esc_html__( 'Testimonial', 'hama' ),
        'base'     => 's7upf_testimonial2',
    	"icon"          => "icon-st",
    	"category"      => esc_html__("7UP-Elements", 'hama'),
    	"description"   => esc_html__( 'Display social list on your site', 'hama' ),
        'params'   => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Style', 'hama' ),
                'param_name'  => 'style',
                'value'       => array(
                    esc_html__( 'Default', 'hama' ) => '',
                   )
            ),
            array(
                'type'        => 'textfield',
                "admin_label"   => true,
                'heading'     => esc_html__( 'Title', 'hama' ),
                'param_name'  => 'title',
            ),        
            array(
                'type'        => 'textfield',
                "admin_label"   => true,
                'heading'     => esc_html__( 'Desc Title', 'hama' ),
                'param_name'  => 'desc_title',
            ),    
            array(
            "type"          => "param_group",
            "heading"       => esc_html__("Social List",'hama'),
            "param_name"    => "list",
            "params"        => array(      
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