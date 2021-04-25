<?php
    if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
    else $col_class = ''; 
?>
<div class="category <?php echo esc_attr($el_class)?> <?php echo esc_attr($style) ?>">
    <?php    
    if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item">
        <div class="block-payment text-right">
            <div class="item-cat-list">
                <?php
                if(is_array($data)){
                    foreach ($data as $key => $value) {
                        $value = array_merge($default_val,$value);
                        $attr_item = array(
                            'image' => $value['image'],
                            'cats' => $value['cats'],
                        );
                        ?>
                        <div class="img-cat <?php echo esc_attr($col_class); ?>">                            
                            <?php if(!empty($value['cats'])):?>
                                <a href="<?php echo home_url() ?>/product-category/<?php echo esc_attr($value['cats']); ?>">
                                <?php endif;?>
                                <?php 
                                    $taxonomyName = "product_cat"; 
                                    $parent_terms = get_terms($taxonomyName, array('slug' => $value['cats'], 'hide_empty' => false));
                                    foreach ($parent_terms as $pterm) {
                                        echo '<div class="text-img">';
                                        echo '<div class="text">';
                                        echo '<h3 class="name">'.esc_attr($pterm->name).'</h3>';
                                        $args = array(
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'slug',
                                                    'terms' => $pterm->slug
                                                )
                                            ),
                                        );
                                        $product_query = new WP_Query( $args );
                                        $total_sales = 0;
                                        if($product_query->have_posts()) {
                                            while ( $product_query->have_posts() ) {
                                                $product_query->the_post();
                                                $total_sales += s7upf_total_sales();
                                            }
                                        }
                                        echo  '<h4 class="buyers">'.esc_attr($total_sales).esc_html__(" Buyers","hama").'</h4>';
                                        wp_reset_postdata();
                                        echo '</div>';
                                        echo '<div class="image">';
                                        if ($value['image']=='') {
                                        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
                                        $image = wp_get_attachment_url($thumbnail_id);
                                            if ($size == 'full') {
                                                echo "<img src='{$image}' alt />";
                                            }else{
                                                echo "<img src='{$image}' width='{$size[0]}' height='{$size[1]}' alt />";
                                            }
                                        }
                                        else {
                                            echo wp_get_attachment_image($value['image'],$size,false);
                                        }
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                ?>
                                <?php if(!empty($value['cats'])):?>
                                </a>
                            <?php endif;?>                           
                        </div>
                        <?php }
                    }?>
                </div>
            </div>
        </div>
    </div>