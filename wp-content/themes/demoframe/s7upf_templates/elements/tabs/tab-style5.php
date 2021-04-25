
<div class="tabs-block block-element tab-style2 style5 tab-ajax-<?php echo esc_attr($tab_ajax)?>">
	<div class="time-title">
		<?php    
	        if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
	    ?>
        <?php 
        	if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
        ?>
    </div>
    <div class="content-tab-left">
		<?php if($tab_pos == 'bottom'):?>
			<div class="tab-content <?php echo esc_attr($el_class2)?>">
				<?php echo wpb_js_remove_wpautop($content, true);?>
			</div>
		<?php endif;?>
		<div class="tab-header tab-left">
			<ul class="title-tab font-bold <?php echo esc_attr($tab_align)?> text-uppercase list-inline-block">
				<?php
				foreach ($tabs as $key => $tab) {
					if((int)$active_section == $key + 1) $active = 'active';
					else $active = '';
					$icon_bf = $icon_at = '';
					extract($tab);
					$iconClass = isset( ${'i_icon_' . $i_type} ) ? esc_attr( ${'i_icon_' . $i_type} ) : 'fa fa-adjust';
					if($add_icon == 'true'){
						vc_icon_element_fonts_enqueue( $i_type );
						if($i_position == 'left') $icon_bf = '<span class="'.esc_attr($iconClass).'"></span> ';
						else $icon_at = ' <span class="'.esc_attr($iconClass).'"></span>';
					}
					?>
					<li class="<?php echo esc_attr($active)?>">
						<a href="#<?php echo esc_attr($tab['tab_id'])?>" data-toggle="tab" class="navi">
							<?php echo apply_filters('s7upf_output_content',$icon_bf);?>
							<?php echo esc_html($tab['title'])?>
							<?php echo apply_filters('s7upf_output_content',$icon_at);?>
							<?php if($tab_ajax == 'on'):?>
								<div class="hidden get-content-tab"><?php echo apply_filters('s7upf_output_content',$tab['tab_content']);?></div>
							<?php endif;?>
						</a>
					</li>
				<?php }
				?>
			</ul>
		</div>
		<?php if($tab_pos == 'top'):?>
			<div class="tab-content <?php echo esc_attr($el_class2)?>">
				<?php echo wpb_js_remove_wpautop($content, true);?>
			</div>
		<?php endif;?>
	</div>
</div>
