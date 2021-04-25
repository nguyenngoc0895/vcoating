<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$style          = s7upf_get_option('shop_default_style','grid');
$grid_type      = s7upf_get_option('shop_grid_type');
$item_style     = s7upf_get_option('shop_grid_item_style');
$item_style_list= s7upf_get_option('shop_list_item_style');
$column         = s7upf_get_option('shop_grid_column',3);
$size           = s7upf_get_option('shop_grid_size');
$size_list      = s7upf_get_option('shop_list_size');
$animation      = s7upf_get_option('shop_thumb_animation');
if(isset($_GET['type'])) $style = $_GET['type'];
if(!empty($size)) $size = explode('x', $size);
if(!empty($size_list)) $size_list = explode('x', $size_list);
$slug = $item_style;
if($style == 'list') $slug = $item_style_list;
$attr  = array(
	'size'		=> $size,
	'size_list'	=> $size_list,
	'column'	=> $column,
	'animation'	=> $animation,
	);
?>
<?php s7upf_get_template_woocommerce('loop/'.$style.'/'.$style,$slug,$attr,true);?>
