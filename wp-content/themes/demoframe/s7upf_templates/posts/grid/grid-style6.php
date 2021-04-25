<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item grid-style4 style6"><?php endif;?>
<div class="item-post item-post-default style4 style6">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
    <div class="post-info">
        <div class="xemchitietv"><a href="<?php echo esc_url(get_the_permalink()) ?>" title="">Xem chi tiết</a></div>
        <ul class="share">
            <li><span>Share:</span></li>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="gg"><a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="http://twitter.com/share?text=&url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

        </ul>
        <h3 class="title18 post-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
        <?php
        $excerpt = get_the_excerpt();
            if (strlen($excerpt) > 185) {
                $excerpt = substr($excerpt, 0, 185);
                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                $excerpt .= '...';
            }
        ?>
        <p class="excerpt"><?php echo esc_attr($excerpt) ?></p>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>