<div class="block-element search1 block-search-element <?php echo esc_attr($el_class)?>">
    <?php if(!empty($title)):?>
        <h3 class="title18 font-bold text-uppercase"><?php echo esc_html($title)?></h3>
    <?php endif?>
    <form class="search-form <?php echo esc_attr($el_class)?> live-search-<?php echo esc_attr($live_search)?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if($show_cat !== 'off' && !empty($search_in)):?>
            <div class="dropdown-box">
                <span class="dropdown-link current-search-cat"><?php esc_html_e("All Categories","hama")?></span>
                <ul class="list-none dropdown-list">
                    <li class="active"><a class="select-cat-search" href="#" data-filter=""><?php esc_html_e("All Categories",'hama')?></a></li>
                    <?php
                        $taxonomy = 'category';
                        $tax_key = 'category_name';
                        if($search_in == 'product') $taxonomy = $tax_key = 'product_cat';
                        if(!empty($cats)){
                            $custom_list = explode(",",$cats);
                            foreach ($custom_list as $key => $cat) {
                                $term = get_term_by( 'slug',$cat, $taxonomy );
                                if(!empty($term) && is_object($term)){
                                    if(!empty($term) && is_object($term)){
                                        echo '<li><a class="select-cat-search" href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
                                    }
                                }
                            }
                        }
                        else{
                            $product_cat_list = get_terms($taxonomy);
                            if(is_array($product_cat_list) && !empty($product_cat_list)){
                                foreach ($product_cat_list as $cat) {
                                    echo '<li><a class="select-cat-search" href="#" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
            <input class="cat-value" type="hidden" name="<?php echo esc_attr($tax_key)?>" value="" />
        <?php endif;?>
        <input name="s" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="<?php echo esc_attr($search_val);?>" type="text">
        <?php if(!empty($search_in)):?>
            <input type="hidden" name="post_type" value="<?php echo esc_attr($search_in)?>" />
        <?php endif;?>
        <div class="list-product-search">
            <p class="text-center"><?php esc_html_e("Please enter key search to display results.","hama")?></p>
        </div>
    </form>
    <div class="submit-icon-search">
    </div>
    <div class="submit-icon-search-close">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 224.512 224.512" style="enable-background:new 0 0 224.512 224.512;" xml:space="preserve">
            <g>
                <polygon points="224.507,6.997 217.521,0 112.256,105.258 6.998,0 0.005,6.997 105.263,112.254 
                0.005,217.512 6.998,224.512 112.256,119.24 217.521,224.512 224.507,217.512 119.249,112.254  "/>
            </g>
        </svg>
    </div>
</div>
