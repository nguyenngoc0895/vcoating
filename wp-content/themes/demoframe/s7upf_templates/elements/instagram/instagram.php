<div class="block-element instagram-box <?php echo esc_attr($el_class);?>">
<?php
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
?>
    <ul class="list-inline-block follow-instagram">
    <?php
        if(!empty($data)){
            foreach ($data as $value) {
                echo    '<li>
                            <a href="'. esc_url( $value['link'] ) .'">
                                <img src="'. esc_url($value['image_url']) .'" alt="'.esc_attr__("Instagram Image","hama").'">
                                <span class="instagram-text-follow"><i class="fa fa-instagram"></i> '.esc_html__("Follow Us","hama").'</span>
                            </a>
                        </li>';
            }              
        }
    ?>
    </ul>
</div>