<?php
if(empty($item)) $item = '4';
if(empty($item) && empty($item_res)) $item_res = '0:1,480:2,767:3,990:4';
$attr = array(
    'size'      => $size,
    'animation' => $animation,
    'row_number'=> $row_number,
    );
?>
<div class="block-element <?php echo esc_attr($el_class);?> js-content-wrap">
    <?php    
        if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
        if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
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