<?php

if(!function_exists('magikAspire_home_layout_oragnizer'))
{
  function magikAspire_home_layout_oragnizer()
  { 

    global $aspire_Options;
    $layout = $aspire_Options['home_blocks']['enabled'];
   

    if ($layout): foreach ($layout as $key=>$value) {
     
      switch($key) {
       
        case 'slider': magikAspire_home_page_banner();
        break;

        case 'home_offer_banners': magikAspire_home_offer_banners();
        break;

        case 'newproduct': magikAspire_new_products();
        break;

         case 'hodealproduct': magikAspire_hotdeal_product();
        break;


        case 'headerservice': magikAspire_header_service();
        break;
        
      
        
        case 'bestseller': magikAspire_bestseller_products();
        break;
        
        case 'onsale': magikAspire_onsale_products();    
        break; 

        case 'categorywise_products': magikAspire_categorywise_products();
        break;
        
        case 'recentlyviewed': magikAspire_recentlyviewed_products();
        break;
        
        case 'recentlypurchased': magikAspire_recentlypurchased_products();
        break;
        
        case 'featured': magikAspire_featured_products();    
        break;  
        
        case 'recommended': magikAspire_recommended_products();
        break;
        
     
        
        case 'home_blog_posts': magikAspire_home_blog_posts();
        break;


         case 'home_bottombanner': magikAspire_sub_banner();    
        break;  

        
        case 'home_customsection': magikAspire_home_customsection();    
        break;  

        
        
        
      }
      

    }
    
  endif;
}
}

if(!function_exists('magikAspire_currency_language'))
{
  function magikAspire_currency_language()
  { 
   global $aspire_Options;


   if(isset($aspire_Options['enable_header_language']) && ($aspire_Options['enable_header_language']!=0))
    { ?>
      <div class="dropdown block-language-wrapper"> 
        <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> 
          <img src="<?php echo esc_url(MAGIKASPIRE_THEME_URI) ;?>/images/english.png" alt="<?php esc_attr_e('English', 'aspire');?>">  
          <?php esc_attr_e('English', 'aspire');?><span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="<?php echo esc_url(MAGIKASPIRE_THEME_URI) ;?>/images/english.png" alt="<?php esc_attr_e('English', 'aspire');?>">    <?php esc_attr_e('English', 'aspire');?></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="<?php echo esc_url(MAGIKASPIRE_THEME_URI) ;?>/images/francais.png" alt="<?php esc_attr_e('French', 'aspire');?>"> <?php esc_attr_e('French', 'aspire');?> </a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="<?php echo esc_url(MAGIKASPIRE_THEME_URI) ;?>/images/german.png" alt="<?php esc_attr_e('German', 'aspire');?>">   <?php esc_attr_e('German', 'aspire');?></a></li>
        </ul>
      </div>
      <?php  
    } ?>

    <?php if(isset($aspire_Options['enable_header_currency']) && ($aspire_Options['enable_header_currency']!=0))
    { 

     global $wp,$wp_query;
     $cururl=magikAspire_curPageURL();
     if(class_exists('WOOCS'))
     {
       $usd_url =  add_query_arg( array("currency"=>"USD"), $cururl);
       $gbp_url =  add_query_arg( array("currency"=>"GBP"),  $cururl);

       $WOOCS=new WOOCS();

     $currency_selected=$WOOCS->current_currency;
     }
     else{
      
      $usd_url = "#";
      $gbp_url ="#";
      $currency_selected="USD";
    }

    if((isset($_GET['currency']) && $_GET['currency']=='GBP') || $currency_selected=='GBP')
    {
     
     $elected_currency='<a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="'. esc_url($gbp_url).'">'  
     . esc_attr("POUND", "aspire").' <span class="caret"></span></a>';
     
   }
   else{
     $elected_currency='<a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="'.esc_url($usd_url).'">'  
     . esc_attr("USD", "aspire").' <span class="caret"></span></a>';
   }


   ?>

   <div class="dropdown block-currency-wrapper"> 
     <?php echo wp_specialchars_decode($elected_currency); ?>
     <ul class="dropdown-menu" role="menu">
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="<?php echo esc_url($usd_url);?>">
          <?php esc_attr_e('$ - Dollar', 'aspire');?>
        </a>
      </li>
      
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="<?php echo esc_url($gbp_url) ;?>">
          <?php esc_attr_e('&#163; - Pound', 'aspire');?>
        </a>
      </li>
    </ul>
  </div>
  <?php  
} 
}
}
  if ( ! function_exists ( 'magikAspire_msg' ) ) {
    function magikAspire_msg()
    { 
     global $aspire_Options;
     if(isset($aspire_Options['enable_welcome_msg']) && !empty($aspire_Options['enable_welcome_msg'])) {
       ?>
       <div class="welcome-msg hidden-xs">
         <?php

         if (is_user_logged_in()) {
          global $current_user;
          
          if(isset($aspire_Options['enable_welcome_msg'])) {
            echo esc_attr_e('Logged in as', 'aspire'). '   <b>'. esc_attr($current_user->display_name) .'</b>';
          }
        }
        else{
          if(isset($aspire_Options['enable_welcome_msg']) && ($aspire_Options['welcome_msg']!='')){
            echo wp_specialchars_decode($aspire_Options['welcome_msg']);
          }
        }
        ?>
      </div>
      <?php 
    }
  }
}

if ( ! function_exists ( 'magikAspire_logo_image' ) ) {
  function magikAspire_logo_image()
  { 
   global $aspire_Options;

   $logoUrl = MAGIKASPIRE_THEME_URI . '/images/logo.png';

   if (isset($aspire_Options['header_use_imagelogo'])  && $aspire_Options['header_use_imagelogo'] == 0) {           ?>
    <a class="logo-title" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> ">
      <?php bloginfo('name'); ?>
    </a>
    <?php
  } else if (isset($aspire_Options['header_logo']['url']) && !empty($aspire_Options['header_logo']['url'])) { 
    $logoUrl = $aspire_Options['header_logo']['url'];
    ?>
    <a title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> "> <img
      alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logoUrl); ?>"
      height="<?php echo !empty($aspire_Options['header_logo_height']) ? esc_html($aspire_Options['header_logo_height']) : ''; ?>"
      width="<?php echo !empty($aspire_Options['header_logo_width']) ? esc_html($aspire_Options['header_logo_width']) : ''; ?>"> </a>
      <?php
    } else { ?>
      <a title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> "> 
        <img src="<?php echo esc_url($logoUrl) ;?>" alt="<?php bloginfo('name'); ?>"> </a>
      <?php }  

    }
  }

  if ( ! function_exists ( 'magikAspire_mobile_search' ) ) {
    function magikAspire_mobile_search()
    { global $aspire_Options;
      $MagikAspire = new MagikAspire();
      if (isset($aspire_Options['header_remove_header_search']) && !$aspire_Options['header_remove_header_search']) : 
        echo'<div class="mobile-search">';
        echo magikAspire_search_form();
        echo'<div class="search-autocomplete" id="search_autocomplete1" style="display: none;"></div></div>';
      endif;
    }
  }

  if ( ! function_exists ( 'magikAspire_search_form' ) ) {
   function magikAspire_search_form()
   {  
    global $aspire_Options;
    $MagikAspire = new MagikAspire();
    ?>
    <?php if (isset($aspire_Options['header_remove_header_search']) && !$aspire_Options['header_remove_header_search']) : ?> 
      <?php if(class_exists('MGK_Front_WooAjaxSearch') && isset($aspire_Options['header_show_ajax_search']) && $aspire_Options['header_show_ajax_search']==1)
      {

            
         echo do_shortcode('[mgk_woocommerce_ajax_search]');

               
      }
      else{?>
      <form name="myform" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
       <input type="text"  name="s" class="searchbox mgksearch" maxlength="128" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e('Search entire store here...', 'aspire'); ?>">
       <?php if (class_exists('WooCommerce')) : ?>  
        <input type="hidden" value="product" name="post_type">
      <?php endif; ?>
      <button type="submit" title="<?php esc_attr_e('Search', 'aspire'); ?>" class="search-btn-bg">
        <span><i class="fa fa-search"></i></span></button>
      </form>
    <?php } ?>
    <?php  endif; ?>
    <?php
  }
}


if ( ! function_exists ( 'magikAspire_home_page_banner' ) ) {
  function magikAspire_home_page_banner()
  {
    global $aspire_Options;
    ?>

    <?php  if(isset($aspire_Options['enable_home_gallery']) && $aspire_Options['enable_home_gallery']  && isset($aspire_Options['home-page-slider']) && !empty($aspire_Options['home-page-slider'])) { ?>

      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="home-slider full-width">
              <div class="wpb_wrapper">
                <div class="wpb_revslider_element wpb_content_element">        
                 <div id="rev_slider_6_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#eee;padding:0px;margin-top:0px;margin-bottom:0px;"> 
                  <!-- START REVOLUTION SLIDER 5.0.5 auto mode -->
                  <div id="rev_slider_6_1" class="rev_slider fullwidthabanner tp-overflow-hidden" style="display:none;" data-version="5.0.5">
                    <ul>
                     <?php foreach ($aspire_Options['home-page-slider'] as $slide) : ?>


                       <li data-transition="3dcurtain-horizontal,3dcurtain-vertical,cube,cube-horizontal" data-slotamount="7,7,7,7" data-masterspeed="600,600,600,600" data-thumb='<?php echo esc_url($slide['thumb']); ?>'>
                         <img
                         src="<?php echo esc_url($slide['image']); ?>" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat'
                         alt="<?php echo esc_attr($slide['title']); ?>"/> <?php echo wp_specialchars_decode($slide['description']); ?>
                         <a class="s-link" href="<?php echo !empty($slide['url']) ? esc_url($slide['url']) : '#' ?>"></a>
                       </li>

                     <?php endforeach; ?>


                   </ul>
                   <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                 </div>
               </div>



             </div>
           </div>
         </div>
       </div>
     </div>


     <!-- end Slider --> 
 

    </div>

    <?php 
  }  
}
}



if ( ! function_exists ( 'magikAspire_sub_banner' ) ) {
  function magikAspire_sub_banner()
  {
   global $aspire_Options;

   ?>
   <div class="container">
    <div class="row"> 
      <!-- Testimonials Box -->
      <?php  if(isset($aspire_Options['enable_testimonial']) && !empty($aspire_Options['enable_testimonial']) && isset($aspire_Options['all_testimonial']) && !empty($aspire_Options['all_testimonial'])) { ?>
        <div class="col-md-6 col-sm-12 testimonials">
          <?php magikAspire_home_testimonial();?>
        </div>
      <?php } ?>
      <?php
      if(isset($aspire_Options['enable_home_bottom_slider']) && $aspire_Options['enable_home_bottom_slider']  && isset($aspire_Options['home_page_bottom_slider']) && !empty($aspire_Options['home_page_bottom_slider'])) { 

        ?>
        <div class="col-md-6 col-sm-12 custom-slider-wrap">
          <div class="custom-slider-inner">
            <div class="home-custom-slider">
              <div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                  <?php $j=0; ?>
                  <?php foreach ($aspire_Options['home_page_bottom_slider'] as $slide) : ?>
                    <li class="<?php if($j==0){ ?> active <?php }?>" data-target="#carousel-example-generic" data-slide-to="<?php echo esc_html($j) ;?>"></li>
                    <?php 
                    $j++;
                  endforeach; ?>
                </ol>

                <div class="carousel-inner">

                  <?php 
                  $i=0;
                  foreach ($aspire_Options['home_page_bottom_slider'] as $slide) : ?>

                    <div class="item <?php if($i==0){ ?> active <?php }?>">    
                      <img src="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr($slide['title']); ?>"/> 

                      <div class="carousel-caption">
                        <?php echo wp_specialchars_decode($slide['description']); ?>
                      </div>


                    </div>

                    <?php 
                    $i++;
                  endforeach; ?>
                </div>
                
                <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only"><?php esc_attr_e('Previous','aspire');?></span> </a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">
                  <?php esc_attr_e('Next','aspire');?></span> </a></div>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>
    <?php

  }
}


if ( ! function_exists ( 'magikAspire_header_service' ) ) {
  function magikAspire_header_service()
  {
    global $aspire_Options;

    if (isset($aspire_Options['header_show_info_banner']) && !empty($aspire_Options['header_show_info_banner'])) :
      ?>
    <div class="our-features-box">
      <div class="container">
        <div class="features-block">

          <?php if (isset($aspire_Options['header_shipping_banner']) && !empty($aspire_Options['header_shipping_banner'])) : ?>
          <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="feature-box first"> <span class="fa fa-truck"></span>
              <div class="content">
                <?php echo wp_specialchars_decode($aspire_Options['header_shipping_banner']); ?>
              </div>
            </div>
          </div>

        <?php endif; ?>

        <?php if (isset($aspire_Options['header_customer_support_banner']) &&  !empty($aspire_Options['header_customer_support_banner'])) : ?>
        <div class="col-md-3 col-xs-12 col-sm-6">
          <div class="feature-box"> <span class="fa fa-headphones"></span>
            <div class="content">
              <?php echo wp_specialchars_decode($aspire_Options['header_customer_support_banner']); ?>

            </div>
          </div>
        </div>

      <?php endif; ?>

      <?php if (isset($aspire_Options['header_moneyback_banner']) &&  !empty($aspire_Options['header_moneyback_banner'])) : ?>
      <div class="col-md-3 col-xs-12 col-sm-6">
        <div class="feature-box"> <span class="fa fa-dollar"></span>
          <div class="content">
           <?php echo wp_specialchars_decode($aspire_Options['header_moneyback_banner']); ?>
         </div>
       </div>
     </div>

   <?php endif; ?>
   <?php if (isset($aspire_Options['header_returnservice_banner']) &&  !empty($aspire_Options['header_returnservice_banner'])) : ?>
   <div class="col-md-3 col-xs-12 col-sm-6">
    <div class="feature-box last"> <span class="fa fa-mobile"></span>
      <div class="content">
       <?php echo wp_specialchars_decode($aspire_Options['header_returnservice_banner']); ?>
     </div>
   </div>
 </div>

<?php endif; ?>
</div>


</div>
</div>

<?php

endif;
}
}



if ( ! function_exists ( 'magikAspire_home_offer_banners' ) ) {
  function magikAspire_home_offer_banners()
  {
    global $aspire_Options;

    if (isset($aspire_Options['enable_home_offer_banners']) && $aspire_Options['enable_home_offer_banners']!=''){
      ?>
      <!-- banner -->
      <div class="promotion-banner">
        <div class="container">
          <div class="row">
            <?php if (isset($aspire_Options['home-offer-banner1']) && !empty($aspire_Options['home-offer-banner1']['url'])) : ?>
            <div class="col-lg-4 col-sm-4">         
              <a href="<?php echo !empty($aspire_Options['home-offer-banner1-url']) ? esc_url($aspire_Options['home-offer-banner1-url']) : '#' ?>" title="<?php esc_attr_e('link', 'aspire');?>">

                <img alt="<?php esc_attr_e('offer banner1', 'aspire'); ?>" src="<?php echo esc_url($aspire_Options['home-offer-banner1']['url']); ?>">
              </a>        
            </div>
          <?php endif; ?>

          <?php if (isset($aspire_Options['home-offer-banner2']) && !empty($aspire_Options['home-offer-banner2']['url'])) : ?>
          <div class="col-lg-5 col-sm-5 last">     
            <a href="<?php echo !empty($aspire_Options['home-offer-banner2-url']) ? esc_url($aspire_Options['home-offer-banner2-url']) : '#' ?>" title="<?php  esc_attr_e('link', 'aspire');?>">

              <img alt="<?php esc_attr_e('offer banner2', 'aspire'); ?>" src="<?php echo esc_url($aspire_Options['home-offer-banner2']['url']); ?>">
            </a>    
          </div>
        <?php endif; ?>
        
        <?php if (isset($aspire_Options['home-offer-banner3']) && !empty($aspire_Options['home-offer-banner3']['url'])) : ?>
        <div class="col-lg-3 col-sm-3 last">
          <a href="<?php echo !empty($aspire_Options['home-offer-banner3-url']) ? esc_url($aspire_Options['home-offer-banner3-url']) : '#' ?>" title="<?php esc_attr_e('link', 'aspire');?>">

            <img alt="<?php esc_attr_e('offer banner3', 'aspire'); ?>" src="<?php echo esc_url($aspire_Options['home-offer-banner3']['url']); ?>">
          </a>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
<!-- end banner -->

<?php } 
}
} //function ends here


if ( ! function_exists ( 'magikAspire_footer_signupform' ) ) {
  function magikAspire_footer_signupform()
  {
    global $aspire_Options;
    if (isset($aspire_Options['enable_mailchimp_form']) && !empty($aspire_Options['enable_mailchimp_form'])) {
     if(function_exists('mc4wp_show_form'))
     {
      ?> 
      <div class="newsletter-wrap">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">      
             <div class="newsletter">
              <?php
              mc4wp_show_form();
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  } 
}  

}
}


if ( ! function_exists ( 'magikAspire_footer_middle' ) ) {
  function magikAspire_footer_middle()
  {
    global $aspire_Options;

    if (isset($aspire_Options['enable_footer_middle']) && !empty($aspire_Options['enable_footer_middle']))
      {?>
        <div class="payment-accept">

          <?php echo wp_specialchars_decode($aspire_Options['footer_middle']);?>
        </div>       
        <?php  
      }  
    }
  }

  if ( ! function_exists ( 'magikAspire_footer_top' ) ) {
    function magikAspire_footer_top()
    {
      global $aspire_Options;

      if((isset($aspire_Options['enable_footer_middle']) && !empty($aspire_Options['enable_footer_middle']))||(isset($aspire_Options
        ['enable_social_link_footer']) && !empty($aspire_Options['enable_social_link_footer'])))
      {
        ?>

        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6">

               <?php magikAspire_social_media_links(); ?>

             </div>
             <div class="col-xs-12 col-sm-6">

              <?php magikAspire_footer_middle();?>
            </div>
          </div>
        </div>
      </div>

      <?php
    }
  }
}

if ( ! function_exists ( 'magikAspire_featured_products' ) ) {
  function magikAspire_featured_products()
  {
    global $aspire_Options;
    if (isset($aspire_Options['enable_home_featured_products']) && !empty($aspire_Options['enable_home_featured_products'])) {
      ?>

      <div class="new-arrivals-pro">
        <div class="container">
          <div class="row">       
            <div class="col-md-12 col-sm-12 col-xs-12 featured-pro-block">
             <div class="home-block-inner">
              <div class="block-title">
                <h2><?php esc_attr_e('Featured Product', 'aspire'); ?></h2>
              </div>
            </div>
            <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="new-arrivals-sliderv2" class="product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">

                    <?php
                    $args = array(
                      'post_type' => 'product',
                      'post_status' => 'publish',                  
                      'posts_per_page' => $aspire_Options['featured_per_page'], 
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'product_visibility',
                          'field'    => 'name',
                          'terms'    => 'featured',
                        ),
                      ),                 
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                      while ($loop->have_posts()) : $loop->the_post();
                        magikAspire_productitem_template();
                      endwhile;
                    } else {
                      esc_attr_e('No products found','aspire');
                    }

                    wp_reset_postdata();
                    ?>

                  </div>
                </div>
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


if ( ! function_exists ( 'magikAspire_bestseller_products' ) ) {
  function magikAspire_bestseller_products()
  {
   global $aspire_Options;

   if (isset($aspire_Options['enable_home_bestseller_products']) && !empty($aspire_Options['enable_home_bestseller_products'])) { 
    ?>
    <div class="bestsell-pro">
      <div class="container">
        <div class="slider-items-products">
          <div class="bestsell-block">
            <div id="bestsell-slider" class="product-flexslider hidden-buttons">
              <div class="home-block-inner">

                <?php if (isset($aspire_Options['bestseller_image']) &&  !empty($aspire_Options['bestseller_image']['url']))
                { ?>

                  <a href="<?php echo !empty($aspire_Options['bestseller_product_url']) ? esc_url($aspire_Options['bestseller_product_url']) : '#' ?>">
                    <img src="<?php echo esc_url($aspire_Options['bestseller_image']['url']); ?>" 
                    alt="<?php esc_attr_e('bestseller_image', 'aspire'); ?>">
                  </a>  

                  <div class="banner-content">
                    <?php  if (isset($aspire_Options['bestseller_image-text']) && !empty($aspire_Options['bestseller_image-text'])) { ?>
                      <?php echo wp_specialchars_decode($aspire_Options['bestseller_image-text']);?>
                    <?php } ?>
                    <?php if (isset($aspire_Options['bestseller_product_url']) &&  !empty($aspire_Options['bestseller_product_url']))
                    { ?>
                      <a href="<?php echo !empty($aspire_Options['bestseller_product_url']) ? esc_url($aspire_Options['bestseller_product_url']) : '#' ?>" class="view-bnt">
                        <?php esc_attr_e('Shop now','aspire'); ?></a>

                      <?php } ?>

                    </div>
                    
                  <?php } ?>

                </div>
                <div class="block-title">
                 <h2><?php esc_attr_e('Best Sellers', 'aspire'); ?></h2>
                 <div class="hidden-xs hidden-sm">
                   <?php  if (isset($aspire_Options['home_bestseller_products-text']) && !empty($aspire_Options['home_bestseller_products-text'])) { ?>

                     <?php echo wp_specialchars_decode($aspire_Options['home_bestseller_products-text']);?>
                   <?php } ?>
                 </div>
               </div>

               <div class="slider-items slider-width-col4 products-grid block-content">

                <!-- best seller category fashion -->

                <?php
                
                $args = array(
                  'post_type'       => 'product',
                  'post_status'       => 'publish',
                  'ignore_sticky_posts'   => 1,
                  'posts_per_page' => $aspire_Options['bestseller_per_page'],      
                  'meta_key'        => 'total_sales',
                  'orderby'         => 'meta_value_num',
                  'order' => 'DESC', 
                );

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();                  
                    magikAspire_productitem_template();
                  endwhile;
                } else {
                  esc_attr_e('No products found', 'aspire' );
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


if ( ! function_exists ( 'magikAspire_new_products' ) ) {
  function magikAspire_new_products()
  {
   global $aspire_Options;

   if (isset($aspire_Options['enable_home_new_products']) && !empty($aspire_Options['enable_home_new_products']) && !empty($aspire_Options['home_newproduct_categories'])) { 
    ?>
    <div class="content-page">
      <div class="container"> 
        <!-- featured category fashion -->
        <div class="category-product">
          <div class="navbar nav-menu">
            <div class="navbar-collapse">
              <ul class="nav navbar-nav">

                <li>
                  <div class="new_title">
                   <h2><?php esc_attr_e('New products', 'aspire'); ?></h2>
                 </div>
               </li>


               <?php
               $catloop=1;


               foreach($aspire_Options['home_newproduct_categories'] as $category)
               {
                $term = get_term_by( 'id', $category, 'product_cat', 'ARRAY_A' );

                ?>
                <li class="<?php if($catloop==1){?> active <?php } ?>">
                  <a href="#newcat-<?php echo esc_html($category) ?>" data-toggle="tab"><?php echo esc_html($term['name']); ?>
                </a>
              </li>

              <?php 
              $catloop++;
            } ?>

          </ul>


        </div>
      </div>

      <!-- Tab panes -->
      <div class="product-bestseller">

       <div class="product-bestseller-content">
         <div class="product-bestseller-list">
           <div class="tab-container">
            <?php 
            $contentloop=1;
            foreach($aspire_Options['home_newproduct_categories'] as $catcontent)
            {
             $term = get_term_by( 'id', $catcontent, 'product_cat', 'ARRAY_A' );
             ?>
             <div class="tab-panel <?php if($contentloop==1){?> active <?php } ?>" id="newcat-<?php echo esc_html($catcontent); ?>">
              <div class="category-products">
               <ul class="products-grid">
                <?php

                $args = array(
                  'post_type'    => 'product',
                  'post_status' => 'publish',
                  'ignore_sticky_posts'    => 1,
                  'posts_per_page' => 4,            
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'tax_query' => array(                
                    array(
                      'taxonomy' => 'product_cat',
                      'field' => 'term_id',
                      'terms' => $catcontent
                    )
                  ),


                );

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();                  
                    magikAspire_newproduct_template();
                  endwhile;
                } else {
                  esc_attr_e('No products found', 'aspire' );
                }

                wp_reset_postdata();
                $contentloop++;

                ?>

              </ul>
            </div>   
          </div>
        <?php  } ?>

      </div>

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



if ( ! function_exists ( 'magikAspire_hotdeal_product' ) ) {
  function magikAspire_hotdeal_product()
  {
   global $aspire_Options;
   $MagikAspire = new MagikAspire();
   if(isset($aspire_Options['enable_home_hotdeal_products']) && !empty($aspire_Options['enable_home_hotdeal_products'])) { 
    ?>

    <div class="daily-deal-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 hot-deal-img">
            <?php if (isset($aspire_Options['daily_deal_image']) && !empty($aspire_Options['daily_deal_image']['url'])) 
            {?>    

             <a href="<?php echo !empty($aspire_Options['daily_deal_url']) ? esc_url($aspire_Options['daily_deal_url']) : '#' ?>" title="<?php esc_attr_e('daily-deal', 'aspire'); ?>" class="product-image">
              <img src="<?php echo esc_url($aspire_Options['daily_deal_image']
              ['url']); ?>" alt="<?php esc_attr_e('daily-deal', 'aspire'); ?>"> 
            </a>
          <?php } 

           $product_ids_on_sale = wc_get_product_ids_on_sale();
           
          ?>

        </div>
     <?php
        $today = date( 'Y-m-d' );

        $args = array(
          'post_type'      => 'product',
          'post_status'       => 'publish',
          'posts_per_page' => 1,
          'meta_key' => 'hotdeal_on_home',
          'meta_value' => 'yes',
          'post__in'    => $product_ids_on_sale   ,
          'meta_query' => WC()->query->get_meta_query(),          
        
          'order'         => 'asc'
       
             
        );
        
        $loop = new WP_Query( $args );
        
        if ( $loop->have_posts() ) {
          while ( $loop->have_posts() ) : $loop->the_post();
          magikAspire_hotdeal_template();            
          endwhile;
        } else {
         esc_attr_e('No products found','aspire');
       }
       wp_reset_postdata();
       ?>

     </div>
   </div>
 </div>

 <?php
}
}
}




if ( ! function_exists ( 'magikAspire_newproduct_template' ) ) {
  function magikAspire_newproduct_template()
  {
    $MagikAspire = new MagikAspire();
    global $product, $woocommerce_loop, $yith_wcwl,$post;
    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl =  wp_get_attachment_image_src(get_post_thumbnail_id(),'magikAspire-product-size-large');

    ?>

    <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
      <div class="item-inner">
        <div class="item-img">
          <div class="item-img-info">
            <a href="<?php the_permalink(); ?>" title="<?php echo wp_specialchars_decode($post->post_title); ?>" class="product-image">
              <figure class="img-responsive">
               <img alt="<?php echo wp_specialchars_decode($post->post_title); ?>" src="<?php echo esc_url($imageUrl[0]); ?>">
             </figure>
           </a>
           <?php if ($product->is_on_sale()) : ?>
            <div class="sale-label sale-top-left">
              <?php esc_attr_e('Sale', 'aspire'); ?>
            </div>
          <?php endif; ?>

          <div class="box-hover">
            <ul class="add-to-links">

             <li>
              <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
               <a class="yith-wcqv-button link-quickview" href="#"
               data-product_id="<?php echo esc_html($product->get_id()); ?>"><?php esc_attr_e('Quick View', 'aspire'); ?></a>
             <?php } ?>
           </li>
           <li>
            <?php
            if (isset($yith_wcwl) && is_object($yith_wcwl)) {
              $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
              ?>
              <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ) ?>"  data-product-id="<?php echo esc_html($product->get_id()); ?>"
                data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
                ><?php esc_attr_e('Wishlist', 'aspire'); ?></a> 
                <?php
              }
              ?>
            </li>
            <li>
              <?php if (class_exists('YITH_Woocompare_Frontend')) {
               $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>      
               <a href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" class="compare link-compare add_to_compare" data-product_id="<?php echo esc_html($product->get_id()); ?>"
                ><?php esc_attr_e('Compare', 'aspire'); 
                ?></a>
                <?php
              }
              ?> 
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="item-info">
      <div class="info-inner">
        <div class="item-title">
         <a href="<?php the_permalink(); ?>"
           title="<?php echo wp_specialchars_decode($post->post_title); ?>"> <?php echo wp_specialchars_decode($post->post_title); ?> </a>
         </div>
         <div class="item-content">
          <div class="rating">
            <div class="ratings">
              <div class="rating-box">
               <?php $average = $product->get_average_rating(); ?>
               <div style="width:<?php echo esc_html(($average / 5) * 100); ?>%" class="rating"> </div>
             </div>
           </div>
         </div>
         <div class="item-price">
          <div class="price-box">
            <span class="regular-price"> 
             <?php echo wp_specialchars_decode($product->get_price_html()); ?>
           </span>

         </div>

       </div>
       <div class="action">
        <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
      </div>
    </div>
  </div>
</div>
</div>
</li>

<?php

}
}


if ( ! function_exists ( 'magikAspire_productitem_template' ) ) {
  function magikAspire_productitem_template()
  {

    $MagikAspire = new MagikAspire();
    global $product, $woocommerce_loop, $yith_wcwl,$post;
    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl =  wp_get_attachment_image_src(get_post_thumbnail_id(),'magikAspire-product-size-large');

    ?>

    <div class="item">
     <div class="item-inner">
      <div class="item-img">
       <div class="item-img-info">
        <a href="<?php the_permalink(); ?>" title="<?php echo wp_specialchars_decode($post->post_title); ?>" class="product-image">
         <figure class="img-responsive">
          <img alt="<?php echo wp_specialchars_decode($post->post_title); ?>" src="<?php echo esc_url($imageUrl[0]); ?>">
        </figure>
      </a>
      <?php if ($product->is_on_sale()) : ?>
        <div class="sale-label sale-top-left">
         <?php esc_attr_e('Sale', 'aspire'); ?>
       </div>
     <?php endif; ?>
     <div class="box-hover">
      <ul class="add-to-links">
        <li>
          <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
           <a class="yith-wcqv-button link-quickview" href="#"
           data-product_id="<?php echo esc_html($product->get_id()); ?>"><?php esc_attr_e('Quick View', 'aspire'); ?></a>
         <?php } ?>
       </li>
       <li>
        <?php
        if (isset($yith_wcwl) && is_object($yith_wcwl)) {
          $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
          ?>
          <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ) ?>"  data-product-id="<?php echo esc_html($product->get_id()); ?>"
            data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
            ><?php esc_attr_e('Wishlist', 'aspire'); ?></a> 
            <?php
          }
          ?>
        </li>
        <li>
          <?php if (class_exists('YITH_Woocompare_Frontend')) {
           $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>      
           <a href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" class="compare link-compare add_to_compare" data-product_id="<?php echo esc_html($product->get_id()); ?>"
            ><?php esc_attr_e('Compare', 'aspire'); 
            ?></a>
            <?php
          }
          ?> 
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="item-info">
 <div class="info-inner">
  <div class="item-title"><a href="<?php the_permalink(); ?>"
   title="<?php echo wp_specialchars_decode($post->post_title); ?>"> <?php echo wp_specialchars_decode($post->post_title); ?> </a>
 </div>
 <div class="item-content">
   <div class="rating">
    <div class="ratings">
     <div class="rating-box">
      <?php $average = $product->get_average_rating(); ?>
      <div style="width:<?php echo esc_html(($average / 5) * 100); ?>%" class="rating"> </div>
    </div>
  </div>
</div>
<div class="item-price">
  <div class="price-box">
    <?php echo wp_specialchars_decode($product->get_price_html()); ?>
  </div>
</div>
<div class="action">
 <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
</div>
</div>
</div>
</div>
</div>
</div>

<?php

}
}







if ( ! function_exists ( 'magikAspire_related_upsell_template' ) ) {
  function magikAspire_related_upsell_template()
  {
    $MagikAspire = new MagikAspire();
    global $product, $woocommerce_loop, $yith_wcwl,$post;


    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl =  wp_get_attachment_image_src(get_post_thumbnail_id(),'magikAspire-product-size-large');  
    ?>
    <!-- Item -->
    <div class="item">
      <div class="item-inner">
       <div class="item-img">
        <div class="item-img-info">
         <a href="<?php the_permalink(); ?>" title="<?php echo wp_specialchars_decode($post->post_title); ?>" class="product-image">
           <figure class="img-responsive">
            <img alt="<?php echo wp_specialchars_decode($post->post_title); ?>" src="<?php echo esc_url($imageUrl[0]); ?>">
          </figure>
        </a>
        <?php if ($product->is_on_sale()) : ?>
          <div class="sale-label sale-top-left">
           <?php esc_attr_e('Sale', 'aspire'); ?>
         </div>
       <?php endif; ?>
       <div class="box-hover">
        <ul class="add-to-links">
          <li>
            <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
             <a class="yith-wcqv-button link-quickview" href="#"
             data-product_id="<?php echo esc_html($product->get_id()); ?>"><?php esc_attr_e('Quick View', 'aspire'); ?></a>
           <?php } ?>
         </li>
         <li>
          <?php
          if (isset($yith_wcwl) && is_object($yith_wcwl)) {
            $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
            ?>
            <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ) ?>"  data-product-id="<?php echo esc_html($product->get_id()); ?>"
              data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
              ><?php esc_attr_e('Wishlist', 'aspire'); ?></a> 
              <?php
            }
            ?>
          </li>
          <li>
            <?php if (class_exists('YITH_Woocompare_Frontend')) {
             $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>      
             <a href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" class="compare link-compare add_to_compare" data-product_id="<?php echo esc_html($product->get_id()); ?>"
              ><?php esc_attr_e('Compare', 'aspire'); 
              ?></a>
              <?php
            }
            ?> 
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="item-info">
    <div class="info-inner">
     <div class="item-title"><a href="<?php the_permalink(); ?>"
       title="<?php echo wp_specialchars_decode($post->post_title); ?>"> <?php echo wp_specialchars_decode($post->post_title); ?> </a> </div>
       <div class="item-content">
        <div class="rating">
         <div class="ratings">
          <div class="rating-box">
            <?php $average = $product->get_average_rating(); ?>
            <div class="rating"  style="width:<?php echo esc_html(($average / 5) * 100); ?>%"></div>
          </div>

        </div>
      </div>
      <div class="item-price">
       <div class="price-box"><?php echo wp_specialchars_decode($product->get_price_html()); ?></div>
     </div>
     <div class="action">
       <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
     </div>
   </div>
 </div>
</div>
</div>
</div>
<?php
}
}




if ( ! function_exists ( 'magikAspire_hotdeal_template' ) ) {
  function magikAspire_hotdeal_template()
  {
    $MagikAspire = new MagikAspire();
    global $aspire_Options;
    global $product, $woocommerce_loop, $yith_wcwl,$post;
    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl = wp_get_attachment_url(get_post_thumbnail_id());

    $product_type = $product->get_type();

    if($product_type=='variable')
    {
     $available_variations = $product->get_available_variations();
     $variation_id=$available_variations[0]['variation_id'];
     $newid=$variation_id;
   }
   else
   {
    $newid=$post->ID;

  }                                    
  $sales_price_to = get_post_meta($newid, '_sale_price_dates_to', true);  
  if(!empty($sales_price_to))
  {
   $sales_price_date_to = date("Y/m/d", $sales_price_to);
 } 
 else{
  $sales_price_date_to='';
} 
$curdate=date("m/d/y h:i:s A");                         
if(isset($aspire_Options['enable_home_hotdeal_products']) && !empty($aspire_Options['enable_home_hotdeal_products'])) {
  ?>  


  <div class="daily-deal col-sm-6 col-xs-12">
    <h3 class="deal-title">
      <?php 
      if(isset($aspire_Options['home_daily_deal_title']) && !empty($aspire_Options['home_daily_deal_title']))
      {
        echo wp_specialchars_decode($aspire_Options['home_daily_deal_title']);

      }

      ?>
    </h3>

    <p>

       <?php 
      if(isset($aspire_Options['home_daily_deal_text']) && !empty($aspire_Options['home_daily_deal_text']))
      {
        echo wp_specialchars_decode($aspire_Options['home_daily_deal_text']);

      }

      ?>
   </p>
   <div class="box-timer">
    <div class="countbox_1 timer-grid"  data-time="<?php echo esc_html($sales_price_date_to) ;?>">
    </div>
  </div>
  <a target="_self" href="<?php echo !empty($aspire_Options['daily_deal_url']) ? esc_url($aspire_Options['daily_deal_url']) : '#' ?>" class="link">
    <?php esc_attr_e('Shop now','aspire'); ?>
  </a>
</div>

<?php } ?>


<?php
}
}


if ( ! function_exists ( 'magikAspire_footer_brand_logo' ) ) {
  function magikAspire_footer_brand_logo()
  {
    global $aspire_Options;
    if (isset($aspire_Options['enable_brand_logo']) && $aspire_Options['enable_brand_logo'] && !empty($aspire_Options['all-company-logos'])) : ?>

      <div class="brand-logo">
        <div class="container">
          <div class="slider-items-products">
            <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col6"> 

                <!-- Item -->

                <?php foreach ($aspire_Options['all-company-logos'] as $_logo) : ?>
                  <div class="item">
                    <a href="<?php echo esc_url($_logo['url']); ?>" target="_blank"> <img
                      src="<?php echo esc_url($_logo['image']); ?>" 
                      alt="<?php echo esc_attr($_logo['title']); ?>"> </a>
                    </div>
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
          </div>
        </div>


      <?php endif;
    }

  }


  if ( ! function_exists ( 'magikAspire_home_testimonial' ) ) {
    function magikAspire_home_testimonial()
    {
     global $aspire_Options;
     ?>
     <div class="ts-testimonial-widget"> 
      <div class="slider-items-products">
        <div id="testimonials-slider" class="product-flexslider hidden-buttons home-testimonials">
          <div class="slider-items slider-width-col4 fadeInUp">

            <?php foreach ($aspire_Options['all_testimonial'] as $testimono) :?>

              <div class="holder">
                <div class="thumb"> 
                  <img src="<?php echo esc_url($testimono['image']); ?>" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat'
                  alt="<?php echo esc_html($testimono['title']); ?>"/> 
                </div>
                <p><?php echo wp_specialchars_decode($testimono['description']); ?></p>  

                <div class="line"></div>

                <strong class="name">
                  <a href="<?php echo !empty($testimono['url']) ? esc_url($testimono['url']) : '#' ?>" target="_blank">
                    <?php echo wp_specialchars_decode($testimono['title']); ?>       </a>
                  </strong>

                </div>

              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <?php

    }
  }



  if ( ! function_exists ( 'magikAspire_home_blog_posts' ) ) {
    function magikAspire_home_blog_posts()
    {
      $count = 0;
      global $aspire_Options;
      $MagikAspire = new MagikAspire();
      if (isset($aspire_Options['enable_home_blog_posts']) && !empty($aspire_Options['enable_home_blog_posts'])) {
        ?>

        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="blog-outer-container">
                <div class="block-title">
                  <h2><?php esc_attr_e('Latest Blog', 'aspire'); ?></h2>
                  <div class="hidden-xs">
                    <?php 

                    if(isset($aspire_Options['home_blog-text']) && !empty($aspire_Options['home_blog-text']))
                    {

                    echo wp_specialchars_decode($aspire_Options['home_blog-text']);
                  }

                    ?>
                  </div>
                </div>
                <div class="blog-inner">



                  <?php

                  $args = array('posts_per_page' => 3, 'post__not_in' => get_option('sticky_posts'));
                  $the_query = new WP_Query($args);
                  $i=1;  
                  if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>


                      <div class="col-lg-4 col-md-4 col-sm-4 blog-preview_item">
                        <h4 class="blog-preview_title">
                          <a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a>
                        </h4>
                        <div class="entry-thumb image-hover2"> 
                          <a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail'); ?>
                            <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>">
                          </a>
                        </div>
                        <div class="blog-preview_info">
                          <ul class="post-meta">
                            <li><i class="fa fa-user"></i><?php esc_attr_e('posted by', 'aspire'); ?>
                            <a href="<?php comments_link(); ?>"><?php the_author(); ?></a> 
                          </li>
                          <li><i class="fa fa-comments"></i><a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?>
                        </a>
                      </li>
                      <li><i class="fa fa-clock-o"></i><?php esc_html(the_time(get_option('date_format'))); ?>
                    </li>
                  </ul>
                  <div class="blog-preview_desc"><?php the_excerpt(); ?></div>
                  <a class="blog-preview_btn" href="<?php the_permalink(); ?>"><?php esc_attr_e('READ MORE','aspire'); ?></a>
                </div>
              </div>

              
              <?php    $i++;
            endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
              <p>
                <?php esc_attr_e('Sorry, no posts matched your criteria.', 'aspire'); ?>
              </p>
            <?php endif;
            ?>

            
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
}
}
}


// new code added in version 3.0
if(!function_exists('magikAspire_home_customsection'))
{
 function magikAspire_home_customsection()
 {
   global $aspire_Options;
   $thecontent = get_the_content();
if(!empty($thecontent))
{
   ?>

   <div class="container">
    <div class="row">
     <div class="mgk_custom_block">
       <div class="col-md-12">
       <?php the_content(); ?>
     </div>
     </div>
   </div>
 </div>
 <?php
}
}

}



// new featured added 3.0




if(!function_exists('magikAspire_categorywise_products'))
{
  function magikAspire_categorywise_products()
  {
   global $aspire_Options;

   if (isset($aspire_Options['enable_home_product_categories']) && !empty($aspire_Options['enable_home_product_categories']) && !empty($aspire_Options['home_product_categories'])) { 
    $catloop=1;


    foreach($aspire_Options['home_product_categories'] as $category)
    {
     $term = get_term_by( 'id', $category, 'product_cat', 'ARRAY_A' );
     ?>

 <div class="new-arrivals-pro">
        <div class="container">
          <div class="row">       
            <div class="col-md-12 col-sm-12 col-xs-12 featured-pro-block">
             <div class="home-block-inner">
              <div class="block-title">
                <h2><?php echo esc_html($term['name']); ?></h2>
              </div>
            </div>
                <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="categorywise-slider" class="categorywise-slider product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">

              <!-- best seller category fashion -->

              <?php


              $args = array(
                'posts_per_page' => $aspire_Options['product_categories_per_page'],
                'tax_query' => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' =>$category
                  )
                ),
                'post_type' => 'product',
                'orderby' => 'title',
              );

              $loop = new WP_Query( $args );
              

              if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();                  
                  magikAspire_productitem_template();
                endwhile;
              } else {
                esc_attr_e( 'No products found', 'aspire' );
              }

              wp_reset_postdata();


              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php  
$catloop++;
} ?>
<?php 
}
}
}








  if(!function_exists('magikAspire_recommended_products'))
  {
    function magikAspire_recommended_products()
    {
     global $aspire_Options;

     if (isset($aspire_Options['enable_home_recommended_products']) && !empty($aspire_Options['enable_home_recommended_products']) ) { 
      ?>
    

                   <div class="new-arrivals-pro">
        <div class="container">
          <div class="row">       
            <div class="col-md-12 col-sm-12 col-xs-12 featured-pro-block">
             <div class="home-block-inner">
              <div class="block-title">
            <h2><?php esc_attr_e('Recommeded Products', 'aspire'); ?></h2>
              </div>
            </div>
                <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="recommended-slider" class="recommended-slider product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">

                  <?php               
                  $args = array(
                    'post_type'       => 'product',
                    'post_status'       => 'publish',
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page' => $aspire_Options['recommended_per_page'],      
                    'meta_key' => 'recommended',
                    'order' => 'DESC'                               
                  );
                  $loop = new WP_Query( $args );

                  if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post();                  
                      magikAspire_productitem_template();
                    endwhile;
                  } else {
                    esc_attr_e( 'No products found', 'aspire' );
                  }

                  wp_reset_postdata();


                  ?>





                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     </div>
  <?php  } ?>
  <?php 
}
}



if(!function_exists('magikAspire_recentlypurchased_products'))
{
 function magikAspire_recentlypurchased_products()
 {
   global $aspire_Options;
   global $product, $yith_wcwl,$post;

   if (isset($aspire_Options['enable_home_recently_purchased_product']) && !empty($aspire_Options['enable_home_recently_purchased_product'])) { 


    ?>


 <div class="new-arrivals-pro">
        <div class="container">
          <div class="row">       
            <div class="col-md-12 col-sm-12 col-xs-12 featured-pro-block">
             <div class="home-block-inner">
              <div class="block-title">
             <h2><?php esc_attr_e('Recently Purchased', 'aspire'); ?></h2>
              </div>
            </div>
                <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="recentlypurchase-slider" class="recentlypurchase-slider product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">



                <?php


                $orders = get_posts( array(
                  'numberposts' => 20,
                  'post_type'   => 'shop_order',
                  'post_status' => array_keys( wc_get_order_statuses() ),

                ) );

                $product_ids = array();

                if(!empty($orders)){

                  foreach( $orders as $order ) {

                    $order_id = $order->ID;
                    $order = new WC_Order($order_id);
                    $products = $order->get_items();

             

                    foreach($products as $product){
                      $product_ids[] = $product['product_id'];
                    }
                  }

                }

                $products= array_unique($product_ids);

                $pcount=0;
                $product_show= $aspire_Options['recently_purchased_per_page'];

                foreach($products as $pid){


                  $product     = wc_get_product( $pid );
                  $product_title = $product->get_name();
                  $product_desc  = $product->get_description();
                  $product_short_desc = $product->get_short_description();
                  $product_price_regular = wc_price( $product->get_regular_price());
                  $product_price_sale    = wc_price( $product->get_sale_price());
                  $product_price         = $product->get_price_html();


                  $product_image      = wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), 'woocommerce_thumbnail' );
                  if(isset($product_image[0])){
                    $product_image = $product_image[0]; 
                  }else{
                    $product_image = 'null';
                  }

                  $add_to_cart_url = get_permalink(get_option( 'woocommerce_cart_page_id' )).'?add-to-cart='.$pid;
                  $product_link = get_permalink($pid);

                  $product_short_desc =  substr(strip_tags($product_short_desc),0,50);
                  $product_desc       =  substr(strip_tags($product_desc),0,100); 
                  ?>

                  <div class="item">
                    <div class="item-inner">
                     <div class="item-img">
                      <div class="item-img-info">
                       <a href="<?php echo esc_url($product_link); ?>" title="<?php echo wp_specialchars_decode($product_title); ?>" class="product-image">
                         <figure class="img-responsive">
                          <img alt="<?php echo wp_specialchars_decode($product_title); ?>" src="<?php echo esc_url($product_image); ?>">
                        </figure>
                      </a>
                      <?php if ($product->is_on_sale()) : ?>
                       <div class="new-label new-top-right">
                         <?php esc_attr_e('Sale', 'aspire'); ?>
                       </div>
                     <?php endif; ?>
                     <div class="box-hover">
                      <ul class="add-to-links">
                        <li>
                          <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
                           <a class="yith-wcqv-button link-quickview" href="#"
                           data-product_id="<?php echo esc_html( $pid ); ?>"><?php esc_attr_e('Quick View', 'aspire'); ?></a>
                         <?php } ?>
                       </li>
                       <li>
                        <?php
                        if (isset($yith_wcwl) && is_object($yith_wcwl)) {
                          $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
                          ?>
                          <a href="<?php echo esc_url(add_query_arg('add_to_wishlist',  $pid )) ?>"  data-product-id="<?php echo esc_html( $pid ); ?>"
                            data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
                            ><?php esc_attr_e('Add to Wishlist', 'aspire'); ?></a> 
                            <?php
                          }
                          ?>
                        </li>
                        <li>
                          <?php if (class_exists('YITH_Woocompare_Frontend')) {
                           $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>      
                           <a href="<?php echo esc_url($mgk_yith_cmp->add_product_url( $pid )); ?>" class="compare link-compare add_to_compare" data-product_id="<?php echo esc_html( $pid ); ?>"
                            ><?php esc_attr_e('Add to Compare', 'aspire'); 
                            ?></a>
                            <?php
                          }
                          ?> 
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                   <div class="item-title"><a href="<?php echo esc_url($product_link); ?>"
                     title="<?php echo wp_specialchars_decode($product_title); ?>"> <?php echo wp_specialchars_decode($product_title); ?> </a> </div>
                     <div class="item-content">
                      <div class="rating">
                       <div class="ratings">
                        <div class="rating-box">
                          <?php $average = $product->get_average_rating(); ?>
                          <div class="rating"  style="width:<?php echo esc_html(($average / 5) * 100); ?>%"></div>
                        </div>

                      </div>
                    </div>
                    <div class="item-price">
                     <div class="price-box"><?php echo wp_specialchars_decode($product_price); ?></div>
                   </div>
                   <div class="action">
                     <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <?php

         $pcount++;
         if($product_show== $pcount)
         {
          break;
        }
      }


      ?>


    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php  } ?>
<?php 

}
}



if(!function_exists('magikAspire_recentlyviewed_products'))
{
  function magikAspire_recentlyviewed_products()
  {
   global $aspire_Options;

   if (isset($aspire_Options['enable_home_recently_viewed_product']) && !empty($aspire_Options['enable_home_recently_viewed_product'])) { 

    global $woocommerce;
    // Get recently viewed product cookies data
    $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
    $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
    ?>



 <div class="new-arrivals-pro recently-view-pro">
        <div class="container">
          <div class="row">       
            <div class="featured-pro-block col-md-12 col-sm-12 col-xs-12">
           
             <div class="home-block-inner">
              <div class="block-title">
          <h2><?php esc_attr_e('Recently Viewed', 'aspire'); ?></h2>
              </div>
            </div>
               <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="recentlyviewed-slider" class="recentlyviewed-slider product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">




                <!-- best seller category fashion -->

                <?php
                  global $pcount;
                              $pcount=1;

                $args =       array(
                  'posts_per_page' => $aspire_Options['recently_viewed_per_page'],
                  'post_status'    => 'publish',
                  'post_type'      => 'product',
                  'post__in'       => $viewed_products,
                  'orderby'        => 'rand'
                );

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();                  
                    magikAspire_recentlyview_productitem_template();
                      $pcount++;
                  endwhile;
                } else {
                  esc_attr_e( 'No products found', 'aspire' );
                }

                wp_reset_postdata();


                ?>

        </div>
      </div>
    </div>
  </div>
    </div>

    </div>
    </div>
  </div>
    </div>
<?php  } ?>
<?php 

}
}




// on sale product code


if(!function_exists('magikAspire_onsale_products'))
{
  function magikAspire_onsale_products()
  {
   global $aspire_Options;

   if (isset($aspire_Options['enable_home_onsale_products']) && !empty($aspire_Options['enable_home_onsale_products'])) { 
    ?>




      <div class="new-arrivals-pro">
        <div class="container">
          <div class="row">       
            <div class="col-md-12 col-sm-12 col-xs-12 featured-pro-block">
             <div class="home-block-inner">
              <div class="block-title">
         <h2><?php esc_attr_e("Today's Deals", 'aspire'); ?></h2>
              </div>
            </div>
                <div class="slider-items-products">
              <div class="new-arrivals-block">
                <div id="onsale-slider" class="onsale-slider product-flexslider hidden-buttons">

                  <div class="slider-items slider-width-col4 products-grid block-content">


                <!-- best seller category fashion -->

                <?php
             

                $product_ids_on_sale    = wc_get_product_ids_on_sale();

                $args = array(
                  'post_type'      => 'product',
                  'posts_per_page' => $aspire_Options['onsale_per_page'],

                  'post__in' => $product_ids_on_sale,
                  'orderby'        => 'rand'

                );

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();                  
                   magikAspire_onsaleproductitem_template();
                  endwhile;
                } else {
                  esc_attr_e( 'No products found', 'aspire' );
                }

                wp_reset_postdata();


                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   </div>
<?php  } ?>
<?php 

}
}


if(!function_exists('magikAspire_onsaleproductitem_template'))
{
  function magikAspire_onsaleproductitem_template()
  {

  
    global $product, $yith_wcwl,$post;
    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
    $product_type = $product->get_type();


    $sales_price_date_to='';
    $product_type = $product->get_type();

    $hotdeal=get_post_meta($post->ID,'hotdeal_on_homeslider',true);

    $sales_price_to='';
    if(!empty($hotdeal) && $hotdeal!=='no')
    { 
      if($product_type=='variable')
      {
       $available_variations = $product->get_available_variations();
       $variation_id=$available_variations[0]['variation_id'];
       $newid=$variation_id;
     }
     else
     {
      $newid=$post->ID;

    } 

    $sales_price_to = get_post_meta($newid, '_sale_price_dates_to', true);
    $curdate=date("m/d/y h:i:s A");  

    if(!empty($sales_price_to))
    {
      $sales_price_date_to = date("Y/m/d", $sales_price_to);
    } 
    else{
      $sales_price_date_to='';
    } 
  }




  ?>
  <?php if(!empty($hotdeal) && !empty($sales_price_to))
   {?>
  <div class="item">
   <div class="item-inner">
    <div class="item-img">
     <div class="item-img-info">
      <a href="<?php the_permalink(); ?>" title="<?php echo wp_specialchars_decode($post->post_title); ?>" class="product-image">
       <figure class="img-responsive">
        <img alt="<?php echo wp_specialchars_decode($post->post_title); ?>" src="<?php echo esc_url($imageUrl[0]); ?>">
      </figure>
    </a>
    <?php if ($product->is_on_sale()) : ?>
      <div class="new-label new-top-right">
       <?php esc_attr_e('Sale', 'aspire'); ?>
     </div>
   <?php endif; ?>
  
  <div class="box-hover">
    <ul class="add-to-links">
      <li>
        <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
         <a class="yith-wcqv-button link-quickview" href="#"
         data-product_id="<?php echo esc_html($product->get_id()); ?>"><?php esc_attr_e('Quick View', 'aspire'); ?></a>
       <?php } ?>
     </li>
     <li>
      <?php
      if (isset($yith_wcwl) && is_object($yith_wcwl)) {
        $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
        ?>
        <a href="<?php echo esc_url(add_query_arg('add_to_wishlist', $product->get_id())) ?>"  data-product-id="<?php echo esc_html($product->get_id()); ?>"
          data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>
          ><?php esc_attr_e('Add to Wishlist', 'aspire'); ?></a> 
          <?php
        }
        ?>
      </li>
      <li>
        <?php if (class_exists('YITH_Woocompare_Frontend')) {
         $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>      
         <a href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" class="compare link-compare add_to_compare" data-product_id="<?php echo esc_html($product->get_id()); ?>"
          ><?php esc_attr_e('Add to Compare', 'aspire'); 
          ?></a>
          <?php
        }
        ?> 
      </li>
    </ul>
  </div>

 
     

</div>
</div>
<div class="item-info">
 <div class="info-inner">
  <div class="item-title"><a href="<?php the_permalink(); ?>"
   title="<?php echo wp_specialchars_decode($post->post_title); ?>"> <?php echo wp_specialchars_decode($post->post_title); ?> </a>
 </div>
 <div class="item-content">
   <div class="rating">
    <div class="ratings">
     <div class="rating-box">
      <?php $average = $product->get_average_rating(); ?>
      <div style="width:<?php echo esc_html(($average / 5) * 100); ?>%" class="rating"> </div>
    </div>
  </div>
</div>
<div class="item-price">
  <div class="price-box">
    <?php echo wp_specialchars_decode($product->get_price_html()); ?>
  </div>
</div>

<div class="short-desc"><?php echo esc_html(substr($post->post_excerpt,0,160));?></div>

<div class="action">
 <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
</div>
<div class="box-timer">
      <div class="countbox_1 timer-grid"  data-time="<?php echo esc_html($sales_price_date_to) ;?>">
      </div>
    </div>
</div>
</div>
</div>
</div>
</div>
  <?php }?>
<?php

}
}




if ( ! function_exists ( 'magikAspire_recentlyview_productitem_template' ) ) {
  function magikAspire_recentlyview_productitem_template()
  {

    $MagikAspire = new MagikAspire();
    global $product, $woocommerce_loop, $yith_wcwl,$post,$pcount,$aspire_Options;
     $totalproduct=$aspire_Options['recently_viewed_per_page'];
    $imageUrl = wc_placeholder_img_src();
    if (has_post_thumbnail())
      $imageUrl =  wp_get_attachment_image_src(get_post_thumbnail_id(),'woocommerce_thumbnail');

    ?>

  <!--   <div class="item col-md-3"> -->

       <?php if($pcount%2 ==1)
                                  {?>
                                <div class="item">
                               <?php } ?>

     <div class="item-inner">
      <div class="item-img">
       <div class="item-img-info">
        <a href="<?php the_permalink(); ?>" title="<?php echo wp_specialchars_decode($post->post_title); ?>" class="product-image">
         <figure class="img-responsive">
          <img alt="<?php echo wp_specialchars_decode($post->post_title); ?>" src="<?php echo esc_url($imageUrl[0]); ?>">
        </figure>
      </a>
      <?php if ($product->is_on_sale()) : ?>
        <div class="sale-label sale-top-left">
         <?php esc_attr_e('Sale', 'aspire'); ?>
       </div>
     <?php endif; ?>
     
  </div>
</div>
<div class="item-info">
 <div class="info-inner">
  <div class="item-title"><a href="<?php the_permalink(); ?>"
   title="<?php echo wp_specialchars_decode($post->post_title); ?>"> <?php echo wp_specialchars_decode($post->post_title); ?> </a>
 </div>
 <div class="item-content">
   <div class="rating">
    <div class="ratings">
     <div class="rating-box">
      <?php $average = $product->get_average_rating(); ?>
      <div style="width:<?php echo esc_html(($average / 5) * 100); ?>%" class="rating"> </div>
    </div>
  </div>
</div>
<div class="item-price">
  <div class="price-box">
    <?php echo wp_specialchars_decode($product->get_price_html()); ?>
  </div>
</div>
<div class="action">
 <?php magikAspire_woocommerce_product_add_to_cart_text() ;?>
</div>
</div>
</div>
</div>
</div>
 <?php if($pcount%2==0  || $pcount==$totalproduct)
                                 { ?>
                </div>

                <?php } ?>
              

<?php

}
}
