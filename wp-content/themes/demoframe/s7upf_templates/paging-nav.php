<?php if ($links) :
    // Custom icon/text
    $links['prev_text'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
    $links['next_text'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
    ?>
    <div class="pagi-nav text-left <?php echo esc_attr($style)?>">
        <?php echo apply_filters('s7upf_output_content',paginate_links($links)); ?>
    </div>
<?php endif;?>