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
include_once dirname( __FILE__ ) . '/build/gen/GPBMetadata/PikePayload.php';
include_once dirname( __FILE__ ) . '/build/gen/GPBMetadata/PikeState.php';
include_once dirname( __FILE__ ) . '/build/gen/Agent.php';
include_once dirname( __FILE__ ) . '/build/gen/AgentList.php';
include_once dirname( __FILE__ ) . '/build/gen/PikePayload.php';
include_once dirname( __FILE__ ) . '/build/gen/PikePayload/Action.php';
include_once dirname( __FILE__ ) . '/build/gen/CreateAgentAction.php';
include_once dirname( __FILE__ ) . '/build/gen/KeyValueEntry.php';

add_shortcode( 'shortcode_agents', 'agents_callback' );
function agents_callback() {

    //$PikePayloadAction = new PikePayload_Action();
    //$PikePayload = new PikePayload();
    $KeyValueEntry = new KeyValueEntry();
    $KeyValueEntry->setKey('email');
    $KeyValueEntry->setValue('rove.k.chen@gmail.com');

    $CreateAgentAction = new CreateAgentAction();
    $CreateAgentAction->setOrgId('001');
    $CreateAgentAction->setPublicKey('DFcP5QFjbYtfgzWoqGedhxecCrRe41G3RD');
    $CreateAgentAction->setActive(true);
    $CreateAgentAction->setRoles(['003','004']);
    $CreateAgentAction->setMetadata([$KeyValueEntry]);
    $send_data = $CreateAgentAction->serializeToString();

    $AgentList = new AgentList();
    $Agent = new Agent();
    try {
        $Agent->mergeFromString($send_data);
        $agents = $AgentList->getAgents();
        $agents[] = $Agent;
        $AgentList->setAgents($agents);
        $send_data = $AgentList->serializeToString();
    } catch (Exception $e) {
        // Handle parsing error from invalid data.
        // ...
    }
    $agents = $AgentList->getAgents();
  
    $send_address = 'DFcP5QFjbYtfgzWoqGedhxecCrRe41G3RD';
    $private_key = 'L44NzghbN6UD737kG6ukfdCq6BXyyTY2W15UkNhHnBff6acYWtsZ';
    $send_amount = 0.001;
/*
	$result = OP_RETURN_send($send_address, $send_amount, $send_data);
	
	if (isset($result['error']))
		$result_output = 'Error: '.$result['error']."\n";
	else
        $result_output = 'TxID: '.$result['txid']."\nWait a few seconds then check on: http://coinsecrets.org/\n";
*/
/*
    $data = $from->serializeToString();
    try {
      $to->mergeFromString($data);
    } catch (Exception $e) {
      // Handle parsing error from invalid data.
      // ...
    }
*/    
    $output = '<figure class="wp-block-table"><table><tbody>';
    $output .= '<tr><td>ID</td><td>Name</td></tr>';

    foreach ($agents as $index => $agent)
        //$output .= '<tr><td>'.$index.'</td><td>'.$agents[$index]['PublicKey'].'</td></tr>';

    //$output .= '<tr><td> </td><td>'.$result_output.'</td></tr>';
    $output .= '<tr><td>send_data</td><td>'.$send_data.'</td></tr>';

    $output .= '</tbody></table></figure>';
    return $output;    
}

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
    $output .= '<tr><td>類型</td><td><select><option>消毒</option><option>免疫</option><option>餵飼</option></select></td></tr>';
    $output .= '<tr><td>時間</td><td><input type="time"></td></tr>';
    $output .= '<tr><td>作業人員姓名</td><td><input type="text"></td></tr>';
    $output .= '<tr><td>照片上傳</td><td><input type="text"></td></tr>';
    $output .= '<tr><td>說明</td><td><input type="text"></td></tr>';
    $output .= '<tr><td><input type="submit"></td><td></td></tr>';
    $output .= '</tbody></table></figure>';
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
