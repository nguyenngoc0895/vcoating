<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 26/02/2018
 * Time: 9:16 SA
 */
$i=1;
$animation = s7upf_get_option('shop_thumb_animation');
if($query->have_posts()) {

    if ( ! empty( $instance['title'] ) ) {
        echo wp_kses_post($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    ?>
    <div class="wg-product-slider">
        <div class="wrap-item smart-slider group-navi" data-pagination="" data-navigation="true" data-itemscustom="0:1,560:2,768:1">
        <?php  while ($query->have_posts()) {
            $query->the_post(); ?>
            <?php if($i % (int)$number_row == 1 || $number_row == 1 ) echo '<div class="item">'; ?>
                <div class="item-wg-product table">
                    <div class="table-thumb">
                        <div class="product-thumb">
                            <?php s7upf_woocommerce_thumbnail_loop($image_size,$animation);?>
                            <?php s7upf_product_quickview()?>
                        </div>
                    </div>
                    <div class="product-info">
                        <?php the_title(' <h3 class="product-title"><a href="'.esc_url(get_the_permalink()).'">','</a></h3>')?>
                        <?php s7upf_get_price_html()?>
                        <?php s7upf_get_rating_html()?>
                    </div>
                </div>
            <?php if($i % (int)$number_row == 0 || $i == $count_post || $number_row == 1) echo '</div>';
            $i= $i+1;
        }
        ?>
        </div>
    </div>

<?php } wp_reset_postdata();