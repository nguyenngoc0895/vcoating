<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(270,270);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid icon style8_product">
		<div class="vc_row wpb_row">
			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
			<div class="product-thumb col-sm-6">
				<div class="img-lable">
					<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
					<div class="list-product-extra-link">
						<?php s7upf_product_quickview()?>
						<?php echo s7upf_compare_url();?>
						<?php echo s7upf_wishlist_url();?>
					</div>
				</div>
				<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
			</div>
			<div class="product-info col-sm-6">
				<h3 class="title14 product-title">
					<a title="<?php echo esc_attr(get_the_title())?>" href="<?php the_permalink()?>"><?php the_title()?></a>
				</h3>
				<?php do_action( 'woocommerce_shop_loop_item_title' );?>
				<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
				<div class="lable-price">
					<?php s7upf_product_label()?>
					<?php s7upf_get_price_html()?>
				</div>
		        <div class="adtocart_detail">
					<div class="product-extra-link">
						<?php s7upf_addtocart_link();?>
					</div>
				</div>
			</div>		
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		</div>
	</div>
</div>