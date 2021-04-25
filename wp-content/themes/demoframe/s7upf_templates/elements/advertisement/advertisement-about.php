<div class="banner-advs style-about <?php echo esc_attr($el_class);?>">
	
    <?php 
	    echo wp_get_attachment_image($image,$size);
	    echo wp_get_attachment_image($image2,$size);
    ?>

	<?php if(!empty($content)):?>
	    <div class="banner-info <?php echo esc_attr($el_class2);?>">
	    	<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
	    	<?php echo wpb_js_remove_wpautop($content, true);?>
	    		<?php if(!empty($link)) echo '</a>';?>
	    </div>
	<?php endif;?>
</div>