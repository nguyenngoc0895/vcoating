<div class="tang <?php echo esc_attr($el_class)?> <?php echo esc_attr($style) ?>">
    <div class="tieu-de">
        <?php    
            if(!empty($title)) echo '<h3 class="block-title tnl-v">'.esc_html($title).'</h3>';
            if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
        ?>
    </div>
    <div class="wrap-item anh-tang">
        <div class="block-payment text-right">           
                 <div class="list-tang">
                    <div class="tab-header">
                        <ul class="tab text-center tab-mnu nav nav-tabs ">
                            <?php
                                $a = "1";
                                if(is_array($data)){
                                    foreach ($data as $key => $value) {
                                        $value = array_merge($default_val,$value);
                                        $attr_item = array(
                                                    'tang' => $value['tang'],
                                                    );
                                        $dem ="";
                                        if ($a == '1') {
                                            $dem ="active";
                                        }
                                        ?>
                                            
                                        <li class="<?php echo $dem; ?>">
                                            <a data-toggle="tab" href="#<?php echo $a; ?>" aria-expanded="true">
                                                <?php echo esc_html($value['tang']);?>
                                            </a>
                                            <div class="noidunganh">
                                                <span class="text1"><?php echo esc_html($value['noidung']);?></span>
                                                <span class="text2"><?php echo esc_html($value['noidung2']);?></span>
                                                <?php if(!empty($value['contentgd'])) :?>
                                                <div class="text3"><?php echo esc_html($value['contentgd']);?></div>
                                                <?php endif; ?>
                                                <?php if(!empty($value['contentgd2'])) :?>
                                                <div class="text3"><?php echo esc_html($value['contentgd2']);?></div>
                                                <?php endif; ?>
                                                <?php if(!empty($value['contentgd3'])) :?>
                                                <div class="text3"><?php echo esc_html($value['contentgd3']);?></div>
                                                <?php endif; ?>
                                                <div class="btn-scien"><a href="<?php echo esc_url($value['link_v']); ?>" title="">Liên hệ ngay</a></div>
                                            </div>
                                        </li>
                                                
                                    <?php $a ++;
                                    }
                                }?>
                        </ul>
                    </div>
                    <div class="tab-content-product tab-cont tab-content">
                        <?php
                        $a = "1";
                        if(is_array($data)){
                            foreach ($data as $key => $value) {
                                $value = array_merge($default_val,$value);
                                $attr_item = array(
                                            'tang' => $value['tang'],
                                            );
                                $dem ="";
                                if ($a == '1') {
                                    $dem ="active";
                                }
                                ?>

                                <div id="<?php echo $a; ?>" class="tab-pane imglist <?php echo $dem; ?>">
                                    <div class="anh">
                                    <a href="<?php echo wp_get_attachment_url($value['image1']); ?>" data-fancybox="images" class="fancybox-tang"><?php echo wp_get_attachment_image($value['image1'],false,$attr_item);?></a>
                                    </div>
                                </div>

                            <?php $a ++;
                            }
                        }?>
                    </div> 
                </div>
        </div>
    </div>
</div>