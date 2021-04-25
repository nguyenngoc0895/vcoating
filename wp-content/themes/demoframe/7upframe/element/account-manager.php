<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_account_manager'))
{
    function s7upf_vc_account_manager($attr,$content = false)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'     	 => '',
            'login_url'      => '',
            'register_url'   => '',
            'redirect_url'	 => '',
            'login_icon'     => '',
            'register_icon'  => '',
            'logout_icon'	 => '',
			'list'      	 => '',
			'el_class'       => '',
			'custom_css'     => '',
			'style_title'     => '',
			'title_account'     => '',
			'title_icon'     => '',
        ),$attr);
        extract($attr);
		$el_class .= ' '.$style;
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
		$data = (array) vc_param_group_parse_atts( $list );

		$default_val = array(
            'icon'      => '',
            'title'     => '',
            'link'      => '',
            'roles'     => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            ));
        // Call function get template
        $html = s7upf_get_template_element('account-manager/account',$style,$attr);
        
        return $html;
    }
}
stp_reg_shortcode('s7upf_account_manager','s7upf_vc_account_manager');

vc_map( array(
	"name"      => esc_html__("Account manager", 'hama'),
	"base"      => "s7upf_account_manager",
	"icon"      => "icon-st",
	"category"  => '7UP-Elements',
	"params"    => array(
		array(
			"type"          => "dropdown",
			"holder"        => "div",
			"heading"       => esc_html__("Style",'hama'),
			"param_name"    => "style",
			"value"         => array(
				esc_html__("Default",'hama')   => '',
				esc_html__("Icon",'hama')   => 'icon',
				),
		),
		array(
			"type"          => "dropdown",
			"holder"        => "div",
			"heading"       => esc_html__("Title",'hama'),
			"param_name"    => "style_title",
			"value"         => array(
				esc_html__("Default",'hama')   => 'text',
				esc_html__("icon",'hama')   => 'icon',
				),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title text",'hama'),
			"param_name" => "title_account",
			'description'   => esc_html__( 'Title text.', 'hama' ),
			"dependency"    =>  array(
                    "element"       => "style_title",
                    "value"         => "text",
            	),
		),
		array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Icon', 'hama' ),
            'param_name'    => 'title_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'type'          => s7upf_default_icon_lib(),
                'iconsPerPage'  => 4000,
            ),
            "dependency"    =>  array(
                    "element"       => "style_title",
                    "value"         => "icon",
            	),
        ),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Login Url",'hama'),
			"param_name" => "login_url",
			'description'   => esc_html__( 'Enter login url. Default is myaccount page.', 'hama' ),
			'edit_field_class'=>'vc_col-sm-6 vc_column',
		),
		array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Login Icon', 'hama' ),
            'param_name'    => 'login_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'type'          => s7upf_default_icon_lib(),
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
        ),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Register Url",'hama'),
			"param_name" => "register_url",
			'description'   => esc_html__( 'Enter login url. Default is myaccount page.', 'hama' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
		),
		array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Register Icon', 'hama' ),
            'param_name'    => 'register_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'type'          => s7upf_default_icon_lib(),
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
        ),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Logout Redirect Url",'hama'),
			"param_name" => "redirect_url",
			'description'   => esc_html__( 'Enter url redirect when user logout. Default is home page.', 'hama' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
		),
		array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Logout Icon', 'hama' ),
            'param_name'    => 'logout_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'type'          => s7upf_default_icon_lib(),
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'hama' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
        ),
		array(
			"type" => "param_group",
			"heading" => esc_html__("Add List Link",'hama'),
			"param_name" => "list",
			"params"    => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title",'hama'),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link",'hama'),
					"param_name" => "link",
				),
				array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Icon', 'hama' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'type'          => s7upf_default_icon_lib(),
                        'iconsPerPage'  => 4000,
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'hama' ),
                ),                
				array(
					"type"          => "checkbox",
					"heading"       => esc_html__("Show with Role",'hama'),
					"param_name"    => "roles",
					"value"         => s7upf_get_list_role(),
					'description'   =>  esc_html__( 'Check to show link with role. Default show with all roles.', 'hama' ),
				),
			),
			'description' =>  esc_html__( 'List links only show when you was login.', 'hama' ),
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