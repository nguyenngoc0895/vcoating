<div class="anh_loadmore">
    <div class="wrap-item">
        <div class="block-payment text-right">
                          
                 <ul class="loadmore_img">
                    <div class="clearfix">
                    <?php
                        if(is_array($data)){
                            foreach ($data as $key => $value) {
                                $value = array_merge($default_val,$value);
                                ?>
                                        <li class="anh list-col-item list-3-item">
                                            <div class="img_lm">
                                                
                                                    <a href="<?php echo wp_get_attachment_url($value['image']);?>" data-fancybox="images">
                                                        <?php echo wp_get_attachment_image($value['image'],false,$attr_item);?>
                                                    </a>

                                            </div>                                        
                                        </li>
                            <?php  
                            }
                        }?>   
                    </div>                 
                </ul>
                <div class="btn-loadmore"><a href="#" id="loadMorev">Xem Thêm</a></div>
        </div>
    </div>
</div>