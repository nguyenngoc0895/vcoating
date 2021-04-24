<?php
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10, 0);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout',20);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals');

add_action('woocommerce_after_single_product_summary', 'magikAspire_related_upsell_products', 15);
add_action('woocommerce_after_shop_loop_item_title', 'magikAspire_woocommerce_rating', 5);
add_action('woocommerce_before_shop_loop', 'magikAspire_grid_list_trigger', 11);



add_action('woocommerce_proceed_to_checkout', 'magikAspire_woocommerce_button_proceed_to_checkout');
add_action('init','magikAspire_woocommerce_clear_cart_url');
add_action('magikAspire_single_product_pagination', 'magikAspire_single_product_prev_next');
add_filter('woocommerce_breadcrumb_defaults','magikAspire_woocommerce_breadcrumbs');

add_filter('woocommerce_add_to_cart_fragments', 'magikAspire_woocommerce_header_add_to_cart_fragment');
add_filter('loop_shop_per_page', 'magikAspire_loop_product_per_page');
add_filter( 'woocommerce_cross_sells_total', 'magikAspire_woocommerce_cross_sells_total_limit' );


  // new features 2.5
add_action( 'woocommerce_product_options_advanced', 'magikAspire_woocommerce_general_product_data_custom_field' );

add_action( 'woocommerce_process_product_meta', 'magikAspire_woocommerce_process_product_meta_fields_save' );

remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open');


function magikAspire_related_upsell_products()
{
  global $product,$aspire_Options;

  if (isset($product) && is_product())
  {
   ?>
   <?php 
   if (isset($aspire_Options['enable_home_related_products']) && !empty($aspire_Options['enable_home_related_products'])) { 

    ?> 
    <div class="container">

     <!-- Related Slider -->
     <div class="related-pro">

      <div class="slider-items-products">
        <div class="related-block">
         <?php if (isset($aspire_Options['theme_layout']) && $aspire_Options['theme_layout']=='default')
         { ?>   
           <div class="home-block-inner">
            <div class="block-title">
              <h2><?php esc_attr_e('Related Products', 'aspire'); ?></h2>
              <div class="hidden-xs hidden-sm">
                <?php if(isset($aspire_Options['related_products-text']) && !empty($aspire_Options['related_products-text']))
                {
                  echo wp_specialchars_decode($aspire_Options['related_products-text']);
                }

                ?>
              </div>   
            </div>              
          </div>
        <?php } ?> 
        <div id="related-products-slider" class="product-flexslider hidden-buttons">

          <?php if (isset($aspire_Options['theme_layout']) && $aspire_Options['theme_layout']=='version2')
          { ?>   
            <div class="home-block-inner">
              <div class="block-title">
                <h2><?php esc_attr_e('Related Products', 'aspire'); ?></h2>
                <div class="hidden-xs hidden-sm">
                  <?php if(isset($aspire_Options['related_products-text']) && !empty($aspire_Options['related_products-text']))
                  {
                    echo wp_specialchars_decode($aspire_Options['related_products-text']);
                  } ?>
                </div>   
              </div>              
            </div>
          <?php } ?>      
          <div class="slider-items slider-width-col4 products-grid block-content">

            <?php
            $related = wc_get_related_products(6);
            $args = apply_filters('woocommerce_related_products_args', array(
              'post_type' => 'product',
              'ignore_sticky_posts' => 1,
              'no_found_rows' => 1,
              'posts_per_page' => $aspire_Options['related_per_page'],
              'orderby' => 'rand',
              'post__in' => $related,
              'post__not_in' => array($product->get_id())
            ));

            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
              while ($loop->have_posts()) : $loop->the_post();
                magikAspire_related_upsell_template();
              endwhile;
            } else {
              esc_attr_e('No products found', 'aspire');
            }

            wp_reset_postdata();
            ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
<?php }
}
?>


<!-- End related products Slider -->


<?php
$upsells = $product->get_upsell_ids();

if (sizeof($upsells) == 0) {
} else {
  ?> 
  <?php 
  if (isset($aspire_Options['enable_home_upsell_products']) && !empty($aspire_Options['enable_home_upsell_products'])) { 
   ?>
   
   <!-- Upsell Product Slider -->
   <div class="container">
     <!-- upsell Slider -->
     <div class="upsell-pro">
      <div class="slider-items-products">
        <div class="upsell-block">
         <?php if (isset($aspire_Options['theme_layout']) && $aspire_Options['theme_layout']=='default')
         { ?> <div class="home-block-inner">
           <div class="block-title">
            <h2><?php esc_attr_e('Upsell Product', 'aspire'); ?></h2>
            <div class="hidden-xs hidden-sm">
             <?php
             if(isset($aspire_Options['upsell_products-text']) && !empty($aspire_Options['upsell_products-text']))
             {
              echo wp_specialchars_decode($aspire_Options['upsell_products-text']);
            }

            ?>
          </div>  
        </div>          
      </div>

    <?php } ?>  

    <div id="upsell-products-slider" class="product-flexslider hidden-buttons">

     <?php if (isset($aspire_Options['theme_layout']) && $aspire_Options['theme_layout']=='version2')
     { ?>    
       <div class="home-block-inner">
        <div class="block-title">
          <h2><?php esc_attr_e('Upsell Product', 'aspire'); ?></h2>
          <div class="hidden-xs hidden-sm">
           <?php
           if(isset($aspire_Options['upsell_products-text']) && !empty($aspire_Options['upsell_products-text']))
           {
            echo wp_specialchars_decode($aspire_Options['upsell_products-text']);
          }

          ?>
        </div>  
      </div>          
    </div>
  <?php } ?>
  <div class="slider-items slider-width-col4 products-grid block-content">


    <?php

    $meta_query = WC()->query->get_meta_query();

    $args = array(
      'post_type' => 'product',
      'ignore_sticky_posts' => 1,
      'no_found_rows' => 1,
      'posts_per_page' => $aspire_Options['upsell_per_page'],
      'orderby' => 'rand',
      'post__in' => $upsells,
      'post__not_in' => array($product->get_id()),
      'meta_query' => $meta_query
    );


    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
      while ($loop->have_posts()) : $loop->the_post();
        magikAspire_related_upsell_template();
      endwhile;
    } else {
      esc_attr_e('No products found', 'aspire');
    }

    wp_reset_postdata();
    ?>

  </div>
</div>
</div>
</div>

</div>
</div>
<?php
}
}

}

function magikAspire_woocommerce_rating()
{
  global $wpdb, $post;

  $count = $wpdb->get_var($wpdb->prepare("
    SELECT COUNT(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = '%s'
    AND comment_post_ID = %d
    AND comment_approved = %d
    AND meta_value > %d
    ", 'rating', $post->ID, 1, 0));

  $rating = $wpdb->get_var($wpdb->prepare("
    SELECT SUM(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = '%s'
    AND comment_post_ID = %d
    AND comment_approved = %d
    ", 'rating', $post->ID, 1));

  if ($count > 0) {

    $average = number_format($rating / $count, 2);

    echo '<div class="ratings" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

    echo '<div class="rating-box">';

    echo '<div class="rating" title="' . sprintf(esc_html__('Rated %s out of 5', 'woocommerce'), esc_html($average)) . '"  style="width:' . esc_html($average * 16) . 'px"><span itemprop="ratingValue" class="rating">' . esc_html($average) . '</span></div>';

    echo '</div></div>';
  }


}


function magikAspire_grid_list_trigger()
{
  ?>

  <div class="sorter">
    <div class="view-mode"><a href="#" class="grid-trigger button-active button-grid"></a> <a href="#" title="<?php esc_attr_e('List', 'aspire'); ?>" class="list-trigger  button-list"></a></div>
  </div>
  <?php

}

function magikAspire_woocommerce_add_to_compare()
{
  global $product, $woocommerce_loop, $yith_wcwl;
  if (class_exists('YITH_Woocompare_Frontend')) {

    $mgk_yith_cmp = new YITH_Woocompare_Frontend;
    $mgk_yith_cmp->add_product_url($product->get_id());
    ?>
    <li class="pull-left-none"><a class="compare add_to_compare_small link-compare" data-product_id="<?php echo esc_html($product->get_id()); ?>"
     href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" title="<?php esc_attr_e('Add to Compare','aspire'); ?>"><i class="fa fa-signal icons"></i><?php esc_attr_e('Add to Compare','aspire'); ?>"></a>
     <?php
   }
 }

 

function magikAspire_woocommerce_add_to_whishlist()
{
  global $product, $woocommerce_loop, $yith_wcwl;

  if (isset($yith_wcwl) && is_object($yith_wcwl)) {
    $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
    ?>
    <li class="pull-left-none"><a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ) ?>"
     data-product-id="<?php echo esc_html($product->get_id()); ?>"
     data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
     title="<?php esc_attr_e('Add to WishList','aspire'); ?>"><i class="fa fa-heart-o icons"></i><?php esc_attr_e('Add to WishList','aspire'); ?></a></li>
     <?php
   }
 }


 function magikAspire_woocommerce_button_proceed_to_checkout()
 {
  $checkout_url = wc_get_checkout_url();
  ?>
  <a href="<?php echo esc_url($checkout_url); ?>" class="button btn-proceed-checkout">
    <span><?php esc_attr_e('Proceed to Checkout', 'woocommerce'); ?></span></a>
    <?php
  }

  function magikAspire_woocommerce_clear_cart_url()
  {
    global $woocommerce;
    if (isset($_REQUEST['clear-cart'])) {
      $woocommerce->cart->empty_cart();
    }
  }

//Filter function are here
  /* Breadcrumbs */

  function magikAspire_woocommerce_breadcrumbs()
  {
    return array(
      'delimiter' => '',
      'wrap_before' => '<ul>',
      'wrap_after' => '</ul>',
      'before' => '<li>',
      'after' => '<span> &frasl; </span></li>',
      'home' => _x('Home', 'breadcrumb', 'woocommerce'),
    );
  }

  function magikAspire_single_product_prev_next()
  {

    global $woocommerce, $post;

    if (!isset($woocommerce) or !is_single())
      return;
    ?>
    <div id="prev-next" class="product-next-prev">
      <?php
      $next =magikAspire_prev_next_product_object($post->ID);

      if (!empty($next)):
        ?>
        <a href="<?php echo esc_url(get_permalink($next->ID)) ?>" class="product-next"><span></span></a>
        <?php
      endif;

      $prev = magikAspire_prev_next_product_object($post->ID, 'prev');
      if (!empty($prev)):
        ?>
        <a href="<?php echo esc_url(get_permalink($prev->ID)) ?>" class="product-prev"><span></span></a>
        <?php
      endif;
      ?>
    </div>
    <!--#prev-next -->

    <?php
  }
  function magikAspire_prev_next_product_object($postid, $dir = 'next')
  {

    global $wpdb;

    if ($dir == 'prev')
      $sql = $wpdb->prepare("SELECT * FROM $wpdb->posts where post_type = '%s' AND post_status = '%s' and ID < %d order by ID desc limit 0,1", 'product', 'publish', $postid);
    else
      $sql = $wpdb->prepare("SELECT * FROM $wpdb->posts where post_type = '%s' AND post_status = '%s' and ID > %d order by ID desc limit 0,1", 'product', 'publish', $postid);

    $result = $wpdb->get_row($sql);

    if (!is_wp_error($result)):
      if (!empty($result)):
        return $result;
      else:
        return false;
      endif;
    else:
      return false;
    endif;
  }


  function magikAspire_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce,$aspire_Options;
if (isset($aspire_Options['enable_mini_cart']) && !empty($aspire_Options['enable_mini_cart']))
 {
    ob_start();
    ?>

    <div class="mini-cart">
     <div data-hover="dropdown" class="basket dropdown-toggle"> <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
      <span class="price"><?php  esc_attr_e('My Cart','aspire'); ?></span>
      <span class="cart_count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span> </a> 
    </div>

    <div>
      <div class="top-cart-content"> 

       <?php if (sizeof(WC()->cart->get_cart()) > 0) : $i = 0; ?>
       <ul class="mini-products-list" id="cart-sidebar" >
        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>
        <?php
        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0
         && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)
       ) :

         $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
       $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
       $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
       $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
       $cnt = sizeof(WC()->cart->get_cart());
       $rowstatus = $cnt % 2 ? 'odd' : 'even';
       ?>
       <li class="item<?php if ($cnt - 1 == $i) { ?>last<?php } ?>">
        <div class="item-inner">
         <a class="product-image"
         href="<?php echo esc_url($product_permalink); ?>"  title="<?php echo wp_specialchars_decode($product_name); ?>"> <?php echo str_replace(array('http:', 'https:'), '', wp_specialchars_decode($thumbnail)); ?> </a>


         <div class="product-details">
           <div class="access">
            <a class="btn-edit" title="<?php esc_attr_e('Edit item','aspire') ;?>"
              href="<?php echo esc_url(wc_get_cart_url()); ?>"><i
              class="icon-pencil"></i><span
              class="hidden"><?php esc_attr_e('Edit item','aspire') ;?></span></a>
              <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>"
                title="<?php esc_attr_e('Remove This Item','aspire') ;?>" onClick="" 
                class="btn-remove1"><?php esc_attr_e('Remove','aspire') ;?></a> 

              </div>
              <strong><?php echo esc_html($cart_item['quantity']); ?>
            </strong> x <span class="price"><?php echo wp_specialchars_decode($product_price); ?></span>
            <p class="product-name"><a href="<?php echo esc_url($product_permalink); ?>"
              title="<?php echo wp_specialchars_decode($product_name); ?>"><?php echo wp_specialchars_decode($product_name); ?></a> 
            </p>
          </div>
          <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>

        </li>
      <?php endif; ?>
      <?php $i++; endforeach; ?>
    </ul> 
    <!--actions-->                   
    <div class="actions">
      <button class="btn-checkout" title="<?php esc_attr_e('Checkout','aspire') ;?>" type="button" 
        onClick="window.location.assign('<?php echo esc_js(wc_get_checkout_url()); ?>')">
        <span><?php esc_attr_e('Checkout','aspire') ;?></span> </button>

        <a class="view-cart" type="button"
        onClick="window.location.assign('<?php echo esc_js(wc_get_cart_url()); ?>')">
        <span><?php esc_attr_e('View Cart','aspire') ;?></span> </a>


      </div>   

      <?php else:?>
        <p class="a-center noitem">
          <?php esc_attr_e('Sorry, nothing in cart.', 'aspire');?>
        </p>
      <?php endif; ?>
      
    </div>
  </div>
</div>

<?php

$fragments['.mini-cart'] = ob_get_clean();

return $fragments;
}
}

function magikAspire_loop_product_per_page() {
  global $aspire_Options;
  

    // replace it with theme option
  if (isset($aspire_Options['category_item']) && !empty($aspire_Options['category_item'])) {
    $per_page = explode(',', $aspire_Options['category_item']);
  } else {
    $per_page = explode(',', '9,18,27');
  }

  $item_count = !empty($params['count']) ? $params['count'] : $per_page[0];

  return $item_count;
}

//cross sells limit
function magikAspire_woocommerce_cross_sells_total_limit() {
  global $aspire_Options;
  if (isset($aspire_Options['enable_cross_sells_products']) && !empty($aspire_Options['enable_cross_sells_products'])) {
   $cross_sells_per_page = $aspire_Options['cross_per_page'];
   return $cross_sells_per_page;
 }

}




// Display Fields using WooCommerce Action Hook

function magikAspire_woocommerce_general_product_data_custom_field() {
 global $woocommerce, $post;
 
 woocommerce_wp_checkbox(
  array(
    'id' => 'hotdeal_on_productpage',
    'wrapper_class' => 'checkbox_class',
    'label' => esc_html__('Hot deal on Product Detail Page', 'aspire' ),
    'description' => esc_html__( 'Tick checkbox to set product as hot deal on Product Detail Page', 'aspire' )
  )
);

 woocommerce_wp_checkbox(
  array(
    'id' => 'hotdeal_on_home',
    'wrapper_class' => 'checkbox_class',
    'label' => esc_html__('Hot deal On Home Page', 'aspire' ),
    'description' => esc_html__( 'Tick checkbox to set product as hot deal on home page', 'aspire' )
  )
);

 woocommerce_wp_checkbox(
  array(
    'id' => 'hotdeal_on_homeslider',
    'wrapper_class' => 'checkbox_class',
    'label' => esc_html__('Hot Deal timer on Home Page On-Sale Sliders', 'aspire' ),
    'description' => esc_html__( 'Tick checkbox to show Hot Deal timer on home page On-Sale Product Slider', 'aspire' )
  )
);

 
}

// Save Fields using WooCommerce Action Hook
function magikAspire_woocommerce_process_product_meta_fields_save( $post_id ){
  global  $woo_checkbox;
  $woo_checkbox = isset( $_POST['hotdeal_on_productpage'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, 'hotdeal_on_productpage', sanitize_text_field($woo_checkbox ));

  $woo_checkbox1 = isset( $_POST['hotdeal_on_home'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, 'hotdeal_on_home', sanitize_text_field($woo_checkbox1 ));

  $woo_checkbox2 = isset( $_POST['hotdeal_on_homeslider'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, 'hotdeal_on_homeslider', sanitize_text_field($woo_checkbox2 ));
}






add_action('woocommerce_single_product_summary', 'magikAspire_hot_detail_on_detailpage', 15);

function magikAspire_hot_detail_on_detailpage()
{

  global $product , $aspire_Options;

  if (isset($aspire_Options['enable_home_hotdeal_on_products_page']) && !empty($aspire_Options['enable_home_hotdeal_on_products_page'])) { 
   $hotdeal_value = get_post_meta($product->get_id(), 'hotdeal_on_productpage', true);
   if($hotdeal_value=="yes" && $product->is_on_sale())
   { 
    $product_type = $product->get_type();
    
    if($product_type=='variable')
    {
     $available_variations = $product->get_available_variations();
     
     $variation_id=$available_variations[0]['variation_id'];
     $newid=$variation_id;
   }
   else
   {
    $newid=$product->get_id();
    
  }
  $sales_price_start =  ( $date = get_post_meta( $newid, '_sale_price_dates_from', true ) ) ? date_i18n( 'Y-m-d', $date ) : ''; 
  $sales_price_start=strtotime($sales_price_start);

  $new_end_date =  ( $date = get_post_meta( $newid, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : ''; 
              
  $sales_price_end=strtotime($new_end_date);
  
  $curdate=strtotime(date('Y-m-d H:i:s'));

  $sales_price_to = get_post_meta($newid, '_sale_price_dates_to', true);  
  if(!empty($sales_price_to) && $sales_price_start <= $curdate  && $sales_price_end >= $curdate)
  {
    $sales_price_date_to = date("Y/m/d H:i:s", strtotime($new_end_date));
    
    
    ?>
    <div class="product-timer-box">
      <div class="box-timer">
        <div class="countbox_2 timer-grid"  data-time="<?php echo esc_html($sales_price_date_to) ;?>">
        </div>
      </div>
    </div>
    <?php
  }
}
}
}




  
  ?>