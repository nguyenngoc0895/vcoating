<?php 
require_once(MAGIKASPIRE_THEME_PATH . '/includes/layout.php');
require_once(MAGIKASPIRE_THEME_PATH . '/includes/mgk-menu.php');


add_action('init','magikAspire_theme_layouts');
 /* Include theme variation functions */  
 if ( ! function_exists ( 'magikAspire_theme_layouts' ) ) {
 function magikAspire_theme_layouts()
 {
 global $aspire_Options;   
 if (isset($aspire_Options['theme_layout']) && !empty($aspire_Options['theme_layout'])) {
require_once (MAGIKASPIRE_THEME_PATH . '/skins/' . $aspire_Options['theme_layout'] . '/functions.php');   
} else {
require_once (MAGIKASPIRE_THEME_PATH . '/skins/default/functions.php');   
}
 }
}

// call theme skins function





 /* Include theme variation header */   
 if ( ! function_exists ( 'magikAspire_theme_header' ) ) {
   function magikAspire_theme_header()
 {
 global $aspire_Options;  

  if (isset($aspire_Options['theme_layout']) && !empty($aspire_Options['theme_layout'])) {
load_template(MAGIKASPIRE_THEME_PATH . '/skins/' . $aspire_Options['theme_layout'] . '/header.php', true);
} else {
load_template(MAGIKASPIRE_THEME_PATH . '/skins/default/header.php', true);
}
 }
}

/* Include theme variation homepage */ 
if ( ! function_exists ( 'magikAspire_theme_homepage' ) ) {
  function magikAspire_theme_homepage()
 {  
 global $aspire_Options;  

 if (isset($aspire_Options['theme_layout']) && !empty($aspire_Options['theme_layout'])) {
load_template(MAGIKASPIRE_THEME_PATH. '/skins/' . $aspire_Options['theme_layout'] . '/homepage.php', true);
} else {
load_template(MAGIKASPIRE_THEME_PATH . '/skins/default/homepage.php', true);
}
 }
}

 /* Include theme variation footer */
if ( ! function_exists ( 'magikAspire_theme_footer' ) ) {  
function magikAspire_theme_footer()
{
     
 global $aspire_Options;   
  if (isset($aspire_Options['theme_layout']) && !empty($aspire_Options['theme_layout'])) {
load_template(MAGIKASPIRE_THEME_PATH . '/skins/' . $aspire_Options['theme_layout'] . '/footer.php', true);
} else {
load_template(MAGIKASPIRE_THEME_PATH . '/skins/default/footer.php', true);
} 
}
}


if ( ! function_exists ( 'magikAspire_layout_breadcrumb' ) ) { 
function magikAspire_layout_breadcrumb() {
$MagikAspire = new MagikAspire();
 global $aspire_Options; 

?>


 <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
          <?php $MagikAspire->magikAspire_breadcrumbs(); ?>
          </div>
          <!--col-xs-12--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </div>
<?php

}
}

 if ( ! function_exists ( 'magikAspire_singlepage_breadcrumb' ) ) { 
function magikAspire_singlepage_breadcrumb() {
 $MagikAspire = new MagikAspire();
 global $aspire_Options; 

?>
 <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
          <?php $MagikAspire->magikAspire_breadcrumbs(); ?>
          </div>
          <!--col-xs-12--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </div>
<?php

}
}

 if ( ! function_exists ( 'magikAspire_simple_product_link' ) ) {
function magikAspire_simple_product_link()
{
  global $product,$class;
  $product_type = $product->get_type();
  $product_id=$product->get_id();
  if($product->get_price() =='')
  { ?>
<a class="button btn-cart" title='<?php echo esc_html($product->add_to_cart_text()); ?>'
       onClick='window.location.assign("<?php echo esc_js(get_permalink($product_id)); ?>")' >
    <span><?php echo esc_html($product->add_to_cart_text()); ?> </span>
    </a>
<?php  }
  else{
  ?>
<a class="single_add_to_cart_button add_to_cart_button  product_type_simple ajax_add_to_cart button btn-cart" title='<?php echo esc_html($product->add_to_cart_text()); ?>' data-quantity="1" data-product_id="<?php echo esc_attr($product->get_id()); ?>"
      href='<?php echo esc_url($product->add_to_cart_url()); ?>'>
    <span><?php echo esc_html($product->add_to_cart_text()); ?> </span>
    </a>
<?php
}
}
}


 if ( ! function_exists ( 'magikAspire_body_classes' ) ) {
function magikAspire_body_classes( $classes ) 
{
  // Adds a class to body.
global $aspire_Options; 
 

$classes[] = 'cms-index-index cms-home-page';


  return $classes;
}
}

add_filter( 'body_class', 'magikAspire_body_classes');

 if ( ! function_exists ( 'magikAspire_post_classes' ) ) {
function magikAspire_post_classes( $classes ) 
{
  // add custom post classes.
if(class_exists('WooCommerce') && is_woocommerce())
{ 
$classes[]='notblog';
if(is_product_category())
{
 $classes[]='notblog'; 
} 
}
else if(is_category() || is_archive() || is_search() || is_tag() || is_home())
{
$classes[] = 'blog-post container-paper';
}
else
{
$classes[]='notblog';
} 

  return $classes;
}
}
add_filter( 'post_class', 'magikAspire_post_classes');




 //add to cart function
 if (!function_exists( 'magikAspire_mini_cart' )){
  function magikAspire_mini_cart()
{
    global $woocommerce,$aspire_Options;
if (isset($aspire_Options['enable_mini_cart']) && !empty($aspire_Options['enable_mini_cart']))
 {
    

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
}
}
}

 

 
  //social links
 if (!function_exists('magikAspire_social_media_links')){
function magikAspire_social_media_links()
{
    global $aspire_Options;
    if(isset($aspire_Options
  ['enable_social_link_footer']) && !empty($aspire_Options['enable_social_link_footer']))
    {?>
 <div class="social">
  <ul>
  <?php
    if (isset($aspire_Options
  ['social_facebook']) && !empty($aspire_Options['social_facebook'])) {
      echo "<li class=\"fb pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_facebook']) ."'></a></li>";
    }

    if (isset($aspire_Options['social_twitter']) && !empty($aspire_Options['social_twitter'])) {
      echo "<li class=\"tw pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_twitter']) ."'></a></li>";
    }

    if (isset($aspire_Options['social_googlep']) && !empty($aspire_Options['social_googlep'])) {
      echo "<li class=\"googleplus pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_googlep'])."'></a></li>";
    }
    
    if (isset($aspire_Options['social_linkedin']) && !empty($aspire_Options['social_linkedin'])) {
      echo "<li class=\"linkedin pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_linkedin'])."'></a></li>";
    }
    if (isset($aspire_Options['social_rss']) && !empty($aspire_Options['social_rss'])) {
      echo "<li class=\"rss pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_rss'])."'></a></li>";
    }

    if (isset($aspire_Options['social_pinterest']) && !empty($aspire_Options['social_pinterest'])) {
      echo "<li class=\"pintrest pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_pinterest'])."'></a></li>";
    }

   if (isset($aspire_Options['social_instagram']) && !empty($aspire_Options['social_instagram'])) {
      echo "<li class=\"instagram pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_instagram'])."'></a></li>";
    }
    if (isset($aspire_Options['social_youtube']) && !empty($aspire_Options['social_youtube'])) {
      echo "<li class=\"youtube pull-left\"><a target=\"_blank\" href='".  esc_url($aspire_Options['social_youtube'])."'></a></li>";
    }
    ?>
 </ul>
 </div>

 <?php }
  }
}


  // bottom cpyright text 
if (!function_exists('magikAspire_footer_text')){
function magikAspire_footer_text()
{
    global $aspire_Options;
    if (isset($aspire_Options['bottom-footer-text']) && !empty($aspire_Options['bottom-footer-text'])) {
      ?>
      <div class="footer-bottom">
      <div class="container">
      <div class="row">
      <?php
      echo wp_specialchars_decode($aspire_Options['bottom-footer-text']);
      ?>
      </div>
      </div>
    </div>
      <?php
    }
  }
}

if (!function_exists('magikAspire_woocommerce_product_add_to_cart_text')){
function magikAspire_woocommerce_product_add_to_cart_text() {
    global $product;
      /**
         * woocommerce_after_shop_loop_item hook
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action('woocommerce_after_shop_loop_item');

}
}




function  magikAspire_curPageURL() {
           global $wp;
            $pageURL=home_url($wp->request);
            return $pageURL;
        }
?>