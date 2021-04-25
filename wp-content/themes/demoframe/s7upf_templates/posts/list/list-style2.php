<?php
if(empty($size_list)) $size_list = array(400,400);
$c_class = 'col-md-6 col-sm-6 col-xs-12';
if(!has_post_thumbnail()) $c_class = 'col-md-12 col-sm-12 col-xs-12';
global $post;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="item-post item-post-list item-style2 list-style1">
            <?php if(has_post_thumbnail()):?>
                <div class="img-post">
                    <div class="post-thumb banner-advs zoom-image overlay-image">
                        <a href="<?php echo esc_url(get_the_permalink())?>" class="adv-thumb-link">
                            <?php echo get_the_post_thumbnail(get_the_ID(),$size_list)?>
                        </a>
                    </div>
                </div>
            <?php endif;?>
            <div class="info">
                <div class="post-info">
                    <h3 class="title24 post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title()?></a></h3>
                    <ul class="blog-total-info">
                        <li class="date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span class="silver"><?php echo get_the_date()?></span></li>
                        <li class="author">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></li>
                        <li class="comments">
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                            <a href="<?php echo esc_url( get_comments_link() ); ?>"><?php echo get_comments_number(); ?> 
                            <?php 
                                if(get_comments_number() != 1) esc_html_e('Comments', 'hama') ;
                                else esc_html_e('Comment', 'hama') ;
                            ?>
                            </a>
                        </li>
                    </ul>
                    <?php if(has_excerpt() || !empty($post->post_content)):?><p class="desc"><?php echo get_the_excerpt();?></p><?php endif;?>
                    <div class="detail">
                        <?php 
                                $tags = get_the_tag_list(' ',' ',' ');
                                if($tags):?>
                                <div class="tag block-tag">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span><?php esc_html_e("Tags : ",'hama');?></span>
                                    <div>
                                        <?php $tags = get_the_tag_list(' ',' ',' ');?>
                                        <?php if($tags) echo apply_filters('s7upf_output_content',$tags); else esc_html_e("No Tag",'hama');?>
                                    </div>
                                </div>
                        <?php endif;?>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-detail"><span><?php echo esc_html__("Read More","hama"); ?></span></a>
                    </div>
                </div>
            </div>
    </div>
</div>