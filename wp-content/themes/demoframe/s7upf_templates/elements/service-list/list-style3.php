<?php
if(empty($itemres)) $itemres = '0:1';
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
?>
<div class="service <?php echo esc_attr($el_class)?> <?php echo esc_attr($style) ?> style2">
    <?php    
    if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item">
        <div class="block-payment text-right">               
            <ul class="item-service-list"> 
                <li class="item <?php echo esc_attr($col_class)?>">
                    <div class="box-top">
                        <div class="service-icon">
                            <a class="adv-link" href="<?php echo (!empty($link3))? esc_url($link3): '#'; ?>" title="<?php echo esc_attr($title3);?>">
                                <i class="fa <?php echo esc_attr($icon3); ?>"></i>
                            </a>
                        </div>
                        <div class="service-text">
                            <h2 class="title">
                                <a href="<?php echo (!empty($link3))? esc_url($link3): '#'; ?>"><?php echo esc_attr($title3); ?></a>
                            </h2>
                            <h3 class="des">
                                <?php echo esc_attr($des3); ?>
                            </h3>
                        </div>
                    </div>
                    <?php if ($display_map == 'yes'): ?> 
                        <div class="box-bot">
                            
                            <div class="map">
                                <?php 
                                if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
                                $el_class .= ' '.$style_map.' ';
                                parse_str( urldecode( $location ), $locations);
                                $location_text = '';
                                foreach ($locations as $vals) {
                                    $location_text .= '|';
                                    foreach ($vals as $val) {
                                        $location_text .= $val.',';
                                    }
                                }
                                $img = '';
                                if($market != '') $img = wp_get_attachment_image_url($market,"full");
                                $id = 'sv-map-'.uniqid();
                                $map_css = 'width:'.$width.';height:'.$height.';max-width-100%;';
                                ?>
                                <div class="clearfix"></div>
                                <div id="<?php echo esc_attr($id); ?>" 
                                    class="sv-ggmaps <?php echo esc_attr($el_class); echo esc_attr(S7upf_Assets::build_css($map_css)); ?>" 
                                    data-location="<?php echo esc_attr($location_text); ?>" 
                                    data-market="<?php echo esc_attr($img); ?>" 
                                    data-zoom="<?php echo esc_attr($zoom); ?>" 
                                    data-style="<?php echo esc_attr($style_map); ?>" 
                                    data-control="<?php echo esc_attr($control); ?>" 
                                    data-scrollwheel="<?php echo esc_attr($scrollwheel); ?>" 
                                    data-disable_ui="<?php echo esc_attr($disable_ui); ?>" 
                                    data-draggable="<?php echo esc_attr($draggable); ?>">
                                </div>   
                            </div>
                            
                        </div>
                    <?php endif ?>
                </li>
            </ul>
        </div>
    </div>
</div>

