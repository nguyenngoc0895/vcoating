<?php
if(empty($content)) $content = get_bloginfo('name', 'display');
?>
<div class="logo <?php echo esc_attr($el_class)?>">
    <div class="text-logo">
        <h1 class="color">
            <a href="<?php echo esc_url(get_home_url('/'))?>">
            	<?php echo wpb_js_remove_wpautop($content, false);?>
            </a>
        </h1>
    </div>
</div>
