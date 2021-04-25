<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item grid-style5"><?php endif;?>
<div class="item-post item-post-default style5">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
    <div class="post-info">
        <ul class="blog-total-info">
            <li class="date time-hd">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="silver"><?php the_time('d/m/Y');?></span>
            </li>           
        </ul>
        <h3 class="title18 post-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
        <?php
        $excerpt = get_the_excerpt();
            if (strlen($excerpt) > 180) {
                $excerpt = substr($excerpt, 0, 180);
                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                $excerpt .= '...';
            }
        ?>
        <p class="excerpt"><?php echo esc_attr($excerpt) ?></p>
        <div class="chitiet"><a href="<?php echo esc_url(get_the_permalink()) ?>" title="">Chi tiết</a></div>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>