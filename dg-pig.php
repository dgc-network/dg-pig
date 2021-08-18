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

add_shortcode( 'shortcode_name', 'shortcode_handler_function' );
function shortcode_handler_function() {
    $output = 'here!';
    return $output;
}

add_shortcode( 'TodoItems', 'todo_items_callback' );
function todo_items_callback() {
    $args     = array(
        'method' => 'GET',
    );
    $response = wp_remote_request( 'https://localhost:5001/api/TodoItems', $args );
    $body     = wp_remote_retrieve_body( $response );
    $result   = json_decode( $body );
    return print_r($result);
    //return json_decode($response);

    if ( is_array( $result ) && ! is_wp_error( $result ) ) {
        // Work with the $result data
    } else {
        // Work with the error
    }
    $output = 'name:'.$body['name'];
    return $output;
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