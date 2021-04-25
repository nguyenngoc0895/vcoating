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
                        <div class="img-cat">                            
                            <?php if(!empty($value['cats'])):?>
                                <a href="<?php echo home_url() ?>/product-category/<?php echo esc_attr($value['cats']); ?>">
                                <?php endif;?>
                                <h3 class="name"><?php echo esc_attr($value['cats']); ?></h3>
                                <?php 
                                    $taxonomyName = "product_cat"; 
                                    $parent_terms = get_terms($taxonomyName, array('slug' => $value['cats'], 'hide_empty' => false));
                                    foreach ($parent_terms as $pterm) {
                                        if ($value['image']=='') {
                                        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
                                        $image = wp_get_attachment_url($thumbnail_id);
                                        echo "<img src='{$image}' width='{$size[0]}' height='{$size[1]}' />";
                                        }
                                        else {
                                            echo wp_get_attachment_image($value['image'],$size,false);
                                        }
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