<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal IPN Class
// ------------------------------------------------------------------------

// Use PayPal on Sandbox or Live
$config['sandbox'] = FALSE; // FALSE for live environment

// PayPal Business Email ID
$config['business'] = 'dgulati@pppguides.com';

$config['client_id'] = 'ATOqO4DJPVS6SmBDqJUxXqAUWdECBLpi2omnhL47bvPG4yUveSzuA4xwUUhWV1oIn6h0QmqOoNEadY8M';
$config['secret']    = 'EOAE2rmXb6v6Ode7WErD8p5fJN7PrMnKf2EWoNP_PbTl1IXcKm_ylgYjne0zA6YNXAugmK1Q1VGw8r0U';

/*sb-ue6mu3073970@business.example.com
Client ID
AQMiKHnhniiNHYK407ZxyzMtN9juF8m32w2DLYcO2Gyx-9BjG-JaNF1GqXOvLmq4LNdbJ-rsE-PjiS8J
Secret
Hide
Note: When you generate a new secret, you still maintain the original secret. The maximum number of client secrets is two. A client secret is either in enabled or disabled state.

Created	Secret	Status	Action
Sep 11, 2020	EIso7iVh5tCxXZDCYlhtVi3QC4ZO7VwrIpRKSFJb3XTBrHy2wA7yKjZOrbq5BCACqzITQQK5FrbkxRL_

*/
// If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at 
$config['paypal_lib_button_path'] = 'buttons';

// What is the default currency?
$config['paypal_lib_currency_code'] = 'USD';

?>
