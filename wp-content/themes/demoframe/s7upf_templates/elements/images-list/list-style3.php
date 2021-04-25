<?php
if(empty($itemres)) $itemres = '0:1';
?>
<div class="images">
    <?php    
        if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
        if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item img_style3">
        <div class="block-payment text-right">
            <?php if ($display == "slider") { ?>
                <div class="item-image-list-slider wrap-item smart-slider" data-item="<?php echo esc_attr($item)?>" data-speed="<?php echo esc_attr($speed)?>" 
                data-itemres="<?php echo esc_attr($item_res)?>" 
                data-prev="" data-next="" 
                data-pagination="true" data-navigation="false">
                <?php
                    if(is_array($data)){
                        foreach ($data as $key => $value) {
                            $value = array_merge($default_val,$value);
                            $attr_item = array(
                                        'title' => $value['title'],
                                        'alt' => $value['des'],
                                        );
                            ?>
                                        
                                        <?php echo wp_get_attachment_image($value['image'],$size,false,$attr_item);?>
                                        
                                        <div class="text">
                                            <div class="mota"><p><?php echo esc_html($value['des']); ?></p></div>
                                            <div class="title">
                                                <?php if(!empty($value['link'])):?>
                                                    <a href="<?php echo esc_url($value['link']);?>" title="<?php echo esc_attr($value['title']);?>" class="adv-thumb-link">
                                                <?php endif;?>
                                                <h4><?php echo esc_html($value['title']); ?></h4>
                                                <?php if(!empty($value['link'])):?>
                                                    </a>
                                                <?php endif;?>
                                            </div>                                           
                                        </div>
                                        
                        <?php }
                    }?>
                </div>
            <?php } else { ?>               
                 <ul class="item-image-list img_1">
                <?php
                    if(is_array($data)){
                        foreach ($data as $key => $value) {
                            $value = array_merge($default_val,$value);
                            $attr_item = array(
                                        'title' => $value['title'],
                                        'alt' => $value['des'],
                                        );
                            ?>
                                    <li class="mota">
                                        <div class="img">
                                            <?php echo wp_get_attachment_image($value['image'],$size,false,$attr_item);?>
                                        </div>
                                        <div class="text-mota">
                                            <div class="title">
                                                    <?php if(!empty($value['link'])):?>
                                                        <a href="<?php echo esc_url($value['link']);?>" title="<?php echo esc_attr($value['title']);?>" class="adv-thumb-link">
                                                    <?php endif;?>
                                                    <h4 class="mota_tieude"><?php echo esc_html($value['title']); ?></h4>
                                                    <?php if(!empty($value['link'])):?>
                                                        </a>
                                                    <?php endif;?>
                                                </div>
                                            <div class="mota_des"><p><?php echo esc_html($value['des']); ?></p></div>
                                        </div>
                                    </li>
                        <?php }
                    }?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>