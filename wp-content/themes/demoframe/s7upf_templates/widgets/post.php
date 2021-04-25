<div class="tab-header post">
        <ul id="tabs" class="title-tab text-center tab-mnu nav nav-tabs ">
            <li class="active" data-toggle="tab" href="#1">
                <?php echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($popular).'</h3>';;?>
            </li>
            <li class="" data-toggle="tab" href="#2">
                <?php echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($recent).'</h3>';;?>
            </li>
        </ul>
    </div>
<div class="tab-content-product tab-cont tab-content">
<?php
$i=1;
$r=1;
extract($instance);
$default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_270x180.png';
$image_size = s7upf_get_size_image('80x58',$image_size);
if($post_query->have_posts()) {
?>
    <div id="1" class="tab-pane active">
            <?php
            while($post_query->have_posts()) {
                $post_query->the_post(); ?>
                    <div class="item-pop-post table">
                        <div class="post-thumb banner-advst overlay-image zoom-image">
                            <a href="<?php the_permalink(); ?>" class="adv-thumb-link">
                                <?php
                                if(has_post_thumbnail()) the_post_thumbnail($image_size); else { ?><img src="<?php echo esc_url($default_thumbnail);?>"><?php }
                                ?>
                            </a>
                        </div>
                        <div class="post-info">
                            <?php the_title('<h3 class="title14"><a href="'.esc_url(get_the_permalink()).'">','</a></h3>')?>
                            <span class="silver"><?php echo get_the_date(get_option('date_format')); ?></span>
                        </div>
                    </div>
            <?php } wp_reset_postdata(); ?>
    </div>
<?php }
if($post_query_recent->have_posts()) {
?>
    <div id="2" class="tab-pane">
            <?php
            while($post_query_recent->have_posts()) {
                $post_query_recent->the_post(); ?>
                    <div class="item-pop-post table">
                        <div class="post-thumb banner-advst overlay-image zoom-image">
                            <a href="<?php the_permalink(); ?>" class="adv-thumb-link">
                                <?php
                                if(has_post_thumbnail()) the_post_thumbnail($image_size); else { ?><img src="<?php echo esc_url($default_thumbnail);?>"><?php }
                                ?>
                            </a>
                        </div>
                        <div class="post-info">
                            <?php the_title('<h3 class="title14"><a href="'.esc_url(get_the_permalink()).'">','</a></h3>')?>
                            <span class="silver"><?php echo get_the_date(get_option('date_format')); ?></span>
                        </div>
                    </div>
            <?php } wp_reset_postdata(); ?>
    </div>
<?php } ?>
</div>