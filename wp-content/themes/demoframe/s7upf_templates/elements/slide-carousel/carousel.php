<div class="banner-slider <?php echo esc_attr($el_class)?>">
	<?php 
	    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
	    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item sv-slider <?php echo esc_attr($navigation.' '.$pagination)?>" 
        data-item="<?php echo esc_attr($item)?>" data-speed="<?php echo esc_attr($speed)?>" 
        data-itemres="<?php echo esc_attr($itemres)?>" data-animation="<?php echo esc_attr($animation)?>" 
        data-navigation="<?php echo esc_attr($navigation)?>" data-pagination="<?php echo esc_attr($pagination)?>" 
        data-prev="<?php echo esc_attr($nav_prev)?>" data-next="<?php echo esc_attr($nav_next)?>">

		<?php echo wpb_js_remove_wpautop($content, false);?>
		
    </div>
</div>