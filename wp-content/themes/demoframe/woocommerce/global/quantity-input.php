<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<label class="navi qty-label"><?php esc_html_e("Qty","hama")?></label>
<div class="detail-qty info-qty border radius6">
	<a href="#" class="qty-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<input type="text" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'hama' ) ?>" class="input-text text qty qty-val" size="4" />
	<a href="#" class="qty-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php if (is_product()) : ?>
    <?php if (s7upf_get_option('show_size_chart') != "off") { ?>
        <?php if (s7upf_get_option('img_size_chart')['background-image'] != "") { ?>
            <div class="size_chart">
                <span class="ruler"></span>
                <a class="click-chart" href="javascript:void(0)"><?php echo esc_html("Size Chart","hama"); ?></a>
                <div class="size_chart_img">
                    <div class="img">
                        <span class="close">X</span>
                        <img src="<?php echo s7upf_get_option('img_size_chart')['background-image']; ?>" alt="<?php echo esc_attr__('size_chart','hama'); ?>">
                    </div>
                    <div class="fuzzy_size_chart"></div>
                </div>
            </div>
    <?php }} ?>
<?php endif;?>