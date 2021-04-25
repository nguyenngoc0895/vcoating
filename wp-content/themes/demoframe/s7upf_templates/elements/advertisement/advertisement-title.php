<?php if ($text_alignment == '1') { ?>
<div class="banner-advs banner-text-image <?php echo esc_attr($el_class);?>">
	<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
    <?php 
	    echo wp_get_attachment_image($image,$size);
	    echo wp_get_attachment_image($image2,$size);
    ?>
	<?php if(!empty($link)) echo '</a>';?>
	<?php if(!empty($content)):?>
	    <div class="banner-text <?php echo esc_attr($el_class2);?>">
	    	<div class="text">
	    		<?php echo wpb_js_remove_wpautop($content, true);?>
	    	</div>
	    </div>
	<?php endif;?>
</div>
<?php }else{ ?>
<div class="banner-advs banner-text-image <?php echo esc_attr($el_class);?>">
	<?php if(!empty($content)):?>
	    <div class="banner-text <?php echo esc_attr($el_class2);?>">
	    	<div class="text">
	    		<?php echo wpb_js_remove_wpautop($content, true);?>
	    	</div>
	    </div>
	<?php endif;?>
	<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
    <?php 
	    echo wp_get_attachment_image($image,$size);
	    echo wp_get_attachment_image($image2,$size);
    ?>
	<?php if(!empty($link)) echo '</a>';?>
</div>
<?php } ?>