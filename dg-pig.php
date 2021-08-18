<?php

/**
 * Plugin Name: dg-pig
 * Plugin URI: https://wordpress.org/plugins/dg-pig/
 * Description: The leading web api plugin for pig system by shortcode
 * Author: dgc.network
 * Author URI: https://dgc.network/
 * Version: 1.0.0
 * Requires at least: 4.4
 * Tested up to: 5.2
 * 
 * Text Domain: dg-pig
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_shortcode( 'shortcode_handler_function', 'shortcode_handler_function' );
function shortcode_handler_function() {
    echo 'here!';
}




/*
 * Define DG_PIG_PLUGIN_FILE.
 */
if ( ! defined( 'DG_PIG_PLUGIN_FILE' ) ) {
    define( 'DG_PIG_PLUGIN_FILE', __FILE__ );
}

/*
 * Include the main class.
 */
//if ( ! class_exists( 'dg_pig' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-dg-pig.php';
//}

/*
function dg_pig(){
    return dg_pig::instance();
}

$GLOBALS['dg-pig'] = dg_pig();
*/

?>