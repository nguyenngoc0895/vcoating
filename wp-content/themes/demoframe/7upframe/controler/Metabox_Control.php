<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */

add_action('admin_init', 's7upf_custom_meta_boxes');
if(!function_exists('s7upf_custom_meta_boxes')){
    function s7upf_custom_meta_boxes(){
        //Format content
        $format_metabox = array(
            'id'        => 'block_format_content',
            'title'     => esc_html__('Format Settings', 'hama'),
            'desc'      => '',
            'pages'     => array('post'),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields'    => array(                
                array(
                    'id'        => 'format_image',
                    'label'     => esc_html__('Upload Image', 'hama'),
                    'type'      => 'upload',
                    'desc'      => esc_html__('Choose image from media.','hama'),
                ),
                array(
                    'id'        => 'format_gallery',
                    'label'     => esc_html__('Add Gallery', 'hama'),
                    'type'      => 'Gallery',
                    'desc'      => esc_html__('Choose images from media.','hama'),
                ),
                array(
                    'id'        => 'format_media',
                    'label'     => esc_html__('Link Media', 'hama'),
                    'type'      => 'text',
                    'desc'      => esc_html__('Enter media url(Youtube, Vimeo, SoundCloud ...).','hama'),
                )
            ),
        );
        // SideBar
        $page_settings = array(
            'id'        => 's7upf_sidebar_option',
            'title'     => esc_html__('Page Settings','hama'),
            'pages'     => array( 'page','post','product'),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields'    => array(
                // General tab
                array(
                    'id'        => 'page_general',
                    'type'      => 'tab',
                    'label'     => esc_html__('General Settings','hama')
                ),
                array(
                    'id'        => 's7upf_header_page',
                    'label'     => esc_html__('Choose page header','hama'),
                    'type'      => 'select',
                    'choices'   => s7upf_list_post_type('s7upf_header'),
                    'desc'      => esc_html__('Include Header content. Go to Header page in admin menu to edit/create header content. Default is value of Theme Option.','hama'),
                ),
                array(
                    'id'         => 's7upf_footer_page',
                    'label'      => esc_html__('Choose page footer','hama'),
                    'type'       => 'select',
                    'choices'    => s7upf_list_post_type('s7upf_footer'),
                    'desc'       => esc_html__('Include Footer content. Go to Footer page in admin menu to edit/create footer content. Default is value of Theme Option.','hama'),
                ),
                array(
                    'id'         => 's7upf_sidebar_position',
                    'label'      => esc_html__('Sidebar position ','hama'),
                    'type'       => 'select',
                    'choices'    => array(
                        array(
                            'label' => esc_html__('--Select--','hama'),
                            'value' => '',
                        ),
                        array(
                            'label' => esc_html__('No Sidebar','hama'),
                            'value' => 'no'
                        ),
                        array(
                            'label' => esc_html__('Left sidebar','hama'),
                            'value' => 'left'
                        ),
                        array(
                            'label' => esc_html__('Right sidebar','hama'),
                            'value' => 'right'
                        ),
                    ),
                    'desc'      => esc_html__('Choose sidebar position for current page/post(Left,Right or No Sidebar).','hama'),
                ),
                array(
                    'id'        => 's7upf_select_sidebar',
                    'label'     => esc_html__('Selects sidebar','hama'),
                    'type'      => 'sidebar-select',
                    'condition' => 's7upf_sidebar_position:not(no),s7upf_sidebar_position:not()',
                    'desc'      => esc_html__('Choose a sidebar to display.','hama'),
                ),
                array(
                    'id'          => 'before_append',
                    'label'       => esc_html__('Append content before','hama'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','hama'),
                ),
                array(
                    'id'          => 'after_append',
                    'label'       => esc_html__('Append content after','hama'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','hama'),
                ),
                array(
                    'id'          => 'show_title_page',
                    'label'       => esc_html__('Show title', 'hama'),
                    'type'        => 'on-off',
                    'std'         => 'on',
                    'desc'        => esc_html__('Show/hide title of page.','hama'),
                ),
                array(
                    'id' => 'post_single_page_share',
                    'label' => esc_html__('Show Share Box', 'hama'),
                    'type' => 'select',
                    'std'   => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Theme Option--','hama'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','hama'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','hama'),
                            'value'=>'off'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box independent on this page. ', 'hama' ),
                ),
                // End general tab
                // Custom color
                array(
                    'id'        => 'page_color',
                    'type'      => 'tab',
                    'label'     => esc_html__('Custom color','hama')
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','hama'),
                    'type'        => 'colorpicker',
                    'desc'        => esc_html__( 'Change body background of page.', 'hama' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','hama'),
                    'type'        => 'colorpicker',
                    'desc'        => esc_html__( 'Change main color of this page.', 'hama' ),
                ),
                array(
                    'id'          => 'main_color2',
                    'label'       => esc_html__('Main color 2','hama'),
                    'type'        => 'colorpicker',
                    'desc'        => esc_html__( 'Change main color 2 of this page.', 'hama' ),
                ),
                // End Custom color
                // Display & Style tab
                array(
                    'id'        => 'page_layout',
                    'type'      => 'tab',
                    'label'     => esc_html__('Display & Style','hama')
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','hama'),
                    'type'        => 'select',
                    'std'         => '',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Default','hama'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Page boxed','hama'),
                            'value' =>  'page-content-box'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for page.', 'hama' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','hama'),
                    'type'        => 'text',
                    'desc'        => esc_html__( 'You can custom width of page container. Default is 1200px.', 'hama' ),
                ),                
                
                // End Display & Style tab               
            )
        );
        
        $product_settings = array(
            'id' => 'block_product_custom_tab',
            'title' => esc_html__('Product Settings', 'hama'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(                
                array(
                    'id'          => 'before_append_tab',
                    'label'       => esc_html__('Append content before product tab','hama'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','hama'),
                ),
                array(
                    'id'          => 'product_tab_detail',
                    'label'       => esc_html__('Product Tab Style','hama'),
                    'type'        => 'select',
                    'choices'     => array(                                                    
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Normal", 'hama'),
                        ),
                        array(
                            'value'=> 'tab-toggle',
                            'label'=> esc_html__("Tab Toggle", 'hama'),
                        ),
                        array(
                            'value'=> 'detail-without-sidebar',
                            'label'=> esc_html__("Tab Vertical", 'hama'),
                        ),
                    )
                ),
                array(
                    'id'          => 's7upf_product_tab_data',
                    'label'       => esc_html__('Add Custom Tab','hama'),
                    'type'        => 'list-item',
                    'settings'    => array(
                        array(
                            'id' => 'tab_content',
                            'label' => esc_html__('Content', 'hama'),
                            'type' => 'textarea',
                        ),
                        array(
                            'id'            => 'priority',
                            'label'         => esc_html__('Priority (Default 40)', 'hama'),
                            'type'          => 'numeric-slider',
                            'min_max_step'  => '1,50,1',
                            'std'           => '40',
                            'desc'          => esc_html__('Choose priority value to re-order custom tab position.','hama'),
                        ),
                    )
                ),
            ),
        );
        $product_type = array(
            'id' => 'product_trendding',
            'title' => esc_html__('Product Type', 'hama'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'side',
            'priority' => 'low',
            'fields' => array(                
                array(
                    'id'    => 'trending_product',
                    'label' => esc_html__('Product Trending', 'hama'),
                    'type'        => 'on-off',
                    'std'         => 'off',
                    'desc'        => esc_html__( 'Set trending for current product.', 'hama' ),
                ),
                array(
                    'id'    => 'product_thumb_hover',
                    'label' => esc_html__('Product hover image', 'hama'),
                    'type'  => 'upload',
                    'desc'        => esc_html__( 'Product thumbnail 2. Some hover animation of thumbnail show back image. Default return main product thumbnail.', 'hama' ),
                ),
            ),
        );
        if (function_exists('ot_register_meta_box')){
            ot_register_meta_box($format_metabox);
            ot_register_meta_box($page_settings);
            ot_register_meta_box($product_settings);
            ot_register_meta_box($product_type);
        }
    }
}
?>