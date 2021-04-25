<?php
$content_class = 'dropdown-list text-left';
?>
<div class="mini-cart-box mini-cart-style3 <?php echo esc_attr($el_class)?>">
    <?php 
    switch ($style) {
        case 'value':
            break;
        
        default:
            ?>
            <a class="mini-cart-link" href="<?php echo wc_get_cart_url()?>">
                <div class="mini-cart-icon title18 inline-block"><div class="icon hydrated inline-block"><div class="icon-inner cart-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="15px" height="15px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                        <g>
                            <g id="shopping-cart">
                                <path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306    c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7    c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408    c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z" fill="#FFFFFF"/>
                            </g>
                        </g>
                    </svg>
                </div></div></div>
                <div class="item-price">
	                <span class="mini-cart-text">
	                    <span class="set-cart-number">0</span><?php echo esc_html_e("item(s) - ","hama")?>
	                </span>
	                <strong class="pull-right color mini-cart-total-price get-cart-price set-cart-price"><?php echo WC()->cart->get_cart_subtotal(); ?></strong>
                </div>
            </a>
            <?php
            break;
    }
    ?>    
    <div class="mini-cart-content <?php echo esc_attr($content_class)?>">
        <h3 class="close-minicart">
                    <?php echo esc_html__('Mini Cart ','hama'); ?>
                <button id="close-minicart">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 224.512 224.512" style="enable-background:new 0 0 224.512 224.512;" xml:space="preserve">
                                <g>
                                    <polygon points="224.507,6.997 217.521,0 112.256,105.258 6.998,0 0.005,6.997 105.263,112.254 
                                    0.005,217.512 6.998,224.512 112.256,119.24 217.521,224.512 224.507,217.512 119.249,112.254  "/>
                                </g>
                    </svg>
                </button>
            </h3>
        <h2 class="title18 font-bold"><span class="set-cart-number">0</span> <?php echo esc_html_e("items","hama")?></h2>
        <div class="mini-cart-main-content">
            <?php echo s7upf_get_template_woocommerce('cart/mini-cart')?>
        </div>
        <div class="total-default hidden"><?php echo wc_price(0)?></div>
    </div>
    <div class="fuzzy-cart"></div>
</div>