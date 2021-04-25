<?php
$image_size = s7upf_get_size_image('full',$image_size);
?>
<div class="video-about16 banner-advst zoom-image <?php echo esc_attr($el_class);?>" <?php if(!empty($animation_time)) echo 'data-wow-delay="'.$animation_time.'s"'?>>
    <a href="<?php echo esc_url($link_video); ?>" class="adv-thumb-link video-popup-fancybox">
       <?php echo wp_get_attachment_image($image,$image_size); ?>
    </a>
</div>