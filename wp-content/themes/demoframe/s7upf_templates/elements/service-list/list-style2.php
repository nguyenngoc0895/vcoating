<?php
if(empty($itemres)) $itemres = '0:1';
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
?>
<div class="service <?php echo esc_attr($el_class)?> <?php echo esc_attr($style) ?>">
    <?php    
        if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
        if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item">
        <div class="block-payment text-right">
            <?php if ($display == "slider") { ?>
                <div class="item-service-list-slider wrap-item smart-slider" data-item="<?php echo esc_attr($item)?>" data-speed="<?php echo esc_attr($speed)?>" 
                data-itemres="<?php echo esc_attr($item_res)?>" 
                data-prev="" data-next="" 
                data-pagination="" data-navigation="true">
                <?php
                    if(is_array($data)){
                        foreach ($data as $key => $value) {
                            $value = array_merge($default_val,$value);
                            $attr_item = array(
                                        'title' => $value['title'],
                                        'alt' => $value['des'],
                                        );
                            ?>
                                        <?php if(!empty($value['link'])):?>
                                            <a href="<?php echo esc_url($value['link']);?>" title="<?php echo esc_attr($value['title']);?>" class="adv-thumb-link">
                                        <?php endif;?>

                                        <?php echo wp_get_attachment_image($value['image'],$size,false,$attr_item);?>
                                        
                                        <?php if(!empty($value['link'])):?>
                                            </a>
                                        <?php endif;?>
                        <?php }
                    }?>
                </div>
            <?php } else { ?>               
                 <ul class="item-service-list">
                <?php
                    if(is_array($data)){
                        foreach ($data as $key => $value) {
                            $value = array_merge($default_val,$value);
                            $attr_item = array(
                                        'title'         => $value['title'],
                                        'des'           => $value['des'],
                                        'icon'          => $value['icon'],
                                        'image_bot'     => $value['image_bot'],
                                        'list_bot'      => $value['list_bot'],
                                        'display_list'  => $value['display_list'],
                                        'display_img'   => $value['display_img'],
                                        );
                            ?>
                                    <li class="item <?php echo esc_attr($col_class)?>">
                                        <div class="box-top">
                                            <div class="service-icon">
                                                <a class="adv-link" href="<?php echo (!empty($value['link']))? esc_url($value['link']): '#'; ?>" title="<?php echo esc_attr($value['title']);?>">
                                                    <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                                </a>
                                            </div>
                                            <div class="service-text">
                                                <h2 class="title">
                                                    <a href="<?php echo (!empty($value['link']))? esc_url($value['link']): '#'; ?>"><?php echo esc_attr($value['title']); ?></a>
                                                </h2>
                                                <h3 class="des">
                                                    <?php echo esc_attr($value['des']); ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <?php if ( $value['display_list'] == 'no' && $value['display_img'] == 'no' ) : ?>
                                        <?php else : ?>    
                                            <div class="box-bot">
                                                <?php 
                                                    $size_bot=array("390","191");
                                                    echo wp_get_attachment_image($value['image_bot'],$size_bot); 
                                                ?>
                                                <?php
                                                $data_bot = (array) vc_param_group_parse_atts( $value['list_bot'] );
                                                    if(is_array($data_bot)){
                                                        foreach ($data_bot as $key => $valuee) {
                                                            $valuee = array_merge($default_bot,$valuee);
                                                            $attr_item = array(
                                                                        'icon_bot' => $valuee['icon_bot'],
                                                                        'text_bot' => $valuee['text_bot'],
                                                                        'des_bot'  => $valuee['des_bot'],
                                                            );
                                                ?>
                                                <?php if ($value['display_list'] == 'yes'): ?> 
                                                    <div class="text_span_bottom">
                                                        <div class="icon_bottom">
                                                            <i class="fa <?php echo esc_attr($valuee['icon_bot']); ?>"></i>
                                                        </div>
                                                        <div class="text_bottom">
                                                            <h3 class="text"><?php echo esc_html($valuee['text_bot']); ?></h3>
                                                            <h4 class="desc_bottom"><?php echo esc_html($valuee['des_bot']); ?></h4>
                                                        </div>
                                                    </div>
                                                <?php endif ?> 
                                                <?php }
                                                }?>
                                            </div>
                                        <?php endif ?>
                                    </li>
                        <?php }
                    }?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
        
