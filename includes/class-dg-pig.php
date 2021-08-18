<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!class_exists('dg_pig')) {

    class dg_pig {

        /**
         * Class constructor
         */
        public function __construct() {
            add_shortcode('dg-pig', __CLASS__ . '::dg_pig_shortcode_callback');
        }

        /**
         * Shortcode Wrapper.
         *
         * @param string[] $function Callback function.
         * @param array    $atts     Attributes. Default to empty array.
         *
         * @return string
         */
        public static function shortcode_wrapper($function, $atts = array()) {
            ob_start();
            call_user_func($function, $atts);
            return ob_get_clean();
        }

        /**
         * Shortcode callback
         * @param array $atts
         * @return string
         */
        public static function dg_pig_shortcode_callback($atts) {
            return self::shortcode_wrapper(array('dg_pig', 'dg_pig_shortcode_output'), $atts);
        }

        /**
         * Shortcode output
         * @param array $atts
         */
        public static function dg_pig_shortcode_output($atts) {

            echo $atts.' is here!';
/*            
            if (!is_user_logged_in()) {
                echo '<div class="woocommerce">';
                wc_get_template('myaccount/form-login.php');
                echo '</div>';
            } else {
                wp_enqueue_style('dashicons');
                wp_enqueue_style('select2');
                wp_enqueue_style('jquery-datatables-style');
                wp_enqueue_style('jquery-datatables-responsive-style');
                wp_enqueue_script('jquery-datatables-script');
                wp_enqueue_script('jquery-datatables-responsive-script');
                wp_enqueue_script('selectWoo');
                wp_enqueue_script('dgc-wallet-endpoint');
                if (isset($_GET['payment_action']) && !empty($_GET['payment_action'])) {
                    if ('view_transactions' === $_GET['payment_action']) {
                        dgc_wallet()->get_template('dgc-wallet-endpoint-transactions.php');
                    } else if (in_array($_GET['payment_action'], apply_filters('dgc_wallet_endpoint_actions', array('add', 'transfer')))) {
                        dgc_wallet()->get_template('dgc-wallet-endpoint.php');
                    }
                    do_action('dgc_wallet_shortcode_action', $_GET['payment_action']);
                } else {
                    dgc_wallet()->get_template('dgc-wallet-endpoint.php');
                }
            }
*/            
        }        

    }
    new dg_pig();
}
?>