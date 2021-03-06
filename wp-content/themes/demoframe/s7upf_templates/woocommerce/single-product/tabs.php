<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
$tab_style = s7upf_get_option('product_tab_style');
if ( ! empty( $tabs ) ) : ?>

	<div class="detail-tabs <?php echo esc_attr($tab_style)?>">
		<div class="detail-tab-title">
			<ul class="list-tag-detail list-none text-uppercase font-bold" role="tablist">
				<?php 
				$i = 1;
				foreach ( $tabs as $key => $tab ) :
					if($i == 1) $active = 'active';
					else $active = '';
					$i++;
				?>
					<li class="<?php echo esc_attr( $key ); ?>_tab <?php echo esc_attr($active)?>" id="tab-title-<?php echo esc_attr( $key ); ?>">
						<a href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab" aria-expanded="false">
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="detail-tab-content">
			<div class="tab-content">
				<?php 
				$i = 1;
				foreach ( $tabs as $key => $tab ) : 
					if($i == 1) $active = 'active';
					else $active = '';
					$i++;
				?>
					<div id="tab-<?php echo esc_attr( $key ); ?>" class="tab-pane <?php echo esc_attr($active)?>">
						<div class="detail-tab-desc">
							<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<?php endif; ?>
