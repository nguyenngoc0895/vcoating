<?php
global $post;
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size_list)) $size_list = array(370,370);
$col_class = 'col-md-12 col-sm-12 col-xs-12';
?>
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-list">
		<div class="row">
			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
			<div class="col-md-4 col-sm-5 col-xs-12">
				<div class="product-thumb">
					<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
					<?php s7upf_woocommerce_thumbnail_loop($size_list,$animation);?>
					<?php s7upf_product_quickview()?>
					<?php s7upf_product_label()?>
					<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-12">
				<div class="product-info">
					<h3 class="title18 product-title">
						<a title="<?php echo esc_attr(get_the_title())?>" href="<?php the_permalink()?>"><?php the_title()?></a>
					</h3>
					<?php do_action( 'woocommerce_shop_loop_item_title' );?>
					<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
					<?php s7upf_get_price_html()?>
					<?php s7upf_get_rating_html()?>
					<div class="desc">
						<?php
				        $excerpt = get_the_excerpt();
				            if (strlen($excerpt) > 100) {
				                $excerpt = substr($excerpt, 0, 100);
				                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
				                $excerpt .= '...';
				            }
				        ?>
				        <p class="excerpt"><?php echo esc_attr($excerpt) ?></p>
					</div>
					<div class="adtocart_detail">
						<div class="product-extra-link">
							<?php s7upf_addtocart_link();?>
						</div>
						<div class="detail">
							<a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-detail"><span><?php echo esc_html__("More Detail","hama"); ?></span></a>
						</div>
					</div>
				</div>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		</div>
	</div>
</div>