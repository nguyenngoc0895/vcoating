<?php
s7upf_set_post_view();
$thumb_class = 'col-md-6 col-sm-12 col-xs-12';
$info_class = 'col-md-6 col-sm-12 col-xs-12';
$zoom_style = s7upf_get_option('product_image_zoom');
global $product;
$thumb_id = array(get_post_thumbnail_id());
$attachment_ids = $product->get_gallery_image_ids();
$attachment_ids = array_merge($thumb_id,$attachment_ids);
$gallerys = ''; $i = 1;
foreach ( $attachment_ids as $attachment_id ) {
    $image_link = wp_get_attachment_url( $attachment_id );
    if($i == 1) $gallerys .= $image_link;
    else $gallerys .= ','.$image_link;
    $i++;
}
if (s7upf_get_option('show_image_lightbox') != "off") {
    $image_lightbox = 'image-lightbox';
}else {
    $image_lightbox = '';
}
?>
<div class="product-detail">
    <div class="row">
        <div class="<?php echo esc_attr($thumb_class)?>">
            <div class="detail-gallery">
                <div class="wrap-detail-gallery images <?php echo esc_attr($zoom_style)?>">
                    <div class="mid woocommerce-product-gallery__image <?php echo esc_attr($image_lightbox); ?>" data-gallery="<?php echo esc_attr($gallerys)?>">
                        <?php 
                        $html = get_the_post_thumbnail(get_the_ID(),'shop_single',array('class'=> 'wp-post-image'));
                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( get_the_ID() ) );
                        ?>
                    </div>
                    <?php
                    global $product;
                    $thumb_id = array(get_post_thumbnail_id());
                    $attachment_ids = $product->get_gallery_image_ids();
                    $attachment_ids = array_merge($thumb_id,$attachment_ids);
                    if ( $attachment_ids && has_post_thumbnail() && count($attachment_ids) > 1) {
                    ?>
                    <div class="gallery-control">
                        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                        <div class="carousel" data-visible="4">
                            <ul class="list-none">
                                <?php
                                $i = 1;
                                foreach ( $attachment_ids as $attachment_id ) {
                                    if($i == 1) $active = 'active';
                                    else $active = '';
                                    $attributes      = array(
                                        'data-src'      => wp_get_attachment_image_url( $attachment_id, 'shop_single' ),
                                        'data-srcset'   => wp_get_attachment_image_srcset( $attachment_id, 'shop_single' ),
                                        'data-srcfull'  => wp_get_attachment_image_url( $attachment_id, 'full' ),
                                        );
                                    $html = wp_get_attachment_image($attachment_id,'shop_thumbnail',false,$attributes );
                                    echo   '<li data-number="'.esc_attr($i).'">
                                                <a title="'.esc_attr( get_the_title( $attachment_id ) ).'" class="'.esc_attr($active).'" href="#">
                                                    '.apply_filters( 'woocommerce_single_product_image_thumbnail_html',$html,$attachment_id).'
                                                </a>
                                            </li>';
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>
                        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <?php
                        do_action( 'woocommerce_product_thumbnails' );
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr($info_class)?>">
            <div class="summary entry-summary detail-info">
                <h2 class="product-title title24"><?php the_title()?></h2>
                <?php if (is_product()) : ?>
                    <?php if (s7upf_product_deals()!='') { ?>   
                        <div class="deals-down">
                            <div class="box-count-down text-center">
                                <div class="content-deal-countdown" data-date="<?php echo s7upf_product_deals(); ?>"></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endif;?>
                <?php
                    woocommerce_template_single_rating();
                    woocommerce_template_single_meta();
                ?>
                <div class="availability">
                    <?php 
                        if ( method_exists( $product, 'get_stock_status' ) ) {
                            $stock_status = $product->get_stock_status(); 
                        } else {
                            $stock_status = $product->stock_status; 
                        }
                        echo '<span>'.esc_html("Availability: ","hama").'</span>'.$stock_status;
                    ?>
                </div>
                <?php
                    echo '<span class="price">'.esc_html("Price: ","hama").'</span>';
                    woocommerce_template_single_price();
                    do_action( 'woocommerce_single_product_summary' );
                ?>
                <div class="icon">
                    <?php 
                        if (!is_product()) : 
                            echo s7upf_wishlist_url();
                            echo s7upf_compare_url();
                        endif;
                    ?>
                    <?php    
                        s7upf_get_template( 'share','',false,true );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-tag">
<?php echo wc_get_product_tag_list( $product->get_id(), ' ', '<span class="tagged_as"><i class="fa fa-tags" aria-hidden="true"></i><label>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'hama' ) . '</label><div class="meta-item-list">', '</div></span>' ); ?>
</div>