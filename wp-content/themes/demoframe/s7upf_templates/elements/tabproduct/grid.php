<div class="tabs-block container block-element product-tab tab-block <?php echo esc_attr($el_class);?>">
    <div class="tab-header">
        <ul class="tab text-center tab-mnu nav nav-tabs ">
        <?php
        if(is_array($data)){
            foreach ($data as $key => $value) {
                $value = array_merge($default_val,$value);
                $attr_item = array(
                    'title' => $value['title'],
                ); 
                if ($key == '0') {
                          $active = 'active';
                }  else {
                    $active = '';
                }    
                ?>
                <li class="<?php echo esc_attr($active)?>">
                <a data-toggle="tab" href="#<?php echo esc_attr($key.$number_rand);?>">
                        <?php if(!empty($value['title'])) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($value['title']).'</h3>';;?>
                </a>
                </li>
            <?php }
        }?>
        </ul>
    </div>
    <div class="tab-content-product tab-cont tab-content">
    <?php
    if(is_array($data)){
        foreach ($data as $key => $value) {
            if ($key == '0') {
                $active = 'active';
            }  else {
                $active = '';
            }    
            $value = array_merge($default_val,$value);
            $size = $value['size'];
            if(!empty($size)) $size = explode('x', $size);
            $attr = array(
                'size'      => $size,
                'animation' => $value['animation'],
                'column'    => $value['column'],
                'item_style'=> $value['item_style'],
                'style'     => 'grid',
                'item_style_list'       => '',
                'time'      => $value['time'],
            );  
            $time = $attr['time'];
            $item_style = $attr['item_style'];
            $cats = $value['cats'];
                    $product_type = '';
                    if ($value['product_type'] !== '') {
                       $product_type = $value['product_type'];
                    }
                    $number = $value['number'];
                    $args = array(
                        'post_type'         => 'product',
                        'posts_per_page'    => $number,
                        );
                    if($product_type == 'trending'){
                        $args['meta_query'][] = array(
                                'key'     => 'trending_product',
                                'value'   => 'on',
                                'compare' => '=',
                            );
                    }
                    if($product_type == 'toprate'){
                        $args['meta_key'] = '_wc_average_rating';
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_query'] = WC()->query->get_meta_query();
                        $args['tax_query'][] = WC()->query->get_tax_query();
                    }
                    if($product_type == 'mostview'){
                        $args['meta_key'] = 'post_views';
                        $args['orderby'] = 'meta_value_num';
                    }
                    if($product_type == 'bestsell'){
                        $args['meta_key'] = 'total_sales';
                        $args['orderby'] = 'meta_value_num';
                    }
                    if($product_type=='onsale'){
                        $args['meta_query']['relation']= 'OR';
                        $args['meta_query'][]=array(
                            'key'   => '_sale_price',
                            'value' => 0,
                            'compare' => '>',                
                            'type'          => 'numeric'
                        );
                        $args['meta_query'][]=array(
                            'key'   => '_min_variation_sale_price',
                            'value' => 0,
                            'compare' => '>',                
                            'type'          => 'numeric'
                        );
                    }
                    if($product_type == 'featured'){
                        $args['tax_query'][] = array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                            'operator' => 'IN',
                        );
                    }
                    if(!empty($cats)) {
                        $custom_list = explode(",",$cats);
                        $args['tax_query'][]=array(
                            'taxonomy'=>'product_cat',
                            'field'=>'slug',
                            'terms'=> $custom_list
                        );
                    }
                    $product_query = new WP_Query($args);
                    $count = 1;
                    $count_query = $product_query->post_count;
                    $max_page = $product_query->max_num_pages;
            ?>
            <div id="<?php echo esc_attr($key.$number_rand);?>" class="tab-pane <?php echo esc_attr($active)?>">
                    <div class="products row list-product-wrap js-content-main">
                       <?php 
                       if($product_query->have_posts()) {
                        while($product_query->have_posts()) {
                            $product_query->the_post();
                            $attr['count'] = $count;
                            s7upf_get_template_woocommerce('loop/grid/grid',$item_style,$attr,true);
                            $count++;
                        }
                    }
                    ?>
                    </div>
            </div>
    <?php }}?>
    </div>
</div>