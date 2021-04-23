<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Aspire for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once (MAGIKASPIRE_THEME_PATH . '/includes/tgm_activation/class-tgm-plugin-activation.php');

add_action('tgmpa_register', 'magikAspire_register_required_plugins');

function magikAspire_register_required_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(


        array(
            'name' =>  esc_html__('Redux Framework','aspire'), // The plugin name.
            'slug' => 'redux-framework', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.

        ),

        array(
            'name' => esc_html__('WooCommerce','aspire'), // The plugin name.
            'slug' => 'woocommerce', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.

        ),


        array(
            'name' => esc_html__('YITH Woocommerce Compare','aspire'), // The plugin name.
            'slug' => 'yith-woocommerce-compare', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.

        ),

        array(
            'name' => esc_html__('YITH WooCommerce Quick View','aspire'),// The plugin name.
            'slug' => 'yith-woocommerce-quick-view', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.

        ),
        array(
            'name' => esc_html__('YITH WooCommerce Wishlist','aspire'), // The plugin name.
            'slug' => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.

        ),
         array(
            'name' =>esc_html__('MailChimp for WordPress','aspire'), // The plugin name.
            'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.

        ),
          array(
            'name' => esc_html__( 'WooCommerce Currency Switcher','aspire'), // The plugin name.
            'slug' => 'woocommerce-currency-switcher', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.

        ),
           array(
            'name' =>esc_html__( 'WooCommerce Variation Swatches','aspire'), // The plugin name.
            'slug' => 'woo-variation-swatches', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.

        ),
         array(
            'name' =>esc_html__('Contact Form 7','aspire'), // The plugin name.
            'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.

        ),
            array(
            'name'                     => esc_html__('Magik Infinite Scroller','aspire'),
            'slug'                     => 'magik-infinite-scroller',
            'source'                   => MAGIKASPIRE_CUS_PLUGIN_PATH . '/magik-infinite-scroller.zip',
            'required'                 => false,
            'version'                  => '1.0',               
        ),
         array(
            'name'                     => esc_html__('Magik Catalog Mode','aspire'),
            'slug'                     => 'magik-catalog-mode',
            'source'                   => MAGIKASPIRE_CUS_PLUGIN_PATH . '/magik-catalog-mode.zip',
            'required'                 => false,
            'version'                  => '1.0',               
        ),

        array(
            'name'                     => esc_html__('Magik Woo Ajax Search','aspire'),
            'slug'                     => 'magik-wooajax-search',
            'source'                   => MAGIKASPIRE_CUS_PLUGIN_PATH . '/magik-wooajax-search.zip',
            'required'                 => false,
            'version'                  => '1.0',               
        ),
         array(
            'name'                     => esc_html__('Magik Social Share','aspire'),
            'slug'                     => 'magik-social-share',
            'source'                   => MAGIKASPIRE_CUS_PLUGIN_PATH . '/magik-social-share.zip',
            'required'                 => false,
            'version'                  => '1.0',               
        ),
              array(
            'name'                     => esc_html__('Magik WooCategory Image','aspire'),
            'slug'                     => 'magik-woocategory-image',
            'source'                   => MAGIKASPIRE_CUS_PLUGIN_PATH . '/magik-woocategory-image.zip',
            'required'                 => false,
            'version'                  => '1.0',               
        )
    );
/*

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'aspire',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

      
    );

    tgmpa( $plugins, $config );
}