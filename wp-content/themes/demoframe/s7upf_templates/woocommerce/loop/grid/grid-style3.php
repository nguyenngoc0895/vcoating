<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(270,270);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid style2_product style3_product">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<div class="img-lable">
				<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			</div>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
		</div>
		<div class="product-info">
			<?php
				if ( count(get_attributes_product()) ) {
					foreach ( get_attributes_product() as $sanPham ) {
						?>
						<div class="vc_attribute_product">
						<p class="vc_attribute_name"><?php echo $sanPham['name']; ?></p>
						<p class="vc_attribute_options"><?php echo $sanPham['options'][0]; ?></p>
						</div>
						<?php
					}
				}
			?>
		</div>		
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		
	</div>
</div>