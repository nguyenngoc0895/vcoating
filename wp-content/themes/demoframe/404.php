<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$page_id = s7upf_get_option('s7upf_404_page');
if(!empty($page_id)){	
	$style = s7upf_get_option('s7upf_404_page_style');
	if($style == 'full-width') {
		get_header('none');
		echo S7upf_Template::get_vc_pagecontent($page_id);
		get_footer('none');
	}
	else{
		get_header(); ?>
		<div id="main-content" class="main-page-default">
		    <?php do_action('s7upf_before_main_content')?>
		    <div class="container">
				<?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
			</div>
			<?php do_action('s7upf_after_main_content')?>
		</div>
		<?php get_footer();
	}
}
else{
	get_header(); ?>
	<div id="main-content" class="main-page-default">
	    <?php do_action('s7upf_before_main_content')?>
	    <div class="container">
			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hama' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'hama' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
		<?php do_action('s7upf_after_main_content')?>
	</div>
	<?php get_footer(); 
}?>
