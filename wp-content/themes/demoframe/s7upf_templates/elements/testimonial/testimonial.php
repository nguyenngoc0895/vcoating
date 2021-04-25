<div class="testimonial-list <?php echo esc_attr($el_class)?>">
	<div class="description_dim tes">
		<h3 class="title18"><?php echo esc_html($title); ?></h3>
		<span class="desc-block"><?php echo esc_html($desc_title); ?></span>
	</div>
	<div class="content">
		<div class="img-slider">
			<div class="slider-nav">
			<?php
			    if(is_array($data)){
			        foreach ($data as $key => $value){
			        	$value = array_merge($default_val,$value);	        	
			            echo wp_get_attachment_image($value['image']);	 
			        }
			    }
			   ?>
			</div>
		</div>
		<div class="cont-slider">
			<div class="slider-for">
				<?php
			    if(is_array($data)){
			        foreach ($data as $key => $value){
			        	$value = array_merge($default_val,$value);
			        	echo '<div class="info">';
			        	echo '<p class="desc"><i class="fa fa-quote-left" aria-hidden="true"></i>'.esc_html($value['des']).'<i class="fa fa-quote-right" aria-hidden="true"></i></p>';
			        	echo '  <ul class="list-unstyled rank-icons">
		                            <li><i class="fa fa-star"></i></li>
		                            <li><i class="fa fa-star"></i></li>
		                            <li><i class="fa fa-star"></i></li>
		                            <li><i class="fa fa-star"></i></li>
		                            <li><i class="fa fa-star"></i></li>                 
		                        </ul>';
			            echo '<h3 class="name">';
				            if ($value['link'] !== '') {
				            	echo '<a href="'.esc_url($value['link']).'">';
				            }
				            echo esc_html($value['name']);
				            if ($value['link'] !== '') {
				            	echo '</a>';
				            }
			       		echo '</h3>';
			            echo '</div>';
			        }
			    }
			    ?>
		    </div>
	    </div>
    </div>
</div>