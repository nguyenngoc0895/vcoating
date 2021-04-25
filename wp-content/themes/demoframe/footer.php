<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 7up-framework
 */

?>
	    <?php echo s7upf_get_template('footer-default');?>
	    <?php echo s7upf_get_template('scroll-top');?>
	    <?php echo s7upf_get_template('wishlist-notification');?>
	    <?php echo s7upf_get_template('tool-panel');?>
    </div>
    <?php if (s7upf_get_option('show_popup_addcart') != "off") { ?>
    	<div class="add-cart-message-content hidden">
           <div class="add-cart-message">
               <div class="product_notification_wrapper">
               		<span class="close-pupups">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 224.512 224.512" xml:space="preserve">
                                <g>
                                    <polygon points="224.507,6.997 217.521,0 112.256,105.258 6.998,0 0.005,6.997 105.263,112.254 
                                    0.005,217.512 6.998,224.512 112.256,119.24 217.521,224.512 224.507,217.512 119.249,112.254  "/>
                                </g>
                    </svg></span>
                   <div class="product_notification_background"></div>
                   <div class="product_notification_text">
                       "<span class="product-name"></span>" <?php esc_html_e("has been added to your cart.","hama");?>
                       <a class="view-cart-noti" href="<?php echo esc_url(wc_get_cart_url())?>"><?php esc_html_e("View cart","hama");?></a>
                   </div>
               </div>
           </div>
       </div>
       <div class="fuzzy-pupup"></div>
    <?php } ?>
<?php wp_footer(); ?>
</body>
</html>
