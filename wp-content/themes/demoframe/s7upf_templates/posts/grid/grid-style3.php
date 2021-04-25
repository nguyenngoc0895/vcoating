<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-default home">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a target="_blank" href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
    <div class="post-info home_blog">
        <h3 class="title18 post-title">
            <a target="_blank" href="<?php echo esc_url(get_the_permalink()) ?>">
                <?php the_title()?>             
            </a>
        </h3>
    </div>
</div>

<?php if(isset($column)):?></div><?php endif;?>
