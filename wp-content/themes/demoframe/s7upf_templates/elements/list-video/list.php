<div class="video-list">
    <div class="wrap-item">
        <div class="block-payment">
                <?php
                    if(is_array($data)){
                        foreach ($data as $key => $value) {
                            $value = array_merge($default_val,$value);
                            ?>
                                <div class="video col-sm-<?php echo esc_attr($column);?>">
                                        <iframe src="https://youtube.com/embed/<?php echo esc_attr($value['link']); ?>"></iframe>
                                </div>                                       
                        <?php }
                    }?>
                </div>
        </div>
    </div>
</div>