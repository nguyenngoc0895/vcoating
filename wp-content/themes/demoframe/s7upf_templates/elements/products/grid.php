<?php
$attr = array(
	'size'		=> $size,
	'animation'	=> $animation,
    'column'    => $column,
	'item_style'=> $item_style,
	'style'		=> 'grid',
	'item_style_list'		=> '',
    'image_style2' => $image_style2,
    'cats'      => $cats,
	);

?>
<div class="block-element <?php echo esc_attr($el_class);?> js-content-wrap">
    <?php 
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
    ?>
    <?php if ($time!='') { ?>   
        <div class="box-count-down text-center">
            <div class="content-deal-countdown" data-date="<?php echo esc_attr($time); ?>"></div>
        </div>
    <?php } ?>
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
	<?php
	if($pagination == 'load-more' && $max_page > 1){
        $data_load = array(
            "args"        => $args,
            "attr"        => $attr,
            );
        $data_loadjs = json_encode($data_load);
        echo    '<div class="btn-loadmore">
                    <a href="#" class="product-loadmore loadmore" 
                        data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                        data-maxpage="'.esc_attr($max_page).'">
                        '.esc_html__("Load more","hama").'
                    </a>
                </div>';
    }
    if($pagination == 'pagination') s7upf_get_template_woocommerce('loop/pagination','',array('wp_query'=>$product_query),true);
	?>
</div>