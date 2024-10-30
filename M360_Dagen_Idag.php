<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
define( 'M360_DAGEN_IDAG_PLUGIN_NAME',' M360 Dagen idag');
define( 'M360_DAGEN_IDAG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'M360_DAGEN_IDAG_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Plugin Name:         M360 Dagen idag
 * Plugin URI:          https://m360.no
 * Description:         M360 dagen i dag is a plugin to show info about today evnents in history, in Norwegian language , its connect to nrk and get the info from it. use [m360-dagen-idag] as shortcode or ad it as a sidebar widget
 * Author:              M360 Digitalbyrå
 * Author URI:          https://m360.no/
 *
 * Version:             1.0.2
 * Tested up to:        4.9.4
 *
 * Text Domain:         m360-dagen-idag
 * Domain Path:         /languages
 *
 */

require_once 'functions.php';

class M360_DAGEN_IDAG_Widget extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'M360 Dagen idag' );
    }

    function widget( $args, $instance ) {
        m360_dagen_idag_get_html();
    }

}

class M360_DAGEN_IDAG {
    const VERSION = '1.0.0';
    const TEXT_DOMAIN = 'm360-dagen-idag';

    static function init() {
        load_plugin_textdomain(self::TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        add_shortcode('m360-dagen','M360_DAGEN_IDAG::m360_dagenidag_function');
    }

    static function m360_dagenidag_function(){
        m360_dagen_idag_get_html();
    }

    static function m360_dagenidag_register_widgets() {
        register_widget( 'M360_DAGEN_IDAG_Widget' );
    }
}

add_action( 'plugins_loaded', 'M360_DAGEN_IDAG::init' );
add_action( 'widgets_init', 'M360_DAGEN_IDAG::m360_dagenidag_register_widgets' );
