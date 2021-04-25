<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 29/02/16
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_blog')){
    function s7upf_vc_blog($attr){
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'         => 'list',
            'column'        => '2',
            'number'        => '10',
            'excerpt'       => '',
            'cats'          => '',
            'order'         => 'DESC',
            'order_by'      => '',
            'post_formats'  => '',
            'size'          => '',
            'size_list'     => '',
            'item_style'    => '',
            'item_style_list' => '',
            'grid_type'     => '',
            'blog_style'    => '',
            'check_type'    => 'on',
            'check_number'  => 'on',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' blog-'.$style.'-view '.$grid_type.' '.$css_class;
        if(isset($_GET['type'])) $style = $_GET['type'];
        if(isset($_GET['number'])) $number = $_GET['number'];
        if(!empty($size)) $size = explode('x', $size);
        if(!empty($size_list)) $size_list = explode('x', $size_list);

        $attr = array_merge($attr,array(
            'style'     => $style,
            'size'      => $size,
            'size_list' => $size_list,
            'number'    => $number,
            ));

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
        );        
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
        if(!empty($post_formats)) {
            $formats_list = explode(",",$post_formats);
            $args['tax_query']['relation'] = 'AND';
            $args['tax_query'][]=array(
                'taxonomy'  => 'post_format',
                'field'     => 'slug',
                'terms'     => $formats_list
            );
        }
        $query = new WP_Query($args);
        $count = 1;
        $count_query = $query->post_count;
        $max_page = $query->max_num_pages;
        $html .=    s7upf_get_template('top-filter','',array('style'=>$style,'number'=>$number,'check_number'=>$check_number,'check_type'=>$check_type));
        $html .=    '<div class="js-content-wrap '.esc_attr($el_class).'" data-column="'.esc_attr($column).'">
                        <div class="js-content-main list-post-wrap row">';
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                $html .=    s7upf_get_template_post($style.'/'.$style,$slug,$attr);
                $count++;
            }
        }
        $html .=        '</div>';
        if($blog_style == 'load-more' && $max_page > 1){
            $data_load = array(
                "args"        => $args,
                "attr"        => $attr,
                );
            $data_loadjs = json_encode($data_load);
            $html .=    '<div class="btn-loadmore">
                            <a href="#" class="blog-loadmore loadmore" 
                                data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                                data-maxpage="'.esc_attr($max_page).'">
                                '.esc_html__("Xem Thêm","hama").'
                            </a>
                        </div>';
        }
        else $html .= s7upf_paging_nav($query,'',false);
        $html .=    '</div>';
        wp_reset_postdata();

        return $html;
    }
}

stp_reg_shortcode('s7upf_blog','s7upf_vc_blog');

vc_map( array(
    "name"          => esc_html__("Blog", 'hama'),
    "base"          => "s7upf_blog",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'hama'),
    "description"   => esc_html__( 'Display blog page', 'hama' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Default Display",'hama'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("List",'hama')   => 'list',
                esc_html__("Grid",'hama')   => 'grid',
                ),
            ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Number post",'hama'),
            "param_name"    => "number",
            'description'   => esc_html__( 'Number of post display in this element. Default is 10.', 'hama' ),
            ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(List)",'hama'),
            "param_name"    => "size_list",
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
            ),
        array(
            'heading'       => esc_html__( 'List item style', 'hama' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'    => 'item_style_list',
            'value'         => s7upf_get_post_list_style(),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Show type filter",'hama'),
            "param_name"    => "check_type",
            "value"         => array(
                esc_html__("On",'hama')   => 'on',
                esc_html__("Off",'hama')   => 'off',
                ),
            'description'   => esc_html__( 'Show/hide type filter(list/grid) on blog page.', 'hama' ),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Show number filter",'hama'),
            "param_name"    => "check_number",
            "value"         => array(
                esc_html__("On",'hama')   => 'on',
                esc_html__("Off",'hama')   => 'off',
                ),
            'description'   => esc_html__( 'Show/hide number filter on blog page.', 'hama' ),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Blog Display",'hama'),
            "param_name"    => "blog_style",
            "value"         => array(
                esc_html__("Default",'hama')             => '',
                esc_html__("Load more button",'hama')    => 'load-more',
                ),
            ),        
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Grid Display",'hama'),
            "param_name"    => "grid_type",
            "value"         => array(
                esc_html__("Default",'hama')   => '',
                esc_html__("Masonry",'hama')   => 'list-masonry',
                ),
            'group'         => esc_html__('Grid Settings','hama'),
            ),        
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Grid Sub string excerpt",'hama'),
            "param_name"    => "excerpt",
            'group'         => esc_html__('Grid Settings','hama'),
            'description'   => esc_html__( 'Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.', 'hama' ),
            ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(Grid)",'hama'),
            "param_name"    => "size",
            'group'         => esc_html__('Grid Settings','hama'),
            'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'hama' ),
            ),
        array(
            'heading'       => esc_html__( 'Grid item style', 'hama' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'hama' ),
            'param_name'    => 'item_style',
            'value'         => s7upf_get_post_style(),            
            'group'         => esc_html__('Grid Settings','hama'),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Column",'hama'),
            "param_name"    => "column",
            "value"         => array(
                esc_html__("2 Column","hama")    => '2',
                esc_html__("3 Column","hama")    => '3',
                esc_html__("4 Column","hama")    => '4',
                esc_html__("5 Column","hama")    => '5',
                esc_html__("6 Column","hama")    => '6',
            ),
            'group'         => esc_html__('Grid Settings','hama'),
            ),
        array(
            'heading'       => esc_html__( 'Categories', 'hama' ),
            'type'          => 'checkbox',
            'param_name'    => 'cats',
            'value'         => s7upf_list_taxonomy('category',false)
            ),
        array(
            "type"          => "checkbox",
            "heading"       => esc_html__("Post Format",'hama'),
            "param_name"    => "post_formats",
            "value"         => array(
                esc_html__("Image","hama")          => 'post-format-image',
                esc_html__("Video","hama")          => 'post-format-video',
                esc_html__("Gallery","hama")        => 'post-format-gallery',
                esc_html__("Audio","hama")          => 'post-format-audio',
                esc_html__("Quote","hama")          => 'post-format-quote',
                ),
            'description'   => esc_html__( 'Choose post format to display. If empty is show all post.', 'hama' )
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order",'hama'),
            "param_name"    => "order",
            "value"         => array(
                esc_html__('Desc','hama') => 'DESC',
                esc_html__('Asc','hama')  => 'ASC',
                ),
            'edit_field_class'=>'vc_col-sm-6 vc_column'
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order By",'hama'),
            "param_name"    => "order_by",
            "value"         => s7upf_get_order_list(),
            'edit_field_class'=>'vc_col-sm-6 vc_column'
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
//Load more blog
add_action( 'wp_ajax_load_more_post', 's7upf_load_more_post' );
add_action( 'wp_ajax_nopriv_load_more_post', 's7upf_load_more_post' );
if(!function_exists('s7upf_load_more_post')){
    function s7upf_load_more_post() {
        $paged = $_POST['paged'];
        $load_data = $_POST['load_data'];
        $load_data = str_replace('\"', '"', $load_data);
        $load_data = str_replace('\/', '/', $load_data);
        $load_data = json_decode($load_data,true);
        extract($load_data);
        extract($attr);
        $args['posts_per_page'] = $number;
        $args['paged'] = $paged + 1;
        $query = new WP_Query($args);
        $count = 1;
        $count_query = $query->post_count;
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                s7upf_get_template_post($style.'/'.$style,$slug,$attr,true);
                $count++;
            }
        }
        wp_reset_postdata();
        die();
    }
}