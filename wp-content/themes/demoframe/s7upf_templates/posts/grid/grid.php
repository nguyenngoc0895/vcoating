<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-default">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
    <div class="post-info">
        <h3 class="title18 post-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
        <?php
        $excerpt = get_the_excerpt();
            if (strlen($excerpt) > 100) {
                $excerpt = substr($excerpt, 0, 100);
                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                $excerpt .= '...';
            }
        ?>
        <p class="excerpt"><?php echo esc_attr($excerpt) ?></p>
        <ul>
            <li class="date"><i class="fa fa-calendar gray"></i><span class="silver"><?php echo get_the_date()?></span></li>
            <li class="comments"><i aria-hidden="true" class="fa fa-comment gray"></i>
                <a href="<?php echo esc_url( get_comments_link() ); ?>"><?php echo get_comments_number(); ?> 
                <?php 
                    if(get_comments_number() != 1) esc_html_e('Comments', 'hama') ;
                    else esc_html_e('Comment', 'hama') ;
                ?>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>