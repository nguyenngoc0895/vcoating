<div class="category style2 <?php echo esc_attr($el_class)?> <?php echo esc_attr($style) ?>">
    <?php    
    if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item">
        <div class="block-payment text-right">
            <div class="item-cat-list">
                <?php
                $orderby = 'name';
                    $order = 'asc';
                    $hide_empty = false ;
                    $cat_args = array(
                        'orderby'    => $orderby,
                        'order'      => $order,
                        'hide_empty' => $hide_empty,
                    );
                     
                    $product_categories = get_terms( 'product_cat', $cat_args );
                     
                    if( !empty($product_categories) ){
                        echo '<div class="all-cate">';
                            echo '<div class="row">';
                                foreach ($product_categories as $key => $category) {
                                echo '<div class="list-col-item list-3-item">';
                                    echo '<a class="hvr-wobble-horizontal" href="'.get_term_link($category).'" >';
                                    echo esc_html($category->name);
                                    echo '</a>';
                                echo '</div>';
                            }
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>