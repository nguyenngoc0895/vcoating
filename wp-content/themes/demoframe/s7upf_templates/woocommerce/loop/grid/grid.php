<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(270,270);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<div class="wrap-item smart-slider product-grid-gallery" 
        		data-item="3" data-speed="" 
        		data-itemres="0:2,600:2,1000:3" 
        		data-prev="" data-next="" 
        		data-pagination="" data-navigation="true">
				<?php
					$i = 1;
					global $product;
					$id = $product->get_id();
					$product= wc_get_product( $id );
					$attachment_ids = $product->get_gallery_image_ids();
					if ( has_post_thumbnail() ) {
					foreach ( $attachment_ids as $attachment_id ) {
						$i++;
					}
					}
				?>
				<?php if ($i > 1) { ?>
					<a href="javascript:void(0)" class="active" >
						<figure class="woocommerce-product-gallery__image list_images">
	                    	<?php echo get_the_post_thumbnail(get_the_ID(),$size); ?>
	                    </figure>
					</a>
				<?php } ?>
				<?php
					if ( has_post_thumbnail() ) {
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<a href="javascript:void(0)"><figure class="woocommerce-product-gallery__image list_images">' . wp_get_attachment_image( $attachment_id, 'shop_single' ) . '</figure></a>';
					}
					}
				?>
			</div>	
			<?php s7upf_product_label()?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
		</div>
		
		<div class="product-info">
			<h3 class="title14 product-title">
				<a title="<?php echo esc_attr(get_the_title())?>" href="<?php the_permalink()?>"><?php the_title()?></a>
			</h3>
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
			<?php s7upf_get_price_html()?>
			<?php s7upf_get_rating_html()?>
			<div class="product-extra-link">
				<?php s7upf_addtocart_link();?>
			</div>
			<div class="detail">
				<a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-detail"><span><?php echo esc_html__("More Detail","hama"); ?></span></a>
			</div>
			<div class="list-product-extra-link">
				<?php echo s7upf_wishlist_url(); ?>
				<?php echo s7upf_compare_url(); ?>
				<?php s7upf_product_quickview()?>
			</div>
		</div>		
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>
