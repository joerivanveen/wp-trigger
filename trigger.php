<?php
/*
Plugin Name: Trigger
Plugin URI: https://github.com/joerivanveen/wp-trigger
Description: Triggers the hook supplied in querystring, e.g. ?hook=woocommerce_payment_complete&order_id=300 hook MUST be the first query var, other vars are also in the order received by the hook.
Version: 1.0.0
Author: Joeri van Veen
Author URI: https://wp-developer.eu/
License: GPL3
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function ruigehond_trigger_hook() {
    if (isset($_GET['hook'])) {
        // get all the arguments you are sending to the hook
        $args = [];
        foreach ($_GET as $name=>$value) {
            $args[] = $value;
        }
        if ($args[0] !== $_GET['hook']) {
            die('Supply hook as first argument / query var, and other arguments also in order');
        }
        try {
            do_action(...$args);
        } catch(Exception $ex) {
            die($ex->getMessage());
        }
    }
}


// Now we set that function up to execute
add_action( 'wp', 'ruigehond_trigger_hook' );


