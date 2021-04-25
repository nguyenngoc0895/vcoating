<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 27/09/2017
 * Time: 11:08 SA
 */
if(!class_exists('S7upf_BlogListPostsWidget'))
{
    class S7upf_BlogListPostsWidget extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            register_widget( 'S7upf_BlogListPostsWidget' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('Posts List tab','hama'),
                array( 'description' => esc_html__( 'Posts list', 'hama' ), ));

            $this->default=array(
                'title'=>esc_html__('List Posts','hama'),
                'posts_per_page'=>4,
                'style'=>'default',
                'category'=>'',
                'order'=>'desc',
                'order_by'=>'ID',
                'image_size'=>'',
                'popular'=>'',
                'recent'=>'',
                'category_recent' => '',
                'order_recent'=>'desc',
                'order_by_recent'=>'ID',
                'posts_per_page_recent'=>4,
            );
        }

        function widget( $args, $instance ) {
            // Widget output
            echo do_shortcode($args['before_widget']);
            if ( ! empty( $instance['title'] ) ) {
                echo do_shortcode($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            $args_post = array(
                'post_type'         => 'post',
                'posts_per_page'    => $posts_per_page,
                'orderby'           => $order_by,
                'order'             => $order,
            );
            if(!empty($category)){
                $args_post['tax_query'][]=array(
                    'taxonomy'=>'category',
                    'field'=>'id',
                    'terms'=> $category
                );
            }
            $post_query = new WP_Query($args_post);

            $args_post_recent = array(
                'post_type'         => 'post',
                'posts_per_page'    => $posts_per_page_recent,
                'order_by'          => $order_by_recent,
                'order'             => $order_recent,
            );
            if(!empty($category_recent)){
                $args_post_recent['tax_query'][]=array(
                    'taxonomy'=>'category',
                    'field'=>'id',
                    'terms'=> $category_recent
                );
            }

            $post_query_recent = new WP_Query($args_post_recent);

            echo S7upf_Template::load_view('widgets/post',false,array(
                'instance'=>$instance,
                'post_query'=>$post_query,
                'post_query_recent'=>$post_query_recent,
                'popular'=>$popular,
                'recent'=>$recent,
            ));

            echo do_shortcode($args['after_widget']);
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
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title' ,'hama'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <hr  width="100%" align="center" /> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'popular' )); ?>"><?php esc_html_e( 'Title popular' ,'hama'); ?></label>

                 <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'popular' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popular' )); ?>" type="text" value="<?php echo esc_attr( $popular ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>"><?php esc_html_e( 'Post Number popular' ,'hama'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page' )); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e( 'Order By popular' ,'hama'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>">
                    <?php echo s7upf_get_order_list($order_by,false,'option');?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order popular' ,'hama'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
                    <option <?php selected('asc',$order) ?> value="asc">ASC</option>
                    <option <?php selected('desc',$order) ?> value="desc">DESC</option>

                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Category popular' ,'hama'); ?></label>

                <?php wp_dropdown_categories(array(
                    'selected'=>$category,
                    'show_option_all'=>esc_html__('--- Select ---','hama'),
                    'name'  =>$this->get_field_name( 'category' )
                )); ?>
            </p>
            <hr  width="100%" align="center" /> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'recent' )); ?>"><?php esc_html_e( 'Title recent' ,'hama'); ?></label>

                 <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent' )); ?>" type="text" value="<?php echo esc_attr( $recent ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page_recent' )); ?>"><?php esc_html_e( 'Post Number recent' ,'hama'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page_recent' )); ?>" type="text" value="<?php echo esc_attr( $posts_per_page_recent ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by_recent' )); ?>"><?php esc_html_e( 'Order By recent' ,'hama'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_by_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by_recent' )); ?>">
                    <?php echo s7upf_get_order_list($order_by_recent,false,'option');?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_recent' )); ?>"><?php esc_html_e( 'Order recent' ,'hama'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_recent' )); ?>">
                    <option <?php selected('asc',$order_recent) ?> value="asc">ASC</option>
                    <option <?php selected('desc',$order_recent) ?> value="desc">DESC</option>

                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'category_recent' )); ?>"><?php esc_html_e( 'Category recent' ,'hama'); ?></label>

                <?php wp_dropdown_categories(array(
                    'selected'=>$category_recent,
                    'show_option_all'=>esc_html__('--- Select ---','hama'),
                    'name'  =>$this->get_field_name( 'category_recent' )
                )); ?>
            </p>
            <hr  width="100%" align="center" /> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>"><?php esc_html_e( 'Custom image size (Example: enter size in pixels : 200x100 (Width x Height))' ,'hama'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image_size' )); ?>" type="text" value="<?php echo esc_attr( $image_size ); ?>">
            </p>

            <?php
        }
    }

    S7upf_BlogListPostsWidget::_init();

}