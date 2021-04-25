<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 13/08/15
 * Time: 10:20 AM
 */
$main_color = s7upf_get_value_by_id('main_color');
$main_color2 = s7upf_get_value_by_id('main_color2');
$body_bg = s7upf_get_value_by_id('body_bg');
$container_width = s7upf_get_value_by_id('container_width');
$preload_bg = s7upf_get_option('preload_bg');
?>
<?php
$style = '';

if(!empty($body_bg)){
    $style .= 'body
    {background-color:'.$body_bg.'}'."\n";

    $style .= '.parallax-footer #main-content
    {background-color:'.$body_bg.'}'."\n";
}
if(!empty($preload_bg)){
    $style .= '.preload #loading
    {background-color:'.$preload_bg.'}'."\n";
}

if(!empty($container_width)) {
    $style .= '.container{max-width: '.$container_width.'px !important;}';
}

/*****BEGIN MAIN COLOR*****/

if(!empty($main_color)){
    $style .= '.main-color,.about-title-number a.readmore, .color, .desc.color, .item-contact-page .contact-thumb:hover, .list-about-page>li.current>a, .main-nav>ul>li:hover>a, .main-nav>ul>li>a:hover, .popup-icon, .product-title a:hover, a:active, a:focus, a:hover,.search-form:hover .submit-form::after,.mini-cart-link:hover .icon.hydrated > div > svg,#close-minicart i:hover,.product-price > span, .product-price ins,.compare-link, .wishlist-link, .product-quick-view,.item-post .post-info .post-title a:hover,.item-post .fa-comment:before,.item-post .fa-calendar:before,.fa-instagram:before,.main-nav li.has-mega-menu .mega-list-cat ul li a:after,.text-header2 .linkh2 a.menu-link:hover,.addcart-link:hover .icon.hydrated > div > svg,.grid-style4 .compare-link, .grid-style4 .wishlist-link, .grid-style4 .product-quick-view,.post-style2.item-post .post-info .post-title a:hover,.time-title .box-count-down .time_circles .number,.grid-style5 .compare-link, .grid-style5 .wishlist-link, .grid-style5 .product-quick-view,.titleh3-tab .title-tab > li:hover a.navi, .titleh3-tab .title-tab > li.active a.navi,.grid-style5 .product-title a:hover,.post-style3.post-style2.item-post .fa-calendar:before, .post-style3.item-post .fa-comment:before,.header-4.header-2 .main-nav>#menu-main-menu>li.current-menu-ancestor>a, .header-4.header-2 .main-nav>#menu-main-menu>li>a:hover,.header-4 .text-header2 .linkh2 a.menu-link:hover,.header-4 .search-form:hover .submit-form::after,.mini-cart-style4:hover .minicart-h3,.mini-cart-style4 .mini-cart-link .icon.hydrated > div > svg,.mini-cart-style4 .mini-cart-text,.banner-slider .style2 .banner-info a.shop-button:hover,.grid-style6 .product-title a:hover, .grid-style6 .product-price > span, .grid-style6 .product-price ins,.deals-product > h3.title18,.service-text .title a:hover,.header-4 .main-nav>ul>li.current-menu-item>a, .header-4 .main-nav>ul>li.current-menu-ancestor>a, .header-4 .main-nav>ul>li:hover>a,.summary .product-price > span, .summary .product-price ins, .summary .size_chart a:hover, .woocommerce div.product form.cart .reset_variations:hover,.summary .icon .compare-link:hover i, .summary .icon .wishlist-link:hover i, .summary .icon .share-mail:hover i, .summary .icon .share-mayin:hover i, .single-list-social .share-icon.total-share:hover i, .summary .icon .compare-link:hover,.item-post.post-style5 .post-info .readmore:hover,.testimo-style3 .title18 a:hover, .testimo-style3 > a:hover, .item-post.post-style5 .post-info .post-title a:hover,.background-back .block-title,.border-top5 > .block-title, .border-top5.block-element > .block-title, .border-top5.block-element > .title18,.home6 .grid-style5 .wishlist-link, .home6 .grid-style5 .compare-link,.product-categories li.active.cat-parent > a,.sidebar-style-2.widget_s7upf_category_fillter li > a.active, .sidebar-style-2.widget_s7upf_attribute_filter li > a.active,.list-style2 .yith-wcwl-wishlistexistsbrowse.show a:after,.list-style2 .list-full .compare:after,.woocommerce .list-style2 .list-full form.cart button.single_add_to_cart_button:hover:after,.list-style2 .list-full a.add_to_wishlist:after,.sidebar .widget_s7upf_attribute_filter .widget-title, .widget_price_filter .widget-title,.item-price-table .btn-purchase,.post .titleh3-tab > li:hover, .post .title-tab > li.active,.tab-pane .item-pop-post .post-info a:hover,.item-post .post-info .blog-total-info .comments a:hover,.comments a:hover,.post-meta-data a:hover,.listview-style2 .item-product-list .product-title:hover, .listview-style2 .product-price > span, .listview-style2 .product-price ins, .listview-style2 a:active, .listview-style2 a:focus, .listview-style2 a:hover,.listview-style2 .grid-style4 a:active, .listview-style2 .grid-style4 a:focus, .listview-style2 .grid-style4 a:hover,.listview-style2 .grid-style4 a:active, .listview-style2 .grid-style4 a:focus, .listview-style2 .grid-style4 a:hover,.my_account.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-white:hover .vc_icon_element-icon, .mini-cart-box .fa-shopping-cart:hover:before,.submit-icon-search:hover:after,.header-2.header-4 .submit-icon-search:after,.product-detail .summary .cart .group_table .product .group-info .product-title a:hover,.deals-down .box-count-down .time_circles > div,.header-3 .account-manager a i,.call-header i,.header-fix-top-on .account-manager:hover span i,.header-fix-top-on .account-manager .dropdown-list i,.header-fix-top-on .account-manager:hover > a > i,.header-2 .account-manager:hover > a,.header-3 .account-manager span i,.item-post.style_7 .post-info .cate-blogs a:hover,.item-post .post-info .blog-total-info a:hover,.list-style1.item-post .post-info .detail a:hover,.testimonial-list .slider-for .desc i,.testimonial-list .slider-for .rank-icons li
    {color:'.$main_color.'}'."\n";
    
    $style .= '.grid-style5 .product-extra-link .addcart-link,.wpb_wrapper .mini-cart-box .mini-cart-number.set-cart-number,.shop-button, .titleh3-tab > li:hover, .title-tab > li.active,.owl-theme .owl-controls .owl-buttons div:hover, .owl-theme .owl-controls .owl-buttons div:focus, .owl-theme .owl-controls .owl-buttons div:active,.vc_general.vc_btn3.vc_btn3-color-black.vc_btn3-style-modern:hover,.product-extra-link .addcart-link:hover,.detail .more-detail:hover,.style2_product .img-lable .list-product-extra-link a,.about-banner-history .banner-info h3::before, .about-intro-top h3::before, .bg-color, .dropdown-list li a:hover, .shop-button:hover, body .scroll-top,.form-newsletter .submit-form,.dm-button,#widget_indexdm .dm-header .header-button > a,.mini-cart-button a:hover, .mini-cart-box.aside-box .mini-cart-button a:hover:first-child,.title-tab > li:hover, .title-tab > li.active,.mini-cart-box.mini-cart-style2,.header-2 .main-nav>#menu-main-menu>li.current-menu-ancestor>a, .header-2 .main-nav>#menu-main-menu>li>a:hover,.currency-list li a:hover, .language-list li a:hover,.grid-style4 a.addcart-link,.text-from .text-number-home2 .number,.text-info .mCSB_scrollTools .mCSB_dragger, .text-info .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,.post-style2 .post-thumb:before,.post-style2 .post-thumb:after,.banner-slider.slider-testimonial .owl-theme .owl-controls .owl-page.active span,.search-style3 .search-form .submit-form,.mini-cart-style3:hover .icon.hydrated,.banner-slider.slider-home3 .banner-info a,.slider-home3 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.header3-bot .owl-theme .owl-controls .owl-buttons div:hover, .header3-bot .owl-theme .owl-controls .owl-buttons div:focus, .header3-bot .owl-theme .owl-controls .owl-buttons div:active,.banner-style3 .banner-info a:after,.tab-style2 .title-tab li.active, .tab-style2 .title-tab li:hover,.header3-bot,.grid-style5 .list-product-extra-link a,.brand-list a,.product-grid-style2 .product-extra-link .addcart-link,.product-grid-style2 .style2_product .img-lable .list-product-extra-link a,.social-style2.social-list .icon-social a:hover i,.item-post .post-info .readmore,.home3 .form-newsletter .submit-form,.tab-style2 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.header-4 .currency-list li a:hover, .header-4 .language-list li a:hover,.grid-style6 .product-extra-link .addcart-link:hover, .grid-style6 .detail .more-detail:hover,.owl-buttons20 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.item-service .service-icon .adv-link:hover,.service-text .more:hover,.add-cart-message,.woocommerce div.product .summary form.cart .button.single_add_to_cart_button:before,.home4 .form-newsletter .submit-form,.testimonial-style3 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.wishlist-button a:hover,.style3 .banner-info a.shop-button,.border-top5 > .block-title:before, .border-top5 > .title18:before,.style7.grid-style6 .detail .more-detail, .style7.grid-style6 .product-extra-link a.addcart-link.button,.grid-style6 .product-thumb .compare-link, .grid-style6 .product-thumb .wishlist-link, .grid-style6 .product-thumb .product-quick-view,.banner-text .shop-button,.post-style6.item-post .post-info .readmore,.header3-bot.home6,.home6 .search-style3 .search-form .submit-form,.home6 .mini-cart-style3:hover .icon.hydrated,.product-tab .tab-header .title-tab,.grid-style9 .product-extra-link .addcart-link,.grid-style6.grid-style11 .list-product-extra-link .addcart-link,.home6 .grid-style5 .product-quick-view,.home6 .form-newsletter .submit-form,.product-tab .tab-header .title-tab li,.style2 .item-service-list,.style2 .item-service-list > li,.home6 .grid-style5 .product-extra-link .addcart-link,.woocommerce button.button:hover,.woocommerce .header-shop .mini-cart-button a:hover,.detail-gallery .gallery-control a:hover i:after,.banner-slider-info,.owl-theme.banner-slider-item .owl-controls .owl-page.active span,.tagcloud a:hover,.woocommerce .sidebar-style-2.widget_price_filter .price_slider_amount .button:hover,.top-filter .pagi-nav .page-numbers.current,.view-type a.active,.top-filter .pagi-nav > a:hover, .top-filter .pagi-nav > span:hover,.woocommerce .sidebar-style-2.widget_price_filter .ui-slider .ui-slider-handle:focus,.woocommerce .sidebar-style-2.widget_price_filter .price_slider_wrapper .ui-widget-content,.sidebar-style-2.widget_s7upf_category_fillter li > a.active::before, .sidebar-style-2.widget_s7upf_attribute_filter li > a.active::before,.pagi-nav .page-numbers.current,.pagi-nav .page-numbers:hover,.wg-product-slider .product-thumb>.quickview-link,.item-product-list .product-thumb:hover>.quickview-link,.item-product-list .product-extra-link a.addcart-link.button:hover,.woocommerce .list-style2 .list-full form.cart button.single_add_to_cart_button,.shop-listfull .product-extra-link a.addcart-link.button:hover,.woocommerce a.button:hover,.woocommerce-cart table.cart td.actions .coupon .button, .woocommerce-cart table.cart td.actions .button, .woocommerce .cart-collaterals .wc-proceed-to-checkout a, .woocommerce-page .cart-collaterals .wc-proceed-to-checkout a, .woocommerce-shipping-calculator .shipping-calculator-form .button,.woocommerce .wishlist_table td.product-add-to-cart a:hover,.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,.woocommerce-MyAccount-navigation ul li.is-active, .woocommerce-MyAccount-navigation ul li:hover,.about-title-number .readmore:hover, .about-title-number::before, .item-price-table .btn-purchase:hover,.about-title-number .readmore:hover, .about-title-number::before, .item-price-table .btn-purchase:hover,.item-contact-page .contact-thumb::before,.listview-style2 .owl-theme .owl-controls.clickable .owl-buttons div:hover, .listview-style2 .wg-product-slider .product-thumb>.quickview-link,.listview-style2 .item-product-list .product-thumb:hover>.quickview-link,.listview-style2 .detail .more-detail:hover, .listview-style2 .item-product-list .product-extra-link a.addcart-link.button:hover,.listview-style2 .view-type a.active,.main-nav .toggle-mobile-menu span, .main-nav .toggle-mobile-menu::after, .main-nav .toggle-mobile-menu::before,.woocommerce #respond input#submit:hover,a.added_to_cart:hover,.summary .yith-wcwl-add-to-wishlist a:hover, .summary .yith-wcwl-add-to-wishlist a:hover,.summary .icon .share-mail:hover,.summary .icon .share-mayin:hover,.single-list-social .share-icon.total-share:hover,.woocommerce-message .button.wc-forward,.product-grid-style2 .detail .more-detail:hover,.summary .icon .compare-link:hover ,.summary .icon .wishlist-link:hover,.summary .yith-wcwl-add-to-wishlist a:hover, .summary .yith-wcwl-add-to-wishlist a:hover, .summary .icon .share-mail:hover, .summary .icon .share-mayin:hover, .single-list-social .share-icon.total-share:hover,.slick-next:hover,.slick-prev:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range ,.woocommerce .widget_price_filter .price_slider_amount .button:hover,.summary .deals-down .box-count-down .time_circles > div
    {background-color:'.$main_color.'}'."\n";

    $style .= '.banner-advs .banner-info:before,.product-grid-gallery .owl-item a.active figure.list_images,.product-extra-link .addcart-link:hover,.detail .more-detail:hover,.banner-style2.banner-advs .banner-info h2:before, .time-text.wpb_text_column h2:before,.style2_product .img-lable .list-product-extra-link a,.grid-style4 .compare-link:hover i, .grid-style4 .wishlist-link:hover i, .grid-style4 .product-quick-view:hover i,.text-featured h2:after,.text-from .text-number-home2 .number,.testimo-info .list-inline-block:before,.time-title .box-count-down .time_circles > div,.grid-style5 .product-extra-link .addcart-link,.brand-list a,.product-grid-style2 .product-extra-link .addcart-link,.product-grid-style2 .product-extra-link .addcart-link,.style2_product .img-lable .list-product-extra-link a:hover,.product-grid-style2 .style2_product .img-lable .list-product-extra-link a,.social-style2.social-list .icon-social a:hover i,.item-post .post-info .readmore,.titleh3-tab .title-tab > li.active:after, .titleh3-tab .title-tab > li:hover:after,.banner-slider .style2 .banner-info a.shop-button:hover,.header-4.header-2,.grid-style6 .product-extra-link .addcart-link:hover, .grid-style6 .detail .more-detail:hover,.item-service .service-icon .adv-link:hover,.service-text .more:hover,.item-post.post-style5 .post-info .readmore:hover,.wishlist-popup,.vc_general.vc_btn3.vc_btn3-color-black.vc_btn3-style-modern:hover,.style7.grid-style6 .detail .more-detail, .style7.grid-style6 .product-extra-link a.addcart-link.button,.post-style6.item-post .post-info .readmore,.grid-style9 .product-extra-link .addcart-link,.home6 .grid-style5 .product-extra-link .addcart-link,.woocommerce button.button:hover,.woocommerce div.product div.images .carousel li a.active img,.tagcloud a:hover,.woocommerce .sidebar-style-2.widget_price_filter .price_slider_amount .button:hover,.top-filter .pagi-nav .page-numbers.current,.view-type a.active,.top-filter .pagi-nav > a:hover, .top-filter .pagi-nav > span:hover,.widget_s7upf_attribute_filter.sidebar-style-2 .tawcvs-swatches .swatch-color:hover,.sidebar-style-2.widget_s7upf_category_fillter li > a.active::before, .sidebar-style-2.widget_s7upf_attribute_filter li > a.active::before,.pagi-nav .page-numbers.current,.pagi-nav .page-numbers:hover,.item-product-list .product-extra-link a.addcart-link.button:hover,.list-style2 .list-full .compare:hover, .list-style2 .yith-wcwl-wishlistexistsbrowse.show a:hover, .list-style2 .list-full .yith-wcwl-add-to-wishlist .add_to_wishlist:hover,.list-style2 .yith-wcwl-wishlistaddedbrowse.show:hover, .list-style2 .yith-wcwl-wishlistexistsbrowse.show:hover,.shop-listfull .product-extra-link a.addcart-link.button:hover,.woocommerce a.button:hover,.woocommerce-cart table.cart td.actions .coupon .button, .woocommerce-cart table.cart td.actions .button, .woocommerce .cart-collaterals .wc-proceed-to-checkout a, .woocommerce-page .cart-collaterals .wc-proceed-to-checkout a, .woocommerce-shipping-calculator .shipping-calculator-form .button,.woocommerce .wishlist_table td.product-add-to-cart a:hover,.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,.woocommerce-MyAccount-navigation ul li.is-active, .woocommerce-MyAccount-navigation ul li:hover,.about-title-number a.readmore,.list-about-page>li.current>a::after,.item-price-table .btn-purchase,.item-price-table .btn-purchase:hover,.item-contact-page .contact-thumb,.listview-style2 .detail .more-detail:hover, .listview-style2 .item-product-list .product-extra-link a.addcart-link.button:hover,.listview-style2 .view-type a.active,.woocommerce #respond input#submit:hover,a.added_to_cart:hover,.list-tag a:hover:before, .list-tag a:hover:after,.summary .yith-wcwl-add-to-wishlist a:hover, .summary .yith-wcwl-add-to-wishlist a:hover,.summary .icon .share-mail:hover,.summary .icon .share-mayin:hover,.single-list-social .share-icon.total-share:hover,.woocommerce-message .button.wc-forward,.product-grid-style2 .detail .more-detail:hover,.about-team-thumb a:hover,.list-style1.item-post .post-info .detail a.more-detail:hover,.summary .icon .compare-link:hover , .summary .icon .wishlist-link:hover,.summary .yith-wcwl-add-to-wishlist a:hover, .summary .yith-wcwl-add-to-wishlist a:hover, .summary .icon .share-mail:hover, .summary .icon .share-mayin:hover, .single-list-social .share-icon.total-share:hover,ul.list-circle.gray, .content-post-default .block-quote,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle ,.woocommerce .widget_price_filter .price_slider_amount .button:hover
    {border-color: '.$main_color.'}'."\n";

    $style .= '.images.style3 .owl-theme .owl-controls .owl-buttons div.owl-next:hover .fa-angle-right:after,.product-slider-featured > .list-product-wrap > .owl-theme > .owl-controls .owl-buttons div.owl-next,.brand-slider .owl-theme > .owl-controls .owl-buttons div.owl-next:hover,.tab-style2 .title-tab li.active a:after,.tab-style2 .title-tab li a:after,.detail-gallery .gallery-control a:hover i.fa-angle-right:before
    {border-left-color:'.$main_color.'}'."\n";

    $style .= '.images.style3 .owl-theme .owl-controls .owl-buttons div.owl-prev:hover i:after,.product-slider-featured > .list-product-wrap > .owl-theme > .owl-controls .owl-buttons div.owl-prev,.brand-slider .owl-theme > .owl-controls .owl-buttons div:hover,.detail-gallery .gallery-control a:hover i.fa-angle-left:before,.tab-style2 .title-tab li a:before
    {border-right-color:'.$main_color.'}'."\n";

    $style .= '.mini-cart-style4 .cart-svg svg,.submit-icon-search-close:hover svg,.mini-cart1 .cart-svg:hover svg, .mini-cart1:hover .cart-svg svg
    {fill:'.$main_color.'}'."\n";
}

if(!empty($main_color2)){
    $style .= '.header3-bot .main-nav li a:hover, .header3-bot .main-nav li.has-mega-menu .mega-list-cat ul li a:after, .header-3 a:hover,.mini-cart-style3 .color, .mini-cart-style3 .mini-cart-link:hover .mini-cart-text,.cart-home-3 .remove-product:hover,.cart-home-3 .mini-cart-content .product-info a:hover ,.header3-bot .product-price > span, .header3-bot .product-price ins,.banner-style3 .banner-info h3,.banner-advs.banner-style3 .banner-info a:hover, .banner-advs.banner-style6 .banner-info a:hover,.grid-style5 .wishlist-link:hover, .grid-style5 .product-quick-view:hover, .grid-style5 .compare-link:hover,.grid-style5 .product-price > span, .grid-style5 .product-price ins,.product-grid-style2 .style2_product .product-title:hover a,.product-grid-style2 .style2_product .product-title:hover a, .product-grid-style2 .style2_product .product-price > span, .product-grid-style2 .style2_product .product-price ins,.post-style2.post-style3 .post-info .post-title a:hover, .post-style2.post-style3.item-post .post-info ul li a:hover,.grid-style5 .product-title a:hover,.header5 .main-nav>ul>li>a:hover,.header5 .main-nav>ul>li .sub-menu>li>a:hover, .header5 .main-nav li.has-mega-menu .mega-list-cat ul li:hover a, .header5 .main-nav li.has-mega-menu .mega-list-cat ul li a:after, .header5 .product-title a:hover, .header5 .product-price > span, .header5 .product-price ins,.header5 .search-form:hover .submit-form::after, .header5 .my_account.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-white:hover .vc_icon_element-icon, .item-cat-list .img-cat h3.name:hover,.header5 .mini-cart-link:hover .icon.hydrated > div > svg,.grid-style6.style7 .product-title a:hover,.post-style6.item-post .comments a:hover, .post-style2.post-style3.post-style6 .post-info .post-title a:hover,.header5 .main-nav>ul>li:hover>a,.mini-cart-style3 .color, .mini-cart-style3 .mini-cart-link:hover .mini-cart-text,.home6 .dropdown-box .product-mini-cart .product-info a:hover,.home6.header-3 a:hover,.style8_product .product-price > span, .style8_product .product-price ins,.banner-style7 .banner-info h2,.style8_product .product-title a:hover, .grid-style6.grid-style9 .product-title a:hover, .grid-style6.grid-style9 .product-price > span, .grid-style6.grid-style9 .product-price ins,.style8_product .product-extra-link a.addcart-link.button:hover,.tabs-block.style4 .title-tab li.active a,.border1.block-element>h3.title18,.deals-down .box-count-down .time_circles > div,.home6 .grid-style5 .wishlist-link:hover, .home6 .grid-style5 .product-quick-view:hover, .home6 .grid-style5 .compare-link:hover, .home6 .grid-style5 .product-title a:hover,.all-cate .list-col-item a:hover,.all-cate .list-col-item a:hover:before,.style8_product .product-label span.sale,.home6 .item-post .post-info .post-title a:hover,.home6 .item-post .fa-calendar:before, .home6 .item-post .fa-comment:before, .home6 .item-post .post-info .post-title a:hover,.header5 #close-minicart i:hover,.text-header-3-2 .profile-link:focus::after,.header5 .remove-product:hover,.header5 .submit-icon-search:hover:after,.blog-grid-view .item-post.post-style3 .fa-calendar:before,.blog-grid-view .item-post.post-style3 .fa-comment:before,.header5 .account-manager:hover span i,.header5 .account-manager:hover > a > i,.home6 .item-post.style_7 .read_more a:hover,.home6 .item-post.style_7 .comments-author .author a:hover,.style2 .service-text .title a:hover,.item-service-list .text_bottom h3
    {color:'.$main_color2.'}'."\n";
    
    $style .= '.text-header-3-2 .language-list li a:hover, .text-header-3-2 .list-profile li a:hover, .text-header-3-2 .currency-list li a:hover,.header3-mid .dropdown-list li a:hover,.mini-cart-style3 .icon.hydrated,.search-style3 .search-form .submit-form:hover,.cart-home-3 .mini-cart-button a:hover,.cart-home-3 .mini-cart-box.aside-box .mini-cart-button a:hover:first-child,.header3-bot .product-label span.sale,.header3-bot .product-label span.new,.banner-slider.slider-home3 .banner-info a:hover,.time-title h3.title18,.grid-style5 .product-thumb .list-product-extra-link a:hover,.time-title > p.desc-block:hover,.brand-list a:hover,.item-post .post-info .readmore:hover,.grid-style5 .product-extra-link .addcart-link:hover,.header5 .owl-theme .owl-controls.clickable .owl-buttons div:hover, .border-top5 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.home5 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.style3 .banner-info a.shop-button:hover,.style7.grid-style6 .product-extra-link a.addcart-link.button:hover,.grid-style6.style7 .product-thumb .compare-link:hover, .grid-style6.style7 .product-thumb .wishlist-link:hover, .grid-style6.style7 .product-thumb .product-quick-view:hover,.banner-text .shop-button:hover, .banner-text .shop-button:focus,.post-style6.item-post .post-info .readmore:hover,.mini-cart-style3 .icon.hydrated,.home6 .mini-cart-button a:hover,.text-header-3-2 .language-list li a:hover, .text-header-3-2 .list-profile li a:hover, .text-header-3-2 .currency-list li a:hover,.home6 .owl-theme .owl-controls.clickable .owl-buttons div:hover,.home6 .mini-cart-style3 .icon.hydrated,.banner-style7 .shop-button,.product-tab .tab-header .title-tab li:hover,.product-tab .tab-header .title-tab li.active,.grid-style6.grid-style9 .product-thumb .compare-link:hover, .grid-style6.grid-style9 .product-thumb .wishlist-link:hover, .grid-style6.grid-style9 .product-thumb .product-quick-view:hover,.grid-style6.grid-style9 .product-extra-link .addcart-link:hover,.tab-style2.style5 .title-tab li.active:before, .tab-style2.style5 .title-tab li:before,.grid-style6.grid-style11 .product-thumb .compare-link:hover, .grid-style6.grid-style11 .product-thumb .wishlist-link:hover, .grid-style6.grid-style11 .product-thumb .product-quick-view:hover, .grid-style6.grid-style11 .list-product-extra-link .addcart-link:hover,.home6 .grid-style5 .product-extra-link .addcart-link:hover,.style8_product .list-product-extra-link a:hover,.header5 .mini-cart-button a:hover,.header5 .mini-cart-box.aside-box .mini-cart-button a:hover:first-child,.dropdown-list li.active a,.header3-bot .main-nav .toggle-mobile-menu span, .header3-bot .main-nav .toggle-mobile-menu::after,.header3-bot .main-nav .toggle-mobile-menu::before,.banner-style3 .banner-info a:hover:after,.product-grid-style2 .style2_product .img-lable .list-product-extra-link a:hover, .product-grid-style2 .product-extra-link .addcart-link:hover, .product-grid-style2 .detail .more-detail,.item-service-list .icon_bottom
    {background-color:'.$main_color2.'}'."\n";

    $style .= '.brand-list a:hover,.item-post .post-info .readmore:hover,.grid-style5 .product-extra-link .addcart-link:hover,.style7.grid-style6 .product-extra-link a.addcart-link.button:hover,.post-style6.item-post .post-info .readmore:hover,.style8_product .product-extra-link a.addcart-link.button:hover,.grid-style6.grid-style9 .product-extra-link .addcart-link:hover,.home6 .grid-style5 .product-extra-link .addcart-link:hover,.product-grid-style2 .style2_product .img-lable .list-product-extra-link a:hover, .product-grid-style2 .product-extra-link .addcart-link:hover, .product-grid-style2 .detail .more-detail
    {border-color:'.$main_color2.'}'."\n";

    $style .= '.time-title h3.title18:after
    {border-left-color:'.$main_color2.'}'."\n";

    $style .= '.time-title h3.title18:before
    {border-right-color:'.$main_color2.'}'."\n";

    $style .= '.header5 .mini-cart1:hover .cart-svg svg
    {fill:'.$main_color2.'}'."\n";
}

/*****END MAIN COLOR*****/

/*****BEGIN CUSTOM CSS*****/
$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}

/*****END CUSTOM CSS*****/

/*****BEGIN BREADCRUMB COLOR*****/
$bread_color = s7upf_get_option('breadcrumb_text');
$bread_color_hover = s7upf_get_option('breadcrumb_text_hover');
if(is_array($bread_color) && !empty($bread_color)){
    $style .= '.bread-crumb a,.bread-crumb span{';
    $style .= s7upf_fill_css_typography($bread_color);
    $style .= '}'."\n";
}
if(is_array($bread_color_hover) && !empty($bread_color_hover)){
    $style .= '.bread-crumb a:hover{';
    $style .= s7upf_fill_css_typography($bread_color_hover);
    $style .= '}'."\n";
}
/*****END CUSTOM CSS*****/

/*****BEGIN MENU COLOR*****/
$menu_color = s7upf_get_option('sv_menu_color');
$menu_hover = s7upf_get_option('sv_menu_color_hover');
$menu_active = s7upf_get_option('sv_menu_color_active');
$menu_color2 = s7upf_get_option('sv_menu_color2');
$menu_hover2 = s7upf_get_option('sv_menu_color_hover2');
$menu_active2 = s7upf_get_option('sv_menu_color_active2');
if(is_array($menu_color) && !empty($menu_color)){
    $style .= '.main-nav>ul>li>a{';
    $style .= s7upf_fill_css_typography($menu_color,' !important');
    $style .= '}'."\n";
}
if(!empty($menu_hover)){
    $style .= '.main-nav ul>li:hover>a,
    .main-nav>ul>li>a:focus,
    .main-nav>ul>li.current-menu-item>a,
    .main-nav>ul>li.current-menu-ancestor>a
    {color:'.$menu_hover.' !important}'."\n";
}
if(!empty($menu_active)){
    $style .= '.main-nav>ul>li.current-menu-item>a,
    .main-nav>ul>li.current-menu-ancestor>a,
    .main-nav>ul>li:hover>a
    {background-color:'.$menu_active.' !important}'."\n";
}
// Sub menu
if(is_array($menu_color2) && !empty($menu_color2)){
    $style .= '.sub-menu>li>a{';
    $style .= s7upf_fill_css_typography($menu_color2,' !important');
    $style .= '}'."\n";
}
if(!empty($menu_hover2)){
    $style .= '.main-nav li:not(.has-mega-menu) .sub-menu li:hover >a,
    .main-nav li:not(.has-mega-menu) .sub-menu li>a:focus,
    .main-nav .sub-menu li.current-menu-item >a,
    .main-nav .sub-menu li.current-menu-ancestor >a
    {color:'.$menu_hover2.' !important}'."\n";
}
if(!empty($menu_active2)){
    $style .= '.main-nav li:not(.has-mega-menu) .sub-menu li:hover,
    .main-nav .sub-menu li.current-menu-item,
    .main-nav .sub-menu li.current-menu-ancestor
    {background-color:'.$menu_active2.' !important}'."\n";
}
/*****END MENU COLOR*****/

/*****BEGIN TYPOGRAPHY*****/
$typo_data = s7upf_get_option('s7upf_custom_typography');
if(is_array($typo_data) && !empty($typo_data)){
    foreach ($typo_data as $value) {
        switch ($value['typo_area']) {
             case 'body':
                $style_class = 'body';
                break;

            case 'header':
                $style_class = '#header';
                break;

            case 'footer':
                $style_class = '#footer';
                break;

            case 'widget':
                $style_class = '#main-content .widget';
                break;
            
            default:
                $style_class = '#main-content';
                break;
        }
        $class_array = explode(',', $style_class);
        $new_class = '';
        if(is_array($class_array)){
            foreach ($class_array as $prefix) {
                $new_class .= $prefix.' '.$value['typo_heading'].',';
            }
        }
        if(!empty($new_class)) $style .= $new_class.' .nocss{';
        $style .= s7upf_fill_css_typography($value['typography_style']);        
        $style .= '}';
        $style .= "\n";
    }
}

/*****END TYPOGRAPHY*****/

$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}
if(!empty($style)) print $style;
?>