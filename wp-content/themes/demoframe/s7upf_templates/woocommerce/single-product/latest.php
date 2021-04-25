<?php
global $product;
extract(s7upf_show_single_product_data());
if($show_latest == 'on'):?>  
    <div class="related-product">
        <h2 class="title18 font-bold text-uppercase single-title"><?php esc_html_e("Latest products","hama")?></h2>
        <div class="product-slider">
            <?php echo '<div class="wrap-item group-navi smart-slider" data-item="" data-speed="" data-itemres="'.esc_attr($item_res).'" data-prev="" data-next="" data-pagination="" data-navigation="true">';?>
                <?php
                    $args = array(
                        'post_type'           => 'product',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page'      => $number,
                        'post__not_in'        => array( $product->get_id() ),
                        'orderby'             => 'date'
                    );
                    $products = new WP_Query( $args );
                    if ( $products->have_posts() ) :
                        while ( $products->have_posts() ) : 
                            $products->the_post();                                  
                            s7upf_get_template_woocommerce('loop/grid/grid',$item_style,array('size'=>$size),true);
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php endif;?>