<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 24/12/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Attribute_Filter') && class_exists("woocommerce")){
    class S7upf_Attribute_Filter extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            register_widget( 'S7upf_Attribute_Filter' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('Attribute Filter','hama'),
                array( 'description' => esc_html__( 'Filter product shop page', 'hama' ), ));

            $this->default=array(
                'title'             => '',
                'attribute'         => '',
            );
        }



        function widget( $args, $instance ) {
            // Widget output
            if(!is_single()){
                echo apply_filters('s7upf_output_content',$args['before_widget']);
                if ( ! empty( $instance['title'] ) ) {
                   echo apply_filters('s7upf_output_content',$args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }

                $instance=wp_parse_args($instance,$this->default);
                extract($instance);                
                $terms = get_terms("pa_".$attribute);
                $attr = S7upf_Woocommerce_Attributes::s7upf_get_tax_attribute( "pa_".$attribute );
                $term_current = '';
                if(isset($_GET['filter_'.$attribute])) $term_current = $_GET['filter_'.$attribute];
                if($term_current != '') $term_current = explode(',', $term_current);
                else $term_current = array();                
                $class_white_color = '';
                if ( ! empty( $attr->attribute_type ) ) {
                    switch ($attr->attribute_type){
                        case 'image':?>
                            <div class="tawcvs-swatches attribute-type-<?php echo esc_attr($attr->attribute_type); ?>">
                                <?php foreach ($terms as $term){                                
                                    if(is_object($term)){$value = get_term_meta( $term->term_id, 'image', true );
                                        $image = $value ? wp_get_attachment_image_url( $value, 'thumbnail' ) : '';
                                        $image = $image ?  $image : WC()->plugin_url() . '/assets/images/placeholder.png';
                                        $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
                                        if(in_array($term->slug, $term_current)) $selected = 'selected';
                                        else $selected = '';
                                        if(!empty($image)){
                                            echo sprintf(
                                                '<a class="swatch swatch-image swatch-%s %s" title="%s" data-value="%s" href="%s"><img src="%s" alt="%s"><span class="hide">%s</span></a>',
                                                esc_attr( $term->slug ),
                                                $selected,
                                                esc_attr( $name ),
                                                esc_attr( $term->slug ),
                                                esc_url( s7upf_get_filter_url('filter_'.$attr->attribute_name,$term->slug) ),
                                                esc_url( $image ),
                                                esc_attr( $name ),
                                                esc_attr( $name )
                                            );
                                        }

                                    }
                                    ?>

                                <?php } ?>
                            </div>
                            <?php
                            break;
                        case 'color': ?>
                            <div class="widget-content tawcvs-swatches attribute-type-<?php echo esc_attr($attr->attribute_type); ?>">
                                <?php 
                                foreach ($terms as $term){
                                    if(is_object($term)){
                                        $color = get_term_meta( $term->term_id, 'color', true );
                                        $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
                                        $class_white_color = '';
                                        if(in_array($term->slug, $term_current)) $selected = 'selected';
                                        else $selected = '';
                                        if(!empty($color)){
                                            $white_color = array('#fff','#ffffff');
                                            if(in_array(strtolower($color), $white_color)) $class_white_color = 'class_white_bg_color';
                                            echo sprintf(
                                                '<a class="swatch swatch-color '.$class_white_color.' swatch-%s %s" style="background-color:'.$color.'" title="%s" href="%s"><span class="hide">%s</span></a>',
                                                esc_attr( $term->slug ),
                                                $selected,
                                                esc_attr( $name ),
                                                esc_url( s7upf_get_filter_url('filter_'.$attr->attribute_name,$term->slug) ),
                                                $name
                                            );
                                        }

                                    }
                                }
                                ?>
                            </div>
                            <?php
                            break;
                        case 'label': 
                            echo    '<div class="widget-content"><ul class="list-none list-attr list-attr-label">';                
                            $terms = get_terms("pa_".$attribute);
                            $term_current = '';
                            if(isset($_GET['filter_'.$attribute])) $term_current = $_GET['filter_'.$attribute];
                            if($term_current != '') $term_current = explode(',', $term_current);
                            else $term_current = array();  
                            if(is_array($terms)){
                                foreach ($terms as $term) {
                                    if(in_array($term->slug, $term_current)){
                                        $active = 'active';
                                    }else {
                                        $active = '';
                                    }
                                    if(is_object($term)){
                                        if(in_array($term->slug, $term_current)) $active = 'active';
                                        else $active = '';
                                        echo    '<li><a class="'.esc_attr($active).'" href="'.esc_url(s7upf_get_filter_url('filter_'.$attribute,$term->slug)).'">'.$term->name.'<span class="count">('.$term->count.')</span></a></li>';
                                    }
                                }
                            }
                            echo    '</ul></div>';
                            break;
                        default :
                            echo    '<ul class="list-filter color-filter">';                
                            if(is_array($terms)){
                                foreach ($terms as $term) {
                                    if(is_object($term)){
                                        if(in_array($term->slug, $term_current)) $active = 'active';
                                        else $active = '';
                                        echo    '<li class="'.esc_attr($term->slug).'-inline">
                                                    <a data-attribute="'.esc_attr($attribute).'" data-term="'.esc_attr($term->slug).'" class="load-shop-ajax '.esc_attr($active).' bgcolor-'.esc_attr($term->slug).'" href="'.esc_url(s7upf_get_filter_url('filter_'.$attribute,$term->slug)).'">
                                                    <span></span>'.$term->name.'
                                                    </a>
                                                    <span class="smoke">('.$term->count.')</span>
                                                </li>';
                                    }
                                }
                            }
                            echo    '</ul>';
                            break;
                    }  
                }                         
                echo apply_filters('s7upf_output_content',$args['after_widget']);
            }
        }

        function update( $new_instance, $old_instance ) {

            // Save widget options
            $instance=array();
            $instance=wp_parse_args($instance,$this->default);
            $new_instance=wp_parse_args($new_instance,$instance);

            return $new_instance;
        }

        function form( $instance ) {
            // Output admin widget options form

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'hama'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>            
            <p>
                <label><?php esc_html_e( 'Attribute:' ,'hama'); ?></label></br>
                <select id="<?php echo esc_attr($this->get_field_id( 'attribute' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'attribute' )); ?>">
                    <?php 
                    global $wpdb;
                    $attribute_taxonomies = wc_get_attribute_taxonomies();
                    if(!empty($attribute_taxonomies)){
                        foreach($attribute_taxonomies as $attr){
                            $selected=selected($attr->attribute_name,$attribute,false);
                            echo "<option {$selected} value='{$attr->attribute_name}'>{$attr->attribute_label}</option>";
                        }
                    }
                    else echo esc_html__("No any attribute.","hama");
                    ?>
                </select>                
            </p>
        <?php
        }
    }

    S7upf_Attribute_Filter::_init();

}
