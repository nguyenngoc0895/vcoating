<?php
$check_share = s7upf_get_option('post_single_share',array());
$check_share_page = s7upf_get_value_by_id('post_single_page_share');
$post_type = get_post_type();
if(in_array($post_type, $check_share) || $check_share_page == 'on'):
	$list_default = array(
		array(
			'title'  => esc_html__('Total',"hama"),
		    'social' => 'total',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Facebook',"hama"),
		    'social' => 'facebook',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Twitter',"hama"),
		    'social' => 'twitter',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Google',"hama"),
		    'social' => 'google',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Pinterest',"hama"),
		    'social' => 'pinterest',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Linkedin',"hama"),
		    'social' => 'linkedin',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Tumblr',"hama"),
		    'social' => 'tumblr',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Email',"hama"),
		    'social' => 'envelope',
		    'number' => 'on',
			),
		);
	$list = s7upf_get_option('post_single_share_list',$list_default);
	
?>
<a class="share-mail" href="mailto:contact.7uptheme@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<a class="share-mayin" href="javascript:window.print()"><i class="fa fa-print" aria-hidden="true"></i></a>
<div class="single-list-social" data-id="<?php echo esc_attr(get_the_ID())?>">
	<a class="share-link" href="javascript:void(0)"><span class="share-icon total-share"><i class="fa fa-share-alt" aria-hidden="true"></i></span></a>
	<ul class="list-inline-block">
	<?php
		foreach ($list as $value) {
			switch ($value['social']) {
				case 'facebook':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'twitter':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.twitter.com/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'google':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://plus.google.com/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'pinterest':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.wp_get_attachment_url(get_post_thumbnail_id())).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'envelope':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="mailto:?subject='.esc_attr__("I wanted you to see this site&amp;body=Check out this site","hama").' '.get_the_permalink().'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'linkedin':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.linkedin.com/cws/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;

				case 'tumblr':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.tumblr.com/widgets/share/tool?canonicalUrl='.get_the_permalink().'&amp;title='.get_the_title()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="fa fa-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
								<span class="text">'.esc_attr($value['social']).'</span>
							</a></li>';
					break;
				
				default:
					$number = get_post_meta(get_the_ID(),'total_share',true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					break;
			}			
		}
	?>
	</ul>
</div>
<?php endif;?>