<div class="item-slider <?php echo esc_attr($el_class)?>">
    <div class="banner-thumb">
        <?php echo wp_get_attachment_image($image,'full')?>
    </div>
    <div class="banner-info">
        <div class="container">
            <div class="slider-content-text <?php echo esc_attr($info_class)?>" data-animated="<?php echo esc_attr($info_animation)?>">
                <?php echo wpb_js_remove_wpautop($content, true)?>
            </div>
        </div>
    </div>
</div>