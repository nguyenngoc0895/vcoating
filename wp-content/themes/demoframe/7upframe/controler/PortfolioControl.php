<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_PortfolioController'))
{
    class S7upf_PortfolioController{

        static function _init()
        {
            if(function_exists('stp_reg_post_type'))
            {
                add_action('init',array(__CLASS__,'_add_post_type'));
            }
        }

        static function _add_post_type()
        {
            $labels = array(
                'name'               => esc_html__('Portfolio','hama'),
                'singular_name'      => esc_html__('Portfolio','hama'),
                'menu_name'          => esc_html__('Portfolio','hama'),
                'name_admin_bar'     => esc_html__('Portfolio','hama'),
                'add_new'            => esc_html__('Add New','hama'),
                'add_new_item'       => esc_html__( 'Add New Portfolio','hama' ),
                'new_item'           => esc_html__( 'New Portfolio', 'hama' ),
                'edit_item'          => esc_html__( 'Edit Portfolio', 'hama' ),
                'view_item'          => esc_html__( 'View Portfolio', 'hama' ),
                'all_items'          => esc_html__( 'All Portfolio', 'hama' ),
                'search_items'       => esc_html__( 'Search Portfolio', 'hama' ),
                'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'hama' ),
                'not_found'          => esc_html__( 'No Portfolio found.', 'hama' ),
                'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash.', 'hama' )
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'portfolio' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
            );

            stp_reg_post_type('portfolio',$args);
            self::_add_taxonomy();
        }

        static  function  _add_taxonomy (){
            stp_reg_taxonomy(
                'portfolio_category',
                'portfolio',
                array(
                    'label' => esc_html__( 'Portfolio Category', 'hama' ),
                    'rewrite' => array( 'slug' => 'portfolio_category', 'hama' ),
                    'hierarchical' => true,
                    'query_var'  => true
                )
            );
        }


            if ( function_exists( 'ot_register_meta_box' ) )
                ot_register_meta_box($my_meta_box );
        }
    }

    S7upf_PortfolioController::_init();

}