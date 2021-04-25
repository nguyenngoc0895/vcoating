<div class="logo <?php echo esc_attr($el_class)?>">
    <h1 class="hidden"><?php echo get_bloginfo('name', 'display')?></h1>
    <a href="<?php echo esc_url(get_home_url('/'))?>">
    	<?php echo wp_get_attachment_image( $logo_img ,"full")?>
    </a>   
</div>