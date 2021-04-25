<?php    
$id = get_the_ID();
if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
if($id) $title  = get_the_title($id);
else $title = esc_html__("Blog","hama");
if(is_archive()) $title = get_the_archive_title();
if(is_search()) $title = esc_html__("Search Result","hama");
if(s7upf_is_woocommerce_page()) $title = woocommerce_page_title(false);
if(s7upf_is_woocommerce_page()) $id = get_option( 'woocommerce_shop_page_id' );
?>
<?php if($check_type == 'off' && $check_number == 'off' && get_post_meta(get_the_ID(),'show_title_page',true) == 'off' ):?>

<?php else: ?>
    <div class="title-page clearfix">
        <?php   if(get_post_meta($id,'show_title_page',true) != 'off'):?>
            <h2 class="title18 font-bold text-uppercase pull-left"><?php echo esc_html($title)?></h2>
        <?php   endif;?>
        <?php if($check_type == 'on' || $check_number == 'on'):?>
            <ul class="sort-pagi-bar list-inline-block pull-right">
                <?php
                    global $post,$wp_query;
                    if(!isset($check_order)) $check_order = false;
                    if(function_exists('is_shop')) if(is_shop()) $check_order = true;
                    if(isset($post->post_content)) if(strpos($post->post_content, '[sv_shop')) $check_order = true;
                    if($check_order == true) $add_class = 'load-shop-ajax';
                    else $add_class = '';
                    $orderby = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
                    if(isset($_GET['orderby']))$orderby = $_GET['orderby'];
                    if($check_order):?>
                        <li>
                            <div class="sort-by">
                                <div class="select-box inline-block">
                                    <?php s7upf_catalog_ordering($wp_query,$orderby);?>
                                </div>
                            </div>
                        </li>
                    <?php endif;
                ?>
                <?php if($check_number == 'on'):
                    $source = 'blog';
                    if(s7upf_is_woocommerce_page()) $source = 'shop';
                    $list   = s7upf_get_option($source.'_number_filter_list');
                    if(empty($list)){
                        $list = array(12,16,20,24);
                    }
                    else{
                        $temp = array();
                        foreach ($list as $value) {
                            $temp[] = (int)$value['number'];
                        }
                        $list = $temp;
                    }
                    $number_df = get_option( 'posts_per_page' );
                    if(!in_array((int)$number_df, $list)) $list = array_merge(array((int)$number_df),$list);
                    if(!in_array((int)$number, $list)) $list = array_merge(array((int)$number),$list);
                ?>
                <li>
                    <div class="dropdown-box show-by">
                        <a href="#" class="dropdown-link"><span class="silver number"><span class="show-number"><?php esc_html_e("Show","hama")?></span><?php echo esc_html((int)$number)?></span></a>
                        <ul class="dropdown-list list-none">
                            <?php
                            if(is_array($list)){
                                foreach ($list as $value) {
                                    echo '<li><a data-number="'.esc_attr($value).'" class="'.esc_attr($add_class).'" href="'.esc_url(s7upf_get_key_url('number',$value)).'">'.$value.'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php endif;?>
                <?php if($check_type == 'on'):?>
                <li>
                    <div class="view-type">
                        <a data-type="grid" href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>" class="grid-view <?php echo esc_attr($add_class)?> <?php if($style == 'grid') echo 'active'?>"><i class="fa fa-th-large"></i></a>
                        <a data-type="list" href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>" class="list-view <?php echo esc_attr($add_class)?> <?php if($style == 'list') echo 'active'?>"><i class="fa fa-reorder"></i></a>
                    </div>
                </li>
                <?php endif;?>
            </ul>
        <?php endif;?>
    </div>
<?php endif;?>