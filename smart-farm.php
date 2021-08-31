<?php

/**
 * Plugin Name: smart-farm
 * Plugin URI: https://wordpress.org/plugins/smart-farm/
 * Description: The leading web api plugin for pig system by shortcode
 * Author: dgc.network
 * Author URI: https://dgc.network/
 * Version: 1.0.0
 * Requires at least: 4.4
 * Tested up to: 5.2
 * 
 * Text Domain: smart-farm
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include_once dirname( __FILE__ ) . '/php-OP_RETURN/OP_RETURN.php';
include_once dirname( __FILE__ ) . '/vendor/autoload.php';
include_once dirname( __FILE__ ) . '/build/gen/GPBMetadata/PikeState.php';
include_once dirname( __FILE__ ) . '/build/gen/Agent.php';
$from = new Agent();

add_shortcode( 'shortcode_name', 'shortcode_handler_function' );
function shortcode_handler_function() {
    $output = 'here!';

    $testnet=false;
    $unspent_inputs=OP_RETURN_bitcoin_cmd('listunspent', $testnet, 0);
    if (!is_array($unspent_inputs))
        return array('error' => 'Could not retrieve list of unspent inputs');
    
    $output = '<figure class="wp-block-table"><table><tbody>';
    foreach ($unspent_inputs as $index => $unspent_input)
        $output .= '<tr><td>address</td><td>'.$unspent_inputs[$index]['address'].'</td></tr>';
    
    $output .= '<tr><td>作業日期<meta charset="utf-8"></td><td><input type="date"></td></tr>';
    $output .= '<tr><td>類型</td><td><select><option>消毒</option><option>免疫</option><option>餵飼</option></select></td></tr><tr><td>時間</td><td><input type="time"></td></tr><tr><td>作業人員姓名</td><td><input type="text"></td></tr><tr><td>照片上傳</td><td><input type="text"></td></tr><tr><td>說明</td><td><input type="text"></td></tr><tr><td><input type="submit"></td><td></td></tr></tbody></table></figure>';
    return $output;
}

add_shortcode( 'TodoItems', 'todo_items_callback' );
function todo_items_callback() {
    $args     = array(
        'method' => 'GET',
    );
    $response = wp_remote_request( 'https://localhost:5001/api/TodoItems', $args );
    $body     = wp_remote_retrieve_body( $response );
    $body = wp_remote_retrieve_body( wp_remote_get( 'https://localhost:5001/api/TodoItems' ) );
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
