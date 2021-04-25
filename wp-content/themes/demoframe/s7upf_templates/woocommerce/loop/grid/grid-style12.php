<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(270,270);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid icon style2_product">
		<div class="vc_row wpb_row">
			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
			<div class="product-thumb col-sm-6">
				<div class="img-lable">
					<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
					<?php s7upf_product_label()?>
					<div class="list-product-extra-link">
						<?php s7upf_product_quickview()?>
						<?php echo s7upf_compare_url();?>
						<?php echo s7upf_wishlist_url();?>
					</div>
				</div>
				<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
			</div>
			<div class="product-info col-sm-6">
				<?php if ($image_style2 == 'yes'):?>
				<div class="bran-img">
					<a href="<?php echo home_url() ?>/product-category/<?php echo esc_attr($cats); ?>">
					<?php  
						$taxonomyName = "product_cat"; 
						$parent_terms = get_terms($taxonomyName, array('slug' => $cats, 'hide_empty' => false));
						foreach ($parent_terms as $pterm) {
							$thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url($thumbnail_id);
                                    echo "<img src='{$image}' alt />";
                        }
					?>
					</a>
				</div>
				<?php endif; ?>
				<h3 class="title14 product-title">
					<a title="<?php echo esc_attr(get_the_title())?>" href="<?php the_permalink()?>"><?php the_title()?></a>
				</h3>
				<?php do_action( 'woocommerce_shop_loop_item_title' );?>
				<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
				<?php s7upf_get_price_html()?>
				<?php s7upf_get_rating_html()?>
				<p>
				<?php
		        $excerpt = get_the_excerpt();
		            if (strlen($excerpt) > 60) {
		                $excerpt = substr($excerpt, 0, 60);
		                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		                $excerpt .= '...';
		            }
		        echo esc_attr($excerpt)
		        ?>
		        </p>
		        <div class="adtocart_detail">
					<div class="product-extra-link">
						<?php s7upf_addtocart_link();?>
					</div>
					<div class="detail">
						<a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-detail"><span><?php echo esc_html__("More Detail","hama"); ?></span></a>
					</div>
				</div>
			</div>		
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		</div>
	</div>
</div>