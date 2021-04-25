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
                    $value = array_merge($default_val,$value);
                    $attr = array(
                        'size'      => $value['size'],
                        'column'    => $value['column'],
                        'item_style'=> $value['item_style'],
                        'style'     => 'grid',
                        'item_style_list'       => '',
                        'time'      => $value['time'],
                    );  
                    $animation = $value['animation'];
                    $size = $attr['size'];
                    $time = $attr['time'];
                    $item_style = $attr['item_style'];
                    if(!empty($size)) $size = explode('x', $size);
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
            <?php
                if(empty($item)) $item = '4';
                if(empty($item) && empty($item_res)) $item_res = '0:1,480:2,767:3,990:4';
                $attr = array(
                    'size'      => $size,
                    'animation' => $animation,
                    'row_number'=> $row_number,
                    );
                if ($key == '0') {
                          $active = 'active';
                }  else {
                    $active = '';
                }   
                ?>
                <div id="<?php echo esc_attr($key.$number_rand);?>" class="tab-pane <?php echo esc_attr($active)?>">
                    <?php    
                        if ($item_style == 'style7') {
                            $item_res = '0:1,600:1,1000:1';
                            $item ='1';
                        }
                    ?>
                    <div class="list-product-wrap">
                        <div class="wrap-item smart-slider <?php echo esc_attr($slider_navi)?> <?php echo esc_attr($slider_pagi)?>" 
                            data-item="<?php echo esc_attr($item)?>" data-speed="<?php echo esc_attr($speed);?>" 
                            data-itemres="<?php echo esc_attr($item_res)?>" 
                            data-prev="" data-next="" 
                            data-pagination="<?php echo esc_attr($slider_pagi)?>" data-navigation="<?php echo esc_attr($slider_navi)?>">
                            <?php 
                                if($product_query->have_posts()) {
                                    if ($item_style !== 'style7') {
                                        while($product_query->have_posts()) {
                                            $product_query->the_post();
                                            $attr['count'] = $count;
                                            if($count % (int)$row_number == 1 || (int)$row_number == 1) echo '<div class="item">';
                                            s7upf_get_template_woocommerce('loop/grid/grid',$item_style,$attr,true);
                                            if($count % (int)$row_number == 0 || (int)$row_number == 1 || $count == $count_query) echo '</div>';
                                            $count++;
                                        }
                                    }else {
                                        $row_number = '4';
                                        $product_item = '';
                                        $product_item = $row_number*$row_style7;
                                        while($product_query->have_posts()) {
                                            $product_query->the_post();
                                            $special = array($position_special1,$position_special2,$position_special3,$position_special4,$position_special5,$position_special6,$position_special7);
                                            $position = '';
                                            $attr['count'] = $count;
                                            $count_row = '';
                                            $count_row = $count;
                                            $du = $count_row % 4;
                                            if($du > 0){
                                                $count_row = $du;
                                            }else{
                                                $count_row = 4;
                                            }
                                            $dem = $count;
                                            $dem = ceil($count/4);
                                            if ($dem == 1) {
                                                $position = $special[0];
                                            }elseif ($dem == 2) {
                                                $position = $special[1];
                                            }
                                            elseif ($dem == 3) {
                                                $position = $special[2];
                                            }elseif ($dem == 4) {
                                                $position = $special[3];
                                            }
                                            elseif ($dem == 5) {
                                                $position = $special[4];
                                            }
                                            elseif ($dem == 6) {
                                                $position = $special[5];
                                            }elseif ($dem == 7) {
                                                $position = $special[6];
                                            }
                                            else {
                                                $position = $special[1];
                                            }
                                            if($count % (int)$product_item == 1 || (int)$product_item == 1) echo '<div class="item">';
                                            if($count % (int)$row_number == 1 || (int)$row_number == 1) echo '<div class="row">';
                                            if($count_row == $position ){
                                                $attr = array(
                                                    'size'      => $size,
                                                    'animation' => $animation,
                                                    'row_number'=> 'special',
                                                );
                                            }elseif ($count_row !== $position ) {
                                                $attr = array(
                                                    'size'      => $size,
                                                    'animation' => $animation,
                                                    'row_number'=> $row_number,
                                                );
                                            }
                                            s7upf_get_template_woocommerce('loop/grid/grid',$item_style,$attr,true);
                                            if($count % (int)$row_number == 0 || (int)$row_number == 1 || $count == $count_query) echo '</div>';
                                            if($count % (int)$product_item == 0 || (int)$product_item == 1 || $count == $count_query) echo '</div>';
                                            $count++;
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php }}?>
    </div>
</div>