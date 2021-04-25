<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('s7upf_set_theme_config')){
    function s7upf_set_theme_config(){
        global $s7upf_dir,$s7upf_config;
        /**************************************** BEGIN ****************************************/
        $s7upf_dir = get_template_directory_uri() . '/7upframe';
        $s7upf_config = array();
        $s7upf_config['dir'] = $s7upf_dir;
        $s7upf_config['css_url'] = $s7upf_dir . '/assets/css/';
        $s7upf_config['js_url'] = $s7upf_dir . '/assets/js/';
        $s7upf_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'hama' ),
        );
        $s7upf_config['mega_menu'] = '1';
        $s7upf_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'hama' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'hama'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        $s7upf_config['import_config'] = array(
                'homepage_default'          => 'Home',
                'blogpage_default'          => 'Blog',
                'menu_locations'            => array("Main Menu" => "primary"),
                'set_woocommerce_page'      => 1
            );
        $s7upf_config['import_theme_option'] = 'YTo5Njp7czoxNzoiczd1cGZfaGVhZGVyX3BhZ2UiO3M6NDoiMTQ1NyI7czoxNzoiczd1cGZfZm9vdGVyX3BhZ2UiO3M6MzoiODE1IjtzOjE0OiJzN3VwZl80MDRfcGFnZSI7czowOiIiO3M6MjA6InM3dXBmXzQwNF9wYWdlX3N0eWxlIjtzOjA6IiI7czoyMDoiczd1cGZfc2hvd19icmVhZHJ1bWIiO3M6Mjoib24iO3M6MTk6InM3dXBmX2JnX2JyZWFkY3J1bWIiO3M6MDoiIjtzOjE1OiJicmVhZGNydW1iX3RleHQiO3M6MDoiIjtzOjIxOiJicmVhZGNydW1iX3RleHRfaG92ZXIiO3M6MDoiIjtzOjEyOiJzaG93X3ByZWxvYWQiO3M6Mzoib2ZmIjtzOjEwOiJwcmVsb2FkX2JnIjtzOjc6IiMwNmNjYWIiO3M6MTM6InByZWxvYWRfc3R5bGUiO3M6Njoic3R5bGUzIjtzOjExOiJwcmVsb2FkX2ltZyI7czo1NDoiaHR0cDovL2xvY2FsaG9zdC92aW5oL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE4LzA0LzEuanBnIjtzOjE1OiJzaG93X3Njcm9sbF90b3AiO3M6Mjoib24iO3M6MjY6InNob3dfd2lzaGxpc3Rfbm90aWZpY2F0aW9uIjtzOjI6Im9uIjtzOjE0OiJzaG93X3Rvb19wYW5lbCI7czoyOiJvbiI7czoxNToidG9vbF9wYW5lbF9wYWdlIjtzOjM6IjU2NSI7czoxMjoic2Vzc2lvbl9wYWdlIjtzOjM6Im9mZiI7czo3OiJib2R5X2JnIjtzOjc6IiNmZmZmZmYiO3M6MTA6Im1haW5fY29sb3IiO3M6NzoiI2ZhYjUwMiI7czoxMToibWFpbl9jb2xvcjIiO3M6MDoiIjtzOjE2OiJzN3VwZl9wYWdlX3N0eWxlIjtzOjA6IiI7czoxNToiY29udGFpbmVyX3dpZHRoIjtzOjA6IiI7czoxMToibWFwX2FwaV9rZXkiO3M6MDoiIjtzOjE3OiJwb3N0X3NpbmdsZV9zaGFyZSI7YToxOntpOjI7czo3OiJwcm9kdWN0Ijt9czoxMzoic3ZfbWVudV9jb2xvciI7czowOiIiO3M6MTk6InN2X21lbnVfY29sb3JfaG92ZXIiO3M6MDoiIjtzOjIwOiJzdl9tZW51X2NvbG9yX2FjdGl2ZSI7czowOiIiO3M6MTQ6InN2X21lbnVfY29sb3IyIjtzOjA6IiI7czoyMDoic3ZfbWVudV9jb2xvcl9ob3ZlcjIiO3M6MDoiIjtzOjIxOiJzdl9tZW51X2NvbG9yX2FjdGl2ZTIiO3M6MDoiIjtzOjI3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX2Jsb2ciO3M6NDoibGVmdCI7czoxODoiczd1cGZfc2lkZWJhcl9ibG9nIjtzOjEyOiJibG9nLXNpZGViYXIiO3M6MTg6ImJsb2dfZGVmYXVsdF9zdHlsZSI7czo0OiJsaXN0IjtzOjEwOiJibG9nX3N0eWxlIjtzOjA6IiI7czoxODoiYmxvZ19udW1iZXJfZmlsdGVyIjtzOjM6Im9mZiI7czoxNjoiYmxvZ190eXBlX2ZpbHRlciI7czozOiJvZmYiO3M6MTQ6InBvc3RfbGlzdF9zaXplIjtzOjA6IiI7czoyMDoicG9zdF9saXN0X2l0ZW1fc3R5bGUiO3M6MDoiIjtzOjE2OiJwb3N0X2dyaWRfY29sdW1uIjtzOjE6IjMiO3M6MTQ6InBvc3RfZ3JpZF9zaXplIjtzOjA6IiI7czoxNzoicG9zdF9ncmlkX2V4Y2VycHQiO3M6MjoiODAiO3M6MjA6InBvc3RfZ3JpZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNDoicG9zdF9ncmlkX3R5cGUiO3M6MDoiIjtzOjI3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3Bvc3QiO3M6Mjoibm8iO3M6MTg6InM3dXBmX3NpZGViYXJfcG9zdCI7czowOiIiO3M6MjE6InBvc3Rfc2luZ2xlX3RodW1ibmFpbCI7czoyOiJvbiI7czoxNjoicG9zdF9zaW5nbGVfc2l6ZSI7czowOiIiO3M6MTY6InBvc3Rfc2luZ2xlX21ldGEiO3M6Mjoib24iO3M6MTg6InBvc3Rfc2luZ2xlX2F1dGhvciI7czoyOiJvbiI7czoyMjoicG9zdF9zaW5nbGVfbmF2aWdhdGlvbiI7czoyOiJvbiI7czoxOToicG9zdF9zaW5nbGVfcmVsYXRlZCI7czoyOiJvbiI7czoyNToicG9zdF9zaW5nbGVfcmVsYXRlZF90aXRsZSI7czowOiIiO3M6MjY6InBvc3Rfc2luZ2xlX3JlbGF0ZWRfbnVtYmVyIjtzOjA6IiI7czoyNDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtIjtzOjA6IiI7czozMDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlIjtzOjI6Im5vIjtzOjE4OiJzN3VwZl9zaWRlYmFyX3BhZ2UiO3M6OToic2lkZWJhci0yIjtzOjM1OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2VfYXJjaGl2ZSI7czoyOiJubyI7czoyNjoiczd1cGZfc2lkZWJhcl9wYWdlX2FyY2hpdmUiO3M6OToic2lkZWJhci0yIjtzOjM0OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2Vfc2VhcmNoIjtzOjI6Im5vIjtzOjI1OiJzN3VwZl9zaWRlYmFyX3BhZ2Vfc2VhcmNoIjtzOjk6InNpZGViYXItMiI7czoxNzoiczd1cGZfYWRkX3NpZGViYXIiO2E6Mzp7aTowO2E6Mzp7czo1OiJ0aXRsZSI7czoxOToiV29vQ29tbWVyY2UgU2lkZWJhciI7czoyMDoid2lkZ2V0X3RpdGxlX2hlYWRpbmciO3M6MjoiaDMiO3M6MjA6IndpZGdldF9jbGFzc19oZWFkaW5nIjtzOjA6IiI7fWk6MTthOjM6e3M6NToidGl0bGUiO3M6OToiU2lkZWJhciAyIjtzOjIwOiJ3aWRnZXRfdGl0bGVfaGVhZGluZyI7czoyOiJoMyI7czoyMDoid2lkZ2V0X2NsYXNzX2hlYWRpbmciO3M6MTU6InNpZGViYXItc3R5bGUtMiI7fWk6MjthOjM6e3M6NToidGl0bGUiO3M6MTU6IlNpZGViYXIgUHJvZHVjdCI7czoyMDoid2lkZ2V0X3RpdGxlX2hlYWRpbmciO3M6MjoiaDMiO3M6MjA6IndpZGdldF9jbGFzc19oZWFkaW5nIjtzOjE1OiJzaWRlYmFyLXN0eWxlLTIiO319czoyMzoiczd1cGZfY3VzdG9tX3R5cG9ncmFwaHkiO2E6MTp7aTowO2E6NDp7czo1OiJ0aXRsZSI7czowOiIiO3M6OToidHlwb19hcmVhIjtzOjQ6Im1haW4iO3M6MTI6InR5cG9faGVhZGluZyI7czowOiIiO3M6MTY6InR5cG9ncmFwaHlfc3R5bGUiO3M6MDoiIjt9fXM6MTI6Imdvb2dsZV9mb250cyI7YToyOntpOjA7YTozOntzOjY6ImZhbWlseSI7czo2OiJvc3dhbGQiO3M6ODoidmFyaWFudHMiO2E6Njp7aTowO3M6MzoiMjAwIjtpOjE7czozOiIzMDAiO2k6MjtzOjc6InJlZ3VsYXIiO2k6MztzOjM6IjUwMCI7aTo0O3M6MzoiNjAwIjtpOjU7czozOiI3MDAiO31zOjc6InN1YnNldHMiO2E6MTp7aTowO3M6NToibGF0aW4iO319aToxO2E6MTp7czo2OiJmYW1pbHkiO3M6MDoiIjt9fXM6MjY6InM3dXBmX3NpZGViYXJfcG9zaXRpb25fd29vIjtzOjQ6ImxlZnQiO3M6MTc6InM3dXBmX3NpZGViYXJfd29vIjtzOjk6InNpZGViYXItMiI7czoxODoic2hvcF9kZWZhdWx0X3N0eWxlIjtzOjQ6ImdyaWQiO3M6MTY6InNob3BfZ2FwX3Byb2R1Y3QiO3M6MDoiIjtzOjE1OiJ3b29fc2hvcF9udW1iZXIiO3M6MjoiMTIiO3M6MTU6InN2X3NldF90aW1lX3dvbyI7czowOiIiO3M6MTA6InNob3Bfc3R5bGUiO3M6MDoiIjtzOjk6InNob3BfYWpheCI7czozOiJvZmYiO3M6MjA6InNob3BfdGh1bWJfYW5pbWF0aW9uIjtzOjA6IiI7czoxODoic2hvcF9udW1iZXJfZmlsdGVyIjtzOjI6Im9uIjtzOjE2OiJzaG9wX3R5cGVfZmlsdGVyIjtzOjI6Im9uIjtzOjE0OiJzaG9wX2xpc3Rfc2l6ZSI7czowOiIiO3M6MjA6InNob3BfbGlzdF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNjoic2hvcF9ncmlkX2NvbHVtbiI7czoxOiIzIjtzOjE0OiJzaG9wX2dyaWRfc2l6ZSI7czowOiIiO3M6MjA6InNob3BfZ3JpZF9pdGVtX3N0eWxlIjtzOjY6InN0eWxlNCI7czoxNDoic2hvcF9ncmlkX3R5cGUiO3M6MDoiIjtzOjMwOiJzdl9zaWRlYmFyX3Bvc2l0aW9uX3dvb19zaW5nbGUiO3M6NDoibGVmdCI7czoyMToic3Zfc2lkZWJhcl93b29fc2luZ2xlIjtzOjE1OiJzaWRlYmFyLXByb2R1Y3QiO3M6MTg6InByb2R1Y3RfaW1hZ2Vfem9vbSI7czoxMToiem9vbS1zdHlsZTMiO3M6MTg6InByb2R1Y3RfdGFiX2RldGFpbCI7czowOiIiO3M6MTI6InNob3dfZXhjZXJwdCI7czoyOiJvbiI7czoxMToic2hvd19sYXRlc3QiO3M6Mjoib24iO3M6MTE6InNob3dfdXBzZWxsIjtzOjI6Im9uIjtzOjEyOiJzaG93X3JlbGF0ZWQiO3M6Mjoib24iO3M6MTg6InNob3dfc2luZ2xlX251bWJlciI7czoxOiI4IjtzOjE2OiJzaG93X3NpbmdsZV9zaXplIjtzOjc6IjYwMHg2MDAiO3M6MTk6InNob3dfc2luZ2xlX2l0ZW1yZXMiO3M6MjI6IjA6MSw0ODA6Miw5OTA6MywxMjAwOjMiO3M6MjI6InNob3dfc2luZ2xlX2l0ZW1fc3R5bGUiO3M6Njoic3R5bGU0IjtzOjE1OiJzaG93X3NpemVfY2hhcnQiO3M6Mjoib24iO3M6MTQ6ImltZ19zaXplX2NoYXJ0IjthOjY6e3M6MTY6ImJhY2tncm91bmQtY29sb3IiO3M6MDoiIjtzOjE3OiJiYWNrZ3JvdW5kLXJlcGVhdCI7czowOiIiO3M6MjE6ImJhY2tncm91bmQtYXR0YWNobWVudCI7czowOiIiO3M6MTk6ImJhY2tncm91bmQtcG9zaXRpb24iO3M6MDoiIjtzOjE1OiJiYWNrZ3JvdW5kLXNpemUiO3M6MDoiIjtzOjE2OiJiYWNrZ3JvdW5kLWltYWdlIjtzOjc2OiJodHRwOi8vN3VwdGhlbWUuY29tL3dvcmRwcmVzcy9oYW1hL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE4LzA1L3NpemUtY2hhcnQuanBnIjt9czoxODoic2hvd19wb3B1cF9hZGRjYXJ0IjtzOjI6Im9uIjt9';
        $s7upf_config['import_widget'] = '{"blog-sidebar":{"categories-3":{"title":"Categories","count":0,"hierarchical":0,"dropdown":0},"s7upf_bloglistpostswidget-1":{"title":"","posts_per_page":"5","style":"default","category":"18","order":"desc","order_by":"none","image_size":"100x67","popular":"Popular","recent":"Recent","category_recent":"0","order_recent":"desc","order_by_recent":"none","posts_per_page_recent":"5"},"s7upf_advantage_widget-1":{"title":"","advs":{"1":{"link":"#","text-top":"up to 30% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview1.jpg"},"2":{"link":"#","text-top":"up to 70% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview2.jpg"},"3":{"link":"#","text-top":"up to 60% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview3.jpg"}}},"s7upf_widget_product_slider-1":{"title":"Top sellers","number_post":"8","product_type":"","title_category":"","s7upf_cart_uncategorized":0,"s7upf_cart_bathroomlighting":0,"s7upf_cart_bedroomlighting":0,"s7upf_cart_diningroomlighting":0,"s7upf_cart_drinks":0,"s7upf_cart_fashions":0,"s7upf_cart_foods":0,"s7upf_cart_furniture":0,"s7upf_cart_homeware":0,"s7upf_cart_jewelry":0,"s7upf_cart_kitchenlighting":0,"s7upf_cart_sport":0,"order_by":"none","order":"DESC","number_row":"3","image_size":"","s7upf_cart_computer-accessories":0,"s7upf_cart_handbags":0,"s7upf_cart_led-lighting":0,"s7upf_cart_medical-devices":0,"s7upf_cart_mens":0,"s7upf_cart_outdoor-sport":0,"s7upf_cart_watches":0,"s7upf_cart_womens":0,"s7upf_cart_yoga-helth":0},"tag_cloud-1":{"title":"Tags","count":0,"taxonomy":"post_tag"}},"woocommerce-sidebar":{"s7upf_category_fillter-2":{"title":"Categories","category":["bathroomlighting","bedroomlighting","diningroomlighting","kitchenlighting","led-lighting"]},"text-2":{"title":"Shop By","text":"","filter":true,"visual":true},"s7upf_attribute_filter-1":{"title":"MANUFACTURER","attribute":"manufacturer"},"woocommerce_price_filter-1":{"title":"Filter by price"},"s7upf_attribute_filter-2":{"title":"Shop by color","attribute":"color"},"s7upf_attribute_filter-3":{"title":"Shop by size","attribute":"size"},"s7upf_widget_product_slider-2":{"title":"top sellers","number_post":"9","product_type":"","title_category":"","s7upf_cart_uncategorized":0,"s7upf_cart_bathroomlighting":1,"s7upf_cart_bedroomlighting":1,"s7upf_cart_diningroomlighting":1,"s7upf_cart_drinks":1,"s7upf_cart_fashions":1,"s7upf_cart_foods":1,"s7upf_cart_furniture":1,"s7upf_cart_homeware":0,"s7upf_cart_jewelry":0,"s7upf_cart_kitchenlighting":0,"s7upf_cart_sport":0,"order_by":"none","order":"DESC","number_row":"3","image_size":"","s7upf_cart_mens":0,"s7upf_cart_womens":0,"s7upf_cart_computer-accessories":0,"s7upf_cart_handbags":0,"s7upf_cart_led-lighting":0,"s7upf_cart_medical-devices":0,"s7upf_cart_outdoor-sport":0,"s7upf_cart_watches":0,"s7upf_cart_yoga-helth":0},"woocommerce_product_tag_cloud-1":{"title":"tags"}},"sidebar-2":{"s7upf_category_fillter-1":{"title":"Categoties","category":["bathroomlighting","bedroomlighting","drinks","fashions","furniture","homeware"]},"woocommerce_price_filter-2":{"title":"price"},"s7upf_attribute_filter-4":{"title":"Color","attribute":"color"},"s7upf_attribute_filter-5":{"title":"Size","attribute":"size"},"s7upf_attribute_filter-6":{"title":"Manufacturer","attribute":"manufacturer"},"s7upf_widget_product_slider-3":{"title":"top sellers","number_post":"8","product_type":"","title_category":"","s7upf_cart_uncategorized":0,"s7upf_cart_bathroomlighting":0,"s7upf_cart_bedroomlighting":0,"s7upf_cart_diningroomlighting":0,"s7upf_cart_drinks":0,"s7upf_cart_fashions":1,"s7upf_cart_foods":1,"s7upf_cart_furniture":1,"s7upf_cart_homeware":0,"s7upf_cart_jewelry":0,"s7upf_cart_kitchenlighting":0,"s7upf_cart_sport":0,"order_by":"none","order":"DESC","number_row":"3","image_size":"","s7upf_cart_mens":0,"s7upf_cart_womens":0,"s7upf_cart_computer-accessories":0,"s7upf_cart_handbags":0,"s7upf_cart_led-lighting":0,"s7upf_cart_medical-devices":0,"s7upf_cart_outdoor-sport":0,"s7upf_cart_watches":0,"s7upf_cart_yoga-helth":0},"s7upf_advantage_widget-2":{"title":"","advs":{"1":{"link":"#","text-top":"up to 30% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview1.jpg"},"2":{"link":"#","text-top":"up to 50% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview2.jpg"},"3":{"link":"#","text-top":"up to 70% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview3.jpg"}}}},"sidebar-product":{"woocommerce_product_categories-1":{"title":"Categories","orderby":"name","dropdown":0,"count":1,"hierarchical":1,"show_children_only":0,"hide_empty":1,"max_depth":""},"s7upf_widget_product_slider-4":{"title":"TOP SELLERS","number_post":"8","product_type":"","title_category":"","s7upf_cart_uncategorized":0,"s7upf_cart_bathroomlighting":0,"s7upf_cart_bedroomlighting":0,"s7upf_cart_diningroomlighting":0,"s7upf_cart_drinks":0,"s7upf_cart_fashions":0,"s7upf_cart_foods":1,"s7upf_cart_furniture":1,"s7upf_cart_homeware":0,"s7upf_cart_jewelry":0,"s7upf_cart_kitchenlighting":0,"s7upf_cart_sport":1,"order_by":"none","order":"DESC","number_row":"3","image_size":"","s7upf_cart_mens":0,"s7upf_cart_womens":0,"s7upf_cart_computer-accessories":0,"s7upf_cart_handbags":0,"s7upf_cart_led-lighting":0,"s7upf_cart_medical-devices":0,"s7upf_cart_outdoor-sport":0,"s7upf_cart_watches":0,"s7upf_cart_yoga-helth":0},"woocommerce_product_tag_cloud-2":{"title":"Tags"},"s7upf_advantage_widget-3":{"title":"","advs":{"1":{"link":"","text-top":"up to 30% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview1.jpg"},"2":{"link":"#","text-top":"up to 30% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview2.jpg"},"3":{"link":"#","text-top":"up to 30% off","text-bot":"SHOP NOW!","image":"http:\/\/7uptheme.com\/wordpress\/hama\/wp-content\/uploads\/2017\/12\/banner-slider-listview3.jpg"}}}}}';
        $s7upf_config['import_category'] = '{"uncategorized":{"thumbnail":"","parent":"bedroomlighting"},"bag":{"thumbnail":"2278","parent":""},"bathroomlighting":{"thumbnail":"","parent":""},"bedroomlighting":{"thumbnail":"","parent":""},"computer-accessories":{"thumbnail":"2118","parent":""},"deal":{"thumbnail":"","parent":""},"diningroomlighting":{"thumbnail":"","parent":""},"drinks":{"thumbnail":"0","parent":"bathroomlighting"},"fashions":{"thumbnail":"","parent":""},"foods":{"thumbnail":"","parent":"kitchenlighting"},"furniture":{"thumbnail":"","parent":"bathroomlighting"},"handbags":{"thumbnail":"2120","parent":""},"homeware":{"thumbnail":"","parent":""},"jewelry":{"thumbnail":"2121","parent":""},"kitchenlighting":{"thumbnail":"","parent":""},"led-lighting":{"thumbnail":"2122","parent":""},"medical-devices":{"thumbnail":"2123","parent":""},"mens":{"thumbnail":"2167","parent":""},"outdoor-sport":{"thumbnail":"2124","parent":""},"sport":{"thumbnail":"1727","parent":"bathroomlighting"},"watches":{"thumbnail":"2125","parent":""},"womens":{"thumbnail":"2148","parent":""},"yoga-helth":{"thumbnail":"2126","parent":""}}';

        /**************************************** PLUGINS ****************************************/

        $s7upf_config['require-plugin'] = array(
            array(
                'name'      => esc_html__( '7up Core', 'hama'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.0',
            ),   
            array(
                'name'               => esc_html__('Option Tree', 'hama'), // The plugin name.
                'slug'               => 'option-tree', // The plugin slug (typically the folder name).
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            ),
            array(
                'name'      => esc_html__( 'Visual Composer', 'hama'),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/js_composer.zip',
                'version'   => '5.5.2',
            ),           
            array(
                'name'      => esc_html__( 'WooCommerce', 'hama'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'hama'),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('MailChimp for WordPress Lite','hama'),
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Compare','hama'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','hama'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => false,
            )
        );

    /**************************************** PLUGINS ****************************************/
        $s7upf_config['theme-option'] = array(
            'sections' => array(
                array(
                    'id'    => 'option_basic',
                    'title' => '<i class="fa fa-cog"></i>'.esc_html__(' Basic Settings', 'hama')
                ),
                array(
                    'id'    => 'option_menu',
                    'title' => '<i class="fa fa-align-justify"></i>'.esc_html__(' Menu Settings', 'hama')
                ),
                array(
                    'id'    => 'blog_post',
                    'title' => '<i class="fa fa-bold"></i>'.esc_html__(' Blog & Post', 'hama')
                ),
                array(
                    'id'    => 'option_layout',
                    'title' => '<i class="fa fa-columns"></i>'.esc_html__(' Layout Settings', 'hama')
                ),
                array(
                    'id'    => 'option_typography',
                    'title' => '<i class="fa fa-font"></i>'.esc_html__(' Typography', 'hama')
                )
            ),
            'settings' => array(
                 /*----------------Begin Basic --------------------*/
                array(
                    'id'          => 'tab_general_theme',
                    'type'        => 'tab',
                    'section'     => 'option_basic',
                    'label'       => esc_html__('General','hama')
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'hama' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'hama' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'hama' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'hama' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 's7upf_404_page',
                    'label'       => esc_html__( '404 Page', 'hama' ),
                    'desc'        => esc_html__( 'Include page to 404 page', 'hama' ),
                    'type'        => 'page-select',
                    'section'     => 'option_basic'
                ),
                array(
                    'id'          => 's7upf_404_page_style',
                    'label'       => esc_html__( '404 Style', 'hama' ),
                    'desc'        => esc_html__( 'Choose a style to display.', 'hama' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'value' => '',
                            'label' => esc_html__('Default','hama'),
                        ),
                        array(
                            'value' => 'full-width',
                            'label' => esc_html__('FullWidth','hama'),
                        ),
                    ),
                    'condition'   => 's7upf_404_page:not()',
                ),
                array(
                    'id'        => 'tab_breadcrumb',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Breadcumb','hama')
                ),
                array(
                    'id'        => 's7upf_show_breadrumb',
                    'label'     => esc_html__('Show BreadCrumb', 'hama'),
                    'desc'      => esc_html__('This allow you to show or hide BreadCrumb', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'on'
                ),
                array(
                    'id'          => 's7upf_bg_breadcrumb',
                    'label'       => esc_html__('Background Breadcrumb','hama'),
                    'type'        => 'background',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom background for breadcrumb.', 'hama' ),
                ),
                array(
                    'id'          => 'breadcrumb_text',
                    'label'       => esc_html__('Breadcrumb text','hama'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font in breadcrumb.', 'hama' ),
                ),
                array(
                    'id'          => 'breadcrumb_text_hover',
                    'label'       => esc_html__('Breadcrumb text hover','hama'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font when you hover in text of breadcrumb.', 'hama' ),
                ),
                array(
                    'id'        => 'tab_preload',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Preload','hama')
                ),
                array(
                    'id'        => 'show_preload',
                    'label'     => esc_html__('Show Preload', 'hama'),
                    'desc'      => esc_html__('This allow you to show or hide preload', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'preload_bg',
                    'label'       => esc_html__('Background','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'hama' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_style',
                    'label'       => esc_html__('Preload Style','hama'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Style 1','hama'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Style 2','hama'),
                            'value' =>  'style2'
                        ),
                        array(
                            'label' =>  esc_html__('Style 3','hama'),
                            'value' =>  'style3'
                        ),
                        array(
                            'label' =>  esc_html__('Style 4','hama'),
                            'value' =>  'style4'
                        ),
                        array(
                            'label' =>  esc_html__('Style 5','hama'),
                            'value' =>  'style5'
                        ),
                        array(
                            'label' =>  esc_html__('Style 6','hama'),
                            'value' =>  'style6'
                        ),
                        array(
                            'label' =>  esc_html__('Style 7','hama'),
                            'value' =>  'style7'
                        ),
                        array(
                            'label' =>  esc_html__('Custom image','hama'),
                            'value' =>  'custom-image'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for pages.', 'hama' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_img',
                    'label'       => esc_html__('Preload Image','hama'),
                    'type'        => 'upload',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Choose a image to display as preload.', 'hama' ),
                    'condition'   => 'show_preload:is(on),preload_style:is(custom-image)',
                ),
                array(
                    'id'        => 'tab_other',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Other','hama')
                ),
                array(
                    'id'        => 'show_scroll_top',
                    'label'     => esc_html__('Show scroll top button', 'hama'),
                    'desc'      => esc_html__('This allow you to show or hide scroll top button', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_wishlist_notification',
                    'label'     => esc_html__('Show wishlist notification', 'hama'),
                    'desc'      => esc_html__('This allow you to show or hide wishlist notification when add to wishlist.', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_too_panel',
                    'label'     => esc_html__('Show tool panel', 'hama'),
                    'desc'      => esc_html__('This allow you to show or hide tool panel.', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'tool_panel_page',
                    'label'       => esc_html__( 'Choose tool panel page', 'hama' ),
                    'desc'        => esc_html__( 'Choose a mega page to display.', 'hama' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'condition'   => 'show_too_panel:is(on)',
                ),
                array(
                    'id'        => 'session_page',
                    'label'     => esc_html__('Session page', 'hama'),
                    'desc'      => esc_html__('Enable session page to auto load header,footer,main color in other pages.', 'hama'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'hama' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change main color of your site.', 'hama' ),
                ),
                array(
                    'id'          => 'main_color2',
                    'label'       => esc_html__('Main color 2','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change main color 2 of your site.', 'hama' ),
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','hama'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Default','hama'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Page boxed','hama'),
                            'value' =>  'page-content-box'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for pages.', 'hama' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','hama'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'You can custom width of container on your site. Default is 1200px.', 'hama' ),
                ), 
                array(
                    'id'          => 'map_api_key',
                    'label'       => esc_html__('Map API key','hama'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'std'         => '',// ex: AIzaSyBX2IiEBg-0lQKQQ6wk6sWRGQnWI7iogf0
                    'desc'        => esc_html__( 'Enter your Map API key to display your location on google maps element.', 'hama' ).' </br><a target="_blank" href="//developers.google.com/maps/documentation/javascript/get-api-key">Get API</a>',
                ),
                array(
                    'id'          => 'post_single_share',
                    'label'       => esc_html__('Show share box','hama'),
                    'type'        => 'checkbox',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Post','hama'),
                            'value' =>  'post',
                        ),
                        array(
                            'label' =>  esc_html__('Page','hama'),
                            'value' =>  'page',
                        ),
                        array(
                            'label' =>  esc_html__('Product','hama'),
                            'value' =>  'product'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box on post, page, product pages. ', 'hama' ),
                ),
                array(
                    'id'          => 'post_single_share_list',
                    'label'       => esc_html__('Add custom share box','hama'),
                    'type'        => 'list-item',
                    'section'     => 'option_basic',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'social',
                            'label'       => esc_html__('Social','hama'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'total',
                                    'label'=>esc_html__('Total share','hama'),
                                ),
                                array(
                                    'value'=>'facebook',
                                    'label'=>esc_html__('Facebook','hama'),
                                ),
                                array(
                                    'value'=>'twitter',
                                    'label'=>esc_html__('Twitter','hama'),
                                ),
                                array(
                                    'value'=>'google',
                                    'label'=>esc_html__('Google plus','hama'),
                                ),
                                array(
                                    'value'=>'pinterest',
                                    'label'=>esc_html__('Pinterest','hama'),
                                ),
                                array(
                                    'value'=>'linkedin',
                                    'label'=>esc_html__('Linkedin','hama'),
                                ),
                                array(
                                    'value'=>'tumblr',
                                    'label'=>esc_html__('Tumblr','hama'),
                                ),
                                array(
                                    'value'=>'envelope',
                                    'label'=>esc_html__('Mail','hama'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Show number','hama'),
                            'type'        => 'on-off',
                            'std'         => 'on',                            
                        ),
                    ),
                ),
                /*----------------End Basic ----------------------*/

                /*----------------Begin Menu --------------------*/
                array(
                    'id'          => 'sv_menu_color',
                    'label'       => esc_html__('Menu style','hama'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover',
                    'label'       => esc_html__('Hover color','hama'),
                    'desc'        => esc_html__('Choose color','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active',
                    'label'       => esc_html__('Background Hover color','hama'),
                    'desc'        => esc_html__('Choose color','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color2',
                    'label'       => esc_html__('Menu Sub style','hama'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover2',
                    'label'       => esc_html__('Hover Sub color','hama'),
                    'desc'        => esc_html__('Choose color','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active2',
                    'label'       => esc_html__('Background Sub Hover color','hama'),
                    'desc'        => esc_html__('Choose color','hama'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_menu',
                ),
                /*----------------End Menu ----------------------*/
                
                /*----------------Begin Blog + Post --------------------*/
                array(
                    'id'        => 'tab_blog_general',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('General','hama')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_blog',
                    'label'       => esc_html__('Sidebar Blog','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_blog',
                    'label'       => esc_html__('Sidebar select display in blog','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_blog:not(no)',
                ),
                array(
                    'id'          => 'blog_default_style',
                    'label'       => esc_html__('Default style','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','hama'),
                        ),
                        array(
                            'value'=>'grid',
                            'label'=>esc_html__('Grid','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'blog_style',
                    'label'       => esc_html__('Blog pagination','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','hama'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'blog_number_filter',
                    'label'       => esc_html__('Show number filter','hama'),
                    'desc'        => 'Show/hide number filter on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'blog_number_filter_list',
                    'label'       => esc_html__('Add list number filter','hama'),
                    'type'        => 'list-item',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Add custom list number to filter on the blog page.','hama'),
                    'settings'    => array( 
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Number','hama'),
                            'type'        => 'text',                            
                        ),
                    ),
                    'condition'   => 'blog_number_filter:not(off)',
                ),
                array(
                    'id'          => 'blog_type_filter',
                    'label'       => esc_html__('Show type filter','hama'),
                    'desc'        => 'Show/hide type filter(list/grid) on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                 //Tab list
                array(
                    'id'        => 'tab_blog_list',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('List Settings','hama')
                ),
                array(
                    'id'          => 'post_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','hama'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama')
                ),
                array(
                    'id'          => 'post_list_item_style',
                    'label'       => esc_html__('List item style','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_post_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_blog_grid',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Grid Settings','hama')
                ),
                array(
                    'id'          => 'post_grid_column',
                    'label'       => esc_html__('Grid column','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'std'         => '3',
                    'desc'=>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'2',
                            'label'=>esc_html__('2 column','hama'),
                        ),
                        array(
                            'value'=>'3',
                            'label'=>esc_html__('3 column','hama'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('4 column','hama'),
                        ),
                        array(
                            'value'=>'5',
                            'label'=>esc_html__('5 column','hama'),
                        ),
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('6 column','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'post_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','hama'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama')
                ),
                array(
                    'id'          => 'post_grid_excerpt',
                    'label'       => esc_html__('Grid Sub string excerpt','hama'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'std'         => '80',
                    'desc'        => esc_html__('Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.','hama')
                ),
                array(
                    'id'          => 'post_grid_item_style',
                    'label'       => esc_html__('Grid item style','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_post_style('option')
                ),
                array(
                    'id'          => 'post_grid_type',
                    'label'       => esc_html__('Grid display','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','hama'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','hama'),
                        )
                    )
                ),
                //Post detail
                array(
                    'id'        => 'tab_blog_post_detail',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Post detail Settings','hama')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_post',
                    'label'       => esc_html__('Sidebar Single Post','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_post',
                    'label'       => esc_html__('Sidebar select display in single post','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_post:not(no)',
                ),
                array(
                    'id'          => 'post_single_thumbnail',
                    'label'       => esc_html__('Show thumbnail/media','hama'),
                    'desc'        => 'Show/hide thumbnail image, gallery, media on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),                
                array(
                    'id'          => 'post_single_size',
                    'label'       => esc_html__('Custom single image size','hama'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama'),
                    'condition'   => 'post_single_thumbnail:is(on)',
                ),
                array(
                    'id'          => 'post_single_meta',
                    'label'       => esc_html__('Show meta data','hama'),
                    'desc'        => 'Show/hide meta data(author, date, comments, categories, tags) on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_author',
                    'label'       => esc_html__('Show author box','hama'),
                    'desc'        => 'Show/hide author box on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_navigation',
                    'label'       => esc_html__('Show navigation post','hama'),
                    'desc'        => 'Show/hide navigation to next post or previous post on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                // Related section
                array(
                    'id'          => 'post_single_related',
                    'label'       => esc_html__('Show related post','hama'),
                    'desc'        => 'Show/hide related post on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_related_title',
                    'label'       => esc_html__('Related title','hama'),
                    'desc'        => 'Enter title of related section.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_number',
                    'label'       => esc_html__('Related number post','hama'),
                    'desc'        => 'Enter number of related post to display.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item',
                    'label'       => esc_html__('Related custom number item responsive','hama'),
                    'desc'        => 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item_style',
                    'label'       => esc_html__('Related item style','hama'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_post_style('option'),
                    'condition'   => 'post_single_related:is(on)',
                ),
                // End related

                /*----------------End Blog + Post ----------------------*/

                /*----------------Begin Layout --------------------*/
                array(
                    'id'          => 's7upf_sidebar_position_page',
                    'label'       => esc_html__('Sidebar Page','hama'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page',
                    'label'       => esc_html__('Sidebar select display in page','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page:not(no)',
                ),
                /****end page****/
                array(
                    'id'          => 's7upf_sidebar_position_page_archive',
                    'label'       => esc_html__('Sidebar Position on Page Archives:','hama'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_archive',
                    'label'       => esc_html__('Sidebar select display in page Archives','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_archive:not(no)',
                ),
                array(
                    'id'          => 's7upf_sidebar_position_page_search',
                    'label'       => esc_html__('Sidebar Position on search page:','hama'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_search',
                    'label'       => esc_html__('Sidebar select display in page Archives','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_search:not(no)',
                ),
                // END                
                array(
                    'id'          => 's7upf_add_sidebar',
                    'label'       => esc_html__('Add SideBar','hama'),
                    'type'        => 'list-item',
                    'section'     => 'option_layout',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'widget_title_heading',
                            'label'       => esc_html__('Choose heading title widget','hama'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','hama'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','hama'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','hama'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','hama'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','hama'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','hama'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'widget_class_heading',
                            'label'       => esc_html__('Extra class name','hama'),
                            'type'        => 'text',
                        ),
                    ),
                ),
                /*----------------End Layout ----------------------*/

                /*----------------Begin Blog ----------------------*/       
                

                /*----------------End BLOG----------------------*/

                /*----------------Begin Typography ----------------------*/
                array(
                    'id'          => 's7upf_custom_typography',
                    'label'       => esc_html__('Add Settings','hama'),
                    'type'        => 'list-item',
                    'section'     => 'option_typography',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'typo_area',
                            'label'       => esc_html__('Choose Area to style','hama'),
                            'type'        => 'select',
                            'std'        => 'main',
                            'choices'     => array(
                                array(
                                    'value'=>'body',
                                    'label'=>esc_html__('Body','hama'),
                                ),
                                array(
                                    'value'=>'header',
                                    'label'=>esc_html__('Header','hama'),
                                ),
                                array(
                                    'value'=>'main',
                                    'label'=>esc_html__('Main Content','hama'),
                                ),
                                array(
                                    'value'=>'widget',
                                    'label'=>esc_html__('Widget','hama'),
                                ),
                                array(
                                    'value'=>'footer',
                                    'label'=>esc_html__('Footer','hama'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typo_heading',
                            'label'       => esc_html__('Choose heading Area','hama'),
                            'type'        => 'select',
                            'std'        => '',
                            'choices'     => array(
                                array(
                                    'value'=>'',
                                    'label'=>esc_html__('All','hama'),
                                ),
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','hama'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','hama'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','hama'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','hama'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','hama'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','hama'),
                                ),
                                array(
                                    'value'=>'a',
                                    'label'=>esc_html__('a','hama'),
                                ),
                                array(
                                    'value'=>'p',
                                    'label'=>esc_html__('p','hama'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typography_style',
                            'label'       => esc_html__('Add Style','hama'),
                            'type'        => 'typography',
                            'section'     => 'option_typography',
                        ),
                    ),
                ),        
                array(
                    'id'          => 'google_fonts',
                    'label'       => esc_html__('Add Google Fonts','hama'),
                    'type'        => 'google-fonts',
                    'section'     => 'option_typography',
                ),
                /*----------------End Typography ----------------------*/
            )
        );
        if(class_exists( 'WooCommerce' )){
            // Add woo sections
            $woo_sections = array(
                array(
                    'id' => 'option_woo',
                    'title' => '<i class="fa fa-shopping-cart"></i>'.esc_html__(' Shop Settings', 'hama')
                ),
                array(
                    'id' => 'option_product',
                    'title' => '<i class="fa fa-th-large"></i>'.esc_html__(' Product Settings', 'hama')
                )
            );
            $s7upf_config['theme-option']['sections'] = array_merge($s7upf_config['theme-option']['sections'],$woo_sections);
            // End add sections

            // Add woo setting
            $woo_settings = array(                
                array(
                    'id'        => 'tab_shop_general',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('General','hama')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_woo',
                    'label'       => esc_html__('Sidebar Position WooCommerce page','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Left, or Right, or Center','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_woo',
                    'label'       => esc_html__('Sidebar select WooCommerce page','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_woo',
                    'condition'   => 's7upf_sidebar_position_woo:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','hama'),

                ),
                array(
                    'id'          => 'shop_default_style',
                    'label'       => esc_html__('Default style','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(                        
                        array(
                            'value'=>'grid',
                            'label'=>esc_html__('Grid','hama'),
                        ),
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','hama'),
                        ),
                    )
                ),
                array(
                    'id'          => 'shop_gap_product',
                    'label'       => esc_html__('Gap Products','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose space','hama'),
                    'choices'     => array(                        
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','hama'),
                        ),
                        array(
                            'value'=>'gap-0',
                            'label'=>esc_html__('0','hama'),
                        ),
                        array(
                            'value'=>'gap-5',
                            'label'=>esc_html__('5px','hama'),
                        ),
                        array(
                            'value'=>'gap-10',
                            'label'=>esc_html__('10px','hama'),
                        ),
                        array(
                            'value'=>'gap-15',
                            'label'=>esc_html__('15px','hama'),
                        ),
                        array(
                            'value'=>'gap-20',
                            'label'=>esc_html__('20px','hama'),
                        ),
                        array(
                            'value'=>'gap-30',
                            'label'=>esc_html__('30px','hama'),
                        ),
                        array(
                            'value'=>'gap-40',
                            'label'=>esc_html__('40px','hama'),
                        ),
                        array(
                            'value'=>'gap-50',
                            'label'=>esc_html__('50px','hama'),
                        ),

                    )
                ),
                array(
                    'id'          => 'woo_shop_number',
                    'label'       => esc_html__('Product Number','hama'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'std'         => '12',
                    'desc'        => esc_html__('Enter number product to display per page. Default is 12.','hama')
                ),
                array(
                    'id'          => 'sv_set_time_woo',
                    'label'       => esc_html__('Product new in(days)','hama'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter number to set time for product is new. Unit day. Default is 30.','hama')
                ),
                array(
                    'id'          => 'shop_style',
                    'label'       => esc_html__('Shop pagination','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','hama'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'shop_ajax',
                    'label'       => esc_html__('Shop ajax','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'off'
                ),
                array(
                    'id'          => 'shop_thumb_animation',
                    'label'       => esc_html__('Thumbnail animation','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a animation.','hama'),
                    'choices'     => s7upf_get_product_thumb_animation('option')
                ),
                array(
                    'id'          => 'shop_number_filter',
                    'label'       => esc_html__('Show number filter','hama'),
                    'desc'        => 'Show/hide number filter on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'shop_number_filter_list',
                    'label'       => esc_html__('Add list number filter','hama'),
                    'type'        => 'list-item',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Add custom list number to filter on the blog page.','hama'),
                    'settings'    => array( 
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Number','hama'),
                            'type'        => 'text',                            
                        ),
                    ),
                    'condition'   => 'blog_number_filter:not(off)',
                ),
                array(
                    'id'          => 'shop_type_filter',
                    'label'       => esc_html__('Show type filter','hama'),
                    'desc'        => 'Show/hide type filter(list/grid) on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
                //Tab list
                array(
                    'id'        => 'tab_shop_list',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('List Settings','hama')
                ),

                array(
                    'id'          => 'shop_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','hama'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama')
                ),
                array(
                    'id'          => 'shop_list_item_style',
                    'label'       => esc_html__('List item style','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_product_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_shop_grid',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('Grid Settings','hama')
                ),
                array(
                    'id'          => 'shop_grid_column',
                    'label'       => esc_html__('Grid column','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'std'         => '3',
                    'desc'        => esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=> '2',
                            'label'=> esc_html__('2 column','hama'),
                        ),
                        array(
                            'value'=> '3',
                            'label'=> esc_html__('3 column','hama'),
                        ),
                        array(
                            'value'=> '4',
                            'label'=> esc_html__('4 column','hama'),
                        ),
                        array(
                            'value'=> '5',
                            'label'=> esc_html__('5 column','hama'),
                        ),
                        array(
                            'value'=> '6',
                            'label'=> esc_html__('6 column','hama'),
                        ),
                        array(
                            'value'=> '7',
                            'label'=> esc_html__('7 column','hama'),
                        ),
                        array(
                            'value'=> '8',
                            'label'=> esc_html__('8 column','hama'),
                        ),
                        array(
                            'value'=> '9',
                            'label'=> esc_html__('9 column','hama'),
                        ),
                        array(
                            'value'=> '10',
                            'label'=> esc_html__('10 column','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'shop_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','hama'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama')
                ),
                array(
                    'id'          => 'shop_grid_item_style',
                    'label'       => esc_html__('Grid item style','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'          => 'shop_grid_type',
                    'label'       => esc_html__('Grid display','hama'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','hama'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','hama'),
                        )
                    )
                ),
                array(
                    'id'        => 'tab_product_general',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('General','hama')
                ),
                array(
                    'id'          => 'sv_sidebar_position_woo_single',
                    'label'       => esc_html__('Sidebar Position WooCommerce Single','hama'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Left, or Right, or Center','hama'),
                    'std'         => 'no',
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','hama'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','hama'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','hama'),
                        ),
                    )
                ),
                array(
                    'id'          => 'sv_sidebar_woo_single',
                    'label'       => esc_html__('Sidebar select WooCommerce Single','hama'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_product',
                    'condition'   => 'sv_sidebar_position_woo_single:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','hama'),
                ),
                array(
                    'id'          => 'product_image_zoom',
                    'label'       => esc_html__('Image zoom','hama'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','hama'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('None','hama'),
                        ),
                        array(
                            'value'=>'zoom-style1',
                            'label'=>esc_html__('Zoom 1','hama'),
                        ),
                        array(
                            'value'=>'zoom-style2',
                            'label'=>esc_html__('Zoom 2','hama'),
                        ),
                        array(
                            'value'=>'zoom-style3',
                            'label'=>esc_html__('Zoom 3','hama'),
                        ),
                        array(
                            'value'=>'zoom-style4',
                            'label'=>esc_html__('Zoom 4','hama'),
                        )
                    )
                ),
                array(
                    'id'          => 'show_image_lightbox',
                    'label'       => esc_html__('Show image lightbox','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'product_tab_detail',
                    'label'       => esc_html__('Product tab style','hama'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','hama'),
                    'choices'     => array(
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Normal", 'hama'),
                        ),
                        array(
                            'value'=> 'tab-toggle',
                            'label'=> esc_html__("Tab Toggle", 'hama'),
                        ),
                        array(
                            'value'=> 'detail-without-sidebar',
                            'label'=> esc_html__("Tab Vertical", 'hama'),
                        ),
                    )
                ),
                array(
                    'id'          => 'show_excerpt',
                    'label'       => esc_html__('Show Excerpt','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),                
                array(
                    'id'          => 'show_latest',
                    'label'       => esc_html__('Show latest products','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_upsell',
                    'label'       => esc_html__('Show upsell products','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_related',
                    'label'       => esc_html__('Show related products','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_single_number',
                    'label'       => esc_html__('Show Single Number','hama'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,100,1',
                    'section'     => 'option_product',
                    'std'         => '6'
                ),
                array(
                    'id'          => 'show_single_size',
                    'label'       => esc_html__('Show Single Size','hama'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Custom size for related,upsell products. Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','hama'),
                ),
                array(
                    'id'          => 'show_single_itemres',
                    'label'       => esc_html__('Custom item devices','hama'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','hama'),
                ),
                array(
                    'id'          => 'show_single_item_style',
                    'label'       => esc_html__('Single item style','hama'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to active display','hama'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'          => 'show_size_chart',
                    'label'       => esc_html__('Show Size Chart','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                 array(
                    'id'          => 'img_size_chart',
                    'label'       => esc_html__('Img Size Chart','hama'),
                    'type'        => 'background',
                    'section'     => 'option_product',
                    'condition'   => 'show_size_chart:is(on)',
                ),
                array(
                    'id'          => 'show_popup_addcart',
                    'label'       => esc_html__('Show Popup Add To Cart','hama'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
            );
            $s7upf_config['theme-option']['settings'] = array_merge($s7upf_config['theme-option']['settings'],$woo_settings);
            // End add settings
        }
    }
}
s7upf_set_theme_config();